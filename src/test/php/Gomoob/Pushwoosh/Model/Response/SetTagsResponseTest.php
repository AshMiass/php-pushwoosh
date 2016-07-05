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
 * Test case used to test the <code>SetTagsResponse</code> class.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 * @group  SetTagsResponseTest
 */
class SetTagsResponseTest extends TestCase
{
    /**
     * Test method for the <tt>create(array $json)</tt> function.
     */
    public function testCreate()
    {
        // Test with a success response
        $setTagsResponse = SetTagsResponse::create(
            [
                'status_code' => 200,
                'status_message' => 'OK'
            ]
        );

        $this->assertTrue($setTagsResponse->isOk());
        $this->assertSame(200, $setTagsResponse->getStatusCode());
        $this->assertSame('OK', $setTagsResponse->getStatusMessage());

        // Test with an error response
        $setTagsResponse = SetTagsResponse::create(
            [
                'status_code' => 400,
                'status_message' => 'KO'
            ]
        );

        $this->assertFalse($setTagsResponse->isOk());
        $this->assertSame(400, $setTagsResponse->getStatusCode());
        $this->assertSame('KO', $setTagsResponse->getStatusMessage());
    }
}
