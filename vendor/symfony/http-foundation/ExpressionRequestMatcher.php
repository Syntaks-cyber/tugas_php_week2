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

use Symfony\Component\ExpressionLanguage\ExpressionLanguage;

/**
 * ExpressionRequestMatcher uses an expression to match a Request.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class ExpressionRequestMatcher extends RequestMatcher
{
    private $language;
    private $expression;

    public function setExpression(ExpressionLanguage $language, $expression)
    {
        $this->language = $language;
        $this->expression = $expression;
    }

    public function matches(Request $request)
    {
        if (!$this->language) {
            throw new \LogicException('Unable to match the request as the expression language is not available.');
        }

<<<<<<< HEAD
        return $this->language->evaluate($this->expression, [
=======
        return $this->language->evaluate($this->expression, array(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            'request' => $request,
            'method' => $request->getMethod(),
            'path' => rawurldecode($request->getPathInfo()),
            'host' => $request->getHost(),
            'ip' => $request->getClientIp(),
            'attributes' => $request->attributes->all(),
<<<<<<< HEAD
        ]) && parent::matches($request);
=======
        )) && parent::matches($request);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }
}
