<?php
namespace Api\LigueBundle\Controller;

use Api\LigueBundle\Entity\Saison;
use Api\LigueBundle\Entity\Table;
use Api\LigueBundle\Entity\Team;
use Api\LigueBundle\Services\Tables;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest; // alias pour toutes les annotations
use FOS\RestBundle\View\ViewHandler;
use FOS\RestBundle\View\View; // Utilisation de la vue de FOSRestBundle

class TableController extends Controller
{
    /**
     * @Rest\View()
     * @Rest\Get("/api/test/tables/team-{team_id}/saison-{annee}", name="test_team_in_tables")
     */
    public function getTeamInTablesAction(Request $request)
    {
        /** @var $sTables Tables */
        $sTables = $this->container->get('teams.table');
        return $sTables->tableOfTeams($request->get('team_id'), $request->get('annee'));
    }

    /**
     * @Rest\View()
     * @Rest\Get("/api/tables/team-{team_id}/saison-{annee}", name="team_in_tables")
     */
    public function updateTeamInTableAction(Request $request)
    {
        $saisonId = $request->get('annee');
        $teamId = $request->get('team_id');
        $tablesRepository = $this->getDoctrine()->getRepository('LigueBundle:Table');
        $table = $tablesRepository->findOneBy(array(
            'saison' => $request->get('annee'),
            'team' => $request->get('team_id')
        ));
        /** @var $table Table */

        $team = $this->get('doctrine.orm.entity_manager')
            ->getRepository('LigueBundle:Team')
            ->find($teamId);
        /** @var $team Team */

        if (empty($team)) {
            return \FOS\RestBundle\View\View::create(['message' => 'Team not found'], Response::HTTP_NOT_FOUND);
        }

        $saison = $this->get('doctrine.orm.entity_manager')
            ->getRepository('LigueBundle:Saison')
            ->find($saisonId);
        /** @var $saison Saison */

        if (empty($saison)) {
            return \FOS\RestBundle\View\View::create(['message' => 'Saison not found'], Response::HTTP_NOT_FOUND);
        }

        /** @var $sTables Tables */
        $sTables = $this->container->get('teams.table');
        $result = $sTables->tableOfTeams($request->get('team_id'), $request->get('annee'));

        if(empty($table)) $table = new Table();

        try {
            $table->setPlay($result['play']);
            $table->setWin($result['win']);
            $table->setDraw($result['draw']);
            $table->setLost($result['lost']);
            $table->setGoalsScored($result['goals_scored']);
            $table->setGoalsConceded($result['goals_conceded']);
            $table->setSaison($saison);
            $table->setTeam($team);

            $em = $this->get('doctrine.orm.entity_manager');
            $em->persist($table);
            $em->flush();

            return \FOS\RestBundle\View\View::create($table, Response::HTTP_OK);
        } catch(\Doctrine\ORM\ORMException $e){
            return \FOS\RestBundle\View\View::create(['message' => $e->getMessage(), 'file' => $e->getFile(), 'line' => $e->getLine()], Response::HTTP_NOT_FOUND);
        } catch(\Exception $e) {
            return \FOS\RestBundle\View\View::create(['message' => $e->getMessage(), 'file' => $e->getFile(), 'line' => $e->getLine()], Response::HTTP_NOT_FOUND);
        }
    }
}