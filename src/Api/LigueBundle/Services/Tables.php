<?php
namespace Api\LigueBundle\Services;

use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\Container;

class Tables
{
    /** @var EntityManager */
    private $em;
    /** @var Container  */
    private $container;

    /**
     * Tables constructor.
     * @param EntityManager $em
     * @param Container $container
     */
    public function __construct(EntityManager $em, Container $container)
    {
        $this->em = $em;
        $this->container = $container;
    }

    public function sayHello()
    {
        return 'hello';
    }

    public function tableOfTeams($teamId, $saisonId)
    {
        $connection = $this->em->getConnection();

        $query = "SELECT t1.name, t2.*, (goals_scored - goals_conceded) AS DIF FROM teams t1
            INNER JOIN (
                SELECT
                COUNT(*) AS play,
                (SUM(CASE WHEN (tab.score_home > tab.score_away AND tab.team_home = :teamId) OR (tab.score_home < tab.score_away AND tab.team_away = :teamId) THEN 1 ELSE 0 END)) AS win,
                (SUM(CASE WHEN (tab.score_home = tab.score_away AND (tab.team_home = :teamId OR tab.team_away = :teamId)) THEN 1 ELSE 0 END)) AS draw,
                (SUM(CASE WHEN (tab.score_home < tab.score_away AND tab.team_home = :teamId) OR (tab.score_home > tab.score_away AND tab.team_away = :teamId) THEN 1 ELSE 0 END)) AS lost,
                (SUM(CASE WHEN tab.team_home = :teamId THEN tab.score_home ELSE 0 END) + SUM(CASE WHEN tab.team_away = :teamId THEN tab.score_away ELSE 0 END)) AS goals_scored,
                (SUM(CASE WHEN tab.team_home = :teamId THEN tab.score_away ELSE 0 END) + SUM(CASE WHEN tab.team_away = :teamId THEN tab.score_home ELSE 0 END)) AS goals_conceded,
                SUM(points) AS points
                FROM
                (
                    SELECT m.team_home, m.team_away, h.name AS name_team_home, a.name AS name_team_away, m.score_home, m.score_away,
                        ( CASE
                        WHEN (m.score_home > m.score_away AND h.id = :teamId) THEN 3
                        WHEN (m.score_home < m.score_away AND a.id = :teamId) THEN 3
                        WHEN (m.score_home = m.score_away AND (h.id = :teamId OR a.id = :teamId)) THEN 1
                        WHEN (m.score_home < m.score_away AND h.id = :teamId) THEN 0
                        WHEN (m.score_home > m.score_away AND a.id = :teamId) THEN 0
                        ELSE 0
                          END  
                        ) AS points
                    FROM matches m 
                    INNER JOIN teams h ON h.id = m.team_home
                    INNER JOIN teams a ON a.id = m.team_away
                    INNER JOIN saison s ON s.annee = m.saison_id AND s.annee = :annee
                    WHERE m.report = 0
                    AND (h.id = :teamId OR a.id = :teamId)
                ) AS tab
            ) t2 ON t1.id = :teamId";

        $statement = $connection->prepare($query);
        $statement->bindValue('teamId', $teamId);
        $statement->bindValue('annee', $saisonId);
        $statement->execute();

        return $statement->fetch();
    }

}