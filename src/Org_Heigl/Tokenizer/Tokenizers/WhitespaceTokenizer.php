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

use Org_Heigl\Tokenizer\TokenList;
use Org_Heigl\Tokenizer\Token;

/**
 * This class splits incoming strings on every whitespace-occurence.
 *
 * A whitespace is by default any of the following:
 *
 * * space
 * * no-breaking space
 * * carriage-return
 * * line-feed
 * * any kind of space in differing widths
 *
 * @package Org_Heigl\Tokenizer\Tokenizers
 */
class WhitespaceTokenizer extends AbstractTokenizer
{
    /**
     * Tokenize a given token
     *
     * @param Token $token
     *
     * @return TokenList
     */
    public function tokenizeToken(Token $token)
    {
        $tokenList = new TokenList();
        $string = (string) $token;

        if (! preg_match_all('/(\s+)/u', $string, $matches, PREG_SET_ORDER ^ PREG_OFFSET_CAPTURE)) {
            return $tokenList->add($token);
        }

        $offsets = array();
        foreach ($matches as $tok) {
            $offsets[] = $tok[1][1];
            $offsets[] = strlen($tok[1][0]) + $tok[1][1];
        }
        if (strlen($tok[1][0]) + $tok[1][1] != strlen($string)) {
            $offsets[] = strlen($string);
        }

        array_unique($offsets);

        $start = 0;
        foreach ($offsets as $offset) {
            if (0 === $offset) {
                continue;
            }
            $tokenString = substr($string, $start, $offset - $start);
            $type = 'string';
            if (preg_match('/^\s+$/u', $tokenString)) {
                $type = 'whitespace';
            }
            $tokenList->add(Token::create($start + $token->getOffset(), $tokenString, $type));
            $start = $offset;
        }
        return $tokenList;
    }

} 