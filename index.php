<?php declare( strict_types = 1 );
/**
 *  Bare: A single file directory-to-blog
 */


/**
 *  Relative path based on current file location
 */
define( 'PATH',		\realpath( \dirname( __FILE__ ) ) . '/' );

// Post directory
define( 'POSTS',	PATH . 'posts/' );

// Cache directory
define( 'CACHE',	PATH . 'cache/' );

// Cached index timeout
define( 'CACHE_TTL',	3200 );

// Friendly date format
define( 'DATE_NICE',	'l, F j, Y' );

// Site title
define( 'PAGE_TITLE',	'Rustic Cyberpunk' );

// Site subtitle/tagline
define( 'PAGE_SUB',	'Coffee. Code. Cabins.' );

// Site link
define( 'PAGE_LINK',	'/' );

// Number of posts per page
define( 'PAGE_LIMIT',	12 );

// Maximum page index
define( 'MAX_PAGE',	500 );

// Starting date for post archive
define( 'YEAR_START',	2015 );

// Ending date for post archive
define( 'YEAR_END',	2099 );

// General page template
define( 'TPL_PAGE',		<<<HTML
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width">
<link rel="alternate" type="application/rss+xml" title="{page_title}" href="/feed">
<title>{page_title}</title>
<link rel="stylesheet" href="/style.css">
</head>
<body>
<main class="block">
<header>
	<h1><a href="/">{page_title}</a></h1>
	<p>{tagline}</p>
</header>
{body}
{paginate}
{footer}
</main>
</body>
</html>
HTML
);

define( 'TPL_FOOTER',		<<<HTML

HTML
);

define( 'TPL_NOPOSTS',		<<<HTML
	<p>No more posts. Return <a href="/">home</a>.</p>
HTML
);

// General post template
define( 'TPL_POST',		<<<HTML
<article class="post">
	<header>
		<time class="mark" datetime="{date_utc}">{date_stamp}</time>
		<h2><a href="{permalink}">{title}</a></h2>
	</header>
	{body}
</article>
HTML
);

define( 'TPL_LINK',		<<<HTML
	<li><a href="{url}">{text}</a></li>
HTML
);

define( 'TPL_INDEX',		<<<HTML
	<li><time datetime="{date_utc}">{date_stamp}</time>
		<a href="{permalink}">{title}</a></li>
HTML
);

define( 'TPL_PREVIOUS',		'Previous' );
define( 'TPL_NEXT',		'Next' );

// Feed index template
define( 'TPL_FEED',		<<<XML
<?xml version="1.0" encoding="UTF-8" ?>
<rss version="2.0">
	<title>{page_title}</title>
	<link>{home}</link>
	<pubDate>{date_gen}</pubDate>
	{body}
</feed>
XML
);

// Feed item template
define( 'TPL_ITEM',		<<<XML
<entry>
	<title>{title}</title>
	<link rel="alternate" type="text/html" href="{permalink}"/>
	<updated>{date_rfc}</updated>
	<content type="html"><![CDATA[{body}]]></content>
</entry>
XML
);



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
	"img"		: [ "style", "class", "src", "height", 
				"width", "alt", "longdesc", 
				"title", "hspace", "vspace" ],
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
	
	"q"		: [ "style", "class", "cite" ],
	"cite"		: [ "style", "class" ],
	"abbr"		: [ "style", "class" ],
	"blockquote"	: [ "style", "class", "cite" ],
	"body"		: []
}
JSON
);

// Default content security policy
define( 'DEFAULT_JCSP',		<<<JSON
{
	"default-src"		: "'none'",
	"img-src"		: "*",
	"style-src"		: "'self'",
	"script-src"		: "'self'",
	"form-action"		: "'self'",
	"frame-ancestors"	: "'self' www.youtube.com player.vimeo.com"
}
JSON
);

/**
 *  URL validation regular expressions
 */
define(
	'RX_URL', 
	'~^(http|ftp)(s)?\:\/\/((([a-z|0-9|\-]{1,25})(\.)?){2,9})($|/.*$){4,255}$~i'
);
define( 'RX_XSS2',		'/(<(s(?:cript|tyle)).*?)/ism' );
define( 'RX_XSS3',		'/(document\.|window\.|eval\(|\(\))/ism' );
define( 'RX_XSS4',		'/(\\~\/|\.\.|\\\\|\-\-)/sm' );


// URL routing placeholders
define( 'ROUTE_MARK',	<<<JSON
{
	"*"	: "(?<all>.+)",
	":id"	: "(?<id>[1-9][0-9]*)",
	":ids"	: "(?<ids>[1-9][0-9,]*)",
	":num"	: "(?<num>[0-9]{1,3})",
	":page"	: "(?<page>[1-9][0-9]*)",
	":user"	: "(?<user>[\\\\pL\\\\pN\\\\s-]{2,30})",
	":label": "(?<label>[\\\\pL\\\\pN\\\\s_-]{1,30})",
	":tag"	: "(?<tag>[\\\\pL\\\\pN\\\\s_\\\\,-]{1,30})",
	":year"	: "(?<year>[2][0-9]{3})",
	":month": "(?<month>[0-3][0-9]{1})",
	":day"	: "(?<day>[0-9][0-9]{1})",
	":slug"	: "(?<slug>[\\\\pL\\\\-\\\\d]{1,100})",
	":file"	: "(?<file>[\\\\pL_\\\\-\\\\d\\\\.\\\\s]{1,120})",
	":redir": "(?<redir>[a-z_\\\\:\\\\/\\\\-\\\\d\\\\.\\\\s]{1,120})"
}
JSON
);

