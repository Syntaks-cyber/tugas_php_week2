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

<<<<<<< HEAD
// Help opcache.preload discover always-needed symbols
class_exists(ResponseHeaderBag::class);

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
/**
 * Response represents an HTTP response.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class Response
{
<<<<<<< HEAD
    public const HTTP_CONTINUE = 100;
    public const HTTP_SWITCHING_PROTOCOLS = 101;
    public const HTTP_PROCESSING = 102;            // RFC2518
    public const HTTP_EARLY_HINTS = 103;           // RFC8297
    public const HTTP_OK = 200;
    public const HTTP_CREATED = 201;
    public const HTTP_ACCEPTED = 202;
    public const HTTP_NON_AUTHORITATIVE_INFORMATION = 203;
    public const HTTP_NO_CONTENT = 204;
    public const HTTP_RESET_CONTENT = 205;
    public const HTTP_PARTIAL_CONTENT = 206;
    public const HTTP_MULTI_STATUS = 207;          // RFC4918
    public const HTTP_ALREADY_REPORTED = 208;      // RFC5842
    public const HTTP_IM_USED = 226;               // RFC3229
    public const HTTP_MULTIPLE_CHOICES = 300;
    public const HTTP_MOVED_PERMANENTLY = 301;
    public const HTTP_FOUND = 302;
    public const HTTP_SEE_OTHER = 303;
    public const HTTP_NOT_MODIFIED = 304;
    public const HTTP_USE_PROXY = 305;
    public const HTTP_RESERVED = 306;
    public const HTTP_TEMPORARY_REDIRECT = 307;
    public const HTTP_PERMANENTLY_REDIRECT = 308;  // RFC7238
    public const HTTP_BAD_REQUEST = 400;
    public const HTTP_UNAUTHORIZED = 401;
    public const HTTP_PAYMENT_REQUIRED = 402;
    public const HTTP_FORBIDDEN = 403;
    public const HTTP_NOT_FOUND = 404;
    public const HTTP_METHOD_NOT_ALLOWED = 405;
    public const HTTP_NOT_ACCEPTABLE = 406;
    public const HTTP_PROXY_AUTHENTICATION_REQUIRED = 407;
    public const HTTP_REQUEST_TIMEOUT = 408;
    public const HTTP_CONFLICT = 409;
    public const HTTP_GONE = 410;
    public const HTTP_LENGTH_REQUIRED = 411;
    public const HTTP_PRECONDITION_FAILED = 412;
    public const HTTP_REQUEST_ENTITY_TOO_LARGE = 413;
    public const HTTP_REQUEST_URI_TOO_LONG = 414;
    public const HTTP_UNSUPPORTED_MEDIA_TYPE = 415;
    public const HTTP_REQUESTED_RANGE_NOT_SATISFIABLE = 416;
    public const HTTP_EXPECTATION_FAILED = 417;
    public const HTTP_I_AM_A_TEAPOT = 418;                                               // RFC2324
    public const HTTP_MISDIRECTED_REQUEST = 421;                                         // RFC7540
    public const HTTP_UNPROCESSABLE_ENTITY = 422;                                        // RFC4918
    public const HTTP_LOCKED = 423;                                                      // RFC4918
    public const HTTP_FAILED_DEPENDENCY = 424;                                           // RFC4918
    public const HTTP_TOO_EARLY = 425;                                                   // RFC-ietf-httpbis-replay-04
    public const HTTP_UPGRADE_REQUIRED = 426;                                            // RFC2817
    public const HTTP_PRECONDITION_REQUIRED = 428;                                       // RFC6585
    public const HTTP_TOO_MANY_REQUESTS = 429;                                           // RFC6585
    public const HTTP_REQUEST_HEADER_FIELDS_TOO_LARGE = 431;                             // RFC6585
    public const HTTP_UNAVAILABLE_FOR_LEGAL_REASONS = 451;                               // RFC7725
    public const HTTP_INTERNAL_SERVER_ERROR = 500;
    public const HTTP_NOT_IMPLEMENTED = 501;
    public const HTTP_BAD_GATEWAY = 502;
    public const HTTP_SERVICE_UNAVAILABLE = 503;
    public const HTTP_GATEWAY_TIMEOUT = 504;
    public const HTTP_VERSION_NOT_SUPPORTED = 505;
    public const HTTP_VARIANT_ALSO_NEGOTIATES_EXPERIMENTAL = 506;                        // RFC2295
    public const HTTP_INSUFFICIENT_STORAGE = 507;                                        // RFC4918
    public const HTTP_LOOP_DETECTED = 508;                                               // RFC5842
    public const HTTP_NOT_EXTENDED = 510;                                                // RFC2774
    public const HTTP_NETWORK_AUTHENTICATION_REQUIRED = 511;                             // RFC6585

    /**
     * @see https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Cache-Control
     */
    private const HTTP_RESPONSE_CACHE_CONTROL_DIRECTIVES = [
        'must_revalidate' => false,
        'no_cache' => false,
        'no_store' => false,
        'no_transform' => false,
        'public' => false,
        'private' => false,
        'proxy_revalidate' => false,
        'max_age' => true,
        's_maxage' => true,
        'immutable' => false,
        'last_modified' => true,
        'etag' => true,
    ];

    /**
     * @var ResponseHeaderBag
=======
    const HTTP_CONTINUE = 100;
    const HTTP_SWITCHING_PROTOCOLS = 101;
    const HTTP_PROCESSING = 102;            // RFC2518
    const HTTP_OK = 200;
    const HTTP_CREATED = 201;
    const HTTP_ACCEPTED = 202;
    const HTTP_NON_AUTHORITATIVE_INFORMATION = 203;
    const HTTP_NO_CONTENT = 204;
    const HTTP_RESET_CONTENT = 205;
    const HTTP_PARTIAL_CONTENT = 206;
    const HTTP_MULTI_STATUS = 207;          // RFC4918
    const HTTP_ALREADY_REPORTED = 208;      // RFC5842
    const HTTP_IM_USED = 226;               // RFC3229
    const HTTP_MULTIPLE_CHOICES = 300;
    const HTTP_MOVED_PERMANENTLY = 301;
    const HTTP_FOUND = 302;
    const HTTP_SEE_OTHER = 303;
    const HTTP_NOT_MODIFIED = 304;
    const HTTP_USE_PROXY = 305;
    const HTTP_RESERVED = 306;
    const HTTP_TEMPORARY_REDIRECT = 307;
    const HTTP_PERMANENTLY_REDIRECT = 308;  // RFC7238
    const HTTP_BAD_REQUEST = 400;
    const HTTP_UNAUTHORIZED = 401;
    const HTTP_PAYMENT_REQUIRED = 402;
    const HTTP_FORBIDDEN = 403;
    const HTTP_NOT_FOUND = 404;
    const HTTP_METHOD_NOT_ALLOWED = 405;
    const HTTP_NOT_ACCEPTABLE = 406;
    const HTTP_PROXY_AUTHENTICATION_REQUIRED = 407;
    const HTTP_REQUEST_TIMEOUT = 408;
    const HTTP_CONFLICT = 409;
    const HTTP_GONE = 410;
    const HTTP_LENGTH_REQUIRED = 411;
    const HTTP_PRECONDITION_FAILED = 412;
    const HTTP_REQUEST_ENTITY_TOO_LARGE = 413;
    const HTTP_REQUEST_URI_TOO_LONG = 414;
    const HTTP_UNSUPPORTED_MEDIA_TYPE = 415;
    const HTTP_REQUESTED_RANGE_NOT_SATISFIABLE = 416;
    const HTTP_EXPECTATION_FAILED = 417;
    const HTTP_I_AM_A_TEAPOT = 418;                                               // RFC2324
    const HTTP_MISDIRECTED_REQUEST = 421;                                         // RFC7540
    const HTTP_UNPROCESSABLE_ENTITY = 422;                                        // RFC4918
    const HTTP_LOCKED = 423;                                                      // RFC4918
    const HTTP_FAILED_DEPENDENCY = 424;                                           // RFC4918
    const HTTP_RESERVED_FOR_WEBDAV_ADVANCED_COLLECTIONS_EXPIRED_PROPOSAL = 425;   // RFC2817
    const HTTP_UPGRADE_REQUIRED = 426;                                            // RFC2817
    const HTTP_PRECONDITION_REQUIRED = 428;                                       // RFC6585
    const HTTP_TOO_MANY_REQUESTS = 429;                                           // RFC6585
    const HTTP_REQUEST_HEADER_FIELDS_TOO_LARGE = 431;                             // RFC6585
    const HTTP_UNAVAILABLE_FOR_LEGAL_REASONS = 451;
    const HTTP_INTERNAL_SERVER_ERROR = 500;
    const HTTP_NOT_IMPLEMENTED = 501;
    const HTTP_BAD_GATEWAY = 502;
    const HTTP_SERVICE_UNAVAILABLE = 503;
    const HTTP_GATEWAY_TIMEOUT = 504;
    const HTTP_VERSION_NOT_SUPPORTED = 505;
    const HTTP_VARIANT_ALSO_NEGOTIATES_EXPERIMENTAL = 506;                        // RFC2295
    const HTTP_INSUFFICIENT_STORAGE = 507;                                        // RFC4918
    const HTTP_LOOP_DETECTED = 508;                                               // RFC5842
    const HTTP_NOT_EXTENDED = 510;                                                // RFC2774
    const HTTP_NETWORK_AUTHENTICATION_REQUIRED = 511;                             // RFC6585

    /**
     * @var \Symfony\Component\HttpFoundation\ResponseHeaderBag
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public $headers;

    /**
     * @var string
     */
    protected $content;

    /**
     * @var string
     */
    protected $version;

    /**
     * @var int
     */
    protected $statusCode;

    /**
     * @var string
     */
    protected $statusText;

    /**
     * @var string
     */
    protected $charset;

    /**
     * Status codes translation table.
     *
     * The list of codes is complete according to the
<<<<<<< HEAD
     * {@link https://www.iana.org/assignments/http-status-codes/http-status-codes.xhtml Hypertext Transfer Protocol (HTTP) Status Code Registry}
     * (last updated 2021-10-01).
=======
     * {@link http://www.iana.org/assignments/http-status-codes/ Hypertext Transfer Protocol (HTTP) Status Code Registry}
     * (last updated 2016-03-01).
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     *
     * Unless otherwise noted, the status code is defined in RFC2616.
     *
     * @var array
     */
