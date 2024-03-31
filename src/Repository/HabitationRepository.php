<?php

namespace App\Repository;

use App\Entity\Habitation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Habitation>
 *
 * @method Habitation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Habitation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Habitation[]    findAll()
 * @method Habitation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HabitationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Habitation::class);
    }

    //    /**
    //     * @return Habitation[] Returns an array of Habitation objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('h')
    //            ->andWhere('h.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('h.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Habitation
    //    {
    //        return $this->createQueryBuilder('h')
    //            ->andWhere('h.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
     // Méthode pour rechercher des habitations en fonction des critères spécifiés
     public function findByCriteria($criteria)
     {
         // Exemple de logique de recherche - à adapter selon vos besoins
         $qb = $this->createQueryBuilder('h');
 
         if (!empty($criteria['departement'])) {
             $qb->andWhere('h.departement = :departement')
                 ->setParameter('departement', $criteria['departement']);
         }

         if (!empty($criteria['type'])) {
            $qb->andWhere('h.type = :type')
                ->setParameter('type', $criteria['type']);
        }

        if (!empty($criteria['superficie'])) {
            $qb->andWhere('h.superficie >= :min_superficie')
                ->setParameter('min_superficie', $criteria['superficie']);
        }

        if (!empty($criteria['prix'])) {
            $qb->andWhere('h.prix <= :max_prix')
                ->setParameter('max_prix', $criteria['prix']);
        }

        if (!empty($criteria['loyer'])) {
            $qb->andWhere('h.loyer <= :max_loyer')
                ->setParameter('max_loyer', $criteria['loyer']);
        }

        if (!empty($criteria['rentabilite'])) {
            $qb->andWhere('h.rentabilite >= :min_rentabilite')
                ->setParameter('min_rentabilite', $criteria['rentabilite']);
        }

 
         // Ajoutez d'autres critères selon vos besoins
 
         return $qb->getQuery()->getResult();
     }
}
