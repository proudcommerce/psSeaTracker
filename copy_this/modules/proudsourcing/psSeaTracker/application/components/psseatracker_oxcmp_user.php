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
 * @version 1.0.0
**/
class psseatracker_oxcmp_user extends psseatracker_oxcmp_user_parent
{
    /**
     * Executes parent::render(), oxcmp_user::_loadSessionUser(), loads user delivery
     * info. Returns user object oxcmp_user::oUser.
     *
     * Session variables:
     * <b>dgr</b>
     *
     * @return  object  user object
     */
    public function render()
    {
        $mReturn = parent::render();
        // psSeaTracker
        // get and save click id
        if($sClickId = oxConfig::getParameter("gclid"))
        {
            oxSession::setVar("psSeaTracker", $sClickId);
        }
        return $mReturn;
    }
    
    /**
     * Special functionality which is performed after user logs in (or user is created without pass).
     * Performes additional checking if user is not BLOCKED (oxuser::InGroup("oxidblocked")) - if
     * yes - redirects to blocked user page ("cl=content&tpl=user_blocked.tpl"). If user status
     * is OK - sets user ID to session, automatically assigns him to dynamic
     * group (oxuser::addDynGroup(); if this directive is set (usually
     * by URL)). Stores cookie info if user confirmed in login screen.
     * Then loads delivery info and forces basket to recalculate
     * (oxsession::getBasket() + oBasket::blCalcNeeded = true). Returns
     * "payment" to redirect to payment screen. If problems occured loading
     * user - sets error code according problem, and returns "user" to redirect
     * to user info screen.
     *
     * @param oxuser $oUser user object
     *
     * @return string
     */
    protected function _afterLogin( $oUser )
    {
        $mReturn = parent::_afterLogin( $oUser );
        // psSeaTracker
        // add google adwords click id to oxuser (if not exists)
        if(empty($oUser->oxuser__psseatracker_gclid->value) && $sClickId = oxSession::getVar("psSeaTracker"))
        {
            oxSession::deleteVar("psSeaTracker");
            $sSQL = 'UPDATE oxuser SET PSSEATRACKER_GCLID = '.oxDb::getDb()->quote( $sClickId ).', PSSEATRACKER_DATE = NOW() WHERE oxid = ' . oxDb::getDb()->quote( $oUser->getId() );
            oxDb::getDb()->execute( $sSQL );
        }

        return $mReturn;
    }  
}
