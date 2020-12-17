<?php
require('Mailer.php');
$templeat_fiile = "themp.php";
$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
 
function generate_string($input, $strength = 16) {
    $input_length = strlen($input);
    $random_string = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }
 
    return $random_string;
}
 

  $code = generate_string($permitted_chars, 5);
  echo $code;
  $mail = 'thanathipch9@gmail.com';
  $text = $code;

  if(file_exists($templeat_fiile)){
      $message = file_get_contents($templeat_fiile);
  }else{
      die("No le");
  }
  
  $name = 'NOT';
  $subject = "Passcode";

  Mailer($mail,$name,$subject,$message);
 

?>