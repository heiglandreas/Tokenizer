<?php
/**
 * Copyright (c)2013-2013 heiglandreas
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
 * @copyright ©2013-2013 Andreas Heigl
 * @license   http://www.opesource.org/licenses/mit-license.php MIT-License
 * @version   0.0
 * @since     15.12.13
 * @link      https://github.com/heiglandreas/
 */

namespace Org_Heigl\TokenizerTest\Tokenizers;


use Org_Heigl\Tokenizer\Tokenizers\CamelCaseTokenizer;
use Org_Heigl\Tokenizer\Token;
use Org_Heigl\Tokenizer\TokenList;

class CamelCaseTokenizerTest extends \PHPUnit_Framework_TestCase
{
    public function testCamelCaseTokenizer()
    {
        $tokenizer= new CamelCaseTokenizer();

        $token = Token::create(0, 'dasIstEinEinfacherTest', 'string');
        $tokenList = $tokenizer->tokenizeToken($token);

        $this->assertInstanceOf('Org_Heigl\Tokenizer\TokenList', $tokenList);
        $this->assertEquals(5, $tokenList->count());
        $this->assertEquals('Ist', $tokenList->offsetGet(1)->getToken());
        $this->assertEquals('Einfacher', $tokenList->offsetGet(3)->getToken());
        $this->assertEquals('dasIstEinEinfacherTest', (string) $tokenList);
    }

    public function testTokenizerWithDoubleUppercaseWhitespace()
    {
        $tokenizer= new CamelCaseTokenizer();

        $token = Token::create(0, 'DasIstEinLDAPTest', 'string');
        $tokenList = $tokenizer->tokenizeToken($token);
        $this->assertInstanceOf('Org_Heigl\Tokenizer\TokenList', $tokenList);
        $this->assertEquals(5, $tokenList->count());
        $this->assertEquals('Ist', $tokenList->offsetGet(1)->getToken());
        $this->assertEquals('LDAP', $tokenList->offsetGet(3)->getToken());
        $this->assertEquals('Test', $tokenList->offsetGet(4)->getToken());
        $this->assertEquals('DasIstEinLDAPTest', (string) $tokenList);
    }

    public function testTokenizerReturnsUntokenizableToken()
    {
        $tokenizer= new CamelCaseTokenizer();

        $token = Token::create(0, 'seefähre', 'string');
        $tokenList = $tokenizer->tokenizeToken($token);

        $this->assertInstanceOf('Org_Heigl\Tokenizer\TokenList', $tokenList);
        $this->assertEquals(1, $tokenList->count());

    }

    public function testCamelCaseTokenizerSimpleCall()
    {
        $tokenizer= new CamelCaseTokenizer();

        $token = Token::create(0, 'DasIstEinEinfacherTest', 'string');
        $tokenL = new TokenList();
        $tokenL->add($token);
        $tokenList = $tokenizer->tokenize($tokenL);

        $this->assertInstanceOf('Org_Heigl\Tokenizer\TokenList', $tokenList);
        $this->assertSame($tokenL, $tokenList);
        $this->assertEquals(5, $tokenList->count());
        $this->assertEquals('Ist', $tokenList->offsetGet(1)->getToken());
        $this->assertEquals('Einfacher', $tokenList->offsetGet(3)->getToken());
        $this->assertEquals('DasIstEinEinfacherTest', (string) $tokenList);
    }



}
 