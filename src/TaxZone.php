<?php

namespace CommerceGuys\Pricing;
use CommerceGuys\Zone\ZoneManager;
use Symfony\Component\Yaml\Yaml;

class TaxZone implements TaxZoneInterface {

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
    $taxZone = Yaml::parse(file_get_contents('tax/' . strtolower($taxZone) . '.yml'));

    $taxZone += array(
      'code' => $taxZoneCode,
    );

    return $taxZone;
  }
}
