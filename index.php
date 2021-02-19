<?php declare( strict_types = 1 );
/**
 *  Bare: A single file directory-to-blog
 */

/**
 *  Relative path based on current file location
 */
define( 'PATH',		\realpath( \dirname( __FILE__ ) ) . '/' );
// Use this instead if you keep scripts outside the web root
// define( 'PATH',	\realpath( \dirname( __FILE__, 2 ) ) . '/htdocs/' );

// Global post directory
define( 'POSTS',	PATH . 'posts/' );
// Add posts to "posts/example.com/" to blog separately on multiple domains

// Cache directory. Must be writable (chmod -R 0755 on *nix)
define( 'CACHE',	PATH . 'cache/' );
// Use this instead if you keep the cache outside the web root
// define( 'CACHE',	\realpath( \dirname( __FILE__, 2 ) ) . '/cache/' );

// Cached index timeout
define( 'CACHE_TTL',	3200 );

// Uploaded file location (usually the same as POSTS)
define( 'FILE_PATH',	POSTS );
// Use this instead if you keep uploaded files outside the web root
// define( 'FILE_PATH',	\realpath( \dirname( __FILE__, 2 ) ) . '/uploads/' );
// Add files to a relative path E.G. 'example.com/' to keep multi-site content separate

// Configuration filename (optional, overrides some constants here)
define( 'CONFIG',	'config.json' );

// Error log filename (will be created if it doesn't exist)
define( 'ERROR',	'errors.log' );

// Visitor error log (will be created if if doesn't exist)
define( 'ERROR_VISIT',	'visitor_errors.log' );

// Special notices and other messages that aren't errors but should be recorded
define( 'NOTICE',	'notices.log' );

// Custom error file folder (optional)
define( 'ERROR_ROOT',	PATH . 'errors/' );
// Use this if error files are outside web root
// define( 'ERROR_ROOT',	\realpath( \dirname( __FILE__, 2 ) ) . '/errors/' );

// Plugins directory
define( 'PLUGINS',	PATH . 'plugins/' );
// Use this if you keep plugins outside the web root
// define( 'PLUGINS',		\realpath( \dirname( __FILE__, 2 ) ) . '/plugins/' );

// Relative path of assets (JS, CSS etc... ) within the folders of each plugin
define( 'PLUGIN_ASSETS',	'assets/' );

// Writable directory inside cache for plugin data (not directly browsable by visitors)
define( 'PLUGIN_DATA',	CACHE . 'plugins/' );

// Whitelisted plugins as comma separated list
define( 'PLUGINS_ENABLED', '' );

// Friendly date format
define( 'DATE_NICE',	'l, F j, Y' );

// Site title
define( 'PAGE_TITLE',	'Rustic Cyberpunk' );

// Site subtitle/tagline
define( 'PAGE_SUB',	'Coffee. Code. Cabins.' );

// Number of posts per page
define( 'PAGE_LIMIT',	12 );

/**
 *  Important:
 *
 *  Whitelist of allowed sites and primary paths
 *  Add "localhost" if testing locally
 *  'is_active' Lets Bare know to allow serving blog posts
 *  'is_maintenance' Lets a plugin send an "under construction" placeholder
 *  'settings' Are for any plugins/helpers
 **/
define( 'SITE_WHITE',		<<<JSON
{
	"kpz62k4pnyh5g5t2efecabkywt2aiwcnqylthqyywilqgxeiipen5xid.onion" : []
}
JSON
);

// Default path parameters if any sites in the whitelist above didn't have any
define( 'DEFAULT_BASEPATH',	<<<JSON
{
	"basepath"		: "\/",
	"is_active"		: 1,
	"is_maintenance"	: 0,
	"settings"		: []
}
JSON
);

// Whitelist of recipient addresses that Bare can email (one per line)
define( 'MAIL_WHITELIST',	<<<LINES

LINES
);

// Sender email used by Bare (from: address)
define( 'MAIL_FROM',		'domain@localhost' );


// Number of posts on archive index page
define( 'INDEX_LIMIT',	60 );

// Make this 1 (meaning true) if testing locally or running on Tor
define( 'SKIP_LOCAL', 	1 );

// Maximum page index
define( 'MAX_PAGE',	500 );

// Maximum URL length (making this too small may affect searching)
define( 'MAX_URL_SIZE',	512 );

// Starting date for post archive
define( 'YEAR_START',	2015 );

// Ending date for post archive
define( 'YEAR_END',	2099 );

// Default language
define( 'LANGUAGE',	'en-US' );

// Default local timezone when not set in config.json
define( 'TIMEZONE',		'America/New_York' );
// For a list of valid values for this, see:
// https://www.php.net/manual/en/timezones.php

// Allow POST method 
// Should be 0 (meaning false) unless if you have a special need
// E.G. a plugin
define( 'ALLOW_POST',	0 );

// Maximum number of tags to recognize in each post
define( 'TAG_LIMIT',	5 );

// Post summary level shown on indexes E.G. hompage, tags, search etc...
define( 'SUMMARY_LEVEL',	0 );
// 0 = Full post view. 1 = Summary, if available, or full post. 2 = Summary view

// Allowed extensions
define( 'EXT_WHITELIST',	<<<JSON
{
	"text"		: "css, js, txt, html",
	"images"	: "ico, jpg, jpeg, gif, bmp, png, tif, tiff, svg", 
	"fonts"		: "ttf, otf, woff, woff2",
	"audio"		: "ogg, oga, mpa, mp3, m4a, wav, wma, flac",
	"video"		: "avi, mp4, mkv, mov, ogg, ogv"
}
JSON
);

// Show sibling (next/previous published) posts
define( 'SHOW_SIBLINGS',	1 );

// Show related posts based on content in currently viewing post
define( 'SHOW_RELATED',		1 );

// Maximum number of related posts to show
define( 'RELATED_LIMIT',	5 );

// Send actual Last-Modified header for files 
define( 'SHOW_MODIFIED',	0 );

// Lines from the bottom of each post to search for features I.E. Summary and tags
// I.E. "Search somewhere in the bottom X lines for features." Up to 10
define( 'FEATURE_LINES',	5 );

// Form nonce size
define( 'TOKEN_BYTES', 		8 );

// Form token nonce hash
define( 'NONCE_HASH',		'tiger160,4' );

// Default post content type
define( 'POST_TYPE',		'blogpost' );

// Comma delimited content types which have their read times calculated
// blogpost, news etc...
define( 'READTIME_TYPES',	'blogpost' );

// Maximum log file size before rolling over (in bytes)
define( 'MAX_LOG_SIZE',		5000000 );

// Maximum number of words allowed for searching posts
define( 'MAX_SEARCH_WORDS',	10 );

// Maximum number of stylesheets to load, if set
define( 'STYLE_LIMIT',		20 );

// Maximum mumber of script files to load
define( 'SCRIPT_LIMIT',		10 );

// Maximum mumber of meta tags to load
define( 'META_LIMIT',		15 );

// Maximum depth when searching for files (E.G. Plugin folders)
define( 'FOLDER_LIMIT',		15 );

// Application name
define( 'APP_NAME',		'Bare' );

// Static resource relative path for JS, CSS, static images etc...
// When using '/' the default path, Bare will load files from the FILE_PATH
define( 'SHARED_ASSETS',		'/' );

// Whitelist of approved frame sources for embedding media (one per line)
define( 'FRAME_WHITELIST',	<<<LINES
https://www.youtube.com
https://player.vimeo.com
https://archive.org
https://peertube.mastodon.host
https://lbry.tv
https://odysee.com

LINES
);

/**
 *  Comma delimited list of supported PHP versions
 *  Offically, Bare supports 7.3 and above
 */
define( 'SUPPORTED_PHP', '7.2, 7.3, 7.4, 8.0' );


/**
 *  Templates and customization
 */

// List of stylesheets to load from SHARED_ASSETS (one per line)
define( 'DEFAULT_STYLESHEETS',		<<<LINES
{shared_assets}style.css

LINES
);

// Default JavaScript files
define( 'DEFAULT_SCRIPTS',		<<<LINES

LINES
);

// Default meta tags
define( 'DEFAULT_META',			<<<JSON
{
	"meta" : [
		{ "name" : "generator", "content" : 
			"Bare; https:\/\/github.com\/cypnk\/Bare" }
	]
}
JSON
);

/**
 *  Navigation links
 */

// Main navigation links shown in headers
// Because this is JSON, remember to escape slashes '/' with '\/'
define( 'DEFAULT_MAIN_LINKS',		<<<JSON
{
	"links" : [
		{ "url" : "{home}about", "text" : "{lang:nav:about}" },
		{ "url" : "{home}archive", "text" : "{lang:nav:archive}" },
		{ "url" : "{feedlink}", "text" : "{lang:nav:feed}" }
	]
}
JSON
);

// Navigation shown in /about page headers
define( 'DEFAULT_ABOUT_LINKS',		<<<JSON
{
	"links" : [
		{ "url" : "{home}archive", "text" : "{lang:nav:archive}" },
		{ "url" : "{feedlink}", "text" : "{lang:nav:feed}" }
	]
}
JSON
);

// Footer links in all pages
define( 'DEFAULT_FOOTER_LINKS',		<<<JSON
{
	"links" : [
		{ "url" : "{home}about", "text" : "{lang:nav:about}" },
		{ "url" : "{home}archive", "text" : "{lang:nav:archive}" },
		{ "url" : "{feedlink}", "text" : "{lang:nav:feed}" }
	]
}
JSON
);


/**
 *  Template holder
 *  These HTML templates can be overridden in plugins
 */
$templates	= [];

// HTML full page component
$templates['tpl_full_page']	= <<<HTML
<!DOCTYPE html>
<html lang="{lang}">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="alternate" type="application/xml" title="{page_title}" href="{feedlink}">
<title>{post_title}</title>
{after_title}
{stylesheets}
{meta_tags}
</head>
<body class="{body_classes}" {extra}>
{body_before}
{body}
{body_after}
{body_before_lastjs}
{body_js}
{body_after_lastjs}
</body>
</html>
HTML;

// Full static home page component
$templates['tpl_home_page']	= <<<HTML
<!DOCTYPE html>
<html lang="{lang}">
<head>
<meta charset="UTF-8">
<link rel="alternate" type="application/xml" title="{page_title}" href="{feedlink}">
<title>{post_title}</title>
{after_title}
{stylesheets}
{meta_tags}
</head>
<body class="{body_classes}" {extra}>
{body_before}
<div class="{home_classes}">
<article class="{home_wrap_classes}">
{body}
</article>
</div>
{body_after}
{body_before_lastjs}
{body_js}
{body_after_lastjs}
</body>
</html>
HTML;

// Full about page component
$templates['tpl_about_page']	= <<<HTML
<!DOCTYPE html>
<html lang="{lang}">
<head>
<meta charset="UTF-8">
<link rel="alternate" type="application/xml" title="{page_title}" href="{feedlink}">
<title>{post_title}</title>
{after_title}
{stylesheets}
{meta_tags}
</head>
<body class="{body_classes}" {extra}>
{body_before}
<div class="{about_classes}">
<article class="{about_wrap_classes}">
{body}
</article>
</div>
{body_after}
{body_before_lastjs}
{body_js}
{body_after_lastjs}
</body>
</html>
HTML;

// Page footer component
$templates['tpl_page_footer']	= <<<HTML
<footer class="{footer_classes}">
<div class="{footer_wrap_classes}">{footer_links}</div>
</footer>
HTML;

// General page heading
$templates['tpl_page_heading']	= <<<HTML
{before_page_heading}<header class="{heading_classes}">
<div class="{heading_wrap_classes}">
{heading_before}
<h1 class="{heading_h_classes}">
	<a href="{home}" class="{heading_a_classes}">{page_title}</a>
</h1>
<p class="{tagline_classes}">{tagline}</p>
{main_links}
<div class="{search_form_wrap_classes}">{search_form}</div>
{heading_after}
</div>
</header>{after_page_heading}
HTML;

// Home page specific heading
$templates['tpl_home_heading']	= <<<HTML
{before_home_heading}<header class="{heading_classes}">
<div class="{heading_wrap_classes}">
<h1 class="{heading_h_classes}">
	<a href="{home}" class="{heading_a_classes}">{page_title}</a>
</h1>
<p class="{tagline_classes}">{tagline}</p>
{home_links}
<div class="{search_form_wrap_classes}">{search_form}</div>
{heading_after}
</div>
</header>{after_home_heading}
HTML;

// About page specific heading
$templates['tpl_about_heading']	= <<<HTML
{before_about_heading}<header class="{heading_classes}">
<div class="{heading_wrap_classes}">{before_heading_h}
<h1 class="{heading_h_classes}">
	<a href="{home}" class="{heading_a_classes}">{page_title}</a>
</h1>{after_heading_h}
<p class="{tagline_classes}">{tagline}</p>
{about_links}
<div class="{search_form_wrap_classes}">{search_form}</div>
{heading_after}
</div>
</header>{after_about_heading}
HTML;

// Form anti-XSRF hidden inputs (required on all forms)
$templates['tpl_input_xsrf']	= <<<HTML
{before_input_xsrf}
<input type="hidden" name="nonce" value="{nonce}">
<input type="hidden" name="token" value="{token}">
<input type="hidden" name="meta" value="{meta}">
{after_input_xsrf}
HTML;

// Search form
$templates['tpl_searchform']	= <<<HTML
{before_search_form}<form action="{home}" method="get" 
	class="{form_classes} {search_form_classes}">
	<fieldset class="{search_fieldset_classes}">
{xsrf}
{before_search_input}<input type="search" name="find" 
	placeholder="{lang:forms:search:placeholder}" 
	class="{input_classes} {search_input_classes}" 
	required>{after_search_input} 
{before_search_button}
<input type="submit" class="{submit_classes} {search_button_classes}" 
	value="{lang:forms:search:button}">{after_search_button}
	</fieldset>
</form>{after_search_form}
HTML;


// Generic error page
$templates['tpl_error_page']	= <<<HTML
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{lang:errors:error} {code} - {page_title}</title>
<link rel="stylesheet" href="{home}style.css">
</head>
<body>
<header>
<div class="content">
	<h1><a href="{home}">{page_title}</a></h1>
	<p>{tagline}</p>
</div>
</header>
<main>
<div class="content">
{body}
<p>{lang:errors:returnhome}</p>
</div>
</main>
</body>
</html>
HTML;

// No posts to dipsplay
$templates['tpl_noposts']	= <<<HTML
<div class="{no_posts_wrap}">
	<p>{lang:errors:noposts}</p>
</div>
HTML;

// General post template
$templates['tpl_post']		= <<<HTML
{before_post}
<article class="{post_classes}">{before_full_post}
	<div class="{post_wrap_classes}">{before_post_heading}
	<header class="{post_heading_classes}">
	<div class="{post_heading_wrap_classes}">
		<h2 class="{post_heading_h_classes}">
			<a href="{permalink}" class="{post_heading_a_classes}">{title}</a>
		</h2>
		<time datetime="{date_utc}"
			class="{post_pub_classes}">{date_stamp}</time> {read_time}
	</div>
	</header>{before_post_body}
	<div class="{post_body_wrap_classes}">
		<div class="{post_body_content_classes">{body}</div>
		<div class="{post_body_tag_classes}">{tags}</div>
	</div>{after_post_body}
	</div>{after_full_post}
</article>{after_post}
HTML;

// Post on full listing indexes
$templates['tpl_index_post']		= <<<HTML
{before_index_post}
<article class="{post_idx_wrap_classes}">{before_item_post}
	<div class="{post_idx_wrap_classes}">{before_index_post_heading}
	<header class="{post_idx_heading_classes}">
	<div class="{post_idx_heading_wrap_classes}">
		<h2 class="{post_idx_heading_h_classes}">
			<a href="{permalink}" class="{post_idx_heading_a_classes}">{title}</a>
		</h2>
		<time datetime="{date_utc}"
			class="{post_idx_pub_classes}">{date_stamp}</time> {read_time}
	</div>
	</header>{after_index_post_heading}
	<div class="{post_idx_body_wrap_classes}">
		<div class="{post_idx_body_content_classes}">{body}</div>
		<div class="{post_idx_body_tag_classes}">{tags}</div>
	</div>
	</div>
{after_item_post}</article>{after_index_post}
HTML;

// Reading time for each post
$templates['tpl_read_time']	= <<<HTML
<span class="readtime">{lang:headings:readtime}</span>
HTML;

// Post tag container on index pages
$templates['tpl_index_tagwrap']	= <<<HTML
<nav class="{tag_index_wrap_classes}">
	<span class="{tag_index_heading_classes}">{lang:headings:tags}</span> 
	<ul class="{tag_index_ul_classes}">{tags}</ul></nav>
HTML;

// Single post page tag container
$templates['tpl_tagwrap']	= <<<HTML
<nav class="{tag_wrap_classes}">
	<span class="{tag_heading_classes}">{lang:headings:tags}</span> 
	<ul class="{tag_ul_classes}">{tags}</ul></nav>
HTML;

// Main navigation menu link container
$templates['tpl_mainnav_wrap']	= <<<HTML
<nav class="{main_nav_classes}"><ul>{links}</ul></nav>
HTML;

// Footer link container
$templates['tpl_footernav_wrap']= <<<HTML
<nav class="{footer_nav_classes}">
<ul class="{footer_ul_classes}">{links}</ul>
</nav>
HTML;

// Link for main homepage link on navigation menues
$templates['tpl_home_link']	= <<<HTML
<li class="{nav_home_link_classes}">
	<a href="{url}" class="{nav_home_link_a_classes}">{text}</a>
</li>
HTML;

// Standard link on navigation menus
$templates['tpl_link']		= <<<HTML
	<li><a href="{url}">{text}</a></li>
HTML;

// Individual post link wrapper on archive indexes
$templates['tpl_index_taglink']	= <<<HTML
<li class="{tag_index_item_classes}">
	<a href="{url}" class="{tag_index_item_a_classes}">{text}</a>
</li>
HTML;

// Individual tag link wrapper
$templates['tpl_taglink']	= <<<HTML
<li class="{tag_item_classes}">
	<a href="{url}" class="{tag_item_a_classes}">{text}</a>
</li>
HTML;

// Pagination link navigation wrapper
$templates['tpl_page_nav_link']	= <<<HTML
<li class="{nav_link_classes}">
	<a href="{url}" class="{nav_link_a_classes}">{text}</a>
</li>
HTML;

// Preview page previous link
$templates['tpl_np_prevlink']	= <<<HTML
<li class="{nextprev_prev_classes}">
	&lt; <a href="{url}" class="{nextprev_prev_a_classes}">{text}</a>
</li>
HTML;

// Preview page next link
$templates['tpl_np_nextlink']	= <<<HTML
<li class="{nextprev_next_classes}">
	<a href="{url}" class="{nextprev_next_a_classes}">{text}</a> &gt;
</li>
HTML;

// Pagination Previous page link
$templates['tpl_prevlink']	= <<<HTML
<li class="{nav_prev_classes}">
	&lt; <a href="{url}" class="{nav_prev_a_classes}">{text}</a>
</li>
HTML;

// Pagination Next page link
$templates['tpl_nextlink']	= <<<HTML
<li class="{nav_next_classes}">
	<a href="{url}" class="{nav_next_a_classes}">{text}</a> &gt;
</li>
HTML;

// Next/Previous pagination wrapper
$templates['tpl_page_nextprev']	= <<<HTML
<div class="{nextprev_wrap_classes}">
	<nav class="{nextprev_nav_classes}">
		<ul class="{nextprev_ul_classes}">{links}</ul>
	</nav>
</div>
HTML;

// Previously published and next, chronological page preview wrapper
$templates['tpl_siblingnav']	= <<<HTML
<div class="{sibling_wrap_classes}">
	<nav class="{sibling_nav_classes}">
		<ul class="{sibling_nav_ul_classes}">{links}</ul>
	</nav>
</div>
HTML;

// Related posts wrapper on single post views
$templates['tpl_relatednav']	= <<<HTML
<div class="{related_wrap_classes}">
	<h3 class="{related_h_classes}">{lang:headings:related}</h3>
	<nav class="{related_nav_classes}">
		<ul class="{related_ul_classes}">{links}</ul>
	</nav>
</div>
HTML;

// Index page post listing wrapper
$templates['tpl_index_wrap']	= <<<HTML
<div class="{post_index_wrap_classes}">
	<ul class="{post_index_ul_wrap_classes}">{items}</ul>
</div>
HTML;

// Index page post link wrapper
$templates['tpl_index']		= <<<HTML
<li class="{post_index_item_classes}">
	<time datetime="{date_utc}">{date_stamp}</time> 
	<a href="{permalink}">{title}</a> {read_time} {tags}
</li>
HTML;

// Index page separation header (I.E. Archive Year)
$templates['tpl_index_header']	= <<<HTML
<li class="{post_index_header_classes}">
	<h3 class="{post_index_header_h_classes}">{title}</h3>
</li>
HTML;

// Language placeholders
$templates['tpl_previous']	= '{lang:nav:previous}';
$templates['tpl_next']		= '{lang:nav:next}';
$templates['tpl_home']		= '{lang:nav:home}';


// Feed index template
$templates['tpl_feed']		= <<<XML
<?xml version="1.0" encoding="UTF-8" ?>
<rss version="2.0">
	<title>{page_title}</title>
	<link>{home}</link>
	<pubDate>{date_gen}</pubDate>
	{body}
</rss>
XML;

// Feed item template
$templates['tpl_item']		= <<<XML
<entry>
	<title>{title}</title>
	<link rel="alternate" type="text/html" href="{permalink}"/>
	<updated>{date_rfc}</updated>
	<content type="html"><![CDATA[{body}]]></content>
</entry>
XML;


/**
 *  Embeded media templates
 */

// Embedded video with preview
$templates['tpl_audio_embed']	= <<<HTML
<div class="media"><audio src="{src}" controls></audio></div>
HTML;

// Embedded video without preview
$templates['tpl_video_np_embed'] =<<<HTML
<div class="media">
	<video width="560" height="315" src="{src}" controls></video>
</div>
HTML;

$templates['tpl_video_embed'] =<<<HTML
<div class="media">
	<video width="560" height="315" src="{src}" poster="{preview}" controls></video>
</div>
HTML;


/**
 *  Hosted media templates
 */
 
// YouTube video wrapper
$templates['tpl_youtube']	= <<<HTML
<div class="media">
	<iframe width="560" height="315" frameborder="0" 
		sandbox="allow-same-origin allow-scripts" 
		src="https://www.youtube.com/embed/{src}" 
		allowfullscreen></iframe>
</div>
HTML;

// Vimeo video wrapper
$templates['tpl_vimeo']		= <<<HTML
<div class="media">
	<iframe width="500" height="281" frameborder="0" 
		sandbox="allow-same-origin allow-scripts" 
		src="https://player.vimeo.com/video/{src}?portrait=0" 
		allowfullscreen></iframe>
</div>
HTML;

// Peertube video wrapper (requires 'src_host' to be added to frame_whitelist)
$templates['tpl_peertube']	= <<<HTML
<div class="media">
	<iframe width="560" height="315" frameborder="0" 
		sandbox="allow-same-origin allow-scripts" 
		src="https://{src_host}/videos/embed/{src}" 
		allowfullscreen></iframe>
</div>
HTML;

// Internet Archive video wrapper
$templates['tpl_archiveorg']	= <<<HTML
<div class="media">
	<iframe width="560" height="315" frameborder="0" 
		sandbox="allow-same-origin allow-scripts" 
		src="https://archive.org/embed/{src}" 
		allowfullscreen></iframe></div>
HTML;

// LBRY/Odysee video wrapper
$templates['tpl_lbry']	= <<<HTML
<div class="media">
	<iframe width="560" height="315" frameborder="0" 
		sandbox="allow-same-origin allow-scripts" 
		src="https://{src_host}/$/embed/{slug}/{src}" 
		allowfullscreen></iframe>
</div>
HTML;


/**
 *  Overridable CSS classes on HTML elements and content segments
 */
define( 'DEFAULT_CLASSES', <<<JSON
{
	"body_classes"			: "",
	
	"heading_classes"		: "",
	"heading_wrap_classes"		: "content", 
	"heading_h_classes"		: "",
	"heading_a_classes"		: "",
	"tagline_classes"		: "",
	"items_wrap_classes"		: "content", 
	"no_posts_wrap"			: "content",
	
	"main_nav_classes"		: "main",
	"main_ul_classes"		: "", 
	
	"pagination_wrap_classes"	: "content", 
	"list_wrap_classes"		: "content", 
	
	"home_classes"			: "content",
	"home_wrap_classes"			: "",
	"about_classes"			: "content",
	"about_wrap_classes"		: "",
	
	"post_index_wrap_classes"	: "content",
	"post_index_ul_wrap_classes"	: "index",
	"post_index_header_classes"	: "",
	"post_index_header_h_classes"	: "",
	"post_index_item_classes"	: "",
	
	"post_classes"			: "",
	"post_wrap_classes"		: "",
	"post_heading_classes"		: "",
	"post_heading_h_classes"	: "",
	"post_heading_a_classes"	: "",
	"post_heading_wrap_classes"	: "content",
	"post_body_wrap_classes"	: "content",
	"post_body_content_classes"	: "",
	"post_body_tag_classes"		: "",
	"post_pub_classes"		: "",
	
	"post_idx_classes"		: "",
	"post_idx_wrap_classes"		: "",
	"post_idx_heading_classes"	: "",
	"post_idx_heading_h_classes"	: "",
	"post_idx_heading_a_classes"	: "",
	"post_idx_heading_wrap_classes"	: "content",
	"post_idx_body_wrap_classes"	: "content",
	"post_idx_body_content_classes"	: "",
	"post_idx_body_tag_classes"	: "",
	"post_idx_pub_classes"		: "",
	
	"footer_classes"		: "",
	"footer_wrap_classes"		: "content", 
	"footer_nav_classes"		: "",
	"footer_ul_classes"		: "",
	
	"crumb_classes"			: "",
	"crumb_wrap_classes"		: "",
	"crumb_sub_classes"		: "",
	"crumb_sub_wrap_classes"	: "",
	
	"crumb_item_classes"		: "",
	"crumb_link_classes"		: "",
	"crumb_current_classes"		: "",
	"crumb_current_item"		: "",
	"pagination_classes"		: "",
	"pagination_ul_classes"		: "",
	
	"nav_link_classes"		: "",
	"nav_link_a_classes"		: "",
	
	"list_classes"			: "related",
	"list_h_classes"		: "",
	
	"tag_wrap_classes"		: "tags",
	"tag_heading_classes"		: "",
	"tag_index_wrap_classes"	: "tags",
	"tag_index_heading_classes"	: "",
	"tag_ul_classes"		: "tags",
	"tag_item_classes"		: "",
	"tag_item_a_classes"		: "",
	"tag_index_item_classes"	: "",
	"tag_index_item_a_classes"	: "",
	
	"sibling_wrap_classes"		: "content",
	"sibling_nav_classes"		: "siblings",
	"sibling_nav_ul_classes"	: "",
	
	"related_wrap_classes"		: "content",
	"related_h_classes"		: "",
	"related_nav_classes"		: "related",
	"related_ul_classes"		: "related",
	
	"nextprev_wrap_classes"		: "content", 
	"nextprev_nav_classes"		: "siblings",
	"nextprev_ul_classes"		: "",
	"nextprev_next_classes"		: "",
	"nextprev_next_a_classes"	: "",
	"nextprev_prev_classes"		: "",
	"nextprev_prev_a_classes"	: "",
	
	"nav_home_link_classes"		: "",
	"nav_home_link_a_classes"	: "",
	
	"nav_current_classes"		: "",
	"nav_current_s_classes"		: "",
	"nav_prev_classes"		: "",
	"nav_prev_a_classes"		: "",
	"nav_noprev_classes"		: "",
	"nav_noprev_s_classes"		: "",
	"nav_next_classes"		: "",
	"nav_next_a_classes"		: "",
	"nav_nonext_classes"		: "",
	"nav_nonext_s_classes"		: "",
	
	"nav_first1_classes"		: "",
	"nav_first1_a_classes"		: "",
	"nav_first2_classes"		: "",
	"nav_first2_a_classes"		: "",
	"nav_first_s_classes"		: "",
	
	"nav_last_s_classes"		: "",
	"nav_last1_classes"		: "",
	"nav_last1_a_classes"		: "",
	"nav_last2_classes"		: "",
	"nav_last2_a_classes"		: "",
	
	"form_classes"			: "",
	"fieldset_classes"		: "",
	"search_form_classes"		: "",
	"search_form_wrap_classes"	: "",
	"search_fieldset_classes"	: "",
	"field_wrap"			: "",
	"button_wrap"			: "",
	"label_classes"			: "",
	"special_classes"		: "",
	"input_classes"			: "",
	"desc_classes"			: "",
	"search_input_classes"		: "",
	"search_button_classes"		: "",
	
	"submit_classes"		: "",
	"alt_classes"			: "",
	"warn_classes"			: "",
	"action_classes"		: ""
}
JSON
);


/**
 *  Default language placholders 
 *  These can be overridden by a language file in the CACHE directory
 *  E.G. en-US.json (using the default language of en-US)
 */
define( 'DEFAULT_LANGUAGE',	<<<JSON
{
	"date_nice"	: "l, F j, Y",
	"headings"	: {
		"related"	: "Related", 
		"tags"		: "Tags:",
		"readtime"	: "{time} min read"
	}, 
	"forms"		: {
		"search"	: {
			"placeholder"	: "Find posts by title or body",
			"button"	: "Search"
		}
	},
	"nav"		: {
		"previous"	: "Previous",
		"next"		: "Next",
		"home"		: "Home",
		"about"		: "About",
		"archive"	: "Archive",
		"feed"		: "Feed"
	}, 
	"errors"	: {
		"error"		: "Error",
		"generic"	: "An error has occured",
		"returnhome"	: "<a href=\"{home}\">Return home<\/a>",
		"noposts"	: "No more posts. Return <a href=\"{home}\">home<\/a>.",
		"notfound"	: "Page not found",
		"noroute"	: "No route defined",
		"badmethod"	: "Method not allowed",
		"nomethod"	: "Method not implemented",
		"denied"	: "Access denied",
		"invalid"	: "Invalid request",
		"codedetect"	: "Server-side code detected",
		"expired"	: "This form has expired",
		"toomany"	: "Too many requests"
	}
}
JSON
);



// Meta, script, and stylesheet tag templates
define( 'TPL_META_TAG',	'<meta name="{name}" content="{content}">' );
define( 'TPL_SCRIPT_TAG', '<script src="{url}"></script>' );
define( 'TPL_STYLE_TAG', '<link rel="stylesheet" href="{url}">' );

// Whitelist of allowed HTML tags
define( 'TAG_WHITE',	<<<JSON
{
	"p"		: [ "style", "class", "align", 
				"data-pullquote", "data-video", 
				"data-media" ],
	
	"div"		: [ "style", "class", "align" ],
	"span"		: [ "style", "class" ],
	"br"		: [ "style", "class" ],
	"hr"		: [ "style", "class" ],
	
	"h1"		: [ "style", "class" ],
	"h2"		: [ "style", "class" ],
	"h3"		: [ "style", "class" ],
	"h4"		: [ "style", "class" ],
	"h5"		: [ "style", "class" ],
	"h6"		: [ "style", "class" ],
	
	"strong"	: [ "style", "class" ],
	"em"		: [ "style", "class" ],
	"u"	 	: [ "style", "class" ],
	"strike"	: [ "style", "class" ],
	"del"		: [ "style", "class", "cite" ],
	
	"ol"		: [ "style", "class" ],
	"ul"		: [ "style", "class" ],
	"li"		: [ "style", "class" ],
	
	"code"		: [ "style", "class" ],
	"pre"		: [ "style", "class" ],
	
	"sup"		: [ "style", "class" ],
	"sub"		: [ "style", "class" ],
	
	"a"		: [ "style", "class", "rel", 
				"title", "href" ],
	"img"		: [ "style", "class", "src", "height", "width", 
				"alt", "longdesc", "title", "hspace", 
				"vspace", "srcset", "sizes"
				"data-srcset", "data-src", 
				"data-sizes" ],
	"figure"	: [ "style", "class" ],
	"figcaption"	: [ "style", "class" ],
	"picture"	: [ "style", "class" ],
	"table"		: [ "style", "class", "cellspacing", 
					"border-collapse", 
					"cellpadding" ],
	
	"thead"		: [ "style", "class" ],
	"tbody"		: [ "style", "class" ],
	"tfoot"		: [ "style", "class" ],
	"tr"		: [ "style", "class" ],
	"td"		: [ "style", "class", "colspan", 
				"rowspan" ],
	"th"		: [ "style", "class", "scope", 
				"colspan", "rowspan" ],
	
	"caption"	: [ "style", "class" ],
	"col"		: [ "style", "class" ],
	"colgroup"	: [ "style", "class" ],
	
	"summary"	: [ "style", "class" ],
	"details"	: [ "style", "class" ],
	
	"q"		: [ "style", "class", "cite" ],
	"cite"		: [ "style", "class" ],
	"abbr"		: [ "style", "class" ],
	"blockquote"	: [ "style", "class", "cite" ],
	"body"		: []
}
JSON
);

// Whitelist of limited form HTML tags for plugins
// It is strongly recommended that this list be kept small
define( 'FORM_WHITE',	<<<JSON
{
	"form"		: [ "id", "method", "action", "enctype", "style", "class" ], 
	"input"		: [ "id", "type", "name", "required", , "max", "min", 
				"value", "size", "maxlength", "checked", 
				"disabled", "style", "class" ],
	"label"		: [ "id", "for", "style", "class" ], 
	"textarea"	: [ "id", "name", "required", "rows", "cols",  
				"style", "class" ],
	"select"	: [ "id", "name", "required", "multiple", "size", 
				"disabled", "style", "class" ],
	"option"	: [ "id", "value", "disabled", "style", "class" ],
	"optgroup"	: [ "id", "label", "style", "class" ]
}
JSON
);

// Default content security policy
define( 'DEFAULT_JCSP',		<<<JSON
{
	"img-src"		: "*",
	"style-src"		: "'self'",
	"script-src"		: "'self'",
	"form-action"		: "'self'",
	"frame-ancestors"	: "'self'"
}
JSON
);

/**
 *  URL validation regular expressions
 */
define(
	'RX_URL', 
	'~^(http|ftp)(s)?\:\/\/((([\pL\pN\-]{1,25})(\.)?){2,9})($|\/.*$){4,255}$~i'
);
define( 'RX_XSS2',		'/(<(s(?:cript|tyle)).*?)/ism' );
define( 'RX_XSS3',		'/(document\.|window\.|eval\(|\(\))/ism' );
define( 'RX_XSS4',		'/(\\~\/|\.\.|\\\\|\-\-)/sm' );


// URL routing placeholders
define( 'ROUTE_MARK',	<<<JSON
{
	"*"	: "(?<all>.+)",
	":id"	: "(?<id>[1-9][0-9]*)",
	":page"	: "(?<page>[1-9][0-9]*)",
	":label": "(?<label>[\\\\pL\\\\pN\\\\s_\\\\-]{1,30})",
	":nonce": "(?<nonce>[a-z0-9]{10,30})",
	":token": "(?<token>[a-z0-9\\\\+\\\\=\\\\-\\\\%]{10,255})",
	":meta"	: "(?<meta>[a-z0-9\\\\+\\\\=\\\\-\\\\%]{7,255})",
	":tag"	: "(?<tag>[\\\\pL\\\\pN\\\\s_\\\\,\\\\-]{1,30})",
	":tags"	: "(?<tags>[\\\\pL\\\\pN\\\\s_\\\\,\\\\-]{1,255})",
	":year"	: "(?<year>[2][0-9]{3})",
	":month": "(?<month>[0-3][0-9]{1})",
	":day"	: "(?<day>[0-9][0-9]{1})",
	":slug"	: "(?<slug>[\\\\pL\\\\-\\\\d]{1,100})",
	":tree"	: "(?<tree>[\\\\pL\\\\/\\\\-\\\\d]{1,255})",
	":file"	: "(?<file>[\\\\pL_\\\\-\\\\d\\\\.\\\\s]{1,120})",
	":find"	: "(?<find>[\\\\pL\\\\pN\\\\s\\\\-_,\\\\.\\\\:\\\\+]{2,255})",
	":redir": "(?<redir>[a-z_\\\\:\\\\/\\\\-\\\\d\\\\.\\\\s]{1,120})"
}
JSON
);

