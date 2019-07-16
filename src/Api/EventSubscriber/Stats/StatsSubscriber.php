<?php

namespace App\Api\EventSubscriber\Stats;

use ApiPlatform\Core\EventListener\EventPriorities;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use App\Repository\WeatherRepository;

final class StatsSubscriber implements EventSubscriberInterface
{
    /**
     * @var WeatherRepository
     */
    private $repository;
    
    /**
     * @param WeatherRepository $repository
     */
    public function __construct(WeatherRepository $repository) {
        $this->repository = $repository;
    }
    
    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::VIEW => ['getStats', EventPriorities::POST_VALIDATE],
        ];
    }

    /**
     * get stats from weather actions
     * 
     * @param GetResponseForControllerResultEvent $event
     * 
     * @return void
     */
    public function getStats(GetResponseForControllerResultEvent $event): void
    {
        $request = $event->getRequest();
        if ('api_get_stats_requests_post_collection' !== $request->attributes->get('_route')) {
            return;
        }
        
        // prepare result 
        $result = [];
        
        // temperature
        $temperatureStats = $this->repository->getTemperatureStats();
        $result['temperature'] = [
            'min' => (float)$temperatureStats['tempMin'],
            'max' => (float)$temperatureStats['tempMax'],
            'avg' => (float)$temperatureStats['tempAvg']
        ];

        // most searched city
        $result['mostSearchedCity'] = $this->repository->getMostSerachedCity();
        
        // totat searches count
        $result['totalSearchesCount'] = $this->repository->getTotalSearchesCount();
        
        $event->setResponse(new JsonResponse($result, 200));
    }
}
