<?php

namespace CommerceGuys\Pricing;

/**
 * Tax manager interface.
 *
 * Tax managers are responsible for creating Taxes
 */
interface TaxManagerInterface
{
  /**
   * Create a Tax from a definition.
   *
   * @param array $taxDefinition
   * @return \CommerceGuys\Pricing\Tax
   */
  public function createTaxFromDefinition($taxDefinition);

}
