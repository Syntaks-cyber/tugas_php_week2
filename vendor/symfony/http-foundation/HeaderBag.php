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
 * HeaderBag is a container for HTTP headers.
 *
 * @author Fabien Potencier <fabien@symfony.com>
<<<<<<< HEAD
 *
 * @implements \IteratorAggregate<string, list<string|null>>
 */
class HeaderBag implements \IteratorAggregate, \Countable
{
    protected const UPPER = '_ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    protected const LOWER = '-abcdefghijklmnopqrstuvwxyz';

    /**
     * @var array<string, list<string|null>>
     */
    protected $headers = [];
    protected $cacheControl = [];

    public function __construct(array $headers = [])
=======
 */
class HeaderBag implements \IteratorAggregate, \Countable
{
    protected $headers = array();
    protected $cacheControl = array();

    /**
     * Constructor.
     *
     * @param array $headers An array of HTTP headers
     */
    public function __construct(array $headers = array())
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        foreach ($headers as $key => $values) {
            $this->set($key, $values);
        }
    }

    /**
     * Returns the headers as a string.
     *
<<<<<<< HEAD
     * @return string
     */
    public function __toString()
    {
        if (!$headers = $this->all()) {
            return '';
        }

        ksort($headers);
        $max = max(array_map('strlen', array_keys($headers))) + 1;
        $content = '';
        foreach ($headers as $name => $values) {
            $name = ucwords($name, '-');
=======
     * @return string The headers
     */
    public function __toString()
    {
        if (!$this->headers) {
            return '';
        }

        $max = max(array_map('strlen', array_keys($this->headers))) + 1;
        $content = '';
        ksort($this->headers);
        foreach ($this->headers as $name => $values) {
            $name = implode('-', array_map('ucfirst', explode('-', $name)));
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            foreach ($values as $value) {
                $content .= sprintf("%-{$max}s %s\r\n", $name.':', $value);
            }
        }

        return $content;
    }

    /**
     * Returns the headers.
     *
<<<<<<< HEAD
     * @param string|null $key The name of the headers to return or null to get them all
     *
     * @return array<string, array<int, string|null>>|array<int, string|null>
     */
    public function all(string $key = null)
    {
        if (null !== $key) {
            return $this->headers[strtr($key, self::UPPER, self::LOWER)] ?? [];
        }

=======
     * @return array An array of headers
     */
    public function all()
    {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        return $this->headers;
    }

    /**
     * Returns the parameter keys.
     *
<<<<<<< HEAD
     * @return string[]
     */
    public function keys()
    {
        return array_keys($this->all());
=======
     * @return array An array of parameter keys
     */
    public function keys()
    {
        return array_keys($this->headers);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Replaces the current HTTP headers by a new set.
<<<<<<< HEAD
     */
    public function replace(array $headers = [])
    {
        $this->headers = [];
=======
     *
     * @param array $headers An array of HTTP headers
     */
    public function replace(array $headers = array())
    {
        $this->headers = array();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $this->add($headers);
    }

    /**
     * Adds new headers the current HTTP headers set.
<<<<<<< HEAD
=======
     *
     * @param array $headers An array of HTTP headers
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function add(array $headers)
    {
        foreach ($headers as $key => $values) {
            $this->set($key, $values);
        }
    }

    /**
<<<<<<< HEAD
     * Returns the first header by name or the default one.
     *
     * @return string|null
     */
    public function get(string $key, string $default = null)
    {
        $headers = $this->all($key);

        if (!$headers) {
            return $default;
        }

        if (null === $headers[0]) {
            return null;
        }

        return (string) $headers[0];
=======
     * Returns a header value by name.
     *
     * @param string $key     The header name
     * @param mixed  $default The default value
     * @param bool   $first   Whether to return the first value or all header values
     *
     * @return string|array The first header value if $first is true, an array of values otherwise
     */
    public function get($key, $default = null, $first = true)
    {
        $key = str_replace('_', '-', strtolower($key));

        if (!array_key_exists($key, $this->headers)) {
            if (null === $default) {
                return $first ? null : array();
            }

            return $first ? $default : array($default);
        }

        if ($first) {
            return count($this->headers[$key]) ? $this->headers[$key][0] : $default;
        }

        return $this->headers[$key];
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Sets a header by name.
     *
<<<<<<< HEAD
     * @param string|string[]|null $values  The value or an array of values
     * @param bool                 $replace Whether to replace the actual value or not (true by default)
     */
    public function set(string $key, $values, bool $replace = true)
    {
        $key = strtr($key, self::UPPER, self::LOWER);

        if (\is_array($values)) {
            $values = array_values($values);

            if (true === $replace || !isset($this->headers[$key])) {
                $this->headers[$key] = $values;
            } else {
                $this->headers[$key] = array_merge($this->headers[$key], $values);
            }
        } else {
            if (true === $replace || !isset($this->headers[$key])) {
                $this->headers[$key] = [$values];
            } else {
                $this->headers[$key][] = $values;
            }
        }

        if ('cache-control' === $key) {
            $this->cacheControl = $this->parseCacheControl(implode(', ', $this->headers[$key]));
=======
     * @param string       $key     The key
     * @param string|array $values  The value or an array of values
     * @param bool         $replace Whether to replace the actual value or not (true by default)
     */
    public function set($key, $values, $replace = true)
    {
        $key = str_replace('_', '-', strtolower($key));

        $values = array_values((array) $values);

        if (true === $replace || !isset($this->headers[$key])) {
            $this->headers[$key] = $values;
        } else {
            $this->headers[$key] = array_merge($this->headers[$key], $values);
        }

        if ('cache-control' === $key) {
            $this->cacheControl = $this->parseCacheControl($values[0]);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }
    }

    /**
     * Returns true if the HTTP header is defined.
     *
<<<<<<< HEAD
     * @return bool
     */
    public function has(string $key)
    {
        return \array_key_exists(strtr($key, self::UPPER, self::LOWER), $this->all());
=======
     * @param string $key The HTTP header
     *
     * @return bool true if the parameter exists, false otherwise
     */
    public function has($key)
    {
        return array_key_exists(str_replace('_', '-', strtolower($key)), $this->headers);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Returns true if the given HTTP header contains the given value.
     *
<<<<<<< HEAD
     * @return bool
     */
    public function contains(string $key, string $value)
    {
        return \in_array($value, $this->all($key));
=======
     * @param string $key   The HTTP header name
     * @param string $value The HTTP value
     *
     * @return bool true if the value is contained in the header, false otherwise
     */
    public function contains($key, $value)
    {
        return in_array($value, $this->get($key, null, false));
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Removes a header.
<<<<<<< HEAD
     */
    public function remove(string $key)
    {
        $key = strtr($key, self::UPPER, self::LOWER);
=======
     *
     * @param string $key The HTTP header name
     */
    public function remove($key)
    {
        $key = str_replace('_', '-', strtolower($key));
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        unset($this->headers[$key]);

        if ('cache-control' === $key) {
<<<<<<< HEAD
            $this->cacheControl = [];
=======
            $this->cacheControl = array();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }
    }

    /**
     * Returns the HTTP header value converted to a date.
     *
<<<<<<< HEAD
     * @return \DateTimeInterface|null
     *
     * @throws \RuntimeException When the HTTP header is not parseable
     */
    public function getDate(string $key, \DateTime $default = null)
=======
     * @param string    $key     The parameter key
     * @param \DateTime $default The default value
     *
     * @return null|\DateTime The parsed DateTime or the default value if the header does not exist
     *
     * @throws \RuntimeException When the HTTP header is not parseable
     */
    public function getDate($key, \DateTime $default = null)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if (null === $value = $this->get($key)) {
            return $default;
        }

<<<<<<< HEAD
        if (false === $date = \DateTime::createFromFormat(\DATE_RFC2822, $value)) {
            throw new \RuntimeException(sprintf('The "%s" HTTP header is not parseable (%s).', $key, $value));
=======
        if (false === $date = \DateTime::createFromFormat(DATE_RFC2822, $value)) {
            throw new \RuntimeException(sprintf('The %s HTTP header is not parseable (%s).', $key, $value));
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        return $date;
    }

    /**
     * Adds a custom Cache-Control directive.
     *
<<<<<<< HEAD
     * @param bool|string $value The Cache-Control directive value
     */
    public function addCacheControlDirective(string $key, $value = true)
=======
     * @param string $key   The Cache-Control directive name
     * @param mixed  $value The Cache-Control directive value
     */
    public function addCacheControlDirective($key, $value = true)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->cacheControl[$key] = $value;

        $this->set('Cache-Control', $this->getCacheControlHeader());
    }

    /**
     * Returns true if the Cache-Control directive is defined.
     *
<<<<<<< HEAD
     * @return bool
     */
    public function hasCacheControlDirective(string $key)
    {
        return \array_key_exists($key, $this->cacheControl);
=======
     * @param string $key The Cache-Control directive
     *
     * @return bool true if the directive exists, false otherwise
     */
    public function hasCacheControlDirective($key)
    {
        return array_key_exists($key, $this->cacheControl);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Returns a Cache-Control directive value by name.
     *
<<<<<<< HEAD
     * @return bool|string|null
     */
    public function getCacheControlDirective(string $key)
    {
        return $this->cacheControl[$key] ?? null;
=======
     * @param string $key The directive name
     *
     * @return mixed|null The directive value if defined, null otherwise
     */
    public function getCacheControlDirective($key)
    {
        return array_key_exists($key, $this->cacheControl) ? $this->cacheControl[$key] : null;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Removes a Cache-Control directive.
<<<<<<< HEAD
     */
    public function removeCacheControlDirective(string $key)
=======
     *
     * @param string $key The Cache-Control directive
     */
    public function removeCacheControlDirective($key)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        unset($this->cacheControl[$key]);

        $this->set('Cache-Control', $this->getCacheControlHeader());
    }

    /**
     * Returns an iterator for headers.
     *
<<<<<<< HEAD
     * @return \ArrayIterator<string, list<string|null>>
     */
    #[\ReturnTypeWillChange]
=======
     * @return \ArrayIterator An \ArrayIterator instance
     */
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    public function getIterator()
    {
        return new \ArrayIterator($this->headers);
    }

    /**
     * Returns the number of headers.
     *
<<<<<<< HEAD
     * @return int
     */
    #[\ReturnTypeWillChange]
    public function count()
    {
        return \count($this->headers);
=======
     * @return int The number of headers
     */
    public function count()
    {
        return count($this->headers);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    protected function getCacheControlHeader()
    {
<<<<<<< HEAD
        ksort($this->cacheControl);

        return HeaderUtils::toString($this->cacheControl, ',');
=======
        $parts = array();
        ksort($this->cacheControl);
        foreach ($this->cacheControl as $key => $value) {
            if (true === $value) {
                $parts[] = $key;
            } else {
                if (preg_match('#[^a-zA-Z0-9._-]#', $value)) {
                    $value = '"'.$value.'"';
                }

                $parts[] = "$key=$value";
            }
        }

        return implode(', ', $parts);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Parses a Cache-Control HTTP header.
     *
<<<<<<< HEAD
     * @return array
     */
    protected function parseCacheControl(string $header)
    {
        $parts = HeaderUtils::split($header, ',=');

        return HeaderUtils::combine($parts);
=======
     * @param string $header The value of the Cache-Control HTTP header
     *
     * @return array An array representing the attribute values
     */
    protected function parseCacheControl($header)
    {
        $cacheControl = array();
        preg_match_all('#([a-zA-Z][a-zA-Z_-]*)\s*(?:=(?:"([^"]*)"|([^ \t",;]*)))?#', $header, $matches, PREG_SET_ORDER);
        foreach ($matches as $match) {
            $cacheControl[strtolower($match[1])] = isset($match[3]) ? $match[3] : (isset($match[2]) ? $match[2] : true);
        }

        return $cacheControl;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }
}
