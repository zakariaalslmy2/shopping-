<?php
$host="localhost";
$username="root";
$password="";
$dbname="shoppping";

$con=mysqli_connect($host,$username,$password,$dbname);
if(isset($con)){
    echo "اتصال ناجح";
    
}
else{
    echo "لم ينجح الإتصال  ";

}


?>