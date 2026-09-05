<?php declare( strict_types = 1 );
/**
 *  Bare: A single file directory-to-blog
 */


/**
 *  Check config.json for custom settings
 *  
 *  These need to be set here in index.php:
 */

/**
 *  Relative path based on current file location
 */
define( 'PATH',		\realpath( \dirname( __FILE__ ) ) . '/' );
// Use this instead if you keep scripts outside the web root
// define( 'PATH',	\realpath( \dirname( __FILE__, 2 ) ) . '/htdocs/' );

// Cache directory. Must be writable (chmod -R 0755 on *nix)
define( 'STORAGE_DIR',	PATH . 'cache/' );
// Use this instead if you keep the cache outside the web root
// define( 'STORAGE_DIR',	\realpath( \dirname( __FILE__, 2 ) ) . '/cache/' );

// Error log filename (will be created if it doesn't exist)
define( 'ERROR',	'errors.log' );

// Visitor error log (will be created if if doesn't exist)
define( 'ERROR_VISIT',	'visitor_errors.log' );

// Special notices and other messages that aren't errors but should be recorded
define( 'NOTICE',	'notices.log' );

// A log file created when Bare is first run with information about its enviornment
define( 'STARTUP',	'startup.log' );


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
 *  Templates and customization
 */

/**
 *  Template holder
 *  These HTML templates can be overridden in plugins
 */
define( 'TEMPLATES', <<<HTML

## HTML full page component
--- tpl_full_page ---
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


## Full static home page component
--- tpl_home_page ---
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


## Full about page component
--- tpl_about_page ---
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


## Page footer component
--- tpl_page_footer ---
<footer class="{footer_classes}">
<div class="{footer_wrap_classes}">{footer_links}</div>
</footer>


## General page heading
--- tpl_page_heading ---
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


## Home page specific heading
--- tpl_home_heading ---
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


## About page specific heading
--- tpl_about_heading ---
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


## Form anti-XSRF hidden inputs (required on all forms)
--- tpl_input_xsrf ---
<input type="hidden" name="nonce" value="{nonce}">
<input type="hidden" name="token" value="{token}">
<input type="hidden" name="meta" value="{meta}">


## Search form
--- tpl_search_form ---
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


## Generic error page
--- tpl_error_page ---
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


## No posts to dipsplay
--- tpl_noposts ---
<div class="{no_posts_wrap}">
	<p>{lang:errors:noposts}</p>
</div>


## General post template
--- tpl_post ---
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


## Post on full listing indexes
--- tpl_index_post ---
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


## Reading time for each post
--- tpl_read_time ---
<span class="readtime">{lang:headings:readtime}</span>


## Post tag container on index pages
--- tpl_index_tagwrap ---
<nav class="{tag_index_wrap_classes}">
	<span class="{tag_index_heading_classes}">{lang:headings:tags}</span> 
	<ul class="{tag_index_ul_classes}">{tags}</ul></nav>


## Single post page tag container
--- tpl_tagwrap ---
<nav class="{tag_wrap_classes}">
	<span class="{tag_heading_classes}">{lang:headings:tags}</span> 
	<ul class="{tag_ul_classes}">{tags}</ul></nav>


## Main navigation menu link container
--- tpl_mainnav_wrap ---
<nav class="{main_nav_classes}"><ul>{links}</ul></nav>


## Footer link container
--- tpl_footernav_wrap ---
<nav class="{footer_nav_classes}">
<ul class="{footer_ul_classes}">{links}</ul>
</nav>


## Link for main homepage link on navigation menues
--- tpl_home_link ---
<li class="{nav_home_link_classes}">
	<a href="{url}" class="{nav_home_link_a_classes}">{text}</a>
</li>


## Standard link on navigation menus
--- tpl_link ---
<li><a href="{url}">{text}</a></li>

## Individual post link wrapper on archive indexes
--- tpl_index_taglink ---
<li class="{tag_index_item_classes}">
	<a href="{url}" class="{tag_index_item_a_classes}">{text}</a>
</li>


## Individual tag link wrapper
--- tpl_taglink ---
<li class="{tag_item_classes}">
	<a href="{url}" class="{tag_item_a_classes}">{text}</a>
</li>


## Pagination link navigation wrapper
--- tpl_page_nav_link ---
<li class="{nav_link_classes}">
	<a href="{url}" class="{nav_link_a_classes}">{text}</a>
</li>


## Preview page previous link
--- tpl_np_prevlink ---
<li class="{nextprev_prev_classes}">
	&lt; <a href="{url}" class="{nextprev_prev_a_classes}">{text}</a>
</li>


## Preview page next link
--- tpl_np_nextlink ---
<li class="{nextprev_next_classes}">
	<a href="{url}" class="{nextprev_next_a_classes}">{text}</a> &gt;
</li>


## Pagination Previous page link
--- tpl_prevlink ---
<li class="{nav_prev_classes}">
	&lt; <a href="{url}" class="{nav_prev_a_classes}">{text}</a>
</li>


## Pagination Next page link
--- tpl_nextlink ---
<li class="{nav_next_classes}">
	<a href="{url}" class="{nav_next_a_classes}">{text}</a> &gt;
</li>


## Next/Previous pagination wrapper
--- tpl_page_nextprev ---
<div class="{nextprev_wrap_classes}">
	<nav class="{nextprev_nav_classes}">
		<ul class="{nextprev_ul_classes}">{links}</ul>
	</nav>
</div>


## Previously published and next, chronological page preview wrapper
--- tpl_siblingnav ---
<div class="{sibling_wrap_classes}">
	<nav class="{sibling_nav_classes}">
		<ul class="{sibling_nav_ul_classes}">{links}</ul>
	</nav>
</div>


## Related posts wrapper on single post views
--- tpl_relatednav ---
<div class="{related_wrap_classes}">
	<h3 class="{related_h_classes}">{lang:headings:related}</h3>
	<nav class="{related_nav_classes}">
		<ul class="{related_ul_classes}">{links}</ul>
	</nav>
</div>


## Index page post listing wrapper
--- tpl_index_wrap ---
<div class="{post_index_wrap_classes}">
	<ul class="{post_index_ul_wrap_classes}">{items}</ul>
</div>


## Index page post link wrapper
--- tpl_index ---
<li class="{post_index_item_classes}">
	<time datetime="{date_utc}">{date_stamp}</time> 
	<a href="{permalink}">{title}</a> {read_time} {tags}
</li>


## Index page separation header (I.E. Archive Year)
--- tpl_index_header ---
<li class="{post_index_header_classes}">
	<h3 class="{post_index_header_h_classes}">{title}</h3>
</li>


## Embedded code
--- tpl_codeblock ---
<pre class="{code_wrap_classes}"><code class="{code_classes}">{code}</code></pre>


--- tpl_codeinline ---
<code class="{code_classes}">{code}</code>


## Footnotes
--- tpl_footnote_wrap ---
<nav class="{footnote_nav_classes}">
	<ul class="{footnote_ul_classes}">{footnotes}</ul>
</nav>


--- tpl_footnote_back ---
<a href="#{link}-link" class="{footnote_ba_classes}">{phrase}</a>


--- tpl_footnote ---
<li id="{id}-ref" class="{footnote_phrase_classes}">
	<sup>{backlinks}</sup>: <span 
		class="{footnote_def_classes}">{footnote}</span>
</li>


--- tpl_footlink ---
<sup class="{footnote_s_classes}"><a class="{footnote_a_classes}" href="#{link}-ref" id="{id}-link">[{phrase}]</a></sup>



## Language placeholders
--- tpl_previous ---
{lang:nav:previous}

--- tpl_next ---
{lang:nav:next}

--- tpl_home ---
{lang:nav:home}


## Feed index template
--- tpl_feed ---
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


## Feed item template
--- tpl_item ---
<item>
	<title>{title}</title>
	<link>{permalink}</link>
	<pubDate>{date_rfc}</pubDate>
	<guid isPermaLink="true">{permalink}</guid>
	<description><![CDATA[
	{body}
	]]></description>
</item>



##
##  Table formatting
##

## Table formatting
--- tpl_table ---
<table class="{table_classes}">
	<thead class="{table_header_classes}">{thead}</thead>
	<tbody class="{table_body_classes}">{tbody}</tbody>
	<tfoot class="{table_footer_classes}">{tfoot}</tfoot>
</table>


## Table without headers but with footers
--- tpl_table_nh ---
<table class="{table_classes}">
	<tbody class="{table_body_classes}">{tbody}</tbody>
	<tfoot class="{table_footer_classes}">{tfoot}</tfoot>
</table>


## Table without footers but with headers
--- tpl_table_nf ---
<table class="{table_classes}">
	<thead class="{table_header_classes}">{thead}</thead>
	<tbody class="{table_body_classes}">{tbody}</tbody>
</table>


## Table without heading or footers
--- tpl_table_nh_nf ---
<table class="{table_classes}">
	<tbody class="{table_body_classes}">{tbody}</tbody>
</table>


## Ordinary row 
--- tpl_table_row ---
<tr class="{table_row_classes}">{cells}</tr>


## Odd row
--- tpl_table_row_odd ---
<tr class="{table_row_odd_classes}">{cells}</tr>


## Even row
--- tpl_table_row_even']= <<<HTML
<tr class="{table_row_even_classes}">{cells}</tr>


## Heading cell
--- tpl_table_h_cell ---
<th class="{table_th_classes} {align}" align="{align}">{data}</th>


## Ordinary cell 
--- tpl_table_cell ---
<td class="{table_td_classes} {align}" align="{align}">{data}</td>



##
##  Embeded media templates
##

## Embedded video with preview
--- tpl_audio_embed ---
<div class="media"><audio src="{src}" preload="none" controls></audio></div>


## Embedded video without preview
--- tpl_video_np_embed ---
<div class="media">
	<video width="560" height="315" src="{src}" preload="none" controls>{detail}</video>
</div>


## Embedded video with preview
--- tpl_video_embed ---
<div class="media">
	<video width="560" height="315" src="{src}" preload="none" poster="{preview}" controls>{detail}</video>
</div>


## Video caption track without language
--- tpl_cc_nl_embed ---
<track kind="subtitles" src="{src}" {default}>


## Video caption with language
--- tpl_cc_embed ---
<track label="{label}" kind="subtitles" srclang="{lang}" src="{src}" {default}>


##
##  Hosted media templates
##
 
## YouTube video wrapper
--- tpl_youtube ---
<div class="media">
	<iframe width="560" height="315" frameborder="0" 
		sandbox="allow-same-origin allow-scripts" 
		src="https://www.youtube.com/embed/{src}?start={time}" 
		allow="encrypted-media;picture-in-picture" 
		loading="lazy" allowfullscreen></iframe>
</div>


## Vimeo video wrapper
--- tpl_vimeo ---
<div class="media">
	<iframe width="560" height="315" frameborder="0" 
		sandbox="allow-same-origin allow-scripts" 
		src="https://player.vimeo.com/video/{src}" 
		allow="picture-in-picture" loading="lazy" 
		allowfullscreen></iframe>
</div>


## Peertube video wrapper (requires 'src_host' to be added to frame_whitelist)
--- tpl_peertube ---
<div class="media">
	<iframe width="560" height="315" frameborder="0" 
		sandbox="allow-same-origin allow-scripts" 
		src="https://{src_host}/videos/embed/{src}" 
		allow="picture-in-picture" loading="lazy" 
		allowfullscreen></iframe>
</div>


## Internet Archive video wrapper
--- tpl_archiveorg ---
<div class="media">
	<iframe width="560" height="315" frameborder="0" 
		sandbox="allow-same-origin allow-scripts" 
		src="https://archive.org/embed/{src}" 
		allow="picture-in-picture" loading="lazy" 
		allowfullscreen></iframe></div>


## LBRY/Odysee video wrapper
--- tpl_lbry ---
<div class="media">
	<iframe width="560" height="315" frameborder="0" 
		sandbox="allow-same-origin allow-scripts" 
		src="https://{src_host}/$/embed/{slug}/{src}" 
		allow="picture-in-picture" loading="lazy" 
		allowfullscreen></iframe>
</div>


## Playeur video wrapper
--- tpl_playeur ---
<div class="media">
	<iframe width="560" height="315" frameborder="0" 
		sandbox="allow-same-origin allow-scripts" 
		allow="encrypted-media;picture-in-picture"
		src="https://playeur.com/embed/{src}?t={time}" 
		loading="lazy" allowfullscreen></iframe>
</div>

HTML
); // End of templates



/**********************************************************************
 *                      Caution editing below
 **********************************************************************/

/**
 *  @class Single instance helper
 */
abstract class Instance {
	
	public static function instance() : static {
		static $_single; 
		
		if ( isset( $_single ) ) { return $_single; }
		
		$args		= \func_get_args();
		$class		= static::class;
		$_single	= 
		\method_exists( $class, 'create' ) 
			? ( empty( $args ) 
				? \call_user_func( [ $class, 'create' ] )
				: \call_user_func_array( [ $class, 'create' ], $args )
			)
			: ( empty( $args ) ? new $class() : new $class( ...$args ) );
		
		return $_single;
	}
}

/**
 *  @class Errors and messaging
 */
final class Errors {
	
	public function __construct() {}
	
	/**
	 *  @param array $data	Raw context $data
	 *  @return string
	 */
	public static function encode( array $data ) : string {
		return \json_encode( 
			data, 
			\JSON_UNESCAPED_UNICODE | \JSON_UNESCAPED_SLASHES 
		) ?: '{}';
	}
	
	/**
	 *  Callable context information helper
	 *  
	 *  @param mixed	$val	Callable detail
	 */
	public static function describe_callable( mixed $val ) : string {
		if ( \is_string( $val ) ) {
			return "[Function: {$val}]";
		}
		
		if ( \is_array( $val ) ) {
			[ $subject, $method ] = $val;
			$class = 
			\is_object( $subject ) 
				? \get_class( $subject )
				: ( string ) $subject;
			return "[Method: {$class}::{$method}]";
		}
		if ( $val instanceof Closure ) { return '[Closure]'; }
		
		// Something else?
		return '[Callable]';
	}
	
	/** 
	 *  Execution debug detail formatting helper
	 *  
	 *  @param array	$context	Callable detail
	 *  @return string
	 */
	public static function debug_summary( mixed $context ) : string {
		$mapped		= 
		\array_map( static function( $val ) {
			if ( \is_callable( $val ) ) { 
				return static::describe_callable( $val );
			}
			
			if ( \is_object( $val ) ) { 
				return '[Object: ' . \get_class( $val ) . ']'; 
			}	
			if ( \is_resource( $val ) ) { 
				return '[Resource: ' . \get_resource_type( $val ) . ']'; 
			}
			
			return $val;
		}, $context );
		return static::encode( $mapped );
	}
	
	/**
	 *  Begin error handling scope with this instance
	 *  
	 *  @return array			Previous reporting and handler, if any
	 */
	public function start_scope() : array {
		$prev_report	= \error_reporting();
		\error_reporting( \E_ALL );
		
		$prev_handler	= 
		\set_error_handler( function( $severity, $message, $file, $line ) {
			throw new 
			\ErrorException( $message, 0, $severity, $file, $line );
		} );
		return [ $prev_report, $prev_handler ];
	}
	
	/**
	 *  End current error handling scope
	 *  
	 *  @param array	$scope		Previous error reporting and handler in that order
	 */
	public function end_scope( array $scope ) : void {
		[ $prev_report, $prev_handler ]	= $scope;
		\error_reporting( $prev_report );
		
		if ( \is_callable( $prev_handler ) ) {
			\set_error_handler( $prev_handler );
			return;
		}
		
		\restore_error_handler();
	}
	
	/**
	 *  Debugging trace formatter
	 *  
	 *  @param string	$message	Context message
	 *  @param array	$context	Trace path or message detail
	 */
	public function trace( string $message, array $context = [] ) : void {
		$ctx	= 
		empty( $context ) 
			? ''
			: ' ' . static::encode( $context );
			
		\error_log( \sprintf(
			"[TRACE] %s %s%s\n",
			\date( 'Y-m-d H:i:s' ),
			$message,
			$ctx
		) );
	}
	
	/**
	 *  Generic user-facing error page
	 */
	public static function end_page( int $code = 500 ) : never {
		\ob_end_clean();
		\http_response_code( $code );
		\header( 'Content-Type: text/html; charset=utf-8' );
		
		$msg = match( true ) {
			400		=> 'Invalid request',
			401, 403	=> 'Access denied',
			404		=> 'Page not found',
			405		=> 'Method not allowed',
			default	=>
			'An unexpected error occurred. Please try again later.'
		};
		die( $msg );
	}
	
	/**
	 *  Centralized exception handler
	 *  
	 *  @param Throwable	$e	Generic capture
	 */
	public function handler( \Throwable $e ) : never {
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
		static::end_page( 500 );
	}
}


/**
 *  @class Dependency injection helper
 */
final class Container extends Instance {
	
	/**
	 *  @var array<string, mixed>		Instantiated objects and callables
	 */
	private array $stack		= [];
	
	/**
	 *  @var array<string, callable-string>	Parsed definitions
	 */
	private array $defs		= [];
	
	/**
	 *  @var array<string, bool>		Circular reference/dependency check
	 */
	private array $processing	= [];
	
	public function __construct() {}
	
	/**
	 *  Error message formatting helper
	 *  
	 *  @param string	$msg		Formatted error message 
	 */
	private function referror( string $msg ) : never {
		$path	= 
		\implode( \array_keys( $this->processing ), '->' ) ?: 'Empty';
		
		throw new
		\RuntimeException( $msg . " | Processing path: {$path}" );
	}
	
	/**
	 *  Bind named abstract interface to single instance concrete implementation
	 *  
	 *  @param string	$abstract	Interface name
	 *  @param string	$concrete	Class implementation
	 */
	public function bind( string $abstract, string $concrete ) : void {
		if ( !\interface_exists( $abstract ) ) {
			$this->referror( "Interface {$abstract} not found" );
		}
		
		if ( !\class_exists( $concrete ) ) {
			$this->referror( "Unable to bind {$abstract} to non-existent class {$concrete}" );
		}
		
		if ( !\is_subclass_of( $concrete, $abstract ) ) {
			$this->referror( "Class {$concrete} does not implement {$abstract}" );
		}
		
		$this->defs[$abstract]	= [
			'type'	=> 'singleton',
			'value'	=> $concrete
		];
	}
	
	/**
	 *  Extract interfaces from class and bind to implementations
	 *  
	 *  @param string	$class		Class name to process (must exist)
	 */
	public function autobind( string $class ) : void {
		if ( !\class_exists( $class ) ) {
			$this->referror( 
				"Unable to autobind non-existent class {$class}" 
			);
		}
		
		$ref	= new \ReflectionClass( $class );
		foreach( $ref->getInterfaceNames() as $iface ) {
			$this->bind( $iface, $class );
		}
	}
	
	/**
	 *  Set single instance definition for a given dependency
	 *  
	 *  @param string	$id		Dependency name and/or type
	 *  @param mixed	$dep		Singleton class or callable definition
	 *  @example
	 *  $container->set( MyClass::class );
	 *  
	 *  $container->set( MyClass::class, MyClass::create( $c ) );
	 *  
	 *  $container->set( MyClass::class, function( Container $c ) {
	 *  	return MyClass::create( $c );
	 *  } );
	 *  
	 *  $container->set( MyClass::class, function( Container $c ) {
	 *  	return new MyClass( 
	 *  		logger	: $c->get( Log::class ), 
	 *  		config	: $c->get( Config::class ),
	 *  		request	: $c->get( Request::class )
	 *  	);
	 *  });
	 */
	public function set( string $id, callable|object|string|null $dep = null ) : void {
		$this->defs[$id] = [
			'type'	=> 'singleton',
			'value'	=> $dep ?? $id
		];
	}
	
	/**
	 *  Set as factory definition (won't be stored in stack)
	 *  
	 *  @param string	$id		Dependency name and/or type
	 *  @param mixed	$dep		Factory dependency
	 *  @example 
	 *  $container->factory( MyFactory::class, function( Container $c ) { 
	 *  	return MyFactory::create( $c );
	 *  } );
	 *  
	 *  $container->factory( MyFactory::class, function( Container $c ) {
	 *  	return new MyFactory( 
	 *  		logger	: $c->get( Log::class ), 
	 *  		config	: $c->get( Config::class ),
	 *  		request	: $c->get( Request::class )
	 *  	);
	 *  });
	 */
	public function factory( string $id, callable|string $dep ) : void {
		$this->defs[$id]	= [
			'type'	=> 'factory',
			'value'	=> $dep
		];
	}
	
	/**
	 *  Checks if current stack or definitions list contains a given id
	 * 
	 *  @param string	$id		Dependency name and/or type
	 *  @return bool
	 */
	public function has( string $id ) : bool {
		return \array_key_exists( $id, $this->stack ) || 
			\array_key_exists( $id, $this->defs );
	}
	
	/**
	 *  Gets a resolved dependency or already stacked item
	 *  
	 *  @param string	$id		Dependency name and/or type
	 *  @return mixed
	 */
	public function get( string $id ) : mixed {
		if ( \array_key_exists( $id, $this->stack ) ) {
			return $this->stack[$id];
		}
		
		// Populate definition
		if ( !\array_key_exists( $id, $this->defs ) ) {
			// Loading failed?
			if ( !\class_exists( $id ) ) {
				$this->referror( "No definition found for {$id}" );
			}
			
			$this->defs[$id] = [
				'type'	=> 'singleton',
				'value'	=> $id
			];
		}
		
		return $this->resolve( $id );
	}
	
	/**
	 *  Argument dependency resolution helper
	 *  
	 *  @param ReflectionNamedType	$ptype		Parameter type
	 *  @param ReflectionParameter	$param		Constructor parameter
	 *  @return mixed
	 */
	private function argdep( 
		\ReflectionNamedType	$ptype, 
		\ReflectionParameter	$param 
	) : mixed {
		$dep	= $ptype->getName();
		
		// Dependency is Container itself?
		if ( $dep === static::class ) {
			return $this;
		}
		
		// Try to get from existing functionality
		if ( $param->isDefaultValueAvailable() ) {
			return $this->has( $dep )
				? $this->get( $dep )
				: $param->getDefaultValue();
		}

		// Or apply null, if allowed 
		if ( $ptype->allowsNull() ) {
			return $this->has( $dep )
				? $this->get( $dep ) 
				: null;
		}
		
		// Fallback
		return $this->get( $dep );
	}
	
	/**
	 *  Instantiator parameter population
	 *  
	 *  @param ReflectionMethod	$method		Constructor or 'create()'
	 *  @return array
	 */
	private function populate( \ReflectionMethod $method ) : array {
		// Constructor arguments
		$args	= [];
		$params	= $method->getParameters();
		
		foreach ( $params as $param ) {
			$ptype = $param->getType();
			if ( !$ptype instanceof \ReflectionNamedType ) {
				$this->referror( 
					"Unsupported parameter type for {$method->getName()}" 
				);
			}
			
			// Try defaults for builtins
			if ( $ptype->isBuiltin() ) { 
				if ( $param->isDefaultValueAvailable() ) {
					$args[] = $param->getDefaultValue();
					continue;
				}
				
				// Well, I tried
				$this->referror(
					"Cannot autoload builtin parameter " . 
					"\${$param->getName()} in {$method}"
				);
			}
			
			$args[] = $this->argdep( $ptype, $param );
		}
		
		return $args;
	}
	
	/**
	 *  Instantiate class with required parameters, checking for Instance sublcass
	 *  
	 *  @param string	$class		Fully qualified class name
	 *  @return object|null
	 */
	private function autoload( string $class ) : object {
		$ref	= new \ReflectionClass( $class );
		
		if ( !$ref->isInstantiable() ) {
			$this->referror( "Unable to instantiate {$class}" );
		}
		
		// Static create() short circuit
		if ( 
			\is_subclass_of( $class, Instance::class ) && 
			\method_exists( $class, 'create' )
		) {
			$method	= new \ReflectionMethod( $class, 'create' );
			$args	= $this->populate( $method );
			
			return $class::instance( ...$args );
		}
		
		$cstor	= $ref->getConstructor();
		
		// No constructor = no arguments, return as-is
		if ( null === $cstor ) { return new $class(); }
		
		$args	= $this->populate( $cstor );
		return $ref->newInstanceArgs( $args );
	}
	
	/**
	 *  Resolve callable once based on id signature, optionally autoload
	 *  
	 *  @param string	$id	Definition signature
	 */
	private function resolve( string $id ) : mixed {
		if ( \array_key_exists( $id, $this->processing ) ) {
			$this->referror( "Circular reference {$id} found" );
		}
		
		$this->processing[$id]	= true;
		$def			= $this->defs[$id];
		$dtype			= $def['type'];
		$value			= $def['value'];
		
		$obj			= 
		match( true ) {
			\is_object( $value ) || \is_callable( $value ) 
						=> $value( $this ),
			
			\is_string( $value ) && \class_exists( $value )
						=> $this->autoload( $value ),
			
			default			=> null
		};
		
		if ( null === $obj ) {
			$this->referror( "Invalid definition for {$id}" );
		}
		
		unset( $this->processing[$id] );
		if ( 'singleton' === $dtype ) {
			$this->stack[$id]	= $obj;
		}
		
		return $obj; 
	}
}


/**
 *  @class General utilities
 */
final class Util {
	
	protected static array $timezone_cache;
	
	protected static array $extensions;
	
	protected static \DateTime $now;
	
	/**
	 *  Currently running extensions
	 *  
	 *  @return array
	 */
	public static function extensions() : array {
		// Currently running extensions
		static::$extensions	??= \get_loaded_extensions();
		return static::$extensions;
	}
	
	/**
	 *  Check if a specific library or if PHP is the given version or above
	 *  
	 *  @param string	$spec		Minimum supported version
	 *  @param string	$lib		Optional library name, case sensitive
	 *  @return bool
	 */
	public static function lib_version( string $spec, ?string $lib = null ) : bool {
		static $ext;
		
		// Fix for 7.4.0 etc... appearing higher than 7.4
		$spec	= \rtrim( $spec, '.0' );
		
		$lib	??= '';
		
		// Empty library? Check PHP
		if ( empty( $lib ) ) {
			return 
			\version_compare( \rtrim( \PHP_VERSION, '.0' ), $spec, '>=' );
		}
		
		// Currently running extensions
		$ext	??= static::extensions();
		
		foreach ( $ext as $e ) {
			if ( \str_starts_with( $e, $lib ) ) {
				$lv = \phpversion( $e );
				
				// Error getting version?
				if ( false === $lv ) { return false; }
				
				return 
				\version_compare( \rtrim( $lv, '.0' ), $spec, '>=' );
			}
		}
		
		// Extension not found
		return false;
	}
	
	/**
	 *  Checking for function availability
	 *  
	 *  @param string	$func	Function name
	 *  @return bool		True If the function isn't available 
	 */
	public static function missing( string $func ) : bool {
		static $exts;
		static $blocked;
		static $fn	= [];
		
		if ( isset( $fn[$func] ) ) { return $fn[$func]; }
		
		// Previously, this was a Suhosin-aware check
		$fn[$func] = !\function_exists( $func );
		
		return $fn[$func];
	}
	
	/**
	 *  Clear empty content of spaces
	 *  
	 *  @param array	$data		Input contents from the user
	 *  @return array
	 */
	public static function filter_empty( array $data ) : array {
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
	public static function trimmed_list(
		string	$text, 
		bool	$lower	= false, 
		string	$sep	= ','
	) : array {
		$map = \array_map( 'trim', \explode( $sep, $text ) );
		return $lower ? \array_map( 'strtolower', $map ) : $map;
	}
	
	/**
	 *  Get list of current user-defined functions
	 *  
	 *  @param bool		$update	Force cache refresh
	 *  @param string|array	$filter	Function parameter filter
	 *  @return array
	 */
	public static function functions_list( 
		bool		$update	= false,
		string|array	$filter = ''
	) : array {
		static $functions;
		if ( $update || !isset( $functions ) ) {
			$functions = \get_defined_functions()['user'];
			// TODO: Reflection filter/sort using $filter
		}
		return $functions;
	}
	
	/**
	 *  Get formatted timestamp
	 *  
	 *  @param string	$format	Timestamp format
	 *  @return string
	 */
	public static function timestamp( string $format = 'Y-m-d H:i:s.u' ) : string {
		$dt = \DateTime::createFromFormat( 
			'U.u', \sprintf( '%.6F', \microtime( true ) ) 
		);
		return $dt ? $dt->format( $format ) : '';
	}
	
	/**
	 *  Attempt to detect text encoding
	 *  
	 *  @param string	$text		Searching block
	 *  @param array	$encodings	List of possible encodings
	 *  @return string
	 */
	public static function detect_encoding( string $text, array $encodings ) : string {
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
	public static function utf8( string $text, string $default = 'ISO-8859-1' ) : string {
		static $pool	= 
		[ 'UTF-8', 'ISO-8859-15', 'Windows-1252', 'Shift_JIS', 'EUC-JP', 
			'GB2312', 'GBK', 'Big5', 'ASCII', 'MacRoman', 'KOI8-R', 
			'UTF-16', 'UTF-32', 'ISO-8859-1' ];
		
		$enc		= static::detect_encoding( $text, $pool ) ?? $default;
		$out		= \mb_convert_encoding( $text, 'UTF-8', $enc );
		return ( false === $out ) ? '' : $out;
	}
	
	/**
	 *  Generate a unique, sortable timestamp based on set label
	 *  
	 *  @param string	$label		Stamp descriptor for categories etc...
	 *  @param bool		$use_stamp	Use timestamp prefix, if true
	 *  @return string
	 */
	public static function get_id( string $label, bool $use_stamp = true ) : string {
		$id	= ( string ) ( \getmypid() ?: \uniqid() );
		$stamp	= $use_stamp 
			? \sprintf( '%.6F', \microtime( true ) ) . '_'
			: '';
		
		return "{$stamp}{$label}_{$id}";
	}
		
	/**
	 *  Filter number within min and max range, inclusive
	 *  
	 *  @param mixed	$val		Given default value
	 *  @param int		$min		Minimum, returned if less than this
	 *  @param int		$max		Maximum, returned if greater than this
	 *  @return int
	 */
	public static function int_range( $val, int $min, int $max ) : int {
		$out = ( int ) $val;
		
		return ( $out > $max ) ? $max : ( ( $out < $min ) ? $min : $out );
	}
	
	/**
	 *  Generate a random string ID based on given random bytes
	 *  
	 *  @param int		$bytes		Size of random bytes
	 *  @param string	$prefix 	Random ID prefix
	 *  @return string
	 */
	public static function gen_key( int $len = 16, ?string $prefix = null ) : string {
		$len	= static::int_range( $len, 1, 64 );
		$prefix ??= '';
		return $prefix . \bin2hex( \random_bytes( \intdiv( $len, 2 ) ) );
	}
	
	/**
	 *  Generate an alphanumeric string with 32 bytes of random data
	 *  
	 *  @return string
	 */
	public static function gen_alphanum() : string {
		return 
		\preg_replace( 
			'/[^[:alnum:]]/u', 
			'', 
			\base64_encode( \random_bytes( 32 ) ) 
		);
	}
	
	/**
	 *  Generate globally unique identifier
	 *  
	 *  @param string	$mode	UUID mode, defaults to  v4
	 *  @return string
	 */
	public static function gen_uuid( ?string $mode = null ) : string {
		$mode	??= 'v4';
		
		if ( 0 === \strcasecmp( 'v4', $mode ) ) {
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
	public static function gen_guid() : string {
		return static::gen_uuid( 'v4' );
	}
	
	/**
	 *  Case insensitive array value search
	 *  
	 *  @param string	$value	Array value needle
	 *  @param array	$items	Searching haystack
	 *  @return bool
	 */
	public static function value_exists_ci( string $value, array $items ) : bool {
		if ( empty( $items ) ) { return false; }
		
		return \in_array( 
			\strtolower( $value ), 
			\array_map( 'strtolower', $items ) 
		);
	}
	
	/**
	 *  Case insensitive array key search
	 *  
	 *  @param string	$key	Array key needle
	 *  @param array	$items	Searching haystack
	 *  @return bool
	 */
	public static function key_exists_ci( string $key, array $items ) : bool {
		if ( empty( $items ) ) { return false; }
		return \array_key_exists( $key, \array_change_key_case( $items, \CASE_LOWER ) );
	}
	
	/**
	 *  Case insensitive array key search with value return
	 *  
	 *  @param string	$key	Array key needle
	 *  @param array	$items	Searching haystack
	 *  @return mixed
	 */
	public static function value_key_exists_ci( string $key, array $items ) : mixed {
		foreach ( $items as $k => $v ) {
			if ( 0 === \strcasecmp( $k, $key ) ) { return $v; }
		}
		return null;
	}
	
	/**
	 *  Safely encode array to JSON
	 *  
	 *  @param array	$data		Content to be encoded
	 *  @return string
	 */
	public static function json_uencode( array $data = [] ) : string {
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
	 *  
	 *  @param string|array		$data	Content to encode
	 *  @param int			$depth	Optional maximum encode depth
	 *  @return array
	 */
	public static function json_udecode( array|string $data, int $depth = 10 ) : array {
		if ( empty( $data ) ) { return []; }	
		if ( \is_array( $data ) ) { return $data; }
		
		// Since PHP 8.3+
		if ( !\json_validate( $data ) ) { return []; }
		
		$depth	= static::int_range( $depth, 1, 50 );
		$out	= 
		\json_decode( 
			static::utf8( $data ), true, $depth, 
			\JSON_BIGINT_AS_STRING
		);
		
		if ( \json_last_error() !== \JSON_ERROR_NONE ) { return []; }
		if ( empty( $out ) || false === $out ) { return []; }
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
	public static function json_uarray( 
		array|string	$json,
		bool		$values	= false, 
		int		$depth	= 10 
	) : array {
		if ( \is_array( $json ) ) {
			return $values 
				? \array_values( $json ) 
				: $json;
		}
		
		$data	= static::json_udecode( $json, $depth );
		return $values ? \array_values( $data ) : $data;
	}
	
	/**
	 *  Recursively convert array keys to lowercase
	 *  
	 *  @param array	$items	Collection to format
	 *  @return array
	 */
	public static function array_normalize_keys( array $items ) : array {
		$normal	= [];
		foreach( $items as $key => $value ) {
			$lkey		= 
			\is_string( $key ) 
				? \strtolower( $key ) : $key;
			
			$normal[$lkey]	= 
			\is_array( $value ) && !\array_is_list( $value )
				? static::array_normalize_keys( $value ) 
				: $value;
		}
		return $normal;
	}
	
	/**
	 *  Recursively convert array values to lowercase
	 *  
	 *  @param array	$tree	Raw catalog to process
	 *  @return array
	 */
	public static function normalize_array( array $tree ) : array {
		$normal	= [];
		
		foreach ( $tree as $key => $value ) {
			$normal[$key] = 
			match( true ) {
				\is_array( $value )	=> static::normalize_array( $value ), 
				\is_string( $value )	=> \strtolower( $value ), 
				default			=> $value
			};
		}
		
		return $normal;
	}
	
	/**
	 *  Convert dot value keys to merged result
	 *  
	 *  @param array	$items	Raw map (parsed JSON)
	 *  @param string	$prefix	Dot prefix
	 */
	public static function flatten_keys( array $items, string $prefix = '' ) : array {
		$result = [];
		foreach ( $items as $key => $value ) {
			$full_key = $prefix ? "{$prefix}.{$key}" : $key;
			if ( \is_array( $value ) ) {
				$result = 
				\array_merge( 
					$result, 
					static::flatten_keys( $value, $full_key ) 
				);
			} else {
				$result[$full_key] = $value;
			}
		}
		return $result;
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
	public static function flatten_array(
		array		$items, 
		string		$delim	= ':'
	) : array {
		$it	= 
		new \RecursiveIteratorIterator( 
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
	 *  Term replacement helper
	 *  Flattens multidimensional array into {$prefix:group:label...} format
	 *  and replaces matching placeholders in content
	 *  
	 *  @param string	$prefix		Replacement prefix E.G. 'lang'
	 *  @param array	$data		Multidimensional array
	 *  @param string	$content	Placeholders to replace
	 *  @return string
	 */ 
	public static function prefix_replace(
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
		$terms	= static::flatten_array( $data );
		
		// Replacements list
		$rpl	= [];
		
		$c	= \count( $m );
		
		// Set {prefix:group:label... } replacements or empty string
		for ( $i = 0; $i < $c; $i++ ) {
			if ( !isset( $m[1] ) ) { continue; }
			if ( !isset( $m[1][$i] ) ) { continue; }
			
			$rpl['{' . $prefix . $m[1][$i] . '}']	= 
				$terms[$m[1][$i]] ?? '';
		}
		
		return \strtr( $content, $rpl );
	}
	
	/**
	 *  Format a structured array into a URL query section
	 *  
	 *  @param array $query Presorted array
	 *  @return string
	 */
	public static function array_to_query( array $query ) : string {
		$parts = [];
		
		foreach ( $query as $key => $value ) {
			if ( '' === $key ) { continue; }
			
			foreach ( ( array ) $value as $v ) {
				$parts[] = 
				\urlencode( $key ) . '=' . \urlencode( $v ?? '' );
			}
		}
		
		return \implode( '&', $parts );
	}
	
	/**
	 *  Combine start, end ranges without overlap
	 *  
	 *  @param array	$ranges	Raw range sets
	 *  @return array
	 */
	public static function merge_ranges( array $ranges ) : array {
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
	public static function has_overlapping_ranges( array $ranges ) : bool {
		\usort( $ranges, fn( $a, $b ) => $a[0] <=> $b[0] );
		$rcount = count( $ranges );
		
		for ( $i = 1; $i < $rcount; $i++ ) {
			if ( $ranges[$i][0] < $ranges[$i - 1][1] ) { return true; }
		}
		
		return false;
	}
	
	/**
	 *  Accept field sorter by 'q=' priority
	 *  
	 *  @param string	$header	Server header label
	 *  @return array
	 */
	public static function accept_sort( string $header ) : array {
		$accept = \trim( $header );
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
		
		\usort( $parsed, fn( $a, $b ) => $b['q'] <=> $a['q'] );
		
		return \array_column( $parsed, 'term' );
	}
	
	/**
	 *  Value array filter application helper
	 *  
	 *  @param array	$lines		Extracted configuration lines
	 *  @param bool		$un		Unique values, if true
	 *  @param callable	$filter		Optional callable
	 *  @return array
	 */
	public function lines( array $lines, bool $un = false, $filter = null ) : array {
		if ( $un ) { $lines = \array_unique( $lines ); }
		
		return ( !empty( $filter ) && \is_callable( $filter ) )
			? \array_map( $filter, $lines ) 
			: $lines;
	}
	
	/**
	 *  Cached timezone list helper
	 *  
	 *  @return array
	 */
	public static function timezone_list() : array {
		static::$timezone_cache ??= \timezone_identifiers_list();
		return static::$timezone_cache;
	}
	
	/**
	 *  Check if given timezone is valid
	 *  
	 *  @param string	$tz	Raw timezone
	 *  @return bool
	 */
	public static function timezone_valid( string $tz ) : bool {
		return \in_array( $tz, static::timezone_list(), true );
	}
	
	/**
	 *  Check if given date is in the future
	 *  
	 *  @param DateTime	$start	Sent stamp
	 *  @return bool
	 */
	public static function date_is_future( \DateTime $start ) : bool {
		static::$now	??= new \DateTime();
		return $start > static::$now;
	}
	
	/**
	 *  Format request date format to archive limit range
	 *  
	 *  @param array	$params		Raw URL param
	 *  @param bool		$limit_now	Limit to current date, if true
	 *  @return array
	 */
	public static function date_range( array $params, bool $limit_now = false ) : array {
		static::$now	??= new \DateTime();
		
		$year		= $params['year']	?? null;
		$month		= $params['month']	?? null;
		$day		= $params['day']	?? null;
		$page		= ( int ) ( $params['page'] ?? 1 );
		
		if ( null === $year ) { return []; }
		
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
		
		$end	= ( $limit_now && $limit > static::$now ) ? static::$now : $limit;
		return [ $start, $end, $page ];
	}
	
	/**
	 *  Convert timestamp to int if it's not in integer format
	 *  
	 *  @param mixed	$stamp		Raw text stamp
	 *  @return int
	 */
	public static function time_string_int( $stamp = null ) : ?int {
		if ( empty( $stamp ) ) { return null; }
		
		if ( \is_numeric( $stamp ) ) { return ( int ) $stamp; }
		
		$st = \ltrim( \preg_replace( '/[^0-9\/]+/', '', $stamp ), '/' );
		return \strtotime( empty( $st ) ? 'now' : $st );
	}
	
	/**
	 *  UTC timestamp
	 *  
	 *  @param mixed	$stamp	Plain timestamp or null to generate new
	 *  @return string
	 */
	public static function utc( $stamp = null ) : string {
		return 
		\gmdate( 'Y-m-d\TH:i:s', static::time_string_int( $stamp ?? 'now' ) );
	}
	
	/**
	 *  Feed timestamp
	 *  
	 *  @param mixed	$stamp		Optional timestamp, defaults to 'now'
	 *  @return string
	 */
	public static function rfc_date( $stamp = null ) : string {
		return 
		\gmdate( 'D, d M Y H:i:s O', static::time_string_int( $stamp ?? 'now' ) );
	}
	
	/**
	 *  File modified timestamp
	 *  
	 *  @param mixed	$stamp		Optional timestamp, defaults to 'now'
	 *  @return string
	 */
	function rfc_file_date( $stamp = null ) : string {
		return 
		\gmdate( 'D, d M Y H:i:s T', static::time_string_int( $stamp ?? 'now' ) );
	}
}


/**
 *  @class Text utilities
 */
final class Text {
	/**
	 *  Get a list of tokens separated by spaces
	 *  
	 *  @param string	$text		Raw text containing repeated words
	 *  @return array
	 */
	public static function unique_terms( string $value ) : array {
		return \array_unique( 
			\preg_split( 
				pattern	: '/[[:space:]]+/', 
				subject	: \trim( $value ), 
				flags	: \PREG_SPLIT_NO_EMPTY 
			)
		);
	}
	
	/**
	 *  Length of given string
	 *  
	 *  @param string	$text	Raw input
	 *  @return int
	 */
	public static function size( string $text ) : int {
		return \mb_strlen( $text, '8bit' );
	}

	/**
	 *  Convert to unicode lowercase
	 *  
	 *  @param string	$text	Raw mixed/uppercase text
	 *  @return string
	 */
	public static function lowercase( string $text ) : string {
		return \mb_convert_case( $text, \MB_CASE_LOWER, 'UTF-8' );
	}
	
	/**
	 *  Limit string size
	 *  
	 *  @param string	$text	Raw input
	 *  @param int		$start	Beginning index
	 *  @param int		$size	Maximum string length
	 *  @return string
	 */
	public static function truncate( string $text, int $start, int $size ) {
		if ( static::size( $text ) <= $size ) { return $text; }
		
		return \mb_substr( $text, $start, $size, '8bit' );
	}
	
	/**
	 *  Limit a string without cutting off words
	 *  
	 *  @param string	$val	Text to cut down
	 *  @param int		$max	Content length (defaults to 100)
	 *  @return string
	 */
	public static function strim(
		string		$val, 
		int		$max		= 100
	) : string {
		$val	= \trim( $val );
		$len	= static::size( $val );
		
		if ( $len <= $max ) { return $val; }
		
		$out	= '';
		$words	= 
		\preg_split( 
			pattern	: '/([\.\s]+)/', 
			subject	: $val, 
			limit	: -1, 
			flags	: \PREG_SPLIT_OFFSET_CAPTURE | \PREG_SPLIT_DELIM_CAPTURE 
		);
		
		// No words?
		if ( false === $words ) {
			$out	= \preg_replace( '/[[:space:]]+/', ' ', $val );
			return static::truncate( $out, 0, $max );
		}
		
		for ( $i = 0; $i < \count( $words ); $i++ ) {
			$w	= $words[$i];
			// Add if this word's length is less than length
			if ( $w[1] <= $max ) { $out .= $w[0]; }
		}
		
		$out	= \preg_replace( "/\r?\n/", '', $out );
		
		// If there's too much overlap
		if ( static::size( $out ) > $max + 10 ) {
			$out = static::truncate( $out, 0, $max );
		}
		
		return $out;
	}
	
	/** 
	 *  Remove empty lines from the beginning and end of a list of lines
	 *  
	 *  @param array	$lines		Content lines
	 *  @param bool		$no_empty	Remove internally empty lines
	 *  @return array
	 */
	public static function trim_lines( array $lines, bool $no_empty = false ) : array {
		if ( empty( $lines ) ) { return []; }
		
		$lines = \array_map( static function( $val ) {
			return \is_array( $val ) ? '' : \strval( $val );
		}, $lines );
		
		if ( $no_empty ) {
			return \array_filter( $lines, static function( $val ) {
				return '' !== \trim( $val );
			} );
		}
		
		// Remove empty lines from beginning of list
		while( '' === \trim( \current( $lines ) ) ) {
			\array_shift( $lines );
		}
		
		if ( empty( $lines ) ) { return []; }
		
		// Empty lines from end of list
		while ( '' === \trim( \end( $lines ) ) ) {
			\array_pop( $lines );
		}
		
		\reset( $lines );
		return $lines;
	}
	
	/**
	 *  Convert all convertable elements in an array to string
	 *  
	 *  @param array	$items		Raw items list
	 *  @return array
	 */
	public static function string_array_values( array $items ) : array {
		$items	= 
		\array_filter( $items, static function( $val ) { 
			return ( !\is_array( $val ) && !\is_object( $val ) ) || (
				\is_object( $val ) && \method_exists( $val, '__toString' )
			);
		} );
		
		return \array_map( 'strval', $items );
	}
	
	/**
	 *  Lowercase all values in an array
	 *  
	 *  @param array	$items		Already string converted items list
	 *  @return array
	 */
	public static function lower_array_values( array $items  ) : array {
		return \array_map( 'Text::lowercase', $items );
	}
	
	/**
	 *  Try to detect if a string contains ASCII-only text
	 *  
	 *  @param string	$text		Text to test
	 *  @return bool
	 */
	public static function is_ascii( string $text ) : bool {
		return \mb_check_encoding( $text, 'ASCII' );
	}
	
	/**
	 *  Check if a string contains a fragment
	 *  
	 *  @param string|array	$source		Original text
	 *  @param string	$term		Search term
	 *  @param bool		$ci		Case insensitive if true (default)
	 */
	public static function has( 
		string|array	$source, 
		string		$term, 
		bool		$ci	= true 
	) : bool {
		if ( \is_array( $source ) ) {
			if ( empty( $source ) ) { return false; }
			
			$source = static::string_array_values( $source );
			return $ci 
				? \in_array( 
					static::lowercase( $term ), 
					static::lower_array_values( $source )
				)
				: \in_array( $term, $source );
		}
		
		return $ci 
			? \str_contains( 
				static::lowercase( $source ), 
				static::lowercase( $term ) 
			)
			: \str_contains( $source, $term );
	}
	
	/**
	 *  Check if string starts with a fragment
	 *  
	 *  @param string	$find		Needle to search
	 *  @param array	$collection	Haystack to search partials for
	 *  @param bool		$ci		Case insensitive if true (default)
	 *  @return bool
	 */
	public static function starts_with( 
		string	$find, 
		array	$collection, 
		bool	$ci		= true 
	) : bool {
		$collection	= static::string_array_values( $collection );
		if ( $ci ) {
			$find		= static::lowercase( $find );
			$collection	= static::lower_array_values( $find );
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
	public static function needle_search( string $find, array $collection ) : bool {
		foreach ( $collection as $c ) {
			if ( static::has( $find, $c ) ) { return true; }
		}
		return false;
	}
	
	/**
	 *  Split a block of text into an array of lines
	 *  
	 *  @param string	$text	Raw text to split into lines
	 *  @param int		$lim	Max line limit, defaults to unlimited
	 *  @param bool		$tr	Also trim lines if true
	 *  @return array
	 */
	public static function split_lines( string $text, int $lim = -1, bool $tr = true ) : array {
		$text	= \trim( $text );
		$lines	= 
		\preg_split( 
			pattern	: $tr ? '/\s*\R\s*/' : '/\R/', 
			subject	: $text, 
			limit	: $lim, 
			flags	: \PREG_SPLIT_NO_EMPTY 
		);
		
		return ( false === $lines ) ? [ $text ] : $lines;
	}
	
	/**
	 *  Path prefix slash (/) helper
	 *  @param string	$path	Folder or directory
	 *  @param bool		$suffix	Add to end, if true
	 *  @return string
	 */
	public static function slash_path( string $path, bool $suffix = false ) : string {
		return $suffix 
			? \rtrim( $path, '/\\' ) . '/' 
			: '/'. \ltrim( $path, '/\\' );
	}
}


/**
 *  @class Sanitizing and filtering
 */
final class Sanitize {
	
	/**
	 *  Strip unusable characters from raw text/html and conform to UTF-8
	 *  
	 *  @param string	$html	Raw content body to be cleaned
	 *  @param bool		$entities Convert to HTML entities
	 *  @return string
	 */
	public static function filter( 
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
		$html		= Util::utf8( \trim( $html ) );	// Convert to UTF-8
		$html		= \preg_replace( $filters, '', $html );
		
		// Convert Unicode character entities?
		return $entities 
			? \htmlentities( \trim( $html ), \ENT_QUOTES | \ENT_SUBSTITUTE, 'UTF-8' )
			: \trim( $html );
	}
	
	/**
	 *  HTML safe character entities in UTF-8
	 *  
	 *  @param string	$v	Raw text to turn to HTML entities
	 *  @param bool		$quotes	Convert quotes (defaults to true)
	 *  @param bool		$spaces	Convert spaces to "&nbsp;*" (defaults to true)
	 *  @param bool		$html	HTML Block
	 *  @return string
	 */
	public static function escape_text(
		string		$text, 
		bool		$quotes		= false, 
		bool		$spaces		= true,
		bool		$html		= true 
	) : string {
		$qflag	= $quotes ? \ENT_QUOTES : \ENT_NOQUOTES;
		$hflag	= $html ? \ENT_HTML5 : 0;
		$text	= static::filter( $text );
		$depth	= 0;
		$max_d	= 100;
		
		do {
			$depth++;
			if ( $depth > $max_d ) { return ''; }
			
			$decoded	= \htmlspecialchars_decode( $text, $qflag );
			$changed	= ( 0 !== \strcmp( $decoded, $text ) );
			$text		= $decoded;
		} while ( $changed );
		
		$text	= static::filter( $text );
		$flags	= $qflag | $hflag | \ENT_SUBSTITUTE;
		$text	= \htmlspecialchars( $text, $flags, 'UTF-8' );
		
		return ( $spaces ) ? \strtr( $text, [ 
				' ' => '&nbsp;',
				'	' => '&nbsp;&nbsp;&nbsp;&nbsp;'
			] ) : $text;
	}
	
	/**
	 *  Prevent directory traversal within URL segments
	 *  
	 *  @param string	$path	Folder or URI path
	 *  @return string
	 */
	public static function path_traversal( string $path ) : string {
		$path		= \preg_replace( '/\\\\/', '/', $path );
		
		// Path starts with slash? Keep it
		$pre		= \str_starts_with( $path, '/' ) ? '/' : '';
		
		$segments	= 
		\array_filter( 
			\explode( '/', $path ),
			static function( $seg ) {
				$seg = \trim( $seg );
				return 
					!\str_starts_with( $seg, '..' )	&& 
					!\str_ends_with( $seg, '..' );
			}
		);
		
		return $pre . \trim( \implode( '/', $segments ), '/' );
	}
	
	/**
	 *  User input and environment data filtering helper
	 *  
	 *  @param string	$source		Data source type, defaults to 'get'
	 *  @param array	$filter		Input processing filters
	 *  @return array
	 */
	public static function input_array( string $source, array $filter ) : array {
		$dtype	= 
		match( \strtolower( $source ) ) {
			'post'			=> \INPUT_POST,
			'cookie'		=> \INPUT_COOKIE,
			'server'		=> \INPUT_SERVER,
			'env', 'environment'	=> \INPUT_ENV,
			
			default			=> \INPUT_GET
		};
		
		return \filter_input_array( $dtype, $filter, true ) ?: [];
	}
	
	/**
	 *  Attempt to filter host name
	 *  
	 *  @param string	$txt	Raw host definition
	 *  @return array
	 */
	public static function host( string $txt ) : string {
		return Text::lowercase( \rtrim( 
			\parse_url( $txt, \PHP_URL_HOST ) ?? '', 
			" \t\n\r\0\x0B." 
		) );
	}
	
	/**
	 *  Attempt to stop URI/URL injection
	 *  
	 *  @param string	$tex	Raw text input
	 *  @return string
	 */
	public static function strip_xss( string $text ) : string {
		static $patterns	= [
			'/expression\s*\(.*?\)/i',			// Probably not needed
			'/(\\~\/|\.\.|\\\\|\-\-)/sm',			// Directory traversal
			'/(<(s(?:cript|tyle)).*?)/ism',			// Injection
			'/(document\s*\.|window\s*\.)/i',		// Events and scripts
			'/\beval\s*\(/i',
			'/url\(\s*(?:javascript|jscript|livescript|vbscript|data)\s*[:&colon;][^\)]*\)/i'
		];
		
		$text	= \preg_replace( '/\/\*.*?\*\//s', '', $text );	// Comments
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
	 *  Cleaned URI with parsed path components
	 *  
	 *  @param string	$raw	Raw URI from source
	 *  @param string	$base	Prefix if required
	 *  @return string
	 */
	public static function uri( string $raw, ?string $base = null ) : string|null {
		$path	= \preg_replace( '/\\\\/', '/', $raw ) ;
		$path	= \trim( \parse_url( $path, \PHP_URL_PATH ) ?? '', '/' );
		$depth	= 0;
		$max_d	= 10;
		
		// Normalize
		do {
			$depth++;
			if ( $depth > $max_d ) { return null; }
			
			$decoded	= static::filter( \rawurldecode( $path ) );	// Invalid chars
			$decoded	= \preg_replace( '#/{2,}#', '/', $decoded );	// Collapse
			
			$changed	= ( $decoded !== $path );
			$path		= $decoded;
		} while( $changed );
		
		// Prevent directory traversal
		$final	= static::path_traversal( $path );
		
		return ( $base && !\str_starts_with( $final, $base ) ) 
			? null
			: $final;
	}
	
	/**
	 *  Attempt to filter URL
	 *  This is not a 100% foolproof method, but it's better than nothing
	 *  
	 *  @param string	$txt	Raw URL attribute value
	 *  @param bool		$xss	Filter XSS possibilities
	 *  @return string
	 */
	public static function url( string $text, bool $xss = true ) : string {
		$text = \trim( $text );
		
		// Nothing to clean
		if ( '' === $text ) { return ''; }
		
		if ( $xss ) {
			$text = static::strip_xss( $text );
		}
		
		// Absolute paths?
		if ( \preg_match( '~^[a-z][a-z0-9+\-.]*://~i', $text ) ) {
			// Default filter
			return ( !\filter_var( $text, \FILTER_VALIDATE_URL ) ) 
				? ''
				: static::escape_text( $text, false, false );
		}
		
		$path	= static::uri( $text ) ?? '';
		return ( null === $path || '' === $path )
			? '' 
			: static::escape_text( $path, false, false );
	}
	
	/**
	 *  Attempt to decode encoded URLs
	 *  
	 *  @param string	$url	Raw URL string
	 *  @param int		$limit	Decoding depth limit
	 *  @return mixed
	 */
	public static function surldecode( string $url, int $limit = 10 ) : ?string {
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
	public static function query( 
		bool	$parsed		= true, 
		bool	$lower_keys	= false 
	) : string|array {
		static $query;
		static $result;
		static $result_lower;
		
		$query	??= $_SERVER['QUERY_STRING'] ?? '';
		
		if ( isset( $result ) && isset( $result_lower ) ) {
			return $parsed 
				? ( $lower_keys ? $result_lower : $result )
				: $query;
		}
		
		$result	= [];
		$pairs	= \explode( '&', $query );
		foreach ( $pairs as $pair ) {
			if ( '' === $pair ) { continue; }
			
			[ $key, $value ] = 
			\array_map( 
				'Sanitize::surldecode', 
				\explode( '=', $pair, 2 ) + [ 1 => '' ] 
			);
			
			if ( '' === $key || null === $key ) { continue; }
			
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
		return $lower_keys ? $result_lower : $result;
	}
	
	/**
	 *  Check if given file name is reserved
	 *  
	 *  @param string	$name	Raw filename
	 *  @return bool
	 */
	public static function is_reserved_name( string $name ) : bool {
		static $reserved = [
			'con', 'prn', 'aux', 'nul',
			'com1','com2','com3','com4','com5','com6','com7','com8','com9',
			'lpt1','lpt2','lpt3','lpt4','lpt5','lpt6','lpt7','lpt8','lpt9'
		];
		
		$base	= \trim( Text::lowercase( \pathinfo( $name, \PATHINFO_FILENAME ) ) );
		return '' !== $base && \in_array( $base, $reserved );
	}
	
	/**
	 *  Clean filename to safe format
	 *  
	 *  @param string $name Raw filename
	 *  @return string
	 */
	public static function sfilename( string $name ) : string|null {
		$name	= static::filter( $name ); 
		
		$name	= \preg_replace( '/[\/\\\?\*\:\|"<>\x00-\x1F]/u', '_', $name );
		$name	= \preg_replace( '/\_+/', '_', $name );
		$name	= \preg_replace( '/[[:space:]]+/', ' ', $name );
		$name	= \trim( $name, ". \t\n\r\0\x0B" );
		
		if ( '' === $name ) { return null; }
		
		if ( static::is_reserved_name( $name ) ) {
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
	public static function password( string $password ) : string {
		return Util::utf8( \trim( $password ) );
	}
	
	/**
	 *  Basic directory path filter
	 *  
	 *  @param string	$base_dir	Root directory
	 *  @param string	$filename	Raw file name
	 *  @param int		$max		Maximum file path with root included
	 *  @return bool
	 */
	public static function is_valid_path( 
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
	public static function normalize_fmode( string $mode ) : ?string  {
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
	public static function spaces( 
		string	$text, 
		string	$rpl	= ' ', 
		bool	$br	= false 
	) : string {
		return $br 
			? \preg_replace( '/[ \t\v\f]+/', $rpl, static::filter( $text ) )
			: \preg_replace( '/[[:space:]]+/', $rpl, static::filter( $text ) );
	}
	
	/**
	 *  Clean a directory or folder name
	 *  
	 *  @param string	$text		Viable folder name
	 */
	public static function sdir( string $text ) : bool {
		return ( bool ) \preg_match( '/^[A-Za-z0-9_-]+$/', $text );
	}
	
	/**
	 *  Filter slug to appropriate format
	 *  
	 *  @param string	$text		Raw slug or title
	 *  @param string	$prefix		Slug prefix if sanitizing failed
	 *  @return string
	 */
	public static function slug( string $text, string $prefix = 'node-' ) : string {
		$text	= \preg_replace( '/[^\pL\pN]+/u', '-', static::filter( $text ) );
		$text	= \preg_replace( '/-+/', '-', $text );
		$text	= \mb_strtolower( $text, 'UTF-8' );
		$text	= \trim( $text, '-' );
		
		return empty( $text ) ? Util::gen_key( 16, $prefix ) : $text;
	}
	
	/**
	 *  Make text completely bland by stripping punctuation, 
	 *  spaces and diacritics (for further processing)
	 *  
	 *  @param string	$text		Raw input text
	 *  @param bool		$nospecial	Remove special characters if true
	 *  @return string
	 */
	public static function bland( string $text, bool $nospecial = false ) : string {
		$text = \strip_tags( static::spaces( $text ) );

		return $nospecial 
			? \preg_replace( '/[^\p{L}\p{N}\-\s_]+/', '', \trim( $text ) ) 
			: \trim( $text );
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
	public static function normalize( string $text ) : string {
		if ( Util::missing( 'normalizer_normalize' ) ) { return $text; }
		
		$normal = 
		\normalizer_normalize( static::bland( $text ), \Normalizer::FORM_C );
		
		return ( false === $normal ) ? $text : $normal;
	}
	
	/**
	 *  Filter XML string
	 *  
	 *  @param string	$text		Raw block
	 *  @return string
	 */
	public static function xml( string $text ) : string {
		$text	= static::filter( $text );
		if ( '' === $text ) { return ''; }
		
		return 
		\htmlspecialchars( 
			string		: $text, 
			flags		: ENT_XML1 | ENT_QUOTES | ENT_SUBSTITUTE, 
			encoding	: 'UTF-8' 
		);
	}
	
	public static function text( string $text ) : string {
		return static::strip_xss( \strip_tags( static::filter( $text ) ) );
	}
	
	public static function sint( string $text ) : int {
		return ( int ) static::text( $text );
	}
	
	public static function sbool( string $text ) : bool {
		return ( bool ) static::text( $text );
	}
	
	public static function cast_to_string( mixed $value ) : string {
		if ( \is_object( $value ) ) {
			if ( \method_exists( $value, '__toString' ) ) {
				return ( string ) $value;
			}
			return '';
		}
		return \is_array( $value ) ? '' : ( string ) $value;
	}
	
	public static function cast_to_int( mixed $value ) : int {
		return ( int ) static::cast_to_string( $value );
	}
	
	/**
	 *  Simple email address filter helper
	 *  
	 *  @param string	$email	Raw email (currently doesn't support Unicode domains)
	 *  @return string
	 */
	public static function semail( string $email ) : string {
		return \filter_var( $email, \FILTER_VALIDATE_EMAIL ) 
			? $email : '';
	}
	
	/**
	 *  Prepend given prefix to URLs starting with '/'
	 *  
	 *  @param string	$url	Raw URL path
	 *  @param string	$prefix	Prefix to prepend if $url starts with '/'
	 *  @return string
	 */
	public static function prepend_path( string $v, string $prefix ) : string {
		$v	= \trim( $v, '"\'' );
		return \preg_match( '/^\//', $v ) 
			? static::url( $prefix . $v ) 
			: static::url( $v );
	}
	
	/**
	 *  Check if the requested path has a whitelisted extension
	 *  
	 *  @param string	$path		Requested URI
	 *  @param array	$groups		Configuration groups
	 *  @param string	$name		Specific type I.E. "images"
	 *  @return bool
	 */
	public static function is_safe_ext( 
		string	$path, 
		array	$groups, 
		?string	$name	= null 
	) : bool {
		static $safe	= [];
		static $checked	= [];
		$key		= $name . $path;
		$name		??= 'all';
		
		if ( isset( $checked[$key] ) ) { return $checked[$key]; }
		$safe[$name]	??= $groups;
		
		$ext		= 
		\pathinfo( $path, \PATHINFO_EXTENSION ) ?? '';
		
		$checked[$key] = Util::value_exists_ci( $ext, $safe[$name] );
		
		return $checked[$key];
	}
	
	public static function sizes( string $sizes ) : string {
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

	public static function srcset( string $srcset ) : string {
		static $rx_fsize= '/^\d+(w|x)$/';
		static $rx_file	= 
		'/^\/[a-zA-Z0-9_\-\/]+\.(png|jpg|jpeg|gif|bmp|tif|tiff)$/';
		
		$entries	= \explode( ',', $srcset );
		$clean		= [];
		
		foreach ( $entries as $entry ) {
			// Splits URL and size descriptor
			$entry		= \trim( \preg_replace( '/\s+/', ' ', $entry ) );
			[ $url, $desc ]	= \preg_split( '/\s+/', $entry, 2 ) + [ '', '' ];
			$desc		= \trim( $desc ?? '' );
			$valid		= 
				// Absolute URLs
				( false !== \filter_var( $url, \FILTER_VALIDATE_URL ) ) || 
				
				// Relative paths limited to simple characters
				( 1 === \preg_match( $rx_file, $url ) );
			
			// Skip invalid URL
			if ( !$valid ) { continue; }
			
			// Validate size descriptor
			$desc		= \preg_match( $rx_fsize, $desc ) ? $desc : '';
			
			// Store sanitized entry
			$url		= static::uri( $url ) ?: '';
			$clean[]	= \trim( "{$url} {$desc}" );
		}
		
		return \implode( ', ', $clean );
	}
	
	public static function css_url( string $value ) : string {
		if ( !\preg_match( '/url\(\s*([^\)]+)\s*\)/i', $value, $m ) ) {
			return '';
		}
		
		$clean	= static::url( \trim( $m[1], "'\"" ) );
		return ( '' === $clean ) ? '' : "url('{$clean}')";
	}
	
	public static function style( string $text, ?array $allowed = null ) : string {
		static	$css	= '/^[a-z0-9\s\(\)\#\.,%\-\[\]!:;\/]+$/i';
		static	$urls	= [
			'background', 'background-image', 
			'list-style', 'list-style-image'
		];
		static	$default = [ 
			'color', 'background-color', 'font-size', 'font-weight',
			'text-align', 'border', 'margin','padding', 'display'
		];
		
		// Fallback set
		$allowed	??= $default;
		
		// Problematic patterns
		$text		= static::strip_xss( $text );
		
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
				
			// Is a URL and whitelisted?
			if ( false !== \stripos( $value, 'url(' ) ) {
				if ( !\in_array( $property, $urls, true ) ) { continue; }
			
				$value = static::css_url( $value );
				if ( '' === $value ) { continue; }
			}
			
			// Clean property and value
			$sanitized[] = "{$property}: {$value}";
		}
		
		// Return to CSS style="" syntax
		return \implode( '; ', $sanitized );
	}
	
	public static function attribute( 
		\DOMElement	$node, 
		\DOMElement	$new_node, 
		string		$attr, 
		array		$rule 
	) : void {
		$value		= $node->getAttribute( $attr );
		if ( !\preg_match( '/^[a-z][a-z0-9_\-]*$/i', $attr ) ) { return; }
		
		// Limited subset of allowed values
		if ( isset( $rule['allowed'] ) ) {
			if ( \is_array( $rule['allowed'] ) ) {
				if ( Util::value_exists_ci( $value,  $rule['allowed'] ) ) {
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
		
		$sanitizer	= 
		match( true ) {
			isset( $rule['filter'] )	&& 
			\defined( $rule['filter'] )	&& 
			\is_int( \constant( $rule['filter'] ) )
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
			
			isset( $rule['callback'] ) && \is_callable( $rule['callback'] ) 
				=> fn( $v ) => \call_user_func( $rule['callback'], $v ),
			
			default	=> fn( $v ) => static::escape_text( $v, false, false )
		};
		
		$sanitized = $sanitizer( $value );
		if ( $sanitized !== false && $sanitized !== null ) {
			$new_node->setAttribute( $attr, $sanitized );
		}
	}
	
	/**
	 *  Sanitize DOMNode
	 *  
	 *  @param DOMNode	$node	Element to filter
	 *  @param DOMNode	$parent	Parent element
	 *  @return DOMNode
	 */
	public static function escape_node( \DOMNode $node, \DOMNode $parent ) : \DOMNode {
		$name		= \strtolower( $node->nodeName );
		if ( !\preg_match( '/^[a-z][a-z0-9\-]*$/', $name ) ) { $name = 'div'; }
		
		$inner_html	= '';
		foreach ( $node->childNodes as $child ) {
			$inner_html .= $node->ownerDocument->saveHTML( $child );
		}
		
		$new_node	= $parent->ownerDocument->createElement( $name );
		$new_node->appendChild( 
			$parent->ownerDocument->createTextNode( static::escape_text( $inner_html ) ) 
		);
		return $new_node;
	}

	/**
	 *  Convert text block to filtered HTML
	 *  
	 *  @param string	$html		Raw content
	 *  @param array	$tag_map	Whitelisted tags and attributes
	 *  @return string
	 */
	public static function html( string $html, array $tag_map ) : string {
		static $ierr;
		
		$ierr	??= \libxml_use_internal_errors( true );
		$doc	= new \DOMDocument();
		
		$doc->loadHTML(
			'<meta http-equiv="Content-Type" content="text/html; charset=utf-8">'.
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
			$original_tag	= $node->nodeName;
			foreach ( $tag_map as $key => $rules ) {
				if ( 0 === \strcasecmp( $key, $original_tag ) ) {
					$tag = $key; // Assign if valid
					break;
				}
				
			 	$alias = $rules['alias'] ?? [];
				if ( !\is_array( $alias ) ) { continue; }
				
				if ( Util::value_exists_ci( $original_tag, $alias ) ) {
					$tag = $key;
					break;
				}
			}
		
			// Not found
			if ( null === $tag ) { return null; }
			
			$new_tag	= 
			\preg_match( '/^[a-z][a-z0-9_\-]*$/i', $tag ) 
				? \strtolower( $tag )
				: 'div';
				
			// Special cases
			if ( \in_array( $new_tag, [ 'code', 'pre', 'kbd' ], true ) ) {
				return static::escape_node( $node, $cleaned );
			}
			
			$new_node	= $cleaned->createElement( $new_tag );
			$attr_rules	= $tag_map[$tag]['attributes'] ?? [];
			
			foreach ( $attr_rules as $attr => $rule ) {
				// Skip if not in whitelist at all
				if ( !$node->hasAttribute( $attr ) ) { continue; }
				
				static::attribute( $node, $new_node, $attr, $rule );
			}
			
			if ( $node->hasChildNodes() ) {
				foreach ( $node->childNodes as $child ) {
					$clean_child = $clean_node( $child );
					if ( $clean_child ) {
						$new_node->appendChild( $clean_child );
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
}


/**
 *  @class Storage, reading, and writing
 */
final class Storage {
	
	/**
	 *  Storage configuration settings helper
	 *  
	 *  @param array $new_options Override presets
	 *  @return array
	 */
	public static function options( ?array $new_options = null ) : array {
		static $options	= [
			'write_depth'	=> 10,
			'tmp_ext'	=> '.tmp',
			'bkp_ext'	=> '.bkp',
			'lock_type'	=> 'file',
			'lock_tries'	=> 3,
			'lock_wait'	=> 10,
			'lock_stale'	=> 600,
			'temp_stale'	=> 3600,
			'writable'	=> [ 'cache', 'data', 'storage', 'uploads', 'media' ]
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
	public static function get_id() : string {
		return Util::get_id( 'storage', true );
	}
	
	/**
	 *  File size helper
	 *  
	 *  @param string	$fpath	Location on disk
	 *  @return int
	 */
	public static function file_size( string $fpath ) : int {
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
	public static function file_time( string $fpath ) : int {
		return ( int )( @\filemtime( $fpath ) ?: 0 );
	}
	
	/**
	 *  File mime-type detection helper
	 *  
	 *  @param string	$fpath	Fixed file path
	 *  @return string
	 */
	public static function file_mime( string $fpath ) : string {
		static $finfo;
		static $text_types = [
			'txt'	=> 'text/plain',
			'css'	=> 'text/css',
			'js'	=> 'application/javascript',
			'svg'	=> 'image/svg+xml',
			'vtt'	=> 'text/vtt',
			'json'	=> 'application/json',
			'xml'	=> 'application/xml',
			'html'	=> 'text/html',
			'csv'	=> 'text/csv',
			'md'	=> 'text/markdown'
		];
		
		$ext	= \strtolower( \pathinfo( $fpath, \PATHINFO_EXTENSION ) );
		
		// Simpler text types
		if ( isset( $text_types[$ext] ) ) {
			return $text_types[$ext];
		}
		
		$finfo	??= new \finfo( \FILEINFO_MIME_TYPE );
		$mime	= $finfo->file( $fpath );
		return $mime ?: 'application/octet-stream';
	}
	
	/**
	 *  File opening helper
	 *  
	 *  @param string	$fpath	Location on disk
	 *  @param string	$mode	File opening mode
	 *  @return resource
	 */
	public static function file_open( string $fpath, string $mode = 'rb' ) : \resource {
		$mode		= Sanitize::normalize_fmode( $mode );
		if ( empty( $mode ) )  {
			throw new 
			\InvalidArgumentException( 'Invalid file open mode' );
		}
		
		$handle		= \fopen( $fpath, $mode );
		if ( false === $handle ) {
			\error_log( "Unable to open file '{$fpath}' with mode '{$mode}'" );
			
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
	public static function file_hash( string $fpath ) : string|false {
		if ( !\is_readable( $fpath ) ) { return false; }
		
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
			if ( 'stream' === \get_resource_type( $handle ) ) {
				\fclose( $handle );
			}
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
	public static function dirtype_lock( string $lock_file, int $tries = 3 ) : bool {
		$lock_dir	= $lock_file . '.lockdir';
		$start		= time();
		
		while ( $tries > 0 ) {
			// Try to acquire lock atomically
			if ( !\mkdir( $lock_dir ) && !\is_dir( $lock_dir ) ) {
				$tries--;
				$t = 0; // Silence IDE "positive int" error
				\time_nanosleep( $t, 100000 );
				continue;
			}
			
			\register_shutdown_function( function() use ( $lock_dir ) {
				@\rmdir( $lock_dir );
			} );
			return true;
		}
		
		return false;
	}
	
	/**
	 *  Obtains an exclusive file lock with retry
	 *  
	 *  @param mixed	$handle		File handle
	 *  @param int		$tries		Number of attempts
	 *  @return bool			True on success
	 */
	public static function filetype_lock( &$handle, int $tries = 3 ) : bool {
		$locked	= false;
		for ( $i = 0; $i < $tries; $i++ ) {
			if ( \flock( $handle, \LOCK_EX | \LOCK_NB ) ) {
				$locked = true;
				break;
			}
			$t = 0;
			\time_nanosleep( $t, 100000 );
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
	public static function clean_stale_lock(
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
			
			if ( \is_file( $check ) ) { @\unlink( $check ); }
			elseif ( \is_dir( $check ) ) { @\rmdir( $check ); } 
			
			\error_log( "Stale lock for '{$lock_file}' removed" );
		}
	}
	
	/**
	 *  Remove directory of filetype lock
	 *  
	 *  @param mixed	$handle		File handle
	 *  @param string	$lock_file	File lock path
	 */
	public static function release_lock( &$handle, string $lock_file ) : void {
		$ltype	= static::options()['lock_type'];
		if ( 0 === \strcasecmp( 'file', $ltype ) ) {
			if ( null === $handle ) { return; }
			if ( $handle instanceof \SplFileObject ) {
				@$handle->flock( \LOCK_UN );
				$handle = null;
			} elseif ( \is_resource( $handle ) ) {
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
	public static function close_files( array $files ) : void {
		foreach( $files as &$item ) {
			if ( $item instanceof \SplFileObject ) { $item = null; }
			if (  \is_resource( $item ) && 'stream' === \get_resource_type( $item ) ) {
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
	public static function check_wait( string $lock_file, int $start, int $max_wait ) : bool {
		if ( time() - $start > $max_wait ) {
			\error_log( "Timeout while waiting for lock: {$lock_file}" );
			return false;
		}
		
		$t = 0;
		\time_nanosleep( $t, 100000 );
		return true;		
	}
	
	/**
	 *  Obtain file lock (directory of filetype) with a given access mode
	 *  
	 *  @param string 	$lock_file	File lock path
	 *  @param string	$mode		File open mode
	 *  @return mixed
	 */
	public static function lock_file( string $lock_file, string $mode ) : false|\resource {
		$options	= static::options();
		$tries		= $options['lock_tries'];
		$type		= $options['lock_type'];
		
		$max_wait	= $options['lock_wait'];
		$max_age	= $options['lock_stale'];
		$start		= time();
		
		$handle		= null;
		
		// Clean any previous locks
		static::clean_stale_lock( $lock_file, $type, $max_age );
		
		$get_lock	= 
		function() use ( &$handle, $tries, $type, $lock_file ) {
			return ( 0 === \strcasecmp( 'file', $type ) )
				? static::filetype_lock( $handle, $tries )
				: static::dirtype_lock( $lock_file, $tries );
		};
		
		// Attempt lock
		while ( true ) {
			$handle = \fopen( $lock_file, $mode );
			if ( $handle && $get_lock() ) { return $handle; }
			
			if ( !static::check_wait( $lock_file, $start, $max_wait ) ) {
				static::release_lock( $handle, $lock_file );
				return false; 
			}
			
			$t = 0;
			\time_nanosleep( $t, 100000 );
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
	public static function find_writable(
		string		$start, 
		string|array	$target, 
		int		$max_depth	= 10 
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
			$dir !== \dirname( $dir )	&& 
			$depth > 0
		) {
			foreach ( $names as $check ) {
				$child = $dir . \DIRECTORY_SEPARATOR . $check;
				if ( 
					\is_dir( $child )	&& 
					\is_writable( $child )	&& 
					\is_readable( $child ) 
				) { return $child; }
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
	public static function base() : string {
		$options	= static::options();
		$dirs		= 
		$options['writable'] ?? [ 'cache', 'data', 'storage', 'uploads', 'media' ];
		
		if ( isset( $options['storage_dir'] ) ) {
			return $options['storage_dir'];
		}
		
		if ( \defined( 'STORAGE_DIR' ) ) { 
			$sdir		= \constant( 'STORAGE_DIR' );
			$storage_dir	= \rtrim( $sdir, '\\/' ) . \DIRECTORY_SEPARATOR; 
			
			static::options( [ 'storage_dir' => $storage_dir ] );
			return $storage_dir;
		}
		
		$env_storage	= \getenv( 'STORAGE_DIR' );
		$storage	= ( $env_storage && \is_writable( $env_storage ) )
			? $env_storage
			: static::find_writable( __DIR__, $dirs );
		
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
		static::options( [ 'storage_dir' => $storage_dir ] );
		return $storage_dir;
	}
	
	/**
	 *  Create a backup file name of given file
	 *  
	 *  @param string	$name	Target file name
	 *  @return string		Backup file path
	 */
	public static function backup_path( string $name ) : string {
		$ext	= static::options()['bkp_ext'] ?? '.bkp';
		$base	= \basename( $name );
		do {
			$bkp = static::base()
				. $base . '.' 
				. Util::timestamp( 'Y-m-d_H-i-s_' ) 
				. \uniqid( '', true ) . $ext;
		} while ( \file_exists( $bkp ) );
		
		return $bkp;
	}
	
	/**
	 *  Clean any temporary files in storage location
	 *  
	 *  @param string	$path	Sub path in base storage location
	 */
	public static function temp_cleanup( string $path ) : void {
		static $cleanup	= [];
		if ( isset( $cleanup[$path] ) ) { return; }
		
		$options	= static::options();
		$stale		= $options['temp_stale'];
		$cleanup[$path]	= true;
		$pattern	= $path . '.*' . ( $options['tmp_ext'] ?? '.tmp' );
		
		\register_shutdown_function( function() use( $pattern, $stale ) {
			$check = time() - $stale;
			try {
				foreach ( \glob( $pattern, \GLOB_NOSORT ) as $file ) {
					$mtime = \filemtime( $file );
					if ( false !== $mtime && $mtime < $check ) { 
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
	public static function append( string $path, string $data, bool $block = false ) : bool {
		$id	= static::get_id();
		$handle	= @\fopen( $path, 'a' );
		if ( !$handle || !\is_resource( $handle ) ) {
			\error_log( "Unable to open log file '{$path}' by {$id}" );
			return false;
		}
		
		$mode	= $block ? \LOCK_EX : \LOCK_EX | \LOCK_NB;
		if ( !@\flock( $handle, $mode ) ) {
			if ( \is_resource( $handle ) ) { \fclose( $handle ); }
			\error_log( "Unable to acquire lock on log file '{$path}' by {$id}" );
			return false;
		}
		
		$result	= @\fwrite( $handle, $data . \PHP_EOL );
		if ( false === $result ) {
			\error_log( "Write failed for '{$path}' by {$id}" );
		}
		
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
	public static function write_file( string $path, string $data ) : bool {
		// Unique lock signature
		$id		= static::get_id();
		
		// Check if able to overwrite
		if ( \file_exists( $path ) && !\is_writable( $path ) ) {
			$msg	= "Target file exists, but is not writable";
			\error_log( $msg . ": path '{$path}' by {$id}" );
			
			throw new 
			\RuntimeException( $msg );
		}
		
		$options	= static::options();
		$lock_file	= $path . '.lock';
		$ext		= $options['tmp_ext'] ?? '.tmp';
		$tmp_handle	= null;
		$lock_handle	= false;
		$rnb		= \bin2hex( \random_bytes( 4 ) );
		$tmp_file	= "{$path}.{$id}.{$rnb}.{$ext}";
		
		try {
			$lock_handle	= static::lock_file( $lock_file, 'c+' );
		} catch( \Throwable $e ) {
			$msg		= "Unable to acquire lock";
			\error_log( $msg . " for '{$lock_file}' by {$id}: {$e->getMessage()}" );
			
			throw new 
			\RuntimeException( $msg );
		}
		
		if ( !$lock_handle ) { // Usually shouldn't come this far if there was an error
			$msg		= "Unable to acquire lock";
			\error_log( $msg . " for '{$lock_file}' by {$id}" );
			
			throw new 
			\RuntimeException( $msg );
		}
		
		try {
			$tmp_handle	= \fopen( $tmp_file, 'c' );
		} catch( \Throwable $e ) {
			$msg		= "Unable to create temp file";
			\error_log( $msg . " '{$tmp_file}' by {$id}: {$e->getMessage()}" );
			
			throw new 
			\RuntimeException( $msg );
		}
		
		if ( !$tmp_handle ) { // Above catch failed for some reason
			$msg		= "Unable to create temp file";
			static::release_lock( $lock_handle, $lock_file );
			\error_log( $msg . " '{$tmp_file}' by {$id}" );
			
			throw new 
			\RuntimeException( $msg );
		}
		
		// Write and finish
		$state = \fwrite( $tmp_handle, $data );
		if ( false === $state || $state < \strlen( $data ) ) {
			$msg		= "Failed to write temp file";
			@\fclose( $tmp_handle );
			static::release_lock( $lock_handle, $lock_file );
			\error_log( $msg . " {$tmp_file} by {$id}" );
			
			throw new 
			\RuntimeException( $msg );
		}
		
		// Done write, prepare to move
		@\fclose( $tmp_handle );
		
		// Cleanup
		if ( \file_exists( $path ) && !\is_writable( $path ) ) {
			$msg	= "Target file is not writable";
			static::release_lock( $lock_handle, $lock_file );
			\error_log( $msg . ": path '{$path}' by {$id}" );
			
			throw new 
			\RuntimeException( $msg );
		}
		
		// Move temp to permanent location
		if ( !\rename( $tmp_file, $path ) ) {
			if ( !\copy( $tmp_file, $path ) || !\unlink( $tmp_file ) ) {
				$msg	= "Failed to replace file";
				static::release_lock( $lock_handle, $lock_file );
				\error_log( $msg . ": path'{$path}' with '{$tmp_file}' by {$id}" );
				
				throw new 
				\RuntimeException( $msg );
			}
		}
		
		static::release_lock( $lock_handle, $lock_file );
		static::temp_cleanup( $path );
		return true;
	}
	
	/**
	 *  Rename if a file by that name already exists in destination
	 *  
	 *  @param string	$path	Original file name
	 */
	public static function dup_rename( string $path ) : string {
		$info	= \pathinfo( $path );
		$ext	= Sanitize::sfilename( $info['extension'] ?? '' );
		$name	= Sanitize::sfilename( $info['filename'] );
		$dir	= $info['dirname'];
		$file	= $path;
		$i	= 0;
		
		while ( \file_exists( $file ) ) {
			$file = Text::slash_path( $dir, true ) . 
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
	public static function prefix_path(
		string	$path, 
		string	$prefix, 
		bool	$overwrite	= false 
	) : string {
		$fname	= 
		\rtrim( \dirname( $path ), \DIRECTORY_SEPARATOR ) . 
			\DIRECTORY_SEPARATOR . 
			$prefix . \basename( $path );
		
		// Avoid duplicates?
		return $overwrite ? $fname : static::dup_rename( $fname );
	}
	
	/**
	 *  Get iterator to a list of files from given base diretory 
	 * 
	 *  @param string	$base		Root path to files
	 *  @return mixed
	 */
	public static function files_as_iterator( string $base ) : \RecursiveIteratorIterator|null {
		$base		= \rtrim( $base,  '/\\' );
		if ( @!\is_dir( $base ) || @!\is_readable( $base ) ) { 
			return null;
		}
		
		$dir		= 
		new \RecursiveDirectoryIterator( 
			$base, 
			\FilesystemIterator::FOLLOW_SYMLINKS	| 
			\FilesystemIterator::KEY_AS_FILENAME	| 
			\FilesystemIterator::SKIP_DOTS
		);
		
		return 
		new \RecursiveIteratorIterator( 
			$dir, 
			\RecursiveIteratorIterator::LEAVES_ONLY,
			\RecursiveIteratorIterator::CATCH_GET_CHILD
		);
	}
}


/**
 *  @class Logging and message handling
 */
final class Log extends Instance {
	
	/**
	 *  @var array<file:string, message:string>	Message and file pairs
	 */
	private array $cache	= [];
	
	/**
	 *  @var array<string, int>				Log level proiority
	 */
	private array $priority	= [ 
		'DEBUG'		=> 0, 
		'INFO'		=> 1, 
		'NOTICE'	=> 2, 
		'WARN'		=> 3, 
		'ERROR'		=> 4 
	];
	
	/**
	 *  Log constructor
	 *  
	 *  @param int		$max_retention	Days to retain archived logs
	 *  @param int		$max_size	Maximum file size before rollover
	 *  @param string	$default_level	Default logging level, 'INFO' fallback
	 *  @param string	$default_log	Base log file name, defaults to 'messages.log'
	 */
	public function __construct( 
		public readonly int	$max_retention, 
		public readonly int	$max_size, 
		public readonly string	$default_level,
		public readonly string	$default_log
	) {}
	
	public static function create(
		?int	$max_retention	= null,
		?int	$max_size	= null,
		?string	$default_level	= null,
		?string	$default_log	= null
	) : static {
		$max_retention		??= 
		\defined( 'LOG_MAX_RETENTION' ) 
			? ( int ) \constant( 'LOG_MAX_RETENTION' ) 
			: 7;
		
		$max_size		??= 
		\defined( 'LOG_MAX_SIZE' ) 
			? ( int ) \constant( 'LOG_MAX_SIZE' )
			: 5242880;
		
		$default_level		??= 
		\defined( 'LOG_LEVEL' )
			? \constant( 'LOG_LEVEL' )
			: 'INFO';
		
		$default_log		??= 
		\defined( 'LOG_FILE' ) 
			? \constant( 'LOG_FILE' )
			: 'messages.log';
		
		$params	= [ 
			$max_retention,
			$max_size,
			$default_level,
			$default_log
		];
		
		// Avoid creating a new instance with same params
		$key		= \hash( 'sha256', \print_r( $params, true ) );
		return new static( ...$params );
	}
	
	/**
	 *  Generate a unique log ID
	 *  
	 *  @return string
	 */
	public static function get_id() : string {
		return Util::get_id( 'log', false );
	}
	
	/**
	 *  Set or get default logging level threshold for detail
	 *  
	 *  @param string	$level	Logging level
	 *  @return mixed
	 */
	private function check_level( string $level ) : ?string {
		$level		= \strtoupper( $level );
		$check		= $this->priority[$this->default_level] ?? 1;
		$threshold	= $this->priority[$level] ?? 1;
		return $check >= $threshold ? $level : null;
	}
	
	/**
	 *  Full log file storage location
	 *  
	 *  @param string	$fname		Fallback log file name
	 *  @return string
	 */
	private function file_log( ?string $fname = null ) : string {
		$fname ??= $this->default_log;
		return Storage::base() . $fname;
	}
	
	/**
	 *  Check if custom log file location is valid. I.E. Within the storage folder
	 *  
	 *  @param string	$path		Storage path on disk
	 *  @return bool
	 */
	private function file_valid( string $path ) : bool {
		static $root;
		
		$root		??= \realpath( Storage::base() );
		$path		= Sanitize::path_traversal( $path );
		
		if ( empty( $path ) ) { return false; }
		return \str_starts_with( $path, $root );
	}
	
	/**
	 *  Remove stale log files rotated into archives
	 *  
	 *  @param string	$log_file	Base log file, rotated
	 */
	private function cleanup( string $log_file ) : void {
		$files		= \glob( $log_file . '.*.log' );
		if ( !$files ) { return; }
		
		$threshold	= time() - ( $this->max_retention * 86400 );
		foreach ( $files as $old ) {
			if ( !\is_file( $old ) || !\is_writable( $old ) ) { continue; }
			
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
	private function rotate( string $log_file ) : void {
		
		if ( !\is_readable( $log_file ) ) { return; }
		
		$fsize		= \filesize( $log_file );
		if ( !$fsize ) { return; }
		
		if ( $fsize > $this->max_size ) {
			$stamp		= \date( 'Ymd_His' );
			$archive	= "{$log_file}.{$stamp}.log";
			if ( !\rename( $log_file, $archive ) ) {
				\error_log( "Failed to archive log: {$log_file}" );
				return;
			}
		}
		
		// Retention cleanup
		$this->cleanup( $log_file );
	}
	
	/**
	 *  Core log writer
	 *  
	 *  @param array	$pair		Log file location and message combination
	 */
	public function write( ?array $pair = null ) : void {
		static $reg	= false;
		
		if ( !$reg ) {
			$reg	= true;
			\register_shutdown_function( [ $this, 'write' ] );
		}
	
		// New message added to queue
		if ( null !== $pair ) {
			[ $msg_file, $entry ] = $pair;
			
			if ( empty( $entry ) || empty( $msg_file ) ) { return; }
			if ( !\is_string( $entry ) || !\is_string( $msg_file ) ) { return; }
			
			$this->cache[] = [ $msg_file, $entry ];
			return;
		}
		
		// Shutdown action
		$grouped	= [];
		foreach ( $this->cache as $set ) {
			list( $file, $entry ) = $set;
			$grouped[$file][] = $entry;
		}
		
		$base		= Storage::base();
		foreach ( $grouped as $file => $entries ) {
			if ( !$this->file_valid( $file ) ) {
				\error_log( "Log file {$file} is not within storage {$base}" );
				continue; 
			}
			
			$this->rotate( $file );
			$data	= \implode( \PHP_EOL, $entries ) . \PHP_EOL;
			
			if ( !Storage::append( $file, $data, true ) ) {
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
	private function format( string $msg, string $level = 'INFO' ) : string {
		$id		= static::get_id();
		$timestamp	= Util::timestamp();
		$script		= 
		Sanitize::spaces( \basename( $_SERVER['SCRIPT_NAME'] ?? 'unknown' ) );
		
		$msg		= Sanitize::spaces( $msg );
		return "[{$timestamp}] [ID:{$id}] [{$script}] [{$level}]\n" .
			"{$msg}\n\n---\n\n";
	}
	
	/**
	 *  Main log message handler
	 *  
	 *  @param array|string		$context	Logging context detail
	 *  @param string		$level		Logging level
	 *  @param string		$file		Optional log file location, defaults to log_file()
	 */
	private function message(
		string|array	$context,
		string		$level		= 'INFO',
		?string		$file		= null
	) : void {
		if ( empty( $this->check_level( $level ) ) ) { return; }
		
		if ( \is_array( $context ) ) {
			$msg	= Util::json_uencode( $context );
			
			// Since PHP 8.3
			if ( !\json_validate( $msg ) ) {
				\error_log( "Invalid JSON generated for log context" );
				return;
			}
		} else {
			$msg = $context;
		}
		
		$entry	= $this->format( $msg, $level );
		$this->write( [ $this->file_log( $file ), $entry ] );
	}
	
	public function info( string|array $context, ?string $file = null ) : void {
		$this->message( $context, 'INFO', $file );
	}
	
	public function warn( string|array $context, ?string $file = null ) : void {
		$this->message( $context, 'WARN', $file );
	}
	
	public function error( string|array $context, ?string $file = null ) : void {
		$this->message( $context, 'ERROR', $file );
	}

	public function debug( string|array $context, ?string $file = null ) : void {
		$this->message( $context, 'DEBUG', $file );
	}
}


/**
 *  @class Request and query
 */
final class Request extends Instance {
	/**
	 *  @var string		$id		Unique sortable identifier
	 */
	public readonly string	$id;
	
	/**
	 *  @var string		$tiemstamp	ISO 8601 format timestamp
	 */
	public readonly string	$timestamp;

	/**
	 *  @var string		$canonical_ip	Core IP data from forwarded headers
	 */
	private string		$canonical_ip;
	
	public function __construct(
		public readonly string		$method,
		public readonly string		$effective_method,
		public readonly array		$forwarded,
		public readonly array		$headers,
		public readonly string		$host,
		public readonly string		$origin,
		public readonly string		$uri,
		public readonly string		$url,
		public readonly string		$query,
		public readonly array		$params,
		public readonly string		$protocol,
		public readonly bool		$is_tls,
		public readonly string		$user
	) {
		$this->id		= ( string ) ( $_SERVER['REQUEST_TIME'] ?? time() ) . '_' . 
			\bin2hex( \random_bytes( 32 ) );
		
		$this->timestamp	= date( 'c' );
	}
	
	public static function create(
		?string		$method			= null,
		?string		$effective_method	= null,
		?array		$forwarded		= null,
		?array		$headers		= null,
		?string		$host			= null,
		?string		$origin			= null,
		?string		$uri			= null,
		?string		$url			= null,
		?string		$query			= null,
		?array		$params			= null,
		?string		$protocol		= null,
		?bool		$is_tls			= null,
		?string		$user			= null,
	) : static {
		$method			??= static::_method();
		$effective_method	??= static::_effective_method();
		$forwarded		??= static::_forwarded();
		$headers		??= static::_headers();
		$host			??= static::_host();
		$origin			??= static::_origin();
		$uri			??= static::_uri();
		$url			??= static::_url();
		$query			??= Sanitize::query( false ) ?? '';
		$params			??= Sanitize::query( true, false ) ?? [];
		$protocol		??= static::_protocol();
		$is_tls			??= static::_is_tls();
		$user			??= static::_user();
		
		$headers = Text::trim_lines( $headers, true );
		return new static(
			$method,
			$effective_method,
			$forwarded,
			$headers,
			$host,
			$origin,
			$uri,
			$url,
			$query,
			$params,
			$protocol,
			$is_tls,
			$user
		);
	}
	
	/**
	 *  Browser User Agent
	 *  
	 *  @return string
	 */
	public function ua() : string {
		static $ua;
		$ua	??= \trim( $this->headers['HTTP_USER_AGENT'] ?? '' );
		
		return $ua;
	}
	
	/**
	 *  Check for current ETag in request
	 *  
	 *  @return string
	 */
	public function none_match() : string {
		static $etag;
		
		$etag	??= $this->headers['HTTP_IF_NONE_MATCH'] ?? '';
		return $etag;
	}
	
	/**
	 *  Check If-None-Match header against given ETag
	 *  
	 *  @return true if header not set or if ETag doesn't match
	 */
	public function modified( string $etag ) : bool {
		$check	= $this->none_match();
		if ( empty( $check ) ) { return true; }
		
		return ( 0 !== \strcmp( $etag, $check ) );
	}
	
	/**
	 *  Time since request modified
	 *  
	 *  @return mixed
	 */
	public function modified_since() : ?int {
		static $init	= false;
		static $since	= null;
		
		if ( $init ) { return $since; }
		$init		= true;
		
		$header		= $this->headers['HTTP_IF_MODIFIED_SINCE'] ?? null;
		if ( !$header ) { return null; }
		
		$since		= \strtotime( $header ) ?: null;
		return $since;
	}
	
	/**
	 *  Visitor's preferred languages based on Accept-Language header
	 *  
	 *  @return array
	 */
	public function language() : array {
		static $cache;
		if ( isset( $cache ) ) { return $cache; }
		
		$terms	= Util::accept_sort( $this->headers['HTTP_ACCEPT_LANGUAGE'] ?? '' );
		if ( empty( $terms ) ) { return $cache = []; }
		
		$result	= [];
		foreach ( $terms as $term ) {
			if ( \preg_match( '/^([a-z]{2,8})(?:-([a-z0-9]{2,8}))?$/i', $term, $m ) ) {
				$result[] = [
					'lang'		=> \strtolower( $m[1] ),
					'locale'	=> 
					isset( $m[2] ) ? \strtoupper( $m[2] ) : ''
				];
			}
		}
		
		return $cache = $result;
	}
	
	/**
	 *  Small helper to check if this is a ranged request
	 *  
	 *  @return bool
	 */
	public function is_ranged() : bool {
		$range	= \trim( $this->headers['HTTP_RANGE'] ?? '' );
		return $range !== '';
	}
	
	/**
	 *  Validate and process requested ranges for a given file size
	 *  
	 *  @param int $fsize Requested file size in bytes
	 *  @return array
	 */
	public function range_header( int $fsize ) : array {
		$range	= \trim( $this->headers['HTTP_RANGE'] ?? '' );
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
		
		return Util::merge_ranges( $ranges );
	}
	
	/**
	 *  Get client IP address from forwarded data
	 *  
	 *  @return array
	 */
	public function canonical_ip() : array {
		if ( isset( $this->canonical_ip ) ) {
			return $this->canonical_ip;
		}
		$fwd	= $this->forwarded;
		$raw	= $fwd['coarse_last']['for'] ?? '';
		
		// Prefer last 'for' value from Forwarded header
		if ( !empty( $raw ) ) {
			if ( \preg_match( '/^\[?([a-fA-F0-9:.]+)\]?(:\d+)?$/', $raw, $match ) ) {
				$ip	= $match[1];
			} elseif ( 'unknown' === \strtolower( $raw ) ) {
				$ip	= 'unknown';
			} else {
				$ip	= $raw;
			}
			$data	= [
				'ip'		=> $ip,
				'source'	=> 'forwarded'
			];
		} else {
			// Fallback to REMOTE_ADDR
			$data	= [
				'ip'		=> $_SERVER['REMOTE_ADDR'] ?? 'unknown',
				'source'	=> 'remote_addr'
			];
		}
		$this->canonical_ip = $data;
		return $data;
	}
	
	/**
	 *  Get IP address (best guess)
	 *  
	 *  @param bool		$skip	Skip private range checking
	 *  @return string
	 */
	public function ip( bool $skip = false ) : string {
		$info		= $this->canonical_ip();
		$candidate	= $info['ip'] ?? '';
		return $skip 
			? ( \filter_var( $candidate, \FILTER_VALIDATE_IP ) ?: '' )
			: ( \filter_var(
				$candidate,
				\FILTER_VALIDATE_IP,
				\FILTER_FLAG_NO_PRIV_RANGE | \FILTER_FLAG_NO_RES_RANGE
			) ?: '' );
	}
	
	/**
	 *  Current client request method
	 *  
	 *  @return string
	 */
	private static function _method() : string {
		static $method;
		if ( isset( $method ) ) { return $method; }
		$supported	= 
		[ 'get', 'post', 'put', 'delete', 'patch', 'options', 'head' ];
		
		$temp		= \trim( $_SERVER['REQUEST_METHOD'] ?? '' );
		if ( empty( $temp ) ) { return 'unsupported'; }
		
		$method		= 
		Util::value_exists_ci( $temp, $supported ) 
			? \strtolower( $temp ) 
			: 'unsupported';
		
		return $method;
	}
	
	/**
	 *  App-level override of request method
	 *  
	 *  @return string
	 */
	private static function _effective_method() : string {
		static $override;
		
		if ( isset( $override ) ) { return $override; }
		
		$method	= static::_method();
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
	 *  Get or guess current server protocol
	 *  
	 *  @param string	$assume		Default protocol to assume if not given
	 *  @return string
	 */
	private static function _protocol( string $assume = 'HTTP/1.1' ) : string {
		$pr = $_SERVER['SERVER_PROTOCOL'] ?? $assume;
		return match( $pr ) {
			'HTTP/1.0'	=> '1.0',
			'HTTP/1.1'	=> '1.1',
			'HTTP/2.0'	=> '2.0',
			default		=> '1.1'	// assume
		};
	}
	
	/**
	 *  Guess if current request is secure
	 *  
	 *  @return bool
	 */
	private static function _is_tls() : bool {
		static $tls;
		
		$tls	??= 
		match( true ) {
			// Secure header
			( 
				!empty( $_SERVER['HTTPS'] )			&& 
				0 !== \strcasecmp( $_SERVER['HTTPS'], 'off' ) 
			),
			
			// Proxy/forwarded headers
			( 
				!empty( $_SERVER['HTTP_X_FORWARDED_PROTO'] )	&& 
				0 === \strcasecmp( $_SERVER['HTTP_X_FORWARDED_PROTO'], 'https' ) 
			),
			( 
				!empty( $_SERVER['HTTP_X_FORWARDED_PROTOCOL'] )	&&
				0 === \strcasecmp( $_SERVER['HTTP_X_FORWARDED_PROTOCOL'], 'https' ) 
			),
			( 
				!empty( $_SERVER['HTTP_X_FORWARDED_SSL'] )	&& 
				0 === \strcasecmp( $_SERVER['HTTP_X_FORWARDED_SSL'], 'on' ) 
			),
			( 
				!empty( $_SERVER['HTTP_X_URL_SCHEME'] )		&& 
				0 === \strcasecmp( $_SERVER['HTTP_X_URL_SCHEME'], 'https' ) 
			),
			
			// Fallback
			( 
				!empty( $_SERVER['SERVER_PORT'] )		&& 
				443 === ( int ) $_SERVER['SERVER_PORT']
			)	=> true,
			
			default	=> false
		};
		
		return $tls;
	}
	
	private static function _headers() : array {
		$headers	= [];
		foreach ( $_SERVER as $key => $value ) {
			$name	= 
			match( true ) {
				\str_starts_with( $key, 'HTTP_' ),
				\str_starts_with( $key, 'CONTENT_' )	=> $key,
				default					=> ''
			};
			
			if ( empty( $name ) ) { continue; }
			$headers[$name] = $value;
		}
		
		return $headers;
	}
	
	private static function _user() : string {
		return Sanitize::normalize( $_SERVER['REMOTE_USER'] ?? 'system' );
	}
	
	/**
	 *  Forwarded HTTP header chain from load balancer
	 *  
	 *  @return array
	 */
	private static function _canonical_forwarded() : array {
		static $data;
		
		if ( isset( $data ) ) { return $data; }
		
		$raw	= 
			$_SERVER['HTTP_FORWARDED'] ??
			$_SERVER['FORWARDED'] ?? 
			$_SERVER['HTTP_X_FORWARDED'] ?? '';
			
		if ( empty( $raw ) ) { 
			$data = []; 
			return $data; 
		}
		$parsed	= [];
		
		// Split by comma: each element is a proxy hop
		$hops	= Util::trimmed_list( $raw, false, ',' );
			
		// Gather forwarded values
		foreach ( $hops as $hop ) {
			$entry	= [];
			$pairs	= Util::trimmed_list( $hop, true, ';' );
			
			foreach ( $pairs as $pair ) {
				[ $key, $val ]	= 
				\array_map( 
					fn( $v ) => Sanitize::filter( $v ), 
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
			
			if ( !empty( $entry ) ) { $parsed[] = $entry; }
		}
		
		$parsed		= \array_map( 'Util::array_normalize_keys', $parsed );
		$coarse_last	= [];
		foreach ( $parsed as $entry ) {
			foreach ( $entry as $k => $v ) {
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
			foreach ( $entry as $k => $v ) {
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
	public static function _forwarded() : array {
		static $all;
		$all ??= static::_canonical_forwarded()['all'] ?? [];
		
		return $all;
	}
	
	/**
	 *  Current request host
	 *  
	 *  @param string	$sent	Checked host key
	 *  @return string
	 */
	public static function _host( ?string $sent = null ) : string {
		static $cache	= [];
		$sent		??= 'default';
		
		if ( isset( $cache[$sent] ) ) { return $cache[$sent]; }
		
		if ( 'default' !== $sent ) {
			return $cache[$sent]	= Sanitize::host( $sent );
		}
		
		$fwd		= static::_forwarded();
		if ( isset( $fwd['host'] ) && '' !== $fwd['host'] ) {
			$host		= 
			\is_array( $fwd['host'] ) 
				? $fwd['host'][0] 
				: $fwd['host'];
				
				$cache[$sent]	= Sanitize::host( $host );
				return $cache[$sent];
		}
		
		$cache[$sent]	= 
		match( true ) {
			( !empty( $_SERVER['HTTP_HOST'] ) )
				=> Sanitize::host( $_SERVER['HTTP_HOST'] ),
			( !empty( $_SERVER['SERVER_NAME'] ) )
				=> Sanitize::host( $_SERVER['SERVER_NAME'] ),
			( !empty( $_SERVER['SERVER_ADDR'] ) )
				=> Sanitize::host( $_SERVER['SERVER_ADDR'] ),
			default	=> ''
		};
		
		return $cache[$sent];
	}
	
	/**
	 *  Get full request URI
	 *  
	 *  @return string
	 */
	private static function _uri() : string {
		static $uri;
		$uri		??= 
		'/' . \ltrim( Sanitize::uri( $_SERVER['REQUEST_URI'] ?? '' ), '/' );
		
		return $uri; 
	}
	
	/**
	 *  Select between 'https' and 'http' for current request
	 *  
	 *  @return string
	 */
	private static function _scheme() : string {
		return static::_is_tls() ? 'https' : 'http';
	}
	
	/**
	 *  Currently requested web realm
	 *  
	 *  @return string
	 */
	private static function _origin() : string {
		static $web;
		if ( isset( $web ) ) { return $web; }
		
		$web	= static::_scheme() . '://' . static::_host();
		$port	= $_SERVER['SERVER_PORT'] ?? null;
		
		if ( $port && !\in_array( $port, [ 80, 443 ] ) ) {
			$web .= ':' . $port;
		}
		return $web;
	}
	
	/**
	 *  Complete request including host, path, and query
	 *  
	 *  @return string
	 */
	private static function _url() : string {
		$uri	= \ltrim( static::_uri(), '/' );
		$query	= Sanitize::query( true, true ) ?? '';
		$query	= 
		\is_array( $query )
			? Util::array_to_query( $query ) 
			: ( string ) $query;
			
		return static::_origin() . '/' . 
			$uri .  ( '' === $query ? '' : "?{$query}" );
	}
}


/**
 *  @class Response and output handling
 */
class Response extends Instance {
	
	/**
	 *  Core response class
	 *  
	 *  @param Config	$config		Configuration settings
	 *  @param Request	$request	Original client request
	 *  @param Log		$logger		Event logger
	 *  @param int		$code		HTTP Status code
	 *  @param array	$headers	New response headers
	 *  @param mixed	$body		Output response body
	 */
	public function __construct( 
		public readonly Config	$config, 
		public readonly Request $request, 
		public readonly Log	$logger,
		public int		$code		= 200,
		public array		$headers	= [],
		public mixed		$body		= null
	) {}
	
	public static function create(
		?Container	$container	= null,
		?int		$code		= null,
		array		$headers	= [],
		mixed		$body		= null
	) : static {
		$container	??= Container::instance();
		$logger		= $container->get( Log::class );
		$config		= $container->get( Config::class );
		$request	= $container->get( Request::class );
		$code		??= 200;
		
		return new static( $config, $request, $logger, $code, $headers, $body );
	}
	
	/**
	 *  Helper to generate header with protocol and message
	 *  
	 *  @param array	$allow		Optional allow header values
	 */
	public function status( ?array $allow = null ) : void {
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
		
		if ( \in_array( $this->code, $green, true ) ) {
			if ( $this->code == 405 ) {
				$allow	??= [ 'OPTIONS', 'GET', 'HEAD', 'POST' ];
				$vals	= 
				\implode( ', ', \array_unique( 
					\array_map( 'strtoupper', $allow ) 
				) );
				$this->headers['Allow'] = $vals;
			}
			
			return;
		}
		
		// Special cases
		if ( isset( $custom[$this->code] ) ) {
			$prot	= $this->request->protocol;
			$msg	= $custom[$this->code];
			$this->headers['Status'] = "HTTP/{$prot} {$this->code} {$msg}";
			return;
		}
		
		throw new 
		\InvalidArgumentException( "Code {$this->code} unsupported" );
	}
	
	/**
	 *  Quick exit response
	 */
	public function check_finish() : void {
		if ( $this->code > 204 ) { exit(); }
	}
	
	/**
	 *  Output response header builder
	 *  
	 *  @param array	$headers	Set headers
	 *  @param bool		$ct_sent	Flag true if output is set via 'Content-Type'
	 *  @param bool		$lo_sent	Flag true if 'Location' is set
	 */
	public function build_headers( array $headers, &$ct_sent, &$lo_sent ) : void {
		foreach ( $headers as $key => $value ) {
			if ( 0 === \strcasecmp( $key, 'content-type' ) ) {
				$ct_sent = true;
			}
			if ( 0 === \strcasecmp( $key, 'location' ) ) {
				$lo_sent = true;
			}
			
			$key	= \str_replace( ["\r", "\n"], '', $key );
			$value	= \str_replace( ["\r", "\n"], '', $value );
			$this->headers[$key]	= $value;
		}
	}
	
	/**
	 *  Generate string content etag header
	 *  
	 *  @param string	$content	Client output content
	 *  @param bool		$wetag		Set weak etag if true
	 */
	public function content_etag( string $content, bool $wetag = true ) : void {
		$prefix	= $wetag ? 'W/' : '';
		$tag	= \hash( 'sha256', $content );
		
		$this->headers['Etag'] = "{$prefix}\"{$tag}\"";
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
	public function check_not_modified(
		string		$etag,
		int		$mtime,
		?string		$client_etag	= null,
		?int		$client_mtime	= null
	) : bool {
		$etag		= \trim( $etag, " \t\n\r\0\x0B\"'" );
		$etag_clean	= \trim( \ltrim( $etag, 'W/' ), "\"" );
		
		if ( null !== $client_etag && '' !== $client_etag ) {
			$tags	= 
			\array_map(
				static function ( $tag ) {
					$tag	= \trim( $tag, " \t\n\r\0\x0B\"'" );
					if ( \str_starts_with( $tag, 'W/' ) ) {
						$tag = \substr( $tag, 2 );
					}
					return $tag;
				}, 
				\explode( ',', $client_etag ) 
			);
			
			if ( 1 === count( $tags ) && '*' === $tags[0] ) {
				$this->code = 304;
				return true;
			}
			
			if ( \in_array( $etag_clean, $tags, true ) ) {
				$this->code = 304;
				return true;
			}
			
			// Didn't match If-None-Match
			return false;
		}
		
		// Try If-Modified-Since
		if ( null !== $client_mtime && $client_mtime > 0 ) {
			if ( $mtime <= $client_mtime ) {
				$this->code = 304;
				return true;
			}
		}
		return false;
	}
	
	/**
	 *  Clean the output buffer without flushing
	 *  
	 *  @param bool		$ebuf		End buffers
	 */
	public function end_buffers( bool $ebuf = false ) : void {
		if ( $ebuf ) {
			while ( \ob_get_level() > 0 ) { \ob_end_clean(); }
			return;
		}
		
		while ( \ob_get_level() && \ob_get_length() > 0 ) { \ob_clean(); }
	}
	
	/**
	 *  Flush and optionally end output buffers
	 *  
	 *  @param bool		$ebuf		End buffers
	 */
	public function flush_buffers( bool $ebuf = false ) : void {
		if ( $ebuf ) {
			while ( \ob_get_level() > 0 ) { \ob_end_flush(); }
		} else {
			while ( \ob_get_level() > 0 ) { \ob_flush(); }
		}
		\flush();
	}
	
	/**
	 *  Remove previously set headers, output
	 */
	public function scrub() : void {
		// Scrub output buffer
		$this->end_buffers();
		\header_remove( 'Pragma' );
		
		// This is best done in php.ini : expose_php = Off
		\header_remove( 'X-Powered-By' );
	}
	
	/**
	 *  Output response header helper
	 */
	public function emit_headers( ?array $allow = null ) : void {
		$this->scrub();
		if ( \headers_sent() ) { return; }
		
		$this->status( $allow );
		foreach ( $this->headers as $key => $value ) {
			\header( "{$key}: {$value}" );
		}
	}
	
	/**
	 *  Set ignore user abort for large output streams
	 */
	public function ignore_abort() : void {
		static $ignore	= false;
		if ( $ignore ) { return; }
		
		if ( !\ignore_user_abort() ) {
			\ignore_user_abort( true );
		}
		$ignore		= true;
	}
}


/**
 *  @class File streaming and output
 */
final class FileResponse extends Response {
	
	/**
	 *  Create a file etag
	 *  
	 *  @param int		$size	File size in bytes
	 *  @param int		$mtime	Last modified date in seconds
	 *  @return string
	 */
	public function generate_etag( int $size, int $mtime ) : string {
		$raw = @\sprintf( '%x-%x', $mtime, $size ) ?: '';
		return "\"{$raw}\"";
	}
	
	/**
	 *  Static file metadata cache path
	 *  
	 *  @param string	$fpath File location on disk
	 *  @return string
	 */
	private function meta_cache_path( string $fpath ) : string {
		static $tmp;
		
		// Temporary directory within storage base
		$tmp	??= Storage::base() . "/tmp/";
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
	public function get_meta_cache( string $fpath ) : array|null {
		$fcache	= $this->meta_cache_path( $fpath );
		if ( !\is_readable( $fcache ) ) { return null; }
		
		try {
			$data		= \file_get_contents( $fcache );
			if ( false === $data ) { return null; }
			
			$meta		=
			\json_decode(
				json		: $data, 
				associative	: true, 
				depth		: 2, 
				flags		: 
					\JSON_INVALID_UTF8_IGNORE	| 
					\JSON_THROW_ON_ERROR
			);
			
			if ( !\is_array( $meta ) ) { return null; }
			
			if ( !isset( $meta['mtime'], $meta['content_length'] ) ) {
				return null;
			}
			
			$curr_mtime	= Storage::file_time( $fpath );
			$curr_size	= Storage::file_size( $fpath );
			
		} catch ( \Throwable $e ) {
			$this->logger->error( "Meta cache error: {$e->getMessage()}" );
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
	public function save_meta_cache( string $fpath, array $meta ) : void {
		$fcache	= $this->meta_cache_path( $fpath );
		$tmp	= $fcache . '.' . \bin2hex( \random_bytes( 4 ) );
		
		try {
			$data	= 
			\json_encode( 
				value	: $meta,
				flags	: 
					\JSON_UNESCAPED_SLASHES | 
					\JSON_UNESCAPED_UNICODE | 
					\JSON_THROW_ON_ERROR 
			);
			
			// TODO: Move to storage_* functions
			if ( false === \file_put_contents( $tmp, $data, \LOCK_EX ) ) {
				throw new 
				\RuntimeException( "Failed to write temp cache file" );
			}
			
			if ( !\rename( $tmp, $fcache ) ) {
				throw new 
				\RuntimeException( "Failed to replace cache file" );
			}
		} catch ( \Throwable $e ) {
			$this->logger->error( "Meta cache error: {$e->getMessage()}" );
		}
	}
	
	/**
	 *  Generate static file metadata
	 *  
	 *  @param string	$path		Location on disk
	 *  @param bool		$is_cached	Enable metadata caching and retreival
	 *  @return array
	 */
	public function file_metadata( string $path, bool $is_cached = false ) : array {
		static $cached = [];
		$fpath	= @\realpath( $path ) ?: $path;
		
		if ( !@\is_file( $fpath ) ) {
			throw new 
			\RuntimeException( "File to be cached not found" );
		}
		
		// File cache?
		if ( $is_cached ) {
			if ( isset( $cached[$fpath] ) ) {
				return $cached[$fpath];
			}
			
			$fcache	= $this->get_meta_cache( $fpath );
			if ( \is_array( $fcache ) ) {
				$cached[$fpath]	= $fcache;
				return $fcache;
			}
		}
		
		$fsize	= Storage::file_size( $fpath );
		$mtime	= Storage::file_time( $fpath );
		$mime	= Storage::file_mime( $fpath );
		
		$etag	= $this->generate_etag( $fsize, $mtime );
		$lmod	= \gmdate( 'D, d M Y H:i:s', $mtime ) . ' GMT';
		
		$meta	= [
			'etag'			=> $etag,
			'last_modified'		=> $lmod,
			'content_type'		=> $mime,
			'content_length'	=> $fsize,
			'mtime'			=> $mtime
		];
		
		if ( $is_cached ) {
			$this->save_meta_cache( $fpath, $meta );
			$cached[$fpath] = $meta;
		}
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
	public function file_headers(
		string	$fpath,
		bool	$wetag	= false,
		bool	$size	= true,
		bool	$stype	= true
	) : array {
		$meta		= $this->file_metadata( $fpath );
		$prefix		= $wetag ? 'W/' : '';
		$headers	= [
			"ETag"		=> "{$prefix}{$meta['etag']}",
			"Last-Modified"	=> $meta['last_modified']
		];
		
		if ( $size ) { $headers["Content-Length"] = $meta['content_length']; }
		if ( $stype ) { $headers["Content-Type"] = $meta['content_type']; }
		
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
	public function file_stream(
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
			$this->file_headers( $fpath, false, true, true ) 
		);
		
		$this->code	= 200;
		$this->headers	= \array_merge( $this->headers, $headers );
		
		// Output file headers, flush and end buffers
		$this->status();
		$this->emit_headers();
		$this->flush_buffers( true );
		
		// Dump binary as-is, if minimum streaming size is not met
		if ( $meta['content_length'] <= 65536 ) {
			if ( \is_resource( $handle ) ) { \fpassthru( $handle ); } 
			else { \readfile( $fpath ); }
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
	public function file_range(
		array	$meta,
			&$handle,
		string	$fpath,
		array	$ranges
	) : void {
		// Header boudary marker 
		$boundary	= \bin2hex( \random_bytes( 6 ) );
		
		$this->code	= 206;
		$this->headers	= 
		\array_merge( [
				"Content-Type"	=> "multipart/byteranges; boundary={$boundary}",
				"Accept-Ranges"	=> "bytes"
			], $this->file_headers( $fpath, true, false, false ) 
		);
		
		$this->emit_headers();
		$this->flush_buffers( true );
		
		foreach ( $ranges as [ $start, $end ] ) {
			// Stop on connection interruption
			if ( \connection_aborted() ) { break; }
			
			$start	= \max( 0, $start );
			$end	= \min( $meta['content_length'] - 1, $end );
			if ( $start > $end || $start >= $meta['content_length'] ) {
				continue;
			}
			
			$length	= $end - $start + 1;
			$chunk	= $length;
			
			// Range block header
			$header	= 
			"--{$boundary}\r\n" . 
			"Content-Type: {$meta['content_type']}\r\n" . 
			"Content-Length: {$length}\r\n" . 
			"Content-Range: bytes {$start}-{$end}/{$meta['content_length']}\r\n\r\n";
			
			\fseek( $handle, $start );
			
			echo $header;
			\flush();
			
			// Range chunk stream
			while( $chunk > 0 && !\feof( $handle ) ) {
				if ( \connection_aborted() ) { break; }
				
				$rsize	= \min( 8192, $chunk );
				echo \fread( $handle, $rsize );
				\flush();
				
				$chunk	-= $rsize;
			}
			echo "\r\n";
		}
		
		// End with boundary marker
		echo "--{$boundary}--\r\n";
		\flush();
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
	public function send_file(
		string	$fpath, 
		bool	$download	= false, 
		?string	$client_etag	= null,
		?int	$client_mtime	= null,
		?array	$ranges		= null
	) : void {
		$this->end_buffers();	// Clear buffers
		$this->ignore_abort();
		
		$meta		= $this->file_metadata( $fpath );
		$etag		= $meta['etag'];
		$mtime		= $meta['mtime'];
		$handle		= null;
		
		// Not modified? Nothing to send
		if ( $this->check_not_modified(
			etag		: $etag, 
			mtime		: $mtime, 
			client_etag	: $client_etag, 
			client_mtime	: $client_mtime 
		) ) { 
			$this->code	= 304;
			$this->status();
			$this->emit_headers();
			$this->flush_buffers( true );
			exit(); 
		}
		
		try {
			$handle = Storage::file_open( $fpath );
			if ( $ranges ) {
				$this->file_range( $meta, $handle, $fpath, $ranges );
			} else {
				$this->file_stream( $meta, $handle, $fpath, $download );
			}
			Storage::close_files( [ $handle ]);
			
		} catch( \Throwable $e ) {
			$msg	= "File response error";
			$this->logger->error( $msg . ": {$e->getMessage()}" );
			
			$this->code = 500;
			$this->status();
			$this->emit_headers();
			$this->flush_buffers( true );
			echo $msg;
		} finally {
			if ( \is_resource( $handle ) ) { \fclose( $handle ); }
		}
		
		exit();
	}
}

/**
 *  @class Page handling
 */
class PageResponse extends Response {
	
	/**
	 *  Response output content type header helper
	 *  
	 *  @param string	$body		Output content
	 *  @param bool		$ct_sent	Send 'Content-Type' if false
	 */
	public function body( mixed $body, bool $ct_sent ) : void {
		if ( null === $body ) { return; }
		
		$is_json	= ( \is_array( $body ) || \is_object( $body ) );
		$is_html	= !$is_json && \preg_match( '/<[^>]+>/', ( string ) $body );
		
		if ( !$ct_sent ) {
			// Try a basic content header
			$header	= 
			match( true ) {
				$is_json	=> 'Content-Type: application/json; charset=utf-8',
				$is_html	=> 'Content-Type: text/html; charset=utf-8',
				default		=> 'Content-Type: text/plain; charset=utf-8'
			};
			
			\header( $header, true );
		}
		
		echo match( true ) {
			$is_json	=> Util::json_uencode( $body ),
			default		=> $body
		};
	}
	
	/** 
	 *  Security policy term separator filter
	 *  
	 *  @param string	$frag		Fragment separator
	 *  @return string
	 */
	private function security_policy_sep( string $frag = '' ) : string {
		return empty( $frag ) 
			? '' 
			: ( \in_array( \trim( $frag ) , [ '', ',', ':', ';', '=' ] ) 
				? $frag
				: ''
			);
	}
	
	/**
	 *  Security policy header value formatter
	 *  
	 *  @param array	$policy		Security policy items
	 *  @return string
	 */
	private function security_policy_items( array $policy ) : string {
		$separator	= $policy['separator']	?? ', ';
		$joiner		= $policy['joiner']	?? '=';
		$items		= $policy['items']	?? [];
		$policy		= '';
		
		$separator	= $this->security_policy_sep( $separator );
		$joiner		= $this->security_policy_sep( $joiner );
		foreach( $items as $key => $value ) {
			$key	= Sanitize::bland( $key, true );
			$value	= Sanitize::bland( $value );
			$policy	.= "{$key}{$joiner}{$value}{$separator}";
		}
		
		return \trim( $policy, $separator );
	}
	
	/**
	 *  Security policy term formatter
	 *  
	 *  @param array	$items		Line-by-line items
	 *  @return string
	 */
	public function security_policy_terms( array $items, string $separator = '' ) : string {
		$policy		= '';
		$separator	= $this->security_policy_sep( $separator );
			
		foreach ( $items as $item ) {
			$item	= Sanitize::bland( $item );
			$policy .= "{$item}{$separator}";
		}
	
		return \trim( $policy, $separator );
	}
	
	/**
	 *  Page security configuration parser
	 *  
	 *  @param string	$term		Poliey key search
	 *  @param array	$policy		Full security headers to search
	 *  @return string
	 */
	public function security_policy( string $term, array $policy ) : string {
		if ( empty( $policy ) ) { return ''; }
		$term	= \strtolower( $term );
		
		return match( $term ) {
			'permissions', 'permissions-policy'
				=> $this->security_policy_items( $policy['Permissions-Policy'] ?? [] ),
			
			'content', 'content-security-policy'
				=> $this->security_policy_items( $policy['Content-Security-Policy'] ?? [] ),
			
			'referer', 'referrer', 'referer-policy'
				=> $this->security_policy_terms( $policy['Referrer-Policy'] ?? [], ',' ),
			
			'transport', 'strict-transport-security', 'transport-security'
				=> $this->security_policy_terms( $policy['Strict-Transport-Security'] ?? [], '; ' ),
			
			'xss', 'x-xss', 'x-xss-protection'
				=> $this->security_policy_terms( $policy['X-XSS-Protection'] ?? [], '; ' ),
			
			'content-type', 'x-content-type-options'
				=> $this->security_policy_terms( $policy['X-Content-Type-Options'] ?? [] ),
	
			'frames', 'x-frame', 'x-frame-options', 
				=> $this->security_policy_terms( $policy['X-Frame-Options'] ?? [] ),
				
			default	=> ''
		};
	}
	
	/**
	 *  XML-RPC response-specific header list
	 *  
	 *  @param string	$origin		Request origin realm
	 *  @return array
	 */
	private function xmlrpc_headers( ?string $origin = null ) : array {
		$origin ??= $this->request->origin;
		
		return [
			'Access-Control-Allow-Origin'		=> $origin,
			'Access-Control-Allow-Methods'		=> 'POST',
			'Access-Control-Allow-Headers'		=> 
			'Content-Type, Authorization, X-Requested-With',
			
			'Access-Control-Allow-Credentials'	=> 'true',
			'Content-Security-Policy'		=> 
			"default-src 'self'; frame-ancestors 'none';",
			
			'X-Frame-Options'			=> 'DENY',
			'X-Content-Type-Options'		=> 'nosniff',
			'Referrer-Policy'			=> 'same-origin',
			'Strict-Transport-Security'		=> 
			'max-age=31536000; includeSubDomains; preload'
		];
	}
	
	/**
	 *  Main content response handler
	 *  
	 *  @param int		$code		HTTP status code
	 *  @param array	$headers	Content headers
	 *  @param mixed	$body		Content body
	 */
	public function send( int $code, array $headers = [], $body = null ) : void {
		if ( $code < 100 || $code > 599 ) {
			throw new 
			\InvalidArgumentException( "Invalid HTTP status code: {$code}" );
		}
		
		$this->code	= $code;
		$ct_sent	= false;
		$lo_sent	= false;
		$is_redir	= ( $code >= 300 && $code < 400 );
		
		// No body for these codes
		if ( $code === 204 || $code === 304 ) {
			$body = null;
		}
		
		$this->build_headers( $headers, $ct_sent, $lo_sent );
		if ( $is_redir ) {
			if ( !$lo_sent ) {
				throw new 
				\RuntimeException( "Redirect requires a Location header" );
			}
		}
		
		$this->status();
		$this->emit_headers();
		if ( null !== $body && !$is_redir ) {
			$this->body( $body, $ct_sent );
		}
		$this->flush_buffers( true );
		exit();
	}
	
	/**
	 *  OPTIONS header response helper
	 */
	public function options( array $headers = [] ) : void {
		$method	= $this->request->method;
		if ( 0 === \strcasecmp( 'options', $method ) ) {
			$this->send( 204, $headers );
			exit();
		}
	}
	
	public function html( string $html, int $status = 200, array $headers = [] ) : void {
		$headers['Content-Type'] ??= 'text/html; charset=UTF-8';
		$this->send( $status, $headers, $html );
		exit();
	}
	
	public function json( array $data, int $status = 200, array $headers = [] ) : void {
		$headers['Content-Type'] ??= 'application/json; charset=UTF-8';
		$this->send( $status, $headers, $data );
		exit();
	}
	
	public function text( string $text, int $status = 200, array $headers = [] ) : void {
		$headers['Content-Type'] ??= 'text/plain; charset=UTF-8';
		$this->send( $status, $headers, $text );
		exit();
	}
	
	/**
	 *  XML Output response helper
	 *  
	 *  @param string	$xml		Raw XML content
	 *  @param int		$status		HTTP status code
	 *  @param string	$type		Content MIME type
	 *  @param array	$headers	Additional headers 
	 */
	public function xml(
		string	$xml,
		int	$status		= 200,
		string	$type		= 'application/xml',
		array	$headers	= []
	) : void {
		$headers = \array_replace_recursive( $headers, $this->xmlrpc_headers() );
		$headers['Content-Type'] ??= "{$type}; charset=UTF-8";
		
		// Handle CORS preflight request E.G. XML-RPC request
		$this->options( $headers );
		$this->send( $status, $headers, $xml );
		exit();
	}
	
	/**
	 *  Page security policy shared header builder
	 *  
	 *  @param bool		$send_csp	Include content security policy, if true
	 *  @param bool		$send_type	Include content mime type, if true
	 *  @return array
	 */
	private function preamble( bool $send_csp = true, bool $send_type = true ) : array {
		static $policy;
		$policy	??= $this->config->setting( 'headers', [], 'json' );
	
		if ( empty( $policy ) ) { return []; }
		
		$headers = [];
		
		// Core policies
		if ( $send_csp ) {
			if ( !empty( $header = $this->security_policy( 'content', $policy ) ) ) {
				$headers['Content-Security-Policy']	= $header;
			}
		}
		
		if ( $send_type ) {
			if ( !empty( $header = $this->security_policy( 'content-type', $policy ) ) ) {
				$headers['X-Content-Type-Options']	= $header;
			}
		}
		
		// Other headers
		$params	= [ 
			'permissions'	=> 'Permissions-Policy',
			'transport'	=> 'Strict-Transport-Security',
			'frames'	=> 'X-Frame-Options',
			'xss'		=> 'X-XSS-Protection',
			'referer'	=> 'Referrer-Policy'
		];
		
		foreach ( $params as $k => $v ) {
			if ( !empty( $header = $this->security_policy( $k, $policy ) ) ) {
				$headers[$v] = $header;
			}
		}
		
		return $headers;
	}
	
	/**
	 *  Print headers, content, and end execution
	 *  TODO: Cache output
	 *  
	 *  @param int		$code		HTTP Status code
	 *  @param string	$content	Page data to send to client
	 *  @param bool		$is_cached	Cache page data if true
	 *  @param bool		$is_feed	Set content to be XML
	 */
	public function page(
		int	$code,
		?string	$content	= null,
		bool	$is_cached	= false,
		bool	$is_feed	= false
	) : void {
		static $zlib;
		$zlib		??= \extension_loaded( 'zlib' );
		
		$is_error	= ( $code >= 400 );
		$is_html	= ( $code >= 200 && $code < 204 );
		$has_body	= ( null !== $content ) || $is_html;
		$headers 	= [];
		
		if ( $is_error && !$has_body ) {
			$headers = $this->preamble( false, false );
			$headers['Content-Security-Policy'] = "default-src: 'self'";
		} elseif ( $is_error && $has_body ) {
			$headers = $this->preamble( false, true );
		} else {
			if ( $is_feed ) {
				$headers	= $this->preamble( true, false );
				$headers['Content-Disposition'] = 'inline';
			} else {
				$headers	= $this->preamble();
			}
		}
		
		// Finish and send here if there's no body
		if ( !$has_body ) { $this->send( $code, $headers ); }
		
		// Check gzip prerequisites
		if ( $code != 304 && $zlib ) { \ob_start( 'ob_gzhandler' ); }
		if ( $is_feed ) {
			$this->xml( 
				xml	: $content ?? '', 
				status	: $code, 
				headers : $headers
			);
			
			return;
		}
		$this->html( $content ?? '', $code, $headers );
	}
}


/**
 *  @class Configuration settings and options
 */
final class Config extends Instance {
	
	/**
	 *  @var string Main configuration file location
	 */
	private readonly string $config_file;
	
	/**
	 *  @var string Config related log file location
	 */
	private readonly string $message_log;
	
	/**
	 *  @var string Main storage location
	 */
	private readonly string $storage_base;
	
	/**
	 *  @var array Expanded constant definitions
	 */
	private array $constants;
	
	/**
	 *  @var array Raw configuration settings
	 */
	private array $settings;
	
	/**
	 *  @var array Constant expanded configuration settings
	 */
	private array $expanded;
	
	/**
	 *  @var array Merged realm data
	 */
	private array $merged;
	
	/**
	 *  @var array Standalone default parameters
	 */
	private array $defaults;
	
	/**
	 *  Configuration constructor
	 *  
	 *  @param Log		$logger		Event logger
	 *  @param Request	$request	Current user request
	 */
	public function __construct( 
		public readonly Log	$logger,
		public readonly Request $request 
	) {
		$this->config_file	= 
			$this->core_path( 'CONFIG_FILE', 'config.json' );
		$this->message_log	= 
			$this->core_path( 'CONFIG_LOG', 'config_messages.log' );
		
		$this->storage_base	= @\realpath( Storage::base() );
	}
	
	public static function create( ?Container $container = null ) : static {
		$container	??= Container::instance();
		$logger		= $container->get( Log::class );
		$request	= $container->get( Request::class );
		
		return new static( $logger, $request );
	}
	
	/**
	 *  Core file location builder
	 *  
	 *  @param string	$constant	Defined constant path
	 *  @param string	$name		File name
	 *  @param bool		$is_dir		Constant is a directory location, if true
	 *  @return string
	 */
	private function core_path(
		string	$constant, 
		string	$name, 
		bool	$is_dir		= false 
	) : string {
		$path	= 
		\defined( $constant ) 
			? \constant( $constant ) 
			: Storage::base() . $name;
		
		return $is_dir 
			? \rtrim( $path, '\\/' ) . \DIRECTORY_SEPARATOR 
			: $path;
	}
	
	/**
	 *  Check storage location sub-path
	 *  
	 *  @param string	$path	Storage location checker
	 *  @return bool		True if valid location within CONFIG_DIR
	 */
	public function store_valid( string $path ) : bool {
		return ( false !== $path ) && ( 0 === \strpos( $path, $this->storage_base ) );
	}
	
	/**
	 *  Global info writer
	 *  
	 *  @param string	$msg		Main content body
	 *  @param string	$label		Optional tag
	 *  @param string	$msg_file	Custom message file
	 */
	private function message(
		string	$msg,
		string	$label		= 'INFO',
		?string	$msg_file	= null
	) : void {
		$msg_file ??= $this->message_log;
		$this->logger->info( $msg, $label, $msg_file );
	}
	
	/**
	 *  Expand defined constants into configuration scope
	 *  
	 *  @param array	$config		Loaded configuration
	 *  @param bool		$reparse	Reload configuration settings, if true
	 *  @return array
	 */
	public function expand_constants( array $config, bool $reparse = false ) : array {
		if ( !isset( $this->constants ) || $reparse ) {
			$this->constants	??= [];
			$temp		= \get_defined_constants( true )['user'] ?? [];
			if ( empty( $temp ) ) { return $this->constants; };
			
			foreach ( $temp as $key => $value ) {
				$nkey = '{{' . $key . '}}';
				$this->constants[$nkey] = $value;
			}
		}
		
		\array_walk_recursive( $config, function( &$value ) {
			if ( !\is_string( $value ) ) { return; }
			$value = 
			\str_replace( 
				\array_keys( $this->constants ), 
				\array_values( $this->constants ), 
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
	public function load_json( string $file ) : array {
		if ( !\is_readable( $file ) ) {
			$this->message( "Config file is not readable: {$file}", 'ERROR' );
			
			throw new 
			\RuntimeException( "Config file is not readable." );
		}
		
		$raw	= \file_get_contents( $file );
		if ( false === $raw ) {
			$this->message( "Unable to read config file: {$file}", 'ERROR' );
			
			throw new 
			\RuntimeException( "Unable to read config file." );
		}
		
		if ( !\json_validate( $raw ) ) { // Since PHP 8.3
			$this->message( "Invalid JSON found in config file: {$file}", 'ERROR' );
			
			throw new 
			\RuntimeException( "Invalid JSON format" );
		}
		
		$config = \json_decode( $raw, true );
		if ( \json_last_error() !== \JSON_ERROR_NONE ) {
			$this->message( 
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
	private function backup_name() : string {
		return Storage::backup_path( $this->config_file );
	}
	
	/**
	 *  Create a configuration backup file
	 *  
	 *  @return bool		True on success
	 */
	private function backup() : bool {
		$bkp	= $this->backup_name();
		
		if ( !copy( $this->config_file, $bkp ) ) {
			$this->message( "Config backup failed: {$bkp}", 'ERROR' );
			
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
	private function write( string $json ) : bool {
		return Storage::write_file( $this->config_file, $json );
	}
	
	/**
	 *  Save parsed or preloaded configuation settings
	 *  
	 *  @param array	$settings	New settings
	 *  @param string	$modified_by	Modification source, defaults to 'system'
	 *  @return bool			True on success
	 */
	private function save( 
		array	$settings	= null, 
		string	$modified_by	= 'system' 
	) : bool {
		$settings['_meta']	= [
			'last_saved'	=> date( 'c' ),
			'modified_by'	=> $modified_by
		];
		
		$json	= 
		\json_encode( $settings, \JSON_PRETTY_PRINT | \JSON_UNESCAPED_SLASHES );
		
		if ( false === $json ) {
			$this->message( 
				"Invalid JSON format [Code " . 
					\json_last_error() . "]: " . 
					\json_last_error_msg(), 
				'ERROR' 
			);
			
			throw new 
			\RuntimeException( "Invalid JSON format for settings" );
		}
		
		return $this->write( $json );
	}
	
	/**
	 *  Processed configuration settings
	 *  
	 *  @param array	$new_settings	Optional new settings to merge with existing ones
	 *  @return array
	 */
	public function parsed( ?array $new_settings = null ) : array {
		$this->settings		??= $this->load_json( $this->config_file );
		$this->expanded		??= $this->expand_constants( $this->settings, true );
		
		if ( null === $new_settings ) { return $this->expanded; }
	
		// Merge new settings
		$this->settings		= 
		\array_replace_recursive( $this->settings, $new_settings );
		
		// Save changes at shutdown
		\register_shutdown_function( function() {
			$user	= $this->request->user;
			
			$this->backup();
			$this->save( $this->settings, $user );
		} );
	
		// Expand changes
		$this->expanded	= $this->expand_constants( $this->settings, true );
		return $this->expanded;
	}
	
	/**
	 *  Helper to change a single configuration setting in the root config
	 *  
	 *  @param string	$key	Main configuration key
	 *  @param bool		$value	New replaement
	 */
	public function edit( string $key, mixed $value ) : void {
		$this->parsed( [ $key => $value ] );
	}
	
	/**
	 *  Config merging helper for overriding defaults with realm-specific settings
	 *  
	 *  @return array
	 */
	public function realm() : array {
		$config	= $this->parsed();
		if ( 
			!\is_array( $config['defaults'] ?? null ) ||	// Global settings
			!\is_array( $config['realms'] ?? null )		// Per-domain settings
		) {
			throw new 
			\RuntimeException( "Invalid config structure." );
		}
		
		// Detect current host
		$host	= \strtolower( $this->request->host );
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
	 *  Config definition content-type filtering
	 *  
	 *  @param mixed	$value		Base configuration value
	 *  @param string	$type		Format data type
	 *  @param mixed	$filter		Optional filter
	 *  @return mixed
	 */
	private function value_format( mixed $value, string $type, $filter = null ) : mixed {
		if ( \is_array( $value ) ) {
			return Util::lines( $value, false, $filter );
		}
		
		return match( \strtolower( $type ) ) {
			'int', 'integer'	=> Sanitize::sint( ( string ) $value ),
			'bool', 'boolean'	=> Sanitize::sbool( ( string ) $value ),
			'lines'			=> ( function() use ( $value, $filter ) {
				$lines	= 
				\preg_split( 
					'/\s*\R\s*/', 
					trim( ( string ) $value ), 
					-1, 
					\PREG_SPLIT_NO_EMPTY 
				);
				
				return Util::lines( $lines, true, $filter );
			} )(),
			
			'json'			=> ( function() use ( $value ) {
				return \is_array( $value ) 
					? Util::json_udecode( $value )
					: Util::json_udecode( ( string ) $value );
			} )(),
			
			default			=> Sanitize::text( $value )
		};
	}
	
	/**
	 *  Get stored configuration settings or get default
	 *  
	 *  @param string	$key		Configuration setting name
	 *  @param mixed	$default	If not set, fallback value
	 *  @param string	$type		String, integer, json, or boolean
	 *  @param string	$filter		Optional parse function
	 *  @return mixed
	 */
	public function setting( 
		?string		$key		= null, 
				$default	= null, 
		string		$type		= 'string',
		string		$filter		= '' 
	) : mixed {
		$this->merged ??= $this->realm();
		
		// Fallback to defaults or send full config on empty key
		
		if ( null === $key ) { return $this->merged; }
		
		$value	= $this->merged[$key] ?? $default;
		return empty( $filter ) 
			? $value 
			: $this->value_format( $value, $type, $filter );
	}
	
	/**
	 *  Get all whitelisted extensions
	 *  
	 *  @param string	$group		Search category
	 *  @param array	$sent		Overridden list
	 *  @return array
	 */
	public function ext_groups( string $group = '', ?array $sent = null ) : array {
		// Default whitelist
		static $cs;
		$cs ??= $this->setting( 'static_ext', [], 'json' );
		
		// Extend whitelist
		$ext	=  
		empty( $sent ) 
			? $cs 
			: \array_merge( $cs, $sent );
		
		return empty( $group ) 
			? \array_unique( Util::trimmed_list( \implode( ',', $ext ), true ) ) 
			: \array_unique( Util::trimmed_list( $ext[$group] ?? '', true ) );
	}
	
	/**
	 *  Database configuration profile
	 *  
	 *  @param string $profile Database name
	 *  @param array $updates Override configuration presets
	 */
	public function edit_db_profile( string $profile, array $updates ) : void {
		$profiles = $this->setting( 'db_profiles', [], 'json' );
		if ( isset( $profiles[$profile] ) ) {
			$this->message(
				"Database profile {$profile} edited",
				'INFO'
			);
		} else {
			$this->message(
				"New database profile {$profile} created",
				'INFO'
			);
		}
		
		$profiles[$profile] = 
		\array_replace_recursive( $profiles[$profile] ?? [], $updates );
		
		$this->parsed( [ 'db_profiles' => $profiles ] );
	}
	
	/**
	 *  Default parameters from defined constants
	 *  
	 *  @param string	$param		Config alias
	 */
	public function defaults( string $param ) : ?string {
		static $dir;
		static $base;

		$base	??= Text::slash_path( PATH, true );
		$dir	??= 
		defined( 'PLUGIN_DIR' )
			? Text::slash_path( constant( 'PLUGIN_DIR' ), true )
			: $base . Text::slash_path( 'plugins', true );
			
		$this->defaults ??= [
			'plugin_dir'	=> \is_dir( $dir ) 
				? $dir 
				: $base, // PATH fallback
			
			'default_lang'	=>
			defined( 'DEFAULT_LANGUAGE' ) 
				? constant( 'DEFAULT_LANGUAGE' ) 
				: 'en-US',
			
			'default_tz'	=> 
			defined( 'DEFAULT_TIMEZONE' )
				? constant( 'DEFAULT_TIMEZONE' )
				: 'America\/New_York',
			
			'default_title'	=>
			defined( 'DEFAULT_PAGE_TITLE' )
				? constant( 'DEFAULT_PAGE_TITLE' )
				: 'My Site',
			
			'default_desc'	=>
			defined( 'DEFAULT_PAGE_SUB' )
				? constant( 'DEFAULT_PAGE_SUB' )
				: 'A Nice Place'
		];
		
		return match( \strtolower( $param ) ) {
			'plugin_dir'	=> 
				\is_dir( $this->defaults['plugin_dir'] ) 
					? $this->defaults['plugin_dir']
					: $base,
			
			'default_lang'	=> $this->defaults['default_lang'],
			'default_tz'	=> $this->defaults['default_tz'],
			'default_title'	=> $this->defaults['default_title'],
			'default_desc'	=> $this->defaults['default_desc'],
				
			default		=> null
		};
	}
}


/**
 *  @class Language translation
 */
class Language extends Instance {
	
	/**
	 *  @var array Cached language translations
	 */
	private array $data;
	
	// Matching type, average matches / minute, character pattern
	public const DEFAULT_CHARSETS	= [
		[ 'words', 230, '/[\p{Latin}\p{Greek}\p{Cyrillic}]/u' ],
		[ 'words', 250, '/[\p{Arabic}\p{Hebrew}]/u' ],
		
		[ 'chars', 1000, '/[\p{Han}\p{Hiragana}\p{Katakana}]/u' ]
	];
	
	/**
	 *  Language constructor
	 *  
	 *  @param Config	$config	Configuration settings
	 *  @param Log		$log	Event logger
	 */
	public function __construct( 
		public readonly Config	$config,
		public readonly Log	$log
	) {}
	
	public static function create( ?Container $container = null ) : static {
		$container	??= Container::instance();
		$logger		= $container->get( Log::class );
		$config		= $container->get( Config::class );
		
		return new static( $config, $logger );
	}
	
	/**
	 *  Load default language and append language file definitions
	 *  
	 *  @return array
	 */
	private function preload() : array {
		$terms	= $this->config->setting( 'default_translation', [], 'json' );
		$lang	= $this->config->defaults( 'default_lang' );
		$file	= $this->config->load_json( $lang . '.json' );
		if ( !empty( $file ) ) {
			$terms	= 
			\array_merge_recursive( $terms, Util::json_udecode( $file ) );
		}
		
		return $terms;
	}
	
	/**
	 *  Load and process language file
	 *  
	 *  @param array	$sent	Custom language translations
	 *  @return array
	 */
	public function translate( ?array $sent = null ) : array {
		$this->data ??= $this->preload();
		if ( empty( $sent ) ) {
			return $this->data;
		}
		
		$this->data = \array_merge( $this->data, $sent );
		
		return $this->data;
	}
	
	/**
	 *  Get language specific terms
	 *  
	 *  @param string	$name		Language substitution label
	 *  @param string	$default	Default value if not given
	 *  @param array	$sent		Custom language translation
	 *  @return string
	 */
	public function term( string $name, string $default, ?array $sent = null ) {
		return $this->translate( $sent )[$name] ?? $default;
	}
	
	/**
	 *  Get translation file error message with fallback
	 *  
	 *  @param string	$name		Language substitution label
	 *  @param string	$default	Fallback value if not available
	 *  @param array	$sent		Custom language translation
	 *  @return string
	 */
	public function error( string $name, string $default, ?array $sent = null ) {
		return $this->translate( $sent )['errors'][$name] ?? $default;
	}
	
	/**
	 *  Scan template for language placeholders
	 *  
	 *  @param string	$tpl		Loaded template data
	 *  @param array	$sent		Custom language translation
	 *  @return string
	 */
	public function parse( string $tpl, ?array $sent = null ) : string {
		$tpl	= Util::prefix_replace( 'lang', $this->translate( $sent ), $tpl );
		
		// Change variable placeholders
		return \preg_replace( '/\s*__(\w+)__\s*/', ' {\1} ', $tpl );
	}
	
	/**
	 *  Find word or character count within a block of text
	 *  
	 *  @param string	$find	Raw text to match
	 *  @param string	$mode	Word splitting mode
	 *  @return int
	 */
	public function wordcount( string $find, string $mode = '' ) : int {
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
	 *  @param string	$text	Text input
	 *  @param array	$load	Language sets with read times
	 *  @return int
	 */
	public function read_time( string $text, ?array $load = null ) : int {
		$sets = 
		empty( $load )
			? static::DEFAULT_CHARSETS
			: \array_merge( static::DEFAULT_CHARSETS, $load );
		
		// Remove tags and trim
		$text	= Sanitize::bland( $text );
		if ( empty( $text ) ) { return 1; }
		
		// Default
		$speed	= 200;
		$set	= 'words';
		
		// Total characters
		$chars	= $this->wordcount( $text, 'chars' );
		
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
		$rt = ( int ) ceil( $this->wordcount( $text, $set ) / $speed );
		return ( $rt < 1 ) ? 1 : $rt;
	}
	
	/**
	 *  Process search pattern for full text searching
	 *  
	 *  @param string	$find	Sent search parameters
	 *  @return string
	 */
	public function search_phrase( string $find ) : string {
		// Remove tags and trim
		$find	= Sanitize::bland( $find );
		if ( empty( $find ) ) {
			return '';
		}
		
		// Search words including quoted terms
		if ( \preg_match_all( '/"(?:\\\\.|[^\\\\"])*"|\S+/', $find, $m ) ) {
			if ( empty( $m ) ) { return ''; }
			$fdata	= \array_unique( $m[0] ?? [] );
		} else { return ''; }
		
		if ( empty( $fdata ) ) { return ''; }
		
		// Limit maximum number of unique words to search
		$sc	= $this->config->setting( 'max_search_words', 10, 'int' );
		if ( count( $fdata ) > $sc ) {
			$fdata = \array_slice( $fdata, 0, $sc );
		}
		
		// TODO: Move to language-agnostic patterns
		
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
	 *  Get common words in text for searching
	 *  
	 *  @param array|string	$lines		Content to process
	 *  @param bool		$as_array	Returns as an array if true
	 *  @return mixed
	 */
	public function filter_common_words( array|string $lines, bool $as_array = true ) {
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
		
		// Configured stop words
		$stop	??= $this->config->setting( 'stop_words', $default, 'array' );
		if ( empty( $stop ) ) { $stop = $default; }
		
		// Make lines into a continous series of words
		$text	= 
		\is_array( $lines )
			? Text::lowercase( \implode( ' ', $lines ) )
			: Text::lowercase( $lines );
		
		// str_word_count alternative for unicode
		$words	= \preg_split( '/[^\p{L}\p{N}\']+/u', $text );
		
		// Take out stop words
		$words	= \array_diff( $words, $stop );
		
		// Most frequently used words
		$fr	= \array_count_values( $words );
		\arsort( $fr );
		
		$words	= \array_unique( \array_keys( $fr ) );
		
		return $as_array ? $words : implode( ' ', $words );
	}
}


/**
 *  @class Metadata attribute for plugins, templates, custom hooks etc...
 */
#[Attribute( Attribute::TARGET_CLASS | Attribute::IS_REPEATABLE )]
class Info {
	/**
	 *  Most all of this is optional, but recommended
	 *  
	 *  @param string	$name		Usually, the plugin or theme name
	 *  @param string	$author		Creator information or copyright
	 *  @param string	$version	Notation compatible with PHP's version_compare()
	 *  @param string	$description	Detailed information on what this does
	 *  @param string	$licence	MIT, BSD, ISC, GPL etc...
	 *  @param string	$category	What type of 'thing' this is: plugins, modules, themes etc...
	 *  @param string	$website	Author homepage
	 *  @param string	$update_url	Auto-update checking URL (future use)
	 *  @param array	$fields		Custom information E.G. asset_dir, data_dir etc...
	 */
	public function __construct(
		public readonly	?string	$name		= null,
		public readonly	?string	$author		= null,
		public readonly	?string	$version	= null,
		public readonly	?string	$description	= null,
		public readonly	?string	$license	= null,
		public readonly	?string	$category	= null,
		public readonly	?string	$website	= null,
		public readonly	?string	$update_url	= null,
		public readonly	?array	$fields		= []
	) {}
}

/**
 *  @class Third party class and information file finder
 */
final class Finder {
	/**
	 *  @var array<string, mixed> Running directory cache
	 */
	private static array $cache	= [];
	
	/**
	 *  Relative path checking to ensure starting with PATH
	 *  
	 *  @param string	$path		Sent folder path
	 *  @return bool
	 */
	private static function base_valid( string $path ) : bool {
		static $root;
		$root	??= @\realpath( PATH );
		
		$path	= Sanitize::path_traversal( $path );
		
		if ( empty( $path ) ) { return false; }
		return \str_starts_with( $path, $root );
	}
	
	/**
	 *  Special file metadata field helper
	 *  
	 *  @param string	$fname		File name
	 *  @return array|null
	 */
	private static function metatype( string $fname ) : ?array {
		return match( \strtolower( $fname ) ) {
			'plugin.info'	=> [
				'plugin'	=> 'Plugin',
				'author'	=> 'Author',
				'version'	=> 'Version',
				'description'	=> 'Description',
				'license'	=> 'License',
				'website'	=> 'Website',
				'requires'	=> 'Requires',
				'category'	=> 'Category'
			],
			'theme.info'	=> [
				'theme'		=> 'Theme',
				'author'	=> 'Author',
				'version'	=> 'Version',
				'description'	=> 'Description',
				'license'	=> 'License',
				'website'	=> 'Website',
				'colors'	=> 'Colors',
				'layout'	=> 'Layout'
			],
			// TODO:
			/*
			'module.info'	=> [
				'module'	=> 'Module',
				'author'	=> 'Author',
				'version'	=> 'Version',
				'description'	=> 'Description',
				'license'	=> 'License',
				'website'	=> 'Website',
				'requires'	=> 'Requires',
				'provides'	=> 'Provides',
				'priority'	=> 'Priority'
			],
			 */
			// Everything else
			default		=> [
				'author'	=> 'Author',
				'version'	=> 'Version',
				'description'	=> 'Description',
				'license'	=> 'License',
				'website'	=> 'Website'
			]
		};
	}
	
	/**
	 *  Process metadata fields from information file
	 *  
	 *  @param string	$src		File source
	 *  @param array	$fields		Relevant field keys and their labels
	 */
	private static function metafields( string $src, ?array $fields = null ) : array {
		if ( empty( $fields ) ) { return []; } // Nothing to search
		
		$meta = [];
		if ( \preg_match( '/\/\*([\s\S]*?)\*\//', $src, $block ) ) {
			$header = $block[1];
			
			foreach ( $fields as $field => $label ) {
				// TODO: Better field searching regex
				$pattern = '/^' . \preg_quote( $label, '/' ) . ':\s*(.+)$/mi';
				if ( \preg_match( $pattern, $header, $m ) ) {
					$meta[$field] = \trim( $m[1] );
				}
			}
		}
		
		return $meta;
	}
	
	/**
	 *  Reflection based detail load
	 *  
	 *  @param string	$file		Path on disk
	 *  @return string|null
	 */
	private static function autoload( string $file ) : ?string {
		$src	= @\file_get_contents( $file );
		if ( empty( $src ) ) { return null; }
		
		$class	= null;
		$fields	= null;
		
		// Try to start with a fully qualified namespace
		if ( \preg_match( '/namespace\s+(.+?);/', $src, $ns ) ) { 
			if ( \preg_match( '/class\s+(\w+)/', $src, $cls ) ) { 
				$class = $ns[1] . '\\' . $cls[1];
				
				// TODO: Class prefix whitelist prefilter
				if ( \class_exists( $class ) ) { 
					$ref	= new \ReflectionClass( $class );
					$attr	= $ref->getAttributes( Info::class );
					
					if ( $attr ) {
						$fields	= ( array ) $attr[0]->newInstance();
					}
				
				} else { $class	= null; }
			}
		}
		
		$meta	= 
		( null === $class ) // Not a class? Try from custom info file
			? static::metafields( $src, static::metatype( \basename( $file ) ) )
			: $fields;
		
		return [ 'class' => $class, 'meta' => $meta ?? [] ];
	}
	
	/**
	 *  Main class finder
	 *  
	 *  @param string	$base		Item search directory
	 *  @param string	$fname		Optional, specific, information file
	 *  @return array
	 */
	public static function in( string $base, ?string $fname = null ) : array {
		if ( !static::base_valid( $base ) ) {
			throw new 
			\RuntimeException( "Invalid base directory for Finder {$base}" );
		}
		
		// Try from cache
		if ( !defined( 'DEBUG_MODE' ) && isset( static::$cache[$base] ) ) { 
			return static::$cache[$base]; 
		}
		
		$iterator	= Storage::files_as_iterator( $base );
		if ( null === $iterator ) { 
			static::$cache[$base] = [];
			return []; 
		}
		
		$filter		= 
		new \CallbackFilterIterator(
			$iterator,
			fn( $finfo ) => 
				$finfo->isFile()	&& 
				$finfo->getSize() > 0	&& 
				( ( null === $fname ) // Any PHP or from specific file match
					? 0 === \strcasecmp( 'php', $finfo->getExtension() )
					: 0 === \strcasecmp( $fname, $finfo->getFilename() )
				)
		);
		
		$files		= [];
		
		foreach ( $filter as $file ) {
			$info	= static::autoload( $file->getRealPath() );
			if ( null === $info ) { continue; }
			
			$files[] = $info;
		}
		
		static::$cache[$base] = $files;
		return $files;
	}
}


/**
 *  @class Main hook attribute
 */
#[Attribute( Attribute::TARGET_FUNCTION | Attribute::IS_REPEATABLE )]
class Hook {
	/**
	 *  Hook constructor
	 *  
	 *  @param array|string	$name		Event name
	 *  @param int		$priority	Execution order, higher > earlier
	 */
	public function __construct(
		public readonly	array|string	$name,
		public		int		$priority = 0
	) {}
}

/**
 *  @class Discovery wrapper for hooks
 */
#[Attribute( Attribute::TARGET_CLASS | Attribute::IS_REPEATABLE )]
class HookContainer { public function __construct() {} }

/**
 *  @class Templated wrapper helper
 *  @example 
 *  #[Hook('before_main')]
 *  public function before_main( string $event, HookResult $result, array $args ) : HookResult {
 *  	return $result->with_html( '<h1 class="title">Page Title</h1>' );
 *  }
 */
class HookResult {
	/**
	 *  @var array Partial, appended, HTML content
	 */
	private array $fragments	= [];
	
	/**
	 *  @var array Hook section HTML blocks
	 */
	private array $blocks		= [];
	
	public function __construct(
		public ?string	$html		= null,
		public ?string	$template	= null,
		public array	$data		= [],
		public array	$meta		= []
	) {}
	
	public function with_html( string $html ) : self {
		$clone			= clone $this;
		$clone->html		= $html;
		return $clone;
	}
	
	public function with_template( string $template ) : self {
		$clone			= clone $this;
		$clone->template	= $template;
		return $clone;
	}
	
	public function with_data( array $data ) : self {
		$clone			= clone $this;
		$clone->data		= $data;
		return $clone;
	}
	
	public function prepend_html( string $html ) : self {
		$clone			= clone $this;
		$clone->html		= $html . ( $this->html ?? '' );
		return $clone;
	}
	
	public function append_html( string $html ) : self {
		$clone			= clone $this;
		$clone->html		= ( $this->html ?? '' ) . $html;
		return $clone;
	}
	
	public function get_html() : string {
		return $this->html ?? '';
	}
	
	public function add_meta( array $meta ) : self {
		$clone			= clone $this;
		$clone->meta		= \array_merge( $this->meta, $meta );
		return $clone;
	}
	
	public function add_data( array $data ) : self {
		$clone			= clone $this;
		$clone->data		= \array_merge( $this->data, $data );
		return $clone;
	}
	
	public function add_fragment( string $html ) : self {
		$clone			= clone $this;
		$clone->fragments[]	= $html;
    		return $clone;
	}
	
	public function add_block( string $name, string $html ) : self {
		$clone			= clone $this;
		$clone->blocks[$name][]	= $html;
		return $clone;
	}
	
	public function has_blocks() : bool {
		return ( bool ) count( $this->blocks );
	}
	
	public function has_block( string $name ) : bool {
		return !empty( $this->blocks[$name] );
	}
	
	public function blocks( ?string $name = null ) : array {
		return ( null === $name ) 
			? $this->blocks
			: $this->blocks[$name] ?? [];
	}
	
	public function fragments() : array {
		return $this->fragments;
	}
	
	public function merge( self $stage ) : self {
		$clone			= clone $this;
		$clone->html		= ( null !== $stage->html ) ? $stage->html : $this->html;
		$clone->template	= $stage->template ?? $this->template;
		$clone->data		= \array_merge( $this->data, $stage->data );
		$clone->meta		= \array_merge( $this->meta, $stage->meta );
		$clone->fragments	= \array_merge( $this->fragments, $stage->fragments );
		
		foreach ( $stage->blocks as $name => $block ) {
			$clone->blocks[$name] = \array_merge( $this->blocks[$name] ?? [], $block );
		}
		
		return $clone;
	}
}

/** 
 *  @class Hook handling container for callable with unique name and priority
 */
class HookHandler {
	/**
	 * 
	 *  @param string	$name		Event name in full string or partial event.*
	 *  @param object	$instance	Handler class instance
	 *  @param string	$method		Callable handler
	 *  @param int		$prority	Hook execution priority, defaults to 0
	 */
	public function __construct(
		public readonly	string	$name,
		public readonly	object	$instance,
		public readonly	string	$method,
		public		int	$priority	= 0
	) {}
	
	public function call( string $event, HookResult $result, array $args ) : HookResult {
		return $this->instance->{$this->method}( $event, $result, $args );
	}
}

/**
 *  @class Consolidated hook system with execution priority and cumulative stored output
 */
class HookRegistry {
	
	public function __construct(
		private array $handlers	= [],
		private array $output	= []
	) {}
	
	/**
	 *  Adding new hook
	 */
	public function add( HookHandler $hook ) : void {
		$name = \strtolower( $hook->name );
		$this->handlers[$name][] = $hook;
	}
	
	/**
	 *  Search hooks by full or partial name
	 */
	public function get( string $name ) : array {
		$name	= \strtolower( $name );
		$found	= [];
		
		foreach ( $this->handlers as $group => $hooks ) {
			// Exact match?
			if ( $group === $name ) {
				$found = \array_merge( $found, $hooks );
				continue;
			}
			
			// No wildcard? Move on
			if ( !\str_contains( $group, '*' ) ) { continue; }
			
			// Clean pattern for matching everything else
			$pattern	= 
			'/^' . \str_replace( '\*', '.*', \preg_quote( $group, '/' ) ) . '$/';
			
			if ( \preg_match( $pattern, $name ) ) {
				$found = \array_merge( $found, $hooks );
			}
		}
		
		// Reorder hooks by priority
		\usort( $found, fn( $a, $b ) => $b->priority <=> $a->priority );
		return $found;
	}
	
	/**
	 *  Execute hook and return mutated output
	 *  
	 *  @return HookResult
	 */
	public function run( string $name, bool $cache = false, array $args = [] ) : HookResult {
		$name	= \strtolower( $name );
		$hooks	= $this->get( $name );
		$result	= new HookResult();
		
		foreach ( $hooks as $hook ) {
			// Call and mutate results
			$stage = $hook->call( $name, $result, $args );
			
			if ( !$stage instanceof HookResult ) {
				// Fail immediately
				throw new 
				\RuntimeException(
					"Hook {$hook->name} must return HookResult"
				);
			}
			
			// Previous results
			$result = $result->merge( $stage );
		}

		// Collected results
		if ( $cache ) { $this->output[$name] = $result; }
		
		return $result;
	}
	
	/**
	 *  Get execution result
	 */
	public function values( string $name ) : mixed {
		return $this->output[ \strtolower( $name ) ] ?? [];
	}
	
	/**
	 *  Clear results
	 */
	public function clear( string $name ) : void {
		unset( $this->output[ \strtolower( $name ) ] );
	}
}

/**
 *  @class Hook discovery and loading
 */
class HookLoader {
	/**
	 *  @var array<string> Ignored classnames
	 */
	private	array	$skipped	= [];
	
	/**
	 *  @var array<string> Already loaded hooks
	 */
	private array	$classes	= [];
	
	public function __construct( private HookRegistry $registry ) {}
	
	/**
	 *  Process hook containers and append handlers
	 *  
	 *  @param string	$class		Instance name (static::class)
	 */
	private function parse( string $class ) : void {
		if ( 
			isset( $this->classes[$class] ) || 
			isset( $this->skipped[$class] )
		) { return; }
		
		if ( !\class_exists( $class ) ) { 
			$this->skipped[$class] = true; 
			return;
		}
		
		$ref			= new \ReflectionClass( $class );
		if ( 
			$ref->isAbstract()		|| 
			$ref->isInternal()		|| 
			!$ref->getAttributes( HookContainer::class ) 
		) { 
			$this->skipped[$class] = true;
			return; 
		}
		
		$this->classes[$class]	= true;
		$instance		= Container::instance()->get( $class );
		
		// Scan for hooks
		foreach ( $ref->getMethods() as $method ) {
			foreach ( $method->getAttributes( Hook::class ) as $attr ) {
				$meta	= $attr->newInstance();
				foreach ( ( array ) $meta->name as $event) {
					$this->registry->add(
						new HookHandler(
							name		: $meta->name,
							instance	: $instance,
							method		: $method->getName(),
							priority	: $meta->priority
						)
					);
				}
			}
		}
	}
	
	/**
	 *  Load events and hooks from current script, optionally other folders
	 *  
	 *  @param bool		$explore	Branch into other folders, defaults to false
	 */
	public function autoload( bool $explore = false ) : void {
		// Preload local hooks
		foreach ( \get_declared_classes() as $class ) {
			$this->parse( $class );
		}
		
		// Skip moving out to other locations for now
		if ( !$explore ) { return; }
		
		$path	= Text::slash_path( PATH, true );
		// TODO: Make this configurable
		$dirs	= [
			'app',
			'modules',
			'plugins',
			'themes'
		];
		
		foreach ( $dirs as $dir ) {
			$file	= \rtrim( 's', $dir ) . '.info';
			$found	= Finder::in( $path . $dir, $file );
			foreach ( $found as $info ) {
				$class			= $info['class'];
				if ( !$class ) { continue; }
				
				$this->parse( $class );
			}
		}
	}
}

/**
 *  @class Wrapping pipeline for content hooks
 */
class HookPipeline {
	
	/**
	 *  New pipeline with component/content block wrapper
	 *  
	 *  @param HookRegistry		$registry	Event hook container
	 *  @param Language		$language	Placeholder replacement language and region
	 *  @param Template		$template	Rendering component
	 *  @param bool			$is_cached	Output from this pipeline won't be re-rendered
	 */
	public function __construct( 
		private HookRegistry	$registry,
		private Language	$language,
		private Template	$template,
		public readonly bool	$is_cached	= false
	) {}
	
	/**
	 *  Wrap component region in 'before' and 'after' event hooks and their output
	 *  
	 *  @param string	$before		Before template parsing event
	 *  @param string	$after		After template parsing event
	 *  @param string	$template	Base component template
	 *  @param array	$input		Raw component data
	 *  @param bool		$full		Render full regions
	 *  @return string
	 */
	public function wrap(
		string	$before,
		string	$after,
		string	$template	= '',
		array	$input		= [],
		bool	$full		= false
	) : string {
		// Call "before" event hook
		$bout		= 
		$this->registry->run( $before, $this->is_cached, [
			'data'		=> $input,
			'template'	=> $template,
			'full'		=> $full
		] );
		
		// Optional template override
		$render_tpl	= $bout->template ?? $template;
		
		// Main render
		$main_html	= 
		$this->template->render(
			$render_tpl,
			$input,
			$full
		);
		
		$result		= ( new HookResult() )->with_html( $main_html );
		
		// Call "after" event hook
		$aout		= 
		$this->registry->run( $after, $this->is_cached, [
			'data'		=> $input,	// Raw component data
			'before'	=> $before,	// Event called before
			'html'		=> $main_html,	// Current HTML
			'full'		=> $full,	// Full region render
			'template'	=> $render_tpl	// New or previously replaced
		] );
		
		// Merge before, current, and after
		$out		= $bout->merge( $result )->merge( $aout );
		$out_html	= $out->html ?? '';
		
		foreach( $out->fragments() as $frag ) {
			$out_html .= $frag;
		}
		
		// Send any replaced or already processed hook output
		// TODO: Use language and translation
		return $out_html;
	}
}

/**
 *  @class End of execution scheduler
 *  @exmaple 
 *  $registry = new HookRegistry();
 *  $shutdown = new HookShutdown( $registry );
 *  register_shutdown_function( [ $shutdown, 'run' ] );
 */
class HookShutdown {
	/**
	 *  @var array<callable, array> Collection of functions to execute after content sent
	 */
	private array $tasks = [];
	
	public function __construct(
		private HookRegistry $registry
	) {}
	
	public function register( callable $task, mixed $args = null ) : void {
		$this->tasks[] = [ $task, $args ];
	}
	
	public function run() : void {
		$sess_id = \session_id() ?: '';
		
		// Cleanup any session data
		if ( \session_status() === PHP_SESSION_ACTIVE ) {
			\session_write_close();
		}
		
		// Fire shutdown hooks
		$this->registry->run( 'shutdown', false, [
			'time'		=> \microtime( true ),
			'memory'	=> \memory_get_usage(),
			'peak'		=> \memory_get_peak_usage(),
			'session'	=> $sess_id,
		] );
		
		$err	= [];
		
		// Deferred tasks
		foreach ( $this->tasks as [ $task, $args ] ) {
			try {
				match( true ) {
					\is_array( $args )	=> $task( ...$args ),
					( null !== $args )	=> $task( $args ),
					default			=> $task()
				};
			} catch( \Throwable $e ) {
				$err[] = $e->getMessage();
			}
		}
		
		if ( !empty( $err ) ) {
			\error_log( "[Shutdown]\n" . \implode( "\n", $err ) );
		}
	}
}


/**
 *  @class Templates and rendering
 */
class Template extends Instance {
	
	/**
	 *  @var array Interpolated template cache
	 */
	private array $cache;
	
	/**
	 *  @var array Active placeholder patterns
	 */
	private array $patterns;
	
	public const PRESET_PATTERNS	= [
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
		. '(?:\|(?<params>[^}]+))?\}/i',
		
		'hook'		=> '/\{hook:(?<name>[\w\.\-\_]+)(?:\((?<args>[^}]*)\))?\}/i',
		'hookblock'	=> 
		'/\{hook:(?<name>[\w\.\-\_]+)(?:\((?<args>[^}]*)\))?\}(?<content>.*?)\{endhook\}/si',
	];
	
	/**
	 *  Main template constructor
	 *  
	 *  @param HookRegistry		$registery	Main hook system for template-based callables
	 *  @param array		$extend		Extended template placeholder patterns
	 */
	public function __construct( 
		private readonly	Log		$logger,
		private	readonly	HookRegistry	$registry, 
		private 		array		$extend		= []
	) {
		$this->patterns = \array_merge( static::PRESET_PATTERNS, $extend );
	}
	
	public static function create(
		?Container	$container	= null,
		?array		$extend		= null
	) : static {
		$container	??= Container::instance();
		$logger		= $container->get( Log::class );
		$registry	= $container->get( HookRegistry::class );
		$extend		??= [];
		
		return new static( $logger, $registry, $extend );
	}
	
	/**
	 *  Core template processing expressions
	 *  
	 *  @param string	$key		Match pattern key
	 *  @param array	$extend		Optional extended patterns
	 *  @return array|string
	 */
	private function patterns( ?string $key = null, ?array $extend = null ) : string|array {
		if ( !empty( $extend ) ) {
			$this->patterns = \array_merge( $this->patterns, $extend );
		}
		
		return ( null === $key ) 
			? $this->patterns 
			: ( $this->patterns[$key] ?? '' );
	}
	
	/**
	 *  Parse template tag optional arguments
	 *  
	 *  @param string	$str	Target phrase
	 *  @return array
	 */
	private function parse_tag_args( string $str ) : array {
		$args = [];
		
		\preg_match_all( $this->patterns( 'args' ) , $str, $m, \PREG_SET_ORDER );
		foreach ( $m as $row ) {
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
	 *  Scan a template for nodes of type and parse parameters
	 *  
	 *  @param string	$template	Loaded template to scan
	 *  @return array			Parsed type parameters
	 *  
	 *  @example {{node_type.blog(is_featured=true,limit=4)}}
	 *  {{node_type.topic(is_featured=true,limit=4,sort=created_at,direction=DESC)}}
	 *  {{node_type.post(is_hero=true,limit=1)}}
	 */
	private function node_tags( string $template ) : array {
		\preg_match_all(
			'/{node_type\.(\w+)\(([^}]*)\)}/', 
			$template, $matches, \PREG_SET_ORDER 
		);
		$tags = [];
		
		foreach ( $matches as $match ) {
			$tags[] = [
				'full'		=> $match[0],
				'type'		=> $match[1],
				'params'	=> $this->parse_tag_args( $match[2] )
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
	public function resolver( string $type, array $resolvers ) : ?callable {
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
	 *  @param string	$template 	Raw template data
	 *  @param array	$resolvers	List of type-keyed registered resolvers
	 *  @return string
	 */
	public function resolve_nodes( 
		string	$template, 
		array	$resolvers, 
		array	$context	= [] 
	) : string {
		
		$tags	= $this->node_tags( $template );
		foreach ( $tags as $tag ) {
			$type		= $tag['type'];
			$params		= $tag['params'];
			$full		= $tag['full'];
			
			$resolver	= $this->resolver( $type, $resolvers );
			$params['context'] = $context;
			
			if ( !$resolver ) {
				$this->logger->warn( "No resolver found for node type: {$type}" );
				
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
						$this->logger->warn( "Resolver output failed for type: {$type}" );
						$content = "<!-- Unknown node type: {$type} -->";
					}
				} catch ( \Throwable $e ) {
					$this->logger->warn( "Node resolver error for '{$type}': {$e->getMessage()}" );
					$content	= 
					"<!-- Error rendering node: {$type} -->";	
				}
			}
			
			$template = \str_replace( $full, $content, $template );
		}
		
		return $template;
	}
	
	/**
	 *  Block {template} detection
	 *  
	 *  @param string	$template	Raw template data
	 *  @param array	$context	Processing format data context
	 *  @return string
	 */
	private function blocks( string $template, array $context ) : string {
		\preg_match_all( 
			$this->patterns( 'block' ), $template, $matches, 
			\PREG_SET_ORDER 
		);
		
		foreach ( $matches as $match ) {
			$key		= $match[1];
			$content	= $match[2];
			$valid		= 
			\array_key_exists( $key, $context ) && ( null !== $context[$key] );
			
			$template	= 
			\str_replace( $match[0], $valid ? $content : '', $template );
		}
	
		return $template;
	}
	
	/**
	 *  Convert dot notation phrase
	 *  
	 *  @param string	$template	Template name
	 *  @param array	$vars		Placeholder value replacements
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
	private function interpolate( string $template, array $vars ) : string {
		$normal			= $vars;
		\ksort( $normal );
		
		$key			= 
		\hash( 'sha1', $template . \json_encode( $normal, \JSON_UNESCAPED_UNICODE ) );
		
		$this->cache[$key]	??= 
		\preg_replace_callback(
			'/\{\{\s*([\w\.]+)(?:\s*\|\s*([^\}]+))?\s*\}\}/',
			function ( $matches ) use ( $vars ) {
				$keys	= explode( '.', $matches[1] );
				$value	= $vars;
				
				foreach( $keys as $key ) {
					if ( \is_array( $value ) && \array_key_exists( $key, $value ) ) {
						$value	= $value[$key];
					} elseif( \is_object( $value ) && isset( $value->$key ) ) {
						$value	= $value->$key;
					} else {
						return isset( $matches[2] ) 
							? $matches[2]
							: $matches[0];
					}
				}
				
				if ( \is_scalar( $value ) ) { return ( string ) $value; }
				if ( \is_object( $value ) && \method_exists( $value, '__toString' ) ) {
					return ( string ) $value;
				}
				
				return $matches[0];
			}, $template
		);
		
		return $this->cache[$key];
	}
	
	/**
	 *  Variable strictness logic comparison helper
	 *  
	 *  @param mixed	$chk		Check target
	 *  @param mixed	$val		Source data
	 *  @param bool		$case_flag	Case sensitive comparison, if true
	 *  @return bool
	 */
	private function compare_var( mixed $chk, mixed $val, bool $case_flag ) : bool {
		if ( \is_bool( $chk ) || \is_bool( $val )) {
			return $chk === $val;
		}
		
		if ( \is_numeric( $chk ) && \is_numeric( $val ) ) {
			return ( float ) $chk === ( float ) $val;
		}
		
		$chk_cmp = ( string ) $chk;
		$val_cmp = ( string ) $val;
		
		return $case_flag ?
			\strcmp( $chk_cmp, $val_cmp ) === 0 : 
			\strcasecmp( $chk_cmp, $val_cmp ) === 0;
	}
	
	/**
	 *  Match template {{placholder}} terms with array keys
	 *  
	 *  @param array	$vars	Context source data
	 *  @return array
	 */
	private function placeholders( array $vars ) : array {
		if ( empty( $vars ) ) { return []; }
		
		$flat = Util::flatten_array( $vars );
		return \array_combine(
			\array_map( fn( $key ) => '{{' . $key . '}}', \array_keys( $flat ) ),
			\array_map( fn( $val ) => \is_scalar( $val ) ? ( string ) $val : '', $flat )
		);
	}
	
	/**
	 *  Find any included templates files
	 *  
	 *  @param string	$template	Raw template data
	 *  @return array
	 */
	private function includes( string $template ) : array {
		\preg_match_all( 
			$this->patterns( 'incexists' ), 
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
	 *  @param bool		$default_case	Fallback case sensitivity, defaults to false (insensitive)
	 *  @return array
	 */
	private function extract_flags( string $raw, bool $default_case = false ) : array {
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
	 *  @param bool		$case_flag	Case sensitivity, true for sensitive match
	 *  @return bool
	 */
	private function logic( string $expr, array $context, bool $case_flag = false ) : bool {
		$patterns	= $this->patterns();
		if ( !\preg_match( $patterns['logic'], $expr, $m ) ) {
			return false;
		}
		
		$operator	= \strtolower( $m['operator'] );
		$var		= ( string ) ( $context[$m['variable']] ?? '' );
		$raw		= \trim( $m['value'], "\"'" );
		
		[ $val, $case_flag ] = $this->extract_flags( $raw, $case_flag );
		
		return match ( $operator ) {
			'==='		=> $var === $val,
			'!=='		=> $var !== $val,
			'=='		=> $this->compare_var( $var, $val, $case_flag ),
			'!='		=> !$this->compare_var( $var, $val, $case_flag ),
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
	 *  @param bool		$case_flag	Case sensitivity, false for insensitive match
	 *  @return bool
	 */
	private function logic_group( 
		string	$condition, 
		array	$context, 
		bool	$case_flag	= false 
	) : bool {
		foreach ( \explode( '||', $condition ) as $or_group ) {
			$is_valid = true;
			
			foreach ( \explode( '&&', \trim( $or_group ) ) as $and_group ) {
				$and_group = trim( $and_group );
				
				if ( !$this->logic( $and_group, $context, $case_flag ) ) {
					$is_valid = false;
					break; // Short circuit AND group
				}
			}
			
			if ( $is_valid ) { return true; } // Short circuit OR group
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
	private function load( 
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
			$this->logger->error( "Disallowed template extension: {$ext}" );
			
			throw new 
			\RuntimeException( "Invalid template type" );
		}
	
		// Custom template file directory
		$dir		??= 
		\defined( 'TEMPLATE_DIR' ) 
			? \constant( 'TEMPLATE_DIR' )
			: __DIR__;
		
		// Custom view directory
		$vdir		= 
		( null === $root ) 
			? '/views/' 
			: '/' . \trim( $root, '/' );
		
		$vdir		= Sanitize::path_traversal( $vdir ) ?: '';
		$base		= @\realpath( $dir . $vdir );
		
		if ( !$base ) {
			$this->logger->error( "Invalid base path: {$base}" );
			
			throw new 
			\RuntimeException( "Template base path not found" );
		}
		
		$theme_path	= null === $theme ? '' : "/themes/{$theme}/";
		$relative	= $theme_path . '/' . \ltrim( $path, '/' );
		$relative	= \preg_replace( '#/+#', '/', $relative ); // Duplicate slash fix
		
		if ( \str_contains( $relative, '..' ) ) { // No traversal
			$this->logger->error( "Suspicious template path: {$path}" );
			
			throw new 
			\RuntimeException( "Invalid template path" );
		}
		
		$relative	= Sanitize::path_traversal( $relative ) ?: '';
		$full		= @\realpath( $base . '/' . $relative );
		if ( !$full || 0 !== \stripos( $full, $base ) ) {
			$this->logger->error( "Template path traversal attempt: {$path}" );
			
			throw new 
			\RuntimeException( "Invalid template path" );
		}
	
		if ( !\is_readable( $full ) ) {
			$this->logger->error( "Template not found: {$path}" );
			
			throw new 
			\RuntimeException( "Template not readable" );
		}
	
		$info	= $cache[$full] ??= \file_get_contents( $full );
		if ( false === $info ) {
			$this->logger->error( "Failed to read template: {$path}" );
			
			throw new 
			\RuntimeException( "Failed to read template" );
		}
		
		$this->logger->debug( "Loaded template: {$full}" );
		return $info;
	}
	
	/**
	 *  Load predefined static template from constant
	 *  
	 *  @return array
	 */
	public function load_static() : array {
		$raw		= 
		\defined( 'TEMPLATES' ) && \is_string( TEMPLATES )
			? \constant( 'TEMPLATES' ) 
			: '';
		
		// Try to get a default loaded template if nothing defined
		if ( empty( $raw ) ) {
			$fraw	= 
			\defined( 'TEMPLATE_FILE' ) && \is_string( TEMPLATE_FILE )
				? \constant( 'TEMPLATE_FILE' )
				: '';
			
			if ( empty( $fraw ) || !\is_readable( $fraw ) )  { return []; }
			
			$file	= $this->load( $fraw );
			if ( empty( $file ) ) { return []; }
			
			$flines	= \explode( "\n", $file );
		} else { $flines = \explode( "\n", $raw ); }
		
		if ( !\is_array( $flines ) ) { return []; }
		
		$current	= null;
		$templates	= [];
		$buffer		= [];
		$phrase		= '/^\s*-{3,}\s*(tpl_[A-Za-z0-9_]+)\s*-{3,}\s*$/';
		
		foreach ( $flines as $line ) {
			// Match template
			if ( \preg_match( $phrase, $line, $m ) ) {
				if ( null !== $current ) {
					$templates[$current] = 
					\rtrim( \implode( "\n", $buffer ) );
				}
				
				$current = $m[1];
				$buffer  = [];
				continue;
			}
			
			// Skip comments
			if ( \preg_match( '/^\s*(##|;;|%%)/', trim( $line ) ) ) {
				continue;
			}
			
			if ( null !== $current ) { $buffer[] = $line; }
		}
		
		if ( null !== $current ) {
			$templates[$current]	= \rtrim( \implode("\n", $buffer ) );
		}
		
		return $templates;
	}
	
	/**
	 *  Partial/Fragment template loading helper
	 *  
	 *  @param string	$template 	Raw template data
	 *  @param array	$vars		Content data
	 *  @param int		$depth		Maximum include depth, defaults to 5
	 *  @param array	$seen		Current list of templates already processing
	 *  @return string
	 */
	private function partials(
		string	$template,
		array	$vars		= [],
		int	$depth		= 0,
		array	$seen		= []
	) : string {
		$max_depth	= 5;
		if ( $depth > $max_depth ) {
			$this->logger->warn( "Max template include depth exceeded" );
			return $template;
		}
		
		$includes	=  $this->includes( $template );
		if ( empty( $includes ) ) {
			return $this->interpolate(
				$template,
				$this->placeholders( $vars )
			);
		}
		
		$partials	= [];
		foreach ( $includes as $key ) {
			if ( \in_array( $key, $seen, true ) ) {
				$this->logger->warn( "Circular include detected {$key}" );
				continue;
			}
			
			try {
				$partial_tpl			= 
				$this->load( "partials/{$key}.html" );
				
				$partials["{include:{$key}}"]	= 
				$this->partials(
					$partial_tpl,
					$vars,
					$depth + 1,
					[...$seen, $key]
				);
				
			} catch ( \Throwable $e ) {
				$this->logger->warn( "Partial not loaded: {$key}: {$e->getMessage()}" );
				$partials["{include:{$key}}"]	= '';
			}
		}
		
		// Merge partials with user-defined placeholders
		$merged = \array_merge( $this->placeholders( $vars ), $partials );
		return $this->interpolate( $template, $merged );
	}
	
	/**
	 *  On-template logic parser
	 *  
	 *  @param string	$template 	Raw template data
	 *  @param array	$context	Processed data context
	 *  @param bool		$case_flag	Case sensitivity flag, defaults to false (insensitive)
	 *  @return string
	 */
	private function conditionals(
		string	$template,
		array	$context,
		bool	$case_flag	= false
	) : string {
		$patterns = $this->patterns();
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
			
			if ( $this->logic_group( $condition, $context, $case_flag ) ) {
				$replacement	= 
				$this->parse( $if_content, $context, $case_flag );
			} elseif (
				$elseif_condition && $this->logic_group(
					$elseif_condition, $context, $case_flag
				)
			) {
				$replacement	= 
				$this->parse( $elseif_content, $context, $case_flag );
			} elseif ( !empty( $else_content ) ) {
				$replacement	= 
				$this->parse(
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
	 *  @param string	$template 	Raw template data
	 *  @param array	$context	Processed data context
	 *  @param bool		$case_flag	Case sensitivity flag, defaults to false (insensitive)
	 *  @return string
	 */
	private function loops(
		string	$template, 
		array	$context, 
		bool	$case_flag	= false 
	) : string {
		$patterns	= $this->patterns();
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
				$vars		= $context;
				$vars[$alias]	= $item;
				$rendered	.= $this->parse( $content, $vars, $case_flag );
			}
			
			$template	= \str_replace( $match[0], $rendered, $template );
		}
		
		return $template;
	}
	
	private function hook_run( array $m, array $context, bool $is_block ) : string {
		$name		= $m['name'];
		$content	= $m['content'] ?? '';
		$params		= $this->parse_tag_args( $m['args'] ?? '' );
		$result		= 
		$this->registry->run( $name, false, [
			'context'	=> $context,
			'default'	=> $content,
			'params'	=> $params 
		] );
		
		$html		= 
		( null !== $result->html )
			? $result->html
			: ( $is_block ? $content : '' );
		
		// Fragments after processed content or original content
		foreach ( $result->fragments() as $frag ) {
			$html .= $frag;
		}
		
		// Named content blocks
		if ( $is_block && $result->has_block( $name ) ) {
			foreach ( $result->blocks( $name ) as $block ) {
				$html .= $block;
			}
		}
		
		return $html;
	}
	
	private function hooks( string $template, array $context ) : string {
		// Block hooks
		$template = 
		\preg_replace_callback(
			$this->patterns( 'hookblock' ),
			function ( $m ) use ( $context ) {
				return $this->hook_run( $m, $context, true );
			},
			$template
		);
		
		// Inline hooks
		$template	= 
		\preg_replace_callback(
			$this->patterns( 'hook' ),
			function ( $m ) use ( $context ) {
				return $this->hook_run( $m, $context, false );
			},
			$template
		);
		
		return $template;
	}
	
	/**
	 *  Template parsing entry point
	 *  
	 *  @param string	$template 	Raw template data
	 *  @param array	$context	Processed data context
	 *  @param bool		$case_flag	Case sensitivity flag, defaults to false (insensitive)
	 *  @return string			Fully parsed template
	 */
	public function parse( 
		string	$template, 
		array	$context,
		bool	$case_flag	= false 
	) : string {
		if ( empty( $template ) ) { return ''; }
		
		if ( \preg_match( $this->patterns()['incexists'], $template ) ) {
			$template = $this->partials( $template, $context, 0, [] );
		}
		
		$template	= $this->loops( $template, $context, $case_flag );
		$template	= $this->conditionals( $template, $context, $case_flag );
		$template	= $this->blocks( $template, $context );
		$template	= $this->interpolate( $template, $context );
		
		$resolvers	= [];
		try {
			if ( isset( $context['resolvers'] ) ) {
				$resolvers	= $context['resolvers'];
			} elseif ( isset( $context['resolver_loader'] ) ) {
				$loader		= $context['resolver_loader'];
				if ( \is_callable( $loader ) ) {
					$resolvers	= $loader();
				} else {
					$this->logger->warn( "Template resolver_loader is not a callable" );
				}
			}
		} catch( \Throwable $e ) {
			$this->logger->error( "Error loading resolver: {$e->getMessage()}" );
		}
		
		if ( !empty( $resolvers ) ) {
			$template = $this->resolve_nodes( $template, $resolvers, $context );
		}
		
		return $this->hooks( $template, $context );
	}
	
	/**
	 *  Store and send rendering templates
	 *  
	 *  @param string	$lable		Template name to send back
	 *  @param array	$reg		New templates to initiaize registry or override existing templates
	 *  @return string
	 */
	public function get( string $label, array $reg = [] ) : string {
		static $tpl	= [];
		
		// Preload static templates
		if ( empty( $tpl ) ) {
			$tpl = $this->load_static();
		}
		
		// New templates? Append to current store
		if ( !empty( $reg ) ) {
			$tpl = \array_merge( $tpl, $reg );
		}
		
		return $tpl[$label] ?? '';
	}
	
	/**
	 *  Core template renderer with data context
	 *  
	 *  @param string	$label		Root base template
	 *  @param array	$context	Data payload context(s)
	 *  @param bool		$case_flag	Case sensitivity flag
	 *  @return string
	 */
	public function render(
		string	$label, 
		array	$context	= [], 
		bool	$case_flag	= false 
	) : string {
		$tpl	= $this->get( $label );
		return $this->parse( $tpl, $context, $case_flag );
	}
}


/**
 *  @class Content formatting
 */
class Format extends Instance {
	
	/**
	 *  @var array<string, callback> Paragraph-level cleanup filters
	 */
	private array $para_filters;
	
	/**
	 *  @var array<string,callback> Code block cleanup filters
	 */
	private array $code_filters;
	
	/**
	 *  @var string Date string format
	 */
	private string $nice_date;
	
	/**
	 *  @var array<string, callable> Hosted embed wrappers
	 */
	private array $hosted;
	
	/**
	 *  @var array<string,callable> Markdown formatting
	 */
	private array $mark_format;
	
	/**
	 *  Format constructor
	 *  
	 *  @param Config	$config		Configuration settings
	 *  @param Language	$language	Language loading and translations
	 *  @param Template	$template	Rendering and content transformation
	 */
	public function __construct(
		public readonly Config		$config,
		public readonly Language	$language,
		public readonly Template	$template
	) {}
	
	public static function create( ?Container $container = null ) : static {
		$container	??= Container::instance();
		$config		= $container->get( Config::class );
		$language	= $container->get( Language::class );
		$template	= $container->get( Template::class );
		
		return new static( $config, $language, $template );
	}
	
	/**
	 * Convert an unformatted text block to paragraphs
	 * 
	 *  @link http://stackoverflow.com/a/2959926
	 *  @param string	$val		Filter variable
	 *  @param bool		$skip_code	Ignore code blocks
	 *  @return string
	 */
	public function paragraphs( string $val, bool $skip_code = false ) : string {
		
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
		if ( !$skip_code ) {
			// Format inside code tags
			$out = \preg_replace_callback( '/<code>(.*)<\/code>/ism',
			function ( $m ) {
				if ( empty( $m[1] ) ) { return ''; }
				
				return 
				$this->template->render( 'tpl_codeblock', [ 
					'code' => Sanitize::escape_text( \trim( $m[1] ), false, false )
				] );
			}, $out );	
		}
		
		$this->para_filters	??= [
			// Turn consecutive line breaks to new paragraph
			'#\s{2,}\n|\n{2}#'		=> function( $m ) { return '</p><p>'; },
			
			// Turn consecutive <br>s to paragraph breaks
			'#(?:<br\s*/?>\s*?){2,}#'	=> function( $m ) { return '</p><p>'; },
			
			// Remove <br> abnormalities
			'#<p>(\s*<br\s*/?>)+#'		=> function( $m ) { return '</p><p>'; },
			
			'#<br\s*/?>(\s*</p>)+#'		=> function( $m ) { return '<p></p>'; },
			
			// Breaks after tags
			'#</([\w\d]+)>(\s*<br\s*/?>)#'	=> function( $m ) { return '</' . $m[1] . '>'; },
		];
		
		$out		= \preg_replace_callback_array( $this->para_filters, $out );
		if ( $skip_code ) { return $out; }
		
		$this->code_filters	??= [
			// Remove <br>, <p> tags inside <pre> and <code>
			'#<(pre|code)(.*)?>(.*)<\/\1>#ism'	=>
			function( $m ) {
				$v = \preg_replace( '#<br\s*/?>#', "\n", $m[3] );
				$v = \strtr( $v, [ 
					'</p><p>'	=> "\n\n",
					'<p>'		=> ''
				] );
				$t = $m[2] ?? '';
				return "<{$m[1]}{$t}>{$v}<\/{$m[1]}>";
			},
			
			// Block of code
			'#^`{3,}([^`{3,}]+)`{3,}#mU'		=>
			function( $m ) {
				return
				$this->template->render( 'tpl_codeblock', [ 
					'code' => Sanitize::escape_text( \trim( $m[1] ), false, false )
				] );
			}
		];
		
		return \preg_replace_callback_array( $this->code_filters, $out );
	}
	
	/**
	 *  Parse out and format footnotes, if given
	 *  
	 *  @param string	$html		Content body
	 *  @param array	$footnotes	Unformated list of footnotes
	 *  @return string
	 */
	public function footnotes( string $html, array $footnotes ) : string {
		// No footnotes? Send content as-is
		if ( empty( $footnotes ) ) { return $html; }
		
		$slug	= '';		// Footnote ID link slug
		$foot	= '';		// Formatted footnote
		$id	= 0;		// Footnote marker counter
		$blink	= '';		// Footnote marker backlink reference slug
		$back	= [];		// Formatted markers per footnote
		$multi	= false;	// Multiple backlinks to body text
		
		// Replace placeholder markers with links
		foreach( $footnotes as $k => $v ) {
			// No placeholders in body text?
			if ( empty( $v['markers'] ) ) { continue; }
			
			// Generate ID slug from part of footnote and its hash
			$slug	= 
			Sanitize::slug( 
				Text::strim( \strip_tags( $v['footnote'] ), 20 ) 
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
				$this->template->render( 'tpl_footnote_back', [
					'link'		=> $blink,
					'phrase'	=> $multi ? $id : $k
				] );
				
				// Replace marker in body text with link to footnote
				// TODO: Move this to template loops
				$html = 
				\strtr( $html, [ $m =>
					$this->template->render( 'tpl_footlink', [ 
						'link'		=> $slug,
						'id'		=> $blink,
						'phrase'	=> $k
					] ) 
				] );
				$id++;
			}
			
			$foot .= 
			$this->template->render( 'tpl_footnote', [
				'backlinks'	=> 
				$multi 
					? $k . '. ' . \implode( ', ', $back ) 
					: $back[0],
				'id'		=> $slug,
				'footnote'	=> $v['footnote']
			]  );
			
			// Reset after each footnote
			$back	= [];
			$id	= 0;
		}
		
		return $html . 
		$this->template->render( 'tpl_footnote_wrap', [
			'{footnotes}'	=> $foot
		] );
	}
	
	/**
	 *  Friendly datetime stamp
	 *  
	 *  @param mixed	$stamp		Raw datetime stamp, defaults to now
	 *  @return string
	 */
	public function nice_date( $stamp = null ) : string {
		$this->nice_date ??= 
		$this->language->term( 
			'date_nice', $this->config->setting( 'date_nice', 'l, F j, Y' ) 
		);
		
		return \gmdate( $this->nice_date, Util::time_string_int( $stamp ) );
	}
	
	/**
	 *  Clean entry title
	 *  
	 *  @param mixed	$text	Raw title entered by the user
	 *  @param int		$max	Maximum string length
	 *  @return string
	 */
	public function title( mixed $text, int $max = 255 ) : string {
		if ( \is_array( $text ) ) { return ''; }
		
		// Unify spaces, tabs, returns etc...
		return 
		Text::strim( Sanitize::spaces( ( string ) $text ), $max );
	}
	
	/**
	 *  Label name ( ASCII only )
	 *  
	 *  @param string	$text	Raw label entered into field
	 *  @return string
	 */
	public function label( string $text ) : string {
		$text	= Sanitize::spaces( $text, '_' );
		
		return 
		Text::strim( \preg_replace( 
			'/[^a-z0-9_\-\.]/i', '', Sanitize::normalize( $text ) 
		), 50 );
	}
	
	/**
	 *  Process multiple comma delimited whitelists and filter label names
	 *  
	 *  @param array	$groups		Raw key-value pairs
	 *  @param bool		$lower		Values should be lowercase lists
	 *  @return array
	 */ 
	public function whitelists( array $groups, bool $lower = false ) : array {
		$ext = [];
		foreach ( $groups as $k => $v ) { 
			$ext[$this->label( $k )] = 
			\implode( ',', Util::trimmed_list( $v, $lower ) );
		}
		
		return $ext;
	}
	
	/**
	 *  Embedded media shortcode list helper and hook trigger
	 *  
	 *  @param array	$custom		Overriden embed HTML templates
	 *  @return array
	 */
	public function hosted_embeds( ?array $custom = null ) : array {
		$this->hosted ??= [
			// YouTube syntax
			'/\[youtube http(s)?\:\/\/(www)?\.?youtube\.com\/watch\?v=([0-9a-z_\-]*)(?:\&t\=([\d]*)s)?\]/is'
			=> \strtr( $this->template->get( 'tpl_youtube' ), [ '{src}' => '$3', '{time}' => ( '$4' ?? '0' ) ] ),
			
			'/\[youtube http(s)?\:\/\/(www)?\.?youtu\.be\/([0-9a-z_\-]*)(?:\?t\=([\d]*))?\]/is'
			=> \strtr( $this->template->get( 'tpl_youtube' ), [ '{src}' => '$3', '{time}' => ( '$4' ?? '0' ) ] ),
			
			'/\[youtube ([0-9a-z_\-]*)\]/is'
			=> \strtr( $this->template->get( 'tpl_youtube' ), [ '{src}' => '$1' ] ),
			
			// Vimeo syntax
			'/\[vimeo ([0-9]*)\]/is'
			=> \strtr( $this->template->get( 'tpl_vimeo' ), [ '{src}' => '$1' ] ),
			
			'/\[vimeo http(s)?\:\/\/(www)?\.?vimeo\.com\/([0-9]*)\]/is'
			=> \strtr( $this->template->get( 'tpl_vimeo' ), [ '{src}' => '$3' ] ),
			
			// Peertube (any instance)
			'/\[peertube http(s)?\:\/\/(.*?)\/videos\/watch\/([0-9\-a-z_]*)\]/is'
			=> \strtr( $this->template->get( 'tpl_peertube' ), [ '{src_host}' => '$2', '{src}' => '$3' ] ),
			
			// Archive.org
			'/\[archive http(s)?\:\/\/(www)?\.?archive\.org\/details\/([0-9\-a-z_\/\.]*)\]/is'
			=> \strtr( $this->template->get( 'tpl_archiveorg' ), [ '{src}' => '$3' ] ),
			
			'/\[archive ([0-9a-z_\/\.]*)\]/is'
			=> \strtr( $this->template->get( 'tpl_archiveorg' ), [ '{src}' => '$1' ] ),
			
			// LBRY/Odysee syntax
			'/\[(lbry|odysee) http(s)?\:\/\/(.*?)\/\$\/download\/([\pL\pN\-_]*)\/\-?([0-9a-z_]*)\]/is'
			=> \strtr( $this->template->get( 'tpl_lbry' ), [ 
				'{src_host}' => '$3', '{slug}' => '$4', '{src}' => '$5' 
			] ),
			
			'/\[lbry lbry\:\/\/\@(.*?)\/([\pL\pN\-_]*)(\#[\pL\pN\-_]*)?(\s|\/)([\pL\pN\-_]*)\]/is'
			=> \strtr( $this->template->get( 'tpl_lbry' ), [ 
				'{src_host}' => 'lbry.tv', '{slug}' => '$2', '{src}' => '$5' 
			] ),
			
			'/\[(?:utreon|playeur) (?:http(s)?\:\/\/(www\.)?)?(?:utreon|playeur)\.com\/v\/([0-9a-z_\-]*)(?:\?t\=([\d]*))?\]/is'
			=> \strtr( $this->template->get( 'tpl_playeur' ), [ '{src}' => '$3', '{time}' => ( '$4' ?? '0' ) ] )
			
		];
		
		if ( !empty( $custom ) ) {
			$this->hosted = \array_merge( $this->hosted, $custom );
		}
		return $this->hosted;
	}
	
	/**
	 *  Parse caption/subtitle definitions if any are specified
	 *  
	 *  @param string	$cc	Combined caption definitions
	 *  @param string	$prefix	Source path prefix
	 *  @return string
	 */
	public function extract_cc( string $cc, string $prefix = '' ) : string {
		$cc	= \trim( $cc );
		if ( empty( $cc ) ) { return ''; }
		
		$dd	= '';
		$src	= '';
		$lang	= '';
		$id	= '';
		$p	= [];
		
		// Find multiple caption definitions if any
		$defs	= Util::trimmed_list( $cc, false, '][' );
		
		// Parse captions
		foreach ( $defs as $d ) {
			if ( empty( $d ) ) { continue; }
			
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
			Sanitize::prepend_path( $p['src'] ?? $p['source'] ?? '', $prefix );
			
			// Language name if specified
			$lang	= 
			Sanitize::bland( $p['lang'] ?? $p['language'] ?? '--', true );
			
			// Is default?
			$id	= empty( $p['default'] ) ? '' : 'default';
			
			// Language or plain subtitle
			$dd	.= empty( $lang ) ? 
			\strtr( $this->template->get( 'tpl_cc_nl_embed' ), [
				'{src}'		=> $src,
				'{default}'	=> $id
			] ) : 
			\strtr( $this->template->get( 'tpl_cc_embed' ), [
				'{label}'	=> 
				Sanitize::bland( 
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
	 *  Embedded media
	 *  
	 *  @param string	$html		Pre-filtered HTML to replace media tags
	 *  @param string	$prefix		Source path prefix
	 *  @param array	$custom		Overriden embed HTML templates
	 *  @return string
	 */
	public function embeds( string $html, string $prefix = '', ?array $custom = null  ) : string {
		static $hosted;
		static $media;	// Locally uploaded
	
		// Uploaded media embedding
		static $rx = '/\[(?<type>audio|video) ' . 
				'(?:\[(?<captions>(.*?))\]\s+?)?' . 
				'(?:\((?<preview>.*?)\)\s+?)?' . 
				'(?<src>[^\]]+)\]/s';
		
		// First run?
		$hosted	??= $this->hosted_embeds( $custom );
		$media	??= [ $rx => 
			function( $m ) use ( $prefix ) {
				$i = \trim( $m['type'] ?? '' );		// Media type
				$p = \trim( $m['preview'] ?? '' );	// Thumbnail or preview
				
				// Use prefix for relative paths
				$u = Sanitize::prepend_path( \trim( $m['src'] ?? '' ), $prefix );
				
				// Parse caption definitions if any
				$c = $this->extract_cc( $m['captions'] ?? '', $prefix );
				
				switch( $i ) {
					case 'audio':
						return Sanitize::is_safe_ext( $u, $this->config->ext_groups( 'audio' ) ) ?
						\strtr( 
							$this->template->get( 'tpl_audio_embed' ), 
							[ '{src}' => $u ] 
						) : '';
					
					case 'video':
						if ( !Sanitize::is_safe_ext( $u, $this->config->ext_groups( 'video' ) ) ) {
							return '';
						}
						
						return empty( $p ) ? 
						// No preview
						\strtr( $this->template->get( 'tpl_video_np_embed' ), [ 
							'{src}'		=> $u,
							'{detail}'	=> $c
						] ) : 
						
						// With preview
						\strtr( $this->template->get( 'tpl_video_embed' ), [ 
							'{preview}'	=> Sanitize::prepend_path( $p, $prefix ),
							'{src}'		=> $u,
							'{detail}'	=> $c
						] );
						
					default:
						return '';
				}
			}
		];
		
		$html	= 
		\preg_replace( 
			\array_keys( $hosted ), 
			\array_values( $hosted ), 
			$html 
		);
		
		return \preg_replace_callback_array( $media, $html );
	}
	
	/**
	 *  Convert row string to list of cells
	 *  
	 *  @param string	$row		Matched plain text row cells
	 *  @param bool		$is_align	This is an alignment row if true
	 *  @return array
	 */
	public function table_cells( string $row, bool $is_align = false ) : array {
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
	 *  @param string		$tpl	Cell rendering template
	 *  @param int		$oe	Optional odd/even row selector
	 *  @return string
	 */
	public function table_row( array $cells, array $align, string $tpl, int $oe = 0 ) : string {
		if ( empty( $cells ) ) {
			return \strtr( $this->template->get( 'tpl_table_row' ), [ '{cells}' => '' ] );
		}
		
		$i	= 0;		// Row cell counter
		$cells	= 
		\array_map( function( $r ) use ( $align, $tpl, &$i ) {
			switch ( $align[$i] ?? '' ) {
				// Left align
				case 'l':
					$r = \strtr( $this->template->get( $tpl ), [ 
						'{align}'	=> 'left',
						'{data}'	=> $r
					] );
					break;
				
				// Center align
				case 'c': 
					$r = \strtr( $this->template->get( $tpl ), [ 
						'{align}'	=> 'center',
						'{data}'	=> $r
					] );
					break;
				
				// Right align
				case 'r':
					$r = \strtr( $this->template->get( $tpl ), [ 
						'{align}'	=> 'right',
						'{data}'	=> $r
					] );
					break;
				
				// No alignment
				default:
					$r = \strtr( $this->template->get( $tpl ), [ 
						'{align}'	=> '',
						'{data}'	=> $r
					] );
			}
			
			$i++;
			return $r;
			
		}, $cells );
		
		// No Odd/Even
		if ( empty( $oe ) ) {
			return 
			\strtr( $this->template->get( 'tpl_table_row' ), [ 
				'{cells}' => \implode( '', $cells ) 
			] );
		}
		
		return ( 0 == $oe % 2 ) 
			? \strtr( $this->template->get( 'tpl_table_row_even' ) , [ '{cells}' => \implode( '', $cells ) ] ) 
			: \strtr( $this->template->get( 'tpl_table_row_odd' ), [ '{cells}' => \implode( '', $cells ) ] );
	}
	
	/**
	 *  Table formatting helper
	 *  
	 *  @param array	$m	Regex found match
	 *  @return string
	 */
	public function table( array $m ) : string {
		// Table cell alignment definition
		$align = 
		\array_map( static function( $a ) {
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
		}, $this->table_cells( $m['align'] ?? '' , true ) );
		
		// Cell templates
		$cell_tpl	= $this->template->get( 'tpl_table_cell' );
		$hcell_tpl	= $this->template->get( 'tpl_table_h_cell' );
		
		// Table column headers
		$headers	= 
		$this->table_row( 
			$this->table_cells( $m['headers'] ?? '' ), 
			$align, 
			$hcell_tpl
		);
		
		// Table column footers
		$footers	= 
		$this->table_row( 
			$this->table_cells( $m['footers'] ?? '' ), 
			$align,
			$cell_tpl
		);
		
		// Odd/Even rows
		$oe		= 1;
		
		// Table body rows
		$rows	= 
		\array_map( function( $r ) use ( $cell_tpl, $align, &$oe ) {
			return 
			$this->table_row( 
				$this->table_cells( $r ), 
				$align, 
				$cell_tpl,
				$oe
			);
			$oe++;
		}, Text::split_lines( $m['rows'] ?? '', -1, true ) );
		
		$body = \implode( '', $rows );
		
		return match( true ) {
			// Table with headers and footers
			!empty( $headers ) && !empty( $footers )	=> 
			$this->template->render( 'tpl_table', [ 
				'thead' 		=> $headers,
				'tfoot' 		=> $footers,
				'tbody' 		=> $body
			] ),
			
			// No headers, but with footers
			empty( $headers ) && !empty( $footers )		=> 
			$this->template->render( 'tpl_table_nh', [ 
				'tfoot' 		=> $footers,
				'tbody'			=> $body
			] ),
			
			// No footers, but with headers
			!empty( $headers ) && empty( $footers )		=> 
			$this->template->render( 'tpl_table_nh', [ 
				'thead' 		=> $headers,
				'tbody'			=> $body
			] ),
			
			// No headers or footers
			default						=>
			$this->template->render( 'tpl_table_nh_nf', [ 
				'tbody' => $body
			] )
		};
	}
	
	/**
	 *  Convert Markdown formatted text into HTML tags
	 *  
	 *  Inspired by : 
	 *  @link https://gist.github.com/jbroadway/2836900
	 *  
	 *  @param string	$html		Pacified text to transform into HTML
	 *  @param string	$prefix		URL prefix to prepend text
	 *  @param array	$override	Override filters
	 *  @return string
	 */
	public function markdown(
		string	$html,
		string	$prefix		= '',
		?array	$override	= null
	) : string {
		// Running footnotes
		static $running_f	= 0;
		$footnotes		= [];
		$fmarkers		= [];
		
		$this->mark_format	??= [
			// Links / Images with alt text and titles
			'/(\!)?\[([^\[]+)\]\(([^\"\)]+)(?:\"(([^\"]|\\\")+)\")?\)/s'	=> 
			function( $m ) use ( $prefix ) {
				$i = \trim( $m[1] );
				$t = \trim( $m[2] );
				$u = \trim( $m[3] );
				
				// Use prefix for relative paths
				$u = Sanitize::prepend_path( $u, $prefix );
				
				// If this is a plain link
				if ( empty( $i ) ) {
					return 
					\sprintf( "<a href='%s'>%s</a>", $u, Sanitize::escape_text( $t ) );
				}
				
				// This is an image
				// Fix titles / alt text
				$a = Sanitize::escape_text( \strtr( $m[4] ?? $t, [ '\"' => '"' ] ), false, false );
				return
				\sprintf( "<img src='%s' alt='%s' title='%s' />", $u, Sanitize::escape_text( $t ), $a );
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
			function( $m ) { return '</p><p>'; }, 
			
			// Inline code (untrimmed)
			'/[^\`]\`([^\n`]+)\`/'			=>
			function( $m ) {
				return 
				\strtr( $this->template->get( 'tpl_codeinline' ), [ 
					'{code}' => Sanitize::escape_text( \trim( $m[1] ), false, false )
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
					Sanitize::slug( ( string ) $m['phrase'] ) . '}';
					
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
			function( $m ) { return empty( $m ) ? '' : $this->table( $m ); }
		];
		
		// Merge custom markdown formatting
		if ( !empty( $override ) ) {
			$this->mark_format = \array_merge( $this->mark_format, $override );
		}
		$html	= \preg_replace_callback_array( $this->mark_format, $html );
		
		// Parse out footnotes, if any
		return $this->footnotes( $html, $footnotes );
	}
	
	/**
	 *  Content HTML filter
	 *  
	 *  @param string	$value		Unformatted content
	 *  @param bool		$use_fmt	Use markdown formatting, if true
	 *  @param array	$tag_map	Whitelist of allowed HTML tags, attributes, values etc...
	 *  @param string	$prefix		URL path prefix
	 *  @param bool		$sembed		Skip embedded media shortcodes if true
	 *  @param array	$override	Override filters
	 *  @param array	$custom		Custom embedded templates
	 *  @return string
	 */
	public function body( 
		string	$value, 
		bool	$use_fmt	= true,
		array	$tag_map	= [],
		string	$prefix		= '', 
		bool	$sembed		= false,
		?array	$override	= null,
		?array	$custom		= null
	) : string {
		static $sanity;
		
		if ( !isset( $sanity ) ) {
			if ( Util::missing( 'libxml_clear_errors' ) ) {
				$sanity	= false;
				Container::instance()->get( 'Log' )->error( 
					'The libxml extension is required for HTML formatting.' 
				);
				return '';
			}
			
			$sanity	= true;
		}
		
		if ( !$sanity ) { return ''; }
		
		// Remove preceding/trailing slashes
		$prefix		= \trim( $prefix, '/' );
		
		// Preliminary cleaning
		$html		= Sanitize::filter( $value, true );
		
		// Nothing to format?
		if ( empty( $html ) ) { return ''; }
		
		// Apply formatting, if enabled
		if ( $use_fmt ) {
			$html		= 
			$this->markdown( 
				html		: $html, 
				prefix		: $prefix, 
				override	: $override 
			);
		}
		
		// Nothing formatted?
		if ( empty( $html ) ) { return ''; }
		
		// Clean up HTML
		$clean		= 
		$this->paragraphs( 
			Sanitize::html( 
				html	: $this->paragraphs( $html, false ), // Line breaks and code
				tag_map	: $tag_map ?: $this->config->setting( 'tag_map', '{}', 'json' ) 
			),
			true
		);
		
		if ( $sembed ) { return $clean; }
		
		// Apply embedded media
		return $this->embeds( 
			html	: $clean, 
			prefix	: $prefix, 
			custom	: $custom 
		);
	}
}


/**
 *  Main route attribute
 */
#[Attribute( Attribute::TARGET_FUNCTION | Attribute::IS_REPEATABLE )]
class Route {
	
	/**
	 *  Route consturctor
	 *  
	 *  @param string	$pattern	Match regex pattern
	 *  @param string	$method		Normalized request method
	 *  @param array	$roles		Optional user roles
	 *  @param string	$name		Optional main handler
	 *  @param array	$middleware	Added handlers before main handler
	 *  @param bool		$auth		Requrires authentication (for plugin use)
	 */
	public function __construct(
		public readonly	string	$pattern,
		public readonly	string	$method		= 'get',
		public readonly	array	$roles		= [],
		public readonly	?string	$name		= null,
		public readonly	array	$middleware	= [],
		public readonly	bool	$auth		= false
	) {}
}

/**
 *  @class Plugin and nested class route discovery
 */
final class RouteDiscovery {
	
	public function __construct( public readonly Container $container ) {}
	
	public function routes( string $class, \ReflectionMethod $method ) : array {
		$routes		= [];
		$attrs		= $method->getAttributes( Route::class );
		$name		= $method->getName();
		$handler	= $name === '__invoke' ? $class : [ $class, $name ];
		
		foreach ( $attrs as $attr ) {
			$route = $attr->newInstance();
			
			$routes[] = [
				'pattern'	=> $route->pattern,
				'method'	=> \strtolower( $route->method ),
				'roles'		=> $route->roles,
				'handler'	=> $handler,
				'name'		=> $route->name ?? $name,
				'auth'		=> $route->auth,
				'middleware'	=> $route->middleware
			];
		}
		
		return $routes;
	}
	
	public function discover( string $class ) : array {
		$ref		= new \ReflectionClass( $class );
		$handlers	= [];
		$methods	= $ref->getMethods( \ReflectionMethod::IS_PUBLIC );
		
		foreach ( $methods as $method ) {
			$routes = $this->routes( $class, $method );
			if ( empty( $routes ) ) { continue; }
			foreach ( $routes as $r ) {
				$handlers[] = $r;
			}
		}
		return $handlers;
	}
	
	public function classes( array $classes ) : array {
		$handlers	= [];
		foreach ( $classes as $class ) {
			if ( !\class_exists( $class ) ) { continue; }
			$handlers = \array_merge( $handlers, $this->discover( $class ) );
		}
		
		return $handlers;
	}
}

/**
 *  @class Routing and paths
 */
final class Router extends Instance {
	
	/**
	 *  @var array Path matching regular expressions
	 */
	private array $type_patterns;
	
	/**
	 *  @var array Compiled routes
	 */
	private array $routes		= [];
	
	/**
	 *  @var RouteDiscovery Class and method based route scanner
	 */
	public readonly RouteDiscovery	$discovery;
	
	/**
	 *  Router constructor
	 *  
	 *  @param Container $container	Class instance handler
	 */
	public function __construct( public readonly Container $container ) {
		// Start with core classes
		$this->discovery = new RouteDiscovery( $this->container );
	}
	
	public static function create( ?Container $container = null ) {
		return new static( $container ?? Container::instance() );
	}
	
	public function add( array $route ) : void {
		$this->routes[] = $route;
	}
	
	public function core( array $classes ) {
		foreach ( $this->discovery->classes( $classes ) as $route ) {
			$this->add( $route );
		}
	}
	
	/**
	 *  Get matching type placeholder replacements
	 *  
	 *  @param array	$new_patterns	Optional newly registered patterns
	 *  @return array
	 */
	private function patterns( ?array $new_patterns = null ) : array {
		// Preset patterns
		$this->type_patterns ??= 
		$this->container->get( 'Config' )->setting( 'type_patterns', [
			'path'		=> '.+',
			'int'		=> '\d+',
			'str'		=> '[^/]+',
			'uuid'		=> '[0-9a-fA-F\-]{36}',
			'slug'		=> '[a-z0-9\-]{1,100}',
			'hex'		=> '[0-9a-fA-F]{1,200}',
			'alpha'		=> '[a-zA-Z]+',
			'bool'		=> 'true|false|1|0',
			'email'		=> '[^@]+@[^@]+\.[^/]+',
			'ip'		=> '\d{1,3}(\.\d{1,3}){3}',
			'id'		=> '[1-9][0-9]{1,24}',
			'page'		=> '[1-9][0-9]{0,3}',
			'alnum'		=> '[a-zA-Z0-9]+',
			'file'		=> '[^/]+\.[a-zA-Z0-9]+',
			'lang'		=> '[a-z]{2,3}(-[A-Z]{2,8})?'
		], 'json' );
		
		if ( empty( $new_patterns ) ) { return $this->type_patterns; }
		
		foreach ( $new_patterns as $name => $pattern ) {
			$esc	= \str_replace( '~', '\~', $pattern );
			$test	= @\preg_match( "~^{$esc}~", '' );
			if ( false === $test ) {
				throw new 
				\InvalidArgumentException(
					"Invalid regex pattern for type '{$name}'"
				);
			}
		}
		
		$this->type_patterns = \array_merge( $this->type_patterns, $new_patterns );
		return $this->type_patterns;
	}
	
	/**
	 *  Placeholder debris filter
	 *  
	 *  @param string	$url	Base matched path
	 *  @return string
	 */
	private function cleanup( string $url ) : string {
		// Remove leftover punctuation from optional placeholders
		$url	= \preg_replace( '#[-_.]+/#', '/', $url );	// Trailing before slash
		$url	= \preg_replace( '#/[-_.]+#', '/', $url );	// Leading after slash
		$url	= \preg_replace( '#[-_.]{2,}#', '-', $url );	// Collapse repeated
		
		// Normalize slashes
		$url	= \preg_replace( '#//+#', '/', $url );
		
		// Remove trailing slash unless root
		$url	= \rtrim( $url, '/' );
		if ( '' === $url ) { $url = '/'; }
		
		return $url;
	}
	
	/**
	 *  Build raw pattern into placeholder infused and parsed route
	 *  
	 *  @param string	$pattern	Raw pattern from configuration
	 *  @return string
	 */
	private function compile( string $pattern ) : string {
		$pattern = \rtrim( $pattern, '/' );
		if ( '' === $pattern ) { $pattern = '/'; }
		
		$place		= [];
		$pattern	= 
		\preg_replace_callback( 
			'/\{(\w+)(?::(\w+))?\}(\?)?/', 
			function ( $m ) use ( &$place ) {
				$key		= "__ROUTE_" . count( $place ) . "__";
				$place[$key]	= $m;
				
				return $key;
			},
			$pattern
		);
		
		$pattern	= \preg_quote( $pattern, '#' );
		$pats		= $this->patterns();
		foreach ( $place as $key => $m ) {
			
			[ $match, $name, $type, $opt ] = 
				$m + [ null, null, null, null ];
			
			$type		??= 'str';
			$opt		= ( '?' === $opt );
			
			$regex		= $pats[$type] ?? '[^/]+';
			$node		= "(?P<{$name}>{$regex})";
			
			$qkey		= \preg_quote( $key, '#' );
			$replace	= 
			\preg_match( '#/' . $qkey . '#', $pattern )  
				? ( $opt ? "(?:/{$node})?" : "/{$node}" )
				: ( $opt ? "(?:{$node})?" : "{$node}" );
			
			$pattern	= \str_replace( $key, $replace, $pattern );
		}
		
		return $pattern;
	}
	
	/**
	 *  Get the list of patterns from given route data
	 *  
	 *  @param array	$routes		Raw routes from configuration
	 *  @return array
	 */
	public function lookup( array $routes ) : array {
		$lookup	= [];
		foreach ( $routes as $route ) {
			if ( $route['name'] ) {
				$lookup[$route['name']] = $route;
			}
		}
		
		return $lookup;
	}
	
	/**
	 *  Reverse lookup the pattern from given route name while caching routes
	 *  
	 *  @param string	$name		Filtered route name lookup
	 *  @param array	$routes		Optional new list of routes
	 *  @return string
	 */
	private function url( string $name, array $params = [], ?array $routes = null ) : string {
		static $lookup;
		
		if ( null !== $routes || null === $lookup ) {
			$lookup = $this->lookup( $routes ?? $this->routes );
		}
		
		if ( !isset( $lookup[$name] ) ) {
			throw new 
			\RuntimeException( "Unknown route name: {$name}" );
		}
		
		$pattern = $lookup[$name]['pattern'];
		
		// Extract placeholders
		\preg_match_all( 
			'/\{(\w+)(?::(\w+))?\}(\?)?/', 
			$pattern, 
			$matches, 
			\PREG_SET_ORDER
		);
		
		foreach ( $matches as $m ) {
			[ $full, $key, $type, $opt ] = 
				$m + [ null, null, null, null ];
			
			$opt	= ( '?' === $opt );
			
			if ( \array_key_exists( $key, $params ) ) {
				// Replace placeholder with value
				$value		= $params[$key];
				$pattern	= \str_replace( $full, $value, $pattern );
			} else {
				if ( $opt ) {
					// Remove optional placeholder
					$pattern = \str_replace( $full, '', $pattern );
				} else {
					throw new 
					\RuntimeException( 
						"Missing required parameter: {$key}" 
					);
				}
			}
		}
		
		return $this->cleanup( $pattern );
	}
	
	/**
	 *  Basic pattern type converter
	 *  
	 *  @param string	$pattern	Raw pattern segment
	 *  @param array	$params		Passed down URL parameters to extend
	 *  @return array
	 */
	private function cast_param( string $pattern, array $params ) : array {
		\preg_match_all( 
			'/\{(\w+)(?::(\w+))?\}\??/', 
			$pattern, 
			$matches, 
			\PREG_SET_ORDER 
		);
		
		foreach ( $matches as $m ) {
			[ $match, $name, $type ]	= $m + [ null, null, null ];
			$type				??= 'str';
			
			if ( !\array_key_exists( $name, $params ) ) { continue; }
			
			$value				= $params[$name];
			$params[$name]			= 
			match( $type ) {
				'int'		=> ( int ) $value,
				'bool'		=> 
				\filter_var(
					$value, 
					\FILTER_VALIDATE_BOOL, 
					\FILTER_NULL_ON_FAILURE
				) ?? false,
				
				default		=> $value
			};
		}
		
		return $params;
	}
	
	private function handle( 
		callable|string		$handler, 
		string			$pattern, 
		array			$params 
	) : mixed {
		// Class based method via Class@method
		if ( \is_string( $handler ) && \str_contains( $handler, '@' ) ) {
			[ $class, $method ]	= \explode( '@', $handler );
			
			$instance = $this->container->get( $class );
			return $instance->$method( $this->cast_param( $pattern, $params ) );
		}
		
		// Class based method via [Class::class, method]
		if ( \is_array( $handler ) ) {
			[ $class, $method ] = $handler;
			
			$instance = $this->container->get( $class );
			return $instance->$method( $this->cast_param( $pattern, $params ) );
		}
		
		// Direct object callable
		if ( \is_string( $handler ) && \class_exists( $handler ) ) {
			$instance = $this->container->get( $handler );
			return $instance( $this->cast_param( $pattern, $params ) );
		}
		
		// Built-in
		if ( \is_string( $handler ) && \function_exists( $handler ) ) {
			$ref = new \ReflectionFunction( $handler );
			
			return $ref->getNumberOfParameters() === 0
				? $handler()
				: $handler( $this->cast_param( $pattern, $params ) );
		}
		
		// Closure type
		if ( \is_callable( $handler ) ) {
			return $handler( $this->cast_param( $pattern, $params ) );
		}
		
		throw new 
		\RuntimeException( 'Invalid route handler' );
	}
	
	// TODO
	private function middleware() : void {
		
	}
	
	public function dispatch( string $method, string $uri ) : void {
		$path	= \parse_url( $uri, \PHP_URL_PATH );
		$path	= \rtrim( $path, '/' ) ?: '/';
		
		foreach ( $this->routes as $route ) {
			if ( 0 !== \strcasecmp( $route['method'], $method ) ) { continue; }
			
			$pattern	= \rtrim( $route['pattern'], '/' );
			$regex		= '#^' . $this->compile( $pattern ) . '$#';
			if ( !\preg_match( $regex, $path, $m ) ) { continue; }
			
			$params		=
			\array_filter(
				$m,
				fn( $key ) => !\is_int( $key ),
				\ARRAY_FILTER_USE_KEY
			);

			foreach ( $route['middleware'] as $mw) {
				//$response = $mw( $request, $next );
			}
			$this->handle( $route['handler'], $pattern, $params );
			return;
		}
		
		// TODO: Send not found
	}
}


/**
 *  @class TODO: Future use
 */
#[Attribute( Attribute::TARGET_CLASS | Attribute::IS_REPEATABLE )]
class ServiceProvider {
	public function __construct(
		public readonly string	$abstract,
		public readonly string	$concrete
	) {}
}

/**
 *  @class TODO: Future use
 */
#[Attribute( Attribute::TARGET_CLASS | Attribute::IS_REPEATABLE )]
class PluginMiddleware {
	public function __construct(
		public readonly string|array $middleware
	) {}
}

/**
 *  @class Main plugin attribute
 */
#[Attribute( Attribute::TARGET_CLASS | Attribute::IS_REPEATABLE )]
class Plugin {
	public function __construct(
		public readonly	string		$name,
		public readonly string		$description	= '',
		public		int		$priority	= 0,
		public readonly Info		$info
	) {}
}

/**
 *  @class Find and load plugins
 */
final class PluginDiscovery {
	
	/**
	 *  @var array<string> Ignored classnames
	 */
	private			array	$skipped	= [];
	
	/**
	 *  @var array<string> Already loaded plugins
	 */
	private			array	$plugins	= [];
	
	/**
	 *  @var string Scan directory for plugin storage (from config)
	 */
	private readonly	string	$plugin_dir;
	
	/**
	 *  Discovery constructor
	 *  
	 *  @param Config	$config	Configuration settings
	 *  @param Log		$log	Event logger
	 *  @param Router	$router	Request path router
	 */
	public function __construct(
		public readonly Config	$config,
		public readonly Log	$logger,
		public readonly Router	$router
	) {
		$this->plugin_dir = $this->config->defaults( 'plugin_dir' );
	}
	
	public static function create( ?Container $container = null ) {
		$container	??= Container::instance();
		$logger		= $container->get( Log::class );
		$config		= $container->get( Config::class );
		$router		= $container->get( Router::class );
		
		return new static( $config, $logger, $router );
	}
	
	/**
	 *  Add plugin routes, if any
	 *  
	 *  @param array	$plugin		Discovered plugin route data
	 */
	private function routes( array $plugin ) {
		foreach ( $plugin['routes'] as $route ) {
			$this->router->add( [
				'pattern'	=> $route->pattern,
				'method'	=> $route->method,
				'handler'	=> $route->handler,
				'middleware'	=> $route->middleware
			] );
		}
	}
	
	public function discover( string $class ) : void {
		if ( isset( $this->skipped[$class] ) ) { return; }
		if ( !\class_exists( $class ) ) { 
			$this->skipped[$class] = true;
			return;
		}
		
		$ref	= new \ReflectionClass( $class );
		$attrs	= $ref->getAttributes( Plugin::class );
		
		// No plugin data to parse
		if ( !$attrs ) {
			$this->skipped[$class]	= true;
			return; 
		}
		
		$meta	= $attrs[0]->newInstance();
		$name	= Sanitize::spaces( Sanitize::escape_text( $meta->name ) );
		
		// Duplicate plugin name?
		if ( isset( $this->plugins[$name] ) ) {
			$this->logger->error( "Plugin {$name} already exists" );
			return;
		}
		
		// Names must be safe to use anywhere
		if ( 0 !== \strcmp( $name, $meta->name ) ) {
			$this->logger->error( "Invalid characters in plugin {$name}" );
			return;
		}
		
		// TODO: Limit to whitelist by 'plugins_enabled' setting in config
		
		$raw	= $ref->getAttributes( Info::class ) ?: null;
		$plugin	= [
			'class'		=> $class,
			'meta'		=> $meta,
			'info'		=> $raw ? $raw[0]->newInstance() : new Info(),
			'middleware'	=> [],
			'routes'	=> $this->router->discovery->discover( $class ),
			'providers'	=> []
		];

		// TODO: Needs a lot more work to be useful
		foreach ( $ref->getAttributes( PluginMiddleware::class ) as $attr ) {
			$plugin['middleware'][] = $attr->newInstance()->middleware;
		}
		
		// TODO: Ditto
		foreach ( $ref->getAttributes( ServiceProvider::class ) as $attr ) {
			$plugin['providers'][] = $attr->newInstance();
		}
		$this->plugins[$name] = $plugin;
	}
	
	public function classes( array $info ) : void {
		foreach ( $info as $class ) {
			$this->discover( $class['class'] );
		}
		
		\uasort(
			$this->plugins,
			fn( $a, $b ) => $a['meta']->priority <=> $b['meta']->priority
		);
	}
	
	/**
	 *  Load plugins from current script, optionally other folders
	 *  
	 *  @param bool		$explore	Branch into other folders, defaults to false
	 */
	public function autoload( bool $explore = false ) : void {
		// Preload locally declared plugins
		$this->classes( \get_declared_classes() );
		
		// Skip traversing directories
		if ( !$explore ) { return; }
		
		// Move on to directory classes
		$files		= Finder::in( $this->plugin_dir );
		$plugins	= 
		\array_filter(
			$files,
    			fn( $info ) => null !== $info['class']
		);
		$this->classes( $plugins );
	}
	
	/**
	 *  Initialize plugin system
	 *  
	 *  @param bool		$run	Autoload and initialize each plugin (default)
	 */
	public function init( bool $run = true ) : void {
		$this->autoload();
		
		// Load only?
		if ( !$run ) { return; }
		
		foreach ( $this->plugins as $plugin ) {
			$class	= $plugin['class'];
			$meta	= $plugin['meta'];
			$ref	= new \ReflectionClass( $class );
			
			try {
				$args	= [];
				$cstor	= $ref->getConstructor();
				$params	= $cstor->getParameters();
				
				foreach ( $params as $param ) {
					$type = $param->getType();
					$name = $param->getName();
					
					if ( $type && $type instanceof \ReflectionNamedType ) {
						$pname = $type->getName();
				
						$args[$name] = 
						match( $pname ) {
							Info::class		=> $plugin['info'],
							Plugin::class		=> $meta,
							Container::class	=> $this->container,
							default			=> null
						};
					}
				}
				
				// Pass on to plugin constructor
				$ref->newInstanceArgs( $args );
				
			} catch( \Throwable $e ) {
				$this->logger->error(
					"Plugin {$meta->name} failed initialization: " .
					$e->getMessage()
				);
			}
		}
	}
}


/**
 *  @class Database access
 */
final class Database extends Instance {
	
	/**
	 *  @var array<mixed> Saved database profiles
	 */
	private array $profiles		= [];
	
	/**
	 *  @var array<string, PDOStatement> Cache of prepared statements
	 */
	private array $stmt_cache	= [];
	
	/**
	 *  @var array<string, PDO> Running list of PDO connections
	 */
	private array $dbh		= [];
	
	/**
	 *  @var array<string> Limited list of supported databases
	 */
	public readonly array $supported;
	
	/**
	 *  @var int Maintenance frequency in number of days
	 */
	private int $maint;
	
	/**
	 *  Database constructor
	 *  
	 *  @param Config	Configuration settings
	 *  @param Log		Event logger
	 */
	public function __construct(
		public readonly Config	$config,
		public readonly Log	$logger
	) {
		$this->supported	= [ 'pgsql', 'sqlite', 'mysql' ];
		$this->maint		??= 
		\defined( 'DB_MAINT' ) 
			? \constant( 'DB_MAINT' )
			: 7;
	}
	
	public static function create( ?Container $container = null ) : static {
		$container	??= Container::instance();
		$logger		= $container->get( Log::class );
		$config		= $container->get( Config::class );
		
		return new static( $config, $logger );
	}
	
	/**
	 *  Helper to turn a range of input values into an IN() parameter
	 *  
	 *  @example Parameters for [value1, value2] become "IN (:paramIn_0, :paramIn_1)"
	 *  
	 *  @param array	$params		PDO Named parameters sent back
	 *  @param array	$vals		Keyed data
	 *  @param string	$prefix		SQL Prepended fragment prefix
	 *  @param string	$prefix		SQL Appended fragment suffix
	 *  @return string
	 */
	public static function params_in( 
		array		&$params, 
		array		$vals, 
		string		$prefix		= 'IN (', 
		string		$suffix		= ')'
	) : string {
		$i =	0;
		foreach ( $vals as $idx => $value ) {
			$key		= ":param_{$i}";
			$params[$key]	= $value;
			$i++;
		}
		return $prefix . \implode( ',', \array_keys( $params ) ) . $suffix;
	}
	
	/**
	 *  Helper to populate optional parameters with equivalent named parameters
	 *  
	 *  @param array	$params		Key-value pairs with keys matching table field names
	 *  @param bool		$is_insert	Format as insert if true
	 *  @return string
	 */
	public static function params_sql( array $params, bool $is_insert ) : string {
		$sql	= '';
	
		// Skip null properties
		$params	= \array_filter( $params, fn( $v ) => !\is_null( $v ) );
		
		// Insert mode
		if ( $is_insert ) {
			$sql .= '( ';
			foreach( $params as $k => $v ) {
				$sql .= "{$k}, ";
			}
			$sql = \trim( $sql, ', ' ) . ' ) VALUES ( ';
			foreach( $params as $k => $v ) {
				$sql .= ":{$k}, ";
			}
			return \trim( $sql, ', ' ) . ' )';
		}
		
		// Update mode
		foreach( $params as $k => $v ) {
			$sql .= "{$k} = :{$k}, ";
		}
		
		return \trim( $sql, ', ' );
	}
	
	/**
	 *  Get or create cached PDO Statements
	 *  
	 *  @param PDO		$dbh	Database connection
	 *  @param string	$sql	Query string or statement
	 *  @return mixed
	 */
	public function statement( ?\PDO $dbh, string $sql ) {
		if ( empty( $dbh ) && empty( $sql ) ) {
			\array_map( 
				static function( $v ) { return null; }, 
				$this->stmt_cache
			);
			return null;
		}
		
		$key = \hash( 'sha1', \spl_object_id( $dbh ) . ':' . $sql );
		
		if ( isset( $this->stmt_cache[$key] ) ) {
			return $this->stmt_cache[$key];
		}
		
		try {
			$stmt			= $dbh->prepare( $sql );
			$this->stmt_cache[$key]	= $stmt;
			return $stmt;
			
		} catch ( \PDOException $e ) {
			$this->logger->error( 
				"Failed to prepare statement with {$sql}: {$e->getMessage()}" 
			);
			
			throw new 
			\RuntimeException( "Database statement preparation failed" );
		}
	}
	
	/**
	 *  Execute prepared statement
	 *  
	 *  @param PDOStatement		$stmt		Prepared statement
	 *  @param array		$params		Any prepared values in [':param' => value ] format
	 *  @param string		$context	Execution context data
	 *  @return bool				True on success
	 */
	public function exec_stmt( \PDOStatement $stmt, array $params, string $context ) : bool {
		try {
			$result = 
			count( $params ) > 0
				? $stmt->execute( $params ) 
				: $stmt->execute();
			
			$this->logger->debug( $context );
			return $result;
			
		} catch( \Throwable $e ) {
			$trace	= \debug_backtrace();
			$func	= $trace[1]['function']		?? 'global scope';
			$file	= $trace[1]['file']		?? 'unknown file';
			$line	= $trace[1]['line']		?? 'unknown line';
			$this->logger->error(
				"Error in exec_stmt: {$context} — {$e->getMessage()} " .
				"called by {$func} on line {$line} in {$file}"
			);
			
			throw new 
			\RuntimeException( "Error executing PDO statement" );
		}
		
		return false;
	}
	
	/**
	 *  Execute larger SQL statements
	 *  
	 *  @param PDO		$dbh		PDO Database handle
	 *  @param string	$sql		SQL statement block
	 *  @param string	$context	Execution metadata info
	 *  @return bool
	 */
	public function exec_batch( \PDO $dbh, string $sql, string $context = 'Batch SQL' ) : bool {
		if ( empty( trim( $sql ) ) ) {
			$this->logger->warn( "Empty SQL passed to exec_batch" );
			return false;
		}
		
		try {
			$dbh->beginTransaction();
			$dbh->exec( $sql );
			$dbh->commit();
			$this->logger->debug( $context );
			return true;
	
		} catch ( \PDOException $e ) {
			$dbh->rollBack();
			
			$this->logger->error( 
				"Batch execution failed for SQL " . 
					\mb_substr( $sql, 0, 100 ) . 
					": {$e->getMessage()}"
			);
			
			throw new 
			\RuntimeException( "Error executing PDO statement" );
		}
		
		return false;
	}
	
	/**
	 *  Get PDO attribute info from given handle
	 *  
	 *  @param PDO		$dbh		PDO Database handle
	 *  @param int		$attribute	PDO attribute constant
	 *  @param mixed	$default	Optional default value
	 *  @return mixed
	 */
	private function get_property( \PDO $dbh, int $attribute, $default = null ) : mixed {
		try {
			$value = $dbh->getAttribute( $attribute );
			return ( false !== $value && null !== $value ) ? $value : $default;
			
		} catch ( \PDOException $e ) {
			$this->logger->warn( "Failed to get PDO attribute {$attribute}: {$e->getMessage()}" );
			return $default;
		}
	}
	
	/**
	 *  Try to get current PDO database driver name, defaults to 'unknown'
	 *  
	 *  @param PDO		$dbh		PDO Database handle
	 *  @return string
	 */
	public function get_driver( \PDO $dbh ) : string {
		$driver = $this->get_property( $dbh, \PDO::ATTR_DRIVER_NAME );
		if ( null === $driver ) {
			$this->logger->warn( "Unable to determine DB driver" );
			return 'unknown';
		}
		
		if ( !\in_array( $driver, $this->supported, true ) ) {
			$this->logger->warn( "Unsupported DB driver: {$driver}" );
		}
		
		return \strtolower( $driver );
	}
	
	/**
	 *  SQL Timestamps format helper for comparisons
	 *  
	 *  @param PDO		$dbh		PDO Database handle
	 *  @return string
	 */
	public function now_unix( \PDO $dbh, ?string $column = null ) : string {
		$driver	= $this->get_driver( $dbh );
		$column	??= 'now';
		$column	= \preg_replace( '/^[\w_]/', '', $column );
		
		return match( $driver ) {
			'sqlite'		=> "strftime( '%s','now' )",
			'mysql','pgsql'		=> "UNIX_TIMESTAMP()",
			//'sqlsrv'		=> "DATEDIFF(second, '1970-01-01', GETUTCDATE())"
			default			=> 
				throw new 
				\RuntimeException( "Unsupported DB driver: {$driver}" )
		};
	}
	
	/**
	 *  SQL Datetime format helper
	 *  
	 *  @param PDO		$dbh		PDO Database handle
	 *  @return string
	 */
	public function now_datetime( \PDO $dbh ) : string {
		$driver = $this->get_driver( $dbh );
		return match( $driver ) {
			'sqlite'		=> "datetime( 'now' )",
			'mysql','pgsql'		=> "NOW()",
			//'sqlsrv'		=> "GETUTCDATE()",
			default			=> 
				throw new 
				\RuntimeException( "Unsupported DB driver: {$driver}" )
		};
	}
	
	public function now_value( \PDO $dbh ) : string {
		$stmt = $dbh->query( "SELECT " . $this->now_datetime( $dbh ) );
		return $stmt ? $stmt->fetchColumn() : '';
	}
	
	public function sql_now_diff( \PDO $dbh, string $column = 'last_run' ) : string {
		$now	= $this->now_unix( $dbh );
		return \sprintf( "%s - %s", $now, $column );
	}
	
	/**
	 *  Database profile settings from config JSON file
	 *  
	 *  @param PDO		$dbh		PDO Database handle
	 *  @param string	$profile	Database profile in config
	 *  @return array
	 */
	public function dbh_profile( \PDO $dbh, string $profile = 'main' ) : array {
		static $cache;
	
		// Load saved profile config
		$cache ??= $this->config->setting( 'db_profiles', [], 'json' );
		
		$config = $cache[$profile] ?? null;
		if ( !$config ) {
			$this->logger->error( "Unknown DB profile: {$profile}" );
			
			throw new 
			\InvalidArgumentException( "Unknown DB profile" );
		}
		
		// Gather connection metadata
		return [
			'profile'		=> $profile,
			'driver'		=> $this->get_driver( $dbh ),
			
			'server_version'	=> 
			$this->get_property( $dbh, \PDO::ATTR_SERVER_VERSION, 'unknown' ),
			
			'client_version'	=> 
			$this->get_property( $dbh, \PDO::ATTR_CLIENT_VERSION, 'unknown' ),
			
			'dsn'			=> $config['dsn']		?? null,
			'username'		=> $config['username']		?? null,
			'installed'		=> $config['installed'] 	?? false,
			'schema'		=> $config['schema']		?? null,
			'version'		=> $config['version']		?? null,
			'migrations'		=> $config['migrations']	?? null,
			'pre_exec'		=> $config['pre_exec']		?? [],
			'post_exec'		=> $config['post_exec']		?? []
		];
	}
	
	/**
	 *  PDO Connection attribute options
	 *  
	 *  @param array	$settings	Presets config settings
	 *  @return array
	 */
	private function get_options( array $settings ) : array {
		static $definitions	= [
			'ATTR_TIMEOUT'			=> \PDO::ATTR_TIMEOUT,
			'ATTR_DEFAULT_FETCH_MODE'	=> \PDO::ATTR_DEFAULT_FETCH_MODE,
			'ATTR_PERSISTENT'		=> \PDO::ATTR_PERSISTENT,
			'ATTR_EMULATE_PREPARES'		=> \PDO::ATTR_EMULATE_PREPARES,
			'ATTR_ERRMODE'			=> \PDO::ATTR_ERRMODE,
			'ATTR_CASE'			=> \PDO::ATTR_CASE,
			'ATTR_STRINGIFY_FETCHES'	=> \PDO::ATTR_STRINGIFY_FETCHES,
			'FETCH_ASSOC'			=> \PDO::FETCH_ASSOC,
			'ERRMODE_EXCEPTION'		=> \PDO::ERRMODE_EXCEPTION
		];
		
		if ( empty( $settings ) ) {
			// Set some basic defaults
			return [
				\PDO::ATTR_DEFAULT_FETCH_MODE	=> \PDO::FETCH_ASSOC,
				\PDO::ATTR_PERSISTENT		=> false,
				\PDO::ATTR_EMULATE_PREPARES	=> false,
				\PDO::ATTR_ERRMODE		=> \PDO::ERRMODE_EXCEPTION
			];
		}
		
		$options	= [];
		foreach ( $settings as $key => $value ) {
			if ( !isset( $definitions[$key] ) ) {
				continue;
			}
			
			$options[$definitions[$key]] = $definitions[$value] ?? $value;
		}
		return $options;
	}
	
	/**
	 *  Batch execute .sql file based on current database schema version
	 *  
	 *  @param PDO		$dbh		Database connection
	 *  @param string	$schema		Database installation schema file
	 *  @param string	$ver		Schema version
	 */
	private function batch_schema(
		\PDO		$dbh,
		string		$schema,
		string		$ver,
		string		$comment	= 'Database initialization with base tables',
		?string		$sql_file	= null
	) : void {
		static $sql	= 
		"INSERT INTO schema_meta ( version, comments, created_at )
			VALUES ( :version, :comment, CURRENT_TIMESTAMP )";
		
		$info		= \pathinfo( $schema );
		$sql_file	??= $info['dirname'] . '/' . $info['filename'] . '.sql';
		$sql_file	= \realpath( $sql_file );
		
		if ( !$sql_file || !\is_readable( $sql_file ) ) {
			$this->logger->error(
				"Invalid schema file: {$sql_file} for database: {$schema}"
			);
			
			throw new 
			\RuntimeException( "Invalid schema file for database" );
		}
		
		$found		= false;
		for ( $i = 0; $i < 3; $i++ ) { // Adapt to momentary IO glitches
			try {
				$found		= @\file_get_contents( $sql_file );
				if ( false !== $found ) { break; }
				
			} catch ( \Throwable $e ) {
				$this->logger->error(
					"Error getting SQL data from {$sql_file}. Retrying"
				);
				
				\usleep( 100000 );
				continue;
			}
		}
	
		// No schema file found
		if ( false === $found ) {
			$this->logger->error( "Failed to read schema file: {$sql_file}" );
			
			throw new
			\RuntimeException( "Unable to load schema file" );
		}
	
		// Nothing in schema file
		if ( empty( \trim( $found ) ) ) {
			$this->logger->error( "Schema file is empty: {$sql_file}" );
			
			throw new 
			\RuntimeException( "Schema file is empty" );
		}
		
		try {
			$dbh->beginTransaction();
			$dbh->exec( $found );
	
			// Only insert metadata if meta table is found
			if ( false !== \stripos( $found, 'create table schema_meta' ) ) {
				$this->exec_stmt( $this->statement( $dbh, $sql ), [
					':version'	=> $ver,
					':comment'	=> $comment
				], "Schema file {$sql_file}" );
			}
			
			$dbh->commit();
			
		} catch( \Throwable $e ) {
			$dbh->rollBack();
			$this->logger->error(
				"Error loading database schema file: {$sql_file} " .
				$e->getMessage() 
			);
	
			throw new 
			\RuntimeException( "Error loading database schema file" );
		}
	}
	
	/**
	 *  Database schema migration helper
	 *  
	 *  @param string $mi_dir Migration schema file location
	 *  @return iterable
	 */
	public function get_migrations( string $mi_dir ) : iterable {
		// No migrations set
		if ( !\is_dir( $mi_dir ) ) {
			$this->logger->debug( "Called get_migrations() with no migrations directory" );
			return [];
		}
		
		// Get all .sql files
		$files = \glob( $mi_dir . '/*.sql' );
		if ( !$files ) {
			$this->logger->debug( "No migration files found in {$mi_dir}" );
			return [];
		}
		
		// Extract version from filename
		foreach ( $files as $file ) {
			if ( \preg_match(
				'/(\d+\.\d+\.\d+(?:-[\w.-]+)?(?:\+[\w.-]+)?)/',
					$file, $match
			) ) {
				yield [ 'file' => $file, 'version' => $match[1] ];
			} else {
				$this->logger->debug(
					"Skipping file with no valid version: {$file} in {$mi_dir}"
				);
			}
		}
	}
	
	/**
	 *  Automatic database schema upgrades
	 *  
	 *  @param PDO		$dbh	Database connection
	 */
	private function migrate( \PDO $dbh, string $profile ) : void {
		// Get current schema version
		$curr_ver	= $dbh
			->query( "SELECT version FROM schema_meta ORDER BY created_at DESC LIMIT 1" )
			->fetchColumn() ?? '0.0.0';
		
		$mi_dir		= Storage::base() . '/migrations/' . $profile;
		$found		= $this->get_migrations( $mi_dir );
		$migrations	= [];
		foreach ( $found as $m ) {
			if ( \version_compare( $m['version'], $curr_ver ) <= 0 ) {
				$this->logger->debug(
					"Skipping migration {$m['version']} (current version is newer)"
				);
				continue;
			}
			$migrations[] = $m;
		}
		
		usort( $migrations, fn( $a, $b ) => 
			\version_compare( $a['version'], $b['version'] ) );
		
		// Apply migrations
		foreach ( $migrations as $m ) {
			try {
				$this->batch_schema( $dbh, $m['file'], $m['version'], "Applied migration from {$m['file']}" );
				$this->logger->info( "Migration {$m['version']} applied successfully" );
				
			} catch ( \Throwable $e ) {
				$this->logger->error( "Migration {$m['version']} from {$m['file']} failed: {$e->getMessage()}" );
				
				throw new 
				\RuntimeException( "Migration failed: {$m['version']}" );
			}
		}
	}
	
	/**
	 *  Run maintenance on selected database
	 *  
	 *  @param PDO		$dbh	Database connection
	 *  @param array 	$config	Maintenance settings
	 */
	private function maintenance( \PDO $dbh, array $config ) : void {
		static $sql	= 
		"SELECT settings FROM maintenance_meta
			WHERE id = ( SELECT MAX( id ) FROM maintenance_meta );";
		
		$maint		= $this->maint * 86400;
		$settings	= $dbh->query( $sql )->fetchColumn();
		
		if ( false === $settings ) {
			$this->logger->info( "No database maintenance settings found" );
			$settings	= '{ "last_maintenance" : 0 }'; // Fallback
		}
		
		// Since PHP 8.3
		if ( !\json_validate( $settings ) ) {
			$this->logger->error( "Error decoding maintenance settings" );
			return;
		}
		
		$info	= \json_decode( $settings, true );
		if ( false === $info || !\is_array( $info ) ) {
			$this->logger->error( "Invalid JSON in maintenance settings" );
			return;
		}
		
		$last_maint	= $info['last_maintenance'] ?? 0;
		$now		= time();
		
		// Skip if not needed
		if ( ( $now - $last_maint ) < $maint ) {
			$this->logger->debug( "Maintenance not required yet" );
			return;
		}
		
		$commands	= $config['maint_exec'] ?? [];
		if ( !\is_array( $commands ) || empty( $commands ) ) {
			$this->logger->warn( "No maintenance commands configured" );
			return;
		}
		
		foreach ( $commands as $cmd ) {
			try {
				$dbh->exec( $cmd );
				$this->logger->info( "Executed maintenance command: {$cmd}" );
			} catch ( \PDOException $e ) {
				$this->logger->error( "Maintenance command failed: {$cmd} — {$e->getMessage()}" );
			}
		}
		
		$new_settings	= \json_encode( [ 'last_maintenance' => $now ] );
		$insert_sql	=
		"INSERT INTO maintenance_meta ( settings )
			VALUES ( :settings )";
		
		$this->exec_stmt( $this->statement( $dbh, $insert_sql ), [
			':settings' => $new_settings
		], "Initiating database maintenance" );
		
		$this->logger->info( "Database maintenance completed" );
	}
	
	/**
	 *  Run callable with PDO transaction
	 *  
	 *  @param PDO		$dbh	Database connection
	 *  @param callable	$fn	Execution handler
	 *  @return mixed
	 */
	public function with_transaction( \PDO $dbh, callable $fn ) : mixed {
		try {
			$dbh->beginTransaction();
			$result	= $fn( $dbh );
			$dbh->commit();
			
			return $result;
			
		} catch ( \Throwable $e ) {
			if ( $dbh->inTransaction() ) {
				$dbh->rollBack();
			}
			
			$this->logger->error( "Error completing transaction via callable" );
			return false;
		}
	}
	
	/**
	 *  Create config profile-based PDO database connection
	 *  
	 *  @param string	$profile	Connection profile label in configuration
	 *  @param array	$new_profiles	Override connection profile
	 *  @return PDO
	 */
	public function get( string $profile = 'main', ?array $new_profiles = null ) : \PDO {
		if ( isset( $this->dbh[$profile] ) ) {
			return $this->dbh[$profile];
		}
		
		// Saved db profiles
		$this->profiles	??= $this->config->setting( 'db_profiles' );
		if ( !empty( $new_profiles ) ) {
			$this->profiles	= 
			\array_replace_recursive( $this->profiles, $new_profiles );
		}
		
		$config		= $this->profiles[$profile] ?? null;
		if ( null === $config ) {
			throw new 
			\InvalidArgumentException( "Unknown DB profile: {$profile}" );
		}
		
		$installed	= ( bool ) ( $config['installed'] ?? false );
		
		try {
			// Create a new PDO instance
			$dbh = new \PDO(
				$config['dsn'], 
				$config['username'], 
				$config['password'], 
				$this->get_options( $config['options'] ?? [] ) 
			);
			
			foreach ( $config['pre_exec'] ?? [] as $cmd ) {
				$dbh->exec( $cmd );
			}
			
			// Check if install scripts need to be run
			if ( !$installed ) {
				foreach ( $config['init_exec'] ?? [] as $cmd ) {
					$dbh->exec( $cmd );
				}
				
				$this->batch_schema(
					$dbh, 
					$config['schema'], 
					$config['version'] ?? '1.0.0' 
				);
				
				// Database is now setup
				$config['installed'] = true;
				
				// Save changes to this profile
				$this->config->edit_db_profile( $profile, $config );
				$this->profiles[$profile] = $config;
				
			// Or run migrations instead
			} else {
				$this->migrate( $dbh, $config['migrations'] ?? [] );
			}
			
			foreach ( $config['post_exec'] ?? [] as $cmd ) {
				$dbh->exec( $cmd );
			}
			
			// Check and run maintenance
			$this->maintenance( $dbh, $config );
		} catch ( \PDOException $e ) {
			// Handle connection errors gracefully
			$this->logger->error( "Database connection failed: {$e->getMessage()}" );
			
			die( 'Unable to connect to database' );
		}
		
		$this->dbh[$profile] = $dbh;
		return $dbh;
	}
	
	/**
	 *  Helper to get the result from a successful statement execution
	 *  
	 *  @param PDO		$dbh	Database connection
	 *  @param PDOStatement	$stmt	PDO prepared statement
	 *  @param array	$params	Parameters
	 *  @param string	$rtype	Return type
	 *  @return mixed
	 */
	public function result(
		\PDO		$dbh,
		\PDOStatement	$stmt,
		array		$params		= [],
		string		$rtype		= ''
	) : mixed {
		$ok	= 
		$this->exec_stmt( 
			$stmt, $params, "Running result() with return type {$rtype}" 
		);
		
		if ( !$ok ) { return null; }
		
		return match( \strtolower( $rtype ) ) {
			// Query with array return
			'results'	=> $ok ? $stmt->fetchAll() : [], 
			
			// Insert with ID return
			'insert'	=> $ok ? $dbh->lastInsertId() : 0, 
			
			// Single column value
			'column'	=> $ok ? $stmt->fetchColumn() : '', 
			
			// Success status
			default		=> $ok
		};
	}
	
	/**
	 *  Shared data execution routine
	 *  
	 *  @param string	$sql		Database SQL
	 *  @param string	$profile	Connection profile label in configuration
	 *  @param array	$params		Parameters
	 *  @param string	$rtype		Return type
	 *  @return mixed
	 */
	public function result_exec(
		string	$sql,
		string	$profile,
		array	$params		= [],
		string	$rtype		= ''
	) : mixed {
		$dbh	= $this->get( $profile );
		$stmt	= $this->statement( $dbh, $sql );
		$res	= $this->result( $dbh, $stmt, $params, $rtype );
		
		$stmt->closeCursor();
		return $res;
	}
	
	/**
	 *  Update or insert multiple database rows at once with single SQL
	 *  
	 *  @param string	$sql		Database SQL
	 *  @param string	$profile	Connection profile label in configuration
	 *  @param array	$batch		Collection of query parameters
	 *  @param string	$rtype		Return type
	 *  @return array			Result status
	 */
	public function batch_result_exec(
		string	$sql,
		string	$profile,
		array	$batch		= [],
		string	$rtype		= ''
	) : array {
		$dbh	= $this->get( $profile );
		$stmt	= $this->statement( $dbh, $sql );
		
		return $this->with_transaction( $dbh, function( \PDO $dbh ) use ( $stmt, $batch, $rtype ) {
			$res	= [];
			
			foreach( $batch as $params ) {
				$status	= $this->result( $dbh, $stmt, $params, $rtype );
				if ( null === $status ) {
					$stmt->closeCursor();
					break;
				}
				
				$res[]	= $status;
				$stmt->closeCursor();
			}
			return $res;
		} );
	}
	
	/**
	 *  Insert record into database and return last ID
	 *  
	 *  @param string	$sql		Database SQL insert
	 *  @param string	$profile	Connection profile label in configuration
	 *  @param array	$params		Parameters
	 *  @return int
	 */
	public function insert(
		string	$sql,
		string	$profile,
		array	$params
	) : int {
		$res	= $this->result_exec( $sql, $profile, $params );
		return empty( $res ) 
			? 0
			: ( \is_numeric( $res ) ? ( int ) $res : 0 );
	}
	
	/**
	 *  Create database update
	 *  
	 *  @param string	$sql		Database SQL update query
	 *  @param string	$profile	Connection profile label in configuration
	 *  @param array	$params		Query parameters (required)
	 *  @return bool			Update status
	 */
	public function update(
		string	$sql,
		string	$profile,
		array	$params		= []
	) : bool {
		return empty( $this->result_exec( $sql, $profile, $params ) ) 
			? false : true;
	}
}


/**
 *  @class Session management
 */
class Sessions extends Instance {
	
	/**
	 *  Session constructor
	 *  
	 *  @param Config	$config		Main configuration
	 *  @param Log		$logger		Status logger
	 *  @param Database	$data		Persistent storage
	 *  @param Request	$request	Current client HTTP request
	 */
	public function __construct(
		public readonly	Config		$config,
		public readonly	Log		$logger,
		public readonly	Database	$data,
		public readonly	Request		$request
	) {}
	
	public static function create( ?Container $container = null ) : static {
		$container	??= Container::instance();
		$logger		= $container->get( Log::class );
		$config		= $container->get( Config::class );
		$request	= $container->get( Request::class );
		$data		= $container->get( Database::class );
		
		return new static( $config, $logger, $data, $request );
	}
	
	/**
	 *  Does nothing
	 */
	public function open( $save_path, $session_name ) { return true; }
	public function close() { return true; }
	
	/**
	 *  Create session ID
	 *  
	 *  @return string
	 */
	public function create_id() { return \bin2hex( \random_bytes( 32 ) ); }
	
	/**
	 *  Validate session ID
	 *  
	 *  @param string	$session_id	Unique identifier
	 *  @return bool
	 */
	public function validate_id( $session_id ) {
		return \preg_match( '/^[a-f0-9]{64}$/', $session_id ) === 1;
	}
	
	/**
	 *  Read session data by ID
	 *  
	 *  @param string	$session_id	Unique identifier
	 *  @return string
	 */
	public function read( $session_id ) {
		$dbh	= $this->data->get( 'sessions' );
		$stmt	= 
		$dbh->prepare(
		"SELECT session_data FROM sessions
			WHERE session_id = :id
			AND ( expires_at IS NULL OR expires_at > CURRENT_TIMESTAMP )
			LIMIT 1"
		);
		
		$stmt->execute( [ ':id' => $session_id ] );
		$row	= $stmt->fetch( \PDO::FETCH_ASSOC );
		
		return $row ? $row['session_data'] : '';
	}
	
	/**
	 *  Store session data
	 *  
	 *  @param string	$session_id	Unique identifier
	 *  @param string	$data		Session information
	 *  @return bool
	 */
	public function write( $session_id, $data ) {
		$dbh	= $this->data->get( 'sessions' );
		
		return $this->data->with_transaction( 
				$dbh, function( \PDO $dbh ) 
					use ( $session_id, $data ) {
			$stmt	= 
			$dbh->prepare(
				"INSERT INTO sessions (
					basename, session_id, session_ip,
					session_data, expires_at
				)
				VALUES (
					:basename, :id, :ip, :data,
						DATETIME( 'now', '+1 hour' )
				) ON CONFLICT( basename, session_id )
				DO UPDATE SET
					session_data	= excluded.session_data,
					session_ip	= excluded.session_ip,
					expires_at	= excluded.expires_at"
			);
			
			$host	= 
			\idn_to_ascii( 
				$this->request->host, 
				\IDNA_DEFAULT, 
				\INTL_IDNA_VARIANT_UTS46 
			);
			
			return $stmt->execute( [
				':basename'	=> Text::lowercase( $host ),
				':id'		=> $session_id,
				':ip'		=> $this->request->ip( true ),
				':data'		=> $data
			] );
		} );
	}
	
	/**
	 *  Delete session
	 *  
	 *  @param string	$session_id	Unique identifier
	 *  @return bool
	 */
	public function destroy( $session_id ) {
		$dbh	= $this->data->get( 'sessions' );
		return $this->data->with_transaction( 
				$dbh, function( \PDO $dbh ) 
					use ( $session_id ) {
			$stmt	=
			$dbh->prepare( "DELETE FROM sessions WHERE session_id = :id" );
			
			return $stmt->execute( [ ':id' => $session_id ] );
		} );
	}
	
	/**
	 *  Session garbage collection
	 *  
	 *  @param int		$maxlifetime	Unused maximum TTL
	 *  @return bool
	 */
	public function gc( $maxlifetime ) {
		$dbh	= $this->data->get( 'sessions' );
		
		return $this->data->with_transaction( $dbh, function( \PDO $dbh ) {
			return $dbh->exec(
				"DELETE FROM sessions
					WHERE expires_at IS NOT NULL
					AND expires_at <= CURRENT_TIMESTAMP"
			);
		} );
	}
	
	/**
	 *  Update session data with timestamp
	 *  
	 *  @param string	$session_id	Unique identifier
	 *  @return bool
	 */
	public function update_timestamp( $session_id, $data ) {
		$dbh	= $this->data->get( 'sessions' );
	
		return $this->data->with_transaction( 
				$dbh, function( \PDO $dbh ) 
					use ( $session_id, $data ) {
			$stmt	=
			$dbh->prepare( 
			"UPDATE sessions
				SET expires_at = DATETIME('now', '+1 hour'), 
				data = :data
				WHERE session_id = :id"
			);
			
			return $stmt->execute( [ 
				':id'	=> $session_id, 
				':data'	=> $data
			] );
		} );
	}
	
	/**
	 *  Turn off all session activity
	 */
	public function off() : void {
		if ( \session_status() === \PHP_SESSION_ACTIVE ) {
			\session_unset();
			\session_destroy();
			\session_write_close();
		}
	}
	
	/**
	 *  Set session handler functions and initiate
	 */
	public function init() : void {
		static $start;
		static $params;
		
		$params	??= 
		\session_set_cookie_params( [
			'httponly'	=> true, 
			'secure'	=> $this->request->is_tls, 
			'samesite'	=> 'Strict', 
			'path'		=> $this->config->setting( 'cookie_path', '/' ), 
		] );
		
		$start	??= 
		\session_set_save_handler( 
			[ $this, 'open' ], 
			[ $this, 'close' ], 
			[ $this, 'read' ], 
			[ $this, 'write' ], 
			[ $this, 'destroy' ], 
			[ $this, 'gc' ], 
			[ $this, 'create_id' ], 
			[ $this, 'validate_id' ], 
			[ $this, 'update_timestamp' ] 
		);
		
		if ( \session_status() === \PHP_SESSION_NONE ) {
			if ( \headers_sent( $file, $line ) ) {
				$this->logger->error( 
					"Cannot start session: headers already sent by {$file} on line {$line}"
				);
				
				throw new 
				\RuntimeException( "Session start failed due to headers already sent" );
			}
			
			try {
				if ( !\session_start() ) { // Something else went wrong
					$this->logger->error( "Session failed to start" );
					
					throw new 
					\RuntimeException( "Session start failed" );
				}
				
				$this->logger->debug( "Session started: " . \session_id() );
				
			} catch ( \Throwable $e ) {
				$this->logger->error( "Session error: {$e->getMessage()}" );
				Errors::end_page( 500 );
			}
		}
		
		$exp	= time() + ( int ) $this->config->setting( 'session_regen', 1800 );
		if ( !isset( $_SESSION['session_regen'] ) ) {
			$_SESSION['session_regen'] = $exp;
			return;
		}
		
		if ( time() > ( int ) $_SESSION['session_regen'] ) {
			\session_regenerate_id( true );
			$_SESSION['session_regen'] = $exp;
		}
	}
}


/**
 *  @class Form validation
 */
class Forms extends Instance {
	
	private array $keys	= [];
	
	/**
	 *  Form base constructor
	 *  
	 *  @param Sessions	Current user session
	 *  @param Config	Configuration settings
	 *  @param Log		Event logger
	 */
	public function __construct( 
		public readonly Config		$config,
		public readonly Log		$logger,
		public readonly Sessions	$session
	) {}

	public static function create( ?Container $container = null ) : static {
		$container	??= Container::instance();
		$logger		= $container->get( Log::class );
		$config		= $container->get( Config::class );
		$sessions	= $container->get( Sessions::class );
		
		return new static( $config, $logger, $sessions );
	}
	
	/**
	 *  Generate unique form ID from name
	 *  
	 *  @param string	$form_name	Form label
	 *  @param bool		$use_id		Use session ID, if true
	 *  @return string
	 */
	public function session_key( string $form_name, bool $use_id = false ) : string {
		if ( isset( $this->keys[$form_name] ) ) { 
			return $this->keys[$form_name]; 
		}
		
		$this->session->init();
		$phrase		= 
		$use_id 
			? $form_name . \session_id()
			: $form_name;
		
		$this->keys[$form_name]	= \hash( 'sha1', $phrase );
		return $this->keys[$form_name];
	}
	
	/**
	 *  Get anti-CSRF token pair from form submission
	 *  
	 *  @param string	$method		Request method
	 *  @return array
	 */
	public function get_token( string $method = 'post' ) : array {
		static $filter	= [
			'nonce'		=> \FILTER_SANITIZE_FULL_SPECIAL_CHARS, 
			'token'		=> \FILTER_SANITIZE_FULL_SPECIAL_CHARS 
		];
		
		// Limit to get or post
		$input	= 'get' === \strtolower( $method ) ? \INPUT_GET : \INPUT_POST;
		return \filter_input_array( $input, $filter, true ) ?? [];
	}
	
	/**
	 *  Generate anti-CSRF token/nonce pair with tokenized options
	 *  
	 *  @param string	$form_name	Form label
	 *  @param string	$method		Request method
	 *  @param array	$options	Optional default options
	 *  @return array
	 */
	public function set_token( 
		string	$form_name,
		string	$method,
		?array	$options	= null
	) : array {
		$default_ttl	 	= 
		$this->config->setting( 'form_ttl', 86400, 'int' );
		
		// Defaults
		$options		??= [
			'allow_upload'	=> false,	// Allow file uploads ( plugins )
			'allow_patch'	=> false,	// Enable PATCH method ( plugins )
			'issued'	=> \time(),	// Form generated
			'once'		=> false,	// Only allow one validation
			'use_id'	=> false,	// Use session id
			
			// Expiration
			'ttl'		=> 
			$this->config->setting( $form_name . '_ttl', $default_ttl, 'int' ),
			
			// Session stored value
			'secret'	=> \bin2hex( \random_bytes( 32 ) )
		];
		
		$options['secret']	??= \bin2hex( \random_bytes( 32 ) );
		
		$use_id	= ( bool ) ( $options['use_id'] ?? false );
		$key	= $this->session_key( $form_name, $use_id );
		$old	= $_SESSION["form_{$key}"] ?? []; // Old form options, if any
		
		// Reset options
		$data	= \array_merge( \is_array( $old ) ? $old : [], $options );
		
		$nonce	= \bin2hex( \random_bytes( 16 ) );	// Public value
		$token	= \hash_hmac( 'sha256', $nonce, $data['secret'] . $method );
		
		$_SESSION["form_{$key}"] = $data;
		
		return [ 
			'time'	=> time(), 
			'token'	=> $token, 
			'nonce'	=> $nonce
		];
	}
	
	/**
	 *  Validate token/nonce pair with form options
	 *  
	 *  @param string	$form_name	Form label
	 *  @param string	$method		Request method
	 *  @param string	$nonce		Sent nonce
	 *  @param string	$token		Sent token
	 *  @param int		$issued		Form issue timestamp
	 *  @param int		$ttl		Time to live
	 *  @param bool		$once		Only validate once if true
	 *  @return string
	 */
	public function token_validate(
		string	$form_name,
		string	$method,
		string	$nonce,
		string	$token,
		?int	$issued	= null,
		?int	$ttl	= null,
		?bool	$once	= null
	) : string {
		$issued		??= time();	// Now
		$ttl		??= 86400;	// 1 Day max
		$once		??= false;	// Allow repeat
		
		$key		= $this->session_key( $form_name );
		$meta		= ( array ) ( $_SESSION["form_{$key}"] ?? [] );
		
		// Find secret key or empty pad
		$missing	= ( empty( $meta ) || !isset( $meta['secret'] ) );
		$secret		= $missing ? \str_repeat( '0', 64 ) : $meta['secret'];
		
		$expected	= \hash_hmac( 'sha256', $nonce, $secret . $method );
		$valid		= \hash_equals( $expected, $token );
		
		// Don't repeat if once is set
		if ( $valid && $once ) {
			unset( $_SESSION["form_{$key}"] );
		}
		
		return match( true ) {
			$missing			=> 'missing', 
			( time() - $issued ) > $ttl	=> 'expired', 
			$valid				=> 'ok', 
			default				=> 'failed'
		};
	}
	
	/**
	 *  Form validation wrapper
	 *  
	 *  @param string	$form_name	Form label
	 *  @param string	$method		Request method
	 *  @param string	$nonce		Sent nonce
	 *  @param string	$token		Sent token
	 *  @return array
	 */
	public function form_validate(
		string	$form_name,
		string	$method,
		string	$nonce,
		string	$token,
		array	$required	= []
	) : array {
		
		$key		= $this->session_key( $form_name );
		$meta		= ( array ) ( $_SESSION["form_{$key}"] ?? [] );
		
		$meta['issued']	??= null;
		$meta['ttl']	??= null;
		$meta['once']	??= null;
		
		$status		= 
		$this->token_validate( 
			form_name	: $form_name, 
			method		: $method, 
			nonce		: $nonce, 
			token		: $token, 
			issued		: $meta['issued'], 
			ttl		: $meta['ttl'], 
			once		: $meta['once']
		);
		
		if ( $status !== 'ok' ) {
			$this->logger->debug( "Form {$form_name} token validation failed" );
			return [
				'valid'		=> false, 
				'status'	=> $status, 
				'message'	=> "Token validation failed: {$status}"
			];
		}
		
		$this->logger->debug( "Form {$form_name} capability check" );
		foreach ( $required as $capability ) {
			if ( empty( $meta[$capability] ) ) {
				$this->logger->debug( "Form {$form_name} capability {$capability} check failed" );
				return [
					'valid'		=> false, 
					'status'	=> 'unauthorized', 
					'message'	=> "Form does not allow: {$capability}"
				];
			}
		}
		
		$this->logger->debug( "Form {$form_name} token validation OK" );
		return [
			'valid'		=> true, 
			'status'	=> 'ok', 
			'message'	=> 'Form is valid', 
			'meta'		=> $meta
		];
	}
}


/**
 *  Main view attribute
 */
#[Attribute( Attribute::TARGET_FUNCTION | Attribute::IS_REPEATABLE )]
class View {
	/**
	 *  View constructor
	 *  
	 *  @param string	$prefix	View domain prefix
	 *  @param string	$path	Include path for view
	 */
	public function __construct(
		public readonly string	$prefix,
		public readonly string	$path
	) {}
}

/**
 *  @class Prefixed view class storage
 */
class ViewRegistry extends Instance {
	/**
	 *  @var array Cached view paths in prefix->directory format
	 */
	private array $paths = [];
	
	public function __construct( private Config $config ) {
		// Start with plugin directory
		$this->paths[''] = $this->config->defaults( 'plugin_dir ');
	}
	
	public static function create( ?Config $config	= null ) : static {
		$config	??= Container::instance()->get( Config::class );
		return new static( $config );
	}
	
	/**
	 *  Prefixed view cache
	 *  
	 *  @param string	$prefix	View prefix
	 *  @param string	$path	Base view directory for given prefix
	 *  @return array
	 */
	public function add( string $prefix, string $path ) : void {
		$this->paths[$prefix] ??= \rtrim( $path, '/\\' );
	}
	
	public function all() : array { return $this->paths; }
}

/**
 *  @class Identify usable views from registry
 */
class ViewResolver {
	
	public function __construct( private ViewRegistry $registry ) {}
	
	/**
	 *  Validate view path relative to base directory
	 *  
	 *  @param string	$file	Relative view source
	 *  @param string	$base	Base view directory
	 *  @return string
	 */
	private function validate( string $file, string $base ) : string {
		$real_file	= @\realpath( $file );
		$real_base	= @\realpath( $base );
		
		if ( !$real_file || !$real_base ) {
			throw new \RuntimeException( "Error resolving view path" );
		}
		
		if ( !\str_starts_with( $real_file, $real_base ) ) {
			throw new 
			\RuntimeException( "Error with relative view base" );
		}
		
		return $real_file;
	}
	
	/**
	 *  Generate and validate relative view path by name
	 *  
	 *  @param string	$layout	Requested view by file basename
	 *  @return string
	 */
	public function resolve( string $layout ): string {
		$paths = $this->registry->all();

		\uksort( $paths, fn( $a, $b ) => \strlen( $b ) <=> \strlen( $a ) );
		
		foreach ( $paths as $prefix => $dir ) {
			if ( '' !== $prefix && \str_starts_with( $layout, $prefix . ':' ) ) {
				$view = \substr( $layout, \strlen( $prefix ) + 1 );
				return $this->validate( "{$dir}/{$view}.php", $dir );
			}
		}
		
		$default = $paths[''] ?? null;
		if ( $default ) {
			return $this->validate( "{$default}/{$layout}.php", $default );
		}
		
		throw new 
		\RuntimeException( "No view path for: {$layout}" );
	}
}

/**
 *  @class View component output rendering
 */
class ViewRenderer {
	
	public function __construct( private Log $logger ) {}
	
	/**
	 *  Isolated view source inclusion
	 *  
	 *  @param string	$file	View source file location
	 *  @param array	$vars	Parameter data
	 *  @return string
	 */
	public function render( string $file, array $vars ) : string {
		
		$fn = static function( $file, $vars, Log $logger ) {
			if ( $vars ) { \extract( $vars, \EXTR_SKIP ); }
			
			\ob_start();
			try {
				include $file;
				return \ob_get_clean();
				
			} catch ( \Throwable $e ) {
				\ob_end_flush();
				$logger->error("Error in view {$file}: {$e->getMessage()}");
				
				throw $e; // Throw again
			}
		};
		
		return $fn( $file, $vars, $this->logger );
	}
}

/**
 *  @class Views and layouts for plugins
 */
class ViewService extends Instance {

	private array $cache = [];
	private array $stack = [];

	public function __construct(
		private ViewResolver	$resolver,
		private ViewRenderer	$renderer,
		private Log		$logger
	) {}
	
	public static function create(
		?ViewResolver	$resolver	= null,
		?ViewRenderer	$renderer	= null,
		?Log		$logger		= null
	) : static {
		$logger		??= Container::instance()->get( Log::class );
		$renderer	??= new ViewRenderer( $logger );
		$resolver	??= 
		new ViewResolver( Container::instance()->get( ViewRegistry::class ) );
		
		return new static( $resolver, $renderer, $logger );
	}
	
	// TODO: Templates, hooks etc...
	private function preparse( string $file, array $vars ) {
		return $file;
	}
	
	/**
	 *  Include and render selected view with given variables
	 *  
	 *  @param string	$layout	Rendering layout view
	 *  @param array	$vars	Parsed content to be sent to view for rendering
	 *  @return string
	 */
	public function render( string $layout, array $vars = [] ) : string {
		if ( Util::value_exists_ci( $layout, $this->stack ) ) {
			$this->logger->error( "Recursive view detected: {$layout}" );
			
			throw new 
			\RuntimeException( "Recursive view detected" );
		}
		
		$file = $this->preparse( $file, $vars );
		
		// Mark in stack
		$this->stack[] = $layout;
		try { 
			// Check cache and load
			if ( !isset( $this->cache[$layout] ) ) {
				$file			= 
				$this->resolver->resolve( $layout );
				
				// View must exist and have read permissions 
				if ( !\is_readable( $file ) ) {
					$this->logger->error( "View not found: {$layout}" );
					\array_pop( $this->stack );
					
					throw new 
					\RuntimeException( "View not found" );
				}
				
				$this->cache[$layout] = $file;
			}
			
			// Call on renderer
			return $this->renderer->render( $this->cache[$layout], $vars );
			
		} catch ( \Throwable $e ) {
			$this->logger->error( "Error rendering {$layout}: {$e->getMessage()}" );
		} finally { 
			// Clear from stack 
			\array_pop( $this->stack ); 
		}
	}
}

class ViewLoader extends Instance {
	
	/**
	 *  @var array<string> Ignored classnames
	 */
	private	array	$skipped	= [];
	
	/**
	 *  @var array<string> Already loaded views
	 */
	private array	$classes	= [];

	public function __construct( private ViewRegistry $registry ) {}
	
	public static function create( ?ViewRegistry $registry = null ) {
		$registry ??= Container::instance()->get( ViewRegistry::class );
		
		return new static( $registry );
	}
	
	private function parse( string $class ) : void {
		if ( 
			isset( $this->classes[$class] ) || 
			isset( $this->skipped[$class] )
		) { return; }
		
		if ( !\class_exists( $class ) ) { 
			$this->skipped[$class] = true; 
			return;
		}
		
		$ref			= new \ReflectionClass( $class );
		if ( 
			$ref->isAbstract()		|| 
			$ref->isInternal()		|| 
			!$ref->getAttributes( View::class ) 
		) { 
			$this->skipped[$class] = true;
			return; 
		}
		
		$this->classes[$class]	= true;
		foreach ( $ref->getAttributes( View::class ) as $attr ) {
			$meta	= $attr->newInstance();
			$this->registry->add( $meta->prefix, $meta->path );
		}
	}
	
	public function load() : void {
		// Preload local views
		foreach ( \get_declared_classes() as $class ) {
			$this->parse( $class );
		}
		
		// Skip loading external views in debug mode
		if ( defined( 'DEBUG_MODE' ) ) { return; }
		
		$path		= 
		Text::slash_path( PATH, true ) . 
		\defined( 'VIEW_PATH' ) 
			? Text::slash_path( \constant( 'VIEW_PATH' ), true )
			: 'views/';
		
		$classes 	= Finder::in( $path );
		foreach ( $classes as $info ) {
			$this->parse( $info['class'] );
		}
	}
}



/**
 *  Core functionality
 */

/**
 *  Main component actions
 *  
 *  @param bool		$debug	Start in debug mode
 */
function begin( bool $debug = false ) : void {
	
	// Base classes
	$container	= Container::instance();
	// Current initial request
	$request	= $container->get( Request::class );
	
	$logger		= $container->get( Log::class );
	$config		= $container->get( Config::class );
	
	// Core hooks
	$registry	= $container->get( HookRegistry::class );
	$shutdown	= new HookShutdown( $registry );	
	$hooks		= $container->get( HookLoader::class );
	
	// Enable shutdown actions
	\register_shutdown_function( [ $shutdown, 'run' ] );
	
	$router		= $container->get( Router::class );
	$plugins	= $container->get( PluginDiscovery::class );
	
	// Disable exploring and don't initialize plugins in debug mode
	if ( $debug ) {
		$hooks->autoload( false );	
		$plugins->autoload( false );
		$plugins->init( false );
		return;
	}
	
	$hooks->autoload( true );
	$plugins->autoload( true );
	$plugins->init( true );
}

/**
 *  Application initizlization log
 */
function startup_log() : void {
	$log_file = Storage::base() . 
	\defined( 'STARTUP' ) 
		? ( string ) constant( 'STARTUP' )
		: 'startup.log';
	
	// Startup complete if log exists
	if ( \file_exists( $log_file ) ) { return; }
	
	// List of required and optional libraries
	$lib	= 
	[ 
		'required' => [
			'libxml_clear_errors'	=> 'libxml',
			'mime_content_type'	=> 'fileinfo',
			'mb_strlen'		=> 'mbstring'
		],
		'optional' => [ 
			'normalizer_normalize'	=> 'intl',
			'imagecreatetruecolor'	=> 'GD',
			'mail'			=> 'mail'
		]
	];
	
	// Missing storage
	$miss	= [ 'required' => [], 'optional' => [] ];
	
	// Check PDO too
	if ( !\defined( 'PDO::ATTR_DEFAULT_FETCH_MODE' ) ) {
		$miss['required'][] = 'pdo-sqlite';
	}

	if ( !empty( $miss['required'] ) ) {
		$msg	= 
		'These required library(ies) may be missing or disabled: ' . 
			implode( ', ', $miss['required'] );
			$log = Text::truncate( Sanitize::spaces( $msg ), 0, 2048 );
			\error_log( $log, 3, $log_file );
		}
		
		if ( !empty( $miss['optional'] ) ) {
			$msg	= 
			'These recommended function(s) or library(ies) may be missing or disabled: ' . 
				implode( ', ', $miss['optional'] );
			$log = Text::truncate( Sanitize::spaces( $msg ), 0, 2048 );
			\error_log( $log, 3, $log_file );
		}
	}
}

function startup() : void {
	static $initialized	= false;
	
	if ( $initialized ) { return; }
	
	$initizlied	= true;
	\date_default_timezone_set( 'UTC' );
	
	$debug		= \defined( 'DEBUG_MODE' ) ? true : false;
	
	$errors	= new Errors();
	\set_exception_handler( [ $errors, 'handle' ] );
	
	if ( $debug ) {
		$errors->trace( 'Request started', [
			'method'	=> $_SERVER['REQUEST_METHOD'],
			'uri'		=> $_SERVER['REQUEST_URI']
		] );
	}
	
	$scope	= $errors->start_scope();
	try {
		startup_log();
		begin( $debug );
	} finally {
		$errors->end_scope( $scope );
	}
}


/**
 *  Main Bare plugin
 */
#[Plugin( name: 'Bare', priority : 1000 ) ]
#[Info( 
	name	: 'Bare', 
	version	: '2.0' 
) ]
class Bare {
	/**
	 *  @var Config Configuration settings
	 */
	private readonly Config $config;
	
	/**
	 *  @var Language Translation and localization settings
	 */
	private readonly Language $language;
	
	public function __construct( 
		private readonly Info		$info,
		private readonly Plugin		$meta, 
		private readonly Container	$container
	) {
		$this->config	= $this->container->get( 'Config' );
		$this->language	= $this->container->get( 'Language' );
		
		$asset_dir	= $info->fields['asset_dir']	?? 'assets/';
		$data_dir	= $info->fields['data_dir']	?? 'data/';
		
		$base_dir 	= 
		\is_callable( $asset_dir )
			? $asset_dir()
			: $asset_dir;
		
		$dir		= $this->config->setting( 'asset_dir', $base_dir ); // Build on default
		$dir		= \rtrim( $dir, '/\\' ) . \DIRECTORY_SEPARATOR;
		
		
		/*
		hook( [ 'register_asset_dir', function( $event, $dirs ) use ( $dir ) {
			$dirs[] = $dir;
			return $dirs;
		} ] );*/
	}
	
	/**
	 *  Content entry discovery and parsing
	 */
	
	/**
	 *  Process entry extension, defaults to ''.md'
	 *  
	 *  @return string
	 */
	private function entry_ext() : string {
		static $ext;
		$ext		??= '.' . 
		\ltrim( \strtolower( $this->config->setting( 'entry_ext', 'md' ) ), '.' );
		
		return $ext;
	}
	
	/**
	 *  Load entries
	 *  
	 *  @param string	$base	Search directory
	 *  @return array
	 */
	private function entry_files( string $base ) : array {
		$iterator = Storage::files_as_iterator( $base );
		if ( empty( $iterator ) ) { return []; }
		
		$files	= [];
		$ext	= $this->entry_ext();
		$eext	= \ltrim( $ext, '.' );
		$rext	= '/^.+\.' . $eext  . '$/i';
		$filter	= 
		new \CallbackFilterIterator(
			$iterator,
			fn( $finfo ) => 
				$finfo->isFile()	&& 
				$finfo->getSize() > 0	&& 
				0 === \strcasecmp( $eext, $finfo->getExtension() )
		);
		
		foreach ( $filter as $finfo ) {
			$files[] = [
				'slug'		=> $finfo->getBasename( $ext ),
				'path'		=> $finfo->getPathname(),
				'mtime'		=> $finfo->getMTime(),
			];
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
	private function entry_meta( string $line, array &$meta ) : bool {
		if ( \str_contains( $line, ':' ) ) { return false; }
		
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
	private function entry_import( string $path ) : ?array {
		if ( @!\is_readable( $path ) ) { return null; }
		
		$raw	= @\file( $path, \FILE_IGNORE_NEW_LINES );
		if ( false === $raw ) { return null; }
		
		$raw	= Text::trim_lines( $raw );
		if ( empty( $raw ) ) { return null; }
		
		$meta	= [];
		$start	= 0;	// Body start
		
		$lines	= ( int ) $this->config->setting( 'entry_meta_lines', 6 );
		$rcount	= count( $raw );
		$mcount	= \min( $lines, $rcount );
		
		// Top metadata
		for ( $i = 1; $i < $mcount; $i++ ) {
			$line	= \trim( $raw[$i] );
			if ( '' === $line ) {
				$start = $i + 1;
				break;
			}
			
			if ( $this->entry_meta( $line, $meta ) ) { continue; }
			
			$start = $i;
			break;
		}
		
		// Bottom metadata
		$cut	= $rcount;
		for ( $i = $rcount - 1; $i >= $start; $i-- ) {
			$line	= \trim( $raw[$i] );
			if ( '' === $line ) { continue; }
			
			if ( $this->entry_meta( $line, $meta ) ) {
				$cut = $i;
				continue;
			}
			
			break;
		}
		
		// Ensure title exists at least as the first line, if not explicitly set
		if ( !isset( $meta['title'] ) ) {
			if ( isset( $raw[0] ) ) {
				$meta['title']	= \trim( \array_shift( $raw ) );
				$start		= \max( 0, $start - 1 );
				$cut		= \max( 0, $cut - 1 );
			} else {
				$meta['title'] = 
				$this->language->term( 'untitled', '(Untitled)' );
			}
		}
		
		// Path as slug
		$meta['slug']	= \pathinfo( $path, \PATHINFO_FILENAME );

		$text		= \array_slice( $raw, $start, $cut - $start );
		$text		= Text::trim_lines( $text );
		$body		= \implode( "\n", $text );
		
		return [ 'meta' => $meta, 'body' => $body ];
	}
	
	/**
	 *  Post stamp date formatting helper
	 *  
	 *  @param array	$post	Populated stamp in year, month, day format
	 */
	private function entry_date( array $post ) : \DateTime {
		return new \DateTime( "{$post['year']}-{$post['month']}-{$post['day']} 00:00:00" );
	}
	
	/**
	 *  Paged entry index with detailed info
	 *  
	 *  @param string	$dir	Search directory
	 *  @param DateTime	$start	Starting date for archive
	 *  @param DateTime	$end	Ending date for archive
	 *  @param int		$page	Current page index, defaults to 1
	 *  @param int		$limit	Maximum number of files
	 *  @return array
	 */
	private function entry_index( string $dir, \DateTime $start, \DateTime $end, int $page, int $limit ) : array {
		$files	= $this->entry_files( $dir );
		if ( empty( $files ) ) { 
			return [
				'entries'	=> [],
				'total_entries'	=> 0,
				'total_pages'	=> 1,
			]; 
		}

		$files	= 
		\array_filter(
			$files,
			fn( $p ) => $this->entry_date( $p ) >= $start && $this->entry_date( $p ) < $end
		);
		
		// Nothing in this date range?
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
		
		// Paginate
		$offset	= ( $page - 1 ) * $limit;
		$slice	= \array_slice( $files, $offset, $limit );
		
		// Load only the entries needed for this page
		$entries = 
		\array_values( \array_filter(
			\array_map( fn( $f ) => $this->entry_import( $f['path'] ), $slice ),
			fn( $e ) => $e !== null
		) );
		
		return [
			'entries'	=> $entries,
			'total_entries'	=> $total,
			'total_pages'	=> $pcount,
		];
	}
	
	#[Route( pattern : '/{year:int}/{month:int}/{day:int}/page{page:int}?', method : 'get' )]
	#[Route( pattern : '/{year:int}/{month:int}/{day:int}', method : 'get' )]
	#[Route( pattern : '/{year:int}/{month:int}/page{page:int}?', method : 'get' )]
	#[Route( pattern : '/{year:int}/{month:int}', method : 'get' )]
	#[Route( pattern : '/{year:int}/page{page:int}?', method : 'get' )]
	#[Route( pattern : '/{year:int}', method : 'get' )]
	public function archive( array $params ) {
		[ $start, $end, $page ]	= Util::date_range( $params, true );
		
		$dir	= $this->config->setting( 'post_dir', Storage::base() );
		$limit	= $this->config->setting( 'post_limit', 10 );
		
		$posts	= $this->entry_index( $dir, $start, $end, $page, $limit );
		\var_dump( $posts ); // Test
		
		die( 'Bare archive' );
	}
	
	#[Route( pattern : '/{year:int}/{month:int}/{day:int}/{slug:str}', method : 'get' )]
	public function post( array $params ) {
		// TODO: Read post
		
		die( 'Bare post' );
	}
	
	#[Route( pattern : '/tags/{tag:str}/page{page:int}?', method : 'get' )]
	#[Route( pattern : '/tags/{tag:str}', method : 'get' )]
	public function tags( array $params ) {
		// TODO: Tag search
	
		die( 'Bare tags' );
	}
	
	#[Route( pattern : '/feed', method : 'get')]
	public function feed( array $params ) {
		// TODO: Search archive
		
		die( 'Bare feed' );
	}
	
	#[Route( pattern : '/about/{tree:str}?', method : 'get' )]
	public function about( array $params ) {
		// TODO: About page etc...
		
		die( 'Bare about' );
	}
	
	#[Route( pattern : '/?find={find:str}/page{page:int}?', method : 'get')]
	#[Route( pattern : '/?find={find:str}', method : 'get')]
	public function search( array $params ) {
		// TODO: Search archive
		
		die( 'Bare search' );
	}
	
	#[Route( pattern : '/page{page:page}?', method : 'get' )]
	#[Route( pattern : '/', method : 'get' )]
	public function index( array $params ) {
		// TODO: Index
		
		die( 'Bare index' );
	}
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
	static $fmt;
	if ( isset( $app ) ) {
		return $app;
	}
	$fmt ??= Container::instance()->get( 'Format' );
	$app = $fmt->label( config( 'app_name', \APP_NAME ) );
	if ( empty( $app ) ) {
		$app = $fmt->label( \APP_NAME );
	}
	return $app;
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
	$err	= $app ? Sanitize::spaces( $err ) : Text::truncate( $err, 0, 2048 );
	
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
		Text::truncate( Sanitize::spaces( $msg ), 0, 2048 ) 
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
	$mt	= Container::instance()->get( 'Request' )->method;
	
	$ua	= logStr( $_SERVER['HTTP_USER_AGENT'] ?? '-' );
	$me	= logStr( empty( $mt ) ? 'unknown' : $mt );
	$uri	= logStr( $_SERVER['REQUEST_URI'] ?? '' );
	
	$err	= $code . ' ' . Container::instance()->get( 'Request' )->ip( true ) . ' ' . $me . ' ' . $msg . ' ' . 
			$ua . ' ' . $uri;
	
	shutdown( 'logError', [ $err, false ] );
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
	$ln = \array_unique( Text::split_lines( $text ) );
	
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
	$ext	= filterExt( $ext );
	
	// Extension mode
	$prefix = $fx == 1 ? \rtrim( $ext, '.' ) . '.' : '';
	$suffix	= $fx == 0 ? '.' . \ltrim( $ext, '.' ) : '';
	
	// Backup file name inferred from full file path
	$name	= 
	Text::slash_path( \dirname( $file ), true ) . $prefix . 
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
	$fname	= Text::slash_path( $root, true ) . $name;
	
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
	$html	= hook_html( 'homelink' );
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
	$plimit	= config( 'page_limit', 20, 'int' );
	$c	= count( $posts );
	
	hook( [ 'paginate', [ 
		'page'		=> $page, 
		'limit'		=> $plimit, 
		'prefix'	=> $prefix, 
		'posts'		=> $posts, 
		'count'		=> $c,
		'type'		=> 'nextprev'
	] ] );
	
	$html	= hook_html( 'paginate' );
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
			Util::json_udecode( $def )[ 'links'] ?? [];
	
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
	$links	= config( 'footer_links', [], 'json' );
	$flinks	= config( 'default_footer_links', $links );
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
	$sent	= hook_array( 'loadcssclasses' )['classes'] ?? [];
	if ( !empty( $sent ) ) {
		$cls	= \array_merge( $cls, $sent );
	}
	
	$cv	= [];
	
	// Add new or appened classes while removing duplicates
	foreach( $cls as $k => $v ) {
		$cv['{' . $k . '}'] = 
			\implode( ' ', Text::unique_terms( Sanitize::bland( $v, true ) ) );
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
				$s	= config( 'default_stylesheets', [] );
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
				hook_array( 'stylesloaded' )['styles'] ?? $s;
				
				break;
				
			case 'scripts':
				$s	= config( 'default_scripts', [] );
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
				hook_array( 'scriptsloaded' )['scripts'] ?? $s;
				
				break;
			
			case 'meta':
				// Load custom meta tags
				$meta	= config( 'default_meta', [] );
				$meta	= 
					\is_string( $meta ) ? Util::json_udecode( $meta ) : 
						[ 'meta' => $meta ];
				
				// Merge plugin meta tags
				hook( [ 'metaloaded', [ 'meta' => $meta ] ] );
				$store['meta'] = 
				hook_array( 'metaloaded' )['meta'] ?? $meta;
				
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
	$n	= '{' . Sanitize::bland( $name, true ) . '}';
	$va	= [];
	foreach( $cls as $k => $v ) {
		if ( 0 != \strcmp( $n , $k ) ) {
			continue;
		}
		$va	= Text::unique_terms( $v );
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
		[ '{' . Sanitize::bland( $name, true ) . '}' => Sanitize::bland( $value, true ) ] 
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
			$i = config( 'meta_limit', 15, 'int' );
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
	config( 'nonced_scripts', 0, 'bool' ) ?
	regionTags( $tpl, '{body_js}', \TPL_SCRIPT_NONCE_TAG, 'scripts' ) : 
	regionTags( $tpl, '{body_js}', \TPL_SCRIPT_TAG, 'scripts' );
	
	$tpl	= 
	regionTags( $tpl, '{meta_tags}', \TPL_META_TAG, 'meta' );
	
	$sa	= config( 'asset_dir', 'assets/' );
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
		Text::slash_path( config( 'plugin_asset_dir', 'plugins/' ), true );
	
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
	
	$out	= hook_array( 'templaterender', $out );
	
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
	return \bin2hex( \random_bytes( Util::int_range( $bytes, 1, 64 ) ) );
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
	$size	= Util::int_range( $size, 1, 24 );
	$code	= '';
	while ( strsize( $code ) < $size ) {
		$code .= genAlphaNum();
	}
	
	return Text::truncate( $code, 0, $size );
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
	db_result_exec( 
		"SELECT cache_id, content, expires 
		FROM caches WHERE cache_id = :id LIMIT 1;", 
		'bare',
		[ ':id' => $key ]
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
	
	$ttl	= config( 'cache_ttl', 3600, 'int' );
	db_insert(
		$sql, 
		'bare',
		[
			':id'		=> $key, 
			':ttl'		=> $ttl, 
			':content'	=> $content 
		]
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
	if ( config( 'cookie_restrict', 1, 'bool' ) ) {
		return 'Strict';
	}
	
	return Container::instance()->get( 'Request' )->is_tls ? 'None' : 'Lax';
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
	
	$cpath	= config( 'cookie_path', '/' );
	$tls	= Container::instance()->get( 'Request' )->is_tls;
	
	// Enable locking if connection is secure and path is '/'
	$prefix	= 
	( 0 === \strcmp( $cpath, '/' ) && $tls) ? 
		'__Host-' : ( $tls ? '__Secure-' : '' );
	
	return $prefix;
}

/**
 *  Generate application cookie prefix based on the current server
 *  
 *  @return string
 */
function appKey() : string {
	return 
	cookiePrefix() . \hash( 'tiger160,4', getHost() . Container::instance()->get( 'Request' )->protocol );
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
	
	$cexp	= config( 'cookie_exp', 604800, 'int' );
	$cpath	= config( 'cookie_path', '/' );
	
	$opts	=  [
		'expires'	=> 
			( int ) ( $options['expires'] ?? time() + $cexp ),
		'path'		=> $cpath,
		'samesite'	=> sameSiteCookie(),
		'secure'	=> Container::instance()->get( 'Request' )->is_tls,
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
 *  Session functionality
 */

/**
 *  Set session cookie parameters
 *  
 *  @return bool
 */
function sessionCookieParams() : bool {
	$options		= defaultCookieOptions();
	
	// Override some defaults
	$options['lifetime']	=  
		config( 'cookie_exp', 604800, 'int' );
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
	return \mb_strlen( $text, '8bit' );
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
		langVar( 'date_nice', config( 'date_nice', $fmt ) );
	}
	return \gmdate( $dn, Util::time_string_int( $stamp ) );
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
	
	$ys	= config( 'year_start', 1900, 'int' );
	
	// Enforce date ranges
	$year	= Util::int_range( $year, $ys, $y );
	
	// Current year? Enforce month to current month or January of this year
	$month	= ( $y == $year ) ? 
			Util::int_range( $month, 1, $m ) : 
			Util::int_range( $month, 1, 12 );
	
	// Days in requested year and month
	$days	= ( int ) \date( 't', \mktime( 0, 0, 0, $month, 1, $year ) );
	
	// No more than the number of days in requested or current year/month
	$day	= ( $year == $y && $month == $m ) ? 
			Util::int_range( $day, 1, $d ) : 
			Util::int_range( $day, 1, $days );
	
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
			$sh	= Text::lowercase( $_SERVER[$h] );
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
		$errors	 = Text::slash_path( \ERROR_ROOT, true );
		return $errors;
	}
	
	// Shortest root directory for this host
	$hp		= getHostPaths( getHost() );
	$root		= Text::slash_path( $hp[0], true );
	return $root;
}

/**
 *  Send list of supported HTTP request methods
 */
function getAllowedMethods( bool $arr = false ) {
	$ap	= config( 'allow_post', 0, 'bool' );
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
	$prot = Container::instance()->get( 'Request' )->protocol;
	\header( "$prot $code $msg", true );
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
				Text::slash_path( $b['basepath'] ?? '/' );
		
			// Set active mode if not set
			$b['is_active']		??= 1;
			
			// Set maintenance mode
			$b['is_maintenance']	??= 0;
			
			// Custom site settings, or default
			$b['settings']		??= [];
			$b['settings']		= 
			\array_merge( [
				'page_title'		=> config( 'page_title', config_default_title() ),
				'page_sub'		=> config( 'page_sub', config_default_desc() ),
				'page_limit'		=> config( 'page_limit', 12 ),
				'language'		=> config( 'language', config_default_lang() )
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
	$sw	= formatSites( config( 'realms', [] ) );
	
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
	$sw	= Util::trimmed_list( implode( ',', array_keys( $sk ) ), true );
	$raw	= Container::instance()->get( 'Request' )->host;

	$host	= isset( $sw[$raw] ) ? Text::lowercase( $raw ) : '';
	
	// Call host hook
	hook( [ 'gethost', [
		'host'		=> $host,
		'white'		=> $sw,
		'sets'		=> $sh,
		'forward'	=> $fd
	] ] );
	
	// Override if sent by plugin
	$host	= hook_string( 'gethost', $host );
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
		$b = Text::slash_path( $s['basepath'] ?? '/' );
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
		$px .= Text::slash_path( $v );
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
	$ptitle	= config( 'page_title', config_default_title() );
	$psub	= config( 'page_sub', config_default_desc() );
	
	// Call error code hook
	hook( [ 'errorcodesend', [
		'code'		=> $code,
		'title'		=> $ptitle,
		'subtitle'	=> $psub,
		'path'		=> $path,
		'body'		=> $body
	] ] );
	
	// Handle custom errors
	$html	= hook_html( 'errorcodesend' );
	
	// Send custom errors
	if ( !empty( $html ) ) {
		page_send( $code, $html );
	}
	
	// Send standard error page if nothing handled
	$params	= [ 
		'page_title'	=> $ptitle,
		'tagline'	=> $psub,
		'code'		=> $code,
		'body'		=> $body 
	];
	page_send( $code, render( template( 'tpl_error_page' ), $params ) );
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
	
	page_send( 
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
	redirect( $code, Text::slash_path( pageRoutePath(), true ) . $page );
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
	page_send( 414, errorLang( $msg, $default ) );
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
	response_end_buffers( true );
	
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
			response_status( 200 );
		} else {
			response_status( 404 );
		}
	} else {
		// Route exists
		response_status( 200 );
	}
	
	// Done
	die();
}

/**
 *  Handle OPTIONS HTTP request method
 */
function handleOptions() {
	// Send No Content
	response_status( 204 );
	
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
	$cache	= getCache( Container::instance()->get( 'Request' )->url );
	
	if ( empty( $cache ) ) {
		return;
	}
	
	// If URI is already saved, send contents and exit
	
	// Is this a feed?
	if ( 0 === \strcasecmp( \basename( $path ), 'feed' ) ) {
		page_send( 200, $cache, false, true );
	}
	
	page_send( 200, $cache, false );
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
			page_send( 405 );
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
	sess_init();
	
	$host	= getHost();
	
	// Empty host?
	if ( empty( $host ) ) {
		sendBadRequest();
	}
	
	// Sanity checks
	$req	= Container::instance()->get( 'Request' );
	$path	= $req->uri;
	$verb	= $req->method;
	$safe	= getAllowedMethods( true );
	
	// Unrecognized method?
	if ( !\in_array( $verb, $safe ) ) {
		sendBadMethod();
	}
	
	// If posting isn't allowed files should be empty
	if ( 
		!config( 'allow_post', 0, 'bool' ) && 
		!empty( $_FILES ) 
	) {
		sendBadMethod();
	}
	
	// Request path hard limit
	$lurl	= config( 'max_url_size', 512, 'int' );
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
	if ( 0 != \strcmp( 'get', $verb ) || !Sanitize::is_safe_ext( $path ) ) {
		return false;
	}
	
	// Trim leading slash and append static file path
	$path	= \preg_replace( '/^\//', '', $path );
	
	// Break path to count folders and search plugins
	$segs	= explode( '/', $path );
	
	// Check folder limits
	$climit	= config( 'folder_limit', 15, 'int' );
	$c	= count( $segs );
	if ( $c > $climit ) {
		return false;
	}
	
	// Check if ranged request
	$req	= Container::instance()->get( 'Request' );
	$ranged	= $req->is_ranged();
	
	// Static file path
	$fpath	= config( 'file_dir', Storage::base() ) . $path;
	
	if ( \file_exists( $fpath ) ) {
		$frange = $req->range_header( \filesize( $fpath ) );
		if ( $ranged && empty( $frange ) ) {
			sendRangeError();
		}

		$etag	= $req->none_match();
		$mtime	= Storage::file_time( $fpath );
		response_file( $fpath, false, $etag, $mtime );
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
	
	$pd	= config( 'post_dir', Storage::base() ) . $root;
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
function filterDir( $path, ?string $root = null ) {
	$root ??= config( 'post_dir', POST_DIR );
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
	$db		= db_get( 'bare' );
	// Post delete statement
	$dstm		= 
	db_stmt( $db, 'DELETE FROM posts WHERE post_path = :path' );
	
	// Post insertion statement
	$pstm		= 
	db_stmt( $db, 
		"INSERT OR IGNORE INTO posts( 
			post_path, post_view, post_bare, post_summary, 
			post_type, updated, published 
		) 
		VALUES ( :path, :pview, :bare, :summary, :type, :updated, :pub );" 
	);
	
	// Select post statement
	$sstm		=
	db_stmt( $db, 'SELECT id FROM posts WHERE post_path = :perm LIMIT 1;' );
	
	// Post tag association statement
	$tstm		= 
	db_stmt( $db, 
		"INSERT OR IGNORE INTO post_tags( post_id, tag_slug ) 
		VALUES ( :id, :tag );"
	);
	
	// Tag insertion statement
	$istm		= 
	db_stmt( $db, 
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
	$ppath	= config( 'post_dir', Storage::base() ) . $path . $ext;
	
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
	$tz = config( 'timezone', config_default_tz() );
	$dt = new \DateTime( 'now', new \DateTimeZone( 'UTC' ) );
	try {
		$dz = new \DateTimeZone( $tz );
		$ot = $dz->getOffset( $dt );
		
	} catch( \Exception $e ) { // Default fallback
		shutdown( 'logError', 'Invalid timezone set ' . $tz );
		$dz = new \DateTimeZone( config_default_tz() );
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
	
	return Util::utc( empty( $fr ) ? 'now' : $fr );
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
	db_result_exec( 
		"SELECT updated FROM posts 
			WHERE post_path = :path", 
		'bare',
		[ ':path' => Text::slash_path( $path ) ]
	);
	
	if ( empty( $res ) ) {
		return true;
	}
	
	// Remove fine resolution issues
	$ft = \strtotime( Util::utc( $res[0]['updated'] ) );
	$mt = \strtotime( Util::utc( $mtime ) );
	
	return ( $mt > $ft ) ? false : true;
}

/**
 *  Check if post exists in cache
 */
function postCached( $path ) : bool {
	$res = 
	db_result_exec( 
		"SELECT id FROM posts WHERE post_path = :path
			LIMIT 1;", 
		'bare',
		[ ':path' => Text::slash_path( $path ) ]
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
		$line = \trim( Sanitize::spaces( $post[$p] ) );
		
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
	return format_body( 
		value		: $find['all'] ?? '', 
		use_fmt		: true,
		prefix		: pageRoutePath(),
		override	: hook_array( 'markdownfilter' )['filters'] ?? null,
		custom		: hook_array( 'hostedembeds', [] )['hosted'] ?? null
	);
}

/**
 *  Try to parse post category tags
 *  
 *  @param array	$find	Content as labled regular expression match
 *  @return array
 */
function extractTags( array $find ) : array {
	// Clean tags
	$tags	= \array_filter( Util::trimmed_list( $find['tags'] ?? '' ) );
	
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
			'slug' => Sanitize::slug( $t ),
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
	return Util::json_udecode( $find['all'] ?? '' );
}

/**
 *  Parse current post's type or send default type
 */
function extractType( array $find ) : string {
	static $fmt;
	$fmt ??= Container::instance()->get( 'Format' );
	
	return 
	Text::lowercase( $fmt->label( 
		$find['label'] ?? 
		Container::instance()->get( 'Config' )->setting( 'post_type', \POST_TYPE )
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
	hook_array( 'postfeatureinit' )['features'] ?? [];
	
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
	$sent	= hook_array( 'postfeatures' );
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
	$pdir	= config( 'post_dir', Storage::base() );
	$home	= $pdir . 'home.md';
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
		':path'		=> Text::slash_path( $path ), 
		':pview'	=> $out, 
		':bare'		=> \strip_tags( $out ), 
		':summary'	=> $summ, 
		':type'		=> $type,		
		':updated'	=> Util::utc( $mtime ), 
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
	$db		= db_get( 'bare' );
	
	// Tag insertion statement
	$istm		= 
	db_stmt( $db, 
	"INSERT OR IGNORE INTO tags( slug, term ) 
		VALUES ( :slug, :term );" 
	);
	
	// Post insertion statement
	$pstm		= 
	db_stmt( $db, 
		"INSERT OR IGNORE INTO posts( 
			post_path, post_view, post_bare, post_summary, 
			post_type, updated, published 
		) 
		VALUES ( :path, :pview, :bare, :summary, :type, :updated, :pub );" 
	);
	
	// Select post statement
	$sstm		=
	db_stmt( $db, 
		"SELECT id FROM posts WHERE post_path = :perm LIMIT 1;"
	);
	
	// Post tag association statement
	$tstm		= 
	db_stmt( $db, 
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
	static $fmt;
	$fmt	??= Container::instance()->get( 'Format' );
	
	// Get the title from the first line
	$title	= $fmt->title( \array_shift( $post ) );
	
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
	$html	= hook_html( 'formattags' );
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
		$default	= Util::trimmed_list( $rtt, true );
		
		// Send to hook for additional types
		hook( [ 'hasreadtime', [ 'types' => $default ] ] );
		
		$rtypes		= 
		hook_array( 'hasreadtime' )['types'] ?? $default;
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
	
	$sent	= hook_array( 'formatmeta' );
	if (  !empty( $sent ) ) {
		return $sent;
	}
	
	// Individual customization hooks
	hook( [ 'formattitle',		[ 'title'	=> $title ] ] );
	hook( [ 'formatpublished',	[ 'pub'		=> $pub ] ] );
	
	// Format read time, if appropriate
	$read	= 
	hasReadTime( $type ) ? 
		hook_wrap( 
			'beforereadtime',
			'afterreadtime',
			template( 'tpl_read_time' ), 
			[ 'time' => $rtime ]
		) : '';
	hook( [ 'formatreadtime',	[ 'read'	=> $read ] ] );
	
	return [
		'title'		=> hook_string( 'formattitle', $title ),
		'date_utc'	=> $pub,
		'date_rfc'	=> Util::rfc_date( $pub ),
		'date_stamp'	=> hook_string( 'formatpublished', dateNice( $pub ) ),
		'read_time'	=> hook_string( 'formatreadtime', $read ),
		'tags'		=> formatTags( $tags, $index ),
		'permalink'	=> 
		Container::instance()->get( 'Request' )->origin . dateSlug( \basename( $path ), $pub )
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
	static $lang_sets;
	
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
	$body	= 
	format_body( 
		value		: \implode( "\n", $post ), 
		prefix		: pageRoutePath(),
		use_fmt		: true,
		override	: hook_array( 'markdownfilter' )['filters'] ?? null,
		custom		: hook_array( 'hostedembeds', [] )['hosted'] ?? null
	);
	
	// Calculate read time, if appropriate, from formatted body
	if ( !isset( $lang_sets ) ) {
		$lang_sets	= config( 'lang_read_times', [] );
		hook( [ 'readingtime', [ 'sets' => $lang_sets ] ] );
	}
	$rtime	= hasReadTime( $type ) ? language_read_time( $body, $lang_sets ) : 0;
	
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
	
	$html	= hook_html( 'formatpost' );
	
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
	$mpage	= config( 'max_page', 500, 'int' );
	$ys		= config( 'year_start', 1900, 'int' );
	$ye		= ( int ) \date( 'Y', $now );
	
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
					Sanitize::spaces( ( string ) $v ) : '';
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
					Sanitize::spaces( ( string ) $v ) : '';
			}
		],
		'tree'	=> [
			'filter'	=> \FILTER_CALLBACK,
			'options'	=> 
			function( $v ) {
				return \is_scalar( $v ) ? 
					Sanitize::url( ( string ) $v ) : '';
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
	$ptitle	= config( 'page_title', config_default_title() );
	$psub	= config( 'page_sub', config_default_desc() );
	
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
	$links		= config( 'main_links', [], 'json' );
	$mlinks		= setting( 'default_main_links', $links );
	$heading	= 
	hook_wrap( 
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
		'lang'		=> config( 'language', config_default_lang() ),
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
	hook_wrap( 
		'beforepostindex',
		'afterpostindex',
		template( 'tpl_full_page'), 
		$tpl, 
		true 
	);
	
	// Send results
	page_send( 200, $page_t, $cache );
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
	sess_init();
	if ( empty( $_SESSION[$label] ) || $reset ) {
		$_SESSION[$label] = genId();
	}
	
	return $_SESSION[$label];
}

/**
 *  Initiate anti-CSRF session flag holder
 */
function initCSRFSession() : void {
	sess_init();
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
	
	$params		= Util::json_uencode( $data );
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
	Sanitize::input_array( $itype, [
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
 *  Render search form template
 *  
 *  @return string
 */
function searchForm() : string {
	// Send search form hook output
	return
	hook_wrap( 
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
	return Text::slash_path( pageRoutePath(), true ) . 
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
	$ppath	= config( 'post_dir', Storage::base() ) . $path. '.md';
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
		$out	= hook_array( 'previewlink' );
		if ( !empty( $out ) ) {
			return $out;
		}
	}  else {
		$out	= hook_html( 'previewlink' );
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
	db_result_exec( 
		"SELECT * FROM post_siblings WHERE post_path = :path", 
		'bare',
		[ ':path' => Text::slash_path( $path ) ]
	);
	
	hook( [ 'getsiblings', [
		'posts'	=> $res,
		'path'	=> $path
	] ] );
	
	$out	= hook_html( 'getsiblings' );
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
 *  Get posts related to current one by content
 *  
 *  @param string	$path	Current post permalink path
 *  @return string
 */
function getRelated( string $path ) : string {
	$path	= Text::slash_path( $path );
	$res	= 
	db_result_exec( 
		'SELECT post_bare FROM posts WHERE post_path = :path', 
		'bare',
		[ ':path' => $path ]
	);
	
	if ( empty( $res ) ) {
		return '';
	}
	
	$text	= $res[0]['post_bare'] ?? '';
	if ( empty( $text ) ) {
		return '';
	}
	
	$lines	= Text::split_lines( $text );
	if ( empty( $lines ) ) {
		return '';
	}
	
	// Parse common words, excluding stop words
	$words	= Language::instance()->filter_common_words( $lines, false );
	
	// Make search data with full title intact ( quotes removed )
	$title	= \strtr( \current( $lines ), [ '"' => '' ] );
	$data	= Language::instance()->search_phrase( '"' . $title . '" ' . $words );
	$rlimit	= setting( 'related_limit', \RELATED_LIMIT, 'int' );
	
	// Search for related content excluding current post
	$search	= 
	db_result_exec( 
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
		'bare',
		[ 
			':find'		=> $data, 
			':limit'	=> $rlimit,
			':path'		=> $path
		]
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
	
	$html	= hook_html( 'getrelated' );
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
 *  @param array	$links		Default link definition (overridden by $label)
 *  @param array	$post		Page content as a list of lines
 *  @param bool		$forms		This page may contain forms (E.G. contact page)
 *  @param bool		$cache		Cache this page if true
 *  @param string	$lang		Override configured language
 */
function staticPage( 
	string	$label,
	string	$path,
	array	$links,
	array	$post,
	bool	$forms		= true,
	bool	$cache		= true,
	string	$lang		= ''
) {
	$ptitle	= config( 'page_title', config_default_title() );
	$psub	= config( 'page_sub', config_default_desc() );
	
	// First line is the title, everything else is the body
	$title	= Container::instance()->get( 'Format' )->title( \array_shift( $post ) );
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
	hook_wrap( 
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
	hook_wrap( 
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
	
	page_send( 200, $page_t, $cache );
}

/**
 *  Static page retrieval helper
 *  
 *  @param string	$page	Retrieval page path
 *  @return array
 */
function loadStaticPage( string	$page ) : array {
	$pdir	= config( 'post_dir', Storage::base() );
	$path	= Text::slash_path( $page );
	
	return loadText( $pdir . $path );
}

/**
 *  Show homepage or archive depending on whether home.md page is in POST_DIR
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
	$links	= config( 'main_links', [], 'json' );
	staticPage( 'home', '/', $links, $post );
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
	$links = config( 'about_links', [], 'json' );
	staticPage( 'about', '/about/' . $path, $links, $post );
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
		$prefix	= Text::slash_path( pageRoutePath(), true );
	
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
		$prefix	= Text::slash_path( pageRoutePath(), true ) . $stamp;
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
	
	$tag	= Sanitize::slug( $params['tag'] );
	$page	= ( int ) ( $params['page'] ?? 1 );
	$prefix	= 
	Text::slash_path( pageRoutePath( 'tagview', 'tags' ), true ) . $tag . '/';
	
	// Pagination prep
	$plimit	= setting( 'page_limit', \PAGE_LIMIT, 'int' );
	$start	= ( $page - 1 ) * $plimit;
	
	// Get cached tags
	$res	= 
	db_result_exec( 
		"SELECT DISTINCT 
			posts.post_path AS post_path, 
			posts.post_view AS post_view, 
			posts.post_summary AS post_summary, 
			posts.post_type AS post_type FROM posts 
			JOIN post_tags ON posts.id = post_tags.post_id 
			WHERE post_tags.tag_slug = :tag 
			ORDER BY posts.published DESC 
			LIMIT :limit OFFSET :offset;", 
		'bare',
		[
			':tag'		=> $tag, 
			':limit'	=> $plimit, 
			':offset'	=> $start
		]
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
	
	$find	= Language::instance()->search_phrase( $params['find'] ?? '' );
	if ( empty( $find ) ) {
		sendNotFound();
	}
	
	$prefix = searchPagePath( $params );
	$page	= ( int ) ( $params['page'] ?? 1 );
	
	// Pagination prep
	$plimit	= setting( 'page_limit', \PAGE_LIMIT, 'int' );
	$start	= ( $page - 1 ) * $plimit;
	
	$res	= 
	db_result_exec( 
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
		'bare',
		[ 
			':find'		=> $find,
			':limit'	=> $plimit,
			':offset'	=> $start
		]
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
	
	$slvl	= config( 'summary_level', 0, 'int' );
	$posts	= loadPosts( 1, '', true, $slvl );
	if ( empty( $posts ) ) {
		sendNotFound();
	}
	
	$ptitle	= config( 'page_title', config_default_title() );
	$psub	= config( 'page_sub', config_default_desc() );
	
	// Send to render hook
	hook( [ 'feedrender', [  
		'title'		=> $ptitle,
		'subtitle'	=> $psub,
		'date'		=> [],
		'posts'		=> $posts
	] ] );
	
	// Send result if hook returned content
	sendOverride( 'feedrender', true );
	$req	= Container::instance()->get( 'Request' );
	$tpl	= [
		'page_title'	=> $ptitle,
		'tagline'	=> $psub,
		'home'		=> $req->origin,
		'path'		=> $req->url,
		'date_gen'	=> Util::rfc_date(),
		'body'		=> \implode( '', $posts )
	];
	
	page_send( 200, render( template( 'tpl_feed' ), $tpl ), true, true );
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
	$sib	= 
	config( 'show_siblings', 1, 'int' ) 
		? getSiblings( $path ) : '';
	
	$rel	= 
	config( 'show_related', 1, 'int' ) 
		? getRelated( $path ) : '';
	
	$ptitle	= config( 'page_title', config_default_title() );
	$psub	= config( 'page_sub', config_default_desc() );
	
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
	$links		= config( 'main_links', [], 'json' );
	$mlinks		= setting( 'default_main_links', $links );
	$heading	= 
	hook_wrap( 
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
	hook_wrap( 
		'beforepostpage',
		'afterpostpage',
		template( 'tpl_full_page' ), [
			'page_title'	=> $ptitle,
			'post_title'	=> $title . ' - ' . $ptitle,
			'lang'		=> config( 'language', config_default_lang() ),
			'home'		=> pageRoutePath(),
			'body_before'	=> $heading,
			'body'		=> $post,
			'body_after'	=> $sib . $rel . pageFooter()
		], 
		true 
	);
	
	page_send( 200, $page_t, true );
}


/**
 *  Rebuild index and cache output
 */
function runIndex( string $event, array $hook, array $params ) {
	// Pagination prep
	$page	= ( int ) ( $params['page'] ?? 1 );
	$ilimit	= config( 'index_limit', 60, 'int' );
	$start	= ( $page - 1 ) * $ilimit;
	
	// Load index
	$posts	= loadIndex( $start, $ilimit );
	
	if ( empty( $posts ) ) {
		// No more posts
		sendNotFound();
	}
	
	$ptitle	= config( 'page_title', config_default_title() );
	$psub	= config( 'page_sub', config_default_desc() );
	
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
	
	$prefix	= Text::slash_path( pageRoutePath(), true ) . 'archive/';
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
			hook_wrap(
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
				hook_wrap(
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
	hook_wrap( 
		'beforepostindex', 
		'afterpostindex', 
		template( 'tpl_index_wrap' ), 
		[ 'items' => $out ] 
	);

	$links		= config( 'main_links', [], 'json' );
	$mlinks		= setting( 'default_main_links', $links );
	$heading	= 
	hook_wrap( 
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
	hook_wrap( 
		'beforearchiveindex',
		'afterarchiveindex',
		template( 'tpl_full_page' ), [
			'page_title'	=> $ptitle,
			'post_title'	=> $ptitle,
			'lang'		=> config( 'language', config_default_lang() ),
			'home'		=> pageRoutePath(),
			'feedlink'	=> pageRoutePath( 'feed' ),
			'body_before'	=> $heading,
			'body'		=> $out,
			'body_after'	=> $pages . pageFooter()
		], 
		true 
	);
	
	page_send( 200, $page_t, true );
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
				'default'	=> 20
			]
		],
		'index_limit'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'flags'		=> \FILTER_REQUIRE_SCALAR,
			'options'	=> [
				'min_range'	=> 1,
				'max_range'	=> 500,
				'default'	=> 60
			]
		],
		'max_page' => [
			'filter'	=> \FILTER_VALIDATE_INT,
			'flags'		=> \FILTER_REQUIRE_SCALAR,
			'options'	=> [
				'min_range'	=> 1,
				'max_range'	=> 5000,
				'default'	=> 500
			]
		],
		'max_url_size' => [
			'filter'	=> \FILTER_VALIDATE_INT,
			'flags'		=> \FILTER_REQUIRE_SCALAR,
			'options'	=> [
				'min_range'	=> 255,
				'max_range'	=> 2048,
				'default'	=> 512
			]
		],
		'summary_level'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'flags'		=> \FILTER_REQUIRE_SCALAR,
			'options'	=> [
				'min_range'	=> 0,
				'max_range'	=> 2,
				'default'	=> 0
			]
		],
		'feature_lines'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'flags'		=> \FILTER_REQUIRE_SCALAR,
			'options'	=> [
				'min_range'	=> 1,
				'max_range'	=> 10,
				'default'	=> 5
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
				'default' => config_default_tz()
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
			'options'	=> [ 'default'	=> '' ]
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
				'default'	=> 20
			]
		],
		
		// Cache settings
		'cache_ttl'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'flags'		=> \FILTER_REQUIRE_SCALAR,
			'options'	=> [
				'min_range'	=> 300,
				'max_range'	=> 604800,
				'default'	=> 3600
			]
		],
		
		// Database connection timeout
		'data_timeout'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'flags'		=> \FILTER_REQUIRE_SCALAR,
			'options'	=> [
				'min_range'	=> 1,
				'max_range'	=> 60,
				'default'	=> 5
			]
		],
		
		// Pagination
		'year_start'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'flags'		=> \FILTER_REQUIRE_SCALAR,
			'options'	=> [
				'min_range'	=> 1900,
				'max_range'	=> $ye,
				'default'	=> 1990
			]
		],
		
		// Related and sibling display
		'related_limit'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'flags'		=> \FILTER_REQUIRE_SCALAR,
			'options'	=> [
				'min_range'	=> 1,
				'max_range'	=> 20,
				'default'	=> 5
			]
		],
		'show_siblings'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'flags'		=> \FILTER_REQUIRE_SCALAR,
			'options'	=> [
				'min_range'	=> 0,
				'max_range'	=> 1,
				'default'	=> 1
			]
		],
		'show_related'	=> [
			'filter'	=> \FILTER_VALIDATE_INT, 
			'flags'		=> \FILTER_REQUIRE_SCALAR, 
			'options'	=> [
				'min_range'	=> 0,
				'max_range'	=> 1,
				'default'	=> 1
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
				return Util::json_uarray( $v );
			}
		], 
		
		// Log rollover size
		'max_log_size'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'flags'		=> \FILTER_REQUIRE_SCALAR,
			'options'	=> [
				'min_range'	=> 1024,
				'max_range'	=> 5000000,
				'default'	=> 5000000
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
				'default'	=> 16
			]
		],
		'session_exp' => [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 300,
				'max_range'	=> 3600,
				'default'	=> 3600
			]
		],
		
		// Form settings
		'token_bytes'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 8,
				'max_range'	=> 64,
				'default'	=> 12
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
				'default'	=> 1
			]
 		],
		'allow_post'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 0,
				'max_range'	=> 1,
				'default'	=> 0
			]
		],  
		'frame_whitelist'=> [
			'filter'	=> \FILTER_CALLBACK,
			'flags'		=> \FILTER_REQUIRE_ARRAY,
			'options'	=> 'Sanitize::url'
		], 
		
		// Templating settings
		'asset_dir'	=> [
			'filter'	=> \FILTER_VALIDATE_URL,
			'options'	=> [ 'default' => 'assets/' ],
		],
		'plugin_asset_dir'	=> [
			'filter'	=> \FILTER_VALIDATE_URL,
			'options'	=> [ 'default' => 'plugins/' ],
		],
		'style_limit'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 1,
				'max_range'	=> 50,
				'default'	=> 10
			]
		],
		'script_limit'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 1,
				'max_range'	=> 50,
				'default'	=> 10
			]
		],
		'meta_limit'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 1,
				'max_range'	=> 50,
				'default'	=> 10
			]
		]
	];
	
	// Filter passed params, leaving out unset ones
	$data			= 
	\filter_var_array( $params, $filter, false );
	
	$fmt = Container::instance()->get( 'Format' );
	if ( !empty( $data['ext_whitelist'] ) ) {
		$data['ext_whitelist']	= 
			$fmt->whitelists( $data['ext_whitelist'], true );
	}
	
	if ( isset( $data['nonce_hash'] ) ) {
		$data['nonce_hash']	= 
		hashAlgo( ( string ) $data['nonce_hash'], \NONCE_HASH );
	}

 	if ( isset( $data['plugins_enabled'] ) ) {
		$data['plugins_enabled'] = 
			\array_filter( $data['plugins_enabled'], 'Sanitize::sdir' );
 	}
	
	return \array_merge( $hook, $data );
}


// Start application
startup();



