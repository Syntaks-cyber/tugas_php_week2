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

use function json_decode;
use function json_last_error;
use function sprintf;

/**
 * Constraint that asserts that a string is valid JSON.
 */
final class IsJson extends Constraint
{
    /**
     * Returns a string representation of the constraint.
     */
    public function toString(): string
    {
        return 'is valid JSON';
    }

    /**
     * Evaluates the constraint for parameter $other. Returns true if the
     * constraint is met, false otherwise.
     *
     * @param mixed $other value or object to evaluate
     */
    protected function matches($other): bool
    {
        if ($other === '') {
            return false;
        }

        json_decode($other);

=======

/**
 * Constraint that asserts that a string is valid JSON.
 *
 * @since Class available since Release 3.7.20
 */
class PHPUnit_Framework_Constraint_IsJson extends PHPUnit_Framework_Constraint
{
    /**
     * Evaluates the constraint for parameter $other. Returns true if the
     * constraint is met, false otherwise.
     *
     * @param mixed $other Value or object to evaluate.
     *
     * @return bool
     */
    protected function matches($other)
    {
        json_decode($other);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        if (json_last_error()) {
            return false;
        }

        return true;
    }

    /**
<<<<<<< HEAD
     * Returns the description of the failure.
=======
     * Returns the description of the failure
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     *
     * The beginning of failure messages is "Failed asserting that" in most
     * cases. This method should return the second part of that sentence.
     *
<<<<<<< HEAD
     * @param mixed $other evaluated value or object
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    protected function failureDescription($other): string
    {
        if ($other === '') {
            return 'an empty string is valid JSON';
        }

        json_decode($other);
        $error = JsonMatchesErrorMessageProvider::determineJsonError(
            (string) json_last_error()
=======
     * @param mixed $other Evaluated value or object.
     *
     * @return string
     */
    protected function failureDescription($other)
    {
        json_decode($other);
        $error = PHPUnit_Framework_Constraint_JsonMatches_ErrorMessageProvider::determineJsonError(
            json_last_error()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        );

        return sprintf(
            '%s is valid JSON (%s)',
<<<<<<< HEAD
            $this->exporter()->shortenedExport($other),
            $error
        );
    }
=======
            $this->exporter->shortenedExport($other),
            $error
        );
    }

    /**
     * Returns a string representation of the constraint.
     *
     * @return string
     */
    public function toString()
    {
        return 'is valid JSON';
    }
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
}
