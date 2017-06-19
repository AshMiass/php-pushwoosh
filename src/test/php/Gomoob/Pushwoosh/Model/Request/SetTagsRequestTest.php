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
 * Test case used to test the <code>SetTagsRequest</code> class.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 * @group  SetTagsRequestTest
 */
class SetTagsRequestTest extends TestCase
{
    /**
     * Test method for the <tt>addTag($tagName, $tagValue)</tt> function.
     */
    public function testAddTag()
    {
        $setTagsRequest = new SetTagsRequest();
        $this->assertNull($setTagsRequest->getTags());
        $setTagsRequest->addTag('tag0', 'tag0_value');
        $setTagsRequest->addTag('tag1', 'tag1_value');
        $setTagsRequest->addTag('tag2', 'tag2_value');
        $tags = $setTagsRequest->getTags();
        $this->assertCount(3, $tags);
        $this->assertTrue(array_key_exists('tag0', $tags));
        $this->assertTrue(array_key_exists('tag1', $tags));
        $this->assertTrue(array_key_exists('tag2', $tags));
        $this->assertSame('tag0_value', $tags['tag0']);
        $this->assertSame('tag1_value', $tags['tag1']);
        $this->assertSame('tag2_value', $tags['tag2']);

        // Adding the same tag 2 times is forbidden
        try {
            $setTagsRequest->addTag('tag0', 'tag0_value');
            $this->fail('Must have thrown a PushwooshException !');
        } catch (PushwooshException $pe) {
            $this->assertSame(
                'The tag \'tag0\' has already been added, use the \'setTag\' method if you want to overwrite its ' .
                'value !',
                $pe->getMessage()
            );
        }
    }

    /**
     * Test method for the <tt>create()</tt> function.
     */
    public function testCreate()
    {
        $setTagsRequest = SetTagsRequest::create();

        $this->assertNotNull($setTagsRequest);
    }

    /**
     * Test method for the <tt>getApplication()</tt> and <tt>setApplication($application)</tt> functions.
     */
    public function testGetSetApplication()
    {
        $setTagsRequest = new SetTagsRequest();
        $this->assertNull($setTagsRequest->getApplication());
        $setTagsRequest->setApplication('APPLICATION');
        $this->assertSame('APPLICATION', $setTagsRequest->getApplication());
    }

