<?php

namespace CommerceGuys\Pricing;

class TaxManager implements TaxManagerInterface {

  /**
   * @var \CommerceGuys\Pricing\TaxZone
   */
  protected $establishment;

  /**
   * @var array
   */
  protected $identifications;

  /**
   * @var \CommerceGuys\Zone\ZoneManager
   */
  protected $zoneManager;

  /**
   * @var array
   */
  protected $taxes;

  public function __construct() {
    $this->zoneManager = new ZoneManager;
  }

  /**
   * {@inheritdoc}
   */
  public function setEstablishment($taxZone) {
    $this->establishment = $taxZone;

    $this->zoneManager->addZone($taxZone->getZone());

    $this->addTaxes($taxZone->getTaxes());
  }

  /**
   * {@inheritdoc}
   */
  public function addIdentification($taxZone) {
    $this->identification[$taxZone->getCode()] = $taxZone;

    $this->zoneManager->addZone($taxZone->getZone());
  }

  /**
   * {@inheritdoc}
   */
  public function getPlace($address) {
    $zone = $this->zoneManager->getZone($address);

    return $zone;
  }
}
