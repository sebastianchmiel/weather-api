<?php

namespace App\Api\EventSubscriber\Stats;

use ApiPlatform\Core\EventListener\EventPriorities;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use App\Api\Dto\Stats\GetStatsRequest;

final class StatsSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::VIEW => ['getStats', EventPriorities::POST_VALIDATE],
        ];
    }

    public function getStats(GetResponseForControllerResultEvent $event)
    {
        $request = $event->getRequest();
        if ('api_get_stats_requests_post_collection' !== $request->attributes->get('_route')) {
            return;
        }

        // TODO
        
        $event->setResponse(new JsonResponse(['todo'], 200));
    }
}
