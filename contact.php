<?php

$mailToSend = 'kontakt@pksiazek.com';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  $headers  = 'MIME-Version: 1.0' . "\r\n";
      $headers .= 'Content-type: text/html; charset=UTF-8'. "\r\n";
      $headers .= 'From: '.$email."\r\n";
      $headers .= 'Reply-to: '.$email;
      $message  = "
          <html>
              <head>
                  <meta charset=\"utf-8\">
              </head>
              <style type='text/css'>
                  body {font-family:sans-serif; color:#222; padding:20px;}
                  div {margin-bottom:10px;}
                  .msg-title {margin-top:30px;}
              </style>
              <body>
                  <div>Imię i na: <strong>$name</strong></div>
                  <div>Email: <a href=\"mailto:$email\">$email</a></div>
                  <div class=\"msg-title\"> <strong>Wiadomość:</strong></div>
                  <div>$message</div>
              </body>
          </html>";

      if (mail($mailToSend, 'Wiadomość ze strony - ' . date("d-m-Y"), $message, $headers)) {
          $return['status'] = 'ok';
      } else {
          $return['status'] = 'error';
      }
  }
