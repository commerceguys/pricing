<?php

namespace CommerceGuys\Pricing;

/**
 * This exception is thrown when an unknown locale is passed to the
 * CurrencyManager.
 */
class UnknownLocaleException extends \InvalidArgumentException implements Exception
{
}
