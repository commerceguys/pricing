<?php

namespace CommerceGuys\Pricing;

interface TaxMatcherInterface
{
  /**
   * Set the tax zone the business is established in.
   *
   * @param string $zoneCode
   *  ISO 3166-1 or 3166-2 code for country or state.
   */
  public function setEstablishment($taxZone);

  /**
   * Add places for tax identification,
   * known as NEXUS in the USA.
   *
   * @param string $zoneCode
   *  ISO 3166-1 or 3166-2 code for country or state.
   */
  public function addIdentification($taxZone);

  /**
   * Get the place of supply based on the tax zone of establishement
   * and identifications.
   *
   * @return string
   */
  public function getPlace($address);
}
