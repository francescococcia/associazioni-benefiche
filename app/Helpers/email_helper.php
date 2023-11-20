<?php

if (!function_exists('sendMail'))
{
  function sendMailOld($mailTo, $subject, $message) {
    $to = $mailTo;
    $subject = $subject;
    $message = $message;

    $email = \Config\Services::email();
    $email->setTo($to);
    $email->setFrom('manigenerosebari@gmail.com', 'Responsabile Piattaforma');

    $email->setSubject($subject);
    $email->setMessage($message);
    if ($email->send()) {
      echo 'Email successfully sent';
    } else {
      $data = $email->printDebugger(['headers']);
      print_r($data);
    }
  }

  function sendMail($mailTo, $subject, $viewName, $data = []) {
    $to = $mailTo;
    $subject = $subject;

    // Load the CodeIgniter view service
    $view = \Config\Services::renderer();

    // Render the email content using the specified view and data
    $htmlContent = $view->setData($data)->render($viewName);

    $email = \Config\Services::email();
    $email->setTo($to);
    $email->setFrom('manigenerosebari@gmail.com', 'Responsabile Piattaforma');

    $email->setSubject($subject);
    $email->setMessage($htmlContent, 'text/html'); // Set content as HTML

    if ($email->send()) {
        echo 'Email successfully sent';
    } else {
        $data = $email->printDebugger(['headers']);
        print_r($data);
    }
  }
}
