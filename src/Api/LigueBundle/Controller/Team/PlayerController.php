<?php
namespace Api\LigueBundle\Controller\Team;

use Api\LigueBundle\Entity\Player;
use Api\LigueBundle\Entity\Position;
use Api\LigueBundle\Entity\Team;
use Api\LigueBundle\Form\Type\PlayerType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest; // alias pour toutes les annotations
use FOS\RestBundle\View\ViewHandler;
use FOS\RestBundle\View\View; // Utilisation de la vue de FOSRestBundle

class PlayerController extends Controller
{

    /**
     * @Rest\View(statusCode=Response::HTTP_CREATED)
     * @Rest\Post("/api/teams/{team_id}/players/position/{p_id}")
     */
    public function addPlayerAction(Request $request)
    {
        /*echo $request->get('team_id')."\n";
        echo $request->get('p_id') . "\n";*/

        $team = $this->get('doctrine.orm.entity_manager')
            ->getRepository('LigueBundle:Team')
            ->find($request->get('team_id'));
        /** @var $team Team */

        if (empty($team)) {
            return $this->entityNotFound('Team');
        }

        $position = $this->get('doctrine.orm.entity_manager')
            ->getRepository('LigueBundle:Position')
            ->find($request->get('p_id'));
        /** @var $position Position */

        if (empty($position)) {
            return $this->entityNotFound('Position');
        }

        $player = new Player();
        $player->setPosition($position);
        $player->setTeam($team);

        $form = $this->createForm(PlayerType::class, $player);

        $form->submit($request->request->all());

        if ($form->isValid()) {
            $em = $this->get('doctrine.orm.entity_manager');
            $em->persist($player);
            $em->flush();
            return $player;
        } else {
            return $form;
        }
    }

    private function entityNotFound($entityName)
    {
        return \FOS\RestBundle\View\View::create(['message' => "$entityName not found"], Response::HTTP_NOT_FOUND);
    }

}