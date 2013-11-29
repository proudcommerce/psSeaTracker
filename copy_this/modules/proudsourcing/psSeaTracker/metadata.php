<?php
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
        'de' => 'Speichert die Google Adwords Click-ID (gclid) beim Kunden (falls dieser eingeloggt ist).',
        'en' => 'Saves google adwords click id (gclid) to user (if logged in).',
    ),
    'thumbnail'    => '',
    'version'      => '1.0.1',
    'author'       => 'Proud Sourcing GmbH',
    'url'          => 'http://www.proudcommerce.com',
    'email'        => 'support@proudcommerce.com',
    'extend'       => array(
        'oxcmp_user'    =>      'proudsourcing/psSeaTracker/application/components/psseatracker_oxcmp_user',
        'payment'       =>      'proudsourcing/psSeaTracker/application/controllers/psseatracker_payment'
    ),
    'files' => array(
    ),
   'templates' => array(
    ),
   'blocks' => array(
    ),
   'settings' => array(
    )
);