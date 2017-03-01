<!DOCTYPE html>
<html>
<head>
    
    <title> Elvis - Send Email </title>
<link rel="stylesheet" type="text/css" href="style.css" />
    
        
    </head>

    <body>
    <img src="blankface.jpg" width="161" height="360" alt=""
        style="float:right" />
    <img name="elvislogo" src="elvislogo.gif" width="229"
         height="32" border="0" alt="Elvis" />
    <p> <strong>Private:</strong>For Elvis lovers only.<br />
        Write and send an email</p>
        <?php 
require_once('connectvars.php');
    $dbc= mysqli_connect(DB_HOST, DB_USER,DB_PASSWORD,DB_NAME);
        
        if(isset($_POST['submit'])) {
            $subject = $_POST['subject'];
            $body = $_POST['body'];
            $from = 'maguerite.george95@stclairconnect.ca';
            $output_form = false;
            
        if(empty($subject) && empty($body)) {
            echo 'You forgot to add a subject and message.
            <br />';
            $output_form = true; 
        } 
            if(empty($subject)) {
                echo 'You forgot to add an email subject.<br/>';
                $output_form = true;
            }
        if(empty($body)){
            echo 'You forgot to add a message. <br/>';
            $output_form = true;
        }
        } else {
            $output_form = true;
        }
    if(!(empty($subject)) && !(empty($body))) {
        $query = "SELECT * from email_list";
        $result = mysqli_query($dbc, $query) or die('Error querying the database'); 
        
        while ($row = mysqli_fetch_array($result)) {
            $to = $row['email'];
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            $msg = "Dear $first_name $last_name,\n$body";
            
            
        echo '<h2> Email has been sent to:  ' . $to . '</h2><br/>';
        }
        mysqli_close($dbc);
        }
    
        if ($output_form) {
            ?> 
        <form action="<?php $_SERVER['PHP_SELF'] ?>"
              method="post">
        Subject of Email: <br>
        <input type="text" name="subject" /><br>
        Send a Message: 
            <textarea name="body"></textarea><br>
    <input type="submit" name="submit" value="Submit" />
        
        </form>
        
        <?php 
        }
        ?>
    </body>
</html>
