

<?php
if(isset($_POST["submit"]))
{

//Including dbconfig file.
include 'dbconfig.php';

$anonymous = $_POST["anonymous"];
$email = $_POST["email"];
$message = $_POST["message"];


mysql_query("INSERT INTO comment_form (anonymous,email,message) VALUES ('$anonymous','$email','$message')");

/*echo '<center> Comment Successfully Submitted </center>';*/

}

?>
