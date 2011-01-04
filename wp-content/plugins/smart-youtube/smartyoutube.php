<?php
/*
Plugin Name: Smart Youtube
Plugin URI: http://www.prelovac.com/vladimir/wordpress-plugins/smart-youtube
Description: Insert YouTube videos in posts, comments and RSS feeds with ease and full customization.
Author: Vladimir Prelovac
Version: 3.8.3
Author URI: http://www.prelovac.com/vladimir/


To-Do: 

- Is there a way to have smart youtube display multiple thumbnails of youtube videos in this fashion:
http://wordpress.org/extend/plugins/my-youtube-playlist/

The author of this plugin has done a good job in birthing the concept, but is unable to really do much by way of support or add features, e.g. highlight thumbnail currently playing, flexible grouping styles of thumbnails (horizontal, vertical listing) etc.

- Wondering if there's a way to have smartyoutube generate a thumbnail of the youtube video that shows up as one of the thumbnail options for the article when someone shares the blog post?

- Would it be possible to overwrite the global autoplay param in a post, something like httpv://www.youtube.com/watch?v=00000000&autoplay=true; I tried to add autoplay=1 but unfortunately in the resuling html it adds autoplay=0 (the global option) and also autoplay=1
The result is no autoplay :(

- Instead of editing the shortcut, we have copied from youtube.
I would love to have a button,
like insert Smart YouTube Video
A dialogue box would pop up,
and allow me to just simply paste the link.
Then having check boxes on the side,
which allow me to choose whether you would like HD or not.
thus editing the link correctly.

I find this would greatly help, especiall when I help create video blogs for community provider who have very little computer background.

- Please add support for it on the BuddyPress Acitivity page, currently it just shows the url (which won't work because of the httpv and httpvh)

- Was wondering if it was possible for you to have the plugin take the URL for the Youtube thumbnail for the video and place it into a user defined custom field. The plugin "YoutubeThumb2CustomField" but no longer works in WP 3.0 (network).

- love to see vimeo support! i have video intensive site...love Vimeo

Only issue is I would LOVE to add the widget into another sidebar and I do not see this possibility. Can you have multiple Smart YouTubes? 

- 1. Adding few possibilities for posting videos into post – I have great production of videos but before end of 2009 all was in 320 x 240 and after end of 2009 I start publishing video in 640 x 480 resolution. I have adjusted player video for 640 x 480 but now 320 x 240 videos are stretched across all of player window.

For changes to be easy implemented – I suggest adding 2 or even 3 possibilities for playing videos – like this:
Your original code httpv://www.youtube.com/********************
Another version of httpv#1://www.youtube.com/********************
Another version of httpv#2://www.youtube.com/********************
Another version of httpv#3://www.youtube.com/********************

Adding #1 after v will allow us to predefine what will be size of player for #1 or number #2 or number #3 – I think it is good idea

If you don’t put #1, #2, #3 player will be those which is default (without number) – in my case that is 640 x 480.

2. If some video is for “personal use” which mean somebody must be log into you tube to see it, than I suggest making possibility for login for authors of those videos – If I put all my materials to be private (up to 25 people can see it) – than I cant publish them trough this way – and allowing authors to write theirs username and password will allow that those vides can be seen on my posts. That way I can protect all my archive of video on youtube, but allow those video can be visible on my blog – which can increase hits, visits and others possibility – that possibility is visible on this plug in http://tubepress.org/ where people can use its username and password for publishing all vides from if they have account on youtube


- marinas javascript suggestion for hq videos
- add editor button
- The plugin places a preview image in the RSS feed which is great, but it links to the video on http://www.youtube.com. I would like to change it so the image links to the blog post so I can generate some traffic on my blog. 
- localization
- the images appear under the embedded Smart Youtube videos. Is there any way to edit the z-index for Smart Youtube CSS? I
- would like to use multiple instances of the Smart YouTube plugin. I saw the reply that said to simply use multiple calls in one instance of the widget, but that doesn't let me choose different videos for different pages. 
- was wondering if it's possible to get a vid and playlist in a custom page template?? Is it possible to add a preview image to search results?
- I wondered if there were a way to bring the video to the forefront layer (perhaps z-index)? I know this actually breaks good design practice in my intended use, but have a look here:
- However, on one page I have two videos and therefore I want to add a a parameter to the second video embed URL to _not_ start automatically. Something like httpv://www.youtube.com/watch?v=xyz123&autostart=off
- Single videos work well from wordpress on the Iphone/ipod. Is there a way to make the playlists work, just getting the ? cube instead of image.
- I would like to "inject" automatically this preview image url in a custom field, in each post, to auto-generate the thumb on my homepage with this image.
*/



if (isset($smart_youtube)) return false;

require_once(dirname(__FILE__) . '/smartyoutube.class.php');

$smart_youtube = new SmartYouTube();