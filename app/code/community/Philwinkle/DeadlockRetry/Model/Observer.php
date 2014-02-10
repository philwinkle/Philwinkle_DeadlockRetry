<?php

class Philwinkle_DeadlockRetry_Model_Observer
{
    public function setup()
    {
        Mage::register('system/deadlock/enable', Mage::getStoreConfigFlag('system/deadlock/enable'));

        if (TRUE === Mage::registry('system/deadlock/enable')) {

            Mage::register('system/deadlock/serializable', Mage::getStoreConfigFlag('system/deadlock/serializable'));
            Mage::register('system/deadlock/retrycount', (int)Mage::getStoreConfig('system/deadlock/retrycount'));
            Mage::register('system/deadlock/delaypower', (int)Mage::getStoreConfig('system/deadlock/delaypower'));

            if (TRUE === Mage::registry('system/deadlock/serializable')) {
                $resource = Mage::getSingleton('core/resource')->getConnection('core_read');
                $resource->query("SET SESSION TRANSACTION ISOLATION LEVEL SERIALIZABLE;");
            }
        }
    }
}