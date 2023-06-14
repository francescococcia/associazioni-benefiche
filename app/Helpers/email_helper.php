<?php

if (!function_exists('sendMail'))
{
  function sendMail($mailTo, $subject, $message) {
    $to = $mailTo;
    $subject = $subject;
    $message = $message;

    $email = \Config\Services::email();
    $email->setTo($to);
    $email->setFrom('associazionibenefiche@gmail.com', 'Responsabile Piattaforma');

    $email->setSubject($subject);
    $email->setMessage($message);
    if ($email->send()) {
      echo 'Email successfully sent';
    } else {
      $data = $email->printDebugger(['headers']);
      print_r($data);
    }
  }
}