<<<<<<< HEAD
    public static $statusTexts = [
        100 => 'Continue',
        101 => 'Switching Protocols',
        102 => 'Processing',            // RFC2518
        103 => 'Early Hints',
=======
    public static $statusTexts = array(
        100 => 'Continue',
        101 => 'Switching Protocols',
        102 => 'Processing',            // RFC2518
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        200 => 'OK',
        201 => 'Created',
        202 => 'Accepted',
        203 => 'Non-Authoritative Information',
        204 => 'No Content',
        205 => 'Reset Content',
        206 => 'Partial Content',
        207 => 'Multi-Status',          // RFC4918
        208 => 'Already Reported',      // RFC5842
        226 => 'IM Used',               // RFC3229
        300 => 'Multiple Choices',
        301 => 'Moved Permanently',
        302 => 'Found',
        303 => 'See Other',
        304 => 'Not Modified',
        305 => 'Use Proxy',
        307 => 'Temporary Redirect',
        308 => 'Permanent Redirect',    // RFC7238
        400 => 'Bad Request',
        401 => 'Unauthorized',
        402 => 'Payment Required',
        403 => 'Forbidden',
        404 => 'Not Found',
        405 => 'Method Not Allowed',
        406 => 'Not Acceptable',
        407 => 'Proxy Authentication Required',
        408 => 'Request Timeout',
        409 => 'Conflict',
        410 => 'Gone',
        411 => 'Length Required',
        412 => 'Precondition Failed',
<<<<<<< HEAD
        413 => 'Content Too Large',                                           // RFC-ietf-httpbis-semantics
=======
        413 => 'Payload Too Large',
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        414 => 'URI Too Long',
        415 => 'Unsupported Media Type',
        416 => 'Range Not Satisfiable',
        417 => 'Expectation Failed',
        418 => 'I\'m a teapot',                                               // RFC2324
        421 => 'Misdirected Request',                                         // RFC7540
<<<<<<< HEAD
        422 => 'Unprocessable Content',                                       // RFC-ietf-httpbis-semantics
        423 => 'Locked',                                                      // RFC4918
        424 => 'Failed Dependency',                                           // RFC4918
        425 => 'Too Early',                                                   // RFC-ietf-httpbis-replay-04
=======
        422 => 'Unprocessable Entity',                                        // RFC4918
        423 => 'Locked',                                                      // RFC4918
        424 => 'Failed Dependency',                                           // RFC4918
        425 => 'Reserved for WebDAV advanced collections expired proposal',   // RFC2817
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        426 => 'Upgrade Required',                                            // RFC2817
        428 => 'Precondition Required',                                       // RFC6585
        429 => 'Too Many Requests',                                           // RFC6585
        431 => 'Request Header Fields Too Large',                             // RFC6585
        451 => 'Unavailable For Legal Reasons',                               // RFC7725
        500 => 'Internal Server Error',
        501 => 'Not Implemented',
        502 => 'Bad Gateway',
        503 => 'Service Unavailable',
        504 => 'Gateway Timeout',
        505 => 'HTTP Version Not Supported',
<<<<<<< HEAD
        506 => 'Variant Also Negotiates',                                     // RFC2295
=======
        506 => 'Variant Also Negotiates (Experimental)',                      // RFC2295
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        507 => 'Insufficient Storage',                                        // RFC4918
        508 => 'Loop Detected',                                               // RFC5842
        510 => 'Not Extended',                                                // RFC2774
        511 => 'Network Authentication Required',                             // RFC6585
<<<<<<< HEAD
    ];

    /**
     * @throws \InvalidArgumentException When the HTTP status code is not valid
     */
    public function __construct(?string $content = '', int $status = 200, array $headers = [])
=======
    );

    /**
     * Constructor.
     *
     * @param mixed $content The response content, see setContent()
     * @param int   $status  The response status code
     * @param array $headers An array of response headers
     *
     * @throws \InvalidArgumentException When the HTTP status code is not valid
     */
    public function __construct($content = '', $status = 200, $headers = array())
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->headers = new ResponseHeaderBag($headers);
        $this->setContent($content);
        $this->setStatusCode($status);
        $this->setProtocolVersion('1.0');
    }

    /**
     * Factory method for chainability.
     *
     * Example:
     *
     *     return Response::create($body, 200)
     *         ->setSharedMaxAge(300);
     *
<<<<<<< HEAD
     * @return static
     *
     * @deprecated since Symfony 5.1, use __construct() instead.
     */
    public static function create(?string $content = '', int $status = 200, array $headers = [])
    {
        trigger_deprecation('symfony/http-foundation', '5.1', 'The "%s()" method is deprecated, use "new %s()" instead.', __METHOD__, static::class);

=======
     * @param mixed $content The response content, see setContent()
     * @param int   $status  The response status code
     * @param array $headers An array of response headers
     *
     * @return Response
     */
    public static function create($content = '', $status = 200, $headers = array())
    {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        return new static($content, $status, $headers);
    }

    /**
     * Returns the Response as an HTTP string.
     *
     * The string representation of the Response is the same as the
     * one that will be sent to the client only if the prepare() method
     * has been called before.
     *
<<<<<<< HEAD
     * @return string
=======
     * @return string The Response as an HTTP string
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     *
     * @see prepare()
     */
    public function __toString()
    {
        return
            sprintf('HTTP/%s %s %s', $this->version, $this->statusCode, $this->statusText)."\r\n".
            $this->headers."\r\n".
            $this->getContent();
    }

    /**
     * Clones the current Response instance.
     */
    public function __clone()
    {
        $this->headers = clone $this->headers;
    }

    /**
     * Prepares the Response before it is sent to the client.
     *
     * This method tweaks the Response to ensure that it is
     * compliant with RFC 2616. Most of the changes are based on
     * the Request that is "associated" with this Response.
     *
<<<<<<< HEAD
     * @return $this
=======
     * @param Request $request A Request instance
     *
     * @return Response The current response
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function prepare(Request $request)
    {
        $headers = $this->headers;

        if ($this->isInformational() || $this->isEmpty()) {
            $this->setContent(null);
            $headers->remove('Content-Type');
            $headers->remove('Content-Length');
<<<<<<< HEAD
            // prevent PHP from sending the Content-Type header based on default_mimetype
            ini_set('default_mimetype', '');
        } else {
            // Content-type based on the Request
            if (!$headers->has('Content-Type')) {
                $format = $request->getRequestFormat(null);
=======
        } else {
            // Content-type based on the Request
            if (!$headers->has('Content-Type')) {
                $format = $request->getRequestFormat();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                if (null !== $format && $mimeType = $request->getMimeType($format)) {
                    $headers->set('Content-Type', $mimeType);
                }
            }

            // Fix Content-Type
            $charset = $this->charset ?: 'UTF-8';
            if (!$headers->has('Content-Type')) {
                $headers->set('Content-Type', 'text/html; charset='.$charset);
            } elseif (0 === stripos($headers->get('Content-Type'), 'text/') && false === stripos($headers->get('Content-Type'), 'charset')) {
                // add the charset
                $headers->set('Content-Type', $headers->get('Content-Type').'; charset='.$charset);
            }

            // Fix Content-Length
            if ($headers->has('Transfer-Encoding')) {
                $headers->remove('Content-Length');
            }

            if ($request->isMethod('HEAD')) {
                // cf. RFC2616 14.13
                $length = $headers->get('Content-Length');
                $this->setContent(null);
                if ($length) {
                    $headers->set('Content-Length', $length);
                }
            }
        }

        // Fix protocol
        if ('HTTP/1.0' != $request->server->get('SERVER_PROTOCOL')) {
            $this->setProtocolVersion('1.1');
        }

        // Check if we need to send extra expire info headers
<<<<<<< HEAD
        if ('1.0' == $this->getProtocolVersion() && str_contains($headers->get('Cache-Control', ''), 'no-cache')) {
            $headers->set('pragma', 'no-cache');
            $headers->set('expires', -1);
=======
        if ('1.0' == $this->getProtocolVersion() && 'no-cache' == $this->headers->get('Cache-Control')) {
            $this->headers->set('pragma', 'no-cache');
            $this->headers->set('expires', -1);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        $this->ensureIEOverSSLCompatibility($request);

<<<<<<< HEAD
        if ($request->isSecure()) {
            foreach ($headers->getCookies() as $cookie) {
                $cookie->setSecureDefault(true);
            }
        }

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        return $this;
    }

    /**
     * Sends HTTP headers.
     *
<<<<<<< HEAD
     * @return $this
=======
     * @return Response
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function sendHeaders()
    {
        // headers have already been sent by the developer
        if (headers_sent()) {
            return $this;
        }

<<<<<<< HEAD
        // headers
        foreach ($this->headers->allPreserveCaseWithoutCookies() as $name => $values) {
            $replace = 0 === strcasecmp($name, 'Content-Type');
            foreach ($values as $value) {
                header($name.': '.$value, $replace, $this->statusCode);
            }
        }

        // cookies
        foreach ($this->headers->getCookies() as $cookie) {
            header('Set-Cookie: '.$cookie, false, $this->statusCode);
=======
        if (!$this->headers->has('Date')) {
            $this->setDate(\DateTime::createFromFormat('U', time()));
        }

        // headers
        foreach ($this->headers->allPreserveCase() as $name => $values) {
            foreach ($values as $value) {
                header($name.': '.$value, false, $this->statusCode);
            }
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        // status
        header(sprintf('HTTP/%s %s %s', $this->version, $this->statusCode, $this->statusText), true, $this->statusCode);

<<<<<<< HEAD
=======
        // cookies
        foreach ($this->headers->getCookies() as $cookie) {
            setcookie($cookie->getName(), $cookie->getValue(), $cookie->getExpiresTime(), $cookie->getPath(), $cookie->getDomain(), $cookie->isSecure(), $cookie->isHttpOnly());
        }

>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        return $this;
    }

    /**
     * Sends content for the current web response.
     *
<<<<<<< HEAD
     * @return $this
=======
     * @return Response
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function sendContent()
    {
        echo $this->content;

        return $this;
    }

    /**
     * Sends HTTP headers and content.
     *
<<<<<<< HEAD
     * @return $this
=======
     * @return Response
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function send()
    {
        $this->sendHeaders();
        $this->sendContent();

<<<<<<< HEAD
        if (\function_exists('fastcgi_finish_request')) {
            fastcgi_finish_request();
        } elseif (\function_exists('litespeed_finish_request')) {
            litespeed_finish_request();
        } elseif (!\in_array(\PHP_SAPI, ['cli', 'phpdbg'], true)) {
            static::closeOutputBuffers(0, true);
            flush();
=======
        if (function_exists('fastcgi_finish_request')) {
            fastcgi_finish_request();
        } elseif ('cli' !== PHP_SAPI) {
            static::closeOutputBuffers(0, true);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        return $this;
    }

    /**
     * Sets the response content.
     *
<<<<<<< HEAD
     * @return $this
     */
    public function setContent(?string $content)
    {
        $this->content = $content ?? '';
=======
     * Valid types are strings, numbers, null, and objects that implement a __toString() method.
     *
     * @param mixed $content Content that can be cast to string
     *
     * @return Response
     *
     * @throws \UnexpectedValueException
     */
    public function setContent($content)
    {
        if (null !== $content && !is_string($content) && !is_numeric($content) && !is_callable(array($content, '__toString'))) {
            throw new \UnexpectedValueException(sprintf('The Response content must be a string or object implementing __toString(), "%s" given.', gettype($content)));
        }

        $this->content = (string) $content;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        return $this;
    }

    /**
     * Gets the current response content.
     *
<<<<<<< HEAD
     * @return string|false
=======
     * @return string Content
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Sets the HTTP protocol version (1.0 or 1.1).
     *
<<<<<<< HEAD
     * @return $this
     *
     * @final
     */
    public function setProtocolVersion(string $version): object
=======
     * @param string $version The HTTP protocol version
     *
     * @return Response
     */
    public function setProtocolVersion($version)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->version = $version;

        return $this;
    }

    /**
     * Gets the HTTP protocol version.
     *
<<<<<<< HEAD
     * @final
     */
    public function getProtocolVersion(): string
=======
     * @return string The HTTP protocol version
     */
    public function getProtocolVersion()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->version;
    }

    /**
     * Sets the response status code.
     *
<<<<<<< HEAD
     * If the status text is null it will be automatically populated for the known
     * status codes and left empty otherwise.
     *
     * @return $this
     *
     * @throws \InvalidArgumentException When the HTTP status code is not valid
     *
     * @final
     */
    public function setStatusCode(int $code, string $text = null): object
    {
        $this->statusCode = $code;
=======
     * @param int   $code HTTP status code
     * @param mixed $text HTTP status text
     *
     * If the status text is null it will be automatically populated for the known
     * status codes and left empty otherwise.
     *
     * @return Response
     *
     * @throws \InvalidArgumentException When the HTTP status code is not valid
     */
    public function setStatusCode($code, $text = null)
    {
        $this->statusCode = $code = (int) $code;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        if ($this->isInvalid()) {
            throw new \InvalidArgumentException(sprintf('The HTTP status code "%s" is not valid.', $code));
        }

        if (null === $text) {
<<<<<<< HEAD
            $this->statusText = self::$statusTexts[$code] ?? 'unknown status';
=======
            $this->statusText = isset(self::$statusTexts[$code]) ? self::$statusTexts[$code] : 'unknown status';
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

            return $this;
        }

        if (false === $text) {
            $this->statusText = '';

            return $this;
        }

        $this->statusText = $text;

        return $this;
    }

    /**
     * Retrieves the status code for the current web response.
     *
<<<<<<< HEAD
     * @final
     */
    public function getStatusCode(): int
=======
     * @return int Status code
     */
    public function getStatusCode()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->statusCode;
    }

    /**
     * Sets the response charset.
     *
<<<<<<< HEAD
     * @return $this
     *
     * @final
     */
    public function setCharset(string $charset): object