/**
 *  Messages
 */
define( 'MSG_NOTFOUND',		'Page not found' );
define( 'MSG_NOROUTE',		'No route defined' );
define( 'MSG_BADMETHOD',	'Method not allowed' );
define( 'MSG_NOMETHOD',		'Method not implemented' );
define( 'MSG_GENERIC',		'An error has occured' );
define( 'MSG_DENIED',		'Access denied' );
define( 'MSG_INVALID',		'Invalid request' );
define( 'MSG_CODEDETECT',	'Server-side code detected' );
define( 'MSG_EXPIRED',		'This form has expired' );
define( 'MSG_TOOMANY',		'Too many requests' );


/**
 *  Database constants
 */


// General database location placeholder (future use)
define( 'DATA',			'' );

// Cache database (will be created if it doesn't exist)
define( 'CACHE_DATA',		CACHE . 'cache.db' );

// Session database (will be created if it doesn't exist)
define( 'SESSION_DATA',		CACHE . 'session.db' );

// Database connection timeout
define( 'DATA_TIMEOUT',		5 );



/**
 *  Session settings
 */

// Staleness check
define( 'SESSION_EXP',		300 );

// ID random bytes
define( 'SESSION_BYTES',	12 );

// Session throttling levels
define( 'SESSION_STATE_FRESH',	0 );
define( 'SESSION_STATE_LIGHT',	1 );
define( 'SESSION_STATE_MEDIUM',	2 );
define( 'SESSION_STATE_HEAVY',	3 );
define( 'SESSION_STATE_CORRUPT',99 );

/**
 *  Session throttling limits
 */
// Number of rapid requests before throttling begins
define( 'SESSION_LIMIT_COUNT', 5 );

// Seconds between requests before "medium" throttling
define( 'SESSION_LIMIT_MEDIUM', 3 );

// Seconds between requests before "heavy" throttling
define( 'SESSION_LIMIT_HEAVY', 1 );

// Cookie defaults
define( 'COOKIE_EXP', 		86400 );
define( 'COOKIE_PATH',		'/' );
// Restrict cookies to same-site origin (I.E. No third party can snoop)
define( 'COOKIE_RESTRICT',	1 );


/**
 *  Form settings
 */

// Form submission delay in seconds
define( 'FORM_DELAY',		30 );

// Form submission expiration (2 hours)
define( 'FORM_EXPIRE',		7200 );

// Form check statuses (internal use)
define( 'FORM_STATUS_VALID',	0 );
define( 'FORM_STATUS_INVALID',	1 );
define( 'FORM_STATUS_EXPIRED',	2 );
define( 'FORM_STATUS_FLOOD',	3 );

/**********************************************************************
 *                      Caution editing below
 **********************************************************************/



/**
 *  Environment preparation
 */
\date_default_timezone_set( 'UTC' );


/**
 *  Cache database SQL
 */

define( 'CACHE_SQL',		<<<SQL
-- Cache tables
CREATE TABLE caches (
	id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, 
	cache_id TEXT NOT NULL COLLATE NOCASE, 
	ttl INTEGER NOT NULL, 
	content TEXT NOT NULL COLLATE NOCASE, 
	expires DATETIME DEFAULT NULL,
	created DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, 
	updated DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);-- --

CREATE UNIQUE INDEX idx_caches_on_cache_id ON caches ( cache_id ASC );-- --
CREATE INDEX idx_caches_on_expires ON caches ( expires DESC );-- --
CREATE INDEX idx_caches_on_created ON caches ( created ASC );-- --
CREATE INDEX idx_caches_on_updated ON caches ( updated );-- --

-- Cache triggers
CREATE TRIGGER cache_after_insert AFTER INSERT ON caches FOR EACH ROW 
BEGIN
	-- Generate expiration
	UPDATE caches SET 
		expires = datetime( 
			( strftime( '%s','now' ) + NEW.ttl ), 
			'unixepoch' 
		) WHERE rowid = NEW.rowid;
	
	-- Clear expired data
	DELETE FROM caches WHERE 
		strftime( '%s', expires ) < 
		strftime( '%s', updated );
END;-- --

-- Change only update period when TTL is empty
CREATE TRIGGER cache_after_update AFTER UPDATE ON caches FOR EACH ROW 
WHEN NEW.updated < OLD.updated AND NEW.ttl = 0
BEGIN
	UPDATE caches SET updated = CURRENT_TIMESTAMP 
		WHERE rowid = NEW.rowid;
END;-- --

-- Change expiration period when TTL exists
CREATE TRIGGER cache_after_update_ttl AFTER UPDATE ON caches FOR EACH ROW 
WHEN NEW.updated < OLD.updated AND NEW.ttl <> 0
BEGIN
	-- Change expiration
	UPDATE caches SET updated = CURRENT_TIMESTAMP, 
		expires = datetime( 
			( strftime( '%s','now' ) + NEW.ttl ), 
			'unixepoch' 
		) WHERE rowid = NEW.rowid;
END;-- --

-- Post content
CREATE TABLE posts(
	id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, 
	post_path TEXT NOT NULL COLLATE NOCASE,
	post_view TEXT NOT NULL COLLATE NOCASE,
	post_bare TEXT NOT NULL COLLATE NOCASE, 
	post_summary TEXT DEFAULT '' COLLATE NOCASE, 
	post_type TEXT DEFAULT '' COLLATE NOCASE, 
	updated DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	published DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);-- --
CREATE INDEX idx_post_updated ON posts( updated DESC );-- --
CREATE INDEX idx_post_published ON posts( published DESC );-- --
CREATE UNIQUE INDEX idx_post_path ON posts( post_path );-- --

-- Tag tables
CREATE TABLE tags (
	id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, 
	slug TEXT NOT NULL COLLATE NOCASE, 
	term TEXT NOT NULL COLLATE NOCASE,
	post_count INTEGER NOT NULL DEFAULT 0
);-- --
CREATE UNIQUE INDEX idx_tag_slug ON tags( slug ASC );-- --

CREATE TABLE post_tags(
	id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, 
	post_id INTEGER NOT NULL REFERENCES posts( id ) 
		ON DELETE CASCADE,
	tag_slug TEXT NOT NULL COLLATE NOCASE
);-- --
CREATE INDEX idx_post_tags_id ON post_tags( post_id );-- --
CREATE INDEX idx_post_tags_slug ON post_tags( tag_slug );-- --
CREATE UNIQUE INDEX idx_post_tags ON post_tags( post_id, tag_slug );-- --

-- Tag triggers
CREATE TRIGGER tag_after_insert AFTER INSERT ON post_tags FOR EACH ROW 
BEGIN
	UPDATE tags SET post_count = ( post_count + 1 )
		WHERE slug = NEW.tag_slug;
END;-- --

CREATE TRIGGER tag_before_delete BEFORE DELETE ON post_tags FOR EACH ROW 
BEGIN
	UPDATE tags SET post_count = ( post_count - 1 )
		WHERE slug = OLD.tag_slug;
END;-- --

-- Searching
CREATE VIRTUAL TABLE post_search 
	USING fts4( body, tokenize=unicode61 );-- --

CREATE TRIGGER post_insert AFTER INSERT ON posts FOR EACH ROW 
BEGIN
	INSERT INTO post_search( docid, body ) 
		VALUES ( NEW.id, NEW.post_bare );
END;-- --

CREATE TRIGGER post_update AFTER UPDATE ON posts FOR EACH ROW 
BEGIN
	UPDATE post_search SET body = NEW.post_bare 
		WHERE docid = NEW.id;
END;-- --

CREATE TRIGGER post_delete BEFORE DELETE ON posts FOR EACH ROW 
BEGIN
	DELETE FROM post_search WHERE docid = OLD.id;
END;-- --


-- Post info for sibling posts
CREATE VIEW post_siblings AS SELECT DISTINCT 
	p.post_path AS post_path, 
	( SELECT post_path FROM posts prev
		WHERE prev.published IS NOT NULL AND
			strftime( '%s', prev.published ) <= 
			strftime( '%s', p.published ) 
			AND prev.post_path IS NOT p.post_path
			ORDER BY prev.published DESC LIMIT 1 
	) AS prev_path, 
	
	-- Next published sibling
	( SELECT post_path FROM posts nxt 
		WHERE nxt.published IS NOT NULL AND 
			strftime( '%s', nxt.published ) > 
			strftime( '%s', p.published ) 
			AND nxt.post_path IS NOT p.post_path
			ORDER BY nxt.published ASC LIMIT 1 
	) AS next_path
	
	FROM posts p;
SQL
);

/**
 *  Sessions database
 */
define( 'SESSION_SQL',		<<<SQL
-- Visitor/User sessions
CREATE TABLE sessions(
	id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
	session_id TEXT DEFAULT NULL COLLATE NOCASE,
	session_data TEXT DEFAULT NULL COLLATE NOCASE,
	created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	updated TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);-- --
CREATE UNIQUE INDEX idx_session_id ON sessions( session_id );-- --
CREATE INDEX idx_session_created ON sessions( created DESC );-- --
CREATE INDEX idx_session_updated ON sessions( updated DESC );-- --

CREATE TRIGGER session_update AFTER UPDATE ON sessions
BEGIN
	UPDATE sessions SET updated = CURRENT_TIMESTAMP 
		WHERE id = NEW.id;
END;
SQL
);





/**
 *  Helpers
 */


/**
 *  String to list helper
 *  
 *  @param string	$text	Input text to break into items
 *  @param bool		$lower	Convert Mixed/Uppercase text to lowercase if true
 *  @param string	$sep	String delimiter, defaults to comma
 */
function trimmedList( string $text, bool $lower = false, string $sep = ',' ) : array {
	$map = \array_map( 'trim', \explode( $sep, $text ) );
	return $lower ? \array_map( 'strtolower', $map ) : $map;
}

/**
 *  Suhosin aware checking for function availability
 *  
 *  @param string	$func	Function name
 *  @return bool		True If the function isn't available 
 */
function missing( $func ) : bool {
	static $exts;
	static $blocked;
	static $fn	= [];
	if ( isset( $fn[$func] ) ) {
		return $fn[$func];
	}
	
	if ( \extension_loaded( 'suhosin' ) ) {
		if ( !isset( $exts ) ) {
			$exts = \ini_get( 'suhosin.executor.func.blacklist' );
		}
		if ( !empty( $exts ) ) {
			if ( !isset( $blocked ) ) {
				$blocked = trimmedList( $exts, true );
			}
			
			$search		= \strtolower( $func );
			
			$fn[$func]	= (
				false	== \function_exists( $func ) && 
				true	== \array_search( $search, $blocked ) 
			);
		}
	} else {
		$fn[$func] = !\function_exists( $func );
	}
	
	return $fn[$func];
}

/**
 *  Store and send rendering templates
 *  
 *  @param string	$lable		Template name to send back
 *  @param array	$reg		New templates to initiaize registry or override existing templates
 *  @return string
 */
function template( string $label, array $reg = [] ) : string {
	static $tpl	= [];
	
	// New templates? Append to current store
	if ( !empty( $reg ) ) {
		$tpl = \array_merge( $tpl, $reg );
	}
	
	return $tpl[$label] ?? '';
}

/**
 *  Check if script is running with the latest supported PHP version
 *  
 *  @param string	$spec		Last supported PHP version
 *  @return bool
 */
function newPHP( string $spec = '7.3' ) : bool {
	static $v;
	
	if ( !isset( $v ) ) {
		// Default supported list or overridden list in config.json
		$v	= 
		trimmedList( config( 'supported_php', \SUPPORTED_PHP ) );
		
		// Fix for 7.4.0 etc... appearing higher than 7.4
		$v	= 
		\array_map( function( $r ) {
			return rtrim( $r, '.0' );
		}, $v );
	}
	
	if ( \in_array( $spec, $v ) ) {
		return 
		\version_compare( \PHP_VERSION, $spec, '>=' ) ? true : false;
	}
	
	return false;
}

/**
 *  Hooks and extensions
 *  Append a hook handler in [ 'event', 'handler' ] format
 *  Call the hook event in [ 'event', args... ] format
 *  
 *  @param array	$params		[ 'event', 'handler' ]
 */
function hook( array $params ) {
	static $handlers	= [];
	static $output		= [];
	
	// Nothing to add?
	if ( empty( $params ) ) { return; }
	
	// First parameter is the event name
	$name			= 
	\strtolower( \array_shift( $params ) );
	
	// Prepare event to receive handlers
	if ( !isset( $handlers[$name] ) ) {
		$handlers[$name]	= [];
	}
	
	// Adding a handler to the given event?
	// Need an event name and a handler
	if ( 
		\is_string( $params[0] )	&& 
		\is_callable( $params[0] )
	) {
		$handlers[$name][]	= $params[0];
		
	// Handler being called with parameters, if any
	} else {
		// Asking for hook-named output?
		if ( \is_string( $params[0] ) && empty( $params[0] ) ) {
			return $output[$name] ?? [];
		}
		
		// Execute handlers in order and store in output
		foreach( $handlers[$name] as $handler ) {
			$output[$name] = 
			$handler( 
				$name, $output[$name] ?? [], ...$params 
			) ?? [];
		}
	}
}

/**
 *  Flatten a multi-dimensional array into a path map
 *  
 *  @link https://stackoverflow.com/a/2703121
 *  
 *  @param array	$items		Raw item map (parsed JSON)
 *  @param string	$delim		Phrase separator in E.G. {lang:}
 *  @return array
 */ 
function flatten(
	array		$items, 
	string		$delim	= ':'
) : array {
	$it	= new \RecursiveIteratorIterator( 
			new \RecursiveArrayIterator( $items )
		);
	
	$out	= [];
	foreach ( $it as $leaf ) {
		$path = '';
		foreach ( \range( 0, $it->getDepth() ) as $depth ) {
			$path .= 
			\sprintf( 
				"$delim%s", 
				$it->getSubIterator( $depth )->key() 
			);
		}
		$out[$path] = $leaf;
	}
	
	return $out;
}



/**
 *  Hook result rendering helpers
 */

/**
 *  Check for non-empty string result from hook
 *  
 *  @param string	$event		Hook event name
 *  @param string	$default	Fallback content
 *  @return array
 */
function hookStringResult( string $event, string $default = '' ) : string {
	$sent	= hook( [ $event, '' ] );
	return 
	( !empty( $sent ) && \is_string( $sent ) ) ? $sent : $default;
}

/**
 *  Check for non-empty array result from hook
 *  
 *  @param string	$event		Hook event name
 *  @param array	$default	Fallback content
 *  @return array
 */
function hookArrayResult( string $event, array $default = [] ) : array {
	$sent	= hook( [ $event, '' ] );
	return 
	( !empty( $sent ) && \is_array( $sent ) ) ? $sent : $default;
}

/**
 *  Get HTML from hook result, if sent
 *  
 *  @param string	$event		Hook event name
 *  @param string	$default	Fallback html content
 *  @return string
 */
function hookHTML( string $event, string $default = '' ) : string {
	return hookArrayResult( $event )['html'] ?? $default;
}

/**
 *  Get HTML render template from hook result, if sent
 *  
 *  @param string	$event		Hook event name
 *  @param string	$default	Fallback template
 *  @param array	$input		Component to apply template to
 *  @param bool		$full		Render full regions
 *  @return string
 */
function hookTemplateRender( 
	string	$event, 
	string	$default,
	array	$input,
	bool	$full	= false
) : string {
	return 
	render( 
		hookArrayResult( $event )['template'] ?? 
		hookStringResult( $event, $default ), $input, $full
	);
}

/**
 *  Wrap component region in 'before' and 'after' event hooks and their output
 *  
 *  @param string	$before		Before template parsing event
 *  @param string	$after		After template parsing event
 *  @param string	$tpl		Base component template
 *  @param array	$input		Raw component data
 *  @param bool		$full		Render full regions
 *  @return string
 */
function hookWrap( 
	string		$before, 
	string		$after, 
	string		$tpl		= '', 
	array		$input		= [],
	bool		$full		= false
) {
	// Call "before" event hook
	hook( [ $before, [ 
		'data' => $input, 'template' => $tpl, 'full' => $full 
	] ] );
	
	// Prepend any HTML output and render the new ( or old ) template
	$html	= hookHTML( $before ) . 
			hookTemplateRender( $before, $tpl, $input, $full );
	
	// Call "after" event hook
	hook( [ $after, [ 
		'data'		=> $input,	// Raw component data
		'before'	=> $before,	// Event called before
		'html'		=> $html,	// Current HTML
		'full'		=> $full,	// Full region render
		'template'	=> $tpl		// New or previously replaced
	] ] );
	
	// Send any replaced HTML or already rendered HTML
	return hookHTML( $after, $html );
}


/**
 *  Collection of functions to execute after content sent
 */
function shutdown() {
	static $registered	= [];
	$args			= \func_get_args();
	
	// Shutdown called
	if ( empty( $args ) ) {
		hook( [ 'shutdown', [] ] );
		foreach( $registered as $k => $v ) {
			if ( \is_array( $v ) ) {
				$k( ...$v );
			} elseif ( $v !== null ) {
				$k( $v );
			} else {
				$k();
			}
		}
		
		// End
		die();
	}
	
	if ( \is_callable( $args[0] ) ) {
		$registered[$args[0]] = $args[1] ?? null;
	}
}

/**
 *  Guess if current request is secure
 */
function isSecure() : bool {
	$ssl	= $_SERVER['HTTPS'] ?? '0';
	$frd	= 
		$_SERVER['HTTP_X_FORWARDED_PROTO'] ?? 
		$_SERVER['HTTP_X_FORWARDED_PROTOCOL'] ?? 
		$_SERVER['HTTP_X_URL_SCHEME'] ?? 'http';
	
	if ( 
		0 === \strcasecmp( $ssl, 'on' )		|| 
		0 === \strcasecmp( $ssl, '1' )		|| 
		0 === \strcasecmp( $frd, 'https' )
	) {
		return true;
	}
	
	return 
	( 443 == ( int ) ( $_SERVER['SERVER_PORT'] ?? 80 ) );
}


/**
 *  Standard request parameter helpers
 */

/**
 *  Browser User Agent
 *  
 *  @return string
 */
function getUA() : string {
	static $ua;
	if ( isset( $ua ) ) {
		return $ua;
	}
	$ua	= trim( $_SERVER['HTTP_USER_AGENT'] ?? '' );
	return $ua;
}

/**
 *  Get full request URI
 *  
 *  @return string
 */
function getURI() : string {
	static $uri;
	if ( isset( $uri ) ) {
		return $uri;
	}
	$uri	= $_SERVER['REQUEST_URI'] ?? '';
	return $uri;
}

/**
 *  Get or guess current server protocol
 *  
 *  @param string	$assume		Default protocol to assume if not given
 *  @return string
 */
function getProtocol( string $assume = 'HTTP/1.1' ) : string {
	static $pr;
	if ( isset( $pr ) ) {
		return $pr;
	}
	$pr = $_SERVER['SERVER_PROTOCOL'] ?? $assume;
	return $pr;
}

/**
 *  Current querystring, if present
 *  
 *  @return string
 */
function getQS() : string {
	static $qs;
	if ( isset( $qs ) ) {
		return $qs;
	}
	$qs	= $_SERVER['QUERY_STRING'] ?? '';
	return $qs;
}

/**
 *  Current client request method
 *  
 *  @return string
 */
function getMethod() : string {
	static $method;
	if ( isset( $method ) ) {
		return $method;
	}
	$method = 
	\strtolower( trim( $_SERVER['REQUEST_METHOD'] ?? '' ) );
	return $method;
}


/**
 *  Parameter filter helpers
 */

/**
 *  Filter number within min and max range, inclusive
 *  
 *  @param mixed	$val		Given default value
 *  @param int		$min		Minimum, returned if less than this
 *  @param int		$max		Maximum, returned if greater than this
 *  @return int
 */
function intRange( $val, int $min, int $max ) : int {
	$out = ( int ) $val;
	
	return 
	( $out > $max ) ? $max : ( ( $out < $min ) ? $min : $out );
}

/**
 *  Logging safe string
 */
function logStr( $text, int $len = 255 ) : string {
	return truncate( pacify( ( string ) ( $text ?? '' ) ), 0, $len );
}

/**
 *  Check log file size and rollover, if needed
 *  
 *  @param string	$file	Log file name
 */
function logRollover( string $file ) {
	// Nothing to rollover
	if ( !\file_exists( $file ) ) {
		return;
	}
	
	$fs	= \filesize( $file );
	// Empty file
	if ( false === $fs ) {
		return;
	}
	
	$cf	= config( 'max_log_size', \MAX_LOG_SIZE, 'int' );
	if ( $fs > $cf ) {
		backupFile( $file, false, 'log', 0 );
	}
}

/**
 *  Currently set application name in configuration or default app name
 *  
 *  @return string
 */
function appName() : string {
	static $app;
	if ( isset( $app ) ) {
		return $app;
	}
	$app = title( config( 'app_name', \APP_NAME ) );
	if ( empty( $app ) ) {
		$app = title( \APP_NAME );
	}
	return $app;
}

/**
 *  Email sending message helper
 *  
 *  @param array	$rec		List of recipients (must match whitelist)
 *  @param string	$subject	Message heading
 *  @param string	$msg		Mail body
 *  @param bool		$html		Format email as HTML if true
 *  @return bool
 */
function mailMessage(
	array	$rec,
	string	$subject,
	string	$msg,
	bool	$html		= false
) : bool {
	static $hheaders = [
		'MIME-Version: 1.0',
		'Content-Type: text/html; charset="UTF-8"',
		'Content-Transfer-Encoding: base64'
	];
	
	static $theaders = [
		'MIME-Version: 1.0',
		'Content-Type: text/plain; charset="UTF-8"'
	];
	
	// Check if mail function is disabled
	if ( missing( 'mail' ) ) {
		shutdown( 
			'logError', 
			'Email: mail() Has been disabled. Check the disable_function list in php.ini.' 
		);
		return false;
	}
	
	$msg	 = trim( $msg );
	if ( empty( $msg ) ) {
		shutdown( 'logError', 'Email: Message cannot be empty.' );
		return false;
	}
	
	$mfr	= cleanEmail( config( 'mail_from', \MAIL_FROM ) );
	if ( empty( $mfr ) ) {
		shutdown( 
			'logError', 
			'Email: Sender address is invalid. Check mail_form config setting.' 
		);
		return false;
	}
	
	// HTML or plain text headers
	$headers 	= $html ? $hheaders : $theaders;
	$headers[]	= 'From: ' . $mfr;
	
	// Mailer hook
	hook( [ 'mailmessage', [ 
		'headers'	=> $headers,
		'html'		=> $html,
		'recipients'	=> $rec,
		'subject'	=> $subject,
		'message'	=> $msg,
		'senderip'	=> getIP(),
		'senderua'	=> getUA()
	] ] );
	
	// Load mail hook replacements
	$res	= hookArrayResult( 'mailmessage' );
	
	// Override with hook results if any
	$rcpt	= $res['recipients'] ?? $rec;
	
	// Check sender whitelist
	$mrl	= config( 'mail_whitelist', \MAIL_WHITELIST );
	$mwhite	= \is_array( $mrl ) ? 
			\array_map( 'cleanEmail', $mrl ) : 
			lineSettings( $mrl, -1, 'cleanEmail' );
	
	// Nothing in whitelist?
	$mwhite = \array_filter( $mwhite );
	if ( empty( $mwhite ) ) {
		shutdown( 
			'logError',
			'Email: No valid recipients found. Check whitelist.'
		);
		return false;
	}
	
	// Consistent addresses
	$mwhite	= \array_unique( \array_map( 'lowercase', $mwhite ) );
	$rcpt	= \array_unique( \array_map( 'lowercase', $rcpt ) );
	
	// Check recipient whitelist
	$names	= [];
	foreach( $rcpt as $r ) {
		if ( \in_array( $r, $mwhite, true ) ) {
			$names[] = $r;
		}
	}
	
	if ( empty( $names ) ) {
		shutdown( 
			'logError', 
			'Email: No matching recipients in whiltelist.'
		);
		return false;
	}
	
	// Format user input
	$subj	= entities( unifySpaces( $res['subject'] ?? $subject ) );
	$msg	.= "\r\n\r\nReceived from: " . getIP() . "  \r\n" . getUA();
	$msg	= html( $res['message'] ?? $msg, '', false, true );
	
	$ok	= 
	mail( 
		\implode( ',', $names ), 
		$subj, 
		$html ? \base64_encode( $msg ) : \strip_tags( $msg ), 
		\array_map( 'unifySpaces', $headers ) 
	);
	
	if ( $ok ) {
		shutdown( 
			'logNotice', 
			'Email: Sent from ' . getIP() . ' Subject: ' . $subj
		);
		return true;
	}
	shutdown( 
		'logError', 
		\error_get_last()['message'] ?? 'Email: Error sending message'
	);
	return false;
}

/**
 *  Generic message logging helper for notices and errors
 *  
 *  @param string	$dest		Log storage destination
 *  @param string	$fields		Header fields
 *  @param string	$msg		Logging message
 *  @param string	$stype		Message logging type
 *  @return bool			True if successful
 */
function logMessage(
	string		$dest,
	string		$fields, 
	string		$msg,
	string		$stype		= 'file' 
) : bool {
	// TODO: Combine email and file logging. Only file logging for now.
	if ( 0 !== \strcasecmp( $stype, 'file' ) ) {
		return false;
	}
	
	// Log friendly date and time format
	$dt	= \gmdate( 'Y-m-d H:i:s' );
	
	logRollover( $dest );
	
	// Prepare line with date and time
	if ( \file_exists( $dest ) ) {
		$msg	= $dt . ' '. $msg;
	// New file? Prepare line with header fields, date and time
	} else {
		$msg	= '#Software: ' . appName() . "\n#Date: $dt\n#Fields: " . 
			$fields . "\n\n" . $dt . ' '. $msg;
	}
	
	\touch( $dest );
	
	// PHP's built-in logger
	return \error_log( $msg . "\n", 3, $dest );
}

/**
 *  Error logging
 *  
 *  @param string	$err	Error message to store
 *  @param bool		$app	Application error if true, visitor error if false
 *  @return bool		True if successful
 */
function logError( string $err, bool $app = true ) : bool {
	$file	= \CACHE . ( $app ? \ERROR : \ERROR_VISIT );
	$err	= $app ? unifySpaces( $err ) : truncate( $err, 0, 2048 );
	
	// Visitor errors have more header fields
	$fields = $app ? 
		"date, time, s-comment\n\n" : 
		"date, time, sc-status, c-ip, cs-method, s-comment, cs-useragent, cs-uri\n\n";
	return logMessage( $file, $fields, $err );
}

/**
 *  Message logging
 *  
 *  @param string	$msg	Notification message
 *  @return bool		True if successful
 */
function logNotice( string $msg ) : bool {
	return 
	logMessage( 
		\CACHE . \NOTICE, 
		'date, time, s-comment',
		truncate( unifySpaces( $msg ), 0, 2048 ) 
	);
}

/**
 *  Log visitor error
 *  
 *  @param int		$code	Error type
 *  @param string	$msg	Custom message
 *  @return bool
 */
function visitorError( int $code = 0, string $msg = '-' ) {
	$mt	= getMethod();
	
	$ua	= logStr( $_SERVER['HTTP_USER_AGENT'] ?? '-' );
	$me	= logStr( empty( $mt ) ? 'unknown' : $mt );
	$uri	= logStr( getURI() );
	
	$err	= $code . ' ' . getIP() . ' ' . $me . ' ' . $msg . ' ' . 
			$ua . ' ' . $uri;
	
	shutdown( 'logError', [ $err, false ] );
}


/**
 *  Safely encode array to JSON
 *  
 *  @return string
 */
function encode( array $data = [] ) : string {
	if ( empty( $data ) ) {
		return '';
	}
	
	$out = 
	\json_encode( 
		$data, 
		\JSON_HEX_TAG | \JSON_HEX_APOS | \JSON_HEX_QUOT | 
		\JSON_HEX_AMP | \JSON_UNESCAPED_UNICODE | 
		\JSON_PRETTY_PRINT 
	);
	
	return ( false === $out ) ? '' : $out;
}

/**
 *  Safely decode JSON to array
 *  
 *  @return array
 */
function decode( string $data = '', int $depth = 10 ) : array {
	if ( empty( $data ) ) {
		return [];
	}
	$depth	= intRange( $depth, 1, 50 );
	$out	= 
	\json_decode( 
		\utf8_encode( $data ), true, $depth, 
		\JSON_BIGINT_AS_STRING
	);
	
	if ( empty( $out ) || false === $out ) {
		return [];
	}
	
	return $out;
}

/**
 *  Path prefix slash (/) helper
 */
function slashPath( string $path, bool $suffix = false ) : string {
	return $suffix ?
		\rtrim( $path, '/\\' ) . '/' : 
		'/'. \ltrim( $path, '/\\' );
}

/**
 *  Split a block of text into an array of lines
 *  
 *  @param string	$text	Raw text to split into lines
 *  @param int		$lim	Max line limit, defaults to unlimited
 *  @param bool		$tr	Also trim lines if true
 *  @return array
 */
function lines( string $text, int $lim = -1, bool $tr = true ) : array {
	return $tr ?
	\preg_split( 
		'/\s*\R\s*/', 
		trim( $text ), 
		$lim, 
		\PREG_SPLIT_NO_EMPTY 
	) : 
	\preg_split( '/\R/', $text, $lim, \PREG_SPLIT_NO_EMPTY );
}

/**
 *  Helper to turn items (one per line) into a unique value array
 *  
 *  @param string	$text	Lined settings (one per line)
 *  @param int		$lim	Maximum number of items
 *  @param string	$filter	Optional filter name to apply
 *  @return array
 */
function lineSettings( string $text, int $lim, string $filter = '' ) : array {
	$ln = \array_unique( lines( $text ) );
	
	$rt = ( ( count( $ln ) > $lim ) && $lim > -1 ) ? 
		\array_slice( $ln, 0, $lim ) : $ln;
	
	return 
	( !empty( $filter ) && \is_callable( $filter ) ) ? 
		\array_map( $filter, $rt ) : $rt;
}

/**
 *  Get presets as lined items (one item per line)
 *  
 *  @param string	$label		Preset unique identifier
 *  @param string	$base		Setting name in config.json
 *  @param mixed	$default	Defined configuration
 *  @param string	$data		String block of items
 */ 
function linePresets(
	string		$label,
	string		$base,
			$default, 
	string		$data
) {
	static $prs	= [];
	
	if ( isset( $prs[$label] ) ) {
		return $prs[$label];
	}
	
	// Maximum number of items
	$lim		= config( $base, $default, 'int' );
	$prs[$label]	= lineSettings( $data, $lim );
	
	return $prs[$label];
}

/**
 *  Create a datestamped backup of the given file before moving or copying it
 *  
 *  @param string	$file	File name path
 *  @param bool		$copy	Copy if true, rename if false
 *  @param string	$ext	Backup file extension (defaults to bkp)
 *  @param int		$fx	Prepend or append extension
 *  				1 = Prefix, 0 = Suffix, other = Add nothing
 *  
 *  @return bool		True if no action needed or action successful
 */
function backupFile(
	string	$file,
	bool	$copy, 
	string	$ext	= 'bkp',
	int	$fx	= 0
) : bool {
	if ( !\file_exists( $file ) ) {
		return true;
	}
	
	// Filter file extension
	$ext	= labelName( $ext );
	
	// Extension mode
	$prefix = $fx == 1 ? \rtrim( $ext, '.' ) . '.' : '';
	$suffix	= $fx == 0 ? '.' . \ltrim( $ext, '.' ) : '';
	
	// Backup file name inferred from full file path
	$name	= 
	slashPath( \dirname( $file ), true ) . $prefix . 
		\gmdate( 'Ymd\THis' ) . '.' . 
		\basename( $file ) . $suffix;
	
	return $copy ? \copy( $file, $name ) : \rename( $file, $name );
}

/**
 *  Load file contents and check for any server-side code		
 */
function loadFile( string $name ) : string {
	static $loaded	= [];
	
	// Check if already loaded
	if ( isset( $loaded[$name] ) ) {
		return $loaded[$name];
	}
	
	// Relative path to storage
	$fname	= \CACHE . $name;
	if ( !\file_exists( $fname ) ) {
		return '';
	}
	
	$ext		= 
	\pathinfo( $fname, \PATHINFO_EXTENSION ) ?? '';
	
	switch( \strtolower( $ext ) ) {
		case 'json':
		case 'config':
			// Clean comments and junk while loading
			$data	= \php_strip_whitespace( $fname );
			break;
			
		default:
			$data = \file_get_contents( $fname );
	}
	
	// Nothing loaded?
	if ( false === $data ) {
		return '';
	}
	
	if ( false !== \strpos( $data, '<?php' ) ) {
		shutdown( 'cleanup' );
		
		// Prevent circular failure if config file contained the error
		if ( 0 == \strcasecmp( $name, CONFIG ) ) {
			shutdown();
		}
		send( 500, \MSG_CODEDETECT );
	}
	
	$loaded[$name] = $data;
	
	return $data;
}

/**
 *  Get text content as an array of lines
 *  
 *  @param mixed	$raw	Post content or file path
 *  @param bool		$fl	Content is in a file
 *  @param bool		$skip	Skip empty lines when loading
 */
function loadText( $raw, bool $fl = true, bool $skip = false ) {
	static $loaded	= [];
	$key		= $raw . ( string ) $fl;
	
	if ( isset( $loaded[$key] ) ) {
		return $loaded[$key];
	}
	
	// Get content from files
	if ( $fl ) {
		if ( \file_exists( $raw ) ) {
			$data	= $skip ? 
			\file( $raw, 
				\FILE_IGNORE_NEW_LINES | \FILE_SKIP_EMPTY_LINES 
			) : \file( $raw, \FILE_IGNORE_NEW_LINES );
			
			if ( false === $data ) {
				return [];
			}
		} else {
			return [];
		}
	
	// Or break content into lines
	} else {
		$data	= explode( "\n", $raw );
	}
	
	if ( empty( $data ) ) {
		return [];
	}
	
	// Remove empty lines from beginning of post 
	// (titles etc...)
	while( "" === trim( \current( $data ) ) ) {
		\array_shift( $data );
	}
	
	if ( empty( $data ) ) {
		return [];
	}
	
	// Empty lines from end of post 
	// (tags etc...)
	while( "" === trim( \end( $data ) ) ) {
		\array_pop( $data );
	}
	
	\reset( $data );
	$loaded[$key]	= $data;
	return $data;
}

/**
 *  Load file into array, optionally return the first n lines
 *  
 *  @param string	$name	File name to load from storage 
 *  @param int		$lines	Return only the first lines if not zero
 *  @param bool		$filter	Filters lines that start with ; or #
 *  @param bool		$skip	Skip empty lines when loading
 */
function loadArray( 
	string		$name,
	int		$lines	= 0,
	bool		$filter	= true,
	bool		$skip	= true
) {
	static $loaded	= [];
	$key		= $name . ( string ) $filter;
	
	// Prefiltered ?
	if ( isset( $loaded[$key] ) ) {
		return ( $lines > 0 ) ? 
			\array_slice( $loaded[$key], 0, $lines ) : 
			$loaded[$key];
	}
	
	$data	= loadText( $name, $skip, true );
	if ( empty( $data ) ) {
		return [];
	}
	
	// Filtered?
	if ( $filter ) {
		$data	= \array_filter( \array_map( 'trim', $data ) );
		$data	= 
		\array_filter( $data, function( $val ) {
			// Skip if the first line starts with colon or pound
			return (
				0 !== \strpos( $val, ';' ) && 
				0 !== \strpos( $val, '#' )
			);
		} );
	}
	
	$loaded[$key] = $data;
	
	// Specific number of lines?
	return ( $lines > 0 ) ? \array_slice( $data, 0, $lines ) : $data;
}

