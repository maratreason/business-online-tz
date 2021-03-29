<?php

use app\models\Words;
use PHPUnit\Framework\TestCase;

class WordsTest extends TestCase {
    private $words;
    private $someString;
    private $testPhrases;

    protected function setUp(): void {
        $this->someString = "Ребята бегали по улице и кричали на прохожих: стой стой стой. ( кря кря кря кря кря ) Да, тебе говорят стой. Да стой же ты. Или по-английски: stop stop stop man. stop stop stop";
        $this->testPhrases = "Лорем ипсум бредогенератор, который ипсум - ипсум (25)";
        $this->words = new Words();
    }

    protected function tearDown(): void {
        $this->words = null;
        $this->someString = null;
        $this->testPhrases = null;
    }

    public function testWordCount() {
        $this->assertEquals(['stop' => 6, 'стой'=> 5, 'кря' => 5], $this->words->getWordCount($this->someString, 5));
    }

    public function testReplaceSymbols() {
        $this->assertEquals('Лорем ипсум бредогенератор который ипсум ипсум 25', $this->words->replaceSymbols(['.', ',', '(', ')', '-'], $this->testPhrases));
    }
}