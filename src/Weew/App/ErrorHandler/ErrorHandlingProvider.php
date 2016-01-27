<?php

namespace Weew\App\ErrorHandler;

use Exception;
use Weew\Container\IContainer;
use Weew\ErrorHandler\ErrorHandler;
use Weew\ErrorHandler\IErrorHandler;

class ErrorHandlingProvider {
    /**
     * @param IContainer $container
     * @param ErrorHandler $errorHandler
     *
     * @throws \Weew\ErrorHandler\Exceptions\InvalidHandlerType
     */
    public function initialize(IContainer $container, ErrorHandler $errorHandler) {
        $container->set([ErrorHandler::class, IErrorHandler::class], $errorHandler);

        $errorHandler->convertErrorsToExceptions(true);
        $errorHandler->enableExceptionHandling();

        $errorHandler->addExceptionHandler([$this, 'setStatusCodeOnError']);
    }

    /**
     * @param Exception $ex
     *
     * @return bool
     */
    public function setStatusCodeOnError(Exception $ex) {
        header('HTTP/1.1 500 Internal Server Error');

        return false;
    }
}