/**
 *  Helper to trigger configmodified event on parameter change
 *  
 *  @param array	$params		Configuration settings
 *  @param array	$modify		Changed parameters
 *  @return array
 */
function modifiedConfig( array $params, array $modify ) : array {
	if ( count( $modify ) ) {
		$params = \array_merge( $params, $modify );
		hook( [ 'configmodified', $params ] );
	}
	
	// Call configuration checking event
	hook( [ 'checkconfig', $params ] );
	
	// Send filtered params from event
	return hook( [ 'checkconfig', '' ] );
}

/**
 *  Load JSON formatted configuration file
 *  
 *  @param string	$file		File name
 *  @param array	$modify		New settings
 *  @return array
 */
function loadConfig( string $file, array $modify = [] ) : array {
	static $params;
	
	if ( isset( $params ) ) {
		// Modifying after params were already loaded?
		if ( !empty( $modify ) ) {
			$params = modifiedConfig( $params, $modify );
		}
		return $params;
	}
	
	$data	= loadFile( $file );
	if ( empty( $data ) ) {
		$params = [];
		return $params;
	}
	
	$params	= decode( $data );
	
	// Check for any modifications and run events/filters
	if ( !empty( $modify ) ) {
		$params = modifiedConfig( $params, $modify );
	}
	
	return $params;
}

/**
 *  File saving helper with auto backup
 *  
 *  @param string	$name		Destination file name
 *  @param string	$data		File contents
 *  @param int		$fx		Prefix 'bkp.', suffix '.bkp', or nothing
 *  @param bool		$append		Append to file instead of replacing it
 */
function saveFile( 
	string	$name, 
	string	$data, 
	int	$fx		= 0,
	bool	$append		= false
) : bool {
	$file = \CACHE . $name;
	
	// Backup failed? Don't overwrite
	if ( !backupFile( $file, true, 'bkp', $fx ) ) {
		return false;
	}
	
	if ( $append ) {
		return 
		( false === \file_put_contents( 
			$file, $data, \FILE_APPEND | \LOCK_EX 
		) ) ? false : true;
	}
	
	return 
	( false === \file_put_contents( $file, $data, \LOCK_EX ) ) ? 
		false : true;
}

/**
 *  Save configuration to config.json
 *  
 *  @param array	$params		Configuration settings
 *  @return bool
 */
function saveConfig() : bool {
	if ( !internalState( 'configModified' ) ) {
		return false;
	}
	
	// Load new config from 
	$params	= hook( [ 'configmodified', '' ] );
	$data	= encode( $params );
	if ( empty( $data ) ) {
		return false;
	}
	
	return saveFile( CONFIG, $data, 1 );
}

/**
 *  Register or get internal state
 *  
 *  @param string	$name		State name
 *  @param mixed	$value		State value, defaults to false if unset
 */
function internalState( string $name, $value = null ) {
	static $state = [];
	if ( empty( $value ) ) {
		return $state[$name] ?? false;
	}
	
	$state[$name] = $value;
}

/**
 *  Set to fire when configuration has been changed
 */
function configModified( string $event, array $hook, array $params ) {	
	internalState( 'configModified', true );
}

/**
 *  Get configuration setting or default value
 *  
 *  @param string	$name		Configuration setting name
 *  @param mixed	$default	If not set, fallback value
 *  @param string	$type		String, integer, or boolean
 *  @return mixed
 */
function config( string $name, $default, string $type = 'string' ) {
	$config = loadConfig( \CONFIG );
	switch( $type ) {
		case 'int':
		case 'integer':
			return ( int ) ( $config[$name] ?? $default );
			
		case 'bool':
		case 'boolean':
			return ( bool ) ( $config[$name] ?? $default );
			
		default:
			return $config[$name] ?? $default;
	}
}

/**
 *  Helper to determine if given hash algo exists or returns default
 *  
 *  @param string	$token		Configuration setting name
 *  @param string	$default	Defined default value
 *  @param bool		$hmac		Check hash_hmac_algos() if true
 *  @return string
 */
function hashAlgo(
	string	$token, 
	string	$default, 
	bool	$hmac		= false 
) : string {
	static $algos	= [];
	$t		= $token . ( string ) $hmac;
	if ( isset( $algos[$t] ) ) {
		return $algos[$t];
	}
	
	$ht		= config( $token, $default );
	
	$algos[$t]	= 
		\in_array( $ht, 
			( $hmac ? \hash_hmac_algos() : \hash_algos() ) 
		) ? $ht : $default;
		
	return $algos[$t];	
}



/**
 *  Language translation
 */

/**
 *  Load and process language file
 *  
 *  @return array
 */
function language() {
	static $data;
	
	if ( isset( $data ) ) {
		return $data;
	}
	
	// Set default language and append language file definitions
	$terms	= decode( \DEFAULT_LANGUAGE );
	$lang	= config( 'language', \LANGUAGE );
	$file	= loadFile( $lang . '.json' );
	if ( !empty( $file ) ) {
		$terms	= 
		\array_merge_recursive( $terms,  decode( $file ) );
	}
	
	$data	= empty( $terms ) ? [] : $terms;
	// Trigger language load hook
	hook( [ 'loadlanguage', [ 
		'lang'	=> $lang, 
		'zone'	=> config( 'timezone', \TIMEZONE ),
		'terms' => $data
	] ] );
	
	// Append new language info, if any
	$sent	= hookArrayResult( 'loadlanguage' )['terms'] ?? [];
	if ( !empty( $sent ) ) {
		$data	= \array_merge( $data, $sent );
	}
	
	return $data;
}

/**
 *  Get language specific terms
 *  
 *  @param string	$name		Language substitution label
 *  @param string	$default	Default value if not given
 *  @return string
 */
function langVar( string $name, string $default ) {
	$data = language();
	return $data[$name] ?? $default;
}

/**
 *  Get translation file error message with fallback
 *  
 *  @param string	$name		Language substitution label
 *  @param string	$default	Fallback value if not available
 *  @return string
 */
function errorLang( string $name, string $default ) {
	$data = language();
	return $data['errors'][$name] ?? $default;
}

/**
 *  Term replacement helper
 *  Flattens multidimensional array into {$prefix:group:label...} format
 *  and replaces matching placeholders in content
 *  
 *  @param string	$prefix		Replacement prefix E.G. 'lang'
 *  @param array	$data		Multidimensional array
 *  @param string	$content	Placeholders to replace
 *  @return string
 */ 
function prefixReplace(
	string		$prefix, 
	array		$data, 
	string		$content
) : string {
	// Find placeholders with given prefix
	\preg_match_all( 
		'/\{' . $prefix . '(\:[\:a-z_]{1,100}+)\}/i', 
		$content, $m 
	);
	// Convert data to :group:label... format
	$terms	= flatten( $data );
	
	// Replacements list
	$rpl	= [];
	
	$c	= \count( $m );
	
	// Set {prefix:group:label... } replacements or empty string
	for( $i = 0; $i < $c; $i++ ) {
		if ( !isset( $m[1] ) ) {
			continue;
		}
		
		if ( !isset( $m[1][$i] ) ) {
			continue;
		}
		$rpl['{' . $prefix . $m[1][$i] . '}']	= 
			$terms[$m[1][$i]] ?? '';
	}
	
	return \strtr( $content, $rpl );
}

/**
 *  Scan template for language placeholders
 *  
 *  @param string	$tpl	Loaded template data
 *  @return string
 */
function parseLang( string $tpl ) : string {
	$tpl		= prefixReplace( 'lang', language(), $tpl );
	
	// Change variable placeholders
	return \preg_replace( '/\s*__(\w+)__\s*/', ' {\1} ', $tpl );
}




/**
 *  Template helpers
 */

/**
 *  Hompage link with website and relative path root
 *  
 *  @return string
 */
function homeLink() : string {
	static $home;
	if ( isset( $home ) ) {
		return $home;
	}
	
	$home = website() . getRoot();
	return $home;
}

/**
 *  Syndication feed link
 *  
 *  @return string
 */
function feedLink() : string {
	static $feed;
	if ( isset( $feed ) ) {
		return $feed;
	}
	
	$feed = homelink() . eventRoutePrefix( 'feed', 'feed' );
	return $feed;
}

/**
 *  Create home navigation link
 *  
 *  @return string
 */
function navHome() : string {
	static $home;
	if ( isset( $home ) ) {
		return $home;
	}
	
	$url	= homeLink();
	hook( [ 'homelink', [ 'url' => $url ] ] );
	$html	= hookHTML( 'homelink' );
	if ( !empty( $html ) ) {
		$home = $html;
		return $html;
	}
	
	$home	= 
	render( template( 'tpl_home_link' ), [ 
		'url'	=> $url, 
		'text'	=> template( 'tpl_home' )
	] );
	
	return $home;
}

/**
 *  Create next/previous pagination links
 *  
 *  @param int		$page		Current page index
 *  @param string	$prefix		Relative path prefix added to links
 *  @param array	$posts		Array of entries
 *  @return string
 */
function paginate( int $page, string $prefix, array $posts ) : string {
	$plimit	= config( 'page_limit', \PAGE_LIMIT, 'int' );
	$c	= count( $posts );
	
	hook( [ 'paginate', [ 
		'page'		=> $page, 
		'limit'		=> $plimit, 
		'prefix'	=> $prefix, 
		'posts'		=> $posts, 
		'count'		=> $c,
		'type'		=> 'nextprev'
	] ] );
	
	$html	= hookHTML( 'paginate' );
	if ( !empty( $html ) ) {
		return $html;
	}
	
	if ( $c < $plimit ) {
		return '';
	}
	
	$out	= '';
	if ( $page > 1 ) {
		$pm1	= $page - 1;
		$p	= ( $pm1 > 1 )? 
				( $prefix . 'page' . $pm1 ) : $prefix;
		$out	.= 
		render( template( 'tpl_prevlink' ), [ 
			'url'	=> $p,
			'text'	=> template( 'tpl_previous' )
		] ); 
	}
	
	if ( $c >= $plimit ) {
		$out	.=
		render( template( 'tpl_nextlink' ), [ 
			'url'	=> $prefix . 'page'. ( $page + 1 ),
			'text'	=> template( 'tpl_next' )
		] ); 
	}
	
	return 
	render( template( 'tpl_page_nextprev' ), [ 'links' => $out ] );
}

/**
 *  Navigation link formatter
 *  
 *  @param string	$wrap		Link wrapper template
 *  @param mixed	$def		Link JSON definition
 *  @return string
 */
function renderNavLinks(
	string		$wrap,
			$def
) {
	$links	= \is_array( $def ) ? $def : 
			decode( $def )[ 'links'] ?? [];
	
	$out	= '';
	$tpl	= template( 'tpl_page_nav_link' );
	foreach ( $links as $v ) {
		$out	.= render( $tpl, $v );
	}
	
	// Replace any home link references
	$out	= render( $out, [ 
		'home'		=> homeLink(),
		'feedlink'	=> feedLink()
	] );
	
	// Return language replaced
	return render( $wrap, [ 'links' => $out ] );
}

/**
 *  Footer template rendering helper
 *  
 *  @return string
 */
function pageFooter() : string {
	// Footer with home link set
	
	$flinks	= config( 'default_footer_links', \DEFAULT_FOOTER_LINKS );
	return 
	render( template( 'tpl_page_footer' ), [ 
		'footer_links'=> 
			renderNavLinks( 
				template( 'tpl_footernav_wrap' ), 
				$flinks
			),
		'home'		=> homeLink(),
		'feedlink'	=> feedLink()
	] );
}

/**
 *  Load and change each placeholder into a key
 *  
 *  @return array
 */
function loadClasses() : array {
	$cls	= config( 'default_classes', decode( \DEFAULT_CLASSES ) );
	// Trigger class load hook
	hook( [ 'loadcssclasses', [ 'classes' => $cls ] ] );
	
	// Intercept extra classes and/or existing class replacements
	$sent	= hookArrayResult( 'loadcssclasses' )['classes'] ?? [];
	if ( !empty( $sent ) ) {
		$cls	= \array_merge( $cls, $sent );
	}
		
	$cv	= [];
	
	// Add new or appened classes while removing duplicates
	foreach( $cls as $k => $v ) {
		$cv['{' . $k . '}'] = 
			\implode( ' ', uniqueTerms( bland( $v ) ) );
	}
	return $cv;
}

/**
 *  Get or override render store pairs
 *  
 *  @param string	$area	Template store placeholder area
 *  @param array	$modify	New placeholder replacements
 *  @return array
 */ 
function rsettings( string $area, array $modify = [] ) : array {
	static $store = [];
		
	if ( !isset( $store[$area] ) ) {
		switch( $area ) {
			case 'classes':
				$store['classes']	= loadClasses();
				break;
				
			case 'styles':
				$s = config( 'default_stylesheets', \DEFAULT_STYLESHEETS );
				$store['styles']	= \is_array( $s ) ? $s : 
				linePresets( 
					'stylesheets', 
					'style_limit', 
					\STYLE_LIMIT, 
					$s
				);
				break;
				
			case 'scripts':
				$s = config( 'default_scripts', \DEFAULT_SCRIPTS );
				$store['scripts']	= \is_array( $s ) ? $s : 
				linePresets( 
					'scripts', 
					'script_limit', 
					\SCRIPT_LIMIT,
					$s
				);
				break;
			
			case 'meta':
				// Load custom meta tags
				$meta = config( 'default_meta', \DEFAULT_META );
				
				$store['meta']		= 
					\is_string( $meta ) ? decode( $meta ) : 
						[ 'meta' => $meta ];
				break;
			
			default:
				$store[$area]	= [];
		}
	}
	
	if ( empty( $modify ) ) {
		return $store[$area];
	}
	
	$store[$area] = 
	\array_unique( \array_merge( $store[$area], $modify ) );
	
	return $store[$area];
}

/**
 *  Get all the CSS classes of the given render segment
 *  
 *  @param string	$name	CSS applicable area
 *  @return array
 */
function getClasses( string $name ) : array {
	$cls	= rsettings( 'classes' );
	$n	= '{' . bland( $name ) . '}';
	$va	= [];
	foreach( $cls as $k => $v ) {
		if ( 0 != \strcmp( $n , $k ) ) {
			continue;
		}
		$va	= uniqueTerms( $v );
		break;
	}
	
	return $va;
}

/**
 *  Overwrite the CSS class(es) of a render segment
 *  
 *  @param string	$name	CSS applying segment name
 *  @param string	$value	CSS new CSS parameters
 */
function setClass( string $name, string $value ) {
	rsettings( 
		'classes', 
		[ '{' . bland( $name ) . '}' => bland( $value ) ] 
	);
}

/**
 *  Add a CSS class to render segment
 *  
 *  @param string	$name	CSS applying segment name
 *  @param string	$value	New CSS classes
 */
function addClass( string $name, string $value ) {
	$vls	= 
	\preg_split( 
		'/\s+/', $value, -1, \PREG_SPLIT_NO_EMPTY 
	);
	
	$cls	= \array_merge( getClasses( $name ), $vls );
	
	setClass( $name, \implode( ' ', \array_unique( $cls ) ) );
}

/**
 *  Remove a CSS class from the segment's class list
 *  
 *  @param string	$name	CSS segment name
 *  @param string	$value	Removing class(es)
 */
function removeClass( string $name, string $value ) {
	$vls	= 
	\preg_split( 
		'/\s+/', $value, -1, \PREG_SPLIT_NO_EMPTY 
	);
	
	$cls	= \array_diff( getClasses( $name ), $vls );
	setClass( $name, \implode( ' ', \array_unique( $cls ) ) );
}

/**
 *  Special tag rendering helper (scripts, links etc...)
 *  
 *  @param string	$tpl	Rendering template
 *  @param string	$label	Region placeholder
 *  @param string	$tag	Tag replacement template
 *  @param string	$region	Region setting name
 *  @return string
 */
function regionTags(
	string		$tpl,
	string		$label,
	string		$tag, 
	string		$region 
) : string {
	$rg	= rsettings( $region );
	$rgo	= '';
	
	switch( $region ) {
		// Render meta tags
		case 'meta':
			$i = config( 'meta_limit', \META_LIMIT, 'int' );
			foreach ( $rg['meta'] ?? [] as $k => $v ) {
				if ( $i < 0 ) {
					break;
				}
				$rgo .= render( $tag, $v );
				$i--;
			}
			break;
		
		default:
			foreach( $rg as $r ) {
				$rgo .= 
				render( $tag, [ 'url' => $r ] );
			}
	
	}
	
	return \strtr( $tpl, [ $label => $rgo ] );
}

/**
 *  Append values to placeholder terms used in templates
 *  
 *  @param array	$region		Placeholder > value pair
 */
function setRegion( array $region = [] ) {
	static $presets = [];
	
	if ( empty( $region ) ) {
		return $presets;
	}
	
	foreach ( $region as $k => $v ) {
		$presets[$k] = ( $presets[$k] ?? '' ) . $v;
	}
}

/**
 *  Find template {regions} set in the HTML
 *  Template regions must consist of letters, underscores, and no spaces
 *  
 *  @param string	$tpl	Raw HTML template without content yet
 *  @return array
 */
function findTplRegions( string $tpl ) : array {
	if ( \preg_match_all( '/(?<=\{)([a-z_]+)(?=\})/i', $tpl, $m ) ) {
		return $m[0];
	}
	return [];
}

/**
 *  Apply region preset content to placeolders in the given template
 *  
 *  @param string	$tpl	Page template
 *  @return string
 */
function renderRegions( string $tpl ) : string {
	
	// Stylesheets, JavaScript, and Meta tags
	$tpl	= 
	regionTags( $tpl, '{stylesheets}', \TPL_STYLE_TAG, 'styles' );
	
	$tpl	= 
	regionTags( $tpl, '{body_js}', \TPL_SCRIPT_TAG, 'scripts' );
	
	$tpl	= 
	regionTags( $tpl, '{meta_tags}', \TPL_META_TAG, 'meta' );
	
	$sa	= config( 'shared_assets', \SHARED_ASSETS );
	return \strtr( $tpl, [ '{shared_assets}' => $sa ] );
}

/**
 *  Format template with classes, assets, and language parameters
 *  
 *  @param string	$tpl	Rendering template
 *  @param array	$input	Placeholder replacements
 *  @param bool		$full	Complete render including regions if true
 *  @return string
 */
function render(
	string	$tpl,
	array	$input	= [],
	bool	$full		= false 
) : string {
	static $cache	= [];
	static $regions	= [];
	$key		= hash( 'sha1', ( string ) $full . $tpl );
	
	// Check cache
	if ( !isset( $cache[$key] ) ) {
		// Full render?
		$tpl		= $full ? 
			parseLang( renderRegions( $tpl ) ) : 
			parseLang( $tpl );
		
		// Apply component classes
		$cache[$key]	= 
		\strtr( $tpl, rsettings( 'classes' ) );
		
		// Find render regions
		$regions[$key]	= findTplRegions( $cache[$key] );
	}
	
	// Always set defaults
	$input['home']		= $input['home']	?? homeLink();
	$input['feedlink']	= $input['feedlink']	?? feedLink();
	$input['plugin_assets']	= 
		$input['plugin_assets'] ?? \PLUGIN_ASSETS;
	
	$out		= [];
	
	// Set content in regions or place empty string
	foreach( $regions[$key] as $k => $v ) {
		// Set render content or clear it
		$out['{' . $v .'}'] =  $input[$v] ?? '';
	}
	
	// Template render  event
	hook( [ 'templaterender', [ 
		'template'	=> $tpl,
		'input'		=> $input,
		'placeholders'	=> $out 
	] ] );
	
	$out	= hookArrayResult( 'templaterender', $out );
	
	// Parse appended
	$tpl		= parseLang( \strtr( $cache[$key], $out ) );
	
	// Finally set classes again
	return \strtr( $tpl, rsettings( 'classes' ) );
}


/**
 *  Generators
 */

/**
 *  Generate a random string ID based on given random bytes
 *  
 *  @param int		$bytes		Size of random bytes
 *  @return string
 */
function genId( int $bytes = 16 ) : string {
	return \bin2hex( \random_bytes( intRange( $bytes, 1, 16 ) ) );
}

/**
 *  Generate a system time based sqeuential random ID
 *  
 *  Note: Downgrading from PHP 7.3 to 7.2 may cause IDs to appear out 
 *  of sync
 *  
 *  @return string
 */
function genSeqId() : string {
	if ( newPHP( '7.3' ) ) {
		$t = ( string ) \hrtime( true );
	} else {
		list( $us, $se ) = 
			\explode( ' ', \microtime() );
		$t = $se . $us;
	}
	
	return 
	\base_convert( $t, 10, 16 ) . \genId();
}

/**
 *  Generate an alphanumeric string with 32 bytes of random data
 *  
 *  @return string
 */
function genAlphaNum() : string {
	return 
	\preg_replace( 
		'/[^[:alnum:]]/u', 
		'', 
		\base64_encode( \random_bytes( 32 ) ) 
	);
}

/**
 *  Generate a fixed length string in ASCII space, no special chars
 *  This is primarily a plugin helper
 *  
 *  @param int	$size	Code size between 1 and 24, inclusive
 *  @return string
 */
function genCodeKey( int $size = 24 ) : string {
	$size	= intRange( $size, 1, 24 );
	$code	= '';
	while ( strsize( $code ) < $size ) {
		$code .= genAlphaNum();
	}
	
	return truncate( $code, 0, $size );
}




/**
 *  Database
 */

/**
 *  Get the SQL definition from DSN
 *  
 *  @param string	$dsn	User defined database path
 *  @return array
 */
function loadSQL( string $dsn ) : array {
	// Get list of user-defined constants
	$cts	= \get_defined_constants( true );
	$my	= \array_flip( $cts['user'] );
	
	// Get the first component from the definition
	// E.G. "CACHE" from "CACHE_DATA"
	$def	= \explode( '_', $my[$dsn] )[0];
	
	// E.G. CACHE_SQL definition
	$src	= \constant( $def . '_SQL' ) ?? '';
	
	// If SQL isn't defined, try to load SQL file with the lowercase DSN
	if ( empty( $src ) ) {
		$src = loadFile( lowercase( $dsn ) . '.sql' );
		if ( empty( $src ) ) {
			return [];
		}
	}
	
	// SQL Lines from defined component + "_SQL"
	return lines( $src, -1, false );
}

/**
 *  Create database tables based on DSN
 *  
 *  @param object	$db	PDO Database object
 *  @param string	$dsn	Database path associated with PDO object
 */
function installSQL( \PDO $db, string $dsn ) {
	$parse	= [];
	
	$lines	= loadSQL( $dsn );
	if ( empty( $lines ) ) {
		return;
	}
	
	// Filter SQL comments and lines starting PRAGMA
	foreach ( $lines as $l ) {
		if ( \preg_match( '/^(\s+)?(--|PRAGMA)/is', $l ) ) {
			continue;
		}
		$parse[] = $l;
	}
	
	// Separate into statement actions
	$qr	= \explode( '-- --', \implode( " \n", $parse ) );
	foreach ( $qr as $q ) {
		if ( empty( trim( $q ) ) ) {
			continue;
		}
		$db->exec( $q );
	}
}

/**
 *  Get database connection
 *  
 *  @param string	$dsn	Connection string
 *  @param string	$mode	Return mode
 *  @return mixed		PDO object if successful or else null
 */
function getDb( string $dsn, string $mode = 'get' ) {
	static $db	= [];
	
	switch( $mode ) {
		case 'close':	
			if ( isset( $db[$dsn] ) ) {
				$db[$dsn] = null;
				unset( $db[$dsn] );
			}
			return;
		
		case 'closeall':
			foreach( $db as $k => $v  ) {
				$db[$k] = null;
				unset( $db[$k] );
			}
			return;
		
		default:
			if ( empty( $dsn ) ) {
				return null;
			}
	}
	
	if ( isset( $db[$dsn] ) ) {
		return $db[$dsn];
	}
	
	// First time? SQLite database will be created
	$first_run	= !\file_exists( $dsn );
	
	$opts	= [
		\PDO::ATTR_TIMEOUT		=> \DATA_TIMEOUT,
		\PDO::ATTR_DEFAULT_FETCH_MODE	=> \PDO::FETCH_ASSOC,
		\PDO::ATTR_PERSISTENT		=> false,
		\PDO::ATTR_EMULATE_PREPARES	=> false,
		\PDO::ATTR_ERRMODE		=> 
			\PDO::ERRMODE_EXCEPTION
	];
	
	try {
		$db[$dsn]	= 
		new \PDO( 'sqlite:' . $dsn, null, null, $opts );
	} catch ( \PDOException $e ) {
		logError( 
			'Error connecting to database ' . $dsn . 
			' Messsage: ' . $e->getMessage() ?? 'PDO Exception'
		);
		die();
	}
	
	// Preemptive defense
	$db[$dsn]->exec( 'PRAGMA quick_check;' );
	$db[$dsn]->exec( 'PRAGMA trusted_schema = OFF;' );
	$db[$dsn]->exec( 'PRAGMA cell_size_check = ON;' );
	
	// Prepare defaults if first run
	if ( $first_run ) {
		$db[$dsn]->exec( 'PRAGMA encoding = "UTF-8";' );
		$db[$dsn]->exec( 'PRAGMA page_size = "16384";' );
		$db[$dsn]->exec( 'PRAGMA auto_vacuum = "2";' );
		$db[$dsn]->exec( 'PRAGMA temp_store = "2";' );
		$db[$dsn]->exec( 'PRAGMA secure_delete = "1";' );
		
		// Load and process SQL
		installSQL( $db[$dsn], $dsn );
		
		// Instalation check
		$db[$dsn]->exec( 'PRAGMA integrity_check;' );
		$db[$dsn]->exec( 'PRAGMA foreign_key_check;' );
	}
	
	$db[$dsn]->exec( 'PRAGMA journal_mode = WAL;' );
	$db[$dsn]->exec( 'PRAGMA foreign_keys = ON;' );
	
	if ( $first_run ) {
		// Run db created hook
		hook( [ 'dbcreated', [ 'dbname' => $dsn ] ] );
	}
	
	return $db[$dsn];
}

/**
 *  Helper to get the result from a successful statement execution
 *  
 *  @param array	$params	Parameters 
 *  @param string	$rtype	Return type
 *  @param PDOStatement	$stm	PDO prepared statement
 *  @return mixed
 */
function getDataResult( array $params, string $rtype, \PDOStatement $stm ) {
	$ok	= empty( $params ) ? 
			$stm->execute() : 
			$stm->execute( $params );
	
	switch ( $rtype ) {
		// Query with array return
		case 'results':
			return $ok ? $stm->fetchAll() : [];
		
		// Insert with ID return
		case 'insert':
			return $ok ? $db->lastInsertId() : 0;
		
		// Single column value
		case 'column':
			return $ok ? $stm->fetchColumn() : '';
		
		// Success status
		default:
			return $ok ? true : false;
	}
}

/**
 *  Shared data execution routine
 *  
 *  @param string	$sql	Database SQL
 *  @param array	$params	Parameters 
 *  @param string	$rtype	Return type
 *  @param string	$dsn	Database string
 *  @return mixed
 */
function dataExec(
	string		$sql,
	array		$params,
	string		$rtype,
	string		$dsn
) {
	$db	= getDb( $dsn );
	$res	= null;
	
	try {
		$stm	= $db->prepare( $sql );
		$res	= getDataResult( $params, $rtype, $stm );
		
	} catch( \PDOException $e ) {
		$stm	= null;
		shutdown( 'logError', $e->getMessage() ?? 'PDO Exception' );
		return null;
	}
	
	$stm	= null;
	return $res;
}

/**
 *  Update or insert multiple database rows at once with single SQL
 *  
 *  @param string	$sql	Database SQL update query
 *  @param array	$params	Collection of query parameters
 *  @param string	$rtype	Return type
 *  @param string	$dsn	Database string
 *  @return array		Result status
 */
function dataBatchExec (
	string		$sql,
	array		$params,
	string		$rtype,
	string		$dsn		= \DATA
) : array {
	$db	= getDb( $dsn );
	$res	= [];
	
	try {
		if ( !$db->beginTransaction() ) {
			return false;
		}
		
		$stm	= $db->prepare( $sql );
		foreach ( $params as $p ) {
			$res[]	= getDataResult( $params, $rtype, $stm );
		}
		$db->commit();
		
	} catch( \PDOException $e ) {
		shutdown( 'logError', $e->getMessage() ?? 'PDO Exception' );
	}
	
	return $res;
}

/**
 *  Helper to turn a range of input values into an IN() parameter
 *  
 *  @example Parameters for [value1, value2] become "IN (:paramIn_0, :paramIn_1)"
 *  
 *  @param array	$values		Raw parameter values
 *  @param array	$params		PDO Named parameters sent back
 *  @param string	$prefix		SQL Prepended fragment prefix
 *  @param string	$prefix		SQL Appended fragment suffix
 *  @return string
 */
function getInParam(
	array		$values, 
	array		&$params, 
	string		$prefix		= 'IN (', 
	string		$suffix		= ')'
) : string {
	$sql	= '';
	$p	= '';
	$i	= 0;
	
	foreach ( $values as $v ) {
		$p		= ':paramIn_' . $i;
		$sql		.= $p .',';
		$params[$p]	= $v;
		
		$i++;
	}
	
	// Remove last comma and close parenthesis
	return $prefix . rtrim( $sql, ',' ) . $suffix;
}

/**
 *  Get parameter result from database
 *  
 *  @param string	$sql	Database SQL query
 *  @param array	$params	Query parameters
 *  @param string	$dsn	Database string
 *  @return array		Query results
 */
function getResults(
	string		$sql, 
	array		$params		= [],
	string		$dsn		= \DATA
) : array {
	$res = dataExec( $sql, $params, 'results', $dsn );
	return 
	empty( $res ) ? [] : ( \is_array( $res ) ? $res : [] );
}

/**
 *  Create database update
 *  
 *  @param string	$sql	Database SQL update query
 *  @param array	$params	Query parameters (required)
 *  @param string	$dsn	Database string
 *  @return bool		Update status
 */
function setUpdate(
	string		$sql,
	array		$params,
	string		$dsn		= \DATA
) : bool {
	$res = dataExec( $sql, $params, 'success', $dsn );
	return empty( $res ) ? false : true;
}

/**
 *  Insert record into database and return last ID
 *  
 *  @param string	$sql	Database SQL insert
 *  @param array	$params	Insert parameters (required)
 *  @param string	$dsn	Database string
 *  @return int			Last insert ID
 */
function setInsert(
	string		$sql,
	array		$params,
	string		$dsn		= \DATA
) : int {
	$res = dataExec( $sql, $params, 'insert', $dsn );
	return 
	empty( $res ) ? 0 : ( \is_numeric( $res ) ? ( int ) $res : 0 );
}

/**
 *  Get a single item row by ID
 *  
 *  @return array
 */
function getSingle(
	int		$id,
	string		$sql,
	string		$dsn		= \DATA
) : array {
	$data	= getResults( $sql, [ ':id' => $id ], $dsn );
	if ( empty( $data ) ) {
		return $data[0];
	}
	return [];
}

/**
 *  Close the session and any open connections
 */
function cleanup() {
	hook( [ 'cleanup', [] ] );
	if ( \session_status() === \PHP_SESSION_ACTIVE ) {
		\session_write_close();
	}
	
	getDb( '', 'closeall' );
	saveConfig();
}

/**
 *  Plugin loading event handler
 */
function loadPlugins( string $event, array $hook, array $params ) {
	// This should be the first function called 
	// so there shouldn't be any previous return data
	if ( !empty( $hook ) ) {
		logError( 'Out of order call. Check hooks.' );
		die();
	}
	
	$pl		= config( 'plugins_enabled', \PLUGINS_ENABLED );
	if ( empty( $pl ) ) {
		// Nothing to load
		return;
	}
	
	$plugins	= trimmedList( $pl, true );
	$msg		= [];
	$loaded		= [];
	
	// Preload templates
	$templates	= $params['templates'] ?? [];
	
	foreach ( $plugins as $p ) {
		// Generate and check full plugin file path
		$path = \PLUGINS . $p . DIRECTORY_SEPARATOR . $p . '.php';
		if ( empty( filterDir( $path, \PLUGINS ) ) ) {
			$msg[]		= $p;
			continue;
		}
		
		// Load plugin if it exists or add to failed list
		if ( \file_exists( $path ) ) {
			require( $path );
			$loaded[]	= $p;
		} else {
			$msg[]		= $p;
		}
	}
	
	// Set plugin list
	internalState( 'loadedPlugins', $loaded );
	
	// Register new templates or overwrite existing
	template( '', $templates );
	
	if ( !empty( $msg ) ) {
		shutdown( 
			'logError', 
			'Error loading plugins(s): ' . 
				\implode( ', ', $msg ) . 
				' From directory: ' . \PLUGINS
		);
	}
	hook( [ 'pluginsLoaded', [ 'plugins' => $p, 'failed' => $msg ] ] );
}



/**
 *  Caching
 */

/**
 *  Generate cache key for the given URI
 *  This function lets caches be invalidated if config.json has been modified
 *  
 *  @param string	$uri		Original, URI as cache key
 *  @return string
 */
function genCacheKey( string $uri ) : string {
	static $fm;
	
	if ( !isset( $fm ) ) {
		$cf	= \CACHE . \CONFIG;
		$fm	= \file_exists( $cf ) ? \filemtime( $cf ) : false;
	}
	
	return 
	\hash( 'sha256', ( false === $fm ) ? $uri : $uri . ( string ) $fm );
}

/**
 *  Get cached data (if any) by URI key
 *  
 *  @param string	$uri		Original URI to check
 *  @return string
 */
function getCache( string $uri ) : string {
	$key	= genCacheKey( $uri );
	hook( [ 'getcache', [ 'uri' => $uri, 'key' => $key ] ] );
	
	$find	= 
	getResults( 
		"SELECT cache_id, content, expires 
		FROM caches WHERE cache_id = :id LIMIT 1;", 
		[ ':id' => $key ], 
		CACHE_DATA 
	);
	
	if ( empty( $find ) ) {
		return '';
	}
	
	// Find expiration
	$row	= $find[0];
	$exp	= \strtotime( $row['expires'] );
	
	// Formatting went wrong?
	if ( false === $exp ) {
		return '';
	}
	
	// Send if TTL 
	if ( $exp >= time() ) {
		return $row['content'];
	}
	
	return '';
}

/**
 *  Save content to cache
 *  
 *  @param string	$uri		URI to set cache to
 *  @param string	$content	Cache data
 */
function saveCache( string $uri, string $content ) {
	$key	= genCacheKey( $uri );
	hook( [ 'savecache', [ 'uri' => $uri, 'key' => $key, 'content' => $content ] ] );
	
	$sql	= 
	"REPLACE INTO caches ( cache_id, ttl, content )
		VALUES ( :id, :ttl, :content );";
	
	$ttl	= config( 'cache_ttl', \CACHE_TTL, 'int' );
	setInsert(
		$sql, 
		[
			':id'		=> $key, 
			':ttl'		=> $ttl, 
			':content'	=> $content 
		], 
		CACHE_DATA 
	);
	
	// Schedule cleanup
	shutdown( 'cleanup' );
}



/**
 *  Session functions
 */

/**
 *  Samesite cookie origin setting
 *  
 *  @return string
 */
function sameSiteCookie() : string {
	if ( \COOKIE_RESTRICT ) {
		return 'Strict';
	}
	
	return isSecure() ? 'None' : 'Lax';
}

/**
 *  Set the cookie options when defaults are/aren't specified
 *  
 *  @param array	$options	Additional cookie options
 *  @return array
 */
function defaultCookieOptions( array $options = [] ) : array {
	$cexp	= config( 'cookie_exp', \COOKIE_EXP, 'int' );
	$cpath	= config( 'cookie_path', \COOKIE_PATH );
	
	$opts	= 
	\array_merge( $options, [
		'expires'	=> 
			( int ) ( $options['expires'] ?? time() + $cexp ),
		'path'		=> $cpath,
		'domain'	=> getHost(),
		'samesite'	=> sameSiteCookie(),
		'secure'	=> isSecure() ? true : false,
		'httponly'	=> true
	] );
	
	hook( [ 'cookieparams', $opts ] );
	return $opts;
}

