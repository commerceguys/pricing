<?php

namespace CommerceGuys\Pricing;

/**
 * This exception is thrown when an unknown tax zone code is passed to the
 * TaxZoneManager.
 */
class UnknownTaxZoneException extends \InvalidArgumentException implements Exception {}
