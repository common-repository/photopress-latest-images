=== PhotoPress - Latest Images ===
Contributors: padams
Donate link: http://www.photopressdev.com
Tags: photos, images, attachments, latest images, photography, photopress
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl.html
Requires at least: 3.2.1
Tested up to: 3.8.1
Stable tag: 1.1

Adds a shortcode to display a gallery of the latest images uploaded to the Media Library.

== Description ==

This plugin adds a shortcode, that can be used within Pages and Posts, to display a gallery of the latest images that have been uploading to your Media Library.

= Features Include: =

* `[photopress-latest-images]` displays a gallery of the latest images uploaded.
* `exclude_taxonomy` and `exclude_term` shortcode attributes allows you to exclude images from being displayed in the gallery. 
* `pagination` shortcode attribute displays pagination controls after gallery

= Premium Support =
The PhotoPress team does not provide support for this plugin on the WordPress.org forums. One on one email support is available to users that purchase one of our [Premium Support Plans](http://www.photopressdev.com).

= Other PhotoPress Plugins =

* [PhotoPress Image Taxonomies](http://wordpress.org/plugins/photo-tools-image-taxonomies/)
* [PhotoPress Gallery](http://wordpress.org/plugins/photopress-gallery/)
* [PhotoPress Paypal Shopping Cart](http://wordpress.org/plugins/photopress-paypal-shopping-cart/)
* [PhotoPress Masonry Gallery](http://wordpress.org/plugins/photopress-masonry-gallery/)
* [PhotoPress Sideways Gallery](http://wordpress.org/plugins/photopress-sideways-gallery/)


= The Guide To WordPress For Photographers =
For more information on ways to use PhotoPress and other plugins to build a photpgraphy website check out the [WordPress For Photographers e-Book](http://wpphotog.com/product/the-guide-to-wordpress-for-photographers/ "WordPress For Photographers").


== Installation ==

1. Upload the `photopress-latest-images` plugin folder to your `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Add the `[photopress-latest-images]` shortcode into the Page or Post editor where you want to the latest images to be displayed.

== Frequently Asked Questions ==

= Can I filter certain images from being included in the gallery? =

Yes. Use the 'exclude_taxonomy' and 'exclude_term' shortcode paramaters to filter out any image that has been associated wit ha particular taxonomy nad term. For example, thes shortcode [photopress-latest-images exclude_taxonomy="foo" exclude_term="bar"] will not show any image that has been associated with the term "bar" in the taxonomy "foo".

== Changelog ==

= 1.0 =

Initial version of plugin.

= 1.1 =

Removed unecessary echo/print so gallery can be positioned within post/page properly.