/**
 *  Get collective cookie data
 *  
 *  @param string	$name		Cookie label name
 *  @param mixed	$default	Default return if cookie isn't set
 *  @return mixed
 */
function getCookie( string $name, $default ) {
	$app = appName();
	if ( !isset( $_COOKIE[$app] ) ) {
		return $default;
	}
	
	if ( !is_array( $_COOKIE[$app]) ) {
		return $default;
	}
	
	return $_COOKIE[$app][$name] ?? $default;
}

/**
 *  Set application cookie
 *  
 *  @param int		$name		Cookie data label
 *  @param mixed	$data		Cookie data
 *  @param array	$options	Cookie settings and options
 *  @return bool
 */
function makeCookie( string $name, $data, array $options = [] ) : bool {
	$options	= defaultCookieOptions( $options );
	
	hook( [ 'cookieset', [ 
		'name'		=> $name, 
		'data'		=> $data, 
		'options'	=> $options 
	] ] );
	if ( newPHP( '7.3' ) ) {
		return 
		\setcookie( appName() . "[$name]", $data, $options );
	}
	
	// PHP < 7.3
	return 
	\setcookie( 
		appName() . "[$name]", 
		$data,
		$options['expires'],
		$options['path'],
		$options['domain'],
		$options['secure'],
		$options['httponly']
	);
}

/**
 *  Remove preexisting cookie
 *  
 *  @param string	$name		Cookie label
 *  @return bool
 */
function deleteCookie( string $name ) : bool {
	hook( [ 'cookiedelete', [ 'name' => $name ] ] );
	return makeCookie( $name, '', [ 'expires' => 1 ] );
}

/**
 *  Set session handler functions
 */
function setSessionHandler() {
	\session_set_save_handler(
		'sessionOpen', 
		'sessionClose', 
		'sessionRead', 
		'sessionWrite', 
		'sessionDestroy', 
		'sessionGC', 
		'sessionCreateID'
	);	
}

/**
 *  Does nothing
 */
function sessionOpen( $path, $name ) { return true; }
function sessionClose() { return true; }

/**
 *  Create session ID in the database and return it
 *  
 *  @return string
 */
function sessionCreateID() {
	$bt	= config( 'session_bytes', \SESSION_BYTES, 'int' );
	$id	= \genId( $bt );
	$sql	= 
	"INSERT OR IGNORE INTO sessions ( session_id )
		VALUES ( :id );";
	if ( dataExec( $sql, [ ':id' => $id ], 'success', \SESSION_DATA ) ) {
		return $id;
	}
	
	// Something went wrong with the database
	logError( 'Error writing to session ID to database' );
	die();
}

/**
 *  Delete session
 *  
 *  @return bool
 */
function sessionDestroy( $id ) {
	$sql	= "DELETE FROM sessions WHERE session_id = :id;";
	if ( dataExec( $sql, [ ':id' => $id ], 'success', \SESSION_DATA ) ) {
		return true;
	}
	return false;
}
	
/**
 *  Session garbage collection
 *  
 *  @return bool
 */
function sessionGC( $max ) {
	$sql	= 
	"DELETE FROM sessions WHERE (
		strftime( '%s', 'now' ) - 
		strftime( '%s', updated ) ) > :gc;";
	if ( dataExec( $sql, [ ':gc' => $max ], 'success', \SESSION_DATA ) ) {
		return true;
	}
	return false;
}
	
/**
 *  Read session data by ID
 *  
 *  @return string
 */
function sessionRead( $id ) {
	$sql	= 
	"SELECT session_data FROM sessions 
		WHERE session_id = :id LIMIT 1;";
	
	$data	= dataExec( $sql, [ 'id' => $id ], 'column', \SESSION_DATA );
	
	hook( [ 'sessionread', [ 'id' => $id, 'data' => $data ] ] );
	return empty( $data ) ? '' : ( string ) $data;
}

/**
 *  Store session data
 *  
 *  @return bool
 */
function sessionWrite( $id, $data ) {
	$sql	= "REPLACE INTO sessions ( session_id, session_data )
			VALUES( :id, :data );";
	if ( dataExec( 
		$sql, [ ':id' => $id, ':data' => $data ], 'success', \SESSION_DATA 
	) ) {
		hook( [ 'sessionwrite', [ 'id' => $id, 'data' => $data ] ] );
		return true;
	}
	return false;
}


/**
 *  Session functionality
 */

	
/**
 *  Session owner and staleness marker
 *  
 *  @link https://paragonie.com/blog/2015/04/fast-track-safe-and-secure-php-sessions
 *  
 *  @param string	$visit	Previous random visitation identifier
 */
function sessionCanary( string $visit = '' ) {
	$bt	= config( 'session_bytes', \SESSION_BYTES, 'int' );
	$exp	= config( 'session_exp', \SESSION_EXP, 'int' );
	
	$_SESSION['canary'] = 
	[
		'exp'		=> time() + $exp,
		'visit'		=> 
		empty( $visit ) ? \genId( $bt ) : $visit
	];
}
	
/**
 *  Check session staleness
 *  
 *  @param bool		$reset	Reset session and canary if true
 */
function sessionCheck( bool $reset = false ) {
	session( $reset );
	
	if ( empty( $_SESSION['canary'] ) ) {
		sessionCanary();
		return;
	}
	
	if ( time() > ( int ) $_SESSION['canary']['exp'] ) {
		$visit = $_SESSION['canary']['visit'];
		\session_regenerate_id( true );
		sessionCanary( $visit );
	}
}

/**
 *  End current session activity
 */
function cleanSession() {
	if ( \session_status() === \PHP_SESSION_ACTIVE ) {
		\session_unset();
		\session_destroy();
		\session_write_close();
	}
}

/**
 *  Set session cookie parameters
 *  
 *  @return bool
 */
function sessionCookieParams() : bool {
	$options		= defaultCookieOptions();
	
	// Override some defaults
	$options['lifetime']	=  
		config( 'cookie_exp', \COOKIE_EXP, 'int' );
	unset( $options['expires'] );
	
	hook( [ 'sessioncookieparams', $options ] );
	if ( newPHP( '7.3' ) ) {
		return \session_set_cookie_params( $options );
	}
	
	// PHP < 7.3
	return 
	\session_set_cookie_params( 
		$options['lifetime'], 
		$options['path'], 
		$options['domain'],
		$options['secure'],
		$options['httponly']
	);
}

/**
 *  Initiate a session if it doesn't already exist
 *  Optionally reset and destroy session data
 *  
 *  @param bool		$reset		Reset session ID if true
 */
function session( $reset = false ) {
	\session_cache_limiter( '' );
	if ( \session_status() === \PHP_SESSION_ACTIVE && !$reset ) {
		return;
	}
	
	if ( \session_status() !== \PHP_SESSION_ACTIVE ) {
		sessionCookieParams();
		\session_name( appName() );
		\session_start();
		
		hook( [ 'sessioncreated', [ 'id' => \session_id() ] ] );
	}
	
	if ( $reset ) {
		\session_regenerate_id( true );
		foreach ( \array_keys( $_SESSION ) as $k ) {
			unset( $_SESSION[$k] );
		}
		
		hook( [ 'sessiondestroyed', [] ] );
	}
}

/**
 *  Last visit session data and timeouts
 *  
 *  @return int
 */
function lastVisit() : int {
	$now	= time();

	// Default return state
	$check 	= \SESSION_STATE_FRESH;
	
	// Check for generally safe extensions requested 
	$nice	= isSafeExt( getURI() );
	
	// First visit?
	$last	= $_SESSION['last'] ?? [];
	if ( empty( $last ) ) {
		$last			= [ $now, 0 ];
		$_SESSION['last']	= $last;
		hook( [ 'lastvisit', [ 
			'check'	=> $check, 
			'last'	=> $last,
			'now'	=> $now,
			'ext'	=> $nice
		] ] );
		return $check;
	}
	
	// Session corrupted?
	if ( !\is_array( $last ) || \count( $last ) !== 2 ) {
		$last			= [ $now, 0 ];
		$_SESSION['last']	= $last;
		$check			= \SESSION_STATE_CORRUPT;
		hook( [ 'lastvisit', [ 
			'check'	=> $check, 
			'last'	=> $last,
			'now'	=> $now,
			'ext'	=> $nice
		] ] );
		return $check;
	}
	
	// Timestamp segments
	$t	= ( int ) ( $last[0] ?? time() );
	$q	= ( int ) ( $last[1] ?? 0 );
	
	// Rapid query limit exceeded?
	$slc = config( 'session_limit_count', \SESSION_LIMIT_COUNT, 'int' );
	if ( $q >= $slc ) {
		$exp	= config( 'session_exp', \SESSION_EXP, 'int' );
		// Delay has timed out? Reset
		if ( ( $t + $exp ) > $now ) {
			$last			= [ $now, 0 ];
			$_SESSION['last']	= $last;
		
		// Generally safe extension?
		} elseif ( $nice ) {
			// Return as-is
			hook( [ 'lastvisit', [ 
				'check'	=> $check, 
				'last'	=> $last,
				'now'	=> $now,
				'ext'	=> $nice
			] ] );
			return $check;
			
		// Still within limit
		// Set time, but keep query limit
		} else {
			$last			= [ $now, $q ];
			$_SESSION['last']	= $last;
			$check			= \SESSION_STATE_LIGHT;
		}
	} else {
		$slh = config( 'session_limit_heavy', \SESSION_LIMIT_HEAVY, 'int' );
		$slm = config( 'session_limit_medium', \SESSION_LIMIT_MEDIUM, 'int' );
		// Generally safe extension?
		if ( $nice ) {
			hook( [ 'lastvisit', [ 
				'check'	=> $check, 
				'last'	=> $last,
				'now'	=> $now,
				'ext'	=> $nice
			] ] );
			return $check;
		
		// Last request less than heavy throttle limit?
		// Probably abuse
		} elseif ( \abs( $now - $t ) < $slh ) {
			$last			= [ $now, $q++ ];
			$_SESSION['last']	= $last;
			$check			= \SESSION_STATE_HEAVY;
			
		// Less than medium throttle limit?
		// Probably just impatient
		} elseif ( \abs( $now - $t ) < $slm ) {
			$last			= [ $now, $q ];
			$_SESSION['last']	= $last;
			$check			= \SESSION_STATE_MEDIUM;
		
		// No limits exceeded. Reset
		} else {
			$last			= [ $now, 0 ];
			$_SESSION['last']	= $last;
		}
	}
	hook( [ 'lastvisit', [ 
		'check'	=> $check, 
		'last'	=> $last,
		'now'	=> $now,
		'ext'	=> $nice
	] ] );
	return $check;
}

/**
 *  Limit requests per session
 */
function sessionThrottle() {
	// Check session
	sessionCheck();
	
	// Sender should not be served for the duration of this session
	if ( isset( $_SESSION['kill'] ) ) {
		sendDenied();
	}
	
	$check		= lastVisit();
	
	// Increase sleep delay
	switch( $check ) {
		// Send Too Many Requests
		case SESSION_STATE_HEAVY:
			visitorError( 429, 'Requests' );
			shutdown( 'cleanup' );
			shutdown( 'sleep', 20 );
			sendError( 429, errorLang( "toomany", \MSG_TOOMANY ) );
			
		// Send Not Modified for the rest
		case SESSION_STATE_MEDIUM:
			shutdown( 'cleanup' );
			shutdown( 'sleep', 10 );
			send( 304 );
			
		case SESSION_STATE_LIGHT:
			shutdown( 'cleanup' );
			shutdown( 'sleep', 5 );
			send( 304 );
	}
}


/**
 *  Content formatting
 */

/**
 *  Convert timestamp to int if it's not in integer format
 *  
 *  @return mixed
 */
function tstring( $stamp ) {
	if ( empty( $stamp ) ) {
		return null;
	}
	
	if ( \is_numeric( $stamp ) ) {
		return ( int ) $stamp;
	}
	
	$st =  \ltrim( 
		\preg_replace( '/[^0-9\/]+/', '', $stamp ), 
		'/' 
	);
	
	return \strtotime( empty( $st ) ? 'now' : $st );
}

/**
 *  UTC timestamp
 *  
 *  @param mixed	$stamp	Plain timestamp or null to generate new
 *  @return string
 */
function utc( $stamp = null ) : string {
	return 
	\gmdate( 'Y-m-d\TH:i:s', tstring( $stamp ?? 'now' ) );
}

/**
 *  Length of given string
 *  
 *  @param string	$text	Raw input
 *  @return int
 */
function strsize( string $text ) : int {
	return missing( 'mb_strlen' ) ? 
		\strlen( $text ) : \mb_strlen( $text, '8bit' );
}

/**
 *  Limit string size
 *  
 *  @param string	$text	Raw input
 *  @param int		$start	Beginning index
 *  @param int		$size	Maximum string length
 *  @return string
 */
function truncate( string $text, int $start, int $size ) {
	if ( strsize( $text ) <= $size ) {
		return $text;
	}
	
	return missing( 'mb_substr' ) ? 
		\substr( $text, $start, $size ) : 
		\mb_substr( $text, $start, $size, '8bit' );
}

/**
 *  Try to detect if a string contains ASCII-only text
 *  
 *  @param string	$text		Text to test
 *  @return bool
 */
function isASCII( string $text ) : bool {
	return missing( 'mb_check_encoding' ) ? 
		( bool ) !\preg_match( '/[^\x20-\x7e]/' , $text ) : 
		\mb_check_encoding( $text, 'ASCII' );
}

/**
 *  Check if a string contains a fragment
 *  
 *  @param mixed	$source		Original text
 *  @param strin	$term		Search term
 */
function textHas( $source, string $term ) : bool {
	return 
	( empty( $source ) || empty( $term ) ) ? 
		false : ( false !== \strpos( ( string ) $source, $term ) );
}

/**
 *  Check if string starts with a fragment
 *  
 *  @param string	$find		Needle to search
 *  @param array	$collection	Haystack to search partials for
 *  @param bool		$ca		Case insensitive if true (default)
 *  @return bool
 */
function textStartsWith( string $find, array $collection, bool $ca = true ) {
	if ( $ca ) {
		foreach ( $collection as $c ) {
			if ( 0 === \strncasecmp( $find, $c, strsize( $c ) ) ) {
				return true;
			}
		} 
	} else {
		foreach ( $collection as $c ) {
			if ( 0 === \strncmp( $find, $c, strsize( $c ) ) ) {
				return true;
			}
		}
	}
	return false;
}

/**
 *  Search string for a fragment in an array
 *  
 *  @param string	$find		Needle to search
 *  @param array	$collection	Haystack to search contained string
 *  @return bool
 */
function textNeedleSearch( string $find, array $collection ) : bool {
	foreach ( $collection as $c ) {
		if ( textHas( $find, $c ) ) {
			return true;
		}
	}
	
	return false;
}

/**
 *  Friendly datetime stamp
 *  
 *  @param mixed	$stamp		Raw datetime stamp, defaults to now
 *  @param string	$fmt		Format from config.json or [lang].json
 *  @return string
 */
function dateNice( $stamp = null, string $fmt = \DATE_NICE ) : string {
	static $dn;
	if ( !isset( $dn ) ) {
		$dn	= 
		langVar( 'date_nice', config( 'date_nice', $fmt ) );
	}
	return \gmdate( $dn, tstring( $stamp ) );
}

/**
 *  Build permalink with page slug with date
 *  
 *  @param string	$slug		Full page URI including date and slug
 *  @param string	$stamp		Converted timestamp in year, month, and day
 *  @return string
*/
function dateSlug( string $slug, string $stamp ) : string {
	$ext = 
	'.' . \pathinfo( $slug, \PATHINFO_EXTENSION ) ?? 'md';
	
	return getRoot() . 
	\gmdate( 'Y/m/d/', \strtotime( $stamp ) ) . 
	\ltrim( \basename( $slug, $ext ), '/' );
}

/**
 *  Feed timestamp
 *  
 *  @param mixed	$stamp		Optional timestamp, defaults to 'now'
 *  @return string
 */
function dateRfc( $stamp = null ) : string {
	return 
	\gmdate( \DATE_RFC2822, tstring( $stamp ?? 'now' ) );
}

/**
 *  File modified timestamp
 *  
 *  @param mixed	$stamp		Optional timestamp, defaults to 'now'
 *  @return string
 */
function dateRfcFile( $stamp = null ) : string {
	return 
	\gmdate( 'D, d M Y H:i:s T', tstring( $stamp ?? 'now' ) );
}

/**
 *  Convert all spaces to single character
 *  
 *  @param string	$text		Raw text containting mixed space types
 *  @param string	$rpl		Replacement space, defaults to ' '
 *  @param string	$br		Preserve line breaks
 *  @return string
 */
function unifySpaces( string $text, string $rpl = ' ', bool $br = false ) : string {
	return $br ?
		\preg_replace( 
			'/[ \t\v\f]+/', $rpl, pacify( $text ) 
		) : 
		\preg_replace( '/[[:space:]]+/', $rpl, pacify( $text ) );
}

/**
 *  Get a list of tokens separated by spaces
 *  
 *  @param string	$text		Raw text containing repeated words
 *  @return array
 */
function uniqueTerms( string $value ) : array {
	return 
	\array_unique( 
		\preg_split( 
			'/[[:space:]]+/', trim( $value ), -1, 
			\PREG_SPLIT_NO_EMPTY 
		) 
	);
}

/**
 *  Clean entry title
 *  
 *  @param mixed	$title	Raw title entered by the user
 *  @param int		$max	Maximum string length
 *  @return string
 */
function title( $text, int $max = 255 ) : string {
	if ( \is_array( $text ) ) {
		return '';
	}
	
	// Unify spaces, tabs, returns etc...
	$text	= 
	unifySpaces( 
		\is_string( $text ) ? $text : ( string ) $text 
	);
	
	return 
	smartTrim( \preg_replace( '/\s+/', ' ', $text ), $max );
}

/**
 *  Normalize unicode characters
 *  
 *  This depends on the Intl extension (usually comes with PHP), 
 *  but needs to be enabled in php.ini
 *  @link https://www.php.net/manual/en/intl.installation.php
 *  
 *  @param string	$text
 *  @return string 
 */
function normal( string $text ) : string {
	if ( missing( 'normalizer_normalize' ) ) {
		return $text;
	}
	
	$normal = 
	\normalizer_normalize( $text, \Normalizer::FORM_C );
	
	return ( false === $normal ) ? $text : $normal;
}

/**
 *  Label name ( ASCII only )
 *  
 *  @param string	$text	Raw label entered into field
 *  @return string
 */
function labelName( string $text ) : string {
	$text	= unifySpaces( $text, '_' );
	
	return 
	smartTrim( \preg_replace( 
		'/^[a-zA-Z0-9_\-\.]/i', '', normal( $text ) 
	), 50 );
}

/**
 *  Process multiple comma delimited whitelists and filter label names
 *  
 *  @param array	$groups		Raw key-value pairs
 *  @param bool		$lower		Values should be lowercase lists
 *  @return array
 */ 
function whiteLists( array $groups, bool $lower = false ) : array {
	$ext = [];
	
	foreach ( $groups as $k => $v ) { 
		$ext[labelName( $k )] = 
		\implode( ',', trimmedList( $v, $lower ) );
	}
	
	return $ext;
}

/**
 *  Convert to unicode lowercase
 *  
 *  @param string	$text	Raw mixed/uppercase text
 *  @return string
 */
function lowercase( string $text ) : string {
	return missing( 'mb_convert_case' ) ? 
		\strtolower( $txt ) : 
		\mb_convert_case( $text, \MB_CASE_LOWER, 'UTF-8' );
}

/**
 *  Limit a string without cutting off words
 *  
 *  @param string	$val	Text to cut down
 *  @param int		$max	Content length (defaults to 100)
 *  @return string
 */
function smartTrim(
	string		$val, 
	int		$max		= 100
) : string {
	$val	= \trim( $val );
	$len	= strsize( $val );
	
	if ( $len <= $max ) {
		return $val;
	}
	
	$out	= '';
	$words	= \preg_split( '/([\.\s]+)/', $val, -1, 
			\PREG_SPLIT_OFFSET_CAPTURE | 
			\PREG_SPLIT_DELIM_CAPTURE );
	
	for ( $i = 0; $i < \count( $words ); $i++ ) {
		$w	= $words[$i];
		// Add if this word's length is less than length
		if ( $w[1] <= $max ) {
			$out .= $w[0];
		}
	}
	
	$out	= \preg_replace( "/\r?\n/", '', $out );
	
	// If there's too much overlap
	if ( strsize( $out ) > $max + 10 ) {
		$out = truncate( $out, 0, $max );
	}
	
	return $out;
}

/**
 *  Convert a string into a page slug
 *  
 *  @param string	$title	Fallback title to generate slug
 *  @param string	$text	Text to transform into a slug
 *  @return string
 */
function slugify( 
	string		$title, 
	string		$text		= ''
) : string {
	if ( empty( $text ) ) {
		$text = $title;
	}
	$text = lowercase( unifySpaces( $text ) );
	$text = \preg_replace( '~[^\\pL\d]+~u', ' ', $text );
	$text = \preg_replace( '/\s+/', '-', \trim( $text ) );
	$text = \preg_replace( '/\-+/', '-', \trim( $text, '-' ) );
	
	return \strtolower( smartTrim( $text ) );
}

/**
 *  Ensure date arguments don't exceed today
 *  
 *  @param array	$args	Date in year, month, day
 *  @return array
 */
function enforceDates( array $args ) : array {
	$now	= time();
	
	// Current year/month/day
	$y	= ( int ) \date( 'Y', $now );
	$m	= ( int ) \date( 'n', $now );
	$d	= ( int ) \date( 'j', $now );
	
	// Requested year/month/day
	$year	= $args['year'] ?? $y;
	$month	= $args['month'] ?? $m;
	$day	= $args['day'] ?? $d;
	
	$ys	= config( 'year_start', \YEAR_START, 'int' );
	
	// Enforce date ranges
	$year	= intRange( $year, $ys, $y );
	
	// Current year? Enforce month to current month or January of this year
	$month	= ( $y == $year ) ? 
			intRange( $month, 1, $m ) : 
			intRange( $month, 1, 12 );
	
	// Days in requested year and month
	$days	= ( int ) \date( 't', \mktime( 0, 0, 0, $month, 1, $year ) );
	
	// No more than the number of days in requested or current year/month
	$day	= ( $year == $y && $month == $m ) ? 
			intRange( $day, 1, $d ) : 
			intRange( $day, 1, $days );
	
	// Format date to string array
	return [
		( string ) $year, 
		\sprintf( '%02d', $month ), 
		\sprintf( '%02d', $day ) 
	];
}

/**
 *  Get the first non-empty server parameter value if set
 *  
 *  @param array	$headers	Server parameters
 *  @param array	$terms		Searching terms
 *  @param bool		$case		Search only in lowercase if true
 *  @return mixed
 */
function serverParamWhite( array $headers, array $terms, bool $case = false ) {
	$found	= null;
	
	foreach ( $headers as $h ) {
		// Skip unset or empty keys
		if ( empty( $_SERVER[$h] ) ) {
			continue;
		}
		
		// Search in lowercase
		if ( $case ) {
			$lc	= \array_map( 'lowercase', $terms );
			$sh	= \lowercase( $_SERVER[$h] );
			$found	= \in_array( $sh, $lc ) ? $sh : '';
		} else {
			$found	= 
			\in_array( $_SERVER[$h], $terms ) ? $_SERVER[$h] : '';
		}
		break;
	}
	return $found;
}

/**
 *  Forwarded HTTP header chain from load balancer
 *  
 *  @return array
 */
function getForwarded() : array {
	static $fwd;
	if ( isset( $fwd ) ) {
		return $fwd;
	}
	
	$fwd	= [];
	$terms	= 
		$_SERVER['HTTP_FORWARDED'] ??
		$_SERVER['FORWARDED'] ?? 
		$_SERVER['HTTP_X_FORWARDED'] ?? '';
	
	// No headers forwarded
	if ( empty( $terms ) ) {
		return [];
	}
	
	$pt	= explode( ';', $terms );
	
	// Gather forwarded values
	foreach ( $pt as $p ) {
		// Break into comma delimited list, if any
		$chain = trimmedList( $p );
		if ( empty( $chain ) ) {
			continue;
		}
		
		foreach ( $chain as $c ) {
			$k = explode( '=', $c );
			// Skip empty or odd values
			if ( count( $k ) != 2 ) {
				continue;
			}
			
			// Existing key?
			if ( isset( $fwd[$k[0]] ) ) {
				// Existing array? Append
				if ( \is_array( $fwd[$k[0]] ) ) {
					$fwd[$k[0]][] = $k[1];
				
				// Multiple values? 
				// Convert to array and then append new
				} else {
					$tmp		= $fwd[$k[0]];
					$fwd[$k[0]]	= [];
					$fwd[$k[0]][]	= $tmp;
					$fwd[$k[0]][]	= $k[1];
 				}
			// Fresh value
			} else {
				$fwd[$k[0]] = $k[1];
			}
		}
	}
	return $fwd;
}

/**
 *  Get the current IP address connection chain including given proxies
 *  
 *  @return array
 */
function getProxyChain() : array {
	static $chain;
	
	if ( isset( $chain ) ) {
		return $chain;
	}
	
	$chain = 
	trimmedList( 
		$_SERVER['HTTP_X_FORWARDED_FOR'] ?? 
		$_SERVER['HTTP_CLIENT_IP'] ?? 
		$_SERVER['REMOTE_ADDR'] ?? '' 
	);
	
	return $chain;
}

/**
 *  Get IP address (best guess)
 *  
 *  @return string
 */
function getIP() : string {
	static $ip;
	
	if ( isset( $ip ) ) {
		return $ip;
	}
	
	$fwd = getForwarded();
	
	// Get IP from reverse proxy, if set
	if ( \array_key_exists( 'for', $fwd ) ) {
		$ip = 
		\is_array( $fwd['for'] ) ? 
			\array_shift( $fwd['for'] ) : 
			( string ) $fwd['for'];
	
	// Get from sent headers
	} else {
		$raw = getProxyChain();
		if ( empty( $raw ) ) {
			$ip = '';
			return '';
		}
		
		$ip	= \array_shift( $raw );
	}
		
	$skip	= config( 'skip_local', \SKIP_LOCAL, 'int' );
	$va	=
	( $skip ) ?
	\filter_var( $ip, \FILTER_VALIDATE_IP ) : 
	\filter_var(
		$ip, 
		\FILTER_VALIDATE_IP, 
		\FILTER_FLAG_NO_PRIV_RANGE | 
		\FILTER_FLAG_NO_RES_RANGE
	);
	
	$ip = ( false === $va ) ? '' : $ip;
	
	return $ip;
}

/**
 *  Process HTTP_* variables
 *  
 *  @param bool		$lower		Get array keys in lowercase
 *  @return array
 */
function httpHeaders( bool $lower = false ) : array {
	static $val;
	static $lval;
	
	if ( $lower ) {
		if ( isset( $lval ) ) {
			return $lval;
		}
	} else {
		if ( isset( $val ) ) {
			return $val;
		}
	}
	
	$val	= [];
	$lval	= [];
	foreach ( $_SERVER as $k => $v ) {
		if ( 0 === strncasecmp( $k, 'HTTP_', 5 ) ) {
			$a = explode( '_' ,$k );
			array_shift( $a );
			array_walk( $a, function( &$r ) {
				$r = ucfirst( strtolower( $r ) );
			} );
			$val[ implode( '-', $a ) ] = $v;
			$lval[ \strtolower( \implode( '-', $a ) ) ] = $v;
		}
	}
	return $lower ? $lval : $val;
}

/**
 *  Create current visitor's browser signature by sent headers
 *  
 *  @return string
 */
function signature() : string {
	static $sig;
	if ( isset( $sig ) ) {
		return $sig;
	}
	$headers	= httpHeaders();
	$skip		= [
		'Access-Control-Request-Headers',
		'Access-Control-Request-Method',
		'Upgrade-Insecure-Requests',
		'If-Unmodified-Since',
		'If-Modified-Since',
		'Accept-Datetime',
		'Accept-Encoding',
		'Content-Length',
		'Authorization',
		'Cache-Control',
		'If-None-Match',
		'Content-Type',
		'Content-Md5',
		'Connection',
		'Forwarded',
		'If-Match',
		'Referer',
		'Cookie',
		'Expect',
		'Accept',
		'Pragma',
		'Date',
		'A-Im',
		'TE'
	];
	
	$search		= 
	\array_diff_key( 
		$headers, \array_reverse( $skip ) 
	);
	
	$sig		= '';
	foreach ( $search as $k => $v ) {
		$sig .= $v[0];
	}
	
	return $sig;
}

/**
 *  Simple division helper for mixed content type numbers
 *  
 *  @param mixed	$n	Numerator value
 *  @param mixed	$d	Denominator value
 *  @param int		$prec	Decimal precision
 *  @return float
 */
function division( $n, $d, int $prec = 4 ) : float {
	
	if ( \is_numeric( $n ) && \is_numeric( $d ) ) {
		$fn = ( float ) $n;
		$fd = ( float ) $d;
		
		return ( $fd != 0 ) ? round( ( $fn / $fd ), $prec ) : 0.0;
	}
	return 0.0;
}




/**
 *  Filtering
 */

/**
 *  Apply uniform encoding of given text to UTF-8
 *  
 *  @param string	$text	Raw input
 *  @param bool		$ignore Discard unconvertable characters (default)
 *  @return string
 */
function utf( string $text, bool $ignore = true ) : string {
	$out = $ignore ? 
		\iconv( 'UTF-8', 'UTF-8//IGNORE', $text ) : 
		\iconv( 'UTF-8', 'UTF-8', $text );
	
	return ( false === $out ) ? '' : $out;
}

/**
 *  Strip unusable characters from raw text/html and conform to UTF-8
 *  
 *  @param string	$html	Raw content body to be cleaned
 *  @param bool		$entities Convert to HTML entities
 *  @return string
 */
function pacify( 
	string		$html, 
	bool		$entities	= false 
) : string {
	$html		= utf( \trim( $html ) );
	
	// Remove control chars except linebreaks/tabs etc...
	$html		= 
	\preg_replace(
		'/[\x00-\x08\x0B\x0C\x0E-\x1F\x80-\x9F]/u', '', $html
	);
	
	// Non-characters
	$html		= 
	\preg_replace(
		'/[\x{fdd0}-\x{fdef}]/u', '', $html
	);
	
	// UTF unassigned, formatting, and half surrogate pairs
	$html		= 
	\preg_replace(
		'/[\p{Cs}\p{Cf}\p{Cn}]/u', '', $html
	);
		
	// Convert Unicode character entities?
	if ( $entities && !missing( 'mb_convert_encoding' ) ) {
		$html	= 
		\mb_convert_encoding( 
			$html, 'HTML-ENTITIES', 'UTF-8' 
		);
	}
	
	return \trim( $html );
}

/**
 *  HTML safe character entities in UTF-8
 *  
 *  @param string	$v	Raw text to turn to HTML entities
 *  @param bool		$quotes	Convert quotes (defaults to true)
 *  @param bool		$spaces	Convert spaces to "&nbsp;*" (defaults to true)
 *  @return string
 */
function entities( 
	string		$v, 
	bool		$quotes	= true,
	bool		$spaces	= true
) : string {
	if ( $quotes ) {
		$v	=
		\htmlentities( 
			utf( $v, false ), 
			\ENT_QUOTES | \ENT_SUBSTITUTE, 
			'UTF-8'
		);
	} else {
		$v =  \htmlentities( 
			utf( $v, false ), 
			\ENT_NOQUOTES | \ENT_SUBSTITUTE, 
			'UTF-8'
		);
	}
	if ( $spaces ) {
		return 
		\strtr( $v, [ 
			' ' => '&nbsp;',
			'	' => '&nbsp;&nbsp;&nbsp;&nbsp;'
		] );
	}
	return $v;
}

/**
 *  Filter URL
 *  This is not a 100% foolproof method, but it's better than nothing
 *  
 *  @param string	$txt	Raw URL attribute value
 *  @param bool		$xss	Filter XSS possibilities
 *  @return string
 */
function cleanUrl( 
	string		$txt, 
	bool		$xss		= true
) : string {
	// Nothing to clean
	if ( empty( $txt ) ) {
		return '';
	}
	
	// Default filter
	if ( \filter_var( $txt, \FILTER_VALIDATE_URL ) ) {
		// XSS filter
		if ( $xss ) {
			if ( !\preg_match( RX_URL, $txt ) ){
				return '';
			}	
		}
		
		if ( 
			\preg_match( RX_XSS2, $txt ) || 
			\preg_match( RX_XSS3, $txt ) || 
			\preg_match( RX_XSS4, $txt ) 
		) {
			return '';
		}
		
		// Return as/is
		return  $txt;
	}
	
	return entities( $txt, false, false );
}

/**
 *  Simple email address filter helper
 *  
 *  @param string	$email	Raw email (currently doesn't support Unicode domains)
 *  @return string
 */
function cleanEmail( string $email ) : string {
	if ( \filter_var( $email, \FILTER_VALIDATE_EMAIL ) ) {
		return $email;
	}
	
	return '';
}

/**
 *  Prepend given prefix to URLs starting with '/'
 *  
 *  @param string	$url	Raw URL path
 *  @param string	$prefix	Prefix to prepend if $url starts with '/'
 *  @return string
 */
function prependPath( string $v, string $prefix ) : string {
	$v = trim( $v, '"\'' );
	return \preg_match( '/^\//', $v ) ?
		cleanUrl( $prefix . $v ) : cleanUrl( $v );
}

/**
 *  Form encoding type helper, defaults to application/x-www-form-urlencoded
 *  
 *  @param string	$v	Raw encoding type
 *  @return string
 */
function cleanFormEnctype( string $v ) : string {
	$v = trim( $v );
	if (
		0 == \strcasecmp( $v, 'application/x-www-form-urlencoded' )	|| 
		0 == \strcasecmp( $v, 'multipart/form-data' )			|| 
		0 == \strcasecmp( $v, 'text/plain' )
	) {
		return $v;
	}
	
	return 'application/x-www-form-urlencoded';
}

/**
 *  Filter form sending method type, defaults to get or post
 *  
 *  @param string	$v	Raw form method
 *  @return string
 */
function cleanFormMethodType( string $v ) : string {
	$v = trim( $v );
	if (
		0 == \strcasecmp( $v, 'GET' )	|| 
		0 == \strcasecmp( $v, 'POST' )
	) {
		return $v;
	}
	
	return 'get';
}

/**
 *  Clean DOM node attribute against whitelist
 *  
 *  @param DOMNode	$node	Object DOM Node
 *  @param array	$white	Whitelist of allowed tags and params
 *  @param string	$prefix	URL prefix to prepend text
 */
function cleanAttributes(
	\DOMNode	&$node,
	array		$white,
	string		$prefix	= ''
) {
	if ( !$node->hasAttributes() ) {
		return null;
	}
	
	foreach ( 
		\iterator_to_array( $node->attributes ) as $at
	) {
		$n = $at->nodeName;
		$v = $at->nodeValue;
		
		// Default action is to remove attribute
		// It will only get added if it's safe
		$node->removeAttributeNode( $at );
		if ( \in_array( $n, $white[$node->nodeName] ) ) {
			switch ( $n ) {
				case 'longdesc':
				case 'url':
				case 'src':
				case 'data-src':
				case 'href':
				case 'action':
					// Use prefix for relative paths
					$v = prependPath( $v, $prefix );
					break;
				
				// Form-specific extras
				case 'method':
					$v = cleanFormMethodType( $v );
					break;
				
				case 'enctype':
					$v = cleanFormEnctype( $v );
					break;
				
				case 'pattern':
					$v = 
					\preg_replace( 
						'/[^[:alnum:]_\-\{\}\[\]\/\+\.\s]/', 
						'', $v
					);
					break;
					
				default:
					$v = entities( $v, false, false );
			}
			
			$node->setAttribute( $n, $v );
		}
	}
}

