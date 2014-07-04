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
    $tax->setCode($taxDefinition['code']);
    $tax->setName($taxDefinition['name']);
    $tax->setDate($taxDefinition['start-date']);
    $tax->setPercentageRate($taxDefinition['rate']);
  }

}
