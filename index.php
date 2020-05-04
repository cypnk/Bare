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


// Post directory
define( 'POSTS',	PATH . 'posts/' );

// Cache directory
define( 'CACHE',	PATH . 'cache/' );

// Cached index timeout
define( 'CACHE_TTL',	3200 );

// Uploaded file location (usually the same as POSTS)
define( 'FILE_PATH',	POSTS );
// Use this instead if you keep uploaded files outside the web root
// define( 'FILE_PATH',	\realpath( \dirname( __FILE__, 2 ) ) . '/uploads/' );

// Configuration filename (optional, overrides some constants here)
define( 'CONFIG',		'config.json' );

// Error log filename (will be created if it doesn't exist)
define( 'ERROR',		'errors.log' );

// Custom error file folder (optional)
define( 'ERROR_ROOT',		\realpath( \dirname( __FILE__ ) ) . '/errors/' );
// Use this if error files are outside web root
// define( 'ERROR_ROOT',		\realpath( \dirname( __FILE__, 2 ) ) . '/errors/' );

// Plugins directory
define( 'PLUGINS',	PATH . 'plugins/' );
// Use this if you keep plugins outside the web root
// define( 'PLUGINS',		\realpath( \dirname( __FILE__, 2 ) ) . '/plugins/' );

// Whitelisted plugins as comma separated list
define( 'PLUGINS_ENABLED', '' );

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

// Number of posts on archive index page
define( 'INDEX_LIMIT',	60 );

// Make this 1 (meaning true) if testing locally or running on Tor
define( 'SKIP_LOCAL', 	1 );

// Maximum page index
define( 'MAX_PAGE',	500 );

// Starting date for post archive
define( 'YEAR_START',	2015 );

// Ending date for post archive
define( 'YEAR_END',	2099 );

// Allow POST method 
// Should be 0 (meaning false) unless if you have a special need
// E.G. a plugin
define( 'ALLOW_POST',	0 );

// Maximum number of tags to recognize in each post
define( 'TAG_LIMIT',	5 );

// Extensions generally safe to send as-is
define( 'SAFE_EXT',	
	'css, js, ico, txt, html, jpg, jpeg, gif, bmp, png, tif, tiff, ttf, otf' );

// Form nonce size
define( 'TOKEN_BYTES', 		8 );

// Form token nonce hash
define( 'NONCE_HASH',		'tiger160,4' );

// Show sibling (next/previous published) posts
define( 'SHOW_SIBLINGS',	1 );

// Show related posts based on content in currently viewing post
define( 'SHOW_RELATED',		1 );

// Maximum number of related posts to show
define( 'RELATED_LIMIT',	5 );

// Send actual Last-Modified header for files 
define( 'SHOW_MODIFIED',	0 );

// Default language
define( 'LANGUAGE',	'en-US' );

// Default local timezone when not set in config.json
define( 'TIMEZONE',		'America/New_York' );
// For a list of valid values for this, see:
// https://www.php.net/manual/en/timezones.php

// Whitelist of allowed server host names
define( 'SERVER_WHITE',		'kpz62k4pnyh5g5t2efecabkywt2aiwcnqylthqyywilqgxeiipen5xid.onion' );

// Application name
define( 'APP_NAME',		'Bare' );


// General page template
define( 'TPL_PAGE',		<<<HTML
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="alternate" type="application/xml" title="{page_title}" href="{home}feed">
<title>{post_title}</title>
<link rel="stylesheet" href="{home}style.css">
</head>
<body>

<header>
<div class="content">
	<h1><a href="{home}">{page_title}</a></h1>
	<p>{tagline}</p>
	<nav class="main">
	<ul>
		<li><a href="/archive">Archive</a></li>
		<li><a href="/feed">Feed</a></li>
	</ul>
	</nav>
	{search_form}
</div>
</header>
<main>
{body}
<div class="content">
{paginate}
</div>
{footer}
</main>
</body>
</html>
HTML
);

define( 'TPL_FOOTER',		<<<HTML
<footer>
<div class="content">
	<nav>
	<ul>
		<li><a href="{home}archive">Archive</a></li>
		<li><a href="{home}feed">Feed</a></li>
	</ul>
	</nav>
</div>
</footer>
HTML
);

// Form anti-XSRF hidden inputs (required on all forms)
define( 'TPL_INPUT_XSRF',	<<<HTML
<input type="hidden" name="nonce" value="{nonce}">
<input type="hidden" name="token" value="{token}">
HTML
);

// Search form
define( 'TPL_SEARCHFORM',	<<<HTML
<form action="{home}" method="get">
{xsrf}
<input type="search" name="find" required> 
	<input type="submit" value="Search">
</form>
HTML
);


// Generic error page
define( 'TPL_ERROR_PAGE',	<<<HTML
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Error {code} - {page_title}</title>
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
<p><a href="{home}">Return home</a></p>
</div>
</main>
</body>
</html>
HTML
);

define( 'TPL_NOPOSTS',		<<<HTML
<div class="content">
	<p>No more posts. Return <a href="{home}">home</a>.</p>
</div>
HTML
);

// General post template
define( 'TPL_POST',		<<<HTML
<article>
	<header>
	<div class="content">
		<h2><a href="{permalink}">{title}</a></h2>
		<time datetime="{date_utc}">{date_stamp}</time>
	</div>
	</header>
	<div class="content">
		{body}
		{tags}
	</div>
</article>
HTML
);

define( 'TPL_TAGWRAP', <<<HTML
<nav class="tags">Tags: <ul class="tags">{tags}</ul></nav>
HTML
);

define( 'TPL_LINK',		<<<HTML
	<li><a href="{url}">{text}</a></li>
HTML
);

define( 'TPL_TAGLINK',		<<<HTML
	<li><a href="{url}">{text}</a></li>
HTML
);

define( 'TPL_PREVLINK',		<<<HTML
	<li>&lt; <a href="{url}">{text}</a></li>
HTML
);

define( 'TPL_NEXTLINK',		<<<HTML
	<li><a href="{url}">{text}</a> &gt;</li>
HTML
);

define( 'TPL_NAV',		<<<HTML
	<nav><ul>{text}</ul></nav>
HTML
);

define( 'TPL_SIBLINGNAV',	<<<HTML
	<nav class="siblings"><ul>{text}</ul></nav>
HTML
);

define( 'TPL_RELATEDNAV',	<<<HTML
	<h3>Related</h3>
	<nav class="related"><ul>{text}</ul></nav>
HTML
);

define( 'TPL_INDEX_WRAP',	<<<HTML
<div class="content">
<ul class="index">{items}</ul>
</div>
HTML
);

define( 'TPL_INDEX',		<<<HTML
	<li><time datetime="{date_utc}">{date_stamp}</time>
		<a href="{permalink}">{title}</a>
		{tags}</li>
HTML
);

define( 'TPL_PREVIOUS',		'Previous' );
define( 'TPL_NEXT',		'Next' );
define( 'TPL_HOME',		'Home' );

