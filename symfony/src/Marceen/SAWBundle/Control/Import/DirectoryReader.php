<?php
namespace Marceen\SAWBundle\Control\Import;

use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpKernel\KernelInterface;

class DirectoryReader
{
    /** @var KernelInterface */
    private $kernel;

    /** @var Finder */
    private $finder;

    /**
     * FileReader constructor.
     * @param KernelInterface $kernel
     * @param Finder $finder
     */
    public function __construct(KernelInterface $kernel, Finder $finder)
    {
        $this->kernel = $kernel;
        $this->finder = $finder;
    }

    /**
     * @param string $relativePath
     * @return array
     */
    public function getDirectories($relativePath)
    {
        $absolutePath = $this->kernel->getRootDir() . $relativePath;
        $this->finder->directories()->sortByName()->in($absolutePath);

        $directories = [];
        foreach ($this->finder as $directory) {
            array_push($directories, $directory->getRealPath());
        }

        return $directories;
    }
}