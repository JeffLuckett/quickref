    	 <ul id="rss-links">
         <li class="text">RSS :</li>
						<li class="first"><a href="<?php if ( get_option('swift_feedburner_id') <> "" ) { echo "http://feeds.feedburner.com/".get_option('swift_feedburner_id'); } else { echo get_bloginfo_rss('rss2_url'); } ?>">Posts</a></li>
						<li><a href="<?php bloginfo('comments_rss2_url'); ?>">Comments</a></li>
						<?php if (get_option('swift_feedburner_id')) { ?><li class="last"><a href="http://feedburner.google.com/fb/a/mailverify?uri=<?php echo get_option('swift_feedburner_id'); ?>" target="_blank">Email</a></li><?php } ?>
		</ul>