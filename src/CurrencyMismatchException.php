<?php

namespace CommerceGuys\Pricing;

/**
 * This exception is thrown when attempting to manipulate two Price instances
 * with different currencies.
 */
class CurrencyMismatchException extends \InvalidArgumentException implements Exception
{
}
