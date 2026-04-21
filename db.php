<?php 
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_NAME','todo_app');
define('DB_PASSWORD',"");


$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
if(!$conn){
    die("Database Connection Faild: " . mysqli_connect_error());
}
// else{
//     echo "This is good to go";
// }

mysqli_set_charset($conn,'utf8mb4');

?>