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
            oxSession::setVar("psSeaTracker_id", $sClickId);
        }
        return $mReturn;
    }

    /**
     * First test if all MUST FILL fields were filled, then performed
     * additional checking oxcmp_user::CheckValues(). If no errors
     * occured - trying to create new user (oxuser::CreateUser()),
     * logging him to shop (oxuser::Login() if user has entered password)
     * or assigning him to dynamic group (oxuser::addDynGroup()).
     * If oxuser::CreateUser() returns false - thsi means user is
     * allready created - we only logging him to shop (oxcmp_user::Login()).
     * If there is any error with missing data - function will return
     * false and set error code (oxcmp_user::iError). If user was
     * created successfully - will return "payment" to redirect to
     * payment interface.
     *
     * Template variables:
     * <b>usr_err</b>
     *
     * Session variables:
     * <b>usr_err</b>, <b>usr</b>
     *
     * @return  mixed    redirection string or true if successful, false otherwise
     */
    public function createUser()
    {
        oxSession::setVar("psSeaTracker_status", "register");
        return parent::createUser();
    }
}