=======
     * @param string $charset Character set
     *
     * @return Response
     */
    public function setCharset($charset)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->charset = $charset;

        return $this;
    }

    /**
     * Retrieves the response charset.
     *
<<<<<<< HEAD
     * @final
     */
    public function getCharset(): ?string
=======
     * @return string Character set
     */
    public function getCharset()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->charset;
    }

    /**
<<<<<<< HEAD
     * Returns true if the response may safely be kept in a shared (surrogate) cache.
=======
     * Returns true if the response is worth caching under any circumstance.
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     *
     * Responses marked "private" with an explicit Cache-Control directive are
     * considered uncacheable.
     *
     * Responses with neither a freshness lifetime (Expires, max-age) nor cache
<<<<<<< HEAD
     * validator (Last-Modified, ETag) are considered uncacheable because there is
     * no way to tell when or how to remove them from the cache.
     *
     * Note that RFC 7231 and RFC 7234 possibly allow for a more permissive implementation,
     * for example "status codes that are defined as cacheable by default [...]
     * can be reused by a cache with heuristic expiration unless otherwise indicated"
     * (https://tools.ietf.org/html/rfc7231#section-6.1)
     *
     * @final
     */
    public function isCacheable(): bool
    {
        if (!\in_array($this->statusCode, [200, 203, 300, 301, 302, 404, 410])) {
=======
     * validator (Last-Modified, ETag) are considered uncacheable.
     *
     * @return bool true if the response is worth caching, false otherwise
     */
    public function isCacheable()
    {
        if (!in_array($this->statusCode, array(200, 203, 300, 301, 302, 404, 410))) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            return false;
        }

        if ($this->headers->hasCacheControlDirective('no-store') || $this->headers->getCacheControlDirective('private')) {
            return false;
        }

        return $this->isValidateable() || $this->isFresh();
    }

    /**
     * Returns true if the response is "fresh".
     *
     * Fresh responses may be served from cache without any interaction with the
     * origin. A response is considered fresh when it includes a Cache-Control/max-age
     * indicator or Expires header and the calculated age is less than the freshness lifetime.
     *
<<<<<<< HEAD
     * @final
     */
    public function isFresh(): bool
=======
     * @return bool true if the response is fresh, false otherwise
     */
    public function isFresh()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->getTtl() > 0;
    }

    /**
     * Returns true if the response includes headers that can be used to validate
     * the response with the origin server using a conditional GET request.
     *
<<<<<<< HEAD
     * @final
     */
    public function isValidateable(): bool
