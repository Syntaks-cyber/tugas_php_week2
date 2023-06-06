<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\DataCollector;

<<<<<<< HEAD
use Symfony\Component\ErrorHandler\Exception\FlattenException;
=======
use Symfony\Component\Debug\Exception\FlattenException;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
<<<<<<< HEAD
 * @author Fabien Potencier <fabien@symfony.com>
 *
 * @final
=======
 * ExceptionDataCollector.
 *
 * @author Fabien Potencier <fabien@symfony.com>
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
 */
class ExceptionDataCollector extends DataCollector
{
    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function collect(Request $request, Response $response, \Throwable $exception = null)
    {
        if (null !== $exception) {
            $this->data = [
                'exception' => FlattenException::createFromThrowable($exception),
            ];
=======
    public function collect(Request $request, Response $response, \Exception $exception = null)
    {
        if (null !== $exception) {
            $this->data = array(
                'exception' => FlattenException::create($exception),
            );
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }
    }

    /**
<<<<<<< HEAD
     * {@inheritdoc}
     */
    public function reset()
    {
        $this->data = [];
    }

    public function hasException(): bool
=======
     * Checks if the exception is not null.
     *
     * @return bool true if the exception is not null, false otherwise
     */
    public function hasException()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return isset($this->data['exception']);
    }

    /**
<<<<<<< HEAD
     * @return \Exception|FlattenException
=======
     * Gets the exception.
     *
     * @return \Exception The exception
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getException()
    {
        return $this->data['exception'];
    }

<<<<<<< HEAD
    public function getMessage(): string
=======
    /**
     * Gets the exception message.
     *
     * @return string The exception message
     */
    public function getMessage()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->data['exception']->getMessage();
    }

<<<<<<< HEAD
    public function getCode(): int
=======
    /**
     * Gets the exception code.
     *
     * @return int The exception code
     */
    public function getCode()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->data['exception']->getCode();
    }

<<<<<<< HEAD
    public function getStatusCode(): int
=======
    /**
     * Gets the status code.
     *
     * @return int The status code
     */
    public function getStatusCode()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->data['exception']->getStatusCode();
    }

<<<<<<< HEAD
    public function getTrace(): array
=======
    /**
     * Gets the exception trace.
     *
     * @return array The exception trace
     */
    public function getTrace()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->data['exception']->getTrace();
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function getName(): string
=======
    public function getName()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return 'exception';
    }
}
