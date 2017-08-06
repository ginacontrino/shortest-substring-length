<?php

use PHPUnit\Framework\TestCase;
require './FindShortestSubstringLength.php';
class ShortestSubstringTest extends TestCase
{

    public function testReturnsTheShortestStringLength()
    {
        // Example 1
        $pattern = 'EOT';
        $text = 'THEQUICKBROWNFOXJUMPSOVERTHELAZYDOG';
        $shortestString = new FindShortestSubstringLength($pattern);

        $this->assertEquals(5, $shortestString->find($text));

        // Example 2 (unique characters)
        $pattern = 'Tanmay';
        $text = 'Tanmay Ty name is Tanmay';
        $shortestString = new FindShortestSubstringLength($pattern);

        // I expect the shortest length to be 6, because only consider every character once.
        $this->assertEquals(6, $shortestString->find($text));

        // Example 3 (unique characters)
        $pattern = 'tist';
        $text = 'this is a test string';
        $shortestString = new FindShortestSubstringLength($pattern);

        // I expect the shortest length to be 4, because only consider every character once.
        $this->assertEquals(4, $shortestString->find($text));
    }

}
