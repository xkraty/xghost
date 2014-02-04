<?php
/*
@_GET a => action, what action the app should make
@_GET s => status
*/
require_once '../bootstrap.php';

$action = isset($_GET['a']) ? $_GET['a'] : 'index';
$layout = true;

// Istancing the ghost class for API support
$ghost = new xGhost();
$user = $ghost->getSession();

switch($action)
{
  case 'login':
    $content = VIEWS . 'login.php';
    if ( isset($_POST) ) {
      if ( $user = $ghost->login($_POST) ) {
        header("location: index.php?s=loggedin");
      }
    }
  break;
  case 'logout':
    $ghost->logout();
    header("location: index.php?s=loggedout");
  break;
  case 'currentwar':
    $war = $ghost->currentWar();
    $war = json_decode(file_get_contents('clanwar.json'));
    if ( $war ) {
      $content = VIEWS . 'wars/current.php';
    } else {
      // redirect to global war
      die('no war, redirected needed here');
    }
  break;
  default:
    if ( $user = $ghost->getSession() ) {
      // $stats = $ghost->userStats();
      $stats = json_decode(file_get_contents('stats.json'));
      $stats = $stats->user;
      // d($stats);
      $content = VIEWS . 'user/stats.php';
    } else {
      $content = VIEWS . 'login.php';
    }

}

// Include header
require_once VIEWS . 'layout/header.html';

// Include content
if ( file_exists($content) ) {
  require_once $content;
} else {
  echo "Action not found";
}

// Include footer
require_once VIEWS . 'layout/footer.html';

