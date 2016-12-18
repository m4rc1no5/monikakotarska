<?php

namespace Marceen\SAWBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('MarceenSAWBundle:Default:index.html.twig');
    }
}
