<?php

class Philwinkle_DeadlockRetry_Model_Observer
{
    /**
     * @see also http://magento.stackexchange.com/questions/260/price-re-index-causes-db-deadlocks-during-checkout
     */
    public function setup()
    {
        Mage::register('system/deadlock/enable', Mage::getStoreConfigFlag('system/deadlock/enable'));

        if (TRUE === Mage::registry('system/deadlock/enable')) {

            Mage::register('system/deadlock/retrycount', (int)Mage::getStoreConfig('system/deadlock/retrycount'));
            Mage::register('system/deadlock/delaypower', (int)Mage::getStoreConfig('system/deadlock/delaypower'));

            if (TRUE === Mage::getStoreConfigFlag('system/deadlock/serializable')) {
                $resource = Mage::getSingleton('core/resource')->getConnection(Mage_Core_Model_Resource::DEFAULT_WRITE_RESOURCE);
                $resource->query('SET SESSION TRANSACTION ISOLATION LEVEL SERIALIZABLE;');
            }
        }
    }
}