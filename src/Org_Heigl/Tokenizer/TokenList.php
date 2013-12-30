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
 * @link      https://github.com/heiglandreas/Tokenizer
 */

namespace Org_Heigl\Tokenizer;

/**
 * Class TokenList
 *
 * @package Org_Heigl\Tokenizer
 */
class TokenList extends \ArrayObject
{

    /**
     * Add a token to the list
     *
     * @param Token $token
     *
     * @return self
     */
    public function add(Token $token)
    {
        $this->append($token);

        return $this;
    }

    /**
     * Remove a token
     *
     * @param Token $token
     *
     * @return self
     */
    public function remove(Token $token)
    {
        foreach($this->findAll($token) as $key) {
            $this->offsetUnset($key);
        }
        return $this;
    }

    /**
     * Replace a given token with the content of a list of tokens
     *
     * @param Token $token
     * @param TokenList $replacement
     *
     * @return self
     */
    public function replace(Token $token, TokenList $replacement)
    {
        $keys = $this->findAll($token);
        $keys = array_reverse($keys);
        foreach($keys as $key) {
            $newArray = (array) $this;
            array_splice($newArray, $key, 1, $replacement);
            $this->exchangeArray($newArray);
        }

        return $this;
    }

    /**
     * Find the offset of a given token
     *
     * @param Token $token
     *
     * @return int|false
     */
    public function find(Token $token)
    {
        return array_search($token, (array) $this, true);
    }

    /**
     * Find all offsets of a given token
     *
     * @param Token $token
     *
     * @return array
     */
    public function findAll(Token $token)
    {
        return array_keys((array) $this, $token, true);
    }

    /**
     * Return a string representation of this list
     *
     * @return string
     */
    public function __toString()
    {
        $string = '';

        foreach($this as $item) {
            $string .= (string) $item;
        }

        return $string;
    }
}