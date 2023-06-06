<?php
<<<<<<< HEAD
/**
 * Mockery
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://github.com/padraic/mockery/blob/master/LICENSE
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to padraic@php.net so we can send you a copy immediately.
 *
 * @category   Mockery
 * @package    Mockery
 * @copyright  Copyright (c) 2010 Pádraic Brady (http://blog.astrumfutura.com)
 * @license    http://github.com/padraic/mockery/blob/master/LICENSE New BSD License
 */
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

namespace Mockery\Generator\StringManipulation\Pass;

use Mockery\Generator\Method;
<<<<<<< HEAD
use Mockery\Generator\Parameter;
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
use Mockery\Generator\MockConfiguration;

class MethodDefinitionPass implements Pass
{
    public function apply($code, MockConfiguration $config)
    {
        foreach ($config->getMethodsToMock() as $method) {
            if ($method->isPublic()) {
                $methodDef = 'public';
            } elseif ($method->isProtected()) {
                $methodDef = 'protected';
            } else {
                $methodDef = 'private';
            }

            if ($method->isStatic()) {
                $methodDef .= ' static';
            }

            $methodDef .= ' function ';
            $methodDef .= $method->returnsReference() ? ' & ' : '';
            $methodDef .= $method->getName();
            $methodDef .= $this->renderParams($method, $config);
            $methodDef .= $this->renderReturnType($method);
            $methodDef .= $this->renderMethodBody($method, $config);

            $code = $this->appendToClass($code, $methodDef);
        }

        return $code;
    }

    protected function renderParams(Method $method, $config)
    {
        $class = $method->getDeclaringClass();
        if ($class->isInternal()) {
            $overrides = $config->getParameterOverrides();

            if (isset($overrides[strtolower($class->getName())][$method->getName()])) {
                return '(' . implode(',', $overrides[strtolower($class->getName())][$method->getName()]) . ')';
            }
        }

        $methodParams = array();
        $params = $method->getParameters();
        foreach ($params as $param) {
<<<<<<< HEAD
            $paramDef = $this->renderTypeHint($param);
=======
            $paramDef = $param->getTypeHintAsString();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $paramDef .= $param->isPassedByReference() ? '&' : '';
            $paramDef .= $param->isVariadic() ? '...' : '';
            $paramDef .= '$' . $param->getName();

            if (!$param->isVariadic()) {
                if (false !== $param->isDefaultValueAvailable()) {
                    $paramDef .= ' = ' . var_export($param->getDefaultValue(), true);
                } elseif ($param->isOptional()) {
                    $paramDef .= ' = null';
                }
            }

            $methodParams[] = $paramDef;
        }
        return '(' . implode(', ', $methodParams) . ')';
    }

    protected function renderReturnType(Method $method)
    {
        $type = $method->getReturnType();
<<<<<<< HEAD

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        return $type ? sprintf(': %s', $type) : '';
    }

    protected function appendToClass($class, $code)
    {
        $lastBrace = strrpos($class, "}");
        $class = substr($class, 0, $lastBrace) . $code . "\n    }\n";
        return $class;
    }

<<<<<<< HEAD
    protected function renderTypeHint(Parameter $param)
    {
        $typeHint = $param->getTypeHint();

        return $typeHint === null ? '' : sprintf('%s ', $typeHint);
    }

    private function renderMethodBody($method, $config)
    {
=======
    private function renderMethodBody($method, $config)
    {
        /** @var \ReflectionMethod $method */
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $invoke = $method->isStatic() ? 'static::_mockery_handleStaticMethodCall' : '$this->_mockery_handleMethodCall';
        $body = <<<BODY
{
\$argc = func_num_args();
\$argv = func_get_args();

BODY;

        // Fix up known parameters by reference - used func_get_args() above
        // in case more parameters are passed in than the function definition
        // says - eg varargs.
        $class = $method->getDeclaringClass();
        $class_name = strtolower($class->getName());
        $overrides = $config->getParameterOverrides();
        if (isset($overrides[$class_name][$method->getName()])) {
            $params = array_values($overrides[$class_name][$method->getName()]);
            $paramCount = count($params);
            for ($i = 0; $i < $paramCount; ++$i) {
                $param = $params[$i];
                if (strpos($param, '&') !== false) {
<<<<<<< HEAD
=======
                    if (($stripDefaultValue = strpos($param, '=')) !== false) {
                        $param = trim(substr($param, 0, $stripDefaultValue));
                    }
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    $body .= <<<BODY
if (\$argc > $i) {
    \$argv[$i] = {$param};
}

BODY;
                }
            }
        } else {
<<<<<<< HEAD
=======
            /** @var \ReflectionParameter[] $params */
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $params = array_values($method->getParameters());
            $paramCount = count($params);
            for ($i = 0; $i < $paramCount; ++$i) {
                $param = $params[$i];
                if (!$param->isPassedByReference()) {
                    continue;
                }
                $body .= <<<BODY
if (\$argc > $i) {
    \$argv[$i] =& \${$param->getName()};
}

BODY;
            }
        }

<<<<<<< HEAD
        $body .= "\$ret = {$invoke}(__FUNCTION__, \$argv);\n";

        if ($method->getReturnType() !== "void") {
            $body .= "return \$ret;\n";
        }

        $body .= "}\n";
        return $body;
    }
=======
        $body .= $this->getReturnStatement($method, $invoke);

        return $body;
    }

    private function getReturnStatement($method, $invoke)
    {
        if ($method->getReturnType() === 'void') {
            return <<<BODY
{$invoke}(__FUNCTION__, \$argv);
}
BODY;
        }

        return <<<BODY
\$ret = {$invoke}(__FUNCTION__, \$argv);
return \$ret;
}
BODY;
    }
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
}
