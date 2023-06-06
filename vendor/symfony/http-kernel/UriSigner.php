<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel;

<<<<<<< HEAD
use Symfony\Component\HttpFoundation\Request;

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
/**
 * Signs URIs.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class UriSigner
{
    private $secret;
<<<<<<< HEAD
    private $parameter;

    /**
     * @param string $secret    A secret
     * @param string $parameter Query string parameter to use
     */
    public function __construct(string $secret, string $parameter = '_hash')
    {
        $this->secret = $secret;
        $this->parameter = $parameter;
=======

    /**
     * Constructor.
     *
     * @param string $secret A secret
     */
    public function __construct($secret)
    {
        $this->secret = $secret;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Signs a URI.
     *
<<<<<<< HEAD
     * The given URI is signed by adding the query string parameter
     * which value depends on the URI and the secret.
     *
     * @return string
     */
    public function sign(string $uri)
=======
     * The given URI is signed by adding a _hash query string parameter
     * which value depends on the URI and the secret.
     *
     * @param string $uri A URI to sign
     *
     * @return string The signed URI
     */
    public function sign($uri)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $url = parse_url($uri);
        if (isset($url['query'])) {
            parse_str($url['query'], $params);
        } else {
<<<<<<< HEAD
            $params = [];
        }

        $uri = $this->buildUrl($url, $params);
        $params[$this->parameter] = $this->computeHash($uri);

        return $this->buildUrl($url, $params);
=======
            $params = array();
        }

        $uri = $this->buildUrl($url, $params);

        return $uri.(false === strpos($uri, '?') ? '?' : '&').'_hash='.$this->computeHash($uri);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Checks that a URI contains the correct hash.
     *
<<<<<<< HEAD
     * @return bool
     */
    public function check(string $uri)
=======
     * The _hash query string parameter must be the last one
     * (as it is generated that way by the sign() method, it should
     * never be a problem).
     *
     * @param string $uri A signed URI
     *
     * @return bool True if the URI is signed correctly, false otherwise
     */
    public function check($uri)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $url = parse_url($uri);
        if (isset($url['query'])) {
            parse_str($url['query'], $params);
        } else {
<<<<<<< HEAD
            $params = [];
        }

        if (empty($params[$this->parameter])) {
            return false;
        }

        $hash = $params[$this->parameter];
        unset($params[$this->parameter]);

        return hash_equals($this->computeHash($this->buildUrl($url, $params)), $hash);
    }

    public function checkRequest(Request $request): bool
    {
        $qs = ($qs = $request->server->get('QUERY_STRING')) ? '?'.$qs : '';

        // we cannot use $request->getUri() here as we want to work with the original URI (no query string reordering)
        return $this->check($request->getSchemeAndHttpHost().$request->getBaseUrl().$request->getPathInfo().$qs);
    }

    private function computeHash(string $uri): string
    {
        return base64_encode(hash_hmac('sha256', $uri, $this->secret, true));
    }

    private function buildUrl(array $url, array $params = []): string
    {
        ksort($params, \SORT_STRING);
        $url['query'] = http_build_query($params, '', '&');

        $scheme = isset($url['scheme']) ? $url['scheme'].'://' : '';
        $host = $url['host'] ?? '';
        $port = isset($url['port']) ? ':'.$url['port'] : '';
        $user = $url['user'] ?? '';
        $pass = isset($url['pass']) ? ':'.$url['pass'] : '';
        $pass = ($user || $pass) ? "$pass@" : '';
        $path = $url['path'] ?? '';
=======
            $params = array();
        }

        if (empty($params['_hash'])) {
            return false;
        }

        $hash = urlencode($params['_hash']);
        unset($params['_hash']);

        return $this->computeHash($this->buildUrl($url, $params)) === $hash;
    }

    private function computeHash($uri)
    {
        return urlencode(base64_encode(hash_hmac('sha256', $uri, $this->secret, true)));
    }

    private function buildUrl(array $url, array $params = array())
    {
        ksort($params, SORT_STRING);
        $url['query'] = http_build_query($params, '', '&');

        $scheme = isset($url['scheme']) ? $url['scheme'].'://' : '';
        $host = isset($url['host']) ? $url['host'] : '';
        $port = isset($url['port']) ? ':'.$url['port'] : '';
        $user = isset($url['user']) ? $url['user'] : '';
        $pass = isset($url['pass']) ? ':'.$url['pass']  : '';
        $pass = ($user || $pass) ? "$pass@" : '';
        $path = isset($url['path']) ? $url['path'] : '';
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $query = isset($url['query']) && $url['query'] ? '?'.$url['query'] : '';
        $fragment = isset($url['fragment']) ? '#'.$url['fragment'] : '';

        return $scheme.$user.$pass.$host.$port.$path.$query.$fragment;
    }
}
