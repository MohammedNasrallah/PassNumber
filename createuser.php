<?php
/*An authentication process is disclosed which uses categories of icons
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
 Contact us at passnumber.com or email us at: info@passnumber.com*/
 ;?>

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
            die("Database query failed: " . mysqli_error());
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
    
    
    // START FORM PROCESSING

                if (isset($_POST['submit'])) { // Form has been submitted.
    
            $errors = array();

        // perform validations on the form data
        $required_fields = array('user_login', 'user_pass');
        $errors = array_merge($errors, check_required_fields($required_fields, $_POST));
                
        $fields_with_lengths = array('user_login' => 30, 'user_pass' => 4);
        $errors = array_merge($errors, check_max_field_lengths($fields_with_lengths, $_POST));
        
             if (count($errors) == 1) {
                    $message = "There was 1 error in the form! check the input of Username/Passnumber format and try again.";
                      echo "$message!";
                      exit;
                } elseif (count($errors) > 1) {
                    $message = "There were " . count($errors) . " errors in the form! check the input of (Username and Passnumber) format and try again";
                      echo "$message!";
                      exit;
                
            
            } elseif ((count(str_split($_POST['user_pass']))) <> 4) {
                $message = "There was 1 error in the form! check the number of Passnumber digits (4 digits) and try again.";
                              echo "$message";
                              exit; 
            }
            } else {
        
        $user_login = trim(mysql_prep($_POST['user_login']));
        $userPassnumber = trim(mysql_prep($_POST['user_pass']));
        $passnumber = str_split($userPassnumber);
        

				$_values = array(
				array(0,1,2,3,4), // 1
				array(0,10,20,30,40), // 2
				array(0,100,200,300,400), // 3
				array(0,1000,2000,3000,4000), // 4

				);



    $password_value = ($_values[0][$passnumber[0]]) + ($_values[1][$passnumber[1]]) + ($_values[2][$passnumber[2]])+ ($_values[3][$passnumber[3]]) ;

        $zerosPs = array_keys($passnumber, "0");
        $zeroz_rows = (end($_values[$zerosPs[0]])); 
        $user_pass = sha1($password_value + $zeroz_rows); 

        if ( empty($errors) ) {
            $query = "INSERT INTO users (
                            user_login, user_pass
                        ) VALUES (
                            '{$user_login}', '{$user_pass}'
                        )";
            $result = mysqli_query($link, $query);
            if ($result) {
                $message = "The Username has been successfully created.";
                echo "$message";
                exit;
                
            } else {
                $message = "The Username could not be created!";
                $message .= "<br />" . mysqli_error($link);
                echo "$message";
               exit;

            }
        }
        }

?>	
