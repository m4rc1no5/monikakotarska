<?php
/**
 * Created by PhpStorm.
 * User: marcinos
 * Date: 18.12.16
 * Time: 22:30
 */

namespace Marceen\SAWBundle\Control;

use Marceen\SAWBundle\Control\Import\DirectoryReader;
use Marceen\SAWBundle\Control\Import\FileReader;

class ImportFacade
{
    const RELATIVE_PATH = '/../saw/to_import/';

    /**
     * @var DirectoryReader
     */
    private $directoryReader;

    /**
     * @var FileReader
     */
    private $fileReader;


    /**
     * ImportFacade constructor.
     * @param DirectoryReader $directoryReader
     * @param FileReader $fileReader
     */
    public function __construct(DirectoryReader $directoryReader, FileReader $fileReader)
    {
        $this->directoryReader = $directoryReader;
        $this->fileReader = $fileReader;
    }

    public function parse()
    {
        /** @var array $directories */
        $directories = $this->directoryReader->getDirectories(static::RELATIVE_PATH);

        if (empty($directories)) {
            echo 'Nothing to import';
        }

        foreach ($directories as $directory) {
            $this->parseFiles($directory);
        }
    }

    private function parseFiles($directoryRealPath)
    {
        $files = $this->fileReader->getFiles($directoryRealPath);

        if (empty($files)) {
            echo 'Nothing to parse - there is no files in directory ' . $directoryRealPath;
        }

        echo "Parse files in directory: " . $directoryRealPath . "<br>";

        foreach ($files as $file) {
            var_dump($file);
        }
    }
}