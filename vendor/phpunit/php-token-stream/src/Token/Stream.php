<?php
/*
<<<<<<< HEAD
 * This file is part of php-token-stream.
=======
 * This file is part of the PHP_TokenStream package.
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * A stream of PHP tokens.
<<<<<<< HEAD
=======
 *
 * @author    Sebastian Bergmann <sebastian@phpunit.de>
 * @copyright Sebastian Bergmann <sebastian@phpunit.de>
 * @license   http://www.opensource.org/licenses/BSD-3-Clause  The BSD 3-Clause License
 * @link      http://github.com/sebastianbergmann/php-token-stream/tree
 * @since     Class available since Release 1.0.0
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
 */
class PHP_Token_Stream implements ArrayAccess, Countable, SeekableIterator
{
    /**
     * @var array
     */
<<<<<<< HEAD
    protected static $customTokens = [
=======
    protected static $customTokens = array(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        '(' => 'PHP_Token_OPEN_BRACKET',
        ')' => 'PHP_Token_CLOSE_BRACKET',
        '[' => 'PHP_Token_OPEN_SQUARE',
        ']' => 'PHP_Token_CLOSE_SQUARE',
        '{' => 'PHP_Token_OPEN_CURLY',
        '}' => 'PHP_Token_CLOSE_CURLY',
        ';' => 'PHP_Token_SEMICOLON',
        '.' => 'PHP_Token_DOT',
        ',' => 'PHP_Token_COMMA',
        '=' => 'PHP_Token_EQUAL',
        '<' => 'PHP_Token_LT',
        '>' => 'PHP_Token_GT',
        '+' => 'PHP_Token_PLUS',
        '-' => 'PHP_Token_MINUS',
        '*' => 'PHP_Token_MULT',
        '/' => 'PHP_Token_DIV',
        '?' => 'PHP_Token_QUESTION_MARK',
        '!' => 'PHP_Token_EXCLAMATION_MARK',
        ':' => 'PHP_Token_COLON',
        '"' => 'PHP_Token_DOUBLE_QUOTES',
        '@' => 'PHP_Token_AT',
        '&' => 'PHP_Token_AMPERSAND',
        '%' => 'PHP_Token_PERCENT',
        '|' => 'PHP_Token_PIPE',
        '$' => 'PHP_Token_DOLLAR',
        '^' => 'PHP_Token_CARET',
        '~' => 'PHP_Token_TILDE',
        '`' => 'PHP_Token_BACKTICK'
<<<<<<< HEAD
    ];
=======
    );
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @var string
     */
    protected $filename;

    /**
     * @var array
     */
<<<<<<< HEAD
    protected $tokens = [];

    /**
     * @var int
=======
    protected $tokens = array();

    /**
     * @var integer
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    protected $position = 0;

    /**
     * @var array
     */
<<<<<<< HEAD
    protected $linesOfCode = ['loc' => 0, 'cloc' => 0, 'ncloc' => 0];
=======
    protected $linesOfCode = array('loc' => 0, 'cloc' => 0, 'ncloc' => 0);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @var array
     */
    protected $classes;

    /**
     * @var array
     */
    protected $functions;

    /**
     * @var array
     */
    protected $includes;

    /**
     * @var array
     */
    protected $interfaces;

    /**
     * @var array
     */
    protected $traits;

    /**
     * @var array
     */
<<<<<<< HEAD
    protected $lineToFunctionMap = [];
=======
    protected $lineToFunctionMap = array();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * Constructor.
     *
     * @param string $sourceCode
     */
    public function __construct($sourceCode)
    {
        if (is_file($sourceCode)) {
            $this->filename = $sourceCode;
            $sourceCode     = file_get_contents($sourceCode);
        }

        $this->scan($sourceCode);
    }

    /**
     * Destructor.
     */
    public function __destruct()
    {
<<<<<<< HEAD
        $this->tokens = [];
=======
        $this->tokens = array();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $buffer = '';

        foreach ($this as $token) {
            $buffer .= $token;
        }

        return $buffer;
    }

