<?php
/**
 * Copyright (c)2014-2014 heiglandreas
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIBILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @category 
 * @author    Andreas Heigl<andreas@heigl.org>
 * @copyright ©2014-2014 Andreas Heigl
 * @license   http://www.opesource.org/licenses/mit-license.php MIT-License
 * @version   0.0
 * @since     08.01.14
 * @link      https://github.com/heiglandreas/
 */

namespace Org_Heigl\TokenizerTest;

use Org_Heigl\Tokenizer\TokenizerQueue;
use Org_Heigl\Tokenizer\Tokenizers as Tokenizers;
use Org_Heigl\Tokenizer\TokenList;
use Org_Heigl\Tokenizer\Token;

class ExampleTest extends \PHPUnit_Framework_TestCase
{

    public function testExample1()
    {
        // Create a new Tokenizer-Queue
        $tokenizer = new TokenizerQueue();

        // Add single tokenizers to the queue
        // First a Whitespace tokenizer
        $tokenizer->addTokenizer(new Tokenizers\WhitespaceTokenizer());
        // Then a CamelCase-Tokenizer
        $tokenizer->addTokenizer(new Tokenizers\CamelCaseTokenizer());

        $tokenList = new TokenList();
        $tokenList->add(Token::create(0, 'A String with WhiteSpace', 'string'));

        // Finally tokenize a given string
        $tokenList = $tokenizer->tokenize($tokenList);

        $expectedResult = new TokenList();
        $expectedResult->add(Token::create(0, 'A', 'string'));
        $expectedResult->add(Token::create(1, ' ', 'whitespace'));
        $expectedResult->add(Token::create(2, 'String', 'string'));
        $expectedResult->add(Token::create(8, ' ', 'whitespace'));
        $expectedResult->add(Token::create(9, 'with', 'string'));
        $expectedResult->add(Token::create(13, ' ', 'whitespace'));
        $expectedResult->add(Token::create(14, 'White', 'string'));
        $expectedResult->add(Token::create(19, 'Space', 'string'));

        $this->assertEquals($expectedResult, $tokenList);
    }
}
 