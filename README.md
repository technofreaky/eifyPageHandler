eifyPageHandler
=========
[![Gitter](https://badges.gitter.im/Join Chat.svg)](https://gitter.im/eMailify/eifyPageHandler?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)
Simple php page handler script
 

----------

How to Use?
=====
First add the below htaccess in your application
```htaccess
<IfModule mod_rewrite.c>
RewriteEngine On
RewriteBase /emailify/
RewriteRule ^index\.php$ - [L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . /emailify/index.php [L]
</IfModule>
```

Simple, Include the class file in your application bootstrap (setup/load/configuration or whatever you call it) Ex:

```PHP
include_once('class-eifypagehandler.php');
$page = new eifyPageHander;
```

### To Register A New Hander

```PHP
	/**
	 * Register's A Page hander
	 * @param string $handler handler hane
	 * @param string $file file path for the handler
	 * @param string title for the file given
	 * @param boolean login is required for current file
	 * @return boolean
	 */
	$page->registerHandler('listuer','list.php','List Users',true);
```

### To Remove A Existing Handler

```PHP
	/**
	* Removes a page handler
	* @param string $handler handler name to remove
	* @return boolean
	*/
	$page->deregisterHandler('user');
```

### Get Page Name for a Handler 

```PHP
	/**
	 * Returns the file path for the given handler
	 * @param string $handler
	 * @return boolean
	 */
	$page->getHandler('user')
```


### Get Page Name for a Handler:

```PHP
	/**
	 * Returns Current Requested Page
	 * @return Handler Name [string]
	 */
	$page->requestHander()
```

### Get Current Page Title 
```php
echo $page->currentTitle() ;
```
### Get Current File
```php
echo $page->currentPage();
```
### Get Current Handler Name
```php
echo $page->currentHandler();
```
