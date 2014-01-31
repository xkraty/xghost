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
    header("location: index.php?s=logggedout");
  break;
  default:
    if ( $user = $ghost->getSession() ) {
      $stats = $ghost->userStats();
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

