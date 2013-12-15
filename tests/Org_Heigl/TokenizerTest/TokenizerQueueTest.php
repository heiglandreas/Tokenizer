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

use Org_Heigl\Tokenizer\TokenizerQueue;
use Org_Heigl\Tokenizer\Tokenizers\TestTokenizer;
use Mockery as M;

class TokenizerQueueTest extends \PHPUnit_Framework_TestCase
{
    public function testInstantiation()
    {
        $tokeinzerQueue = new TokenizerQueue();

        $this->assertInstanceOf('Org_Heigl\Tokenizer\TokenizerQueue', $tokeinzerQueue);
        $this->assertInstanceOf('Org_Heigl\Tokenizer\TokenizerInterface', $tokeinzerQueue);
        $this->assertInstanceOf('ArrayObject', $tokeinzerQueue);
    }

    public function testAddingToTokenizerQueue()
    {
        $dummyTokenizer = new TestTokenizer();

        $tokenizerQueue = new TokenizerQueue();
        $this->assertEquals(0, $tokenizerQueue->count());
        $this->assertSame($tokenizerQueue, $tokenizerQueue->addTokenizer($dummyTokenizer));
        $this->assertEquals(1, $tokenizerQueue->count());
        $this->assertSame($dummyTokenizer, $tokenizerQueue->offsetGet(0));

    }

    public function testTokenizingString()
    {
        $tokenizerQueue = new TokenizerQueue();

        $tokenList = $tokenizerQueue->tokenizeString('Foo');
        $this->assertInstanceof('Org_Heigl\Tokenizer\TokenList', $tokenList);
        $this->assertEquals('Foo', (string) $tokenList);
    }

    public function testTokenizingTokenList()
    {
        $tokenizer = M::mock('Org_Heigl\Tokenizer\TokenizerInterface');
        $tokenizerList = M::mock('Org_Heigl\Tokenizer\TokenList');

        $tokenizer->shouldReceive('tokenize')->with($tokenizerList)->once()->andReturn($tokenizerList);

        $tokenizerQueue = new TokenizerQueue();
        $tokenizerQueue->addTokenizer($tokenizer);
        $this->assertSame($tokenizerList, $tokenizerQueue->tokenize($tokenizerList));

    }
}
 