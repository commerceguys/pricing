pricing
=======

A PHP 5.3+ library for working with prices.

Depends on [commerceguys/intl](http://github.com/commerceguys/intl) for currency information and formatting.

Prices
------
A price is a value object. Each operation (add, subtract, multiply, divide, round) produces a new price instance.
All amounts are passed as strings, and manipulated using bcmath.
Since bcmath has no rounding functions, and PHP's round() function can't be used (since it casts the amount to float),
the price object implements its own powerful rounding.

```php
use CommerceGuys\Intl\Currency\DefaultCurrencyManager;
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

Currency conversion
-------------------
```php
use CommerceGuys\Intl\Currency\DefaultCurrencyManager;
use CommerceGuys\Pricing\Price;

$currencyManager = new DefaultCurrencyManager;
$eur = $currencyManager->get('EUR');
$usd = $currencyManager->get('USD');

// Use an external library to get an actual exchange rate.
$rate = 1;
$eurPrice = new Price('100', $eur);
$usdPrice = $eurPrice->convert($usd, $rate);
echo $usdPrice;
```
An external library like [Swap](https://github.com/florianv/swap) can be
used to retrieve exchange rates.

Formatting
----------
Use the NumberFormatter class provided by [commerceguys/intl](http://github.com/commerceguys/intl).

```php
use CommerceGuys\Intl\Currency\DefaultCurrencyManager;
use CommerceGuys\Intl\NumberFormat\DefaultNumberFormatManager;
use CommerceGuys\Intl\Formatter\NumberFormatter;
use CommerceGuys\Pricing\Price;

$currencyManager = new DefaultCurrencyManager;
$currency = $currencyManager->get('USD');
$price = new Price('99.99', $currency);

$numberFormatManager = new DefaultNumberFormatManager;
$numberFormat = $numberFormatManager->get('en-US');

$currencyFormatter = new NumberFormatter($numberFormat, NumberFormatter::CURRENCY);
echo $currencyFormatter->formatCurrency($price->getAmount(), $price->getCurrency()); // $99.99
```