/**
 *  Messages
 */
define( 'MSG_NOTFOUND',		'Page not found' );
define( 'MSG_NOROUTE',		'No route defined' );
define( 'MSG_CODEDETECT',	'Server-side code detected' );


/**
 *  Helpers
 */

/**
 *  Suhosin aware checking for function availability
 *  
 *  @param string $func Function name
 *  @return boolean true If the function exists
 */
function missing( $func ) {
	static $exts;
	static $blocked;
	
	if ( \extension_loaded( 'suhosin' ) ) {
		if ( !isset( $exts ) ) {
			$exts = \ini_get( 'suhosin.executor.func.blacklist' );
		}
		if ( !empty( $exts ) ) {
			if ( !isset( $blocked ) ) {
				$blocked = \explode( ',', \strtolower( $exts ) );
				$blocked = \array_map( 'trim', $blocked );
			}
			
			$search = \strtolower( $func );
			
			return (
				false	== \function_exists( $func ) && 
				true	== \array_search( $search, $blocked ) 
			);
		}
	}
	
	return !\function_exists( $func );
}

/**
 *  Load file contents and check for any server-side code		
 */
function loadFile( $name ) {
	static $loaded	= [];
	
	// Check if already loaded
	if ( isset( $loaded[$name] ) ) {
		return $loaded[$name];
	}
	
	if ( \file_exists( $name ) ) {
		$data = \file_get_contents( $name );
		if ( false !== \strpos( $data, '<?' ) ) {
			die( MSG_CODEDETECT );
		}
		$loaded[$name] = $data;
		return $data;
	}
	
	return null;
}

function paginate( $page, $prefix, $posts ) {
	$c	= count( $posts );
	$out	= '';
	if ( $page > 1 ) {
		$pm1	= $page - 1;
		$p	= ( $pm1 > 1 )? 
				( $prefix . 'page' . $pm1 ) : $prefix;
		$out	.= 
		\strtr( TPL_LINK, [ 
			'{url}'		=> $p,
			'{text}'	=> TPL_PREVIOUS
		] ); 
	}
	
	if ( $c >= PAGE_LIMIT ) {
		$out	.=
		\strtr( TPL_LINK, [ 
			'{url}'		=> $prefix . 'page'. ( $page + 1 ),
			'{text}'	=> TPL_NEXT
		] ); 
	}
	
	return '<nav><ul>' . $out . '</ul></nav>';
}


/**
 *  Caching
 */

/**
 *  Create cache save path based on current cache directory
 *  
 *  @param string	$key	Generated cache key
 *  @param bool		$create Create path structure if true
 *  @param string	$root	Default page root to begin
 *  @param int		$size	Path chunk size
 *  @return string
 */
function cachePath(
	string		$key,
	bool		$create,
	string		$root		= \CACHE,
	int		$size		= 8
) : string {
	$s	= '/';
	$segs	= \rtrim( $root, $s ) . $s;
	$parts	= \str_split( $key, $size );
	
	// Only getting creation path
	if ( !$create ) {
		return
		$segs . $s . \implode( $s, $parts ) . $s . $key;
	}
	
	// Iterate through segments and create each directory
	foreach ( $parts as $part ) {
		$segs .= $part . $s;
		writeDir( $segs );
	}
	
	return $segs . $key;
}

/**
 *  Create a directory if it doesn't exist
 *  Owner: read/write
 *  Everyone else: read
 *  
 *  @param string	$dir	Directory to make / set permissions
 */
function writeDir( string $dir ) {
	$o = \umask( 0 );
	if ( !\is_dir( $dir ) ) {
		\mkdir( $dir, 0644, true );
	}
	\umask( $o );
}

/**
 *  Check if cache content exists and hasn't expired yet
 *  
 *  @param string	$path		Cache data file
 *  @return bool
 */
function cacheHit( string $path = '' ) : bool {
	if ( empty( $path ) ) {
		return false;
	}
	
	if ( \file_exists( $path ) ) {
		$t = \filemtime( $path );
		if ( false === $t ) {
			return false;
		}
		return ( time() - $t ) < CACHE_TTL;
	}
	
	return false;
}

/**
 *  Get cached data (if any) by URI key
 *  
 *  @return string
 */
function getCache( string $uri ) : string {
	$key	= \hash( 'sha256', $uri );
	$path	= cachePath( $key, false );
	
	if ( cacheHit( $path ) ) {
		return \loadFile( $path );
	}
	
	return '';
}

/**
 *  Save content to cache
 *  
 *  @param string	$uri		URI to set cache to
 *  @param string	$content	Cache data
 */
