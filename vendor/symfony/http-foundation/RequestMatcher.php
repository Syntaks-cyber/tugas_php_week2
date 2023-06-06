<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpFoundation;

/**
 * RequestMatcher compares a pre-defined set of checks against a Request instance.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class RequestMatcher implements RequestMatcherInterface
{
    /**
<<<<<<< HEAD
     * @var string|null
=======
     * @var string
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    private $path;

    /**
<<<<<<< HEAD
     * @var string|null
=======
     * @var string
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    private $host;

    /**
<<<<<<< HEAD
     * @var int|null
     */
    private $port;

    /**
     * @var string[]
     */
    private $methods = [];

    /**
     * @var string[]
     */
    private $ips = [];
=======
     * @var array
     */
    private $methods = array();

    /**
     * @var string
     */
    private $ips = array();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @var array
     */
<<<<<<< HEAD
    private $attributes = [];
=======
    private $attributes = array();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @var string[]
     */
<<<<<<< HEAD
    private $schemes = [];

    /**
     * @param string|string[]|null $methods
     * @param string|string[]|null $ips
     * @param string|string[]|null $schemes
     */
    public function __construct(string $path = null, string $host = null, $methods = null, $ips = null, array $attributes = [], $schemes = null, int $port = null)
=======
    private $schemes = array();

    /**
     * @param string|null          $path
     * @param string|null          $host
     * @param string|string[]|null $methods
     * @param string|string[]|null $ips
     * @param array                $attributes
     * @param string|string[]|null $schemes
     */
    public function __construct($path = null, $host = null, $methods = null, $ips = null, array $attributes = array(), $schemes = null)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->matchPath($path);
        $this->matchHost($host);
        $this->matchMethod($methods);
        $this->matchIps($ips);
        $this->matchScheme($schemes);
<<<<<<< HEAD
        $this->matchPort($port);
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        foreach ($attributes as $k => $v) {
            $this->matchAttribute($k, $v);
        }
    }

    /**
     * Adds a check for the HTTP scheme.
     *
     * @param string|string[]|null $scheme An HTTP scheme or an array of HTTP schemes
     */
    public function matchScheme($scheme)
    {
<<<<<<< HEAD
        $this->schemes = null !== $scheme ? array_map('strtolower', (array) $scheme) : [];
=======
        $this->schemes = array_map('strtolower', (array) $scheme);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Adds a check for the URL host name.
<<<<<<< HEAD
     */
    public function matchHost(?string $regexp)
=======
     *
     * @param string $regexp A Regexp
     */
    public function matchHost($regexp)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->host = $regexp;
    }

    /**
<<<<<<< HEAD
     * Adds a check for the the URL port.
     *
     * @param int|null $port The port number to connect to
     */
    public function matchPort(?int $port)
    {
        $this->port = $port;
    }

    /**
     * Adds a check for the URL path info.
     */
    public function matchPath(?string $regexp)
=======
     * Adds a check for the URL path info.
     *
     * @param string $regexp A Regexp
     */
    public function matchPath($regexp)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->path = $regexp;
    }

    /**
     * Adds a check for the client IP.
     *
     * @param string $ip A specific IP address or a range specified using IP/netmask like 192.168.1.0/24
     */
<<<<<<< HEAD
    public function matchIp(string $ip)
=======
    public function matchIp($ip)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->matchIps($ip);
    }

    /**
     * Adds a check for the client IP.
     *
<<<<<<< HEAD
     * @param string|string[]|null $ips A specific IP address or a range specified using IP/netmask like 192.168.1.0/24
     */
    public function matchIps($ips)
    {
        $ips = null !== $ips ? (array) $ips : [];

        $this->ips = array_reduce($ips, static function (array $ips, string $ip) {
            return array_merge($ips, preg_split('/\s*,\s*/', $ip));
        }, []);
=======
     * @param string|string[] $ips A specific IP address or a range specified using IP/netmask like 192.168.1.0/24
     */
    public function matchIps($ips)
    {
        $this->ips = (array) $ips;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Adds a check for the HTTP method.
     *
<<<<<<< HEAD
     * @param string|string[]|null $method An HTTP method or an array of HTTP methods
     */
    public function matchMethod($method)
    {
        $this->methods = null !== $method ? array_map('strtoupper', (array) $method) : [];
=======
     * @param string|string[] $method An HTTP method or an array of HTTP methods
     */
    public function matchMethod($method)
    {
        $this->methods = array_map('strtoupper', (array) $method);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Adds a check for request attribute.
<<<<<<< HEAD
     */
    public function matchAttribute(string $key, string $regexp)
=======
     *
     * @param string $key    The request attribute name
     * @param string $regexp A Regexp
     */
    public function matchAttribute($key, $regexp)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->attributes[$key] = $regexp;
    }

    /**
     * {@inheritdoc}
     */
    public function matches(Request $request)
    {
<<<<<<< HEAD
        if ($this->schemes && !\in_array($request->getScheme(), $this->schemes, true)) {
            return false;
        }

        if ($this->methods && !\in_array($request->getMethod(), $this->methods, true)) {
=======
        if ($this->schemes && !in_array($request->getScheme(), $this->schemes)) {
            return false;
        }

        if ($this->methods && !in_array($request->getMethod(), $this->methods)) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            return false;
        }

        foreach ($this->attributes as $key => $pattern) {
<<<<<<< HEAD
            $requestAttribute = $request->attributes->get($key);
            if (!\is_string($requestAttribute)) {
                return false;
            }
            if (!preg_match('{'.$pattern.'}', $requestAttribute)) {
=======
            if (!preg_match('{'.$pattern.'}', $request->attributes->get($key))) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                return false;
            }
        }

        if (null !== $this->path && !preg_match('{'.$this->path.'}', rawurldecode($request->getPathInfo()))) {
            return false;
        }

        if (null !== $this->host && !preg_match('{'.$this->host.'}i', $request->getHost())) {
            return false;
        }

<<<<<<< HEAD
        if (null !== $this->port && 0 < $this->port && $request->getPort() !== $this->port) {
            return false;
        }

        if (IpUtils::checkIp($request->getClientIp() ?? '', $this->ips)) {
=======
        if (IpUtils::checkIp($request->getClientIp(), $this->ips)) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            return true;
        }

        // Note to future implementors: add additional checks above the
        // foreach above or else your check might not be run!
<<<<<<< HEAD
        return 0 === \count($this->ips);
=======
        return count($this->ips) === 0;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }
}
