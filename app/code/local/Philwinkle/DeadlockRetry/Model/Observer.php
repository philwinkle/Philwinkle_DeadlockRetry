<?php

class Philwinkle_DeadlockRetry_Model_Observer
{
    public function setup()
    {        
        Mage::register('system/deadlock/enable',Mage::getStoreConfig('system/deadlock/enable'));
        Mage::register('system/deadlock/serializable',Mage::getStoreConfig('system/deadlock/serializable'));
        Mage::register('system/deadlock/retrycount',Mage::getStoreConfig('system/deadlock/retrycount'));
        Mage::register('system/deadlock/delaypower',Mage::getStoreConfig('system/deadlock/delaypower'));

        return $this;
    }

}