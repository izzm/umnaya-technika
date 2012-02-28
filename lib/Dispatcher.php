<?php
/**
 * @author Rob Apodaca <rob.apodaca@gmail.com>
 * @copyright Copyright (c) 2009, Rob Apodaca
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link http://robap.github.com/php-router/
 */
class Dispatcher
{
    /**
     * The suffix used to append to the class name
     * @var string
     */
    private $suffix;

    /**
     * The path to look for classes (or controllers)
     * @var string
     */
    private $classPath;

    /**
     * Controller instance
     * @var string
     */
    private $controllerInstance;

    /**
     * View paht
     * @var string
     */
    private $viewPath;


    /**
     * Class constructor
     */
    public function __construct()
    {
        $this->setSuffix('');
    }

    public function getController()
    {
        return $this->controllerInstance;
    }

    /**
     * Attempts to dispatch the supplied Route object. Returns false if it fails
     * @param Route $route
     * @param mixed $context
     * @throws classFileNotFoundException
     * @throws badClassNameException
     * @throws classNameNotFoundException
     * @throws classMethodNotFoundException
     * @throws classNotSpecifiedException
     * @throws methodNotSpecifiedException
     * @return mixed - result of controller method or FALSE on error
     */
    public function dispatch( Route $route, $context = null )
    {
        $class      = trim($route->getMapClass());
        $method     = trim($route->getMapMethod());
        $arguments  = $route->getMapArguments();

        if( '' === $class )
            throw new classNotSpecifiedException('Class Name not specified');

        if( '' === $method )
            throw new methodNotSpecifiedException('Method Name not specified');

        //Because the class could have been matched as a dynamic element,
        // it would mean that the value in $class is untrusted. Therefore,
        // it may only contain alphanumeric characters. Anything not matching
        // the regexp is considered potentially harmful.
        $class = str_replace('\\', '', $class);
        preg_match('/^[a-zA-Z0-9_]+$/', $class, $matches);
        if( count($matches) !== 1 )
            throw new badClassNameException('Disallowed characters in class name ' . $class);

        //Apply the suffix
        $file_name = $this->classPath . $class . $this->suffix;
        $class_without_suffix = $class;
        $class = $class . str_replace($this->getFileExtension(), '', $this->suffix);
        
        //At this point, we are relatively assured that the file name is safe
        // to check for it's existence and require in.
        if( FALSE === file_exists($file_name) )
            throw new classFileNotFoundException('Class file not found');
        else
            require_once($file_name);

        //Check for the class class
        if( FALSE === class_exists($class) )
            throw new classNameNotFoundException('class not found ' . $class);

        //Check for the method
        if( FALSE === method_exists($class, $method))
            throw new classMethodNotFoundException('method not found ' . $method);

        //Merge arguments with get and post data
        $arguments = array_merge($arguments, $_GET, $_POST);

        //All above checks should have confirmed that the class can be instatiated
        // and the method can be called
        $this->controllerInstance = new $class($context, array(
          'controller' => $class_without_suffix,
          'action' => $method,
          'viewPath' => $this->viewPath,
          'params' => $arguments
        ));
        return call_user_func(array($this->controllerInstance, $method), $arguments);
    }

    /**
     * Sets a suffix to append to the class name being dispatched
     * @param string $suffix
     * @return Dispatcher
     */
    public function setSuffix( $suffix )
    {
        $this->suffix = $suffix . $this->getFileExtension();

        return $this;
    }

    /**
     * Set the path where dispatch class (controllers) reside
     * @param string $path
     * @return Dispatcher
     */
    public function setClassPath( $path )
    {
        $this->classPath = preg_replace('/\/$/', '', $path) . '/';

        return $this;
    }
    
    public function setViewPath( $path )
    {
        $this->viewPath = preg_replace('/\/$/', '', $path) . '/';

        return $this;
    }
    private function getFileExtension()
    {
        return '.php';
    }
}

class badClassNameException extends Exception{}
class classFileNotFoundException extends Exception{}
class classNameNotFoundException extends Exception{}
class classMethodNotFoundException extends Exception{}
class classNotSpecifiedException extends Exception{}
class methodNotSpecifiedException extends Exception{}

