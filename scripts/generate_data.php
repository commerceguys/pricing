<?php

/**
 * Generates the yml files stored in resources/ using ISO and CLDR data.
 */

include '../vendor/autoload.php';

use Symfony\Component\Yaml\Dumper;

$dumper = new Dumper;

// Downloaded from http://www.currency-iso.org/en/home/tables/table-a1.html
$isoCurrencies = 'c2.xml';
// Downloaded from http://unicode.org/Public/cldr/25/json_full.zip
$cldrCurrencies = 'json_full/main/en-US/currencies.json';
if (!file_exists($isoCurrencies)) {
  die('The c2.xml ISO currency file was not found');
}
if (!file_exists($cldrCurrencies)) {
  die('The json_full CLDR data folder was not found');
}

// Create a list of ISO currencies.
$currencies = array();
$data = simplexml_load_file($isoCurrencies);
foreach ($data->CcyTbl->CcyNtry as $currency) {
  $attributes = (array) $currency->CcyNm->attributes();
  if (!empty($attributes) && !empty($attributes['@attributes']['IsFund'])) {
    // Ignore funds.
    continue;
  }
  $currency = (array) $currency;
  if (empty($currency['Ccy'])) {
    // Ignore placeholders like "Antarctica".
    continue;
  }
  if (substr($currency['CtryNm'], 0, 2) == 'ZZ' || in_array($currency['Ccy'], array('XUA', 'XSU', 'XDR'))) {
    // Ignore special currencies.
    continue;
  }

  $currencyCode = $currency['Ccy'];
  // Don't store the name and symbol, that will be taken from the CLDR data.
  $currencies[$currencyCode] = array(
    'code' => $currencyCode,
    'name' => '',
    'numeric_code' => $currency['CcyNbr'],
    'symbol' => '',
  );
  // Store fraction_digits only if it differs from the default (2).
  if ($currency['CcyMnrUnts'] != 2) {
    $currencies[$currencyCode]['fraction_digits'] = $currency['CcyMnrUnts'];
  }
}

// Take the currency names and symbols from CLDR.
$cldrData = json_decode(file_get_contents($cldrCurrencies), TRUE);
$cldrData = $cldrData['main']['en-US']['numbers']['currencies'];
foreach ($currencies as $currencyCode => $currency) {
  $currencies[$currencyCode]['name'] = $cldrData[$currencyCode]['displayName'];
  $currencies[$currencyCode]['symbol'] = $cldrData[$currencyCode]['symbol'];
}

// Sort the currencies by currency code.
ksort($currencies);

// Write out currencies.yml.
$yaml = $dumper->dump($currencies, 3);
file_put_contents('currencies.yml', $yaml);
