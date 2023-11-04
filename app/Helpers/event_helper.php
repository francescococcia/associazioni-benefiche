<?php
  function retrieveUserFromFeedback($userId)
  {
    $db = \Config\Database::connect();
    $user = $db->table('users')
        ->select('*')
        ->where('id', $userId)
        ->get()
        ->getRow();

    return $user;
  }