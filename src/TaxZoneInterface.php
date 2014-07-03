<?php

namespace CommerceGuys\Pricing;

interface TaxZoneInterface
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
}
