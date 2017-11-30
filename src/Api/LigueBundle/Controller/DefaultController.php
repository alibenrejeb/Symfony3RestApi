<?php

namespace Api\LigueBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('LigueBundle:Default:index.html.twig');
    }
}
