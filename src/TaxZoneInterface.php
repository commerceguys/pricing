<?php

namespace CommerceGuys\Pricing;

interface TaxZoneInterface
{
  /**
   * Get the Zone for address matching
   *
   * @return \CommerceGuys\Zone\Zone
   */
  public function getZone();

  /**
   * Get a list of all the taxs in the Zone.
   *
   * @return array
   */
  public function getTaxes();

  /**
   * Get a tax.
   *
   * @param sting $zoneCode
   * @return array
   */
  public function getTax($taxCode);

}
