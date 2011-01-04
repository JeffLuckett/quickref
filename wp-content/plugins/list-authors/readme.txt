=== List Authors ===
Contributors: Takaitra
Tags: authors, widget, sidebar
Requires at least: 2.0.2
Tested up to: 3.0.4
Stable tag: trunk

A widget to display a list of site authors.

== Description ==

A widget to display a list of authors in your WordPress blog. Includes widget options to configure the features mentioned below. Completely updated to use the new widget API and is multi-widget enabled. Fully XHTML compliant.

#### Features:
* Choose between an HTML list or comma-separated list.
* Can show number of published author posts.
* Sort authors by name or by post count.
* Exclude users below a given post count threshold.
* Allows administrator to be excluded from the list.
* Choose between displaying usernames or full names in the list.
* Can include links to author-specific RSS feeds.


== Installation ==

1. Download the List Authors zip file.
2. Extract the files to your WordPress plugins directory.
3. Activate the plugin via the WordPress Plugins tab.
4. Configure the widget and place it on your blog using the Widget configuration page.


== Frequently Asked Questions ==

= How do I disable the limit on number of authors listed? =

Leaving the "Maximum displayed" text box blank will cause all selected authors to be displayed. The same goes for "Minimum author posts."

= Can I limit the list to display only contributors (and exclude subscribers)? =

Not explicitly, but by specifying a minimum post count, you can effectively exclude all users without posts (subscribers).

= Can I sort the list of authors alphabetically or by post count? =

Yes. This feature was added in version 2.0.

= Can I limit the number of authors listed in the widget? =

Yes. This feature was added in version 2.0.

= How do I show the list of authors on a page or sidebar without using the widget? =

This widget is the most convenient way to include a list of authors anywhere you can place a widget. However, you can place a list of authors anywhere you like without using this widget by using the [wp_list_authors template tag](http://codex.wordpress.org/Function_Reference/wp_list_authors).

= What if I have further questions? =

If you have any questions or comments, feel free to [leave a comment](http://www.takaitra.com/projects/list-authors) on the project page and I will respond as soon as I can.

== Screenshots ==

1. The List Authors widget showing two authors along with links to their respective RSS feeds.
2. The List Authors widget configuration.

== Changelog ==

= 2.0.1 =
* Small fix for versions of WordPress older than 2.8.

= 2.0 =
* List can be sorted by name or post count.
* Can limit the number of authors listed.
* Can specify a minimum number of posts required before author is displayed in list.

= 1.2 =
* Updated to use the new widget API introduced in WordPress 2.8.
* Added the HTML/comma-separated list dropdown.
* Multi-widget enabled (it is now possible to have two or more copies of the same widget on one blog).

= 1.1.1 =
* Small fix to make the widget fully XHTML compliant.

= 1.1 =
* Initial release.

== Upgrade Notice ==

= 2.0 =
Several often requested features added including limiting list length and sorting.

= 1.2 =
Major update to use the new widget API and enable multi-widget functionality.
