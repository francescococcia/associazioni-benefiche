<?php
  function retrieveEmailUserFromFeedback($userId)
  {
    $db = \Config\Database::connect();
    $user = $db->table('users')
        ->select('email')
        ->where('id', $userId)
        ->get()
        ->getRow();

    return $user;
  }