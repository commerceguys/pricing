<?php

namespace CommerceGuys\Pricing;

interface TaxZoneManagerInterface
{
  /**
   * Load a list of all the tax zones defined.
   *
   * @return array
   */
  public function loadZoneList();

  /**
   * Load a tax zone definition from file.
   *
   * @param sting $taxzoneCode
   *  The tax zone code
   *
   * @return /CommerceGuys/Price/TaxZone
   */
  public function loadZone($taxZoneCode);

  /**
   * Load all the zones.
   *
   * @return array
   */
  public function loadZones();

  /**
   * Create a Tax Zone from a definition.
   *
   * @param array $zoneDefinition
   * @return \CommerceGuys\Pricing\TaxZone
   */
  public function createTaxZoneFromDefinition($zoneDefinition);
}
