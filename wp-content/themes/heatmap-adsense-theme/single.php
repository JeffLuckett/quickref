<?php 
/*
HeatMap Theme 2
Author: Stuart Wider
Copyright: Stuart Wider 2009
Website: HeatMapTheme.com
This file last updated: 10/03/2010

This file is part of HeatMap Theme 2
	
HeatMap Theme 2 is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
any later version.

HeatMap Theme 2 is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.	
*/
?>

<?php get_header(); ?>

<!--
single.php
~~~~~~~~~~~~~~~~~~~~~~~~ ~~~ -->
		
<!--
Content of the page (inc comments and post details)
~~~~~~~~~~~~~~~~~~~~~~~~ ~~~ -->
	
<div id="page-body-wrapper">	
		
	<div id="content">
		
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>	
	
	<?php $ids[0] = get_the_ID(); // grabs the id of the page so it can be excluded in the recent posts plus widget ?>  
	
<!--
The Post
~~~~~~~~~~~~~~~~~~~~~~~~ ~~~ -->
	
		<div class="post-content">
	
<!--
Widget Area: [All Content] Above 
~~~ -->
			<?php dynamic_sidebar('[All Content] Above'); ?>
	
<!--
The Post Title 
~~~ -->				
			<h1 class="h1-underline"><?php the_title(); ?></h1>
<!--
Widget Area: [Content Item] Above 
~~~ -->			
			<?php dynamic_sidebar('[Content Item] Above'); ?> 
<!--
Widget Area: [Content Item] Left 
~~~ -->	
			<?php   dynamic_sidebar('[Content Item] Left'); ?>
<!--
Widget Area: [Content Item] Right 
~~~ -->
			<?php	dynamic_sidebar('[Content Item] Right'); ?>
<!--
The content itself 
~~~ -->

			<?php
			if (function_exists('has_post_thumbnail')) {
				if (has_post_thumbnail()) { //  new for 10/03/2010 - okay so if this post has a thumbnail (as per wp 2.9 thumnail features) then do something about it ?>
			
					<div class="post-thumbnail-left">
						<?php		   
						the_post_thumbnail('post-image-size');
						?>
					</div>				
			<?php
				}
			}
			?>

			<?php   the_content(''); ?>
			
<!--
Pagination for Multi-page posts
~~~ -->
			<?php wp_link_pages('before=<p class="multi-page">Pages:&after=</p>'); // if this is a multipage post then show the navigation ?>
	
<!--
Widget Area: [Content Item] Below
~~~ -->
			<?php   dynamic_sidebar('[Content Item] Below'); ?>
	  
		</div> <!-- class="post-content" -->
	
		<div class="clearFloat"></div>
	
<!--
Post Details 
~~~ -->
		<div class="post-details">
		
			<?php if (('closed' != $post->comment_status)) { // if comments are not closed then show the comments button ?>
		
				<p class="comment-button-box"><span class="comment-button"><a href="<?php the_permalink(); ?>#respond">
					<?php comments_number('Be the first to comment', '1 comment', '% comments');?></a> - What do you think?</span>
	
			<?php } else { ?>
		
				<p class="comment-button-box"><span class="comment-button">
				<?php comments_number('No comments', '1 Comment', '% Comments');?></span> [Comments are now closed for this post]
				
			<?php } ?>
			
			&nbsp;&nbsp;Posted by
				<?php echo get_the_author(); ?>
				<?php /* the_author_posts_link(); */ /*uncomment this if you actually want a link to the authors posts - it reveals the authors username though - or am I being too security concious? */?>
				 - 
				<?php the_date(); echo ' at '; the_time(); /* changed date and time format 19/10/09 so that default system date and time is used instead of preset date and time */ ?>
			</p>
		
	
			<p>Categories:
				<?php the_category(', ') ?>
			&nbsp;Tags:
				<?php the_tags('') ?>
			</p>
		
			<p>
				<?php edit_post_link('(Edit)', '', ''); ?>
			</p>
	
		</div> <!-- class="post-details" -->
	
		<!--
		<?php trackback_rdf(); ?>
		-->
	
		<?php endwhile; else: ?>
			<h2> class="h2-simulate-h1-size">No posts found</h2>';
		<?php endif; ?>
	
	
<!--
The comments
~~~ -->
	
		<div class="comment-item">
			<?php comments_template('',true); ?>
		</div> <!-- class="comment-item" -->
	
<!--
Widget Area: [All Content] Below
~~~ -->
		<?php dynamic_sidebar('[All Content] Below'); ?>
		
	</div> <!-- id="content" -->
	
	<?php get_sidebar(); ?>

</div> <!-- id="page-body-wrapper" -->

<?php get_footer(); ?>
	


<!--
End of single.php 
~~~ -->
