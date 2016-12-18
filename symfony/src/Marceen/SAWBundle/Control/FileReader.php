<?php
namespace Marceen\SAWBundle\Control;

use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpKernel\KernelInterface;

class FileReader
{
    const RELATIVE_PATH = '/../saw/to_import/';

    /** @var KernelInterface */
    private $kernel;

    /** @var string */
    private $absolutePath;

    /**
     * FileReader constructor.
     * @param KernelInterface $kernel
     */
    public function __construct(KernelInterface $kernel)
    {
        $this->kernel = $kernel;

        $this->absolutePath = $kernel->getRootDir() . static::RELATIVE_PATH;
    }

    public function updateOffers()
    {
        $finder = new Finder();
//        $finder->files()->in($this->absolutePath);
        $finder->directories()->in($this->absolutePath);

        foreach ($finder as $directory) {
            var_dump($directory->getRealPath());
        }
    }
}