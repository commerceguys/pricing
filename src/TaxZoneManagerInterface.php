<?php

namespace CommerceGuys\Pricing;

interface TaxZoneManagerInterface
{
  /**
   * Get a list of all the tax zones defined.
   *
   * @return array
   */
  public function getZoneList();

  /**
   * Get a tax zone definition.
   *
   * @param sting $zoneCode
   * @return array
   */
  public function loadZone($taxZoneCode);

  /**
   * Load all the zones.
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
