<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpFoundation\File;

<<<<<<< HEAD
use Symfony\Component\HttpFoundation\File\Exception\CannotWriteFileException;
use Symfony\Component\HttpFoundation\File\Exception\ExtensionFileException;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\Exception\FileNotFoundException;
use Symfony\Component\HttpFoundation\File\Exception\FormSizeFileException;
use Symfony\Component\HttpFoundation\File\Exception\IniSizeFileException;
use Symfony\Component\HttpFoundation\File\Exception\NoFileException;
use Symfony\Component\HttpFoundation\File\Exception\NoTmpDirFileException;
use Symfony\Component\HttpFoundation\File\Exception\PartialFileException;
use Symfony\Component\Mime\MimeTypes;
=======
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\Exception\FileNotFoundException;
use Symfony\Component\HttpFoundation\File\MimeType\ExtensionGuesser;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

/**
 * A file uploaded through a form.
 *
 * @author Bernhard Schussek <bschussek@gmail.com>
 * @author Florian Eckerstorfer <florian@eckerstorfer.org>
 * @author Fabien Potencier <fabien@symfony.com>
 */
class UploadedFile extends File
{
<<<<<<< HEAD
    private $test;
    private $originalName;
    private $mimeType;
=======
    /**
     * Whether the test mode is activated.
     *
     * Local files are used in test mode hence the code should not enforce HTTP uploads.
     *
     * @var bool
     */
    private $test = false;

    /**
     * The original name of the uploaded file.
     *
     * @var string
     */
    private $originalName;

    /**
     * The mime type provided by the uploader.
     *
     * @var string
     */
    private $mimeType;

    /**
     * The file size provided by the uploader.
     *
     * @var int|null
     */
    private $size;

    /**
     * The UPLOAD_ERR_XXX constant provided by the uploader.
     *
     * @var int
     */
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    private $error;

