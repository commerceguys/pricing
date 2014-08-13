<?php

namespace CommerceGuys\Pricing;

use Symfony\Component\Yaml\Parser;

/**
 * Manages currencies based on ISO 4217 definitions.
 */
class DefaultCurrencyManager implements CurrencyManagerInterface
{
    /**
     * ISO 4217 currency definitions.
     *
     * @var array
     */
    protected $definitions = array();

    /**
     * CLDR currency translations.
     *
     * @var array
     */
    protected $translations = array();

    /**
     * The yaml parser.
     *
     * @var \Symfony\Component\Yaml\Parser
     */
    protected $parser;

    public function __construct()
    {
        $this->parser = new Parser();
        $this->definitions = $this->parser->parse(file_get_contents(__DIR__ . '/../resources/currencies.yml'));
    }

    /**
     * {@inheritdoc}
     */
    public function get($currencyCode, $locale = 'en_US')
    {
        if (!isset($this->definitions[$currencyCode])) {
            throw new UnknownCurrencyException($currencyCode);
        }

        $translation = $this->getTranslation($currencyCode, $locale);
        $definition = $translation + $this->definitions[$currencyCode];

        return $this->createCurrencyFromDefinition($definition);
    }

    /**
     * {@inheritdoc}
     */
    public function getAll($locale = 'en_US')
    {
        $currencies = array();
        foreach ($this->definitions as $currencyCode => $definition) {
            $translation = $this->getTranslation($currencyCode, $locale);
            $definition = $translation + $this->definitions[$currencyCode];
            $currencies[$currencyCode] = $this->createCurrencyFromDefinition($definition);
        }

        return $currencies;
    }

    /**
     * Gets the translation for the provided currency code and locale.
     *
     * @param string $currencyCode The currency code.
     * @param string $locale The locale (i.e. en_US).
     *
     * @return array The translation, if found. Otherwise, an empty array.
     */
    protected function getTranslation($currencyCode, $locale)
    {
        if ($locale == 'en_US') {
            // The currency definitions are in the eu_US locale, no need
            // to translate them.
            return array();
        }

        $translations = $this->loadTranslations($locale);
        if (empty($translations[$currencyCode])) {
            // The loaded translation has no entry for this currency code.
            // The original (en_US) name&symbol will be used.
            return array();
        }

        return $translations[$currencyCode];
    }

    /**
     * Loads currency translations for the provided locale.
     *
     * @param string $locale The locale (i.e. en_US).
     *
     * @return array The loaded translations.
     *
     * @throws \CommerceGuys\Pricing\UnknownLocaleException
     */
    protected function loadTranslations($locale)
    {
        if (isset($this->translations[$locale])) {
            return $this->translations[$locale];
        }

        $filename = __DIR__ . '/../resources/translations/' . $locale . '.yml';
        if (!file_exists($filename)) {
            throw new UnknownLocaleException($locale);
        }
        $this->translations[$locale] = $this->parser->parse(file_get_contents($filename));

        return $this->translations[$locale];
    }

    /**
     * Creates a currency object from the provided definition.
     *
     * @param array $definition The ISO 4217 definition.
     *
     * @return \CommerceGuys\Pricing\Currency
     */
    protected function createCurrencyFromDefinition(array $definition)
    {
        $definition += array(
            'fraction_digits' => 2,
        );

        $currency = new Currency();
        $currency->setCurrencyCode($definition['code']);
        $currency->setName($definition['name']);
        $currency->setNumericCode($definition['numeric_code']);
        $currency->setFractionDigits($definition['fraction_digits']);
        $currency->setSymbol($definition['symbol']);

        return $currency;
    }
}
