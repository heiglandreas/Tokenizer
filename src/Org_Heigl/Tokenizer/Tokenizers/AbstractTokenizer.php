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
 * @link      https://github.com/heiglandreas/Tokenizer
 */

namespace Org_Heigl\Tokenizer\Tokenizers;

use Org_Heigl\Tokenizer\TokenizerInterface;
use Org_Heigl\Tokenizer\TokenList;
use Org_Heigl\Tokenizer\Token;

/**
 * This is an abstract class for easier handling
 *
 * @package Org_Heigl\Tokenizer\Tokenizers
 */
abstract class AbstractTokenizer implements TokenizerInterface
{
    /**
     * Split the given TokenList further into tokens
     *
     * @param TokenList $tokenList
     *
     * @see TokenizerInterface
     * @return TokenList
     */
    public function tokenize(TokenList $tokenList)
    {
        $internalTokenList = clone($tokenList);
        foreach ($internalTokenList as $token) {
            $tl = $this->tokenizeToken($token);
            $tokenList->replace($token, $tl);
        }

        return $tokenList;
    }

    /**
     * Tokenize a given token
     *
     * @param Token $token
     *
     * @return TokenList
     */
    abstract public function tokenizeToken(Token $token);
} 