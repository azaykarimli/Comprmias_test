<?php

use PHPUnit\Framework\TestCase;

class PrimeTest extends TestCase
{

    public function testThatFruitArraysMatch()
    {
        //require '../worker.php';
        //require_once dirname( __FILE__ ) . '/' . '../../worker.php';
        require_once __DIR__.'/../worker.php';

        $apple = array(
            0 =>
            array(
                'worker_after' => 2,
                'worker' => 2,
                'counter' => 0,
                'name' => 'worker_2',
                'type' => 'Apple',
            ),
            1 =>
            array(
                'worker_after' => 3,
                'worker' => 3,
                'counter' => 0,
                'name' => 'worker_3',
                'type' => 'Apple',
            ),
            2 =>
            array(
                'worker_after' => 4,
                'worker' => 4,
                'counter' => 0,
                'name' => 'worker_1',
                'type' => 'Apple',
            ),
        );

        $given_rand_num = 4;

        $result = distrubuter($apple, $given_rand_num);

        $expected_result = array(
            0 =>
            array(
                'worker_after' => 5,
                'worker' => 3,
                'counter' => 2,
                'name' => 'worker_3',
                'type' => 'Apple',
            ),
            1 =>
            array(
                'worker_after' => 4,
                'worker' => 2,
                'counter' => 2,
                'name' => 'worker_2',
                'type' => 'Apple',
            ),
            2 =>
            array(
                'worker_after' => 4,
                'worker' => 4,
                'counter' => 0,
                'name' => 'worker_1',
                'type' => 'Apple',
            ),
        );


        $this->assertEquals(json_encode($result), json_encode($expected_result));

    }
}