// Feed index template
define( 'TPL_FEED',		<<<XML
<?xml version="1.0" encoding="UTF-8" ?>
<rss version="2.0">
	<title>{page_title}</title>
	<link>{home}</link>
	<pubDate>{date_gen}</pubDate>
	{body}
</rss>
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
	"img-src"		: "*",
	"style-src"		: "'self'",
	"script-src"		: "'self'",
	"form-action"		: "'self'",
	"frame-ancestors"	: "'self' https:\/\/www.youtube.com https:\/\/player.vimeo.com https:\/\/archive.org"
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
	":tag"	: "(?<tag>[\\\\pL\\\\pN\\\\s_\\\\,\\\\-]{1,30})",
	":tags"	: "(?<tags>[\\\\pL\\\\pN\\\\s_\\\\,\\\\-]{1,255})",
	":year"	: "(?<year>[2][0-9]{3})",
	":month": "(?<month>[0-3][0-9]{1})",
	":day"	: "(?<day>[0-9][0-9]{1})",
	":slug"	: "(?<slug>[\\\\pL\\\\-\\\\d]{1,100})",
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

// Session name
define( 'SESSION_TITLE',	'Bare' );

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
 *  Check if script is running with the latest supported PHP version
 *  
 *  @return bool
 */
function newPHP() : bool {
	static $is_new;
	if ( isset ( $is_new ) ) {
		return $is_new;
	}
	
	$is_new = 
	\version_compare( \PHP_VERSION, '7.3', '>=' ) ? true : false;
	
	return $is_new;
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
 *  Get HTML from hook result, if sent
 *  
 *  @param mixed	$sent	Hook execution result
 *  @return string
 */
function hookHTML( $sent ) : string {
	if ( \is_array( $sent ) ) {
		return $sent['html'] ?? '';
	}
	return '';
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
 *  Error logging
 */
function logError( string $err ) : bool {
	$file	= \CACHE . \ERROR;
	$err	= unifyspaces( pacify( $err ) );
	\touch( $file );
	
	return file_exists( $file ) ? 
		\error_log( $err . "\n", 3, $file ) : \error_log( $err );
}


/**
 *  Safely encode to JSON
 */
function encode( array $data ) : string {
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
 *  String to list helper
 */
function trimmedList( string $text ) : array {
	return \array_map( 'trim', \explode( ',', $text ) );
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
		send( 500, \MSG_CODEDETECT );
	}
	
	$loaded[$name] = $data;
	
	return $data;
}

/**
 *  Load file into array, optionally return the first n lines
 *  
 *  @param string	$name	File name to load from storage 
 *  @param int		$lines	Return only the first lines if not zero
 *  @param bool		$filter	Filters lines that start with ; or #
 */
function loadArray( 
	string		$name,
	int		$lines	= 0,
	bool		$filter	= true
) {
	static $loaded	= [];
	
	if ( isset( $loaded[$name] ) ) {
		if ( $lines > 0 ) {
			return \array_slice( $loaded[$name], 0, $lines );
		} 
		return $loaded[$name];
	}
	
	$data	= \file( 
			\CACHE . $name, 
			\FILE_IGNORE_NEW_LINES | \FILE_SKIP_EMPTY_LINES 
		);
	
	if ( false === $data ) {
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
	
	$loaded[$name] = $data;
	
	// Specific number of lines?
	if ( $lines > 0 ) {
		return \array_slice( $loaded[$name], 0, $lines );
	}
	return $loaded[$name];
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
	$params	= decode( $data );
	
	// Check for any modifications and run events/filters
	$params = modifiedConfig( $params, $modify );
	
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
	
	if ( \file_exists( $file ) ) {
		
		// Make a backup first
		$bkp = slashPath( \dirname( $file ), true ) . 
			( $fx == 1 ? 'bkp.' : '' ) . 
			\gmdate( 'Ymd\THis' ) . '.' . 
			\basename( $file ) . 
			( $fx == 0 ? '.bkp' : '' );
		
		if ( !\copy( $file, $bkp ) ) {
			// Backup failed? Don't overwrite
			return false;
		}
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
function saveConfig( array $params ) : bool {
	$data = encode( $params );
	if ( empty( $data ) ) {
		return false;
	}
	
	return saveFile( CONFIG, $data, 1 );
}

/**
 *  Register or get internal state
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
	static	$data = [];
	
	$name	= \strtolower( $name );
	if ( isset( $data[$name] ) ) {
		return $data[$name];
	}
	
	$config = loadConfig( \CONFIG );
	switch( $type ) {
		case 'int':
		case 'integer':
			$data[$name] = ( int )
				( $config[$name] ?? $default );
			break;
			
		case 'bool':
		case 'boolean':
			$data[$name] = ( bool )
				( $config[$name] ?? $default );
			break;
			
		default:
			$data[$name] = $config[$name] ?? $default;
	}
	return $data[$name];
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
 *  Hompage link helper
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
 *  Create home navigation link
 */
function navHome() : string {
	static $home;
	if ( isset( $home ) ) {
		return $home;
	}
	
	$url	= homeLink();
	hook( [ 'homelink', [ 'url' => $url ] ] );
	$html	= hookHTML( hook( [ 'homelink', '' ] ) );
	if ( !empty( $html ) ) {
		$home = $html;
		return $html;
	}
	
	$home = 
	\strtr( TPL_LINK ?? '', [ 
		'{url}' => $url, 
		'{text}'=> TPL_HOME ?? ''
	] );
	
	return $home;
}

/**
 *  Create next/previous pagination links
 */
function paginate( $page, $prefix, $posts ) : string {
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
	
	$html	= hookHTML( hook( [ 'paginate', '' ] ) );
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
		\strtr( TPL_LINK ?? '', [ 
			'{url}'		=> $p,
			'{text}'	=> TPL_PREVIOUS ?? ''
		] ); 
	}
	
	if ( $c >= $plimit ) {
		$out	.=
		\strtr( TPL_LINK ?? '', [ 
			'{url}'		=> 
				$prefix . 'page'. ( $page + 1 ),
			'{text}'	=> TPL_NEXT ?? ''
		] ); 
	}
	
	return \strtr( \TPL_NAV ?? '', [ '{text}' => $out ] );
}

/**
 *  Generate a random string ID based on given random bytes
 *  
 *  @param int		$bytes		Size of random bytes
 *  @return string
 */
function genId( int $bytes = 16 ) : string {
	return \bin2hex( \random_bytes( $bytes ) );
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
	static $nohr;
	if ( !isset( $nohr ) ) {
		$nohr  = missing( 'hrtime' );
	}
	
	if ( $nohr ) {
		list( $us, $se ) = 
			\explode( ' ', \microtime() );
		$t = $se . $us;
	} else {
		$t = ( string ) \hrtime( true );
	}
	
	return 
	\base_convert( $t, 10, 16 ) . \genId();
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
 *  @return array
 */
function lineSettings( string $text, int $lim ) : array {
	$ln = \array_unique( lines( $text ) );
	
	return ( count( $ln ) > $lim ) ? 
		\array_slice( $ln, 0, $lim ) : $ln;
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
 *  Database
 */

/**
 *  Get the SQL definition from DSN
 *  
 *  @param string	$dsn	User defined database path
 */
function loadSQL( string $dsn ) {
	// Get list of user-defined constants
	$cts	= \get_defined_constants( true );
	$my	= \array_flip( $cts['user'] );
	
	// Get the first component from the definition
	// E.G. "CACHE" from "CACHE_DATA"
	$def	= \explode( '_', $my[$dsn] )[0];
	
	// SQL Lines from defined component + "_SQL"
	return lines( \constant( $def . '_SQL' ) ?? '', -1, false );
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
	
	// Filter SQL comments and lines starting PRAGMA
	foreach( $lines as $l ) {
		if ( \preg_match( '/^(\s+)?(--|PRAGMA)/is', $l ) ) {
			continue;
		}
		$parse[] = $l;
	}
	
	// Separate into statement actions
	$qr	= \explode( '-- --', \implode( " \n", $parse ) );
	foreach( $qr as $q ) {
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
	$first_run	= false;
	if ( !\file_exists( $dsn ) ) {
		$first_run = true;
	}
	
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
			' Messsage: ' . $e->getMessage()
		);
		die();
	}
	
	// Prepare defaults if first run
	if ( $first_run ) {
		$db[$dsn]->exec( 'PRAGMA encoding = "UTF-8";' );
		$db[$dsn]->exec( 'PRAGMA page_size = "16384";' );
		$db[$dsn]->exec( 'PRAGMA auto_vacuum = "2";' );
		$db[$dsn]->exec( 'PRAGMA temp_store = "2";' );
		$db[$dsn]->exec( 'PRAGMA secure_delete = "1"' );
		
		// Load and process SQL
		installSQL( $db[$dsn], $dsn );
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
 *  Get parameter result from database
 *  
 *  @param string	$sql	Database SQL query
 *  @param array	$params	Query parameters (required)
 *  @param string	$dsn	Database string
 *  @return array		Query results
 */
function getResults(
	string		$sql, 
	array		$params,
	string		$dsn		= \DATA
) : array {
	$db	= getDb( $dsn );
	$stm	= $db->prepare( $sql );
	$res	= [];
	if ( $stm->execute( $params ) ) {
		$res = $stm->fetchAll();
	}
	$stm	= null;
	return $res;
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
	$db	= getDb( $dsn );
	$stm	= $db->prepare( $sql );
	$res	= false;
	
	if ( $stm->execute( $params ) ) {
		$res = true;
	}
	$stm	= null;
	return $res;
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
	$db	= getDb( $dsn );
	$stm	= $db->prepare( $sql );
	$res	= 0;
	if ( $stm->execute( $params ) ) {
		$res	= ( int ) $db->lastInsertId();
	}
	$stm	= null;
	return $res;
}

/**
 *  Get a single item by ID
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
	
	if ( internalState( 'configModified' ) ) {
		saveConfig( loadConfig( \CONFIG ) );
	}
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
	
	if ( empty( \PLUGINS_ENABLED ) ) {
		// Nothing to load
		return;
	}
	
	$plugins	= trimmedList( \PLUGINS_ENABLED );
	$plugins	= \array_map( 'strtolower', $plugins );
	$msg		= [];
	
	foreach ( $plugins as $p ) {
		$path = \PLUGINS . $p . DIRECTORY_SEPARATOR . $p . '.php';
		if ( \file_exists( $path ) ) {
			require( $path );
		} else {
			$msg[] = $p;
		}
	}
	
	if ( !empty( $msg ) ) {
		$err = 'Error loading plugis(s): ' . \implode( ', ', $msg ) . 
			' From directory: ' . \PLUGINS;
		logError( $err );
	}
}



/**
 *  Caching
 */

/**
 *  Get cached data (if any) by URI key
 *  
 *  @return string
 */
function getCache( string $uri ) : string {
	hook( [ 'getcache', [ 'uri' => $uri ] ] );
	$key	= \hash( 'sha256', $uri );
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
	hook( [ 'savecache', [ 'uri' => $uri, 'content' => $content ] ] );
	$key	= \hash( 'sha256', $uri );
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
 */
function sameSiteCookie() : string {
	if ( \COOKIE_RESTRICT ) {
		return 'Strict';
	}
	
	return isSecure() ? 'None' : 'Lax';
}

/**
 *  Set the cookie options when defaults are/aren't specified
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
	if ( !isset( $_COOKIE[\APP_NAME] ) ) {
		return $default;
	}
	
	if ( !is_array( $_COOKIE[\APP_NAME]) ) {
		return $default;
	}
	
	return $_COOKIE[\APP_NAME][$name] ?? $default;
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
	if ( newPHP() ) {
		return 
		\setcookie( \APP_NAME . "[$name]", $data, $options );
	}
	
	// PHP < 7.3
	return 
	\setcookie( 
		\APP_NAME . "[$name]", 
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
	$id	= \genId( \SESSION_BYTES );
	$sql	= 
	"INSERT OR IGNORE INTO sessions ( session_id )
		VALUES ( :id );";
	
	$db	= getDb( \SESSION_DATA );
	$stm	= $db->prepare( $sql );
	
	if ( $stm->execute( [ ':id' => $id ] ) ) {
		return $id;
	}
	
	// Something went wrong with the database
	die();
}

/**
 *  Delete session
 *  
 *  @return bool
 */
function sessionDestroy( $id ) {
	$sql	= 
	"DELETE FROM sessions WHERE session_id = :id;";
		
	$db	= getDb( SESSION_DATA );
	$stm	= $db->prepare( $sql );
	
	if ( $stm->execute( [ ':id' => $id ] ) ) {
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
	
	$db	= getDb( SESSION_DATA );
	$stm	= $db->prepare( $sql );
	
	if ( $stm->execute( [ ':gc' => $max ] ) ) {
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
	$db	= getDb( SESSION_DATA );
	$stm	= $db->prepare( $sql );
	
	if ( $stm->execute( [ ':id' => $id ] ) ) {
		$data = $stm->fetchColumn();
		hook( [ 'sessionread', [ 'id' => $id, 'data' => $data ] ] );
		return empty( $data ) ? '' : $data;
	}
	
	return '';
}

/**
 *  Store session data
 *  
 *  @return bool
 */
function sessionWrite( $id, $data ) {
	$sql	= 
	"REPLACE INTO sessions 
		( session_id, session_data )
		VALUES( :id, :data );";
	
	$db	= getDb( SESSION_DATA );
	$stm	= $db->prepare( $sql );
	
	if ( $stm->execute( [ 
		':id'		=> $id, 
		':data'		=> $data
	] ) ) {
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
 */
function sessionCanary( string $visit = '' ) {
	$_SESSION['canary'] = 
	[
		'exp'		=> time() + \SESSION_EXP,
		'visit'		=> 
		empty( $visit ) ? \genId( \SESSION_BYTES ) : $visit
	];
}
	
/**
 *  Check session staleness
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
 */
function sessionCookieParams() : bool {
	$options		= defaultCookieOptions();
	
	// Override some defaults
	$options['lifetime']	=  config( 'cookie_exp', \COOKIE_EXP, 'int' );
	unset( $options['expires'] );
	
	hook( [ 'sessioncookieparams', $options ] );
	if ( newPHP() ) {
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
		\session_name( \SESSION_TITLE );
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
	$nice	= isSafeExt( $_SERVER['REQUEST_URI'] );
	
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
	if ( $q >= \SESSION_LIMIT_COUNT ) {
		// Delay has timed out? Reset
		if ( ( $t + \SESSION_EXP ) > $now ) {
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
		} elseif ( \abs( $now - $t ) < \SESSION_LIMIT_HEAVY ) {
			$last			= [ $now, $q++ ];
			$_SESSION['last']	= $last;
			$check			= \SESSION_STATE_HEAVY;
			
		// Less than medium throttle limit?
		// Probably just impatient
		} elseif ( \abs( $now - $t ) < \SESSION_LIMIT_MEDIUM ) {
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
		sendError( 403, \MSG_DENIED );
	}
	
	$check		= lastVisit();
	
	// Increase sleep delay
	switch( $check ) {
		// Send Too Many Requests
		case SESSION_STATE_HEAVY:
			shutdown( 'cleanup' );
			shutdown( 'sleep', 20 );
			send( 429 );
			
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
 */
function tstring( $stamp ) {
	if ( empty( $stamp ) ) {
		return null;
	}
	
	if ( \is_numeric( $stamp ) ) {
		return ( int ) $stamp;
	}
	return \strtotime( $stamp );
}

/**
 *  UTC timestamp
 */
function utc( $stamp = null ) : string {
	return \gmdate( 'Y-m-d\TH:i:s', tstring( $stamp ) );
}

/**
 *  Friendly datetime stamp
 */
function dateNice( $stamp = null ) : string {
	$dn	= config( 'date_nice', \DATE_NICE );
	return \gmdate( $dn, tstring( $stamp ) );
}

/**
 *  Build permalink with page slug with date
 */
function dateSlug( string $slug, string $stamp ) {
	return getRoot() . 
	\gmdate( 'Y/m/d/', \strtotime( $stamp ) ) . 
	\ltrim( \basename( $slug, '.md' ), '/' );
}

/**
 *  Feed timestamp
 */
function dateRfc( $stamp = null ) : string {
	return 
	\gmdate( \DATE_RFC2822, tstring( $stamp ?? 'now' ) );
}

/**
 *  File modified timestamp
 */
function dateRfcFile( $stamp = null ) : string {
	return 
	\gmdate( 'D, d M Y H:i:s T', tstring( $stamp ?? 'now' ) );
}

/**
 *  Convert all spaces to single character
 */
function unifySpaces( string $text, string $rpl = ' ' ) {
	return \preg_replace( '/[[:space:]]+/', $rpl, pacify( $text ) );
}

/**
 *  Get a list of tokens separated by spaces
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
 *  @param string	$title	Raw title entered by the user
 *  @param int		$max	Maximum string length
 *  @return string
 */
function title( string $text, int $max = 255 ) : string {
	// Unify spaces, tabs, returns etc...
	$text	= unifySpaces( $text );
	
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
		'/^[a-z0-9_\-\.]/i', '', normal( $text ) 
	), 50 );
}

/**
 *  Convert to unicode lowercase
 *  
 *  @param string	$text	Raw mixed/uppercase text
 *  @return string
 */
function lowercase( string $text ) : string {
	return \mb_convert_case( $text, \MB_CASE_LOWER, 'UTF-8' );
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
	
	$ys		= config( 'year_start', \YEAR_START, 'int' );
	
	// Enforce date ranges
	$year		= ( $year > $y || $year < $ys ) ? 
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
 *  Get IP address (best guess)
 */
function getIP() : string {
	static $ip;
	
	if ( isset( $ip ) ) {
		return $ip;
	}
		
	$ip	= $_SERVER['REMOTE_ADDR'];
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
 */
function httpHeaders() {
	static $val;
	if ( isset( $val ) ) {
		return $val;
	}
	
	$val = [];
	foreach ( $_SERVER as $k => $v ) {
		if ( 0 === strncasecmp( $k, 'HTTP_', 5 ) ) {
			$a = explode( '_' ,$k );
			array_shift( $a );
			array_walk( $a, function( &$r ) {
				$r = ucfirst( strtolower( $r ) );
			} );
			$val[ implode( '-', $a ) ] = $v;
		}
	}
	return $val;
}

/**
 *  Create current visitor's browser signature by sent headers
 */
function signature() {
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
 *  Filtering
 */

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
					// Use prefix for relative paths
					$v = 
					( \preg_match( '/^\//', $v ) ) ?
						cleanUrl( $prefix . $v ) : 
						cleanUrl( $v );
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
	$sent	= hook( [ 'formatting', '' ] );
	
	return empty( $sent ) ? 
		markdown( $html, $prefix ) : 
		( $sent['html'] ?? markdown( $html, $prefix ) );
}

/**
 *  HTML filter
 */
function html( string $value, $prefix = '' ) : string {
	static $white;
	
	if ( !isset( $white ) ) {
		$white = decode( TAG_WHITE );
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
	$dom->loadHTML( 
		$html, 
		\LIBXML_HTML_NOIMPLIED | \LIBXML_HTML_NODEFDTD | 
		\LIBXML_NOERROR | \LIBXML_NOWARNING | 
		\LIBXML_NOXMLDECL | \LIBXML_COMPACT | 
		\LIBXML_NOCDATA | \LIBXML_NONET
	);
	
	$domBody	= $dom->getElementsByTagName( 'body' );
	
	$flush		= [];
	
	// Iterate through every HTML element 
	if ( !empty( $domBody->childNodes ) ) {
		foreach ( $domBody->childNodes as $node ) {
			scrub( $node, $white, $prefix, $flush );
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
	static $notidy;
	
	if ( !isset( $notidy ) ) { 
		 $notidy = missing( 'tidy_repair_string' );
	}
	if ( $notidy ) {
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
		'show-body-only'			=> 1,
		'new-blocklevel-tags'			=> 
			'figure, figcaption, picture',
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
		'<div class="media"><iframe width="560" height="315" sandbox="allow-same-origin allow-scripts" src="https://$2/videos/embed/$3" frameborder="0" allowfullscreen></iframe></div>',
		
		// Archive.org
		'/\[archive http(s)?\:\/\/(www)?\.?archive\.org\/details\/([0-9\-a-z_\/\.]*)\]/is'
		=>
		'<div class="media"><iframe width="560" height="315" sandbox="allow-same-origin allow-scripts" src="https://archive.org/embed/$3" frameborder="0" allowfullscreen></iframe></div>',
		
		'/\[archive ([0-9a-z_\/\.]*)\]/is'
		=> 
		'<div class="media"><iframe width="560" height="315" src="https://archive.org/embed/$1" frameborder="0" allowfullscreen></iframe></div>'
	];
		
	return 
	\preg_replace( 
		\array_keys( $filter ), 
		\array_values( $filter ), 
		$html 
	);
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
	
	$filters	= 
	[
		// Links / Images with alt text and titles
		'/(\!)?\[([^\[]+)\]\(([^\"\)]+)(?:\"(([^\"]|\\\")+)\")?\)/s'	=> 
		function( $m ) use ( $prefix ) {
			$i = \trim( $m[1] );
			$t = \trim( $m[2] );
			$u = \trim( $m[3] );
			
			// Use prefix for relative paths
			$u = ( \preg_match( '/^\//', $u ) ) ?
				cleanUrl( $prefix . $u ) : 
				cleanUrl( $u );
			
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
	
	$link		= config( 'page_link', \PAGE_LINK );
	$root		= slashPath( $link, true );
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
	
	$prot	= isset( $_SERVER['SERVER_PROTOCOL'] ) ? 
			$_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.1';
	
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
 *  Host server name
 *  @return string
 */
function getHost() : string {
	static $host;
	if ( isset( $host ) ) { return $host; }
	
	$sw	= \array_map( 'trim', \explode( ',', \SERVER_WHITE ) );
	$sh	= [ 'HTTP_HOST', 'SERVER_NAME', 'SERVER_ADDR' ];
	
	foreach ( $sh as $h ) {
		if ( isset( $_SERVER[$h] ) ) {
			if ( empty( $_SERVER[$h] ) ) { continue; }
			
			$host	= 
			\in_array( $_SERVER[$h], $sw ) ? 
				$_SERVER[$h] : '';
			
			return $host;
		}
	}
	
	$host	= '';
	return $host;
}

/**
 *  Current website with protocol prefix
 *  
 *  @return string
 */
function website() {
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
function fullURI() {
	return website() . $_SERVER['REQUEST_URI'];
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
	\ob_start( 'ob_gzhandler' );
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
	$page	= hook( [ 'errorcodesend', '' ] );
	$html	= hookHTML( $page );
	
	// Send standard error page if nothing handled
	if ( !empty( $html ) ) {
		shutdown( 'cleanup' );
		// Send custom errors
		send( $code, $html );
	}
	
	$params	= [ 
		'{page_title}'	=> $ptitle,
		'{tagline}'	=> $psub,
		'{home}'	=> homeLink(),
		'{code}'	=> $code,
		'{body}'	=> $body 
	];
	
	$page_t	= \strtr( \TPL_ERROR_PAGE ?? '', $params );
	shutdown( 'cleanup' );
	send( $code, $page_t );
}

/**
 *  Override content sending if hook was called
 *  
 *  @param string	$event	Event name to call back from hook
 *  @param bool		$feed	Sent content is to be rendered as feed
 */
function sendOverride( string $event, bool $feed = false ) {
	$sent	= hook( [ $event, '' ] );
	$html	= hookHTML( $sent );
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
		}
	}
	
	return \strtolower( $mime );
}

/**
 *  Prepare to send a file instead of an HTTP response
 *  
 *  @param string	$path		File path to send
 *  @param int		$code		HTTP Status code
 */
function sendFilePrep( $path, $code = 200 ) {
	$mime	= \mime_content_type( $path );
	$mime	= adjustMime( $mime, $path );
	
	scrubOutput();
	httpCode( $code );
	
	// Setup content security
	preamble( '', false, false );
	\header( "Content-Type: {$mime}", true );
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
 *  Handle HEAD HTTP request method
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
		logError( \MSG_NOMETHOD . ' ' . $verb );
		sendError( 501, \MSG_NOMETHOD );
	}
}

/**
 *  Find methods and paths that can be handled before routing
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
	
	// Empty host?
	if ( empty( getHost() ) ) {
		sendError( 400, \MSG_INVALID );
	}
	
	// Sanity checks
	$path	= $_SERVER['REQUEST_URI'];
	$verb	= \strtolower( $_SERVER['REQUEST_METHOD'] );
	$safe	= getAllowedMethods( true );
	
	// Unrecognized method?
	if ( !\in_array( $verb, $safe ) ) {
		// Send method not allowed
		sendError( 405, \MSG_BADMETHOD );
	}
	
	// Request path hard limit
	if ( \mb_strlen( $path, '8bit' ) > 255 ) {
		shutdown( 'cleanup' );
		send( 414 );
	}
	
	// Request path (simpler filter before proper XSS scan)
	if ( 
		false !== \strpos( $path, '..' ) || 
		false !== \strpos( $path, '<' )	
	) {
		sendError( 400, \MSG_INVALID );
	}
	
	// Possible XSS, directory traversal, or file upload detected
	if ( 
		\preg_match( RX_XSS3, $path ) || 
		\preg_match( RX_XSS4, $path ) || 
		!empty( $_FILES )
	) {
		sendError( 403, \MSG_DENIED );
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
 *  Check if the requested path has a whitelisted extension
 *  
 *  @param string	$path		Requested URI
 */
function isSafeExt( string $path ) {
	static $safe;
	static $checked	= [];
	
	if ( isset( $checked[$path] ) ) {
		return $checked[$path];
	}
	
	if ( !isset( $safe ) ) {
		$safe	= trimmedList( config( 'safe_ext', \SAFE_EXT ) );
		$safe	= \array_map( 'strtolower', $safe );
	}
	
	$ext		= 
	\pathinfo( $path, \PATHINFO_EXTENSION ) ?? '';
	
	$checked[$path] = \in_array( \strtolower( $ext ), $safe );
	
	return $checked[$path];
}

/**
 *  Send route to registered event
 */
function sendRoute( $event, $path, $verb, $params ) {
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
	
	$prefix	= website() . config( 'page_link', \PAGE_LINK );
	foreach ( $loaded as $map ) {
		if ( 0 == \strcasecmp( $map[2], $event ) ) {
			return $prefix . $map[1];
		}
	}
	
	return $prefix . $fallback;
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
 *  Check path for file request
 *  
 *  @param string	$verb	Request method should be ged
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
	$path	= \FILE_PATH . \preg_replace( '/^\//', '', $path );
	if ( !\file_exists( $path ) ) {
		return false;
	}
	
	if ( $dosend ) {
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
	
	return true;
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
		sendError( 404, MSG_NOTFOUND );
	}
	
	sendRoute( $match[0], $path, $verb, $match[1] );
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
		logError( 'Error retrieving posts from ' . 
			POSTS . $root . ' ' . $e->getMessage() );
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
	return \trim( $path ?? '' );
}

/**
 *  Get post content as an array of lines
 *  
 *  @param mixed	$raw	Post content or file path
 *  @param bool		$fl	Content is in a file
 */
function postData( $raw, bool $fl = true ) {
	static $loaded	= [];
	$key		= $raw . ( string ) $fl;
	
	if ( isset( $loaded[$key] ) ) {
		return $loaded[$key];
	}
	
	// Get content from files
	if ( $fl ) {
		if ( \file_exists( $raw ) ) {
			$data	= \file( $raw, \FILE_IGNORE_NEW_LINES );
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
 *  Reset currently stored post in cache
 */
function refreshPost(
	string		$path, 
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
			post_path, post_view, post_bare, updated, published 
		) 
		VALUES ( :path, :pview, :bare, :updated, :pub );" 
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
		insertPost( $pstm, $path, $out, $pub, $mtime );
		
		// Add any new tags
		insertTags( $istm, $tags );
		
		// Apply tags if they've changed
		applyTags( $sstm, $tstm, $path, $tags );
		
		$db->commit();
	} else {
		logError( 'Error starting DB transaction in refreshPost()' );
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
 *  @param stirng	$title	Post title (first line)
 *  @param string	$path	Post publication permalink
 *  @return string
 */
function loadPost(
	string	&$title,
	string	$path
) {
	$title	= '';
	$ppath	= POSTS . \ltrim( $path, '/' ) . '.md';
	$data	= postData( $ppath );
	
	if ( empty( $data ) ) {
		return '';
	}
	
	$pub	= getPub( $path );
	if ( !checkPub( $pub ) ) {
		sendError( 404, \MSG_NOTFOUND );
	}
	
	$tpl	=  TPL_POST ?? '';
	hook( [ 'formatpostprep', [ 'feed' => false, 'template' => $tpl ] ] );
	
	$tags	= [];
	$out	= 
	formatPost( $title, $tags, $data, $path, $tpl );
	
	// If index has not been run before this function was called...
	if ( !internalState( 'indexRun' ) ) {
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
				[ $path, $out, $pub, $tags, $mtime ]
			);
		} elseif ( !postCached( $path ) ) {
			shutdown( 'loadIndex' );
		}
	}
	
	return $out;
}

/**
 *  Get published date from path
 */
function getPub( $path ) : string {
	$path = \ltrim( $path, '/' );
	return utc( \substr( $path, 0, \strrpos( $path, '/' ) ) );	
}

/**
 *  Check if publication time is before current time
 */
function checkPub( $pub ) : bool {
	if ( \strtotime( $pub ) <= time() ) {
		return true;
	}
	
	return false;
}

/**
 *  Check if post was modified after its publish time
 */
function postModified( $path, $mtime ) {
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
function postCached( $path ) {
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
 *  Get summary or abstract from the last or second-to-last line
 */
function extractSummary( array &$post ) : string {
	// TODO: Build summary extractor
	return '';
}

/**
 *  Get the last line from the post and try to parse post category tags
 *  
 *  @param array	$post	Content as an array of lines
 *  @return array
 */
function extractTags( array &$post ) : array {
	static $tagp;
	
	if ( !isset( $tagp ) ) {
		$tagp	= 
		getMarkers()[':tags'] ?? '(?<tags>[\pL\pN\s_\,\-]{1,255})';
	}
	
	$c	= count( $post );
	// Need at least three lines
	if ( $c < 3 ) {
		return [];
	}
	
	// Last line
	$line	= 
	\preg_replace( '/\s+/', ' ', \trim( $post[$c - 1] ) );
	\preg_match( 
		'/^tags\s?\:' . $tagp . '/is', $line, $m 
	);
	
	if ( empty( $m['tags'] ) ) {
		return [];
	}
	
	// Clean tags
	$tags	= 
	\array_filter( \array_map( 
		'trim', \explode( ',', $m['tags'] ?? '' ) 
	) );
	
	// No tags left after cleaning?
	if ( empty( $tags ) ) {
		return [];
	}
	
	// Remove last line if tags were found
	\array_pop( $post );
	
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
 *  Insert formatted tags into cache
 */
function insertTags( $stm, array $tags ) {
	foreach( $tags as $pair ) {
		$stm->execute( [ 
			':slug' => $pair['slug'], 
			':term' => $pair['term'] 
		] );
	}
}

/**
 *  Associate post with given tags
 */
function applyTags( $sstm, $tstm, string $perm, array $tags ) {
	$id = 0;
	
	if ( $sstm->execute( [ ':perm' => $perm ] ) ) {
		$res	= $sstm->fetchAll();
		$id	= ( int ) ( $res[0]['id'] ?? 0 );
	} else { 
		return; 
	}
	
	if ( empty( $id ) ) {
		return;
	}
	
	foreach( $tags as $pair ) {
		$tstm->execute( [
			':id'	=> $id,
			':tag'	=> $pair['slug']
		] );
	}
}


/**
 *  Check if this is a post file (ends in ".md")
 */
function isPost( $file ) : bool {
	// Skip directories
	if ( $file->isDir() ) {
		return false;
	}
	if ( $ext = $file->getExtension() ) {
		if ( 0 == \strcasecmp( $ext, 'md' ) ) {
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
	
	// Pagination prep
	$plimit	= config( 'page_limit', \PAGE_LIMIT, 'int' );
	$start	= ( $page - 1 ) * $plimit;
	$end	= $start + $plimit;
	
	$title	= '';
	$tpl	= $feed ? ( TPL_ITEM  ?? '' ) : ( TPL_POST ?? '' );
	hook( [ 'formatpostprep', [ 'feed' => $feed, 'template' => $tpl ] ] );
	
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
			
			$tags		= [];
			$posts[$path]	= 
			formatPost( $title, $tags, $data, $path, $tpl );
		}
		
		// Increment number of entries if published
		if ( checkPub( $pub ) ) {
			$i++;
		}
	}
	return $posts;
}

/**
 *  Insert post data into cache database using given statement 
 *  
 *  @param string	$path		Post permalink
 *  @param string	$out		Formatted post data
 *  @param string	$pub		Post publication date
 *  @param int		$mtime		File modified time
 */
function insertPost(
			$pstm, 
	string		$path, 
	string		$out, 
	string		$pub, 
	int		$mtime 
) {
	$params = [
		':path'		=> slashPath( $path ), 
		':pview'	=> $out, 
		':bare'		=> \strip_tags( $out ), 
		':updated'	=> utc( $mtime ), 
		':pub'		=> $pub
	];
	$pstm->execute( $params );
}

/**
 *  Load all published posts
 */
function loadIndex( int $start = 0, int $limit = 0 ) : array {
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
			post_path, post_view, post_bare, updated, published 
		) 
		VALUES ( :path, :pview, :bare, :updated, :pub );" 
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
			
			// Updated date
			$mtime		= \filemtime( $raw );
			if ( false === $mtime ) {
				$mtime = time();
			}
			
			$tags		= [];
			
			// Apply metadata
			metadata( $title, $perm, $pub, $post, $path );
			
			// Load formatted and process tags
			$out		= 
			formatPost( $title, $tags, $post, $path, TPL_POST ?? '' );
			
			if ( $limited ) {
				if ( $i >= $start && $j <= $limit ) {
					$posts[$lastDir][] = 
					formatMeta( $title, $pub, $path, $tags );
					$j++;
				}
			} else {
				$posts[$lastDir][] = 
				formatMeta( $title, $pub, $path, $tags );
			}
			
			// Create tags and cache page info
			insertPost( $pstm, $perm, $out, $pub, $mtime );
			insertTags( $istm, $tags );
			applyTags( $sstm, $tstm, $perm, $tags );
			
			$i++;
		}
	}
	
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
function formatTags( array $tags ) : string {
	// Render plugin installed?
	hook( [ 'formattags', [ 'tags' => $tags ] ] );
	$html	= hookHTML( hook( [ 'formattags', '' ] ) );
	if ( !empty( $html ) ) {
		return $html;
	}
	
	// No tags in this post?
	if ( empty( $tags ) ) {
		return '';
	}
	
	$out	= '';
	$r	= getRoot();
	foreach( $tags as $t ) {
		$out .= 
		\strtr( 
			\TPL_TAGLINK, 
			[
				'{url}' => $r . 'tags/' . $t['slug'],
				'{text}' => $t['term']
			] 
		);
	}
	return \strtr( \TPL_TAGWRAP, [ '{tags}' => $out ] );
}

/**
 *  Apply post data to template placeholders
 */
function formatMeta( $title, $pub, $path, $tags = [] ) : array {
	return [
		'{title}'	=> $title,
		'{date_utc}'	=> $pub,
		'{date_rfc}'	=> dateRfc( $pub ),
		'{date_stamp}'	=> dateNice( $pub ),
		'{tags}'	=> formatTags( $tags ),
		'{permalink}'	=> 
		website() . dateSlug( \basename( $path ), $pub )
	];
}

/**
 *  Apply post template, if post exists and published or return 404
 */
function formatPost(
	string	&$title,
	array	&$tags,
	array	$post,
	string	$path,
	string	$tpl
) {	
	// Check for post validity
	if ( count( $post ) < 3 ) {
		return '';
	}
	$pub	= getPub( $path );
	
	// Process tags
	$tags	= extractTags( $post );
	
	// Process summary
	$summ	= extractSummary( $post );
	
	// Apply metadata
	metadata( $title, $perm, $pub, $post, $path );
	
	// Everything else after the first line is the body
	$post	= \array_slice( $post, 1 );
	$body	= html( \implode( "\n", $post ), homeLink() );
	
	hook( [ 'formatpost', [ 
		'title'		=> $title,
		'tags'		=> $tags,
		'permalink'	=> $perm,
		'published'	=> $pub,
		'summary'	=> $summ,
		'body'		=> $body
	] ] ) ;
	
	$html	= hookHTML( hook( [ 'formatpost', '' ] ) );
	
	// If the hook rendered this post, send it back
	if ( !empty( $html ) ) {
		return $html;
	}
	
	// Format metadata
	$data		= formatMeta( $title, $pub, $perm, $tags );
	$data['{body}'] = $body;
	
	return \strtr( $tpl, $data );
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
			'options'	=> 'unifyspaces'
		],
		'slug'	=> [
			'filter'	=> \FILTER_SANITIZE_FULL_SPECIAL_CHARS,
			'options'	=> [ 'default' => '' ]
		],
		'find'	=> [
			'filter'	=> \FILTER_CALLBACK,
			'options'	=> 'unifyspaces'
		],
		'token'	=> \FILTER_SANITIZE_FULL_SPECIAL_CHARS,
		'nonce'	=> \FILTER_SANITIZE_FULL_SPECIAL_CHARS
	];
	
	return 
	\array_merge( $hook, \filter_var_array( $params, $filter ) );
}


/**
 *  Format index views for archives and tags
 */
function formatIndex( $prefix, $page, $posts, $cache = true ) {
	
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
	$tpl	= [
		'{page_title}'	=> $ptitle,
		'{post_title}'	=> $ptitle,
		'{tagline}'	=> $psub,
		'{home}'	=> homeLink(),
		
		// Search form
		'{search_form}'	=> searchForm(),
		
		// Footer with home link set
		'{footer}'	=> 
		\strtr( 
			TPL_FOOTER ?? '', 
			[ '{home}'	=> homeLink() ] 
		)
	];
	
	if ( empty( $posts ) ) {
		// No posts message with home link set
		$tpl['{body}']		= 
		\strtr( 
			TPL_NOPOSTS ?? '', 
			[ '{home}'	=> homeLink() ] 
		);
		$tpl['{paginate}']	= 
		\strtr( TPL_NAV ?? '', [ '{text}' => navHome() ] );
	} else {
		$tpl['{body}']		= \implode( '', $posts );
		$tpl['{paginate}']	= 
		paginate( $page, $prefix, $posts );
	}
	
	// Send results
	shutdown( 'cleanup' );
	send( 200, \strtr( TPL_PAGE ?? '', $tpl ), $cache );
}



/**
 *  User input and form processing
 */

/**
 *  Create a unique nonce and token pair for form validation
 *  
 *  @param string	$name	Form label for this pair
 *  @return array
 */
function genNoncePair( string $name ) : array {
	$tb	= config( 'token_bytes', \TOKEN_BYTES, 'int' );
	$ha	= hashAlgo( 'nonce_hash', \NONCE_HASH );
	if ( $tb < 8 ) {
		$tb = 8;
	} elseif( $tb > 64 ) {
		$tb = 64;
	}
	
	$nonce	= genId( $tb );
	$time	= time();
	$data	= $name . getIP() . $time;
	$token	= "$time:" . \hash( $ha, $data . $nonce );
	return [ 
		'token' => \base64_encode( $token ), 
		'nonce' => $nonce 
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
	$data	= $name . getIP() . $parts[0];
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
 *  @return int
 */
function validateForm(
	string	$name, 
	bool	$get	= true,
	bool	$chk	= true 
) : int {
	$filter = [
		'token'	=> \FILTER_SANITIZE_FULL_SPECIAL_CHARS,
		'nonce'	=> \FILTER_SANITIZE_FULL_SPECIAL_CHARS
	];
	
	$data	= $get ? 
	\filter_input_array( \INPUT_GET, $filter ) : 
	\filter_input_array( \INPUT_POST, $filter );
	
	if ( empty( $data['token'] ) || empty( $data['nonce'] ) ) {
		return \FORM_STATUS_INVALID;
	}
	
	return 
	verifyNoncePair( $name, $data['token'], $data['nonce'], $chk );
}

/**
 *  Make text completely bland by stripping punctuation, 
 *  spaces and diacritics (for further processing)
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
 *  Process search pattern for full text searching
 *  
 *  @param string	$find	Sent search parameters
 */
function searchData( string $find ) : string {
	// Remove tags and trim
	$find	= bland( $find );
	if ( empty( $find ) ) {
		return '';
	}
	
	// Split into words, including quoted terms
	\preg_match_all( '/"(?:\\\\.|[^\\\\"])*"|\S+/', $find, $m );
	if ( empty( $m ) ) {
		return '';
	}
	
	$fdata		= \array_unique( $m[0] );
	if ( count( $fdata ) > 10 ) {
		$fdata = \array_slice( $fdata, 0, 10 );
	}
	
	//\array_unshift( $fdata, "\"$find\"" );
	
	// Insert ' OR ' for multiple terms
	$find		= \implode( ' OR ', $fdata );
	
	// Remove conflicting/duplicate params
	$find		= 
	\preg_replace( '/\b(AND|OR|NEAR|NOT)(?:\s\1)+/iu', 'OR', $find );
	
	$find		= \preg_replace( '/\bOR NEAR/iu', 'NEAR', $find );
	$find		= \preg_replace( '/\bNEAR OR/iu', 'NEAR', $find );
	$find		= \preg_replace( '/\bOR AND/iu', 'AND', $find );
	$find		= \preg_replace( '/\bAND OR/iu', 'AND', $find );
	$find		= \preg_replace( '/\bOR NOT/iu', 'NOT', $find );
	$find		= \preg_replace( '/\bNOT OR/iu', 'NOT', $find );
	
	$find		= 
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
 */
function searchForm() : string {
	// Search form hidden fields
	$pair	= genNoncePair( 'searchform' );
	
	$xsrf	= 
	\strtr( \TPL_INPUT_XSRF ?? '', [
		'{nonce}'	=> $pair['nonce'],
		'{token}'	=> $pair['token']
	] );
	
	return 
	\strtr( \TPL_SEARCHFORM ?? '', [
		'{xsrf}'	=> $xsrf,
		'{home}'	=> homeLink()
	] );
}

/**
 *  Render search pagination path
 */
function searchPagePath( array $data ) {
	return homeLink() . 
		'?nonce=' . $data['nonce'] . 
		'&token=' . $data['token'] . 
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
	$ppath	= POSTS . $path. '.md';
	$data	= postData( $ppath );
	if ( empty( $data ) ) {
		return '';
	}
	
	$title	= '';
	$perm	= '';
	$pub	= getPub( $path );
	
	metadata( $title, $perm, $pub, $data, $path );
	
	switch( $mode ) {
		case 'prev':
		case 'previous':
			return
			\strtr( \TPL_PREVLINK ?? '', [ 
				'{url}'		=> $perm,
				'{text}'	=> $title
			] ); 
			
		case 'next':
			return
			\strtr( \TPL_NEXTLINK ?? '', [ 
				'{url}'		=> $perm,
				'{text}'	=> $title
			] ); 
			
		default: 
			return $nr ? // Don't render?
			[ 
				'{url}'		=> $perm,
				'{text}'	=> $title
			] : 
			\strtr( \TPL_LINK ?? '', [ 
				'{url}'		=> $perm,
				'{text}'	=> $title
			] ); 
	}
}

/**
 *  Get next/previous post details
 */
function getSiblings( string $path ) {
	$res	= 
	getResults( 
		"SELECT * FROM post_siblings WHERE post_path = :path", 
		[ ':path' => slashPath( $path ) ], 
		\CACHE_DATA 
	);
	
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
	
	// Next/previous template from the render plugin available?
	if ( \defined( 'TPL_PAGE_NEXTPREV' ) ) {
		return 
		\strtr( 
			\TPL_PAGE_NEXTPREV, [ '{links}' => $out ] 
		);
	}
	
	return \strtr( \TPL_SIBLINGNAV ?? '', [ '{text}' => $out ] );
}

/**
 *  Get common words in text for searching
 *  
 *  @param array	$lines		Content to process
 *  @param bool		$as_array	Returns as an array if true
 */
function getCommonWords( array $lines, bool $as_array = true ) {
	// Exclude some English stop words
	static $stop	= [
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
 */
function getRelated( string $path ) {
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
	
	$out	= [];
	
	// Apply render
	hook( [ 'getrelated', [ 
		'search'	=> $search,
		'title'		=> $title,
		'limit'		=> $rlimit
	] ] );
	
	$html	= hookHTML( hook( [ 'getrelated', '' ] ) );
	if ( !empty( $html ) ) {
		return $html;
	}
	
	foreach( $search as $p ) {
		$out[] = 
		previewLink( \trim( $p['post_path'] ) );
	}
	
	return 
	\strtr( \TPL_RELATEDNAV, [ '{text}' => \implode( '', $out ) ] );
}



/**
 *  Route actions
 */

/**
 *  Archived posts by date
 */
function showArchive( string $event, array $hook, array $params ) {
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
	
	// Full archive
	if ( empty( $params['year'] ) ) {
		$posts	= loadPosts( $page );
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
		$posts	= loadPosts( $page, $stamp );
	}
	
	hook( [ 'showarchive', [
		'params'	=> $params,
		'page'		=> $page,
		'stamp'		=> $stamp ?? '',
		'prefix'	=> $prefix
	] ] );
	
	sendOverride( 'showarchive' );
	
	// Display
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
		sendError( 404, \MSG_NOTFOUND );
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
		"SELECT DISTINCT post_path, post_view FROM posts
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
		'tag'		=> $tag,
		'limit'		=> $plimit,
		'start'		=> $start,
		'page'		=> $page,
		'results'	=> $res
	] ] );
	
	// Send result if hook returned content
	sendOverride( 'tagsearchrender' );
	
	// Nothing found for this tag
	if ( empty( $res ) ) {
		formatIndex( $prefix, $page, [] );
	}
	
	// Extract view column and send to formatting
	$posts	= [];
	foreach( $res as $r ) {
		$posts[] = $r['post_view'];
	}
	formatIndex( $prefix, $page, $posts );
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
			sendError( 403, \MSG_EXPIRED );
		
		case FORM_STATUS_FLOOD:
			sendError( 429 );
	}
	
	$find	= searchData( $params['find'] ?? '' );
	if ( empty( $find ) ) {
		sendError( 404, \MSG_NOTFOUND );
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
		'results'	=> $res,
		'status'	=> $status
	] ] );
	
	// Send result if hook returned content
	sendOverride( 'searchrender' );
	
	// Nothing found for this search
	if ( empty( $res ) ) {
		formatIndex( $prefix, $page, [] );
	}
	
	$posts	= [];
	foreach( $res as $post ) {
		$posts[] = $post['post_view'];
	}
	formatIndex( $prefix, $page, $posts );
}


/**
 *  Syndication feed
 */
function showFeed( string $event, array $hook, array $params ) {
	if ( internalState( 'prepareIndex' ) ) {
		loadIndex();
	}
	
	$posts	= loadPosts( 1, '', true );
	if ( empty( $posts ) ) {
		sendError( 404, \MSG_NOTFOUND );
	}
	
	$ptitle	= config( 'page_title', \PAGE_TITLE );
	$psub	= config( 'page_sub', \PAGE_SUB );
	
	// Send to render hook
	hook( [ 'feedrender', [  
		'title'		=> $ptitle,
		'subtitle'	=> $psub,
		'posts'		=> $posts
	] ] );
	
	// Send result if hook returned content
	sendOverride( 'feedrender', true );
	
	$tpl	= [
		'{page_title}'	=> $ptitle,
		'{tagline}'	=> $psub,
		'{home}'	=> homeLink(),
		'{date_gen}'	=> dateRfc(),
		'{body}'	=> \implode( '', $posts )
	];
	
	shutdown( 'cleanup' );
	send( 200, \strtr( TPL_FEED ?? '', $tpl  ), true, true );
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
		sendError( 404, \MSG_NOTFOUND );
	}
	
	$post	= loadPost( $title, $path );
	
	if ( empty( $post ) ) {
		sendError( 404, \MSG_NOTFOUND );
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
	
	$tpl	= [
		'{page_title}'	=> $ptitle,
		'{post_title}'	=> $title . ' - ' . $ptitle,
		'{tagline}'	=> $psub,
		'{body}'	=> $post,
		'{paginate}'	=> $sib . $rel,
		'{home}'	=> homeLink(),
		
		// Search form
		'{search_form}'	=> searchForm(),
		
		// Footer with home link set
		'{footer}'	=> 
		\strtr( 
			TPL_FOOTER ?? '', 
			[ '{home}'	=> homeLink() ] 
		)
	];
	
	shutdown( 'cleanup' );
	send( 200, \strtr( TPL_PAGE ?? '', $tpl ), true );
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
		sendError( 404, \MSG_NOTFOUND );
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
	
	$prefix	= slashPath( homeLink(), true ) . 'archive/'; 
	$tpl	= TPL_INDEX ?? '';
	$out	= '';
	$pf	= '';
	$plist	= [];
	foreach( $posts as $k => $v ) {
		if ( is_array( $v ) ) {
			foreach( $v as $p ) {
				$pf		= \strtr( $tpl, $p );
				$plist[]	= $pf;
				$out		.= $pf;
			}
		}
	}
	
	$out	= \strtr( TPL_INDEX_WRAP, [ '{items}' => $out ] );
	$tpl	= [
		'{page_title}'	=> $ptitle,
		'{post_title}'	=> $ptitle,
		'{tagline}'	=> $psub,
		'{body}'	=> $out,
		'{paginate}'	=> ( count( $plist ) < $ilimit ) ? 
			'' : paginate( $page, $prefix, $plist ),
		'{home}'	=> homeLink(),
		
		'{search_form}'	=> searchForm(),
		
		// Footer with home link set
		'{footer}'	=> 
		\strtr( 
			TPL_FOOTER ?? '', 
			[ '{home}'	=> homeLink() ] 
		)
	];
	
	shutdown( 'cleanup' );
	send( 200, \strtr( TPL_PAGE ?? '', $tpl ), true );
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
		'page_link'	=> [
			'filter'=> \FILTER_VALIDATE_URL,
			'options' => [
				'default' => \PAGE_LINK
			],
		],
		'page_limit'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 1,
				'max_range'	=> 500,
				'default'	=> \PAGE_LIMIT
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
		
		// Date formatting
		'date_nice'	=> [
			'filter'	=> \FILTER_SANITIZE_SPECIAL_CHARS,
			'flags'		=> 
				\FILTER_FLAG_STRIP_LOW	| 
				\FILTER_FLAG_STRIP_HIGH	| 
				\FILTER_FLAG_STRIP_BACKTICK 
		],
		
		// Safe file extensions
		'safe_ext'	=> [
			'filter'	=> \FILTER_SANITIZE_SPECIAL_CHARS,
			'flags'		=> 
				\FILTER_FLAG_STRIP_LOW	| 
				\FILTER_FLAG_STRIP_HIGH	| 
				\FILTER_FLAG_STRIP_BACKTICK 
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
		]
	];
	
	// Filter passed params, leaving out unset ones
	$data			= 
	\filter_var_array( $params, $filter, false );
	
	$data['page_link']	= 
	\strip_tags( $data['page_link'] ?? \PAGE_LINK );
	
	if ( isset( $data['safe_ext'] ) ) { 
		$safe 			= 
		\array_map( 'trim', 
			\explode( ',', ( string ) $data['safe_ext'] ) 
		);
		
		$data['safe_ext']	= 
		\implode( ',', \array_map( 'strtolower', $safe ) );
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
	 *  Searching
	 */
	[ 'get', '\\?nonce=:nonce&token=:token&find=:find','search' ],
	[ 'get', '\\?nonce=:nonce&token=:token&find=:find/page:page',	
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
hook( [ 'home',		'showArchive' ] );
hook( [ 'homepaginate',	'showArchive' ] );
hook( [ 'archive',	'showArchive' ] );

// Browsing tag events
hook( [ 'tagview',	'showTag' ] );
hook( [ 'tagpaginate',	'showTag' ] );

// Post view event
hook( [ 'postview',	'showPost' ] );

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

// Append URL route markers
hook( [ 'routemarker',	'routeMarkers' ] );

// Register blog routes during 'addroutes' event ( called in request() )
hook( [ 'initroutes',	'addBlogRoutes' ] );



/***
 *  Add any plugin files here
 */



/**
 *  End plugin files
 */

/**
 *  Run page routes ( 'begin' event should run first )
 */
hook( [ 'begin', [] ] );