function saveCache( string $uri, string $content ) : bool {
	$key	= \hash( 'sha256', $uri );
	$path	= cachePath( $key, true );
	
	// Something went wrong?
	if ( empty( $path ) ) {
		return false;
	}
	
	$dir	= \realpath( \dirname( $path ) );
	
	// Check if subpath creation was successful
	if ( false !== $dir && \is_dir( $dir ) ) {
		return 
		\file_put_contents( $path, $content ) ? true : false;
	}
	
	return false;
}


/**
 *  Content formatting
 */

/**
 *  UTC timestamp
 */
function utc( $stamp = null ) : string {
	return \gmdate( 'Y-m-d H:i:s', \strtotime( $stamp ) );
}

/**
 *  Friendly datetime stamp
 */
function dateNice( $stamp = null ) : string {
	return \gmdate( DATE_NICE, \strtotime( $stamp ) );
}

/**
 *  Build permalink with page slug with date
 */
function dateSlug( string $slug, string $stamp ) {
	return 
	\gmdate( '/Y/m/d/', \strtotime( $stamp ) ) . 
	\ltrim( $slug, '/' );
}

/**
 *  Feed timestamp
 */
function dateRfc( $stamp = null ) : string {
	return 
	\gmdate( \DATE_RFC2822, \strtotime( $stamp ?? 'now' ) );
}

/**
 *  Clean entry title
 *  
 *  @param string	$title	Raw title entered by the user
 *  @return string
 */
function title( string $text ) : string {
	return smartTrim( pacify( $text ) );
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
	$len	= \mb_strlen( $val );
	
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
	if ( \mb_strlen( $out ) > $max + 10 ) {
		$out = \mb_substr( $out, 0, $max );
	}
	
	return $out;
}

/**
 *  Ensure date arguments don't exceed today
 */
function enforceDates( array $args ) : array {
	$now	= time();
	
	// Requested year/month/day
	$year		= ( int ) ( $args['year'] ?? \date( 'Y', $now ) );
	$month		= ( int ) ( $args['month'] ?? \date( 'n', $now ) );
	$day		= ( int ) ( $args['day'] ?? \date( 'j', $now ) );
	
	// Current year/month/day
	$y		= ( int ) \date( 'Y', $now );
	$m		= ( int ) \date( 'n', $now );
	$d		= ( int ) \date( 'j', $now );
	
	// Enforce date ranges
	$year		= ( $year > $y || $year < YEAR_START ) ? 
				$y : $year;
	
	// Current year? Enforce month to current month
	if ( $y == $year ) {
		$month	= ( $month > $m || $month <= 0 ) ? 
				$m : $month;
	
	// No more than 12 months
	} else {
		$month = ( $month <= 0 || $month > 12 ) ? 
				1 : $month;
	}
	
	// Days in requested year and month
	$days	= \date( 't', \mktime( 0, 0, 0, $month, 1, $year ) );
	
	// No more than the number of days in requested month
	$day	= ( $day <= 0 || $day > $days ) ? 1 : $day;
	
	// No more than the current day, if it's the current year/month
	if ( $year == $y && $month == $m ) {
		if ( $day > $d ) {
			$day = $d;
		}
	}
	
	// Format date to string array
	return [
		( string ) $year, 
		\sprintf( '%02d', $month ), 
		\sprintf( '%02d', $day ) 
	];
}

/**
 *  Safely encode to JSON
 */
function encode( array $data ) : string {
	return 
	\json_encode( 
		$data, 
		\JSON_HEX_TAG | \JSON_HEX_APOS | \JSON_HEX_QUOT | 
		\JSON_HEX_AMP | \JSON_UNESCAPED_UNICODE | 
		\JSON_PRETTY_PRINT 
	);
}

/**
 *  Safely decode JSON to array
 */
function decode( string $data ) : array {
	$data = 
	\json_decode( 
		\utf8_encode( $data ), true, 10, 
		\JSON_BIGINT_AS_STRING
	);
	
	if ( empty( $data ) || false === $data ) {
		return [];
	}
	
	return $data;
}

/**
 *  Strip unusable characters from raw text/html and conform to UTF-8
 *  
 *  @param string	$html	Raw content body to be cleaned
 *  @param bool		$entities Convert to HTML entities (defaults to true)
 *  @return string
 */
function pacify( 
	string		$html, 
	bool		$entities	= false 
) : string {
	$html		= \trim( $html );
	$html		= \iconv( 'UTF-8', 'UTF-8//IGNORE', $html );
	
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
	if ( $entities ) {
		$html	= 
		\mb_convert_encoding( 
			$html, 'HTML-ENTITIES', "UTF-8" 
		);
	}
	
	return \trim( $html );
}

/**
 *  HTML safe character entities in UTF-8
 *  
 *  @param string	$v	Raw text to turn to HTML entities
 *  @param bool		$quotes	Convert quotes (defaults to true)
 *  @return string
 */
function entities( 
	string		$v, 
	bool		$quotes	= true 
) : string {
	if ( $quotes ) {
		$v	=
		\htmlentities( 
			\iconv( 'UTF-8', 'UTF-8', $v ), 
			\ENT_QUOTES | \ENT_SUBSTITUTE, 
			'UTF-8'
		);
	} else {
		$v =  \htmlentities( 
			\iconv( 'UTF-8', 'UTF-8', $v ), 
			\ENT_NOQUOTES | \ENT_SUBSTITUTE, 
			'UTF-8'
		);
	}
	
	$v = \str_replace( ' ', '&nbsp;', $v );
	return \str_replace( '	', '&nbsp;&nbsp;&nbsp;&nbsp;', $v );
}

