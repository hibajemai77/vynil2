<?php

namespace App\Repository;

use App\Entity\Slug;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Slug|null find($id, $lockMode = null, $lockVersion = null)
 * @method Slug|null findOneBy(array $criteria, array $orderBy = null)
 * @method Slug[]    findAll()
 * @method Slug[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SlugRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Slug::class);
    }

    /**
     * Find slugs by example field.
     *
     * @param mixed $value
     * @return Slug[] Returns an array of Slug objects
     */
    public function findByExampleField($value): array
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * Find one slug by some field.
     *
     * @param mixed $value
     * @return Slug|null Returns a single Slug object or null
     */
    public function findOneBySomeField($value): ?Slug
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.someField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
}
