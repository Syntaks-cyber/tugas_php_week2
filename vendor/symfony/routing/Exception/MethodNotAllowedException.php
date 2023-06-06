<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Routing\Exception;

/**
 * The resource was found but the request method is not allowed.
 *
 * This exception should trigger an HTTP 405 response in your application code.
 *
 * @author Kris Wallsmith <kris@symfony.com>
 */
class MethodNotAllowedException extends \RuntimeException implements ExceptionInterface
{
<<<<<<< HEAD
    protected $allowedMethods = [];

    /**
     * @param string[] $allowedMethods
     */
    public function __construct(array $allowedMethods, ?string $message = '', int $code = 0, \Throwable $previous = null)
    {
        if (null === $message) {
            trigger_deprecation('symfony/routing', '5.3', 'Passing null as $message to "%s()" is deprecated, pass an empty string instead.', __METHOD__);

            $message = '';
        }

=======
    /**
     * @var array
     */
    protected $allowedMethods = array();

    public function __construct(array $allowedMethods, $message = null, $code = 0, \Exception $previous = null)
    {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $this->allowedMethods = array_map('strtoupper', $allowedMethods);

        parent::__construct($message, $code, $previous);
    }

    /**
     * Gets the allowed HTTP methods.
     *
<<<<<<< HEAD
     * @return string[]
=======
     * @return array
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getAllowedMethods()
    {
        return $this->allowedMethods;
    }
}
