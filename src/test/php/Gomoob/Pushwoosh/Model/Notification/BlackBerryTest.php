<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Notification;

use PHPUnit\Framework\TestCase;

/**
 * Test case used to test the <code>BlackBerry</code> class.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 * @group  BlackBerryTest
 */
class BlackBerryTest extends TestCase
{
    /**
     * Test method for the <code>#create()</code> function;
     */
    public function testCreate()
    {
        $this->assertNotNull(BlackBerry::create());

    }

    /**
     * Test method for the <code>#getHeader()</code> and <code>setHeader($header)</code> functions.
     */
    public function testGetSetBanner()
    {
        $blackBerry = new BlackBerry();
        $this->assertSame($blackBerry, $blackBerry->setHeader('header'));
        $this->assertSame('header', $blackBerry->getHeader());
    }

    /**
     * Test method for the <code>#jsonSerialize()</code> function.
     */
    public function testJsonSerialize()
    {
        $array = BlackBerry::create()
            ->setHeader('header')
            ->jsonSerialize();

        $this->assertCount(1, $array);
        $this->assertSame('header', $array['blackberry_header']);
    }
}
