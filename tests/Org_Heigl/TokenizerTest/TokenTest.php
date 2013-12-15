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

use Org_Heigl\Tokenizer\Token;

class TokenTest extends \PHPUnit_Framework_TestCase
{
    public function testTokenCreation()
    {
        $token = new Token();

        $this->assertInstanceOf('Org_Heigl\Tokenizer\Token', $token);

        $this->assertAttributeEquals(null, 'offset', $token);
        $this->assertAttributeEquals(null, 'token', $token);
        $this->assertAttributeEquals(null, 'type', $token);

    }

    public function testTokenSetting()
    {
        $token = new Token();

        $this->assertSame($token, $token->setOffset(0));
        $this->assertSame($token, $token->setToken('token'));
        $this->assertSame($token, $token->setType('string'));

        $this->assertAttributeEquals(0, 'offset', $token);
        $this->assertAttributeEquals('token', 'token', $token);
        $this->assertAttributeEquals('string', 'type', $token);
    }

    public function testStaticTokenCreation()
    {
        $token = Token::create(0, 'foo', 'string');

        $this->assertInstanceof('Org_Heigl\Tokenizer\Token', $token);
        $this->assertAttributeEquals(0, 'offset', $token);
        $this->assertAttributeEquals('foo', 'token', $token);
        $this->assertAttributeEquals('string', 'type', $token);
    }

    public function testSetterAndGetter()
    {
        $token = new Token();

        $this->assertAttributeEquals(null, 'offset', $token);
        $this->assertAttributeEquals(null, 'token', $token);
        $this->assertAttributeEquals(null, 'type', $token);

        $this->assertSame($token, $token->setOffset(0));
        $this->assertSame($token, $token->setToken('foo'));
        $this->assertSame($token, $token->setType('string'));

        $this->assertAttributeEquals(0, 'offset', $token);
        $this->assertAttributeEquals('foo', 'token', $token);
        $this->assertAttributeEquals('string', 'type', $token);

        $this->assertSame(0, $token->getOffset());
        $this->assertSame('foo', $token->getToken());
        $this->assertSame('string', $token->getType());
    }

    public function testToStringMethod()
    {
        $token = Token::create(0, 'foo', 'string');

        $this->assertSame('foo', $token->__toString());
        $this->assertSame('foo', (string) $token);
    }

}
 