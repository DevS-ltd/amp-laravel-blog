<?php

namespace App\Traits;

use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;

trait FileUpload
{
    /**
     * Upload directory.
     *
     * @var string
     */
    protected $directory = '';

    /**
     * File name.
     *
     * @var null
     */
    protected $fileName = null;

    /**
     * Storage instance.
     *
     * @var \Illuminate\Filesystem\Filesystem
     */
    protected $storage = '';

    /**
     * Upload disk.
     *
     * @var \Illuminate\Filesystem\Filesystem
     */
    protected $disk = '';

    /**
     * Delete File Handler.
     *
     * @param string|null $fileName
     *
     * @return void
     */
    public function handleDeletedFile($fileName)
    {
        if (! is_null($fileName)) {
            $this->initStorage();

            if ($this->storage->exists($fileName)) {
                $this->storage->delete($fileName);
            }
        }
    }

    /**
     * Upload File Handler.
     *
     * @param $file
     *
     * @return string
     */
    public function handleUploadedFile($file)
    {
        if (! is_null($file)) {
            $this->initStorage();

            $this->upload($file);

            return "{$this->getDirectory()}/$this->fileName";
        }
    }

    /**
     * Upload file.
     *
     * @param UploadedFile $file
     *
     * @return mixed
     */
    protected function upload(UploadedFile $file)
    {
        $this->renameIfExists($file);

        return $this->storage->putFileAs($this->getDirectory(), $file, $this->fileName);
    }

    /**
     * If name already exists, rename it.
     *
     * @param $file
     *
     * @return void
     */
    public function renameIfExists(UploadedFile $file)
    {
        do {
            $this->setFileName($this->generateUniqueName($file));
        } while ($this->checkFileExists($this->fileName));
    }

    /**
     * Check file exists.
     *
     * @param string $fileName
     *
     * @return bool
     */
    public function checkFileExists(string $fileName) :bool
    {
        return $this->storage->exists("{$this->getDirectory()}/$fileName");
    }

    /**
     * Initialize the storage instance.
     *
     * @return void.
     */
    protected function initStorage()
    {
        if (! $this->storage) {
            $this->initDisk();

            $this->storage = Storage::disk($this->disk);
        }
    }

    /**
     * Initialize the disk for storage.
     *
     * @return mixed|\Illuminate\Session\Store|\Illuminate\Session\SessionManager
     */
    public function initDisk()
    {
        if (! $this->disk) {
            $this->setDisk($this->getDisk());
        }
    }

    /**
     * Get disk for store file.
     *
     * @return mixed|string
     */
    public function getDisk()
    {
        return $this->disk ?: $this->defaultDisk();
    }

    /**
     * Set disk for store file.
     *
     * @param string $disk
     * @return mixed|string
     */
    public function setDisk(string $disk)
    {
        if (! array_key_exists($disk, config('filesystems.disks'))) {
            $error = new MessageBag([
                'title' => 'Config error.',
                'message' => "Disk [$disk] not configured, please add the disk config in `config/filesystems.php`.",
            ]);

            return session()->flash('error', $error);
        }

        $this->disk = $disk;
    }

    /**
     * Get default disk for store file.
     *
     * @return mixed|string
     */
    public function defaultDisk()
    {
        return config('filesystems.default');
    }

    /**
     * Generate a unique name for uploaded file.
     *
     * @param UploadedFile $file
     *
     * @return string
     */
    protected function generateUniqueName(UploadedFile $file)
    {
        return md5(uniqid()).'.'.$this->getFileExtension($file);
    }

    /**
     * Get file extension.
     *
     * @param UploadedFile $file
     *
     * @return string
     */
    protected function getFileExtension(UploadedFile $file)
    {
        return $file->getClientOriginalExtension() ?: $file->extension();
    }

    /**
     * Set name of store name.
     *
     * @param string|callable $name
     *
     * @return $this
     */
    public function setFileName(string $name)
    {
        if ($name) {
            $this->fileName = $name;
        }

        return $this;
    }

    /**
     * Specify the directory upload file.
     *
     * @param string $directory
     *
     * @return $this
     */
    public function setDirectory(string $directory)
    {
        if ($directory) {
            $this->directory = $directory;
        }

        return $this;
    }

    /**
     * Get directory for store file.
     *
     * @return string
     */
    public function getDirectory()
    {
        return $this->directory ?: $this->defaultDirectory();
    }

    /**
     * Get default directory for store file.
     *
     * @return string
     */
    public function defaultDirectory()
    {
        return 'upload';
    }
}
