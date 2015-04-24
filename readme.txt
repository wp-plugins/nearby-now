=== Plugin Name ===
Contributors: azcoov
Tags: location, reviews, check-ins, servicepro
Requires at least: 2.0.2
Tested up to: 4.2
Stable tag: 1.7.1
The Nearby Now Plugin allows you to display your good customer reviews, check-in locations and photos, and a service area heat-map on any blog post or web page via a short code. We've also introduced [Audio Testimonials](http://servicepros.nearbynow.co/introducing-audio-testimonials/), a simple way to display an audio playlist of your great customer feedback.

== Description ==

[Nearby Now](http://www.nearbynow.co) for Wordpress is an awesome way to add your real-time Nearby Now reviews and check-ins, along with an eye-catching interactive service area heat-map to your website. The plugin can be displayed in five ways:

###Service Area and Reviews Combination Map

Our most powerful shortcode, the service area and reviews combination map has three sections that are sure to improve local rankings and help convert visitors.

1. A large interactive service area heat-map combined with review markers.
2. A wide column of your reviews, properly coded so that search engines recognize them as reviews of your business.
3. A narrow column of your check-ins, along with related comments and photos.

Place the combination map on city-specific pages to provide for unique, rich, dynamic, and micro-formatted content that is specific to that city in order to bolster rankings for each city your business services.

####Service Area and Reviews Combination Map ShortCode and Options:
####[serviceareareviewcombo]

- state="FL" - Optional.  Must be used in conjunction with "city".  Indicates the city and state for which the review and check-in content will be rendered in the markup, and where the map will be centered.  If no city and state are specified, review and check-in content will be rendered without respect to its local city/state, and the map center will be calculated based on an approximate center of all reviews.
- city="Orlando" - Optional.  Must be used in conjunction with "state".  See above.
- radius="5" - Optional.  If specified, may be used to filter rendered review and check-in content based on its distance in miles from the map center.
- showmap="yes" - Optional, defaults to "yes".  If specified as anything other than "yes", then the map will not be displayed, and only the rendered review and check-in content will be shown.
- reviewstart="1" - Optional, defaults to "1".  Indicates the starting review number to render, based on a reverse chronological order, and may be used for paging.
- reviewcount="15" - Optional, defaults to 15.  Specifies the number of reviews to render based on a reverse chronological order.
- checkinstart="1" - Optional, defaults to "1".  Indicates the starting check-in number to render, based on a reverse chronological order, and may be used for paging.
- checkincount="25" - Optional, defaults to 25.  Specifies the number of check-ins to render based on a reverse chronological order.
- zoomlevel="11" - Optional. Indicates the initial zoom level of the map, and may be a number between 8 and 14, where 8 is a larger area with less detail, and 14 is a small area with more detail.  If not specified, Nearby Now will calculate an appropriate zoom level.
- reviewcityurl="http://www.mydomain.com/service-area-{city}-{state}" - Optional.  If specified, a set of url's will be rendered under the title "Our Reviews by City".  Each city that has at least one local review will be rendered as a link that fits the specified pattern, where "{city}" will be replaced by the lowercase name of the city, and "{state}" will be replaced by the lowercase two character abbreviation for the state.  If a city name has more than one word, hyphens will replace the spaces.  In the example above, the url rendered for Fort Worth, Texas will be "http://www.mydomain.com/service-area-fort-worth-tx".
- mapsize="large" - Optional, defaults to "large".  May be "small" to render a small map, "medium" for a bigger map, and "large" for a large map.  The containing element of the shortcode dictates the width of the map - this parameter adjusts the height.
- mapscrollwheel="no" - Optional, defaults to "no".  If specified as "yes", then the mouse scroll wheel may be used to change the zoom level of the interactive map.
- fblike="no" - Optional, defaults to "no".  If specified as "yes", a Facebook like button plugin will be rendered below each rendered review.
- fbcomment="no" - Optional, defaults to "no".  If specified as "yes", a Facebook comment plugin will be rendered below each rendered review.
- techemail="name@website.com" - Optional.  Provide the email address for the technician that you want to filter reviews and checkins to


###Recent Reviews

One of the most useful features of Nearby Now is the ability to send your customers a review form before you leave their driveway. Since all reviews are tied to checkins, Nearby Now is able to geocode those views and display them on the Nearby Now map.

The Recent Reviews plugin allows you to display the recent reviews right on your website, including a map, and a listing of the reviews.

####Recent Reviews ShortCode and Options:
####[recentreviews]

- state="FL" - Optional.  Must be used in conjunction with "city".  Indicates the city and state for which the reviews will be rendered in the markup, and where the map will be centered.  If no city and state are specified, reviews will be rendered without respect to the author's local city/state, and the map center will be calculated based on an approximate center of all reviews.
- city="Orlando" - Optional.  Must be used in conjunction with "state".  See above.
- radius="5" - Optional.  If specified, may be used to filter rendered reviews based on the author's distance in miles from the map center.
- showmap="yes" - Optional, defaults to "yes".  If specified as anything other than "yes", then the map will not be displayed, and only the rendered reviews will be shown.
- start="1" - Optional, defaults to "1".  Indicates the starting review number to render, based on a reverse chronological order, and may be used for paging.
- count="15" - Optional, defaults to 15.  Specifies the number of reviews to render based on a reverse chronological order.
- zoomlevel="11" - Optional. Indicates the initial zoom level of the map, and may be a number between 8 and 14, where 8 is a larger area with less detail, and 14 is a small area with more detail.  If not specified, Nearby Now will calculate an appropriate zoom level.
- mapscrollwheel="no" - Optional, defaults to "no".  If specified as "yes", then the mouse scroll wheel may be used to change the zoom level of the interactive map.
- fblike="no" - Optional, defaults to "no".  If specified as "yes", a Facebook like button plugin will be rendered below each rendered review.
- fbcomment="no" - Optional, defaults to "no".  If specified as "yes", a Facebook comment plugin will be rendered below each rendered review.


###Service Area Map &amp; Recent Checkins

If you are using Nearby Now, it means you are building a service area that represents the area you work, and the neighborhoods you service the most. Your service area and heat map are displayed on the Nearby Now network, but we also want you to display the same service area and heat map on your own website or blog.

The Service Area &amp; Recent Checkins plugin was built just for that. A simple way to display your service area, heat map, and recent check-ins for your customers to see.

####Service Area Map ShortCode and Options:
####[serviceareamap]

- state="FL" - Optional.  Must be used in conjunction with "city".  Indicates the city and state for which the check-ins will be rendered in the markup, and where the map will be centered.  If no city and state are specified, check-ins will be rendered without respect to the check-in local city/state, and the map center will be calculated based on an approximate center of all check-ins.
- city="Orlando" - Optional.  Must be used in conjunction with "state".  See above.
- radius="5" - Optional.  If specified, may be used to filter rendered check-ins based on the distance in miles from the map center.
- showmap="yes" - Optional, defaults to "yes".  If specified as anything other than "yes", then the map will not be displayed, and only the rendered check-ins will be shown.
- start="1" - Optional, defaults to "1".  Indicates the starting check-in number to render, based on a reverse chronological order, and may be used for paging.
- count="15" - Optional, defaults to 15.  Specifies the number of check-ins to render based on a reverse chronological order.
- zoomlevel="11" - Optional. Indicates the initial zoom level of the map, and may be a number between 8 and 14, where 8 is a larger area with less detail, and 14 is a small area with more detail.  If not specified, Nearby Now will calculate an appropriate zoom level.
- mapscrollwheel="no" - Optional, defaults to "no".  If specified as "yes", then the mouse scroll wheel may be used to change the zoom level of the interactive map.
- fblike="no" - Optional, defaults to "no".  If specified as "yes", a Facebook like button plugin will be rendered below each rendered check-in.
- fbcomment="no" - Optional, defaults to "no".  If specified as "yes", a Facebook comment plugin will be rendered below each rendered check-in.

###Audio Testimonials

If you are using the Nearby Now Audio Testimonials, then this ShortCode is for you. Easily display your favorite customer voice testimonials on any blog post or web page.

####Audio Testimonials ShortCode and Options:
####[nearbynowtestimonials]

- playlist="Demo" - ***Required***.  The specific playlist of audio testimonials that you want to display.
- showTranscription="true" - Optional.  If you have a playlist of audio testimonials that you've had transcribed, set this flag to true and we'll display the transcriptions along with the audio player.
- start="1" - Optional, defaults to "1".  Indicates the starting voice testimonial number to render, based on a reverse chronological order, and may be used for paging.
- count="15" - Optional, defaults to 15.  Specifies the number of voice testimonials to render based on a reverse chronological order.

###Configuration

The Review and Service-Area based plugins can be configured to display a certain location (city/state), as well as a map zoom level, a radius around the city, and the number of items you'd like to show. This is very helpful for those businesses that have multiple locations and host a page for each location and would like to display the plugin data in that locations context.

###How do these plugins help you?

The Nearby Now plugins for Wordpress help your SEO in two ways:

- You can create a web page for each city you service with unique reviews and checkins. Google and other search engines prefer that your website has unique content per page. Duplicate and static content is much less valuable, and Nearby Now is a great way to build that unique dynamic content and plug it into your site.
- The data that is published by the Nearby Now plugin is coded in optimized micro-formats. This helps search engines recognize the value of the reviews and check-ins being published.

If you have any questions or need any assistance with the plugins, you can email us at `support@nearbynow.co`.

###Examples

[We have a demo site](http://servicepros.nearbynow.co/plugins/wordpress-plugins/) setup where you learn more about the plugins and see them in action on a WordPress site.

== Installation ==

1. Install the plugin from the [WordPress Plugin Directory](http://wordpress.org/extend/plugins/nearby-now/)
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Add your API token in the settings page - Login to admin.nearbynow.co and click the WordPress tab to get your API Access Token
4. To use the recent reviews plugin, place `[recentreviews city="Scottsdale" state="AZ" radius="30" count="10" zoomlevel="10"]` in your templates
5. To use the service area heat-map, and recent checkins plugin, place `[serviceareamap city="Scottsdale" state="AZ" radius="30" count="5" zoomlevel="9"]` in your templates
6. Change the city, state, count, and radius to reflect the location of your business
7. To use the audio testimonials plugin, place `[nearynowtestimonials playlist="happy"]` in your templates

== Frequently Asked Questions ==

= How do I find my API token? =

Login to admin.nearbynow.co and click the WordPress tab to get your API Access Token. Email us at support@nearbynow.co if you are having trouble and we'll help you out.

== Screenshots ==

1. Example of the recent reviews plugin
2. Example of the service area heat map and recent checkins
3. Example of the audio testimonials plugin and audio player

== Changelog ==
= 1.7.1 =
* Version Bump for WP 4.2

= 1.7.0 =
* Auto detection of Google Maps API
* Deferred loading of Google Maps API and Heatmap
* Encoded Polygons for faster service area loading and rendering

= 1.6.0 =
* Added ability to filter multiple cities for a single hyperlocal page
* Added ability to name the service area - used when multiple cities are specified

= 1.5.0 =
* Version Bump for WP 4.0
* Bug fixes and general code improvements

= 1.4.5 =
* Increase timeout threshold on plugin API calls

= 1.4.4 =
* API improvements

= 1.4.3 =
* Adjustment to the API endpoint

= 1.4.2 =
* API Modifications

= 1.4.1 =
* Version Bump for WP 3.9

= 1.4.0 =
* New Photo Gallery Plugin

= 1.3.5 =
* Improved Script Loading
* Scripts are now loaded in the footer
* Both scripts & styles are only loaded on pages that have the Nearby Now short-code

= 1.3.4 =
* WordPress compatibility version bump to 3.8

= 1.3.3 =
* Fix for Review City URL's

= 1.3.2 =
* Trimming all whitespace on the API key which fix some 400 erros; common when copy/pasting the API key from email or the web

= 1.3.1 =
* Audio Testimonial ShortCode name correction

= 1.3.0 =
* Added Audio Testimonial ShortCode
* Added technician email as a param to the combo ShortCode

= 1.2.0 =
* Removed our version of jQuery in favor the version that WordPress automatically loads
* WordPress compatibility version bump to 3.6

= 1.1.1 =
* Version 1.1.1 is a compatibility version bump

= 1.1.0 =
* Version 1.1.0 adds the powerful service area and review combination map, and several new parameters for all short codes

= 1.0.3 =
* Version 1.0.3 fixes a bug with the count parameter and also adds two new parameters. 1) Show Map and 2) Show Favorites

Show Map allows you to control the visibility of the map.
Show Favorites allows you to display only reviews that you've specifically marked as a favorite from the admin site

= 1.0.2 =
* Version 1.0.2 ads better documentation and an updated settings admin page

= 1.0.1 =
* Version 1.0.1 fixes a bug in the order that the plugin content is rendered to the browser

= 1.0 =
* Version 1.0 released!
