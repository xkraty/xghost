<?php
require_once 'bootstrap.php';

$x = new xGhost();
if ( $user = $x->getSession() ) {
    d($user);
    echo "Hello ".$user->username;
    $x->logout();
    // $x->userStats();
} else {
  if ( $user = $x->login() ) {
    echo "Successfully logged in!";
  } else {
    echo "Invalid login";
  }
}
