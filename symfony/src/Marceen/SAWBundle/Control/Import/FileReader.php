<?php
namespace Marceen\SAWBundle\Control\Import;

use Symfony\Component\DependencyInjection\Container;

class FileReader
{
    /**
     * @var Container
     */
    private $container;

    /**
     * FileReader constructor.
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }


    /**
     * @param string $realPath
     * @return array
     */
    public function getFiles($realPath)
    {
        $finder = $this->container->get('finder');
        $finder->files()->in($realPath);

        $files = [];
        foreach ($finder as $file) {
            array_push($files, $file->getRealPath());
        }

        return $files;
    }
}