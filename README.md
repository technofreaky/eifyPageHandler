eifyPageHandler
=========
Simple php page handler script
 

----------

How to Use?
=====

Simple, Include the class file in your application bootstrap (setup/load/configuration or whatever you call it) Ex:

```PHP
include_once('class-eifypagehandler.php');
$page = new eifyPageHander;
```

To Register A New Hander , EX:

```PHP
	/**
	 * Register's A Page hander
	 * @param string $handler handler hane
	 * @param string $file file path for the handler
	 * @return boolean
	 */
	$page->registerHandler('listuer','list.php');
```

To Remove A Existing Handler , EX:

```PHP
	/**
	* Removes a page handler
	* @param string $handler handler name to remove
	* @return boolean
	*/
	$page->deregisterHandler('user');
```

Get Page Name for a Handler , EX:

```PHP
	/**
	 * Returns the file path for the given handler
	 * @param string $handler
	 * @return boolean
	 */
	$page->getHandler('user')
```


Get Page Name for a Handler , EX:

```PHP
/**
	 * Returns Current Requested Page
	 * @return Handler Name [string]
	 */
	$page->requestHander()
```
