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

use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * FileBag is a container for uploaded files.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 * @author Bulat Shakirzyanov <mallluhuct@gmail.com>
 */
class FileBag extends ParameterBag
{
<<<<<<< HEAD
    private const FILE_KEYS = ['error', 'name', 'size', 'tmp_name', 'type'];

    /**
     * @param array|UploadedFile[] $parameters An array of HTTP files
     */
    public function __construct(array $parameters = [])
=======
    private static $fileKeys = array('error', 'name', 'size', 'tmp_name', 'type');

    /**
     * Constructor.
     *
     * @param array $parameters An array of HTTP files
     */
    public function __construct(array $parameters = array())
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->replace($parameters);
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function replace(array $files = [])
    {
        $this->parameters = [];
=======
    public function replace(array $files = array())
    {
        $this->parameters = array();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $this->add($files);
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function set(string $key, $value)
    {
        if (!\is_array($value) && !$value instanceof UploadedFile) {
=======
    public function set($key, $value)
    {
        if (!is_array($value) && !$value instanceof UploadedFile) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            throw new \InvalidArgumentException('An uploaded file must be an array or an instance of UploadedFile.');
        }

        parent::set($key, $this->convertFileInformation($value));
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function add(array $files = [])
=======
    public function add(array $files = array())
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        foreach ($files as $key => $file) {
            $this->set($key, $file);
        }
    }

    /**
     * Converts uploaded files to UploadedFile instances.
     *
     * @param array|UploadedFile $file A (multi-dimensional) array of uploaded file information
     *
<<<<<<< HEAD
     * @return UploadedFile[]|UploadedFile|null
=======
     * @return array A (multi-dimensional) array of UploadedFile instances
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    protected function convertFileInformation($file)
    {
        if ($file instanceof UploadedFile) {
            return $file;
        }

        $file = $this->fixPhpFilesArray($file);
<<<<<<< HEAD
        $keys = array_keys($file);
        sort($keys);

        if (self::FILE_KEYS == $keys) {
            if (\UPLOAD_ERR_NO_FILE == $file['error']) {
                $file = null;
            } else {
                $file = new UploadedFile($file['tmp_name'], $file['name'], $file['type'], $file['error'], false);
            }
        } else {
            $file = array_map(function ($v) { return $v instanceof UploadedFile || \is_array($v) ? $this->convertFileInformation($v) : $v; }, $file);
            if (array_keys($keys) === $keys) {
                $file = array_filter($file);
=======
        if (is_array($file)) {
            $keys = array_keys($file);
            sort($keys);

            if ($keys == self::$fileKeys) {
                if (UPLOAD_ERR_NO_FILE == $file['error']) {
                    $file = null;
                } else {
                    $file = new UploadedFile($file['tmp_name'], $file['name'], $file['type'], $file['size'], $file['error']);
                }
            } else {
                $file = array_map(array($this, 'convertFileInformation'), $file);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            }
        }

        return $file;
    }

    /**
     * Fixes a malformed PHP $_FILES array.
     *
     * PHP has a bug that the format of the $_FILES array differs, depending on
     * whether the uploaded file fields had normal field names or array-like
     * field names ("normal" vs. "parent[child]").
     *
     * This method fixes the array to look like the "normal" $_FILES array.
     *
     * It's safe to pass an already converted array, in which case this method
     * just returns the original array unmodified.
     *
<<<<<<< HEAD
     * @return array
     */
    protected function fixPhpFilesArray(array $data)
    {
        // Remove extra key added by PHP 8.1.
        unset($data['full_path']);
        $keys = array_keys($data);
        sort($keys);

        if (self::FILE_KEYS != $keys || !isset($data['name']) || !\is_array($data['name'])) {
=======
     * @param array $data
     *
     * @return array
     */
    protected function fixPhpFilesArray($data)
    {
        if (!is_array($data)) {
            return $data;
        }

        $keys = array_keys($data);
        sort($keys);

        if (self::$fileKeys != $keys || !isset($data['name']) || !is_array($data['name'])) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            return $data;
        }

        $files = $data;
<<<<<<< HEAD
        foreach (self::FILE_KEYS as $k) {
=======
        foreach (self::$fileKeys as $k) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            unset($files[$k]);
        }

        foreach ($data['name'] as $key => $name) {
<<<<<<< HEAD
            $files[$key] = $this->fixPhpFilesArray([
=======
            $files[$key] = $this->fixPhpFilesArray(array(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                'error' => $data['error'][$key],
                'name' => $name,
                'type' => $data['type'][$key],
                'tmp_name' => $data['tmp_name'][$key],
                'size' => $data['size'][$key],
<<<<<<< HEAD
            ]);
=======
            ));
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        return $files;
    }
}
