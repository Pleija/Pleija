<?php
# Alert the user that this is not a valid entry point to MediaWiki if they try to access the special pages file directly.
if (!defined('MEDIAWIKI')) {
    echo <<<EOT
To install my extension, put the following line in LocalSettings.php:
require_once( "\$IP/extensions/MyExtension/MyExtension.php" );
EOT;
    exit(1);
}

$wgExtensionCredits['specialpage'][] = array(
    'path' => __FILE__,
    'name' => 'TryExtension',
    'author' => 'Andy',
    'url' => 'https://home.com',
    'descriptionmsg' => 'Trial Extension',
    'version' => '1.0.0',
);

$dir = dirname(__FILE__).'/';

$wgAutoloadClasses['TryExtension'] = $dir.'tryExtension.class.php'; # Location of the SpecialMyExtension class (Tell MediaWiki to load this file)

$wgHooks['BeforePageDisplay'][] = 'TryExtension::execute';

$wgResourceModules['ext.TryExtension'] = array(
    'scripts' => array('scripts/test.js'),
    'dependencies' => array('jquery.cookie'),
    'localBasePath' => dirname(__FILE__),
    'remoteExtPath' => 'TryExtension',
    'position' => 'top'
);