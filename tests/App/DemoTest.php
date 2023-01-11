<?php

namespace Test\App;

use App\App\Demo;
use App\Service\AppLogger;
use App\Util\HttpRequest;
use PHPUnit\Framework\TestCase;

use think\facade\Log;


class DemoTest extends TestCase
{
    

    
    public function test_foo()
    {
        $demo = new Demo(new AppLogger('log4php'),new HttpRequest());
        $this->assertEquals("bar",$demo->foo() );
    }
    
    public function test_get_user_info() {
        $demo = new Demo(new AppLogger('log4php'), new HttpRequest());
        $res = (array)$demo->get_user_info();
        $this->assertArrayHasKey("id", $res);
        $this->assertIsInt($res['id']);
        $this->assertArrayHasKey("username", $res);
        $this->assertIsString($res['username']);

    }

    
}
