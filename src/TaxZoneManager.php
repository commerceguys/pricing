<?php

namespace CommerceGuys\Pricing;
use CommerceGuys\Zone\ZoneManager;
use Symfony\Component\Yaml\Yaml;

class TaxZoneManager implements TaxZoneInterface {

  /**
   * {@inheritdoc}
   */
  public function getZoneList() {
    $path = 'zones';
    $files = scandir($path);

    $zoneCodes = array();
    foreach ($files as $file) {
      $delimiter = strpos($file, '.');
      if (substr($file, $delimiter + 1) == 'yml') {
        $zoneCodes[] = substr($file, 0, $delimiter - 1);
      }
    }

    return $zoneCodes;
  }

  /**
   * {@inheritdoc}
   */
  public function loadZone($taxZoneCode) {
    // @todo Add some error handling.
    $definition = Yaml::parse(file_get_contents('tax/' . strtolower($taxZone) . '.yml'));

    if (empty($definition)) {
      throw new UnknownTaxZoneException($taxZoneCode);
    }

    return $this->createTaxZoneFromDefinition($definition);
  }

  /**
   * {@inheritdoc}
   */
  public function createTaxZoneFromDefinition(array $definition) {
    $definition += array(
      'decimals' => 2,
      'rounding_step' => 0,
    );

    $taxZone = new TaxZone();
    $taxZone->setCode($definition['code']);
    $taxZone->setType($definition['type']);

    foreach ($definition['taxes'] as $taxName => $taxRates) {
      foreach ($taxRates['rates'] as $taxDate => $taxRate) {
        $taxDefinition = array(
        	'code' => $definition['code'] . '|' . $taxRates['code'],
          'rate' => $taxRate,
          'name' => $taxName,
          'start-date' => $taxDate,
        );
        $tax = TaxManager::createTaxFromDefinition($taxDefinition);
        $taxZone->addTax($tax);
      }
    }

    $zone = ZoneManager::createZoneFromDefinition($definition['zone']);
    $taxZone->setZone($zone);

    return $taxZone;
  }
}
