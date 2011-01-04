<?php 
/*
HeatMap Theme 2
Author: Stuart Wider
Copyright: Stuart Wider 2009
Website: HeatMapTheme.com
This file last updated: 10/03/2009

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
page.php
~~~~~~~~~~~~~~~~~~~~~~~~ ~~~ -->

<!--
Content of the page (inc comments and post details)
~~~~~~~~~~~~~~~~~~~~~~~~ ~~~ -->

<div id="page-body-wrapper">
	
	<div id="content">
		
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>	
	
<!--
The Post
~~~~~~~~~~~~~~~~~~~~~~~~ ~~~ -->
	
		<div class="post-content">
	
<!--
Widget Area: [All Content] Above
~~~ -->
			<?php //dynamic_sidebar('[All Content] Above'); ?>
	
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
				
					<div class="page-thumbnail-left">
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
			<?php wp_link_pages('before=<p class="multi-page">Pages:&after=</p>'); ?>
	
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
		
			<p class="comment-button-box">
		
			<?php if (('closed' != $post->comment_status)) { // if the comments are not closed then show the comment box ?>
		
				<span class="comment-button"><a href="<?php the_permalink(); ?>#respond">
					<?php comments_number('Be the first to comment', '1 comment', '% comments');?></a> - What do you think?</span>&nbsp;&nbsp;
	
			<?php } ?>	
			
			Posted by
				<?php echo get_the_author(); ?>
				<?php /* the_author_posts_link(); */ /*uncomment this if you actually want a link to the authors posts - it reveals the authors username though - or am I being too security concious? */?>
				 - 
				<?php the_date(); echo ' at '; the_time(); /* changed date and time format 19/10/09 so that default system date and time is used instead of preset date and time */ ?>
			</p>
		
			<?php if (('closed' != $post->comment_status)) { ?>
	
				<p>Categories:
					<?php the_category(', ') // if the comments are not closed then show the categories and tags too ?>
				&nbsp;&nbsp;Tags:
					<?php the_tags('') ?>
				</p>
		
			<?php } ?>
		
			<p>
				<?php edit_post_link('(Edit)', '', ''); ?>
			</p>
	
		</div> <!-- class="post-details" -->
	
		<!--
		<?php trackback_rdf(); ?>
		-->
	
		<?php endwhile; else: ?>
				<h2 class="h2-simulate-h1-size">No posts found</h2>';
		<?php endif; ?>
	
<!--
The comments
~~~ -->
	
		<?php if (('closed' != $post->comment_status)) { // if the comments are not closed then show the comments template ?>
	
			<div class="comment-item">
			<?php comments_template('',true); ?>
			</div> <!-- class="comment-item" -->
		
		<?php } ?>
		
<!--
Widget Area: [All Content] Below
~~~ -->
		<?php dynamic_sidebar('[All Content] Below'); ?>
		
	</div> <!-- id="content" -->
	
	<?php get_sidebar(); ?>

</div> <!-- id="page-body-wrapper" -->
	
<?php get_footer(); ?>
	

	
<!--
End of page.php 
~~~ -->