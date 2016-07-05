<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Response;

use PHPUnit\Framework\TestCase;

/**
 * Test case used to test the <code>UnregisterDeviceResponse</code> class.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 * @group  UnregisterDeviceResponseTest
 */
class UnregisterDeviceResponseTest extends TestCase
{
    /**
     * Test method for the <tt>create(array $json)</tt> function.
     */
    public function testCreate()
    {
        // Test with a success response
        $unregisterDeviceResponse = UnregisterDeviceResponse::create(
            [
                'status_code' => 200,
                'status_message' => 'OK'
            ]
        );

        $this->assertTrue($unregisterDeviceResponse->isOk());
        $this->assertSame(200, $unregisterDeviceResponse->getStatusCode());
        $this->assertSame('OK', $unregisterDeviceResponse->getStatusMessage());

        // Test with an error response
        $unregisterDeviceResponse = UnregisterDeviceResponse::create(
            [
                'status_code' => 400,
                'status_message' => 'KO'
            ]
        );

        $this->assertFalse($unregisterDeviceResponse->isOk());
        $this->assertSame(400, $unregisterDeviceResponse->getStatusCode());
        $this->assertSame('KO', $unregisterDeviceResponse->getStatusMessage());
    }
}
