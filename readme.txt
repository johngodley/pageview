=== PageView ===
Contributors: johnny5
Donate link: http://urbangiraffe.com/about/support/
Tags: post, page, html, embed, iframe
Requires at least: 2.5
Tested up to: 3.1.2
Stable tag: trunk

Allows the insertion of code to display an external webpage within an iframe, along with a title and description.

== Description ==

PageView is a plugin that will display another web page inside the current post. This is achieved with the use of an iframe - an HTML tag that allows a webpage to be displayed inline with the current page. Although an iframe can lead to a complicated website, it can be very effective when used appropriately.

== Installation ==

The plugin is simple to install:


1. Download `pageview.zip`
1. Unzip
1. Upload `pageview` directory to your `/wp-content/plugins` directory
1. Go to the plugin management page and enable the plugin

You can find full details of installing a plugin on the [plugin installation page](http://urbangiraffe.com/articles/how-to-install-a-wordpress-plugin/).

== Documentation ==

Full documentation can be found on the [Pageview](http://urbangiraffe.com/plugins/pageview/) page.

== Changelog ==


= 1.2   = 
* Old version

= 1.3   = 
* Update to allow templated HTML.
* Allow spaces in title when using quotes.
* Strip <p>

= 1.4.0 = 
* Include CSS by default

= 1.4.1 = 
* Change tag so it's no longer a comment

= 1.4.2 = 
* Update help field
* Make work better with wpautop/wptexturize

= 1.4.3 = 
* Change pattern matching routine

= 1.4.4 = 
* Remove spurious quotes and vertically align the description

= 1.5 =
* Use shortcode functions
* New parameters supported
* Cleanup
* Removed default style and icon

= 1.5.1 =
* Remove plugin.php file
* Return the shortcode, don't just echo it

