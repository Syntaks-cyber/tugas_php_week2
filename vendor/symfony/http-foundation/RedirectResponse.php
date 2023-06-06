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
 * RedirectResponse represents an HTTP response doing a redirect.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class RedirectResponse extends Response
{
    protected $targetUrl;

    /**
     * Creates a redirect response so that it conforms to the rules defined for a redirect status code.
     *
     * @param string $url     The URL to redirect to. The URL should be a full URL, with schema etc.,
     *                        but practically every browser redirects on paths only as well
     * @param int    $status  The status code (302 by default)
     * @param array  $headers The headers (Location is always set to the given URL)
     *
     * @throws \InvalidArgumentException
     *
<<<<<<< HEAD
     * @see https://tools.ietf.org/html/rfc2616#section-10.3
     */
    public function __construct(string $url, int $status = 302, array $headers = [])
=======
     * @see http://tools.ietf.org/html/rfc2616#section-10.3
     */
    public function __construct($url, $status = 302, $headers = array())
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        parent::__construct('', $status, $headers);

        $this->setTargetUrl($url);

        if (!$this->isRedirect()) {
            throw new \InvalidArgumentException(sprintf('The HTTP status code is not a redirect ("%s" given).', $status));
        }
<<<<<<< HEAD

        if (301 == $status && !\array_key_exists('cache-control', array_change_key_case($headers, \CASE_LOWER))) {
            $this->headers->remove('cache-control');
        }
    }

    /**
     * Factory method for chainability.
     *
     * @param string $url The URL to redirect to
     *
     * @return static
     *
     * @deprecated since Symfony 5.1, use __construct() instead.
     */
    public static function create($url = '', int $status = 302, array $headers = [])
    {
        trigger_deprecation('symfony/http-foundation', '5.1', 'The "%s()" method is deprecated, use "new %s()" instead.', __METHOD__, static::class);

=======
    }

    /**
     * {@inheritdoc}
     */
    public static function create($url = '', $status = 302, $headers = array())
    {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        return new static($url, $status, $headers);
    }

    /**
     * Returns the target URL.
     *
<<<<<<< HEAD
     * @return string
=======
     * @return string target URL
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getTargetUrl()
    {
        return $this->targetUrl;
    }

    /**
     * Sets the redirect target of this response.
     *
<<<<<<< HEAD
     * @return $this
     *
     * @throws \InvalidArgumentException
     */
    public function setTargetUrl(string $url)
    {
        if ('' === $url) {
=======
     * @param string $url The URL to redirect to
     *
     * @return RedirectResponse The current response
     *
     * @throws \InvalidArgumentException
     */
    public function setTargetUrl($url)
    {
        if (empty($url)) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            throw new \InvalidArgumentException('Cannot redirect to an empty URL.');
        }

        $this->targetUrl = $url;

        $this->setContent(
            sprintf('<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
<<<<<<< HEAD
        <meta http-equiv="refresh" content="0;url=\'%1$s\'" />
=======
        <meta http-equiv="refresh" content="1;url=%1$s" />
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        <title>Redirecting to %1$s</title>
    </head>
    <body>
        Redirecting to <a href="%1$s">%1$s</a>.
    </body>
<<<<<<< HEAD
</html>', htmlspecialchars($url, \ENT_QUOTES, 'UTF-8')));
=======
</html>', htmlspecialchars($url, ENT_QUOTES, 'UTF-8')));
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        $this->headers->set('Location', $url);

        return $this;
    }
}