    /**
     * Test method for the `getAuth()` and `setAuth($auth)` functions.
     */
    public function testGetSetAuth()
    {
        $setTagsRequest = new SetTagsRequest();

        // Gets for `getAuth()`
        try {
            $setTagsRequest->getAuth();
            $this->fail('Must have throw a PushwooshException !');
        } catch (PushwooshException $pex) {
            $this->assertSame('This request does not support the \'auth\' parameter !', $pex->getMessage());
        }

        // Gets for `getAuth()`
        try {
            $setTagsRequest->setAuth('XXXX');
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
        $setTagsRequest = new SetTagsRequest();
        $this->assertNull($setTagsRequest->getHwid());
        $setTagsRequest->setHwid('HWID');
        $this->assertSame('HWID', $setTagsRequest->getHwid());
    }

    /**
     * Test method for the <tt>getTags()</tt> and <tt>setTags($tags)</tt> functions.
     */
    public function testGetSetTags()
    {
        $setTagsRequest = new SetTagsRequest();
        $this->assertNull($setTagsRequest->getTags());
        $setTagsRequest->setTags(
            [
                'tag0' => 'tag0_value',
                'tag1' => 'tag1_value',
                'tag2' => 'tag2_value'
            ]
        );
        $tags = $setTagsRequest->getTags();
        $this->assertCount(3, $tags);
        $this->assertTrue(array_key_exists('tag0', $tags));
        $this->assertTrue(array_key_exists('tag1', $tags));
        $this->assertTrue(array_key_exists('tag2', $tags));
        $this->assertSame('tag0_value', $tags['tag0']);
        $this->assertSame('tag1_value', $tags['tag1']);
        $this->assertSame('tag2_value', $tags['tag2']);
    }

    /**
     * Test method for the <tt>hasTag($tagName)</tt> function.
     */
    public function testHasTag()
    {
        $setTagsRequest = new SetTagsRequest();
        $this->assertFalse($setTagsRequest->hasTag('tag0'));
        $setTagsRequest->addTag('tag0', 'tag0_value');
        $this->assertTrue($setTagsRequest->hasTag('tag0'));
        $this->assertFalse($setTagsRequest->hasTag('tag1'));
    }

    /**
     * Test method for the <tt>removeTag($tagName)</tt> function.
     */
    public function testRemoveTag()
    {
        $setTagsRequest = new SetTagsRequest();
        $this->assertNull($setTagsRequest->getTags());

        // Removing a tag which does not exist has no effect
        $setTagsRequest->removeTag('tag0');

        $setTagsRequest->setTags(
            [
                'tag0' => 'tag0_value',
                'tag1' => 'tag1_value',
                'tag2' => 'tag2_value'
            ]
        );

        $setTagsRequest->removeTag('tag3');

        $tags = $setTagsRequest->getTags();
        $this->assertCount(3, $tags);
        $this->assertTrue(array_key_exists('tag0', $tags));
        $this->assertTrue(array_key_exists('tag1', $tags));
        $this->assertTrue(array_key_exists('tag2', $tags));
        $this->assertSame('tag0_value', $tags['tag0']);
        $this->assertSame('tag1_value', $tags['tag1']);
        $this->assertSame('tag2_value', $tags['tag2']);

        // Test removal of existing tags
        $setTagsRequest->removeTag('tag0');
        $tags = $setTagsRequest->getTags();
        $this->assertCount(2, $tags);
        $this->assertFalse(array_key_exists('tag0', $tags));
        $this->assertTrue(array_key_exists('tag1', $tags));
        $this->assertTrue(array_key_exists('tag2', $tags));
        $this->assertSame('tag1_value', $tags['tag1']);
        $this->assertSame('tag2_value', $tags['tag2']);

        $setTagsRequest->removeTag('tag2');
        $tags = $setTagsRequest->getTags();
        $this->assertCount(1, $tags);
        $this->assertFalse(array_key_exists('tag0', $tags));
        $this->assertTrue(array_key_exists('tag1', $tags));
        $this->assertFalse(array_key_exists('tag2', $tags));
        $this->assertSame('tag1_value', $tags['tag1']);
    }

    /**
     * Test method for the <tt>setTag($tagName, $tagValue)</tt> function.
     */
    public function testSetTag()
    {
        $setTagsRequest = new SetTagsRequest();
        $this->assertNull($setTagsRequest->getTags());
        $setTagsRequest->setTag('tag0', 'tag0_value');
        $setTagsRequest->setTag('tag1', 'tag1_value');
        $setTagsRequest->setTag('tag2', 'tag2_value');
        $tags = $setTagsRequest->getTags();
        $this->assertCount(3, $tags);
        $this->assertTrue(array_key_exists('tag0', $tags));
        $this->assertTrue(array_key_exists('tag1', $tags));
        $this->assertTrue(array_key_exists('tag2', $tags));
        $this->assertSame('tag0_value', $tags['tag0']);
        $this->assertSame('tag1_value', $tags['tag1']);
        $this->assertSame('tag2_value', $tags['tag2']);

        // Overwriting a tag value is authorized
        $setTagsRequest->setTag('tag0', 'tag0_other_value');
        $setTagsRequest->setTag('tag1', 'tag1_other_value');
        $setTagsRequest->setTag('tag2', 'tag2_other_value');
        $tags = $setTagsRequest->getTags();
        $this->assertCount(3, $tags);
        $this->assertTrue(array_key_exists('tag0', $tags));
        $this->assertTrue(array_key_exists('tag1', $tags));
        $this->assertTrue(array_key_exists('tag2', $tags));
        $this->assertSame('tag0_other_value', $tags['tag0']);
        $this->assertSame('tag1_other_value', $tags['tag1']);
        $this->assertSame('tag2_other_value', $tags['tag2']);
    }

    /**
     * Test method for the <tt>jsonSerialize()</tt> function.
     */
    public function testJsonSerialize()
    {
        $setTagsRequest = new SetTagsRequest();

        // Test without the 'application' parameter set
        try {
            $setTagsRequest->jsonSerialize();
            $this->fail('Must have thrown a PushwooshException !');
        } catch (PushwooshException $pe) {
            $this->assertSame('The \'application\' property is not set !', $pe->getMessage());
        }

        // Test without the 'hwid' parameter set
        $setTagsRequest->setApplication('APPLICATION');
        try {
            $setTagsRequest->jsonSerialize();
            $this->fail('Must have thrown a PushwooshException !');
        } catch (PushwooshException $pe) {
            $this->assertSame('The \'hwid\' property is not set !', $pe->getMessage());
        }

        // Test without the 'tags' parameter set
        $setTagsRequest->setHwid('HWID');
        try {
            $setTagsRequest->jsonSerialize();
            $this->fail('Must have thrown a PushwooshException !');
        } catch (PushwooshException $pe) {
            $this->assertSame('The \'tags\' property is not set !', $pe->getMessage());
        }

        $setTagsRequest->setTags(
            [
                'tag0' => 'tag0_value',
                'tag1' => 'tag1_value',
                'tag2' => 'tag2_value'
            ]
        );

        // Test with valid values
        $array = $setTagsRequest->jsonSerialize();
        $this->assertSame('APPLICATION', $setTagsRequest->getApplication());
        $this->assertSame('HWID', $setTagsRequest->getHwid());

        $tags = $array['tags'];
        $this->assertCount(3, $tags);
        $this->assertTrue(array_key_exists('tag0', $tags));
        $this->assertTrue(array_key_exists('tag1', $tags));
        $this->assertTrue(array_key_exists('tag2', $tags));
        $this->assertSame('tag0_value', $tags['tag0']);
        $this->assertSame('tag1_value', $tags['tag1']);
        $this->assertSame('tag2_value', $tags['tag2']);
    }
}
