<div class="row">
  <div class="col-sm-2">
    <div class="profile">
      <?php 
        $profile = $myProfile['image'];
       ?>
      <img class="min_profile_home" src='{{asset("images/users$profile")}}' alt=""> 
    </div>
  </div>
  <div class="col-sm-10 no_padding">
    <textarea name="sub_comment" class="form-control post-sub-comment" id="sub_comment<?php echo $comment['_id'];?>" user="{{Auth::user()->_id}}" onkeypress="sub_comment(event , this.id)" placeholder="Write a sub comment..."></textarea>
  </div>
</div>
