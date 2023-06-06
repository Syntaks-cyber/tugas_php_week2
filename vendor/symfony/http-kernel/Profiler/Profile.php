<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\Profiler;

use Symfony\Component\HttpKernel\DataCollector\DataCollectorInterface;

/**
 * Profile.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class Profile
{
    private $token;

    /**
     * @var DataCollectorInterface[]
     */
<<<<<<< HEAD
    private $collectors = [];
=======
    private $collectors = array();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    private $ip;
    private $method;
    private $url;
    private $time;
    private $statusCode;

    /**
     * @var Profile
     */
    private $parent;

    /**
     * @var Profile[]
     */
<<<<<<< HEAD
    private $children = [];

    public function __construct(string $token)
=======
    private $children = array();

    /**
     * Constructor.
     *
     * @param string $token The token
     */
    public function __construct($token)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->token = $token;
    }

<<<<<<< HEAD
    public function setToken(string $token)
=======
    /**
     * Sets the token.
     *
     * @param string $token The token
     */
    public function setToken($token)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->token = $token;
    }

    /**
     * Gets the token.
     *
<<<<<<< HEAD
     * @return string
=======
     * @return string The token
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Sets the parent token.
<<<<<<< HEAD
     */
    public function setParent(self $parent)
=======
     *
     * @param Profile $parent The parent Profile
     */
    public function setParent(Profile $parent)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->parent = $parent;
    }

    /**
     * Returns the parent profile.
     *
<<<<<<< HEAD
     * @return self|null
=======
     * @return Profile The parent profile
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Returns the parent token.
     *
<<<<<<< HEAD
     * @return string|null
=======
     * @return null|string The parent token
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getParentToken()
    {
        return $this->parent ? $this->parent->getToken() : null;
    }

    /**
     * Returns the IP.
     *
<<<<<<< HEAD
     * @return string|null
=======
     * @return string The IP
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getIp()
    {
        return $this->ip;
    }

<<<<<<< HEAD
    public function setIp(?string $ip)
=======
    /**
     * Sets the IP.
     *
     * @param string $ip
     */
    public function setIp($ip)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->ip = $ip;
    }

    /**
     * Returns the request method.
     *
<<<<<<< HEAD
     * @return string|null
=======
     * @return string The request method
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getMethod()
    {
        return $this->method;
    }

<<<<<<< HEAD
    public function setMethod(string $method)
=======
    public function setMethod($method)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->method = $method;
    }

    /**
     * Returns the URL.
     *
<<<<<<< HEAD
     * @return string|null
=======
     * @return string The URL
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getUrl()
    {
        return $this->url;
    }

<<<<<<< HEAD
    public function setUrl(?string $url)
=======
    public function setUrl($url)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->url = $url;
    }

    /**
<<<<<<< HEAD
     * @return int
     */
    public function getTime()
    {
        return $this->time ?? 0;
    }

    public function setTime(int $time)
=======
     * Returns the time.
     *
     * @return string The time
     */
    public function getTime()
    {
        if (null === $this->time) {
            return 0;
        }

        return $this->time;
    }

    public function setTime($time)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->time = $time;
    }

<<<<<<< HEAD
    public function setStatusCode(int $statusCode)
=======
    /**
     * @param int $statusCode
     */
    public function setStatusCode($statusCode)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->statusCode = $statusCode;
    }

    /**
<<<<<<< HEAD
     * @return int|null
=======
     * @return int
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * Finds children profilers.
     *
<<<<<<< HEAD
     * @return self[]
=======
     * @return Profile[] An array of Profile
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Sets children profiler.
     *
<<<<<<< HEAD
     * @param Profile[] $children
     */
    public function setChildren(array $children)
    {
        $this->children = [];
=======
     * @param Profile[] $children An array of Profile
     */
    public function setChildren(array $children)
    {
        $this->children = array();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        foreach ($children as $child) {
            $this->addChild($child);
        }
    }

    /**
     * Adds the child token.
<<<<<<< HEAD
     */
    public function addChild(self $child)
=======
     *
     * @param Profile $child The child Profile
     */
    public function addChild(Profile $child)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->children[] = $child;
        $child->setParent($this);
    }

<<<<<<< HEAD
    public function getChildByToken(string $token): ?self
    {
        foreach ($this->children as $child) {
            if ($token === $child->getToken()) {
                return $child;
            }
        }

        return null;
    }

    /**
     * Gets a Collector by name.
     *
     * @return DataCollectorInterface
     *
     * @throws \InvalidArgumentException if the collector does not exist
     */
    public function getCollector(string $name)
=======
    /**
     * Gets a Collector by name.
     *
     * @param string $name A collector name
     *
     * @return DataCollectorInterface A DataCollectorInterface instance
     *
     * @throws \InvalidArgumentException if the collector does not exist
     */
    public function getCollector($name)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if (!isset($this->collectors[$name])) {
            throw new \InvalidArgumentException(sprintf('Collector "%s" does not exist.', $name));
        }

        return $this->collectors[$name];
    }

    /**
     * Gets the Collectors associated with this profile.
     *
     * @return DataCollectorInterface[]
     */
    public function getCollectors()
    {
        return $this->collectors;
    }

    /**
     * Sets the Collectors associated with this profile.
     *
     * @param DataCollectorInterface[] $collectors
     */
    public function setCollectors(array $collectors)
    {
<<<<<<< HEAD
        $this->collectors = [];
=======
        $this->collectors = array();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        foreach ($collectors as $collector) {
            $this->addCollector($collector);
        }
    }

    /**
     * Adds a Collector.
<<<<<<< HEAD
=======
     *
     * @param DataCollectorInterface $collector A DataCollectorInterface instance
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function addCollector(DataCollectorInterface $collector)
    {
        $this->collectors[$collector->getName()] = $collector;
    }

    /**
<<<<<<< HEAD
     * @return bool
     */
    public function hasCollector(string $name)
=======
     * Returns true if a Collector for the given name exists.
     *
     * @param string $name A collector name
     *
     * @return bool
     */
    public function hasCollector($name)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return isset($this->collectors[$name]);
    }

<<<<<<< HEAD
    /**
     * @return array
     */
    public function __sleep()
    {
        return ['token', 'parent', 'children', 'collectors', 'ip', 'method', 'url', 'time', 'statusCode'];
=======
    public function __sleep()
    {
        return array('token', 'parent', 'children', 'collectors', 'ip', 'method', 'url', 'time');
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }
}
