<?php

namespace iShotFT\RandomAlliterations;

class RandomAlliterations
{
    // Build wonderful things
    protected $adjectives;
    protected $nouns;

    public function __construct()
    {
        $this->adjectives = config('randomalliterations.adjectives');
        $this->nouns = config('randomalliterations.nouns');
    }

    public function getName()
    {
        $adjective = $this->_getRandomWord($this->adjectives);
        $noun = $this->_getRandomWord($this->nouns, $adjective[0]);

        return ucwords("{$adjective} {$noun}");
    }

    protected function _getRandomWord(array $words, $startingLetter = null)
    {
        $wordsToSearch = $startingLetter === null ? $words : preg_grep("/^{$startingLetter}/", $words);
        return $wordsToSearch[array_rand($wordsToSearch)];
    }
}