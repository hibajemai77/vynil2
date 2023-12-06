<?php

namespace App\Repository;

use App\Entity\Slug;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class SlugRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Slug::class);
    }

    /**
     * Find slugs by name field.
     *
     * @param mixed $value
     * @return Slug[] Returns an array of Slug objects
     */
    public function findByname($value): array
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.name = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * Find one slug by name field.
     *
     * @param mixed $value
     * @return Slug|null Returns a single Slug object or null
     */
    public function findOneByname($value): ?Slug
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.name = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
}
