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
<!--
common.php
~~~~~~~~~~~~~~~~~~~~~~~~ ~~~ -->


<!--
The Posts 
~~~~~~~~~~~~~~~~~~~~~~~~ ~~~ -->

	<?php $first_time_through=TRUE; 	// This is set so that ads are only around the first post ?>
	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>	
<!--
Individual Post Content 
~~~ -->
	<div class="post-content">
<!--
Widget Area: [All Content] Above 
~~~ -->
		<?php 
		if ($first_time_through) {
			if (!$ads_already_shown && !$all_content_above_already_shown) { 	// check to see if the ads have already been shown due to the use of the featured page option 
				dynamic_sidebar('[All Content] Above');							// or the display of an archive or search page
			}
		}
		?>
<!--
The Post Title 
~~~ -->	
		<h2 class="h2-simulate-h1-size"><a href="<?php the_permalink() ?>" rel="bookmark"> 
			<?php the_title(); 													// Because single post or pages are more important for indexing, multiple post pages just have a h2 title for each item
			?>
			</a></h2>
<!--
Widget Area: [Content Item] Above
~~~ -->	
		<?php 
		if ($first_time_through) if (!$ads_already_shown) {
		
				dynamic_sidebar('[Content Item] Above');?>
<!--
Widget Area: [Content Item] Left 
~~~ -->
				<?php
				dynamic_sidebar('[Content Item] Left'); 
				?>			
<!--
Widget Area: [Content Item] Right
~~~ -->
				<?php
				dynamic_sidebar('[Content Item] Right');
		}		
		?>		  
			
<!--
The content itself 
~~~ -->
		<?php 
		$temp_post = get_post($post->ID, ARRAY_A);					
		$ids[] = get_the_ID(); 										// grabs the id of the page so it can be excluded in the recent posts plus widget


		if (function_exists('has_post_thumbnail')) {
			if (has_post_thumbnail()) {	//  new for 10/03/2010 - okay so if this post has a thumbnail (as per wp 2.9 thumnail features) then do something about it ?>								
			
				<div class="common-page-thumbnail-left">		   
				
					<?php
					if ((is_archive())||is_search()) the_post_thumbnail('archive-image-size'); // show a smaller thumbnail if this is an archive - otherwise just show the regular sized thumbnail
					else the_post_thumbnail('post-image-size');
					?>
				
				</div>
			
		<?php
			}
		}

		$more_text = get_post_meta($post->ID, "more-text", true);			// If you want to specify your own excerpt and 'more text' then you can do that.
		if ($temp_post['post_excerpt']) {									// This code block gets the excerpt and more text from the custom fields,
			echo '<p>' . $temp_post['post_excerpt'] . '</p><p><a href="'; 	// or does something sensible if you havent specified them.
			the_permalink(); 
			echo '" class="more-link">';
			
			if ($more_text != '') 
				echo get_post_meta($post->ID, "more-text", true) . '</a></p>';
			else 
				echo 'Read more...</a></p>';
		}
		else {
			if ($more_text == '') $more_text = 'Read more...';
			the_content($more_text); 
		}
		?>

<!--
Widget Area: [Content Item] Below
~~~ -->
		<?php if ($first_time_through) if (!$ads_already_shown) dynamic_sidebar('[Content Item] Below');?>
		
	</div> <!-- class="post-content" -->
	
	<div class="clearFloat"></div>

<!--
Individual Post Details 
~~~ -->
	
	<div class="post-details">

		<p class="comment-button-box"><span class="comment-button"><a href="<?php the_permalink();?>#respond">
				<?php comments_number('Be the first to comment', '1 comment', '% comments');?></a> - What do you think?</span>&nbsp;&nbsp;Posted by
			<?php echo get_the_author(); ?>
			<?php /* the_author_posts_link(); */ /*uncomment this if you actually want a link to the authors posts - it reveals the authors username though - or am I being too security concious? */?>
			 - 
			<?php the_date(); echo ' at '; the_time(); /* changed date and time format 19/10/09 so that default system date and time is used instead of preset date and time */ ?> 
		</p>
		<p>Categories:
			<?php the_category(', ') ?>
		&nbsp;&nbsp;Tags:
			<?php the_tags('') ?>
		</p>
		<p>
			<?php edit_post_link('(Edit)', '', ''); ?>
		</p>
	
	</div> <!-- class="post-details" -->
	
		<?php $first_time_through=FALSE; ?> 
	
	<?php endwhile; 
	
	/* deleted the no posts found statement from here 30/1/2010 so that sites using pages dont have to have posts on the home page if the site is enirely made up of pages */
	
	endif; ?>
	
<!--
Widget Area: [All Content] Below
~~~ -->
	<?php dynamic_sidebar('[All Content] Below'); ?>
	
<!--
Previous and Next Page navigation
~~~ -->
	<div class="post-nav"><p><?php posts_nav_link(); ?></p></div>
	
<!--
End of common.php
~~~ -->