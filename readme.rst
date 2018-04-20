###################
Dashboard Myforce
###################
Instalasi
**************************
Step 1: Install the Nginx Web Server
**************************

	sudo apt-get update

	sudo apt-get install nginx

*******************
Step 2: Install PHP for Processing
*******************

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

	sudo systemctl restart php7.0-fpm


************
Configure Nginx to Use the PHP Processor
************

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

*******
Configuration Path folder upload image
*******

buka file controller MyForce.php yang berada di application/controller/MyForce.php
lalu ubah codingan 

	$targetPath		 = '/opt/lampp/htdocs/myforce/assets/images/';
Menjadi
	$targetPath		 = 'folder server anda/myforce/assets/images/';
	
Lalukan hal yang sama pada ModelMyForce.php yang berada di application/model/ModelMyForce.php

	$targetPath		 = '/opt/lampp/htdocs/myforce/assets/images/';
Menjadi
	$targetPath		 = 'folder server anda/myforce/assets/images/';


*******
Configuration Add Sales and Managers
*******

Buka file addsales & addmanagers yang berada di folder 
	application/views/admin/addsales.php
	application/views/admin/addmanagers.php

*******
Sales :
*******

lalu cari codingan yang seperti ini : 

	$(function () {
	  $('form').on('submit', function (e) {
	    var password = document.getElementById("password").value;
	    var cpassword = document.getElementById("cpassword").value;
	    if(password == cpassword){
	      e.preventDefault();
	      $.ajax({
		type: 'POST',
		url: 'https://c4dd4986.ngrok.io/users',
		data: $('form').serialize(),
		statusCode: {
		  201: function () {
		    alert("Success add sales");
		    document.getElementById("postSales").reset();
		  },
		  400: function () {
		   alert("username or password already in use");
		  }
		}
	      }
	      );

	    }else{
	      e.preventDefault();
	      document.getElementById("demo").innerHTML = "Password anda tidak sama";
	    }
	  });
	});

ubah pada bagian url : 

	url: 'https://c4dd4986.ngrok.io/users',
	
menjadi url dari service myforce : 

	url: 'ipaddress/users',
	
*******
Managers :
*******

lalu cari codingan yang seperti ini : 

	$(function () {
	  $('form').on('submit', function (e) {
	    var password = document.getElementById("password").value;
	    var cpassword = document.getElementById("cpassword").value;
	    if(password == cpassword){
	      e.preventDefault();
	      $.ajax({
		type: 'POST',
		url: 'https://bd911e75.ngrok.io/managers',
		data: $('form').serialize(),
		statusCode: {
		  201: function () {
		    alert("Success add managers");
		    document.getElementById("postManagers").reset();
		  },
		  400: function () {
		   alert("username or password already in use");
		  }
		}
	      }
	      );

	    }else{
	      e.preventDefault();
	      document.getElementById("demo").innerHTML = "password is not the same ";
	    }
	  });
	});

ubah pada bagian url : 

	url: 'https://c4dd4986.ngrok.io/managers',
	
menjadi url dari service myforce : 

	url: 'ipaddress/managers',
	
