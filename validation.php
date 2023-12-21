<?php
session_start();
$dbhost='localhost:3306';
$dbuser='root';
$dbpass='parinika';
$con=mysqli_connect($dbhost,$dbuser,$dbpass);
if($con)
{
    echo ("connection successful");
}
else
{
    echo ("no connection found");
}
mysqli_select_db($con,'sessionpractical');
$name= $_POST['user'];
$pass= $_POST['password'];

$q= "select * from signin where name='$name' && password='$pass'";
$result = mysqli_query($con,$q);
$num = mysqli_num_rows($result);
if($num == 1)
 {
$_SESSION['username'] = $name;
header('location:home.php');

}
else
{
header('location:login.php');
}
?>
