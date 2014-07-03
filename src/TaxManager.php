<?php

namespace CommerceGuys\Pricing;

/**
 * Manages tax rates.
 */
class TaxManager implements TaxManagerInterface
{
  /**
   * {@inheritdoc}
   */
  public function createTaxFromDefinition($taxDefinition) {
    $tax = new Tax();
    $tax->setCode($code);
    $tax->setRate($rate);
  }

}
