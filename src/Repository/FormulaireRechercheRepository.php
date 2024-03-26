<?php

namespace App\Repository;

use App\Entity\FormulaireRecherche;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<FormulaireRecherche>
 *
 * @method FormulaireRecherche|null find($id, $lockMode = null, $lockVersion = null)
 * @method FormulaireRecherche|null findOneBy(array $criteria, array $orderBy = null)
 * @method FormulaireRecherche[]    findAll()
 * @method FormulaireRecherche[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FormulaireRechercheRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FormulaireRecherche::class);
    }

       /**
        * @return FormulaireRecherche[] Returns an array of FormulaireRecherche objects
        */
       public function findByExampleField($value): array
       {
           return $this->createQueryBuilder('f')
               ->andWhere('f.exampleField = :val')
               ->setParameter('val', $value)
               ->orderBy('f.id', 'ASC')
               ->setMaxResults(10)
               ->getQuery()
               ->getResult()
           ;
       }

       public function findOneBySomeField($value): ?FormulaireRecherche
       {
           return $this->createQueryBuilder('f')
               ->andWhere('f.exampleField = :val')
               ->setParameter('val', $value)
               ->getQuery()
               ->getOneOrNullResult()
           ;
       }
}
