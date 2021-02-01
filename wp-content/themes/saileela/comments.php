<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
 
/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
    return;
?>
<style>
    textarea{
    border: 2px solid #ff9800;
    }
	.ajax-error{
		color:red;
	}
	.ajax-success{
		color:green;
	}
</style>
 <div id="comments" class="comments-area">
 <?php 
	  $comments_args1 = array(
  'id_form'           => 'commentform',
  'class_form'      => 'comment-form',
  'id_submit'         => 'submit',
  'class_submit'      => 'btn',
  'name_submit'       => 'submit',
  'title_reply'       => __( 'Ask for Help' ),
 
  'label_submit'      => __( 'Share Help' ),
  'format'            => 'xhtml',
  'comment_field' =>  '<div class="comment-form-comment"><textarea id="comment" placeholder="Type Your help" name="comment" cols="90" rows="8" aria-required="true" required>' .
  '</textarea></div>',
  'logged_in_as' => '',
  'must_log_in' => '<p class="must-log-in">' .
    sprintf(
      __( 'You must be <a href="%s"> logged in / register   </a> to Ask for Help.' ),
      wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
    ) . '</p>',


);
 $comments_args = array(
  'id_form'           => 'commentform',
  'class_form'      => 'comment-form',
  'id_submit'         => 'submit',
  'class_submit'      => 'btn',
  'name_submit'       => 'submit',
  'title_reply'       => __( 'Share Your Experience' ),
 
  'label_submit'      => __( 'Share ' ),
  'format'            => 'xhtml',
  'comment_field' =>  '<div class="comment-form-comment"><textarea id="comment" placeholder="Type Your Experience" name="comment" cols="90" rows="8" aria-required="true" required>' .
  '</textarea></div>',
  'logged_in_as' => '',
  'must_log_in' => '<p class="must-log-in">' .
    sprintf(
      __( 'You must be <a href="%s"> logged in / register   </a> to Share a experiencet.' ),
      wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
    ) . '</p>',


);
	 ?>
    <?php
	$pagename = get_query_var('pagename'); 
	$message ='';
	
	 if($pagename=='share-experience')
	 {
		  comment_form( $comments_args);  
	$message ='<p class="ajax-success" >Thanks for your experience,Please wait  Admins approval for publish </p>';
	 } 
	 else{
			  comment_form( $comments_args1);  
		  $message ='<p class="ajax-success" >Thanks for your Request,Please wait  Admins approval for publish </p>';
	 } 
	
	 ?>
 
</div><!-- #comments -->
<script type="text/javascript">
  jQuery('document').ready(function($){
    // Get the comment form
    var commentform=$('#commentform');
    // Add a Comment Status message
    commentform.prepend('<div id="comment-status" ></div>');
    // Defining the Status message element 
    var statusdiv=$('#comment-status');
    commentform.submit(function(){
      // Serialize and store form data
      var formdata=commentform.serialize();
      //Add a status message
      statusdiv.html('<p class="ajax-placeholder">Processing...</p>');
      //Extract action URL from commentform
      var formurl=commentform.attr('action');
      //Post Form with data
      $.ajax({
        type: 'post',
        url: formurl,
        data: formdata,
        error: function(XMLHttpRequest, textStatus, errorThrown){
          statusdiv.html('<p class="ajax-error" >You might have left one of the fields blank, or be posting too quickly</p>');
        },
        success: function(data, textStatus){
          if(data=="success")
       statusdiv.html('<p class="ajax-success" >Thanks for your experience,Please wait  Admins approval for publish </p>'); 
          else
 statusdiv.html('<?php echo $message; ?>'); 
			window.setTimeout(function(){location.reload()},1000)
           commentform.find('textarea[name=comment]').val('');
        }
      });
      return false;
    });
  });
</script>
