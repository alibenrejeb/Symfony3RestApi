<?php

namespace Abr\ServiceCronBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/abr")
     */
    public function indexAction()
    {
        return $this->render('AbrServiceCronBundle:Default:index.html.twig');
    }
}