/**
 *  Filter URL
 *  This is not a 100% foolproof method, but it's better than nothing
 *  
 *  @param string	$txt	Raw URL attribute value
 *  @param bool		$xss	Filter XSS possibilities
 *  @param string	$prefix	URL prefix to prepend
 *  @return string
 */
function cleanUrl( 
	string		$txt, 
	bool		$xss		= true, 
	string		$prefix	= '' 
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
	
	return entities( $prefix . $txt );
}
	
/**
 *  Clean DOM node attribute against whitelist
 *  
 *  @param DOMNode	$node	Object DOM Node
 *  @param array	$white	Whitelist of allowed tags and params
 */
function cleanAttributes(
	\DOMNode	&$node,
	array		$white
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
				case 'href':
					$v = cleanUrl( $v );
					break;
					
				default:
					$v = entities( $v );
			}
			
			$node->setAttribute( $n, $v );
		}
	}
}

/**
 *  Scrub each node against white list
 *  @param DOMNode	$node	Document element node to filter
 *  @param array	$white	Whitelist of allowed tags and params
 *  @param array	$flush	Elements to remove from document
 */
function scrub(
	\DOMNode	$node,
	array		$white,
	array		&$flush		= []
) {
	if ( isset( $white[$node->nodeName] ) ) {
		// Clean attributes first
		cleanAttributes( $node, $white );
		if ( $node->childNodes ) {
			// Continue to other tags
			foreach ( $node->childNodes as $child ) {
				scrub( $child, $white, $flush );
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
 * @param string	$val	Filter variable
 */
function makeParagraphs( $val ) {
	/**
	 * Convert newlines to linebreaks first
	 * This is why PHP both sucks and is awesome at the same time
	 */
	$out = \nl2br( $val );
	
	$filters	= 
	[
		// Turn consecutive <br>s to paragraph breaks
		'#(?:<br\s*/?>\s*?){2,}#'	=>
		function( $m ) {
			return '<p></p><p>';
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
		
		// Block of code
		'#^\n`{3,}([\s\S]*)(^(?!\s)`{3,}.*$)\n#smU' =>
		function( $m ) {
			return
			\sprintf(
				'<pre><code>%s</code></pre>',
				entities( trim( $m[1] , '`' ) )
			);
		},
		
		// Remove <br> tags inside <pre> and <code>
		'#<(pre|code)>(.*)<\/\1>#ism'	=>
		function( $m ) {
			return 
			'<' . $m[1] . '>' . 
			\preg_replace( '#<br\s*/?>#', "", $m[2] ) . 
			'</' . $m[1] . '>';
		},
		
		// Breaks after tags
		'#</([\w\d]+)>(\s*<br\s*/?>)#'	=> 
		function( $m ) {
			return '</' . $m[1] . '>';
		},
		
		// Format inside code tags
		'/<code>(.*)<\/code>/ism'	=>
		function ( $m ) {
			return 
			\sprintf( '<pre><code>%s</code></pre>', 
				entities( \trim( $m[1] ) ) 
			);
		}
	];
	
	$out = \preg_replace_callback_array( $filters, $out );
	
	// Wrapped in a paragraph
	return '<p>' . $out . '</p>';
}

/**
 *  HTML filter
 */
function html( string $value, $prefix = '' ) : string {
	static $white;
	
	if ( !isset( $white ) ) {
		$white = decode( TAG_WHITE );
	}
	
	// Preliminary cleaning
	$html		= pacify( $value, true );
	
	// Format linebreaks and code
	$html		= makeParagraphs( $html );
	
	// Clean up HTML
	$html		= tidyup( $html );
	
	// Apply Markdown formatting
	$html		= markdown( $html, $prefix );
	
	
	// Skip errors
	$err		= \libxml_use_internal_errors( true );
	
	// HTML tag filter
	$dom		= new \DOMDocument();
	$dom->loadHTML( 
		$html, 
		\LIBXML_HTML_NOIMPLIED | \LIBXML_HTML_NODEFDTD | 
		\LIBXML_NOERROR | \LIBXML_NOWARNING | 
		\LIBXML_NOXMLDECL | \LIBXML_COMPACT | 
		\LIBXML_NOCDATA | \LIBXML_NONET
	);
	
	$domBody	= 
		$dom->getElementsByTagName( 'body' )->item( 0 );
	
	$flush		= [];
	// Iterate through every HTML element 
	foreach ( $domBody->childNodes as $node ) {
		scrub( $node, $white, $flush );
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
	
	$clean		= '';
	foreach ( $domBody->childNodes as $node ) {
		$clean .= $dom->saveHTML( $node );
	}
	
	\libxml_clear_errors();
	\libxml_use_internal_errors( $err );
	
	// Apply embedded media
	return embeds( $clean );
}

/**
 *  Tidy settings
 *  
 *  @param string	$text	Unformatted, unfiltered raw HTML
 *  @return string
 */
function tidyup( string $text ) : string {
	if ( missing( 'tidy_repair_string' ) ) {
		return $text;
	}
	
	$opt = [
		'bare'					=> 1,
		'hide-comments' 			=> 1,
		'drop-proprietary-attributes'		=> 1,
		'fix-uri'				=> 1,
		'join-styles'				=> 1,
		'output-xhtml'				=> 1,
		'merge-spans'				=> 1,
		'show-body-only'			=> 0,
		'wrap'					=> 0
	];
	
	return \trim( \tidy_repair_string( $text, $opt ) );
}

/**
 *  Embedded media
 *  
 *  @param string	$html	Pre-filtered HTML to replace media tags
 *  @return string
 */
function embeds( string $html ) : string {
	$filter		= 
	[
		// YouTube syntax
		'/\[youtube http(s)?\:\/\/(www)?\.?youtube\.com\/watch\?v=([0-9a-z_]*)\]/is'
		=> 
		'<div class="media"><iframe width="560" height="315" src="https://www.youtube.com/embed/$3" frameborder="0" allowfullscreen></iframe></div>',
		
		'/\[youtube http(s)?\:\/\/(www)?\.?youtu\.be\/([0-9a-z_]*)\]/is'
		=> 
		'<div class="media"><iframe width="560" height="315" src="https://www.youtube.com/embed/$3" frameborder="0" allowfullscreen></iframe></div>',
		
		'/\[youtube ([0-9a-z_]*)\]/is'
		=> 
		'<div class="media"><iframe width="560" height="315" src="https://www.youtube.com/embed/$1" frameborder="0" allowfullscreen></iframe></div>',
		
		// Vimeo syntax
		'/\[vimeo ([0-9]*)\]/is'
		=> 
		'<div class="media"><iframe src="https://player.vimeo.com/video/$1?portrait=0" width="500" height="281" frameborder="0" allowfullscreen></iframe></div>',
		
		'/\[vimeo http(s)?\:\/\/(www)?\.?vimeo\.com\/([0-9]*)\]/is'
		=> 
		'<div class="media"><iframe src="https://player.vimeo.com/video/$3?portrait=0" width="500" height="281" frameborder="0" allowfullscreen></iframe></div>',
		
		// Peertube
		'/\[peertube http(s)?\:\/\/(.*?)\/videos\/watch\/([0-9\-a-z_]*)\]/is'
		=>
		'<div class="media"><iframe width="560" height="315" sandbox="allow-same-origin allow-scripts" src="https://$2/videos/embed/$3" frameborder="0" allowfullscreen></iframe></div>'
	];
		
	return 
	\preg_replace( 
		\array_keys( $filter ), 
		\array_values( $filter ), 
		$html 
	);
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
	$filters	= 
	[
		// Links / Images with alt text
		'/(\!)?\[([^\[]+)\]\(([^\)]+)\)/s'	=> 
		function( $m ) use ( $prefix ) {
			$i = \trim( $m[1] );
			$t = \trim( $m[2] );
			$u = cleanUrl( \trim( $m[3] ), true, $prefix );
				
			return 
			empty( $i ) ?
				\sprintf( "<a href='%s'>%s</a>", $t, $u ) :
				\sprintf( "<img src='%s' alt='%s' />", $u, $t );
		},
		
		// Bold / Italic / Deleted / Quote text
		'/(\*(\*)?|_(_)?|\~\~|\:\")(.*?)\1/'	=>
		function( $m ) {
			$i = \strlen( $m[1] );
			$t = \trim( $m[4] );
			
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
		'/([#]{1,6}+)\s?(.+)/'			=>
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
				entities( $m[1] ) 
			);
		}
	];
	
	return
	\trim( \preg_replace_callback_array( $filters, $html ) );
}


/**
 *  HTTP Response
 */

/**
 *  Guess if current request is secure
 */
function isSecure() : bool {
	$ssl	= $_SERVER['HTTPS'] ?? '0';
	if ( $ssl == 'on' || $ssl == '1' ) {
		return true;
	}
	
	$port	= ( int ) ( $_SERVER['SERVER_PORT'] ?? 80 );
	if ( $port == 443 ) {
		return true;
	}
	
	return false;
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
	\header_remove( 'X-Powered-By' );
	
	if ( $send_type ) {
		\header( 
			'Content-Type: text/html; charset=utf-8', 
			true 
		);
	}
	
	\header( 'X-XSS-Protection: 1; mode=block', true );
	\header( 'X-Content-Type-Options: nosniff', true );
	
	// Frames should be handled via the CSP
	\header( 'X-Frame-Options: deny', true );
	
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
		foreach ( $cjp as $k => $v ) {
			$csp .= "$k $v;";
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
 *  Create HTTP status code message
 */
function httpCode(
	string		$proto,
	int		$code
) {
	switch ( $code ) {
		
		case 200:
			$msg = 'OK';
			break;
			
		case 202:
			$msg = 'Accepted';
			break;
			
		case 204:
			$msg = 'No Content';
			break;
			
		case 205:
			$msg = 'Reset Content';
			break;
			
		case 206:
			$msg = 'Partial Content';
			break;
			
		case 300:
			$msg = 'Multiple Choices';
			break;
			
		case 301:
			$msg = 'Moved Permanently';
			break;
			
		case 302:
			$msg = 'Moved Temporarily';
			break;
			
		case 303:
			$msg = 'See Other';
			break;
			
		case 304:
			$msg = 'Not Modified';
			break;
			
		case 400:
			$msg = 'Bad Request';
			break;
			
		case 401:
			$msg = 'Unauthorized';
			break;
			
		case 403:
			$msg = 'Forbidden';
			break;
			
		case 404:
			$msg = 'Not Found';
			break;
				
		case 405:
			$msg = 'Method Not Allowed';
			break;
			
		case 406:
			$msg = 'Not Acceptable';
			break;
			
		case 407:
			$msg = 'Proxy Authentication Required';
			break;
			
		case 409:
			$msg = 'Conflict';
			break;
			
		case 410:
			$msg = 'Gone';
			break;
			
		case 411:
			$msg = 'Length Required';
			break;
			
		case 412:
			$msg = 'Precondition Failed';
			break;
			
		case 413:
			$msg = 'Request Entity Too Large';
			break;
			
		case 414:
			$msg = 'Request-URI Too Large';
			break;
			
		case 415:
			$msg = 'Unsupported Media Type';
			break;
			
		case 429:
			$msg = 'Too Many Requests';
			break;
			
		case 501:
			$msg = 'Not Implemented';
			break;
			
		default:
			die( 'Unknown status code "' . $code . '"' );
	}
	
	\header( $proto . ' ' . $code . ' ' . $msg, true );
}


/**
 *  Current website with protocol prefix
 *  
 *  @return string
 */
function website() {
	$url	= isSecure() ? 'https://' : 'http://';
	return $url . $_SERVER['SERVER_NAME'];
}

/**
 *  Current full URI including website
 */
function fullURI() {
	return website() . $_SERVER['REQUEST_URI'];
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
	$proto	= $_SERVER['SERVER_PROTOCOL'] ?? 'HTTP/1.1';
	httpCode( $proto, $code );
	if ( $feed ) {
		\header(
			'Content-Type: application/rss+xml; charset=utf-8', 
			true 
		);
		preamble( '', true, false );
	} else {
		preamble();
	}
	
	echo $content;
	
	// Also save to cache?
	if ( $cache ) {
		saveCache( fullURI(), $content );
	}
	
	// End
	die();
}

/**
 *  Routing and redirection
 */

/**
 *  Paths are sent in bare. Make them suitable for matching.
 *  
 *  @param string $route URL path in plain format
 *  @return string Route in regex format
 */
function cleanRoute( array $markers, string $route ) {
	$route	= \strtr( $route, $markers );
	$regex	= \str_replace( '.', '\.', $route );
	return '@^/' . $route . '/?$@i';
}

/**
 *  Filter path parameters to get rid of numeric indexes
 */
function filterParams( array $params ) {
	\array_shift( $params );
	return \array_filter( 
		$params, 
		function( $k ) {
			return \is_string( $k );
		}, \ARRAY_FILTER_USE_KEY 
	);
}

/**
 *  Execute route
 */
function route( $routes ) {
	$path	= $_SERVER['REQUEST_URI'];
	$verb	= \strtolower( $_SERVER['REQUEST_METHOD'] );
	
	// Check directory traversal or XSS
	if ( 
		\preg_match( RX_XSS2, $path ) || 
		\preg_match( RX_XSS4, $path ) 
	) {
		send( 404, MSG_NOTFOUND );
	}
	
	switch( $verb ) {
		// Only get and head are parsed
		case 'get':
		case 'head':
			break;
		
		// Method not implemented
		default:
			send( 405 );
	}
	
	// No content sent for HEAD method
	if ( $verb == 'head' ) {
		send( 200 );
	}
	
	// Check if content is already cached for this URI
	$cache	= getCache( fullURI() );
	if ( !empty( $cache ) ) {
		send( 200, $cache );
	}
	
	static $markers;
	if ( !isset( $markers ) ) {
		$markers = decode( ROUTE_MARK );
	}
	
	\sort( $routes );
	
	// Begin matching
	foreach( $routes as $map ) {
		if ( $map[0] != $verb ) {
			continue;
		}
		
		$rx	= cleanRoute( $markers, $map[1] );
		if ( \preg_match( $rx, $path, $params ) ) {
			if ( \is_callable( $map[2] ) ) {
				$params			= 
				filterParams( $params );
				
				$params['method']	= $verb;
				\call_user_func( $map[2], $params );
			}
			break;
		}
	}
	
	send( 404, MSG_NOTFOUND );
}

/**
 *  Application
 */
function getPosts( string $root = '' ) {
	static $st =	[];
	if ( isset( $st[$root] ) ) {
		return $st[$root];
	}
	
	try {
		$dir		= 
		new \RecursiveDirectoryIterator( 
			POSTS . $root, 
			\FilesystemIterator::FOLLOW_SYMLINKS
		);
		$it		= 
		new \RecursiveIteratorIterator( 
			$dir, 
			\RecursiveIteratorIterator::SELF_FIRST,
			\RecursiveIteratorIterator::CATCH_GET_CHILD 
		);
		
		// Temp array for sorting
		$tmp		= [];
		foreach( $it as $f ) {
			$tmp[]	= $f;
		}
		
		// Sort by filename
		\usort( $tmp, function( $a, $b ) {
			return 
			$a->getRealPath() <=> $b->getRealPath() > 0 ? 
			false : true;
		});
		
		$st[$root]	= $tmp;
		return $tmp;
		
	} catch( \Exception $e ) {
		return null;
	}
}

function filterDir( $path ) {
	$lp	= \strlen( POSTS );
	if ( \strlen( $path ) < $lp ) { 
		return ''; 
	}
	$pos	= \strpos( $path, POSTS );
	if ( false === $pos ) {
		return '';
	}
	$path	= \substr(  $path, $pos + $lp );
	return \rtrim( \trim( $path ?? '' ), '.md' );
}

function postData( $raw ) {
	return \file( $raw, \FILE_IGNORE_NEW_LINES );
}

function loadPost(
	int	$year,
	int	$month,
	int	$day,
	string	$slug
) {
	$s	= '/';
	$path	= $year . $s .  
			\sprintf( '%02d', $month ) . $s . 
			\sprintf( '%02d', $day ) . $s . 
			\ltrim( $slug, $s );
	$data	= postData( POSTS . $path . '.md' );
	
	if ( empty( $data ) ) {
		return '';
	}
	
	return formatPost( $data, $path, TPL_POST );
}

/**
 *  Get published date from path
 */
function getPub( $path ) : string {
	return utc( \substr( $path, 0, \strrpos( $path, '/' ) ) );	
}

function checkPub( $pub ) : bool {
	if ( \strtotime( $pub ) <= time() ) {
		return true;
	}
	
	return false;
}

function isPost( $file ) : bool {
	// Skip directories
	if ( $file->isDir() ) {
		return false;
	}
	if ( $ext = $file->getExtension() ) {
		if ( strtolower( $ext ) == 'md' ) {
			return true;
		}
	}
	return false;	
}


function loadPosts(
	int	$page	= 1,
	string	$prefix	= '',
	bool	$feed	= false
) : array {
	$it	= getPosts( $prefix );
	if ( empty( $it ) ) {
		return [];
	}
	
	$i	= 0;
	$posts	= [];
	$start	= ( $page - 1 ) * PAGE_LIMIT;
	$end	= $start + PAGE_LIMIT;
	
	foreach( $it as $file ) {
		
		// Check if it's a post
		if ( !isPost( $file ) ) {
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
		
		$pub		= getPub( $path );
		// We're below offset
		if ( $i >= $start && checkPub( $pub ) ) {
			$data		= postData( $raw );
			if ( empty( $data ) || false === $data ) {
				continue;
			}
			
			$tpl		= $feed ? TPL_ITEM : TPL_POST;
			$posts[$path]	= formatPost( $data, $path, $tpl );
		}
		
		// Increment number of entries if published
		if ( checkPub( $pub ) ) {
			$i++;
		}
	}
	return $posts;
}

function loadIndex() {
	$it	= getPosts();
	if ( empty( $it ) ) {
		return [];
	}
	$lastDir	= '';
	$posts		= [];
	foreach( $it as $file ) {
		$raw	= $file->getRealPath();
		$path	= filterDir( $raw );
		if ( empty( $path ) ) {
			continue;
		}
		
		// Already added?
		if ( \array_key_exists( $path, $posts ) ) {
			continue;
		}
		
		if ( $file->isDir() ) {
			$lastDir	= $path;
			if ( empty( $posts[$lastDir] ) ) {
				$posts[$lastDir] = [];
			}
		} else {
			// Check if it's a post
			if ( !isPost( $file ) ) {
				continue;
			}
			
			$pub		= getPub( $path );
			if ( !checkPub( $pub ) ) {
				continue;
			}
			
			$post		= postData( $raw );
			if ( empty( $post ) || false == $post ) {
				continue;
			}
			$post		= \array_slice( $post, 0, 2 );
			
			// Apply metadata
			metadata( $title, $perm, $pub, $post, $path );
			
			// Format metadata
			$posts[$lastDir][] = formatMeta( $title, $pub, $path );
		}
	}
	
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

function formatMeta( $title, $pub, $path ) {
	return [
		'{title}'	=> $title,
		'{date_utc}'	=> $pub,
		'{date_rfc}'	=> dateRfc( $pub ),
		'{date_stamp}'	=> dateNice( $pub ),
		'{permalink}'	=> $path
	];
}

// 
function formatPost(
	array	$post,
	string	$path,
	string	$tpl
) {
	// Check for post validity
	if ( count( $post ) < 3 ) {
		return '';
	}
	$pub		= getPub( $path );
	if ( !checkPub( $pub ) ) {
		send( 404, MSG_NOTFOUND );
	}
			
	// Apply metadata
	metadata( $title, $perm, $pub, $post, $path );
	// Format metadata
	
	$data	= formatMeta( $title, $pub, $perm );
	
	// Everything else is the body
	$post	= \array_slice( $post, 2 );
	$data['{body}'] = html( \implode( "\n", $post ) ); 
	
	return \strtr( $tpl, $data );
}


function filterRequest( array $params ) {
	$now	= time();
	$filter	= [
		'page'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 1,
				'max_range'	=> MAX_PAGE,
				'default'	=> 1
			]
		],
		'year'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> YEAR_START,
				'max_range'	=> YEAR_END,
				'default'	=> 
				( int ) \date( 'Y', $now )
			]
		],
		'month'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 1,
				'max_range'	=> 12,
				'default'	=> 
				( int ) \date( 'n', $now )
			]
		],
		'day'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 1,
				'max_range'	=> 31,
				'default'	=> 
				( int ) \date( 'j', $now )
			]
		],
		'slug'	=> [
			'filter'	=> \FILTER_SANITIZE_FULL_SPECIAL_CHARS,
			'options'	=> [ 'default' => '' ]
		]
	];
	
	return \filter_var_array( $params, $filter );
}


/**
 *  Route actions
 */

/**
 *  Archived posts by date
 */
function archive( $params ) {
	$data	= filterRequest( $params );
	$page	= ( int ) ( $data['page'] ?? 1 );
	$prefix	= '';
	$s	= '/';
	
	// Full archive
	if ( empty( $params['year'] ) ) {
		$posts	= loadPosts( $page );
		$prefix	= $s;
	
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
		$prefix	= $s . $stamp;
		$posts	= loadPosts( $page, $stamp );
	}
	
	$tpl	= [
		'{page_title}'	=> PAGE_TITLE,
		'{tagline}'	=> PAGE_SUB,
		'{footer}'	=> TPL_FOOTER
	];
	
	if ( empty( $posts ) ) {
		$tpl['{body}']		= TPL_NOPOSTS;
		$tpl['{paginate}']	= 
		'<nav><ul><a href="/">Home</a></ul></nav>';
	} else {
		$tpl['{body}']		= \implode( '', $posts );
		$tpl['{paginate}']	= 
		paginate( $page, $prefix, $posts );
	}
	
	send( 200, \strtr( TPL_PAGE, $tpl ), true );
}

/**
 *  Syndication feed
 */
function feed( $params ) {
	$posts	= loadPosts( 1, '', true );
	if ( empty( $posts ) ) {
		send( 404, MSG_NOTFOUND );
	}
	
	$tpl	= [
		'{page_title}'	=> PAGE_TITLE,
		'{home}'	=> PAGE_LINK,
		'{tagline}'	=> PAGE_SUB,
		'{date_gen}'	=> dateRfc(),
		'{body}'	=> \implode( '', $posts )
	];
	
	send( 200, \strtr( TPL_FEED, $tpl  ), true, true );
}

/**
 *  View single post
 */
function post( $params ) {
	$data	= filterRequest( $params );
	$post	= 
	loadPost( 
		$data['year'], 
		$data['month'], 
		$data['day'], 
		$data['slug'] 
	);
	
	if ( empty( $post ) ) {
		send( 404, MSG_NOTFOUND );
	}
	
	$tpl	= [
		'{page_title}'	=> PAGE_TITLE,
		'{tagline}'	=> PAGE_SUB,
		'{body}'	=> $post,
		'{paginate}'	=> 
		'<nav><ul><a href="/">Home</a></ul></nav>',
		'{footer}'	=> TPL_FOOTER
	];
	send( 200, \strtr( TPL_PAGE, $tpl ), true );
}

/**
 *  Rebuild index cache
 */
function reindex( $params ) {
	$posts	= loadIndex();
	if ( empty( $posts ) ) {
		die( 'No posts created' );
	}
	
	$out	= '<ul class="index">';
	foreach( $posts as $k => $v ) {
		if ( is_array( $v ) ) {
			foreach( $v as $p ) {
				$out .= \strtr( TPL_INDEX, $p );
			}
		}
	}
	$out	.= '</ul>';
	
	$tpl	= [
		'{page_title}'	=> PAGE_TITLE,
		'{tagline}'	=> PAGE_SUB,
		'{body}'	=> $out,
		'{paginate}'	=> '',
		'{footer}'	=> TPL_FOOTER
	];
	
	send( 200, \strtr( TPL_PAGE, $tpl ), true );
}

/**
 *  Page routes
 */
$routes		= [
	/**
	 *  Homepage
	 */
	[ 'get', '',					'archive' ],
	[ 'get', 'page:page',				'archive' ],
	[ 'get', 'feed',				'feed' ],
	
	/**
	 *  Archive routes
	 */
	[ 'get', ':year',				'archive' ],
	[ 'get', ':year/page:page',			'archive' ],
	[ 'get', ':year/:month',			'archive' ],
	[ 'get', ':year/:month/page:page',		'archive' ],
	[ 'get', ':year/:month/:day',			'archive' ],
	
	/**
	 *  Generate archive cache
	 */
	[ 'get', 'archive',				'reindex' ],
	
	/**
	 *  Single post
	 */
	[ 'get', ':year/:month/:day/:slug',		'post' ]
];

// Run
route( $routes );

