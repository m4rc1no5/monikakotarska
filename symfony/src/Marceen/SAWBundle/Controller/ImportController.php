<?php
namespace Marceen\SAWBundle\Controller;

use Marceen\SAWBundle\Control\FileReader;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class ImportController
 * @package Marceen\SAWBundle\Controller
 *
 * @Route("/import", service="marceen_saw.controller.import_controller")
 */
class ImportController extends Controller
{
    /** @var FileReader */
    private $fileReader;

    /**
     * ImportController constructor.
     * @param FileReader $fileReader
     */
    public function __construct(FileReader $fileReader)
    {
        $this->fileReader = $fileReader;
    }


    /**
     * @Route("/", name="import")
     * @Template()
     *
     * @return string
     */
    public function indexAction()
    {
        $this->fileReader->updateOffers();

        return [];
    }
}