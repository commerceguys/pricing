pricing
=======

A PHP 5.3+ library for working with prices and currencies.

Currencies
----------
```php
use CommerceGuys\Pricing\DefaultCurrencyManager;

// Reads the currency definitions from resources/currency.yml.
$currencyManager = new DefaultCurrencyManager;

$currency = $currencyManager->get('EUR');
echo $currency->getName();
echo $currency->getCurrencyCode();
echo $currency->getSymbol();

$allCurrencies = $currencyManager->getAll();
```

An ecommerce system would usually store currencies in the database, which allows a merchant to:

1. Define custom currencies.
2. Enable/disable existing currencies
3. Modify an existing currency (changing the default number of digits used for rounding, for example).

This would be accomplished by using the DefaultCurrencyManager to get all default currencies and insert them into the database, then defining a custom CurrencyManager that returns the currencies from the database.

Prices
------
A price is a value object. Each operation (add, subtract, multiply, divide, round) produces a new price instance.
All amounts are passed as strings, and manipulated using bcmath.
Since bcmath has no rounding functions, and PHP's round() function can't be used (since it casts the amount to float),
the price object implements its own powerful rounding.

```php
use CommerceGuys\Pricing\DefaultCurrencyManager;
use CommerceGuys\Pricing\Price;

$currencyManager = new DefaultCurrencyManager;
$currency = $currencyManager->get('EUR');

// $firstPrice, $secondPrice, $thirdPrice, $total are all Price instances.
$firstPrice  = new Price('99.99', $currency);
$secondPrice = new Price('100', $currency);
$thirdPrice  = new Price('20.307', $currency);
// Every operation produces a new Price instance.
$total = $firstPrice
            ->add($secondPrice)
            ->subtract($thirdPrice)
            ->multiply('4')
            ->divide('2');
echo $total; // 359.366  EUR
echo $total->round(); // 359.37  EUR
echo $total->round(Price::ROUND_HALF_UP, 1); // 359.4 EUR
echo $total->greaterThan($firstPrice); // true
```