=======
     * @return bool true if the response is validateable, false otherwise
     */
    public function isValidateable()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->headers->has('Last-Modified') || $this->headers->has('ETag');
    }

    /**
     * Marks the response as "private".
     *
     * It makes the response ineligible for serving other clients.
     *
<<<<<<< HEAD
     * @return $this
     *
     * @final
     */
    public function setPrivate(): object
=======
     * @return Response
     */
    public function setPrivate()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->headers->removeCacheControlDirective('public');
        $this->headers->addCacheControlDirective('private');

        return $this;
    }

    /**
     * Marks the response as "public".
     *
     * It makes the response eligible for serving other clients.
     *
<<<<<<< HEAD
     * @return $this
     *
     * @final
     */
    public function setPublic(): object
=======
     * @return Response
     */
    public function setPublic()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->headers->addCacheControlDirective('public');
        $this->headers->removeCacheControlDirective('private');

        return $this;
    }

    /**
<<<<<<< HEAD
     * Marks the response as "immutable".
     *
     * @return $this
     *
     * @final
     */
    public function setImmutable(bool $immutable = true): object
    {
        if ($immutable) {
            $this->headers->addCacheControlDirective('immutable');
        } else {
            $this->headers->removeCacheControlDirective('immutable');
        }

        return $this;
    }

    /**
     * Returns true if the response is marked as "immutable".
     *
     * @final
     */
    public function isImmutable(): bool
    {
        return $this->headers->hasCacheControlDirective('immutable');
    }

    /**
     * Returns true if the response must be revalidated by shared caches once it has become stale.
=======
     * Returns true if the response must be revalidated by caches.
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     *
     * This method indicates that the response must not be served stale by a
     * cache in any circumstance without first revalidating with the origin.
     * When present, the TTL of the response should not be overridden to be
     * greater than the value provided by the origin.
     *
<<<<<<< HEAD
     * @final
     */
    public function mustRevalidate(): bool
