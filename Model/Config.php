<?php

/**
 * Copyright ©2018 Itegration Ltd., Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

/**
 * Class Emartech_Emarsys_Model_Config
 */
class Emartech_Emarsys_Model_Config extends Emartech_Emarsys_Model_Abstract_Base implements Emartech_Emarsys_Model_Abstract_PostInterface
{

    /**
     * @param Emartech_Emarsys_Controller_Request_Http $request
     *
     * @return array
     */
    public function handlePost($request)
    {
        $websiteId = $request->getParam('website_id', 0);
        $config = $request->getParam('config', []);

        try {
            foreach ($config as $key => $value) {
                $this->setConfigValue($key, $value, $websiteId);
            }
            $this->cleanScope();
            $status = 'ok';

        } catch (Exception $e) {
            Mage::logException($e);
            $status = 'error';
        }

        return ['status' => $status];
    }

    /**
     * @param string $xmlPostPath
     * @param string $value
     * @param int    $scopeId
     * @param string $scope
     *
     * @return void
     */
    public function setConfigValue($xmlPostPath, $value, $scopeId, $scope = Emartech_Emarsys_Helper_Config::SCOPE_TYPE_DEFAULT)
    {
        $xmlPath = Emartech_Emarsys_Helper_Config::XML_PATH_STORE_CONFIG_PRE_TAG . trim($xmlPostPath, '/');

        if (is_array($value)) {
            $value = json_encode($value);
        }

        Mage::app()->getConfig()->saveConfig($xmlPath, $value, $scope, $scopeId);
    }

    /**
     * @return void
     */
    public function cleanScope()
    {
        Mage::app()->getCacheInstance()->cleanType('config');
        Mage::dispatchEvent('adminhtml_cache_refresh_type', ['type' => 'config']);
        Mage::app()->getConfig()->reinit();
    }
}