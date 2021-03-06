<?php
/*
@_GET a => action, what action the app should make
@_GET s => status
*/
require_once '../bootstrap.php';

$action = isset($_GET['a']) ? $_GET['a'] : 'index';
$layout = true;

// Istancing the ghost class for API support
$ghost = new xKraty\xGhost();
$user = $ghost->getSession();
if ( !$user && $action != 'login' ) {
  header("location: index.php?a=login");
}

switch($action)
{
  case 'login':
    $content = VIEWS . 'login.php';
    if ( isset($_POST) ) {
      if ( $ghost->login($_POST) ) {
        header("location: index.php?a=stats&s=loggedin");
      }
    }
  break;
  case 'logout':
    $ghost->logout();
    header("location: index.php?s=loggedout");
  break;
  case 'stats':
    $id = isset($_GET['id']) ? $_GET['id'] : false;
    $network = isset($_GET['network']) ? $_GET['network'] : false;
    $stats = $ghost->userStats($id, $network);
    // d($stats, 1);
    $content = VIEWS . 'user/stats.php';
  break;
  case 'clan':
    $clanId = isset($_GET['clanId']) ? $_GET['clanId'] : false;
    if ( $clanId ) {
      $clan = $ghost->clanDetail($clanId);
      $content = VIEWS . 'clan/detail.php';
    } else {
      header("location: index.php?a=404");
    }
  break;
  case 'currentwar':
    $war = $ghost->currentWar();
    // $war = json_decode(file_get_contents('json/clanwar.json'));
    if ( $war ) {
      $content = VIEWS . 'wars/current.php';
    } else {
      header("location: index.php?a=warshistory&s=nowar");
    }
  break;
  case 'warshistory':
    $content = VIEWS . 'wars/history.php';
  break;
  case 'language':
    $_SESSION['xGhost']['locale'] = $_GET['to'];
    if ( isset($_SERVER['HTTP_REFERER']) ) {
      header("Location:".$_SERVER['HTTP_REFERER']);
      break;
    }
  case 'disclaimer':
    $content = VIEWS . 'misc/disclaimer.html';
  break;
  default:
    header("Location: index.php?a=stats&s=redir");
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

