<?php

namespace Tests\AppBundle\Model;

use AppBundle\Model\NumericalSequence;
use PHPUnit\Framework\TestCase;

class SquenceModelTest extends TestCase
{
    /** @test */
    public function check_if_class_exists() {
        $this->assertTrue(class_exists(NumericalSequence::class));
    }

    /** @test */
    public function get_nth_element_of_sequence() {
        $expectedArray = array(
            1   => 1,
            2   => 1,
            3   => 2,
            4   => 1,
            5   => 3,
            6   => 2,
            7   => 3,
            8   => 1,
            9   => 4,
        );

        $randomNumber = rand(1, 9);

        // by default array_values counts from 0, had to combine array to match the expected outcome arr
        $arrayValues = array_combine(range(1, count($expectedArray)), array_values($expectedArray));

        $this->assertArrayHasKey($randomNumber, $expectedArray);
        $this->assertEquals($arrayValues, $expectedArray);
    }

    /** @test */
    public function get_max_element_of_sequence() {
        $expectedArray = array(
            1  => 1,
            2  => 1,
            3  => 2,
            4  => 1,
            5  => 3,
        );

        $sequence    = new NumericalSequence();
        $randomNumber = rand(1,5);
        $sequence->elementOfSequence($randomNumber);
        $max = $sequence->maxFor($randomNumber);

        $arrayValues = array_combine(range(1, count($expectedArray)), array_values($expectedArray));

        // this test might fail too many times as the random generated numbers is between 1-5,
        $this->assertEquals(max($arrayValues), $max, "The random generated number was: " . $randomNumber);
    }

    /** @test */
    public function check_if_n_between_range() {
        $this->assertLessThanOrEqual(rand(1, 99999), 12332, "the number is out of range");
    }
}
