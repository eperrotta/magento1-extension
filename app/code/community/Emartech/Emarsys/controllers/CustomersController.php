<?php
/**
 * Copyright ©2018 Itegration Ltd., Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

/**
 * Class Emartech_Emarsys_CustomersController
 */
class Emartech_Emarsys_CustomersController
    extends Emartech_Emarsys_Controller_AbstractController
    implements Emartech_Emarsys_Controller_GetControllerInterface
{
    /**
     * @return Emartech_Emarsys_Model_Customers
     */
    public function getModel()
    {
        return Mage::getModel('emartech_emarsys/customers');
    }

    /**
     * @return array
     */
    public function handleGet()
    {
        return $this->getModel()->handleGet($this->_apiRequest);
    }
}