=======
     * @return bool true if the response must be revalidated by a cache, false otherwise
     */
    public function mustRevalidate()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->headers->hasCacheControlDirective('must-revalidate') || $this->headers->hasCacheControlDirective('proxy-revalidate');
    }

    /**
     * Returns the Date header as a DateTime instance.
     *
<<<<<<< HEAD
     * @throws \RuntimeException When the header is not parseable
     *
     * @final
     */
    public function getDate(): ?\DateTimeInterface
    {
=======
     * @return \DateTime A \DateTime instance
     *
     * @throws \RuntimeException When the header is not parseable
     */
    public function getDate()
    {
        if (!$this->headers->has('Date')) {
            $this->setDate(\DateTime::createFromFormat('U', time()));
        }

>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        return $this->headers->getDate('Date');
    }

    /**
     * Sets the Date header.
     *
<<<<<<< HEAD
     * @return $this
     *
     * @final
     */
    public function setDate(\DateTimeInterface $date): object
    {
        if ($date instanceof \DateTime) {
            $date = \DateTimeImmutable::createFromMutable($date);
        }

        $date = $date->setTimezone(new \DateTimeZone('UTC'));
=======
     * @param \DateTime $date A \DateTime instance
     *
     * @return Response
     */
    public function setDate(\DateTime $date)
    {
        $date->setTimezone(new \DateTimeZone('UTC'));
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $this->headers->set('Date', $date->format('D, d M Y H:i:s').' GMT');

        return $this;
    }

    /**
<<<<<<< HEAD
     * Returns the age of the response in seconds.
     *
     * @final
     */
    public function getAge(): int
=======
     * Returns the age of the response.
     *
     * @return int The age of the response in seconds
     */
    public function getAge()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if (null !== $age = $this->headers->get('Age')) {
            return (int) $age;
        }

<<<<<<< HEAD
        return max(time() - (int) $this->getDate()->format('U'), 0);
=======
        return max(time() - $this->getDate()->format('U'), 0);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Marks the response stale by setting the Age header to be equal to the maximum age of the response.
     *
<<<<<<< HEAD
     * @return $this
=======
     * @return Response
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function expire()
    {
        if ($this->isFresh()) {
            $this->headers->set('Age', $this->getMaxAge());
<<<<<<< HEAD
            $this->headers->remove('Expires');
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        return $this;
    }

    /**
     * Returns the value of the Expires header as a DateTime instance.
     *
<<<<<<< HEAD
     * @final
     */
    public function getExpires(): ?\DateTimeInterface
=======
     * @return \DateTime|null A DateTime instance or null if the header does not exist
     */
    public function getExpires()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        try {
            return $this->headers->getDate('Expires');
        } catch (\RuntimeException $e) {
            // according to RFC 2616 invalid date formats (e.g. "0" and "-1") must be treated as in the past
<<<<<<< HEAD
            return \DateTime::createFromFormat('U', time() - 172800);
=======
            return \DateTime::createFromFormat(DATE_RFC2822, 'Sat, 01 Jan 00 00:00:00 +0000');
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }
    }

    /**
     * Sets the Expires HTTP header with a DateTime instance.
     *
     * Passing null as value will remove the header.
     *
<<<<<<< HEAD
     * @return $this
     *
     * @final
     */
    public function setExpires(\DateTimeInterface $date = null): object
    {
        if (null === $date) {
            $this->headers->remove('Expires');

            return $this;
        }

        if ($date instanceof \DateTime) {
            $date = \DateTimeImmutable::createFromMutable($date);
        }

        $date = $date->setTimezone(new \DateTimeZone('UTC'));
        $this->headers->set('Expires', $date->format('D, d M Y H:i:s').' GMT');

=======
     * @param \DateTime|null $date A \DateTime instance or null to remove the header
     *
     * @return Response
     */
    public function setExpires(\DateTime $date = null)
    {
        if (null === $date) {
            $this->headers->remove('Expires');
        } else {
            $date = clone $date;
            $date->setTimezone(new \DateTimeZone('UTC'));
            $this->headers->set('Expires', $date->format('D, d M Y H:i:s').' GMT');
        }

>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        return $this;
    }

    /**
     * Returns the number of seconds after the time specified in the response's Date
     * header when the response should no longer be considered fresh.
     *
     * First, it checks for a s-maxage directive, then a max-age directive, and then it falls
     * back on an expires header. It returns null when no maximum age can be established.
     *
<<<<<<< HEAD
     * @final
     */
    public function getMaxAge(): ?int
=======
     * @return int|null Number of seconds
     */
    public function getMaxAge()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if ($this->headers->hasCacheControlDirective('s-maxage')) {
            return (int) $this->headers->getCacheControlDirective('s-maxage');
        }

        if ($this->headers->hasCacheControlDirective('max-age')) {
            return (int) $this->headers->getCacheControlDirective('max-age');
        }

        if (null !== $this->getExpires()) {
<<<<<<< HEAD
            return (int) $this->getExpires()->format('U') - (int) $this->getDate()->format('U');
        }

        return null;
=======
            return $this->getExpires()->format('U') - $this->getDate()->format('U');
        }
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Sets the number of seconds after which the response should no longer be considered fresh.
     *
     * This methods sets the Cache-Control max-age directive.
     *
<<<<<<< HEAD
     * @return $this
     *
     * @final
     */
    public function setMaxAge(int $value): object
=======
     * @param int $value Number of seconds
     *
     * @return Response
     */
    public function setMaxAge($value)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->headers->addCacheControlDirective('max-age', $value);

        return $this;
    }

    /**
     * Sets the number of seconds after which the response should no longer be considered fresh by shared caches.
     *
     * This methods sets the Cache-Control s-maxage directive.
     *
<<<<<<< HEAD
     * @return $this
     *
     * @final
     */
    public function setSharedMaxAge(int $value): object
=======
     * @param int $value Number of seconds
     *
     * @return Response
     */
    public function setSharedMaxAge($value)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->setPublic();
        $this->headers->addCacheControlDirective('s-maxage', $value);

        return $this;
    }

    /**
     * Returns the response's time-to-live in seconds.
     *
     * It returns null when no freshness information is present in the response.
     *
     * When the responses TTL is <= 0, the response may not be served from cache without first
     * revalidating with the origin.
     *
<<<<<<< HEAD
     * @final
     */
    public function getTtl(): ?int
    {
        $maxAge = $this->getMaxAge();

        return null !== $maxAge ? $maxAge - $this->getAge() : null;
    }

    /**
     * Sets the response's time-to-live for shared caches in seconds.
     *
     * This method adjusts the Cache-Control/s-maxage directive.
     *
     * @return $this
     *
     * @final
     */
    public function setTtl(int $seconds): object
