<?php

namespace Tests\Weew\App\ErrorHandler;

use PHPUnit_Framework_TestCase;
use Weew\App\App;
use Weew\App\ErrorHandler\ErrorHandlingProvider;

class ErrorHandlingProviderTest extends PHPUnit_Framework_TestCase {
    public function test_create_app_with_provider() {
        $app = new App();
        $app->getKernel()->addProvider(ErrorHandlingProvider::class);
        $app->run();
    }
}
