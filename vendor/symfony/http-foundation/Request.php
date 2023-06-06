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

use Symfony\Component\HttpFoundation\Exception\ConflictingHeadersException;
<<<<<<< HEAD
use Symfony\Component\HttpFoundation\Exception\JsonException;
use Symfony\Component\HttpFoundation\Exception\SessionNotFoundException;
use Symfony\Component\HttpFoundation\Exception\SuspiciousOperationException;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

// Help opcache.preload discover always-needed symbols
class_exists(AcceptHeader::class);
class_exists(FileBag::class);
class_exists(HeaderBag::class);
class_exists(HeaderUtils::class);
class_exists(InputBag::class);
class_exists(ParameterBag::class);
class_exists(ServerBag::class);

=======
use Symfony\Component\HttpFoundation\Session\SessionInterface;

>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
/**
 * Request represents an HTTP request.
 *
 * The methods dealing with URL accept / return a raw path (% encoded):
 *   * getBasePath
 *   * getBaseUrl
 *   * getPathInfo
 *   * getRequestUri
 *   * getUri
 *   * getUriForPath
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class Request
{
<<<<<<< HEAD
    public const HEADER_FORWARDED = 0b000001; // When using RFC 7239
    public const HEADER_X_FORWARDED_FOR = 0b000010;
    public const HEADER_X_FORWARDED_HOST = 0b000100;
    public const HEADER_X_FORWARDED_PROTO = 0b001000;
    public const HEADER_X_FORWARDED_PORT = 0b010000;
    public const HEADER_X_FORWARDED_PREFIX = 0b100000;

    /** @deprecated since Symfony 5.2, use either "HEADER_X_FORWARDED_FOR | HEADER_X_FORWARDED_HOST | HEADER_X_FORWARDED_PORT | HEADER_X_FORWARDED_PROTO" or "HEADER_X_FORWARDED_AWS_ELB" or "HEADER_X_FORWARDED_TRAEFIK" constants instead. */
    public const HEADER_X_FORWARDED_ALL = 0b1011110; // All "X-Forwarded-*" headers sent by "usual" reverse proxy
    public const HEADER_X_FORWARDED_AWS_ELB = 0b0011010; // AWS ELB doesn't send X-Forwarded-Host
    public const HEADER_X_FORWARDED_TRAEFIK = 0b0111110; // All "X-Forwarded-*" headers sent by Traefik reverse proxy

    public const METHOD_HEAD = 'HEAD';
    public const METHOD_GET = 'GET';
    public const METHOD_POST = 'POST';
    public const METHOD_PUT = 'PUT';
    public const METHOD_PATCH = 'PATCH';
    public const METHOD_DELETE = 'DELETE';
    public const METHOD_PURGE = 'PURGE';
    public const METHOD_OPTIONS = 'OPTIONS';
    public const METHOD_TRACE = 'TRACE';
    public const METHOD_CONNECT = 'CONNECT';
=======
    const HEADER_FORWARDED = 'forwarded';
    const HEADER_CLIENT_IP = 'client_ip';
    const HEADER_CLIENT_HOST = 'client_host';
    const HEADER_CLIENT_PROTO = 'client_proto';
    const HEADER_CLIENT_PORT = 'client_port';

    const METHOD_HEAD = 'HEAD';
    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';
    const METHOD_PUT = 'PUT';
    const METHOD_PATCH = 'PATCH';
    const METHOD_DELETE = 'DELETE';
    const METHOD_PURGE = 'PURGE';
    const METHOD_OPTIONS = 'OPTIONS';
    const METHOD_TRACE = 'TRACE';
    const METHOD_CONNECT = 'CONNECT';
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @var string[]
     */
<<<<<<< HEAD
    protected static $trustedProxies = [];
=======
    protected static $trustedProxies = array();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @var string[]
     */
<<<<<<< HEAD
    protected static $trustedHostPatterns = [];
=======
    protected static $trustedHostPatterns = array();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @var string[]
     */
<<<<<<< HEAD
    protected static $trustedHosts = [];
=======
    protected static $trustedHosts = array();

    /**
     * Names for headers that can be trusted when
     * using trusted proxies.
     *
     * The FORWARDED header is the standard as of rfc7239.
     *
     * The other headers are non-standard, but widely used
     * by popular reverse proxies (like Apache mod_proxy or Amazon EC2).
     */
    protected static $trustedHeaders = array(
        self::HEADER_FORWARDED => 'FORWARDED',
        self::HEADER_CLIENT_IP => 'X_FORWARDED_FOR',
        self::HEADER_CLIENT_HOST => 'X_FORWARDED_HOST',
        self::HEADER_CLIENT_PROTO => 'X_FORWARDED_PROTO',
        self::HEADER_CLIENT_PORT => 'X_FORWARDED_PORT',
    );
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    protected static $httpMethodParameterOverride = false;

    /**
     * Custom parameters.
     *
<<<<<<< HEAD
     * @var ParameterBag
=======
     * @var \Symfony\Component\HttpFoundation\ParameterBag
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public $attributes;

    /**
     * Request body parameters ($_POST).
     *
<<<<<<< HEAD
     * @var InputBag
=======
     * @var \Symfony\Component\HttpFoundation\ParameterBag
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public $request;

    /**
     * Query string parameters ($_GET).
     *
<<<<<<< HEAD
     * @var InputBag
=======
     * @var \Symfony\Component\HttpFoundation\ParameterBag
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public $query;

    /**
     * Server and execution environment parameters ($_SERVER).
     *
<<<<<<< HEAD
     * @var ServerBag
=======
     * @var \Symfony\Component\HttpFoundation\ServerBag
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public $server;

    /**
     * Uploaded files ($_FILES).
     *
<<<<<<< HEAD
     * @var FileBag
=======
     * @var \Symfony\Component\HttpFoundation\FileBag
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public $files;

    /**
     * Cookies ($_COOKIE).
     *
<<<<<<< HEAD
     * @var InputBag
=======
     * @var \Symfony\Component\HttpFoundation\ParameterBag
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public $cookies;

    /**
     * Headers (taken from the $_SERVER).
     *
<<<<<<< HEAD
     * @var HeaderBag
=======
     * @var \Symfony\Component\HttpFoundation\HeaderBag
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public $headers;

    /**
<<<<<<< HEAD
     * @var string|resource|false|null
=======
     * @var string
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    protected $content;

    /**
     * @var array
     */
    protected $languages;

    /**
     * @var array
     */
    protected $charsets;

    /**
     * @var array
     */
    protected $encodings;

    /**
     * @var array
     */
    protected $acceptableContentTypes;

    /**
     * @var string
     */
    protected $pathInfo;

    /**
     * @var string
     */
    protected $requestUri;

    /**
     * @var string
     */
    protected $baseUrl;

    /**
     * @var string
     */
    protected $basePath;

    /**
     * @var string
     */
    protected $method;

    /**
     * @var string
     */
    protected $format;

    /**
<<<<<<< HEAD
     * @var SessionInterface|callable(): SessionInterface
=======
     * @var \Symfony\Component\HttpFoundation\Session\SessionInterface
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    protected $session;

    /**
     * @var string
     */
    protected $locale;

    /**
     * @var string
     */
    protected $defaultLocale = 'en';

    /**
     * @var array
     */
    protected static $formats;

    protected static $requestFactory;

    /**
<<<<<<< HEAD
     * @var string|null
     */
    private $preferredFormat;
    private $isHostValid = true;
    private $isForwardedValid = true;

    /**
     * @var bool|null
     */
    private $isSafeContentPreferred;

    private static $trustedHeaderSet = -1;

    private const FORWARDED_PARAMS = [
        self::HEADER_X_FORWARDED_FOR => 'for',
        self::HEADER_X_FORWARDED_HOST => 'host',
        self::HEADER_X_FORWARDED_PROTO => 'proto',
        self::HEADER_X_FORWARDED_PORT => 'host',
    ];

    /**
     * Names for headers that can be trusted when
     * using trusted proxies.
     *
     * The FORWARDED header is the standard as of rfc7239.
     *
     * The other headers are non-standard, but widely used
     * by popular reverse proxies (like Apache mod_proxy or Amazon EC2).
     */
    private const TRUSTED_HEADERS = [
        self::HEADER_FORWARDED => 'FORWARDED',
        self::HEADER_X_FORWARDED_FOR => 'X_FORWARDED_FOR',
        self::HEADER_X_FORWARDED_HOST => 'X_FORWARDED_HOST',
        self::HEADER_X_FORWARDED_PROTO => 'X_FORWARDED_PROTO',
        self::HEADER_X_FORWARDED_PORT => 'X_FORWARDED_PORT',
        self::HEADER_X_FORWARDED_PREFIX => 'X_FORWARDED_PREFIX',
    ];

    /**
     * @param array                $query      The GET parameters
     * @param array                $request    The POST parameters
     * @param array                $attributes The request attributes (parameters parsed from the PATH_INFO, ...)
     * @param array                $cookies    The COOKIE parameters
     * @param array                $files      The FILES parameters
     * @param array                $server     The SERVER parameters
     * @param string|resource|null $content    The raw body data
     */
    public function __construct(array $query = [], array $request = [], array $attributes = [], array $cookies = [], array $files = [], array $server = [], $content = null)
