<?php

namespace App\Repository;

use App\Entity\EvenementHistorique;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EvenementHistorique>
 *
 * @method EvenementHistorique|null find($id, $lockMode = null, $lockVersion = null)
 * @method EvenementHistorique|null findOneBy(array $criteria, array $orderBy = null)
 * @method EvenementHistorique[]    findAll()
 * @method EvenementHistorique[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EvenementHistoriqueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EvenementHistorique::class);
    }

//    /**
//     * @return EvenementHistorique[] Returns an array of EvenementHistorique objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?EvenementHistorique
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
