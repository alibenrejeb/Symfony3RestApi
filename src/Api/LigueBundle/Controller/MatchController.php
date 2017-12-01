<?php
namespace Api\LigueBundle\Controller;

use Api\LigueBundle\Entity\Match;
use Api\LigueBundle\Entity\Saison;
use Api\LigueBundle\Entity\Team;
use Api\LigueBundle\Form\Type\MatchType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest; // alias pour toutes les annotations
use FOS\RestBundle\View\ViewHandler;
use FOS\RestBundle\View\View;
use Symfony\Component\Validator\Constraints\Date; // Utilisation de la vue de FOSRestBundle

class MatchController extends Controller
{
    /**
     * @Rest\View(statusCode=Response::HTTP_CREATED)
     * @Rest\Post("/api/matches/{team_home_code}-{team_away_code}")
     */
    public function postMatcheAction(Request $request)
    {
        /** @var $teamHome Team */
        $teamHome = $this->get('doctrine.orm.entity_manager')
            ->getRepository('LigueBundle:Team')
            ->findOneBy(['code' => $request->get('team_home_code')]);
        /** @var $teamAway Team*/
        $teamAway = $this->get('doctrine.orm.entity_manager')
            ->getRepository('LigueBundle:Team')
            ->findOneBy(['code' => $request->get('team_away_code')]);

        if (empty($teamHome) or empty($teamAway)) {
            return new JsonResponse(['message' => 'team not found'], Response::HTTP_NOT_FOUND);
        }

        $req = $request->request->all();

        /** @var $saison Saison*/
        $saison =  $this->get('doctrine.orm.entity_manager')
            ->getRepository('LigueBundle:Saison')
            ->find($req['saison']);
        if(empty($saison)) {
            return new JsonResponse(['message' => 'saison not found'], Response::HTTP_NOT_FOUND);
        }

        /** @var $match Match*/
        $match =  $this->get('doctrine.orm.entity_manager')
            ->getRepository('LigueBundle:Match')
            ->findOneBy(
                [
                    'teamHome' => $teamHome->getId(),
                    'teamAway' => $teamAway->getId(),
                    'saison' => $req['saison']
                ]);

        if(empty($match)) {
            $match = new Match();
            $match->setDate($req['date']);
            $match->setTeamHome($teamHome);
            $match->setTeamAway($teamAway);
            $match->setScoreHome($req['scoreHome']);
            $match->setScoreAway($req['scoreAway']);
            $match->setReport(false);
            $match->setRound($req['round']);
            $match->setSaison($saison);
            $em = $this->get('doctrine.orm.entity_manager');
            $em->persist($match);
            $em->flush();
            return new JsonResponse(['massage' => 'match creadted'], Response::HTTP_CREATED);
        } else if($match->getReport()) {
            $match->setReport(false);
            $match->setScoreHome($req['scoreHome']);
            $match->setScoreAway($req['scoreAway']);
            $em = $this->get('doctrine.orm.entity_manager');
            $em->persist($match);
            $em->flush();
            return new JsonResponse(['massage' => 'match updated'], Response::HTTP_ACCEPTED);
        } else {
            return new JsonResponse(['message' => 'match already exist'], Response::HTTP_NOT_FOUND);
        }
    }

}