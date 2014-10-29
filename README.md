pricing
=======

A PHP 5.4+ library for working with prices.

Depends on [commerceguys/intl](http://github.com/commerceguys/intl) for currency information and formatting.

Prices
------
A price is a value object. Each operation (add, subtract, multiply, divide, round) produces a new price instance.
All amounts are passed as strings, and manipulated using bcmath.

```php
use CommerceGuys\Intl\Currency\CurrencyRepository;
use CommerceGuys\Pricing\Price;

$currencyRepository = new CurrencyRepository;
$currency = $currencyRepository->get('EUR');

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
use CommerceGuys\Intl\Currency\CurrencyRepository;
use CommerceGuys\Pricing\Price;

$currencyRepository = new CurrencyRepository;
$eur = $currencyRepository->get('EUR');
$usd = $currencyRepository->get('USD');

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
use CommerceGuys\Intl\Currency\CurrencyRepository;
use CommerceGuys\Intl\NumberFormat\NumberFormatRepository;
use CommerceGuys\Intl\Formatter\NumberFormatter;
use CommerceGuys\Pricing\Price;

$currencyRepository = new CurrencyRepository;
$currency = $currencyRepository->get('USD');
$price = new Price('99.99', $currency);

$numberFormatRepository = new NumberFormatRepository;
$numberFormat = $numberFormatRepository->get('en-US');

$currencyFormatter = new NumberFormatter($numberFormat, NumberFormatter::CURRENCY);
echo $currencyFormatter->formatCurrency($price->getAmount(), $price->getCurrency()); // $99.99
```
