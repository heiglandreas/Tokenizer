# Tokenizer

Provides ways to split strings into smaller entities depending on the used
tokenizers.

You can chain different tokenizers to a tokenizer-chain to get the results you
want.

Currently this library provides these Tokenizers:

* WhitespaceTokenizer to split strings on every whitespace. Can be used to split
  a sentence into single words.
* CamelCaseTokenizer to split CamelCased-Strings into separate tokens.

[![Build Status](https://travis-ci.org/heiglandreas/Tokenizer.png)](https://travis-ci.org/heiglandreas/Tokenizer)

## Installation

Install using ```composer``` by adding the following line to your
```composer.conf```-files ```require```-Section:

    "org_heigl/tokenizer" : "dev-master"

## Usage

Usage is rather simple:

    use Org_Heigl\Tokenizer
    use Org_Heigl\Tokeinzer\Tokenizers as Tokenizer
    // Create a new Tokenizer-Queue
    $tokenizer = new TokenizerQueue();

    // Add single tokenizers to the queue
    // First a Whitespace tokenizer
    $tokenizer->addTokenizer(new Tokenizer\WhiteSpaceTokenizer());
    // Then a CamelCase-Tokenizer
    $tokenizer->addTokenizer(new Tokenizer\CamelCaseTokenizer());

    // Finally tokenize a given string
    $tokenList = $tokenizer->tokenize('A String with WhiteSpace");

    var_dump((array) $tokenList);

    // This will print the following:
    /*
    array(
        array(
            'offset' => 0,
            'token'  => 'A',
            'type'   => 'string',
        ),
        array(
            'offset' => 1,
            'token'  => ' ',
            'type'   => 'whitespace',
        ),
        array(
            'offset' => 2,
            'token'  => 'String',
            'type'   => 'string',
        ),
        array(
            'offset' => 8,
            'token'  => ' ',
            'type'   => 'whitespace',
        ),
        array(
            'offset' => 9,
            'token'  => 'with',
            'type'   => 'string',
        ),
        array(
            'offset' => 13,
            'token'  => ' ',
            'type'   => 'whitespace',
        ),
        array(
            'offset' => 14,
            'token'  => 'White',
            'type'   => 'string',
        ),
        array(
            'offset' => 19,
            'token'  => 'Space',
            'type'   => 'string',
        ),
    )
    */


