<?php session_start();?>
<?php require_once ("connection.php");?>
<?php
	

    
    // START FORM PROCESSING

                if (isset($_POST['submit'])) { // Form has been submitted.
    
            $errors = array();

        // perform validations on the form data
        $required_fields = array('user_login', 'user_pass');
        $errors = array_merge($errors, check_required_fields($required_fields, $_POST));
                
        $fields_with_lengths = array('user_login' => 30, 'user_pass' => 8);
        $errors = array_merge($errors, check_max_field_lengths($fields_with_lengths, $_POST));
        
             if (count($errors) == 1) {
                    $message = "There was 1 error in the form! check the input of Username/Passnumber format and try again.";
                      echo "$message!";
                      exit;
                } elseif (count($errors) > 1) {
                    $message = "There were " . count($errors) . " errors in the form! check the input of (Username and Passnumber) format and try again";
                      echo "$message!";
                      exit;
                
            
            } elseif ((count(str_split($_POST['user_pass']))) <> 8) {
                $message = "There was 1 error in the form! check the number of Passnumber digits (4 digits) and try again.";
                              echo "$message";
                              exit; 
            }
            } else {
        
        $user_login = trim(($_POST['user_login']));
        $user_pass = trim(($_POST['user_pass']));



        if ( empty($errors) ) {
            $query = "INSERT INTO users (
                            user_login, user_pass
                        ) VALUES (
                            '{$user_login}', '{$user_pass}'
                        )";
            $result = mysql_query($query, $connection);
            if ($result) {
                $message = "The Username has been successfully created.";
                echo "$message";
                exit;
                
            } else {
                $message = "The Username could not be created!";
                $message .= "<br />" . mysql_error();
                echo "$message";
               exit;

            }
        }
        }

?>	
