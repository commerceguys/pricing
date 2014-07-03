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
   * @var array
   */
  protected $taxes;

  /**
   * @var \CommerceGuys\Zone\Zone
   */
  protected $zone;

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
  public function setTaxes($taxes) {
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
  public function getZone() {
    return $this->zone;
  }
}
