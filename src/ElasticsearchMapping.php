<?php
namespace Triadev\Es\Mapping;

use Elasticsearch\Client;
use Triadev\Es\Contract\ElasticsearchContract;
use Triadev\Es\Mapping\Contract\ElasticsearchMappingContract;
use Triadev\Es\Mapping\Mapping\Blueprint;

class ElasticsearchMapping implements ElasticsearchMappingContract
{
    /**
     * Get es client
     *
     * @return Client
     */
    public function getEsClient(): Client
    {
        return app(ElasticsearchContract::class)->getClient();
    }
    
    /**
     * Map
     *
     * @param \Closure $blueprint
     * @param string $esIndex
     * @param string $esType
     */
    public function map(\Closure $blueprint, string $esIndex, string $esType)
    {
        $blueprintMapping = new Blueprint();
        $blueprint($blueprintMapping);
    
        $blueprintMapping->build($esIndex, $esType);
    }
}
