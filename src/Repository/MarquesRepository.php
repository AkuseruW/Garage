<?php

namespace App\Repository;

use App\Entity\Marques;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Marques>
 *
 * @method Marques|null find($id, $lockMode = null, $lockVersion = null)
 * @method Marques|null findOneBy(array $criteria, array $orderBy = null)
 * @method Marques[]    findAll()
 * @method Marques[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MarquesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Marques::class);
    }

    public function save(Marques $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Marques $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findMarqueByName(string $query)
    {
        $qb = $this->createQueryBuilder('m');
        $qb->where(
                $qb->expr()->andX(
                    $qb->expr()->orX(
                        $qb->expr()->like('m.nom', ':query'),
                    ),
                )
            )
            ->setParameter('query', '%' . $query . '%')
        ;
        return $qb
            ->getQuery()
            ->getResult();
    }
}
