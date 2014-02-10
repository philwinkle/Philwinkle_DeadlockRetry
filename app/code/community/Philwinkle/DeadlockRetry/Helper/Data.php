<?php

/**
 * Data helper
 */
class Philwinkle_DeadlockRetry_Helper_Data
{
    /**
     * @return bool
     */
    public static function isDisabled()
    {
        $enabled = Mage::registry('system/deadlock/enable');
        return empty($enabled);
    }

    /**
     * @param Exception $e
     * @param int       $tries
     *
     * @return bool
     */
    public static function isRetryAllowed(Exception $e, $tries)
    {
        $maxTries = (int)Mage::registry('system/deadlock/retrycount');
        return $tries < $maxTries && strpos($e->getMessage(), 'SQLSTATE[40001]: Serialization failure: 1213') !== FALSE;
    }

    /**
     * snoozes the number of tries raised to the second power. e.g. 5th try, 25 second delay
     *
     * Exponential backoff strategy
     * @see         http://en.wikipedia.org/wiki/Exponential_backoff#An_example_of_an_exponential_backoff_algorithm
     *
     * @param  int $tries number of tries
     *
     */
    public static function pressSnoozeButton($tries)
    {
        $power  = (int)Mage::getStoreConfig('system/deadlock/delaypower');
        $snooze = (int)pow($power, $tries);
        Mage::log('system/deadlock/snoozing: ' . $snooze);
        sleep($snooze);
    }
}
