<<<<<<< HEAD
<?php declare(strict_types=1);
=======
<?php
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
<<<<<<< HEAD
namespace PHPUnit\Framework\Constraint;

use function get_resource_type;
use function is_array;
use function is_bool;
use function is_callable;
use function is_float;
use function is_int;
use function is_iterable;
use function is_numeric;
use function is_object;
use function is_resource;
use function is_scalar;
use function is_string;
use function sprintf;
use TypeError;
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

/**
 * Constraint that asserts that the value it is evaluated for is of a
 * specified type.
 *
 * The expected value is passed in the constructor.
<<<<<<< HEAD
 */
final class IsType extends Constraint
{
    /**
     * @var string
     */
    public const TYPE_ARRAY = 'array';

    /**
     * @var string
     */
    public const TYPE_BOOL = 'bool';

    /**
     * @var string
     */
    public const TYPE_FLOAT = 'float';

    /**
     * @var string
     */
    public const TYPE_INT = 'int';

    /**
     * @var string
     */
    public const TYPE_NULL = 'null';

    /**
     * @var string
     */
    public const TYPE_NUMERIC = 'numeric';

    /**
     * @var string
     */
    public const TYPE_OBJECT = 'object';

    /**
     * @var string
     */
    public const TYPE_RESOURCE = 'resource';

    /**
     * @var string
     */
    public const TYPE_STRING = 'string';

    /**
     * @var string
     */
    public const TYPE_SCALAR = 'scalar';

    /**
     * @var string
     */
    public const TYPE_CALLABLE = 'callable';

    /**
     * @var string
     */
    public const TYPE_ITERABLE = 'iterable';

    /**
     * @var array<string,bool>
     */
    private const KNOWN_TYPES = [
=======
 *
 * @since Class available since Release 3.0.0
 */
class PHPUnit_Framework_Constraint_IsType extends PHPUnit_Framework_Constraint
{
    const TYPE_ARRAY    = 'array';
    const TYPE_BOOL     = 'bool';
    const TYPE_FLOAT    = 'float';
    const TYPE_INT      = 'int';
    const TYPE_NULL     = 'null';
    const TYPE_NUMERIC  = 'numeric';
    const TYPE_OBJECT   = 'object';
    const TYPE_RESOURCE = 'resource';
    const TYPE_STRING   = 'string';
    const TYPE_SCALAR   = 'scalar';
    const TYPE_CALLABLE = 'callable';

    /**
     * @var array
     */
    protected $types = array(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        'array'    => true,
        'boolean'  => true,
        'bool'     => true,
        'double'   => true,
        'float'    => true,
        'integer'  => true,
        'int'      => true,
        'null'     => true,
        'numeric'  => true,
        'object'   => true,
        'real'     => true,
        'resource' => true,
        'string'   => true,
        'scalar'   => true,
<<<<<<< HEAD
        'callable' => true,
        'iterable' => true,
    ];
=======
        'callable' => true
    );
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @var string
     */
<<<<<<< HEAD
    private $type;

    /**
     * @throws \PHPUnit\Framework\Exception
     */
    public function __construct(string $type)
    {
        if (!isset(self::KNOWN_TYPES[$type])) {
            throw new \PHPUnit\Framework\Exception(
                sprintf(
                    'Type specified for PHPUnit\Framework\Constraint\IsType <%s> ' .
=======
    protected $type;

    /**
     * @param string $type
     *
     * @throws PHPUnit_Framework_Exception
     */
    public function __construct($type)
    {
        parent::__construct();

        if (!isset($this->types[$type])) {
            throw new PHPUnit_Framework_Exception(
                sprintf(
                    'Type specified for PHPUnit_Framework_Constraint_IsType <%s> ' .
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    'is not a valid type.',
                    $type
                )
            );
        }

        $this->type = $type;
    }

    /**
<<<<<<< HEAD
     * Returns a string representation of the constraint.
     */
    public function toString(): string
    {
        return sprintf(
            'is of type "%s"',
            $this->type
        );
    }

    /**
     * Evaluates the constraint for parameter $other. Returns true if the
     * constraint is met, false otherwise.
     *
     * @param mixed $other value or object to evaluate
     */
    protected function matches($other): bool
=======
     * Evaluates the constraint for parameter $other. Returns true if the
     * constraint is met, false otherwise.
     *
     * @param mixed $other Value or object to evaluate.
     *
     * @return bool
     */
    protected function matches($other)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        switch ($this->type) {
            case 'numeric':
                return is_numeric($other);

            case 'integer':
            case 'int':
<<<<<<< HEAD
                return is_int($other);
=======
                return is_integer($other);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

            case 'double':
            case 'float':
            case 'real':
                return is_float($other);

            case 'string':
                return is_string($other);

            case 'boolean':
            case 'bool':
                return is_bool($other);

            case 'null':
<<<<<<< HEAD
                return null === $other;
=======
                return is_null($other);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

            case 'array':
                return is_array($other);

            case 'object':
                return is_object($other);

            case 'resource':
<<<<<<< HEAD
                if (is_resource($other)) {
                    return true;
                }

                try {
                    $resource = @get_resource_type($other);

                    if (is_string($resource)) {
                        return true;
                    }
                } catch (TypeError $e) {
                }

                return false;
=======
                return is_resource($other) || is_string(@get_resource_type($other));
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

            case 'scalar':
                return is_scalar($other);

            case 'callable':
                return is_callable($other);
<<<<<<< HEAD

            case 'iterable':
                return is_iterable($other);
        }
    }
=======
        }
    }

    /**
     * Returns a string representation of the constraint.
     *
     * @return string
     */
    public function toString()
    {
        return sprintf(
            'is of type "%s"',
            $this->type
        );
    }
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
}
