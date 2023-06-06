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

use Symfony\Component\HttpFoundation\Request;

/**
 * Holds information about the current request.
 *
 * This class implements a fluent interface.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 * @author Tobias Schultze <http://tobion.de>
 */
class RequestContext
{
    private $baseUrl;
    private $pathInfo;
    private $method;
    private $host;
    private $scheme;
    private $httpPort;
    private $httpsPort;
    private $queryString;
<<<<<<< HEAD
    private $parameters = [];

    public function __construct(string $baseUrl = '', string $method = 'GET', string $host = 'localhost', string $scheme = 'http', int $httpPort = 80, int $httpsPort = 443, string $path = '/', string $queryString = '')
=======

    /**
     * @var array
     */
    private $parameters = array();

    /**
     * Constructor.
     *
     * @param string $baseUrl     The base URL
     * @param string $method      The HTTP method
     * @param string $host        The HTTP host name
     * @param string $scheme      The HTTP scheme
     * @param int    $httpPort    The HTTP port
     * @param int    $httpsPort   The HTTPS port
     * @param string $path        The path
     * @param string $queryString The query string
     */
    public function __construct($baseUrl = '', $method = 'GET', $host = 'localhost', $scheme = 'http', $httpPort = 80, $httpsPort = 443, $path = '/', $queryString = '')
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->setBaseUrl($baseUrl);
        $this->setMethod($method);
        $this->setHost($host);
        $this->setScheme($scheme);
        $this->setHttpPort($httpPort);
        $this->setHttpsPort($httpsPort);
        $this->setPathInfo($path);
        $this->setQueryString($queryString);
    }

<<<<<<< HEAD
    public static function fromUri(string $uri, string $host = 'localhost', string $scheme = 'http', int $httpPort = 80, int $httpsPort = 443): self
    {
        $uri = parse_url($uri);
        $scheme = $uri['scheme'] ?? $scheme;
        $host = $uri['host'] ?? $host;

        if (isset($uri['port'])) {
            if ('http' === $scheme) {
                $httpPort = $uri['port'];
            } elseif ('https' === $scheme) {
                $httpsPort = $uri['port'];
            }
        }

        return new self($uri['path'] ?? '', 'GET', $host, $scheme, $httpPort, $httpsPort);
    }

    /**
     * Updates the RequestContext information based on a HttpFoundation Request.
     *
     * @return $this
=======
    /**
     * Updates the RequestContext information based on a HttpFoundation Request.
     *
     * @param Request $request A Request instance
     *
     * @return RequestContext The current instance, implementing a fluent interface
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function fromRequest(Request $request)
    {
        $this->setBaseUrl($request->getBaseUrl());
        $this->setPathInfo($request->getPathInfo());
        $this->setMethod($request->getMethod());
        $this->setHost($request->getHost());
        $this->setScheme($request->getScheme());
<<<<<<< HEAD
        $this->setHttpPort($request->isSecure() || null === $request->getPort() ? $this->httpPort : $request->getPort());
        $this->setHttpsPort($request->isSecure() && null !== $request->getPort() ? $request->getPort() : $this->httpsPort);
=======
        $this->setHttpPort($request->isSecure() ? $this->httpPort : $request->getPort());
        $this->setHttpsPort($request->isSecure() ? $request->getPort() : $this->httpsPort);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $this->setQueryString($request->server->get('QUERY_STRING', ''));

        return $this;
    }

    /**
     * Gets the base URL.
     *
<<<<<<< HEAD
     * @return string
=======
     * @return string The base URL
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getBaseUrl()
    {
        return $this->baseUrl;
    }

    /**
     * Sets the base URL.
     *
<<<<<<< HEAD
     * @return $this
     */
    public function setBaseUrl(string $baseUrl)
    {
        $this->baseUrl = rtrim($baseUrl, '/');
=======
     * @param string $baseUrl The base URL
     *
     * @return RequestContext The current instance, implementing a fluent interface
     */
    public function setBaseUrl($baseUrl)
    {
        $this->baseUrl = $baseUrl;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        return $this;
    }

    /**
     * Gets the path info.
     *
<<<<<<< HEAD
     * @return string
=======
     * @return string The path info
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getPathInfo()
    {
        return $this->pathInfo;
    }

    /**
     * Sets the path info.
     *
<<<<<<< HEAD
     * @return $this
     */
    public function setPathInfo(string $pathInfo)
=======
     * @param string $pathInfo The path info
     *
     * @return RequestContext The current instance, implementing a fluent interface
     */
    public function setPathInfo($pathInfo)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->pathInfo = $pathInfo;

        return $this;
    }

    /**
     * Gets the HTTP method.
     *
     * The method is always an uppercased string.
     *
<<<<<<< HEAD
     * @return string
=======
     * @return string The HTTP method
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * Sets the HTTP method.
     *
<<<<<<< HEAD
     * @return $this
     */
    public function setMethod(string $method)