=======
     * @return int|null The TTL in seconds
     */
    public function getTtl()
    {
        if (null !== $maxAge = $this->getMaxAge()) {
            return $maxAge - $this->getAge();
        }
    }

    /**
     * Sets the response's time-to-live for shared caches.
     *
     * This method adjusts the Cache-Control/s-maxage directive.
     *
     * @param int $seconds Number of seconds
     *
     * @return Response
     */
    public function setTtl($seconds)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->setSharedMaxAge($this->getAge() + $seconds);

        return $this;
    }

    /**
<<<<<<< HEAD
     * Sets the response's time-to-live for private/client caches in seconds.
     *
     * This method adjusts the Cache-Control/max-age directive.
     *
     * @return $this
     *
     * @final
     */
    public function setClientTtl(int $seconds): object
=======
     * Sets the response's time-to-live for private/client caches.
     *
     * This method adjusts the Cache-Control/max-age directive.
     *
     * @param int $seconds Number of seconds
     *
     * @return Response
     */
    public function setClientTtl($seconds)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->setMaxAge($this->getAge() + $seconds);

        return $this;
    }

    /**
     * Returns the Last-Modified HTTP header as a DateTime instance.
     *
<<<<<<< HEAD
     * @throws \RuntimeException When the HTTP header is not parseable
     *
     * @final
     */
    public function getLastModified(): ?\DateTimeInterface
=======
     * @return \DateTime|null A DateTime instance or null if the header does not exist
     *
     * @throws \RuntimeException When the HTTP header is not parseable
     */
    public function getLastModified()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->headers->getDate('Last-Modified');
    }

    /**
     * Sets the Last-Modified HTTP header with a DateTime instance.
     *
     * Passing null as value will remove the header.
     *
<<<<<<< HEAD
     * @return $this
     *
     * @final
     */
    public function setLastModified(\DateTimeInterface $date = null): object
    {
        if (null === $date) {
            $this->headers->remove('Last-Modified');

            return $this;
        }

        if ($date instanceof \DateTime) {
            $date = \DateTimeImmutable::createFromMutable($date);
        }

        $date = $date->setTimezone(new \DateTimeZone('UTC'));
        $this->headers->set('Last-Modified', $date->format('D, d M Y H:i:s').' GMT');

=======
     * @param \DateTime|null $date A \DateTime instance or null to remove the header
     *
     * @return Response
     */
    public function setLastModified(\DateTime $date = null)
    {
        if (null === $date) {
            $this->headers->remove('Last-Modified');
        } else {
            $date = clone $date;
            $date->setTimezone(new \DateTimeZone('UTC'));
            $this->headers->set('Last-Modified', $date->format('D, d M Y H:i:s').' GMT');
        }

>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        return $this;
    }

    /**
     * Returns the literal value of the ETag HTTP header.
     *
<<<<<<< HEAD
     * @final
     */
    public function getEtag(): ?string
=======
     * @return string|null The ETag HTTP header or null if it does not exist
     */
    public function getEtag()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->headers->get('ETag');
    }

    /**
     * Sets the ETag value.
     *
     * @param string|null $etag The ETag unique identifier or null to remove the header
     * @param bool        $weak Whether you want a weak ETag or not
     *
<<<<<<< HEAD
     * @return $this
     *
     * @final
     */
    public function setEtag(string $etag = null, bool $weak = false): object
