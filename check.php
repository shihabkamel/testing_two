<?php
define('db_server','localhost');
define('db_username','root');
define('db_password','');
define('db_database','shihab');
$conncection=mysqli_connect(db_server,db_username,db_password,db_database);
if($conncection){
    echo "SUCCESSFULL";
}
else{
    echo "SOMETHING IS WRONG";
}
if(isset($_POST['username']) and isset($_POST['password'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $queary="SELECT * FROM admin where username='$username' and password='$password'";

    $result=mysqli_query($conncection,$queary) or die(mysqli_error($conncection));
    $count=mysqli_num_rows($result);
    if($count==1){
        $_SESSION['username']=$username;
        echo "You have logged in successfully";

        header("location: addinfo.html");

    }
    else{
        echo "<br> invalid username or password";
    }

}