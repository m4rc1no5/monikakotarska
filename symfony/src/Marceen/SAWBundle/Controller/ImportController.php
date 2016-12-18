<?php
namespace Marceen\SAWBundle\Controller;

use Marceen\SAWBundle\Control\ImportFacade;
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
    /**
     * @var ImportFacade
     */
    private $importFacade;

    /**
     * ImportController constructor.
     * @param ImportFacade $importFacade
     */
    public function __construct(ImportFacade $importFacade)
    {
        $this->importFacade = $importFacade;
    }


    /**
     * @Route("/", name="import")
     * @Template()
     *
     * @return string
     */
    public function indexAction()
    {
        $this->importFacade->parse();
        return [];
    }
}