    /**
     * @return string
<<<<<<< HEAD
=======
     * @since  Method available since Release 1.1.0
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * Scans the source for sequences of characters and converts them into a
     * stream of tokens.
     *
     * @param string $sourceCode
     */
    protected function scan($sourceCode)
    {
        $id        = 0;
        $line      = 1;
        $tokens    = token_get_all($sourceCode);
        $numTokens = count($tokens);

        $lastNonWhitespaceTokenWasDoubleColon = false;

        for ($i = 0; $i < $numTokens; ++$i) {
            $token = $tokens[$i];
            $skip  = 0;

            if (is_array($token)) {
                $name = substr(token_name($token[0]), 2);
                $text = $token[1];

                if ($lastNonWhitespaceTokenWasDoubleColon && $name == 'CLASS') {
                    $name = 'CLASS_NAME_CONSTANT';
<<<<<<< HEAD
                } elseif ($name == 'USE' && isset($tokens[$i + 2][0]) && $tokens[$i + 2][0] == T_FUNCTION) {
                    $name = 'USE_FUNCTION';
                    $text .= $tokens[$i + 1][1] . $tokens[$i + 2][1];
=======
                } elseif ($name == 'USE' && isset($tokens[$i+2][0]) && $tokens[$i+2][0] == T_FUNCTION) {
                    $name = 'USE_FUNCTION';
                    $text .= $tokens[$i+1][1] . $tokens[$i+2][1];
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    $skip = 2;
                }

                $tokenClass = 'PHP_Token_' . $name;
            } else {
                $text       = $token;
                $tokenClass = self::$customTokens[$token];
            }

            $this->tokens[] = new $tokenClass($text, $line, $this, $id++);
            $lines          = substr_count($text, "\n");
<<<<<<< HEAD
            $line += $lines;
=======
            $line          += $lines;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

            if ($tokenClass == 'PHP_Token_HALT_COMPILER') {
                break;
            } elseif ($tokenClass == 'PHP_Token_COMMENT' ||
                $tokenClass == 'PHP_Token_DOC_COMMENT') {
                $this->linesOfCode['cloc'] += $lines + 1;
            }

            if ($name == 'DOUBLE_COLON') {
                $lastNonWhitespaceTokenWasDoubleColon = true;
            } elseif ($name != 'WHITESPACE') {
                $lastNonWhitespaceTokenWasDoubleColon = false;
            }

            $i += $skip;
        }

        $this->linesOfCode['loc']   = substr_count($sourceCode, "\n");
        $this->linesOfCode['ncloc'] = $this->linesOfCode['loc'] -
                                      $this->linesOfCode['cloc'];
    }

<<<<<<< HEAD
    public function count(): int
=======
    /**
     * @return integer
     */
    public function count()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return count($this->tokens);
    }

    /**
     * @return PHP_Token[]
     */
    public function tokens()
    {
        return $this->tokens;
    }

    /**
     * @return array
     */
    public function getClasses()
    {
        if ($this->classes !== null) {
            return $this->classes;
        }

        $this->parse();

        return $this->classes;
    }

    /**
     * @return array
     */
    public function getFunctions()
    {
        if ($this->functions !== null) {
            return $this->functions;
        }

        $this->parse();

        return $this->functions;
    }

    /**
     * @return array
     */
    public function getInterfaces()
    {
        if ($this->interfaces !== null) {
            return $this->interfaces;
        }

        $this->parse();

        return $this->interfaces;
    }

    /**
     * @return array
<<<<<<< HEAD
=======
     * @since  Method available since Release 1.1.0
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getTraits()
    {
        if ($this->traits !== null) {
            return $this->traits;
        }

        $this->parse();

        return $this->traits;
    }

    /**
     * Gets the names of all files that have been included
     * using include(), include_once(), require() or require_once().
     *
     * Parameter $categorize set to TRUE causing this function to return a
     * multi-dimensional array with categories in the keys of the first dimension
     * and constants and their values in the second dimension.
     *
     * Parameter $category allow to filter following specific inclusion type
     *
     * @param bool   $categorize OPTIONAL
     * @param string $category   OPTIONAL Either 'require_once', 'require',
<<<<<<< HEAD
     *                           'include_once', 'include'.
     *
     * @return array
=======
     *                                           'include_once', 'include'.
     * @return array
     * @since  Method available since Release 1.1.0
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getIncludes($categorize = false, $category = null)
    {
        if ($this->includes === null) {
<<<<<<< HEAD
            $this->includes = [
              'require_once' => [],
              'require'      => [],
              'include_once' => [],
              'include'      => []
            ];

            foreach ($this->tokens as $token) {
                switch (PHP_Token_Util::getClass($token)) {
=======
            $this->includes = array(
              'require_once' => array(),
              'require'      => array(),
              'include_once' => array(),
              'include'      => array()
            );

            foreach ($this->tokens as $token) {
                switch (get_class($token)) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    case 'PHP_Token_REQUIRE_ONCE':
                    case 'PHP_Token_REQUIRE':
                    case 'PHP_Token_INCLUDE_ONCE':
                    case 'PHP_Token_INCLUDE':
                        $this->includes[$token->getType()][] = $token->getName();
                        break;
                }
            }
        }

        if (isset($this->includes[$category])) {
            $includes = $this->includes[$category];
        } elseif ($categorize === false) {
            $includes = array_merge(
                $this->includes['require_once'],
                $this->includes['require'],
                $this->includes['include_once'],
                $this->includes['include']
            );
        } else {
            $includes = $this->includes;
        }

        return $includes;
    }

    /**
     * Returns the name of the function or method a line belongs to.
     *
     * @return string or null if the line is not in a function or method
<<<<<<< HEAD
=======
     * @since  Method available since Release 1.2.0
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getFunctionForLine($line)
    {
        $this->parse();

        if (isset($this->lineToFunctionMap[$line])) {
            return $this->lineToFunctionMap[$line];
        }
    }

    protected function parse()
    {
<<<<<<< HEAD
        $this->interfaces = [];
        $this->classes    = [];
        $this->traits     = [];
        $this->functions  = [];
        $class            = [];
        $classEndLine     = [];
=======
        $this->interfaces = array();
        $this->classes    = array();
        $this->traits     = array();
        $this->functions  = array();
        $class            = array();
        $classEndLine     = array();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $trait            = false;
        $traitEndLine     = false;
        $interface        = false;
        $interfaceEndLine = false;

        foreach ($this->tokens as $token) {
<<<<<<< HEAD
            switch (PHP_Token_Util::getClass($token)) {
=======
            switch (get_class($token)) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                case 'PHP_Token_HALT_COMPILER':
                    return;

                case 'PHP_Token_INTERFACE':
                    $interface        = $token->getName();
                    $interfaceEndLine = $token->getEndLine();

<<<<<<< HEAD
                    $this->interfaces[$interface] = [
                      'methods'   => [],
=======
                    $this->interfaces[$interface] = array(
                      'methods'   => array(),
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                      'parent'    => $token->getParent(),
                      'keywords'  => $token->getKeywords(),
                      'docblock'  => $token->getDocblock(),
                      'startLine' => $token->getLine(),
                      'endLine'   => $interfaceEndLine,
                      'package'   => $token->getPackage(),
                      'file'      => $this->filename
<<<<<<< HEAD
                    ];
=======
                    );
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    break;

                case 'PHP_Token_CLASS':
                case 'PHP_Token_TRAIT':
<<<<<<< HEAD
                    $tmp = [
                      'methods'   => [],
=======
                    $tmp = array(
                      'methods'   => array(),
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                      'parent'    => $token->getParent(),
                      'interfaces'=> $token->getInterfaces(),
                      'keywords'  => $token->getKeywords(),
                      'docblock'  => $token->getDocblock(),
                      'startLine' => $token->getLine(),
                      'endLine'   => $token->getEndLine(),
                      'package'   => $token->getPackage(),
                      'file'      => $this->filename
<<<<<<< HEAD
                    ];

                    if ($token->getName() !== null) {
                        if ($token instanceof PHP_Token_CLASS) {
                            $class[]        = $token->getName();
                            $classEndLine[] = $token->getEndLine();

                            $this->classes[$class[count($class) - 1]] = $tmp;
                        } else {
                            $trait                = $token->getName();
                            $traitEndLine         = $token->getEndLine();
                            $this->traits[$trait] = $tmp;
                        }
=======
                    );

                    if ($token instanceof PHP_Token_CLASS) {
                        $class[]        = $token->getName();
                        $classEndLine[] = $token->getEndLine();

                        if ($class[count($class)-1] != 'anonymous class') {
                            $this->classes[$class[count($class)-1]] = $tmp;
                        }
                    } else {
                        $trait                = $token->getName();
                        $traitEndLine         = $token->getEndLine();
                        $this->traits[$trait] = $tmp;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    }
                    break;

                case 'PHP_Token_FUNCTION':
                    $name = $token->getName();
<<<<<<< HEAD
                    $tmp  = [
=======
                    $tmp  = array(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                      'docblock'  => $token->getDocblock(),
                      'keywords'  => $token->getKeywords(),
                      'visibility'=> $token->getVisibility(),
                      'signature' => $token->getSignature(),
                      'startLine' => $token->getLine(),
                      'endLine'   => $token->getEndLine(),
                      'ccn'       => $token->getCCN(),
                      'file'      => $this->filename
<<<<<<< HEAD
                    ];
=======
                    );
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

                    if (empty($class) &&
                        $trait === false &&
                        $interface === false) {
                        $this->functions[$name] = $tmp;

                        $this->addFunctionToMap(
                            $name,
                            $tmp['startLine'],
                            $tmp['endLine']
                        );
<<<<<<< HEAD
                    } elseif (!empty($class)) {
                        $this->classes[$class[count($class) - 1]]['methods'][$name] = $tmp;

                        $this->addFunctionToMap(
                            $class[count($class) - 1] . '::' . $name,
=======
                    } elseif (!empty($class) && $class[count($class)-1] != 'anonymous class') {
                        $this->classes[$class[count($class)-1]]['methods'][$name] = $tmp;

                        $this->addFunctionToMap(
                            $class[count($class)-1] . '::' . $name,
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                            $tmp['startLine'],
                            $tmp['endLine']
                        );
                    } elseif ($trait !== false) {
                        $this->traits[$trait]['methods'][$name] = $tmp;

                        $this->addFunctionToMap(
                            $trait . '::' . $name,
                            $tmp['startLine'],
                            $tmp['endLine']
                        );
                    } else {
                        $this->interfaces[$interface]['methods'][$name] = $tmp;
                    }
                    break;

                case 'PHP_Token_CLOSE_CURLY':
                    if (!empty($classEndLine) &&
<<<<<<< HEAD
                        $classEndLine[count($classEndLine) - 1] == $token->getLine()) {
=======
                        $classEndLine[count($classEndLine)-1] == $token->getLine()) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                        array_pop($classEndLine);
                        array_pop($class);
                    } elseif ($traitEndLine !== false &&
                        $traitEndLine == $token->getLine()) {
                        $trait        = false;
                        $traitEndLine = false;
                    } elseif ($interfaceEndLine !== false &&
                        $interfaceEndLine == $token->getLine()) {
                        $interface        = false;
                        $interfaceEndLine = false;
                    }
                    break;
            }
        }
    }

    /**
     * @return array
     */
    public function getLinesOfCode()
    {
        return $this->linesOfCode;
    }

