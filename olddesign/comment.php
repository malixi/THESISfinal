<?php
$con=mysqli_connect('localhost','root','','grayenterprise');

if(isset($_GET['submit'])){ // Fetching variables of the form which travels in URL
  $anonymous = $_GET['anonymous'];
  $email = $_GET['email'];
  $message = $_GET['message'];
  $query =   mysql_query("INSERT INTO comment (anonymous,email,message) VALUES ('$anonymous','$email','$message')");
}
?>

<html>
<body>
<!-- comment -->
  <div class="comments-app" ng-app="commentsApp" ng-controller="CommentsController as cmntCtrl">
    <h1>Comment Section</h1>
    <!-- From -->
    <div class="comment-form">
    <!-- Comment Avatar -->
      <form action="commentprocess.php" class="form" name="form" method="POST">
        <div class="form-row">
          <textarea name= "message" class="input" placeholder="Add comment..." required></textarea>
        </div>
        <div class="form-row">
          <input class="input" placeholder="Email" type="email" name="email">
        </div>
        <div class="form-row">
          <input type="submit" value="Comment">
        </div>
        </form>
    </div>
    <!-- Comments List -->
  </div>
<!-- end comment-->


<?php

$test2=$_SESSION["test1"];

$sql = "SELECT * FROM comment WHERE productID = '".$test2."'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
     echo '<!-- Comments List -->
            <div class="comments">
            <!-- Comment -->
            <div class="comment" ng-repeat="comment in cmntCtrl.comments">
            <!-- Comment Avatar -->
            <div class="comment-avatar">
            <img src="images/personicon.png"/>
            </div>

            <!-- Comment Box -->
            <div class="comment-box">
            <div class="comment-message"> <p>'. $row['message'] .'</p></div>
            <div class="comment-footer">
            <div class="comment-info">
              <span class="comment.email"><p>'. $row['email'] .'</p></span>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            ';}
} else {
  echo "0 results";
}
$con->close();
?>


</body>
</html>
