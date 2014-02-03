<?php
/* ********************************************************************************************
               ..oo800ooo..                    ..ooo008oo..
           .ox88888888'                          '888888888o.
        .o888888888"             .   .              "888888888o.
      .o8888888888~             /|   |\              ~8888888888o.
    .{88888888888.              8\___/8               .88888888888}.
   o8888888888888              .8888888.               8888888888888o
  888888888888888              888888888               888888888888888
 o888888888888888.             o8888888o              .888888888888888o
 88888888888888888.           o{8888888}o            .88888888888888888
^888888888888888888.         J88888888888L          .888888888888888888^
!88888888888888888888oo..oo88888888888888888oo..oo888888888888888888888!
{8888888888888888888888888888888888888888888888888888888888888888888888}
{88888 It's not who I am underneath but what I do that defines me 88888}
'8888888888888888888888888888888888888888888888888888888888888888888888'
 o88888888888888888888888888888888888888888888888888888888888888888888o
  88888888888888;'~`^Y8887^''o88888888888o''^Y8887^`~';888888888888888
  '88888888888'       `8'    `'888888888'     `8'       '888888888888'
   !8888888887         !       '8888888'       !         V888888888!
    ^o888888!                   '88888'                   !888888o^
      ^88888"                    88888                    "88888^
        'o888`                   ^888'                   '888o'
          ~888.                   888.                  .888~
            '8;.                  `8'                  .;8'
               '.                  !                  .`
 *********************************************************************************************/

session_start();
// Setup global paths
define('BASEPATH', dirname(__FILE__) . DIRECTORY_SEPARATOR);
define('CONFIGDIR', BASEPATH . 'config' . DIRECTORY_SEPARATOR);
define('LANGUAGES', BASEPATH . 'i18n' . DIRECTORY_SEPARATOR);
define('LIBRARIES', BASEPATH . 'lib' . DIRECTORY_SEPARATOR);
define('VENDOR', BASEPATH . 'vendor' . DIRECTORY_SEPARATOR);
define('VIEWS', BASEPATH . 'views' . DIRECTORY_SEPARATOR);

// Patches path
define('PATCHES', 'https://widget.live-ca.callofduty.com/img/patches/');
define('CLANEMBLEM', 'https://api.live-ca.ghosts.callofduty.com/emblems/clanEmblem?size=45&title=ghosts&imgtype=png&background=0&clan_id=');
define('CLANEMBLEM_SMALL', 'https://api.live-ca.ghosts.callofduty.com/emblems/clanEmblem?size=30&title=ghosts&imgtype=png&background=0&clan_id=');

// Date format
define('DATE_FORMAT', 'd/m/Y'); // set it to m/d/Y for US format

// Set timezone check http://php.net/manual/en/timezones.php for supported timezone and
date_default_timezone_set('Europe/Rome'); // edit for different timezone

// Set the include path for libs
set_include_path(
  LIBRARIES
  . PATH_SEPARATOR . VENDOR
);

require_once 'functions.php';
require_once 'vendor/autoload.php';

// Translations
$language = 'it_IT';
$translate = require_once LANGUAGES.$language.'.php';

// Preload xGhost class
require_once 'xGhost.php';
?>
