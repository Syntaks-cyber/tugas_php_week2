<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\Exception;

/**
<<<<<<< HEAD
=======
 * UnauthorizedHttpException.
 *
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
 * @author Ben Ramsey <ben@benramsey.com>
 */
class UnauthorizedHttpException extends HttpException
{
    /**
<<<<<<< HEAD
     * @param string          $challenge WWW-Authenticate challenge string
     * @param string|null     $message   The internal exception message
     * @param \Throwable|null $previous  The previous exception
     * @param int|null        $code      The internal exception code
     */
    public function __construct(string $challenge, ?string $message = '', \Throwable $previous = null, ?int $code = 0, array $headers = [])
    {
        if (null === $message) {
            trigger_deprecation('symfony/http-kernel', '5.3', 'Passing null as $message to "%s()" is deprecated, pass an empty string instead.', __METHOD__);

            $message = '';
        }
        if (null === $code) {
            trigger_deprecation('symfony/http-kernel', '5.3', 'Passing null as $code to "%s()" is deprecated, pass 0 instead.', __METHOD__);

            $code = 0;
        }

        $headers['WWW-Authenticate'] = $challenge;
=======
     * Constructor.
     *
     * @param string     $challenge WWW-Authenticate challenge string
     * @param string     $message   The internal exception message
     * @param \Exception $previous  The previous exception
     * @param int        $code      The internal exception code
     */
    public function __construct($challenge, $message = null, \Exception $previous = null, $code = 0)
    {
        $headers = array('WWW-Authenticate' => $challenge);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        parent::__construct(401, $message, $previous, $headers, $code);
    }
}