/**
 *  Scrub each node against white list
 *  @param DOMNode	$node	Document element node to filter
 *  @param array	$white	Whitelist of allowed tags and params
 *  @param string	$prefix	URL prefix to prepend text
 *  @param array	$flush	Elements to remove from document
 */
function scrub(
	\DOMNode	$node,
	array		$white,
	string		$prefix,
	array		&$flush		= []
) {
	if ( isset( $white[$node->nodeName] ) ) {
		// Clean attributes first
		cleanAttributes( $node, $white, $prefix );
		if ( $node->childNodes ) {
			// Continue to other tags
			foreach ( $node->childNodes as $child ) {
				scrub( $child, $white, $prefix, $flush );
			}
		}
		
	} elseif ( $node->nodeType == \XML_ELEMENT_NODE ) {
		// This tag isn't on the whitelist
		$flush[] = $node;
	}
}

/**
 * Convert an unformatted text block to paragraphs
 * 
 * @link http://stackoverflow.com/a/2959926
 * @param string	$val		Filter variable
 * @param bool		$skipCode	Ignore code blocks
 */
function makeParagraphs( $val, $skipCode = false ) {
	$out = $val;
	
	// Escape block level code first
	if ( !$skipCode ) {
		// Format inside code tags
		$out = \preg_replace_callback( '/<code>(.*)<\/code>/ism',
		function ( $m ) {
			if ( empty( $m[1] ) ) {
				return '';
			}
			return 
			\sprintf( '<pre><code>%s</code></pre>', 
				entities( \trim( $m[1] ), false, false ) 
			);
		}, $out );	
	}
	
	$filters	= 
	[
		// Turn consecutive line breaks to new paragraph
		'#\s{2,}\n|\n{2}#'		=>
		function( $m ) {
			return '</p><p>';
		},
		
		// Turn consecutive <br>s to paragraph breaks
		'#(?:<br\s*/?>\s*?){2,}#'	=>
		function( $m ) {
			return '</p><p>';
		},
		
		// Remove <br> abnormalities
		'#<p>(\s*<br\s*/?>)+#'		=> 
		function( $m ) {
			return '</p><p>';
		},
		
		'#<br\s*/?>(\s*</p>)+#'		=> 
		function( $m ) {
			return '<p></p>';
		},
		
		// Breaks after tags
		'#</([\w\d]+)>(\s*<br\s*/?>)#'	=> 
		function( $m ) {
			return '</' . $m[1] . '>';
		},
	];
	
	$out		= \preg_replace_callback_array( $filters, $out );
	if ( $skipCode ) {
		return $out;
	}
	$filters	= [
		// Block of code
		'#^\n`{3,}([\s\S]*)(^(?!\s)`{3,}.*$)\n#smU' =>
		function( $m ) {
			return
			\sprintf(
				'<pre><code>%s</code></pre>',
				entities( trim( $m[1], '`' ), false, false )
			);
		},
		
		// Remove <br> tags inside <pre> and <code>
		'#<(pre|code)>(.*)<\/\1>#ism'	=>
		function( $m ) {
			return 
			'<' . $m[1] . '>' . 
			\preg_replace( '#<br\s*/?>#', "", $m[2] ) . 
			'</' . $m[1] . '>';
		}
	];
	
	return \preg_replace_callback_array( $filters, $out );
}

/**
 *  Post formatting handler
 *  
 *  @param string	$html	Raw HTML entered by the user
 *  @param string	$prefix	Link path prefix
 *  @return string
 */
function formatHTML( string $html, string $prefix ) {
	hook( [ 'formatting', [ 
		'html'		=> $html, 
		'prefix'	=> $prefix 
	] ] );
	
	// Check if formatting was handled or use the default markdown formatter
	$sent	= hookArrayResult( 'formatting' );
	
	return empty( $sent ) ? 
		markdown( $html, $prefix ) : 
		( $sent['html'] ?? markdown( $html, $prefix ) );
}

/**
 *  HTML filter
 *  
 *  @param string	$value		Unformatted content
 *  @param string	$prefix		URL path prefix
 *  @param bool		$form		Include form field tags if true
 *  @param bool		$sembed		Skip embedded media shortcodes if true
 *  @return string
 */
function html( 
	string	$value, 
	string	$prefix	= '', 
	bool	$form	= false,
	bool	$sembed	= false
) : string {
	static $white	= [];
	static $sanity;
	
	if ( !isset( $sanity ) ) {
		if ( missing( 'libxml_clear_errors' ) ) {
			$sanity = false;
			shutdown( 
				'logError', 
				'Error: Bare requires the libxml extension be enabled.' 
			);
			return '';
		} else {
			$sanity = true;
		}
	}
	
	if ( !$sanity ) {
		return '';
	}
	
	if ( !isset( $white['html'] ) ) {
		$default_tags = decode( TAG_WHITE );
		
		// Include form tags
		$default_form = 
		\array_merge_recursive( 
			$default_tags, decode( FORM_WHITE ) 
		);
		
		// Tag loader hook
		hook( [ 'htmltags', [ 
			'html'	=> $default_tags,
			'form'	=> $default_form
		] ] );
		
		$htags		= hookArrayResult( 'htmltags' );
		
		// Set custom tags or default tags
		$white['html']	= $htags['html'] ?? $default_tags;
		$white['form']	= $htags['form'] ?? $default_form;
	}
	
	// Remove preceding/trailing slashes
	$prefix		= trim( $prefix, '/' );
	
	// Preliminary cleaning
	$html		= pacify( $value, true );
	
	// Nothing to format?
	if ( empty( $html ) ) {
		return '';
	}
	
	// Apply formatting handler
	$html		= formatHTML( $html, $prefix );
	
	// Nothing formatted?
	if ( empty( $html ) ) {
		return '';
	}
	
	// Format linebreaks and code
	$html		= makeParagraphs( $html );
	
	// Clean up HTML
	$html		= tidyup( $html );
	
	// Skip errors
	$err		= \libxml_use_internal_errors( true );
	
	// HTML tag filter
	$dom		= new \DOMDocument();
	$lstate		= 
	$dom->loadHTML( 
		$html, 
		\LIBXML_HTML_NOIMPLIED | \LIBXML_HTML_NODEFDTD | 
		\LIBXML_NOERROR | \LIBXML_NOWARNING | 
		\LIBXML_NOXMLDECL | \LIBXML_COMPACT | 
		\LIBXML_NOCDATA | \LIBXML_NONET
	);
	
	// Loading failed?
	if ( !$lstate ) {
		// Log last error if possible and return
		$e = \libxml_get_last_error();
		if ( false !== $e ) {
			shutdown( 
				'logError', 
				[ $e->message ?? 'Error loading DOMDocument' ]
			);
		}
		
		\libxml_clear_errors();
		\libxml_use_internal_errors( $err );
		return '';
	}
	
	$domBody	= $dom->getElementsByTagName( 'body' );
	
	$flush		= [];
	
	// Iterate through every HTML element 
	if ( !empty( $domBody->childNodes ) ) {
		// Use form inclusive tags if this is a form page
		$wtags	= $form ? $white['form'] : $white['html'];
		foreach ( $domBody->childNodes as $node ) {
			scrub( $node, $wtags, $prefix, $flush );
		}
	}
	
	// Remove any tags not found in the whitelist
	if ( !empty( $flush ) ) {
		foreach( $flush as $node ) {
			if ( $node->nodeName == '#text' ) {
				continue;
			}
			// Replace tag with harmless text
			$safe	= $dom->createTextNode( 
					$dom->saveHTML( $node )
				);
			$node->parentNode
				->replaceChild( $safe, $node );
		}
	}
	
	// Fix formatting
	$dom->formatOutput	= true;
	$clean			= $dom->saveHTML();
	$clean			= makeParagraphs( $clean, true );
	
	// Final clean
	$clean			= tidyup( $clean );
	
	\libxml_clear_errors();
	\libxml_use_internal_errors( $err );
	
	if ( $sembed ) {
		return $clean;
	}
	
	// Apply embedded media
	return embeds( $clean, $prefix );
}

/**
 *  Tidy settings
 *  
 *  @param string	$text	Unformatted, unfiltered raw HTML
 *  @return string
 */
function tidyup( string $text ) : string {
	static $newtags;
	if ( missing( 'tidy_repair_string' ) ) {
		return $text;
	}
	
	if ( !isset( $newtags ) ) {
		$newtags = 'figure, figcaption, picture, summary, details';
		
		// Append custom tags
		hook( [ 'tidynewtags', [ 'tags' => $newtags ] ] );
		$newtags = 
		hookArrayResult( 'tidynewtags' )['tags'] ?? $newtags;
	}
	
	$opt = [
		'bare'					=> 1,
		'hide-comments' 			=> 1,
		'drop-proprietary-attributes'		=> 1,
		'fix-uri'				=> 1,
		'join-styles'				=> 1,
		'output-xhtml'				=> 1,
		'merge-spans'				=> 1,
		'show-body-only'			=> 1,
		'new-blocklevel-tags'			=> $newtags,
		'wrap'					=> 0
	];
	
	return \trim( \tidy_repair_string( $text, $opt ) );
}

/**
 *  Embedded media shortcode list helper and hook trigger
 *  
 *  @return array
 */
function hostedEmbeds() : array {
	$hosted = [
		// YouTube syntax
		'/\[youtube http(s)?\:\/\/(www)?\.?youtube\.com\/watch\?v=([0-9a-z_]*)\]/is'
		=> \strtr( template( 'tpl_youtube' ), [ '{src}' => '$3' ] ),
		
		'/\[youtube http(s)?\:\/\/(www)?\.?youtu\.be\/([0-9a-z_]*)\]/is'
		=> \strtr( template( 'tpl_youtube' ), [ '{src}' => '$3' ] ),
		
		'/\[youtube ([0-9a-z_]*)\]/is'
		=> \strtr( template( 'tpl_youtube' ), [ '{src}' => '$1' ] ),
		
		// Vimeo syntax
		'/\[vimeo ([0-9]*)\]/is'
		=> \strtr( template( 'tpl_vimeo' ), [ '{src}' => '$1' ] ),
		
		'/\[vimeo http(s)?\:\/\/(www)?\.?vimeo\.com\/([0-9]*)\]/is'
		=> \strtr( template( 'tpl_vimeo' ), [ '{src}' => '$3' ] ),
		
		// Peertube (any instance)
		'/\[peertube http(s)?\:\/\/(.*?)\/videos\/watch\/([0-9\-a-z_]*)\]/is'
		=> \strtr( template( 'tpl_peertube' ), [ '{src_host}' => '$2', '{src}' => '$3' ] ),
		
		// Archive.org
		'/\[archive http(s)?\:\/\/(www)?\.?archive\.org\/details\/([0-9\-a-z_\/\.]*)\]/is'
		=> \strtr( template( 'tpl_archiveorg' ), [ '{src}' => '$3' ] ),
		
		'/\[archive ([0-9a-z_\/\.]*)\]/is'
		=> \strtr( template( 'tpl_archiveorg' ), [ '{src}' => '$1' ] ),
		
		// LBRY/Odysee syntax
		'/\[(lbry|odysee) http(s)?\:\/\/(.*?)\/\$\/download\/([\pL\pN\-_]*)\/\-?([0-9a-z_]*)\]/is'
		=> \strtr( template( 'tpl_lbry' ), [ 
			'{src_host}' => '$3', '{slug}' => '$4', '{src}' => '$5' 
		] ),
		
		'/\[lbry lbry\:\/\/\@(.*?)\/([\pL\pN\-_]*)(\#[\pL\pN\-_]*)?(\s|\/)([\pL\pN\-_]*)\]/is'
		=> \strtr( template( 'tpl_lbry' ), [ 
			'{src_host}' => 'lbry.tv', '{slug}' => '$2', '{src}' => '$5' 
		] )
		
	];
	
	// Append custom embeds
	hook( [ 'hostedembeds', [ 'hosted' => $hosted ] ] );
	$hosted = 
	hookArrayResult( 'hostedembeds', [] )['hosted'] ?? $hosted;
	
	return $hosted;
}

/**
 *  Embedded media
 *  
 *  @param string	$html	Pre-filtered HTML to replace media tags
 *  @return string
 */
function embeds( string $html, string $prefix = ''  ) : string {
	static $hosted;
	static $media;	// Locally uploaded
	
	// First run?
	if ( !isset( $hosted ) ) {
		$hosted	= hostedEmbeds();
	}
	
	if ( !isset( $media ) ) {
		// Uploaded media embedding
		$media	= [
		'/\[(audio|video) (?:\((.*?)\))?([^\[]+)\]/s'	=> 
		function( $m ) use ( $prefix ) {
			$i = \trim( $m[1] );		// Media type
			$p = \trim( $m[2] ?? '' );	// Thumbnail or preview
			
			// Use prefix for relative paths
			$u = prependPath( \trim( $m[3] ), $prefix );
			
			switch( $i ) {
				case 'audio':
					return isSafeExt( $u, 'audio' ) ?
					\strtr( 
						template( 'tpl_audio_embed' ), 
						[ '{src}' => $u ] 
					) : '';
				
				case 'video':
					if ( !isSafeExt( $u, 'video' ) ) {
						return '';
					}
					
					return empty( $p ) ? 
					// No preview
					\strtr( template( 'tpl_video_np_embed' ), [ '{src}' => $u ] ) : 
					
					// With preview
					\strtr( template( 'tpl_video_embed' ), [ 
						'{preview}'	=> prependPath( $p, $prefix ),
						'{src}'		=> $u 
					] );
					
				default:
					return '';
			}
		}
		];
	}
		
	$html	= 
	\preg_replace( 
		\array_keys( $hosted ), 
		\array_values( $hosted ), 
		$html 
	);
	
	return
	\preg_replace_callback_array( $media, $html );
}

/**
 *  Get the parsedown class loaded
 */
function getParsedown() {
	static $parse;
	
	if ( isset( $parse ) ) {
		return $parse;
	}
	
	// Parsedown.php is required at a minimum
	if ( !\class_exists( 'Parsedown' ) ) {
		if ( \file_exists( PATH . 'Parsedown.php' ) ) {
			require( PATH . 'Parsedown.php' );
		} else {
			$parse	= null;
			return null;
		}
	}
	
	// Optinally load ParsedownExtra.php
	if ( \class_exists( 'ParsedownExtra' ) ) {
		$parse = new ParsedownExtra();
	} else {
		if ( \file_exists( PATH . 'ParsedownExtra.php' ) ) {
			require( PATH . 'ParsedownExtra.php' );
			$parse		= new ParsedownExtra();
		} else {
			// Only Parsdown present
			$parse = new Parsedown();
		}
	}
	
	return $parse;
}

/**
 *  Convert Markdown formatted text into HTML tags
 *  
 *  Inspired by : 
 *  @link https://gist.github.com/jbroadway/2836900
 *  
 *  @param string	$html	Pacified text to transform into HTML
 *  @param string	$prefix	URL prefix to prepend text
 *  @return string
 */
function markdown(
	string	$html,
	string	$prefix = '' 
) {
	// Try to load Parsedown, if possible
	$parse		= getParsedown();
	if ( !empty( $parse ) ) {
		return $parse->text( $html );
	}
	
	static $filters;
	
	if ( !isset( $filters ) ) {
		$filters	= 
		[
		// Links / Images with alt text and titles
		'/(\!)?\[([^\[]+)\]\(([^\"\)]+)(?:\"(([^\"]|\\\")+)\")?\)/s'	=> 
		function( $m ) use ( $prefix ) {
			$i = \trim( $m[1] );
			$t = \trim( $m[2] );
			$u = \trim( $m[3] );
			
			// Use prefix for relative paths
			$u = prependPath( $u, $prefix );
			
			// If this is a plain link
			if ( empty( $i ) ) {
				return 
				\sprintf( "<a href='%s'>%s</a>", $u, entities( $t ) );
			}
			
			// This is an image
			// Fix titles / alt text
			$a = entities( \strtr( $m[4] ?? $t, [ '\"' => '"' ] ), false, false );
			return
			\sprintf( "<img src='%s' alt='%s' title='%s' />", $u, entities( $t ), $a );
		},
		
		// Bold / Italic / Deleted / Quote text
		'/(\*(\*)?|\~\~|\:\")(.*?)\1/'	=>
		function( $m ) {
			$i = \strlen( $m[1] );
			$t = \trim( $m[3] );
			
			switch ( true ) {
				case ( false !== \strpos( $m[1], '~' ) ):
					return \sprintf( "<del>%s</del>", $t );
					
				case ( false !== \strpos( $m[1], ':' ) ):
					return \sprintf( "<q>%s</q>", $t );
						
				default:
					return ( $i > 1 ) ?
						\sprintf( "<strong>%s</strong>", $t ) : 
						\sprintf( "<em>%s</em>", $t );
			}
		},
		
		// Centered text
		'/(\n(\-\>+)|\<center\>)([\pL\pN\s]+)((\<\-)|\<\/center\>)/'	=> 
		function( $m ) {
			$t = \trim( $m[3] );
			return \sprintf( '<div class="center;">%s</div>', $t );
		},
		
		// Headings
		'/\n([#]{1,6}+)\s?(.+)/'			=>
		function( $m ) {
			$h = \strlen( trim( $m[1] ) );
			$t = \trim( $m[2] );
			return \sprintf( "<h%s>%s</h%s>", $h, $t, $h );
		}, 
		
		// List items
		'/\n(\*|([0-9]\.+))\s?(.+)/'		=>
		function( $m ) {
			$i = \strlen( $m[2] );
			$t = \trim( $m[3] );
			return ( $i > 1 ) ?
				\sprintf( '<ol><li>%s</li></ol>', $t ) : 
				\sprintf( '<ul><li>%s</li></ul>', $t );
		},
		
		// Merge duplicate lists
		'/<\/(ul|ol)>\s?<\1>/'			=> 
		function( $m ) { return ''; },
		
		// Blockquotes
		'/\n\>\s(.*)/'				=> 
		function( $m ) {
			$t = \trim( $m[1] );
			return \sprintf( '<blockquote><p>%s</p></blockquote>', $t );
		},
		
		// Merge duplicate blockquotes
		'/<\/(p)><\/(blockquote)>\s?<\2>/'	=>
		function( $m ) { return ''; },
		
		// Horizontal rule
		'/\n-{5,}/'				=>
		function( $m ) { return '<hr />'; },
		
		// Fix paragraphs after block elements
		'/\n([^\n(\<\/ul|ol|li|h|blockquote|code|pre)?]+)\n/'		=>
		function( $m ) {
			return '</p><p>';
		}, 
		
		// Inline code (untrimmed)
		'/`(.*)`/i'			=>
		function( $m ) {
			return 
			\sprintf( 
				'<code>%s</code>', 
				entities( $m[1], false, false ) 
			);
		}
		];
	}
	
	return
	\preg_replace_callback_array( $filters, $html );
}


/**
 *  HTTP Response
 */

/**
 *  Site root
 *  
 *  @param bool		$err		Error root if given
 *  @return string
 */
function getRoot( bool $err = false ) : string {
	static $root;
	static $errors;
	
	if ( $err ) { 
		if ( isset( $errors ) ) {
			return $errors;
		}
	} else {
		if ( isset( $root ) ) {
			return $root;
		}
	}
	
	if ( $err ) {
		$errors	 = slashPath( \ERROR_ROOT, true );
		return $errors;
	}
	
	// Shortest root directory for this host
	$hp		= getHostPaths( getHost() );
	$root		= slashPath( $hp[0], true );
	return $root;
}

/**
 *  Safety headers
 *  
 *  @param string	$chk	Content checksum
 *  @param bool		$send	CSP Send Content Security Policy header
 *  @param bool		$type	Send content type (html)
 */
function preamble(
	string	$chk		= '', 
	bool	$send_csp	= true,
	bool	$send_type	= true
) {
	if ( $send_type ) {
		\header( 
			'Content-Type: text/html; charset=utf-8', 
			true 
		);
	}
	
	\header( 'X-XSS-Protection: 1; mode=block', true );
	\header( 'X-Content-Type-Options: nosniff', true );
	
	// Check if TLS is requested 
	if ( isSecure() ) {
		\header(
			'Strict-Transport-Security: ' . 
			'max-age=31536000; includeSubdomains;', 
			true
		);
	}
	
	// If sending CSP and content checksum isn't used
	if ( $send_csp ) {
		$cjp = decode( DEFAULT_JCSP );
		$csp = 'Content-Security-Policy: ';
		
		// Approved frame ancestors ( for embedding media )
		$frl = config( 'frame_whitelist', \FRAME_WHITELIST );
		$raw = \is_array( $frl ) ? 
				\array_map( 'cleanUrl', $frl ) : 
				lineSettings( $frl, -1, 'cleanUrl' );
		
		$raw = \array_unique( \array_filter( $raw ) );
		$frm = \implode( ' ', $raw );
		
		foreach ( $cjp as $k => $v ) {
			$csp .= 
			( 0 == \strcmp( $k, 'frame-ancestors' ) ) ? 
				"$k $v $frm;" : "$k $v;";
		}
		\header( \rtrim( $csp, ';' ), true );
	
	// Content checksum used
	} elseif ( !empty( $chk ) ) {
		\header( 
			"Content-Security-Policy: default-src " .
			"'self' '{$chk}'", 
			true
		);
	}
}

/**
 *  Send list of supported HTTP request methods
 */
function getAllowedMethods( bool $arr = false ) {
	$ap	= config( 'allow_post', \ALLOW_POST, 'int' );
	if ( $arr ) {
		return $ap ?  
		[ 'get', 'post', 'head', 'options' ] : 
		[ 'get', 'head', 'options' ];
	}
	
	return $ap ? 
	'GET, POST, HEAD, OPTIONS' : 'GET, HEAD, OPTIONS';
}

/**
 *  Send list of allowed methods in "Allow:" header
 */
function sendAllowHeader() {
	\header( 'Allow: ' . getAllowedMethods(), true );
}

/**
 *  Create HTTP status code message
 *  
 *  @param int		$code		HTTP Status code
 */
function httpCode( int $code ) {
	$green	= [
		200, 201, 202, 204, 205, 206, 
		300, 301, 302, 303, 304,
		400, 401, 403, 404, 405, 406, 407, 409, 410, 411, 412, 
		413, 414, 415,
		500, 501
	];
	
	if ( \in_array( $code, $green ) ) {
		\http_response_code( $code );
		
		// Some codes need additional headers
		switch( $code ) {
			case 405:
				sendAllowHeader();
				break;
		}
		
		return;
	}
	
	// Special cases
	switch( $code ) {
		case 425:
			\header( "$prot $code " . 'Too Early' );
			return;
			
		case 429:
			\header( "$prot $code " . 
				'Too Many Requests' );
			return;
			
		case 431:
			\header( "$prot $code " . 
				'Request Header Fields Too Large' );
			return;
			
		case 503:
			\header( "$prot $code " . 
				'Service Unavailable' );
			return;
	}
	
	logError( 'Unknown status code "' . $code . '"' );
	die();
}

/**
 *  Get whitelisted sites and associated paths
 *  
 *  @return array
 */
function getSiteWhite() : array {
	static $sw;
	if ( isset( $sw ) ) {
		return $sw;
	}
	$sw	= decode( \SITE_WHITE );
	return $sw;
}

/**
 *  Host server name
 *  @return string
 */
function getHost() : string {
	static $host;
	if ( isset( $host ) ) { return $host; }
	
	$sk	= getSiteWhite();
	$sw	= trimmedList( implode( ',', array_keys( $sk ) ), true );
	
	// Base host headers
	$sh	= [ 'HTTP_HOST', 'SERVER_NAME', 'SERVER_ADDR' ];
	
	// Get forwarded host info from reverse proxy
	$fd	= getForwarded();
	
	// Check reverse proxy host name in whitelist
	if ( \array_key_exists( 'host', $fd ) ) {
		$lc	= lowercase( ( string ) $fd['host'] );
		$host	= \in_array( $lc, $sw ) ? $lc : '';
		
	// Check base host headers
	} else {
		$host	= serverParamWhite( $sh, $sw, true ) ?? '';
	}
	
	// Call host hook
	hook( [ 'gethost', [
		'host'		=> $host,
		'white'		=> $sw,
		'sets'		=> $sh,
		'forward'	=> $fd
	] ] );
	
	// Override if sent by plugin
	$host	= hookStringResult( 'gethost', $host );
	return $host;
}

/**
 *  Get whitelisted paths for current host
 *  
 *  @param string	$host	Current server host
 *  @return array
 */
function getHostPaths( string $host ) : array {
	static $paths	= [];
	if ( !empty( $paths[$host] ) ) {
		return $paths[$host];
	}
	$sp		= getSiteWhite();
	
	// Add filler if empty
	if ( empty( $sp[$host] ) ) {
		$bp		= 
		config( 'default_basepath', \DEFAULT_BASEPATH );
		
		$sp[$host]	= 
		[ \is_array( $bp ) ? $bp : decode( ( string ) $bp ) ];
	}
	
	$sa	= [];
	foreach ( $sp[$host] as $s ) {
		// Decode went wrong or setting is invalid
		if ( !\is_array( $s ) ) {
			break;
		}
		
		// Assume inactive site if not explicitly enabled
		$a = ( bool ) ( $s['is_active'] ?? false );
		if ( $a ) {
			$sa[] = slashPath( $s['basepath'] ?? '/' );
		}
	}
	
	\natcasesort( $sa );
	$sa	= \array_unique( $sa, \SORT_STRING );
	
	hook( [ 'gethostpaths', [
		'allpaths'	=> $sp,
		'current'	=> $sa
	] ] );
	
	$paths[$host]	= $sa;
	return $paths[$host];
}

/**
 *  Check if the current host and path are in the whitelist
 *  
 *  @param string	$host		Server host name
 *  @param string	$path		Current URI
 *  @return bool
 */
function hostPathMatch( string $host, string $path ) : bool {
	$pm	= getHostPaths( $host );
	
	// Root folder is allowed?
	if ( \in_array( '/', $pm, true ) ) {
		return true;
	}
	
	// Shortest matching allowed subfolder
	$pe	= explode( '/', $path );
	$px	= '';
	foreach ( $pe as $k => $v ) {
		$px .= slashPath( $v );
		if ( \in_array( $px, $pm, true ) ) {
			return true;
		}
	}
	return false;
}

/**
 *  Current website with protocol prefix
 *  
 *  @return string
 */
function website() : string {
	static $url;
	if ( isset( $url ) ) {
		return $url;
	}
	
	$url	= ( isSecure() ? 'https://' : 'http://' ) . getHost();
	return $url;
}

/**
 *  Current full URI including website
 */
function fullURI() : string {
	return website() . slashPath( getURI() );
}

/**
 *  Set expires header
 */
function setCacheExp( int $ttl ) {
	\header( 'Cache-Control: max-age=' . $ttl, true );
	\header( 'Expires: ' . 
		\gmdate( 'D, d M Y H:i:s', time() + $ttl ) . 
		' GMT', true );
}

/**
 *  Remove previously set headers, output
 */
function scrubOutput() {
	// Scrub output buffer
	\ob_clean();
	\header_remove( 'Pragma' );
	
	// This is best done in php.ini : expose_php = Off
	\header( 'X-Powered-By: nil', true );
	\header_remove( 'X-Powered-By' );
}

/**
 *  Print headers, content, and end execution
 *  
 *  @param int		$code		HTTP Status code
 *  @param string	$content	Page data to send to client
 *  @param bool		$cache		Cache page data if true
 */
function send(
	int		$code		= 200,
	string		$content	= '',
	bool		$cache		= false,
	bool		$feed		= false
) {
	scrubOutput();
	httpCode( $code );
	
	if ( $feed ) {
		\header(
			'Content-Type: application/xml; charset=utf-8', 
			true 
		);
		\header( 'Content-Disposition: inline', true );
		preamble( '', true, false );
	} else {
		preamble();
	}
	
	// Also save to cache?
	if ( $cache ) {
		$ex	= config( 'cache_ttl', \CACHE_TTL, 'int' );
		$full	= fullURI();
		
		setCacheExp( $ex );
		shutdown( 'saveCache', [ $full, $content ] );
	}
	
	hook( [ 'contentsend', [ 
		'code'		=> 200,
		'content'	=> $content, 
		'cache'		=> $cache,
		'feed'		=> $feed
	] ] );
	
	// Schedule flush
	shutdown( 'ob_end_flush' );
	
	// Check gzip prerequisites
	if ( $code != 304 && \extension_loaded( 'zlib' ) ) {
		\ob_start( 'ob_gzhandler' );
	}
	echo $content;
	
	// End
	shutdown();
}

/**
 *  Error file sending helper
 *  
 *  @param string	$path		Error file path
 *  @param int		$code		Error code number
 */
function sendErrorFile( string $path, int $code ) {
	// Prepend error root
	$path = getRoot( true ) . $path;
	if ( !\file_exists( $path ) ) {
		return;
	}
	
	hook( [ 'errorfilesend', [ 
			'path'		=> $path, 
			'code'		=> $code
		] 
	] );
	sendFilePrep( $path, $code );
	sendFileFinish( $path, true );
	shutdown();
}

/**
 *  Send error message wrapped in default page template
 */
function sendError( int $code, $body ) {
	// Try to send generic file error, if it exists, and exit
	if ( \in_array( $code, [ 500, 501, 503 ] ) ) {
		sendErrorFile( '50x.html', $code );
	}
	
	$path	= '';
	
	// Try to send a static error file if it exists first
	switch( $code ) {
		case 400:
		case 401:
		case 403:
		case 404:
		case 405:
		case 429:
		case 500:
		case 501:
		case 503:
			$path = $code . '.html';
			break;
	}
	
	// Should end here if error file exists
	if ( !empty( $path ) ) {
		sendErrorFile( $path, $code );
	}
	
	// No error file sent, continue with built-in error page
	$ptitle	= config( 'page_title', \PAGE_TITLE );
	$psub	= config( 'page_sub', \PAGE_SUB );
	
	
	// Call error code hook
	hook( [ 'errorcodesend', [
		'code'		=> $code,
		'title'		=> $ptitle,
		'subtitle'	=> $psub,
		'path'		=> $path,
		'body'		=> $body
	] ] );
	
	// Handle custom errors
	$html	= hookHTML( 'errorcodesend' );
	
	// Send custom errors
	if ( !empty( $html ) ) {
		shutdown( 'cleanup' );
		send( $code, $html );
	}
	
	// Send standard error page if nothing handled
	$params	= [ 
		'page_title'	=> $ptitle,
		'tagline'	=> $psub,
		'code'		=> $code,
		'body'		=> $body 
	];
	shutdown( 'cleanup' );
	send( $code, render( template( 'tpl_error_page' ), $params ) );
}

/**
 *  Override content sending if hook was called
 *  
 *  @param string	$event	Event name to call back from hook
 *  @param bool		$feed	Sent content is to be rendered as feed
 */
function sendOverride( string $event, bool $feed = false ) {
	$sent	= hook( [ $event, '' ] );
	if ( empty( $sent ) || !\is_array( $sent ) ) {
		return;
	}
	
	$html	= $sent['html'] ?? '';
	if ( empty( $html ) ) {
		return;
	}
	
	shutdown( 'cleanup' );
	send( 
		( int ) ( $sent['code'] ?? 200 ), 
		$html, 
		( bool ) ( $sent['cache'] ?? true ),
		$feed
	);
}

/**
 *  Multi-page redirect helper
 *  
 *  @param string	$page		Relative path to redirect
 *  @param int		$code		HTTP Status code
 */
function sendPage( 
	string		$page		= '',
	int		$code		= 200
) {
	// Pre-redirect hooks
	hook( [ 'sendpage', [
		'home'	=> homeLink(),
		'host'	=> getHost(),
		'root'	=> getRoot(),
		'code'	=> $code,
		'page'	=> $page 
	] ] );
	
	// Send redirect with requested code
	redirect( $code, homeLink() . $page );
}

/**
 *  Send access denied page and log the visit
 *  
 *  @param string	$vlog		Logged error message
 *  @param string	$msg		Language error sent to visitor
 *  @param string	$default	Fallback language error message
 */
function sendDenied(
	string	$vlog		= 'Denied', 
	string	$msg		= 'denied', 
	string	$default	= \MSG_DENIED 
) {
	visitorError( 403, $vlog );
	sendError( 403, errorLang( $msg, $default ) );
}

/**
 *  Send not found page and log the visit
 *  
 *  @param string	$vlog		Logged error message
 *  @param string	$msg		Language error sent to visitor
 *  @param string	$default	Fallback language error message
 */
function sendNotFound(
	string	$vlog		= 'NotFound', 
	string	$msg		= 'notfound', 
	string	$default	= \MSG_NOTFOUND 
) {
	visitorError( 404, $vlog );
	sendError( 404, errorLang( $msg, $default ) );
}

/**
 *  Generate ETag from file path
 */
function genEtag( $path ) {
	static $tags		= [];
	
	if ( isset( $tags[$path] ) ) {
		return $tags[$path];
	}
	
	$tags[$path]		= [];
	
	// Find file size header
	$tags[$path]['fsize']	= \filesize( $path );
	
	// Send empty on failure
	if ( false === $tags[$path]['fsize'] ) {
		$tags[$path]['fmod'] = 0;
		$tags[$path]['etag'] = '';
		return $tags;
	}
	
	// Similar to Nginx ETag algo: 
	// Lowercase hex of last modified date and filesize
	$tags[$path]['fmod']	= \filemtime( $path );
	if ( false !== $tags[$path]['fmod'] ) {
		$tags[$path]['etag']	= 
		\sprintf( '%x-%x', 
			$tags[$path]['fmod'], 
			$tags[$path]['fsize']
		);
	} else {
		$tags[$path]['etag'] = '';
	}
	
	return $tags[$path];
}

/**
 *  Adjust text mime-type based on path extension
 *  
 *  @param mixed	$mime		Discovered mime-type
 *  @param string	$path		File name or path name
 *  @param mixed	$ext		Given extension (optional)
 *  @return string Adjusted mime type
 */
function adjustMime( $mime, $path, $ext = null ) : string {
	if ( false === $mime ) {
		return 'application/octet-stream';
	}
	
	// Override text types with special extensions
	// Required on some OSes like OpenBSD
	if ( 0 === \strcasecmp( $mime, 'text/plain' ) ) {
		$e	= 
		$ext ?? \pathinfo( $path, \PATHINFO_EXTENSION ) ?? '';
		
		switch( \strtolower( $e ) ) {
			case 'css':
				return 'text/css';
				
			case 'js':
				return 'text/javascript';
				
			case 'svg':
				return 'image/svg+xml';
		}
	}
	
	return \strtolower( $mime );
}

/**
 *  Prepare to send a file instead of an HTTP response
 *  
 *  @param string	$path		File path to send
 *  @param int		$code		HTTP Status code
 *  @param bool		$verify		Verify mime content type
 */
function sendFilePrep( 
	string		$path, 
	int		$code		= 200, 
	bool		$verify		= true 
) {
	scrubOutput();
	httpCode( $code );
	
	// Setup content security
	preamble( '', false, false );
	
	// Set content type if mime is found
	if ( $verify ) {
		$mime	= adjustMime( \mime_content_type( $path ), $path );
		\header( "Content-Type: {$mime}", true );
	}
	\header( "Content-Security-Policy: default-src 'self'", true );	
}

/**
 *  Check If-None-Match header against given ETag
 *  
 *  @return true if header not set or if ETag doesn't match
 */
function ifModified( $etag ) : bool {
	$mod = $_SERVER['HTTP_IF_NONE_MATCH'] ?? '';
	
	if ( empty( $mod ) ) {
		return true;
	}
	
	return ( 0 !== \strcmp( $etag, $mod ) );
}

/**
 *  Finish file sending functionality
 *  
 *  @param string	$path		File path to send
 */
