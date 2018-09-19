# Basic Usage

To use this plugin, all you need to do is include the [facebook] and/or [twitter] shortcodes. There are a number of defaults set up on each of those which will make them into buttons with icons by default.

**To use sharing links *within* a content area, just use the shortcodes in any WordPress content area:**

```html
[facebook] [twitter]
```

**To use these sharing links in your theme or plugin files, simply include the shortcode like so:**

```php
// Output sharing buttons
echo do_shortcode( '[facebook text="Share on Facebook!"]');
echo do_shortcode( '[twitter text="Share on Twitter!"]');
```

# Advanced usage

There are a number of ways to customize the use of this plugin to work with your theme or plugin.

## Custom post types

Pages and posts can use custom sharing links (generated over at hrefshare.com) by default, and obviously with the shortcode you can use those links wherever you're using those in a custom way. If you'd like to use those sorts of links within theme files and have custom content types, you'll probably want to add the custom link metaboxes on the backend of your site for your CPT.

You can add those metaboxes like so, in your functions.php file:

```php
// Add support for the metaboxes on mycpt
add_post_type_support( 'mycpt', 'social' );
```

## Custom button text

If you'd like to customize the text for Facebook or twitter buttons, you can do that like so in the shortcode:

```html
[facebook text="mytext goes here!"]
[twitter text="mytext goes here!"]
```

## Custom share url

Using the shortcode, you can set this directly (we allow for two parameters here so that it will work without having to remember the right one every time:

```html
[facebook url="http://mycustomsharingurl.com"] or [facebook href="http://mycustomsharingurl.com"]
```
(or, especially if this shortcode is being used in a theme file, you'll want to add theme support for the custom share link metabox (see above)

## Custom classes

To *add* CSS classes to the buttons, you can simply add those like this in the shortcode:

```html
[facebook class="myadditionalclass anotherclass"]
[twitter class="myadditionalclass anotherclass"]
```

To *replace* all of the CSS classes for the buttons, add something like this to your functions.php file:

```php
// Remove the default classes from facebook links
add_filter( 'facebook_classes', 'return_facebook_classes' );
function return_facebook_classes( $args ) {
    return 'facebook-button';

}

// Remove the default classes from twitter links
add_filter( 'twitter_classes', 'return_twitter_classes' );
function return_twitter_classes() {
	return 'twitter-button';
}
```

## Custom icons

Just set it in the shortcode...

```html
[twitter icon="<span class="dashicons dashicons-twitter"></span>"]
```
