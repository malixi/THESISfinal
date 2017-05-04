
<?php


if(isset($_POST["submit"]))
{

//Including dbconfig file.
include 'dbconfig.php';

$anonymous = $_POST["anonymous"];
$email = $_POST["email"];
$message = $_POST["message"];


mysql_query("INSERT INTO comment_form (anonymous,email,message) VALUES ('$anonymous','$email','$message')");

$result = mysql_query("SELECT * FROM comment_form");
while ($row = mysql_fetch_array($result)){
  echo $row['message'] ."<br/>";
}
/*echo '<center> Comment Successfully Submitted </center>';*/

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

<form  class="form" name="form" ng-submit="form.$valid && cmntCtrl.addComment()" novalidate>
<div class="form-row">
<textarea
        name="message"
        class="input"
        ng-model="cmntCtrl.comment.text"
        placeholder="Add comment..."
        required></textarea>

</div>

<div class="form-row">
<input
    name="email"
     class="input"
     ng-class="{ disabled: cmntCtrl.comment.anonymous }"
     ng-disabled="cmntCtrl.comment.anonymous"
     ng-model="cmntCtrl.comment.author"
     ng-required="!cmntCtrl.comment.anonymous"
     placeholder="Email"
     type="email">
</div>

<div class="form-row text-right">
<input
    name="anonymous"
     id="comment-anonymous"
     ng-change="cmntCtrl.anonymousChanged()"
     ng-model="cmntCtrl.comment.anonymous"
     type="checkbox">
<label for="comment-anonymous">Anonymous</label>
</div>

<div class="form-row">
<input type="submit" value="Add Comment" >
</div>
</form>
</div>



<!-- Comments List -->
<div class="comments">
<!-- Comment -->
<div class="comment" ng-repeat="comment in cmntCtrl.comments | orderBy: '-date'">
<!-- Comment Avatar -->
<div class="comment-avatar">

</div>

<!-- Comment Box -->
<div class="comment-box">
<div class="comment-text">{{ comment.text }}</div>
<div class="comment-footer">
<div class="comment-info">
  <span class="comment-author">
    <em ng-if="comment.anonymous">Anonymous</em>
    <a ng-if="!comment.anonymous" href="{{ comment.author }}">{{ comment.author }}</a>
  </span>
  <span class="comment-date">{{ comment.date | date: 'medium' }}</span>
</div>


</div>
</div>
</div>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-46156385-1', 'cssscript.com');
  ga('send', 'pageview');

</script>


<!-- end comment-->
</div>
</div>




</body>
</html>
