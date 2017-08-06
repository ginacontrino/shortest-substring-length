<?php

class FindShortestSubstringLength
{

    public $shortestWindowLength = null;
    public $smallestWindowFound = false;
    public $searchCharacterHash = [];
    public $searchCharacterLength;
    public $remainingCharacters;
    public $inputString;

    public function __construct($searchCharacters)
    {
        // create a hash for the search characters (unique letters)
        for ($i = 0; $i < strlen($searchCharacters); $i++) {
            $this->searchCharacterHash[$searchCharacters[$i]] = null;
        }

        $this->remainingCharacters = count($this->searchCharacterHash);
    }

    public function find($inputPartial, $startingPosition = 0)
    {

        for ($i = 0; $i < strlen($inputPartial); $i++) {
            $character = $inputPartial[$i];

            // if the character us not in the hash, we don't need to keep going
            if ( ! array_key_exists($character, $this->searchCharacterHash)) continue;

            // otherwise:

            // check if there are still remaining characters, that we didn't find yet
            if ($this->searchCharacterHash[$character] === null) {
                $this->remainingCharacters--;
            }

            // update current position of the character
            $this->searchCharacterHash[$character] = $i + $startingPosition;
            if ($this->remainingCharacters > 0) continue;

            // get the difference between maximum and minimum position
            // to get the window length
            $length = max($this->searchCharacterHash) - min($this->searchCharacterHash) + 1;

            // now check if the new window length is smaller than before
            if ($this->shortestWindowLength === null || $length < $this->shortestWindowLength) {
                // update the window
                $this->shortestWindowLength = $length;
                // and in case we could return early
                // check if the smallest window equals the search character hash length
                if (count($this->searchCharacterHash) === $length) $this->smallestWindowFound = true;
            }
        }

        return $this->shortestWindowLength;
    }

}

