<?php

require './FindShortestSubstringLength.php';

echo findShortestSubstringFromInput($argv[1] ?? null);

function findShortestSubstringFromInput($pattern)
{
    if (strlen($pattern) == 0) return 'No match, pattern empty';

    $shortestString = new FindShortestSubstringLength($pattern);

    $startingPosition = 0;
    while ($line = fgets(STDIN)) {
        // getting rid of new lines to prevent wrong count
        $line = trim($line, "\n");
        $shortestString->find($line, $startingPosition);

        // return as soon as the smallest window equals the search character hash length
        if ($shortestString->smallestWindowFound) return 'The smallest window consists of ' . $shortestString->shortestWindowLength . ' characters.';

        $startingPosition += strlen($line);
    }

    return $shortestString->shortestWindowLength
        ? 'The smallest window consists of ' . $shortestString->shortestWindowLength . ' characters.'
        : 'No match found';
}

