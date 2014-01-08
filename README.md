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

    use Org_Heigl\Tokenizer\TokenizerQueue;
    use Org_Heigl\Tokenizer\Tokenizers;
    // Create a new Tokenizer-Queue
    $tokenizer = new TokenizerQueue();

    // Add single tokenizers to the queue
    // First a Whitespace tokenizer
    $tokenizer->addTokenizer(new Tokenizers\WhitespaceTokenizer());
    // Then a CamelCase-Tokenizer
    $tokenizer->addTokenizer(new Tokenizers\CamelCaseTokenizer());

    // Finally tokenize a given string
    $tokenList = $tokenizer->tokenize('A String with WhiteSpace');

    var_dump((array) $tokenList);

    // This will print the following:
    /*
    array(8) {
      [0] =>
      class Org_Heigl\Tokenizer\Token#216 (3) {
        protected $token =>
        string(1) "A"
        protected $offset =>
        int(0)
        protected $type =>
        string(6) "string"
      }
      [1] =>
      class Org_Heigl\Tokenizer\Token#215 (3) {
        protected $token =>
        string(1) " "
        protected $offset =>
        int(1)
        protected $type =>
        string(10) "whitespace"
      }
      [2] =>
      class Org_Heigl\Tokenizer\Token#214 (3) {
        protected $token =>
        string(6) "String"
        protected $offset =>
        int(2)
        protected $type =>
        string(6) "string"
      }
      [3] =>
      class Org_Heigl\Tokenizer\Token#213 (3) {
        protected $token =>
        string(1) " "
        protected $offset =>
        int(8)
        protected $type =>
        string(10) "whitespace"
      }
      [4] =>
      class Org_Heigl\Tokenizer\Token#212 (3) {
        protected $token =>
        string(4) "with"
        protected $offset =>
        int(9)
        protected $type =>
        string(6) "string"
      }
      [5] =>
      class Org_Heigl\Tokenizer\Token#211 (3) {
        protected $token =>
        string(1) " "
        protected $offset =>
        int(13)
        protected $type =>
        string(10) "whitespace"
      }
      [6] =>
      class Org_Heigl\Tokenizer\Token#209 (3) {
        protected $token =>
        string(5) "White"
        protected $offset =>
        int(14)
        protected $type =>
        string(6) "string"
      }
      [7] =>
      class Org_Heigl\Tokenizer\Token#208 (3) {
        protected $token =>
        string(5) "Space"
        protected $offset =>
        int(19)
        protected $type =>
        string(6) "string"
      }
    }
    */


