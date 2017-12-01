<?php
namespace Api\LigueBundle\Controller;

use Api\LigueBundle\Entity\Team;
use Api\LigueBundle\Form\Type\TeamType;
use Api\LigueBundle\Repository\TeamRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest; // alias pour toutes les annotations
use FOS\RestBundle\View\ViewHandler;
use FOS\RestBundle\View\View; // Utilisation de la vue de FOSRestBundle

class TeamController extends Controller
{

    /**
     * @Rest\View()
     * @Rest\Get("/all/teams", name="teams_list")
     */
    public function getTeamsAction(Request $request)
    {
        $teams = $this->get('doctrine.orm.entity_manager')
            ->getRepository('LigueBundle:Team')
            ->findAll();
        /* @var $teams Team[] */

        return $teams;
    }

    /**
     * @Rest\View()
     * @Rest\Get("/api/teams/{team_id}", name="team_one")
     */
    public function getTeamAction(Request $request)
    {
        /** @var $teamRepository TeamRepository */
        $teamRepository = $this->getDoctrine()->getRepository(Team::class);

        $team = $teamRepository->findOne($request->get('team_id'));

        /* @var $team Team */

        if (empty($team)) {
            $response = [
                'code' => 1,
                'message' => 'team not found',
                'error' => Response::HTTP_NOT_FOUND,
                'result' => []
            ];

            return new JsonResponse($response, Response::HTTP_NOT_FOUND);
        }

       /* $response = [
            "id" => $team->getId(),
            "name" => $team->getId(),
            "code" => $team->getCode(),
            "short_name" => $team->getShortName(),
            "color_home" => $team->getColorHome(),
            "color_away" => $team->getColorAway()
        ];*/

        return $team;
    }

    /**
     * @Rest\View(statusCode=Response::HTTP_CREATED)
     * @Rest\Post("/api/teams")
     */
    public function postTeamsAction(Request $request)
    {
        $team = new Team();
        $form = $this->createForm(TeamType::class, $team);

        $form->submit($request->request->all()); // Validation des données

        if ($form->isValid()) {
            $em = $this->get('doctrine.orm.entity_manager');
            $em->persist($team);
            $em->flush();
            return $team;
        } else {
            return $form;
        }
    }

    /**
     * @Rest\View(statusCode=Response::HTTP_NO_CONTENT)
     * @Rest\Delete("/api/teams/{id}")
     */
    public function removeTeamAction(Request $request)
    {
        $em = $this->get('doctrine.orm.entity_manager');
        $team = $em->getRepository('LigueBundle:Team')
            ->find($request->get('id'));
        /* @var $team Team */

        if (!$team) {
            return;
        }

        $em->remove($team);
        $em->flush();
    }

    /**
     * @Rest\View()
     * @Rest\Put("/api/teams/{id}")
     */
    public function updateTeamAction(Request $request)
    {
        return $this->updateTeam($request, true);
    }

    /**
     * @Rest\View()
     * @Rest\Patch("/api/teams/{id}")
     */
    public function patchTeamAction(Request $request)
    {
        return $this->updateTeam($request, false);
    }

    private function updateTeam(Request $request, $clearMissing)
    {
        $team = $this->get('doctrine.orm.entity_manager')
            ->getRepository('LigueBundle:Team')
            ->find($request->get('id'));
        /* @var $team Team */

        if (empty($team)) {
            return \FOS\RestBundle\View\View::create(['message' => 'Team not found'], Response::HTTP_NOT_FOUND);
        }

        $form = $this->createForm(TeamType::class, $team);

        $form->submit($request->request->all(), $clearMissing);

        if ($form->isValid()) {
            $em = $this->get('doctrine.orm.entity_manager');
            $em->persist($team);
            $em->flush();
            return $team;
        } else {
            return $form;
        }
    }

}