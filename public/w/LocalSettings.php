<?php
# This file was automatically generated by the MediaWiki 1.39.3
# installer. If you make manual changes, please keep track in case you
# need to recreate them later.
#
# See docs/Configuration.md for all configurable settings
# and their default values, but don't forget to make changes in _this_
# file, not there.
#
# Further documentation for configuration settings may be found at:
# https://www.mediawiki.org/wiki/Manual:Configuration_settings

# Protect against web entry
if (!defined('MEDIAWIKI')) {
    exit;
}

error_reporting(error_reporting() & ~E_NOTICE & ~E_DEPRECATED & ~E_USER_DEPRECATED);

empty($IP) && $IP = __DIR__;

## Uncomment this to disable output compression
# $wgDisableOutputCompression = true;

$wgSitename = " Pleija ";
$wgMetaNamespace = "Wiki";

## The URL base path to the directory containing the wiki;
## defaults for all runtime URL paths are based off of this.
## For more information on customizing the URLs
## (like /w/index.php/Page_title to /wiki/Page_title) please see:
## https://www.mediawiki.org/wiki/Manual:Short_URL
$root = !empty($_SERVER) && @$_SERVER['SERVER_NAME'] == "localhost" ? "/pleija" : "";
$wgScriptPath = "$root/w";

## The protocol and server name to use in fully-qualified URLs
$wgServer = (!wfIsCLI() && $_SERVER['SERVER_NAME'] != "localhost" ? "https" : "http") . "://" . (wfIsCLI() ? "localhost" : $_SERVER['SERVER_NAME']);

## The URL path to static resources (images, scripts, etc.)
$wgResourceBasePath = $wgScriptPath;

## The URL paths to the logo.  Make sure you change this from the default,
## or else you'll overwrite your logo when you upgrade!
$wgLogos = [
// 	'1x' => "$wgResourceBasePath/resources/assets/change-your-logo.svg",
// 	'icon' => "$wgResourceBasePath/resources/assets/change-your-logo.svg",
    //'1x' => "$wgResourceBasePath/resources/assets/logo.jpg",
    //'icon' => "$wgResourceBasePath/resources/assets/logo.jpg",
    '1x' => "$wgResourceBasePath/resources/assets/Love3.png",
    'icon' => "$wgResourceBasePath/resources/assets/Love3.png",
];

## UPO means: this is also a user preference option

$wgEnableEmail = false;
$wgEnableUserEmail = true; # UPO

$wgEmergencyContact = "";
$wgPasswordSender = "";

$wgEnotifUserTalk = false; # UPO
$wgEnotifWatchlist = false; # UPO
$wgEmailAuthentication = true;

## Database settings
$wgDBtype = "sqlite";
$wgDBserver = "";
$wgDBname = "wiki";
$wgDBuser = "";
$wgDBpassword = "";

# SQLite-specific settings
$wgSQLiteDataDir = __DIR__ . "/data";
$wgObjectCaches[CACHE_DB] = [
    'class' => SqlBagOStuff::class,
    'loggroup' => 'SQLBagOStuff',
    'server' => [
        'type' => 'sqlite',
        'dbname' => 'wikicache',
        'tablePrefix' => '',
        'variables' => ['synchronous' => 'NORMAL'],
        'dbDirectory' => $wgSQLiteDataDir,
        'trxMode' => 'IMMEDIATE',
        'flags' => 0
    ]
];
$wgObjectCaches['db-replicated'] = [
    'factory' => 'Wikimedia\ObjectFactory\ObjectFactory::getObjectFromSpec',
    'args' => [['factory' => 'ObjectCache::getInstance', 'args' => [CACHE_DB]]]
];
$wgLocalisationCacheConf['storeServer'] = [
    'type' => 'sqlite',
    'dbname' => "{$wgDBname}_l10n_cache",
    'tablePrefix' => '',
    'variables' => ['synchronous' => 'NORMAL'],
    'dbDirectory' => $wgSQLiteDataDir,
    'trxMode' => 'IMMEDIATE',
    'flags' => 0
];
$wgJobTypeConf['default'] = [
    'class' => 'JobQueueDB',
    'claimTTL' => 3600,
    'server' => [
        'type' => 'sqlite',
        'dbname' => "{$wgDBname}_jobqueue",
        'tablePrefix' => '',
        'variables' => ['synchronous' => 'NORMAL'],
        'dbDirectory' => $wgSQLiteDataDir,
        'trxMode' => 'IMMEDIATE',
        'flags' => 0
    ]
];
$wgResourceLoaderUseObjectCacheForDeps = true;

# Shared database table
# This has no effect unless $wgSharedDB is also set.
$wgSharedTables[] = "actor";

## Shared memory settings
$wgMainCacheType = CACHE_DB;

//CACHE_NONE;
$wgMemCachedServers = ["127.0.0.1:11211"];

## To enable image uploads, make sure the 'images' directory
## is writable, then set this to true:
$wgEnableUploads = true;
#$wgUseImageMagick = true;
#$wgImageMagickConvertCommand = "/usr/bin/convert";

# InstantCommons allows wiki to use images from https://commons.wikimedia.org
$wgUseInstantCommons = false;

# Periodically send a pingback to https://www.mediawiki.org/ with basic data
# about this MediaWiki instance. The Wikimedia Foundation shares this data
# with MediaWiki developers to help guide future development efforts.
$wgPingback = true;

# Site language code, should be one of the list in ./includes/languages/data/Names.php
$wgLanguageCode = "en";
//"zh";

# Time zone
$wgLocaltimezone = "PRC";

## Set $wgCacheDirectory to a writable directory on the web server
## to make your wiki go slightly faster. The directory should not
## be publicly accessible from the web.
#$wgCacheDirectory = "$IP/cache";

