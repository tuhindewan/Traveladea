<div id="show_sub_comment_box<?php echo $comment['_id'];?>">
  @if($comment['sub_comment']>0)
    <blockquote class="sub_code sub_comment_exi<?php echo $comment['_id'];?>">
      <!-- show all sub comment section -->
      <div class="show_all_sub_comment">
        @foreach($getSubComment as $subComment)
          @if($subComment->fk_post_comment_id == $comment['_id'])
          	<div class="single_sub_comment">
          		<div class="row">
          			<div class="col-sm-2 sub_comment_activity_left">
				        <div class="posted_profile">
				        @foreach($getUserProfile as $userProfile)
				          @if($userProfile['fk_user_id'] == $subComment['fk_user_id'])
				            <?php $image = $userProfile['image']; ?>
				            <img src='{{asset("images/users$image")}}'>
				          @endif  
				        @endforeach  
				        </div>
				     </div>
				    <div class="col-sm-8 post_activity_right no_padding" id="post-sub-comment-right<?php echo $subComment['_id']; ?>">
				        <div class="sub_comment_top">
				        @foreach($getUserName as $userName)
				          @if($userName['_id'] == $subComment['fk_user_id'])
				          <b>{{$userName->username}} </b>
				          @endif
				        @endforeach
				        <samp id="sub-comment-body-content<?php echo $subComment['_id'];?>"> <?php echo nl2br($subComment['comment']); ?></samp>
				        </div>
				        <div class="post_comment_bottom">
				          Like . <a href="javascript: void(0)" id="comment_reply_box<?php echo $subComment['_id'];?>" onclick="comment_reply_box(this.id)"> Reply</a> . <?php echo \Carbon\Carbon::parse($subComment['created_at'])->diffForHumans(); ?>
				        </div>
				        
				    </div>
          		</div>	
          	</div>  
          @endif 
        @endforeach      
      </div>
      <div id="sub_comment<?php echo $comment['_id'];?>"></div>
      @include('frontend.newsfeed.post.sub_comment.comment_box')
    </blockquote>
  @else
    <blockquote class="sub_code sub_comment<?php echo $comment['_id'];?>" style="display: none;">
      <!-- show all sub comment section -->
      <div class="show_all_sub_comment" id="sub_comment<?php echo $comment['_id'];?>"></div>
      @include('frontend.newsfeed.post.sub_comment.comment_box')
    </blockquote>
  @endif
</div>


