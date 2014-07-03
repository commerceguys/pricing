<?php

namespace CommerceGuys\Pricing;
use CommerceGuys\Zone\ZoneManager;
use Symfony\Component\Yaml\Yaml;

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

    foreach ($taxes as $taxDeffenition) {

    }
  }
}
