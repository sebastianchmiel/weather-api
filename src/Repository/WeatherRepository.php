<?php

namespace App\Repository;

use App\Entity\Weather;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Weather|null find($id, $lockMode = null, $lockVersion = null)
 * @method Weather|null findOneBy(array $criteria, array $orderBy = null)
 * @method Weather[]    findAll()
 * @method Weather[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WeatherRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Weather::class);
    }

    /**
     * save entity
     * 
     * @param Weather $entity
     * 
     * @return void
     */
    public function save(Weather $entity): void 
    {
        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush();
    }
    
    /**
     * get tempature stats (tempMin, tempMax, tempAvg)
     * 
     * @return array
     */
    public function getTemperatureStats(): array 
    {
        $qb = $this->createQueryBuilder('w')
            ->select('MIN(w.temperature) AS tempMin, MAX(w.temperature) AS tempMax, AVG(w.temperature) AS tempAvg')
            ->getQuery();

        try {
            return $qb->getSingleResult();
        } catch (Doctrine\ORM\NoResultException $ex) {
            return [
                'tempMin' => 0,
                'tempMax' => 0,
                'tempAvg' => 0
            ];
        }
    }
    
    /**
     * get most searched city name in whole history
     * 
     * @return string|null
     */
    public function getMostSerachedCity(): ?string
    {
        $qb = $this->createQueryBuilder('w')
            ->select('w.city, COUNT(w.city) as occurrence')
            ->groupBy('w.city')
            ->orderBy('occurrence', 'desc')
            ->setMaxResults(1)
            ->getQuery();

        try {
            $result = $qb->getSingleResult();
            return $result['city'] ?? null;
        } catch (Doctrine\ORM\NoResultException $ex) {
            return null;
        }
    }
    
    /**
     * get total seraches count
     * 
     * @return int
     */
    public function getTotalSearchesCount() :int 
    {
        $qb = $this->createQueryBuilder('w')
            ->select('COUNT(w.id) AS totalCount')
            ->getQuery();

        try {
            return (int)$qb->getSingleScalarResult();
        } catch (Doctrine\ORM\NoResultException $ex) {
            return 0;
        }
    }
}
