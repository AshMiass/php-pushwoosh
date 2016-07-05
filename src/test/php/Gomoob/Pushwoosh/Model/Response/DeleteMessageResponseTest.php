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
 * Test case used to test the <code>DeleteMessageResponse</code> class.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 * @group  DeleteMessageResponseTest
 */
class DeleteMessageResponseTest extends TestCase
{
    /**
     * Test method for the <tt>create(array $json)</tt> function.
     */
    public function testCreate()
    {
        // Test with a successful response
        $deleteMessageResponse = DeleteMessageResponse::create(
            [
                'status_code' => 200,
                'status_message' => 'OK'
            ]
        );

        $this->assertTrue($deleteMessageResponse->isOk());
        $this->assertSame(200, $deleteMessageResponse->getStatusCode());
        $this->assertSame('OK', $deleteMessageResponse->getStatusMessage());

        // Test with an error response
        $deleteMessageResponse = DeleteMessageResponse::create(
            [
                'status_code' => 400,
                'status_message' => 'KO'
            ]
        );

        $this->assertFalse($deleteMessageResponse->isOk());
        $this->assertSame(400, $deleteMessageResponse->getStatusCode());
        $this->assertSame('KO', $deleteMessageResponse->getStatusMessage());
    }
}
