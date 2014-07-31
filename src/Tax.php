<?php

namespace CommerceGuys\Pricing;

class Tax implements TaxInterface
{
  /**
   * The tax code.
   *
   * Uppercase alphabetic ISO 3166-1 or 3166-2
   * followed by rate code e.g. FR-H|S.
   *
   * @var string
   */
  protected $code;

  /**
   * The tax name.
   *
   * Sentence case name e.g. Standard.
   *
   * @var string
   */
  protected $name;

  /**
   * The tax type name.
   *
   * Use human name e.g. VAT.
   *
   * @var string
   */
  protected $type;

  /**
   * The tax rate.
   *
   * Use the decimal e.g. 0.1 for 10%.
   *
   * @var float
   */
  protected $rate;

  /**
   * The tax date.
   *
   * The date the tax is effective from.
   *
   * @var int
   */
  protected $date;

  /**
   * The tax rounding method.
   *
   * The rounding method to be used when
   * the tax is applied.
   *
   * @var int
   */
  protected $roundingMethod;

}
