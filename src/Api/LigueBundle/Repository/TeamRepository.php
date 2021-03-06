<?php
namespace Api\LigueBundle\Repository;

/**
 * PostRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TeamRepository extends \Doctrine\ORM\EntityRepository
{
    public function findOne($id)
    {
        $queryBuilder = $this->_em->createQueryBuilder()
            ->select('t')
            ->from($this->_entityName, 't')
            ->where('t.id = :id' )
            ->setParameter('id', $id);

        return $queryBuilder
            ->getQuery()
            ->getResult();
    }
}