=======
     * Constructor.
     *
     * @param array           $query      The GET parameters
     * @param array           $request    The POST parameters
     * @param array           $attributes The request attributes (parameters parsed from the PATH_INFO, ...)
     * @param array           $cookies    The COOKIE parameters
     * @param array           $files      The FILES parameters
     * @param array           $server     The SERVER parameters
     * @param string|resource $content    The raw body data
     */
    public function __construct(array $query = array(), array $request = array(), array $attributes = array(), array $cookies = array(), array $files = array(), array $server = array(), $content = null)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->initialize($query, $request, $attributes, $cookies, $files, $server, $content);
    }

    /**
     * Sets the parameters for this request.
     *
     * This method also re-initializes all properties.
     *
<<<<<<< HEAD
     * @param array                $query      The GET parameters
     * @param array                $request    The POST parameters
     * @param array                $attributes The request attributes (parameters parsed from the PATH_INFO, ...)
     * @param array                $cookies    The COOKIE parameters
     * @param array                $files      The FILES parameters
     * @param array                $server     The SERVER parameters
     * @param string|resource|null $content    The raw body data
     */
    public function initialize(array $query = [], array $request = [], array $attributes = [], array $cookies = [], array $files = [], array $server = [], $content = null)
    {
        $this->request = new InputBag($request);
        $this->query = new InputBag($query);
        $this->attributes = new ParameterBag($attributes);
        $this->cookies = new InputBag($cookies);
=======
     * @param array           $query      The GET parameters
     * @param array           $request    The POST parameters
     * @param array           $attributes The request attributes (parameters parsed from the PATH_INFO, ...)
     * @param array           $cookies    The COOKIE parameters
     * @param array           $files      The FILES parameters
     * @param array           $server     The SERVER parameters
     * @param string|resource $content    The raw body data
     */
    public function initialize(array $query = array(), array $request = array(), array $attributes = array(), array $cookies = array(), array $files = array(), array $server = array(), $content = null)
    {
        $this->request = new ParameterBag($request);
        $this->query = new ParameterBag($query);
        $this->attributes = new ParameterBag($attributes);
        $this->cookies = new ParameterBag($cookies);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $this->files = new FileBag($files);
        $this->server = new ServerBag($server);
        $this->headers = new HeaderBag($this->server->getHeaders());

        $this->content = $content;
        $this->languages = null;
        $this->charsets = null;
        $this->encodings = null;
        $this->acceptableContentTypes = null;
        $this->pathInfo = null;
        $this->requestUri = null;
        $this->baseUrl = null;
        $this->basePath = null;
        $this->method = null;
        $this->format = null;
    }

    /**
     * Creates a new request with values from PHP's super globals.
     *
<<<<<<< HEAD
     * @return static
     */
    public static function createFromGlobals()
    {
        $request = self::createRequestFromFactory($_GET, $_POST, [], $_COOKIE, $_FILES, $_SERVER);

        if (str_starts_with($request->headers->get('CONTENT_TYPE', ''), 'application/x-www-form-urlencoded')
            && \in_array(strtoupper($request->server->get('REQUEST_METHOD', 'GET')), ['PUT', 'DELETE', 'PATCH'])
        ) {
            parse_str($request->getContent(), $data);
            $request->request = new InputBag($data);
=======
     * @return Request A new request
     */
    public static function createFromGlobals()
    {
        // With the php's bug #66606, the php's built-in web server
        // stores the Content-Type and Content-Length header values in
        // HTTP_CONTENT_TYPE and HTTP_CONTENT_LENGTH fields.
        $server = $_SERVER;
        if ('cli-server' === PHP_SAPI) {
            if (array_key_exists('HTTP_CONTENT_LENGTH', $_SERVER)) {
                $server['CONTENT_LENGTH'] = $_SERVER['HTTP_CONTENT_LENGTH'];
            }
            if (array_key_exists('HTTP_CONTENT_TYPE', $_SERVER)) {
                $server['CONTENT_TYPE'] = $_SERVER['HTTP_CONTENT_TYPE'];
            }
        }

        $request = self::createRequestFromFactory($_GET, $_POST, array(), $_COOKIE, $_FILES, $server);

        if (0 === strpos($request->headers->get('CONTENT_TYPE'), 'application/x-www-form-urlencoded')
            && in_array(strtoupper($request->server->get('REQUEST_METHOD', 'GET')), array('PUT', 'DELETE', 'PATCH'))
        ) {
            parse_str($request->getContent(), $data);
            $request->request = new ParameterBag($data);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        return $request;
    }

    /**
     * Creates a Request based on a given URI and configuration.
     *
     * The information contained in the URI always take precedence
     * over the other information (server and parameters).
     *
<<<<<<< HEAD
     * @param string               $uri        The URI
     * @param string               $method     The HTTP method
     * @param array                $parameters The query (GET) or request (POST) parameters
     * @param array                $cookies    The request cookies ($_COOKIE)
     * @param array                $files      The request files ($_FILES)
     * @param array                $server     The server parameters ($_SERVER)
     * @param string|resource|null $content    The raw body data
     *
     * @return static
     */
    public static function create(string $uri, string $method = 'GET', array $parameters = [], array $cookies = [], array $files = [], array $server = [], $content = null)
    {
        $server = array_replace([
            'SERVER_NAME' => 'localhost',
            'SERVER_PORT' => 80,
            'HTTP_HOST' => 'localhost',
            'HTTP_USER_AGENT' => 'Symfony',
=======
     * @param string $uri        The URI
     * @param string $method     The HTTP method
     * @param array  $parameters The query (GET) or request (POST) parameters
     * @param array  $cookies    The request cookies ($_COOKIE)
     * @param array  $files      The request files ($_FILES)
     * @param array  $server     The server parameters ($_SERVER)
     * @param string $content    The raw body data
     *
     * @return Request A Request instance
     */
    public static function create($uri, $method = 'GET', $parameters = array(), $cookies = array(), $files = array(), $server = array(), $content = null)
    {
        $server = array_replace(array(
            'SERVER_NAME' => 'localhost',
            'SERVER_PORT' => 80,
            'HTTP_HOST' => 'localhost',
            'HTTP_USER_AGENT' => 'Symfony/3.X',
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            'HTTP_ACCEPT' => 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
            'HTTP_ACCEPT_LANGUAGE' => 'en-us,en;q=0.5',
            'HTTP_ACCEPT_CHARSET' => 'ISO-8859-1,utf-8;q=0.7,*;q=0.7',
            'REMOTE_ADDR' => '127.0.0.1',
            'SCRIPT_NAME' => '',
            'SCRIPT_FILENAME' => '',
            'SERVER_PROTOCOL' => 'HTTP/1.1',
            'REQUEST_TIME' => time(),
<<<<<<< HEAD
            'REQUEST_TIME_FLOAT' => microtime(true),
        ], $server);
=======
        ), $server);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        $server['PATH_INFO'] = '';
        $server['REQUEST_METHOD'] = strtoupper($method);

        $components = parse_url($uri);
        if (isset($components['host'])) {
            $server['SERVER_NAME'] = $components['host'];
            $server['HTTP_HOST'] = $components['host'];
        }

        if (isset($components['scheme'])) {
            if ('https' === $components['scheme']) {
                $server['HTTPS'] = 'on';
                $server['SERVER_PORT'] = 443;
            } else {
                unset($server['HTTPS']);
                $server['SERVER_PORT'] = 80;
            }
        }

        if (isset($components['port'])) {
            $server['SERVER_PORT'] = $components['port'];
<<<<<<< HEAD
            $server['HTTP_HOST'] .= ':'.$components['port'];
=======
            $server['HTTP_HOST'] = $server['HTTP_HOST'].':'.$components['port'];
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        if (isset($components['user'])) {
            $server['PHP_AUTH_USER'] = $components['user'];
        }

        if (isset($components['pass'])) {
            $server['PHP_AUTH_PW'] = $components['pass'];
        }

        if (!isset($components['path'])) {
            $components['path'] = '/';
        }

        switch (strtoupper($method)) {
            case 'POST':
            case 'PUT':
            case 'DELETE':
                if (!isset($server['CONTENT_TYPE'])) {
                    $server['CONTENT_TYPE'] = 'application/x-www-form-urlencoded';
                }
                // no break
            case 'PATCH':
                $request = $parameters;
<<<<<<< HEAD
                $query = [];
                break;
            default:
                $request = [];
=======
                $query = array();
                break;
            default:
                $request = array();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                $query = $parameters;
                break;
        }

        $queryString = '';
        if (isset($components['query'])) {
            parse_str(html_entity_decode($components['query']), $qs);

            if ($query) {
                $query = array_replace($qs, $query);
                $queryString = http_build_query($query, '', '&');
            } else {
                $query = $qs;
                $queryString = $components['query'];
            }
        } elseif ($query) {
            $queryString = http_build_query($query, '', '&');
        }

        $server['REQUEST_URI'] = $components['path'].('' !== $queryString ? '?'.$queryString : '');
        $server['QUERY_STRING'] = $queryString;

<<<<<<< HEAD
        return self::createRequestFromFactory($query, $request, [], $cookies, $files, $server, $content);
=======
        return self::createRequestFromFactory($query, $request, array(), $cookies, $files, $server, $content);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Sets a callable able to create a Request instance.
     *
     * This is mainly useful when you need to override the Request class
     * to keep BC with an existing system. It should not be used for any
     * other purpose.
<<<<<<< HEAD
     */
    public static function setFactory(?callable $callable)
=======
     *
     * @param callable|null $callable A PHP callable
     */
    public static function setFactory($callable)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        self::$requestFactory = $callable;
    }

    /**
     * Clones a request and overrides some of its parameters.
     *
     * @param array $query      The GET parameters
     * @param array $request    The POST parameters
     * @param array $attributes The request attributes (parameters parsed from the PATH_INFO, ...)
     * @param array $cookies    The COOKIE parameters
     * @param array $files      The FILES parameters
     * @param array $server     The SERVER parameters
     *
<<<<<<< HEAD
     * @return static
=======
     * @return Request The duplicated request
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function duplicate(array $query = null, array $request = null, array $attributes = null, array $cookies = null, array $files = null, array $server = null)
    {
        $dup = clone $this;
<<<<<<< HEAD
        if (null !== $query) {
            $dup->query = new InputBag($query);
        }
        if (null !== $request) {
            $dup->request = new InputBag($request);
        }
        if (null !== $attributes) {
            $dup->attributes = new ParameterBag($attributes);
        }
        if (null !== $cookies) {
            $dup->cookies = new InputBag($cookies);
        }
        if (null !== $files) {
            $dup->files = new FileBag($files);
        }
        if (null !== $server) {
=======
        if ($query !== null) {
            $dup->query = new ParameterBag($query);
        }
        if ($request !== null) {
            $dup->request = new ParameterBag($request);
        }
        if ($attributes !== null) {
            $dup->attributes = new ParameterBag($attributes);
        }
        if ($cookies !== null) {
            $dup->cookies = new ParameterBag($cookies);
        }
        if ($files !== null) {
            $dup->files = new FileBag($files);
        }
        if ($server !== null) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $dup->server = new ServerBag($server);
            $dup->headers = new HeaderBag($dup->server->getHeaders());
        }
        $dup->languages = null;
        $dup->charsets = null;
        $dup->encodings = null;
        $dup->acceptableContentTypes = null;
        $dup->pathInfo = null;
        $dup->requestUri = null;
        $dup->baseUrl = null;
        $dup->basePath = null;
        $dup->method = null;
        $dup->format = null;

        if (!$dup->get('_format') && $this->get('_format')) {
            $dup->attributes->set('_format', $this->get('_format'));
        }

        if (!$dup->getRequestFormat(null)) {
            $dup->setRequestFormat($this->getRequestFormat(null));
        }

        return $dup;
    }

    /**
     * Clones the current request.
     *
     * Note that the session is not cloned as duplicated requests
     * are most of the time sub-requests of the main one.
     */
    public function __clone()
    {
        $this->query = clone $this->query;
        $this->request = clone $this->request;
        $this->attributes = clone $this->attributes;
        $this->cookies = clone $this->cookies;
        $this->files = clone $this->files;
        $this->server = clone $this->server;
        $this->headers = clone $this->headers;
    }

    /**
     * Returns the request as a string.
     *
<<<<<<< HEAD
     * @return string
     */
    public function __toString()
    {
        $content = $this->getContent();

        $cookieHeader = '';
        $cookies = [];

        foreach ($this->cookies as $k => $v) {
            $cookies[] = \is_array($v) ? http_build_query([$k => $v], '', '; ', \PHP_QUERY_RFC3986) : "$k=$v";
        }

        if ($cookies) {
            $cookieHeader = 'Cookie: '.implode('; ', $cookies)."\r\n";
=======
     * @return string The request
     */
    public function __toString()
    {
        try {
            $content = $this->getContent();
        } catch (\LogicException $e) {
            return trigger_error($e, E_USER_ERROR);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        return
            sprintf('%s %s %s', $this->getMethod(), $this->getRequestUri(), $this->server->get('SERVER_PROTOCOL'))."\r\n".
<<<<<<< HEAD
            $this->headers.
            $cookieHeader."\r\n".
=======
            $this->headers."\r\n".
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $content;
    }

    /**
     * Overrides the PHP global variables according to this request instance.
     *
     * It overrides $_GET, $_POST, $_REQUEST, $_SERVER, $_COOKIE.
     * $_FILES is never overridden, see rfc1867
     */
    public function overrideGlobals()
    {
<<<<<<< HEAD
        $this->server->set('QUERY_STRING', static::normalizeQueryString(http_build_query($this->query->all(), '', '&')));
=======
        $this->server->set('QUERY_STRING', static::normalizeQueryString(http_build_query($this->query->all(), null, '&')));
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        $_GET = $this->query->all();
        $_POST = $this->request->all();
        $_SERVER = $this->server->all();
        $_COOKIE = $this->cookies->all();

        foreach ($this->headers->all() as $key => $value) {
            $key = strtoupper(str_replace('-', '_', $key));
<<<<<<< HEAD
            if (\in_array($key, ['CONTENT_TYPE', 'CONTENT_LENGTH', 'CONTENT_MD5'], true)) {
=======
            if (in_array($key, array('CONTENT_TYPE', 'CONTENT_LENGTH'))) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                $_SERVER[$key] = implode(', ', $value);
            } else {
                $_SERVER['HTTP_'.$key] = implode(', ', $value);
            }
        }

<<<<<<< HEAD
        $request = ['g' => $_GET, 'p' => $_POST, 'c' => $_COOKIE];

        $requestOrder = \ini_get('request_order') ?: \ini_get('variables_order');
        $requestOrder = preg_replace('#[^cgp]#', '', strtolower($requestOrder)) ?: 'gp';

        $_REQUEST = [[]];

        foreach (str_split($requestOrder) as $order) {
            $_REQUEST[] = $request[$order];
        }

        $_REQUEST = array_merge(...$_REQUEST);
=======
        $request = array('g' => $_GET, 'p' => $_POST, 'c' => $_COOKIE);

        $requestOrder = ini_get('request_order') ?: ini_get('variables_order');
        $requestOrder = preg_replace('#[^cgp]#', '', strtolower($requestOrder)) ?: 'gp';

        $_REQUEST = array();
        foreach (str_split($requestOrder) as $order) {
            $_REQUEST = array_merge($_REQUEST, $request[$order]);
        }
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Sets a list of trusted proxies.
     *
     * You should only list the reverse proxies that you manage directly.
     *
<<<<<<< HEAD
     * @param array $proxies          A list of trusted proxies, the string 'REMOTE_ADDR' will be replaced with $_SERVER['REMOTE_ADDR']
     * @param int   $trustedHeaderSet A bit field of Request::HEADER_*, to set which headers to trust from your proxies
     */
    public static function setTrustedProxies(array $proxies, int $trustedHeaderSet)
    {
        if (self::HEADER_X_FORWARDED_ALL === $trustedHeaderSet) {
            trigger_deprecation('symfony/http-foundation', '5.2', 'The "HEADER_X_FORWARDED_ALL" constant is deprecated, use either "HEADER_X_FORWARDED_FOR | HEADER_X_FORWARDED_HOST | HEADER_X_FORWARDED_PORT | HEADER_X_FORWARDED_PROTO" or "HEADER_X_FORWARDED_AWS_ELB" or "HEADER_X_FORWARDED_TRAEFIK" constants instead.');
        }
        self::$trustedProxies = array_reduce($proxies, function ($proxies, $proxy) {
            if ('REMOTE_ADDR' !== $proxy) {
                $proxies[] = $proxy;
            } elseif (isset($_SERVER['REMOTE_ADDR'])) {
                $proxies[] = $_SERVER['REMOTE_ADDR'];
            }

            return $proxies;
        }, []);
        self::$trustedHeaderSet = $trustedHeaderSet;
=======
     * @param array $proxies A list of trusted proxies
     */
    public static function setTrustedProxies(array $proxies)
    {
        self::$trustedProxies = $proxies;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Gets the list of trusted proxies.
     *
<<<<<<< HEAD
     * @return array
=======
     * @return array An array of trusted proxies
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public static function getTrustedProxies()
    {
        return self::$trustedProxies;
    }

    /**
<<<<<<< HEAD
     * Gets the set of trusted headers from trusted proxies.
     *
     * @return int A bit field of Request::HEADER_* that defines which headers are trusted from your proxies
     */
    public static function getTrustedHeaderSet()
    {
        return self::$trustedHeaderSet;
    }

    /**
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Sets a list of trusted host patterns.
     *
     * You should only list the hosts you manage using regexs.
     *
     * @param array $hostPatterns A list of trusted host patterns
     */
    public static function setTrustedHosts(array $hostPatterns)
    {
        self::$trustedHostPatterns = array_map(function ($hostPattern) {
<<<<<<< HEAD
            return sprintf('{%s}i', $hostPattern);
        }, $hostPatterns);
        // we need to reset trusted hosts on trusted host patterns change
        self::$trustedHosts = [];
=======
            return sprintf('#%s#i', $hostPattern);
        }, $hostPatterns);
        // we need to reset trusted hosts on trusted host patterns change
        self::$trustedHosts = array();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Gets the list of trusted host patterns.
     *
<<<<<<< HEAD
     * @return array
=======
     * @return array An array of trusted host patterns
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public static function getTrustedHosts()
    {
        return self::$trustedHostPatterns;
    }

    /**
<<<<<<< HEAD
=======
     * Sets the name for trusted headers.
     *
     * The following header keys are supported:
     *
     *  * Request::HEADER_CLIENT_IP:    defaults to X-Forwarded-For   (see getClientIp())
     *  * Request::HEADER_CLIENT_HOST:  defaults to X-Forwarded-Host  (see getHost())
     *  * Request::HEADER_CLIENT_PORT:  defaults to X-Forwarded-Port  (see getPort())
     *  * Request::HEADER_CLIENT_PROTO: defaults to X-Forwarded-Proto (see getScheme() and isSecure())
     *
     * Setting an empty value allows to disable the trusted header for the given key.
     *
     * @param string $key   The header key
     * @param string $value The header name
     *
     * @throws \InvalidArgumentException
     */
    public static function setTrustedHeaderName($key, $value)
    {
        if (!array_key_exists($key, self::$trustedHeaders)) {
            throw new \InvalidArgumentException(sprintf('Unable to set the trusted header name for key "%s".', $key));
        }

        self::$trustedHeaders[$key] = $value;
    }

    /**
     * Gets the trusted proxy header name.
     *
     * @param string $key The header key
     *
     * @return string The header name
     *
     * @throws \InvalidArgumentException
     */
    public static function getTrustedHeaderName($key)
    {
        if (!array_key_exists($key, self::$trustedHeaders)) {
            throw new \InvalidArgumentException(sprintf('Unable to get the trusted header name for key "%s".', $key));
        }

        return self::$trustedHeaders[$key];
    }

    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Normalizes a query string.
     *
     * It builds a normalized query string, where keys/value pairs are alphabetized,
     * have consistent escaping and unneeded delimiters are removed.
     *
<<<<<<< HEAD
     * @return string
     */
    public static function normalizeQueryString(?string $qs)
    {
        if ('' === ($qs ?? '')) {
            return '';
        }

        $qs = HeaderUtils::parseQuery($qs);
        ksort($qs);

        return http_build_query($qs, '', '&', \PHP_QUERY_RFC3986);
=======
     * @param string $qs Query string
     *
     * @return string A normalized query string for the Request
     */
    public static function normalizeQueryString($qs)
    {
        if ('' == $qs) {
            return '';
        }

        $parts = array();
        $order = array();

        foreach (explode('&', $qs) as $param) {
            if ('' === $param || '=' === $param[0]) {
                // Ignore useless delimiters, e.g. "x=y&".
                // Also ignore pairs with empty key, even if there was a value, e.g. "=value", as such nameless values cannot be retrieved anyway.
                // PHP also does not include them when building _GET.
                continue;
            }

            $keyValuePair = explode('=', $param, 2);

            // GET parameters, that are submitted from a HTML form, encode spaces as "+" by default (as defined in enctype application/x-www-form-urlencoded).
            // PHP also converts "+" to spaces when filling the global _GET or when using the function parse_str. This is why we use urldecode and then normalize to
            // RFC 3986 with rawurlencode.
            $parts[] = isset($keyValuePair[1]) ?
                rawurlencode(urldecode($keyValuePair[0])).'='.rawurlencode(urldecode($keyValuePair[1])) :
                rawurlencode(urldecode($keyValuePair[0]));
            $order[] = urldecode($keyValuePair[0]);
        }

        array_multisort($order, SORT_ASC, $parts);

        return implode('&', $parts);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Enables support for the _method request parameter to determine the intended HTTP method.
     *
     * Be warned that enabling this feature might lead to CSRF issues in your code.
     * Check that you are using CSRF tokens when required.
     * If the HTTP method parameter override is enabled, an html-form with method "POST" can be altered
     * and used to send a "PUT" or "DELETE" request via the _method request parameter.
     * If these methods are not protected against CSRF, this presents a possible vulnerability.
     *
     * The HTTP method can only be overridden when the real HTTP method is POST.
     */
    public static function enableHttpMethodParameterOverride()
    {
        self::$httpMethodParameterOverride = true;
    }

    /**
     * Checks whether support for the _method request parameter is enabled.
     *
<<<<<<< HEAD
     * @return bool
=======
     * @return bool True when the _method request parameter is enabled, false otherwise
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public static function getHttpMethodParameterOverride()
    {
        return self::$httpMethodParameterOverride;
    }

    /**
     * Gets a "parameter" value from any bag.
     *
     * This method is mainly useful for libraries that want to provide some flexibility. If you don't need the
     * flexibility in controllers, it is better to explicitly get request parameters from the appropriate
     * public property instead (attributes, query, request).
     *
<<<<<<< HEAD
     * Order of precedence: PATH (routing placeholders or custom attributes), GET, POST
     *
     * @param mixed $default The default value if the parameter key does not exist
     *
     * @return mixed
     *
     * @internal since Symfony 5.4, use explicit input sources instead
     */
    public function get(string $key, $default = null)
=======
     * Order of precedence: PATH (routing placeholders or custom attributes), GET, BODY
     *
     * @param string $key     the key
     * @param mixed  $default the default value if the parameter key does not exist
     *
     * @return mixed
     */
    public function get($key, $default = null)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if ($this !== $result = $this->attributes->get($key, $this)) {
            return $result;
        }

<<<<<<< HEAD
        if ($this->query->has($key)) {
            return $this->query->all()[$key];
        }

        if ($this->request->has($key)) {
            return $this->request->all()[$key];
=======
        if ($this !== $result = $this->query->get($key, $this)) {
            return $result;
        }

        if ($this !== $result = $this->request->get($key, $this)) {
            return $result;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        return $default;
    }

    /**
     * Gets the Session.
     *
<<<<<<< HEAD
     * @return SessionInterface
     */
    public function getSession()
    {
        $session = $this->session;
        if (!$session instanceof SessionInterface && null !== $session) {
            $this->setSession($session = $session());
        }

        if (null === $session) {
            throw new SessionNotFoundException('Session has not been set.');
        }

        return $session;
=======
     * @return SessionInterface|null The session
     */
    public function getSession()
    {
        return $this->session;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Whether the request contains a Session which was started in one of the
     * previous requests.
     *
     * @return bool
     */
    public function hasPreviousSession()
    {
        // the check for $this->session avoids malicious users trying to fake a session cookie with proper name
<<<<<<< HEAD
        return $this->hasSession() && $this->cookies->has($this->getSession()->getName());
=======
        return $this->hasSession() && $this->cookies->has($this->session->getName());
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Whether the request contains a Session object.
     *
     * This method does not give any information about the state of the session object,
     * like whether the session is started or not. It is just a way to check if this Request
     * is associated with a Session instance.
     *
<<<<<<< HEAD
     * @param bool $skipIfUninitialized When true, ignores factories injected by `setSessionFactory`
     *
     * @return bool
     */
    public function hasSession(/* bool $skipIfUninitialized = false */)
    {
        $skipIfUninitialized = \func_num_args() > 0 ? func_get_arg(0) : false;

        return null !== $this->session && (!$skipIfUninitialized || $this->session instanceof SessionInterface);
    }

    public function setSession(SessionInterface $session)
    {
        $this->session = $session;
    }

    /**
     * @internal
     *
     * @param callable(): SessionInterface $factory
     */
    public function setSessionFactory(callable $factory)
    {
        $this->session = $factory;
=======
     * @return bool true when the Request contains a Session object, false otherwise
     */
    public function hasSession()
    {
        return null !== $this->session;
    }

    /**
     * Sets the Session.
     *
     * @param SessionInterface $session The Session
     */
    public function setSession(SessionInterface $session)
    {
        $this->session = $session;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Returns the client IP addresses.
     *
     * In the returned array the most trusted IP address is first, and the
     * least trusted one last. The "real" client IP address is the last one,
     * but this is also the least trusted one. Trusted proxies are stripped.
     *
     * Use this method carefully; you should use getClientIp() instead.
     *
<<<<<<< HEAD
     * @return array
=======
     * @return array The client IP addresses
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     *
     * @see getClientIp()
     */
    public function getClientIps()
    {
<<<<<<< HEAD
        $ip = $this->server->get('REMOTE_ADDR');

        if (!$this->isFromTrustedProxy()) {
            return [$ip];
        }

        return $this->getTrustedValues(self::HEADER_X_FORWARDED_FOR, $ip) ?: [$ip];
=======
        $clientIps = array();
        $ip = $this->server->get('REMOTE_ADDR');

        if (!$this->isFromTrustedProxy()) {
            return array($ip);
        }

        $hasTrustedForwardedHeader = self::$trustedHeaders[self::HEADER_FORWARDED] && $this->headers->has(self::$trustedHeaders[self::HEADER_FORWARDED]);
        $hasTrustedClientIpHeader = self::$trustedHeaders[self::HEADER_CLIENT_IP] && $this->headers->has(self::$trustedHeaders[self::HEADER_CLIENT_IP]);

        if ($hasTrustedForwardedHeader) {
            $forwardedHeader = $this->headers->get(self::$trustedHeaders[self::HEADER_FORWARDED]);
            preg_match_all('{(for)=("?\[?)([a-z0-9\.:_\-/]*)}', $forwardedHeader, $matches);
            $forwardedClientIps = $matches[3];

            $forwardedClientIps = $this->normalizeAndFilterClientIps($forwardedClientIps, $ip);
            $clientIps = $forwardedClientIps;
        }

        if ($hasTrustedClientIpHeader) {
            $xForwardedForClientIps = array_map('trim', explode(',', $this->headers->get(self::$trustedHeaders[self::HEADER_CLIENT_IP])));

            $xForwardedForClientIps = $this->normalizeAndFilterClientIps($xForwardedForClientIps, $ip);
            $clientIps = $xForwardedForClientIps;
        }

        if ($hasTrustedForwardedHeader && $hasTrustedClientIpHeader && $forwardedClientIps !== $xForwardedForClientIps) {
            throw new ConflictingHeadersException('The request has both a trusted Forwarded header and a trusted Client IP header, conflicting with each other with regards to the originating IP addresses of the request. This is the result of a misconfiguration. You should either configure your proxy only to send one of these headers, or configure Symfony to distrust one of them.');
        }

        if (!$hasTrustedForwardedHeader && !$hasTrustedClientIpHeader) {
            return $this->normalizeAndFilterClientIps(array(), $ip);
        }

        return $clientIps;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Returns the client IP address.
     *
     * This method can read the client IP address from the "X-Forwarded-For" header
     * when trusted proxies were set via "setTrustedProxies()". The "X-Forwarded-For"
     * header value is a comma+space separated list of IP addresses, the left-most
     * being the original client, and each successive proxy that passed the request
     * adding the IP address where it received the request from.
     *
     * If your reverse proxy uses a different header name than "X-Forwarded-For",
<<<<<<< HEAD
     * ("Client-Ip" for instance), configure it via the $trustedHeaderSet
     * argument of the Request::setTrustedProxies() method instead.
     *
     * @return string|null
     *
     * @see getClientIps()
     * @see https://wikipedia.org/wiki/X-Forwarded-For
=======
     * ("Client-Ip" for instance), configure it via "setTrustedHeaderName()" with
     * the "client-ip" key.
     *
     * @return string The client IP address
     *
     * @see getClientIps()
     * @see http://en.wikipedia.org/wiki/X-Forwarded-For
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getClientIp()
    {
        $ipAddresses = $this->getClientIps();

        return $ipAddresses[0];
    }

    /**
     * Returns current script name.
     *
     * @return string
     */
    public function getScriptName()
    {
        return $this->server->get('SCRIPT_NAME', $this->server->get('ORIG_SCRIPT_NAME', ''));
    }

    /**
     * Returns the path being requested relative to the executed script.
     *
     * The path info always starts with a /.
     *
     * Suppose this request is instantiated from /mysite on localhost:
     *
     *  * http://localhost/mysite              returns an empty string
     *  * http://localhost/mysite/about        returns '/about'
     *  * http://localhost/mysite/enco%20ded   returns '/enco%20ded'
     *  * http://localhost/mysite/about?var=1  returns '/about'
     *
     * @return string The raw path (i.e. not urldecoded)
     */
    public function getPathInfo()
    {
        if (null === $this->pathInfo) {
            $this->pathInfo = $this->preparePathInfo();
        }

        return $this->pathInfo;
    }

    /**
     * Returns the root path from which this request is executed.
     *
     * Suppose that an index.php file instantiates this request object:
     *
     *  * http://localhost/index.php         returns an empty string
     *  * http://localhost/index.php/page    returns an empty string
     *  * http://localhost/web/index.php     returns '/web'
     *  * http://localhost/we%20b/index.php  returns '/we%20b'
     *
     * @return string The raw path (i.e. not urldecoded)
     */
    public function getBasePath()
    {
        if (null === $this->basePath) {
            $this->basePath = $this->prepareBasePath();
        }

        return $this->basePath;
    }

    /**
     * Returns the root URL from which this request is executed.
     *
     * The base URL never ends with a /.
     *
     * This is similar to getBasePath(), except that it also includes the
     * script filename (e.g. index.php) if one exists.
     *
     * @return string The raw URL (i.e. not urldecoded)
     */
    public function getBaseUrl()
    {
<<<<<<< HEAD
        $trustedPrefix = '';

        // the proxy prefix must be prepended to any prefix being needed at the webserver level
        if ($this->isFromTrustedProxy() && $trustedPrefixValues = $this->getTrustedValues(self::HEADER_X_FORWARDED_PREFIX)) {
            $trustedPrefix = rtrim($trustedPrefixValues[0], '/');
        }

        return $trustedPrefix.$this->getBaseUrlReal();
    }

    /**
     * Returns the real base URL received by the webserver from which this request is executed.
     * The URL does not include trusted reverse proxy prefix.
     *
     * @return string The raw URL (i.e. not urldecoded)
     */
    private function getBaseUrlReal(): string
    {
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        if (null === $this->baseUrl) {
            $this->baseUrl = $this->prepareBaseUrl();
        }

        return $this->baseUrl;
    }

    /**
     * Gets the request's scheme.
     *
     * @return string
     */
    public function getScheme()
    {
        return $this->isSecure() ? 'https' : 'http';
    }

    /**
     * Returns the port on which the request is made.
     *
     * This method can read the client port from the "X-Forwarded-Port" header
     * when trusted proxies were set via "setTrustedProxies()".
     *
     * The "X-Forwarded-Port" header must contain the client port.
     *
<<<<<<< HEAD
     * @return int|string|null Can be a string if fetched from the server bag
     */
    public function getPort()
    {
        if ($this->isFromTrustedProxy() && $host = $this->getTrustedValues(self::HEADER_X_FORWARDED_PORT)) {
            $host = $host[0];
        } elseif ($this->isFromTrustedProxy() && $host = $this->getTrustedValues(self::HEADER_X_FORWARDED_HOST)) {
            $host = $host[0];
        } elseif (!$host = $this->headers->get('HOST')) {
            return $this->server->get('SERVER_PORT');
        }

        if ('[' === $host[0]) {
            $pos = strpos($host, ':', strrpos($host, ']'));
        } else {
            $pos = strrpos($host, ':');
        }

        if (false !== $pos && $port = substr($host, $pos + 1)) {
            return (int) $port;
        }

        return 'https' === $this->getScheme() ? 443 : 80;
=======
     * If your reverse proxy uses a different header name than "X-Forwarded-Port",
     * configure it via "setTrustedHeaderName()" with the "client-port" key.
     *
     * @return string
     */
    public function getPort()
    {
        if ($this->isFromTrustedProxy()) {
            if (self::$trustedHeaders[self::HEADER_CLIENT_PORT] && $port = $this->headers->get(self::$trustedHeaders[self::HEADER_CLIENT_PORT])) {
                return $port;
            }

            if (self::$trustedHeaders[self::HEADER_CLIENT_PROTO] && 'https' === $this->headers->get(self::$trustedHeaders[self::HEADER_CLIENT_PROTO], 'http')) {
                return 443;
            }
        }

        if ($host = $this->headers->get('HOST')) {
            if ($host[0] === '[') {
                $pos = strpos($host, ':', strrpos($host, ']'));
            } else {
                $pos = strrpos($host, ':');
            }

            if (false !== $pos) {
                return (int) substr($host, $pos + 1);
            }

            return 'https' === $this->getScheme() ? 443 : 80;
        }

        return $this->server->get('SERVER_PORT');
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Returns the user.
     *
     * @return string|null
     */
    public function getUser()
    {
        return $this->headers->get('PHP_AUTH_USER');
    }

    /**
     * Returns the password.
     *
     * @return string|null
     */
    public function getPassword()
    {
        return $this->headers->get('PHP_AUTH_PW');
    }

    /**
     * Gets the user info.
     *
<<<<<<< HEAD
     * @return string|null A user name if any and, optionally, scheme-specific information about how to gain authorization to access the server
=======
     * @return string A user name and, optionally, scheme-specific information about how to gain authorization to access the server
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getUserInfo()
    {
        $userinfo = $this->getUser();

        $pass = $this->getPassword();
        if ('' != $pass) {
            $userinfo .= ":$pass";
        }

        return $userinfo;
    }

    /**
     * Returns the HTTP host being requested.
     *
     * The port name will be appended to the host if it's non-standard.
     *
     * @return string
     */
    public function getHttpHost()
    {
        $scheme = $this->getScheme();
        $port = $this->getPort();

<<<<<<< HEAD
        if (('http' == $scheme && 80 == $port) || ('https' == $scheme && 443 == $port)) {
=======
        if (('http' == $scheme && $port == 80) || ('https' == $scheme && $port == 443)) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            return $this->getHost();
        }

        return $this->getHost().':'.$port;
    }

    /**
     * Returns the requested URI (path and query string).
     *
     * @return string The raw URI (i.e. not URI decoded)
     */
    public function getRequestUri()
    {
        if (null === $this->requestUri) {
            $this->requestUri = $this->prepareRequestUri();
        }

        return $this->requestUri;
    }

    /**
     * Gets the scheme and HTTP host.
     *
     * If the URL was called with basic authentication, the user
     * and the password are not added to the generated string.
     *
<<<<<<< HEAD
     * @return string
=======
     * @return string The scheme and HTTP host
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getSchemeAndHttpHost()
    {
        return $this->getScheme().'://'.$this->getHttpHost();
    }

    /**
     * Generates a normalized URI (URL) for the Request.
     *
<<<<<<< HEAD
     * @return string
=======
     * @return string A normalized URI (URL) for the Request
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     *
     * @see getQueryString()
     */
    public function getUri()
    {
        if (null !== $qs = $this->getQueryString()) {
            $qs = '?'.$qs;
        }

        return $this->getSchemeAndHttpHost().$this->getBaseUrl().$this->getPathInfo().$qs;
    }

    /**
     * Generates a normalized URI for the given path.
     *
     * @param string $path A path to use instead of the current one
     *
<<<<<<< HEAD
     * @return string
     */
    public function getUriForPath(string $path)
=======
     * @return string The normalized URI for the path
     */
    public function getUriForPath($path)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->getSchemeAndHttpHost().$this->getBaseUrl().$path;
    }

    /**
     * Returns the path as relative reference from the current Request path.
     *
     * Only the URIs path component (no schema, host etc.) is relevant and must be given.
     * Both paths must be absolute and not contain relative parts.
     * Relative URLs from one resource to another are useful when generating self-contained downloadable document archives.
     * Furthermore, they can be used to reduce the link size in documents.
     *
     * Example target paths, given a base path of "/a/b/c/d":
     * - "/a/b/c/d"     -> ""
     * - "/a/b/c/"      -> "./"
     * - "/a/b/"        -> "../"
     * - "/a/b/c/other" -> "other"
     * - "/a/x/y"       -> "../../x/y"
     *
<<<<<<< HEAD
     * @return string
     */
    public function getRelativeUriForPath(string $path)
=======
     * @param string $path The target path
     *
     * @return string The relative target path
     */
    public function getRelativeUriForPath($path)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        // be sure that we are dealing with an absolute path
        if (!isset($path[0]) || '/' !== $path[0]) {
            return $path;
        }

        if ($path === $basePath = $this->getPathInfo()) {
            return '';
        }

        $sourceDirs = explode('/', isset($basePath[0]) && '/' === $basePath[0] ? substr($basePath, 1) : $basePath);
<<<<<<< HEAD
        $targetDirs = explode('/', substr($path, 1));
=======
        $targetDirs = explode('/', isset($path[0]) && '/' === $path[0] ? substr($path, 1) : $path);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        array_pop($sourceDirs);
        $targetFile = array_pop($targetDirs);

        foreach ($sourceDirs as $i => $dir) {
            if (isset($targetDirs[$i]) && $dir === $targetDirs[$i]) {
                unset($sourceDirs[$i], $targetDirs[$i]);
            } else {
                break;
            }
        }

        $targetDirs[] = $targetFile;
<<<<<<< HEAD
        $path = str_repeat('../', \count($sourceDirs)).implode('/', $targetDirs);
=======
        $path = str_repeat('../', count($sourceDirs)).implode('/', $targetDirs);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        // A reference to the same base directory or an empty subdirectory must be prefixed with "./".
        // This also applies to a segment with a colon character (e.g., "file:colon") that cannot be used
        // as the first segment of a relative-path reference, as it would be mistaken for a scheme name
<<<<<<< HEAD
        // (see https://tools.ietf.org/html/rfc3986#section-4.2).
=======
        // (see http://tools.ietf.org/html/rfc3986#section-4.2).
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        return !isset($path[0]) || '/' === $path[0]
            || false !== ($colonPos = strpos($path, ':')) && ($colonPos < ($slashPos = strpos($path, '/')) || false === $slashPos)
            ? "./$path" : $path;
    }

    /**
     * Generates the normalized query string for the Request.
     *
     * It builds a normalized query string, where keys/value pairs are alphabetized
     * and have consistent escaping.
     *
<<<<<<< HEAD
     * @return string|null
=======
     * @return string|null A normalized query string for the Request
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getQueryString()
    {
        $qs = static::normalizeQueryString($this->server->get('QUERY_STRING'));

        return '' === $qs ? null : $qs;
    }

    /**
     * Checks whether the request is secure or not.
     *
     * This method can read the client protocol from the "X-Forwarded-Proto" header
     * when trusted proxies were set via "setTrustedProxies()".
     *
     * The "X-Forwarded-Proto" header must contain the protocol: "https" or "http".
     *
<<<<<<< HEAD
=======
     * If your reverse proxy uses a different header name than "X-Forwarded-Proto"
     * ("SSL_HTTPS" for instance), configure it via "setTrustedHeaderName()" with
     * the "client-proto" key.
     *
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * @return bool
     */
    public function isSecure()
    {
<<<<<<< HEAD
        if ($this->isFromTrustedProxy() && $proto = $this->getTrustedValues(self::HEADER_X_FORWARDED_PROTO)) {
            return \in_array(strtolower($proto[0]), ['https', 'on', 'ssl', '1'], true);
=======
        if ($this->isFromTrustedProxy() && self::$trustedHeaders[self::HEADER_CLIENT_PROTO] && $proto = $this->headers->get(self::$trustedHeaders[self::HEADER_CLIENT_PROTO])) {
            return in_array(strtolower(current(explode(',', $proto))), array('https', 'on', 'ssl', '1'));
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        $https = $this->server->get('HTTPS');

        return !empty($https) && 'off' !== strtolower($https);
    }

    /**
     * Returns the host name.
     *
     * This method can read the client host name from the "X-Forwarded-Host" header
     * when trusted proxies were set via "setTrustedProxies()".
     *
     * The "X-Forwarded-Host" header must contain the client host name.
     *
<<<<<<< HEAD
     * @return string
     *
     * @throws SuspiciousOperationException when the host name is invalid or not trusted
     */
    public function getHost()
    {
        if ($this->isFromTrustedProxy() && $host = $this->getTrustedValues(self::HEADER_X_FORWARDED_HOST)) {
            $host = $host[0];
=======
     * If your reverse proxy uses a different header name than "X-Forwarded-Host",
     * configure it via "setTrustedHeaderName()" with the "client-host" key.
     *
     * @return string
     *
     * @throws \UnexpectedValueException when the host name is invalid
     */
    public function getHost()
    {
        if ($this->isFromTrustedProxy() && self::$trustedHeaders[self::HEADER_CLIENT_HOST] && $host = $this->headers->get(self::$trustedHeaders[self::HEADER_CLIENT_HOST])) {
            $elements = explode(',', $host);

            $host = $elements[count($elements) - 1];
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        } elseif (!$host = $this->headers->get('HOST')) {
            if (!$host = $this->server->get('SERVER_NAME')) {
                $host = $this->server->get('SERVER_ADDR', '');
            }
        }

        // trim and remove port number from host
        // host is lowercase as per RFC 952/2181
        $host = strtolower(preg_replace('/:\d+$/', '', trim($host)));

        // as the host can come from the user (HTTP_HOST and depending on the configuration, SERVER_NAME too can come from the user)
        // check that it does not contain forbidden characters (see RFC 952 and RFC 2181)
        // use preg_replace() instead of preg_match() to prevent DoS attacks with long host names
        if ($host && '' !== preg_replace('/(?:^\[)?[a-zA-Z0-9-:\]_]+\.?/', '', $host)) {
<<<<<<< HEAD
            if (!$this->isHostValid) {
                return '';
            }
            $this->isHostValid = false;

            throw new SuspiciousOperationException(sprintf('Invalid Host "%s".', $host));
        }

        if (\count(self::$trustedHostPatterns) > 0) {
            // to avoid host header injection attacks, you should provide a list of trusted host patterns

            if (\in_array($host, self::$trustedHosts)) {
=======
            throw new \UnexpectedValueException(sprintf('Invalid Host "%s"', $host));
        }

        if (count(self::$trustedHostPatterns) > 0) {
            // to avoid host header injection attacks, you should provide a list of trusted host patterns

            if (in_array($host, self::$trustedHosts)) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                return $host;
            }

            foreach (self::$trustedHostPatterns as $pattern) {
                if (preg_match($pattern, $host)) {
                    self::$trustedHosts[] = $host;

                    return $host;
                }
            }

<<<<<<< HEAD
            if (!$this->isHostValid) {
                return '';
            }
            $this->isHostValid = false;

            throw new SuspiciousOperationException(sprintf('Untrusted Host "%s".', $host));
=======
            throw new \UnexpectedValueException(sprintf('Untrusted Host "%s"', $host));
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        return $host;
    }

    /**
     * Sets the request method.
<<<<<<< HEAD
     */
    public function setMethod(string $method)
=======
     *
     * @param string $method
     */
    public function setMethod($method)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->method = null;
        $this->server->set('REQUEST_METHOD', $method);
    }

    /**
     * Gets the request "intended" method.
     *
     * If the X-HTTP-Method-Override header is set, and if the method is a POST,
     * then it is used to determine the "real" intended HTTP method.
     *
     * The _method request parameter can also be used to determine the HTTP method,
     * but only if enableHttpMethodParameterOverride() has been called.
     *
     * The method is always an uppercased string.
     *
<<<<<<< HEAD
     * @return string
=======
     * @return string The request method
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     *
     * @see getRealMethod()
     */
    public function getMethod()
    {
<<<<<<< HEAD
        if (null !== $this->method) {
            return $this->method;
        }

        $this->method = strtoupper($this->server->get('REQUEST_METHOD', 'GET'));

        if ('POST' !== $this->method) {
            return $this->method;
        }

        $method = $this->headers->get('X-HTTP-METHOD-OVERRIDE');

        if (!$method && self::$httpMethodParameterOverride) {
            $method = $this->request->get('_method', $this->query->get('_method', 'POST'));
        }

        if (!\is_string($method)) {
            return $this->method;
        }

        $method = strtoupper($method);

        if (\in_array($method, ['GET', 'HEAD', 'POST', 'PUT', 'DELETE', 'CONNECT', 'OPTIONS', 'PATCH', 'PURGE', 'TRACE'], true)) {
            return $this->method = $method;
        }

        if (!preg_match('/^[A-Z]++$/D', $method)) {
            throw new SuspiciousOperationException(sprintf('Invalid method override "%s".', $method));
        }

        return $this->method = $method;
=======
        if (null === $this->method) {
            $this->method = strtoupper($this->server->get('REQUEST_METHOD', 'GET'));

            if ('POST' === $this->method) {
                if ($method = $this->headers->get('X-HTTP-METHOD-OVERRIDE')) {
                    $this->method = strtoupper($method);
                } elseif (self::$httpMethodParameterOverride) {
                    $this->method = strtoupper($this->request->get('_method', $this->query->get('_method', 'POST')));
                }
            }
        }

        return $this->method;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Gets the "real" request method.
     *
<<<<<<< HEAD
     * @return string
=======
     * @return string The request method
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     *
     * @see getMethod()
     */
    public function getRealMethod()
    {
        return strtoupper($this->server->get('REQUEST_METHOD', 'GET'));
    }

    /**
     * Gets the mime type associated with the format.
     *
<<<<<<< HEAD
     * @return string|null
     */
    public function getMimeType(string $format)
=======
     * @param string $format The format
     *
     * @return string The associated mime type (null if not found)
     */
    public function getMimeType($format)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if (null === static::$formats) {
            static::initializeFormats();
        }

        return isset(static::$formats[$format]) ? static::$formats[$format][0] : null;
    }

    /**
<<<<<<< HEAD
     * Gets the mime types associated with the format.
     *
     * @return array
     */
    public static function getMimeTypes(string $format)
    {
        if (null === static::$formats) {
            static::initializeFormats();
        }

        return static::$formats[$format] ?? [];
    }

    /**
     * Gets the format associated with the mime type.
     *
     * @return string|null
     */
    public function getFormat(?string $mimeType)
    {
        $canonicalMimeType = null;
        if ($mimeType && false !== $pos = strpos($mimeType, ';')) {
            $canonicalMimeType = trim(substr($mimeType, 0, $pos));
=======
     * Gets the format associated with the mime type.
     *
     * @param string $mimeType The associated mime type
     *
     * @return string|null The format (null if not found)
     */
    public function getFormat($mimeType)
    {
        $canonicalMimeType = null;
        if (false !== $pos = strpos($mimeType, ';')) {
            $canonicalMimeType = substr($mimeType, 0, $pos);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        if (null === static::$formats) {
            static::initializeFormats();
        }

        foreach (static::$formats as $format => $mimeTypes) {
<<<<<<< HEAD
            if (\in_array($mimeType, (array) $mimeTypes)) {
                return $format;
            }
            if (null !== $canonicalMimeType && \in_array($canonicalMimeType, (array) $mimeTypes)) {
                return $format;
            }
        }

        return null;
=======
            if (in_array($mimeType, (array) $mimeTypes)) {
                return $format;
            }
            if (null !== $canonicalMimeType && in_array($canonicalMimeType, (array) $mimeTypes)) {
                return $format;
            }
        }
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Associates a format with mime types.
     *
<<<<<<< HEAD
     * @param string|array $mimeTypes The associated mime types (the preferred one must be the first as it will be used as the content type)
     */
    public function setFormat(?string $format, $mimeTypes)
=======
     * @param string       $format    The format
     * @param string|array $mimeTypes The associated mime types (the preferred one must be the first as it will be used as the content type)
     */
    public function setFormat($format, $mimeTypes)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if (null === static::$formats) {
            static::initializeFormats();
        }

<<<<<<< HEAD
        static::$formats[$format] = \is_array($mimeTypes) ? $mimeTypes : [$mimeTypes];
=======
        static::$formats[$format] = is_array($mimeTypes) ? $mimeTypes : array($mimeTypes);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Gets the request format.
     *
     * Here is the process to determine the format:
     *
     *  * format defined by the user (with setRequestFormat())
     *  * _format request attribute
     *  * $default
     *
<<<<<<< HEAD
     * @see getPreferredFormat
     *
     * @return string|null
     */
    public function getRequestFormat(?string $default = 'html')
    {
        if (null === $this->format) {
            $this->format = $this->attributes->get('_format');
        }

        return $this->format ?? $default;
=======
     * @param string $default The default format
     *
     * @return string The request format
     */
    public function getRequestFormat($default = 'html')
    {
        if (null === $this->format) {
            $this->format = $this->attributes->get('_format', $default);
        }

        return $this->format;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Sets the request format.
<<<<<<< HEAD
     */
    public function setRequestFormat(?string $format)
=======
     *
     * @param string $format The request format
     */
    public function setRequestFormat($format)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->format = $format;
    }

    /**
     * Gets the format associated with the request.
     *
<<<<<<< HEAD
     * @return string|null
     */
    public function getContentType()
    {
        return $this->getFormat($this->headers->get('CONTENT_TYPE', ''));
=======
     * @return string|null The format (null if no content type is present)
     */
    public function getContentType()
    {
        return $this->getFormat($this->headers->get('CONTENT_TYPE'));
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Sets the default locale.
<<<<<<< HEAD
     */
    public function setDefaultLocale(string $locale)
=======
     *
     * @param string $locale
     */
    public function setDefaultLocale($locale)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->defaultLocale = $locale;

        if (null === $this->locale) {
            $this->setPhpDefaultLocale($locale);
        }
    }

    /**
     * Get the default locale.
     *
     * @return string
     */
    public function getDefaultLocale()
    {
        return $this->defaultLocale;
    }

    /**
     * Sets the locale.
<<<<<<< HEAD
     */
    public function setLocale(string $locale)
=======
     *
     * @param string $locale
     */
    public function setLocale($locale)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->setPhpDefaultLocale($this->locale = $locale);
    }

    /**
     * Get the locale.
     *
     * @return string
     */
    public function getLocale()
    {
        return null === $this->locale ? $this->defaultLocale : $this->locale;
    }

    /**
     * Checks if the request method is of specified type.
     *
     * @param string $method Uppercase request method (GET, POST etc)
     *
     * @return bool
     */
<<<<<<< HEAD
    public function isMethod(string $method)
=======
    public function isMethod($method)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->getMethod() === strtoupper($method);
    }

    /**
<<<<<<< HEAD
     * Checks whether or not the method is safe.
     *
     * @see https://tools.ietf.org/html/rfc7231#section-4.2.1
=======
     * Checks whether the method is safe or not.
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     *
     * @return bool
     */
    public function isMethodSafe()
    {
<<<<<<< HEAD
        return \in_array($this->getMethod(), ['GET', 'HEAD', 'OPTIONS', 'TRACE']);
    }

    /**
     * Checks whether or not the method is idempotent.
     *
     * @return bool
     */
    public function isMethodIdempotent()
    {
        return \in_array($this->getMethod(), ['HEAD', 'GET', 'PUT', 'DELETE', 'TRACE', 'OPTIONS', 'PURGE']);
    }

    /**
     * Checks whether the method is cacheable or not.
     *
     * @see https://tools.ietf.org/html/rfc7231#section-4.2.3
     *
     * @return bool
     */
    public function isMethodCacheable()
    {
        return \in_array($this->getMethod(), ['GET', 'HEAD']);
    }

    /**
     * Returns the protocol version.
     *
     * If the application is behind a proxy, the protocol version used in the
     * requests between the client and the proxy and between the proxy and the
     * server might be different. This returns the former (from the "Via" header)
     * if the proxy is trusted (see "setTrustedProxies()"), otherwise it returns
     * the latter (from the "SERVER_PROTOCOL" server parameter).
     *
     * @return string|null
     */
    public function getProtocolVersion()
    {
        if ($this->isFromTrustedProxy()) {
            preg_match('~^(HTTP/)?([1-9]\.[0-9]) ~', $this->headers->get('Via') ?? '', $matches);

            if ($matches) {
                return 'HTTP/'.$matches[2];
            }
        }

        return $this->server->get('SERVER_PROTOCOL');
=======
        return in_array($this->getMethod(), array('GET', 'HEAD', 'OPTIONS', 'TRACE'));
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Returns the request body content.
     *
     * @param bool $asResource If true, a resource will be returned
     *
<<<<<<< HEAD
     * @return string|resource
     */
    public function getContent(bool $asResource = false)
    {
        $currentContentIsResource = \is_resource($this->content);
=======
     * @return string|resource The request body content or a resource to read the body stream
     *
     * @throws \LogicException
     */
    public function getContent($asResource = false)
    {
        $currentContentIsResource = is_resource($this->content);
        if (PHP_VERSION_ID < 50600 && false === $this->content) {
            throw new \LogicException('getContent() can only be called once when using the resource return type and PHP below 5.6.');
        }
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        if (true === $asResource) {
            if ($currentContentIsResource) {
                rewind($this->content);

                return $this->content;
            }

            // Content passed in parameter (test)
<<<<<<< HEAD
            if (\is_string($this->content)) {
=======
            if (is_string($this->content)) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                $resource = fopen('php://temp', 'r+');
                fwrite($resource, $this->content);
                rewind($resource);

                return $resource;
            }

            $this->content = false;

<<<<<<< HEAD
            return fopen('php://input', 'r');
=======
            return fopen('php://input', 'rb');
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        if ($currentContentIsResource) {
            rewind($this->content);

            return stream_get_contents($this->content);
        }

<<<<<<< HEAD
        if (null === $this->content || false === $this->content) {
=======
        if (null === $this->content) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $this->content = file_get_contents('php://input');
        }

        return $this->content;
    }

    /**
<<<<<<< HEAD
     * Gets the request body decoded as array, typically from a JSON payload.
     *
     * @throws JsonException When the body cannot be decoded to an array
     *
     * @return array
     */
    public function toArray()
    {
        if ('' === $content = $this->getContent()) {
            throw new JsonException('Request body is empty.');
        }

        try {
            $content = json_decode($content, true, 512, \JSON_BIGINT_AS_STRING | (\PHP_VERSION_ID >= 70300 ? \JSON_THROW_ON_ERROR : 0));
        } catch (\JsonException $e) {
            throw new JsonException('Could not decode request body.', $e->getCode(), $e);
        }

        if (\PHP_VERSION_ID < 70300 && \JSON_ERROR_NONE !== json_last_error()) {
            throw new JsonException('Could not decode request body: '.json_last_error_msg(), json_last_error());
        }

        if (!\is_array($content)) {
            throw new JsonException(sprintf('JSON content was expected to decode to an array, "%s" returned.', get_debug_type($content)));
        }

        return $content;
    }

    /**
     * Gets the Etags.
     *
     * @return array
     */
    public function getETags()
    {
        return preg_split('/\s*,\s*/', $this->headers->get('If-None-Match', ''), -1, \PREG_SPLIT_NO_EMPTY);
=======
     * Gets the Etags.
     *
     * @return array The entity tags
     */
    public function getETags()
    {
        return preg_split('/\s*,\s*/', $this->headers->get('if_none_match'), null, PREG_SPLIT_NO_EMPTY);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * @return bool
     */
    public function isNoCache()
    {
        return $this->headers->hasCacheControlDirective('no-cache') || 'no-cache' == $this->headers->get('Pragma');
    }

    /**
<<<<<<< HEAD
     * Gets the preferred format for the response by inspecting, in the following order:
     *   * the request format set using setRequestFormat;
     *   * the values of the Accept HTTP header.
     *
     * Note that if you use this method, you should send the "Vary: Accept" header
     * in the response to prevent any issues with intermediary HTTP caches.
     */
    public function getPreferredFormat(?string $default = 'html'): ?string
    {
        if (null !== $this->preferredFormat || null !== $this->preferredFormat = $this->getRequestFormat(null)) {
            return $this->preferredFormat;
        }

        foreach ($this->getAcceptableContentTypes() as $mimeType) {
            if ($this->preferredFormat = $this->getFormat($mimeType)) {
                return $this->preferredFormat;
            }
        }

        return $default;
    }

    /**
     * Returns the preferred language.
     *
     * @param string[] $locales An array of ordered available locales
     *
     * @return string|null
=======
     * Returns the preferred language.
     *
     * @param array $locales An array of ordered available locales
     *
     * @return string|null The preferred locale
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getPreferredLanguage(array $locales = null)
    {
        $preferredLanguages = $this->getLanguages();

        if (empty($locales)) {
<<<<<<< HEAD
            return $preferredLanguages[0] ?? null;
=======
            return isset($preferredLanguages[0]) ? $preferredLanguages[0] : null;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        if (!$preferredLanguages) {
            return $locales[0];
        }

<<<<<<< HEAD
        $extendedPreferredLanguages = [];
=======
        $extendedPreferredLanguages = array();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        foreach ($preferredLanguages as $language) {
            $extendedPreferredLanguages[] = $language;
            if (false !== $position = strpos($language, '_')) {
                $superLanguage = substr($language, 0, $position);
<<<<<<< HEAD
                if (!\in_array($superLanguage, $preferredLanguages)) {
=======
                if (!in_array($superLanguage, $preferredLanguages)) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    $extendedPreferredLanguages[] = $superLanguage;
                }
            }
        }

        $preferredLanguages = array_values(array_intersect($extendedPreferredLanguages, $locales));

<<<<<<< HEAD
        return $preferredLanguages[0] ?? $locales[0];
    }

    /**
     * Gets a list of languages acceptable by the client browser ordered in the user browser preferences.
     *
     * @return array
=======
        return isset($preferredLanguages[0]) ? $preferredLanguages[0] : $locales[0];
    }

    /**
     * Gets a list of languages acceptable by the client browser.
     *
     * @return array Languages ordered in the user browser preferences
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getLanguages()
    {
        if (null !== $this->languages) {
            return $this->languages;
        }

        $languages = AcceptHeader::fromString($this->headers->get('Accept-Language'))->all();
<<<<<<< HEAD
        $this->languages = [];
        foreach ($languages as $acceptHeaderItem) {
            $lang = $acceptHeaderItem->getValue();
            if (str_contains($lang, '-')) {
=======
        $this->languages = array();
        foreach ($languages as $lang => $acceptHeaderItem) {
            if (false !== strpos($lang, '-')) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                $codes = explode('-', $lang);
                if ('i' === $codes[0]) {
                    // Language not listed in ISO 639 that are not variants
                    // of any listed language, which can be registered with the
                    // i-prefix, such as i-cherokee
<<<<<<< HEAD
                    if (\count($codes) > 1) {
                        $lang = $codes[1];
                    }
                } else {
                    for ($i = 0, $max = \count($codes); $i < $max; ++$i) {
                        if (0 === $i) {
=======
                    if (count($codes) > 1) {
                        $lang = $codes[1];
                    }
                } else {
                    for ($i = 0, $max = count($codes); $i < $max; ++$i) {
                        if ($i === 0) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                            $lang = strtolower($codes[0]);
                        } else {
                            $lang .= '_'.strtoupper($codes[$i]);
                        }
                    }
                }
            }

            $this->languages[] = $lang;
        }

        return $this->languages;
    }

    /**
<<<<<<< HEAD
     * Gets a list of charsets acceptable by the client browser in preferable order.
     *
     * @return array
=======
     * Gets a list of charsets acceptable by the client browser.
     *
     * @return array List of charsets in preferable order
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getCharsets()
    {
        if (null !== $this->charsets) {
            return $this->charsets;
        }

<<<<<<< HEAD
        return $this->charsets = array_map('strval', array_keys(AcceptHeader::fromString($this->headers->get('Accept-Charset'))->all()));
    }

    /**
     * Gets a list of encodings acceptable by the client browser in preferable order.
     *
     * @return array
=======
        return $this->charsets = array_keys(AcceptHeader::fromString($this->headers->get('Accept-Charset'))->all());
    }

    /**
     * Gets a list of encodings acceptable by the client browser.
     *
     * @return array List of encodings in preferable order
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getEncodings()
    {
        if (null !== $this->encodings) {
            return $this->encodings;
        }

<<<<<<< HEAD
        return $this->encodings = array_map('strval', array_keys(AcceptHeader::fromString($this->headers->get('Accept-Encoding'))->all()));
    }

    /**
     * Gets a list of content types acceptable by the client browser in preferable order.
     *
     * @return array
=======
        return $this->encodings = array_keys(AcceptHeader::fromString($this->headers->get('Accept-Encoding'))->all());
    }

    /**
     * Gets a list of content types acceptable by the client browser.
     *
     * @return array List of content types in preferable order
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getAcceptableContentTypes()
    {
        if (null !== $this->acceptableContentTypes) {
            return $this->acceptableContentTypes;
        }

<<<<<<< HEAD
        return $this->acceptableContentTypes = array_map('strval', array_keys(AcceptHeader::fromString($this->headers->get('Accept'))->all()));
    }

    /**
     * Returns true if the request is an XMLHttpRequest.
=======
        return $this->acceptableContentTypes = array_keys(AcceptHeader::fromString($this->headers->get('Accept'))->all());
    }

    /**
     * Returns true if the request is a XMLHttpRequest.
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     *
     * It works if your JavaScript library sets an X-Requested-With HTTP header.
     * It is known to work with common JavaScript frameworks:
     *
<<<<<<< HEAD
     * @see https://wikipedia.org/wiki/List_of_Ajax_frameworks#JavaScript
     *
     * @return bool
=======
     * @link http://en.wikipedia.org/wiki/List_of_Ajax_frameworks#JavaScript
     *
     * @return bool true if the request is an XMLHttpRequest, false otherwise
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function isXmlHttpRequest()
    {
        return 'XMLHttpRequest' == $this->headers->get('X-Requested-With');
    }

<<<<<<< HEAD
    /**
     * Checks whether the client browser prefers safe content or not according to RFC8674.
     *
     * @see https://tools.ietf.org/html/rfc8674
     */
    public function preferSafeContent(): bool
    {
        if (null !== $this->isSafeContentPreferred) {
            return $this->isSafeContentPreferred;
        }

        if (!$this->isSecure()) {
            // see https://tools.ietf.org/html/rfc8674#section-3
            return $this->isSafeContentPreferred = false;
        }

        return $this->isSafeContentPreferred = AcceptHeader::fromString($this->headers->get('Prefer'))->has('safe');
    }

    /*
     * The following methods are derived from code of the Zend Framework (1.10dev - 2010-01-24)
     *
     * Code subject to the new BSD license (https://framework.zend.com/license).
     *
     * Copyright (c) 2005-2010 Zend Technologies USA Inc. (https://www.zend.com/)
=======
    /*
     * The following methods are derived from code of the Zend Framework (1.10dev - 2010-01-24)
     *
     * Code subject to the new BSD license (http://framework.zend.com/license/new-bsd).
     *
     * Copyright (c) 2005-2010 Zend Technologies USA Inc. (http://www.zend.com)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */

    protected function prepareRequestUri()
    {
        $requestUri = '';

<<<<<<< HEAD
        if ('1' == $this->server->get('IIS_WasUrlRewritten') && '' != $this->server->get('UNENCODED_URL')) {
=======
        if ($this->headers->has('X_ORIGINAL_URL')) {
            // IIS with Microsoft Rewrite Module
            $requestUri = $this->headers->get('X_ORIGINAL_URL');
            $this->headers->remove('X_ORIGINAL_URL');
            $this->server->remove('HTTP_X_ORIGINAL_URL');
            $this->server->remove('UNENCODED_URL');
            $this->server->remove('IIS_WasUrlRewritten');
        } elseif ($this->headers->has('X_REWRITE_URL')) {
            // IIS with ISAPI_Rewrite
            $requestUri = $this->headers->get('X_REWRITE_URL');
            $this->headers->remove('X_REWRITE_URL');
        } elseif ($this->server->get('IIS_WasUrlRewritten') == '1' && $this->server->get('UNENCODED_URL') != '') {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            // IIS7 with URL Rewrite: make sure we get the unencoded URL (double slash problem)
            $requestUri = $this->server->get('UNENCODED_URL');
            $this->server->remove('UNENCODED_URL');
            $this->server->remove('IIS_WasUrlRewritten');
        } elseif ($this->server->has('REQUEST_URI')) {
            $requestUri = $this->server->get('REQUEST_URI');
<<<<<<< HEAD

            if ('' !== $requestUri && '/' === $requestUri[0]) {
                // To only use path and query remove the fragment.
                if (false !== $pos = strpos($requestUri, '#')) {
                    $requestUri = substr($requestUri, 0, $pos);
                }
            } else {
                // HTTP proxy reqs setup request URI with scheme and host [and port] + the URL path,
                // only use URL path.
                $uriComponents = parse_url($requestUri);

                if (isset($uriComponents['path'])) {
                    $requestUri = $uriComponents['path'];
                }

                if (isset($uriComponents['query'])) {
                    $requestUri .= '?'.$uriComponents['query'];
                }
=======
            // HTTP proxy reqs setup request URI with scheme and host [and port] + the URL path, only use URL path
            $schemeAndHttpHost = $this->getSchemeAndHttpHost();
            if (strpos($requestUri, $schemeAndHttpHost) === 0) {
                $requestUri = substr($requestUri, strlen($schemeAndHttpHost));
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            }
        } elseif ($this->server->has('ORIG_PATH_INFO')) {
            // IIS 5.0, PHP as CGI
            $requestUri = $this->server->get('ORIG_PATH_INFO');
            if ('' != $this->server->get('QUERY_STRING')) {
                $requestUri .= '?'.$this->server->get('QUERY_STRING');
            }
            $this->server->remove('ORIG_PATH_INFO');
        }

        // normalize the request URI to ease creating sub-requests from this request
        $this->server->set('REQUEST_URI', $requestUri);

        return $requestUri;
    }

    /**
     * Prepares the base URL.
     *
     * @return string
     */
    protected function prepareBaseUrl()
    {
<<<<<<< HEAD
        $filename = basename($this->server->get('SCRIPT_FILENAME', ''));

        if (basename($this->server->get('SCRIPT_NAME', '')) === $filename) {
            $baseUrl = $this->server->get('SCRIPT_NAME');
        } elseif (basename($this->server->get('PHP_SELF', '')) === $filename) {
            $baseUrl = $this->server->get('PHP_SELF');
        } elseif (basename($this->server->get('ORIG_SCRIPT_NAME', '')) === $filename) {
=======
        $filename = basename($this->server->get('SCRIPT_FILENAME'));

        if (basename($this->server->get('SCRIPT_NAME')) === $filename) {
            $baseUrl = $this->server->get('SCRIPT_NAME');
        } elseif (basename($this->server->get('PHP_SELF')) === $filename) {
            $baseUrl = $this->server->get('PHP_SELF');
        } elseif (basename($this->server->get('ORIG_SCRIPT_NAME')) === $filename) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $baseUrl = $this->server->get('ORIG_SCRIPT_NAME'); // 1and1 shared hosting compatibility
        } else {
            // Backtrack up the script_filename to find the portion matching
            // php_self
            $path = $this->server->get('PHP_SELF', '');
            $file = $this->server->get('SCRIPT_FILENAME', '');
            $segs = explode('/', trim($file, '/'));
            $segs = array_reverse($segs);
            $index = 0;
<<<<<<< HEAD
            $last = \count($segs);
=======
            $last = count($segs);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $baseUrl = '';
            do {
                $seg = $segs[$index];
                $baseUrl = '/'.$seg.$baseUrl;
                ++$index;
            } while ($last > $index && (false !== $pos = strpos($path, $baseUrl)) && 0 != $pos);
        }

        // Does the baseUrl have anything in common with the request_uri?
        $requestUri = $this->getRequestUri();
<<<<<<< HEAD
        if ('' !== $requestUri && '/' !== $requestUri[0]) {
            $requestUri = '/'.$requestUri;
        }

        if ($baseUrl && null !== $prefix = $this->getUrlencodedPrefix($requestUri, $baseUrl)) {
=======

        if ($baseUrl && false !== $prefix = $this->getUrlencodedPrefix($requestUri, $baseUrl)) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            // full $baseUrl matches
            return $prefix;
        }

<<<<<<< HEAD
        if ($baseUrl && null !== $prefix = $this->getUrlencodedPrefix($requestUri, rtrim(\dirname($baseUrl), '/'.\DIRECTORY_SEPARATOR).'/')) {
            // directory portion of $baseUrl matches
            return rtrim($prefix, '/'.\DIRECTORY_SEPARATOR);
=======
        if ($baseUrl && false !== $prefix = $this->getUrlencodedPrefix($requestUri, rtrim(dirname($baseUrl), '/'.DIRECTORY_SEPARATOR).'/')) {
            // directory portion of $baseUrl matches
            return rtrim($prefix, '/'.DIRECTORY_SEPARATOR);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        $truncatedRequestUri = $requestUri;
        if (false !== $pos = strpos($requestUri, '?')) {
            $truncatedRequestUri = substr($requestUri, 0, $pos);
        }

<<<<<<< HEAD
        $basename = basename($baseUrl ?? '');
=======
        $basename = basename($baseUrl);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        if (empty($basename) || !strpos(rawurldecode($truncatedRequestUri), $basename)) {
            // no match whatsoever; set it blank
            return '';
        }

        // If using mod_rewrite or ISAPI_Rewrite strip the script filename
        // out of baseUrl. $pos !== 0 makes sure it is not matching a value
        // from PATH_INFO or QUERY_STRING
<<<<<<< HEAD
        if (\strlen($requestUri) >= \strlen($baseUrl) && (false !== $pos = strpos($requestUri, $baseUrl)) && 0 !== $pos) {
            $baseUrl = substr($requestUri, 0, $pos + \strlen($baseUrl));
        }

        return rtrim($baseUrl, '/'.\DIRECTORY_SEPARATOR);
=======
        if (strlen($requestUri) >= strlen($baseUrl) && (false !== $pos = strpos($requestUri, $baseUrl)) && $pos !== 0) {
            $baseUrl = substr($requestUri, 0, $pos + strlen($baseUrl));
        }

        return rtrim($baseUrl, '/'.DIRECTORY_SEPARATOR);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Prepares the base path.
     *
<<<<<<< HEAD
     * @return string
     */
    protected function prepareBasePath()
    {
=======
     * @return string base path
     */
    protected function prepareBasePath()
    {
        $filename = basename($this->server->get('SCRIPT_FILENAME'));
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $baseUrl = $this->getBaseUrl();
        if (empty($baseUrl)) {
            return '';
        }

<<<<<<< HEAD
        $filename = basename($this->server->get('SCRIPT_FILENAME'));
        if (basename($baseUrl) === $filename) {
            $basePath = \dirname($baseUrl);
=======
        if (basename($baseUrl) === $filename) {
            $basePath = dirname($baseUrl);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        } else {
            $basePath = $baseUrl;
        }

<<<<<<< HEAD
        if ('\\' === \DIRECTORY_SEPARATOR) {
=======
        if ('\\' === DIRECTORY_SEPARATOR) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $basePath = str_replace('\\', '/', $basePath);
        }

        return rtrim($basePath, '/');
    }

    /**
     * Prepares the path info.
     *
<<<<<<< HEAD
     * @return string
     */
    protected function preparePathInfo()
    {
=======
     * @return string path info
     */
    protected function preparePathInfo()
    {
        $baseUrl = $this->getBaseUrl();

>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        if (null === ($requestUri = $this->getRequestUri())) {
            return '/';
        }

        // Remove the query string from REQUEST_URI
<<<<<<< HEAD
        if (false !== $pos = strpos($requestUri, '?')) {
            $requestUri = substr($requestUri, 0, $pos);
        }
        if ('' !== $requestUri && '/' !== $requestUri[0]) {
            $requestUri = '/'.$requestUri;
        }

        if (null === ($baseUrl = $this->getBaseUrlReal())) {
            return $requestUri;
        }

        $pathInfo = substr($requestUri, \strlen($baseUrl));
        if (false === $pathInfo || '' === $pathInfo) {
            // If substr() returns false then PATH_INFO is set to an empty string
            return '/';
        }

        return $pathInfo;
=======
        if ($pos = strpos($requestUri, '?')) {
            $requestUri = substr($requestUri, 0, $pos);
        }

        $pathInfo = substr($requestUri, strlen($baseUrl));
        if (null !== $baseUrl && (false === $pathInfo || '' === $pathInfo)) {
            // If substr() returns false then PATH_INFO is set to an empty string
            return '/';
        } elseif (null === $baseUrl) {
            return $requestUri;
        }

        return (string) $pathInfo;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Initializes HTTP request formats.
     */
    protected static function initializeFormats()
    {
<<<<<<< HEAD
        static::$formats = [
            'html' => ['text/html', 'application/xhtml+xml'],
            'txt' => ['text/plain'],
            'js' => ['application/javascript', 'application/x-javascript', 'text/javascript'],
            'css' => ['text/css'],
            'json' => ['application/json', 'application/x-json'],
            'jsonld' => ['application/ld+json'],
            'xml' => ['text/xml', 'application/xml', 'application/x-xml'],
            'rdf' => ['application/rdf+xml'],
            'atom' => ['application/atom+xml'],
            'rss' => ['application/rss+xml'],
            'form' => ['application/x-www-form-urlencoded', 'multipart/form-data'],
        ];
    }

    private function setPhpDefaultLocale(string $locale): void
=======
        static::$formats = array(
            'html' => array('text/html', 'application/xhtml+xml'),
            'txt' => array('text/plain'),
            'js' => array('application/javascript', 'application/x-javascript', 'text/javascript'),
            'css' => array('text/css'),
            'json' => array('application/json', 'application/x-json'),
            'xml' => array('text/xml', 'application/xml', 'application/x-xml'),
            'rdf' => array('application/rdf+xml'),
            'atom' => array('application/atom+xml'),
            'rss' => array('application/rss+xml'),
            'form' => array('application/x-www-form-urlencoded'),
        );
    }

    /**
     * Sets the default PHP locale.
     *
     * @param string $locale
     */
    private function setPhpDefaultLocale($locale)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        // if either the class Locale doesn't exist, or an exception is thrown when
        // setting the default locale, the intl module is not installed, and
        // the call can be ignored:
        try {
<<<<<<< HEAD
            if (class_exists(\Locale::class, false)) {
=======
            if (class_exists('Locale', false)) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                \Locale::setDefault($locale);
            }
        } catch (\Exception $e) {
        }
    }

<<<<<<< HEAD
    /**
     * Returns the prefix as encoded in the string when the string starts with
     * the given prefix, null otherwise.
     */
    private function getUrlencodedPrefix(string $string, string $prefix): ?string
    {
        if (!str_starts_with(rawurldecode($string), $prefix)) {
            return null;
        }

        $len = \strlen($prefix);
=======
    /*
     * Returns the prefix as encoded in the string when the string starts with
     * the given prefix, false otherwise.
     *
     * @param string $string The urlencoded string
     * @param string $prefix The prefix not encoded
     *
     * @return string|false The prefix as it is encoded in $string, or false
     */
    private function getUrlencodedPrefix($string, $prefix)
    {
        if (0 !== strpos(rawurldecode($string), $prefix)) {
            return false;
        }

        $len = strlen($prefix);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        if (preg_match(sprintf('#^(%%[[:xdigit:]]{2}|.){%d}#', $len), $string, $match)) {
            return $match[0];
        }

<<<<<<< HEAD
        return null;
    }

    private static function createRequestFromFactory(array $query = [], array $request = [], array $attributes = [], array $cookies = [], array $files = [], array $server = [], $content = null): self
    {
        if (self::$requestFactory) {
            $request = (self::$requestFactory)($query, $request, $attributes, $cookies, $files, $server, $content);
=======
        return false;
    }

    private static function createRequestFromFactory(array $query = array(), array $request = array(), array $attributes = array(), array $cookies = array(), array $files = array(), array $server = array(), $content = null)
    {
        if (self::$requestFactory) {
            $request = call_user_func(self::$requestFactory, $query, $request, $attributes, $cookies, $files, $server, $content);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

            if (!$request instanceof self) {
                throw new \LogicException('The Request factory must return an instance of Symfony\Component\HttpFoundation\Request.');
            }

            return $request;
        }

        return new static($query, $request, $attributes, $cookies, $files, $server, $content);
    }

<<<<<<< HEAD
    /**
     * Indicates whether this request originated from a trusted proxy.
     *
     * This can be useful to determine whether or not to trust the
     * contents of a proxy-specific header.
     *
     * @return bool
     */
    public function isFromTrustedProxy()
    {
        return self::$trustedProxies && IpUtils::checkIp($this->server->get('REMOTE_ADDR', ''), self::$trustedProxies);
    }

    private function getTrustedValues(int $type, string $ip = null): array
    {
        $clientValues = [];
        $forwardedValues = [];

        if ((self::$trustedHeaderSet & $type) && $this->headers->has(self::TRUSTED_HEADERS[$type])) {
            foreach (explode(',', $this->headers->get(self::TRUSTED_HEADERS[$type])) as $v) {
                $clientValues[] = (self::HEADER_X_FORWARDED_PORT === $type ? '0.0.0.0:' : '').trim($v);
            }
        }

        if ((self::$trustedHeaderSet & self::HEADER_FORWARDED) && (isset(self::FORWARDED_PARAMS[$type])) && $this->headers->has(self::TRUSTED_HEADERS[self::HEADER_FORWARDED])) {
            $forwarded = $this->headers->get(self::TRUSTED_HEADERS[self::HEADER_FORWARDED]);
            $parts = HeaderUtils::split($forwarded, ',;=');
            $forwardedValues = [];
            $param = self::FORWARDED_PARAMS[$type];
            foreach ($parts as $subParts) {
                if (null === $v = HeaderUtils::combine($subParts)[$param] ?? null) {
                    continue;
                }
                if (self::HEADER_X_FORWARDED_PORT === $type) {
                    if (str_ends_with($v, ']') || false === $v = strrchr($v, ':')) {
                        $v = $this->isSecure() ? ':443' : ':80';
                    }
                    $v = '0.0.0.0'.$v;
                }
                $forwardedValues[] = $v;
            }
        }

        if (null !== $ip) {
            $clientValues = $this->normalizeAndFilterClientIps($clientValues, $ip);
            $forwardedValues = $this->normalizeAndFilterClientIps($forwardedValues, $ip);
        }

        if ($forwardedValues === $clientValues || !$clientValues) {
            return $forwardedValues;
        }

        if (!$forwardedValues) {
            return $clientValues;
        }

        if (!$this->isForwardedValid) {
            return null !== $ip ? ['0.0.0.0', $ip] : [];
        }
        $this->isForwardedValid = false;

        throw new ConflictingHeadersException(sprintf('The request has both a trusted "%s" header and a trusted "%s" header, conflicting with each other. You should either configure your proxy to remove one of them, or configure your project to distrust the offending one.', self::TRUSTED_HEADERS[self::HEADER_FORWARDED], self::TRUSTED_HEADERS[$type]));
    }

    private function normalizeAndFilterClientIps(array $clientIps, string $ip): array
    {
        if (!$clientIps) {
            return [];
        }
=======
    private function isFromTrustedProxy()
    {
        return self::$trustedProxies && IpUtils::checkIp($this->server->get('REMOTE_ADDR'), self::$trustedProxies);
    }

    private function normalizeAndFilterClientIps(array $clientIps, $ip)
    {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $clientIps[] = $ip; // Complete the IP chain with the IP the request actually came from
        $firstTrustedIp = null;

        foreach ($clientIps as $key => $clientIp) {
<<<<<<< HEAD
            if (strpos($clientIp, '.')) {
                // Strip :port from IPv4 addresses. This is allowed in Forwarded
                // and may occur in X-Forwarded-For.
                $i = strpos($clientIp, ':');
                if ($i) {
                    $clientIps[$key] = $clientIp = substr($clientIp, 0, $i);
                }
            } elseif (str_starts_with($clientIp, '[')) {
                // Strip brackets and :port from IPv6 addresses.
                $i = strpos($clientIp, ']', 1);
                $clientIps[$key] = $clientIp = substr($clientIp, 1, $i - 1);
            }

            if (!filter_var($clientIp, \FILTER_VALIDATE_IP)) {
=======
            // Remove port (unfortunately, it does happen)
            if (preg_match('{((?:\d+\.){3}\d+)\:\d+}', $clientIp, $match)) {
                $clientIps[$key] = $clientIp = $match[1];
            }

            if (!filter_var($clientIp, FILTER_VALIDATE_IP)) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                unset($clientIps[$key]);

                continue;
            }

            if (IpUtils::checkIp($clientIp, self::$trustedProxies)) {
                unset($clientIps[$key]);

                // Fallback to this when the client IP falls into the range of trusted proxies
                if (null === $firstTrustedIp) {
                    $firstTrustedIp = $clientIp;
                }
            }
        }

        // Now the IP chain contains only untrusted proxies and the client IP
<<<<<<< HEAD
        return $clientIps ? array_reverse($clientIps) : [$firstTrustedIp];
=======
        return $clientIps ? array_reverse($clientIps) : array($firstTrustedIp);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }
}
