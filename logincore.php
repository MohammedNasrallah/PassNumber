<?php session_start();?>
<?php require_once ("connection.php");?>
<?php 
 
function mysql_prep( $value ) {
        $magic_quotes_active = get_magic_quotes_gpc();
        $new_enough_php = function_exists( "mysql_real_escape_string" );
        if( $new_enough_php ) {
            if( $magic_quotes_active ) { $value = stripslashes( $value ); }
            $value = mysql_real_escape_string( $value );
        } else {
            if( !$magic_quotes_active ) { $value = addslashes( $value ); }
        }
        return $value;
    }

    
function confirm_query($result_set) {
        if (!$result_set) {
            die("Database query failed: " . mysql_error());
        }
    }
    
function check_required_fields($required_array) {
    $field_errors = array();
    foreach($required_array as $fieldname) {
        if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]) && !is_numeric($_POST[$fieldname]))) { 
            $field_errors[] = $fieldname;
        }
    }
    return $field_errors;
}


function check_max_field_lengths($field_length_array) {
    $field_errors = array();
    foreach($field_length_array as $fieldname => $maxlength ) {
        if (strlen(trim(mysql_prep($_POST[$fieldname]))) > $maxlength) { $field_errors[] = $fieldname; }
    }
    return $field_errors;
}


function display_errors($error_array) {
    echo "<p class=\"errors\">";
    echo "Please review the following fields:<br />";
    foreach($error_array as $error) {
        echo " - " . $error . "<br />";
    }
    echo "</p>";
}
 

       // START: Check if form has been submitted or not.                     
    if (isset($_POST['submit'])) {
        $errors = array();

        
        // perform validations on the form data
        $required_fields = array('user_login', 'user_pass');
        $errors = array_merge($errors, check_required_fields($required_fields, $_POST));

        $fields_with_lengths = array('user_login' => 30, 'user_pass' => 8);
        $errors = array_merge($errors, check_max_field_lengths($fields_with_lengths, $_POST));

           if (count($errors) == 1) {
                    $message = "There was 1 error in the form! check the input of user_login/user_pass format and try again.";
                      echo "$message!";
                      exit;
                } else {
                    $message = "There were " . count($errors) . " errors in the form! check the input of (user_login and user_pass) format and try again";
                      echo "$message!";
                      exit;
                }
            
            } elseif ((count(str_split($_POST['user_pass']))) <> 8) {
                $message = "There was 1 error in the form! check the number of user_pass digits (4 digits) and try again.";
                              echo "$message";
                              exit; 
            } else {
                
        $user_login = trim(mysql_prep($_POST['user_login']));
        $user_pass = trim(mysql_prep($_POST['user_pass']));

                        
                // Check database to see if user_login and the hashed user_pass exist there.
                $query = "SELECT id, user_login ";
                $query .= "FROM users ";
                $query .= "WHERE user_login = '{$user_login}' ";
                $query .= "AND user_pass = '{$user_pass}' ";
                $query .= "LIMIT 1";
                $result_set = mysql_query($query);
                confirm_query($result_set);
                if (mysql_num_rows($result_set) == 1) {
                    $found_user = mysql_fetch_array($result_set);
                    $_SESSION['user_id'] = $found_user['id'];
                    $_SESSION['user_login'] = $found_user['user_login'];
                    echo "Login Successful!";

				 
				}else {   echo "Nope! user_login/user_pass combination incorrect!";	} exit;	
                   
                }

        


?>
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