<?php

namespace CommerceGuys\Pricing;

/**
 * Tax manager interface.
 *
 * Tax managers are responsible for creating Taxes
 */
interface CurrencyManagerInterface
{
  /**
   * Create a Tax from a definition.
   *
   * @param array $zoneDefinition
   * @return \CommerceGuys\Pricing\Tax
   */
  public function createTaxFromDefinition($taxDefinition);

}
