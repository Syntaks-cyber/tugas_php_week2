<<<<<<< HEAD
<?php declare(strict_types=1);
/*
 * This file is part of sebastian/global-state.
=======
<?php
/*
 * This file is part of the GlobalState package.
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
<<<<<<< HEAD
=======

>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
namespace SebastianBergmann\GlobalState;

/**
 * Exports parts of a Snapshot as PHP code.
 */
<<<<<<< HEAD
final class CodeExporter
{
    public function constants(Snapshot $snapshot): string
=======
class CodeExporter
{
    /**
     * @param  Snapshot $snapshot
     * @return string
     */
    public function constants(Snapshot $snapshot)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $result = '';

        foreach ($snapshot->constants() as $name => $value) {
<<<<<<< HEAD
            $result .= \sprintf(
=======
            $result .= sprintf(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                'if (!defined(\'%s\')) define(\'%s\', %s);' . "\n",
                $name,
                $name,
                $this->exportVariable($value)
            );
        }

        return $result;
    }

<<<<<<< HEAD
    public function globalVariables(Snapshot $snapshot): string
    {
        $result = '$GLOBALS = [];' . \PHP_EOL;

        foreach ($snapshot->globalVariables() as $name => $value) {
            $result .= \sprintf(
                '$GLOBALS[%s] = %s;' . \PHP_EOL,
                $this->exportVariable($name),
                $this->exportVariable($value)
            );
        }

        return $result;
    }

    public function iniSettings(Snapshot $snapshot): string
=======
    /**
     * @param  Snapshot $snapshot
     * @return string
     */
    public function iniSettings(Snapshot $snapshot)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $result = '';

        foreach ($snapshot->iniSettings() as $key => $value) {
<<<<<<< HEAD
            $result .= \sprintf(
=======
            $result .= sprintf(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                '@ini_set(%s, %s);' . "\n",
                $this->exportVariable($key),
                $this->exportVariable($value)
            );
        }

        return $result;
    }

<<<<<<< HEAD
    private function exportVariable($variable): string
    {
        if (\is_scalar($variable) || null === $variable ||
            (\is_array($variable) && $this->arrayOnlyContainsScalars($variable))) {
            return \var_export($variable, true);
        }

        return 'unserialize(' . \var_export(\serialize($variable), true) . ')';
    }

    private function arrayOnlyContainsScalars(array $array): bool
=======
    /**
     * @param  mixed  $variable
     * @return string
     */
    private function exportVariable($variable)
    {
        if (is_scalar($variable) || is_null($variable) ||
            (is_array($variable) && $this->arrayOnlyContainsScalars($variable))) {
            return var_export($variable, true);
        }

        return 'unserialize(' . var_export(serialize($variable), true) . ')';
    }

    /**
     * @param  array $array
     * @return bool
     */
    private function arrayOnlyContainsScalars(array $array)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $result = true;

        foreach ($array as $element) {
<<<<<<< HEAD
            if (\is_array($element)) {
                $result = $this->arrayOnlyContainsScalars($element);
            } elseif (!\is_scalar($element) && null !== $element) {
=======
            if (is_array($element)) {
                $result = self::arrayOnlyContainsScalars($element);
            } elseif (!is_scalar($element) && !is_null($element)) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                $result = false;
            }

            if ($result === false) {
                break;
            }
        }

        return $result;
    }
}
