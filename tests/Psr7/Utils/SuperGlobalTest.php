<?php 
/*
 * This file is part of the Shieldon package.
 *
 * (c) Terry L. <contact@terryl.in>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Shieldon\Psr7\Utils;

use PHPUnit\Framework\TestCase;
use Shieldon\Psr7\Utils\SuperGlobal;

class SuperGlobalTest extends TestCase
{
    public function test_Static_extract()
    {
        $data = SuperGlobal::extract();

        $array = [
            'HTTP_ACCEPT' => 'text/html,application/xhtml+xml,application/xml;q=0.9',
            'HTTP_ACCEPT_CHARSET' => 'ISO-8859-1,utf-8;q=0.7,*;q=0.3',
            'HTTP_ACCEPT_LANGUAGE' => 'en-US,en;q=0.9,zh-TW;q=0.8,zh;q=0.7',
            'HTTP_USER_AGENT' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)',
            'QUERY_STRING' => '',
            'REMOTE_ADDR' => '127.0.0.1',
            'REQUEST_METHOD' => 'GET',
            'REQUEST_SCHEME' => 'http',
            'REQUEST_URI' => '',
            'SCRIPT_NAME' => '',
            'SERVER_NAME' => 'localhost',
            'SERVER_PORT' => 80,
            'SERVER_PROTOCOL' => 'HTTP/1.1',
        ];

        unset($data[0]['REQUEST_TIME']);
        unset($data[0]['REQUEST_TIME_FLOAT']);

        $this->assertEquals($data[0], $array);
    }
}
