<?php
# Alert the user that this is not a valid entry point to MediaWiki if they try to access the special pages file directly.
if (!defined('MEDIAWIKI')) {
    echo <<<EOT
To install my extension, put the following line in LocalSettings.php:
require_once( "\$IP/extensions/Api/Api.php" );
EOT;
    exit(1);
}

$wgExtensionCredits['specialpage'][] = array(
    'path' => __FILE__,
    'name' => 'Api',
    'author' => 'Moshihui',
    'url' => 'https://figu.org.cn',
    'descriptionmsg' => 'Lumen Extension',
    'version' => '1.0.0',
);

$dir = dirname(__FILE__).'Api.php/';

$wgAutoloadClasses['Api'] = $dir.'Api.class.php'; # Location of the SpecialMyExtension class (Tell MediaWiki to load this file)

$wgHooks['BeforePageDisplay'][] = 'Api::execute';

$wgResourceModules['ext.Api'] = array(
    'scripts' => array('scripts/test.js'),
    'dependencies' => array('jquery.cookie'),
    'localBasePath' => dirname(__FILE__),
    'remoteExtPath' => 'Api',
    'position' => 'top'
);