=======
     * @return Response
     */
    public function setEtag($etag = null, $weak = false)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if (null === $etag) {
            $this->headers->remove('Etag');
        } else {
<<<<<<< HEAD
            if (!str_starts_with($etag, '"')) {
=======
            if (0 !== strpos($etag, '"')) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                $etag = '"'.$etag.'"';
            }

            $this->headers->set('ETag', (true === $weak ? 'W/' : '').$etag);
        }

        return $this;
    }

    /**
     * Sets the response's cache headers (validation and/or expiration).
     *
<<<<<<< HEAD
     * Available options are: must_revalidate, no_cache, no_store, no_transform, public, private, proxy_revalidate, max_age, s_maxage, immutable, last_modified and etag.
     *
     * @return $this
     *
     * @throws \InvalidArgumentException
     *
     * @final
     */
    public function setCache(array $options): object
    {
        if ($diff = array_diff(array_keys($options), array_keys(self::HTTP_RESPONSE_CACHE_CONTROL_DIRECTIVES))) {
            throw new \InvalidArgumentException(sprintf('Response does not support the following options: "%s".', implode('", "', $diff)));
=======
     * Available options are: etag, last_modified, max_age, s_maxage, private, and public.
     *
     * @param array $options An array of cache options
     *
     * @return Response
     *
     * @throws \InvalidArgumentException
     */
    public function setCache(array $options)
    {
        if ($diff = array_diff(array_keys($options), array('etag', 'last_modified', 'max_age', 's_maxage', 'private', 'public'))) {
            throw new \InvalidArgumentException(sprintf('Response does not support the following options: "%s".', implode('", "', array_values($diff))));
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        if (isset($options['etag'])) {
            $this->setEtag($options['etag']);
        }

        if (isset($options['last_modified'])) {
            $this->setLastModified($options['last_modified']);
        }

        if (isset($options['max_age'])) {
            $this->setMaxAge($options['max_age']);
        }

        if (isset($options['s_maxage'])) {
            $this->setSharedMaxAge($options['s_maxage']);
        }

<<<<<<< HEAD
        foreach (self::HTTP_RESPONSE_CACHE_CONTROL_DIRECTIVES as $directive => $hasValue) {
            if (!$hasValue && isset($options[$directive])) {
                if ($options[$directive]) {
                    $this->headers->addCacheControlDirective(str_replace('_', '-', $directive));
                } else {
                    $this->headers->removeCacheControlDirective(str_replace('_', '-', $directive));
                }
            }
        }

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        if (isset($options['public'])) {
            if ($options['public']) {
                $this->setPublic();
            } else {
                $this->setPrivate();
            }
        }

        if (isset($options['private'])) {
            if ($options['private']) {
                $this->setPrivate();
            } else {
                $this->setPublic();
            }
        }

        return $this;
    }

    /**
     * Modifies the response so that it conforms to the rules defined for a 304 status code.
     *
     * This sets the status, removes the body, and discards any headers
     * that MUST NOT be included in 304 responses.
     *
<<<<<<< HEAD
     * @return $this
     *
     * @see https://tools.ietf.org/html/rfc2616#section-10.3.5
     *
     * @final
     */
    public function setNotModified(): object
=======
     * @return Response
     *
     * @see http://tools.ietf.org/html/rfc2616#section-10.3.5
     */
    public function setNotModified()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->setStatusCode(304);
        $this->setContent(null);

        // remove headers that MUST NOT be included with 304 Not Modified responses
<<<<<<< HEAD
        foreach (['Allow', 'Content-Encoding', 'Content-Language', 'Content-Length', 'Content-MD5', 'Content-Type', 'Last-Modified'] as $header) {
=======
        foreach (array('Allow', 'Content-Encoding', 'Content-Language', 'Content-Length', 'Content-MD5', 'Content-Type', 'Last-Modified') as $header) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $this->headers->remove($header);
        }

        return $this;
    }

    /**
     * Returns true if the response includes a Vary header.
     *
<<<<<<< HEAD
     * @final
     */
    public function hasVary(): bool
=======
     * @return bool true if the response includes a Vary header, false otherwise
     */
    public function hasVary()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return null !== $this->headers->get('Vary');
    }

    /**
     * Returns an array of header names given in the Vary header.
     *
<<<<<<< HEAD
     * @final
     */
    public function getVary(): array
    {
        if (!$vary = $this->headers->all('Vary')) {
            return [];
        }

        $ret = [];
        foreach ($vary as $item) {
            $ret[] = preg_split('/[\s,]+/', $item);
        }

        return array_merge([], ...$ret);
=======
     * @return array An array of Vary names
     */
    public function getVary()
    {
        if (!$vary = $this->headers->get('Vary', null, false)) {
            return array();
        }

        $ret = array();
        foreach ($vary as $item) {
            $ret = array_merge($ret, preg_split('/[\s,]+/', $item));
        }

        return $ret;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Sets the Vary header.
     *
     * @param string|array $headers
     * @param bool         $replace Whether to replace the actual value or not (true by default)
     *
<<<<<<< HEAD
     * @return $this
     *
     * @final
     */
    public function setVary($headers, bool $replace = true): object
=======
     * @return Response
     */
    public function setVary($headers, $replace = true)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->headers->set('Vary', $headers, $replace);

        return $this;
    }

    /**
     * Determines if the Response validators (ETag, Last-Modified) match
     * a conditional value specified in the Request.
     *
     * If the Response is not modified, it sets the status code to 304 and
     * removes the actual content by calling the setNotModified() method.
     *
<<<<<<< HEAD
     * @final
     */
    public function isNotModified(Request $request): bool
    {
        if (!$request->isMethodCacheable()) {
=======
     * @param Request $request A Request instance
     *
     * @return bool true if the Response validators match the Request, false otherwise
     */
    public function isNotModified(Request $request)
    {
        if (!$request->isMethodSafe()) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            return false;
        }

        $notModified = false;
        $lastModified = $this->headers->get('Last-Modified');
        $modifiedSince = $request->headers->get('If-Modified-Since');

<<<<<<< HEAD
        if (($ifNoneMatchEtags = $request->getETags()) && (null !== $etag = $this->getEtag())) {
            if (0 == strncmp($etag, 'W/', 2)) {
                $etag = substr($etag, 2);
            }

            // Use weak comparison as per https://tools.ietf.org/html/rfc7232#section-3.2.
            foreach ($ifNoneMatchEtags as $ifNoneMatchEtag) {
                if (0 == strncmp($ifNoneMatchEtag, 'W/', 2)) {
                    $ifNoneMatchEtag = substr($ifNoneMatchEtag, 2);
                }

                if ($ifNoneMatchEtag === $etag || '*' === $ifNoneMatchEtag) {
                    $notModified = true;
                    break;
                }
            }
        }
        // Only do If-Modified-Since date comparison when If-None-Match is not present as per https://tools.ietf.org/html/rfc7232#section-3.3.
        elseif ($modifiedSince && $lastModified) {
            $notModified = strtotime($modifiedSince) >= strtotime($lastModified);
=======
        if ($etags = $request->getETags()) {
            $notModified = in_array($this->getEtag(), $etags) || in_array('*', $etags);
        }

        if ($modifiedSince && $lastModified) {
            $notModified = strtotime($modifiedSince) >= strtotime($lastModified) && (!$etags || $notModified);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        if ($notModified) {
            $this->setNotModified();
        }

        return $notModified;
    }

    /**
     * Is response invalid?
     *
<<<<<<< HEAD
     * @see https://www.w3.org/Protocols/rfc2616/rfc2616-sec10.html
     *
     * @final
     */
    public function isInvalid(): bool
=======
     * @return bool
     *
     * @see http://www.w3.org/Protocols/rfc2616/rfc2616-sec10.html
     */
    public function isInvalid()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->statusCode < 100 || $this->statusCode >= 600;
    }

    /**
     * Is response informative?
     *
<<<<<<< HEAD
     * @final
     */
    public function isInformational(): bool
=======
     * @return bool
     */
    public function isInformational()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->statusCode >= 100 && $this->statusCode < 200;
    }

    /**
     * Is response successful?
     *
<<<<<<< HEAD
     * @final
     */
    public function isSuccessful(): bool
=======
     * @return bool
     */
    public function isSuccessful()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->statusCode >= 200 && $this->statusCode < 300;
    }

    /**
     * Is the response a redirect?
     *
<<<<<<< HEAD
     * @final
     */
    public function isRedirection(): bool
=======
     * @return bool
     */
    public function isRedirection()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->statusCode >= 300 && $this->statusCode < 400;
    }

    /**
     * Is there a client error?
     *
<<<<<<< HEAD
     * @final
     */
    public function isClientError(): bool
=======
     * @return bool
     */
    public function isClientError()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->statusCode >= 400 && $this->statusCode < 500;
    }

    /**
     * Was there a server side error?
     *
<<<<<<< HEAD
     * @final
     */
    public function isServerError(): bool
