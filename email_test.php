<html>
<body>

<?php
if (isset($_REQUEST['email']))
//if "email" is filled out, send email
  {
  //send email
  $to = $_REQUEST['to'] ;
  $email = $_REQUEST['email'] ;
  $subject = $_REQUEST['subject'] ;
  $message = $_REQUEST['message'] ;
  mail($to, $subject,
  $message, "From:" . $email);
  echo "Thank you for using our mail form";
  }
else
//if "email" is not filled out, display the form
  {
  echo "<form method='post' action=''>
  To: <input name='to' type='text' value='rajutsn@gmail.com'><br>
  From Email: <input name='email' type='text' value='accounts@forexray.com'><br>
  Subject: <input name='subject' type='text' value='Test Email'><br>
  Message:<br>
  <textarea name='message' rows='15' cols='40'>Test Email
  </textarea><br>
  <input type='submit'>
  </form>";
  }
?>

</body>
</html>