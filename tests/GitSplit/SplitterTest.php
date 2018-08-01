<?php
/**
 * Created by PhpStorm.
 * User: vukanac
 * Date: 01.08.18
 * Time: 19:53
 */

namespace Tests\GitSplit;

use GitSplit\Splitter;
use PHPUnit\Framework\TestCase;

class SplitterTest extends TestCase
{
    function testSplit()
    {
        $lines = [];
        $lines[] = 'zajedno1';
        $lines[] = '<<<<<<< HEAD';
        $lines[] = 'only head';
        $lines[] = '=======';
        $lines[] = 'only new';
        $lines[] = '>>>>>>> branch new';
        $lines[] = 'zajedno2';


        $expected = [];
        $expected['head'][] = 'zajedno1';
        $expected['new'][] = 'zajedno1';
        $expected['head'][] = 'only head';
        $expected['new'][] = 'only new';
        $expected['head'][] = 'zajedno2';
        $expected['new'][] = 'zajedno2';

        $obj = new Splitter();
        $actual = $obj->split($lines);
        $this->assertEquals($expected, $actual);
    }
}