=======
     * @return bool
     */
    public function isServerError()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->statusCode >= 500 && $this->statusCode < 600;
    }

    /**
     * Is the response OK?
     *
<<<<<<< HEAD
     * @final
     */
    public function isOk(): bool
=======
     * @return bool
     */
    public function isOk()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return 200 === $this->statusCode;
    }

    /**
     * Is the response forbidden?
     *
<<<<<<< HEAD
     * @final
     */
    public function isForbidden(): bool
=======
     * @return bool
     */
    public function isForbidden()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return 403 === $this->statusCode;
    }

    /**
     * Is the response a not found error?
     *
<<<<<<< HEAD
     * @final
     */
    public function isNotFound(): bool
=======
     * @return bool
     */
    public function isNotFound()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return 404 === $this->statusCode;
    }

    /**
     * Is the response a redirect of some form?
     *
<<<<<<< HEAD
     * @final
     */
    public function isRedirect(string $location = null): bool
    {
        return \in_array($this->statusCode, [201, 301, 302, 303, 307, 308]) && (null === $location ?: $location == $this->headers->get('Location'));
=======
     * @param string $location
     *
     * @return bool
     */
    public function isRedirect($location = null)
    {
        return in_array($this->statusCode, array(201, 301, 302, 303, 307, 308)) && (null === $location ?: $location == $this->headers->get('Location'));
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Is the response empty?
     *
<<<<<<< HEAD
     * @final
     */
    public function isEmpty(): bool
    {
        return \in_array($this->statusCode, [204, 304]);
=======
     * @return bool
     */
    public function isEmpty()
    {
        return in_array($this->statusCode, array(204, 304));
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Cleans or flushes output buffers up to target level.
     *
     * Resulting level can be greater than target level if a non-removable buffer has been encountered.
     *
<<<<<<< HEAD
     * @final
     */
    public static function closeOutputBuffers(int $targetLevel, bool $flush): void
    {
        $status = ob_get_status(true);
        $level = \count($status);
        $flags = \PHP_OUTPUT_HANDLER_REMOVABLE | ($flush ? \PHP_OUTPUT_HANDLER_FLUSHABLE : \PHP_OUTPUT_HANDLER_CLEANABLE);

        while ($level-- > $targetLevel && ($s = $status[$level]) && (!isset($s['del']) ? !isset($s['flags']) || ($s['flags'] & $flags) === $flags : $s['del'])) {
=======
     * @param int  $targetLevel The target output buffering level
     * @param bool $flush       Whether to flush or clean the buffers
     */
    public static function closeOutputBuffers($targetLevel, $flush)
    {
        $status = ob_get_status(true);
        $level = count($status);
        // PHP_OUTPUT_HANDLER_* are not defined on HHVM 3.3
        $flags = defined('PHP_OUTPUT_HANDLER_REMOVABLE') ? PHP_OUTPUT_HANDLER_REMOVABLE | ($flush ? PHP_OUTPUT_HANDLER_FLUSHABLE : PHP_OUTPUT_HANDLER_CLEANABLE) : -1;

        while ($level-- > $targetLevel && ($s = $status[$level]) && (!isset($s['del']) ? !isset($s['flags']) || $flags === ($s['flags'] & $flags) : $s['del'])) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            if ($flush) {
                ob_end_flush();
            } else {
                ob_end_clean();
            }
        }
    }

    /**
<<<<<<< HEAD
     * Marks a response as safe according to RFC8674.
     *
     * @see https://tools.ietf.org/html/rfc8674
     */
    public function setContentSafe(bool $safe = true): void
    {
        if ($safe) {
            $this->headers->set('Preference-Applied', 'safe');
        } elseif ('safe' === $this->headers->get('Preference-Applied')) {
            $this->headers->remove('Preference-Applied');
        }

        $this->setVary('Prefer', false);
    }

    /**
     * Checks if we need to remove Cache-Control for SSL encrypted downloads when using IE < 9.
     *
     * @see http://support.microsoft.com/kb/323308
     *
     * @final
     */
    protected function ensureIEOverSSLCompatibility(Request $request): void
    {
        if (false !== stripos($this->headers->get('Content-Disposition') ?? '', 'attachment') && 1 == preg_match('/MSIE (.*?);/i', $request->server->get('HTTP_USER_AGENT') ?? '', $match) && true === $request->isSecure()) {
=======
     * Checks if we need to remove Cache-Control for SSL encrypted downloads when using IE < 9.
     *
     * @link http://support.microsoft.com/kb/323308
     */
    protected function ensureIEOverSSLCompatibility(Request $request)
    {
        if (false !== stripos($this->headers->get('Content-Disposition'), 'attachment') && preg_match('/MSIE (.*?);/i', $request->server->get('HTTP_USER_AGENT'), $match) == 1 && true === $request->isSecure()) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            if ((int) preg_replace('/(MSIE )(.*?);/', '$2', $match[0]) < 9) {
                $this->headers->remove('Cache-Control');
            }
        }
    }
}
