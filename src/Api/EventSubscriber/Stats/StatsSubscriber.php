<?php

namespace App\Api\EventSubscriber\Stats;

use ApiPlatform\Core\EventListener\EventPriorities;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use App\Repository\WeatherRepository;
use App\Model\Stats\StatsModel;

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
        $statsModel = new StatsModel();
        
        // temperature
        $temperatureStats = $this->repository->getTemperatureStats();
        $statsModel->setTemperatureMin((float)$temperatureStats['tempMin']);
        $statsModel->setTemperatureMax((float)$temperatureStats['tempMax']);
        $statsModel->setTemperatureAvg((float)$temperatureStats['tempAvg']);

        // most searched city
        $statsModel->setMostSearchedCity($this->repository->getMostSerachedCity());
        
        // totat searches count
        $statsModel->setTotalSearchesCount($this->repository->getTotalSearchesCount());
        
        $event->setResponse(new JsonResponse($statsModel->toArray(), 200));
    }
}
