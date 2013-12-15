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
 * @since     14.12.13
 * @link      https://github.com/heiglandreas/
 */

namespace Org_Heigl\TokenizerTest;

use Org_Heigl\Tokenizer\TokenList;
use Org_Heigl\Tokenizer\Token;

class TokenListTest extends \PHPUnit_Framework_TestCase
{

    public function testInstantiation()
    {
        $tokenList = new TokenList;

        $this->assertInstanceof('ArrayObject', $tokenList);
        $this->assertInstanceof('Org_Heigl\Tokenizer\TokenList', $tokenList);
    }

    public function testAddingOfTokens()
    {
        $tokenList = new TokenList();

        $token = Token::create(0, 'token', 'string');

        $this->assertEquals(0, $tokenList->count());
        $tokenList->add($token);
        $this->assertEquals(1, $tokenList->count());
        $this->assertSame($token, $tokenList->offsetGet(0));
        $this->assertSame($token, current($tokenList));
    }

    public function testGEttingStringRepresentation()
    {
        $tokenList = new TokenList();

        $token1 = Token::create(0, 'token', 'string');
        $token2 = Token::create(5, ' ', 'string');
        $token3 = Token::create(6, 'test', 'string');

        $tokenList->add($token1);
        $tokenList->add($token2);
        $tokenList->add($token3);

        $this->assertSame('token test', $tokenList->__toString());
        $this->assertSame('token test', (string) $tokenList);

    }
}
 