function sendFileFinish( $path ) {
	// Prepare content length and etag headers
	$tags	= genEtag( $path );
	$fsize	= $tags['fsize'];
	$etag	= $tags['etag'];
	if ( false !== $tags['fsize'] ) {
		\header( "Content-Length: {$fsize}", true );
		if ( !empty( $etag ) ) {
			\header( "ETag: {$etag}", true );
		}
		
		if ( config( 'show_modified', \SHOW_MODIFIED, 'int' ) ) {
			$fmod	= $tags['fmod'];
			if ( !empty( $fmod ) ) {
				\header( 
					'Last-Modified: ', 
					dateRfcFile( $fmod ), 
					true
				);
			}
		}
	}
	
	// Cleanup and flush before readfile
	cleanup();
	
	// Send any headers and end buffering
	\ob_end_flush();
	
	if ( ifModified( $etag ) ) {
		\readfile( $path );
	}
}

/**
 *  Send file-specific headers
 *  
 *  @param string	$dsp		Content disposition
 *  @param string	$fname		Download file name
 *  @param bool		$cache		Set file cache
 */
function sendFileHeaders( string $dsp, string $fname, bool $cache ) {
	// Setup file parameters
	\header( 
		"Content-Disposition: {$dsp}; filename=\"{$fname}\"", 
		true
	);
	
	// If cached, set long expiration
	if ( $cache ) {
		\header( 'Cache-Control:public, max-age=31536000', true );
		return;
	}
	
	// Uncached
	\header( 'Cache-Control: must-revalidate', true );
	\header( 'Expires: 0', true );
	\header( 'Pragma: no-cache', true );
}

/**
 *  Prepare to send back a dynamically generated file (E.G. Captcha)
 *  This function is a plugin helper
 *  
 *  @param string	$mime		Generated file's mime content-type
 *  @param string	$fname		File name
 *  @param int		$code		HTTP Status code
 *  @param bool		$cache		Cache generated file if true
 */
function sendGenFilePrep( 
	string		$mime, 
	string		$fname, 
	int		$code		= 200, 
	bool		$cache		= false 
) {
	sendFilePrep( $fname, $code, false );
	\header( "Content-Type: {$mime}", true );
	sendFileHeaders( 'inline', $fname, $cache );
}

/**
 *  Send a physical file if it exists
 *  
 *  @param string	$path		Physical path relative to script
 *  @param bool		$down		Prompt download if true
 *  @param int		$code		HTTP Status code
 */
function sendFile(
	string		$path,
	bool		$down		= false, 
	bool		$cache		= true,
	int		$code		= 200
) : bool {
	// No file found
	if ( !\file_exists( $path ) ) {
		return false;
	}
	
	// Client save path
	$fname	= \basename( $path );
	
	// Show inline or prompt download
	$dsp	= $down ? 'attachment' : 'inline';
	
	// Prepare to send file
	sendFilePrep( $path, $code );
	sendFileHeaders( $dsp, $fname, $cache );
	
	// Finish sending file
	sendFileFinish( $path );
	return true;
}

/**
 *  Source directory helper for host/domain specific folders
 *  
 *  @return string
 */
function getHostDirectory( string $path ) : string {
	$dr = $path . slashPath( getHost(), true );
	return \is_dir( $dr ) ? $dr : $path;
}

/**
 *  Get the relative post directory or host-specific plugin file path, or 
 *  global plugin file storage path if there's a subfolder with current hostname
 *  
 *  @param string	$src	Source type post, plugin, file
 *  @return string
 */
function getPostFileDir( string $src = 'none' ) : string {
	static $pd	= [];
	
	if ( isset( $pd[$src] ) ) {
		return $pd[$src];
	}
	
	switch( $src ) {
		case 'file':
			$pd[$src] = getHostDirectory( \FILE_PATH );
			break;
			
		case 'plugin':
			$pd[$src] = getHostDirectory( \PLUGIN_DATA );
			break;
		
		case 'posts':
			$pd[$src] = getHostDirectory( \POSTS );
			break;
			
		default:
			$pd[$src] = \POSTS;
	}
	
	return $pd[$src];
}




/**
 *  Routing and redirection
 */

/**
 *  Redirect with status code
 *  
 *  @param int		$code		HTTP Status code
 *  @param string	$path		Full URL to from current domain
 */
function redirect(
	int		$code		= 200,
	string		$path		= ''
) {
	\ob_end_clean();
	
	$url	= \parse_url( $path );
	$host	= $url['host'] ?? '';
	
	// Arbitrary redirect attempt?
	if ( $host != $_SERVER['SERVER_NAME'] ) {
		logError( 'Invalid URL: ' . $path );
		die();
	}
	
	// Get get current path
	$path	= getRoot() . $url['path'] ?? '';
	
	// Directory traversal
	$path	= \preg_replace( '/\.{2,}', '.', $path );
	
	hook( [ 'redirect', [ 
		'path' => $path, 
		'code' => $code 
	] ] );
	// Check for headers
	if ( false === \headers_sent() ) {
		\header( 'Location: ' . $path, true, $code );
		die();
	}
	
	// Fallback HTML refresh
	$html = 
	"<html><head>" . 
	"<meta http-equiv=\"refresh\" content=\"0;url=\" . $path . \">".
	"</head><body><a href=\" . $path . \">continue</a></body></html>";
	
	logError( 'Headers already sent with code ' . $code . ' at  URL ' . $path );
	die( $html );
}

/**
 *  Paths are sent in bare. Make them suitable for matching.
 *  
 *  @param string $route URL path in plain format
 *  @return string Route in regex format
 */
function cleanRoute( array $markers, string $route ) {
	$route	= \strtr( $route, $markers );
	$regex	= \str_replace( '.', '\.', $route );
	return '@^/' . ltrim( $route, '/' ) . '/?$@i';
}

/**
 *  Filter path parameters to get rid of numeric indexes
 *  
 *  @param array	$params		URL placholders
 */
function filterParams( array $params ) : array {
	\array_shift( $params );
	
	return 
	\array_filter( 
		$params, 
		function( $k ) {
			return \is_string( $k );
		}, \ARRAY_FILTER_USE_KEY 
	);
}

/**
 *  Handle HEAD HTTP request method
 *  
 *  @param string	$path		Request URL
 *  @param array	$routes		Currently loaded routes
 */
function handleHead( string $path, array $routes ) {
	// Find any 'get' handlers for this route
	$match	= routeMatch( $path, 'get', $routes );
	
	if ( empty( $match ) ) {
		// No route? Try a file, but don't send it
		if ( fileRequest( 'get', $path, false ) ) {
			httpCode( 200 );
		} else {
			httpCode( 404 );
		}
	} else {
		// Route exists
		httpCode( 200 );
	}
	
	// Done
	shutdown( 'cleanup' );
	shutdown();
}

/**
 *  Handle OPTIONS HTTP request method
 */
function handleOptions() {
	// Send No Content
	httpCode( 204 );
	
	// Send allowed headers and cache respose
	sendAllowHeader();
	setCacheExp( 604800 );
	
	// Done
	shutdown( 'cleanup' );
	shutdown();
}

/**
 *  Check if content is already cached for this URI
 *  
 *  @param string	$path	Current request path
 */
function handleCache( string $path ) {
	$cache	= getCache( fullURI() );
	
	if ( empty( $cache ) ) {
		return;
	}
	
	// If URI is already saved, send contents and exit
	shutdown( 'cleanup' );
	
	// Is this a feed?
	if ( 0 === \strcasecmp( \basename( $path ), 'feed' ) ) {
		send( 200, $cache, false, true );
	}
	
	send( 200, $cache, false );
}

/**
 *  Check if method is listed in routes
 *  
 *  @param string	$verb		Lowercase request method
 *  @param array	$routes		Loaded URL paths and handlers
 */
function checkMethodRoutes( string $verb, array $routes ) {
	$mfound	= false;
	
	// Filter routes for methods without any handlers
	foreach( $routes as $r ) {
		// Method has a handler
		if ( 0 === \strcmp( $r[0], $verb ) ) {
			$mfound = true;
		}
	}
	
	// No method implemented for this route
	if ( !$mfound ) {
		shutdown( 'logError', \MSG_NOMETHOD . ' ' . $verb );
		sendError( 501, errorLang( "nomethod", \MSG_NOMETHOD ) );
	}
}

/**
 *  Find methods and paths that can be handled before routing
 *  
 *  @param string	$verb		Lowercase request method
 *  @param string	$path		Requested URL path
 *  @param array	$routes		Currently loaded routes and handlers
 */
function methodPreParse( string $verb, string $path, array $routes ) {
	
	// Check request method
	switch( $verb ) {
		// Will need processing, continue
		case 'get':
			// Try to send file, if it's a file
			if ( fileRequest( $verb, $path ) ) {
				shutdown( 'cleanup' );
				shutdown();
			
			// Try to send cache if it's available
			} else {
				handleCache( $path );
			}
			break;
		
		// Send no content
		case 'head':
			handleHead( $path, $routes );
			break;
		
		// Send allowed methods
		case 'options':
			handleOptions();
			break;
		
		// Special case post
		case 'post':
			break;
		
		// Nothing else implemented
		default:
			visitorError( 405, 'Method' );
			shutdown( 'cleanup' );
			send( 405 );
	}
}

/**
 *  Request filter and cache check. This should be first called
 *  
 *  @param string	$event		Event name should be 'begin'
 *  @param array	$hook		Hook event data
 *  @param array	$params		Hook params
 */
function request( string $event, array $hook, array $params ) : array {
	
	// Set session save handler
	setSessionHandler();
	
	// Check throttling
	sessionThrottle();
	
	$host	= getHost();
	
	// Empty host?
	if ( empty( $host ) ) {
		visitorError( 400, 'Host' );
		sendError( 400, errorLang( "invalid", \MSG_INVALID ) );
	}
	
	// Sanity checks
	$path	= getURI();
	$verb	= getMethod();
	$safe	= getAllowedMethods( true );
	
	// Unrecognized method?
	if ( !\in_array( $verb, $safe ) ) {
		// Send method not allowed
		visitorError( 405, 'Method' );
		sendError( 405, errorLang( "badmethod", \MSG_BADMETHOD ) );
	}
	
	// Request path hard limit
	$lurl	= config( 'max_url_size', \MAX_URL_SIZE, 'int' );
	if ( strsize( $path ) > $lurl ) {
		visitorError( 414, 'Path' );
		shutdown( 'cleanup' );
		send( 414 );
	}
	
	// Request path (simpler filter before proper XSS scan)
	if ( 
		false !== \strpos( $path, '..' ) || 
		false !== \strpos( $path, '<' )	
	) {
		visitorError( 400, 'Path' );
		sendError( 400, errorLang( "invalid", \MSG_INVALID ) );
	}
	
	// Possible XSS, directory traversal, or file upload detected
	if ( 
		\preg_match( RX_XSS3, $path ) || 
		\preg_match( RX_XSS4, $path ) || 
		!empty( $_FILES )
	) {
		sendDenied();
	}
	
	// Match whitelisted host and root path
	if ( !hostPathMatch( $host, $path ) ) {
		sendDenied();
	}
	
	// Get routes from route init
	hook( [ 'initroutes', [] ] );
	$routes = hook( [ 'initroutes', '' ] );
	
	if ( empty( $routes ) ) {
		logError( \MSG_NOROUTE );
		die();
	}
	
	// Handle special methods before routing
	methodPreParse( $verb, $path, $routes );
	checkMethodRoutes( $verb, $routes );
	
	// Return with routes and extras in hook
	return 
	[ 'path' => $path, 'verb' => $verb, 'routes' => $routes ];
}

/**
 *  Get all whitelisted extensions
 */
function extGroups( string $group = '' ) : array {
	// Default whitelist
	$cs	= 
	config( 'ext_whitelist', whiteLists( decode( \EXT_WHITELIST ), true ) );
	
	// Extend whitelist via hooks
	hook( [ 'extwhitelist', [ 'whitelist' => $cs ] ] );
	$sent	= hookArrayResult( 'extwhitelist', [] );
	
	// Filtered whitelist
	$ext	= empty( $sent ) ? $cs : 
		\array_merge( $cs, $sent['whitelist'] ?? [] );
	
	$all	= \implode( ',', $ext );
	
	return empty( $group ) ? 
		\array_unique( trimmedList( $all, true ) ) : 
		\array_unique( trimmedList( $ext[$group] ?? '', true ) );
}

/**
 *  Check if the requested path has a whitelisted extension
 *  
 *  @param string	$path		Requested URI
 *  @param string	$group		Specific type I.E. "images"
 */
function isSafeExt( string $path, string $group = '' ) : bool {
	static $safe	= [];
	static $checked	= [];
	$key		= $group . $path;
	
	if ( isset( $checked[$key] ) ) {
		return $checked[$key];
	}
	
	if ( !isset( $safe[$group] ) ) {
		$safe[$group]	= extGroups( $group );
	}
	
	$ext		= 
	\pathinfo( $path, \PATHINFO_EXTENSION ) ?? '';
	
	$checked[$key] = 
	\in_array( \strtolower( $ext ), $safe[$group] );
	
	return $checked[$key];
}

/**
 *  Send route to registered event
 */
function sendRoute( string $event, string $path, string $verb, array $params ) {
	// Call request url event with filtered params
	hook( [ 'requesturl', filterParams( $params ) ] );
	
	// Store event results
	$params			= hook( [ 'requesturl', '' ] );
	
	// Append the method and route
	$params['path']		= $path;
	$params['method']	= $verb;
	
	// Send url event with request url event results
	hook( [ $event, $params ] );
}

/**
 *  Find the first matching route path associated the given event name
 *  
 *  @param string	$event		Event to which the route is attached
 *  @param string	$default	Default route if no event is attached
 *  @return string
 */
function eventRoutePrefix(
	string	$event,
	string	$default
) : string {
	// First instance of route path by event name
	$frag	= getRoutePath( $event, $default );
	
	return \trim( $frag , '\\/' );
}

/**
 *  Find the path from given hook event handler name
 *  
 *  @param string	$event		Hook event name
 *  @param string	$fallback	Backup path if event isn't found
 *  @param array	$routes		Sent routes to handler (optional)
 */
function getRoutePath( 
	string		$event,
	string		$fallback, 
	array		$routes		= [] 
) {
	static $loaded	= [];
	
	if ( !empty( $routes ) ) {
		$loaded	= $routes;
		return;
	}
	
	foreach ( $loaded as $map ) {
		if ( 0 == \strcasecmp( $map[2], $event ) ) {
			return $map[1];
		}
	}
	
	return $fallback;
}

/**
 *  Route placeholder parse event
 */
function routeMarkers( string $event, array $hook, array $params ) {
	return \array_merge( $hook, decode( \ROUTE_MARK ) );
}

/**
 *  Parse marker placeholders
 */
function getMarkers() : array {
	static $markers;
	if ( !isset( $markers ) ) {
		hook( [ 'routemarker', [] ] );
		$markers = hook( [ 'routemarker', '' ] );
	}
	return $markers;
}

/**
 *  Find and return route handler for given path and any URL parameters
 *  
 *  @param string	$path		Request URI from user
 *  @param string	$verb		Request method
 *  @param array	$routes		Mapped route handlers
 */
function routeMatch( 
	string		$path, 
	string		$verb, 
	array		$routes
) : array {
	$markers	= getMarkers();
	$root		= getRoot();
	foreach( $routes as $map ) {
		// Not the method? keep going
		if ( 0 !== \strcmp( $map[0], $verb ) ) {
			continue;
		}
		
		// Exact match? No need to go further
		if ( 0 === \strcasecmp( $map[1], $path ) ) {
			return [ $map[2], [] ];
		}
		
		// Prepare for matching
		$rx = cleanRoute( $markers, $root . $map[1] );
		
		// Page match? Send handler and URL params
		if ( \preg_match( $rx, $path, $params ) ) {
			return [ $map[2], $params ];
		}
	}
	
	return [];
}

/**
 *  Get list of loaded plugins
 *  
 *  @return array
 */
function loadedPlugins() : array {
	$loaded	= internalState( 'loadedPlugins' );
	if ( empty( $loaded ) || false === $loaded ) {
		return [];
	}
	return \is_array( $loaded ) ? $loaded : [];
}

/**
 *  Send file with ETag data
 *  
 *  @param string	$path	File path after confirming it exists
 */
function sendWithEtag( $path ) : bool {
	$tags	= genEtag( $path );
	
	// Couldn't generate ETag?
	// Either filesize() or filemtime() failed
	if ( empty( $tags['etag'] ) ) {
		return false;
	}
	
	// Create return code based on returned ETag
	$code	= ifModified( $tags['etag'] )? 200 : 304;
	
	// Send on success
	return sendFile( $path, false, true, $code );
}


/**
 *  Get resource from plugin directory(ies)
 *  
 *  @param bool		$dosend	Send the file if found
 */
function sendPluginFile( 
	string		$plugin, 
	string		$path, 
	bool		$dosend		= false 
) : bool {
	$loaded	= loadedPlugins();
	
	// Nothing loaded to search?
	if ( empty( $loaded ) ) {
		return false;
	}
	
	// Clip plugin name from path to prepare for asset searching
	$path	= truncate( $path, strsize( $plugin ) - 1, strsize( $path ) );
	
	foreach ( $loaded as $p ) {
		// Check if first path fragment is the same as the plugin name
		if ( 0 !== \strcasecmp( $p, $plugin ) ) {
			continue;
		}
		
		// Send first occurence of file within the assets of each plugin
		$fpath = 
		\PLUGINS . $p . DIRECTORY_SEPARATOR . \PLUGIN_ASSETS . $path;
		if ( \file_exists( $fpath ) ) {
			return $dosend ? sendWithEtag( $fpath ) : true;
		}
		
		// File written by plugin?
		$fpath = 
		getPostFileDir( 'plugin' ) . $p . DIRECTORY_SEPARATOR . $path;
		if ( \file_exists( $fpath ) ) {
			return $dosend ? sendWithEtag( $fpath ) : true;
		}
	}
	
	return false;
}

/**
 *  Check path for file request
 *  
 *  @param string	$verb	Request method should be get
 *  @param string	$path	Relative path from client
 *  @param bool		$dosend	Send the file if found
 */
function fileRequest(
	string		$verb, 
	string		$path, 
	bool		$dosend = true 
) : bool {
	if ( 0 != \strcmp( 'get', $verb ) || !isSafeExt( $path ) ) {
		return false;
	}
	
	// Trim leading slash and append static file path
	$path	= \preg_replace( '/^\//', '', $path );
	
	// Break path to count folders and search plugins
	$segs	= explode( '/', $path );
	
	// Check folder limits
	$climit	= config( 'folder_limit', \FOLDER_LIMIT, 'int' );
	$c	= count( $segs );
	if ( $c > $climit ) {
		return false;
	}
	
	// Static file path
	$fpath	= getPostFileDir( 'file' ) . $path;
	
	if ( \file_exists( $fpath ) ) {
		return $dosend ? sendWithEtag( $fpath ) : true;
	}
	
	// If there's no prefix, there's no plugin folder to check 
	if ( $c < 2 ) {
		return false;
	}
	
	// If direct path doesn't exist, try to send it via plugin asset path
	return sendPluginFile( $segs[0], $path, $dosend );
}

/**
 *  Main route handler
 *  
 *  @param string	$event		Hook event name
 *  @param array	$hook		Preceding hook handler data
 *  @param array	$params		Hook parameters
 */
function route( string $event, array $hook, array $params ) {
	static $markers;
	
	$path	= $hook['path'];
	$verb	= $hook['verb'];
	
	// Passed URL routes and handlers
	$routes	= $hook['routes'];
	
	// Load paths to getRoutePath
	getRoutePath( '', '', $routes );
	
	$match	= routeMatch( $path, $verb, $routes );
	
	// No handler for this route?
	if ( empty( $match ) ) {
		// Nothing else sent
		sendNotFound();
	}
	
	sendRoute( $match[0], $path, $verb, $match[1] );
}

/**
 *  Application
 */

/**
 *  Get all files in relative post path
 *  
 *  @param string	$root Post relative root
 *  @return mixed
 */
function getPosts( string $root = '' ) {
	static $st =	[];
	if ( isset( $st[$root] ) ) {
		return $st[$root];
	}
	
	// Get relative root
	$pd	= getPostFileDir( 'posts' ) . $root;
	
	try {
		$dir		= 
		new \RecursiveDirectoryIterator( 
			$pd, 
			\FilesystemIterator::FOLLOW_SYMLINKS | 
			\FilesystemIterator::KEY_AS_FILENAME
		);
		$it		= 
		new \RecursiveIteratorIterator( 
			$dir, 
			\RecursiveIteratorIterator::LEAVES_ONLY,
			\RecursiveIteratorIterator::CATCH_GET_CHILD 
		);
		
		$it->rewind();
		
		// Temp array for sorting
		$tmp	= \iterator_to_array( $it, true );
		\rsort( $tmp, \SORT_NATURAL );
		
		$st[$root]	= $tmp;
		return $tmp;
		
	} catch( \Exception $e ) {
		shutdown( 
			'logError', 
			'Error retrieving posts from ' . $pd . ' ' . 
			$e->getMessage() ?? 'Directory search exception'
		);
		return null;
	}
}

/**
 *  Verify if given directory path is a subfolder of root
 *  
 *  @param string	$path	Folder path to check
 *  @param string	$root	Full parent folder path
 *  @return string Empty if directory traversal or other issue found
 */
function filterDir( $path, string $root = \POSTS ) {
	if ( \strpos( $path, '..' ) ) {
		return '';
	}
	
	$lp	= \strlen( $root );
	if ( \strlen( $path ) < $lp ) { 
		return ''; 
	}
	$pos	= \strpos( $path, $root );
	if ( false === $pos ) {
		return '';
	}
	$path	= \substr( $path, $pos + $lp );
	return \trim( $path ?? '' );
}

/**
 *  Rename if a file by that name already exists in destination
 *  
 *  @param string	$path	Original file name
 */
function dupRename( string $path ) : string {
	$info	= \pathinfo( $path );
	$ext	= $info['extension'];
	$name	= $info['filename'];
	$dir	= $info['dirname'];
	$file	= $path;
	$i	= 0;
	
	while ( \file_exists( $file ) ) {
		$file = $dir . \DIRECTORY_SEPARATOR . 
			$name . '_' . $i++ . '.' . $ext;
	}
	
	return $file;
}

/**
 *  Given a compelete file path, prefix a term to the filename and 
 *  return a unique file name path
 *  
 *  @param string	$path		Original file path
 *  @param string	$prefix		Path prepend fragment
 *  @param bool		$overwrite	Prevent duplicates by overwriting file path
 *  @return string
 */
function prefixPath(
	string	$path, 
	string	$prefix, 
	bool	$overwrite	= false 
) : string {
	$fname	= 
	rtrim( \dirname( $path ), \DIRECTORY_SEPARATOR ) . 
		\DIRECTORY_SEPARATOR . 
		$prefix . \basename( $path );
	
	// Avoid duplicates?
	return $overwrite ? $fname : dupRename( $fname );
}


/**
 *  Check if path exists in the given plugin writable directory
 *  
 *  @param string	$name	Plugin name to search writable directory
 *  @param string	$prefix	File name prefix
 *  @param string	$path	File path
 *  @return bool
 */
function pluginFileExists(
	string	$name, 
	string	$path, 
	string	$prefix		= '' 
) : bool {
	$ld = loadedPlugins();
	
	// Only check currently loaded plugins
	if ( !\in_array( $name, $ld ) ) {
		shutdown( 
			'logError', 
			'Attempt to search unloaded plugin directory: ' . $name 
		);
		return false;
	}
	
	$root	= getPostFileDir( 'plugin' ) . $name;
	$fpath	= prefixPath( $root . $path, $prefix );
	if ( empty( filterDir( $fpath, $root ) ) ) {
		shutdown(
			'logError',
			'Invalid file path search: ' . $path
		);
		return false;
	}
	
	return \file_exists( $fpath );
}

/**
 *  Prepare writable file path directory for specified plugin
 *  
 *  @param string	$name		Plugin name to find writable directory
 *  @param string	$path		Relative path within plugin writable directory
 *  @param string	$prefix		File name prefix
 *  @param bool		$create		Create subfolders if they don't exist
 *  @param bool		$overwrite	Rename path if given file name already exists
 *  @return mixed
 */
function pluginWritePath( 
	string	$name, 
	string	$path, 
	string	$prefix		= '',
	bool	$create		= false, 
	bool	$overwrite	= false 
) {
	$ld = loadedPlugins();
	
	// Only write to currently loaded plugins;
	if ( !\in_array( $name, $ld ) ) {
		shutdown( 
			'logError', 
			'Attempt to write to unloaded plugin directory: ' . $name 
		);
		return null;
	}
	
	// Prepare plugin write path
	$root	= getPostFileDir( 'plugin' ) . $name;
	$fpath	= prefixPath( $root . $path, $prefix, $overwrite );
	
	if ( empty( filterDir( $fpath, $root ) ) ) {
		shutdown(
			'logError',
			'Invalid file path search: ' . $path
		);
		return null;
	}
	
	// Create plugin writable directory in cache
	$dir = \dirname( $fpath );
	
	if ( $create && !\is_dir( $dir ) ) {
		\mkdir( $dir, 0755, true );
		\chmod( $dir, 0755 );
	}
	
	return $fpath;
}

/**
 *  Reset currently stored post in cache
 */
function refreshPost(
	string		$path, 
	string		$summ, 
	string		$type, 
	string		$out, 
	string		$pub, 
	array		$tags, 
	int		$mtime 
) {
	$db		= getDb( \CACHE_DATA );
	// Post delete statement
	$dstm		= 
	$db->prepare(
		"DELETE FROM posts WHERE post_path = :path"
	);
	
	// Post insertion statement
	$pstm		= 
	$db->prepare( 
		"INSERT OR IGNORE INTO posts( 
			post_path, post_view, post_bare, post_summary, 
			post_type, updated, published 
		) 
		VALUES ( :path, :pview, :bare, :summary, :type, :updated, :pub );" 
	);
	
	// Select post statement
	$sstm		=
	$db->prepare(
		"SELECT id FROM posts WHERE post_path = :perm LIMIT 1;"
	);
	
	// Post tag association statement
	$tstm		= 
	$db->prepare( 
		"INSERT OR IGNORE INTO post_tags( post_id, tag_slug ) 
		VALUES ( :id, :tag );"
	);
	
	// Tag insertion statement
	$istm		= 
	$db->prepare( 
	"INSERT OR IGNORE INTO tags( slug, term ) 
		VALUES ( :slug, :term );" 
	);
	
	
	if ( $db->beginTransaction() ) {
		// Carry out delete
		$dstm->execute( [':path' => $path ] );
		
		// Insert post again
		insertPost( $pstm, $path, $summ, $type, $out, $pub, $mtime );
		
		// Add any new tags
		insertTags( $istm, $tags );
		
		// Apply tags if they've changed
		applyTags( $sstm, $tstm, $path, $tags );
		
		$db->commit();
	} else {
		shutdown(
			'logError',
			'Error starting DB transaction in refreshPost()'
		);
	}
	
	// Cleanup
	$dstm	= null;
	$pstm	= null;
	$sstm	= null;
	$tstm	= null;
	$istm	= null;
}

/**
 *  Get single post data
 *  
 *  @param stirng	$title		Post title (first line)
 *  @param string	$path		Post publication permalink
 *  @param bool		$nocache	Don't cache this post
 *  @param string	$custom		Custom post type extension
 *  @return string
 */
function loadPost(
	string	&$title,
	string	$path, 
	bool	$nocache	= false,
	string	$custom		= ''
) {
	$title	= '';
	$summ	= '';
	$type	= '';
	$rtime	= 0;
	$ext	= empty( $custom ) ? '.md' : '.' . $custom;
	$ppath	= getPostFileDir( 'posts' ) . \ltrim( $path, '/' ) . $ext;
	
	$data	= loadText( $ppath );
	
	if ( empty( $data ) ) {
		return '';
	}
	
	$pub	= getPub( $path );
	$fline	= config( 'feature_lines', \FEATURE_LINES, 'int' );
	$tpl	= template( 'tpl_post' );
	hook( [ 'formatpostprep', [ 
		'feed'		=> false, 
		'template'	=> $tpl,
		'fline'		=> $fline,
		'nocache'	=> $nocache,
		'custom'	=> $custom
	] ] );
	
	$tags	= [];
	$out	= 
	formatPost( $title, $tags, $summ, $type, $rtime, $data, $path, $tpl, 0, 
		$fline, false, $custom );
	
	// If index has not been run before this function was called...
	if ( !internalState( 'indexRun' ) && !$nocache ) {
		$mtime	= \filemtime( $ppath );
		
		// filemtime() failed?
		if ( false === $mtime ) {
			if ( !postCached( $path ) ) {
				shutdown( 'loadIndex' );
			}
			return $out;
		}
		
		// If post was modified since it's pub date...
		if ( postModified( $path, $mtime ) ) {
			$pub	= getPub( $path );
			shutdown( 
				'refreshPost', 
				[ $path, $summ, $type, $out, $pub, $tags, $mtime ]
			);
		} elseif ( !postCached( $path ) ) {
			shutdown( 'loadIndex' );
		}
	}
	
	return $out;
}

/**
 *  Get timezone offset from currently configured timezone 
 *  or default to 'America/New_York'
 *  
 *  @link https://www.php.net/manual/en/timezones.php
 *  
 *  @return int
 */
function timeZoneOffset() : int {
	static $ot;
	if ( isset( $ot ) ) {
		return $ot;
	}
	
	// Timezone from configuration
	$tz = config( 'timezone', \TIMEZONE );
	$dt = new \DateTime( 'now', new \DateTimeZone( 'UTC' ) );
	try {
		$dz = new \DateTimeZone( $tz );
		$ot = $dz->getOffset( $dt );
		
	} catch( \Exception $e ) { // Default fallback
		$dz = new \DateTimeZone( 'America/New_York' );
		$ot = $dz->getOffset( $dt );
	}
	
	$ot = ( false === $ot ) ? 0 : $ot;
	return $ot;
}

/**
 *  Cut off path from the last index of '/', removing the page slug
 */
function cutSlug( string $path ) : string {
	return 
	( string ) \substr( $path, 0, \strrpos( $path, '/' ) );
}

/**
 *  Get published date from path
 *  
 *  @return string
 */
function getPub( $path ) : string {
	$path	= \ltrim( $path, '/' );
	$fr	= cutSlug( $path );
	
	return utc( empty( $fr ) ? 'now' : $fr );
}

/**
 *  Check if publication time is before current time
 *  This function relies on date_default_timezone_set being 'UTC'
 *  
 *  @return bool
 */
function checkPub( $pub ) : bool {
	static $t;
	if ( !isset( $t ) ) {
		$t = time() + timeZoneOffset();
	}
	
	if ( \strtotime( $pub ) <= $t ) {
		return true;
	}
	
	return false;
}

/**
 *  Check if post was modified after its publish time
 *  
 *  @return bool
 */
function postModified( $path, $mtime ) : bool {
	$res = 
	getResults( 
		"SELECT updated FROM posts 
			WHERE post_path = :path", 
		[ ':path' => slashPath( $path ) ],
		\CACHE_DATA
	);
	
	if ( empty( $res ) ) {
		return true;
	}
	
	// Remove fine resolution issues
	$ft = \strtotime( utc( $res[0]['updated'] ) );
	$mt = \strtotime( utc( $mtime ) );
	
	return ( $mt > $ft ) ? false : true;
}

/**
 *  Check if post exists in cache
 */
function postCached( $path ) : bool {
	$res = 
	getResults( 
		"SELECT id FROM posts WHERE post_path = :path
			LIMIT 1;", 
		[ ':path' => slashPath( $path ) ],
		\CACHE_DATA
	);
	
	return empty( $res ) ? false : true; 
}

/**
 *  Extract a given feature line in "item: content" format from the post range
 *  
 *  @param array	$post	Post data as lines
 *  @param string	$search	Parameter to search
 *  @param int		$lines	Number of lines from the bottom to search
 *  @return array		Extracted match(es)
 */
function extractFeature(
	array		&$post,
	string		$search,
	int		$lines
) : array {
	$c	= count( $post );
	
	// Need at least three lines
	if ( $c < 3 ) {
		return [];
	}
	
	$p = $c - 1;
	$i = 0;
	while ( $i < $lines && $p > 0 ) {
		$line = \trim( unifySpaces( $post[$p] ) );
		
		// Nothing to find? Skip line
		if ( empty( $line ) ) {
			$p--;
			continue;
		}
		
		// Search for feature
		if ( \preg_match( $search, $line, $m ) ) {
			// Remove line if feature was found
			\array_splice( $post, $p, 1 );
			return $m;
		}
		
		$p--;
		$i++;
	}
	
	return [];
}

/**
 *  Get summary or abstract from post
 */
function extractSummary( array $find ) : string {
	return html( $find['all'] ?? '', homeLink() );
}

/**
 *  Try to parse post category tags
 *  
 *  @param array	$find	Content as labled regular expression match
 *  @return array
 */
function extractTags( array $find ) : array {
	// Clean tags
	$tags	= \array_filter( trimmedList( $find['tags'] ?? '' ) );
	
	// No tags left after cleaning?
	if ( empty( $tags ) ) {
		return [];
	}
	
	// Ensure tags don't exceed limit
	$tl	= config( 'tag_limit', \TAG_LIMIT, 'int' );
	if ( count( $tags ) > $tl ) {
		$tags = \array_slice( $tags, 0, $tl );
	}
	
	$ptags	= [];
	foreach( $tags as $t ) {
		$ptags[] = [ 
			'slug' => slugify( $t ),
			'term' => $t
		];
	}
	
	return $ptags;	
}

/**
 *  Extract JSON encoded custom metadata from post
 *  
 *  @param array	$find	Content as labled regular expression match
 *  @return array
 */
function extractMeta( array $find ) : array {
	return decode( $find['all'] ?? '' );
}

/**
 *  Parse current post's type or send default type
 */
function extractType( array $find ) : string {
	return lowercase( labelName( $html['label'] ?? \POST_TYPE ) );
}

/**
 *  Initialize core features and append any hook features
 *  
 *  @return array
 */
function initPostFeatures( array $post ) : array {
	$summ	= getMarkers()[':all'] ?? '(?<all>.+)';
	$tags	= getMarkers()[':tags'] ?? '(?<tags>[\pL\pN\s_\,\-]{1,255})';
	$label	= getMarkers()[':label'] ?? '(?<label>[\pL\pN\s_\-]{1,30})';
	
	$features	= [
		'summmary' => [
			'search'	=> '/^summary\s?\:' . $summ . '/isu',
			'filter'	=> 'extractSummary'
		],
		
		'tags' => [
			'search'	=> '/^tags\s?\:' . $tags . '/is',
			'filter'	=> 'extractTags'
		],
		
		'type' => [
			'search'	=> '/^type\s?\:' . $label . '/is',
			'filter'	=> 'extractType'
		],
		
		'meta' => [
			'search'	=> '/^meta\s?\:' . $label . '/isu',
			'filter'	=> 'extractMeta'
		]
	];
	
	// Send feature extraction initialization to hook
	hook( [ 'postfeatureinit', [ 
		'post'		=> $post,
		'features'	=> $features
	] ] );
	
	// Intercept feature extras
	$sent	= 
	hookArrayResult( 'postfeatureinit' )['features'] ?? [];
	
	return empty( $sent ) ? 
		$features : \array_merge( $features, $sent );
}

/**
 *  Core post feature extractor
 *  
 *  @param array	$post	Main post content
 *  @param int		$flines	Feature search number of lines
 *  @return array
 */
function postFeatures( array &$post, int $flines ) : array {
	static $features;
	
	// Core feature presets: summary and tags
	if ( !isset( $features ) ) {
		$features = initPostFeatures( $post );
	}
	
	// Send feature extraction to hook
	hook( [ 'postfeatures', [ 
		'post'		=> $post,
		'features'	=> $features
	] ] );
	
	// Intercept feature extraction, if available
	$sent	= hookArrayResult( 'postfeatures' );
	if ( !empty( $sent ) ) {
		return $sent;
	}
	
	// Default features
	$found	= [];
	$filter	= '';
	foreach( $features as $k => $v ) {
		$find = 
		extractFeature( 
			$post, $v['search'], ( $v['lines'] ?? $flines )
		);
		if ( !empty( $find ) ) {
			$filter		= $v['filter'];
			$found[$k]	= 
			( \is_callable( $filter ) ? 
				$filter( $find ) : $find 
			) ?? '';
		}
	}
	
	return $found;
}