=======
     * @param string $method The HTTP method
     *
     * @return RequestContext The current instance, implementing a fluent interface
     */
    public function setMethod($method)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->method = strtoupper($method);

        return $this;
    }

    /**
     * Gets the HTTP host.
     *
     * The host is always lowercased because it must be treated case-insensitive.
     *
<<<<<<< HEAD
     * @return string
=======
     * @return string The HTTP host
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * Sets the HTTP host.
     *
<<<<<<< HEAD
     * @return $this
     */
    public function setHost(string $host)
=======
     * @param string $host The HTTP host
     *
     * @return RequestContext The current instance, implementing a fluent interface
     */
    public function setHost($host)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->host = strtolower($host);

        return $this;
    }

    /**
     * Gets the HTTP scheme.
     *
<<<<<<< HEAD
     * @return string
=======
     * @return string The HTTP scheme
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getScheme()
    {
        return $this->scheme;
    }

    /**
     * Sets the HTTP scheme.
     *
<<<<<<< HEAD
     * @return $this
     */
    public function setScheme(string $scheme)
=======
     * @param string $scheme The HTTP scheme
     *
     * @return RequestContext The current instance, implementing a fluent interface
     */
    public function setScheme($scheme)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->scheme = strtolower($scheme);

        return $this;
    }

    /**
     * Gets the HTTP port.
     *
<<<<<<< HEAD
     * @return int
=======
     * @return int The HTTP port
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getHttpPort()
    {
        return $this->httpPort;
    }

    /**
     * Sets the HTTP port.
     *
<<<<<<< HEAD
     * @return $this
     */
    public function setHttpPort(int $httpPort)
    {
        $this->httpPort = $httpPort;
=======
     * @param int $httpPort The HTTP port
     *
     * @return RequestContext The current instance, implementing a fluent interface
     */
    public function setHttpPort($httpPort)
    {
        $this->httpPort = (int) $httpPort;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        return $this;
    }

    /**
     * Gets the HTTPS port.
     *
<<<<<<< HEAD
     * @return int
=======
     * @return int The HTTPS port
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getHttpsPort()
    {
        return $this->httpsPort;
    }

    /**
     * Sets the HTTPS port.
     *
<<<<<<< HEAD
     * @return $this
     */
    public function setHttpsPort(int $httpsPort)
    {
        $this->httpsPort = $httpsPort;
=======
     * @param int $httpsPort The HTTPS port
     *
     * @return RequestContext The current instance, implementing a fluent interface
     */
    public function setHttpsPort($httpsPort)
    {
        $this->httpsPort = (int) $httpsPort;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        return $this;
    }

    /**
<<<<<<< HEAD
     * Gets the query string without the "?".
     *
     * @return string
=======
     * Gets the query string.
     *
     * @return string The query string without the "?"
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getQueryString()
    {
        return $this->queryString;
    }

    /**
     * Sets the query string.
     *
<<<<<<< HEAD
     * @return $this
     */
    public function setQueryString(?string $queryString)
=======
     * @param string $queryString The query string (after "?")
     *
     * @return RequestContext The current instance, implementing a fluent interface
     */
    public function setQueryString($queryString)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        // string cast to be fault-tolerant, accepting null
        $this->queryString = (string) $queryString;

        return $this;
    }

    /**
     * Returns the parameters.
     *
<<<<<<< HEAD
     * @return array
=======
     * @return array The parameters
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * Sets the parameters.
     *
     * @param array $parameters The parameters
     *
<<<<<<< HEAD
     * @return $this
=======
     * @return RequestContext The current instance, implementing a fluent interface
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function setParameters(array $parameters)
    {
        $this->parameters = $parameters;

        return $this;
    }

    /**
     * Gets a parameter value.
     *
<<<<<<< HEAD
     * @return mixed
     */
    public function getParameter(string $name)
    {
        return $this->parameters[$name] ?? null;
=======
     * @param string $name A parameter name
     *
     * @return mixed The parameter value or null if nonexistent
     */
    public function getParameter($name)
    {
        return isset($this->parameters[$name]) ? $this->parameters[$name] : null;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Checks if a parameter value is set for the given parameter.
     *
<<<<<<< HEAD
     * @return bool
     */
    public function hasParameter(string $name)
    {
        return \array_key_exists($name, $this->parameters);
=======
     * @param string $name A parameter name
     *
     * @return bool True if the parameter value is set, false otherwise
     */
    public function hasParameter($name)
    {
        return array_key_exists($name, $this->parameters);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Sets a parameter value.
     *
<<<<<<< HEAD
     * @param mixed $parameter The parameter value
     *
     * @return $this
     */
    public function setParameter(string $name, $parameter)
=======
     * @param string $name      A parameter name
     * @param mixed  $parameter The parameter value
     *
     * @return RequestContext The current instance, implementing a fluent interface
     */
    public function setParameter($name, $parameter)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->parameters[$name] = $parameter;

        return $this;
    }
<<<<<<< HEAD

    public function isSecure(): bool
    {
        return 'https' === $this->scheme;
    }
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
}
