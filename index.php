<?php declare( strict_types = 1 );
/**
 *  Bare: A single file directory-to-blog
 */

/**
 *  The following 5 settings can also be set in config.json
 */

// Site title
define( 'PAGE_TITLE',	'Rustic Cyberpunk' );

// Site subtitle/tagline
define( 'PAGE_SUB',	'Coffee. Code. Cabins.' );

// Number of posts per page
define( 'PAGE_LIMIT',	12 );

// Whitelisted plugins as comma separated list
define( 'PLUGINS_ENABLED', '' );

/**
 *  Important:
 *
 *  Whitelist of allowed sites and primary paths and their settings
 *  Add "localhost" if testing locally
 *  'is_active' Lets Bare know to allow serving blog posts
 *  'is_maintenance' Lets a plugin send an "under construction" placeholder
 *  'settings' Are for any plugins/helpers
 **/
define( 'SITES_ENABLED',	<<<JSON
{
	"kpz62k4pnyh5g5t2efecabkywt2aiwcnqylthqyywilqgxeiipen5xid.onion" : []
}
JSON
);


/**
 *  These need to be set here in index.php
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

// Uploaded file location (usually the same as POSTS)
define( 'FILE_PATH',	POSTS );
// Use this instead if you keep uploaded files outside the web root
// define( 'FILE_PATH',	\realpath( \dirname( __FILE__, 2 ) ) . '/uploads/' );
// Add files to a relative path E.G. 'example.com/' to keep multi-site content separate

// Custom error file folder (optional)
define( 'ERROR_ROOT',	PATH . 'errors/' );
// Use this if error files are outside web root
// define( 'ERROR_ROOT',	\realpath( \dirname( __FILE__, 2 ) ) . '/errors/' );

// Plugins directory
define( 'PLUGIN_DIR',	PATH . 'plugins/' );
// Use this if you keep plugins outside the web root
// define( 'PLUGIN_DIR',	\realpath( \dirname( __FILE__, 2 ) ) . '/plugins/' );

// Writable directory inside cache for plugin data (not directly browsable by visitors)
define( 'PLUGIN_DATA',	CACHE . 'plugins/' );

// Configuration filename (optional, overrides most constants here)
define( 'CONFIG',	'config.json' );

// Error log filename (will be created if it doesn't exist)
define( 'ERROR',	'errors.log' );

// Visitor error log (will be created if if doesn't exist)
define( 'ERROR_VISIT',	'visitor_errors.log' );

// Special notices and other messages that aren't errors but should be recorded
define( 'NOTICE',	'notices.log' );

// A log file created when Bare is first run with information about its enviornment
define( 'STARTUP',	'startup.log' );

// Default content file extension
define( 'ENTRY_EXT', 'md' );

// Maximum number of lines to read metadata from each file (top and bottom)
define( 'ENTRY_META_LINES', 6 );

/**
 *  The following settings can be overridden in config.json:
 */

// Relative path of assets (JS, CSS etc... ) within the folders of each plugin
define( 'PLUGIN_ASSETS',	'assets/' );

// Cached index timeout
define( 'CACHE_TTL',	3200 );

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
define( 'YEAR_START',	1990 );

// Default language
define( 'LANGUAGE',	'en-US' );

// Friendly date format
define( 'DATE_NICE',	'l, F j, Y' );
// Note: Date format can also be overridden in [lang].config
// E.G. In en-US.config, "date_nice": "l, F j, Y"

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
	"text"		: "css, js, txt, html, vtt",
	"images"	: "ico, jpg, jpeg, gif, bmp, png, tif, tiff, svg, webp", 
	"fonts"		: "ttf, otf, woff, woff2",
	"audio"		: "ogg, oga, mpa, mp3, m4a, wav, wma, flac",
	"video"		: "avi, mp4, mkv, mov, ogg, ogv",
	"documents"	: "doc, docx, ppt, pptx, pdf, epub",
	"archives"	: "zip, rar, gz, tar"
}
JSON
);

// Show sibling (next/previous published) posts
define( 'SHOW_SIBLINGS',	1 );

// Show related posts based on content in currently viewing post
define( 'SHOW_RELATED',		1 );

// Maximum number of related posts to show
define( 'RELATED_LIMIT',	5 );

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

// Streaming file chunks
define( 'STREAM_CHUNK_SIZE',	4096 );

// Maximum file size before streaming in chunks
define( 'STREAM_CHUNK_LIMIT',	50000 );

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
https://playeur.com

LINES
);




/**
 *  Templates and customization
 */

// When enabled, scripts with a nonce are embedded (for use with plugins)
// This relies on the 'script-src' content security policy being set correctly
define( 'NONCED_SCRIPTS',	0 );

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
		{ "url" : "{home}", "text" : "{lang:nav:home}" },
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
<input type="hidden" name="nonce" value="{nonce}">
<input type="hidden" name="token" value="{token}">
<input type="hidden" name="meta" value="{meta}">
HTML;

// Search form
$templates['tpl_search_form']	= <<<HTML
{before_search_form}<form action="{home}" method="get" 
	class="{form_classes} {search_form_classes}">
	<fieldset class="{search_fieldset_classes}">
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
		<div class="{post_body_content_classes}">{body}</div>
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

// Embedded code
$templates['tpl_codeblock'] = <<<HTML
<pre class="{code_wrap_classes}"><code class="{code_classes}">{code}</code></pre>
HTML;

$templates['tpl_codeinline'] = <<<HTML
<code class="{code_classes}">{code}</code>
HTML;

// Footnotes
$templates['tpl_footnote_wrap'] =<<<HTML
<nav class="{footnote_nav_classes}">
	<ul class="{footnote_ul_classes}">{footnotes}</ul>
</nav>
HTML;

$templates['tpl_footnote_back'] =<<<HTML
<a href="#{link}-link" class="{footnote_ba_classes}">{phrase}</a>
HTML;

$templates['tpl_footnote'] =<<<HTML
<li id="{id}-ref" class="{footnote_phrase_classes}">
	<sup>{backlinks}</sup>: <span 
		class="{footnote_def_classes}">{footnote}</span>
</li>
HTML;

$templates['tpl_footlink'] =<<<HTML
<sup class="{footnote_s_classes}"><a class="{footnote_a_classes}" href="#{link}-ref" id="{id}-link">[{phrase}]</a></sup>
HTML;


// Language placeholders
$templates['tpl_previous']	= '{lang:nav:previous}';
$templates['tpl_next']		= '{lang:nav:next}';
$templates['tpl_home']		= '{lang:nav:home}';


// Feed index template
$templates['tpl_feed']		= <<<XML
<?xml version="1.0" encoding="UTF-8" ?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
<channel>
	<title>{page_title}</title>
	<link>{home}</link>
	<description><![CDATA[{tagline}]]></description>
	<atom:link href="{path}" rel="self" type="application/rss+xml" />
	<pubDate>{date_gen}</pubDate>
	{body}
</channel>
</rss>
XML;

// Feed item template
$templates['tpl_item']		= <<<XML
<item>
	<title>{title}</title>
	<link>{permalink}</link>
	<pubDate>{date_rfc}</pubDate>
	<guid isPermaLink="true">{permalink}</guid>
	<description><![CDATA[
	{body}
	]]></description>
</item>
XML;


/**
 *  Table formatting
 */

// Table formatting
$templates['tpl_table']		= <<<HTML
<table class="{table_classes}">
	<thead class="{table_header_classes}">{thead}</thead>
	<tbody class="{table_body_classes}">{tbody}</tbody>
	<tfoot class="{table_footer_classes}">{tfoot}</tfoot>
</table>
HTML;

// Table without headers but with footers
$templates['tpl_table_nh']	= <<<HTML
<table class="{table_classes}">
	<tbody class="{table_body_classes}">{tbody}</tbody>
	<tfoot class="{table_footer_classes}">{tfoot}</tfoot>
</table>
HTML;

// Table without footers but with headers
$templates['tpl_table_nf']	= <<<HTML
<table class="{table_classes}">
	<thead class="{table_header_classes}">{thead}</thead>
	<tbody class="{table_body_classes}">{tbody}</tbody>
</table>
HTML;

// Table without heading or footers
$templates['tpl_table_nh_nf']	= <<<HTML
<table class="{table_classes}">
	<tbody class="{table_body_classes}">{tbody}</tbody>
</table>
HTML;

// Ordinary row 
$templates['tpl_table_row']	= <<<HTML
<tr class="{table_row_classes}">{cells}</tr>
HTML;

// Odd row
$templates['tpl_table_row_odd']	= <<<HTML
<tr class="{table_row_odd_classes}">{cells}</tr>
HTML;

// Even row
$templates['tpl_table_row_even']= <<<HTML
<tr class="{table_row_even_classes}">{cells}</tr>
HTML;

// Heading cell
$templates['tpl_table_h_cell']	= <<<HTML
<th class="{table_th_classes} {align}" align="{align}">{data}</th>
HTML;

// Ordinary cell 
$templates['tpl_table_cell']	= <<<HTML
<td class="{table_td_classes} {align}" align="{align}">{data}</td>
HTML;


/**
 *  Embeded media templates
 */

// Embedded video with preview
$templates['tpl_audio_embed']	= <<<HTML
<div class="media"><audio src="{src}" preload="none" controls></audio></div>
HTML;

// Embedded video without preview
$templates['tpl_video_np_embed'] =<<<HTML
<div class="media">
	<video width="560" height="315" src="{src}" preload="none" controls>{detail}</video>
</div>
HTML;

// Embedded video with preview
$templates['tpl_video_embed'] =<<<HTML
<div class="media">
	<video width="560" height="315" src="{src}" preload="none" poster="{preview}" controls>{detail}</video>
</div>
HTML;

// Video caption track without language
$templates['tpl_cc_nl_embed'] =<<<HTML
<track kind="subtitles" src="{src}" {default}>
HTML;

// Video caption with language
$templates['tpl_cc_embed'] =<<<HTML
<track label="{label}" kind="subtitles" srclang="{lang}" src="{src}" {default}>
HTML;

/**
 *  Hosted media templates
 */
 
// YouTube video wrapper
$templates['tpl_youtube']	= <<<HTML
<div class="media">
	<iframe width="560" height="315" frameborder="0" 
		sandbox="allow-same-origin allow-scripts" 
		src="https://www.youtube.com/embed/{src}?start={time}" 
		allow="encrypted-media;picture-in-picture" 
		loading="lazy" allowfullscreen></iframe>
</div>
HTML;

// Vimeo video wrapper
$templates['tpl_vimeo']		= <<<HTML
<div class="media">
	<iframe width="560" height="315" frameborder="0" 
		sandbox="allow-same-origin allow-scripts" 
		src="https://player.vimeo.com/video/{src}" 
		allow="picture-in-picture" loading="lazy" 
		allowfullscreen></iframe>
</div>
HTML;

// Peertube video wrapper (requires 'src_host' to be added to frame_whitelist)
$templates['tpl_peertube']	= <<<HTML
<div class="media">
	<iframe width="560" height="315" frameborder="0" 
		sandbox="allow-same-origin allow-scripts" 
		src="https://{src_host}/videos/embed/{src}" 
		allow="picture-in-picture" loading="lazy" 
		allowfullscreen></iframe>
</div>
HTML;

// Internet Archive video wrapper
$templates['tpl_archiveorg']	= <<<HTML
<div class="media">
	<iframe width="560" height="315" frameborder="0" 
		sandbox="allow-same-origin allow-scripts" 
		src="https://archive.org/embed/{src}" 
		allow="picture-in-picture" loading="lazy" 
		allowfullscreen></iframe></div>
HTML;

// LBRY/Odysee video wrapper
$templates['tpl_lbry']	= <<<HTML
<div class="media">
	<iframe width="560" height="315" frameborder="0" 
		sandbox="allow-same-origin allow-scripts" 
		src="https://{src_host}/$/embed/{slug}/{src}" 
		allow="picture-in-picture" loading="lazy" 
		allowfullscreen></iframe>
</div>
HTML;

// Playeur video wrapper
$templates['tpl_playeur']	= <<<HTML
<div class="media">
	<iframe width="560" height="315" frameborder="0" 
		sandbox="allow-same-origin allow-scripts" 
		allow="encrypted-media;picture-in-picture"
		src="https://playeur.com/embed/{src}?t={time}" 
		loading="lazy" allowfullscreen></iframe>
</div>
HTML;


/**
 *  Overridable CSS classes on HTML elements and content segments
 *  These can also be set in config.json
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
	
	"code_wrap_classes"		: "",
	"code_classes"			: "",
	
	"footnote_nav_classes"		: "footnotes",
	"footnote_ul_classes"		: "",
	"footnote_phrase_classes"	: "",
	"footnote_s_classes"		: "",
	"footnote_a_classes"		: "",
	"footnote_ba_classes"		: "",
	"footnote_def_classes"		: "",
	
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
	"action_classes"		: "", 
	
	"table_classes"			: "",
	"table_header_classes"		: "",
	"table_body_classes"		: "",
	"table_footer_classes"		: "",
	"table_row_classes"		: "",
	"table_row_odd_classes"		: "",
	"table_row_even_classes"	: "",
	"table_th_classes"		: "",
	"table_td_classes"		: ""
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
define( 'TPL_SCRIPT_NONCE_TAG', '<script src="{url}" nonce="{nonce}"></script>' );
define( 'TPL_STYLE_TAG', '<link rel="stylesheet" href="{url}">' );

// Content Security and Permissions Policy headers
define( 'SECURITY_POLICY',	<<<JSON
{
	"content-security-policy": {
		"default-src"			: "'none'",
		"img-src"			: "*",
		"base-uri"			: "'self'",
		"style-src"			: "'self'",
		"script-src"			: "'self'",
		"font-src"			: "'self'",
		"form-action"			: "'self'",
		"frame-ancestors"		: "'self'",
		"frame-src"			: "*",
		"media-src"			: "'self'",
		"connect-src"			: "'self'",
		"worker-src"			: "'self'",
		"child-src"			: "'self'",
		"require-trusted-types-for"	: "'script'"
	},
	"permissions-policy": {
		"accelerometer"			: [ "none" ],
		"camera"			: [ "none" ],
		"fullscreen"			: [ "self" ],
		"geolocation"			: [ "none" ],
		"gyroscope"			: [ "none" ],
		"interest-cohort"		: [],
		"payment"			: [ "none" ],
		"usb"				: [ "none" ],
		"microphone"			: [ "none" ],
		"magnetometer"			: [ "none" ]
	}, 
	"common-policy": [
		"X-XSS-Protection: 1; mode=block",
		"X-Content-Type-Options: nosniff",
		"X-Frame-Options: SAMEORIGIN",
		"Referrer-Policy: no-referrer, strict-origin-when-cross-origin"
	]
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
	":tree"	: "(?<tree>[\\\\pL\\\\/\\\\-_\\\\d\\\\s]{1,255})",
	":file"	: "(?<file>[\\\\pL_\\\\-\\\\d\\\\.\\\\s]{1,120})",
	":find"	: "(?<find>[\\\\pL\\\\pN\\\\s\\\\-_,\\\\.\\\\:\\\\+]{2,255})",
	":redir": "(?<redir>[a-z_\\\\:\\\\/\\\\-\\\\d\\\\.\\\\s]{1,120})",
	":lang" : "(?<lang>[a-z]{2,3})(?:-(?<locale>[a-z]{2,8}))?"
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
define( 'MSG_FILERANGE',	'Invalid file range requested' );


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
define( 'DATA_TIMEOUT',		15 );



/**
 *  Session settings
 */

// Staleness check
define( 'SESSION_EXP',		300 );

// ID random bytes
define( 'SESSION_BYTES',	12 );


/**
 *  Cookie defaults
 */

// Base expiration
define( 'COOKIE_EXP', 		604800 ); // 7 Days

// Refresh if less than this left
define( 'COOKIE_REFRESH',	86400 ); // 1 Day

// Base domain path
define( 'COOKIE_PATH',		'/' );

// Restrict cookies to same-site origin (I.E. No third party can snoop)
define( 'COOKIE_RESTRICT',	1 );




/**********************************************************************
 *                      Caution editing below
 **********************************************************************/



/**
 *  Environment preparation
 */
\date_default_timezone_set( 'UTC' );
\ignore_user_abort( true );
\register_shutdown_function( 'shutdown' );



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
CREATE INDEX idx_caches_on_expires ON caches ( expires DESC )
	WHERE expires IS NOT NULL;-- --
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
		strftime( '%s', updated ) AND expires IS NOT NULL;
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

CREATE TRIGGER post_before_update BEFORE UPDATE ON posts FOR EACH ROW
BEGIN
	DELETE FROM post_tags WHERE post_id = OLD.id;
END;-- --

CREATE TRIGGER post_update AFTER UPDATE ON posts FOR EACH ROW 
BEGIN
	UPDATE post_search SET body = NEW.post_bare 
		WHERE docid = NEW.id;
END;-- --

CREATE TRIGGER post_delete BEFORE DELETE ON posts FOR EACH ROW 
BEGIN
	DELETE FROM post_search WHERE docid = OLD.id;
	DELETE FROM post_tags WHERE post_id = OLD.id;
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
 *  Errors and messaging
 */

/**
 *  Debugging trace formatter
 *  
 *  @param string	$message	Context message
 *  @param array	$context	Trace path or message detail
 */
function trace( string $message, array $context = [] ) : void {
	$ctx	= 
	empty( $context ) 
		? ''
		: ' ' . ( \json_encode( $context, \JSON_UNESCAPED_SLASHES ) ?: '{}' );
	
	\error_log( \sprintf(
		"[TRACE] %s %s%s\n",
		\date( 'Y-m-d H:i:s' ),
		$message,
		$ctx
	) );
}

/**
 *  Generic user-facing error
 */
function error_page() : void {
	\http_response_code( 500 );
	echo "An unexpected error occurred. Please try again later.";
	exit;
}

/**
 *  Centralized exception handler
 *  
 *  @param Throwable	$e	Generic capture
 */
function error_handle( Throwable $e ) : void {
	static $handling	= false;
	$class			= \get_class( $e );
	
	if ( $handling ) {
		\error_log( 
			"[FATAL] Recursive exception ( {$class} ): " . 
			$e->getMessage()
		);
		exit( 1 );
	}
	
	$handling		= true;
	$log			= 
	\sprintf(
		"[ERROR] %s %s: %s in %s on line %d\nStack trace:\n%s\n",
		\date( 'Y-m-d H:i:s' ),
		$class,
		$e->getMessage(),
		$e->getFile(),
		$e->getLine(),
		$e->getTraceAsString()
	);
	$log	.= 
	"Request: " . ( $_SERVER['REQUEST_METHOD'] ?? 'CLI' ) . " " .
        \htmlspecialchars( $_SERVER['REQUEST_URI'] ?? '' ) . "\n";
	
	\error_log( $log );
	error_page();
}



/**
 *  Helpers
 */

/**
 *  Clear empty content of spaces
 *  
 *  @param array	$data		Input contents from the user
 *  @return array
 */
function util_filter_empty( array $data ) : array {
	return \array_filter( \array_map( 'trim', $data ), 'strlen' );
}

/**
 *  String to list helper
 *  
 *  @param string	$text	Input text to break into items
 *  @param bool		$lower	Convert Mixed/Uppercase text to lowercase if true
 *  @param string	$sep	String delimiter, defaults to comma
 *  @return array
 */
function util_trimmed_list( string $text, bool $lower = false, string $sep = ',' ) : array {
	$map = \array_map( 'trim', \explode( $sep, $text ) );
	return $lower ? \array_map( 'strtolower', $map ) : $map;
}

/**
 *  Get list of current user-defined functions
 *  
 *  @param bool		$update	Force cache refresh
 *  @return array
 */
function util_functions_list( bool $update = false ) : array {
	static $functions;
	if ( $update || !\isset( $functions ) ) {
		$functions = \get_defined_functions()['user'];
	}
	return $functions;
}

/**
 *  Get formatted timestamp
 *  
 *  @param string	$format	Timestamp format
 *  @return string
 */
function util_timestamp( string $format = 'Y-m-d H:i:s.u' ) : string {
	$dt = \DateTime::createFromFormat( 
		'U.u', \sprintf( '%.6F', \microtime( true ) ) 
	);
	return $dt ? $dt->format( $format ) : '';
}

/**
 *  Generate a unique, sortable timestamp based on set label
 *  
 *  @param string	$label		Stamp descriptor for categories etc...
 *  @param bool		$use_stamp	Use timestamp prefix, if true
 *  @return string
 */
function util_get_id( string $label, bool $use_stamp = true ) : string {
	$id	= ( string ) ( \getmypid() ?: uniqid() );
	$stamp	= $use_stamp 
		? \sprintf( '%.6F', \microtime( true ) ) . '_'
		: '';
	
	return "{$stamp}{$label}_{$id}";
}

/**
 *  Case insensitive array value search
 *  
 *  @param string	$value	Array value needle
 *  @param array	$items	Searching haystack
 *  @return bool
 */
function util_key_exists_ci( string $value, array $items ) : bool {
	return \in_array( 
		\strtolower( $value ), 
		\array_map( 'strtolower', \array_keys( $items ) ) 
	);
}

/**
 *  Case insensitive array key search
 *  
 *  @param string	$key	Array key needle
 *  @param array	$items	Searching haystack
 *  @return bool
 */
function util_value_key_exists_ci( string $key, array $items ) : mixed {
	foreach ( $items as $k => $v ) {
		if ( 0 === \strcasecmp( $k, $key ) ) {
			return $v;
		}
	}
	return null;
}

/**
 *  Recursively convert array keys to lowercase
 *  
 *  @param array	$items	Collection to format
 *  @return array
 */
function util_array_normalize_keys( array $items ) : array {
	$normal	= [];
	foreach( $items as $key => $value ) {
		$lkey		= \is_string( $key ) ? \strtolower( $key ) : $key;
		$normal[$lkey]	= 
		\is_array( $value ) && !\array_is_list( $value )
			? util_array_normalize_keys( $value ) 
			: $value;
	}
	
	return $normal;
}

/**
 *  Filter number within min and max range, inclusive
 *  
 *  @param mixed	$val		Given default value
 *  @param int		$min		Minimum, returned if less than this
 *  @param int		$max		Maximum, returned if greater than this
 *  @return int
 */
function util_int_range( $val, int $min, int $max ) : int {
	$out = ( int ) $val;
	
	return 
	( $out > $max ) ? $max : ( ( $out < $min ) ? $min : $out );
}

/**
 *  Safely encode array to JSON
 *  
 *  @return string
 */
