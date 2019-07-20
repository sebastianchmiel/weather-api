<?php

namespace App\Api\Dto\Stats;

use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource(
 *      collectionOperations={
 *          "post"={
 *              "method"="GET",
 *              "path"="/weathers/get-stats",
 *          },
 *      },
 *      itemOperations={},
 * )
 */
final class GetStatsRequest {
    /**
     * @Assert\NotBlank
     * @var float
     */
    public $lat;
}