/**
 *  Insert formatted tags into cache
 */
function insertTags( \PDOStatement $stm, array $tags ) : bool {
	$st = false;
	foreach( $tags as $pair ) {
		$st	= 
		$stm->execute( [ 
			':slug' => $pair['slug'], 
			':term' => $pair['term'] 
		] ) || $st;
	}
	
	return $st;
}

/**
 *  Associate post with given tags
 */
function applyTags( 
	\PDOStatement	$sstm, 
	\PDOStatement	$tstm, 
	string		$perm, 
	array		$tags 
) : bool {
	$id = 0;
	
	if ( $sstm->execute( [ ':perm' => $perm ] ) ) {
		$res	= $sstm->fetchAll();
		$id	= ( int ) ( $res[0]['id'] ?? 0 );
	} else { 
		return false; 
	}
	
	if ( empty( $id ) ) {
		return false;
	}
	
	$st = false;
	foreach( $tags as $pair ) {
		$st	= 
		$tstm->execute( [
			':id'	=> $id,
			':tag'	=> $pair['slug']
		] ) || $st;
	}
	
	return $st;
}


/**
 *  Check if this is a post file (ends in ".md")
 */
function isPost( $file, string $custom = '' ) : bool {
	// Skip directories
	if ( $file->isDir() ) {
		return false;
	}
	if ( $ext = $file->getExtension() ) {
		return empty( $custom ) ? 
			( 0 == \strcasecmp( $ext, 'md' ) ) : 
			( 0 == \strcasecmp( $ext, $custom ) );
	}
	return false;	
}

/**
 *  Load all published posts on file and extract properties
 *  
 *  @param int		$page	Current page index
 *  @param string	$prefix	Link prefix
 *  @param bool		$feed	Specify if this is a syndication feed
 *  @param int		$slvl	Summary display level
 *  @param bool		$igpub	Ignore published date check
 *  @param string	$custom	Custom post type
 *  @return array
 */
function loadPosts(
	int	$page	= 1,
	string	$prefix	= '',
	bool	$feed	= false,
	int	$slvl	= 0,
	bool	$igpub	= false, 
	string	$custom	= ''
) : array {
	$it	= getPosts( $prefix );
	if ( empty( $it ) ) {
		return [];
	}
	
	$i	= 0;
	$posts	= [];
	
	// Pagination prep
	$plimit	= config( 'page_limit', \PAGE_LIMIT, 'int' );
	$start	= ( $page - 1 ) * $plimit;
	$end	= $start + $plimit;
	
	$title	= '';
	$tpl	= $feed ? template( 'tpl_item' ) : template( 'tpl_index_post' );
	$fline	= config( 'feature_lines', \FEATURE_LINES, 'int' );
	
	hook( [ 'formatpostprep', [ 
		'feed'		=> $feed, 
		'template'	=> $tpl
	] ] );
	
	// Find the about view path to skip
	$about	= '/' . eventRoutePrefix( 'aboutview', 'about' ) . '/';
	
	// Find home path to skip
	$home	= \rtrim( \POSTS, '/' ) . '/home.md';
	$pbc	= false;
	
	foreach( $it as $file ) {
		
		// Check if it's a post
		if ( !isPost( $file, $custom ) ) {
			continue;
		}
		
		// We're at the offset limit
		if ( $i >= $end ) {
			break;
		}
		$raw		= $file->getRealPath();
		$path		= filterDir( $raw );
		if ( empty( $path ) ) {
			continue;
		}
		
		// Skip homepage
		if ( false !== strpos( $raw, $home ) ) {
			continue;
		}
		
		// Skip about page(s)
		if ( false !== strpos( $raw, $about ) ) {
			continue;
		}
		
		$pub		= getPub( $path );
		$pbc		= checkPub( $pub ) || $igpub;
		
		// We're below offset
		if ( $i >= $start && $pbc ) {
			$data		= loadText( $raw );
			if ( empty( $data ) || false === $data ) {
				continue;
			}
			
			$summ		= '';
			$tags		= [];
			$type		= '';
			$rtime		= 0;
			$posts[$path]	= 
			formatPost( 
				$title, $tags, $summ, $type, $rtime, $data, 
				$path, $tpl, $slvl, $fline, false, $custom
			);
		}
		
		// Increment number of entries if published
		if ( $pbc ) {
			$i++;
		}
	}
	return $posts;
}

/**
 *  Insert post data into cache database using given statement 
 *  
 *  @param PDOStatement $pstm		PDO SQLite statement
 *  @param string	$path		Post permalink
 *  @param string	$summ		Summary or abstract
 *  @param string	$type		Post render type
 *  @param string	$out		Formatted post data
 *  @param string	$pub		Post publication date
 *  @param int		$mtime		File modified time
 *  @return bool			True on success
 */
function insertPost(
	\PDOStatement	$pstm, 
	string		$path, 
	string		$summ,
	string		$type, 
	string		$out, 
	string		$pub, 
	int		$mtime 
) : bool {
	$params = [
		':path'		=> slashPath( $path ), 
		':pview'	=> $out, 
		':bare'		=> \strip_tags( $out ), 
		':summary'	=> $summ, 
		':type'		=> $type,		
		':updated'	=> utc( $mtime ), 
		':pub'		=> $pub
	];
	
	if ( $pstm->execute( $params ) ) {
		return true;
	}
	shutdown( 'logError', 'Error inserting post ' . $path );
	return false;
}

/**
 *  Set rendering mode to regular post or 
 *  
 *  @param bool	$feed	Rendering mode is RSS feed if true (defaults to false)
 *  @return bool
 */
function postIsFeed( bool $feed = false ) : bool {
	static $st;
	if ( isset( $st ) ) {
		return $st;
	}
	
	$st = $feed;
	return $st;	
}

/**
 *  Prepare posts for rendering by setting render mode
 */
function formatPostPrep( string $event, array $hook, array $params ) {
	postIsFeed( ( bool ) ( $params['feed'] ?? false ) );
}

/**
 *  Load all published posts into database cache
 *  
 *  @param int		$start	Return starting page index
 *  @param int		$limit	Maximum number of posts to return
 *  @param bool		$igpub	Ignore publish date
 *  @param string	$custom	Custom post type
 *  @return array
 */
function loadIndex(
	int	$start	= 0, 
	int	$limit	= 0,
	bool	$igpub	= false, 
	string	$custom	= ''
) : array {
	$it	= getPosts();
	if ( empty( $it ) ) {
		return [];
	}
	$lastDir	= '';
	$posts		= [];
	
	// Prepare cache insertion for tags
	$db		= getDb( \CACHE_DATA );
	
	// Tag insertion statement
	$istm		= 
	$db->prepare( 
	"INSERT OR IGNORE INTO tags( slug, term ) 
		VALUES ( :slug, :term );" 
	);
	
	// Post insertion statement
	$pstm		= 
	$db->prepare( 
		"INSERT OR IGNORE INTO posts( 
			post_path, post_view, post_bare, post_summary, 
			post_type, updated, published 
		) 
		VALUES ( :path, :pview, :bare, :summary, :type, :updated, :pub );" 
	);
	
	// Select post statement
	$sstm		=
	$db->prepare(
		"SELECT id FROM posts WHERE post_path = :perm LIMIT 1;"
	);
	
	// Post tag association statement
	$tstm		= 
	$db->prepare( 
		"REPLACE INTO post_tags( post_id, tag_slug ) 
		VALUES ( :id, :tag );"
	);
	
	// Returns are limited by page and index?
	$limited	= ( $limit > 0 ) ? true : false;
	$i		= 0;
	$j		= 0;
	
	$fline		= config( 'feature_lines', \FEATURE_LINES, 'int' );
	$tpl		= template( 'tpl_post' );
	
	// Find the about view path to skip
	$about	= '/' . eventRoutePrefix( 'aboutview', 'about' ) .'/';
	
	
	if ( $db->beginTransaction() ) {
		// Success
	} else {
		logError( 'Error starting DB transaction in loadIndex()' );
		die();
	}
	
	foreach( $it as $file ) {
		$raw	= $file->getRealPath();
		$path	= filterDir( $raw );
		if ( empty( $path ) ) {
			continue;
		}
		
		// Skip about page(s)
		if ( false !== strpos( $raw, $about ) ) {
			continue;
		}
		
		// Already added?
		if ( \array_key_exists( $path, $posts ) ) {
			continue;
		}
		
		// Check if it's a post
		if ( !isPost( $file, $custom ) ) {
			continue;
		}
		
		// Not in published range?
		$pub		= getPub( $path );
		if ( !checkPub( $pub ) && !$igpub ) {
			continue;
		}
		
		// No post content?
		$post		= loadText( $raw );
		if ( empty( $post ) || false == $post ) {
			continue;
		}
		
		// Create archive directory (by year)
		$lastDir	= \ltrim( $path, '/' );
		$lastDir	= 
		( false === \strpos( $lastDir, '/' ) ) ? 
			$lastDir : \substr( $lastDir, 0, \strpos( $lastDir, '/' ) );
		
		if ( !isset( $posts[$lastDir] ) ) {
			$posts[$lastDir]	= [];
		}
		
		// Updated date
		$mtime		= \filemtime( $raw );
		if ( false === $mtime ) {
			$mtime = time();
		}
			
		$summ		= '';
		$tags		= [];
		$type		= '';
		$rtime		= 0;
		
		// Apply metadata
		metadata( $title, $perm, $pub, $post, $path );
		
		// Load formatted and process features
		$out		= 
		formatPost( 
			$title, $tags, $summ, $type, $rtime, $post, 
			$path, $tpl, 0, $fline, true, $custom
		);
		
		// Arrange index for presentation
		
		// Limited index?
		if ( $limited ) {
			if ( $i >= $start && $j <= $limit ) {
				$posts[$lastDir][] = 
				formatMeta( $title, $type, $pub, $path, $rtime, $tags, 
					true, $custom );
				$j++;
			}
		
		// Full index?
		} else {
			$posts[$lastDir][] = 
			formatMeta( $title, $type, $pub, $path, $rtime, $tags, 
				true, $custom );
		}
		
		// Create tags and cache page info
		insertPost( $pstm, $perm, $summ, $type, $out, $pub, $mtime );
		insertTags( $istm, $tags );
		applyTags( $sstm, $tstm, $perm, $tags );
		
		$i++;
	}
	
	// Commit new posts, new tags, or post-tag relationships
	$db->commit();
	
	// Cleanup
	$istm	= null;
	$pstm	= null;
	$sstm	= null;
	$tstm	= null;
	
	internalState( 'indexRun', true );
	return \array_filter( $posts );
}

/**
 *  Extract and filter metadata
 */
function metadata( &$title, &$perm, $pub, $post, $path ) {
	// Get the title from the first line
	$title	= title( \array_shift( $post ) );
	
	// Convert pubdate and slug to permalink
	$perm	= dateSlug( \basename( $path ), $pub );
}

/**
 *  Apply tag template
 */
function formatTags( array $tags, bool $index = false ) : string {
	// Render plugin installed?
	hook( [ 'formattags', [ 
		'tags'	=> $tags,
		'index'	=> $index
	] ] );
	$html	= hookHTML( 'formattags' );
	if ( !empty( $html ) ) {
		return $html;
	}
	
	// No tags in this post?
	if ( empty( $tags ) ) {
		return '';
	}
	
	$out	= '';
	$r	= getRoot();
	$ttpl	= $index ? template( 'tpl_index_taglink' ) : template( 'tpl_taglink' );
	$wtpl	= $index ? template( 'tpl_index_tagwrap' ) : template( 'tpl_tagwrap' );
	foreach( $tags as $t ) {
		$out .= 
		render( 
			$ttpl, 
			[
				'url'	=> $r . 'tags/' . $t['slug'],
				'text'	=> $t['term']
			] 
		);
	}
	
	return render( $wtpl, [ 'tags' => $out ] );
}

/**
 *  Checks if the given post type will have its read time calculated
 *  
 *  @param string	$type	Post content type, default should be READTIME_TYPES
 *  @return bool
 */
function hasReadTime( string $type ) : bool {
	static $rtypes;
	if ( !isset( $rtypes ) ) {
		$rtt		= config( 'readtime_types', \READTIME_TYPES );
		$default	= trimmedList( $rtt, true );
		
		// Send to hook for additional types
		hook( [ 'hasreadtime', [ 'types' => $default ] ] );
		
		$rtypes		= 
		hookArrayResult( 'hasreadtime' )['types'] ?? $default;
	}
	
	return \in_array( $type, $rtypes, true );
}

/**
 *  Apply post data to template placeholders
 */

/**
 *  Apply post data to template placeholders
 *  
 *  @param string	$title		Formatted post title
 *  @param string	$type		Post content type, defaults to POST_TYPE
 *  @param string	$pub		Publication datetime stamp
 *  @param string	$path		Post permalink and URL slug
 *  @param int		rtime		Reading time in minutes
 *  @param bool		$index		Post formatting should match an index listing if true
 *  @param string	$custom		Custom post type extension (without .)
 *  @return array
 *  
 */
function formatMeta( 
	string	$title,
	string	$type,
	string	$pub, 
	string	$path, 
	int	$rtime, 
	array	$tags		= [], 
	bool	$index		= false, 
	string	$custom		= '' 
) : array {
	hook( [ 'formatmeta', [ 
		'type'		=> $type, 
		'title'		=> $title, 
		'published'	=> $pub, 
		'path'		=> $path, 
		'readtime'	=> $rtime,
		'tags'		=> $tags,
		'index'		=> $index,
		'custom'	=> $custom
	] ] );
	
	$sent	= hookArrayResult( 'formatmeta' );
	if (  !empty( $sent ) ) {
		return $sent;
	}
	
	// Individual customization hooks
	hook( [ 'formattitle',		[ 'title'	=> $title ] ] );
	hook( [ 'formatpublished',	[ 'pub'		=> $pub ] ] );
	
	// Format read time, if appropriate
	$read	= 
	hasReadTime( $type ) ? 
		hookWrap( 
			'beforereadtime',
			'afterreadtime',
			template( 'tpl_read_time' ), 
			[ 'time' => $rtime ]
		) : '';
	hook( [ 'formatreadtime',	[ 'read'	=> $read ] ] );
	
	return [
		'title'		=> hookStringResult( 'formattitle', $title ),
		'date_utc'	=> $pub,
		'date_rfc'	=> dateRfc( $pub ),
		'date_stamp'	=> hookStringResult( 'formatpublished', dateNice( $pub ) ),
		'read_time'	=> hookStringResult( 'formatreadtime', $read ),
		'tags'		=> formatTags( $tags, $index ),
		'permalink'	=> 
		website() . dateSlug( \basename( $path ), $pub )
	];
}

/**
 *  Apply post template, if post exists and published
 *  
 *  @param string	$title		Formatted post title to send back
 *  @param array	$tags		Filtered category tags
 *  @param string	$summ		Post summary as HTML
 *  @param string	$type		Post content type, defaults to POST_TYPE
 *  @param int		$rtime		Reading time in minutes
 *  @param array	$post		Post content, after features extracted, as an array of lines
 *  @param string	$path		Post permalink including page slug
 *  @param string	$tpl		Display template used to format this post
 *  @param int		$slvl		Summary and post body display level
 *  @param int		$fline		Number of lines to search for features in this post
 *  @param bool		$index		This post is formatted for display on an index if true
 *  @param string	$custom		Custom post type which will be used as its extension
 *  @return string
 */
function formatPost(
	string	&$title,
	array	&$tags,
	string	&$summ,
	string	&$type, 
	int	&$rtime, 
	array	$post,
	string	$path,
	string	$tpl,
	int	$slvl,
	int	$fline,
	bool	$index		= false,
	string	$custom		= ''
) : string {	
	// Check for post validity
	if ( count( $post ) < 3 ) {
		return '';
	}
	$pub	= getPub( $path );
	
	// Process features
	$feat	= postFeatures( $post, $fline );
	
	// Core features
	$tags	= $feat['tags'] ?? [];
	$summ	= $feat['summary'] ?? '';
	$type	= $feat['type'] ?? \POST_TYPE;
	$meta	= $feat['meta'] ?? [];
	
	// Apply metadata
	metadata( $title, $perm, $pub, $post, $path );
	
	// Everything else after the first line is the body
	$post	= \array_slice( $post, 1 );
	$body	= html( \implode( "\n", $post ), homeLink() );
	
	// Calculate read time, if appropriate, from formatted body
	$rtime	= hasReadTime( $type ) ? readingTime( $body ) : 0;
	
	hook( [ 'formatpost', [ 
		'type'		=> $type,	// Post type
		'title'		=> $title,	// Post main title
		'tags'		=> $tags,	// Array of tags
		'permalink'	=> $perm,	// Permalink
		'published'	=> $pub,	// Publish date
		'readtime'	=> $rtime,	// Estimated reading time
		'summary'	=> $summ,	// Formatted post summary
		'body'		=> $body,	// Formatted post body
		'slevel'	=> $slvl,	// Summary level
		'features'	=> $feat,	// Any extra features
		'fline'		=> $fline,	// Feature search lines
		'meta'		=> $meta,	// Custom metadata
		'index'		=> $index,	// Post being rendered on archive index
		'template'	=> $tpl,	// Given template
		'custom'	=> $custom	// Custom post type
	] ] ) ;
	
	$html	= hookHTML( 'formatpost' );
	
	// If the hook rendered this post, send it back
	if ( !empty( $html ) ) {
		return $html;
	}
	
	// Format metadata
	$data		= 
	formatMeta( $title, $type, $pub, $perm, $rtime, $tags, $index, $custom );
	
	switch( $slvl ) {
		case 1:
			$data['body'] = empty( $summ ) ? $body : $summ;
			break;
			
		case 2:
			$data['body'] = $summ;
			break;
			
		default: 
			$data['body'] = $body;
	}
	
	return render( $tpl, $data );
}

/**
 *  Request filter event
 *  
 *  @param string	$event	Request event name
 *  @param array	$hook	Previous hook event data
 *  @param array	$params	Passed event data
 */
function filterRequest( string $event, array $hook, array $params ) {
	$now	= time();
	$mpage	= config( 'max_page', \MAX_PAGE, 'int' );
	$ys	= config( 'year_start', \YEAR_START, 'int' );
	$ye	= config( 'year_end', \YEAR_END, 'int' );
	
	$filter	= [
		'id'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 1,
				'default'	=> 0
			]
		],
		'page'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 1,
				'max_range'	=> $mpage,
				'default'	=> 1
			]
		],
		'year'	=> [
			'filter'	=> \FILTER_SANITIZE_NUMBER_INT,
			'options'	=> [
				'min_range'	=> $ys,
				'max_range'	=> $ye,
				'default'	=> 
				( int ) \date( 'Y', $now )
			]
		],
		'month'	=> [
			'filter'	=> \FILTER_SANITIZE_NUMBER_INT,
			'options'	=> [
				'min_range'	=> 1,
				'max_range'	=> 12,
				'default'	=> 
				( int ) \date( 'n', $now )
			]
		],
		'day'	=> [
			'filter'	=> \FILTER_SANITIZE_NUMBER_INT,
			'options'	=> [
				'min_range'	=> 1,
				'max_range'	=> 31,
				'default'	=> 
				( int ) \date( 'j', $now )
			]
		],
		'tag'	=> [
			'filter'	=> \FILTER_CALLBACK,
			'options'	=> 'unifySpaces'
		],
		'slug'	=> [
			'filter'	=> \FILTER_SANITIZE_FULL_SPECIAL_CHARS,
			'options'	=> [ 'default' => '' ]
		],
		'find'	=> [
			'filter'	=> \FILTER_CALLBACK,
			'options'	=> 'unifySpaces'
		],
		'token'	=> \FILTER_SANITIZE_FULL_SPECIAL_CHARS,
		'nonce'	=> \FILTER_SANITIZE_FULL_SPECIAL_CHARS,
		'meta'	=> \FILTER_SANITIZE_FULL_SPECIAL_CHARS
	];
	
	return 
	\array_merge( $hook, \filter_var_array( $params, $filter ) );
}

/**
 *  Format index views for archives and tags
 *  
 *  @param string	$prefix		Pagination page path prefix
 *  @param int		$page		Current page index
 *  @param array	$post		Collection of entries
 *  @param bool		$cache		Cache output result with current URI
 */
function formatIndex( 
	string	$prefix, 
	int	$page		= 1, 
	array	$posts		= [], 
	bool	$cache		= true 
) {
	
	// Don't cache if no posts found
	$cache	= empty( $posts ) ? false : $cache;
	$ptitle	= config( 'page_title', \PAGE_TITLE );
	$psub	= config( 'page_sub', \PAGE_SUB );
	
	// Use the render plugin if added
	hook( [ 'renderindex', [ 
		'prefix'	=> $prefix,
		'title'		=> $ptitle,
		'subtitle'	=> $psub,
		'posts'		=> $posts,
		'page'		=> $page,
		'cache'		=> $cache
	] ] ) ;
	
	// Plugin rendered? Send rendered index
	sendOverride( 'renderindex' );
	
	// Default handler
	$mlinks	= config( 'default_main_links', \DEFAULT_MAIN_LINKS );
	$heading = 
	hookWrap( 
		'beforepostindexheading',
		'afterpostindexheading',
		template( 'tpl_page_heading' ), [
			'page_title'	=> $ptitle,
			'tagline'	=> $psub,
			
			// Navigation links
			'main_links'	=> 
			renderNavLinks( template( 'tpl_mainnav_wrap' ), $mlinks ),
			
			// Search form
			'search_form'	=> searchForm()
		] 
	);
	
	$tpl = [
		'post_title'	=> $ptitle,
		'page_title'	=> $ptitle,
		'lang'		=> config( 'language', \LANGUAGE ),
		'home'		=> homeLink(),
		'body_before'	=> $heading
	];
	
	if ( empty( $posts ) ) {
		// No posts message with home link set
		$tpl['body']		= 
		render( 
			template( 'tpl_noposts' ), 
			[ 'home'	=> homeLink() ] 
		);
		$tpl['body_after']	= 
		render( template( 'tpl_page_nextprev' ), [ 'links' => navHome() ] );
	} else {
		$tpl['body']		= \implode( '', $posts );
		$tpl['body_after']	= 
		paginate( $page, $prefix, $posts );
	}
	
	$tpl['body_after']	.= pageFooter();
	
	$page_t	= 
	hookWrap( 
		'beforepostindex',
		'afterpostindex',
		template( 'tpl_full_page'), 
		$tpl, 
		true 
	);
	
	// Send results
	shutdown( 'cleanup' );
	send( 200, $page_t, $cache );
}



/**
 *  User input and form processing
 */

/**
 *  Initiate field token or reset existing
 *  
 *  @return string
 */ 
function tokenKey( bool $reset = false ) : string {
	sessionCheck();
	if ( empty( $_SESSION['TOKEN_KEY'] ) || $reset ) {
		$_SESSION['TOKEN_KEY'] = genId( 16 );
	}
	
	return $_SESSION['TOKEN_KEY'];
}

/**
 *  Generate a hash for meta data sent to HTML forms
 *  
 *  This function helps prevent tampering of metadata sent separately
 *  to the user via other hidden fields
 *  
 *  @example genMetaKey( [ 'id=12','name=DoNotChange' ] ); 
 *  
 *  @param array	$args	Form field names sent to generate key
 *  @param bool		$reset	Reset any prior token key if true
 *  @return string
 */
function genMetaKey( array $args, bool $reset = false ) : string {
	static $gen	= [];
	$data		= \implode( ',', $args );
	
	if ( \array_key_exists( $data, $gen ) && !$reset ) {
		return $gen[$data];
	}
	
	$ha		= hashAlgo( 'nonce_hash', \NONCE_HASH );
	$gen[$data]	= 
	\base64_encode( 
		\hash( $ha, $data . tokenKey( $reset ), true ) 
	);
	
	return $gen[$data];
}

/**
 *  Verify meta data key
 *  
 *  @param string	$key	Token key name
 *  @param array	$args	Original form field names sent to generate key
 *  @return bool		True if token matched
 */
function verifyMetaKey( string $key, array $args ) : bool {
	if ( empty( $key ) ) {
		return false;
	}
	
	$info	= \base64_decode( $key, true );
	if ( false === $info ) {
		return false;
	}
	
	$data	= \implode( ',', $args );
	$ha	= hashAlgo( 'nonce_hash', \NONCE_HASH );
	
	return 
	\hash_equals( 
		$info, 
		\hash( $ha, $data . tokenKey(), true ) 
	);
}

/**
 *  Create a unique nonce and token pair for form validation and meta key
 *  
 *  @param string	$name	Form label for this pair
 *  @param array	$fields	If set, append form anti-tampering token
 *  @param bool		$reset	Reset any prior anti-tampering token key if true
 *  @return array
 */
function genNoncePair( 
	string		$name, 
	array		$fields		= [], 
	bool		$reset		= false 
) : array {
	$tb	= config( 'token_bytes', \TOKEN_BYTES, 'int' );
	$ha	= hashAlgo( 'nonce_hash', \NONCE_HASH );
	
	$nonce	= genId( intRange( $tb, 8, 64 ) );
	$time	= time();
	$data	= $name . $time;
	$token	= "$time:" . \hash( $ha, $data . $nonce );
	return [ 
		'token' => \base64_encode( $token ), 
		'nonce' => $nonce,
		'meta'	=> 
			empty( $fields ) ? '' : genMetaKey( $fields, $reset )
	];
}

/**
 *  Verify form submission by checking sent token and nonce pair
 *  
 *  @param string	$name	Form label to validate
 *  @params string	$token	Sent token
 *  @params string	$nonce	Sent nonce
 *  @param bool		$chk	Check for form expiration if true
 *  @return int
 */
function verifyNoncePair(
	string		$name, 
	string		$token, 
	string		$nonce,
	bool		$chk
) : int {
	
	$ln	= \strlen( $nonce );
	$lt	= \strlen( $token );
	
	// Sanity check
	if ( 
		$ln > 100 || 
		$ln <= 10 || 
		$lt > 350 || 
		$lt <= 10
	) {
		return \FORM_STATUS_INVALID;
	}
	
	// Open token
	$token	= \base64_decode( $token, true );
	if ( false === $token ) {
		return \FORM_STATUS_INVALID;
	}
	
	// Token parameters are intact?
	if ( false === \strpos( $token, ':' ) ) {
		return \FORM_STATUS_INVALID;
	}
	
	$parts	= \explode( ':', $token );
	$parts	= \array_filter( $parts );
	if ( \count( $parts ) !== 2 ) {
		return \FORM_STATUS_INVALID;
	}
	
	if ( $chk ) {
		// Check for flooding
		$time	= time() - ( int ) $parts[0];
		$fdelay	= config( 'form_delay', \FORM_DELAY, 'int' );
		if ( $time < $fdelay ) {
			return \FORM_STATUS_FLOOD;
		}
		
		// Check for form expiration
		$fexp	= config( 'form_expire', \FORM_EXPIRE, 'int' );
		if ( $time > $fexp ) {
			return \FORM_STATUS_EXPIRED;
		}
	}
	
	$ha	= hashAlgo( 'nonce_hash', \NONCE_HASH );
	$data	= $name . $parts[0];
	$check	= \hash( $ha, $data . $nonce );
	
	return \hash_equals( $parts[1], $check ) ? 
		\FORM_STATUS_VALID : \FORM_STATUS_INVALID;
}

/**
 *  Validate sent token/nonce pairs in sent form data
 *  
 *  @param string	$name	Form label to validate
 *  @param bool		$get	Validate get request if true
 *  @param bool		$chk	Check for form expiration if true
 *  @param array	$fields	If set, verify form anti-tampering token
 *  @return int
 */
function validateForm(
	string		$name, 
	bool		$get		= true,
	bool		$chk		= true,
	array		$fields		= []
) : int {
	$filter = [
		'token'	=> \FILTER_SANITIZE_FULL_SPECIAL_CHARS,
		'nonce'	=> \FILTER_SANITIZE_FULL_SPECIAL_CHARS,
		'meta'	=> \FILTER_SANITIZE_FULL_SPECIAL_CHARS
	];
	
	$data	= $get ? 
	\filter_input_array( \INPUT_GET, $filter ) : 
	\filter_input_array( \INPUT_POST, $filter );
	
	if ( empty( $data['token'] ) || empty( $data['nonce'] ) ) {
		return \FORM_STATUS_INVALID;
	}
	
	if ( empty( $fields ) ) {
		return 
		verifyNoncePair( $name, $data['token'], $data['nonce'], $chk );
	}
	
	// If fields were set, meta key was generated
	// Check if it's still there
	if ( !verifyMetaKey( $data['meta'] ?? '', $fields ) ) {
		return \FORM_STATUS_INVALID;
	}
	
	return 
	verifyNoncePair( $name, $data['token'], $data['nonce'], $chk );
}

/**
 *  Make text completely bland by stripping punctuation, 
 *  spaces and diacritics (for further processing)
 *  
 *  @param string	$text		Raw input text
 *  @param bool		$nospecial	Remove special characters if true
 *  @return string
 */
function bland( string $text, bool $nospecial = false ) : string {
	$text = \strip_tags( unifySpaces( $text ) );
	
	if ( $nospecial ) {
		return \preg_replace( 
			'/[^\p{L}\p{N}\-\s_]+/', '', \trim( $text ) 
		);
	}
	return \trim( $text );
}

/**
 *  Find word or character count within a block of text
 *  
 *  @param string	$find	Raw text to match
 *  @param string	$mode	Word splitting mode
 *  @return int
 */
function wordcount( string $find, string $mode = '' ) : int {
	// Select split type
	switch( $mode ) {
		case 'dist':
			// Words seprated by non-letters and non-punctuation
			$pat = '/[^\p{L}\p{P}]+/u';
			break;
			
		case 'chars':
			// All characters
			$pat = '//u';
			break;
			
		case 'words':
			// Split into words separated by non-letter/num chars
			$pat = '/[^\p{L}\p{N}\-_\']+/u';
			break;

		default:
			// Simplest split by various separators. E.G. Space
			$pat = '/[\p{Z}]+/u';
	}
	
	$c = \preg_split( $pat, $find, -1, \PREG_SPLIT_NO_EMPTY );
	return ( false === $c ) ? 0 : count( $c );
}

/**
 *  Estimate reading time in minutes based on words/characters in a text block
 *  
 *  @param string $text Text input
 *  @return int
 */
function readingTime( string $text ) : int {
	static $sets;
	if ( !isset( $sets ) ) {
		// Deafult character and measurement sets
		$default = [
			// Matching type, average matches / minute, character pattern
			[ 'words', 230, '/[\p{Latin}\p{Greek}\p{Cyrillic}]/u' ],
			[ 'words', 250, '/[\p{Arabic}\p{Hebrew}]/u' ],
			
			[ 'chars', 1000, '/[\p{Han}\p{Hiragana}\p{Katakana}]/u' ]
		];
		
		// Send to hook for additional sets
		hook( [ 'readingtime', [ 'sets' => $default ] ] );
		$sets	= hookArrayResult( 'readingtime' )['sets'] ?? $default;
	}
	
	// Remove tags and trim
	$text	= bland( $text );
	if ( empty( $text ) ) {
		return 1;
	}
	
	// Default
	$speed	= 200;
	$set	= 'words';
	
	// Total characters
	$chars	= wordcount( $text, 'chars' );
	
	// Previous character count
	$prev	= 0;
	
	// Guess language type based on search chars to total chars ratio
	foreach( $sets as $k => $v ) {
		if ( !preg_match( $v[2], $text ) ) {
			continue;
		}
		
		// Character set found
		$m = \preg_split( $v[2], $text );
		if ( false === $m ) {
			continue;
		}
		
		$c = count( $m );
		if ( !$c ) { continue; }
		
		// Current character ratio exceeds previous? Set new defaults
		if ( ( $c / $chars ) > ( $prev / $chars ) ) {
			$set	= $v[0];
			$speed	= $v[1];
			$prev	= $c;
		}
	}
	
	// Always send back at least 1 minute reading time
	$rt = ( int ) ceil( wordcount( $text, $set ) / $speed );
	return ( $rt < 1 ) ? 1 : $rt;
}

/**
 *  Process search pattern for full text searching
 *  
 *  @param string	$find	Sent search parameters
 *  @return string
 */
function searchData( string $find ) : string {
	// Remove tags and trim
	$find	= bland( $find );
	if ( empty( $find ) ) {
		return '';
	}
	
	// Search words including quoted terms
	if ( \preg_match_all( '/"(?:\\\\.|[^\\\\"])*"|\S+/', $find, $m ) ) {
		if ( empty( $m ) ) {
			return '';
		}
		$fdata	= \array_unique( $m[0] ?? [] );
	} else {
		return '';
	}
	
	if ( empty( $fdata ) ) {
		return '';
	}
	
	// Limit maximum number of unique words to search
	$sc	= config( 'max_search_words', \MAX_SEARCH_WORDS, 'int' );
	if ( count( $fdata ) > $sc ) {
		$fdata = \array_slice( $fdata, 0, $sc );
	}
	
	// Insert ' OR ' for multiple terms
	$find	= \implode( ' OR ', $fdata );
	
	// Remove conflicting/duplicate params
	$find	= 
	\preg_replace( '/\b(AND|OR|NEAR|NOT)(?:\s\1)+/iu', 'OR', $find );
	
	$find	= \preg_replace( '/\bOR NEAR/iu', 'NEAR', $find );
	$find	= \preg_replace( '/\bNEAR OR/iu', 'NEAR', $find );
	$find	= \preg_replace( '/\bOR AND/iu', 'AND', $find );
	$find	= \preg_replace( '/\bAND OR/iu', 'AND', $find );
	$find	= \preg_replace( '/\bOR NOT/iu', 'NOT', $find );
	$find	= \preg_replace( '/\bNOT OR/iu', 'NOT', $find );
	
	$find	= 
	\preg_replace( '/\b(AND|OR|NEAR|NOT)(?:\s\1)+/iu', 'OR', $find );
	
	// Return with keywords removed from beginning and end
	return 
	\preg_replace( 
		'/^(AND|OR|NEAR|NOT)(.*)(AND|OR|NEAR|NOT)$/ius', 
		'$2', \trim( $find )
	);
}

/**
 *  Render search form template
 *  
 *  @return string
 */
function searchForm() : string {
	// Search form hidden fields
	$pair	= genNoncePair( 'searchform' );
	
	// Send to xsrf hooks
	$xsrf	= 
	hookWrap( 
		'beforesearchxsrf',
		'aftersearchxsrf',
		template( 'tpl_input_xsrf' ), 
		[ 
			'nonce'	=> $pair['nonce'], 
			'token'	=> $pair['token'],
			'meta'	=> '' // Search forms are cached
		]
	);
	
	// Send search form hook output
	return
	hookWrap( 
		'beforesearchform',
		'afterearchform',
		template( 'tpl_searchform' ), 
		[ 'xsrf' => $xsrf ]
	);
}

/**
 *  Render search pagination path
 *  
 *  @param array	$data	Search page URL components
 *  @return string
 */
function searchPagePath( array $data ) : string {
	return homeLink() . 
		'?nonce=' . $data['nonce'] . 
		'&token=' . $data['token'] . 
		'&meta=' . $data['meta'] . 
		'&find=' . $data['find'] . '/';
}


/**
 *  Special handlers
 */

/**
 *  Reload indexes on cache db creation
 */
function reloadIndex( string $event, array $hook, array $params ) {
	if ( !isset( $params['dbname'] ) ) {
		return;
	}
	
	// New cache database was created
	if ( 0 == \strcmp( $params['dbname'], \CACHE_DATA ) ) {
		internalState( 'prepareIndex', true );
	}
}

/**
 *  Format preview info into link, return as rendered HTML or array
 *  
 *  @param string	$path		Post permalink
 *  @param string	$mode		Link render mode
 *  @param bool		$nr		Don't render template if true
 *  @return mixed
 */
