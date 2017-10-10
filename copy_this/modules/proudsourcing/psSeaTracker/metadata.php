<?php
/**
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @copyright (c) Proud Sourcing GmbH | 2017
 * @link www.proudcommerce.com
 * @package psSeaTracker
 * @version 2.0.0
 **/

/**
 * Metadata version
 */
$sMetadataVersion = '1.1';
 
/**
 * Module information
 */
$aModule = array(
    'id'           => 'psSeaTracker',
    'title'        => 'psSeaTracker',
    'description'  => array(
        'de' => 'Speichert die Google Adwords Click-ID (oder einen anderen beliebigen Parameter) beim Kunden.',
        'en' => 'Saves google adwords click id (or any another tracking id) to user.',
    ),
    'thumbnail'    => 'logo-ps.jpg',
    'version'      => '2.0.0',
    'author'       => 'Proud Sourcing GmbH',
    'url'          => 'http://www.proudcommerce.com',
    'email'        => 'support@proudcommerce.com',
    'extend'       => array(
        'oxcmp_user'            => 'proudsourcing/psSeaTracker/application/components/psseatracker_oxcmp_user',
        'payment'               => 'proudsourcing/psSeaTracker/application/controllers/psseatracker_payment'
    ),
    'files' => array(
        'psseatracker_module'   => 'proudsourcing/psSeaTracker/core/psseatracker_module.php'
    ),
   'templates' => array(
    ),
   'blocks' => array(
       array('template' => 'user_main.tpl', 'block'=>'admin_user_main_form', 'file'=>'views/blocks/admin_user_main_form.tpl'),
    ),
   'settings' => array(
       array('group' => 'psseatracker_config', 'name' => 'psseatracker_config_param', 'type' => 'str', 'value' => 'gclid', 'position' => 0),
       array('group' => 'psseatracker_config', 'name' => 'psseatracker_config_registration', 'type' => 'bool', 'value' => true),
    ),
    'events'      => array(
        'onActivate'   => 'psseatracker_module::onActivate',
        'onDeactivate' => 'psseatracker_module::onDeactivate',
    ),
);