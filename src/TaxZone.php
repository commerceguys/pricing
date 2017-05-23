<?php

namespace CommerceGuys\Pricing;
use CommerceGuys\Zone\Zone;

class TaxZone implements TaxZoneInterface {

  /**
   * @var string
   */
  protected $code;

  /**
   * @var string
   */
  protected $name;

  /**
   * @var string
   */
  protected $type;

  /**
   * @var \CommerceGuys\Price\TaxManager
   */
  protected $taxManager;

  /**
   * @var \CommerceGuys\Zone\Zone
   */
  protected $zone;

  public function __construct() {
    $this->taxManager = new TaxManager();
  }

  /**
   * {@inheritdoc}
   */
  public function setCode($code) {
    $this->code = $code;
  }

  /**
   * {@inheritdoc}
   */
  public function setName($name) {
    $this->name = $name;
  }

  /**
   * {@inheritdoc}
   */
  public function setType($type) {
    $this->type = $type;
  }

  /**
   * {@inheritdoc}
   */
  public function addTax($tax) {
    $this->taxes = $taxes;
  }

  /**
   * {@inheritdoc}
   */
  public function setZone($zone) {
    $this->zone = $zone;
  }

  /**
   * {@inheritdoc}
   */
  public function getCode() {
    return $this->code;
  }

  /**
   * {@inheritdoc}
   */
  public function getName() {
    return $this->name;
  }

  /**
   * {@inheritdoc}
   */
  public function getType() {
    return $this->type;
  }

  /**
   * {@inheritdoc}
   */
  public function getTaxes() {
    return $this->taxes;
  }

  /**
   * {@inheritdoc}
   */
  public function getTax($taxRate, $date) {
    if (empty($date)) {
      $date = time();
    }
    return $this->tax;
  }

  /**
   * {@inheritdoc}
   */
  public function getZone() {
    return $this->zone;
  }
}
