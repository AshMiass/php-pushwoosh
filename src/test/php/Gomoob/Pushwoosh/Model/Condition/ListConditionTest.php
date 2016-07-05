<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Condition;

use PHPUnit\Framework\TestCase;

/**
 * Test case used to test the <code>ListCondition</code> class.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 * @group  ListConditionTest
 */
class ListConditionTest extends TestCase
{
    /**
     * Test method for the <code>#in(array $values)</code> function.
     */
    public function testIn()
    {
        $listCondition = ListCondition::create('A_TAG')->in(['value1', 'value2', 'value3']);
        $array = $listCondition->jsonSerialize();

        $this->assertCount(3, $array);
        $this->assertSame('A_TAG', $array[0]);
        $this->assertSame('A_TAG', $listCondition->getTagName());

        $this->assertSame('IN', $array[1]);
        $this->assertSame('IN', $listCondition->getOperator());

        $this->assertCount(3, $array[2]);
        $this->assertSame('value1', $array[2][0]);
        $this->assertSame('value2', $array[2][1]);
        $this->assertSame('value3', $array[2][2]);

        $operand = $listCondition->getOperand();
        $this->assertCount(3, $operand);
        $this->assertSame('value1', $operand[0]);
        $this->assertSame('value2', $operand[1]);
        $this->assertSame('value3', $operand[2]);

    }
}
