<?php
namespace Triadev\Es\Mapping\Facade;

use Elasticsearch\Client;
use Illuminate\Support\Facades\Facade;
use Triadev\Es\Mapping\Contract\ElasticsearchMappingContract;

/**
 * Class ElasticMapping
 * @package Triadev\Es\Mapping\Facade
 *
 * @method static Client getEsClient()
 * @method static map(\Closure $blueprint, string $esIndex, string $esType)
 */
class ElasticMapping extends Facade
{
    /**
     * @return ElasticsearchMappingContract
     */
    protected static function getFacadeAccessor()
    {
        return app(ElasticsearchMappingContract::class);
    }
}
