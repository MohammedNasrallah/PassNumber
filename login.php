An authentication process is disclosed which uses categories of icons
to create an easy to remember passnumber for use with an electronic platform.
The process may assign each icon a discrete value during registration.
A hash value is created based on combining the discrete values for each icon in the passnumber. 
During a login process, the user is presented with the icons, sometimes in a randomly shuffled.
The user may input the icons that make up his or her passnumber. 
The process may access stored values for user selected icons in the login passnumber entry field
and calculate a login hash value. The process may then determine whether the login hash value matches
the registration hash value to permit or deny login access to the electronic platform.

    Copyright (C) 2020 Mohammed Nasrallah

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <https://www.gnu.org/licenses/>.
 Contact us at passnumber.com or m.rizeg@gmail.com

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