<<<<<<< HEAD
    public function rewind(): void
=======
    /**
     */
    public function rewind()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->position = 0;
    }

<<<<<<< HEAD
    public function valid(): bool
=======
    /**
     * @return boolean
     */
    public function valid()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return isset($this->tokens[$this->position]);
    }

<<<<<<< HEAD
    #[\ReturnTypeWillChange]
=======
    /**
     * @return integer
     */
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    public function key()
    {
        return $this->position;
    }

<<<<<<< HEAD
    #[\ReturnTypeWillChange]
=======
    /**
     * @return PHP_Token
     */
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    public function current()
    {
        return $this->tokens[$this->position];
    }

<<<<<<< HEAD
    public function next(): void
=======
    /**
     */
    public function next()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->position++;
    }

    /**
<<<<<<< HEAD
     * @param int $offset
     */
    public function offsetExists($offset): bool
=======
     * @param  integer $offset
     * @return boolean
     */
    public function offsetExists($offset)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return isset($this->tokens[$offset]);
    }

<<<<<<< HEAD
    #[\ReturnTypeWillChange]
=======
    /**
     * @param  integer $offset
     * @return mixed
     * @throws OutOfBoundsException
     */
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    public function offsetGet($offset)
    {
        if (!$this->offsetExists($offset)) {
            throw new OutOfBoundsException(
                sprintf(
                    'No token at position "%s"',
                    $offset
                )
            );
        }

        return $this->tokens[$offset];
    }

    /**
<<<<<<< HEAD
     * @param int   $offset
     * @param mixed $value
     */
    public function offsetSet($offset, $value): void
