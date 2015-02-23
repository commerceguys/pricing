<?php

namespace CommerceGuys\Pricing;

/**
 * This exception is thrown when attempting to perform math using two different currencies.
 * For example, adding a price in USD to another in EUR.
 */
class CurrencyMismatchException extends \RuntimeException implements Exception
{

}
