<?php
/***************************************************\
 * PHP 4.1.0+ version of email script. For more
 * information on the mail() function for PHP, see
 * http://www.php.net/manual/en/function.mail.php
\***************************************************/


// First, set up some variables to serve you in
// getting an email.  This includes the email this is
// sent to (yours) and what the subject of this email
// should be.  It's a good idea to choose your own
// subject instead of allowing the user to.  This will
// help prevent spam filters from snatching this email
// out from under your nose when something unusual is put.

$sendTo = "senocular@hotmail.com";
$subject = "My Flash site reply";

// variables are sent to this PHP page through
// the POST method.  $_POST is a global associative array
// of variables passed through this method.  From that, we
// can get the values sent to this page from Flash and
// assign them to appropriate variables which can be used
// in the PHP mail() function.


// header information not including sendTo and Subject
// these all go in one variable.  First, include From:
$headers = "From: " . $_POST["name"];
$headers .= "<" . $_POST["email"] .">\r\n";
// next include a Reply-To:
$headers .= "Reply-To: " . $_POST["email"];

// now we can add the content of the message to a body variable
$message = $_POST["message"];


// once the variables have been defined, they can be included
// in the mail function call which will send you an email
mail($sendTo, $subject, $message, $headers);
?>