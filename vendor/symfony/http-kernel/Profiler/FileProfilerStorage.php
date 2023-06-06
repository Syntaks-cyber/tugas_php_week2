<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\Profiler;

/**
 * Storage for profiler using files.
 *
 * @author Alexandre Salomé <alexandre.salome@gmail.com>
 */
class FileProfilerStorage implements ProfilerStorageInterface
{
    /**
     * Folder where profiler data are stored.
     *
     * @var string
     */
    private $folder;

    /**
     * Constructs the file storage using a "dsn-like" path.
     *
     * Example : "file:/path/to/the/storage/folder"
     *
<<<<<<< HEAD
     * @throws \RuntimeException
     */
    public function __construct(string $dsn)
    {
        if (!str_starts_with($dsn, 'file:')) {
=======
     * @param string $dsn The DSN
     *
     * @throws \RuntimeException
     */
    public function __construct($dsn)
    {
        if (0 !== strpos($dsn, 'file:')) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            throw new \RuntimeException(sprintf('Please check your configuration. You are trying to use FileStorage with an invalid dsn "%s". The expected format is "file:/path/to/the/storage/folder".', $dsn));
        }
        $this->folder = substr($dsn, 5);

        if (!is_dir($this->folder) && false === @mkdir($this->folder, 0777, true) && !is_dir($this->folder)) {
            throw new \RuntimeException(sprintf('Unable to create the storage directory (%s).', $this->folder));
        }
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function find(?string $ip, ?string $url, ?int $limit, ?string $method, int $start = null, int $end = null, string $statusCode = null): array
=======
    public function find($ip, $url, $limit, $method, $start = null, $end = null)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $file = $this->getIndexFilename();

        if (!file_exists($file)) {
<<<<<<< HEAD
            return [];
        }

        $file = fopen($file, 'r');
        fseek($file, 0, \SEEK_END);

        $result = [];
        while (\count($result) < $limit && $line = $this->readLineFromFile($file)) {
            $values = str_getcsv($line);
            [$csvToken, $csvIp, $csvMethod, $csvUrl, $csvTime, $csvParent, $csvStatusCode] = $values;
            $csvTime = (int) $csvTime;

            if ($ip && !str_contains($csvIp, $ip) || $url && !str_contains($csvUrl, $url) || $method && !str_contains($csvMethod, $method) || $statusCode && !str_contains($csvStatusCode, $statusCode)) {
=======
            return array();
        }

        $file = fopen($file, 'r');
        fseek($file, 0, SEEK_END);

        $result = array();
        while (count($result) < $limit && $line = $this->readLineFromFile($file)) {
            $values = str_getcsv($line);
            list($csvToken, $csvIp, $csvMethod, $csvUrl, $csvTime, $csvParent) = $values;
            $csvStatusCode = isset($values[6]) ? $values[6] : null;

            $csvTime = (int) $csvTime;

            if ($ip && false === strpos($csvIp, $ip) || $url && false === strpos($csvUrl, $url) || $method && false === strpos($csvMethod, $method)) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                continue;
            }

            if (!empty($start) && $csvTime < $start) {
                continue;
            }

            if (!empty($end) && $csvTime > $end) {
                continue;
            }

<<<<<<< HEAD
            $result[$csvToken] = [
=======
            $result[$csvToken] = array(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                'token' => $csvToken,
                'ip' => $csvIp,
                'method' => $csvMethod,
                'url' => $csvUrl,
                'time' => $csvTime,
                'parent' => $csvParent,
                'status_code' => $csvStatusCode,
<<<<<<< HEAD
            ];
=======
            );
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        fclose($file);

        return array_values($result);
    }

    /**
     * {@inheritdoc}
     */
    public function purge()
    {
        $flags = \FilesystemIterator::SKIP_DOTS;
        $iterator = new \RecursiveDirectoryIterator($this->folder, $flags);
        $iterator = new \RecursiveIteratorIterator($iterator, \RecursiveIteratorIterator::CHILD_FIRST);

        foreach ($iterator as $file) {
            if (is_file($file)) {
                unlink($file);
            } else {
                rmdir($file);
            }
        }
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function read(string $token): ?Profile
    {
        return $this->doRead($token);
=======
    public function read($token)
    {
        if (!$token || !file_exists($file = $this->getFilename($token))) {
            return;
        }

        return $this->createProfileFromData($token, unserialize(file_get_contents($file)));
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * {@inheritdoc}
     *
     * @throws \RuntimeException
     */
<<<<<<< HEAD
    public function write(Profile $profile): bool
=======
    public function write(Profile $profile)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $file = $this->getFilename($profile->getToken());

        $profileIndexed = is_file($file);
        if (!$profileIndexed) {
            // Create directory
<<<<<<< HEAD
            $dir = \dirname($file);
=======
            $dir = dirname($file);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            if (!is_dir($dir) && false === @mkdir($dir, 0777, true) && !is_dir($dir)) {
                throw new \RuntimeException(sprintf('Unable to create the storage directory (%s).', $dir));
            }
        }

<<<<<<< HEAD
        $profileToken = $profile->getToken();
        // when there are errors in sub-requests, the parent and/or children tokens
        // may equal the profile token, resulting in infinite loops
        $parentToken = $profile->getParentToken() !== $profileToken ? $profile->getParentToken() : null;
        $childrenToken = array_filter(array_map(function (Profile $p) use ($profileToken) {
            return $profileToken !== $p->getToken() ? $p->getToken() : null;
        }, $profile->getChildren()));

        // Store profile
        $data = [
            'token' => $profileToken,
            'parent' => $parentToken,
            'children' => $childrenToken,
=======
        // Store profile
        $data = array(
            'token' => $profile->getToken(),
            'parent' => $profile->getParentToken(),
            'children' => array_map(function ($p) { return $p->getToken(); }, $profile->getChildren()),
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            'data' => $profile->getCollectors(),
            'ip' => $profile->getIp(),
            'method' => $profile->getMethod(),
            'url' => $profile->getUrl(),
            'time' => $profile->getTime(),
<<<<<<< HEAD
            'status_code' => $profile->getStatusCode(),
        ];

        $data = serialize($data);

        if (\function_exists('gzencode')) {
            $data = gzencode($data, 3);
        }

        if (false === file_put_contents($file, $data, \LOCK_EX)) {
=======
        );

        if (false === file_put_contents($file, serialize($data))) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            return false;
        }

        if (!$profileIndexed) {
            // Add to index
            if (false === $file = fopen($this->getIndexFilename(), 'a')) {
                return false;
            }

<<<<<<< HEAD
            fputcsv($file, [
=======
            fputcsv($file, array(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                $profile->getToken(),
                $profile->getIp(),
                $profile->getMethod(),
                $profile->getUrl(),
                $profile->getTime(),
                $profile->getParentToken(),
                $profile->getStatusCode(),
<<<<<<< HEAD
            ]);
=======
            ));
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            fclose($file);
        }

        return true;
    }

    /**
     * Gets filename to store data, associated to the token.
     *
<<<<<<< HEAD
     * @return string
     */
    protected function getFilename(string $token)
=======
     * @param string $token
     *
     * @return string The profile filename
     */
    protected function getFilename($token)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        // Uses 4 last characters, because first are mostly the same.
        $folderA = substr($token, -2, 2);
        $folderB = substr($token, -4, 2);

        return $this->folder.'/'.$folderA.'/'.$folderB.'/'.$token;
    }

    /**
     * Gets the index filename.
     *
<<<<<<< HEAD
     * @return string
=======
     * @return string The index filename
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    protected function getIndexFilename()
    {
        return $this->folder.'/index.csv';
    }

    /**
     * Reads a line in the file, backward.
     *
     * This function automatically skips the empty lines and do not include the line return in result value.
     *
     * @param resource $file The file resource, with the pointer placed at the end of the line to read
     *
<<<<<<< HEAD
     * @return mixed
=======
     * @return mixed A string representing the line or null if beginning of file is reached
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    protected function readLineFromFile($file)
    {
        $line = '';
        $position = ftell($file);

        if (0 === $position) {
<<<<<<< HEAD
            return null;
=======
            return;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        while (true) {
            $chunkSize = min($position, 1024);
            $position -= $chunkSize;
            fseek($file, $position);

            if (0 === $chunkSize) {
                // bof reached
                break;
            }

            $buffer = fread($file, $chunkSize);

            if (false === ($upTo = strrpos($buffer, "\n"))) {
                $line = $buffer.$line;
                continue;
            }

            $position += $upTo;
            $line = substr($buffer, $upTo + 1).$line;
<<<<<<< HEAD
            fseek($file, max(0, $position), \SEEK_SET);
=======
            fseek($file, max(0, $position), SEEK_SET);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

            if ('' !== $line) {
                break;
            }
        }

        return '' === $line ? null : $line;
    }

<<<<<<< HEAD
    protected function createProfileFromData(string $token, array $data, Profile $parent = null)
=======
    protected function createProfileFromData($token, $data, $parent = null)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $profile = new Profile($token);
        $profile->setIp($data['ip']);
        $profile->setMethod($data['method']);
        $profile->setUrl($data['url']);
        $profile->setTime($data['time']);
<<<<<<< HEAD
        $profile->setStatusCode($data['status_code']);
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $profile->setCollectors($data['data']);

        if (!$parent && $data['parent']) {
            $parent = $this->read($data['parent']);
        }

        if ($parent) {
            $profile->setParent($parent);
        }

        foreach ($data['children'] as $token) {
<<<<<<< HEAD
            if (null !== $childProfile = $this->doRead($token, $profile)) {
                $profile->addChild($childProfile);
            }
=======
            if (!$token || !file_exists($file = $this->getFilename($token))) {
                continue;
            }

            $profile->addChild($this->createProfileFromData($token, unserialize(file_get_contents($file)), $profile));
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        return $profile;
    }
<<<<<<< HEAD

    private function doRead($token, Profile $profile = null): ?Profile
    {
        if (!$token || !file_exists($file = $this->getFilename($token))) {
            return null;
        }

        $h = fopen($file, 'r');
        flock($h, \LOCK_SH);
        $data = stream_get_contents($h);
        flock($h, \LOCK_UN);
        fclose($h);

        if (\function_exists('gzdecode')) {
            $data = @gzdecode($data) ?: $data;
        }

        if (!$data = unserialize($data)) {
            return null;
        }

        return $this->createProfileFromData($token, $data, $profile);
    }
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
}
