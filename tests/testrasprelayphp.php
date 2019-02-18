<?php
/**
 * Created by PhpStorm.
 * User: elminsondeoleobaez
 * Date: 10/3/18
 * Time: 1:52 PM
 */
namespace Elminson\rasprelayphp;

require __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;

class testrasprelayphp extends TestCase
{

    /**
     *
     */
    public function testFirstTestCase()
    {
        $rasprelayphp = new rasprelayphp();
        $this->assertEquals("index", $rasprelayphp->index());
    }

}
