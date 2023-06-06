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
namespace SebastianBergmann\GlobalState;

=======

namespace SebastianBergmann\GlobalState;

use ReflectionProperty;

>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
/**
 * Restorer of snapshots of global state.
 */
class Restorer
{
    /**
     * Deletes function definitions that are not defined in a snapshot.
     *
<<<<<<< HEAD
     * @throws RuntimeException when the uopz_delete() function is not available
     *
     * @see https://github.com/krakjoe/uopz
     */
    public function restoreFunctions(Snapshot $snapshot): void
    {
        if (!\function_exists('uopz_delete')) {
            throw new RuntimeException('The uopz_delete() function is required for this operation');
        }

        $functions = \get_defined_functions();

        foreach (\array_diff($functions['user'], $snapshot->functions()) as $function) {
=======
     * @param  Snapshot         $snapshot
     * @throws RuntimeException when the uopz_delete() function is not available
     * @see    https://github.com/krakjoe/uopz
     */
    public function restoreFunctions(Snapshot $snapshot)
    {
        if (!function_exists('uopz_delete')) {
            throw new RuntimeException('The uopz_delete() function is required for this operation');
        }

        $functions = get_defined_functions();

        foreach (array_diff($functions['user'], $snapshot->functions()) as $function) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            uopz_delete($function);
        }
    }

    /**
     * Restores all global and super-global variables from a snapshot.
<<<<<<< HEAD
     */
    public function restoreGlobalVariables(Snapshot $snapshot): void
=======
     *
     * @param Snapshot $snapshot
     */
    public function restoreGlobalVariables(Snapshot $snapshot)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $superGlobalArrays = $snapshot->superGlobalArrays();

        foreach ($superGlobalArrays as $superGlobalArray) {
            $this->restoreSuperGlobalArray($snapshot, $superGlobalArray);
        }

        $globalVariables = $snapshot->globalVariables();

<<<<<<< HEAD
        foreach (\array_keys($GLOBALS) as $key) {
            if ($key !== 'GLOBALS' &&
                !\in_array($key, $superGlobalArrays) &&
                !$snapshot->blacklist()->isGlobalVariableBlacklisted($key)) {
                if (\array_key_exists($key, $globalVariables)) {
=======
        foreach (array_keys($GLOBALS) as $key) {
            if ($key != 'GLOBALS' &&
                !in_array($key, $superGlobalArrays) &&
                !$snapshot->blacklist()->isGlobalVariableBlacklisted($key)) {
                if (isset($globalVariables[$key])) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    $GLOBALS[$key] = $globalVariables[$key];
                } else {
                    unset($GLOBALS[$key]);
                }
            }
        }
    }

    /**
     * Restores all static attributes in user-defined classes from this snapshot.
<<<<<<< HEAD
     */
    public function restoreStaticAttributes(Snapshot $snapshot): void
    {
        $current    = new Snapshot($snapshot->blacklist(), false, false, false, false, true, false, false, false, false);
        $newClasses = \array_diff($current->classes(), $snapshot->classes());

=======
     *
     * @param Snapshot $snapshot
     */
    public function restoreStaticAttributes(Snapshot $snapshot)
    {
        $current    = new Snapshot($snapshot->blacklist(), false, false, false, false, true, false, false, false, false);
        $newClasses = array_diff($current->classes(), $snapshot->classes());
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        unset($current);

        foreach ($snapshot->staticAttributes() as $className => $staticAttributes) {
            foreach ($staticAttributes as $name => $value) {
<<<<<<< HEAD
                $reflector = new \ReflectionProperty($className, $name);
=======
                $reflector = new ReflectionProperty($className, $name);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                $reflector->setAccessible(true);
                $reflector->setValue($value);
            }
        }

        foreach ($newClasses as $className) {
            $class    = new \ReflectionClass($className);
            $defaults = $class->getDefaultProperties();

            foreach ($class->getProperties() as $attribute) {
                if (!$attribute->isStatic()) {
                    continue;
                }

                $name = $attribute->getName();

                if ($snapshot->blacklist()->isStaticAttributeBlacklisted($className, $name)) {
                    continue;
                }

                if (!isset($defaults[$name])) {
                    continue;
                }

                $attribute->setAccessible(true);
                $attribute->setValue($defaults[$name]);
            }
        }
    }

    /**
     * Restores a super-global variable array from this snapshot.
<<<<<<< HEAD
     */
    private function restoreSuperGlobalArray(Snapshot $snapshot, string $superGlobalArray): void
=======
     *
     * @param Snapshot $snapshot
     * @param $superGlobalArray
     */
    private function restoreSuperGlobalArray(Snapshot $snapshot, $superGlobalArray)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $superGlobalVariables = $snapshot->superGlobalVariables();

        if (isset($GLOBALS[$superGlobalArray]) &&
<<<<<<< HEAD
            \is_array($GLOBALS[$superGlobalArray]) &&
            isset($superGlobalVariables[$superGlobalArray])) {
            $keys = \array_keys(
                \array_merge(
=======
            is_array($GLOBALS[$superGlobalArray]) &&
            isset($superGlobalVariables[$superGlobalArray])) {
            $keys = array_keys(
                array_merge(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    $GLOBALS[$superGlobalArray],
                    $superGlobalVariables[$superGlobalArray]
                )
            );

            foreach ($keys as $key) {
                if (isset($superGlobalVariables[$superGlobalArray][$key])) {
                    $GLOBALS[$superGlobalArray][$key] = $superGlobalVariables[$superGlobalArray][$key];
                } else {
                    unset($GLOBALS[$superGlobalArray][$key]);
                }
            }
        }
    }
}
