<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Routing;

/**
 * CompiledRoutes are returned by the RouteCompiler class.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class CompiledRoute implements \Serializable
{
    private $variables;
    private $tokens;
    private $staticPrefix;
    private $regex;
    private $pathVariables;
    private $hostVariables;
    private $hostRegex;
    private $hostTokens;

    /**
<<<<<<< HEAD
=======
     * Constructor.
     *
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * @param string      $staticPrefix  The static prefix of the compiled route
     * @param string      $regex         The regular expression to use to match this route
     * @param array       $tokens        An array of tokens to use to generate URL for this route
     * @param array       $pathVariables An array of path variables
     * @param string|null $hostRegex     Host regex
     * @param array       $hostTokens    Host tokens
     * @param array       $hostVariables An array of host variables
     * @param array       $variables     An array of variables (variables defined in the path and in the host patterns)
     */
<<<<<<< HEAD
    public function __construct(string $staticPrefix, string $regex, array $tokens, array $pathVariables, string $hostRegex = null, array $hostTokens = [], array $hostVariables = [], array $variables = [])
    {
        $this->staticPrefix = $staticPrefix;
=======
    public function __construct($staticPrefix, $regex, array $tokens, array $pathVariables, $hostRegex = null, array $hostTokens = array(), array $hostVariables = array(), array $variables = array())
    {
        $this->staticPrefix = (string) $staticPrefix;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $this->regex = $regex;
        $this->tokens = $tokens;
        $this->pathVariables = $pathVariables;
        $this->hostRegex = $hostRegex;
        $this->hostTokens = $hostTokens;
        $this->hostVariables = $hostVariables;
        $this->variables = $variables;
    }

<<<<<<< HEAD
    public function __serialize(): array
    {
        return [
=======
    /**
     * {@inheritdoc}
     */
    public function serialize()
    {
        return serialize(array(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            'vars' => $this->variables,
            'path_prefix' => $this->staticPrefix,
            'path_regex' => $this->regex,
            'path_tokens' => $this->tokens,
            'path_vars' => $this->pathVariables,
            'host_regex' => $this->hostRegex,
            'host_tokens' => $this->hostTokens,
            'host_vars' => $this->hostVariables,
<<<<<<< HEAD
        ];
    }

    /**
     * @internal
     */
    final public function serialize(): string
    {
        return serialize($this->__serialize());
    }

    public function __unserialize(array $data): void
    {
=======
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function unserialize($serialized)
    {
        $data = unserialize($serialized);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $this->variables = $data['vars'];
        $this->staticPrefix = $data['path_prefix'];
        $this->regex = $data['path_regex'];
        $this->tokens = $data['path_tokens'];
        $this->pathVariables = $data['path_vars'];
        $this->hostRegex = $data['host_regex'];
        $this->hostTokens = $data['host_tokens'];
        $this->hostVariables = $data['host_vars'];
    }

    /**
<<<<<<< HEAD
     * @internal
     */
    final public function unserialize($serialized)
    {
        $this->__unserialize(unserialize($serialized, ['allowed_classes' => false]));
    }

    /**
     * Returns the static prefix.
     *
     * @return string
=======
     * Returns the static prefix.
     *
     * @return string The static prefix
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getStaticPrefix()
    {
        return $this->staticPrefix;
    }

    /**
     * Returns the regex.
     *
<<<<<<< HEAD
     * @return string
=======
     * @return string The regex
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getRegex()
    {
        return $this->regex;
    }

    /**
     * Returns the host regex.
     *
<<<<<<< HEAD
     * @return string|null
=======
     * @return string|null The host regex or null
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getHostRegex()
    {
        return $this->hostRegex;
    }

    /**
     * Returns the tokens.
     *
<<<<<<< HEAD
     * @return array
=======
     * @return array The tokens
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getTokens()
    {
        return $this->tokens;
    }

    /**
     * Returns the host tokens.
     *
<<<<<<< HEAD
     * @return array
=======
     * @return array The tokens
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getHostTokens()
    {
        return $this->hostTokens;
    }

    /**
     * Returns the variables.
     *
<<<<<<< HEAD
     * @return array
=======
     * @return array The variables
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getVariables()
    {
        return $this->variables;
    }

    /**
     * Returns the path variables.
     *
<<<<<<< HEAD
     * @return array
=======
     * @return array The variables
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getPathVariables()
    {
        return $this->pathVariables;
    }

    /**
     * Returns the host variables.
     *
<<<<<<< HEAD
     * @return array
=======
     * @return array The variables
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getHostVariables()
    {
        return $this->hostVariables;
    }
}
