<?php

session_start();

DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', '');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'grayenterprise');


          echo'  <!-- comment -->
            <div class="comments-app" ng-app="commentsApp" ng-controller="CommentsController as cmntCtrl">
              <!-- From -->
              <div class="comment-form">
                <form class="form" name="form" ng-submit="form.$valid && cmntCtrl.addComment()" novalidate>
                  <div class="form-row">
                    <textarea
                              class="input"
                              ng-model="cmntCtrl.comment.text"
                              placeholder="Add comment..."
                              required></textarea>
                  </div>

                  <div class="form-row">
                    <input
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
                           id="comment-anonymous"
                           ng-change="cmntCtrl.anonymousChanged()"
                           ng-model="cmntCtrl.comment.anonymous"
                           type="checkbox">
                    <label for="comment-anonymous">Anonymous</label>
                  </div>

                  <div class="form-row">
                    <input type="submit" value="Add Comment">
                  </div>
                </form>
              </div>

              <!-- Comments List -->
              <div class="comments">
                <!-- Comment -->
                <div class="comment" ng-repeat="comment in cmntCtrl.comments | orderBy: '-date'">


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

             <div class="comment-actions">
               <a href="#">Reply</a>
             </div>
           </div>
         </div>
       </div>
            </div>
            </div>



            <!-- end comment-->'
?>
