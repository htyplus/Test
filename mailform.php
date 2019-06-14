<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Mail Form</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body>
  <?php
  function spamcheck($field)
  {
      //fillter_var() sanitilizes email
      //filter address
      $field=filter_var($field,FILTER_SANITIZE_EMAIL);

      //filter_var() validates the email
      //validate the address 
      if(filter_var($field,FILTER_VALIDATE_EMAIL))
      {
          return True;
      }
      else
      {
         return False;
      }
  }
  if(isset($_REQUEST['email']))
  {
      //email is fill out,check invalid
      $mailcheck=spamcheck($_REQUEST['email']);
      if($mailcheck==false)
      {
          echo "Invalid input";
      }
  
  else
  // sent email
  {
      //sent email
      $mail=$_REQUEST['email'];
      $subject=$_REQUEST['subject'];
      $message=$_REQUEST['message'];
      mail("goodbye1500h@gmail.com","Subject:$subject",$message,"Form:$email");
      echo "Thank you for our mail form";
  }
}
  else
  //email is not fill,display the form
  {
      echo "<form method='post' action='mailform.php'>
      Email:<input name='email' type='text' /><br/>
      Subject to :<input name='subject' type='text' /><br/>
      Message:<br/>
      <textarea name='message' rows='15' cols='40'></textarea><br/>
      <input type='submit'/>

      </form>";
  }

  ?>
    
</body>
</html>