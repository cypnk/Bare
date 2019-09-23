# Bare
A single file directory-to-blog

Bare has no usernames, passwords, editors, file uploaders, or other  
mechanisms that get in the way of writing your thoughts. Simply put your  
posts in *year/month/day/slug.md* format, and Bare will publish it. 

The first line in each post is the title. The URL slug is the filename.  
Posts can be tagged by adding the last line in the following format:  
`tags: cabin, diy`

You can also schedule posts to be published at a future date as bare will  
only show posts from the current date and into the past.

Bare will also create an archive of all posts and create a syndication  
feed of the most recent ones.

Bare understands a rudimentary subset of [Markdown](https://daringfireball.net/projects/markdown/) and will filter HTML  
for you. 

Optionally, Bare will use the [Parsedown](https://github.com/erusev/parsedown) and the [ParsedownExtra](https://github.com/erusev/parsedown-extra) classes  
to format Markdown, if these files are present.

Bare's simple installation and minimal set of features make it ideal for  
hosting blogs on [Hidden Services](https://en.wikipedia.org/wiki/Tor_(anonymity_network)#Onion_services) on the Tor anonymity network.

The author's [personal blog](http://http://kpz62k4pnyh5g5t2efecabkywt2aiwcnqylthqyywilqgxeiipen5xid.onion) is using Bare.  
Use the [Tor Browser Bundle](https://www.torproject.org/) to visit.

## Installation

Upload the following to your web root:
* .htaccess - Required if using the Apache web server
* index.php - Your homepage
* /posts folder - Contains your posts (use your favorite editor)
* /cache folder - Formatted cache

Change the default settings in *index.php* E.G. SITE_NAME etc...  
*index.php* Also has the default theme so there are no other files to edit.

Bare supports caching of formatted posts. Simply enable write  
permissions to the cache directory. On \*nix systems:
```
chmod -R 755 /your-web-root/cache
```

And then, follow the conventions in the example post:
```
/posts/2018/09/22/a-new-post.md
```

## Content formatting

HTML is filtered of potentially harmful tags, however embedding videos  
to YouTube, Vimeo or PeerTube is supported via shortcodes.
```
E.G. For Youtube: 

[youtube https://www.youtube.com/watch?v=RJ0ULhVKwEI]
or
[youtube https://youtu.be/RJ0ULhVKwEI]
or
[youtube RJ0ULhVKwEI]

For Vimeo:

[vimeo https://vimeo.com/113315619]
or
[vimeo 113315619]


For PeerTube (any instance):
[peertube https://peertube.mastodon.host/videos/watch/56047136-00eb-4296-afc3-dd213fd6bab0]
``` 

To embed a previously uploaded image file, use markdown syntax:
```
![alt text](https://example.com/filename.jpg)
``` 

## Custom errors (optional)

A separate */errors* folder can be used to create custom error pages  
for each HTTP status code. The location of the */errors* folder is  
configurable via the ERROR_ROOT setting.

E.G. Create an */errors/404.html* file and put your custom Not Found  
content. The following status codes are supported for custom errors:  
`400, 401, 403, 404, 405, 429, 500, 501, 503`


## Installing on other web servers

### Nginx

The Nginx web server supports URL rewriting and file filtering. The  
following is a simple configuration for a site named example.com.  
Note: The pound sign(#) denotes comments.

The following is an example configuration tested on Arch linux.
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

### OpenBSD's httpd(8) web server

The OpenBSD operating system comes with its own web server in the base  
installation. Previously, this was the Apache web server and then Nginx.

OpenBSD does not come with PHP and needs to be installed separately:
```
doas pkg_add php_fpm
```  
**Note:** Although it shares the same comment style, httpd(8) configuration  
directives *do not* end in a semicolon(;) unlike Nginx settings.

The following configuration can be used if Bare is installed as the  
"example.com" website (tested on OpenBSD 6.5).
```

# A site called "example.com" 
server "www.example.com" {
	alias "example.com"
  
	# listening on external addresses
	listen on egress port 80
	
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
