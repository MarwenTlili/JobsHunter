<?php

namespace App\Repository;

use App\Entity\Job;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Job|null find($id, $lockMode = null, $lockVersion = null)
 * @method Job|null findOneBy(array $criteria, array $orderBy = null)
 * @method Job[]    findAll()
 * @method Job[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JobRepository extends ServiceEntityRepository
{
    public const PAGINATOR_PER_PAGE = 2;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Job::class);
    }

    public function findAllDESC()
    {
        return $this->findBy([], ['createdAt' => 'DESC']);
    }

    public function getJobPaginator(int $offset): Paginator
    {
        $query = $this->createQueryBuilder('j')
        // ->andWhere('j.id = :id')
        // ->setparameter('id', $job->getId())
        ->orderBy('j.createdAt', 'DESC')
        ->setMaxResults(self::PAGINATOR_PER_PAGE)
        ->setFirstResult($offset)
        ->getQuery();

        return new Paginator($query);
    }

    // /**
    //  * @return Job[] Returns an array of Job objects
    //  */
    // public function findByTitle($value)
    // {
    //     return $this->createQueryBuilder('j')
    //         ->andWhere('j.exampleField = :val')
    //         ->setParameter('val', $value)
    //         ->orderBy('j.id', 'ASC')
    //         ->setMaxResults(10)
    //         ->getQuery()
    //         ->getResult()
    //     ;
    // }

    /*
    public function findOneBySomeField($value): ?Job
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
