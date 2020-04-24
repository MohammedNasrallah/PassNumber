<?php// session_start();?>
<?php require_once ("connection.php");?>
<?php 

function sub_array_keys($_symbols) {
    $result = array();
    foreach ($_symbols as $key => $sub_array) {
        $result[$key] = array_keys($sub_array);
    }return $result;}
    
        function customShuffle(array &$_symbols) {
    $firstElement = array_shift($_symbols);
    shuffle($_symbols);
    array_unshift($_symbols, $firstElement);
}


function shuffle_assoc(&$_symbols) {
    $keys = array_keys($_symbols);

    shuffle($keys);

    foreach ($keys as $key) {
        $new[$key] = $_symbols[$key];
    }

    $_symbols = $new;

    return true;
}


function sort_sub_array_by_array($_symbols, $_keys) {
    $result = array();
    foreach ($_keys as $key_1 => $sub_array_keys) {
        foreach ($sub_array_keys as $key_2) {
            $result[$key_1][$key_2] = $_symbols[$key_1][$key_2];
        }
    }
    return $result;
}
    
    
?>
    
 <?php $username = ""; $userChain = "";  'username' == ""; 'password' == ""; ?>

<?php

$_values = array( 
array(0, 1, 2, 3, 4), // 0
array(0, 10, 20, 30, 40), // 1
array(0, 100, 200, 300, 400), // 2
array(0, 1000, 2000, 3000, 4000), // 3
);



$_symbols = array(
array(0,'<img src="images/foodicons/food-1.jpg" width="50" height="50"/>','<img src="images/foodicons/food-2.jpg" width="50" height="50"/>','<img src="images/foodicons/food-3.jpg" width="50" height="50"/>','<img src="images/foodicons/food-4.jpg" width="50" height="50"/>'), //0
array(0,'<img src="images/fruitsicons/fruites-1.jpg" width="50" height="50"/>','<img src="images/fruitsicons/fruites-2.jpg" width="50" height="50"/>','<img src="images/fruitsicons/fruites-3.jpg" width="50" height="50"/>','<img src="images/fruitsicons/fruites-4.jpg" width="50" height="50"/>'), //1
array(0,'<img src="images/animalsicons/animal-1.jpg" width="50" height="50"/>','<img src="images/animalsicons/animal-2.jpg" width="50" height="50"/>','<img src="images/animalsicons/animal-3.jpg" width="50" height="50"/>','<img src="images/animalsicons/animal-4.jpg" width="50" height="50"/>'), //2
array(0,'<img src="images/jobsicons/job-1.jpg" width="50" height="50"/>','<img src="images/jobsicons/job-2.jpg" width="50" height="50"/>','<img src="images/jobsicons/job-3.jpg" width="50" height="50"/>','<img src="images/jobsicons/job-4.jpg" width="50" height="50"/>'), //3
);


// Shuffling both of arrays ($_symbols and $_values) once to get a consistent shuffled arrays.
$_keys = sub_array_keys($_symbols);

array_walk($_keys, function(&$_keys) { customShuffle($_keys);});

shuffle_assoc($_keys);

$_symbols = sort_sub_array_by_array($_symbols, $_keys);
$_values = sort_sub_array_by_array($_values, $_keys);

$showKeys = array_keys($_symbols);

$showSubArray0 = array_keys($_symbols[$showKeys[0]]);
$showSubArray1 = array_keys($_symbols[$showKeys[1]]);
$showSubArray2 = array_keys($_symbols[$showKeys[2]]);
$showSubArray3 = array_keys($_symbols[$showKeys[3]]);



$_SESSION['_values'] = $_values;
$_SESSION['showKeys'] = $showKeys;
$_SESSION['showSubArray0'] = $showSubArray0;
$_SESSION['showSubArray1'] = $showSubArray1;
$_SESSION['showSubArray2'] = $showSubArray2;
$_SESSION['showSubArray3'] = $showSubArray3;

?>

<?php 


$_values = array( 
array(0, 1, 2, 3, 4), // 0
array(0, 10, 20, 30, 40), // 1
array(0, 100, 200, 300, 400), // 2
array(0, 1000, 2000, 3000, 4000), // 3
);



$_symbols = array(
array(0,'<img src="images/foodicons/food-1.jpg" width="50" height="50"/>','<img src="images/foodicons/food-2.jpg" width="50" height="50"/>','<img src="images/foodicons/food-3.jpg" width="50" height="50"/>','<img src="images/foodicons/food-4.jpg" width="50" height="50"/>'), //0
array(0,'<img src="images/fruitsicons/fruites-1.jpg" width="50" height="50"/>','<img src="images/fruitsicons/fruites-2.jpg" width="50" height="50"/>','<img src="images/fruitsicons/fruites-3.jpg" width="50" height="50"/>','<img src="images/fruitsicons/fruites-4.jpg" width="50" height="50"/>'), //1
array(0,'<img src="images/animalsicons/animal-1.jpg" width="50" height="50"/>','<img src="images/animalsicons/animal-2.jpg" width="50" height="50"/>','<img src="images/animalsicons/animal-3.jpg" width="50" height="50"/>','<img src="images/animalsicons/animal-4.jpg" width="50" height="50"/>'), //2
array(0,'<img src="images/jobsicons/job-1.jpg" width="50" height="50"/>','<img src="images/jobsicons/job-2.jpg" width="50" height="50"/>','<img src="images/jobsicons/job-3.jpg" width="50" height="50"/>','<img src="images/jobsicons/job-4.jpg" width="50" height="50"/>'), //3
);


// Shuffling both of arrays ($_symbols and $_values) once to get a consistent shuffled arrays.
$_keys = sub_array_keys($_symbols);

array_walk($_keys, function(&$_keys) { customShuffle($_keys);});

shuffle_assoc($_keys);

$_symbols = sort_sub_array_by_array($_symbols, $_keys);
$_values = sort_sub_array_by_array($_values, $_keys);

$showKeys = array_keys($_symbols);

$showSubArray0 = array_keys($_symbols[$showKeys[0]]);
$showSubArray1 = array_keys($_symbols[$showKeys[1]]);
$showSubArray2 = array_keys($_symbols[$showKeys[2]]);
$showSubArray3 = array_keys($_symbols[$showKeys[3]]);



$_SESSION['_values'] = $_values;
$_SESSION['showKeys'] = $showKeys;
$_SESSION['showSubArray0'] = $showSubArray0;
$_SESSION['showSubArray1'] = $showSubArray1;
$_SESSION['showSubArray2'] = $showSubArray2;
$_SESSION['showSubArray3'] = $showSubArray3;

?>