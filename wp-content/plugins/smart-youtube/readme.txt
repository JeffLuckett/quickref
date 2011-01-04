=== Smart YouTube ===
Contributors: freediver
Donate link: https://www.networkforgood.org/donation/MakeDonation.aspx?ORGID2=520781390
Tags: youtube, video, play, media, Post, posts, admin
Requires at least: 2.0
Tested up to: 3.0.1
Stable tag: trunk

Smart Youtube plugin allows you to insert full featured YouTube videos into your post, comments and in RSS feed. 

== Description == 

Smart Youtube is a Wordpress Youtube Plugin that allows you to easily insert Youtube videos/playlists in your post, comments and in RSS feed. 

The main purpose of the plugin is to correctly embed youtube videos into your blog post. The video will be shown in full in your RSS feed as well.

Smart youtube also supports playback of high quality videos, works on iPhone, produces xHTML valid code (unlike YouTube embed code), allows you to view videos in fullscreen,  supports YouTube playlists (normal/HD) and the new outube IFRAME embed code.

The plugin is designed to be small and fast and not use any external resources. It has a number of customizable options.

Main Features:

* Easily embeds YouTube videos (normal/HD)
* Embed YouTube playlist (normal/HD)
* Supports latest high quality video protocols (360p and HD quality 720p)
* Allows full YouTube customization (colors, border, size, full screen...)
* Supports video deep linking (starting at desired point with &start=time parameter)
* Works on iPhone, iPad and iPod
* Supports migrated blogs from Wordpress.com
* Supports migration from other Youtube plugins such as wp-youtube
* Provides a sidebar widget for videos as well
* Produces xHTML valid code
* Very fast and light, no extra scripts needed

Plugin by Vladimir Prelovac. Looking for <a href="http://www.prelovac.com/vladimir/services">WordPress Consulting</a>?


== Changelog ==

= 3.8.3 =
* Fixed a bug that caused video options not to be set to default

= 3.8.2 =
* Sometimes video won't show because template option is empty - now made sure that default template is used


= 3.8.1 =
* Support for new IFRAME embed code
* Support for HD playlists (httpvhp://)
* Support for new play formats (1280x745 & 960x745)

= 3.7.1 =
* Widget function now supports multi-languge plugins (thanks Emmanuel Gravel)
* Playlist link in the feeds correctly displayed

= 3.7 = 
* WP3.0 checked
* Fixed hd and related videos parameter option

= 3.6.1 =
* Added iPad compatibility

= 3.6 =
* Added compatibility with other Youtube plugins such as wp-youtube ([yt]...[/yt] type code)

= 3.5 =
* Fixed Iphone Issues

= 3.4.3 = 
* Fixed privacy option
* Supports new #! style Youtube URLs

= 3.4.1 =
* Fixed widget problem

= 3.4 = 
* Completely rewritten the plugin
* Added new HD video support (use vh now for all high quality videos)
* Added video privacy option


= 3.3.2 =
* Fixed xHTML validation for playlists (credit Dietmar)

= 3.3.1 =
* Fixed Iphone validation (credits to John Neumann)

= 3.3 =
* Supports migrated blogs from Wordpress.com

= 3.2 =
* Added title to widget, fixed HTML code issue with widget

= 3.1.1 =
* param closed properly for HTML validation (thanks Jan Eberl)


== Credits ==

Some of the functions of SmartYoutube plugin came from other plugins. So I can at least thank these people:

* [Oliver](http://www.deliciousdays.com/ "Oliver") for his [cforms II](http://www.deliciousdays.com/cforms-plugin "cforms II") plugin
* [Scott](http://www.plaintxt.org/ "Scott") for his excellent readme.txt file
* [YouTube](http://www.youtube.com/ "YouTube") folks for their service and javascript selector

Thanks.

== Installation ==

1. Upload the whole plugin folder to your /wp-content/plugins/ folder.
2. Go to the Plugins page and activate the plugin.
3. Use the Options page to change your options
4. When you want to display Youtube video in your post, copy the video URL to your post and change http:// to httpv:// (notice the 'v' character)

The video will be automatically embedded to your post in the proper way.

Example: httpv://www.youtube.com/watch?v=OWfksMD4PAg

If you want to post a high quality/HD video  you would use httpvh:// ('vh' for video high)

To embed a playlist use extension 'vp'

httpvp://www.youtube.com/view_play_list?p=528026B4F7B34094

Additionally, you can set how do you want the video to be displayed in your RSS feed. Smart Youtube can show the preview image of the video (automatically grabbed from Youtube), the link to the video, or both. I recommend enabling only the preview image.

== Screenshots ==

1. Plugin Admin Panel
2. Plugin in action in your RSS feed

== License ==

This file is part of Smart YouTube.

Smart YouTube is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.

Smart YouTube is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with Smart YouTube. If not, see <http://www.gnu.org/licenses/>.


== Frequently Asked Questions ==

= How do I correctly use this plugin? =

Copy the URL of YouTube video you want to watch. Paste it in your post anywhere. Example: httpv://www.youtube.com/watch?v=OWfksMD4PAg

= The plugin still does not show up a video! =

Make sure you copied the URL as text, do not create a link!


= Can I suggest an feature for the plugin? =

Of course, visit <a href="http://www.prelovac.com/vladimir/wordpress-plugins/smart-youtube#comments">Smart YouTube Home Page</a>

= I love your work, are you available for hire? =

Yes I am, visit my <a href="http://www.prelovac.com/vladimir/services">WordPress Consulting</a> page to find out more.
