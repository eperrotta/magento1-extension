<?php
/**
 * Copyright ©2018 Itegration Ltd., Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

/**
 * Class Emartech_Emarsys_EventsController
 */
class Emartech_Emarsys_EventsController extends Emartech_Emarsys_Controller_AbstractController implements Emartech_Emarsys_Controller_PostControllerInterface
{
    /**
     * @return array
     */
    public function handlePost()
    {
        /* @var Emartech_Emarsys_Model_Events $model */
        $model = Mage::getModel('emartech_emarsys/events');
        return $model->handlePost($this->_apiRequest);
    }
}
