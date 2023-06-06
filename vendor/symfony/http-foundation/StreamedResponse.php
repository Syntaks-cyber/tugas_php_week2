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
 * StreamedResponse represents a streamed HTTP response.
 *
 * A StreamedResponse uses a callback for its content.
 *
 * The callback should use the standard PHP functions like echo
<<<<<<< HEAD
 * to stream the response back to the client. The flush() function
=======
 * to stream the response back to the client. The flush() method
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
 * can also be used if needed.
 *
 * @see flush()
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class StreamedResponse extends Response
{
    protected $callback;
    protected $streamed;
<<<<<<< HEAD
    private $headersSent;

    public function __construct(callable $callback = null, int $status = 200, array $headers = [])
=======

    /**
     * Constructor.
     *
     * @param callable|null $callback A valid PHP callback or null to set it later
     * @param int           $status   The response status code
     * @param array         $headers  An array of response headers
     */
    public function __construct(callable $callback = null, $status = 200, $headers = array())
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        parent::__construct(null, $status, $headers);

        if (null !== $callback) {
            $this->setCallback($callback);
        }
        $this->streamed = false;
<<<<<<< HEAD
        $this->headersSent = false;
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Factory method for chainability.
     *
     * @param callable|null $callback A valid PHP callback or null to set it later
<<<<<<< HEAD
     *
     * @return static
     *
     * @deprecated since Symfony 5.1, use __construct() instead.
     */
    public static function create($callback = null, int $status = 200, array $headers = [])
    {
        trigger_deprecation('symfony/http-foundation', '5.1', 'The "%s()" method is deprecated, use "new %s()" instead.', __METHOD__, static::class);

=======
     * @param int           $status   The response status code
     * @param array         $headers  An array of response headers
     *
     * @return StreamedResponse
     */
    public static function create($callback = null, $status = 200, $headers = array())
    {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        return new static($callback, $status, $headers);
    }

    /**
     * Sets the PHP callback associated with this Response.
     *
<<<<<<< HEAD
     * @return $this
=======
     * @param callable $callback A valid PHP callback
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function setCallback(callable $callback)
    {
        $this->callback = $callback;
<<<<<<< HEAD

        return $this;
    }

    /**
     * {@inheritdoc}
     *
     * This method only sends the headers once.
     *
     * @return $this
     */
    public function sendHeaders()
    {
        if ($this->headersSent) {
            return $this;
        }

        $this->headersSent = true;

        return parent::sendHeaders();
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * {@inheritdoc}
     *
     * This method only sends the content once.
<<<<<<< HEAD
     *
     * @return $this
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function sendContent()
    {
        if ($this->streamed) {
<<<<<<< HEAD
            return $this;
=======
            return;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        $this->streamed = true;

        if (null === $this->callback) {
            throw new \LogicException('The Response callback must not be null.');
        }

<<<<<<< HEAD
        ($this->callback)();

        return $this;
=======
        call_user_func($this->callback);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * {@inheritdoc}
     *
     * @throws \LogicException when the content is not null
<<<<<<< HEAD
     *
     * @return $this
     */
    public function setContent(?string $content)
=======
     */
    public function setContent($content)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if (null !== $content) {
            throw new \LogicException('The content cannot be set on a StreamedResponse instance.');
        }
<<<<<<< HEAD

        $this->streamed = true;

        return $this;
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * {@inheritdoc}
<<<<<<< HEAD
=======
     *
     * @return false
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getContent()
    {
        return false;
    }
}