$wgSecretKey = "44ccbd5378079e5634367cea3a6bea0b1a1a4d2a04fcc86c576b448e77906364";

# Changing this will log out all existing sessions.
$wgAuthenticationTokenVersion = "1";

# Site upgrade key. Must be set to a string (default provided) to turn on the
# web installer while LocalSettings.php is in place
$wgUpgradeKey = "ff187c6018d646cb";

## For attaching licensing metadata to pages, and displaying an
## appropriate copyright notice / icon. GNU Free Documentation
## License and Creative Commons licenses are supported so far.
$wgRightsPage = ""; # Set to the title of a wiki page that describes your license/copyright
$wgRightsUrl = "";
$wgRightsText = "";
$wgRightsIcon = "";

# Path to the GNU diff3 utility. Used for conflict resolution.
$wgDiff3 = "/usr/bin/diff3";

# The following permissions were set based on your choice in the installer
$wgGroupPermissions['*']['createaccount'] = false;
$wgGroupPermissions['*']['edit'] = false;

## Default skin: you can change the default skin. Use the internal symbolic
## names, e.g. 'vector' or 'monobook':
$wgDefaultSkin = "timeless";

# Enabled skins.
# The following skins were automatically enabled:
wfLoadSkin('MinervaNeue');
wfLoadSkin('MonoBook');
wfLoadSkin('Timeless');
wfLoadSkin('Vector');

# Enabled extensions. Most of the extensions are enabled by adding
# wfLoadExtension( 'ExtensionName' );
# to LocalSettings.php. Check specific extension documentation for more details.
# The following extensions were automatically enabled:
wfLoadExtension('AbuseFilter');
wfLoadExtension('CategoryTree');
wfLoadExtension('Cite');
wfLoadExtension('CiteThisPage');
wfLoadExtension('CodeEditor');
wfLoadExtension('ConfirmEdit');
wfLoadExtension('Gadgets');
wfLoadExtension('ImageMap');
wfLoadExtension('InputBox');
wfLoadExtension('Interwiki');
wfLoadExtension('Math');
wfLoadExtension('MultimediaViewer');
wfLoadExtension('Nuke');
wfLoadExtension('OATHAuth');
wfLoadExtension('PageImages');
wfLoadExtension('ParserFunctions');
wfLoadExtension('Poem');
wfLoadExtension('Renameuser');
wfLoadExtension('ReplaceText');
wfLoadExtension('Scribunto');
wfLoadExtension('SecureLinkFixer');
wfLoadExtension('SpamBlacklist');
wfLoadExtension('SyntaxHighlight_GeSHi');
wfLoadExtension('TemplateData');
wfLoadExtension('TextExtracts');
wfLoadExtension('TitleBlacklist');
wfLoadExtension('WikiEditor');

# End of automatically generated settings.
# Add more configuration options below.

$wgScriptPath = "$root/w";
$to = "Pleija";
$wgArticlePath = "$root/{$to}/$1";
$wgUsePathInfo = true;

$actions = array('edit', 'watch', 'unwatch', 'delete', 'revert', 'rollback',
    'protect', 'unprotect', 'markpatrolled', 'render', 'submit', 'history', 'purge', 'info');

foreach ($actions as $action) {
    $wgActionPaths[$action] = "$root/{$to}/$1/$action";
}
$wgActionPaths['view'] = "$root/{$to}/$1";
$wgArticlePath = $wgActionPaths['view'];

$wgFavicon = "$root/favicon.ico";

//## Shared memory settings
//$wgMainCacheType = CACHE_MEMCACHED;
//$wgMemCachedServers = ["127.0.0.1:11211"];
//
//#$wgMainCacheType = CACHE_MEMCACHED;
//$wgParserCacheType = CACHE_MEMCACHED; # optional
//$wgMessageCacheType = CACHE_MEMCACHED; # optional
//$wgSessionCacheType = CACHE_MEMCACHED; # optional
$wgSessionsInMemcached = true; # optional
$wgSessionsInObjectCache = true; # optional
//#$wgMemCachedServers = array("unix:///var/run/memcached/memcached.sock:0");

$wgParserCacheType = CACHE_DB; # optional
$wgMessageCacheType = CACHE_DB; # optional
$wgSessionCacheType = CACHE_DB; # optional

$wgUseGzip = true;
$wgDisableAnonTalk = true;
$wgCheckFileExtensions = true;
$wgRemoteUploads = true;
$wgUserHtml = true;
$wgUseImageResize = true;

// url不强制首字母大写
$wgCapitalLinks = true;
// 开启该项功能后，保存页面时，zlib工具将会压缩old revision表中的内容。
$wgCompressRevisions = true;

// 匿名用户登录时，在页面顶端的用户信息栏内输出其IP地址。
$wgShowIPinHeader = true;
$wgUseCategoryMagic = true;// 是否应当启用分类的伪名称空间？
$wgCategoryMagicGallery = true;// 在分类页面内，以缩略图的方式显示属于该分类的图像，而不是以条目的形式将其罗列出来。

$wgAllowUserCss = true;
$wgAllowUserJs = true;

$wgHashedUploadDirectory = true;

//$wgCacheEpoch = max( $wgCacheEpoch, gmdate( 'YmdHis', @filemtime( __FILE__ ) ) );
//filemtime(__FILE__);
$wgInvalidateCacheOnLocalSettingsChange = true;

$wgAllowDisplayTitle = true;
$wgRestrictDisplayTitle = false;

$wgDebugDumpSql = true;
$wgShowSQLErrors = true;
$wgShowDBErrorBacktrace = true;

$wgShowExceptionDetails = true;

wfLoadExtension('Purge');
$wgGroupPermissions['*']['purge'] = true;

$wgCompressRevisions = false;