function util_json_encode( array $data = [] ) : string {
	if ( empty( $data ) ) {  return ''; }
	
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
 */
function util_json_decode( string $data	= '', int $depth = 10 ) : array {
	if ( empty( $data ) ) { return []; }
	
	// Since PHP 8.3+
	if ( !\json_validate( $json ) ) { return []; }
	
	$depth	= util_int_range( $depth, 1, 50 );
	$out	= 
	\json_decode( 
		\util_utf8( $data ), true, $depth, 
		\JSON_BIGINT_AS_STRING
	);
	
	if ( \json_last_error() !== \JSON_ERROR_NONE ) {
		return [];
	}
	
	if ( empty( $out ) || false === $out ) {
		return [];
	}
	
	return $out;
}

/**
 *  Ensure JSON content is valid
 *  
 *  @param array|string	$json	Raw field data
 *  @param bool		$values	Return values only when true
 *  @param int		$depth	Maximum decode depth, if parsing string
 *  @return array
 */
function util_json_array( 
	array|string	$json,
	bool		$values	= false, 
	int		$depth	= 10 
) : array {
	if ( \is_array( $json ) ) {
		return $values 
			? \array_values( $json ) 
			: $json;
	}
	
	$data = \util_json_decode( $json, $depth );
	return $values ? \array_values( $data ) : $data;
}

/**
 *  Generate a random string ID based on given random bytes
 *  
 *  @param int		$bytes		Size of random bytes
 *  @param string	$prefix Random ID prefix
 *  @return string
 */
function util_gen_key( int $len = 16, ?string $prefix = null ) : string {
	$len	= util_int_range( 1, 64 );
	$prefix ??= '';
	return $prefix . \bin2hex( \random_bytes( \intdiv( $len, 2 ) ) );
}

/**
 *  Generate globally unique identifier
 *  
 *  @param string	$mode	UUID mode, defaults to v7
 *  @return string
 */
function util_gen_uuid( ?string $mode = null ) : string {
	$mode	= \strtolower( $mode ?? 'v4' );
	
	if ( 'v4' == $mode ) {
		$data	= \random_bytes( 16 );
		$data[6]= \chr( ( \ord( $data[6] ) & 0x0f ) | 0x40 );
		$data[8]= \chr( ( \ord( $data[8] ) & 0x3f ) | 0x80 );
		
		$out	= \str_split( \bin2hex( $data ), 4 );
	} else {
		$now	= ( int ) ( \microtime( true ) * 1000 );
		$sub	= ( int ) ( \hrtime()[1] / 1_000_000 );
		$stamp	= ( $now << 12 ) | ( $sub & 0x0FFF );
		
		$hex	= \str_pad( \dechex( $stamp ), 15, '0', \STR_PAD_LEFT );
		$hex[12]= '7';
		
		$data	= \random_bytes( 8 );
		$rdata	= \bin2hex( $data );
		$pfx	= \substr( $rdata, 0, 4 );
		$pfx[0]	= \dechex( ( \hexdec( $pfx[0] ) & 0x3 ) | 0x8 );
		
		$out	= \str_split( $hex . $pfx . \substr( $rdata, 4 ), 4 );
	}
	
	return \vsprintf( '%s-%s-%s-%s-%s', $out );
}

/**
 *  Random UUID shortcut
 *  
 *  @return string
 */
function util_gen_guid() : string {
	return util_gen_uuid( 'v4' );
}

/**
 *  Cached timezone list helper
 *  
 *  @return array
 */
function util_timezone_list() : array {
	static $cache	= null;
	$cache		??= \timezone_identifiers_list();
	
	return $cache;
}

/**
 *  Check if given timezone is valid
 *  
 *  @param string	$tz	Raw timezone
 *  @return bool
 */
function util_timezone_valid( string $tz ) : bool {
	return \in_array( $tz, util_timezone_list(), true );
}

/**
 *  Check if given date is in the future
 *  
 *  @param DateTime	$start	Sent stamp
 *  @return bool
 */
function util_date_is_future( \DateTime $start ) : bool {
	static $now	= null;
	$now		??= new \DateTime();
	
	return $start > $now;
}

/**
 *  Format request date format to archive limit range
 *  
 *  @param array	$params		Raw URL param
 *  @param bool		$limit_now	Limit to current date, if true
 *  @return array
 */
function util_date_range( array $params, bool $limit_now = false ) : array {
	static $now	= null;
	
	$now	??= new \DateTime();
	$year	= $params['year']	?? null;
	$month	= $params['month']	?? null;
	$day	= $params['day']	?? null;
	$page	= ( int ) ( $params['page'] ?? 1 );
	
	if ( null === $year ) { 
		return [];
	}
	
	if ( !\ctype_digit( ( string ) $year ) || $year < 1 ) {
		return [];
	}
	
	if ( null !== $month && ( $month < 1 || $month > 12 ) ) {
		return [];
	}
	
	if ( null !== $day ) {
		if ( null === $month || null === $year ) { return []; }
		if ( !\checkdate( ( int ) $month, ( int ) $day, ( int ) $year ) ) {
			return [];
		}
	}
	
	$start	= 
	match( true ) {
		( $year && $month && $day )	=> 
			new \DateTime( "{$year}-{$month}-{$day} 00:00:00" ),
		
		( $year && $month )		=>
			new \DateTime( "{$year}-{$month}-01 00:00:00" ),
			
		default				=> 
			new \DateTime( "{$year}-01-01 00:00:00" )
	};
	
	$limit	= 
	match( true ) {
		( $year && $month && $day )	=> 
			( clone $start )->modify( '+1 day' ),
		
		( $year && $month )		=>
			( clone $start )->modify( '+1 month' ),
			
		default				=> 
			( clone $start )->modify( '+1 year' )
	};
	
	$end = ( $limit_now && $limit > $now ) ? $now : $limit;
	return [ $start, $end, $page ];
}

/**
 *  Attempt to detect text encoding
 *  
 *  @param string	$text		Searching block
 *  @param array	$encodings	List of possible encodings
 *  @return string
 */
function util_detect_encoding( string $text, array $encodings ) : string {
	foreach ( $encodings as $enc ) {
		if ( \mb_check_encoding( $text, $enc ) ) {
			return $enc;
		}
	}
	
	return \mb_detect_encoding( $text, \mb_detect_order(), true ) ?: 'ISO-8859-1';
}

/**
 *  Attempt to convert text to UTF-8
 *  
 *  @param string	$text Converting block
 *  @return string
 */
function util_utf8( string $text, string $default = 'ISO-8859-1' ) : string {
	static $pool	= 
	[ 'UTF-8', 'ISO-8859-15', 'Windows-1252', 'Shift_JIS', 'EUC-JP', 
		'GB2312', 'GBK', 'Big5', 'ASCII', 'MacRoman', 'KOI8-R', 
		'UTF-16', 'UTF-32', 'ISO-8859-1'];
	
	$enc		= util_detect_encoding( $text, $pool ) ?? $default;
	$out		= \mb_convert_encoding( $text, 'UTF-8', $enc );
	return ( false === $out ) ? '' : $out;
}

/**
 *  Recursively convert array values to lowercase
 *  
 *  @param array	$tree	Raw catalog to process
 *  @return array
 */
function util_normalize_array( array $tree ) : array {
	$normal	= [];
	
	foreach ( $tree as $key => $value ) {
		if ( \is_array( $value ) ) {
			$normal[$key] = util_normalize_array( $value );
		} elseif ( \is_string( $value ) ) {
			$normal[$key] = \strtolower( $value );
		} else {
			$normal[$key] = $value;
		}
	}
	
	return $normal;
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
function util_flatten_array(
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
 *  Format a structured array into a URL query section
 *  
 *  @param array $query Presorted array
 *  @return string
 */
function util_array_to_query( array $query ) : string {
	$parts = [];
	
	foreach ( $query as $key => $value ) {
		if ( '' === $key ) { continue; }
		
		foreach ( ( array ) $value as $v ) {
			$parts[] = \urlencode( $key ) . '=' . \urlencode( $v ?? '' );
		}
	}
	
	return implode('&', $parts);
}

/**
 *  Get a list of tokens separated by spaces
 *  
 *  @param string	$text		Raw text containing repeated words
 *  @return array
 */
function util_unique_terms( string $value ) : array {
	return 
	\array_unique( 
		\preg_split( 
			'/[[:space:]]+/', trim( $value ), -1, 
			\PREG_SPLIT_NO_EMPTY 
		) 
	);
}

/**
 *  Combine start, end ranges without overlap
 *  
 *  @param array	$ranges	Raw range sets
 *  @return array
 */
function util_merge_ranges( array $ranges ) : array {
	if ( empty( $ranges ) ) { return []; }
	
	\usort( $ranges, fn( $a, $b ) => $a[0] <=> $b[0] );
	$merged	= [ $ranges[0] ];
	
	foreach ( \array_slice( $ranges, 1 ) as [ $start, $end ] ) {
		[ $last_start, $last_end ] = end( $merged );
		
		if ( $start <= $last_end + 1 ) {
			$last_index		= \array_key_last( $merged );
			$merged[ $last_index ]	= 
			[ $last_start, max( $last_end, $end ) ];
			
			continue;
		}
		
		$merged[] = [ $start, $end ];
	}
	
	return $merged;
}

/**
 *  Check if given ranges have overlapping values
 *  
 *  @param array	$ranges	Raw range sets
 *  @return bool
 */
function util_has_overlapping_ranges( array $ranges ) : bool {
	\usort( $ranges, fn( $a, $b ) => $a[0] <=> $b[0] );
	$rcount = count( $ranges );
	
	for ( $i = 1; $i < $rcount; $i++ ) {
		if ( $ranges[$i][0] < $ranges[$i - 1][1] ) {
			return true;
		}
	}
	
	return false;
}

/**
 *  Convert timestamp to int if it's not in integer format
 *  
 *  @return mixed
 */
function util_time_string( $stamp = null ) : string {
	if ( empty( $stamp ) ) { return null; }
	
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
function util_utc( $stamp = null ) : string {
	return 
	\gmdate( 'Y-m-d\TH:i:s', util_time_string( $stamp ?? 'now' ) );
}

/**
 *  Feed timestamp
 *  
 *  @param mixed	$stamp		Optional timestamp, defaults to 'now'
 *  @return string
 */
function util_rfc_date( $stamp = null ) : string {
	return 
	\gmdate( 'D, d M Y H:i:s O', util_time_string( $stamp ?? 'now' ) );
}

/**
 *  File modified timestamp
 *  
 *  @param mixed	$stamp		Optional timestamp, defaults to 'now'
 *  @return string
 */
function util_rfc_file_date( $stamp = null ) : string {
	return 
	\gmdate( 'D, d M Y H:i:s T', util_time_string( $stamp ?? 'now' ) );
}

/**
 *  Check if a specific library or if PHP is the given version or above
 *  
 *  @param string	$spec		Minimum supported version
 *  @param string	$lib		Optional library name, case sensitive
 *  @return bool
 */
function util_lib_version( string $spec, ?string $lib ) : bool {
	static $ext;
	
	// Fix for 7.4.0 etc... appearing higher than 7.4
	$spec = \rtrim( $spec, '.0' );
	
	// Empty library? Check PHP
	if ( empty( $lib ) ) {
		return 
		\version_compare( 
			\rtrim( \PHP_VERSION, '.0' ), $spec, '>=' 
		);
	}
	
	// Currently running extensions
	if ( empty( $ext ) ) {
		$ext = \get_loaded_extensions();
	}
	
	foreach ( $ext as $e ) {
		if ( \str_starts_with( $e, $lib ) ) {
			$lv = \phpversion( $e );
			
			// Error getting version?
			if ( false === $lv ) {
				return false;
			}
			
			return 
			\version_compare( 
				\rtrim( $lv, '.0' ), $spec, '>=' 
			);
		}
	}
	
	// Extension not found
	return false;
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
				$blocked = util_trimmed_list( $exts, true );
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
 * Sanitizing and Filtering
 */

/**
 *  Strip unusable characters from raw text/html and conform to UTF-8
 *  
 *  @param string	$html	Raw content body to be cleaned
 *  @param bool		$entities Convert to HTML entities
 *  @return string
 */
function sanitize_filter( 
	string		$html, 
	bool		$entities	= false 
) : string {
	static $filters	= [
	
		// Remove control chars except linebreaks/tabs etc...
		'/[\x00-\x08\x0B\x0C\x0E-\x1F\x80-\x9F]/u',
		
		// Non-characters
		'/[\x{fdd0}-\x{fdef}]/u',
		'/[\x{FFFE}-\x{FFFF}]/u',
		'/[\x{1FFFE}-\x{1FFFF}]/u',
		
		// UTF unassigned, formatting, and half surrogate pairs
		'/[\p{Cs}\p{Cf}\p{Cn}]/u',
		
		// Invalid UTF-8 byte sequences
		'/[\xC0-\xC1]|\xF5-\xFF/u',
		
		// Overlong 2, 3, and 4-byte sequences
		'/[\xC2-\xDF](?![\x80-\xBF])/u',
		'/[\xE0-\xEF](?![\x80-\xBF]{2})/u',
		'/[\xF0-\xF4](?![\x80-\xBF]{3})/u'
	];
	$html		= util_utf8( \trim( $html ) );	// Convert to UTF-8
	$html		= \preg_replace( $filters, '', $html );
	
	// Convert Unicode character entities?
	if ( $entities ) {
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
function sanitize_escape_text(
	string		$text, 
	bool		$quotes		= false, 
	bool		$spaces		= true,
	bool		$html		= true 
) : string {
	$qflag	= $quotes ? \ENT_QUOTES : \ENT_NOQUOTES;
	$hflag	= $html ? \ENT_HTML5 : 0;
	$text	= sanitize_filter( $text );
	
	do {
		$decoded	= \htmlspecialchars_decode( $text, $qflag );
		$changed	= ( 0 !== \strcmp( $decoded, $text ) );
		$text		= $decoded;
	} while ( $changed );
	
	$text	= sanitize_filter( $text );
	$flags	= $qflag | $hflag | \ENT_SUBSTITUTE;
	$text	= \htmlspecialchars( $text, $flags, 'UTF-8' );
	
	return ( $spaces ) ? \strtr( $text, [ 
			' ' => '&nbsp;',
			'	' => '&nbsp;&nbsp;&nbsp;&nbsp;'
		] ) : $text;
}

/**
 *  Cleaned URI with parsed path components
 *  
 *  @param string	$raw	Raw URI from source
 *  @param string	$base	Prefix if required
 *  @return string
 */
function sanitize_uri( string $raw, ?string $base = null ) : string|null {
	$path	= \trim( \parse_url( $raw, \PHP_URL_PATH ) ?? '', '/' );
	$depth	= 0;
	$max_d	= 10;
	
	// Normalize
	do {
		$decoded	= sanitize_filter( \rawurldecode( $path ) );	// Invalid chars
		$decoded	= \preg_replace( '#/{2,}#', '/', $decoded );	// Collapse
		
		$changed	= ( $decoded !== $path );
		$path		= $decoded;
		$depth++;
		
	} while( $changed && $depth < $max_d );
	
	if ( $changed && $depth >= $max_d ) { return null; }
	
	// Prevent directory traversal
	$segments	= 
	\array_filter( 
		\explode( '/', $path ), 
		fn( $seg ) => $seg !== '..' && $seg !== '.' 
	);
	$final		= \trim( \implode( '/', $segments ), '/' );
	
	if ( $base && !\str_starts_with( $final, $base ) ) {
		return null;
	}
	return $final;
}

/**
 *  Attempt to stop URI/URL injection
 *  
 *  @param string	$tex	Raw text input
 *  @return string
 */
function sanitize_strip_xss( string $text ) : string {
	static $patterns	= [
		'/expression\s*\(.*?\)/i',			// Probably not needed
		'/(\\~\/|\.\.|\\\\|\-\-)/sm',			// Directory traversal
		'/(<(s(?:cript|tyle)).*?)/ism',			// Injection
		'/(document\.|window\.|eval\(|\(\))/ism',	// Events and scripts
		'/url\(\s*(?:javascript|jscript|livescript|vbscript|data)\s*[:&colon;][^\)]*\)/i'
	];
	
	$text	= \trim( $text, "'\"" );
	do {
		$original = $text;
		foreach ( $patterns as $rx ) {
			$text = \preg_replace( $rx, '',  $text );
		}
	} while ( 0 !== \strcasecmp( $text, $original ) );
	
	return \trim( $text, "'\"" );
}

/**
 *  User input and environment data filtering helper
 *  
 *  @param string	$source		Data source type, defaults to 'get'
 *  @param array	$filter		Input processing filters
 */
function sanitize_input_array( string $source, array $filter ) : array {
	$dtype	= 
	match( \strtolower( $source ) ) {
		'post'			=> \INPUT_POST,
		'cookie'		=> \INPUT_COOKIE,
		'server'		=> \INPUT_SERVER,
		'env', 'environment'	=> \INPUT_ENV,
		
		default			=> \INPUT_GET
	};
	
	$data	= \filter_input_array( $dtype, $filter, true );
	return empty( $data ) ? [] : $data;
}

/**
 *  Attempt to filter host name
 *  
 *  @param string	$txt	Raw host definition
 */
function sanitize_host( string $txt ) : string {
	return \mb_strtolower( \rtrim( 
		\parse_url( $txt, \PHP_URL_HOST ) ?? '', 
		" \t\n\r\0\x0B." 
	) );
}

/**
 *  Attempt to filter URL
 *  This is not a 100% foolproof method, but it's better than nothing
 *  
 *  @param string	$txt	Raw URL attribute value
 *  @param bool		$xss	Filter XSS possibilities
 *  @return string
 */
function sanitize_url( string $text, bool $xss = true ) : string {
	// Nothing to clean
	if ( empty( $text ) ) { return ''; }
	
	// Default filter
	if ( \filter_var( $txt, \FILTER_VALIDATE_URL ) ) {
		$text	= sanitize_uri( $text ) ?? '';
		if ( empty( $text ) ) { return ''; }
	}
	
	$text = sanitize_escape_text( 
		( $xss ? sanitize_strip_xss( $text ) : $text ), false, false 
	);
}

/**
 *  Attempt to decode encoded URLs
 *  
 *  @param string	$url	Raw URL string
 *  @param int		$limit	Decoding depth limit
 *  @return mixed
 */
function sanitize_urldecode( string $url, int $limit = 10 ) : ?string {
	$url	= \trim( $url );
	if ( '' === $url ) { return ''; }
	
	$prev		= '';
	$current	= $url;
	$depth		= 0;
	
	while ( $current !== $prev ) {
		if ( $depth > $limit ) { return null; }
		
		$prev		= $current;
		$current	= \urldecode( $prev );
		$depth++;
	}
	
	return $current;
}

/**
 *  Filter and optionally parse query into usable segments
 *  
 *  @param bool		$parsed		Process into sanitized array
 *  @param bool		$lower_keys	Make array keys lowercase, if true
 *  @return mixed
 */
function sanitize_query( bool $parsed = true, bool $lower_keys = false ) : string|array {
	static $query;
	static $result;
	static $result_lower;
	
	$query ??= $_SERVER['QUERY_STRING'] ?? '';
	
	if ( $parsed && isset( $result ) ) {
		return $lower_keys ? $result_lower : $result;
	} elseif ( !$parsed ) {
		return $query;
	}
	
	$result	= [];
	$pairs	= \explode( '&', $query );
	foreach ( $pairs as $pair ) {
		if ( '' === $pair ) { continue; }
		
		[ $key, $value ] = 
		\array_map( 
			'sanitize_urldecode', 
			\explode( '=', $pair, 2 ) + [ 1 => '' ] 
		);
		
		if ( $key === '') { continue; }
		
		// Preserve duplicates
		if ( isset( $result[$key] ) ) {
			if ( \is_array( $result[$key] ) ) {
				$result[$key][] = $value;
			} else {
				$result[$key] = [ $result[$key], $value ];
			}
		} else {
			$result[$key] = $value;
		}
	}
	
	$result_lower = \array_change_key_case( $result, \CASE_LOWER );
	return $result;
}

/**
 *  Check if given file name is reserved
 *  
 *  @param string	$name	Raw filename
 *  @return bool
 */
function sanitize_is_reserved_name( string $name ) : bool {
	static $reserved = [
		'con', 'prn', 'aux', 'nul',
		'com1','com2','com3','com4','com5','com6','com7','com8','com9',
		'lpt1','lpt2','lpt3','lpt4','lpt5','lpt6','lpt7','lpt8','lpt9'
	];
	
	$base	= \strtolower( \pathinfo( $name, \PATHINFO_FILENAME ) );
	return '' !== $base && \in_array( $base, $reserved );
}

/**
 *  Clean filename to safe format
 *  
 *  @param string $name Raw filename
 *  @return string
 */
function sanitize_filename( string $name ) : string|null {
	$name	= sanitize_filter( $name ); 
	
	$name	= \preg_replace( '/[\/\\\?\*\:\|"<>\x00-\x1F]/u', '_', $name );
	$name	= \preg_replace( '/\_+/', '_', $name );
	$name	= \preg_replace( '/[[:space:]]+/', ' ', $name );
	$name	= \trim( $name, ". \t\n\r\0\x0B" );
	
	if ( '' === $name ) { return null; }
	
	if ( sanitize_is_reserved_name( $name ) ) {
		$ext	= \pathinfo( $name, \PATHINFO_EXTENSION );
		$base	= \pathinfo( $name, \PATHINFO_FILENAME );
		$name	= $base . '_' . ( $ext ? '.' . $ext : '' );
	}
	
	return $name;
}

/**
 *  String basic password filtering (avoid removing special chars)
 *  
 *  @param string	$password	Raw sent password
 *  @return string
 */
function sanitize_password( string $password ) : string {
	$password = util_utf8( trim( $password ) );
	if ( empty( $password ) ) {
		throw new
		\RuntimeException( 'Sanitizing password failed' );
	}
	return $password;
}

/**
 *  Basic directory path filter
 *  
 *  @param string	$base_dir	Root directory
 *  @param string	$filename	Raw file name
 *  @param int		$max		Maximum file path with root included
 *  @return bool
 */
function sanitize_is_valid_path( 
	string	$base_dir, 
	string	$filename, 
	int	$max		= 255 
) : bool {
	$full_path	= $base_dir . \DIRECTORY_SEPARATOR . $filename;
	return \strlen( $full_path ) <= $max;
}

/**
 *  Normalize file opening modes
 *  
 *  @param string	$mode	File open mode
 *  @return mixed
 */
function sanitize_normalize_fmode( string $mode ) : ?string  {
	if ( !\preg_match( '/^(r|w|a|x|c)(\+)?([bt]{0,2})$/i', $mode, $m ) ) {
		return null;
	}
	
	$flags	= \array_unique( \str_split( $m[3] ?? '' ) );
	\sort( $flags );
	return $m[1] . ( $m[2] ?? '' ) . \implode( '', $flags );
}

/**
 *  Convert all spaces to single character
 *  
 *  @param string	$text		Raw text containting mixed space types
 *  @param string	$rpl		Replacement space, defaults to ' '
 *  @param string	$br		Preserve line breaks
 *  @return string
 */
function sanitize_spaces( string $text, string $rpl = ' ', bool $br = false ) : string {
	return $br ?
		\preg_replace( 
			'/[ \t\v\f]+/', $rpl, sanitize_filter( $text ) 
		) : 
		\preg_replace( '/[[:space:]]+/', $rpl, sanitize_filter( $text ) );
}

/**
 *  Clean a directory or folder name
 *  
 *  @param string	$text		Viable folder name
 */
function sanitize_dir( string $text ) : bool {
	return ( bool ) \preg_match( '/^[A-Za-z0-9_-]+$/', $text );
}

/**
 *  Filter slug to appropriate format
 *  
 *  @param string	$text		Raw slug or title
 *  @param string	$prefix		Slug prefix if sanitizing failed
 *  @return string
 */
function sanitize_slug( string $text, string $prefix = 'node-' ) : string {
	$text	= \preg_replace( '/[^\pL\pN]+/u', '-', sanitize_filter( $text ) );
	$text	= \preg_replace( '/-+/', '-', $text );
	$text	= \mb_strtolower( $text, 'UTF-8' );
	$text	= \trim( $text, '-' );
	
	return empty( $text ) ? $prefix . util_gen_key() : $text;
}

/**
 *  Sanitize DOMNode
 *  
 *  @param DOMNode $node Element to filter 
 *  @param DOMNode $parent Parent element
 *  @return DOMNode
 */
function sanitize_escape_node( $node, $parent ) : DOMNode {
	$name		= \strtolower( $node->tagName );
	$inner_html	= '';
	foreach ( $node->childNodes as $child ) {
		$inner_html .= $node->ownerDocument->saveHTML( $child );
	}
	
	$new_node	= $parent->createElement( $name );
	$new_node->appendChild( 
		$parent->createTextNode( sanitize_escape_text( $inner_html ) ) 
	);
	return $new_node;
}

function sanitize_text( string $text ) : string {
	return sanitize_strip_xss( \strip_tags( sanitize_filter( $text ) ) );
}

function sanitize_int( string $text ) : int {
	return ( int ) sanitize_text( $text );
}

function sanitize_bool( string $text ) : bool {
	return ( bool ) sanitize_text( $text );
}

function sanitize_sizes( string $sizes ) : string {
	static $rx_media	= 
	'/^\(\s*(max|min)-width:\s*\d+(px|em|rem|%)\s*\)\s*\d+(vw|px)$/';
	static $rx_size		= '/^\d+(vw|px)$/';
	
	$entries	= \explode( ',', $sizes );
	$clean		= [];
	
	foreach ( $entries as $entry ) {
		$entry = \trim( $entry );
		
		// Validate media condition
		if ( \preg_match( $rx_media, $entry ) ) {
			$clean[] = $entry;
		
		// Validate simple size-only values (E.G. '100vw')
		} elseif ( \preg_match( $rx_size, $entry ) ) {
			$clean[] = $entry;
		}
	}
	
	return implode( ', ', $clean );
}

function sanitize_srcset( string $srcset ) : string {
	static $rx_fsize= '/^\d+(w|x)$/';
	static $rx_file	= 
	'/^\/[a-zA-Z0-9_\-\/]+\.(png|jpg|jpeg|gif|bmp|tif|tiff)$/';
	
	$entries	= \explode( ',', $srcset );
	$clean		= [];
	
	foreach ( $entries as $entry ) {
		// Splits URL and size descriptor
		$entry			= \trim( \preg_replace( '/\s+/', ' ', $entry ) );
		[ $url, $desc ]		= \preg_split( '/\s+/', $entry, 2 ) + [ '', '' ];
		$desc			= \trim( $desc ?? '' );
		$valid			= 
			// Absolute URLs
			( false !== \filter_var( $url, \FILTER_VALIDATE_URL ) ) || 
			
			// Relative paths limited to simple characters
			( 1 === \preg_match( $rx_file, $url ) );
		
		// Skip invalid URL
		if ( !$valid ) {
			continue;
		}
		
		// Validate size descriptor
		$desc		= \preg_match( $rx_fsize, $desc ) ? $desc : '';
		
		// Store sanitized entry
		$url		= sanitize_uri( $url ) ?: '';
		$clean[]	= \trim( "{$url} {$desc}" );
	}
	
	return \implode( ', ', $clean );
}

function sanitize_style( string $text, ?array $allowed = null ) : string {
	static $css	= '/^[a-z0-9\s\(\)\#\.,%\-\[\]!:;\/]+$/i';
	static $default = [ 
		'color', 'background-color', 'font-size', 'font-weight',
			'text-align', 'border', 'margin','padding', 'display'
	];
	
	// Fallback set
	$allowed	??= $default;
	
	// Problematic patterns
	$text		= sanitize_strip_xss( $text );
	
	// Split styles into individual rules
	$rules		= 
	\array_filter( \array_map( 'trim', \explode( ';', $text ) ) );
	
	$sanitized	= [];
	
	// Evaluate each property and value
	foreach ( $rules as $rule ) {
		[ $property, $value ]	= 
		\array_map( 'trim', \explode( ':', $rule, 2 ) + [ '', '' ] );
	
		// Empty, not in whitelist, or questionable? Skip property
		if ( 
			'' === $property			|| 
			'' === $value				|| 
			!\in_array( $property, $allowed, true )	|| 
			!\preg_match( $css, $value )
			
		) { continue; }
		
		// Clean property and value
		$sanitized[] = "{$property}: {$value}";
	}
	
	// Return to CSS style="" syntax
	return implode( '; ', $sanitized );
}

function sanitize_attribute( 
	\DOMElement	$node, 
	\DOMElement	$new_node, 
	string		$attr, 
	array		$rule 
) : void {
	$value		= $node->getAttribute( $attr );
	
	// Limited subset of allowed values
	if ( isset( $rule['allowed'] ) ) {
		if ( \is_array( $rule['allowed'] ) ) {
			if ( \in_array( 
				\strtolower( $value ), 
				\array_map( 'strtolower', $rule['allowed'] ), 
				false	
			) ) {
				$new_node->setAttribute( $attr, $value );
			}
			
			return;
		
		} else {
			if ( 0 === \strcasecmp( ( string ) $rule['allowed'], $value ) ) {
				$new_node->setAttribute( $attr, $value );
			}
			return;
		}
	}
	
	$sanitizer	= match( true ) {
		isset( $rule['filter'] ) && defined( $rule['filter'] ) 
			=> function( $v ) use ( $rule ) {
				$filter		= \constant( $rule['filter'] );
				$options	= $rule['options'] ?? [];
				$flags		= 0;
				
				if ( 
					!empty( $rule['flags'] )	&& 
					\is_array( $rule['flags'] ) 
				) {
					foreach ( $rule['flags'] as $flag ) {
						if ( \defined( $flag ) ) {
							$flags |= \constant( $flag );
						}
					}
				}
				
				return
				\filter_var( $v, $filter, [ 'flags' => $flags, 'options' => $options ] );
			},
		
		isset( $rule['callback'] ) && \function_exists( $rule['callback'] ) 
			=> fn( $v ) => \call_user_func( $rule['callback'], $v ),
		
		default	=> fn( $v ) => sanitize_escape_text( $v, false, false );
	};
	
	$sanitized = $sanitizer( $value );
	if ( $sanitized !== false && $sanitized !== null ) {
		$new_node->setAttribute( $attr, $sanitized );
	}
}

function sanitize_html( $html, $tag_map ) {
	$doc	= new \DOMDocument();
	\libxml_use_internal_errors( true );
	
	$doc->loadHTML(
		$html,
		\LIBXML_HTML_NOIMPLIED	|
		\LIBXML_HTML_NODEFDTD	|
		\LIBXML_NOERROR		|
		\LIBXML_NOWARNING	|
		\LIBXML_NOXMLDECL	|
		\LIBXML_COMPACT		|
		\LIBXML_NOCDATA		|
		\LIBXML_NONET
	);
	
	\libxml_clear_errors();
	
	$cleaned	= new \DOMDocument();
	$cleaned->formatOutput = true;
	
	$clean_node	= 
	function( $node ) use ( $cleaned, $tag_map, &$clean_node ) {
		if ( $node instanceof \DOMText) {
			return $cleaned->createTextNode( $node->nodeValue );
		}
		
		if ( !$node instanceof \DOMElement ) { return null; }
		
		$tag		= null; // Default
		$original_tag	= $node->tagName;
		foreach ( $tag_map as $key => $rules ) {
			if ( 
				0 === \strcasecmp( $key, $original_tag )	|| 
				\in_array( 
					\strtolower( $original_tag ), 
					\array_map( 'strtolower', $rules['alias'] ?? [] ), 
					false
				)
			) {
				$tag = $key; // Assign if valid
				break;
			}
		}
		
		if ( null === $tag ) { return null; }
		
		if ( \in_array( \strtolower( $tag ), [ 'code', 'pre', 'kbd' ], true ) ) {
			return sanitize_escape_node( $node, $cleaned );
		}
		
		$new_node = $cleaned->createElement( \strtolower( $tag ) );
		$attr_rules = $tag_map[$tag]['attributes'] ?? [];
		
		foreach ( $attr_rules as $attr => $rule ) {
			// Skip if not in whitelist at all
			if ( !$node->hasAttribute( $attr ) ) {
				continue;
			}
			
			sanitize_attribute( $node, $new_node, $attr, $rule );
		}
		
		if ( $node->hasChildNodes() ) {
			foreach ($node->childNodes as $child) {
				$clean_child = $clean_node($child);
				if ( $clean_child ) {
					$new_node->appendChild($clean_child);
				}
			}
		}
		
		return $new_node;
	};
	
	foreach ( $doc->childNodes as $child ) {
		if ( !( $child instanceof \DOMNode ) ) { continue; }
		
		$sanitized = $clean_node( $child );
		if ( !$sanitized ) { continue; }
		
		$cleaned->appendChild( $sanitized );
	}
	
	return $cleaned->saveHTML();
}


/**
 *  Storage, reading, and writing
 */

/**
 *  Storage configuration settings helper
 *  
 *  @param array $new_options Override presets
 *  @return array
 */
function storage_options( ?array $new_options = null ) : array {
	static $options	= [
		'write_depth'	=> 6,
		'tmp_ext'	=> '.tmp',
		'bkp_ext'	=> '.bkp',
		'lock_type'	=> 'file',
		'lock_tries'	=> 3,
		'lock_wait'	=> 10,
		'lock_stale'	=> 600,
		'temp_stale'	=> 3600,
		'writable'	=> [ 'data', 'storage', 'uploads', 'media' ]
	];
	
	if( !empty( $new_options ) ) {
		$options = \array_replace_recursive( $options, $new_options );
	}
	
	return $options;
}

/**
 *  Generate unique write key
 *  
 *  @return string
 */
function storage_get_id() : string {
	return util_get_id( 'storage', true );
}

/**
 *  File size helper
 *  
 *  @param string	$fpath	Location on disk
 *  @return int
 */
function storage_filesize( string $fpath ) : int {
	$fsize		= @\filesize( $fpath );
	if ( false === $fsize ) { return 0; }
	
	return $fsize;
}

/**
 *  Last modified time helper
 *  
 *  @param string	$fpath	Location on disk
 *  @return int
 */
function storage_filemtime( string $fpath ) : int {
	return ( int )( @\filemtime( $fpath ) ?: 0 );
}

/**
 *  File opening helper
 *  
 *  @param string	$fpath	Location on disk
 *  @param strring	$mode	File opening mode
 *  @return resource
 */
function storage_file_open( string $fpath, string $mode = 'rb' ) {
	$mode = sanitize_normalize_fmode( $mode );
	if ( empty( $mode ) )  {
		throw new 
		\InvalidArgumentException( 'Invalid file open mode' );
	}
		
	$handle		= \fopen( $fpath, $mode );
	if ( false === $handle ) {
		throw new 
		\RuntimeException( 'Error obtaining file read handle' );
	}
	return $handle;
}

/**
 *  Generate an in-memory file hash
 *  
 *  @param string $fpath	Location on disk
 *  @return mixed		String hash on success or false
 */
function storage_file_hash( string $fpath ) : string|false {
	if ( !\is_readable( $fpath ) ) {
		return false;
	}
	
	$handle	= @\fopen( $fpath, 'rb' );
	if ( !$handle ) { return false; }
	
	$out	= '';
	try {
		$ctx	= \hash_init( 'sha256' );
		while( true ) {
			$chunk = \fread( $handle, 8192 );
			if ( false === $chunk ) {
				throw new 
				\RuntimeException( "Error reading file during hashing" );
			}
			
			if ( '' === $chunk ) { break; }
			\hash_update( $ctx, $chunk );
		}
		
		$out = \hash_final( $ctx );
		
	} finally {
		if ( \is_resource( $handle ) ) { \fclose( $handle ); }
	}
	return $out;
}

/**
 *  Obtains directory type exclusive lock with retry
 *  
 *  @param string	$lock_file	File location for lock
 *  @param int		$tries		Number tries before abandoning lock
 *  @return bool
 */
function storage_dirtype_lock( string $lock_file, int $tries = 3 ) : bool {
	$lock_dir	= $lock_file . '.lockdir';
	$start		= time();
	
	while ( $tries > 0 ) {
		// Try to acquire lock atomically
		if ( @\mkdir( $lock_dir, 0777 ) ) {
			\register_shutdown_function( function() use ( $lock_dir ) {
				@\rmdir( $lock_dir );
			} );
			return true;
		}
		
		$tries--;
		\time_nanosleep( 0, 100000 );
	}
	
	return false;
}

/**
 *  Obtains an exclusive file lock with retry
 *  
 *  @param resource	$handle		File resource
 *  @param int		$tries		Number of attempts
 *  @return bool			True on success
 */
function storage_filetype_lock( $handle, int $tries = 3 ) : bool {
	$locked	= false;
	for ( $i = 0; $i < $tries; $i++ ) {
		if ( \flock( $handle, \LOCK_EX ) ) {
			$locked = true;
			break;
		}
		\time_nanosleep( 0, 100000 );
	}
	
	return $locked;
}

/**
 *  Remove stale locks that are no longer needed
 *  
 *  @param string	$lock_file	Original file location for lock
 *  @param string	$type		File or directory lock selector
 *  @param int		$max_age	Maximum age before lock is considered stale
 */
function storage_clean_stale_lock(
	string		$lock_file, 
	string		$type, 
	int		$max_age 
) : void {
	$check = 
	( 0 === \strcasecmp( 'file', $type ) ) 
		? $lock_file 
		: $lock_file . '.lockdir';
	
	$mtime = @\filemtime( $check );
	if ( $mtime !== false && $mtime < time() - $max_age ) {
		if ( \is_dir( $check ) ) {
			@\rmdir( $check );
		} else {
			@\unlink( $check );
		}
		\error_log( "Stale lock for '{$lock_file}' removed" );
	}
}

/**
 *  Remove directory of filetype lock
 *  
 *  @param resource	$handle		File resource
 *  @param string	$lock_file	File lock path
 */
function storage_release_lock( $handle, string $lock_file ) : void {
	$ltype	= storage_options()['lock_type'];
	if ( 0 === \strcasecmp( 'file', $ltype ) ) {
		if ( \is_resource( $handle ) ) {
			@\flock( $handle, \LOCK_UN );
			@\fclose( $handle );
		}
		return;
	}
	
	$lock_dir	= $lock_file . '.lockdir';
	
	if ( \is_dir( $lock_dir ) ) { @\rmdir( $lock_dir ); }
}

/**
 *  Close any given open file streams
 *  
 *  @param array	$files		List of file resources
 */
function storage_close_files( array $files ) : void {
	foreach( $files as $item ) {
		if ( 
			\is_resource( $item )				&& 
			\get_resource_type( $item ) === 'stream' 
		) {
			\fclose( $item );
		}
	}
}

/**
 *  Check wait time before lock timeout
 *  
 *  @param string	$lock_file	File lock path
 *  @param int		$start Time	start in seconds
 *  @param int		$max_wait	Maximum wait time in seconds before timing out
 *  @return bool
 */
function storage_check_wait( string $lock_file, int $start, int $max_wait ) : bool {
	if ( time() - $start > $max_wait ) {
		\error_log( "Timeout while waiting for lock: {$lock_file}" );
		return false;
	}
	
	sleep( 1 );
	return true;		
}

/**
 *  Obtain file lock (directory of filetype) with a given access mode
 *  
 *  @param stiring 	$lock_file	File lock path
 *  @param string	$mode		File open mode
 *  @return mixed
 */
function storage_lock_file( string $lock_file, string $mode ) : false|resource {
	$options	= storage_options();
	$tries		= $options['lock_tries'];
	$type		= $options['lock_type'];
	
	$max_wait	= $options['lock_wait'];
	$max_age	= $options['lock_stale'];
	$start		= time();
	
	$handle		= null;
	
	// Clean any previous locks
	storage_clean_stale_lock( $lock_file, $type, $max_age );
	
	$get_lock	= 
	( 0 === \strcasecmp( 'file', $type ) )
		? function() use( &$handle, $tries ) { return storage_filetype_lock( $handle, $tries ); }
		: function() use( $lock_file, $tries ) { return storage_dirtype_lock( $lock_file, $tries ); }
	
	// Attempt lock
	while ( true ) {
		$handle =\fopen( $lock_file, $mode );
		if ( $handle && $get_lock() ) {
			return $handle;
		}
			
		if ( !storage_check_wait( $lock_file, $start, $max_wait ) ) {
			storage_release_lock( $handle, $lock_file );
			return false; 
		}
	}
}

/**
 *  Traverse upward from starting path to obtain a writable directory
 *  
 *  @param string	$start		Starting path. Stops if this is already writable
 *  @param string|array	$target		List of directory names
 *  @param int		$max_depth	Maximum traversal depth
 *  @return string|null			Found writable or defaults to system temp dir
 */
function storage_find_writable(
	string		$start, 
	string|array	$target, 
	int		$max_depth	= 6 
) : ?string {
	if ( empty( $target ) ) { return null; }
	
	$names = 
	\array_filter(
		\is_array( $target ) ? $target : [ $target ],
		fn( $name ) => \is_string( $name ) && '' !== $name
	);
	
	if ( empty( $names ) ) { return null; }
	
	$depth	= $max_depth;
	$dir	= \realpath( $start );
	while ( 
		false !== $dir			&& 
		\DIRECTORY_SEPARATOR !== $dir	&& 
		$depth > 0 
	) {
		foreach ( $names as $check ) {
			$child = $dir . \DIRECTORY_SEPARATOR . $check;
			if ( \is_dir( $child ) && \is_writable( $child ) ) {
				return $child;
			}
		}
		
		$parent = \dirname( $dir );
		
		// Reached root?
		if ( $parent === $dir ) { break; }
		
		$dir = $parent;
		$depth--;
	}
	
	return \sys_get_temp_dir();
}

/**
 *  Main writable directory
 *  
 *  @return string
 */
function storage_base() : string {
	$options	= storage_options();
	$dirs		= 
	$options['writable'] ?? [ 'data', 'storage', 'uploads', 'media' ];
	
	if ( isset( $options['storage_dir'] ) ) {
		return $options['storage_dir'];
	}
	
	if ( defined( 'STORAGE_DIR' ) ) { 
		$storage_dir = 
		\rtrim( STORAGE_DIR, '\\/' ) . \DIRECTORY_SEPARATOR; 
		
		storage_options( [ 'storage_dir' => $storage_dir ] );
		return $storage_dir;
	}
	
	$env_storage	= \getenv( 'STORAGE_DIR' );
	$storage	= ( $env_storage && \is_writable( $env_storage ) )
		? $env_storage
		: storage_find_writable( __DIR__, $dirs );
	
	if ( empty( $storage ) ) {
		$dlist	= \implode( ', ', $dirs );
		$msg	= 
		"Storage directory not defined. " . 
		"Set STORAGE_DIR constant or create writable folder named one of: {$dlist}";
		
		\error_log( $msg );
		throw new
		\RuntimeException( 'Unable to discover storage directory' );
	}
	
	$storage_dir	= \rtrim( $storage, '\\/' ) . \DIRECTORY_SEPARATOR;
	storage_options( [ 'storage_dir' => $storage_dir ] );
	return $storage_dir;
}

/**
 *  Create a backup file name of given file
 *  
 *  @param string	$name	Target file name
 *  @return string		Backup file path
 */
function storage_backup_path( string $name ) : string {
	$ext	= storage_options()['bkp_ext'];
	$base	= \basename( $name );
	do {
		$bkp = storage_base() 
			. $base . '.'
			. util_timestamp( 'Y-m-d_H-i-s_' )
			. \uniqid() . $ext;
	} while ( \file_exists( $bkp ) );
	
	return $bkp;
}

/**
 *  Clean any temporary files in storage location
 *  
 *  @param string	$path	Sub path in base storage location
 */
function storage_temp_cleanup( string $path ) : void {
	static $cleanup	= [];
	if ( isset( $cleanup[$path] ) ) { return; }
	
	$options	= storage_options();
	$stale		= $options['temp_stale'];
	$cleanup[$path]	= true;
	$pattern	= $path . '.*' . $options['tmp_ext'];
	
	\register_shutdown_function( function() use( $pattern, $stale ) {
		try {
			foreach ( \glob( $pattern, \GLOB_NOSORT ) as $file ) {
				$mtime = \filemtime( $file );
				if ( false !== $mtime && $mtime < time() - $stale ) { 
					@\unlink( $file );
				}
			}
		} catch( \Throwable $e ) {
			\error_log( 
				"Error deleting temp {$pattern}: {$e->getMessage()}" 
			);
		}
	} );
}

/**
 *  Append data to given file with optional lock
 *  
 *  @param string	$path	Writable file location
 *  @param string	$data	New data to append
 *  @param string	$block	Obtain lock, if true
 *  @return bool		True on success
 */
function storage_append( string $path, string $data, bool $block = false ) : bool {
	$id	= storage_get_id();
	$handle	= \@fopen( $path, 'a' );
	if ( !$handle || !\is_resource( $handle ) ) {
		\error_log( "Unable to open log file '{$path}' by {$id}" );
		return false;
	}
	
	$mode	= $block ? \LOCK_EX : \LOCK_EX | \LOCK_NB;
	if ( !@\flock( $handle, $mode ) ) {
		if ( !\is_resource( $handle ) ) {
			\fclose( $handle );
		}
		\error_log( "Unable to acquire lock on log file '{$path}' by {$id}" );
		return false;
	}
	
	$result	= \@fwrite( $handle, $data . PHP_EOL );
	if ( \is_resource( $handle ) ) {
		\flock( $handle, \LOCK_UN );
		\fclose( $handle );
	}
	
	return false !== $result;
}

/**
 *  Write new data to file with lock
 *  
 *  @param string	$path	Writable file location
 *  @param string	$data	New data to write
 *  @return bool		True on success
 */
function storage_write_file( string $path, string $data ) : bool {
	$options	= storage_options();
	$lock_file	= $path . '.lock';
	$tries		= $options['lock_tries'];
	
	// Wait for lock to clear
	while( $tries > 0 ) {
		if ( !\file_exists( $lock_file ) ) { break; }
		
		$tries--;
		\time_nanosleep( 0, 100000 );
	}
	
	// Something else was trying to write at the same time
	if ( $tries <= 0 && \file_exists( $lock_file ) ) {
		\error_log( "Parallel write to {$path} found by {$id}" );
		return false;
	}
	
	// Unique lock signature
	$id		= storage_get_id();
	$tmp_file	= 
	$path . '.' . $id . '.' . 
	\bin2hex( \random_bytes( 4 ) ) . $options['tmp_ext'];
	
	$lock_handle	= storage_lock_file( $lock_file, 'c+' );
	if ( !$lock_handle ) {
		\error_log( "Unable to acquire lock for '{$lock_file}' by {$id}" );
		
		throw new 
		\RuntimeException( "Unable to acquire lock" );
	}
	
	$tmp_handle	= \fopen( $tmp_file, 'c' );
	if ( !$tmp_handle ) {
		storage_release_lock( $lock_handle, $lock_file );
		\error_log( "Unable to create temp file '{$tmp_file}' by {$id}" );
		
		throw new 
		\RuntimeException( "Unable to open temp file" );
	}
	
	// Write and finish
	\fwrite( $tmp_handle, $data );
	\fclose( $tmp_handle );
	
	// Cleanup
	if ( \file_exists( $path ) && !\is_writable( $path ) ) {
		storage_release_lock( $lock_handle, $lock_file );
		\error_log( "Target file '{$path}' is not writable by {$id}" );
		
		throw new 
		\RuntimeException( "Target file is not writable" );
	}
	
	// Move temp to permanent location
	if ( !\rename( $tmp_file, $path ) ) {
		storage_release_lock( $lock_handle, $lock_file );
		\error_log( "Failed to replace '{$path}' with '{$tmp_file}' by {$id}" );
		
		throw new 
		\RuntimeException( "Failed to replace file" );
	}
	
	storage_release_lock( $lock_handle, $lock_file );
	storage_temp_cleanup( $path );
	return true;
}



/**
 *  Logging and message handling
 */

/**
 *  Generate a unique log ID
 *  
 *  @return string
 */
function log_get_id() : string {
	return util_get_id( 'log', false );
}

/**
 *  Set or get default logging level threshold for detail
 *  
 *  @param string	$level	Logging level
 *  @return mixed
 */
function log_check_level( string $level ) : ?string {
	static $priority	= [ 
		'DEBUG'		=> 0, 
		'INFO'		=> 1, 
		'NOTICE'	=> 2, 
		'WARN'		=> 3, 
		'ERROR'		=> 4 
	];
	
	// Change to info or above in production
	if( !\defined( 'LOG_LEVEL' ) ) {
		define( 'LOG_LEVEL', 'DEBUG' );
	}
	
	$level		= \strtoupper( $level );
	if ( !\array_key_exists( $level, $priority ) ) {
		$level = 'INFO';
	}
	
	$threshold	= $priority[LOG_LEVEL] ?? 1;
	return $priority[$level] >= $threshold ? $level : null;
}

/**
 *  Full log file storage location
 *  
 *  @return string
 */
function log_file() : string {
	static $file;
	if ( !isset( $file ) ) {
		$file	= storage_base() . 
		defined( 'LOG_FILE' ) 
			? LOG_FILE : 
			'messages.log';
	}
	return $file;
}

/**
 *  Check if custom log file location is valid. I.E. Within the storage folder
 *  
 *  @param string	$path		Storage path on disk
 *  @return bool
 */
function log_file_valid( string $path ) : bool {
	static $root	= \realpath( storage_base() );
	$rpath		= @\realpath( $path );
	
	return ( false !== $rpath ) && ( 0 === \strpos( $rpath, $root ) );
}

/**
 *  Remove stale log files rotated into archives
 *  
 *  @param string	$log_file	Base log file, rotated
 */
function log_cleanup( string $log_file ) : void {
	static $ret;
	
	$ret	??= 
	defined( 'LOG_MAX_RETENTION' )
		? LOG_MAX_RETENTION
		: 7;
	
	$files		= \glob( $log_file . '.*.log' );
	if ( !$files ) { return; }
	
	$threshold	= time() - ( $ret * 86400 );
	foreach ( $files as $old ) {
		if ( !\is_file( $old ) || !\is_writable( $old ) ) {
			continue;
		}
		
		$mtime = \filemtime( $old );
		if ( !$mtime ) { continue; }
		
		if ( $mtime < $threshold ) {
			if ( !@\unlink( $old ) ) {
				\error_log( "Failed to delete old log file: {$old}" );
			}
		}
	}
}

/**
 *  Rotate given log file
 *  
 *  @param string $log_file Target log file location on disk
 */
function log_rotate( string $log_file ) : void {
	static $max_size;
	
	$max_size ??= 
	defined( 'LOG_MAX_SIZE' ) 
		? LOG_MAX_SIZE
		: 5242880;
	
	if ( !\is_readable( $log_file ) ) { return; }
	
	$fsize	= \filesize( $log_file );
	if ( !$fsize ) { return; }
	
	if ( $fsize > $max_size ) {
		$stamp		= date( 'Ymd_His' );
		$archive	= "{$log_file}.{$stamp}.log";
		if ( !\rename( $log_file, $archive ) ) {
			\error_log( "Failed to archive log: {$log_file}" );
			return;
		}
	}
	
	// Retention cleanup
	log_cleanup( $log_file );
}

/**
 *  Core log writer
 *  
 *  @param string	$pair		Log file loaction and message combination
 */
function log_message_write( ?array $pair = null ) : void {
	static $reg	= false;
	static $cache	= [];
	
	if ( !$reg ) {
		$reg = true;
		\register_shutdown_function( 'log_message_write' );
	}
	
	if ( null !== $pair ) {
		[ $msg_file, $entry ] = $pair;
		
		if ( empty( $entry ) || empty( $msg_file ) ) { return; }
		if ( !\is_string( $entry ) || !\is_string( $msg_file ) ) { return; }
		
		$cache[] = [ $msg_file, $entry ];
		return;
	}
	
	// Shutdown action
	$grouped = [];
	foreach ( $cache as [ $file, $entry ] ) {
		$grouped[$file][] = $entry;
	}
	
	$base	= storage_base();
	foreach ( $grouped as $file => $entries ) {
		if ( !log_file_valid( $file ) ) {
			\error_log( "Log file {$file} is not within storage {$base}" );
			continue; 
		}
		
		log_rotate( $file );
		$data	= \implode( \PHP_EOL, $entries ) . \PHP_EOL;
		
		if ( !storage_append( $file, $data, true ) ) {
			\error_log( "Failed to append batched messages to {$file} in {$base}" );
		}
	}
}

/**
 *  Format log entry into useful and consistent format
 *  
 *  @param string	$msg		Base log message
 *  @param string	$level		Priority level
 *  @return string
 */
function log_format( string $msg, string $level = 'INFO' ) : string {
	$id		= log_get_id();
	$script		= \basename( $_SERVER['SCRIPT_NAME'] ?? 'unknown' );
	$timestamp	= util_timestamp();
	
	$entry			= <<<MSG
[{$timestamp}] [ID:{$id}] [{$script}] [{$label}]
{$msg}

---

MSG;
}

/**
 *  Main log message handler
 *  
 *  @param array|string		$context	Logging context detail
 *  @param string		$level		Logging level
 *  @param string		$file		Optional log file location, defaults to log_file()
 */
function log_msg( 
	string|array	$context, 
	string		$level		= 'INFO', 
	?string		$file		= null 
) : void {
	if ( empty( log_check_level( $level ) ) ) {
		return;
	}
	
	if ( \is_array( $context ) ) {
		$msg =
		\json_encode( 
			$context, 
			\JSON_UNESCAPED_SLASHES | \JSON_UNESCAPED_UNICODE
		);
		
		// Since PHP 8.3 
		if ( !\json_validate( $msg ) ) {
			\error_log( "Invalid JSON generated for log context" );
			return;
		}
	} else {
		$msg = $context;
	}
	
	$entry	= log_format( $msg, $level );
	log_message_write( [ $file ?? log_file(), $entry ] );
}

function log_info( string|array $context, ?string $file = null ) : void {
	log_msg( $context, 'INFO', $file );
}

function log_warn( string|array $msg, ?string $file = null ) : void {
	log_msg( $context, 'WARN', $file );
}

function log_error( string|array $msg, ?string $file = null ) : void {
	log_msg( $context, 'ERROR', $file );
}

function log_debug( string|array $msg, ?string $file = null ) : void {
	log_msg( $context, 'DEBUG', $file );
}



/**
 *  Request and query
 */

/**
 *  Time based unique request token generator
 *  
 *  @return string
 */
function request_id() : string {
	static $id;
	
	$id	??= 
	$_SERVER['REQUEST_TIME'] ?? time()  . '_' . 
		\bin2hex( \random_bytes( 32 ) );
	
	return $id;
}

/**
 *  Generic timer
 *  
 *  @return string
 */
function request_timestamp() : string {
	static $stamp;
	
	$stamp ??= date( 'c' ); // ISO 8601 format
	return $stamp;
}

/**
 *  Get or guess current server protocol
 *  
 *  @param string	$assume		Default protocol to assume if not given
 *  @return string
 */
function request_protocol( string $assume = 'HTTP/1.1' ) : string {
	static $pr;
	$pr ??= $_SERVER['SERVER_PROTOCOL'] ?? $assume;
	
	return $pr;
}

/**
 *  Guess if current request is secure
 *  
 *  @return bool
 */
function request_is_tls() : bool {
	static $tls;
	
	$tls	??= 
	match( true ) {
		// Secure header
		( 
			!empty( $_SERVER['HTTPS'] )
			&& 0 !== \strcasecmp( $_SERVER['HTTPS'], 'off' ) 
		),
		
		// Proxy/forwarded headers
		( 
			!empty( $_SERVER['HTTP_X_FORWARDED_PROTO'] )
			&& 0 === \strcasecmp( $_SERVER['HTTP_X_FORWARDED_PROTO'], 'https' ) 
		),
		( 
			!empty( $_SERVER['HTTP_X_FORWARDED_PROTOCOL'] )
			&& 0 === \strcasecmp( $_SERVER['HTTP_X_FORWARDED_PROTOCOL'], 'https' ) 
		),
		( 
			!empty( $_SERVER['HTTP_X_FORWARDED_SSL'] )
			&& 0 === \strcasecmp( $_SERVER['HTTP_X_FORWARDED_SSL'], 'on' ) 
		),
		( 
			!empty( $_SERVER['HTTP_X_URL_SCHEME'] )
			&& 0 === \strcasecmp( $_SERVER['HTTP_X_URL_SCHEME'], 'https' ) 
		),
		
		// Fallback
		( 
			!empty( $_SERVER['SERVER_PORT'] ) 
			&& 443 === ( int ) $_SERVER['SERVER_PORT']
		),

		default	=> false,
	};
	
	return $tls;
}

/**
 *  Current client request method
 *  
 *  @return string
 */
function request_method() : string {
	static $method;
	
	if ( isset( $method ) ) { return $method; }
	
	$supported	= 
	[ 'get', 'post', 'put', 'delete', 'patch', 'options', 'head' ];
	
	$method		= 
	\strtolower( \trim( $_SERVER['REQUEST_METHOD'] ?? '' ) );
	
	return \in_array( $method, $valid, true ) 
		? $method 
		: 'unsupported';
}

/**
 *  App-level override of request method
 *  
 *  @return string
 */
function request_effective_method() : string {
	static $override;
	
	if ( isset( $override ) ) { return $override; }
	
	$method		= request_method();
	if ( 'post' !== $method ) { 
		$override	= $method;
		return $method;
	}
	
	$find	= 
	\strtolower( \trim( 
		$_SERVER['X-HTTP-Method-Override']	?? 
		( $_POST['_method'] ?? '' )		?? '' 
	) );
	
	if ( !$find ) { 
		$override	= $method; 
		return $method;
	}
	
	if ( \in_array( $find, [ 'put', 'delete', 'patch' ], true ) ) {
		$override	= $find;
		return $find;
	}
	
	$override	= $method;
	return $method;
}

/**
 *  Forwarded HTTP header chain from load balancer
 *  
 *  @return array
 */
function request_canonical_forwarded() : array {
	static $data;
	
	if ( isset( $data ) ) { return $data; }

	$raw	= 
		$_SERVER['HTTP_FORWARDED'] ??
		$_SERVER['FORWARDED'] ?? 
		$_SERVER['HTTP_X_FORWARDED'] ?? '';
		
	if ( empty( $raw ) ) { return []; }
	
	$parsed	= [];
	
	// Split by comma: each element is a proxy hop
	$hops	= util_trimmed_list( $raw, false, ',' );
	
	// Gather forwarded values
	foreach ( $hops as $hop ) {
		$entry	= [];
		$pairs	= util_trimmed_list( $hop, true, ';' );

		foreach ( $pairs as $pair ) {
			[ $key, $val ]	= 
			\array_map( 
				fn( $v ) => sanitize_filter( $v ), 
				explode( '=', $pair, 2 ) + ['', ''] 
			);
			
			
			if ( '' === $key || '' === $val ) { continue; }
			
			$val	= \trim( $val, "\"" ); // remove optional quotes
			
			// Fresh value?
			if ( !isset( $entry[$key] ) ) {
				$entry[$key] = $val;
			
			// Existing array? Append
			} elseif ( \is_array( $entry[$key] ) ) {
				$entry[$key][] = $val;
			
			// Multiple values? 
			// Convert to array and then append new
			} else {
				$tmp		= $entry[$key];
				$entry[$key]	= [];
				$entry[$key][]	= $tmp;
				$entry[$key][]	= $val;
			}
		}
		
		if ( !empty( $entry ) ) {
			$parsed[] = $entry;
		}
	}
	
	$parsed		= \array_map( 'util_array_normalize_keys', $parsed );
	$coarse_last	= [];
	foreach ( $parsed as $entry ) {
		foreach ( $entry as $k => $v) {
			if ( \is_array( $v ) ) {
				if ( count( $v ) > 0 ) {
					$coarse_last[$k] = end( $v );
				}
			} else {
				$coarse_last[$k] = $v;
			}
		}
	}
	
	$coarse_first	= [];
	foreach ( $parsed as $entry ) {
		foreach ( $entry as $k => $v) {
			if ( !isset( $coarse_first[$k] ) ) {
				$coarse_first[$k] = 
				\is_array( $v ) ? current( $v ) : $v;
			}
		}
	}
	
	$data		= [
		'detail'	=> $parsed,
		'coarse_first'	=> $coarse_first,
		'coarse_last'	=> $coarse_last,
		'summary'	=> \array_merge_recursive( ...$parsed )
	];
	return $data;
}

/**
 *  Forwarded summary helper
 *  
 *  @return array
 */
function request_forwarded() : array {
	static $all;
	$all ??= request_canonical_forwarded()['all'] ?? [];
	
	return $all;
}

/**
 *  Current request host
 *  
 *  @param string	$sent	Checked host key
 *  @return string
 */
function request_host( ?string $sent = null ) : string {
	static $cache	= [];
	$sent		??= 'default';
	
	if ( isset( $cache[$sent] ) ) { return $cache[$sent]; }
	
	if ( 'default' !== $sent ) {
		return $cache[$sent]	= sanitize_host( $sent );
	}
	
	$fwd	= request_forwarded();
	if ( isset( $fwd['host'] ) && '' !== $fwd['host'] ) {
		$host		= 
		\is_array( $fwd['host'] ) 
			? $fwd['host'][0] 
			: $fwd['host'];
		
		$cache[$sent]	= sanitize_host( $host );
		return $cache[$sent];
	}
	
	$cache[$sent]	= 
	match( true ) {
		( !empty( $_SERVER['HTTP_HOST'] ) )
			=> sanitize_host( $_SERVER['HTTP_HOST'] ),
		( !empty( $_SERVER['SERVER_NAME'] ) )
			=> sanitize_host( $_SERVER['SERVER_NAME'] ),
		( !empty( $_SERVER['SERVER_ADDR'] ) )
			=> sanitize_host( $_SERVER['SERVER_ADDR'] ),
		default	=> ''
	};
	
	return $cache[$sent];
}

/**
 *  Get client IP address from forwarded data
 *  
 *  @return array
 */
function request_canonical_ip() : array {
	static $data;
	if ( isset( $data ) ) { return $data; }
	
	$fwd	= request_canonical_forwarded();
	$raw	= $fwd['coarse_last']['for'] ?? '';
	
	// Prefer last 'for' value from Forwarded header
	if ( !empty( $raw ) ) {
		if ( \preg_match( '/^\[?([a-fA-F0-9:.]+)\]?(:\d+)?$/', $raw, $match ) ) {
			$ip	= $match[1];
		} elseif ( 'unknown' === \strtolower( $raw ) ) {
			$ip = 'unknown';
		} else {
			$ip	= $raw;
		}
		$data	= [
			'ip'		=> $ip,
			'source'	=> 'forwarded'
		];
		return $data;
	}
	
	// Fallback to REMOTE_ADDR
	$data	= [
		'ip'		=> $_SERVER['REMOTE_ADDR'] ?? 'unknown',
		'source'	=> 'remote_addr'
	];
	return $data;
}

/**
 *  Get IP address (best guess)
 *  
 *  @param bool		$skip	Skip private range checking
 *  @return string
 */
function request_ip( bool $skip = false ) : string {
	static $ip;
	static $ip_unf;
	
	if ( $skip && isset( $ip_unf ) ) { return $ip_unf; }
	if ( !$skip && isset( $ip ) ) { return $ip; }
	
	$info		= request_client_ip();
	$candidate	= $info['ip'] ?? '';
	
	$ip_unf		= \filter_var( $candidate, \FILTER_VALIDATE_IP ) ?: '';
	$ip		= 
	\filter_var(
		$candidate,
		\FILTER_VALIDATE_IP,
		\FILTER_FLAG_NO_PRIV_RANGE | \FILTER_FLAG_NO_RES_RANGE
        ) ?: '';
	
	return $skip ? $ip_unf : $ip;
}

/**
 *  Get full request URI
 *  
 *  @return string
 */
function request_uri( ?string $sent = null ) : string {
	static $uri	= [];
	$sent		??= 'default';
	
	if ( isset( $uri[$sent] ) ) { return $uri[$sent]; }
	
	$raw		= 
	$sent	=== 'default' 
		? ( $_SERVER['REQUEST_URI'] ?? '' )
		: $sent;
	
	$uri[$sent]	= sanitize_uri( $raw ) ?? '';
	return $uri[$sent];
}

/**
 *  Get current request path
 *  
 *  @return string
 */
function request_path() : string {
	static $path;
	$path ??= '/' . \ltrim( request_uri(), '/' );
	
	return $path;
}

/**
 *  Select between 'https' and 'http' for current request
 *  
 *  @return string
 */
function request_scheme() : string {
	static $scheme;
	$scheme ??= ( request_is_tls() ? 'https' : 'http' );
	
	return $scheme;
}

/**
 *  Currently requested web realm
 *  
 *  @return string
 */
function request_origin() : string {
	static $web;
	if ( isset( $web ) ) { return $web; }
	
	$web	= request_scheme() . '://' . request_host();
	$port	= $_SERVER['SERVER_PORT'] ?? null;
	
	if ( $port && !\in_array( $port, [ 80, 443 ] ) ) {
		$web .= ':' . $port;
	}
	return $web;
}

/**
 *  Browser User Agent
 *  
 *  @return string
 */
function request_ua() : string {
	static $ua;
	$ua ??= \trim( $_SERVER['HTTP_USER_AGENT'] ?? '' );
	
	return $ua;
}

/**
 *  Get unparsed request query
 */
function request_query() : string {
	string $qs;
	$qs	??= sanitize_query( false ) ?? '';
	
	return $qs;
	
}

/**
 *  Complete request including host, path, and query
 *  
 *  @return string
 */
function request_url() : string {
	$uri	= \ltrim( request_get_uri(), '/' );
	$query	= sanitize_query( true, true ) ?? '';
	$query	= 
	\is_array( $query )
		? util_array_to_query( $query ) 
		: ( string ) $query;
	
	return request_origin() . '/' . $uri .  ( '' === $query ? '' : "?{$query}" );
}

/**
 *  Check for current ETag in request
 *  
 *  @return string
 */
function request_none_match() : string {
	static $etag;

	$etag ??= $_SERVER['HTTP_IF_NONE_MATCH'] ?? '';
	return $etag;
}

/**
 *  Check If-None-Match header against given ETag
 *  
 *  @return true if header not set or if ETag doesn't match
 */
function request_modified( string $etag ) : bool {
	$check	= request_none_match();
	if ( empty( $check ) ) { return true; }
	
	return ( 0 !== \strcmp( $etag, $check ) );
}

/**
 *  Time since request modified
 *  
 *  @return mixed
 */
function request_modified_since() : ?int {
	static $init	= false;
	static $since	= null;
	
	if ( $init ) { return $since; }
	$init		= true;
	
	$header	= $_SERVER['HTTP_IF_MODIFIED_SINCE'] ?? null;
	if ( !$header ) { return null; }
	
	$since	= \strtotime( $header ) ?: null;
	return $since;
}

/**
 *  Accept-* Header field sorter
 *  
 *  @param string	$header	Server header label
 *  @return array
 */
function request_accept_header( string $header ) : array {
	$accept	= trim( $_SERVER[$header] ?? '' );
	if ( $accept === '' ) { return []; }
	
	$parsed = [];
	foreach ( explode( ',', $accept ) as $part ) {
		[ $term, $params ] = 
		\array_pad( explode( ';', \trim( $part ), 2 ), 2, '' );
		
		if ( '' === $term ) { continue; }
		
		$quality	= 1.0;
		if ( \preg_match('/q=([0-9.]+)/i', $params, $match ) ) {
			$quality = ( float ) $match[1];
		}
		
		$parsed[]	= [ 'term' => $term, 'q' => $quality ];
	}
	
	usort( $parsed, fn( $a, $b ) => $b['q'] <=> $a['q'] );
	
	return \array_column( $parsed, 'term' );
}

/**
 *  Visitor's preferred languages based on Accept-Language header
 *  
 *  @return array
 */
function request_lang() : array {
	static $cache;
	if ( isset( $cache ) ) { return $cache; }
	
	$terms	= request_accept_header( 'HTTP_ACCEPT_LANGUAGE' );
	if ( empty( $terms ) ) {
		return $cache = [];
	}

	$result	= [];
	foreach ( $terms as $term ) {
		if ( \preg_match( 
			'/^([a-z]{2,8})(?:-([a-z0-9]{2,8}))?$/i', $term, $m 
		) ) {
			$result[] = [
				'lang'		=> \strtolower( $m[1] ),
				'locale'	=> 
				isset( $m[2] ) 
					? \strtoupper( $m[2] ) 
					: ''
			];
		}
	}
	
	return $cache = $result;
}

/**
 *  Small helper to check if this is a ranged request
 *  
 *  @return Return description
 *  
 *  @details More details
 */
function request_is_ranged() : bool {
	$range	= \trim( $_SERVER['HTTP_RANGE'] ?? '' );
	return $range !== '';
}

/**
 *  Validate and process requested ranges for a given file size
 *  
 *  @param int $fsize Requested file size in bytes
 *  @return array
 */
function request_range_header( int $fsize ) : array {
	$range	= \trim( $_SERVER['HTTP_RANGE'] ?? '' );
	if ( empty( $range ) ) { return []; }
	
	$ranges	= [];
	if ( !\preg_match( '/^bytes=/', $range ) ) { return $ranges; }
	
	[ $prefix, $value ] = 
	\array_map( 'trim', \explode( '=', $range, 2 ) + [ '', '' ] );
	
	foreach ( \explode( ',', $value ) as $segment ) {
		$segment = trim( $segment );
		if ( empty( $segment ) ) { continue; }
		
		[ $start, $end ] = 
		\array_map( 'trim', \explode( '-', $segment, 2 ) + [ '', '' ] );
		
		// Handle open-ended ranges
		if ( $start === '' && \ctype_digit( $end ) ) {
			$suffix	= min( $fsize, ( int ) $end );
			$start	= $fsize - $suffix;
			$end	= $fsize - 1;
		} else {
			$start	= $start === '' ? 0 : $start;
			$end	= $end === '' ? $fsize - 1 : $end;
		}
		
		if ( 
			!\ctype_digit( ( string ) $start ) || 
			!\ctype_digit( ( string ) $end ) 
		) { continue; }
		
		$start		= ( int ) $start;
		$end		= ( int ) $end;
		
		// Validate and normalize
		if ( $start > $end || $start >= $fsize ) { continue; }
		
		$end		= \min( $end, $fsize - 1 );
		$ranges[]	= [ $start, $end ];
	}
	
	return util_merge_ranges( $ranges );
}


/**
 *  Response and output handling
 */

/**
 *  Helper to generate header with protocol and message
 *  
 *  @param int		$code		HTTP Status code
 */
function response_status( int $code ) : void {
	static $green	= [
		200, 201, 202, 204, 205, 206, 
		300, 301, 302, 303, 304,
		400, 401, 403, 404, 405, 406, 407, 409, 410, 411, 412, 
			413, 414, 415,
		500, 501
	];
	
	static	$custom	= [
		416	=> 'Range Not Satisfiable',
		422	=> 'Unprocessable Entity',
		425	=> 'Too Early',
		429	=> 'Too Many Requests',
		431	=> 'Request Header Fields Too Large',
		503	=> 'Service Unavailable',
	];
	
	if ( \headers_sent() ) { return; }
	
	if ( \in_array( $code, $green, true ) ) {
		\http_response_code( $code );
		if ( $code == 405 ) {
			\header( 'Allow: OPTIONS, GET, HEAD, POST' );
		}
		return;
	
	} 
	
	// Special cases
	if ( isset( $custom[$code] ) ) {
		$prot	= request_protocol();
		$msg	= $custom[$code];
		\header( "$prot $code $msg" );
		return;
	}
	
	throw new 
	\InvalidArgumentException( "Code {$code} unsupported" );
}

/**
 *  Set ignore user abort for large output streams
 */
function response_ignore_user_abort() : void {
	static $ignore	= false;
	if ( $ignore ) { return; }
	
	if ( !\ignore_user_abort() ) {
		\ignore_user_abort( true );
	}		
	$ignore		= true;
}

/**
 *  Putput response header helper
 *  
 *  @param array	$headers	Set headers
 *  @param bool		$ct_sent	Flag true if output is set via 'Content-Type'
 *  @param bool		$lo_sent	Flag true if 'Location' is set
 */
function response_headers( array $headers, &$ct_sent, &$lo_sent ) : void {
	foreach ( $headers as $key => $value ) {
		if ( 0 === \strcasecmp( $key, 'content-type' ) ) {
			$ct_sent = true;
		}
		if ( 0 === \strcasecmp( $key, 'location' ) ) {
			$lo_sent = true;
		}
		
		$key	= \str_replace( ["\r", "\n"], '', $key );
		$value	= \str_replace( ["\r", "\n"], '', $value );
		\header( "{$key}: {$value}" );
	}
}

/**
 *  XML-RPC response-specific header list
 *  
 *  @param string	$origin		Request origin realm
 *  @return array
 */
function response_xmlrpc_headers( ?string $origin = null ) : array {
	$origin ??= request_origin();
	
	return [
		'Access-Control-Allow-Origin'      => $origin,
		'Access-Control-Allow-Methods'     => 'POST',
		'Access-Control-Allow-Headers'     => 
		'Content-Type, Authorization, X-Requested-With',
		
		'Access-Control-Allow-Credentials' => 'true',
		'Content-Security-Policy'          => 
		"default-src 'self'; frame-ancestors 'none';",
		
		'X-Frame-Options'                  => 'DENY',
		'X-Content-Type-Options'           => 'nosniff',
		'Referrer-Policy'                  => 'same-origin',
		'Strict-Transport-Security'        => 
		'max-age=31536000; includeSubDomains; preload'
	];
}

/**
 *  Header sending helper
 */
function response_send_headers(
	array	$headers, 
		&$ct_sent	= false, 
		&$lo_sent	= false 
) : void {
	response_headers( $headers, $ct_sent, $lo_sent );
}

/**
 *  Create a file etag
 *  
 *  @param int		$size	File size in bytes
 *  @param int		$mtime	Last modified date in seconds
 *  @return string
 */
function response_generate_etag( int $size, int $mtime ) : string {
	$raw = \hash( 'sha256', $size . '-' . $mtime );
	return "\"{$raw}\"";
}

/**
 *  Generate string content etag header
 *  
 *  @param stirng	$content	Client output content
 *  @param bool		$wetag		Set weak etag if true
 */
function response_content_etag( string $content, bool $wetag = true ) : void {
	$prefix	= $wetag ? 'W/' : '';
	$tag	= \hash( 'sha256', $content );
	\header( "ETag: {$prefix}\"{$tag}\"", true );
}

/**
 *  Check sent etag data against current file information for staleness
 *  
 *  @param string	$etag		Current file etag
 *  @param int		$mtime		File last modified time in seconds
 *  @param string	$client_etag	Client sent etag(s)
 *  @param int		$client_mtime	File last modified time sent by client
 *  @return bool
 */
function response_check_not_modified(
	string		$etag,
	int		$mtime,
	?string		$client_etag	= null,
	?int		$client_mtime	= null
) : bool {
	$clean	= trim( $etag, "\"" );
	
	if( $client_etag ) {
		$tags	= 
		\array_map(
			function ( $tag ) {
				$tag	= trim( $tag, " \t\n\r\0\x0B\"" );
				if ( \str_starts_with( $tag, 'W/' ) ) {
					$tag	= \substr( $tag, 2 );
				}
				return $tag;
			}, 
			\explode( ',', $client_etag ) 
		);
		
		if ( \in_array( $clean, $tags, true ) ) {
			response_status(304);
			return true;
		}
		if ( 1 === count( $tags ) && '*' === $tags[0] ) {
			response_status( 304 );
			return true;
		}
		
		// Didn't match If-None-Match
		return false;
	}
	
	// Try If-Modified-Since
	if ( $client_mtime && $mtime <= $client_mtime ) {
		response_status( 304 );
		return true;
	}
	return false;
}

/**
 *  Static file metadata cache path
 *  
 *  @param string	$fpath File location on disk
 *  @return string
 */
function response_meta_cache_path( string $fpath ) : string {
	static $tmp;
	
	$tmp	??= storage_base() . "/tmp/";
	if ( !\is_dir( $tmp ) && !\mkdir( $tmp, 0777, true ) ) {
		throw new 
		\RuntimeException( "Failed to create cache directory: {$tmp}" );
	}
	
	$hash	= \hash( 'sha256', $fpath );
	return "{$tmp}/meta_{$hash}.cache.tmp";
}

/**
 *  Get any cached metadata for a given file path
 *  
 *  @param string	$fpath	Location of file on disk
 *  @return mixed
 */
function response_get_meta_cache( string $fpath ) : array|null {
	$fcache	= response_meta_cache_path( $fpath );
	if ( !\is_readable( $fcache ) ) { return null; }
	
	if ( !isset( $meta['mtime'], $meta['content_length'] ) ) {
		return null;
	}
	
	try {
		$data		= \file_get_contents( $fcache );
		if ( false === $data ) { return null; }
		
		$meta		= 
		\json_decode( 
			$data, true, 2, 
				\JSON_UNESCAPED_SLASHES | 
				\JSON_INVALID_UTF8_IGNORE |
				\JSON_THROW_ON_ERROR 
		);
		
		if ( !\is_array( $meta ) ) { return null; }
		
		$curr_mtime	= response_filemtime( $fpath );
		$curr_size	= response_file_size( $fpath );
		
	} catch ( \Throwable $e ) {
		\error_log( "Meta cache error: " . $e->getMessage() );
		return null;
	}
	
	if ( 
		$meta['mtime']		=== $curr_mtime && 
		$meta['content_length']	=== $curr_size
	) {
		return $meta;
	}
	return null;
}

/**
 *  Cache static file metadata
 *  
 *  @param string	$fpath	Location on disk
 *  @param array	$meta	File metadata
 */
function response_save_meta_cache( string $fpath, array $meta ) : void {
	$fcache	= response_meta_cache_path( $fpath );
	$tmp	= $fcache . '.' . \bin2hex( \random_bytes( 4 ) );
	
	try {
		$data	= 
		\json_encode( $meta, 
			\JSON_UNESCAPED_SLASHES | 
			\JSON_UNESCAPED_UNICODE | 
			\JSON_THROW_ON_ERROR 
		);
		
		if ( false === \file_put_contents( $tmp, $json, \LOCK_EX ) ) {
			throw new 
			\RuntimeException( "Failed to write temp cache file" );
		}
		if ( !\rename( $tmp, $fcache ) ) {
			throw new 
			\RuntimeException("Failed to replace cache file");
		}
	} catch ( \Throwable $e ) {
		\error_log( "Meta cache error: " . $e->getMessage() );
	}
}

/**
 *  Generate static file metadata
 *  
 *  @param string	$path	Location on disk
 *  @return array
 */
function response_file_metadata( string $path ) : array {
	static $cache = [];
	$fpath	= \realpath( $path ) ?: $path;
	
	// Local cache?
	if ( isset( $cache[$fpath] ) ) {
		return $cache[$fpath];
	}
	
	// File cache?
	$fcache	= response_get_meta_cache( $fpath );
	if ( \is_array( $fcache ) ) {
		$cache[$fpath]	= $fcache;
		return $fcache;
	}
	
	if ( !\is_file( $fpath ) ) {
		throw new 
		\RuntimeException( "File to be cached not found");
	}
	
	$fsize	= storage_filesize( $fpath );
	$mtime	= storage_filemtime( $fpath );
	$mime	= @\mime_content_type( $fpath ) ?: 'application/octet-stream';
	
	$etag	= response_generate_etag( $etag, $mtime );
	$lmod	= \gmdate( 'D, d M Y H:i:s', $mtime ) . ' GMT';
	
	$meta	= [
		'etag'           => "\"{$etag}\"",
		'last_modified'  => $lmod,
		'content_type'   => $mime,
		'content_length' => $fsize,
		'mtime'          => $mtime
	];
	
	response_save_meta_cache( $fpath, $meta );
	$cache[$fpath] = $meta;
	return $meta;
}

/**
 *  Generate file response headers
 *  
 *  @param string	$fpath		Location on disk
 *  @param bool		$wetag		Create weak prefix for etag
 *  @param bool		$size		Include file size
 *  @param bool		$stype		Include sending 'Content-Type'
 *  @return array
 */
function response_file_headers( 
	string	$fpath, 
	bool	$wetag	= false, 
	bool	$size	= true,
	bool	$stype	= true
) : array {
	$meta		= response_file_metadata( $fpath );
	$prefix		= $wetag ? 'W/' : '';
	$headers	= [
		"ETag"		=> "{$prefix}{$meta['etag']}",
		"Last-Modified"	=> $meta['last_modified']
	];
	
	if ( $size ) {
		$headers["Content-Length"]	= $meta['content_length'];
	}
	if ( $stype ) {
		$headers["Content-Type"]	= $meta['content_type'];
	}
	
	return $headers;
}

/**
 *  Direct stream or otherwise output file
 *  
 *  @param array	$meta		File metadata
 *  @param resource	$handle		Opened file resource
 *  @param string	$fpath		Location on disk
 *  @param bool		$download	Force download if true
 */
function response_file_stream( 
	array	$meta, 
		&$handle, 
	string	$fpath, 
	bool	$download	= false 
) : void {
	$headers	= [ "Accept-Ranges" => "bytes" ];
	
	if ( $download ) {
		$headers["Content-Disposition"] = 
		"attachment; filename=\"" . \basename( $fpath ) . "\"";
	}
	
	$headers	= 
	\array_merge( 
		$headers, 
		response_file_headers( $fpath, false, true, true ) 
	);
	
	response_status( 200 );
	response_send_headers( $headers );
	if ( $meta['content_length'] <= 65536 ) {
		\readfile( $handle );
	} else {
		while ( !\feof( $handle ) ) {
			if ( \connection_aborted() ) { break; }
			
			echo \fread( $handle, 8192 );
			\flush();
		}
	}
}

/**
 *  Output requested range stream
 *  
 *  @param array	$meta		File metadata
 *  @param resource	$handle		Opened file resource
 *  @param string	$fpath		Location on disk
 *  @param array	$ranges		List of streaming ranges in [ start, end ] format
 */
function response_file_range( 
	array	$meta, 
		&$handle, 
	string	$fpath, 
	array	$ranges 
) : void {
	$boundary	= \bin2hex( \random_bytes( 6 ) );	
	$headers	= 
	\array_merge( [
		"Content-Type"	=> "multipart/byteranges; boundary={$boundary}",
		"Accept-Ranges"	=> "bytes"
	], response_file_headers( $fpath, true, false, false ) );
	
	response_status( 206 );
	response_send_headers( $headers );
	
	foreach ( $ranges as [ $start, $end ] ) {
		
		if ( \connection_aborted() ) { break; }
		
		$start	= \max( 0, $start );
		$end	= \min( $meta['content_length'] - 1, $end );
		if ( $start > $end || $start >= $meta['content_length'] ) {
			continue;
		}
		
		$length	= $end - $start + 1;
		$chunk	= $length;
		
		echo "--{$boundary}\r\n";
		echo "Content-Type: {$meta['content_type']}\r\n";
		echo "Content-Length: {$length}\r\n";
		echo "Content-Range: bytes {$start}-{$end}/{$meta['content_length']}\r\n\r\n";
		
		\fseek( $handle, $start );
		while( $chunk > 0 && !\feof( $handle ) ) {
			if ( \connection_aborted() ) {
				break;
			}
			
			$rsize	= \min( 8192, $chunk );
			echo \fread( $handle, $rsize );
			\flush();
			
			$chunk	-= $rsize;
		}
		echo "\r\n";
	}
	
	echo "--{$boundary}--\r\n";
}

/**
 *  Main file response output
 *  
 *  @param string	$fpath		Location on disk
 *  @param bool		$download	Force download if true
 *  @param string	$client_etag	Client sent etag(s)
 *  @param int		$client_mtime	File last modified time sent by client
 *  @param array	$ranges		Requested ranges
 */
function response_file(
	string	$fpath, 
	bool	$download	= false, 
	?string	$client_etag	= null,
	?int	$client_mtime	= null,
	?array	$ranges		= null
) : void {
	response_end_buffers();
	response_ignore_user_abort();
	
	$meta		= response_file_metadata( $fpath );
	$etag		= $meta['etag'];
	$mtime		= $meta['mtime'];
	$handle		= null;
	if ( response_check_not_modified( 
		$etag, $mtime, $client_etag, $client_mtime 
	) ) {
		exit;
	}
	
	try {
		$handle = response_file_open( $fpath );
		if ( $ranges ) {
			response_file_range( $meta, $handle, $fpath, $ranges );
		} else {
			response_file_stream( $meta, $handle, $fpath, $download );
		}
	} catch( \Throwable $e ) {
		\error_log( "File response error: " . $e->getMessage() );
		response_status( 500 );
		echo "File response error";
	} finally {
		if ( \is_resource( $handle ) ) { \fclose( $handle ); }
	}
	exit;
}

/**
 *  Response output content type header helper
 *  
 *  @param string	$body		Output content
 *  @param string	$ct_sent	Send 'Content-Type' if false
 */
function response_body( mixed $body, bool $ct_sent ) : void {
	if ( null === $body ) { return; }
	
	$is_json	= ( \is_array( $body ) || \is_object( $body ) );
	$is_html	= !$is_json && \preg_match( '/<[^>]+>/', ( string ) $body );
	
	if ( !$ct_sent ) {
		\header( match( true ) {
			$is_json	=> 'Content-Type: application/json; charset=utf-8',
			$is_html	=> 'Content-Type: text/html; charset=utf-8',
			default		=> 'Content-Type: text/plain; charset=utf-8'
		}, true );
	}
	
	echo match( true ) {
		$is_json	=> 
		\json_encode( $body, 
			\JSON_UNESCAPED_UNICODE | \JSON_UNESCAPED_SLASHES
		),
		default		=> $body
	};
}

/**
 *  Main content response handler
 *  
 *  @param int		$code	HTTP status code
 *  @param mixed	$body	Content body
 */
function response( int $code, array $headers = [], $body = null ) : void {
	if ( $code < 100 || $code > 599 ) {
		throw new 
		InvalidArgumentException( "Invalid HTTP status code: {$code}" );
	}
	
	$ct_sent	= false;
	$lo_sent	= false;
	$is_redir	= ( $code >= 300 && $code < 400 );
	
	response_status( $code );
	response_headers( $headers, $ct_sent, $lo_sent );
	response_body( $body, $ct_sent );
	
	if ( $is_redir && $lo_sent ) { exit; }
}

function response_html( string $html, int $status = 200, array $headers = [] ) : void {
	$headers['Content-Type'] ??= 'text/html; charset=UTF-8';
	response( $status, $headers, $html );
	exit;
}

function response_json( array $data, int $status = 200, array $headers = [] ) : void {
	$headers['Content-Type'] ??= 'application/json; charset=UTF-8';
	response( $status, $headers, $data );
	exit;
}

function response_text( string $text, int $status = 200, array $headers = []) : void {
	$headers['Content-Type'] ??= 'text/plain; charset=UTF-8';
	response( $status, $headers, $text );
	exit;
}

/**
 *  OPTIONS header response helper
 */
function response_options( array $headers = [] ) : void {
	$method	= request_method();
	if ( 0 === \strcasecmp( 'options', $method ) ) {
		response( 204, $headers );
		exit;
	}
}

/**
 *  XML Output response helper
 *  
 *  @param string	$xml	Raw XML content
 *  @param int		$status	HTTP status code
 */
function response_xml( 
	string	$xml, 
	int	$status		= 200,
	string	$type		= 'application/xml', 
	array	$headers	= []
) : void {
	$headers = \array_replace_recursive( $headers, response_xmlrpc_headers() );
	$headers['Content-Type'] ??= "{$type}; charset=UTF-8";
	
	// Handle CORS preflight request E.G. XML-RPC request
	response_options( $headers );
	
	response( $status, $headers, $xml );
	exit;
}


/**
 *  Configuration settings and options
 */

/**
 *  Core file location builder
 *  
 *  @param string	$constant	Defined constant path
 *  @param string	$name		File name
 *  @param bool		$is_dir		Constant is a directory location, if true
 *  @return string
 */
function config_core_path( string $constant, string $name, bool $is_dir = false ) : string {
	$path	= 
	defined( $constant ) 
		? constant( $constant ) 
		: storage_base() . $name;
	
	return $is_dir 
		? \rtrim( $path, '\\/' ) . \DIRECTORY_SEPARATOR 
		: $path;
}

/**
 *  Main configuration file location
 *  
 *  @return string
 */
function config_file() : string {
	static $conf_file;
	$conf_file	??= config_core_path( 'CONFIG_FILE', 'config.json' );
	
	return $conf_file;
}

/**
 *  Config related log file location
 *  
 *  @return string
 */
function config_message_file() : string {
	static $mssage_log;
	$message_log	??= config_core_path( 'CONFIG_LOG', 'config_messages.log' );
	
	return $message_log;
}

/**
 *  Check storage location sub-path
 *  
 *  @param string	$path	Storage location checker
 *  @return bool		True if valid location within CONFIG_DIR
 */
function config_store_valid( string $path ) : bool {
	static $root;
	$root	??= \realpath( storage_base() );
	$path	= \realpath( $path );
	
	return ( false !== $path ) && ( 0 === \strpos( $path, $root ) );
}

/**
 *  Global info writer
 *  
 *  @param string	$msg		Main content body
 *  @param string	$label		Optional tag
 *  @param string	$msg_file	Description for $msg_file
 *  @return void
 */
function config_message( 
	string	$msg, 
	string	$label		= 'INFO', 
	?string	$msg_file	= null
) : void {
	log_msg( $msg, $label, config_message_file() );
}

/**
 *  Expand defined constants into configuration scope
 *  
 *  @param array	$config		Loaded configuration
 *  @param bool		$reparse	Reload configuration settings, if true
 *  @return array
 */
function config_expand_constants( array $config, bool $reparse = false ) : array {
	static $constants;
	
	if ( !isset( $constants ) || $reparse ) {
		$constants	??= [];
		$temp		= \get_defined_constants( true )['user'] ?? [];
		if ( empty( $temp ) ) { return $constants; };
		
		foreach ( $temp as $key => $value ) {
			$nkey = '{{' . $key . '}}';
			$constants[$nkey] = $value;
		}
	}
	
	\array_walk_recursive( $config, function( &$value ) use ( $constants ) {
		if ( !\is_string( $value ) ) { return; }
		$value = 
		\str_replace( 
			\array_keys( $constants ), 
			\array_values( $constants ), 
			$value
		);
	} );
	
	return $config;
}

/**
 *  Load configuration JSON file
 *  
 *  @param string	$file	Location on disk
 *  @return array
 */
function config_load_json( string $file ) : array {
	if ( !\is_readable( $file ) ) {
		config_message( "Config file is not readable: {$file}", 'ERROR' );
		
		throw new 
		\RuntimeException( "Config file is not readable." );
	}
	
	$raw	= \file_get_contents( $file );
	if ( false === $raw ) {
		config_message( "Unable to read config file: {$file}", 'ERROR' );
		
		throw new 
		\RuntimeException( "Unable to read config file." );
	}
	
	if ( !\json_validate( $raw ) ) { // Since PHP 8.3
		config_message( "Invalid JSON found in config file: {$file}", 'ERROR' );
		
		throw new 
		\RuntimeException( "Invalid JSON format" );
	}
	
	$config = \json_decode( $raw, true );
	if ( \json_last_error() !== \JSON_ERROR_NONE ) {
		config_message( 
			"Invalid JSON found in config file: {$file} - " . 
				"JSON decode error [Code " . \json_last_error() . "]: " . 
				\json_last_error_msg(), 
			'ERROR' 
		);
		
		throw new 
		\RuntimeException( "Invalid JSON in config file" );
	}
	
	return $config;
}

/**
 *  Generate backup config file name
 *  
 *  @return string
 */
function config_backup_name() : string {
	return storage_backup_path( config_file() );
}

/**
 *  Create a configuration backup file
 *  
 *  @return bool		True on success
 */
function config_backup() : bool {
	$bkp	= config_backup_name();
	
	if ( !copy( config_file(), $bkp ) ) {
		config_message( "Config backup failed: {$bkp}", 'ERROR' );
		
		throw new 
		\RuntimeException( "Config backup failed" );
	}
	
	return true;
}

/**
 *  Write parsed configuration settings to config file
 *  
 *  @param string	$json		JSON formatted configuration settings
 *  @return bool			True on success
 */
function config_write( string $json ) : bool {
	return storage_write_file( config_file(), $json );
}

/**
 *  Processed configuration settings
 *  
 *  @param array	$new_settings	Optional new settings to merge with existing ones
 *  @return array
 */
function config_parsed( ?array $new_settings = null ) : array {
	static $settings	= [];
	static $reg		= false;
	
	// Skip first load
	if ( !$reg ) {
		$reg = true;
		if ( empty( $settings ) ) {
			$settings = 
			config_expand_constants( 
				config_load_json( config_file() ), true
			);
		}
		
		// Save changes at shutdown
		\register_shutdown_function( function() {
			config_backup();
			config_save( null, $_SERVER['REMOTE_USER'] ?? 'system' );
		} );
	}
	
	
	if ( null === $new_settings ) {
		return $settings;
	}
	
	$settings	= \array_replace_recursive( $settings, $new_settings );
	$settings	= config_expand_constants( $settings );
	
	return $settings;
}

/**
 *  Save parsed or preloaded configuation settings
 *  
 *  @param array	$settings	Optional new settings
 *  @param string	$modified_by	Modification source, defaults to 'system'
 *  @return bool			True on success
 */
function config_save( ?array $settings = null, string $modified_by = 'system' ) : bool {
	$settings		??= config_parsed();
	$settings['_meta']	= [
		'last_saved'	=> date( 'c' ),
		'modified_by'	=> $modified_by
	];
	
	$json	= 
	\json_encode( $settings, \JSON_PRETTY_PRINT | \JSON_UNESCAPED_SLASHES );
	
	if ( false === $json ) {
		config_message( 
			"Invalid JSON format [Code " . 
				\json_last_error() . "]: " . 
				\json_last_error_msg(), 
			'ERROR' 
		);
		
		throw new 
		\RuntimeException( "Invalid JSON format for settings" );
	}
	
	return config_write( $json );
}

/**
 *  Helper to change a single configuration setting in the root config
 *  
 *  @param string	$key	Main configuration key
 *  @param bool		$value	New replaement 
 */
function config_edit( string $key, mixed $value ) : void {
	config_parsed( [ $key => $value ] );
}

/**
 *  Config merging helper for overriding defaults with realm-specific settings
 *  
 *  @return array
 */
function config_realm() : array {
	$config	= config_parsed();
	if ( 
		!\is_array( $config['defaults'] ?? null ) ||	// Global settings
		!\is_array( $config['realms'] ?? null )		// Per-domain settings
	) {
		config_message( 
			"Invalid configuration file structure: " . $conf, 
			'ERROR' 
		);
		
		throw new 
		\RuntimeException( "Invalid config structure." );
	}
	
	// Detect current host
	$host	= \strtolower( request_host() );
	$realm	= [];
	
	// Match realm first
	foreach ( $config['realms'] ?? [] as $r ) {
		if ( !\is_array( $r ) ) { continue; }
		if (
			$r['domain'] === $host	|| 
			\in_array( $host, $r['alias'] ?? [], true ) 
		) {
			$realm = $r;
			break;
		}
	}
	
	$merged = \array_merge( $config['defaults'] ?? [], $realm ?? [] );
	return $merged;
}

/**
 *  Config value array filter application helper
 *  
 *  @param array	$lines		Extracted configuration lines
 *  @param bool		$un		Unique values, if true
 *  @param callable	$filter		Optional callable
 *  @return array
 */
function config_lines( array $lines, bool $un = false, $filter = null ) : array {
	if ( $un ) { $lines	= \array_unique( $lines ); }
	
	return ( !empty( $filter ) && \is_callable( $filter ) )
		? \array_map( $filter, $lines ) 
		: $lines;
}

/**
 *  Config definition content-type filtering
 *  
 *  @param mixed	$value		Base configuration value
 *  @param string	$type		Format data type
 *  @param mixed	$filter		Optional filter
 *  @param 
 */
function config_value_format( mixed $value, string $type, $filter = null ) : mixed {
	if ( \is_array( $value ) ) {
		return config_lines( $value, false, $filter );
	}
	
	return match( \strtolower( $type ) ) {
		'int', 'integer'	=> sanitize_int( ( string ) $value ),
		'bool', 'boolean'	=> sanitize_bool( ( string ) $value ),
		'lines'			=> ( function() use ( $value, $filter ) {
			$lines	= 
			\preg_split( 
				'/\s*\R\s*/', 
				trim( ( string ) $value ), 
				-1, 
				\PREG_SPLIT_NO_EMPTY 
			);
			
			return config_lines( $lines, true, $filter );
		} )(),
		
		'json'			=> util_json_decode( ( string ) $value ),
		default			=> sanitize_text( $value )
	};
}

/**
 *  Get stored configuration settings or get default
 *  
 *  @param string	$name		Configuration setting name
 *  @param mixed	$default	If not set, fallback value
 *  @param string	$type		String, integer, json, or boolean
 *  @param string	$filter		Optional parse function
 *  @return mixed
 */
function config( 
	?string		$key		= null, 
			$default	= null, 
	string		$type		= 'string',
	string		$filter		= '' 
) : mixed {
	static $merged	= null;
	
	$merged ??= config_realm();
	
	// Fallback to defaults or send full config on empty key
	
	if ( null === $key ) { return $merged; }
	
	$value	= $merged[$key] ?? $default;
	return empty( $filter ) 
		? $value 
		: config_value_format( $value, $type, $filter );
}

/**
 *  Database configuration profile
 *  
 *  @param string $profile Database name
 *  @param array $updates Override configuration presets
 */
function config_edit_db_profile( string $profile, array $updates ) : void {
	$profiles = config( 'db_profiles' ) ?? [];
	if ( !isset( $profiles[$profile] ) ) {
		config_message(
			"New database profile {$profile} created",
			'INFO'
		);
	} else {
		config_message(
			"Database profile {$profile} edited",
			'INFO'
		);
	}
	
	$profiles[$profile] = 
	\array_replace_recursive( $profiles[$profile] ?? [], $updates );
	
	config_parsed( [ 'db_profiles' => $profiles ] );
}

/**
 *  @deprecated
 */
function setting( string $name, $default, string $type, string $filter = '' ) {
	return config( $name, $default, $type, $filter );
}


/**
 *  Plugins and modules
 */

/**
 *  Main plugin attribute
 */
#[Attribute( Attribute::TARGET_FUNCTION | Attribute::IS_REPEATABLE )]
class Plugin {
	
	/**
	 *  Main constructor
	 *  
	 *  @param string	$name		Unique plugin name
	 *  @param string	$description	Brief plugin description
	 *  @param int		$priority	Initialization order, higher = earlier
	 *  @param stirng	$asset_dir	Files being served to the client
	 *  @param string	$data_dir	Writable storage directory
	 */
	public function __construct(
		public readonly string	$name,
		public readonly string	$description	= '',
		public int		$priority	= 0,
		public readonly string	$asset_dir	= __DIR__ . '/assets/',
		public readonly string	$data_dir	= PLUGIN_DATA
	) {}
}

/**
 *  Discover and load plugin files, limited by whitelist
 *  
 *  @return array
 */
function plugin_autoload() : array {
	static $plugins;
	if ( isset( $plugins ) ) { return $plugins; }
	
	$pl		= config( 'plugins_enabled', \PLUGINS_ENABLED );
	
	// Nothing to load
	if ( empty( $pl ) ) { return []; }
	
	$dir		= \rtrim( PLUGIN_DIR, '/' ) . '/' ; // Trailing path
	if ( !\is_dir( $dir ) ) { return []; }
	
	$files		=  \glob( $dir . '*/plugin.php' );
	if ( empty( $files ) ) { return []; }
	foreach ( $files as $plugin ) {
		$base	= \basename( \dirname( $plugin ) );
		if ( \in_array( $base, $pl  ) ) {
			require_once $plugin;
		}
	}
	
	// Refresh loaded functions
	$functions	= util_functions_list( true );
	
	$plugins	= [];
	foreach ( $functions as $fn ) {
		
		// Can't initialize? skip
		if ( !\is_callable( $fn ) ) { continue; }
		
		$ref	= new ReflectionFunction( $fn );
		$attrs	= $ref->getAttributes( Plugin::class );
		
		foreach ( $attrs as $attr ) {
			$meta	= $attr->newInstance(); 
			$name	= sanitize_spaces( sanitize_escape_text( $meta->name ) );
			
			// Duplicate plugin name?
			if ( isset( $plugins[$name] ) ) {
				\error_log( "Plugin {$name} already exists" );
				continue;
			}
			
			$plugins[$name]	= [
				'handler'	=> $fn,
				'meta'		=> $meta
			];
		}
	}
	
	// Sort by init order
	\uasort( 
		$plugins, 
		fn( $a, $b ) => $a['meta']->priority <=> $b['meta']->priority 
	);
	
	return $plugins;
}

/**
 *  Initialize plugin system
 *  
 *  @param bool		$run	Autoload and initialize each plugin (default)
 */
function plugin_init( bool $run = true ) : void {
	static $plugins
	
	$plugins	??= plugin_autoload();
	
	if ( !$run ) { return; }
	
	foreach ( $plugins as $plugin ) {
		$fn	= $plugin['handler'];
		$meta	= $plugin['meta'];
		$ref	= new ReflectionFunction( $fn );
		
		try {
			// Pass metadata, if it's allowed
			if ( $ref->getNumberOfParameters() === 1 ) {
				$fn( $meta );
			} else { $fn(); }
			
		} catch( \Throwable $e ) {
			\error_log( 
				"Plugin {$meta->name} failed initialization: " . 
				$e->getMessage() 
			);
		}
	}
}


/**
 *  Hooks and extensions
 */

/**
 *  Main hook attribute
 */
#[Attribute( Attribute::TARGET_FUNCTION | Attribute::IS_REPEATABLE )]
class Hook {
	/**
	 *  Hook constructor
	 *  
	 *  @param string	$name		Event name
	 *  @param int		$priority	Execution order, higher > earlier
	 */
	public function __construct(
		public readonly string	$name,
		public int		$priority	= 0
	) {}
}

/**
 *  Consolidated hook system with execution priority and cumulative stored output
 *  
 *  @param string	$action		Switched behavior of the registry
 *  @param string	$name		Event name in full string or partial event.* 
 *  @param array	$args		Event arguments
 *  @return mixed
 */
function hook_registry( string $action, string $name, ...$args ) : mixed {
	static	$handlers	= [];
	static	$output		= [];

	// Normalize
	$action	= \strtolower( $action );
	$name	= \strtolower( $name );

	// Match actions
	return match( $action ) {
		// Adding new hook
		'add'		=> $handlers[$name][]	= [
			'handler'	=> $args[0],
			'priority'	=> $args[1] ?? 0
		],
		
		// Execute hook and return mutated output
		'run'		=> 
		( function() use ( &$output, $name, $args ) {
			$hooks	= hook_registry( 'get', $name );
			$result	= $output[$name] ?? [];
			foreach ( $hooks as $handler ) {
				$result = 
				( $handler['handler'] )(
					$name,
					$result,
					...$args
				) ?? [];
			}
			
			$output[$name]	= $result;
			return $output[$name];
		} )(),
		
		// Search hooks by full or partial name
		'get'		=> 
		( function() use ( $handlers, $name ) {
			$found	= [];
			foreach ( $handlers as $group => $hooks ) {
				// Exact match?
				if ( $name === $group ) {
					$found	= \array_merge( $found, $hooks );
					continue;
				}
				
				// No wildcard? Move on
				if ( !\str_contains( $group, '*' ) ) { continue; }
				
				// Prefixed wildcard event
				if ( \str_ends_with( $group, '*' ) ) {
					if ( \str_starts_with( $name, \substr( $group, 0, -1 ) ) ) {
						$found	= \array_merge( $found, $hooks );
						continue;
					}
				}
				
				// Suffixed wildcard event
				if ( \str_starts_with( $group, '*' ) ) {
					if ( \str_ends_with( $name, \substr( $group, 1 ) ) ) {
						$found	= \array_merge( $found, $hooks );
						continue;
					}
				}
				
				// Clean pattern for matching everything else
				$pat	= 
				\preg_replace( '/\\\\\*/', '.*', \preg_quote( $group, '/' ) );
				
				if ( \preg_match(  '/^' . $pat  . '$/', $name ) ) {
					$found	= \array_merge( $found, $hooks );
				}
			}
			
			// Reorder hooks by priority
			\usort( 
				$found, 
				fn( $a, $b ) => $b['priority'] <=> $a['priority'] 
			);
			
			return $found;
		} )(),
		
		// Get execution result
		'values'	=> $output[$name] ?? [],
		
		// Clear results
		'clear'		=> unset( $output[$name] ),
		
		// Resort hooks by priority
		'priority'	=> 
		( function() use ( &$handlers, $args ) {
			[ $hook, $priority ]	= $args;
			foreach ( $handlers[$name] ?? [] as &$h ) {
				if ( $hook === $h['handler'] ) {
					$h['priority'] = $priority;
				}
			}
			
			return null;
		} )(),
		
		// Nothing else to send
		default		=> null
	};
}

/**
 *  Load event hooks from current script
 */
function hook_autoload() : void {
	$functions = util_functions_list();
	foreach ( $functions as $handler ) {
		$ref	= 
		\is_array( $handler ) 
			? new \ReflectionMethod( $handler[0], $handler[1] )
			: new \ReflectionFunction( $handler );
		$attrs	= $ref->getAttributes( Hook::class );
		
		foreach ( $attrs as $attr ) {
			$hook	= $attr->newInstance();
			hook_registry( 
				'add', 
				$hook->name, 
				$handler, 
				$hook->priority 
			);
		}
	}
}

/**
 *  Execute or set hooks and extensions
 *  Append a hook handler in [ 'event', 'handler' ] format
 *  Call the hook event in [ 'event', args... ] format
 *  
 *  @param array	$params		[ 'event', 'handler' ]
 */
function hook( array $params ) {
	
	// Nothing to add?
	if ( empty( $params ) ) { return; }
	
	$event	= \strtolower( \array_shift( $params ) );
	
	// Adding a handler to the given event?
	if ( \is_string( $params[0] ) && \is_callable( $params[0] ) ) {
		return hook_registry( 'add', $event, $params[0], 0 );
	}
	
	// Asking for hook-named output
	if ( \is_string( $params[0] ) && empty( $params[0] ) ) {
		return hook_registry( 'values', $event );
	}
	
	// Handler being called with parameters, if any
	return hook_registry( 'run', $event, ...$params );
}

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
 *  Content entry discovery and parsing
 */

/**
 *  Process entry extension
 *  
 *  @return string
 */
function entry_ext() : string {
	static $ext;
	$ext		??= '.' . \ltrim( \strtolower( ENTRY_EXT ), '.' );
	
	return $ext;
}

/**
 *  Load entries
 *  
 *  @param string	$base	Search directory
 *  @return array
 */
function entry_files( string $base ) : array {
	$base		= \rtrim( $base,  '/\\' );
	if ( !\is_dir( $base ) || !\is_readable( $base ) ) { 
		return [];
	}
	
	$files		= [];
	$ext		= entry_ext();
	$eext		= \ltrim( $ext, '.' );
	
	$dir		= 
	new \RecursiveDirectoryIterator( 
		$base, 
		\FilesystemIterator::FOLLOW_SYMLINKS	| 
		\FilesystemIterator::KEY_AS_FILENAME	| 
		\FilesystemIterator::SKIP_DOTS
	);
		
	$iterator	= 
	new \RecursiveIteratorIterator( 
		$dir, 
		\RecursiveIteratorIterator::LEAVES_ONLY,
		\RecursiveIteratorIterator::CATCH_GET_CHILD 
	);
	
	foreach ( $iterator as $finfo ) {
		if (
			$finfo->isFile() && 
			0 === \strcasecmp( $finfo->getExtension(), $eext )
		) {
			$files[] = [
				'slug'		=> $finfo->getBasename( $ext ),
				'path'		=> $finfo->getPathname(),
				'mtime'		=> $finfo->getMTime(),
			];
		}
	}
	
	return $files;
}

/**
 *  Process metadata from a given line as an array
 *  
 *  @param string	$line	Raw line entry
 *  @param array	$meta	Metadata storage
 *  @return			True if this line contained metadata
 */
function entry_meta( string $line, array &$meta ) : bool {
	if ( false === \strpos( $line, ':' ) ) { return false; }
	
	[ $key, $value ] = \array_map( 'trim', \explode( ':', $line, 2 ) );
	if ( '' === $key  ) { return false; }
	
	$value		??= '';
	$key		=  \strtolower( $key );
	
	if ( isset( $meta[$key] ) ) {
		$meta[$key]	= ( array ) $meta[$key];
		$meta[$key][]	= $value;
		return true;
	}
	
	$meta[$key]	= $value;
	return true;
}

/**
 *  Load file information, including metadata
 *  
 *  @param string	$path	Full file location
 *  @return array
 */
function entry_import( string $path ) : ?array {
	if ( !\is_file( $path ) || !\is_readable( $path ) ) { 
		return null; 
	}
	
	$raw	= \file( $path, \FILE_IGNORE_NEW_LINES );
	if ( false === $raw ) { return null; }
	
	$meta	= [];
	$start	= 0;	// Body start
	
	$rcount	= count( $raw );
	$mcount	= \min( ENTRY_META_LINES, $rcount );
	
	// Top metadata
	for ( $i = 1; $i < $mcount; $i++ ) {
		$line	= \trim( $raw[$i] );
		if ( '' === $line ) {
			$start = $i + 1;
			break;
		}
		
		if ( entry_meta( $line, $meta ) ) { continue; }
		
		$start = $i;
		break;
	}
	
	// Bottom metadata
	$cut = $rcount;
	for ( $i = $rcount - 1; $i >= 0; $i-- ) {
		$line	= \trim( $raw[$i] );
		if ( '' === $line ) { continue; }
		
		if ( entry_meta( $line, $meta ) ) {
			$cut = $i;
			continue;
		}
		
		break;
	}
	
	// Ensure title exists at least as the first line, if not explicitly set
	$meta['title']	??= $raw[0] ?? '(Untitled)';
	
	// Path as slug
	$meta['slug']	= \pathinfo( $path, \PATHINFO_FILENAME );
	
	$body		= 
	\implode( "\n", \array_slice( $raw, $start, $cut - $start ) );
	
	return [ 'meta' => $meta, 'body' => $body ];
}

/**
 *  Paged entry index with detailed info
 *  
 *  @param string	$dir	Search directory
 *  @param int		$page	Current page index, defaults to 1
 *  @param int		$limit	Maximum number of files
 *  @return array
 */
function entry_index( string $dir, int $page, int $limit ) : array {
	$files		= entry_files( $dir );
	if ( empty( $files ) ) { 
		return [
			'entries'	=> [],
			'total_entries'	=> 0,
			'total_pages'	=> 1,
		]; 
	}
	
	// Sort newest -> oldest
	usort( $files, fn( $a, $b ) => $b['mtime'] <=> $a['mtime'] );
	
	$page	= \min( 1, $page );
	$total	= count( $files );
	$pcount	= \max( 1, ( int ) \ceil( $total / $limit ) );
	
	$offset	= ( $page - 1 ) * $limit;
	$slice	= \array_slice( $files, $offset, $limit );
	
	// Load only the entries needed for this page
	$entries = 
	\array_values( \array_filter(
		\array_map( fn( $f ) => entry_import( $f['path'] ), $slice ),
		fn( $e ) => $e !== null
	));
	
	return [
		'entries'	=> $entries,
		'total_entries'	=> $total,
		'total_pages'	=> $pcount,
	];
}

/**
 *  Templates and rendering
 */

/**
 *  Core template processing expressions
 *  
 *  @param string	$key		Match pattern key
 *  @param array	$extend		Optional extended patterns
 *  @return mixed
 */
function template_patterns( ?string $key = null, ?array $extend = null ) : string|array {
	static $patterns = [
		'loop'		=> 
			'/\{loop:(?P<label>\w+)(?:\s+as\s+(?P<alias>\w+))?\}'
			. '(?P<content>.*?)\{endloop\}/si',
		'ifelse'	=> 
			'/\{if:(?P<condition>.*?)\}(?P<if_content>.*?)'
			. '(?:\{elseif:(?P<elseif_condition>.*?)\}(?P<elseif_content>.*?))?'
			. '(?:\{else\}(?P<else_content>.*?))?\{endif\}/si',
		'logic'		=> 
			'/(?P<variable>[\w\.\-]+)\s*(?P<operator>===|!==|==|!=|>=|<=|>|<|in|contains)'
			. '\s*(?P<value>"[^"]*"|\'[^\']*\'|\S+)/i',
		
		'block'		=> '/\{\{#(\w+)\}\}(.*?)\{\{\/\1\}\}/si',
		
		'args'		=> 
		'/\s*([\w\-]+)\s*=\s*("([^"]*)"|\'([^\']*)\'|([^,\s]+))\s*/',
		
		'incexists'	=> '/\{include:(?<key>[\w\-.\/]+)(?:\|[^}]+)?\}/i',
		'include'	=> 
			'/\{include:(?<inc_file>(?:\./)?(?:[\w\-]+\/)*[\w\-.]+)' 
			. '(?:\|(?<params>[^}]+))?\}/i'
	];
	
	if ( !empty( $extend ) ) {
		$patterns = \array_merge( $patterns, $extend );
	}
	
	return empty( $key ) ? $patterns : ( $patterns[$key] ?? '' );
}

/**
 *  Parse template tag optional arguments
 *  
 *  @param string	$str	Target phrase
 *  @return array
 */
function template_parse_tag_args( string $str ) : array {
	$args = [];
	
	\preg_match_all( template_patterns( 'args' ) , $str, $m, \PREG_SET_ORDER );
    
	foreach ( $m as $pair ) {
		$key		= trim( $row[1] );
		$value		= 
		$row[3] !== '' 
			? $row[3] 
			: ( $row[4] !== '' ? $row[4] : $row[5] );
		
		$args[$key] = \trim( $value, "\"'"  );
	}
	return $args;
}

/**
 *  Block {template} detection
 *  
 *  @param string	$template	Raw template data
 *  @param array	$context	Processing format data context
 *  @return string
 */
function template_blocks( string $template, array $context ) : string {
	\preg_match_all( 
		template_patterns( 'block' ), $template, $matches, 
		\PREG_SET_ORDER 
	);

	foreach ( $matches as $match ) {
		$key		= $match[1];
		$content	= $match[2];
		$valid		= !empty( $context[$key] );
		
		$template	= 
		\str_replace( $match[0], $valid ? $content : '', $template );
	}

	return $template;
}

/**
 *  Convert dot notation phrase 
 *  
 *  @param string	$phrase		Translation key
 *  @param string	$vars		Placeholder value replacements
 *  @return string			Translated phrase
 *  
 *  @example 
 *  $template	= 
 *  "Hello {{user.name}}, you have {{notifications.count}} messages.";
 *  
 *  $vars	= [
 *  	'user'		=> [ 'name'	=> 'cypnk' ],
 *  	'notifications'	=> [ 'count'	=> 3 ]
 *  ];
 *  echo template_interpolate( $template, $vars );
 *  
 *  Output: Hello cypnk, you have 3 new messages.
 */
function template_interpolate( string $template, array $vars ) : string {
	static $cache	= [];
	
	$normal		= $vars;
	\ksort( $normal );
	
	$key		= 
	\sha1( $template . \json_encode( $normal, \JSON_UNESCAPED_UNICODE ) );
	
	if ( isset( $cache[$key] ) ) { return $cache[$key]; }

	$cache[$key]	= 
	\preg_replace_callback(
		'/\{\{\s*([\w\.]+)(?:\s*\|\s*([^\}]+))?\s*\}\}/',
		function ( $matches ) use ( $vars ) {
			$keys	= explode( '.', $matches[1] );
			$value	= $vars;
			
			foreach( $keys as $key ) {
				if ( \is_array( $value ) && \array_key_exists( $key, $value ) ) {
					$value	= $value[$key];
				} elseif(\is_object( $value ) && isset( $value->$key ) {
					$value	= $value->$key;
				} else {
					return isset( $matches[2] ) 
						? $matches[2]
						: $matches[0];
				}
			}
			
			if ( \is_scalar( $value ) ) { return ( string ) $value; }
			if ( \is_object( $value ) && \method_exists( $value, '__toString' ) ) {
				( string ) $value;
			}
			
			return $matches[0];
		}, $template
	);
	
	return $cache[$key];
}

/**
 *  Variable strictness logic comparison helper
 *  
 *  @param mixed	$chk		Check target
 *  @param mixed	$val		Source data
 *  @param bool		$case_flag	Case insensitive comparison, if true
 *  @return bool
 */
function template_compare_var( mixed $chk, mixed $val, bool $case_flag ) : bool {
	if ( \is_bool( $chk ) || \is_bool( $val )) {
		return $chk === $val;
	}
	
	if ( \is_numeric( $chk ) && \is_numeric( $val ) ) {
		return ( float ) $chk === ( float ) $val;
	}
	
	$chk_cmp = ( string ) $chk;
	$val_cmp = ( string ) $val;
	
	return $case_flag ?
		\strcasecmp( $chk_cmp, $val_cmp ) === 0 : 
		\strcmp( $chk_cmp, $val_cmp ) === 0;
}

/**
 *  Match template {{placholder}} terms with array keys
 *  
 *  @param array	$vars	Context source data
 *  @return array
 */
function template_get_placeholders( array $vars ) : array {
	if ( empty( $vars ) ) { return []; }
	
	$flat = util_flatten_keys( $vars );
	return \array_combine(
		\array_map( fn( $key ) => '{{' . $key . '}}', \array_keys( $flat ) ),
		\array_map( fn($val) => \is_scalar( $val ) ? ( string ) $val : '', $flat )
    );
}

/**
 *  Find any included templates files
 *  
 *  @param string	$template	Raw template data
 *  @return array
 */
function template_get_includes( string $template ) : array {
	\preg_match_all( 
		template_patterns( 'incexists' ), 
		$template, 
		$matches, 
		\PREG_UNMATCHED_AS_NULL
	);
	return \array_unique( $matches['key'] ?? [] ); // Only keys
}

/**
 *  Extract comparison flags
 *  
 *  @param string	$raw		Raw template data
 *  @param bool		$default_case	Fallback case sensitivity, defaults to false (sensitive)
 *  @return array
 */
function template_extract_flags( string $raw, bool $default_case = false ) : array {
	static $conv	= [ 'int', 'float', 'bool', 'json' ];
	$parts		= explode( '|', $raw );
	$val		= \trim( \array_shift( $parts ) );
	$case_flag	= $default_case;
	
	$coerced	= false;
	foreach ( $parts as $flag ) {
		$flag = \strtolower( \trim( $flag ) );
		
		if ( !$coerced && \in_array( $flag, $conv ) ) {
			match ( $flag ) {
				'int'	=> $val = ( int ) $val,
				'float'	=> $val = ( float ) $val,
				'bool'	=> $val = \filter_var( 
					$val, \FILTER_VALIDATE_BOOLEAN 
				),
				'json' => \json_validate( $val ) 
						? \json_decode( $val, true ) 
						: $val,
				default	=> null
			};
			
			$coerced = true;
			continue;
		}
		
		match ( $flag ) {
			'ci'	=> $case_flag = true,
			'cs'	=> $case_flag = false,
			default	=> null
		};
	}
	
	$rval	= \is_string( $val ) ? \trim( $val ) : $val;
	return [ $rval, $case_flag ];
}

/**
 *  Template logic processing helper
 *  
 *  @param string	$expr		Logic expression
 *  @param array	$context	Processed data context
 *  @param bool		$case_flag	Case sensitivity, false for sensitive match
 *  @return bool
 */
function template_logic( string $expr, array $context, bool $case_flag = false ) : bool {
	$patterns	= template_patterns();
	if ( !\preg_match( $patterns['logic'], $expr, $m ) ) {
		return false;
	}
	
	$operator	= \strtolower( $m['operator'] );
	$var		= ( string ) ( $context[$m['variable']] ?? '' );
	$raw		= \trim( $m['value'], "\"'" );
	
	[ $val, $case_flag ] = template_extract_flags( $raw, $case_flag );
	
	return match ( $operator ) {
		'==='		=> $var === $val,
		'!=='		=> $var !== $val,
		'=='		=> \template_compare_var( $var, $val, $case_flag ),
		'!='		=> !\template_compare_var( $var, $val, $case_flag ),
		'>'		=> \is_numeric( $var ) && ( float ) $var > ( float ) $val,
		'<'		=> \is_numeric( $var ) && ( float ) $var < ( float ) $val,
		'>='		=> \is_numeric( $var ) && ( float ) $var >= ( float ) $val,
		'<='		=> \is_numeric( $var ) && ( float ) $var <= ( float ) $val,
		
		'in'		=> ( function() use ( $var, $val ) {
			$items = \is_array( $val ) ? $val : \array_map( 'trim', \explode( ',', ( string ) $val ) );
			return \in_array( ( string ) $var, \array_map( 'strval', $items ), true );
		} )(), 
		
		'contains'	=> (
			\is_string( $var ) &&
			( \is_string( $val ) || \is_numeric( $val ) ) &&
			( $case_flag
				? false !== \stripos( $var, ( string ) $val ) 
				: false !== \strpos( $var, ( string ) $val )
			)
		),
		
		default		=> false
	};
}

/**
 *  And/Or logic match group
 *  
 *  @param string	$condition	Matched logic phrase
 *  @param array	$context	Processed data context
 *  @param bool		$case_flag	Case sensitivity, false for sensitive match
 *  @return bool
 */
function template_logic_group( 
	string	$condition, 
	array	$context, 
	bool	$case_flag	= false 
) : bool {
	foreach ( \explode( '||', $condition ) as $or_group ) {
		$is_valid = true;
		
		foreach ( \explode( '&&', \trim( $or_group ) ) as $and_group ) {
			$and_group = trim( $and_group );
			
			if ( !template_logic( $and_group, $context, $case_flag ) ) {
				$is_valid = false;
				break; // Short-circuit AND group
			}
		}
		
		if ( $is_valid ) { return true; } // Short-circuit OR group
	}
	
	return false;
}

/**
 *  Load template file
 *  
 *  @param string	$path	Relative path for loading template
 *  @param string	$theme	Optional theme directory, relative to '/themes/'
 *  @param string	$root	Optional template root, 
 *  				defaults to '/views/' relative to TEMPLATE_DIR or __DIR__
 *  @return string
 */
function template_load( 
	string		$path, 
	?string		$theme	= null, 
	?string		$root	= null 
) : string {
	static $allowed	= [ 'html', 'htm', 'tpl', 'txt' ];
	static $cache	= [];
	static $dir;
	
	$ext	= 
	\strtolower( \pathinfo( $path, \PATHINFO_EXTENSION ) ?: 'na' );
	
	if ( !\in_array( $ext, $allowed, true ) ) {
		log_msg( "Disallowed template extension: {$ext}", 'ERROR' );
		
		throw new 
		\RuntimeException( "Invalid template type" );
	}
	
	$dir		??= 
	defined( 'TEMPLATE_DIR' ) 
		? TEMPLATE_DIR
		: __DIR__;
	
	$base		= 
	\realpath( $dir . ( 
		null === $root 
			? '/views/' 
			: '/' . \trim( $root, '/' ) 
	) );
	
	if ( !$base ) {
		log_msg( "Invalid base path: {$root}", 'ERROR' );
		
		throw new 
		\RuntimeException( "Template base path not found" );
	}
	
	$theme_path	= null === $theme ? '' : "/themes/{$theme}/";
	$relative	= $theme_path . '/' . \ltrim( $path, '/' );
	$relative	= \preg_replace( '#/+#', '/', $relative ); // Duplicate slash fix
	
	if ( \str_contains( $relative, '..' ) ) { // No traversal
		log_msg( "Suspicious template path: {$path}", 'ERROR' );
		
		throw new 
		\RuntimeException( "Invalid template path" );
	}

	$full	= \realpath( $base . '/' . $relative );
	if ( !$full || 0 !== \stripos( $full, $base ) ) {
		log_msg( "Template path traversal attempt: {$path}", 'ERROR' );
		
		throw new 
		\RuntimeException( "Invalid template path" );
	}

	if ( !\is_readable( $full ) ) {
		log_msg( "Template not found: {$path}", 'ERROR' );
		
		throw new 
		\RuntimeException( "Template not readable" );
	}

	$info	= $cache[$full] ??= \file_get_contents( $full );
	if ( false === $info ) {
		log_msg( "Failed to read template: {$path}", 'ERROR' );
		
		throw new 
		\RuntimeException( "Failed to read template" );
	}

	log_msg( "Loaded template: {$full}", 'DEBUG' );
	return $info;
}

/**
 *  Partial/Fragment template loading helper
 *  
 *  @params string	$template 	Raw template data
 *  @param bool		$depth		Maximum include depth, defaults to 5
 *  @return string
 */
function template_partials( 
	string	$template, 
	array	$vars		= [], 
	int	$depth		= 0,
	array	$seen		= [] 
) : string {
	$max_depth	= 5;
	if ( $depth > $max_depth ) {
		log_msg( "Max template include depth exceeded", 'WARN' );
		return $template;
	}
	
	$includes	=  template_get_includes( $template );
	if ( empty( $includes ) ) {
		return template_interpolate( 
			$template, 
			template_get_placeholders( $vars )
		);
	}
	
	$partials	= [];
	foreach ( $includes as $key ) {
		if ( \in_array( $key, $seen, true ) ) {
			log_msg( "Circular include detected {$key}", 'WARN' );
			continue;
		}
		
		try {
			$partial_tpl			= 
			template_load( "partials/{$key}.html" );
			
			$partials["{{include:{$key}}}"]	= 
			template_partials(
				$partial_tpl,
				$vars,
				$depth + 1,
				[...$seen, $key]
			);
			
		} catch ( \Throwable $e ) {
			log_msg( "Partial not loaded: {$key}: {$e->getMessage()}", 'WARN' );
			$partials["{{include:{$key}}}"]	= '';
		}
	}
	
	// Merge partials with user-defined placeholders
	$merged		= 
	\array_merge( template_get_placeholders( $vars ), $partials );
	return template_interpolate( $template, $merged );
}

/**
 *  Scan a template for nodes of type and parse parameters
 *  
 *  @param string	$template	Loaded template to scan
 *  @return array			Parsed type parameters
 *  
 *  @example {{node_type.blog(is_featured=true,limit=4)}}
 *  {{node_type.topic(is_featured=true,limit=4,sort=created_at,direction=DESC)}}
 *  {{node_type.post(is_hero=true,limit=1)}}
 */
function template_node_tags( string $template ) : array {
	\preg_match_all(
		'/{{node_type\.(\w+)\(([^}]*)\)}}/', 
		$template, $matches, \PREG_SET_ORDER 
	);
	$tags = [];
	
	foreach ( $matches as $match ) {
		$tags[] = [
			'full'   => $match[0],
			'type'   => $match[1],
			'params' => template_parse_tag_args( $match[2] )
		];
	}
	
	return $tags;
}

/**
 *  Template resolving handler helper
 *  
 *  @param string	$type		Resolver type label
 *  @param array	$resolvers	List of type-keyed registered resolvers
 *  @return mixed			Resolved callable or null
 */
function template_get_resolver( string $type, array $resolvers ) : ?callable {
	if ( \is_callable( $resolvers[$type] ?? null ) ) {
		return $resolvers[$type];
	}
	
	if ( \is_callable( $resolvers['default'] ?? null ) ) {
		return $resolvers['default'];
	}
	
	return null;
}

/**
 *  Match node type to registered resolver
 *  
 *  @params string	$template 	Raw template data
 *  @param array	$resolvers	List of type-keyed registered resolvers
 *  @return string
 */
function template_resolve_nodes( 
	string	$template, 
	array	$resolvers, 
	array	$context	= [] 
) : string {
	
	$tags	= template_node_tags( $template );
	foreach ( $tags as $tag ) {
		$type		= $tag['type'];
		$params		= $tag['params'];
		$full		= $tag['full'];
		
		$resolver	= template_get_resolver( $type, $resolvers );
		$params['context'] = $context;
		
		if ( !$resolver ) {
			log_msg( "No resolver found for node type: {$type}", 'WARN' );
			
			// Swap placeholder with error message
			$content	= 
			"<!-- Unknown node type: {$type} -->";
			
		} else {
			try {
				$content	= 
				$resolver( [ 
					'type'		=> $type, 
					'params'	=> $params, 
					'full'		=> $full 
				] );
				
				if ( null === $content ) {
					log_msg( "Resolver output failed for type: {$type}", 'WARN' );
					$content = "<!-- Unknown node type: {$type} -->";
				}
			} catch ( \Throwable $e ) {
				$msg	= 
				"Node resolver error for '{$type}': {$e->getMessage()}";
				
				log_msg( $msg, 'WARN' );
				
				$content	= 
				"<!-- Error rendering node: {$type} -->";	
			}
		}
		
		$template = \str_replace( $full, $content, $template );
	}
	
	return $template;
}

/**
 *  On-template logic parser
 *  
 *  @params string	$template 	Raw template data
 *  @param array	$context	Processed data context
 *  @param bool		$case_flag	Case sensitivity flag, defaults to false (sensitive)
 *  @return string
 */
function template_conditionals( 
	string	$template, 
	array	$context, 
	bool	$case_flag	= false 
) : string {
	$patterns = template_patterns();
	\preg_match_all( 
		$patterns['ifelse'], $template, $matches, \PREG_SET_ORDER 
	);
	
	foreach ( $matches as $match ) {
		$condition		= \trim( $match['condition'] );
		$if_content		= $match['if_content']		?? '';
		$elseif_condition	= $match['elseif_condition']	?? null;
		$elseif_content		= $match['elseif_content']	?? '';
		$else_content		= $match['else_content']	?? '';
		
		$replacement		= '';
		
		if ( template_logic_group( $condition, $context, $case_flag ) ) {
			$replacement	= 
			template_parse( $if_content, $context, $case_flag );
		} elseif ( 
			$elseif_condition && template_logic_group(
				$elseif_condition, $context, $case_flag
			) 
		) {
			$replacement	= 
			template_parse( $elseif_content, $context, $case_flag );
		} elseif ( !empty( $else_content ) ) {
			$replacement	= 
			template_parse( 
				$else_content, $context, $case_flag 
			);
		}
		
		$template	= \str_replace( $match[0], $replacement, $template );
    }

    return $template;
}

/**
 *  Parse on-template rendering loops
 *  
 *  @params string	$template 	Raw template data
 *  @param array	$context	Processed data context
 *  @param bool		$case_flag	Case sensitivity flag, defaults to false (sensitive)
 *  @return string
 */
function template_loops(
	string	$template, 
	array	$context, 
	bool	$case_flag	= false 
) : string {
	$patterns	= template_patterns();
	\preg_match_all( $patterns['loop'], $template, $matches, \PREG_SET_ORDER );
	
	foreach ( $matches as $match ) {
		$label		= \trim( $match['label'] );
		$alias		= $match['alias'] ?? 'value';
		$content	= $match['content'];
		
		// Ensure label exists and is an array
		if ( !isset( $context[$label] ) || !\is_array( $context[$label] ) ) {
			$template	= \str_replace( $match[0], '', $template );
			continue;
		}
		
		$rendered	= '';
		foreach ( $context[$label] as $item ) {
			$vars		= \array_merge( $context, [ $alias => $item ] );
			$rendered	.= template_parse($content, $vars, $case_flag);
		}
		
		$template	= \str_replace( $match[0], $rendered, $template );
	}
	
	return $template;
}

/**
 *  Template parsing entry point
 *  
 *  @params string	$template 	Raw template data
 *  @param array	$context	Processed data context
 *  @param bool		$case_flag	Case sensitivity flag, defaults to false (sensitive)
 *  @return string			Fully parsed template
 */
function template_parse( 
	string	$template, 
	array	$context,
	bool	$case_flag	= false 
) : string {
	if ( \preg_match( template_patterns()['incexists'], $template ) ) {
		$template = template_partials( $template, $context, 0, [] );
	}
	
	$template	= template_loops( $template, $context, $case_flag );
	$template	= template_conditionals( $template, $context, $case_flag );
	$template	= template_blocks( $template, $context );
	$template	= template_interpolate( $template, $context );
	
	$resolvers	= 
	$context['resolvers'] ?? ( 
		( $context['resolver_loader'] ?? null ) 
			? ( $context['resolver_loader'] )() 
			: []
	);
	
	if ( !empty( $resolvers ) ) {
		$template = template_resolve_nodes( $template, $resolvers, $context );
	}
	
	return $template;
}


/**
 *  Store and send rendering templates
 *  
 *  @param string	$lable		Template name to send back
 *  @param array	$reg		New templates to initiaize registry or override existing templates
 *  @return string
 *  @deprecated
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
 *  Collection of functions to execute after content sent
 */
function shutdown() {
	static $registered	= [];
	$args			= \func_get_args();
	
	// Shutdown called
	if ( empty( $args ) ) {
		// Cleanup any session data
		if ( \session_status() === \PHP_SESSION_ACTIVE ) {
			\session_write_close();
		}
		
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
		return;
	}
	
	if ( \is_callable( $args[0] ) ) {
		$registered[$args[0]] = $args[1] ?? null;
	}
}


/**
 *  Standard request parameter helpers
 */



/**
 *  Parameter filter helpers
 */

/**
 *  Logging safe string
 */
function logStr( $text, int $len = 255 ) : string {
	return truncate( sanitize_spaces( ( string ) ( $text ?? '' ) ), 0, $len );
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
		backupFile( $file, false, 'old', 0 );
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
	$app = labelName( config( 'app_name', \APP_NAME ) );
	if ( empty( $app ) ) {
		$app = labelName( \APP_NAME );
	}
	return $app;
}

/**
 *  Find a configuration setting as a set of lines or an array and returns filtered
 *  
 *  @param string	$param	Configuration setting name
 *  @param mixed	$def	Default value on empty
 *  @param string	$map	Filter function
 */
function linedConfig( string $param, $def, string $filter ) {
	$opt = setting( $param, $def );
	$raw = 
	\is_array( $opt ) ? 
		\array_map( $filter, $opt ) : 
		lineSettings( $opt, -1, $filter );
	
	return \array_unique( \array_filter( $raw ) );
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
	
	$mfr	= cleanEmail( setting( 'mail_from', \MAIL_FROM ) );
	if ( empty( $mfr ) ) {
		shutdown( 
			'logError', 
			'Email: Sender address is invalid. Check mail_from config setting.' 
		);
		return false;
	}
	
	// HTML or plain text headers
	$headers 	= $html ? $hheaders : $theaders;
	$headers[]	= 'From: ' . $mfr;
	$ip		= request_ip( true );
	
	// Mailer hook
	hook( [ 'mailmessage', [ 
		'headers'	=> $headers,
		'html'		=> $html,
		'recipients'	=> $rec,
		'subject'	=> $subject,
		'message'	=> $msg,
		'senderip'	=> $ip,
		'senderua'	=> request_ua()
	] ] );
	
	// Load mail hook replacements
	$res	= hookArrayResult( 'mailmessage' );
	
	// Override with hook results if any
	$rcpt	= $res['recipients'] ?? $rec;
	
	// Check sender whitelist
	$mwhite	= 
	linedConfig( 'mail_whitelist', \MAIL_WHITELIST, 'cleanEmail' );
	
	// Nothing in whitelist?
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
	$subj	= sanitize_escape_text( sanitize_spaces( $res['subject'] ?? $subject ) );
	$msg	.= "\r\n\r\nReceived from: " . $ip . "  \r\n" . request_ua();
	$msg	= html( $res['message'] ?? $msg, '', false, true );
	
	$ok	= 
	mail( 
		\implode( ',', $names ), 
		$subj, 
		$html ? \base64_encode( $msg ) : \strip_tags( $msg ), 
		\array_map( 'sanitize_spaces', $headers ) 
	);
	
	if ( $ok ) {
		shutdown( 
			'logNotice', 
			'Email: Sent from ' . $ip . ' Subject: ' . $subj
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
 *  Capture error for logging
 *  
 *  @param mixed	$err	Error message or exception to store
 *  @param bool		$app	Application error if true, visitor error if false	
 */
function error( $err, bool $app = true ) : void {
	$msg	= 
	match( true ) {
		
		// Thrown exception
		( $err instanceof \Exception )	=> 
		\strtr( 'Exception: {msg} in {file} on line {line}', [
			'{msg}'		=> $err->getMessage(),
			'{file}'	=> $err->getFile(),
			'{line}'	=> $err->getLine()
		] ), 
		
		// Generic capture from E.G. error_get_last()
		\is_array( $err )		=> 
		\strtr( '{type}: {msg} in {file} on line {line}', [
			'{type}'	=> $err['type']		?? 'Unkown type',
			'{msg}'		=> $err['message']	?? 'No message',
			'{file}'	=> $err['file']		?? 'Unknown file',
			'{line}'	=> $err['line']		?? 'Unkown line'
		] ), 
		
		default				=> ( string ) $err	
	};
	
	if ( $app ) {
		// Send with existing data
		logError( $msg, $app );
		return;
	}
	
	// Append visitor data
	$mt	= request_method();
	$ua	= request_ua();
	
	$ua	= logStr( empty( $mt ) ? 'unknown' : $ua );
	$mt	= logStr( empty( $mt ) ? 'unknown' : $mt );
	$uri	= logStr( $_SERVER['REQUEST_URI'] ?? '' );

	logError( $msg . ' ' . request_ip( true ) . ' ' . $mt . ' ' . $msg . ' ' . 
		$ua . ' ' . $uri, $app );
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
	$err	= $app ? sanitize_spaces( $err ) : truncate( $err, 0, 2048 );
	
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
		truncate( sanitize_spaces( $msg ), 0, 2048 ) 
	);
}

/**
 *  Startup environment logging
 */
function logStartup() {
	$log = \CACHE . \STARTUP;
	
	if ( \file_exists( $log ) ) {
		return;
	}
	// List of required and optional libraries
	$lib	= [ 
	'required' => [
		'libxml_clear_errors'	=> 'libxml',
		'mime_content_type'	=> 'fileinfo'
	],
	'optional' => [ 
		'mb_strlen'		=> 'mbstring', 
		'normalizer_normalize'	=> 'intl',
		'imagecreatetruecolor'	=> 'GD',
		'mail'			=> 'mail'
	]];
	
	// Missing storage
	$miss	= [ 'required' => [], 'optional' => [] ];
	
	// Check PDO too
	if ( !defined( 'PDO::ATTR_DEFAULT_FETCH_MODE' ) ) {
		$miss['required'][] = 'pdo-sqlite';
	}
	
	// Log any missing required libraries
	foreach ( $lib['required'] as $f => $name ) {
		if ( !\function_exists( $f ) ) {
			$miss['required'][] = $name;
		}
	}
	// Optional libraries
	foreach ( $lib['optional'] as $f => $name ) {
		if ( !\function_exists( $f ) ) {
			$miss['optional'][] = $name;
		}
	}
	
	if ( !empty( $miss['required'] ) ) {
		$msg	= 
		'These required library(ies) may be missing or disabled: ' . 
			implode( ', ', $miss['required'] );
		logMessage( 
			$log, 
			'date, time, s-comment',
			truncate( sanitize_spaces( $msg ), 0, 2048 ) 
		);
	}
	
	if ( !empty( $miss['optional'] ) ) {
		$msg	= 
		'These recommended function(s) or library(ies) may be missing or disabled: ' . 
			implode( ', ', $miss['optional'] );
		logMessage( 
			$log, 
			'date, time, s-comment',
			truncate( sanitize_spaces( $msg ), 0, 2048 ) 
		);
	}
}

/**
 *  Log visitor error
 *  
 *  @param int		$code	Error type
 *  @param string	$msg	Custom message
 *  @return bool
 */
function visitorError( int $code = 0, string $msg = '-' ) {
	$mt	= request_method();
	
	$ua	= logStr( $_SERVER['HTTP_USER_AGENT'] ?? '-' );
	$me	= logStr( empty( $mt ) ? 'unknown' : $mt );
	$uri	= logStr( $_SERVER['REQUEST_URI'] ?? '' );
	
	$err	= $code . ' ' . request_ip( true ) . ' ' . $me . ' ' . $msg . ' ' . 
			$ua . ' ' . $uri;
	
	shutdown( 'logError', [ $err, false ] );
}

/**
 *  Visitor disconnect event helper
 */
function visitorAbort() {
	cleanOutput( true );
	if ( !\headers_sent() ) {
		httpCode( 205 );
	}
	visitorError( 499, 'Client disconnect' );
	die();
}

/**
 *  Exception recording helper
 *  
 *  @param Exception	$e	Thrown error
 *  @param string	$msg	Optional override of default error format
 */
function logException( \Exception $e, ?string $msg = null ) {
	$msg	??= 'Error: {msg} File: {file} Line: {line}';
	$err	= 
	\strtr( $msg, [
		'{msg}'		=> $e->getMessage(),
		'{file}'	=> $e->getFile(),
		'{line}'	=> $e->getLine()
	] );
	shutdown( 'logError', $err );
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
	$lim		= setting( $base, $default, 'int' );
	$prs[$label]	= lineSettings( $data, $lim );
	
	return $prs[$label];
}

/**
 *  Filter file extension
 *  
 *  @param string	$ext		Raw file extension or empty
 *  @return string
 */
function filterExt( ?string $ext ) : string {
	return 
	empty( $ext ) ? '' : 
	\preg_replace( 
		'/[[:space:]]+/', 
		bland( title( $ext ), true ), '' 
	);
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
	$ext	= filterExt( $ext );
	
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
 *   
 *  @param string	$file	File name relative to root path
 *  @param string	$root	File location, defaults to CACHE
 *  @param bool		$rem	Store loaded file contents if true
 *  @return string		
 */
function loadFile( 
	string	$name, 
	string	$root	= \CACHE,
	bool	$rem	= true
) : string {
	static $loaded	= [];
	
	// Check if already loaded
	if ( isset( $loaded[$name] ) && $rem ) {
		return $loaded[$name];
	}
	
	// Relative path to storage
	$fname	= slashPath( $root, true ) . $name;
	
	// Check folder location
	if ( empty( filterDir( $fname, $root ) ) ) {
		return '';
	}
	
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
		
		// Prevent circular failure if config file contained the error
		if ( 0 == \strcasecmp( $name, CONFIG ) ) {
			die();
		}
		send( 500, \MSG_CODEDETECT );
	}
	
	if ( $rem ) {
		$loaded[$name] = $data;
	}
	
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
 *  Check if a given hash scheme is valid
 *  
 *  @param string	$algo	Checking hash scheme
 *  @param bool		$hmac	Check HMAC algo list if true
 *  @return bool
 */
function validHashAlgo( string $algo, bool $hmac = false ) : bool {
	return 
	\in_array( 
		$algo, 
		( $hmac ? \hash_hmac_algos() : \hash_algos() )
	) ? true : false;
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
	
	$ht		= setting( $token, $default );
	$algos[$t]	= validHashAlgo( $ht, $hmac ) ? $ht : $default;
	
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
	$terms	= util_json_decode( \DEFAULT_LANGUAGE );
	$lang	= setting( 'language', \LANGUAGE );
	$file	= loadFile( $lang . '.json' );
	if ( !empty( $file ) ) {
		$terms	= 
		\array_merge_recursive( $terms,  util_json_decode( $file ) );
	}
	
	$data	= empty( $terms ) ? [] : $terms;
	// Trigger language load hook
	hook( [ 'loadlanguage', [ 
		'lang'	=> $lang, 
		'zone'	=> setting( 'timezone', \TIMEZONE ),
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
	$terms	= util_flatten_array( $data );
	
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
 *  Website and relative path root path given a URL prefix
 *  Defaults to home link
 *  
 *  @param string	$path		Event route label
 *  @param string	$default	Fallback event route
 *  @return string
 */
function pageRoutePath( ?string $path = null, ?string $default = null ) : string {
	static $urls	= [];
	
	$path		??= '';
	
	if ( isset( $urls[$path] ) ) {
		return $urls[$path];
	}
	
	// Empty path? Use home link
	if ( empty( $path ) ) {
		$urls[$path] = getRoot(); 
		return $urls[$path];
	}
	
	$rt	= eventRoutePrefix( $path, $default ?? $path );
	
	// Avoid placeholders E.G. :user, :page, :tag etc...
	$st	= strstr( $rt, ':', true );
	$urls[$path]	= getRoot() . 
		( ( false === $st ) ? $rt : $st );
	
	return $urls[$path];
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
	
	$url	= pageRoutePath();
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
	$plimit	= setting( 'page_limit', \PAGE_LIMIT, 'int' );
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
			util_json_decode( $def )[ 'links'] ?? [];
	
	$out	= '';
	$tpl	= template( 'tpl_page_nav_link' );
	foreach ( $links as $v ) {
		$out	.= render( $tpl, $v );
	}
	
	// Replace any home link references
	$out	= render( $out, [ 
		'home'		=> pageRoutePath(),
		'feedlink'	=> pageRoutePath( 'feed' )
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
	
	$flinks	= setting( 'default_footer_links', \DEFAULT_FOOTER_LINKS );
	return 
	render( template( 'tpl_page_footer' ), [ 
		'footer_links'=> 
			renderNavLinks( 
				template( 'tpl_footernav_wrap' ), 
				$flinks
			),
		'home'		=> pageRoutePath(),
		'feedlink'	=> pageRoutePath( 'feed' )
	] );
}

/**
 *  Load and change each placeholder into a key
 *  
 *  @return array
 */
function loadClasses() : array {
	$cls	= setting( 'default_classes', \DEFAULT_CLASSES, 'json' );
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
			\implode( ' ', util_unique_terms( bland( $v, true ) ) );
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
				$s	= setting( 'default_stylesheets', \DEFAULT_STYLESHEETS );
				$s	= \is_array( $s ) ? $s : 
				linePresets( 
					'stylesheets', 
					'style_limit', 
					\STYLE_LIMIT, 
					$s
				);
				
				// Merge plugin stylesheets
				hook( [ 'stylesloaded', [ 'styles' => $s ] ] );
				$store['styles'] = 
				hookArrayResult( 'stylesloaded' )['styles'] ?? $s;
				
				break;
				
			case 'scripts':
				$s	= setting( 'default_scripts', \DEFAULT_SCRIPTS );
				$s	= \is_array( $s ) ? $s : 
				linePresets( 
					'scripts', 
					'script_limit', 
					\SCRIPT_LIMIT,
					$s
				);
				
				// Merge plugin script files
				hook( [ 'scriptsloaded', [ 'scripts' => $s ] ] );
				$store['scripts'] = 
				hookArrayResult( 'scriptsloaded' )['scripts'] ?? $s;
				
				break;
			
			case 'meta':
				// Load custom meta tags
				$meta	= setting( 'default_meta', \DEFAULT_META );
				$meta	= 
					\is_string( $meta ) ? util_json_decode( $meta ) : 
						[ 'meta' => $meta ];
				
				// Merge plugin meta tags
				hook( [ 'metaloaded', [ 'meta' => $meta ] ] );
				$store['meta'] = 
				hookArrayResult( 'metaloaded' )['meta'] ?? $meta;
				
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
	$n	= '{' . bland( $name, true ) . '}';
	$va	= [];
	foreach( $cls as $k => $v ) {
		if ( 0 != \strcmp( $n , $k ) ) {
			continue;
		}
		$va	= util_unique_terms( $v );
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
		[ '{' . bland( $name, true ) . '}' => bland( $value, true ) ] 
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
 *  URL and associated nonce extraction helper
 *  
 *  @param string	$path	URL|nonce formatted string
 *  @return array
 */
function splitUrlNonce( string $path ) : array {
	if ( false === \strpos( $path, '|' ) ) {
		return [ 'url' => \trim( $path ), 'nonce' => '' ];
	}
	
	$u	= \strstr( $r, '|', true );
	$n	= \strstr( $r, '|' );
	return [ 
		'url'	=> ( false === $n ) ? '' : \trim( $u ), 
		'nonce'	=> ( false === $n ) ? '' : \trim( $n, '| ' )
	];
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
			$i = setting( 'meta_limit', \META_LIMIT, 'int' );
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
				render( $tag, splitUrlNonce( $r ) );
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
	
	// Use nonced script tag template if that setting is enabled
	$tpl	= 
	setting( 'nonced_scripts', \NONCED_SCRIPTS, 'bool' ) ?
	regionTags( $tpl, '{body_js}', \TPL_SCRIPT_NONCE_TAG, 'scripts' ) : 
	regionTags( $tpl, '{body_js}', \TPL_SCRIPT_TAG, 'scripts' );
	
	$tpl	= 
	regionTags( $tpl, '{meta_tags}', \TPL_META_TAG, 'meta' );
	
	$sa	= setting( 'shared_assets', \SHARED_ASSETS );
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
	$input['home']		= $input['home']	?? pageRoutePath();
	$input['feedlink']	= $input['feedlink']	?? pageRoutePath( 'feed' );
	$input['plugin_assets']	= 
		$input['plugin_assets'] ?? 
		slashPath( setting( 'plugin_assets', \PLUGIN_ASSETS ), true );
	
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
	return \bin2hex( \random_bytes( util_int_range( $bytes, 1, 64 ) ) );
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
	$t = ( string ) \hrtime( true );
	
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
	$size	= util_int_range( $size, 1, 24 );
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
	
	// If SQL isn't defined, try to load SQL file with the DSN
	if ( empty( $src ) ) {
		$src = loadFile( $dsn . '.sql' );
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
	
	// Set self-cleanup
	if ( !internalState( 'dbcleanupset' ) ) {
		shutdown( 'statement', [ null, null ] );
		shutdown( 'getDb', [ '', 'closeAll' ] );
		internalState( 'dbcleanupset', true );
	}
	
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
	$timeout	= config( 'data_timeout', \DATA_TIMEOUT, 'int' );
	$opts	= [
		\PDO::ATTR_TIMEOUT		=> $timeout,
		\PDO::ATTR_DEFAULT_FETCH_MODE	=> \PDO::FETCH_ASSOC,
		\PDO::ATTR_PERSISTENT		=> false,
		\PDO::ATTR_EMULATE_PREPARES	=> false,
		\PDO::ATTR_AUTOCOMMIT		=> false,
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
	//$db[$dsn]->exec( 'PRAGMA trusted_schema = OFF;' );
	$db[$dsn]->exec( 'PRAGMA cell_size_check = ON;' );
	
	// TODO: Workaround for virtual table functions marked SQLITE_VTAB_DIRECTONLY in new SQLite versions
	$db[$dsn]->exec( 'PRAGMA trusted_schema = ON;' );
	
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
 *  @param PDO		$db	Database connection
 *  @param array	$params	Parameters 
 *  @param string	$rtype	Return type
 *  @param PDOStatement	$stm	PDO prepared statement
 *  @return mixed
 */
function getDataResult( \PDO $db, array $params, string $rtype, \PDOStatement $stm ) {
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
 *  Get or create cached PDO Statements
 *  
 *  @param PDO		$db	Database connection
 *  @param string	$sql	Query string or statement
 *  @return mixed
 */
function statement( ?\PDO $db, ?string $sql ) {
	static $stmcache = [];
	if ( empty( $db ) && empty( $sql ) ) {
		\array_map( 
			function( $v ) { return null; }, 
			$stmcache 
		);
		return null;
	}
	
	if ( isset( $stmcache[$sql] ) ) {
		return $stmcache[$sql];
	}
	
	$stmcache[$sql] = $db->prepare( $sql );
	return $stmcache[$sql];
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
		$stm	= statement( $db, $sql );
		$res	= getDataResult( $db, $params, $rtype, $stm );
		$stm->closeCursor();
		
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
		
		$stm	= statement( $db, $sql );
		foreach ( $params as $p ) {
			$res[]	= getDataResult( $db, $p, $rtype, $stm );
		}
		$stm->closeCursor();
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
	if ( !empty( $data ) ) {
		return $data[0];
	}
	return [];
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
		\CACHE_DATA 
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
	
	$ttl	= setting( 'cache_ttl', \CACHE_TTL, 'int' );
	setInsert(
		$sql, 
		[
			':id'		=> $key, 
			':ttl'		=> $ttl, 
			':content'	=> $content 
		], 
		CACHE_DATA 
	);
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
	if ( setting( 'cookie_restrict', \COOKIE_RESTRICT, 'bool' ) ) {
		return 'Strict';
	}
	
	return request_is_tls() ? 'None' : 'Lax';
}

/**
 *  Prefixed cookie name helper
 *  
 *  @return string
 */
function cookiePrefix() : string {
	static $prefix;
	if ( isset( $prefix ) ) {
		return $prefix;
	}
	
	$cpath	= setting( 'cookie_path', \COOKIE_PATH );
	
	// Enable locking if connection is secure and path is '/'
	$prefix	= 
	( 0 === \strcmp( $cpath, '/' ) && request_is_tls() ) ? 
		'__Host-' : ( request_is_tls() ? '__Secure-' : '' );
	
	return $prefix;
}

/**
 *  Generate application cookie prefix based on the current server
 *  
 *  @return string
 */
function appKey() : string {
	return 
	cookiePrefix() . \hash( 'tiger160,4', getHost() . request_protocol() );
}

/**
 *  Set the cookie options when defaults are/aren't specified
 *  
 *  @param array	$options	Additional cookie options
 *  @return array
 */
function defaultCookieOptions( array $options = [] ) : array {
	static $opts;
	if ( empty( $options ) && isset( $opts ) ) {
		return $opts;
	}
	
	$cexp	= setting( 'cookie_exp', \COOKIE_EXP, 'int' );
	$cpath	= setting( 'cookie_path', \COOKIE_PATH );
	
	$opts	=  [
		'expires'	=> 
			( int ) ( $options['expires'] ?? time() + $cexp ),
		'path'		=> $cpath,
		'samesite'	=> sameSiteCookie(),
		'secure'	=> request_is_tls() ? true : false,
		'httponly'	=> true
	];
	
	// Domain shouldn't be used when using '__Host-' prefixed cookies
	$prefix = cookiePrefix();
	if ( empty( $prefix ) || 0 === \strcmp( $prefix, '__Secure-' ) ) {
		$opts['domain']	= '.' . \ltrim( getHost(), '.' );
	}
	
	if ( !empty( $options ) ) {
		$opts = \array_merge( $opts, $options );
	}
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
	$app = appKey();
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
	$app = appKey();
	return 
	\setcookie( "{$app}[{$name}]", $data, $options );
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
	$bt	= setting( 'session_bytes', \SESSION_BYTES, 'int' );
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
	$exp	= setting( 'session_exp', \SESSION_EXP, 'int' );
	if ( empty( $_SESSION['canary'] ) ) {
		$_SESSION['canary']	= time() + $exp;
		return;
	
	} 
	if ( time() <= ( int ) $_SESSION['canary'] ) {
		return;
	}
	
	// Regenerate session
	$restore		= $_SESSION;
	\session_regenerate_id( true );
	
	$_SESSION		= $restore;
	$_SESSION['canary']	= time() + $exp;
}
	
/**
 *  Check session staleness
 *  
 *  @param bool		$reset	Reset session and canary if true
 */
function sessionCheck( bool $reset = false ) {
	session( $reset );
	sessionCanary();
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
		setting( 'cookie_exp', \COOKIE_EXP, 'int' );
	unset( $options['expires'] );
	
	hook( [ 'sessioncookieparams', $options ] );
	return \session_set_cookie_params( $options );
}

/**
 *  Initiate a session if it doesn't already exist
 *  Optionally reset and destroy session data
 *  
 *  @param bool		$reset		Reset session ID if true
 */
function session( $reset = false ) {
	if ( \session_status() === \PHP_SESSION_ACTIVE && !$reset ) {
		return;
	}
	
	if ( \session_status() !== \PHP_SESSION_ACTIVE ) {
		\session_cache_limiter( '' );
		
		sessionCookieParams();
		\session_name( appKey() );
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
 *  Content formatting
 */

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
 *  @param string	$term		Search term
 */
function textHas( $source, string $term ) : bool {
	return 
	( empty( $source ) || empty( $term ) ) ? 
		false : \str_contains( ( string ) $source, $term );
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
		$find = \strtolower( $find );
		foreach ( $collection as $c ) {
			if ( \str_starts_with( $find, \strtolower( $c ) ) ) {
				return true;
			}
		}
		return false;
	}
	
	foreach ( $collection as $c ) {
		if ( \str_starts_with( $find, $c ) ) {
			return true;
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
		langVar( 'date_nice', setting( 'date_nice', $fmt ) );
	}
	return \gmdate( $dn, util_time_string( $stamp ) );
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
	return 
	smartTrim( sanitize_spaces( ( string ) $text ), $max );
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
	$text	= sanitize_spaces( $text, '_' );
	
	return 
	smartTrim( \preg_replace( 
		'/[^a-z0-9_\-\.]/i', '', normal( $text ) 
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
		\implode( ',', util_trimmed_list( $v, $lower ) );
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
 *  @param int		$max	Optional string max length
 *  @param bool		$dot	Allow periods in slug
 *  @return string
 */
function slugify( 
	string		$title, 
	string		$text		= '',
	int		$max		= 100,
	bool		$dot		= false
) : string {
	if ( empty( $text ) ) {
		$text = $title;
	}
	$text = lowercase( sanitize_spaces( $text ) );
	$text = 
	\preg_replace( 
		( $dot ? '~[^\\pL\d\.]+~u' : '~[^\\pL\d]+~u' ), ' ', $text 
	);
	$text = \preg_replace( '/\s+/', '-', \trim( $text ) );
	$text = \preg_replace( '/\-+/', '-', \trim( $text, '-' ) );
	
	return \strtolower( smartTrim( $text, $max ) );
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
	
	$ys	= setting( 'year_start', \YEAR_START, 'int' );
	
	// Enforce date ranges
	$year	= util_int_range( $year, $ys, $y );
	
	// Current year? Enforce month to current month or January of this year
	$month	= ( $y == $year ) ? 
			util_int_range( $month, 1, $m ) : 
			util_int_range( $month, 1, 12 );
	
	// Days in requested year and month
	$days	= ( int ) \date( 't', \mktime( 0, 0, 0, $month, 1, $year ) );
	
	// No more than the number of days in requested or current year/month
	$day	= ( $year == $y && $month == $m ) ? 
			util_int_range( $day, 1, $d ) : 
			util_int_range( $day, 1, $days );
	
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
 *  Helper to find if sent user headers contain the given headers and/or values
 *  
 *  @example
 *  headerContains( [ 'X-Requested-With' => 'XMLHttpRequest' ] );
 *  headerContains( [ 'X-Requested-With' => [ 'MobileApp', 'XMLHttpRequest' ] ] );
 *  
 *  @param array	$search		Key/value pairs to find in sent headers
 *  @return bool
 */
function headersContain( array $search ) : bool {
	if ( empty( $search ) ) {
		return false;
	}
	
	$found	= \array_intersect_key( httpHeaders(), $search );
	if ( empty( $found ) ) {
		return false;
	}
	
	foreach ( $found as $k => $v ) {
		if ( \is_array( $search[$k] ) ) {
			foreach ( $search[$k] as $j ) {
				// Skip nested arrays
				if ( \is_array( $j ) ) {
					continue;
				}
				
				if ( textHas( $v, ( string ) $j ) ) {
					return true;
				}
			}
		} else {
			if ( textHas( $v, $search[$k] ) ) {
				return true;
			}
		}
	}
	
	return false;
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
 *  Simple email address filter helper
 *  
 *  @param string	$email	Raw email (currently doesn't support Unicode domains)
 *  @return string
 */
function cleanEmail( string $email ) : string {
	return 
	\filter_var( $email, \FILTER_VALIDATE_EMAIL ) ? $email : '';
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
		sanitize_url( $prefix . $v ) : sanitize_url( $v );
}

/**
 *  Form encoding type helper, defaults to application/x-www-form-urlencoded
 *  
 *  @param string	$v	Raw encoding type
 *  @return string
 */
function cleanFormEnctype( string $v ) : string {
	static $ft = [
		'application/x-www-form-urlencoded',
		'multipart/form-data',
		'text/plain'
	];
	
	$v = \strtolower( trim( $v ) );
	return \in_array( $v, $ft ) ?
		$v : 'application/x-www-form-urlencoded';
}

/**
 *  Filter form sending method type, defaults to get or post
 *  
 *  @param string	$v	Raw form method
 *  @return string
 */
function cleanFormMethodType( string $v ) : string {
	static $fm = [ 'get', 'post' ];
	
	$v = \strtolower( trim( $v ) );
	return \in_array( $v, $fm ) ? $v : 'get';
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
					$v = sanitize_escape_text( $v, false, false );
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
	// Escape excluded markdown-sensitive characters
	static $esc	= [
		'\\#'	=> '&#35;',
		'\\*'	=> '&#42;',
		'\\-'	=> '&#45;',
		'\\:'	=> '&#58;',
		'\\>'	=> '&#62;',
		'\\['	=> '&#91;',
		'\\]'	=> '&#93;',
		'\\`'	=> '&#96;',
		'\\~'	=> '&#126;'
	];
	$out = \strtr( $val, $esc );
	
	// Escape block level code first
	if ( !$skipCode ) {
		// Format inside code tags
		$out = \preg_replace_callback( '/<code>(.*)<\/code>/ism',
		function ( $m ) {
			if ( empty( $m[1] ) ) {
				return '';
			}
			return 
			\strtr( template( 'tpl_codeblock' ), [ 
				'{code}' => sanitize_escape_text( \trim( $m[1] ), false, false )
			] );
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
		// Remove <br>, <p> tags inside <pre> and <code>
		'#<(pre|code)(.*)?>(.*)<\/\1>#ism'	=>
		function( $m ) {
			$v = \preg_replace( '#<br\s*/?>#', "\n", $m[3] );
			$v = \strtr( $v, [ 
				'</p><p>'	=> "\n\n",
				'<p>'		=> ''
			] );
			return 
			'<' . $m[1] . ( $m[2] ?? '' ) . '>' . 
			$v . 
			'</' . $m[1] . '>';
		},
		
		// Block of code
		'#^`{3,}([^`{3,}]+)`{3,}#mU' =>
		function( $m ) {
			return
			\strtr( template( 'tpl_codeblock' ), [ 
				'{code}' => sanitize_escape_text( \trim( $m[1] ), false, false )
			] );
		}
	];
	
	return \preg_replace_callback_array( $filters, $out );
}

/**
 *  Parse out and format footnotes, if given 
 *  
 *  @param string	$html		Content body
 *  @param array	$footnotes	Unformated list of footnotes
 *  @return string
 */
function formatFootnotes( string $html, array $footnotes ) : string {
	// No footnotes? Send content as-is
	if ( empty( $footnotes ) ) {
		return $html;
	}
	
	$slug	= '';		// Footnote ID link slug
	$foot	= '';		// Formatted footnote
	$id	= 0;		// Footnote marker counter
	$blink	= '';		// Footnote marker backlink reference slug
	$back	= [];		// Formatted markers per footnote
	$multi	= false;	// Multiple backlinks to body text
	
	// Replace placeholder markers with links
	foreach( $footnotes as $k => $v ) {
		// No placeholders in body text?
		if ( empty( $v['markers'] ) ) {
			continue;
		}
		
		// Generate ID slug from part of footnote and its hash
		$slug	= 
		slugify( 
			smartTrim( \strip_tags( $v['footnote'] ), 20 ) 
		) . '-' . \hash( 'crc32b', $v['footnote'] );
		
		// Multiple backlinks to this footnote?
		$multi	= 
		( count( $v['markers'] ) > 1 ) ? true : false;
		
		foreach( $v['markers'] as $m ) {
			
			// Marker link slug ID 
			$id	= count( $back ) + 1;
			$blink	= $slug . '-' . $id;
			
			// Backlink to body text location
			// Use the ID if there are multiple backlinks
			$back[] = 
			\strtr( template( 'tpl_footnote_back' ), [
				'{link}'	=> $blink,
				'{phrase}'	=> $multi ? $id : $k
			] );
			
			// Replace marker in body text with link to footnote
			$html = 
			\strtr( $html, [ $m =>
				\strtr( template( 'tpl_footlink' ), [ 
					'{link}'	=> $slug,
					'{id}'		=> $blink,
					'{phrase}'	=> $k
				] ) 
			] );
			$id++;
		}
		
		$foot .= 
		\strtr( 
			template( 'tpl_footnote' ), 
			[
				'{backlinks}'	=> 
				$multi ? 
					$k . '. ' . \implode( ', ', $back ) : 
					$back[0],
				'{id}'		=> $slug,
				'{footnote}'	=> $v['footnote']
			] 
		);
		
		// Reset after each footnote
		$back	= [];
		$id	= 0;
	}
	
	return $html . 
	\strtr( template( 'tpl_footnote_wrap' ), [
		'{footnotes}'	=> $foot
	] );
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
	
	// Remove preceding/trailing slashes
	$prefix		= trim( $prefix, '/' );
	
	// Preliminary cleaning
	$html		= sanitize_filter( $value, true );
	
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
	
	if ( !isset( $white ) ) {
		$default_tags = config( 'tag_map', '{}', 'json' );
		
		// Include form tags
		$default_form = 
		\array_merge_recursive( 
			$default_tags, 
			config( 'form_tag_map', '{}', 'json' )
		);
		
		// Tag loader hook
		hook( [ 'htmltags', [ 
			'html'		=> $default_tags,
			'form'		=> $default_form,
		     	'form_enabled'	=> $form
		] ] );
		
		$htags		= hookArrayResult( 'htmltags' );
		
		// Set custom tags or default tags
		$white	= $htags['html'] ?? $default_tags;
		if ( $form ) {
			$white	= \array_merge( $white, $htags['form'] ?? $default_form );
		}
	}
	
	// Clean up HTML
	$clean			= sanitize_html( $html, $white );
	$clean			= makeParagraphs( $clean, true );
	
	if ( $sembed ) { return $clean; }
	
	// Apply embedded media
	return embeds( $clean, $prefix );
}

/**
 *  Parse caption/subtitle definitions if any are specified
 *  
 *  @param string	$cc	Combined caption definitions
 *  @param string	$preifx	Source path prefix
 *  @return string
 */
function extractCC( string $cc, string $prefx = '' ) : string {
	
	$cc	= \trim( $cc );
	if ( empty( $cc ) ) {
		return '';
	}
	
	$dd	= '';
	$src	= '';
	$lang	= '';
	$id	= '';
	$p	= [];
	
	// Find multiple caption definitions if any
	$defs	= util_trimmed_list( $cc, false, '][' );
	
	// Parse captions
	foreach ( $defs as $d ) {
		if ( empty( $d ) ) {
			continue;
		}
		
		\parse_str( $d, $p );
		
		if ( empty( $p ) || !\is_array( $p ) ) {
			$p = [];
			continue;
		}
		
		// Parse only if all elements are strings
		foreach ( $p as $k => $v ) {
			if ( is_array( $v ) ) {
				$p[$k] = 
				empty( $v[0] ) ? '' : ( 
					\is_array( $v[0] ) ? '' : ( string ) $v[0] 
				);
			} else {
				$p[$k] = ( string ) $v;
			}
		}
		
		// Prefix prepended source path
		$src	= 
		prependPath( $p['src'] ?? $p['source'] ?? '', $prefix );
		
		// Language name if specified
		$lang	= 
		bland( $p['lang'] ?? $p['language'] ?? '--', true );
		
		// Is default?
		$id	= empty( $p['default'] ) ? '' : 'default';
		
		// Language or plain subtitle
		$dd	.= empty( $lang ) ? 
		\strtr( template( 'tpl_cc_nl_embed' ), [
			'{src}'		=> $src,
			'{default}'	=> $id
		] ) : 
		\strtr( template( 'tpl_cc_embed' ), [
			'{label}'	=> 
			bland( 
				$p['label'] ?? $p['name'] ?? $lang, 
				true
			),
			'{src}'		=> $src,
			'{lang}'	=> $lang,
			'{default}'	=> $id
		] );
		$p	= [];
	}
	
	return $dd;
}

/**
 *  Embedded media shortcode list helper and hook trigger
 *  
 *  @return array
 */
function hostedEmbeds() : array {
	$hosted = [
		// YouTube syntax
		'/\[youtube http(s)?\:\/\/(www)?\.?youtube\.com\/watch\?v=([0-9a-z_\-]*)(?:\&t\=([\d]*)s)?\]/is'
		=> \strtr( template( 'tpl_youtube' ), [ '{src}' => '$3', '{time}' => ( '$4' ?? '0' ) ] ),
		
		'/\[youtube http(s)?\:\/\/(www)?\.?youtu\.be\/([0-9a-z_\-]*)(?:\?t\=([\d]*))?\]/is'
		=> \strtr( template( 'tpl_youtube' ), [ '{src}' => '$3', '{time}' => ( '$4' ?? '0' ) ] ),
		
		'/\[youtube ([0-9a-z_\-]*)\]/is'
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
		] ),
		
		'/\[(?:utreon|playeur) (?:http(s)?\:\/\/(www\.)?)?(?:utreon|playeur)\.com\/v\/([0-9a-z_\-]*)(?:\?t\=([\d]*))?\]/is'
		=> \strtr( template( 'tpl_playeur' ), [ '{src}' => '$3', '{time}' => ( '$4' ?? '0' ) ] )
		
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
 *  @param string	$preifx	Source path prefix
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
		$rx = '/\[(?<type>audio|video) ' . 
			'(?:\[(?<captions>(.*?))\]\s+?)?' . 
			'(?:\((?<preview>.*?)\)\s+?)?' . 
			'(?<src>[^\]]+)\]/s';
		
		$media	= [ $rx => 
		
		function( $m ) use ( $prefix ) {
			$i = \trim( $m['type'] ?? '' );		// Media type
			$p = \trim( $m['preview'] ?? '' );	// Thumbnail or preview
			
			// Use prefix for relative paths
			$u = prependPath( \trim( $m['src'] ?? '' ), $prefix );
			
			// Parse caption definitions if any
			$c = extractCC( $m['captions'] ?? '', $prefix );
			
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
					\strtr( template( 'tpl_video_np_embed' ), [ 
						'{src}'		=> $u,
						'{detail}'	=> $c
					] ) : 
					
					// With preview
					\strtr( template( 'tpl_video_embed' ), [ 
						'{preview}'	=> prependPath( $p, $prefix ),
						'{src}'		=> $u,
						'{detail}'	=> $c
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
 *  Convert row string to list of cells
 *  
 *  @param string	$row		Matched plain text row cells
 *  @param bool		$is_align	This is an alignment row if true
 *  @return array
 */
function tableCells( string $row, bool $is_align = false ) : array {
	$row = \trim( $row, '|' );
	
	// Split by vertical pipes, skipping any escaped
	$c =  empty( $row ) ? [] : 
	\preg_split( 
		'/[^\\\\]\|' . ( $is_align ? '|[^\\\\]\+/' : '/' ), $row
	);
	return ( false === $c )? [] : $c;
}

/**
 *  Format table row with each cell aligned as designated
 *   
 *  @param array	$cells	Column cells in a single table row
 *  @param array	$align	Formatting alignment definition
 *  @param bool		$tpl	Cell rendering template
 *  @param int		$oe	Optional odd/even row selector
 *  @return string
 */
function tableRow( array $cells, array $align, string $tpl, int $oe = 0 ) : string {
	if ( empty( $cells ) ) {
		return 
		render( template( 'tpl_table_row' ), [ 'cells' => ''] );
	}
	
	$i	= 0;		// Row cell counter
	$cells	= 
	\array_map( function( $r ) use ( $align, $tpl, &$i ) {
		switch ( $align[$i] ?? '' ) {
			// Left align
			case 'l':
				$r = render( $tpl, [ 
					'align'	=> 'left',
					'data'	=> $r
				] );
				break;
			
			// Center align
			case 'c': 
				$r = render( $tpl, [ 
					'align'	=> 'center',
					'data'	=> $r
				] );
				break;
			
			// Right align
			case 'r':
				$r = render( $tpl, [ 
					'align'	=> 'right',
					'data'	=> $r
				] );
				break;
			
			// No alignment
			default:
				$r = render( $tpl, [ 
					'align'	=> '',
					'data'	=> $r
				] );
		}
		
		$i++;
		return $r;
		
	}, $cells );
	
	// No Odd/Even
	if ( empty( $oe ) ) {
		return 
		render( template( 'tpl_table_row' ), [ 
			'cells' => \implode( '', $cells ) 
		] );
	}
	
	return ( 0 == $oe % 2 ) ?
	render( template( 'tpl_table_row_even' ), [ 
		'cells' => \implode( '', $cells ) 
	] ) :
	render( template( 'tpl_table_row_odd' ), [ 
		'cells' => \implode( '', $cells ) 
	] );
}

/**
 *  Table formatting helper
 *  
 *  @param array	$m	Regex found match
 *  @return string
 */
function tableBuild( array $m ) : string {
	// Table cell alignment definition
	$align = 
	\array_map( function( $a ) {
		$a = \trim( $a );
		
		return 
		empty( $a ) ? '' : (
			// Left align?
			\str_starts_with( $a, ':' ) ? (
				// And right? Center
				\str_ends_with( $a, ':' ) ? 'c' : 'l' // Or left only
			) : (
				// Right only?
				\str_ends_with( $a, ':' ) ? 'r' : '' // Or nothing
			) 
		);
	}, tableCells( $m['align'] ?? '' , true ) );
		
	// Table column headers
	$headers	= 
	tableRow( 
		tableCells( $m['headers'] ?? '' ), 
		$align, 
		template( 'tpl_table_h_cell' )
	);
	
	// Table column footers
	$footers	= 
	tableRow( 
		tableCells( $m['footers'] ?? '' ), 
		$align,
		template( 'tpl_table_cell' )
	);
	
	// Odd/Even rows
	$oe	= 1;
	
	// Table body rows
	$rows	= 
	\array_map( function( $r ) use ( $align, &$oe ) {
		return 
		tableRow( 
			tableCells( $r ), 
			$align, 
			template( 'tpl_table_cell' ),
			$oe
		);
		$oe++;
	}, lines( $m['rows'] ?? '', -1, true ) );
	
	$body = \implode( '', $rows );
	
	if ( !empty( $headers ) && !empty( $footers ) ) {
		return 
		render( template( 'tpl_table' ), [ 
			'thead' 		=> $headers,
			'tfoot' 		=> $footers,
			'tbody' 		=> $body
		] );
		
	} elseif ( empty( $headers ) && !empty( $footers ) ) {
		return 
		render( template( 'tpl_table_nf' ), [ 
			'tfoot' 		=> $footers,
			'tbody'			=> $body
		] );
	} elseif ( !empty( $headers ) && empty( $footers ) ) {
		return 
		render( template( 'tpl_table_nh' ), [ 
			'thead' 		=> $headers,
			'tbody'			=> $body
		] );
	}
	
	return 
	render( template( 'tpl_table_nh_nf' ), [ 
		'tbody' => $body
	] );
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
) : string {
	static $filters;
	
	// Running footnotes
	static $running_f	= 0;
	$footnotes		= [];
	$fmarkers		= [];
	
	if ( empty( $filters ) ) {
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
				\sprintf( "<a href='%s'>%s</a>", $u, sanitize_escape_text( $t ) );
			}
			
			// This is an image
			// Fix titles / alt text
			$a = sanitize_escape_text( \strtr( $m[4] ?? $t, [ '\"' => '"' ] ), false, false );
			return
			\sprintf( "<img src='%s' alt='%s' title='%s' />", $u, sanitize_escape_text( $t ), $a );
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
		'/[^\`]\`([^\n`]+)\`/'			=>
		function( $m ) {
			return 
			\strtr( template( 'tpl_codeinline' ), [ 
				'{code}' => sanitize_escape_text( \trim( $m[1] ), false, false )
			] );
		},
		
		// Footnote
		'/(?:\[\^)(?<phrase>[[:alnum:]_\-]*)(?:\])((?:\:)(?:\s+)?' . 
		'(?<footnote>[[:print:]]*))?/si' =>
		function( $m ) use ( &$footnotes, &$running_f, &$fmarkers ) {
			
			// Definition missing? Make a placeholder
			if ( empty( $m['footnote'] ) ) {
				// Total running footnotes
				$running_f++;
				
				// Create placeholder slug
				$slug		= 
				'{footnote_marker_' . $running_f . '-' . 
				slugify( ( string ) $m['phrase'] ) . '}';
				
				// Create list for this phrase
				$fmarkers[$m['phrase']] ??= [];
				
				// Placeholder slug and link text phrase
				$fmarkers[$m['phrase']][] = $slug;
				return $slug;
			}
			
			// Footnote definition made separately
			$footnotes[$m['phrase']] = [
				'footnote'	=> $m['footnote'],
				'markers'	=> 
					$fmarkers[$m['phrase']] ?? []
			];
			return '';
		},
		
		// Tables
		'/(?:\|(?<headers>[^\n]+)\|\n{1}(?:[\+\:\|\-])' . 
		'(?<align>[\+\:\|\-]{1,})(?:[\|\+]\r?\n){1})?' . 
		'(?<rows>(?:\|[^\n=]+\|\n){1,})(?:\|[=\|]+\|\n\|' . 
		'(?<footers>[^\n]+)(?:\|\n))?/m'	=>
		function( $m ) {
			return empty( $m ) ? '' : tableBuild( $m );
		}
		];
		
		// Merge custom markdown filters
		hook( [ 'markdownfilter', [ 'filters' => $filters ] ] );
		$filters = 
		hookArrayResult( 'markdownfilter' )['filters'] ?? $filters;
	}
	
	$html	= \preg_replace_callback_array( $filters, $html );
	
	// Parse out footnotes, if any
	return formatFootnotes( $html, $footnotes );
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
 *  Quoted security policy attribute helper
 *   
 *  @param string	$atr	Security policy parameter
 *  @return string
 */
function quoteSecAttr( string $atr ) : string {
	// Safe allow list
	static $allow	= [ 'self', 'src', 'none' ];
	$atr		= \trim( sanitize_spaces( $atr ) );
	
	return 
	\in_array( $atr, $allow ) ? 
		$atr : '"' . sanitize_url( $atr ) . '"'; 
}

/**
 *  Parse security policy attribute value
 *  
 *  @param string	$key	Permisisons policy identifier
 *  @param mixed	$policy	Policy value(s)
 *  @return string
 */
function parsePermPolicy( string $key, $policy = null ) : string {
	// No value? Send empty set E.G. "interest-cohort=()"
	if ( empty( $policy ) ) {
		return bland( $key, true ) . '=()';
	}
	
	// Send specific value(s) E.G. "fullscreen=(self)"
	return 
	bland( $key, true ) . '=(' . 
	( \is_array( $policy ) ? 
		\implode( ' ', \array_map( 'quoteSecAttr', $policy ) ) : 
		quoteSecAttr( ( string ) $policy ) ) . 
	')';
}

/**
 *  Content Security and Permissions Policy settings
 *  
 *  @param string	$policy		Security policy header
 *  @return string
 */
function securityPolicy( string $policy ) : string {
	static $p;
	static $r	= [];
	
	// Load defaults
	if ( !isset( $p ) ) {
		$p = 
		setting( 'security_policy', \SECURITY_POLICY, 'json' );
		
		// Merge custom content security policy
		hook( [ 'cspload', [ 'policy' => $p ] ] );
		$p = hookArrayResult( 'cspload' )['policy'] ?? $p;
	}
	
	switch ( $policy ) {
		case 'common':
		case 'common-policy':
			if ( isset( $r['common'] ) ) {
				return $r['common'];
			}
			
			// Common header override
			$cfj = 
			config 
				'common-policy', 
				$p['common-policy'] ?? [], 
				'array',
				'bland' 
			);
			$r['common'] = \implode( "\n", $cfj );
			
			return $r['common'];
			
		case 'permissions':
		case 'permissions-policy':
			if ( isset( $r['permissions'] ) ) {
				return $r['permissions'];
			}
			
			$prm = [];
			
			// Permissions policy override
			$cfj = setting( 'permisisons-policy', [], 'json' );
			$def = $p['permissions-policy'] ?? [];
			$pjp = 
			\is_array( $cfj ) ? 
				\array_merge( $def, $cfj ) : $def;
			
			foreach ( $pjp as $k => $v ) {
				$prm[]	= parsePermPolicy( $k, $v );
			}
			
			$r['permissions'] = \implode( ', ', $prm );
			return $r['permissions'];
		
		case 'content-security':
		case 'content-security-policy':
			if ( isset( $r['content'] ) ) {
				return $r['content'];
			}
			$csp = '';
			$cjp = $p['content-security-policy'] ?? [];
			
			// Approved frame ancestors ( for embedding media )
			$frm = 
			\implode( ' ', 
				config 
					'frame_whitelist', 
					\FRAME_WHITELIST, 
				 	'array',
					'cleanUrl' 
				) 
			);
			
			foreach ( $cjp as $k => $v ) {
				$csp .= 
				( 0 == \strcmp( $k, 'frame-ancestors' ) ) ? 
					"$k $v $frm;" : "$k $v;";
			}
			$r['content'] = \rtrim( $csp, ';' );
			return $r['content'];
	}
	
	return '';
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
	
	// Set common policy headers
	$chead	= explode( "\n", securityPolicy( 'common-policy' ) );
	foreach ( $chead as $h ) {
		\header( $h, true );
	}
	
	// Set default permissions policy header
	$perms = securityPolicy( 'permissions-policy' );
	if ( !empty( $perms ) ) {
		\header( 'Permissions-Policy: ' . $perms , true );
	}
	
	// If sending CSP and content checksum isn't used
	if ( $send_csp ) {
		$csp = securityPolicy( 'content-security-policy' );
		if ( !empty( $csp ) ) {
			\header( 'Content-Security-Policy: ' . $csp, true );
		}
	
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
	$ap	= setting( 'allow_post', \ALLOW_POST, 'int' );
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
 *  Helper to generate header with protocol and message
 *  
 *  @param int		$code		HTTP Status code
 *  @param string	$msg		Header message
 */
function protocolHeader( int $code, string $msg ) {
	$prot = request_protocol();
	\header( "$prot $code $msg", true );
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
		if ( $code == 405 ) {
			sendAllowHeader();
		}
		return;
	}
	
	// Special cases
	match( $code ) {
		416	=> protocolHeader( 416, 'Range Not Satisfiable' ),
		422	=> protocolHeader( 422, 'Unprocessable Entity' ),
		425	=> protocolHeader( 425, 'Too Early' ),
		429	=> protocolHeader( 429, 'Too Many Requests' ),
		431	=> protocolHeader( 431, 'Request Header Fields Too Large' ),
		503	=> protocolHeader( 503, 'Service Unavailable' ),
		default	=> logError( 'Unknown status code "' . $code . '"' )
	};
	die();
}

/**
 *  Format available sites with default parameters
 *  
 *  @param array	$sites		Available sites
 *  @return array
 */
function formatSites( array $sites ) : array {
	if ( empty( $sites ) ) {
		return [];
	}
	
	$se = [];
	foreach ( $sites as $host => $base ) {
		// Skip if invalid hostname
		if ( false === \filter_var( 
			$host, 
			\FILTER_VALIDATE_DOMAIN,
			\FILTER_FLAG_HOSTNAME
		) ) {
			continue;
		}
		
		// Add default site if empty
		if ( empty( $base ) ) {
			$base	= [
				config( 
					'default_basepath', 
					\DEFAULT_BASEPATH, 
					'json' 
				)
			];
		}
	
		// Decode went wrong or setting is invalid
		if ( !\is_array( $base ) ) {
			continue;
		}
		
		// Found sub sites
		$f = [];
		
		// Set default sub parameters
		foreach ( $base as $b ) {
			if ( !\is_array( $b ) ) {
				continue;
			}
			
			// Slash basepath
			$b['basepath'] = 
				slashPath( $b['basepath'] ?? '/' );
		
			// Set active mode if not set
			$b['is_active']		??= 1;
			
			// Set maintenance mode
			$b['is_maintenance']	??= 0;
			
			// Custom site settings, or default
			$b['settings']		??= [];
			$b['settings']		= 
			\array_merge( [
				'page_title'		=> config( 'page_title', \PAGE_TITLE ),
				'page_sub'		=> config( 'page_sub', \PAGE_SUB ),
				'page_limit'		=> config( 'page_limit', \PAGE_LIMIT ),
				'language'		=> config( 'language', \LANGUAGE )
			], $b['settings'] );
			$f[] = $b;
		}
		
		// No valid sites?
		if ( empty( $f ) ) {
			continue;
		}
		// Append to enabled sites under this host
		$se[$host] = $f;
	}
	
	return $se;
}

/**
 *  Get whitelisted sites and associated paths
 *  
 *  @return array
 */
function getSitesEnabled() : array {
	static $sw;
	if ( isset( $sw ) ) {
		return $sw;
	}
	$sw	= 
	formatSites(
		config( '', \SITES_ENABLED, 'json' )
	);
	
	return $sw;
}

/**
 *  Host server name
 *  @return string
 */
function getHost() : string {
	static $host;
	if ( isset( $host ) ) { return $host; }
	
	$sk	= getSitesEnabled();
	$sw	= util_trimmed_list( implode( ',', array_keys( $sk ) ), true );
	$raw	= request_host();

	$host	= isset( $sw[$raw] ) ? lowercase( $raw ) : '';
	
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
	$sp		= getSitesEnabled();
	
	$sa	= [];
	$ss	= [];
	foreach ( $sp[$host] as $s ) {
		// Assume inactive site if not explicitly enabled
		$a = ( bool ) ( $s['is_active'] ?? false );
		
		// Path based settings
		$b = slashPath( $s['basepath'] ?? '/' );
		$ss[] = [ $b => $s['settings'] ?? [] ];
		
		if ( $a ) {
			$sa[] = $b;
		}
	}
	
	\natcasesort( $sa );
	$sa	= \array_unique( $sa, \SORT_STRING );
	
	hook( [ 'gethostpaths', [
		'allpaths'	=> $sp,
		'current'	=> $sa,
		'settings'	=> $ss
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
 *  Set expires header
 */
function setCacheExp( int $ttl ) {
	\header( 'Cache-Control: max-age=' . $ttl, true );
	\header( 'Expires: ' . 
		\gmdate( 'D, d M Y H:i:s', time() + $ttl ) . 
		' GMT', true );
}

/**
 *  Clean the output buffer without flushing
 *  
 *  @param bool		$ebuf		End buffers
 */
function cleanOutput( bool $ebuf = false ) {
	if ( $ebuf ) {
		while ( \ob_get_level() > 0 ) {
			\ob_end_clean();
		}
		return;
	}
	
	while ( \ob_get_level() && \ob_get_length() > 0 ) {
		\ob_clean();
	}
}

/**
 *  Remove previously set headers, output
 */
function scrubOutput() {
	// Scrub output buffer
	cleanOutput();
	\header_remove( 'Pragma' );
	
	// This is best done in php.ini : expose_php = Off
	\header( 'X-Powered-By: nil', true );
	\header_remove( 'X-Powered-By' );
}

/**
 *  Flush and optionally end output buffers
 *  
 *  @param bool		$ebuf		End buffers
 */
function flushOutput( bool $ebuf = false ) {
	if ( $ebuf ) {
		while ( \ob_get_level() > 0 ) {
			\ob_end_flush();
		}
	} else {
		while ( \ob_get_level() > 0 ) {
			\ob_flush();	
		}
	}
	flush();
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
		$ex	= setting( 'cache_ttl', \CACHE_TTL, 'int' );
		$full	= request_url();
		
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
	shutdown( 'flushOutput', [ true ] );
	
	// Check gzip prerequisites
	if ( $code != 304 && \extension_loaded( 'zlib' ) ) {
		\ob_start( 'ob_gzhandler' );
	}
	echo $content;
	
	// End
	die();
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
	die();
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
	$ptitle	= setting( 'page_title', \PAGE_TITLE );
	$psub	= setting( 'page_sub', \PAGE_SUB );
	
	
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
		send( $code, $html );
	}
	
	// Send standard error page if nothing handled
	$params	= [ 
		'page_title'	=> $ptitle,
		'tagline'	=> $psub,
		'code'		=> $code,
		'body'		=> $body 
	];
	send( $code, render( template( 'tpl_error_page' ), $params ) );
}

/**
 *  Invalid file range error page helper
 */
function sendRangeError() {
	visitorError( 416, 'Range' );
	sendError( 416, errorLang( "filerange", \MSG_FILERANGE ) );
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
		'home'	=> pageRoutePath(),
		'host'	=> getHost(),
		'root'	=> getRoot(),
		'code'	=> $code,
		'page'	=> $page 
	] ] );
	
	// Send redirect with requested code
	redirect( $code, slashPath( pageRoutePath(), true ) . $page );
}

/**
 *  Send bad request page and log the visit
 *  
 *  @param string	$vlog		Logged error message
 *  @param string	$msg		Language error sent to visitor
 *  @param string	$default	Fallback language error message
 */
function sendBadRequest(
	string	$vlog		= 'Host', 
	string	$msg		= 'invalid',
	string	$default	= \MSG_INVALID
) {
	visitorError( 400, $vlog );
	sendError( 400, errorLang( $msg, $default ) );
}

/**
 *  Send bad URI page and log the visit
 *  
 *  @param string	$vlog		Logged error message
 *  @param string	$msg		Language error sent to visitor
 *  @param string	$default	Fallback language error message
 */
function sendBadURI(
	string	$vlog		= 'Path', 
	string	$msg		= 'invalid',
	string	$default	= \MSG_INVALID
) {
	visitorError( 414, $vlog );
	send( 414, errorLang( $msg, $default ) );
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
 *  Send method not allowed
 *  
 *  @param string	$vlog		Logged error message
 *  @param string	$msg		Language error sent to visitor
 *  @param string	$default	Fallback language error message
 */
function sendBadMethod(
	string	$vlog		= 'Method', 
	string	$msg		= 'badmethod', 
	string	$default	= \MSG_BADMETHOD 
) {
	visitorError( 405, $vlog );
	sendError( 405, errorLang( $msg, $default ) );	
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
 *  File mime-type detection helper
 *  
 *  @param string	$path	Fixed file path
 *  @return string
 */
function detectMime( string $path ) : string {
	$ext = \pathinfo( $path, \PATHINFO_EXTENSION ) ?? '';
		
	// Simpler text types
	switch( \strtolower( $ext ) ) {
		case 'txt':
			return 'text/plain';
			
		case 'css':
			return 'text/css';
			
		case 'js':
			return 'text/javascript';
			
		case 'svg':
			return 'image/svg+xml';
			
		case 'vtt':
			return 'text/vtt';
	}
	
	// Intercept potential mime warning as error
	\set_error_handler( function( 
		$eno, $emsg, $efile, $eline 
	) use ( $path ) {
		$str	= 
		'Unable to detect mime of ' . $path . ' ' .  
		'Message: {msg} File: {file} Line: {line}';
			
		logException( 
			new \ErrorException( 
				$emsg, 0, $eno, $efile, $eline 
			), $str 
		);
	}, E_WARNING );
	
	// Detect other mime types
	$mime = \mime_content_type( $path );
	
	\restore_error_handler();
	
	return ( false === $mime ) ? 
		'application/octet-stream' : $mime;
}

/**
 *  Create a digest hash of a file
 *  
 *  @param string	$path	File path
 *  @param string	$algo	Hashing scheme
 */
function fileDigest( string $path, string $algo	= 'sha384' ) : string {
	static $done	= [];
	
	if ( empty( $path ) || empty( $algo ) ) {
		return '';
	}
	
	$key = $algo . $path;
	
	if ( \array_key_exists( $key, $done ) ) {
		return $done[$key];
	}
	
	if ( !validHashAlgo( $algo, false ) ) {
		return '';
	}
	if ( 
		empty( $path ) || 
		!\is_file( $path ) || 
		!\is_readable( $path ) 
	) {
		return '';
	}
	
	$done[$key] = 
	\base64_encode( \hash_file( $algo, $path, true ) );
	
	return $done[$key];
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
	if ( $verify && $code != 206 ) {
		$mime	= detectMime( $path );
		\header( "Content-Type: {$mime}", true );
	}
	\header( "Content-Security-Policy: default-src 'self'", true );	
}

/**
 *  Open a file stream in binary mode and set blocking mode
 *  
 *  @param mixed	$stream		File resource or false if initializing
 *  @param string	$path		File path
 *  @param string	$mode		File access mode
 *  @param bool		$block		Set blocking mode (defaults to false)
 *  @return resource|false
 */
function openStream( 
		&$stream, 
	string	$path,
	string	$mode,
	bool	$block	= false 
) {
	$stream = fopen( $path, $mode, false );
	if ( false === $stream ) {
		return;
	}
	\stream_set_blocking( $stream, $block );
}

/**
 *  Close opened stream
 *  
 *  @param resource	$stream		Open file stream
 */
function closeStream( &$stream ) {
	if ( false === $stream ) {
		return;
	}
	fclose( $stream );
	$stream = false;
}

/**
 *  Stream content in chunks within starting and ending limits
 *  
 *  @param resource	$instream	Source input content stream
 *  @param resource	$outstream	Content destination stream
 *  @param int		$int		Starting offset
 *  @param int		$end		Ending offset or end of file
 *  @param callable	$iter		Optional iteration action
 *  @param callable	$abort		Optional abort action
 *  @return int
 */
function streamChunks( 
		&$instream, 
		&$outstream, 
	int	$start, 
	int	$end,
		$iter		= null, 
		$abort		= null
) : int {
	$is_iter	= \is_callable( $iter );
	$is_abort	= \is_callable( $abort );
	
	// Total bytes read
	$read		= 0;
	
	// Seek to new start if not starting from the beginning
	if ( 0 !== $start ) {
		\rewind( $instream );
		\fseek( $instream, $start, \SEEK_SET );
	}
	
	// Check for aborted connection between flushes
	if ( \connection_aborted() ) {
		closeStream( $instream );
		closeStream( $outstream );
		if ( $is_abort ) {
			\call_user_func( $abort );
		}
		return $read;
	}
			
	// Reset limit while streaming
	\set_time_limit( 20 );
	
	$buf		= 
	\stream_copy_to_stream( $instream, $outstream, $end );
	
	if ( false === $buf ) {
		if ( $is_iter ) {
			\call_user_func( $iter );
		}
		return 0;
	}
	
	$read += $buf;
	if ( $is_iter ) {
		\call_user_func( $iter );
	}
	
	return $read;
}

/**
 *  Read and output file contents via stream
 *  
 *  @param string	$source Streaming source or read location
 *  @param string	$dest	Output or write destination
 *  @param int		$clen	Maximum content length to stream
 *  @return total bytes read
 */
function streamFile( 
	string	$source, 
	string	$dest, 
	int	$clen, 
		$iter		= null, 
		$abort		= null
) : int {
	
	// Default chunk size
	$chunk	= setting( 'stream_chunk_size', \STREAM_CHUNK_SIZE, 'int' );
	$chunk	= util_int_range( $chunk, 2, 32768 );
	
	openStream( $from, $source, 'rb' );
	if ( false === $from ) {
		return 0;
	}
	
	openStream( $to, $dest, 'w' );
	if ( false === $dest ) {
		closeStream( $to );
		return 0;
	}
	
	\stream_set_chunk_size( $from, $chunk );
	
	$total		= 0;
	$start		= 0;
	$end		= $chunk - 1;
	
	while( $total < $clen ) {
		$read		= 
		streamChunks( 
			$from, $to, $start, $end, $iter, $abort 
		);
	
		if ( empty( $read ) ) {
			return $total;
		}
		
		$total		+= $read;
		$start		+= $read;
		$end		+= $start + $chunk - 1;
	}
	
	closeStream( $to );
	closeStream( $from );
	
	return $read;
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
	$climit = setting( 'stream_chunk_limit', \STREAM_CHUNK_LIMIT, 'int' );
	
	if ( false !== $fsize ) {
		\header( "Content-Length: {$fsize}", true );
		if ( !empty( $etag ) ) {
			\header( "ETag: {$etag}", true );
		}
		
		$fmod	= $tags['fmod'];
		if ( $fmod ) {
			\header( 
				'Last-Modified: ' . 
				util_rfc_file_date( $fmod ), 
				true
			);
		}
	}
	
	// Send any headers and end buffering
	flushOutput( true );
	
	if ( request_modified( $etag ) && $fsize !== false ) {
		if ( $fsize <= $climit ) {
			\readfile( $path );
			return;
		}
		streamFile( $path, 'php://output', $fsize, 'flushOutput', 'visitorAbort' );
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
	
	\header( "Accept-Ranges: bytes", true );
	
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
	cleanOutput( true );
	
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
	"<meta http-equiv=\"refresh\" content=\"0;url=\"{$path}\">".
	"</head><body><a href=\"{$path}\">continue</a></body></html>";
	
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
	die();
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
	die();
}

/**
 *  Check if content is already cached for this URI
 *  
 *  @param string	$path	Current request path
 */
function handleCache( string $path ) {
	$cache	= getCache( request_url() );
	
	if ( empty( $cache ) ) {
		return;
	}
	
	// If URI is already saved, send contents and exit
	
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
	foreach ( $routes as $r ) {
		// Method has a handler
		if ( 0 === \strcasecmp( $r[0], $verb ) ) {
			$mfound = true;
			break;
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
				die();
			
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
	sessionCheck();
	
	$host	= getHost();
	
	// Empty host?
	if ( empty( $host ) ) {
		sendBadRequest();
	}
	
	// Sanity checks
	$path	= request_uri();
	$verb	= request_method();
	$safe	= getAllowedMethods( true );
	
	// Unrecognized method?
	if ( !\in_array( $verb, $safe ) ) {
		sendBadMethod();
	}
	
	// If posting isn't allowed files should be empty
	if ( 
		!setting( 'allow_post', \ALLOW_POST, 'bool' ) && 
		!empty( $_FILES ) 
	) {
		sendBadMethod();
	}
	
	// Request path hard limit
	$lurl	= setting( 'max_url_size', \MAX_URL_SIZE, 'int' );
	if ( strsize( $path ) > $lurl ) {
		sendBadURI();
	}
	
	// Request path (simpler filter before proper XSS scan)
	if ( 
		false !== \strpos( $path, '..' )	|| 
		false !== \strpos( $path, '<' )		|| 
		\preg_match( RX_XSS3, $path )		|| 
		\preg_match( RX_XSS4, $path )
	) {
		sendBadRequest( 'Path', 'invalid' );
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
	setting( 'ext_whitelist', whiteLists( util_json_decode( \EXT_WHITELIST ), true ) );
	
	// Extend whitelist via hooks
	hook( [ 'extwhitelist', [ 'whitelist' => $cs ] ] );
	$sent	= hookArrayResult( 'extwhitelist', [] );
	
	// Filtered whitelist
	$ext	= empty( $sent ) ? $cs : 
		\array_merge( $cs, $sent['whitelist'] ?? [] );
	
	$all	= \implode( ',', $ext );
	
	return empty( $group ) ? 
		\array_unique( util_trimmed_list( $all, true ) ) : 
		\array_unique( util_trimmed_list( $ext[$group] ?? '', true ) );
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
	static $markers;
	if ( !isset( $markers ) ) {
		$markers = setting( 'route_mark', \ROUTE_MARK, 'json' );
	}
	return \array_merge( $hook, $markers );
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
	$code	= request_modified( $tags['etag'] )? 200 : 304;
	
	// Send on success
	return sendFile( $path, false, true, $code );
}

/**
 *  Handle ranged file request
 *  
 *  @param string	$path		Absolute file path
 *  @param bool		$dosend		Send file ranges if true
 *  @return bool
 */
function sendFileRange( string $path, bool $dosend ) : bool {
	$fsize	= \filesize( $path );
	$frange	= request_range_header( $fsize );
	if ( empty( $frange ) ) {
		sendRangeError();
	}
	
	$fend	= $fsize - 1;
	$totals	= 0;
	
	// Check if any ranges are outside file limits
	foreach ( $frange as [ $start, $end ] ) {
		if ( $start > $end || $end > $fend ) {
			sendRangeError();
		}
		
		$totals += ( $end - $start ) + 1;
	}
	
	if ( !$dosend ) { return true; }
	
	openStream( $stream, $path, 'rb' );
	if ( false === $stream ) {
		shutdown( 'logError', 'Error opening ' . $path );
		sendError( 500, errorLang( "generic", \MSG_GENERIC ) );
	}
	
	openStream( $out, 'php://output', 'w' );
	if ( false === $out ) {
		closeStream( $stream );
		shutdown( 'logError', 'Error outputting ' . $path );
		sendError( 500, errorLang( "generic", \MSG_GENERIC ) );
	}
	
	// Default chunk size
	$chunk	= setting( 'stream_chunk_size', \STREAM_CHUNK_SIZE, 'int' );
	$chunk	= util_int_range( $chunk, 2, 32768 );
	
	\stream_set_chunk_size( $stream, $chunk );
	
	// Prepare partial content
	sendFilePrep( $path, 206, false );
	\header( "Accept-Ranges: bytes", true );
	
	$mime	= detectMime( $path );
	
	// Generate boundary
	$bound	= \base64_encode( \hash( 'sha1', $path . $fsize, true ) );
	\header(
		"Content-Type: multipart/byteranges; boundary={$bound}",
		true
	);
	
	\header( "Content-Length: {$totals}", true );
	
	// Send any headers and end buffering
	flushOutput( true );
	
	// Start fresh buffer
	\ob_start();
	
	$limit = 0;
	
	foreach ( $frange as [ $start, $end ] ) {
		echo "\n--{$bound}";
		echo "Content-Type: {$mime}";
		echo "Content-Range: bytes {$start}-{$end}/{$fsize}\n";
		
		$limit = $end + 1;
		streamChunks( $stream, $out, $start, $limit, 'flushOutput', 'visitorAbort' );
	}
	
	closeStream( $stream );
	closeStream( $out );
	flushOutput( true );
	return true;
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
	$climit	= setting( 'folder_limit', \FOLDER_LIMIT, 'int' );
	$c	= count( $segs );
	if ( $c > $climit ) {
		return false;
	}
	
	// Check if ranged request
	$ranged	= request_is_ranged();
	
	// Static file path
	$fpath	= getPostFileDir( 'file' ) . $path;
	
	if ( \file_exists( $fpath ) ) {
		$frange = request_range_header( \filesize( $fpath ) );
		if ( $ranged && empty( $frange ) ) {
			sendRangeError();
		}
		
		return empty( $frange ) ?
			( $dosend ? sendWithEtag( $fpath ) : true ) : 
			sendFileRange( $fpath, $dosend );
	}
	
	return false;
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
 *  @return array
 */
function getPosts( string $root = '' ) : array {
	static $st	= [];
	$key		= \hash( 'sha1', $root );
	
	if ( isset( $st[$key] ) ) {
		return $st[$key];
	}
	
	$pd	= getPostFileDir( 'posts' ) . $root;
	if ( !\is_dir( $pd ) ) {
		$st[$key] = [];
		return $st[$key];
	}
	
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
		
		$st[$key]	= $tmp;
		return $tmp;
		
	} catch( \Exception $e ) {
		shutdown( 
			'logError', 
			'Error retrieving posts from ' . $pd . ' ' . 
			$e->getMessage() ?? 'Directory search exception'
		);
	}
	
	return [];
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
	$ext	= filterExt( $info['extension'] ?? '' );
	$name	= $info['filename'];
	$dir	= $info['dirname'];
	$file	= $path;
	$i	= 0;
	
	while ( \file_exists( $file ) ) {
		$file = slashPath( $dir, true ) . 
			$name . '_' . $i++ . 
			\rtrim( '.' . $ext, '.' );
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
	statement( $db, 'DELETE FROM posts WHERE post_path = :path' );
	
	// Post insertion statement
	$pstm		= 
	statement( $db, 
		"INSERT OR IGNORE INTO posts( 
			post_path, post_view, post_bare, post_summary, 
			post_type, updated, published 
		) 
		VALUES ( :path, :pview, :bare, :summary, :type, :updated, :pub );" 
	);
	
	// Select post statement
	$sstm		=
	statement( $db, 'SELECT id FROM posts WHERE post_path = :perm LIMIT 1;' );
	
	// Post tag association statement
	$tstm		= 
	statement( $db, 
		"INSERT OR IGNORE INTO post_tags( post_id, tag_slug ) 
		VALUES ( :id, :tag );"
	);
	
	// Tag insertion statement
	$istm		= 
	statement( $db, 
		"INSERT OR IGNORE INTO tags( slug, term ) 
		VALUES ( :slug, :term );" 
	);
	
	
	if ( $db->beginTransaction() ) {
		// Carry out delete
		$dstm->execute( [':path' => $path ] );
		$dstm->closeCursor();
		
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
	$fline	= setting( 'feature_lines', \FEATURE_LINES, 'int' );
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
	$tz = setting( 'timezone', \TIMEZONE );
	$dt = new \DateTime( 'now', new \DateTimeZone( 'UTC' ) );
	try {
		$dz = new \DateTimeZone( $tz );
		$ot = $dz->getOffset( $dt );
		
	} catch( \Exception $e ) { // Default fallback
		shutdown( 'logError', 'Invalid timezone set ' . $tz );
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
	
	return util_utc( empty( $fr ) ? 'now' : $fr );
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
	$ft = \strtotime( util_utc( $res[0]['updated'] ) );
	$mt = \strtotime( util_utc( $mtime ) );
	
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
		$line = \trim( sanitize_spaces( $post[$p] ) );
		
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
	return html( $find['all'] ?? '', pageRoutePath() );
}

/**
 *  Try to parse post category tags
 *  
 *  @param array	$find	Content as labled regular expression match
 *  @return array
 */
function extractTags( array $find ) : array {
	// Clean tags
	$tags	= \array_filter( util_trimmed_list( $find['tags'] ?? '' ) );
	
	// No tags left after cleaning?
	if ( empty( $tags ) ) {
		return [];
	}
	
	// Ensure tags don't exceed limit
	$tl	= setting( 'tag_limit', \TAG_LIMIT, 'int' );
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
	return util_json_decode( $find['all'] ?? '' );
}

/**
 *  Parse current post's type or send default type
 */
function extractType( array $find ) : string {
	return 
	lowercase( labelName( 
		$find['label'] ?? 
		setting( 'post_type', \POST_TYPE )
	) );
}

/**
 *  Initialize core features and append any hook features
 *  
 *  @return array
 */
function initPostFeatures( array $post ) : array {
	static $markers;
	if ( !isset( $markers ) ) {
		$markers = getMarkers();
	}
	
	$summ	= $markers[':all'] ?? '(?<all>.+)';
	$tags	= $markers[':tags'] ?? '(?<tags>[\pL\pN\s_\,\-]{1,255})';
	$label	= $markers[':label'] ?? '(?<label>[\pL\pN\s_\-]{1,30})';
	
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
	
	$stm->closeCursor();
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
		$sstm->closeCursor();
		
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
	$tstm->closeCursor();
	
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
	$plimit	= setting( 'page_limit', \PAGE_LIMIT, 'int' );
	$start	= ( $page - 1 ) * $plimit;
	$end	= $start + $plimit;
	
	$title	= '';
	$tpl	= $feed ? template( 'tpl_item' ) : template( 'tpl_index_post' );
	$fline	= setting( 'feature_lines', \FEATURE_LINES, 'int' );
	
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
		':updated'	=> util_utc( $mtime ), 
		':pub'		=> $pub
	];
	
	if ( $pstm->execute( $params ) ) {
		$pstm->closeCursor();
		return true;
	}
	$pstm->closeCursor();
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
	statement( $db, 
	"INSERT OR IGNORE INTO tags( slug, term ) 
		VALUES ( :slug, :term );" 
	);
	
	// Post insertion statement
	$pstm		= 
	statement( $db, 
		"INSERT OR IGNORE INTO posts( 
			post_path, post_view, post_bare, post_summary, 
			post_type, updated, published 
		) 
		VALUES ( :path, :pview, :bare, :summary, :type, :updated, :pub );" 
	);
	
	// Select post statement
	$sstm		=
	statement( $db, 
		"SELECT id FROM posts WHERE post_path = :perm LIMIT 1;"
	);
	
	// Post tag association statement
	$tstm		= 
	statement( $db, 
		"REPLACE INTO post_tags( post_id, tag_slug ) 
		VALUES ( :id, :tag );"
	);
	
	// Returns are limited by page and index?
	$limited	= ( $limit > 0 ) ? true : false;
	$i		= 0;
	$j		= 0;
	
	$fline		= setting( 'feature_lines', \FEATURE_LINES, 'int' );
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
		$rtt		= setting( 'readtime_types', \READTIME_TYPES );
		$default	= util_trimmed_list( $rtt, true );
		
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
		'date_rfc'	=> util_rfc_date( $pub ),
		'date_stamp'	=> hookStringResult( 'formatpublished', dateNice( $pub ) ),
		'read_time'	=> hookStringResult( 'formatreadtime', $read ),
		'tags'		=> formatTags( $tags, $index ),
		'permalink'	=> 
		request_origin() . dateSlug( \basename( $path ), $pub )
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
	$body	= html( \implode( "\n", $post ), pageRoutePath() );
	
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
	$mpage	= setting( 'max_page', \MAX_PAGE, 'int' );
	$ys	= setting( 'year_start', \YEAR_START, 'int' );
	$ye	= ( int ) \date( 'Y', $now );
	
	$filter	= [
		'id'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'flags'		=> \FILTER_REQUIRE_SCALAR,
			'options'	=> [
				'min_range'	=> 1,
				'default'	=> 0
			]
		],
		'page'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'flags'		=> \FILTER_REQUIRE_SCALAR,
			'options'	=> [
				'min_range'	=> 1,
				'max_range'	=> $mpage,
				'default'	=> 1
			]
		],
		'year'	=> [
			'filter'	=> \FILTER_SANITIZE_NUMBER_INT,
			'flags'		=> \FILTER_REQUIRE_SCALAR,
			'options'	=> [
				'min_range'	=> $ys,
				'max_range'	=> $ye,
				'default'	=> $ye
			]
		],
		'month'	=> [
			'filter'	=> \FILTER_SANITIZE_NUMBER_INT,
			'flags'		=> \FILTER_REQUIRE_SCALAR,
			'options'	=> [
				'min_range'	=> 1,
				'max_range'	=> 12,
				'default'	=> 
				( int ) \date( 'n', $now )
			]
		],
		'day'	=> [
			'filter'	=> \FILTER_SANITIZE_NUMBER_INT,
			'flags'		=> \FILTER_REQUIRE_SCALAR,
			'options'	=> [
				'min_range'	=> 1,
				'max_range'	=> 31,
				'default'	=> 
				( int ) \date( 'j', $now )
			]
		],
		'tag'	=> [
			'filter'	=> \FILTER_CALLBACK,
			'options'	=> 
			function( $v ) {
				return \is_scalar( $v ) ? 
					sanitize_spaces( ( string ) $v ) : '';
			}
		],
		'slug'	=> [
			'filter'	=> \FILTER_SANITIZE_FULL_SPECIAL_CHARS,
			'flags'		=> \FILTER_REQUIRE_SCALAR,
			'options'	=> [ 'default' => '' ]
		],
		'find'	=> [
			'filter'	=> \FILTER_CALLBACK,
			'options'	=> 
			function( $v ) {
				return \is_scalar( $v ) ? 
					sanitize_spaces( ( string ) $v ) : '';
			}
		],
		'tree'	=> [
			'filter'	=> \FILTER_CALLBACK,
			'options'	=> 
			function( $v ) {
				return \is_scalar( $v ) ? 
					sanitize_url( ( string ) $v ) : '';
			}
		],
		'token'	=> [
			'filter'	=> \FILTER_SANITIZE_FULL_SPECIAL_CHARS,
			'flags'		=> \FILTER_REQUIRE_SCALAR
		],
		'nonce'	=> [
			'filter'	=> \FILTER_SANITIZE_FULL_SPECIAL_CHARS,
			'flags'		=> \FILTER_REQUIRE_SCALAR
		],
		'meta'	=> [
			'filter'	=> \FILTER_SANITIZE_FULL_SPECIAL_CHARS,
			'flags'		=> \FILTER_REQUIRE_SCALAR
		]
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
	$ptitle	= setting( 'page_title', \PAGE_TITLE );
	$psub	= setting( 'page_sub', \PAGE_SUB );
	
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
	$mlinks	= setting( 'default_main_links', \DEFAULT_MAIN_LINKS );
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
		'lang'		=> setting( 'language', \LANGUAGE ),
		'home'		=> pageRoutePath(),
		'body_before'	=> $heading
	];
	
	if ( empty( $posts ) ) {
		// No posts message with home link set
		$tpl['body']		= 
		render( 
			template( 'tpl_noposts' ), 
			[ 'home'	=> pageRoutePath() ] 
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
	send( 200, $page_t, $cache );
}



/**
 *  User input and form processing
 */


/**
 *  Data integrity session flag helper
 *  
 *  @param string	$reset		Renew the token flag if given
 *  @param string	$label		Token identity defaults to 'token'
 *  @return string
 */ 
function tokenKey( bool $reset = false, string $label = 'token' ) : string {
	sessionCheck();
	if ( empty( $_SESSION[$label] ) || $reset ) {
		$_SESSION[$label] = genId();
	}
	
	return $_SESSION[$label];
}

/**
 *  Initiate anti-CSRF session flag holder
 */
function initCSRFSession() : void {
	sessionCheck();
	if ( empty( $_SESSION['csrf'] ) ) {
		$_SESSION['csrf'] = [];
	}
}

/**
 *  Find form-specific anti-CSRF token
 *  
 *  @param string	$form	Per-session, form-specific, unique label
 *  @return string
 */
function getCSRFToken( string $form ) : string {
	initCSRFSession();
	return $_SESSION['csrf'][$form] ?? '';
}

/**
 *  Generate an anti-CSRF token
 *  
 *  @param string	$form	Form label specific to the session token
 *  @return array
 */
function setCSRFToken( string $form ) : array {
	initCSRFSession();
	
	$key				= genId( 32 );
	$nonce				= genId( 6 );
	$_SESSION['csrf'][$form]	= $key;
	
	return [ 
		'nonce'	=> $nonce, 
		'token' => \hash_hmac( 'tiger160,4', $key, $nonce )
	];
}

/**
 *  Verify anti-cross-site request forgery token
 *  
 *  @param string	$token	Raw token sent from user form
 *  @param string	$nonce	Nonce taken from user form
 *  @param string	$form	Form label specific to the session token
 *  @return string
 */
function validateCSRFToken( string $token, string $nonce, string $form ) : bool {
	
	$ln	= strsize( $nonce );
	$lt	= strsize( $token );
	
	// Sanity check
	if ( 
		$ln > 100 || 
		$ln <= 10 || 
		$lt > 350 || 
		$lt <= 10
	) {
		return false;
	}
	
	$key	= getCSRFToken( $form );
	
	return 
	\hash_equals( $token, \hash_hmac( 'tiger160,4', $key, $nonce ) );
}

/**
 *  Generate a hash for meta data sent to HTML forms
 *  
 *  This function helps reduce tampering of metadata sent separately
 *  to the user via other hidden fields
 *  
 *  @example genMetaKey( [ 'id' => 12,'name' => 'DoNotChange' ] ); 
 *  
 *  @param array	$args	Form field names sent to generate key
 *  @param bool		$reset	Reset any prior token key if true
 *  @param bool		$enc	Encode to base64 if true (default)
 *  @return string
 */
function genMetaKey( 
	array	$data, 
	bool	$reset	= false, 
	bool	$enc	= true 
) : string {
	static $gen	= [];
	
	$params		= util_json_encode( $data );
	$key		= \hash( 'tiger160,4', $params );
	
	if ( \array_key_exists( $key, $gen ) && !$reset ) {
		return $enc ? \base64_encode( $gen[$key] ) : $gen[$key];
	}
	
	$gen[$key]	= 
	\hash( 'tiger160,4', $params . tokenKey( $reset, 'metadata' ), true );
	
	return $enc ? \base64_encode( $gen[$key] ) : $gen[$key];
}

/**
 *  Verify meta data key
 *  
 *  @param string	$key	Token key name
 *  @param array	$data	Original form field names sent to generate key
 *  @return bool		True if token matched
 */
function verifyMetaKey( string $key, array $data ) : bool {
	if ( empty( $key ) ) {
		return false;
	}
	
	$info	= \base64_decode( $key, true );
	if ( false === $info ) {
		return false;
	}
	
	return \hash_equals( $info, genMetaKey( $data, false, false ) );
}

/**
 *  Generate form fields using templates and built-in cross-site protection
 *  
 *  @param string	$ftype		Input form type
 *  @param array	$meta		Fixed metadata which shouldn't be modified
 *  @param string	$previous	Return link to redirect after processing
 *  @return string
 */
function genForm( 
	string	$ftype, 
	array	$meta		= [], 
	string	$previous	= '' 
) : string {
	$csrf	= setCSRFToken( $ftype );
	
	// Populate anti-CSRF inputs
	$xsrf	= 
	\strtr( template( 'tpl_input_xsrf' ), [
		'{token}'	=> $csrf['token'],
		'{nonce}'	=> $csrf['nonce'],
		'{return}'	=> $previous,
		
		// Default metadata to session token if none given
		'{meta}'	=> 
		empty( $meta ) ? 
			genMetaKey( [ 'session' => tokenKey() ] ) : 
			genMetaKey( $meta )
	] );
	
	return 
	\strtr( template( 'tpl_' . $ftype . '_form' ), [ '{xsrf}' => $xsrf ] );
}

/**
 *  Validate submitted form field against XSRF behavior
 *  
 *  @param string	$form		Unique form name per session to verify
 *  @param string	$itype		Data submission method
 *  @return bool
 */
function validateForm( 
	string	$form,
	string	$itype, 
	array	$fields	= [] 
) : bool {
	$data	= 
	sanitize_input_array( $itype, [
		'token'	=> [
			'filter'	=> \FILTER_SANITIZE_FULL_SPECIAL_CHARS,
			'flags'		=> \FILTER_REQUIRE_SCALAR
		],
		'nonce'	=> [
			'filter'	=> \FILTER_SANITIZE_FULL_SPECIAL_CHARS,
			'flags'		=> \FILTER_REQUIRE_SCALAR
		],
		'meta'	=> [
			'filter'	=> \FILTER_SANITIZE_FULL_SPECIAL_CHARS,
			'flags'		=> \FILTER_REQUIRE_SCALAR
		]
	] );
	
	if ( empty( $data['token'] ) || empty( $data['nonce'] ) ) {
		return false;
	}
	
	if ( validateCSRFToken( $data['token'], $data['nonce'], $form ) ) {
		return 
		empty( $fields ) ? 
			true : verifyMetaKey( $data['meta'] ?? '', $fields );
	}
	
	return false;
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
	$text = \strip_tags( sanitize_spaces( $text ) );
	
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
		// Default character and measurement sets
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
	$sc	= setting( 'max_search_words', \MAX_SEARCH_WORDS, 'int' );
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
	// Send search form hook output
	return
	hookWrap( 
		'beforesearchform',
		'afterearchform',
		genForm( 'search', [ 'session' => 'none' ] ), 
		[ 'session' => 'none' ]
	);
}

/**
 *  Render search pagination path
 *  
 *  @param array	$data	Search page URL components
 *  @return string
 */
function searchPagePath( array $data ) : string {
	return slashPath( pageRoutePath(), true ) . 
		'?find=' . $data['find'] . '/';
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
		$stop	= setting( 'stop_words', $default, 'array' );
		if ( empty( $stop ) ) {
			$stop = $default;
		}
		
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
	$rlimit	= setting( 'related_limit', \RELATED_LIMIT, 'int' );
	
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
	$slvl	= setting( 'summary_level', \SUMMARY_LEVEL, 'int' );
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
 *  @param string	$lang		Override configured language
 */
function staticPage( 
	string	$label,
	string	$path,
	string	$links,
	array	$post,
	bool	$forms		= true,
	bool	$cache		= true,
	string	$lang		= ''
) {
	$ptitle	= setting( 'page_title', \PAGE_TITLE );
	$psub	= setting( 'page_sub', \PAGE_SUB );
	
	// First line is the title, everything else is the body
	$title	= title( \array_shift( $post ) );
	$body	= html( \implode( "\n", $post ), pageRoutePath(), $forms );
	
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
	$slinks	= setting( 'default_' . $label . '_links', $links );
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
				empty( $lang ) ? 
				setting( 'language', \LANGUAGE ) : $lang,
			'home'		=> pageRoutePath(),
			'feedlink'	=> pageRoutePath( 'feed' ),
			'body_before'	=> $heading,
			'body'		=> $body,
			'body_after'	=> pageFooter()
		], 
		true 
	);
	
	send( 200, $page_t, $cache );
}

/**
 *  Static page retrieval helper
 *  
 *  @param string	$page	Retrieval page path
 *  @return array
 */
function loadStaticPage( string	$page ) : array {
	
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
	hook( [ 'showhomepage', [
		'home'	=> $post,
		'params'=> $params
	] ] );
	
	// Override home content if hook was rendered
	sendOverride( 'showhomepage' );
	
	staticPage( 'home', '/', \DEFAULT_MAIN_LINKS, $post );
}

/**
 *  View about page and other custom content
 */
function showAbout( string $event, array $hook, array $params ) {
	$path	= $params['tree'] ?? 'main'; // Sub about page or main
	$apath	= eventRoutePrefix( 'aboutview', 'about' ) . '/' . $path . '.md';
	$post	= loadStaticPage( $apath );
	
	// No about found
	if ( empty( $post ) ) {
		sendNotFound();
	}
	
	internalState( 'aboutFound', true );
	hook( [ 'showaboutpage', [
		'path'	=> $path,
		'file'	=> $apath,
		'about'	=> $post,
		'params'=> $params
	] ] );
	
	// Override about content if hook was rendered
	sendOverride( 'showaboutpage' );
	
	// Fallback to preset about
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
	
	$slvl	= setting( 'summary_level', \SUMMARY_LEVEL, 'int' );
	
	// Full archive
	if ( empty( $params['year'] ) ) {
		$posts	= loadPosts( $page, '', false, $slvl );
		$prefix	= slashPath( pageRoutePath(), true );
	
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
		$prefix	= slashPath( pageRoutePath(), true ) . $stamp;
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
	$prefix	= 
	slashPath( pageRoutePath( 'tagview', 'tags' ), true ) . $tag . '/';
	
	// Pagination prep
	$plimit	= setting( 'page_limit', \PAGE_LIMIT, 'int' );
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
	
	$find	= searchData( $params['find'] ?? '' );
	if ( empty( $find ) ) {
		sendNotFound();
	}
	
	$prefix = searchPagePath( $params );
	$page	= ( int ) ( $params['page'] ?? 1 );
	
	// Pagination prep
	$plimit	= setting( 'page_limit', \PAGE_LIMIT, 'int' );
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
		'results'	=> $res
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
	
	$slvl	= setting( 'summary_level', \SUMMARY_LEVEL, 'int' );
	$posts	= loadPosts( 1, '', true, $slvl );
	if ( empty( $posts ) ) {
		sendNotFound();
	}
	
	$ptitle	= setting( 'page_title', \PAGE_TITLE );
	$psub	= setting( 'page_sub', \PAGE_SUB );
	
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
		'home'		=> request_origin(),
		'path'		=> request_url(),
		'date_gen'	=> util_rfc_date(),
		'body'		=> \implode( '', $posts )
	];
	
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
	$sib	= setting( 'show_siblings', \SHOW_SIBLINGS, 'int' ) ? 
			getSiblings( $path ) : '';
	
	$rel	= setting( 'show_related', \SHOW_RELATED, 'int' ) ? 
			getRelated( $path ) : '';
	
	$ptitle	= setting( 'page_title', \PAGE_TITLE );
	$psub	= setting( 'page_sub', \PAGE_SUB );
	
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
	$mlinks	= setting( 'default_main_links', \DEFAULT_MAIN_LINKS );
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
			'lang'		=> setting( 'language', \LANGUAGE ),
			'home'		=> pageRoutePath(),
			'body_before'	=> $heading,
			'body'		=> $post,
			'body_after'	=> $sib . $rel . pageFooter()
		], 
		true 
	);
	
	send( 200, $page_t, true );
}


/**
 *  Rebuild index and cache output
 */
function runIndex( string $event, array $hook, array $params ) {
	// Pagination prep
	$page	= ( int ) ( $params['page'] ?? 1 );
	$ilimit	= setting( 'index_limit', \INDEX_LIMIT, 'int' );
	$start	= ( $page - 1 ) * $ilimit;
	
	// Load index
	$posts	= loadIndex( $start, $ilimit );
	
	if ( empty( $posts ) ) {
		// No more posts
		sendNotFound();
	}
	
	$ptitle	= setting( 'page_title', \PAGE_TITLE );
	$psub	= setting( 'page_sub', \PAGE_SUB );
	
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
	
	$prefix	= slashPath( pageRoutePath(), true ) . 'archive/';
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
	
	$mlinks	= setting( 'default_main_links', \DEFAULT_MAIN_LINKS );
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
			'lang'		=> setting( 'language', \LANGUAGE ),
			'home'		=> pageRoutePath(),
			'feedlink'	=> pageRoutePath( 'feed' ),
			'body_before'	=> $heading,
			'body'		=> $out,
			'body_after'	=> $pages . pageFooter()
		], 
		true 
	);
	
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
	$ye = ( int ) \date( 'Y' );
	
	$filter	= [
		'page_title'	=> [
			'filter'	=> \FILTER_SANITIZE_FULL_SPECIAL_CHARS,
			'flags'		=> \FILTER_REQUIRE_SCALAR
		],
		'page_sub'	=> [
			'filter'	=> \FILTER_SANITIZE_FULL_SPECIAL_CHARS,
			'flags'		=> \FILTER_REQUIRE_SCALAR
		],
		'page_limit'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'flags'		=> \FILTER_REQUIRE_SCALAR,
			'options'	=> [
				'min_range'	=> 1,
				'max_range'	=> 500,
				'default'	=> \PAGE_LIMIT
			]
		],
		'index_limit'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'flags'		=> \FILTER_REQUIRE_SCALAR,
			'options'	=> [
				'min_range'	=> 1,
				'max_range'	=> 500,
				'default'	=> \INDEX_LIMIT
			]
		],
		'max_page' => [
			'filter'	=> \FILTER_VALIDATE_INT,
			'flags'		=> \FILTER_REQUIRE_SCALAR,
			'options'	=> [
				'min_range'	=> 1,
				'max_range'	=> 5000,
				'default'	=> \MAX_PAGE
			]
		],
		'max_url_size' => [
			'filter'	=> \FILTER_VALIDATE_INT,
			'flags'		=> \FILTER_REQUIRE_SCALAR,
			'options'	=> [
				'min_range'	=> 255,
				'max_range'	=> 2048,
				'default'	=> \MAX_URL_SIZE
			]
		],
		'summary_level'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'flags'		=> \FILTER_REQUIRE_SCALAR,
			'options'	=> [
				'min_range'	=> 0,
				'max_range'	=> 2,
				'default'	=> \SUMMARY_LEVEL
			]
		],
		'feature_lines'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'flags'		=> \FILTER_REQUIRE_SCALAR,
			'options'	=> [
				'min_range'	=> 1,
				'max_range'	=> 10,
				'default'	=> \FEATURE_LINES
			]
		],
		'timezone'	=> [
			'filter'	=> \FILTER_SANITIZE_SPECIAL_CHARS,
			'flags'		=> 
				\FILTER_REQUIRE_SCALAR	|
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
				\FILTER_REQUIRE_SCALAR	|
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
		
		// Mail sender address
		'mail_from'	=> [
			'filter'	=> \FILTER_VALIDATE_EMAIL,
			'flags'		=> 
				\FILTER_REQUIRE_SCALAR	|
				\FILTER_FLAG_EMAIL_UNICODE,
			'options'	=> [
				'default'	=> \MAIL_FROM
			]
		],
		
		// Mail receiver list
		'mail_whitelist'=> [
			'filter'	=> \FILTER_VALIDATE_EMAIL,
			'flags'		=> 
				\FILTER_REQUIRE_ARRAY	|
				\FILTER_FLAG_EMAIL_UNICODE
		],
		
		// Post tagging
		'tag_limit'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'flags'		=> \FILTER_REQUIRE_SCALAR,
			'options'	=> [
				'min_range'	=> 1,
				'max_range'	=> 50,
				'default'	=> \TAG_LIMIT
			]
		],
		
		// Cache settings
		'cache_ttl'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'flags'		=> \FILTER_REQUIRE_SCALAR,
			'options'	=> [
				'min_range'	=> 300,
				'max_range'	=> 604800,
				'default'	=> \CACHE_TTL
			]
		],
		
		// Database connection timeout
		'data_timeout'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'flags'		=> \FILTER_REQUIRE_SCALAR,
			'options'	=> [
				'min_range'	=> 1,
				'max_range'	=> 60,
				'default'	=> \DATA_TIMEOUT
			]
		],
		
		// Pagination
		'year_start'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'flags'		=> \FILTER_REQUIRE_SCALAR,
			'options'	=> [
				'min_range'	=> \YEAR_START,
				'max_range'	=> $ye,
				'default'	=> \YEAR_START
			]
		],
		
		// Related and sibling display
		'related_limit'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'flags'		=> \FILTER_REQUIRE_SCALAR,
			'options'	=> [
				'min_range'	=> 1,
				'max_range'	=> 20,
				'default'	=> \RELATED_LIMIT
			]
		],
		'show_siblings'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'flags'		=> \FILTER_REQUIRE_SCALAR,
			'options'	=> [
				'min_range'	=> 0,
				'max_range'	=> 1,
				'default'	=> \SHOW_SIBLINGS
			]
		],
		'show_related'	=> [
			'filter'	=> \FILTER_VALIDATE_INT, 
			'flags'		=> \FILTER_REQUIRE_SCALAR, 
			'options'	=> [
				'min_range'	=> 0,
				'max_range'	=> 1,
				'default'	=> \SHOW_RELATED
			]
		],
		'readtime_types'=> [
			'filter'	=> \FILTER_SANITIZE_SPECIAL_CHARS,
			'flags'		=> 
				\FILTER_REQUIRE_SCALAR	|
				\FILTER_FLAG_STRIP_LOW	| 
				\FILTER_FLAG_STRIP_HIGH	| 
				\FILTER_FLAG_STRIP_BACKTICK,
			'options' => [
				'default' => \READTIME_TYPES
			]
		],
		'plugins_enabled'=> [
			'filter'	=> \FILTER_SANITIZE_SPECIAL_CHARS,
			'flags'		=> 
				\FILTER_FLAG_STRIP_LOW	| 
				\FILTER_FLAG_STRIP_HIGH	| 
				\FILTER_FLAG_STRIP_BACKTICK | 
				\FILTER_REQUIRE_ARRAY
		],
		
		'sites_enabled'=> [
			'filter'	=> \FILTER_CALLBACK,
			'options'	=> 
			function( $v ) {
				return 
				\is_array( $v ) ? 
					formatSites( $v ) : [];
			}
		], 
		
		// URL Markers
		'route_mark'=> [
			'filter'	=> \FILTER_CALLBACK,
			'options'	=> 
			function( $v ) {
				return util_json_array( $v );
			}
		], 
		
		// Log rollover size
		'max_log_size'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'flags'		=> \FILTER_REQUIRE_SCALAR,
			'options'	=> [
				'min_range'	=> 1024,
				'max_range'	=> 5000000,
				'default'	=> \MAX_LOG_SIZE
			]
		],
		
		// Search stop words
		'stop_words'=> [
			'filter'	=> \FILTER_SANITIZE_SPECIAL_CHARS,
			'flags'		=> \FILTER_REQUIRE_ARRAY
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
		'frame_whitelist'=> [
			'filter'	=> \FILTER_CALLBACK,
			'flags'		=> \FILTER_REQUIRE_ARRAY,
			'options'	=> 'cleanUrl'
		], 
		
		// Templating settings
		'shared_assets'	=> [
			'filter'	=> \FILTER_VALIDATE_URL,
			'options'	=> [
				'default' => \SHARED_ASSETS
			],
		],
		'plugin_assets'	=> [
			'filter'	=> \FILTER_VALIDATE_URL,
			'options'	=> [
				'default' => \PLUGIN_ASSETS
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

 	if ( isset( $data['plugins_enabled'] ) ) {
		$data['plugins_enabled'] = 
			\array_filter( $data['plugins_enabled'], 'sanitize_dir' );
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
	[ 'get', '\\?find=:find',			'search' ],
	[ 'get', '\\?find=:find/page:page',		'searchpaginate' ]
	];
}

// Environment check
logStartup();

/**
 *  Begin event registry
 */

// Configuration load
hook( [ 'checkconfig',	'checkConfig' ] );

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