function previewLink( 
	string		$path, 
	string		$mode	= '', 
	bool		$nr	= false 
) {
	$ppath	= getPostFileDir( 'posts' ) . $path. '.md';
	$data	= loadText( $ppath );
	if ( empty( $data ) ) {
		return '';
	}
	
	$title	= '';
	$perm	= '';
	$pub	= getPub( $path );
	
	metadata( $title, $perm, $pub, $data, $path );
	
	// Send to render hook
	hook( [ 'previewlink', [
		'permalink'	=> $perm,
		'title'		=> $title,
		'path'		=> $path,
		'published'	=> $pub,
		'mode'		=> $mode,
		'render'	=> $nr,
		'data'		=> $data
	] ] );
	
	// Return hook result as array if not rendering
	if ( $nr ) {
		$out	= hookArrayResult( 'previewlink' );
		if ( !empty( $out ) ) {
			return $out;
		}
	}  else {
		$out	= hookHTML( 'previewlink' );
		if ( !empty( $out ) ) {
			return $out;
		}
	}
	
	switch( $mode ) {
		case 'prev':
		case 'previous':
			return
			render( template( 'tpl_np_prevlink' ), [ 
				'url'	=> $perm,
				'text'	=> $title
			] ); 
			
		case 'next':
			return
			render( template( 'tpl_np_nextlink' ), [ 
				'url'	=> $perm,
				'text'	=> $title
			] ); 
			
		default: 
			return $nr ? // Don't render?
			[ 
				'{url}'		=> $perm,
				'{text}'	=> $title
			] : 
			render( template( 'tpl_link' ), [ 
				'url'	=> $perm,
				'text'	=> $title
			] ); 
	}
}

/**
 *  Render next/previous post details
 *  
 *  @param string	$path	Current post permalink path
 *  @return string
 */
function getSiblings( string $path ) : string {
	$res	= 
	getResults( 
		"SELECT * FROM post_siblings WHERE post_path = :path", 
		[ ':path' => slashPath( $path ) ], 
		\CACHE_DATA 
	);
	
	hook( [ 'getsiblings', [
		'posts'	=> $res,
		'path'	=> $path
	] ] );
	
	$out	= hookHTML( 'getsiblings' );
	if ( !empty( $out ) ) {
		return $out;
	}
	
	if ( empty( $res ) ) {
		return '';
	}
	$out = '';
	$p = $res[0];
	
	if ( !empty( $p['prev_path'] ) ) {
		$out .= previewLink( $p['prev_path'], 'prev' );	
	}
	
	if ( !empty( $p['next_path'] ) ) {
		$out .= previewLink( $p['next_path'], 'next' );	
	}
	
	return render( 
		template( 'tpl_siblingnav' ), [ 'links' => $out ] 
	);
}

/**
 *  Get common words in text for searching
 *  
 *  @param array	$lines		Content to process
 *  @param bool		$as_array	Returns as an array if true
 *  @return mixed
 */
function getCommonWords( array $lines, bool $as_array = true ) {
	static $stop;
	
	// Exclude some English stop words
	static $default	= [
		'a', 'about', 'able', 'above', 'act', 'after', 'again', 
		'against', 'ago', 'all', 'also', 'am', 'an', 'and', 'any', 
		'apart', 'are', 'aren\'t', 'as', 'as', 'at', 'away', 
		'be', 'because', 'been', 'before', 'being', 'besides', 
		'beside', 'below', 'between', 'beyond', 'both', 'but', 
		'by', 'can', 'can\'t', 'cannot', 'could', 'couldn\'t', 
		'did', 'didn\'t', 'do', 'does', 'doesn\'t', 'doing', 
		'don\'t', 'down', 'during', 'each', 'few', 'for', 'from', 
		'further', 'had', 'hadn\'t', 'has', 'hasn\'t', 'have', 
		'haven\'t', 'having', 'he', 'he\'d', 'he\'ll', 'he\'s', 
		'her', 'here', 'here\'s', 'hers', 'herself', 'hi', 'him', 
		'himself', 'his', 'how', 'how\'s', 'i', 'i\'d', 'i\'ll', 
		'i\'m', 'i\'ve', 'ie', 'if', 'in', 'into', 'is', 'isn\'t', 
		'it', 'it\'s', 'its', 'itself', 'let\'s', 'like', 'j', 'k', 
		'km', 'kg', 'last', 'late', 'later', 'latter', 'may', 'maybe', 
		'me', 'more', 'most', 'mustn\'t', 'my', 'myself', 'no', 
		'nor', 'not', 'of', 'off', 'ok', 'on', 'once', 'only', 
		'or', 'other', 'ought', 'our', 'ours', 'ourselves', 
		'out', 'over', 'own', 'same', 'shan\'t', 'she', 'she\'d', 
		'she\'ll', 'she\'s', 'should', 'shouldn\'t', 'so', 
		'some', 'soon', 'such', 'than', 'that', 'that\'s', 'the', 
		'their', 'theirs', 'them', 'themselves', 'then', 'there', 
		'there\'s', 'these', 'they', 'they\'d', 'they\'ll', 
		'they\'re', 'they\'ve', 'this', 'those', 'through', 'to', 
		'too', 'under', 'until', 'up', 'very', 'was', 'wasn\'t', 
		'we', 'we\'d', 'well', 'we\'ll', 'we\'re', 'we\'ve', 
		'were', 'weren\'t', 'will', 'what', 'what\'s', 'when', 
		'when\'s', 'where', 'where\'s', 'which', 'while', 'who', 
		'who\'s', 'whom', 'why', 'why\'s', 'with', 'won\'t', 
		'would', 'wouldn\'t', 'yet', 'yes', 'you', 'you\'d', 
		'you\'ll', 'you\'re', 'you\'ve', 'your', 'yours', 
		'yourself', 'yourselves'
	];
	
	// Preset stop words
	if ( !isset( $stop ) ) {
		// Configured stop words
		$cstop	= config( 'stop_words', [], 'array' );
		$stop	= ( \is_array( $cstop ) && !empty( $cstop ) ) ?
				\array_merge( $default, $cstop ) : $default;
		
		// Send to hook for additional stop words
		hook( [ 'stopwords', [ 'words' => $stop ] ] );
		$stop	= hookArrayResult( 'stopwords' )['words'] ?? $stop;
		
	}
	
	// Make lines into a continous series of words
	$text	= \implode( ' ', $lines );
	
	// str_word_count alternative for unicode
	$words	= 
	\preg_split( '/[^\p{L}\p{N}\']+/u', lowercase( $text ) );
	
	// Take out stop words
	$words	= \array_diff( $words, $stop );
	
	// Most frequently used words
	$fr	= \array_count_values( $words );
	\arsort( $fr );
	
	$words	= \array_unique( \array_keys( $fr ) );
	
	return $as_array ? $words : implode( ' ', $words );
}

/**
 *  Get posts related to current one by content
 *  
 *  @param string	$path	Current post permalink path
 *  @return string
 */
function getRelated( string $path ) : string {
	$path	= slashPath( $path );
	$res	= 
	getResults( 
		'SELECT post_bare FROM posts WHERE post_path = :path', 
		[ ':path' => $path ],
		\CACHE_DATA
	);
	
	if ( empty( $res ) ) {
		return '';
	}
	
	$text	= $res[0]['post_bare'] ?? '';
	if ( empty( $text ) ) {
		return '';
	}
	
	$lines	= lines( $text );
	if ( empty( $lines ) ) {
		return '';
	}
	
	// Parse common words, excluding stop words
	$words	= getCommonWords( $lines, false );
	
	// Make search data with full title intact ( quotes removed )
	$title	= \strtr( \current( $lines ), [ '"' => '' ] );
	$data	= searchData( '"' . $title . '" ' . $words );
	$rlimit	= config( 'related_limit', \RELATED_LIMIT, 'int' );
	
	// Search for related content excluding current post
	$search	= 
	getResults( 
		"SELECT DISTINCT post_path FROM (
			SELECT 
			posts.post_path AS post_path, 
			matchinfo(post_search) AS rel
			FROM post_search 
			LEFT JOIN posts ON post_search.docid = posts.id 
			WHERE post_search MATCH :find
			ORDER BY rel DESC
			LIMIT :limit
		) WHERE post_path NOT IN ( :path ) 
			GROUP BY post_path;",
		[ 
			':find'		=> $data, 
			':limit'	=> $rlimit,
			':path'		=> $path
		],
		\CACHE_DATA
	);
	
	if ( empty( $search ) ) {
		return '';
	}
	
	// Apply render
	hook( [ 'getrelated', [ 
		'search'	=> $search,
		'title'		=> $title,
		'limit'		=> $rlimit
	] ] );
	
	$html	= hookHTML( 'getrelated' );
	if ( !empty( $html ) ) {
		return $html;
	}
	
	$out	= [];
	foreach( $search as $p ) {
		$out[] = 
		previewLink( \trim( $p['post_path'] ) );
	}
	
	return 
	render( 
		template( 'tpl_relatednav' ), 
		[ 'links' => \implode( '', $out ) ] 
	);	
}

/**
 *  Aggregate post body depending on summary level
 *  
 *  @param array	$res	Post data results
 *  @return array
 */
function collectBody( array $res ) : array {
	if ( empty( $res ) ) {
		return [];
	}
	$slvl	= config( 'summary_level', \SUMMARY_LEVEL, 'int' );
	$posts	= [];
	switch( $slvl ) {
		case 1: 
			foreach( $res as $r ) {
				$posts[] = 
				empty( $r['post_summary'] ) ?
					$r['post_view'] : $r['post_summary'];
			}
			break;
		
		case 2: 
			foreach( $res as $r ) {
				$posts[] = $r['post_summary'];
			}
			break;
			
		default: 
			foreach( $res as $r ) {
				$posts[] = $r['post_view'];
			}
	}
	return $posts;
}


/**
 *  Route actions
 */

/**
 *  Static page display helper. E.G. for homepage or about
 *  
 *  @param string	$label		Page name 'home', 'about' etc...
 *  @param string	$path		Relative URL E.G. '/'
 *  @param string	$links		Default link definition (overridden by $label)
 *  @param array	$post		Page content as a list of lines
 *  @param bool		$forms		This page may contain forms (E.G. contact page)
 *  @param bool		$cache		Cache this page if true
 */
function staticPage( 
	string	$label,
	string	$path,
	string	$links,
	array	$post,
	bool	$forms		= true,
	bool	$cache		= true
) {
	$ptitle	= config( 'page_title', \PAGE_TITLE );
	$psub	= config( 'page_sub', \PAGE_SUB );
	
	// First line is the title, everything else is the body
	$title	= title( \array_shift( $post ) );
	$body	= html( \implode( "\n", $post ), homeLink(), $forms );
	
	// Send to render hook
	hook( [ $label . 'render', [ 
		'title'		=> $title,
		'posttitle'	=> $ptitle,
		'subtitle'	=> $psub,
		'body'		=> $body,
		'path'		=> $path
	] ] );
	
	// Send result if hook returned content
	sendOverride( $label . 'render' );
	
	// Assemble page components
	$slinks	= config( 'default_' . $label . '_links', $links );
	$heading = 
	hookWrap( 
		'before' . $label . 'heading',
		'after' . $label . 'heading',
		template( 'tpl_' . $label . '_heading' ), [
			'page_title'	=> $title,
			'tagline'	=> $psub,
			
			// Navigation links
			$label . '_links'	=> 
			renderNavLinks( template( 'tpl_mainnav_wrap' ), $slinks ),
			
			// Search form
			'search_form'	=> searchForm()
		] 
	);
	
	$page_t	= 
	hookWrap( 
		'before' . $label . 'page',
		'after' . $label . 'page',
		template( 'tpl_' . $label . '_page' ) , [
			'page_title'	=> $ptitle,
			'post_title'	=> $title . ' - ' . $ptitle,
			'lang'		=> 
				config( 'language', \LANGUAGE ),
			'home'		=> homeLink(),
			'feedlink'	=> feedLink(),
			'body_before'	=> $heading,
			'body'		=> $body,
			'body_after'	=> pageFooter()
		], 
		true 
	);
	
	shutdown( 'cleanup' );
	send( 200, $page_t, $cache );
}

/**
 *  Static page retrieval helper
 *  
 *  @param string	$page	Retrieval page path
 *  @return array
 */
function loadStaticPage( string $page ) : array {
	$root	= \rtrim( POSTS, '/' );
	$path	= slashPath( $page );
	$post	= loadText( $root . $path );
	
	if ( empty( $post ) ) {
		
		// Try a site-specific page
		$hroot	= $root . slashPath( getHost() );
		$post	= loadText( $hroot . $path );
	}
	
	return $post;
}

/**
 *  Show homepage or archive depending on whether home.md page is in POSTS
 */
function showHome( string $event, array $hook, array $params ) {
	$post	= loadStaticPage( 'home.md' );
	
	// No homepage found
	if ( empty( $post ) ) {
		// Passthrough to showArchive
		return;	
	}
	
	internalState( 'homeFound', true );
	staticPage( 'home', '/', \DEFAULT_MAIN_LINKS, $post );
}

/**
 *  View about page and other custom content
 */
function showAbout( string $event, array $hook, array $params ) {
	$path	= $params['tree'] ?? 'main'; // Sub about page or main
	$apath	= 'about/' . $path . '.md';
	$post	= loadStaticPage( $apath );
	
	// No about found
	if ( empty( $post ) ) {
		sendNotFound();
	}
	
	staticPage( 'about', '/about/' . $path, \DEFAULT_ABOUT_LINKS, $post );
}

/**
 *  Archived posts by date
 */
function showArchive( string $event, array $hook, array $params ) {
	if ( internalState( 'homeFound' ) ) {
		return;
	}
	
	// If full index needs to be reloaded
	if ( internalState( 'prepareIndex' ) ) {
		shutdown( 'loadIndex' );
	}
	
	$page	= ( int ) ( $params['page'] ?? 1 );
	
	hook( [ 'showarchiveprep', [
		'params'	=> $params,
		'page'		=> $page
	] ] );
	
	// Override content if hook already rendered
	sendOverride( 'showarchiveprep' );
	
	$prefix	= '';
	$s	= '/';
	$stamp	= null;
	$date	= [];
	
	$slvl	= config( 'summary_level', \SUMMARY_LEVEL, 'int' );
	
	// Full archive
	if ( empty( $params['year'] ) ) {
		$posts	= loadPosts( $page, '', false, $slvl );
		$prefix	= slashPath( homeLink(), true );
	
	// Starting from year?
	} else {
		// Filter dates
		$date	= enforceDates( $params );
		$stamp	= $date[0] . $s;
		
		// Including month?
		if ( !empty( $params['month'] ) ) {
			// Including day?
			$stamp	.= 
			empty( $params['day'] ) ?
				$date[1] : $date[1] . $s . $date[2];
		}
		$stamp	= \trim( $stamp, $s ) . $s;
		$prefix	= slashPath( homeLink(), true ) . $stamp;
		$posts	= loadPosts( $page, $stamp, false, $slvl );
	}
	
	hook( [ 'showarchive', [
		'params'	=> $params,
		'date'		=> $date,
		'page'		=> $page,
		'stamp'		=> $stamp ?? '',
		'prefix'	=> $prefix
	] ] );
	
	sendOverride( 'showarchive' );
	
	// Display archive
	formatIndex( $prefix, $page, $posts );
}

/**
 *  Browsing tags
 */
function showTag( string $event, array $hook, array $params ) {
	if ( internalState( 'prepareIndex' ) ) {
		loadIndex();
	}
	
	// Tag empty?
	if ( empty( $params['tag'] ) ) {
		sendNotFound();
	}
	
	$tag	= slugify( $params['tag'] );
	$page	= ( int ) ( $params['page'] ?? 1 );
	$prefix	= homeLink() . 'tags/' . $tag . '/';
	
	// Pagination prep
	$plimit	= config( 'page_limit', \PAGE_LIMIT, 'int' );
	$start	= ( $page - 1 ) * $plimit;
	
	// Get cached tags
	$res	= 
	getResults( 
		"SELECT DISTINCT 
			posts.post_path AS post_path, 
			posts.post_view AS post_view, 
			posts.post_summary AS post_summary, 
			posts.post_type AS post_type FROM posts 
			JOIN post_tags ON posts.id = post_tags.post_id 
			WHERE post_tags.tag_slug = :tag 
			ORDER BY posts.published DESC 
			LIMIT :limit OFFSET :offset;", 
		[
			':tag'		=> $tag, 
			':limit'	=> $plimit, 
			':offset'	=> $start
		],
		\CACHE_DATA
	);
	
	// Send to render hook
	hook( [ 'tagsearchrender', [ 
		'prefix'	=> $prefix,
		'date'		=> [],
		'tag'		=> $tag,
		'limit'		=> $plimit,
		'start'		=> $start,
		'page'		=> $page,
		'results'	=> $res
	] ] );
	
	// Send result if hook returned content
	sendOverride( 'tagsearchrender' );
	
	// Display tag
	formatIndex( $prefix, $page, collectBody( $res ) );
}

/**
 *  Show search results ( This page isn't cached )
 */
function showSearch( string $event, array $hook, array $params ) {
	if ( internalState( 'prepareIndex' ) ) {
		loadIndex();
	}
	
	$status		= validateForm( 'searchform', true, false );
	switch( $status ) {
		case FORM_STATUS_INVALID:
		case FORM_STATUS_EXPIRED:
			sendDenied( 'Expired', 'expired', \MSG_EXPIRED );
		
		case FORM_STATUS_FLOOD:
			visitorError( 429, 'Flood' );
			sendError( 429, errorLang( "toomany", \MSG_TOOMANY ) );
	}
	
	$find	= searchData( $params['find'] ?? '' );
	if ( empty( $find ) ) {
		sendNotFound();
	}
	
	$prefix = searchPagePath( $params );
	$page	= ( int ) ( $params['page'] ?? 1 );
	
	// Pagination prep
	$plimit	= config( 'page_limit', \PAGE_LIMIT, 'int' );
	$start	= ( $page - 1 ) * $plimit;
	
	$res	= 
	getResults( 
		"SELECT DISTINCT post_view FROM (
			SELECT 
			posts.post_view AS post_view, 
			posts.post_summary AS post_summary, 
			posts.post_type AS post_type, 
			matchinfo(post_search) AS rel
			FROM post_search 
			LEFT JOIN posts ON post_search.docid = posts.id 
			WHERE post_search MATCH :find
			ORDER BY rel DESC
			LIMIT :limit OFFSET :offset
		) GROUP BY post_view;", 
		[ 
			':find'		=> $find,
			':limit'	=> $plimit,
			':offset'	=> $start
		], 
		\CACHE_DATA 
	);
	
	// Send to render hook
	hook( [ 'searchrender', [ 
		'prefix'	=> $prefix,
		'find'		=> $find,
		'limit'		=> $plimit,
		'start'		=> $start,
		'page'		=> $page,
		'date'		=> [],
		'results'	=> $res,
		'status'	=> $status
	] ] );
	
	// Send result if hook returned content
	sendOverride( 'searchrender' );
	
	// Display search
	formatIndex( $prefix, $page, collectBody( $res ) );
}


/**
 *  Syndication feed
 */
function showFeed( string $event, array $hook, array $params ) {
	if ( internalState( 'prepareIndex' ) ) {
		loadIndex();
	}
	
	$slvl	= config( 'summary_level', \SUMMARY_LEVEL, 'int' );
	$posts	= loadPosts( 1, '', true, $slvl );
	if ( empty( $posts ) ) {
		sendNotFound();
	}
	
	$ptitle	= config( 'page_title', \PAGE_TITLE );
	$psub	= config( 'page_sub', \PAGE_SUB );
	
	// Send to render hook
	hook( [ 'feedrender', [  
		'title'		=> $ptitle,
		'subtitle'	=> $psub,
		'date'		=> [],
		'posts'		=> $posts
	] ] );
	
	// Send result if hook returned content
	sendOverride( 'feedrender', true );
	
	$tpl	= [
		'page_title'	=> $ptitle,
		'tagline'	=> $psub,
		'home'		=> homeLink(),
		'date_gen'	=> dateRfc(),
		'body'		=> \implode( '', $posts )
	];
	
	shutdown( 'cleanup' );
	send( 200, render( template( 'tpl_feed' ), $tpl ), true, true );
}

/**
 *  View single post
 */
function showPost( string $event, array $hook, array $params ) {
	if ( internalState( 'prepareIndex' ) ) {
		loadIndex();
	}
	
	$date	= enforceDates( $params );
	$title	= '';
	$s	= '/';
	$path	= $date[0] . $s .  $date[1] . $s . $date[2] . $s . 
			\ltrim( $params['slug'] ?? '', $s );
	
	// Check publication date
	$pub		= getPub( $path );
	if ( !checkPub( $pub ) ) {
		sendNotFound();
	}
	
	$post	= loadPost( $title, $path );
	
	if ( empty( $post ) ) {
		sendNotFound();
	}
	
	// Related and sibling post settings
	$sib	= config( 'show_siblings', \SHOW_SIBLINGS, 'int' ) ? 
			getSiblings( $path ) : '';
	
	$rel	= config( 'show_related', \SHOW_RELATED, 'int' ) ? 
			getRelated( $path ) : '';
	
	$ptitle	= config( 'page_title', \PAGE_TITLE );
	$psub	= config( 'page_sub', \PAGE_SUB );
	
	// Send to render hook
	hook( [ 'postrender', [ 
		'post'		=> $post, 
		'title'		=> $title,
		'posttitle'	=> $ptitle,
		'subtitle'	=> $psub,
		'path'		=> $path,
		'siblings'	=> $sib,
		'related'	=> $rel
	] ] );
	
	// Send result if hook returned content
	sendOverride( 'postrender' );
	
	// Default post render
	$mlinks	= config( 'default_main_links', \DEFAULT_MAIN_LINKS );
	$heading = 
	hookWrap( 
		'beforepostpageheading',
		'afterpostpageheading',
		template( 'tpl_page_heading' ), [
			'page_title'	=> $ptitle,
			'tagline'	=> $psub,
			
			// Navigation links
			'main_links'	=> 
			renderNavLinks( template( 'tpl_mainnav_wrap' ), $mlinks ),
			
			// Search form
			'search_form'	=> searchForm()
		] 
	);
	
	$page_t	= 
	hookWrap( 
		'beforepostpage',
		'afterpostpage',
		template( 'tpl_full_page' ), [
			'page_title'	=> $ptitle,
			'post_title'	=> $title . ' - ' . $ptitle,
			'lang'		=> config( 'language', \LANGUAGE ),
			'home'		=> homeLink(),
			'body_before'	=> $heading,
			'body'		=> $post,
			'body_after'	=> $sib . $rel . pageFooter()
		], 
		true 
	);
	
	shutdown( 'cleanup' );
	send( 200, $page_t, true );
}


/**
 *  Rebuild index and cache output
 */
function runIndex( string $event, array $hook, array $params ) {
	// Pagination prep
	$page	= ( int ) ( $params['page'] ?? 1 );
	$ilimit	= config( 'index_limit', \INDEX_LIMIT, 'int' );
	$start	= ( $page - 1 ) * $ilimit;
	
	// Load index
	$posts	= loadIndex( $start, $ilimit );
	
	if ( empty( $posts ) ) {
		// No more posts
		sendNotFound();
	}
	
	$ptitle	= config( 'page_title', \PAGE_TITLE );
	$psub	= config( 'page_sub', \PAGE_SUB );
	
	// Send to render hook
	hook( [ 'indexrender', [ 
		'posts'		=> $posts,
		'title'		=> $ptitle,
		'subtitle'	=> $psub
	] ] );
	
	// Send result if hook returned content
	sendOverride( 'indexrender' );
	
	// Default index render
	$out	= '';
	
	$prefix	= slashPath( homeLink(), true ) . 'archive/';
	$out	= '';
	$pf	= '';
	$plist	= [];
	foreach( $posts as $k => $v ) {
		// Archive year
		$e = ( string ) $k;
		$d = '';
		if ( empty( $d ) && \is_numeric( $e ) ) {
			$d	= $e;
			$out	.= 
			hookWrap(
				'beforepostitemheading',
				'beforepostitemheading',
				template( 'tpl_index_header' ), 
				[ 'title' => $d ]
			);
		}
		
		// Post render
		if ( is_array( $v ) ) {
			foreach( $v as $p ) {
				$pf		= 
				hookWrap(
					'beforepostitem', 
					'afterpostitem', 
					template( 'tpl_index' ), 
					$p 
				);
				$plist[]	= $pf;
				$out		.= $pf;
			}
		}
	}
	
	$out	= 
	hookWrap( 
		'beforepostindex', 
		'afterpostindex', 
		template( 'tpl_index_wrap' ), 
		[ 'items' => $out ] 
	);
	
	$mlinks	= config( 'default_main_links', \DEFAULT_MAIN_LINKS );
	$heading = 
	hookWrap( 
		'beforearchiveheading',
		'afterarchiveheading',
		template( 'tpl_page_heading' ), [
			'page_title'	=> $ptitle,
			'tagline'	=> $psub,
			
			// Navigation links
			'main_links'	=> 
			renderNavLinks( template( 'tpl_mainnav_wrap' ), $mlinks ),
			
			// Search form
			'search_form'	=> searchForm()
		]
	);
	
	$pages	= ( count( $plist ) < $ilimit ) ? 
			'' : paginate( $page, $prefix, $plist );
	$page_t	= 
	hookWrap( 
		'beforearchiveindex',
		'afterarchiveindex',
		template( 'tpl_full_page' ), [
			'page_title'	=> $ptitle,
			'post_title'	=> $ptitle,
			'lang'		=> config( 'language', \LANGUAGE ),
			'home'		=> homeLink(),
			'feedlink'	=> feedLink(),
			'body_before'	=> $heading,
			'body'		=> $out,
			'body_after'	=> $pages . pageFooter()
		], 
		true 
	);
	
	shutdown( 'cleanup' );
	send( 200, $page_t, true );
}

/**
 *  Settings validator that checks loaded/set configuration options
 *  
 *  @param string	$event		Should be 'checkconfig'
 *  @param array	$hook		Previous configuration settings
 *  @param array	$params		Current configuration
 */
function checkConfig( string $event, array $hook, array $params ) {
	$filter	= [
		'page_title'	=> \FILTER_SANITIZE_STRING,
		'page_sub'	=> \FILTER_SANITIZE_STRING,
		'page_limit'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 1,
				'max_range'	=> 500,
				'default'	=> \PAGE_LIMIT
			]
		],
		'index_limit'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 1,
				'max_range'	=> 500,
				'default'	=> \INDEX_LIMIT
			]
		],
		'max_page' => [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 1,
				'max_range'	=> 5000,
				'default'	=> \MAX_PAGE
			]
		],
		'max_url_size' => [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 255,
				'max_range'	=> 2048,
				'default'	=> \MAX_URL_SIZE
			]
		],
		'summary_level'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 0,
				'max_range'	=> 2,
				'default'	=> \SUMMARY_LEVEL
			]
		],
		'feature_lines'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 1,
				'max_range'	=> 10,
				'default'	=> \FEATURE_LINES
			]
		],
		'timezone'	=> [
			'filter'	=> \FILTER_SANITIZE_SPECIAL_CHARS,
			'flags'		=> 
				\FILTER_FLAG_STRIP_LOW	| 
				\FILTER_FLAG_STRIP_HIGH	| 
				\FILTER_FLAG_STRIP_BACKTICK,
			'options' => [
				'default' => \TIMEZONE
			]
		],
		
		// Date formatting
		'date_nice'	=> [
			'filter'	=> \FILTER_SANITIZE_SPECIAL_CHARS,
			'flags'		=> 
				\FILTER_FLAG_STRIP_LOW	| 
				\FILTER_FLAG_STRIP_HIGH	| 
				\FILTER_FLAG_STRIP_BACKTICK 
		],
		
		// Safe file extensions
		'ext_whitelist'	=> [
			'filter'	=> \FILTER_SANITIZE_SPECIAL_CHARS,
			'flags'		=> 
				\FILTER_FLAG_STRIP_LOW	| 
				\FILTER_FLAG_STRIP_HIGH	| 
				\FILTER_FLAG_STRIP_BACKTICK | 
				\FILTER_REQUIRE_ARRAY
		],
		
		// Post tagging
		'tag_limit'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 1,
				'max_range'	=> 50,
				'default'	=> \TAG_LIMIT
			]
		],
		
		// Cache settings
		'cache_ttl'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 300,
				'max_range'	=> 604800,
				'default'	=> \CACHE_TTL
			]
		],
		
		// Pagination
		'year_start'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 1990,
				'max_range'	=> ( int ) \date( 'Y' ),
				'default'	=> \YEAR_START
			]
		],
		
		'year_end'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 1990,
				'max_range'	=> ( int ) \date( 'Y' ),
				'default'	=> \YEAR_END
			]
		],
		
		// Related and sibling display
		'related_limit'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 1,
				'max_range'	=> 20,
				'default'	=> \RELATED_LIMIT
			]
		],
		'show_siblings'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 0,
				'max_range'	=> 1,
				'default'	=> \SHOW_SIBLINGS
			]
		],
		'show_related'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 0,
				'max_range'	=> 1,
				'default'	=> \SHOW_RELATED
			]
		],
		'readtime_types'=> [
			'filter'	=> \FILTER_SANITIZE_SPECIAL_CHARS,
			'flags'		=> 
				\FILTER_FLAG_STRIP_LOW	| 
				\FILTER_FLAG_STRIP_HIGH	| 
				\FILTER_FLAG_STRIP_BACKTICK,
			'options' => [
				'default' => \READTIME_TYPES
			]
		],
		
		// Session settings
		'session_bytes'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 12,
				'max_range'	=> 36,
				'default'	=> \SESSION_BYTES
			]
		],
		'session_exp' => [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 300,
				'max_range'	=> 3600,
				'default'	=> \SESSION_LIMIT_EXP
			]
		],
		'session_limit_count' => [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 5,
				'max_range'	=> 20,
				'default'	=> \SESSION_LIMIT_COUNT
			]
		],
		'session_limit_medium' => [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 2,
				'max_range'	=> 15,
				'default'	=> \SESSION_LIMIT_MEDIUM
			]
		],
		'session_limit_heavy' => [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 1,
				'max_range'	=> 10,
				'default'	=> \SESSION_LIMIT_HEAVY
			]
		],
		
		// Form settings
		'token_bytes'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 8,
				'max_range'	=> 64,
				'default'	=> \TOKEN_BYTES
			]
		],
		'nonce_hash'	=> [
			'filter'	=> 
				\FILTER_SANITIZE_SPECIAL_CHARS,
			'flags'	=> 
				\FILTER_FLAG_STRIP_LOW	| 
				\FILTER_FLAG_STRIP_HIGH	| 
				\FILTER_FLAG_STRIP_BACKTICK 
		],
		'form_delay'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 5, 
				'max_range'	=> 14400, // 4 Hours
				'default'	=> \FORM_DELAY
			]
		],
		'form_expire'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 300, // 5 minutes
				'max_range'	=> 604800, // 7 Days
				'default'	=> \FORM_EXPIRE
			]
		],
		
		// Scurity and error settings
		'skip_local'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 0,
				'max_range'	=> 1,
				'default'	=> \SKIP_LOCAL
			]
		],
		'allow_post'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 0,
				'max_range'	=> 1,
				'default'	=> \ALLOW_POST
			]
		], 
		'show_modified' => [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 0,
				'max_range'	=> 1,
				'default'	=> \SHOW_MODIFIED
			]
		], 
		'frame_whitelist'=> [
			'filter'	=> \FILTER_CALLBACK,
			'flags'		=> \FILTER_REQUIRE_ARRAY,
			'options'	=> 'cleanUrl'
		], 
		
		// Templating settings
		'shared_assets'	=> [
			'filter'=> \FILTER_VALIDATE_URL,
			'options' => [
				'default' => \SHARED_ASSETS
			],
		],
		'style_limit'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 1,
				'max_range'	=> 50,
				'default'	=> \STYLE_LIMIT
			]
		],
		'script_limit'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 1,
				'max_range'	=> 50,
				'default'	=> \SCRIPT_LIMIT
			]
		],
		'meta_limit'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 1,
				'max_range'	=> 50,
				'default'	=> \META_LIMIT
			]
		]
	];
	
	// Filter passed params, leaving out unset ones
	$data			= 
	\filter_var_array( $params, $filter, false );
	
	if ( !empty( $data['ext_whitelist'] ) ) {
		$data['ext_whitelist']	= 
			whiteLists( $data['ext_whitelist'], true );
	}
	
	if ( isset( $data['nonce_hash'] ) ) {
		$data['nonce_hash']	= 
		hashAlgo( ( string ) $data['nonce_hash'], \NONCE_HASH );
	}
	
	return \array_merge( $hook, $data );
}

/**
 *  Blog route adding event
 */
function addBlogRoutes( string $event, array $hook, array $params ) {
	return 
	[
	/**
	 *  Homepage
	 */
	[ 'get', '',					'home' ],
	[ 'get', 'page:page',				'homepaginate' ],
	[ 'get', 'feed',				'feed' ],
	
	/**
	 *  Archive routes
	 */
	[ 'get', ':year',				'archive' ],
	[ 'get', ':year/page:page',			'archive' ],
	[ 'get', ':year/:month',			'archive' ],
	[ 'get', ':year/:month/page:page',		'archive' ],
	[ 'get', ':year/:month/:day',			'archive' ],
	
	[ 'get', 'tags/:tag',				'tagview' ],
	[ 'get', 'tags/:tag/page:page',			'tagpaginate' ],
	
	/**
	 *  Generate archive cache
	 */
	[ 'get', 'archive',				'reindex' ],
	[ 'get', 'archive/page:page',			'reindexpaged' ],
	
	/**
	 *  Single post
	 */
	[ 'get', ':year/:month/:day/:slug',		'postview' ],
	
	/**
	 *  About pages
	 *  Remember to rename your about directory in POSTS if these are changed
	 */
	[ 'get', 'about',				'aboutview' ],
	[ 'get', 'about/:tree',				'aboutview' ],
	
	/**
	 *  Searching
	 */
	[ 'get', '\\?nonce=:nonce&token=:token&meta=&find=:find',
						'search' ],
	[ 'get', '\\?nonce=:nonce&token=:token&meta=&find=:find/page:page',	
						'searchpaginate' ]
	];
}

/**
 *  Begin event registry
 */

// Configuration load
hook( [ 'checkconfig',	'checkConfig' ] );
hook( [ 'configmodified','configModified' ] );

// Home and archive event handlers
hook( [ 'home',		'showHome' ] );
hook( [ 'home',		'showArchive' ] );
hook( [ 'homepaginate',	'showArchive' ] );
hook( [ 'archive',	'showArchive' ] );

// Browsing tag events
hook( [ 'tagview',	'showTag' ] );
hook( [ 'tagpaginate',	'showTag' ] );

// Post view event
hook( [ 'postview',	'showPost' ] );

// About page event
hook( [ 'aboutview',	'showAbout' ] );

// Searching
hook( [ 'search',	'showSearch' ] );
hook( [ 'searchpaginate','showSearch' ] );

// Syndication feed and archive index events
hook( [ 'feed',		'showFeed' ] );
hook( [ 'reindex',	'runIndex' ] );
hook( [ 'reindexpaged',	'runIndex' ] );

// Special events
hook( [ 'dbcreated',	'reloadIndex' ] );

// Register request, route, and plugin load handlers
hook( [ 'requesturl',	'filterRequest' ] );
hook( [ 'begin',	'loadPlugins' ] );
hook( [ 'begin',	'request' ] );
hook( [ 'begin',	'route' ] );

// Render events
hook( [ 'formatpostprep', 'formatPostPrep' ] );

// Append URL route markers
hook( [ 'routemarker',	'routeMarkers' ] );

// Register blog routes during 'addroutes' event ( called in request() )
hook( [ 'initroutes',	'addBlogRoutes' ] );

/**
 *  Begin Bare
 *  Start by registering templates
 */
hook( [ 'begin', [ 'templates' => $templates ] ] );



