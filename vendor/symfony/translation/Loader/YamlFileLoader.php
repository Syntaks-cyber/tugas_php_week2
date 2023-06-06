<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Translation\Loader;

use Symfony\Component\Translation\Exception\InvalidResourceException;
use Symfony\Component\Translation\Exception\LogicException;
use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Yaml\Parser as YamlParser;
<<<<<<< HEAD
use Symfony\Component\Yaml\Yaml;
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

/**
 * YamlFileLoader loads translations from Yaml files.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class YamlFileLoader extends FileLoader
{
    private $yamlParser;

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    protected function loadResource(string $resource)
    {
        if (null === $this->yamlParser) {
            if (!class_exists(\Symfony\Component\Yaml\Parser::class)) {
=======
    protected function loadResource($resource)
    {
        if (null === $this->yamlParser) {
            if (!class_exists('Symfony\Component\Yaml\Parser')) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                throw new LogicException('Loading translations from the YAML format requires the Symfony Yaml component.');
            }

            $this->yamlParser = new YamlParser();
        }

<<<<<<< HEAD
        try {
            $messages = $this->yamlParser->parseFile($resource, Yaml::PARSE_CONSTANT);
        } catch (ParseException $e) {
            throw new InvalidResourceException(sprintf('The file "%s" does not contain valid YAML: ', $resource).$e->getMessage(), 0, $e);
=======
        $prevErrorHandler = set_error_handler(function ($level, $message, $script, $line) use ($resource, &$prevErrorHandler) {
            $message = \E_USER_DEPRECATED === $level ? preg_replace('/ on line \d+/', ' in "'.$resource.'"$0', $message) : $message;

            return $prevErrorHandler ? $prevErrorHandler($level, $message, $script, $line) : false;
        });

        try {
            $messages = $this->yamlParser->parseFile($resource);
        } catch (ParseException $e) {
            throw new InvalidResourceException(sprintf('The file "%s" does not contain valid YAML: ', $resource).$e->getMessage(), 0, $e);
        } finally {
            restore_error_handler();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        if (null !== $messages && !\is_array($messages)) {
            throw new InvalidResourceException(sprintf('Unable to load file "%s".', $resource));
        }

        return $messages ?: [];
    }
}
