<?php

namespace App;

use DatabaseUpdater;
use MediaWiki\Permissions\PermissionManager;
use OutputPage;
use Parser;
use PPFrame;
use Skin;
use SkinTemplate;

class Hooks implements

    \MediaWiki\Hook\BeforePageDisplayHook,
//	\MediaWiki\Hook\ParserFirstCallInitHook,
    \MediaWiki\Hook\ParserGetVariableValueSwitchHook,
    \MediaWiki\Hook\SkinTemplateNavigationHook
//    \MediaWiki\Hook\GetMagicVariableIDsHook,
//    \MediaWiki\Hook\MagicWordwgVariableIDsHook,
//    \MediaWiki\Installer\Hook\LoadExtensionSchemaUpdatesHook

{
    public static $app;

    /** @var PermissionManager */
    private $permissionManager;

    /**
     * @param PermissionManager $permissionManager example injected service
     */
    public function __construct(PermissionManager $permissionManager)
    {
        $this->permissionManager = $permissionManager;
    }

    public static function Init()
    {
        //todo
        global $app;
        if ($app == null) {
            $app = require __DIR__."/../bootstrap/app.php";
        }
        self::$app = $app;
        global $wgActionPaths, $wgArticlePath;
        $wgActionPaths["md"] = "$wgArticlePath/md";
    }

    /**
     * @see https://www.mediawiki.org/wiki/Manual:Hooks/GetMagicVariableIDs
     * @param string[] &$variableIDs
     */
    public function onGetMagicVariableIDs(&$variableIDs)
    {
        // Add the following to a wiki page to see how it works:
        // {{MYWORD}}
        // $variableIDs[] = 'index';
    }

    /**
     * @param \Parser $parser
     * @return void true
     * @throws \MWException
     */
    public static function onParserFirstCallInit($parser)
    {
        //todo: 必须有, 否则要放到l18n里面
        // https://www.mediawiki.org/wiki/Manual:Parser_functions/vi
        \MediaWiki\MediaWikiServices::getInstance()->getContentLanguage()->mMagicExtensions['index'] = [0, 'index'];
        $parser->setFunctionHook('index', [HomePage::class, 'Render']);
        // return true;
    }


    public static function onBeforeInitialize(\Title &$title, $unused, \OutputPage $output, \User $user, \WebRequest $request, \MediaWiki $mediaWiki)
    {

    }

    public static function onPageContentLanguage(\Title $title, &$pageLang, $userLang)
    {
        //$pageLang = \Language::factory('zh-cn');
    }

    public function onLoadExtensionSchemaUpdates($updater)
    {
        // TODO: Implement onLoadExtensionSchemaUpdates() method.
    }

    public function onMagicWordwgVariableIDs(&$variableIDs)
    {
        // TODO: Implement onMagicWordwgVariableIDs() method.
    }

    public function onBeforePageDisplay($out, $skin): void
    {
        // TODO: Implement onBeforePageDisplay() method.
    }

    public function onParserGetVariableValueSwitch($parser, &$variableCache, $magicWordId, &$ret, $frame)
    {
        // TODO: Implement onParserGetVariableValueSwitch() method.
    }

    public function onSkinTemplateNavigation($sktemplate, &$links): void
    {
        // TODO: Implement onSkinTemplateNavigation() method.
    }
}
