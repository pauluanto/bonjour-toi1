<?php

namespace App\Repository;

use App\Entity\RecetteHasIngredient;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method RecetteHasIngredient|null find($id, $lockMode = null, $lockVersion = null)
 * @method RecetteHasIngredient|null findOneBy(array $criteria, array $orderBy = null)
 * @method RecetteHasIngredient[]    findAll()
 * @method RecetteHasIngredient[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RecetteHasIngredientRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, RecetteHasIngredient::class);
    }

    // /**
    //  * @return RecetteHasIngredient[] Returns an array of RecetteHasIngredient objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RecetteHasIngredient
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
