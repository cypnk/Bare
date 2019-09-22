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

// Custom error file folder (optional)
define( 'ERROR_ROOT',		\realpath( \dirname( __FILE__ ) ) . '/errors/' );
// Use this if error files are outside web root
// define( 'ERROR_ROOT',		\realpath( \dirname( __FILE__, 2 ) ) . '/errors/' );

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

// Make this true if testing locally or running on Tor
define( 'SKIP_LOCAL', 	'true' );

// Maximum page index
define( 'MAX_PAGE',	500 );

// Starting date for post archive
define( 'YEAR_START',	2015 );

// Ending date for post archive
define( 'YEAR_END',	2099 );

// Extensions generally safe to send as-is
define( 'SAFE_EXT',	
	'css, js, ico, txt, html, jpg, jpeg, gif, bmp, png' );

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
	<div class="content">{body}</div>
</article>
HTML
);

define( 'TPL_LINK',		<<<HTML
	<li><a href="{url}">{text}</a></li>
HTML
);

define( 'TPL_NAV',		<<<HTML
	<nav><ul>{text}</ul></nav>
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
		<a href="{permalink}">{title}</a></li>
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
	"frame-ancestors"	: "'self' https:\/\/www.youtube.com https:\/\/player.vimeo.com"
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
	":ids"	: "(?<ids>[1-9][0-9,]*)",
	":num"	: "(?<num>[0-9]{1,3})",
	":page"	: "(?<page>[1-9][0-9]*)",
	":user"	: "(?<user>[\\\\pL\\\\pN\\\\s\\\\-]{2,30})",
	":label": "(?<label>[\\\\pL\\\\pN\\\\s_\\\\-]{1,30})",
	":tag"	: "(?<tag>[\\\\pL\\\\pN\\\\s_\\\\,\\\\-]{1,30})",
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
define( 'MSG_DENIED',		"Access denied" );
define( 'MSG_INVALID',		"Invalid request" );


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
	cache_id TEXT NOT NULL, 
	ttl INTEGER NOT NULL, 
	content TEXT NOT NULL, 
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
END;
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
 *  Load JSON formatted configuration file
 *  
 *  @param string	$file		File name
 *  @return array
 */
function loadConfig( string $file ) : array {
	static $params;
	if ( isset( $params ) ) {
		return $params;
	}
	
	$data	= loadFile( $file );
	$params	= json_decode( \utf8_encode( $data ), true );
	if ( empty( $params ) ) {
		return [];
	}
	
	return $params;
}

/**
 *  Get configuration setting or default value
 *  
 *  @param string	$name		Configuration setting name
 *  @param mixed	$default	If not set, fallback value
 *  @param string	$type		String, integer, or boolean
 *  @return mixed
 */
function config( string $name, $default, string $type = 'string'  ) {
	static	$data;
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
	
	$home = 
	\strtr( TPL_LINK ?? '', [ 
		'{url}' => homeLink(), 
		'{text}'=> TPL_HOME ?? ''
	] );
	
	return $home;
}

/**
 *  Create next/previous pagination links
 */
function paginate( $page, $prefix, $posts ) : string {
	$c	= count( $posts );
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
	
	if ( $c >= PAGE_LIMIT ) {
		$out	.=
		\strtr( TPL_LINK ?? '', [ 
			'{url}'		=> 
				$prefix . 'page'. ( $page + 1 ),
			'{text}'	=> TPL_NEXT ?? ''
		] ); 
	}
	
	return \strtr( TPL_NAV ?? '', [ '{text}' => $out ] );
}

/**
 *  Collection of functions to execute after content sent
 */
function shutdown() {
	static $registered	= [];
	$args			= \func_get_args();
	
	// Shutdown called
	if ( empty( $args ) ) {
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
	$lines	= \preg_split( "/[\r\n]+/", constant( $def . '_SQL' ) );
	return \array_filter( \array_map( 'trim', $lines ) );
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
 *  @param bool		$close	Close connection (optional)
 */
function getDb( string $dsn, bool $close = false ) {
	static $db	= [];
	
	if ( $close ) {
		if ( isset( $db[$dsn] ) ) {
			$db[$dsn] = null;
			unset( $db[$dsn] );
		}
		return;
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
	
	$db[$dsn]	= 
		new \PDO( 'sqlite:' . $dsn, null, null, $opts );
		
	// Prepare defaults if first run
	if ( $first_run ) {
		$db[$dsn]->exec( 'PRAGMA encoding = "UTF-8";' );
		$db[$dsn]->exec( 'PRAGMA auto_vacuum = "2";' );
		$db[$dsn]->exec( 'PRAGMA temp_store = "2";' );
		
		// Load and process SQL
		installSQL( $db[$dsn], $dsn );
	}
	
	$db[$dsn]->exec( 'PRAGMA journal_mode = WAL;' );
	$db[$dsn]->exec( 'PRAGMA foreign_keys = ON;' );
	
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
	if ( \session_status() === \PHP_SESSION_ACTIVE ) {
		\session_write_close();
	}
	
	getDb( CACHE_DATA, true );
	getDb( SESSION_DATA, true );
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
	$key	= \hash( 'sha256', $uri );
	$sql	= 
	"INSERT OR REPLACE INTO caches ( cache_id, ttl, content )
		VALUES ( :id, :ttl, :content );";
	
	setInsert(
		$sql, 
		[
			':id'		=> $key, 
			':ttl'		=> CACHE_TTL, 
			':content'	=> $content 
		], 
		CACHE_DATA 
	);
}



/**
 *  Session functions
 */

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
	$id	= \bin2hex( \random_bytes( SESSION_BYTES ) );
	$sql	= 
	"INSERT OR IGNORE INTO sessions ( session_id )
		VALUES ( :id );";
		
	$db	= getDb( SESSION_DATA );
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
	"INSERT OR REPLACE INTO sessions 
		( session_id, session_data )
		VALUES( :id, :data );";
	
	$db	= getDb( SESSION_DATA );
	$stm	= $db->prepare( $sql );
	
	if ( $stm->execute( [ 
		':id'		=> $id, 
		':data'		=> $data
	] ) ) {
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
		empty( $visit ) ? 
			\bin2hex( \random_bytes( \SESSION_BYTES ) ) : 
			$visit
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
		//\session_cache_limiter( 'public' );
		\session_name( \SESSION_TITLE );
		\session_start();
	}
	
	if ( $reset ) {
		\session_regenerate_id( true );
		foreach ( \array_keys( $_SESSION ) as $k ) {
			unset( $_SESSION[$k] );
		}
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
	$check 	= SESSION_STATE_FRESH;
	
	// First visit?
	$last	= $_SESSION['last'] ?? [];
	if ( empty( $last ) ) {
		$_SESSION['last'] = [ $now, 0 ];
		return $check;
	}
	
	// Session corrupted? Reset and send Not Modified
	if ( !\is_array( $last ) || \count( $last ) !== 2 ) {
		$_SESSION['last'] = [ $now, 0 ];
		return SESSION_STATE_CORRUPT;
	}
	
	// Check for generallly safe extensions requested 
	// in rapid succession
	$nice	= isSafeExt( $_SERVER['REQUEST_URI'] );
		
	// Timestamp segments
	$t	= ( int ) $last[0] ?? time();
	$q	= ( int ) $last[1] ?? 0;
	
	// Rapid query limit exceeded?
	if ( $q >= SESSION_LIMIT_COUNT ) {
		// Delay has timed out? Reset
		if ( ( $t + SESSION_EXP ) > $now ) {
			$_SESSION['last'] = [ $now, 0 ];
		
		// Generally safe extension?
		} elseif ( $nice ) {
			// Return as-is
			return $check;
			
		// Still within limit
		// Set time, but keep query limit
		} else {
			$_SESSION['last'] = [ $now, $q ];
			$check = SESSION_STATE_LIGHT;
		}
	} else {
		// Generally safe extension?
		if ( $nice ) {
			return $check;
		
		// Last request less than heavy throttle limit?
		// Probably abuse
		} elseif ( \abs( $now - $t ) < SESSION_LIMIT_HEAVY ) {
			$_SESSION['last'] = [ $now, $q++ ];
			$check = SESSION_STATE_HEAVY;
			
		// Less than medium throttle limit?
		// Probably just impatient
		} elseif ( \abs( $now - $t ) < SESSION_LIMIT_MEDIUM ) {
			$_SESSION['last'] = [ $now, $q ];
			$check = SESSION_STATE_MEDIUM;
		
		// No limits exceeded. Reset
		} else {
			$_SESSION['last'] = [ $now, 0 ];
		}
	}
	
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
		shutdown( 'cleanup' );
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
	return getRoot() . 
	\gmdate( 'Y/m/d/', \strtotime( $stamp ) ) . 
	\ltrim( \basename( $slug, '.md' ), '/' );
}

/**
 *  Feed timestamp
 */
function dateRfc( $stamp = null ) : string {
	return 
	\gmdate( \DATE_RFC2822, \strtotime( $stamp ?? 'now' ) );
}

/**
 *  Convert all spaces to single character
 */
function unifySpaces( string $text, string $rpl = ' ' ) {
	return \preg_replace( '/[[:space:]]+/', ' ', pacify( $text ) );
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
function normal( string $text ) {
	if ( \class_exists( "Normalizer" ) ) {
		\Normalizer::normalize( 
			$text, \Normalizer::FORM_C 
		);
	}
	
	return $text;
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
 *  Get IP address (best guess)
 */
function getIP() : string {
	static $ip;
	
	if ( isset( $ip ) ) {
		return $ip;
	}
		
	$ip	= $_SERVER['REMOTE_ADDR'];
	$va	=
	( SKIP_LOCAL ) ?
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
			return $output[$name] ?? '';
		}
		
		// Execute handlers in order and store in output
		foreach( $handlers[$name] as $handler ) {
			$output[$name] = 
			$handler( 
				$name, $output[$name] ?? [], ...$params 
			) ?? '';
		}
	}
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
	
	// Apply Markdown formatting
	$html		= markdown( $html, $prefix );
	
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
		$link		= config( 'error_root', \ERROR_ROOT );
		$errors		= \rtrim( $link, '/' ) . '/';
		return $errors;
	}
	
	$link		= config( 'page_link', \PAGE_LINK );
	$root		= \rtrim( $link, '/' ) . '/';
	return $root;
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
	if ( $arr ) {
		return 
		[ 'get', 'head', 'options' ];
	}
	
	return 'GET, HEAD, OPTIONS';
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
	
	die( 'Unknown status code "' . $code . '"' );
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
	
	$url	= isSecure() ? 'https://' : 'http://';
	$url	.= $_SERVER['SERVER_NAME'];
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
function setCacheExp( int $ttl = \CACHE_TTL ) {
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
		setCacheExp();
		$full	= fullURI();
		shutdown( 'saveCache', [ $full, $content ] );
		shutdown( 'cleanup' );
	}
	
	// Schedule flush
	shutdown( 'flush' );
	echo $content;
	
	// End
	shutdown();
}

/**
 *  Send error message wrapped in default page template
 */
function sendError( int $code, $body ) {
	$path = '';
	
	// Try to send a static error file if it exists first
	switch( $code ) {
		case 400:
		case 401:
		case 403:
		case 404:
		case 405:
		case 429:
			$path = getRoot( true ) . $code . '.html';
			break;
			
		case 500:
		case 501:
		case 503:
			$path = getRoot( true ) . '50x.html';
			break;
	}
	
	if ( !empty( $path ) ) {
		if ( \file_exists( $path ) ) {
			sendFilePrep( $path, $code );
			sendFileFinish( $path, true );
			shutdown();
		}
	}
	
	$page_t	= \strtr( \TPL_ERROR_PAGE ?? '', [ 
			'{page_title}'	=> PAGE_TITLE,
			'{tagline}'	=> PAGE_SUB,
			'{home}'	=> homeLink(),
			'{code}'	=> $code,
			'{body}'	=> $body 
		] );
	send( $code, $page_t );
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
	if ( false !== $tags[$path]['fsize'] ) {
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
	} else {
		$tags[$path]['fmod'] = 0;
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
	}
	
	// Cleanup and flush before readfile
	cleanup();
	
	// Send any headers and end buffering
	\ob_end_flush();
	
	if ( ifModified( $etag ) ) {
		readfile( $path );
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
		die( 'Invalid URL' );
	}
	
	// Get get current path
	$path	= getRoot() . $url['path'] ?? '';
	
	// Directory traversal
	$path	= \preg_replace( '/\.{2,}', '.', $path );
	
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
 *  Request filter and cache check. This should be first called
 *  
 *  @param string	$verb		Request method
 *  @param string	$path		Current request URI
 *  @param array	$routes		List of route presets
 */
function request( string &$verb, string $path, array $routes ) {
	// Set session save handler
	setSessionHandler();
	
	// Check throttling
	sessionThrottle();
	
	// Request path (simpler filter before proper XSS scan)
	if ( 
		false !== \strpos( $path, '..' ) || 
		false !== \strpos( $path, '<' )	
	) {
		shutdown( 'cleanup' );
		sendError( 400, \MSG_INVALID );
	}
	
	// Possible XSS, directory traversal, or file upload detected
	if ( 
		\preg_match( RX_XSS3, $path ) || 
		\preg_match( RX_XSS4, $path ) || 
		!empty( $_FILES )
	) {
		shutdown( 'cleanup' );
		sendError( 403, \MSG_DENIED );
	}
	
	// Request path hard limit
	if ( \mb_strlen( $path, '8bit' ) > 255 ) {
		shutdown( 'cleanup' );
		send( 414 );
	}
	
	// Process request method for valid types
	$verb		= \strtolower( $verb );
	
	// Check request method
	switch( $verb ) {
		// Will need processing, continue
		case 'get':
			break;
		
		// Send no content
		case 'head':
			handleHead( $path, $routes );
			break;
		
		// Send allowed methods
		case 'options':
			handleOptions();
			break;
		
		// Nothing else implemented
		default:
			shutdown( 'cleanup' );
			send( 405 );
	}
	
	// Try to send file, if it's a file
	if ( fileRequest( $verb, $path ) ) {
		shutdown( 'cleanup' );
		shutdown();
	}
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
		$safe	= 
		\array_map( 'trim', \explode( ',', SAFE_EXT ) );
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
	if ( !\is_callable( $event ) ) {
		// Route isn't a function
		sendError( 404, \MSG_NOTFOUND );
	}
	$params			= filterParams( $params );
	
	// Append the method and route
	$params['path']		= $path;
	$params['method']	= $verb;
	
	$event( $params );
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
	static $markers;
	if ( !isset( $markers ) ) {
		$markers = decode( \ROUTE_MARK );
	}
	
	$root	= getRoot();
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
 *  Execute route
 */
function route( $routes ) {
	$path	= $_SERVER['REQUEST_URI'];
	$verb	= \strtolower( $_SERVER['REQUEST_METHOD'] );
	
	// Filter request
	request( $verb, $path, $routes );
	
	// Check if content is already cached for this URI
	$uri	= fullURI();
	$cache	= getCache( $uri );
	
	// Check if cache isn't empty
	if ( !empty( $cache ) ) {
		// Is this a feed?
		if ( 0 === \strcasecmp( \basename( $path ), 'feed' ) ) {
			send( 200, $cache, false, true );
		} else {
			send( 200, $cache, false );
		}
	}
	
	$found	= routeMatch( $path, $verb, $routes );
	if ( empty( $found ) ) {
		// No matching route?
		sendError( 404, \MSG_NOTFOUND );
	}
	
	sendRoute( $found[0], $path, $verb, $found[1] );
	
	// Something went wrong
	sendError( 404, \MSG_NOTFOUND );
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

function postData( $raw ) {
	if ( \file_exists( $raw ) ) {
		return \file( $raw, \FILE_IGNORE_NEW_LINES );
	}
	return [];
}

function loadPost(
	string	&$title,
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
	$title	= '';
	$data	= postData( POSTS . $path . '.md' );
	
	if ( empty( $data ) ) {
		return '';
	}
	
	$out	= formatPost( $title, $data, $path, TPL_POST ?? '' );
	return $out;
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
	$start	= ( $page - 1 ) * PAGE_LIMIT;
	$end	= $start + PAGE_LIMIT;
	$title	= '';
	
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
			
			$tpl		= 
				$feed ? 
				( TPL_ITEM  ?? '' ) : ( TPL_POST ?? '' );
			$posts[$path]	= 
			formatPost( $title, $data, $path, $tpl );
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
			$post		= \array_slice( $post, 0, 1 );
			
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
		'{permalink}'	=> 
		website() . dateSlug( \basename( $path ), $pub )
	];
}

// 
function formatPost(
	string	&$title,
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
		sendError( 404, \MSG_NOTFOUND );
	}
			
	// Apply metadata
	metadata( $title, $perm, $pub, $post, $path );
	// Format metadata
	
	$data	= formatMeta( $title, $pub, $perm );
	
	// Everything else is the body
	$post	= \array_slice( $post, 1 );
	$data['{body}'] = html( \implode( "\n", $post ), homeLink() ); 
	
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
			'filter'	=> \FILTER_SANITIZE_NUMBER_INT,
			'options'	=> [
				'min_range'	=> YEAR_START,
				'max_range'	=> YEAR_END,
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
		$prefix	= \rtrim( homeLink(), '/' ) . $s;
	
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
		$prefix	= \rtrim( homeLink(), '/' ) . $s . $stamp;
		$posts	= loadPosts( $page, $stamp );
	}
	
	$tpl	= [
		'{page_title}'	=> PAGE_TITLE,
		'{post_title}'	=> PAGE_TITLE,
		'{tagline}'	=> PAGE_SUB,
		'{home}'	=> homeLink(),
		
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
	
	send( 200, \strtr( TPL_PAGE ?? '', $tpl ), true );
}

/**
 *  Syndication feed
 */
function feed( $params ) {
	$posts	= loadPosts( 1, '', true );
	if ( empty( $posts ) ) {
		sendError( 404, \MSG_NOTFOUND );
	}
	
	$tpl	= [
		'{page_title}'	=> PAGE_TITLE,
		'{home}'	=> homeLink(),
		'{tagline}'	=> PAGE_SUB,
		'{date_gen}'	=> dateRfc(),
		'{body}'	=> \implode( '', $posts )
	];
	
	send( 200, \strtr( TPL_FEED ?? '', $tpl  ), true, true );
}

/**
 *  View single post
 */
function post( $params ) {
	$data	= filterRequest( $params );
	$date	= enforceDates( $data );
	$title	= '';
	$post	= 
	loadPost( 
		$title,
		( int ) $date[0], 
		( int ) $date[1], 
		( int ) $date[2], 
		$data['slug'] ?? ''
	);
	
	if ( empty( $post ) ) {
		sendError( 404, \MSG_NOTFOUND );
	}
	
	$tpl	= [
		'{page_title}'	=> PAGE_TITLE,
		'{post_title}'	=> $title . ' - ' . PAGE_TITLE,
		'{tagline}'	=> PAGE_SUB,
		'{body}'	=> $post,
		'{paginate}'	=> 
		\strtr( TPL_NAV ?? '', [ '{text}' => navHome() ] ),
		'{home}'	=> homeLink(),
		
		// Footer with home link set
		'{footer}'	=> 
		\strtr( 
			TPL_FOOTER ?? '', 
			[ '{home}'	=> homeLink() ] 
		)
	];
	send( 200, \strtr( TPL_PAGE ?? '', $tpl ), true );
}

/**
 *  Rebuild index cache
 */
function reindex( $params ) {
	$posts	= loadIndex();
	if ( empty( $posts ) ) {
		die( 'No posts created' );
	}
	
	$out	= '';
	foreach( $posts as $k => $v ) {
		if ( is_array( $v ) ) {
			foreach( $v as $p ) {
				$out .= 
				\strtr( TPL_INDEX ?? '', $p );
			}
		}
	}
	$out	= \strtr( TPL_INDEX_WRAP, [ '{items}' => $out ] );
	
	$tpl	= [
		'{page_title}'	=> PAGE_TITLE,
		'{post_title}'	=> PAGE_TITLE,
		'{tagline}'	=> PAGE_SUB,
		'{body}'	=> $out,
		'{paginate}'	=> '',
		'{home}'	=> homeLink(),
		
		// Footer with home link set
		'{footer}'	=> 
		\strtr( 
			TPL_FOOTER ?? '', 
			[ '{home}'	=> homeLink() ] 
		)
	];
	
	send( 200, \strtr( TPL_PAGE ?? '', $tpl ), true );
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

