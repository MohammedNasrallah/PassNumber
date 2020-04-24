<?php session_start();?>
<?php require_once("connection.php"); ?>
<?php $user_login = ""; $user_pass = ""; ?>


<html >
  <head>
    <meta charset="UTF-8">
    <title>PassNumber Method</title>
        <link rel="stylesheet" href="css/style.css">
  </head>

  <body>

    <div class="login-page">


  <div class="form" style=" padding-top: 10px;">
  	     <div class="content">
      			

<?php


$_symbols = array(
array(0,'<img src="images/foodicons/food-1.jpg" width="50" height="50"/>','<img src="images/foodicons/food-2.jpg" width="50" height="50"/>','<img src="images/foodicons/food-3.jpg" width="50" height="50"/>','<img src="images/foodicons/food-4.jpg" width="50" height="50"/>'), //0
array(0,'<img src="images/fruitsicons/fruites-1.jpg" width="50" height="50"/>','<img src="images/fruitsicons/fruites-2.jpg" width="50" height="50"/>','<img src="images/fruitsicons/fruites-3.jpg" width="50" height="50"/>','<img src="images/fruitsicons/fruites-4.jpg" width="50" height="50"/>'), //1
array(0,'<img src="images/animalsicons/animal-1.jpg" width="50" height="50"/>','<img src="images/animalsicons/animal-2.jpg" width="50" height="50"/>','<img src="images/animalsicons/animal-3.jpg" width="50" height="50"/>','<img src="images/animalsicons/animal-4.jpg" width="50" height="50"/>'), //2
array(0,'<img src="images/jobsicons/job-1.jpg" width="50" height="50"/>','<img src="images/jobsicons/job-2.jpg" width="50" height="50"/>','<img src="images/jobsicons/job-3.jpg" width="50" height="50"/>','<img src="images/jobsicons/job-4.jpg" width="50" height="50"/>'), //3
);
?>
			


<table id="userArrayTable" >

<tr>
<td><?php echo $_symbols[0][1] ?><span>1</span></td> <td><?php echo $_symbols[0][2] ?><span>2</span></td> <td><?php echo $_symbols[0][3] ?><span>3</span></td> <td><?php echo $_symbols[0][4] ?><span>4</span></td> 
</tr>
<tr id="tr2">
<td><?php echo $_symbols[1][1] ?><span>1</span></td> <td><?php echo $_symbols[1][2] ?><span>2</span></td> <td><?php echo $_symbols[1][3] ?><span>3</span></td> <td><?php echo $_symbols[1][4] ?><span>4</span></td>  	
</tr>
<tr>
<td><?php echo $_symbols[2][1] ?><span>1</span></td> <td><?php echo $_symbols[2][2] ?><span>2</span></td> <td><?php echo $_symbols[2][3] ?><span>3</span></td> <td><?php echo $_symbols[2][4] ?><span>4</span></td>   
</tr>
<tr id="tr4">
<td><?php echo $_symbols[3][1] ?><span>1</span></td> <td><?php echo $_symbols[3][2] ?><span>2</span></td> <td><?php echo $_symbols[3][3] ?><span>3</span></td> <td><?php echo $_symbols[3][4] ?><span>4</span></td> 
</tr>

</table>
    <!-- end .content --></div> 
          
      
      </br>
      
   <form id="myForm" action="createuser.php" method="post">
			<table>
				<tr>
					<td>Email:</td>
					<td><input type="email" name="email" required=""/></td> 
				</tr>
				    <tr>
					<td>Username:</td>
					<td><input type="text" name="user_login" maxlength="30" value="<?php echo htmlentities($user_login); ?>" placeholder="Email"/></td>
				</tr>
				<tr>
					<td>Passnumber:</td>
					<td><input type="text" name="user_pass" maxlength="8" value="<?php echo htmlentities($user_pass); ?>" /></td> 
				</tr> 
				<tr>	
					<td colspan="2"> <input type="submit" name="submit" value="Create user" /></td>
				</tr>
			</table>
			</form>
           
             <a href="login.php">Login now?</a>
			 </br>
<div id="NotesArea" style=" color: red;"> </div>
             	

			<script src="js/index.js"></script>
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