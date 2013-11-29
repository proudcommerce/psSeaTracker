<?php
/**
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * @copyright (c) Proud Sourcing GmbH | 2013
 * @link www.proudcommerce.com
 * @package psSeaTracker
 * @version 1.0.1
**/
class psseatracker_payment extends psseatracker_payment_parent
{
    /**
     * Executes parent::render(), checks if this connection secure
     * (if not - redirects to secure payment page), loads user object
     * (if user object loading was not successfull - redirects to start
     * page), loads user delivery/shipping information. According
     * to configuration in admin, user profile data loads delivery sets,
     * and possible payment methods. Returns name of template to render
     * payment::_sThisTemplate.
     *
     * @return  string  current template file name
     */
    public function render()
    {
        $mReturn = parent::render();
        if(oxSession::getVar("psSeaTracker_id") && oxSession::getVar("psSeaTracker_status"))
        {
            $this->_psSeaTrackerSave();
        }
        return $mReturn;
    }

    /**
     * Saves google click id to database (oxuser)
     */
    protected function _psSeaTrackerSave()
    {
        $oUser = $this->getUser();
        if(empty($oUser->oxuser__psseatracker_gclid->value) && $sClickId = oxSession::getVar("psSeaTracker_id"))
        {
            oxSession::deleteVar("psSeaTracker_id");
            oxSession::deleteVar("psSeaTracker_status");
            $sSQL = 'UPDATE oxuser SET PSSEATRACKER_GCLID = '.oxDb::getDb()->quote( $sClickId ).', PSSEATRACKER_DATE = NOW() WHERE oxid = ' . oxDb::getDb()->quote( $oUser->getId() );
            oxDb::getDb()->execute( $sSQL );
        }
    }
}
