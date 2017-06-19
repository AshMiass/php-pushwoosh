<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Request;

use Gomoob\Pushwoosh\Exception\PushwooshException;

use PHPUnit\Framework\TestCase;

/**
 * Test case used to test the <code>UnregisterDeviceRequest</code> class.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 * @group  UnregisterDeviceRequestTest
 */
class UnregisterDeviceRequestTest extends TestCase
{
    /**
     * Test method for the <tt>create()</tt> function.
     */
    public function testCreate()
    {
        $unregisterDeviceRequest = UnregisterDeviceRequest::create();

        $this->assertNotNull($unregisterDeviceRequest);
    }

    /**
     * Test method for the <tt>getApplication()</tt> and <tt>setApplication($application)</tt> functions.
     */
    public function testGetSetApplication()
    {
        $unregisterDeviceRequest = new UnregisterDeviceRequest();
        $this->assertNull($unregisterDeviceRequest->getApplication());
        $unregisterDeviceRequest->setApplication('APPLICATION');
        $this->assertSame('APPLICATION', $unregisterDeviceRequest->getApplication());
    }

    /**
     * Test method for the `getAuth()` and `setAuth($auth)` functions.
     */
    public function testGetSetAuth()
    {
        $unregisterDeviceRequest = new UnregisterDeviceRequest();

        // Gets for `getAuth()`
        try {
            $unregisterDeviceRequest->getAuth();
            $this->fail('Must have throw a PushwooshException !');
        } catch (PushwooshException $pex) {
            $this->assertSame('This request does not support the \'auth\' parameter !', $pex->getMessage());
        }

        // Gets for `getAuth()`
        try {
            $unregisterDeviceRequest->setAuth('XXXX');
            $this->fail('Must have throw a PushwooshException !');
        } catch (PushwooshException $pex) {
            $this->assertSame('This request does not support the \'auth\' parameter !', $pex->getMessage());
        }
    }

    /**
     * Test method for the <tt>getHwid()</tt> and <tt>setHwid($hwid)</tt> functions.
     */
    public function testGetSetHwid()
    {
        $unregisterDeviceRequest = new UnregisterDeviceRequest();
        $this->assertNull($unregisterDeviceRequest->getHwid());
        $unregisterDeviceRequest->setHwid('HWID');
        $this->assertSame('HWID', $unregisterDeviceRequest->getHwid());
    }

    /**
     * Test method for the <tt>jsonSerialize()</tt> function.
     */
    public function testJsonSerialize()
    {
        $unregisterDeviceRequest = new UnregisterDeviceRequest();

        // Test without the 'application' parameter set
        try {
            $unregisterDeviceRequest->jsonSerialize();
            $this->fail('Must have thrown a PushwooshException !');
        } catch (PushwooshException $pe) {
            $this->assertSame('The \'application\' property is not set !', $pe->getMessage());
        }

        // Test without the 'hwid' parameter set
        $unregisterDeviceRequest->setApplication('APPLICATION');
        try {
            $unregisterDeviceRequest->jsonSerialize();
            $this->fail('Must have thrown a PushwooshException !');
        } catch (PushwooshException $pe) {
            $this->assertSame('The \'hwid\' property is not set !', $pe->getMessage());
        }

        $unregisterDeviceRequest->setHwid('HWID');

        // Test with valid values
        $array = $unregisterDeviceRequest->jsonSerialize();
        $this->assertSame('APPLICATION', $unregisterDeviceRequest->getApplication());
        $this->assertSame('HWID', $unregisterDeviceRequest->getHwid());
    }
}
