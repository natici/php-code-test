<?php
/*
 * @Date         : 2022-03-02 14:49:25
 * @LastEditors  : Jack Zhou <jack@ks-it.co>
 * @LastEditTime : 2022-03-02 17:22:16
 * @Description  : 
 * @FilePath     : /recruitment-php-code-test/tests/App/DemoTest.php
 */

namespace Test\App;

use App\App\Demo;
use App\Util\HttpRequest;
use PHPUnit\Framework\TestCase;


class DemoTest extends TestCase {

    private $demo;

    public function __construct()
    {
        parent::__construct();
        $this->demo = new Demo(\Logger::class, new HttpRequest());
    }

    public function test_foo() {
        $this->assertNotEquals('bar', $this->demo->foo(), 'not equal "bar"');
    }

    /**
     * 根据以上的代码写一个Demo类的单元测试
     * @return void
     */
    public function test_get_user_info() {
        $user_info = $this->demo->get_user_info();

        $this->assertNotNull($user_info, 'fetch data error');

        $user_info = json_decode($user_info, true);
        $this->assertNotFalse($user_info, 'data type is not json');
        $this->assertContains('error', $user_info, 'error field in response is missing');
        $this->assertContains('data', $user_info, 'data field in response is missing');
        $this->assertNotEquals(0, $user_info['error'], 'error field in response equals to 1');
    }
}