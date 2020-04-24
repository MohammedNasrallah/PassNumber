<?php session_start();?>
<?php require_once ("connection.php");?>


    
 <?php $user_login = ""; $user_pass = "";  'user_login' == ""; 'user_pass' == ""; ?>


<html>
    <head>
 <meta charset="UTF-8">
    <title>PassNumber Method</title>

        
        <link rel="stylesheet" href="css/style.css">



</style></head>

<body>
    <div class="login-page">
	
             <div class="form" style=" padding-top: 10px;">
          <div class="content">

  <!-- end .content --></div>
  <div class="sidebar1">
      </br>
       <form id="myForm" action="logincore.php" method="post">
            <table>

                
                    <td>Username:</td>
                    <td><input id="username" type="text" name="user_login" maxlength="30" value="<?php echo htmlentities($user_login); ?>" placeholder="Email" /></td>
                </tr>
                <tr>
                    <td>Passnumber:</td>
                    <td><input id="user_pass" type="text" name="user_pass" maxlength="8" value="<?php echo htmlentities($user_pass); ?>" /></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" id="submit" name="submit" value="Submit"></td> </tr>    
            </table>
            </form>
             <a href="index.php">New user?</a>
             </br>
            <div id="NotesArea" style=" color: red;" style=" width: 100px" ></div>
            
      </div>
  <!-- end .container --></div>
  
  

			  <script type="text/javascript" src="jquery.latest.min.js" ></script>
            <script type="text/javascript" src="passnumAjax.js"></script>
  
        </body>
</html>

<?php //This will keep the form secured from submitting the inputs accidently if the page get refreshed, and it will clear the input fields.
    if(isset($_POST['user_login'])) { 
        $a = $_POST['user_login'];
        $myFile = "textfile.txt";
        $fh = fopen($myFile, 'a+') or die("can't open file");
        fwrite($fh, $a."\r\n");
        fclose($fh);
        exit;
    } 
    mysql_close($connection);
?>