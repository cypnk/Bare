# Bare
A single file directory-to-blog

Bare has no usernames, passwords, editors, file uploaders, or other mechanisms that get in the way of writing your thoughts. Simply put your posts in *year/month/day/slug.md* format, and Bare will publish it.

The first line in each post is the title. The URL slug is the filename. Posts can be tagged by adding the last line in the following format:  
`tags: cabin, diy`

You can also schedule posts to be published at a future date as bare will only show posts from the current date and into the past. Bare will create an archive of all posts and create a syndication feed of the most recent ones.

An about page can be created by editing *posts/about/main.md*. Additional about pages can be added to the same directory and again the URL is the filename. About sub directories can also be added. The location of the "about" folder may be renamed to anything else URL friendly, and under 255 characters in length, in the "aboutview" URL route in *index.php*.

A static homepage can be shown instead of the lastest posts by creating a *posts/home.md* page. Bare will show this similar to an about page.

Bare understands a few HTML tags, which can be extended, and a rudimentary subset of [Markdown](https://daringfireball.net/projects/markdown/). 

Posts are cached in a SQLite database created dynamically, which enables fast browsing and searching for posts by tags, title, or post body. The *cache.db* can be deleted at any time and Bare will rebuild it on the first visit to your blog.

An extensive hook system allows customizing posts, indexes, and other template elements. Hooks also enable completely overriding the default behavior of most rendering functions and some core functions via [plugins](https://github.com/cypnk/Bare-Plugins).

Bare's simple installation and minimal set of features make it ideal for hosting blogs on [Hidden Services](https://en.wikipedia.org/wiki/Tor_(anonymity_network)#Onion_services) on the Tor anonymity network.

The author's [personal blog](http://kpz62k4pnyh5g5t2efecabkywt2aiwcnqylthqyywilqgxeiipen5xid.onion) is using Bare.  
Use the [Tor Browser Bundle](https://www.torproject.org/) to visit.

![Bare](https://raw.githubusercontent.com/cypnk/Bare/master/88x15-button1.jpg) 
![Bare Powered](https://raw.githubusercontent.com/cypnk/Bare/master/88x15-button2.jpg)

## Table of contents
* [Requirements](#requirements)
* [Installation](#installation)
	* [Multiple blogs or shared content](#multiple-blogs-or-shared-content)
* [Formatting](#content-formatting)
* [Custom errors (optional)](#custom-errors-optional)
* [Installing on other web servers](#installing-on-other-web-servers)
	* [Nginx](#nginx)
	* [OpenBSD's httpd(8) web server](#openbsds-httpd8-web-server)
* [Running a TLS-enabled Bare blog on OpenBSD](#running-a-tls-enabled-bare-blog-on-openbsd)
* [Troubleshooting](#troubleshooting)



## Requirements
* Webserver capable of handling URL rewrites (Apache, Nginx etc...)
* PHP Version 8+

The following PHP extensions may need to be installed or enabled in **php.ini**:
* pdo_sqlite (*required*)
* sqlite3 (*required*)
* mbstring
* fileinfo (*required*)
* intl
* tidy

**Note:** Various Windows and Unix-like platforms have differing locations for [php.ini](https://www.php.net/manual/en/configuration.file.php). Check your installation or contact your administrator to gain access to this file.

Remember to backup **php.ini** before making changes to it. 

The GD extension is suggested as plugins may use it, however it is not required for core functionality.

If you prefer to use [Composer](https://getcomposer.org/) to handle your environment (optional), use the following example **composer.json**:
```
{
	"require": {
		"php": ">=8.0",
		"lib-iconv": "*",
		"ext-pdo": "*",
		"ext-pdo_sqlite": "*",
		"ext-mbstring": "*",
		"ext-fileinfo": "*",
		"ext-intl" : "*",
		"ext-tidy" : "*"
	},
	"suggest": {
		"ext-gd": "*"
	},
	"prefer-stable": true
}
```

## Installation
**Note**: These instructions are for the [releases](https://github.com/cypnk/Bare/releases). Only use released Bare versions.

Upload the following to your web root:
* .htaccess - Required only if using the Apache web server
* index.php - Your homepage
* /posts folder - Contains your posts (use your favorite editor) and content such as CSS, media, or robots.txt
* /cache folder - Formatted cache (needs write access)
* /errors - Custom error pages (optional)

The */posts*, */cache*, and */errors* folder locations can be adjusted in *index.php*. You may keep them in the same directory or outside the web root as long as PHP still has access to them. The */errors* folder can be excluded entirely if you don't intend to use any custom error pages.

An optional **config.json** file can be created in the */cache* folder to override all but a few configuration defaults. The **config.json** uses typical [JSON formating](https://en.wikipedia.org/wiki/JSON) and will make it easier to upgrade Bare while preserving your settings.

The following changes are to the settings in *index.php*, which also has the default theme so there are no other files to edit. 

Add your site's domain name, E.G. *example.com*, to SITES_ENABLED in **index.php** (currently, the author's Tor blog is in this place) or to the 'sites_enabled' setting in the **config.json** file:
```
{
	"example.com" : []
}
```
And if testing for both *example.com* and locally on localhost:
```
{
	"example.com" : [],
	"localhost" : []
}
```
Bare is multi-site capable.

### Multiple blogs or shared content
Add your domains to SITES_ENABLED in *index.php* or to 'sites_enabled' in **config.json** as above:
```
{
	"example.com": [],
	"example.net": []
}
```
Add your posts for **example.com** in */posts/example.com/* and posts for **example.net** in */posts/example.net/* and so on, following the *year/month/day/title-slug.md* format.

Hosting a blog in a subfolder instead of the main domain:
```
{
	"example.com" : [ 
		{
			"basepath" : "\/myblog"
		} 
	]
}
```
Or multiple blogs on the same domain:
```
{
	"example.com" : [ 
		{
			"basepath" : "\/"
		}, 
		{
			"basepath" : "\/secondblog"
		} 
	]
}
```
To put a blog into maintenance mode:
```
{
	"example.com" : [ 
		{
			"basepath" : "\/",
			"is_maintenance": 1
		} 
	]
}
```
Make a blog inactive:
```
{
	"example.com" : [ 
		{
			"basepath" : "\/",
			"is_active": 0
		} 
	]
}
```
As above, remember to escape forward slashes. 

Bare supports caching of formatted posts. Simply enable write permissions to the cache directory. On \*nix systems:
```
chmod -R 755 /your-web-root/cache
```

And then, follow the conventions in the example post:
```
/posts/2018/09/22/a-new-post.md
```

## Content formatting
To embed a previously uploaded image file, use markdown syntax:
```
![alt text](https://example.com/filename.jpg)
or 
![alt text](/path/to/filename.jpg)
```
HTML is filtered of potentially harmful tags, however embedding videos to YouTube, Vimeo, PeerTube, Archive.org or LBRY/Odysee is supported via shortcodes.

E.G. For uploaded audio files:
```
[audio /path/to/file.mp3]
```
For uploaded video media:
```
Plain video:
[video /path/to/media.mp4]

Video with preview thumbnail:
[video (/path/to/preview.jpg) /path/to/media.mp4]
```
For media with subtitles or captions in [WebVTT](https://en.wikipedia.org/wiki/WebVTT) format
```
Simple captions:
[video [/path/to/captions.vtt] /path/to/media.mp4]

Captions and media preview:
[video [/path/to/captions.vtt] (/path/to/preview.jpg) /path/to/media.mp4]

Subtitles:
[video [lang=en&label=English&src=/path/to/en.vtt] /path/to/media.mp4]

Subtitles in multiple languages:
[video [lang=de&label=Deutsche&src=/path/to/de.vtt][lang=jp&label=日本語&src=/path/to/jp.vtt] /path/to/media.mp4]

Multiple languages with single default set:
[video [lang=en&label=English&default=yes&src=/path/to/en.vtt][lang=de&label=Deutsche&src=/path/to/de.vtt][lang=jp&label=日本語&src=/path/to/jp.vtt] /path/to/media.mp4]
```

For YouTube: 
```
[youtube https://www.youtube.com/watch?v=RJ0ULhVKwEI]
or
[youtube https://youtu.be/RJ0ULhVKwEI]
or
[youtube RJ0ULhVKwEI]
```
For Vimeo:
```
[vimeo https://vimeo.com/113315619]
or
[vimeo 113315619]
```
For Archive.org:
```
[archive https://archive.org/details/A-Few-Days-In-Winter]
or
[archive A-Few-Days-In-Winter]
```
For PeerTube (any instance):
```
[peertube https://peertube.mastodon.host/videos/watch/56047136-00eb-4296-afc3-dd213fd6bab0]
```
**Note:** Remember to add the PeerTube instance URL to the list of URLs in FRAME_WHITELIST (one per line) in your *index.php* or 'frame_whitelist' in *config.json* (JSON array format)

For Odysee or LBRY video (use the "Download" link in the share options)
```
[odysee https://odysee.com/$/download/eevblog-1367-5-types-of-oscilloscope/2d70c817aa4e1f7ce6b66473b0c3b66fd09d9281]
or 
[lbry https://lbry.tv/$/download/eevblog-1367-5-types-of-oscilloscope/2d70c817aa4e1f7ce6b66473b0c3b66fd09d9281]

```

## Custom errors (optional)

A separate */errors* folder can be used to create custom error pages for each HTTP status code. The location of the */errors* folder is configurable via the ERROR_ROOT setting.

E.G. Create an */errors/404.html* file and put your custom Not Found content. The following status codes are supported for custom errors:  
`400, 401, 403, 404, 405, 429, 500, 501, 503`


## Installing on other web servers

### Nginx

The Nginx web server supports URL rewriting and file filtering. The following is a simple configuration for a site named example.com.  
**Note:** The pound sign(#) denotes comments.

The following is an example server block tested on Manjaro Linux (Arch based). The location of **nginx.config** will depend on your platform.
```
server {
	server_name example.com;
	
	# Change this to your web root, if it's different
	root /usr/share/nginx/example.com/html;
	
	# Prevent access to special files
	location ~\.(hta|htp|md|conf|db|sql|json|sh)\$ {
		deny all;
	}
	
	# Prevent access to cache folder
	location /cache {
		deny all;
	}
	
        # Remember to put static files (I.E. .css, .js etc...)
        # in the same directory you set in FILE_PATH
	
	# Send all requests (that aren't static files) to index.php
	location / {
		try_files $uri @barehandler;
		index index.php;
	}
	
	location @barehandler {
                rewrite ^(.*)$ /index.php;
        }
	
	# Handle php
	location ~ \.php$ {
		fastcgi_pass	unix:/run/php-fpm/php-fpm.sock;
		fastcgi_index	index.php;
		include		fastcgi.conf;
        }
}
``` 

The *index.php* file should be in the subfolder you're hosting the blog from, if you haven't added any custom rewriting rules to your webserver configuration, and also remember to change the static file and cache directory. This is especially important when hosting a blog from a subfolder instead of the main web root.

### OpenBSD's httpd(8) web server

The OpenBSD operating system comes with its own web server in the base installation. Previously, this was the Apache web server and then Nginx.

OpenBSD does not come with PHP and needs to be installed separately. Select the highest version after each command:
```
doas pkg_add php
doas pkg_add php-pdo_sqlite
doas pkg_add php-tidy
doas pkg_add php-intl
```
If you're already logged in as root, skip the "[doas](https://man.openbsd.org/doas)" before each command.

Edit **/etc/php-8.x.ini** (or the version of PHP you're running) and make sure the following extensions are enabled.
```
extension=fileinfo
extension=intl
extension=mbstring
extension=pdo_sqlite
extension=sqlite3
extension=tidy
```

Now enable and start PHP.  
This is assuming 8.0, but other versions follow the same convention:
```
doas rcctl enable php80_fpm
doas rcctl start php80_fpm
```

**Note:** Although it shares the same comment style, httpd(8) [configuration](https://man.openbsd.org/httpd.conf.5) directives *do not* end in a semicolon(;) unlike Nginx settings.

The following configuration can be used if Bare is installed as the "example.com" website (tested on OpenBSD 7.0).

Edit **/etc/httpd.conf** to add a custom server setting file:
```
include "/etc/httpd.conf.local"
```

Create **/etc/httpd.conf.local** and add the following:
```
# A site called "example.com" 
server "www.example.com" {
	alias "example.com"
  
	# listening on external addresses
	listen on egress port 80
	
	# Uncomment the following, if you're only hosting on Tor
	#listen on lo port 80
	
	# Default directory
	directory index "index.html"
  
	# Change this to your web root, if it's different
	root "/htdocs"
  
	# Prevent access to special files
	location "/*.hta*"		{ block }
	location "/*.htp*"              { block }
	location "/*.md*"		{ block }
	location "/*.conf*"		{ block }
	location "/*.db*"		{ block }
	location "/*.sql*"		{ block }
	location "/*.json*"		{ block }
	location "/*.sh*"		{ block }
	
	# Prevent access to data folder
	location "/cache/*"		{ block }
	
	# Remember to put static files (I.E. .css, .js etc...)
	# In the same directory you set in FILE_PATH
	
	# Let index.php handle all other requests
	location "/*" {
		directory index "index.php"
		
		# Change this to your web root, if it's different
		root { "/htdocs/index.php" }
		
		# Enable FastCGI handling of PHP
		fastcgi socket "/run/php-fpm.sock"
	}
}
``` 
Check your configuration by running: 
```
httpd -n
```

If there are no errors, run the following to load the changes:
```
doas rcctl reload httpd
```

Your new Bare blog is ready to be served.

To ensure the server and PHP will run each time you (re)start your OpenBSD system, remember to add the following to **rc.conf.local**:
```
httpd_flags=
pkg_scripts=php80_fpm
```

Or if you're hosting your blog over Tor, make sure that's added as well:
```
httpd_flags=
pkg_scripts=tor php80_fpm
```

If you have already enabled firewall access to your site, you may skip this part.

The OpenBSD [firewall is pf](https://man.openbsd.org/pf), which requires its own set of directives to enable serving websites. There is an example pf configuration which will let external web traffic through. Study the manual for a more detailed explanation what each of these directives do.

Make a backup of **/etc/pf.conf** first and include these directives:
```
# This may be adjusted for an e-commerce site, with shopping carts etc.., but this is fine for a Blog
set limit { states 500000, frags 2000 }

# A table to store flooding clients
table <flooders> persist counters

# You can also create permanent tables and add IP addresses to them
# E.G. A blocklist called "blocked" in a folder called "pftables"
# table <blocklist> persist file "/etc/pftables/blocked"

# Web traffic serving with maximum connection rate and throttling
websrv="(max 500, source-track rule, max-src-states 50, max-src-conn-rate 500/5, \
	max-src-conn 50, overload <flooders> flush global)"

# If you're also receiving email on the same server, uncomment the following
#mailsrv="(max 500, source-track rule, max-src-states 5, max-src-conn-rate 5/10, \
#	max-src-conn 3, overload <flooders> flush global)"

# Note the slash at the end of the first line indicates the directive wraps
# DO NOT add a space after that slash

# Block policy is to just drop the connection by default
set block-policy drop

# Ignore loopback (localhost)
set skip on lo

# Accommodate slow clients (E.G. when hosting over Tor)
set optimization high-latency
set ruleset-optimization profile
set timeout { frag 30 }

# Set syn cookies
set syncookies adaptive (start 25%, end 12%)

# Safety scrub
match in all scrub (no-df random-id max-mss 1440)
match out all scrub (no-df random-id reassemble tcp max-mss 1440)

# This *mostly* works, but a dedicated blocklist, like Spamhaus, is strongly recommended
antispoof quick for { egress lo0 }
block quick from { <flooders> }

# You can add more comma delimited tables to that list
# E.G. <flooders>, <abuse>, <spamhaus> etc...

# Deny access in both directions by default
block all
block return

# Spoof protection
block in quick from urpf-failed to any
block in quick from no-route to any

# Allow access to web ports (email is similar, but outside the scope of this)
pass in on egress inet proto tcp from any to (egress) port { 80 443 } keep state $websrv

# Uncomment this line if you're also handling email on this server
#pass in on egress inet proto tcp from any to (egress) port { 25 } keep state $mailsrv

# Pass TCP, UDP, ICMP
pass out on egress proto { tcp, udp, icmp } all modulate state

# The pf.conf that comes with OpenBSD has some other settings, which should be left as-is
# Only add/modify what's needed to get your site up and running, but learn more about what these do

```

## Running a TLS-enabled Bare blog on OpenBSD
**Note:** Remember to point your DNS servers to your web server's public IP address first.

This assumes you're already logged in as root and skips "doas". PHP installation is the same as above.

The server configuration is similar at first to the above steps.  
Edit **/etc/httpd.conf** to include your custom server settings:
```
include "/etc/httpd.conf.local"
```

Create or edit **/etc/httpd.conf.local** same as above, but add this instead:
```
# A site called "example.com" 
server "www.example.com" {
	alias "example.com"
	
	# listening on external addresses on port 80
	listen on egress port 80
	
	# Default directory
	directory index "index.html"
	
	# Change this to your web root, if it's different
	root "/htdocs"
	
	# acme-client needs this
	location "/.well-known/acme-challenge/*" {
		root "/acme"
		request strip 2
	}
}
```
OpenBSD comes with acme-client and this creates a basic website to use it.

Create or edit **/etc/acme-client.conf** to make sure it contains this:
```
authority letsencrypt {
	api url "https://acme-v02.api.letsencrypt.org/directory"
	account key "/etc/ssl/private/letsencrypt.key"
}

# Substitute example.com for your own domain
domain example.com {
	alternative names { www.example.com }
	domain key "/etc/ssl/private/example.com.key"
	domain certificate "/etc/ssl/example.com.crt"
	domain full chain certificate "/etc/ssl/example.com.pem"
	sign with letsencrypt
}

# And so on for your other domains...
```

Create these folders with appropriate permissions:
```
mkdir -p -m 700 /etc/ssl/private
mkdir -p -m 755 /var/www/acme
```

Check your configurations: 
```
httpd -n
acme-client -n
```

If there are no errors, reload httpd(8) so it can recognize changes:  
```
rcctl reload httpd
```

Then, run acme client to get your new certificate:
```
acme-client example.com
```

Your new certificate should be created and ready to be used.

Now, go back to **/etc/httpd.conf.local** to add the new settings. This is an example of a TLS enabled site with full logging:
```
# A site called "example.com" 

# Redirect all non-TLS requests to TLS enabled site
server "www.example.com" {
	alias "example.com"
	
	# listening on external addresses on port 80
	listen on egress port 80
	block return 301 "https://example.com$REQUEST_URI"
}

server "www.example.com" {
	alias "example.com"
  
	# listening on external addresses on TLS port
	listen on egress tls port 443
	
	# Default directory
	directory index "index.html"
	
	# Logging for access and errors 
	# Note: this is for request errors, which are different from blog errors
	log access "/example.com/access.log"
	log error "/example.com/error.log"
  
	# Change this to your web root, if it's different
	root "/htdocs"
	
	# Create your certificates first
	hsts max-age 31536000
	hsts subdomains
	tls {
		certificate "/etc/ssl/example.com.pem"
		key "/etc/ssl/private/example.com.key"
	}
	
	# This is specific to acme-client
	location "/.well-known/acme-challenge/*" {
		root "/acme"
		request strip 2
	}
	
	# Rest is the same as before 
	
	# Prevent access to special files
	location "/*.hta*"		{ block }
	location "/*.htp*"              { block }
	location "/*.md*"		{ block }
	location "/*.conf*"		{ block }
	location "/*.db*"		{ block }
	location "/*.sql*"		{ block }
	location "/*.json*"		{ block }
	location "/*.sh*"		{ block }
	
	# Prevent access to data folder, if it's also in the web root
	location "/cache/*"		{ block }
	
	# Remember to put static files (I.E. .css, .js etc...)
	# In the same directory you set in FILE_PATH
	
	# Let index.php handle all other requests
	location "/*" {
		directory index "index.php"
		
		# Change this to your web root, if it's different
		root { "/htdocs/index.php" }
		
		# Enable FastCGI handling of PHP
		fastcgi socket "/run/php-fpm.sock"
	}
}
```

It's a good idea to create a subfolder for each domain for logging
```
mkdir -p -m 755 /var/www/logs/example.com
```

The TLS settings have been made. Check the configuration again:
```
httpd -n
```

If there are no errors, reload httpd(8) to launch the site:
```
rcctl reload httpd
```

To make sure your certificate renews automatically, create or edit  
**/etc/weekly.local** with:
```
acme-client example.com
```
Now, every week, your domain's certificates are renewed when it's getting close to expiration.

Your Bare blog will now be served over a secure connection.  

## Troubleshooting

Always remember to backup *index.php* before making modifications to it. Remember that some plugins may cause errors. Disabling any newly added plugins (by taking them off the "plugins_enabled" list in *config.json* or removing them from the PLUGINS_ENABLED setting in *index.php*) may fix a problem. 

These are possible problems you may encounter and potential solutions to them. If Bare was able to run at least once, check the *error.log* file in the CACHE folder to see if something was written there. Most of the time, if Bare was succssfully installed, this will give you some useful information.

* **Problem: I don't see anything**
	* Check if you have set all the required definitions in *index.php* such as PATH, CACHE, and POSTS. If you only have the demo post and no plugins installed yet, Bare should run with just the default settings for the rest.  

	* Check if you have uploaded the posts folder with at least one post and cache folder along with *index.php*. For the Apache webserver, the .htaccess file is also required.  

	* Check if you have any JSON errors in *config.json* if you're using a custom configuration like this. Bare doesn't need a *config.json*, but having one makes upgrading easier.  

	* Check if your webserver is configured to host your site, have set permissions (chmod -R 0755 on \*nix systems) on the CACHE folder, and PHP has permission to run following the [installation instructions](#installation).  

	* At a minimum, check if you have PHP enabled and, as a test, create a plain *index.php* file with just `<?php echo 1;` in it and see if it prints "1". If you still don't see anything, then PHP is not installed or not configured correctly for your webserver.

* **Problem: I see a 404 error on the homepage, or 400 error or "Invalid request" error**  
	* Check if your domain name is added to the host whitelist. This is SITES_ENABLED in *index.php* or 'sites_enabled' in *config.json*. Bare should also work with your server's IP address if you don't yet have a domain name.  
	
	* If you're hosting multiple blogs or your Bare blog is on a subfolder or different domain, follow the [multiple blog instructions](#multiple-blogs-or-shared-content).

	* If Bare was running before and you made any recent changes, check if Bare runs with the restored *index.php*. Add the same changes one-by-one until you can narrow down which change caused the problem.

	* If you're running Bare behind [HAProxy](https://www.haproxy.org/), [relayd](https://man.openbsd.org/relayd.8), or another load balancer or gateway, update to the latest version of Bare and make sure the load balancer or gateway is correctly forwarding the host name and IP address from the client request to the web server.

* **Problem: I see my post doesn't look the way I want it to look** 
	* Bare understands a limited subset of [Markdown](https://daringfireball.net/projects/markdown/) formatting, but this may not be enough to express what you're trying to show. Bare will accept plain HTML tags as well, provided they're within the whitelist of allowed tags (either in the base installation or expanded via plugins). Try simple HTML, if Markdown formatting didn't work the way you expect.

	* If you're using any custom templates added to *index.php* or by using the [templates plugin](https://github.com/cypnk/Bare-Plugins/tree/master/templates), see if the post looks correctly without these changes.

	* If you're using custom CSS classes by adding them to "default_classes" in *config.json* or by adding them to DEFAULT_CLASSES in *index.php*, try changing or removing these to see if it makes a difference.
	
* **Problem: I see a message in errors.log in the CACHE folder**
	* **Error retrieving posts from...**
		* Check if the POSTS definition in *index.php* is set to the same location where you keep your blog posts. If you uploaded the demo post as-is, check if PHP has read permissions to this folder. You may also need to set ownership permissions for the webserver user (E.G. `chown -R www posts` on some platforms).
		
	* **Method not implemented**
		* One or more custom routes have a method other than "get", "head", or "post" that Bare doesn't yet support. If you made any recent changes to *index.php* to add a custom route or added a new plugin, revert the changes to see if the error returns.
		
	* **Database or SQLite errors**
		* "Error connecting to database": Bare requires SQLite be enabled for caching and searching posts. Make sure this is done in *php.ini* in the [installation instructions](#installation) above. Bare also needs PDO to be enabled.  
		
		* "Error writing to session ID to database": See if your CACHE folder has the correct write permissions. Try moving *session.db* to *session.db.bkp* so a new Session database can be created. If permissions are set and the problem is intermittent, this may be caused by too many connections at the same time and PHP not closing the database correctly.
		
		* "Error starting DB transaction in refreshPost()" or "Error starting DB transaction in loadIndex()": Something happened to the *cache.db* file in the CACHE folder between the site caching the post and trying to save any changes made to the post since. Try to move *cache.db* to *cache.db.bkp* and see if the problem persists when you refresh the page. A new *cache.db* should be created by Bare.
		
		* "Error inserting post...": This may be caused by *cache.db* being modified by a plugin. Bare depends on a specific database schema to cache posts and tags and if the *posts*, *tags*, and *post_tags* tables have been changed, caching won't work correctly. Disable any recently added plugins and as above, move the file to *cache.db.bkp* and see if the problem persists.

		* Other PDO error: If you're using any custom SQL queries, check if they have any syntax errors. These kinds of problems are likely caused by a plugin. Disable any new plugins and see if the error goes away.
	
	* **Formatting**
		* "Bare requires the libxml extension be enabled.": The libxml extension is usually enabled by default on PHP installations unless it was compiled with *--disable-libxml* set. Make sure your PHP installation comes with this extension and you're not using a custom compiled variant of PHP without it.
		
		* "Error loading DOMDocument" or another libxml error: This is usually caused by an unusual string sent to the html() function. Bare will filter out most harmful texts sent to it, but not everything is foolproof. If you're not using a plugin for commenting or other user input, check if your post text contains any invalid Unicode strings. Bare should handle virtually every Unicode string that PHP is also able to handle.

	* **Plugin errors**
		* "Error loading plugins(s)...": The PLUGINS directory must be correctly set in *index.php* (this cannot be set in *config.json* and PHP needs access to it).  
		
		* "Out of order call. Check hooks.": A plugin tried to run before the "loadPlugins" function under the "begin" event. This is caused by a misbehaving plugin. Disable your most recently added plugin and see if the error persists.

		* "Invalid file path search" or "Attempt to write to unloaded plugin directory": A plugin tried to write to another plugin's folder without that other plugin being loaded. Make sure your plugins have all their dependencies added first to "plugins_enabled" in *config.json* or PLUGINS_ENABLED in *index.php*  
		
		* "Unknown status code...": An attempt to send a page to a visitor or redirect a visitor using an HTTP status code that Bare doesn't support. Check for any redirects or send() function calls in any recently added plugins. Bare can respond with the following HTTP status codes:  
200, 201, 202, 204, 205, 206, 300, 301, 302, 303, 304, 400, 401, 403, 404, 405, 406, 407, 409, 410, 411, 412, 413, 414, 415, 425, 429, 431, 500, 501, 503  

		* "Invalid URL...": A redirect attempt was made to a different host, domain name, or IP address other than the one currently serving the visitor. Bare only supports redirecting to URLs on the same host using the built-in redirect() function.
		
		* "Headers already sent with code...": Some content (or just whitespace) was sent to the visitor before redirecting. Check for "echo" or send() function calls before the redirect() function call in the plugin.
		
		* "No route defined*: Bare requires at least one path, even if it's "" (I.E. empty path) to be defined to function. The addBlogRoutes() function adds the default Bare routes, but a plugin may overwrite these without adding any of its own, leading to this error.

	* **Email**

		* "mail() Has been disabled. Check the disable_function list in php.ini.": The administrator of your website or server has disabled access to the mail() function. This may have been done to prevent spam or other abuse. Make sure "mail" is not part of the disable_function list in *php.ini*. The location of *php.ini* depends on the way PHP was originally installed and, in some cases, the operating system. You may need to contact your administrator to enable this.

		* "Message cannot be empty.": A plugin or custom core function attempted to send an email without a message body. Check to make sure the code using the mailMessage() function has recepients, subject, and message body fields filled.

		* "Sender address is invalid. Check mail_from config setting.": Add a sender email (one which has permissions to send email on your server) to the MAIL_FROM setting in *index.php* or add to the "mail_from" setting in *config.json*. This is different from an email address entered into a contact form, for example.

		* "No valid recipients found. Check whitelist.": The whitelist of recipient addresses is still empty. Add one or more email addresses to MAIL_WHITELIST in *index.php* or add one or more emails to "mail_whitelist" in *config.json* which are meant to receive emails from Bare.

		* "No matching recipients in whitelist.": The recipient(s) was not in the mail_whitelist. Bare only supports sending email to one or more addresses in this whitelist. Make sure the intended recipient email address is added to the whitelist in "mail_whitelist" in *config.json* or MAIL_WHITELIST in *index.php*.

		* "Error sending message": An unkown error that Bare was not able to retrieve via the error_get_last() function which comes with PHP. This is usually caused by the PHP mail() function failing either due to a configuration error or a permission error. The *php_errors.log* file or other general PHP error file location on your web server (not part of Bare) may have more information regarding any errors Bare was not able get.

* **Problem: Bare isn't in my language / I want to change the language text seen by visitors**

	* To override the text of Bare messages or other language used by plugins, language files can be created in the CACHE folder location following the JSON format of the 'DEFAULT_LANGUAGE' in *index.php*. E.G. Since the current default language is U.S. English, this would be **en-US.json**. Other language files follow the same format: For Brazilian Portuguese **pt-BR.json**, for Indian and Sri Lankan Tamil **ta-IN.json** and **ta-SL.json** respectively, and so on.

	* If you already have a new language file and messages are still in U.S. English, check if the LANGUAGE setting in *index.php* or 'language' in *config.json* is set to your language and region and not still set to 'en-US'. Make sure your language file exists is in the CACHE folder location.