    /**
     * Accepts the information of the uploaded file as provided by the PHP global $_FILES.
     *
     * The file object is only created when the uploaded file is valid (i.e. when the
     * isValid() method returns true). Otherwise the only methods that could be called
     * on an UploadedFile instance are:
     *
     *   * getClientOriginalName,
     *   * getClientMimeType,
     *   * isValid,
     *   * getError.
     *
     * Calling any other method on an non-valid instance will cause an unpredictable result.
     *
     * @param string      $path         The full temporary path to the file
<<<<<<< HEAD
     * @param string      $originalName The original file name of the uploaded file
     * @param string|null $mimeType     The type of the file as provided by PHP; null defaults to application/octet-stream
     * @param int|null    $error        The error constant of the upload (one of PHP's UPLOAD_ERR_XXX constants); null defaults to UPLOAD_ERR_OK
     * @param bool        $test         Whether the test mode is active
     *                                  Local files are used in test mode hence the code should not enforce HTTP uploads
=======
     * @param string      $originalName The original file name
     * @param string|null $mimeType     The type of the file as provided by PHP; null defaults to application/octet-stream
     * @param int|null    $size         The file size
     * @param int|null    $error        The error constant of the upload (one of PHP's UPLOAD_ERR_XXX constants); null defaults to UPLOAD_ERR_OK
     * @param bool        $test         Whether the test mode is active
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     *
     * @throws FileException         If file_uploads is disabled
     * @throws FileNotFoundException If the file does not exist
     */
<<<<<<< HEAD
    public function __construct(string $path, string $originalName, string $mimeType = null, int $error = null, bool $test = false)
    {
        $this->originalName = $this->getName($originalName);
        $this->mimeType = $mimeType ?: 'application/octet-stream';
        $this->error = $error ?: \UPLOAD_ERR_OK;
        $this->test = $test;

        parent::__construct($path, \UPLOAD_ERR_OK === $this->error);
=======
    public function __construct($path, $originalName, $mimeType = null, $size = null, $error = null, $test = false)
    {
        $this->originalName = $this->getName($originalName);
        $this->mimeType = $mimeType ?: 'application/octet-stream';
        $this->size = $size;
        $this->error = $error ?: UPLOAD_ERR_OK;
        $this->test = (bool) $test;

        parent::__construct($path, UPLOAD_ERR_OK === $this->error);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Returns the original file name.
     *
     * It is extracted from the request from which the file has been uploaded.
     * Then it should not be considered as a safe value.
     *
<<<<<<< HEAD
     * @return string
=======
     * @return string|null The original name
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getClientOriginalName()
    {
        return $this->originalName;
    }

    /**
     * Returns the original file extension.
     *
     * It is extracted from the original file name that was uploaded.
     * Then it should not be considered as a safe value.
     *
<<<<<<< HEAD
     * @return string
     */
    public function getClientOriginalExtension()
    {
        return pathinfo($this->originalName, \PATHINFO_EXTENSION);
=======
     * @return string The extension
     */
    public function getClientOriginalExtension()
    {
        return pathinfo($this->originalName, PATHINFO_EXTENSION);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Returns the file mime type.
     *
     * The client mime type is extracted from the request from which the file
     * was uploaded, so it should not be considered as a safe value.
     *
     * For a trusted mime type, use getMimeType() instead (which guesses the mime
     * type based on the file content).
     *
<<<<<<< HEAD
     * @return string
=======
     * @return string|null The mime type
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     *
     * @see getMimeType()
     */
    public function getClientMimeType()
    {
        return $this->mimeType;
    }

    /**
     * Returns the extension based on the client mime type.
     *
     * If the mime type is unknown, returns null.
     *
     * This method uses the mime type as guessed by getClientMimeType()
     * to guess the file extension. As such, the extension returned
     * by this method cannot be trusted.
     *
     * For a trusted extension, use guessExtension() instead (which guesses
     * the extension based on the guessed mime type for the file).
     *
<<<<<<< HEAD
     * @return string|null
=======
     * @return string|null The guessed extension or null if it cannot be guessed
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     *
     * @see guessExtension()
     * @see getClientMimeType()
     */
    public function guessClientExtension()
    {
<<<<<<< HEAD
        if (!class_exists(MimeTypes::class)) {
            throw new \LogicException('You cannot guess the extension as the Mime component is not installed. Try running "composer require symfony/mime".');
        }

        return MimeTypes::getDefault()->getExtensions($this->getClientMimeType())[0] ?? null;
=======
        $type = $this->getClientMimeType();
        $guesser = ExtensionGuesser::getInstance();

        return $guesser->guess($type);
    }

    /**
     * Returns the file size.
     *
     * It is extracted from the request from which the file has been uploaded.
     * Then it should not be considered as a safe value.
     *
     * @return int|null The file size
     */
    public function getClientSize()
    {
        return $this->size;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Returns the upload error.
     *
     * If the upload was successful, the constant UPLOAD_ERR_OK is returned.
     * Otherwise one of the other UPLOAD_ERR_XXX constants is returned.
     *
<<<<<<< HEAD
     * @return int
=======
     * @return int The upload error
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getError()
    {
        return $this->error;
    }

    /**
<<<<<<< HEAD
     * Returns whether the file has been uploaded with HTTP and no error occurred.
     *
     * @return bool
     */
    public function isValid()
    {
        $isOk = \UPLOAD_ERR_OK === $this->error;
=======
     * Returns whether the file was uploaded successfully.
     *
     * @return bool True if the file has been uploaded with HTTP and no error occurred
     */
    public function isValid()
    {
        $isOk = $this->error === UPLOAD_ERR_OK;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        return $this->test ? $isOk : $isOk && is_uploaded_file($this->getPathname());
    }

    /**
     * Moves the file to a new location.
     *
<<<<<<< HEAD
     * @return File
     *
     * @throws FileException if, for any reason, the file could not have been moved
     */
    public function move(string $directory, string $name = null)
=======
     * @param string $directory The destination folder
     * @param string $name      The new file name
     *
     * @return File A File object representing the new file
     *
     * @throws FileException if, for any reason, the file could not have been moved
     */
    public function move($directory, $name = null)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if ($this->isValid()) {
            if ($this->test) {
                return parent::move($directory, $name);
            }

            $target = $this->getTargetFile($directory, $name);

<<<<<<< HEAD
            set_error_handler(function ($type, $msg) use (&$error) { $error = $msg; });
            try {
                $moved = move_uploaded_file($this->getPathname(), $target);
            } finally {
                restore_error_handler();
            }
            if (!$moved) {
                throw new FileException(sprintf('Could not move the file "%s" to "%s" (%s).', $this->getPathname(), $target, strip_tags($error)));
=======
            if (!@move_uploaded_file($this->getPathname(), $target)) {
                $error = error_get_last();
                throw new FileException(sprintf('Could not move the file "%s" to "%s" (%s)', $this->getPathname(), $target, strip_tags($error['message'])));
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            }

            @chmod($target, 0666 & ~umask());

            return $target;
        }

<<<<<<< HEAD
        switch ($this->error) {
            case \UPLOAD_ERR_INI_SIZE:
                throw new IniSizeFileException($this->getErrorMessage());
            case \UPLOAD_ERR_FORM_SIZE:
                throw new FormSizeFileException($this->getErrorMessage());
            case \UPLOAD_ERR_PARTIAL:
                throw new PartialFileException($this->getErrorMessage());
            case \UPLOAD_ERR_NO_FILE:
                throw new NoFileException($this->getErrorMessage());
            case \UPLOAD_ERR_CANT_WRITE:
                throw new CannotWriteFileException($this->getErrorMessage());
            case \UPLOAD_ERR_NO_TMP_DIR:
                throw new NoTmpDirFileException($this->getErrorMessage());
            case \UPLOAD_ERR_EXTENSION:
                throw new ExtensionFileException($this->getErrorMessage());
        }

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        throw new FileException($this->getErrorMessage());
    }

    /**
     * Returns the maximum size of an uploaded file as configured in php.ini.
     *
<<<<<<< HEAD
     * @return int|float The maximum size of an uploaded file in bytes (returns float if size > PHP_INT_MAX)
     */
    public static function getMaxFilesize()
    {
        $sizePostMax = self::parseFilesize(\ini_get('post_max_size'));
        $sizeUploadMax = self::parseFilesize(\ini_get('upload_max_filesize'));

        return min($sizePostMax ?: \PHP_INT_MAX, $sizeUploadMax ?: \PHP_INT_MAX);
    }

    /**
     * Returns the given size from an ini value in bytes.
     *
     * @return int|float Returns float if size > PHP_INT_MAX
     */
    private static function parseFilesize(string $size)
    {
        if ('' === $size) {
            return 0;
        }

        $size = strtolower($size);

        $max = ltrim($size, '+');
        if (str_starts_with($max, '0x')) {
            $max = \intval($max, 16);
        } elseif (str_starts_with($max, '0')) {
            $max = \intval($max, 8);
=======
     * @return int The maximum size of an uploaded file in bytes
     */
    public static function getMaxFilesize()
    {
        $iniMax = strtolower(ini_get('upload_max_filesize'));

        if ('' === $iniMax) {
            return PHP_INT_MAX;
        }

        $max = ltrim($iniMax, '+');
        if (0 === strpos($max, '0x')) {
            $max = intval($max, 16);
        } elseif (0 === strpos($max, '0')) {
            $max = intval($max, 8);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        } else {
            $max = (int) $max;
        }

<<<<<<< HEAD
        switch (substr($size, -1)) {
            case 't': $max *= 1024;
                // no break
            case 'g': $max *= 1024;
                // no break
            case 'm': $max *= 1024;
                // no break
=======
        switch (substr($iniMax, -1)) {
            case 't': $max *= 1024;
            case 'g': $max *= 1024;
            case 'm': $max *= 1024;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            case 'k': $max *= 1024;
        }

        return $max;
    }

    /**
     * Returns an informative upload error message.
     *
<<<<<<< HEAD
     * @return string
     */
    public function getErrorMessage()
    {
        static $errors = [
            \UPLOAD_ERR_INI_SIZE => 'The file "%s" exceeds your upload_max_filesize ini directive (limit is %d KiB).',
            \UPLOAD_ERR_FORM_SIZE => 'The file "%s" exceeds the upload limit defined in your form.',
            \UPLOAD_ERR_PARTIAL => 'The file "%s" was only partially uploaded.',
            \UPLOAD_ERR_NO_FILE => 'No file was uploaded.',
            \UPLOAD_ERR_CANT_WRITE => 'The file "%s" could not be written on disk.',
            \UPLOAD_ERR_NO_TMP_DIR => 'File could not be uploaded: missing temporary directory.',
            \UPLOAD_ERR_EXTENSION => 'File upload was stopped by a PHP extension.',
        ];

        $errorCode = $this->error;
        $maxFilesize = \UPLOAD_ERR_INI_SIZE === $errorCode ? self::getMaxFilesize() / 1024 : 0;
        $message = $errors[$errorCode] ?? 'The file "%s" was not uploaded due to an unknown error.';
=======
     * @return string The error message regarding the specified error code
     */
    public function getErrorMessage()
    {
        static $errors = array(
            UPLOAD_ERR_INI_SIZE => 'The file "%s" exceeds your upload_max_filesize ini directive (limit is %d KiB).',
            UPLOAD_ERR_FORM_SIZE => 'The file "%s" exceeds the upload limit defined in your form.',
            UPLOAD_ERR_PARTIAL => 'The file "%s" was only partially uploaded.',
            UPLOAD_ERR_NO_FILE => 'No file was uploaded.',
            UPLOAD_ERR_CANT_WRITE => 'The file "%s" could not be written on disk.',
            UPLOAD_ERR_NO_TMP_DIR => 'File could not be uploaded: missing temporary directory.',
            UPLOAD_ERR_EXTENSION => 'File upload was stopped by a PHP extension.',
        );

        $errorCode = $this->error;
        $maxFilesize = $errorCode === UPLOAD_ERR_INI_SIZE ? self::getMaxFilesize() / 1024 : 0;
        $message = isset($errors[$errorCode]) ? $errors[$errorCode] : 'The file "%s" was not uploaded due to an unknown error.';
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        return sprintf($message, $this->getClientOriginalName(), $maxFilesize);
    }
}
