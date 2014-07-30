<?php

namespace CommerceGuys\Pricing;

/**
 * This exception is thrown when an unknown currency code is passed to the
 * CurrencyManager.
 */
class UnknownCurrencyException extends \InvalidArgumentException implements Exception
{
}
