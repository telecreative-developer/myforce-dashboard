###################
Dashboard Myforce
###################

*******************
Pustaka dan kerangka kerja yang digunakan
*******************

**************************
Step 1: Install the Nginx Web Server
**************************

sudo apt-get update

sudo apt-get install nginx

*******************
Step 2: Install PHP for Processing
*******************

We now have Nginx installed to serve our pages and MySQL installed to store and manage our data. However, we still don't have anything that can generate dynamic content. We can use PHP for this.

Since Nginx does not contain native PHP processing like some other web servers, we will need to install php-fpm, which stands for "fastCGI process manager". We will tell Nginx to pass PHP requests to this software for processing.

We can install this module and will also grab an additional helper package that will allow PHP to communicate with our database backend. The installation will pull in the necessary PHP core files. Do this by typing:

sudo apt-get install php-fpm php-mysql
Configure the PHP Processor
We now have our PHP components installed, but we need to make a slight configuration change to make our setup more secure.

Open the main php-fpm configuration file with root privileges:

sudo nano /etc/php/7.0/fpm/php.ini

What we are looking for in this file is the parameter that sets cgi.fix_pathinfo. This will be commented out with a semi-colon (;) and set to "1" by default.

This is an extremely insecure setting because it tells PHP to attempt to execute the closest file it can find if the requested PHP file cannot be found. This basically would allow users to craft PHP requests in a way that would allow them to execute scripts that they shouldn't be allowed to execute.

We will change both of these conditions by uncommenting the line and setting it to "0" like this:

/etc/php/7.0/fpm/php.ini

cgi.fix_pathinfo=0

Save and close the file when you are finished.

Now, we just need to restart our PHP processor by typing:

sudo systemctl restart php7.0-fpm
This will implement the change that we made.


************
Configure Nginx to Use the PHP Processor
************

Now, we have all of the required components installed. The only configuration change we still need is to tell Nginx to use our PHP processor for dynamic content.

We do this on the server block level (server blocks are similar to Apache's virtual hosts). Open the default Nginx server block configuration file by typing:

sudo nano /etc/nginx/sites-available/default


server {
    listen 80 default_server;
    listen [::]:80 default_server;

    root /var/www/html;
    index index.php index.html index.htm index.nginx-debian.html;

    server_name server_domain_or_IP;

    location / {
        try_files $uri $uri/ =404;
    }

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/run/php/php7.0-fpm.sock;
    }

    location ~ /\.ht {
        deny all;
    }
}

When you've made the above changes, you can save and close the file.
Test your configuration file for syntax errors by typing:

sudo nginx -t

If any errors are reported, go back and recheck your file before continuing.

When you are ready, reload Nginx to make the necessary changes:

sudo systemctl reload nginx

*******
Configuration Database
*******

CodeIgniter has a config file that lets you store your database connection values (username, password, database name, etc.). The config file is located at application/config/database.php. You can also set database connection values for specific environments by placing database.php in the respective environment config folder.

The config settings are stored in a multi-dimensional array with this prototype:

$db['default'] = array(
        'dsn'   => '',
		
        'hostname' => 'ip database',
       
		'username' => 'username database',
        
		'password' => 'password database',
        
		'database' => 'database_name',
        
		'dbdriver' => 'mysqli',
        
		'dbprefix' => '',
        
		'pconnect' => TRUE,
        
		'db_debug' => TRUE,
        
		'cache_on' => FALSE,
        
		'cachedir' => '',
        
		'char_set' => 'utf8',
        
		'dbcollat' => 'utf8_general_ci',
        
		'swap_pre' => '',
        
		'encrypt' => FALSE,
        
		'compress' => FALSE,
        
		'stricton' => FALSE,
        
		'failover' => array()
);
