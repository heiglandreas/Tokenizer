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


class Token
{
    /**
     * The Token represented
     *
     * @var string
     */
    protected $token = null;

    /**
     * THe offset of the token in the complete string
     *
     * @var int
     */
    protected $offset = null;

    /**
     * The type of the Token
     *
     * @var string
     */
    protected $type = null;

    /**
     * Set the values for this token
     *
     * @param int $offset
     * @param string $string
     * @param string $type
     *
     * @return self
     */
    public static function create($offset, $string, $type)
    {
        return (new Token())->setOffset($offset)
                            ->setToken($string)
                            ->setType($type);
    }

    /**
     * Set the token-string
     *
     * @param string $token
     *
     * @return self
     */
    public function setToken($token)
    {
        $this->token = (string) $token;

        return $this;
    }

    /**
     * Get the token-string
     *
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set the offset of the token
     *
     * @param int $offset
     *
     * @return self
     */
    public function setOffset($offset)
    {
        $this->offset = (int) $offset;

        return $this;
    }

    /**
     * Get the offset of the token
     *
     * @return int
     */
    public function getOffset()
    {
        return $this->offset;
    }

    /**
     * Set the tokentype
     *
     * @param string $tokentype
     *
     * @return self
     */
    public function setType($type)
    {
        $this->type = (string) $type;

        return $this;
    }

    /**
     * Get the tokentype
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Get the string representation of the token
     *
     * @return string
     */
    public function __toString()
    {
        return $this->token;
    }
} 