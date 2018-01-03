<!-- <style>
  .overlay-modal{margin-left: 0!important;}
</style>
<div class="sub_comment_content post_sub_com_<?php echo $comment['_id']; ?>">
            
  <div class="col-sm-2 post_activity_left">
    <div class="posted_profile">
    
        <?php $image = $getUserProfile['image']; ?>
        <img src='{{asset("images/users$image")}}'>
        
    </div>
  </div>
  <div class="col-sm-9 post_activity_right no_padding" id="post-comment-right<?php echo $comment['_id']; ?>">
    <div class="post_comment_top">
    
      <b>{{$getUserName['username']}} </b>
      
      <small> <?php echo nl2br($comment['comment']); ?></small>
    </div>
    <div class="post_comment_bottom">
      Like . Just Now
    </div>
  </div>
  <div class="col-sm-1 no_padding">
    @if($comment['fk_user_id'] == Auth::user()->_id)
    <div class="dropdown">
      <a class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        ...
      </a>
      <div class="dropdown-menu post_edit_btn ">
        <a class="dropdown-item show-dialog-pop" id="post-com-ed<?php echo $comment['_id']; ?>" onclick="singleCommentEdit(this.id)">Edit</a>
        <a class="dropdown-item show-dialog-pop" id="post-comment<?php echo $comment['_id']; ?>" onclick="singleCommentDelete(this.id)">Delete</a>

        <?php 
          $headerMessage = " Comment";
          $bodyMessage = "Are you sure you want to delete this comment?"; 
          $_id = $comment['_id']; 
        ?>
      </div>
      edit modal
      @include('frontend.newsfeed.post.edit-modal')
      delete modal
      @include('frontend.newsfeed.post.delete-modal')
    </div>
    @endif
  </div>
  
</div> -->