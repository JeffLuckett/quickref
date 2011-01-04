<?php global $opt;?>
<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
	<?php
		return;
	}
?>

<!-- You can start editing here. -->

<?php if ( have_comments() ) : ?>

	<span id="comments-template" class="alignleft"><?php comments_number('No Comments', 'One Comments', '% Comments' );?></span>
    <span class="alignright post-a-comment"><a href="<?php the_permalink() ?>#respond">Post a Comment</a></span>
    <div class="clear"></div>
	<span class="border"></span>

	<ol class="commentlist">
	<?php wp_list_comments('avatar_size=48'); ?>
	</ol>

<div id="comment-nav">
<?php paginate_comments_links();?>
</div>
 <?php else : // this is displayed if there are no comments so far ?>


	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->
<span id="comments-template" style="padding:2em 0; line-height:3em;">It's very calm over here, why not leave a comment?</span> 
	
	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		

	<?php endif; ?>
<?php endif; ?>


<?php if ( comments_open() ) : ?>



<div id="respond"> 
<h3 id="comment-form-title"><?php comment_form_title( 'Leave a Reply', 'Leave a Reply to %s' ); ?></h3>

<div class="cancel-comment-reply">
	<small><?php cancel_comment_reply_link(); ?></small>
</div>
<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
<p>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to post a comment.</p>
<?php else : ?>
 
<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
<?php if ( is_user_logged_in() ) : ?>

<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>

<?php else : ?>

<p>
<label for="author"><small>Name <?php if ($req) echo "(required)"; ?></small></label>
<br />
<input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo 'aria-required="true" class="required"'; ?> />
</p>
<p>
<label for="email"><small>Mail (will not be published) <?php if ($req) echo "(required)"; ?></small></label>
<br /><input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo 'aria-required="true" class="required email"'; ?> />
</p>
<p>
<label for="url"><small>Website</small></label>
<br />
<input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3" class="radius10 url" />
</p>

<?php endif; ?>

<!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>-->

<p><textarea name="comment" id="comment" cols="58" rows="10" tabindex="4"></textarea></p>

<p><input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" />
<?php comment_id_fields(); ?>
<?php do_action('comment_form', $post->ID); ?>
</p>
</form>

 
<?php endif; // If registration required and not logged in ?>


</div>
<?php endif; // if you delete this the sky will fall on your head ?>
