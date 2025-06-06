<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Translation;

use Symfony\Component\HttpKernel\CacheWarmer\WarmableInterface;
use Symfony\Component\Translation\Exception\InvalidArgumentException;
use Symfony\Component\Translation\TranslatorInterface as LegacyTranslatorInterface;
use Symfony\Contracts\Translation\LocaleAwareInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

/**
 * @author Abdellatif Ait boudad <a.aitboudad@gmail.com>
 */
class DataCollectorTranslator implements LegacyTranslatorInterface, TranslatorInterface, TranslatorBagInterface, WarmableInterface
{
    public const MESSAGE_DEFINED = 0;
    public const MESSAGE_MISSING = 1;
    public const MESSAGE_EQUALS_FALLBACK = 2;

    /**
     * @var TranslatorInterface|TranslatorBagInterface
     */
    private $translator;

    private $messages = [];

    /**
     * @param TranslatorInterface $translator The translator must implement TranslatorBagInterface
     */
    public function __construct($translator)
    {
        if (!$translator instanceof LegacyTranslatorInterface && !$translator instanceof TranslatorInterface) {
            throw new \TypeError(sprintf('Argument 1 passed to "%s()" must be an instance of "%s", "%s" given.', __METHOD__, TranslatorInterface::class, \is_object($translator) ? \get_class($translator) : \gettype($translator)));
        }
        if (!$translator instanceof TranslatorBagInterface || !$translator instanceof LocaleAwareInterface) {
            throw new InvalidArgumentException(sprintf('The Translator "%s" must implement TranslatorInterface, TranslatorBagInterface and LocaleAwareInterface.', \get_class($translator)));
        }

        $this->translator = $translator;
    }

    /**
     * {@inheritdoc}
     */
    public function trans($id, array $parameters = [], $domain = null, $locale = null)
    {
        $trans = $this->translator->trans($id, $parameters, $domain, $locale);
        $this->collectMessage($locale, $domain, $id, $trans, $parameters);

        return $trans;
    }

    /**
     * {@inheritdoc}
     *
     * @deprecated since Symfony 4.2, use the trans() method instead with a %count% parameter
     */
    public function transChoice($id, $number, array $parameters = [], $domain = null, $locale = null)
    {
        if ($this->translator instanceof TranslatorInterface) {
            $trans = $this->translator->trans($id, ['%count%' => $number] + $parameters, $domain, $locale);
        } else {
            $trans = $this->translator->transChoice($id, $number, $parameters, $domain, $locale);
        }

        $this->collectMessage($locale, $domain, $id, $trans, ['%count%' => $number] + $parameters);

        return $trans;
    }

    /**
     * {@inheritdoc}
     */
    public function setLocale($locale)
    {
        $this->translator->setLocale($locale);
    }

    /**
     * {@inheritdoc}
     */
    public function getLocale()
    {
        return $this->translator->getLocale();
    }

    /**
     * {@inheritdoc}
     */
    public function getCatalogue($locale = null)
    {
        return $this->translator->getCatalogue($locale);
    }

    /**
     * {@inheritdoc}
     */
    public function warmUp($cacheDir)
    {
        if ($this->translator instanceof WarmableInterface) {
            $this->translator->warmUp($cacheDir);
        }
    }

    /**
     * Gets the fallback locales.
     *
     * @return array The fallback locales
     */
    public function getFallbackLocales()
    {
        if ($this->translator instanceof Translator || method_exists($this->translator, 'getFallbackLocales')) {
            return $this->translator->getFallbackLocales();
        }

        return [];
    }

    /**
     * Passes through all unknown calls onto the translator object.
     */
    public function __call($method, $args)
    {
        return $this->translator->{$method}(...$args);
    }

    /**
     * @return array
     */
    public function getCollectedMessages()
    {
        return $this->messages;
    }

    private function collectMessage(?string $locale, ?string $domain, ?string $id, string $translation, ?array $parameters = [])
    {
        if (null === $domain) {
            $domain = 'messages';
        }

        $id = (string) $id;
        $catalogue = $this->translator->getCatalogue($locale);
        $locale = $catalogue->getLocale();
        $fallbackLocale = null;
        if ($catalogue->defines($id, $domain)) {
            $state = self::MESSAGE_DEFINED;
        } elseif ($catalogue->has($id, $domain)) {
            $state = self::MESSAGE_EQUALS_FALLBACK;

            $fallbackCatalogue = $catalogue->getFallbackCatalogue();
            while ($fallbackCatalogue) {
                if ($fallbackCatalogue->defines($id, $domain)) {
                    $fallbackLocale = $fallbackCatalogue->getLocale();
                    break;
                }
                $fallbackCatalogue = $fallbackCatalogue->getFallbackCatalogue();
            }
        } else {
            $state = self::MESSAGE_MISSING;
        }

        $this->messages[] = [
            'locale' => $locale,
            'fallbackLocale' => $fallbackLocale,
            'domain' => $domain,
            'id' => $id,
            'translation' => $translation,
            'parameters' => $parameters,
            'state' => $state,
            'transChoiceNumber' => isset($parameters['%count%']) && is_numeric($parameters['%count%']) ? $parameters['%count%'] : null,
        ];
    }
}