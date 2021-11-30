
<?php 

//print
echo "hello world";

//variable instantiation
$var_string = "<br> hello world";
$var_number = 19;
$boolean = true;

echo $var_string." ".$var_number;

//data-types
var_dump($var_string);       //outputs the datatype of an object/var

//array
$array = array("Hello", "World");
echo $array[1];

//built-in functions
echo "<br>"." ".strlen($var_number);            //length
echo "<br>"." ".str_replace(" ", "-", $var_string);        //replace
echo "<br>"." ".strpos($var_string, "d");                  //find position
echo "<br>"." ".strtolower($var_string);                    ///lowercase
echo "<br>"." ".strtoupper($var_string);                    //uppercase

//constant instantiation
define("MASTER", "Pinoyfreecoder");
echo "<br>"." ".MASTER;

//operators
echo "<br>"." ".$var_number ** 2;                //raise to 2


//if statements
if($var_number !== 20){                    // !== checks the value and datatype of the var/obj
    echo "TRUE";
} else {
    echo "FALSE";
}

//switch
// switch($var_number){
//     case 19: 
//         echo "true";
// }

foreach($array as $arr){
    echo "hello";
}

//labeling
$fruits = array("mangga" => "mango", "mansanas" => "apple");
print_r($fruits);                           //print the obj readable to humans
echo "<br>"." ".$fruits["mangga"];

//sorting
sort($array);           //ascending
rsort($array);          //descending

//search in an array
if(in_array("mango", $fruits)){
    echo "<br> may apple";
} else {
    echo "<br> walang apple";
}

//date
echo date('<br> Y-m-d h');


//function
function PinoyFreeCoder(){
        echo "<br>Welcome to hotdog";
}

PinoyFreeCoder();


