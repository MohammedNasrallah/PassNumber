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
 Contact us at passnumber.com or m.rizeg@gmail.com*/

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
