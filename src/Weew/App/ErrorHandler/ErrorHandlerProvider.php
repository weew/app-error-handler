<?php

namespace Weew\App\ErrorHandler;

use Exception;
use Weew\Container\IContainer;
use Weew\ErrorHandler\ErrorHandler;
use Weew\ErrorHandler\Errors\IError;
use Weew\ErrorHandler\IErrorHandler;

class ErrorHandlerProvider {
    /**
     * @param IContainer $container
     * @param ErrorHandler $errorHandler
     *
     * @throws \Weew\ErrorHandler\Exceptions\InvalidHandlerType
     */
    public function initialize(IContainer $container, ErrorHandler $errorHandler) {
        $container->set([ErrorHandler::class, IErrorHandler::class], $errorHandler);

        $errorHandler->enableErrorHandling();
        $errorHandler->enableExceptionHandling();

        $errorHandler->addErrorHandler([$this, 'handleError']);
        $errorHandler->addExceptionHandler([$this, 'handleException']);
    }

    /**
     * @param IError $error
     *
     * @return bool
     */
    public function handleError(IError $error) {
        $this->setInternalServerErrorStatusCode();

        return false;
    }

    /**
     * @param Exception $exception
     *
     * @return bool
     */
    public function handleException(Exception $exception) {
        $this->setInternalServerErrorStatusCode();

        return false;
    }

    /**
     * Set status code to 500.
     */
    public function setInternalServerErrorStatusCode() {
        if ( ! headers_sent()) {
            header('HTTP/1.1 500 Internal Server Error');
        }
    }
}