=======
     * @param integer $offset
     * @param mixed   $value
     */
    public function offsetSet($offset, $value)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->tokens[$offset] = $value;
    }

    /**
<<<<<<< HEAD
     * @param int $offset
     *
     * @throws OutOfBoundsException
     */
    public function offsetUnset($offset): void
=======
     * @param  integer $offset
     * @throws OutOfBoundsException
     */
    public function offsetUnset($offset)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if (!$this->offsetExists($offset)) {
            throw new OutOfBoundsException(
                sprintf(
                    'No token at position "%s"',
                    $offset
                )
            );
        }

        unset($this->tokens[$offset]);
    }

    /**
     * Seek to an absolute position.
     *
<<<<<<< HEAD
     * @param int $position
     *
     * @throws OutOfBoundsException
     */
    public function seek($position): void
=======
     * @param  integer $position
     * @throws OutOfBoundsException
     */
    public function seek($position)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->position = $position;

        if (!$this->valid()) {
            throw new OutOfBoundsException(
                sprintf(
                    'No token at position "%s"',
                    $this->position
                )
            );
        }
    }

    /**
<<<<<<< HEAD
     * @param string $name
     * @param int    $startLine
     * @param int    $endLine
=======
     * @param string  $name
     * @param integer $startLine
     * @param integer $endLine
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    private function addFunctionToMap($name, $startLine, $endLine)
    {
        for ($line = $startLine; $line <= $endLine; $line++) {
            $this->lineToFunctionMap[$line] = $name;
        }
    }
}
