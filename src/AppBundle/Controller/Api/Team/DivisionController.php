<?php
namespace AppBundle\Controller\Api\Team;

use AppBundle\Entity\Division;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest; // alias pour toutes les annotations
use FOS\RestBundle\View\ViewHandler;
use FOS\RestBundle\View\View; // Utilisation de la vue de FOSRestBundle

class DivisionController extends Controller
{
    /**
     * @Rest\View()
     * @Rest\Get("/api/divisions", name="divisions_list")
     */
    public function getDivisionAction(Request $request)
    {
        $divisions = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:Division')
            ->findAll();
        /* @var $division Division[] */

        return $divisions;
    }
}