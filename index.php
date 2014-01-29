<?php
require_once 'bootstrap.php';

$x = new xGhost();
if ( $user = $x->getSession() ) {
    echo "Hello ".$user->username;
    $x->logout();
    // $x->userStats();
} else {
  if ( $user = $x->login($credentials) ) {
    echo "Successfully logged in!";
  } else {
    echo "Invalid login";
  }
}
