<?php

namespace Tests\Weew\App\ErrorHandler;

use Exception;
use PHPUnit_Framework_TestCase;
use Weew\App\App;
use Weew\App\ErrorHandler\ErrorHandlingProvider;
use Weew\ErrorHandler\ErrorHandler;
use Weew\ErrorHandler\Errors\FatalError;
use Weew\ErrorHandler\IErrorHandler;

class ErrorHandlingProviderTest extends PHPUnit_Framework_TestCase {
    private function createApp() {
        $app = new App();
        $app->getKernel()->addProvider(ErrorHandlingProvider::class);
        $app->run();

        return $app;
    }

    public function test_create_app_with_provider() {
        $this->createApp();
    }

    public function test_shares_instances() {
        $app = $this->createApp();
        $this->assertNotNull(
            $app->getContainer()->get(ErrorHandler::class)
        );
        $this->assertNotNull(
            $app->getContainer()->get(IErrorHandler::class)
        );
    }

    /**
     * @runInSeparateProcess
     */
    public function test_set_status_code_on_error() {
        $app = $this->createApp();
        /** @var ErrorHandlingProvider $provider */
        $provider = $app->getContainer()->get(ErrorHandlingProvider::class);
        $provider->handleError(new FatalError(null, null, null, null));
        $this->assertEquals(500, http_response_code());
    }

    /**
     * @runInSeparateProcess
     */
    public function test_set_status_code_on_exception() {
        $app = $this->createApp();
        /** @var ErrorHandlingProvider $provider */
        $provider = $app->getContainer()->get(ErrorHandlingProvider::class);
        $provider->handleException(new Exception());
        $this->assertEquals(500, http_response_code());
    }
}
