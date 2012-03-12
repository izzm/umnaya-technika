<?php

//...Stuff before routing occurs

//Set the include path so that the Routing library files can be included.
set_include_path(get_include_path() . PATH_SEPARATOR . 'lib');

//Include lib.
foreach (glob("lib/*.php") as $filename) {
  include_once($filename);
}

//Include model.
foreach (glob("model/*.php") as $filename) {
  include_once($filename);
}

//start session
session_start();

$app = Application::getInstance()->initialize();

$url = urldecode($_SERVER['REQUEST_URI']);

try {
    $found_route = $app->getRouter()->findRoute($url);
    $app->getDispatcher()->dispatch( $found_route );
} catch ( RouteNotFoundException $e ) {
    PageError::show('404', $url);
} catch ( badClassNameException $e ) {
    PageError::show('400', $url);
} catch ( classFileNotFoundException $e ) {
    PageError::show('500', $url);
} catch ( classNameNotFoundException $e ) {
    PageError::show('500', $url);
} catch ( classMethodNotFoundException $e ) {
    PageError::show('500', $url);
} catch ( classNotSpecifiedException $e ) {
    PageError::show('500', $url);
} catch ( methodNotSpecifiedException $e ) {
    PageError::show('500', $url);
}
