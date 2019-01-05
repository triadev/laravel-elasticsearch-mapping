<?php
namespace Triadev\Es\Mapping\Contract;

use Elasticsearch\Client;

interface ElasticsearchMappingContract
{
    /**
     * Get es client
     *
     * @return Client
     */
    public function getEsClient(): Client;
    
    /**
     * Map
     *
     * @param \Closure $blueprint
     * @param string $esIndex
     * @param string $esType
     */
    public function map(\Closure $blueprint, string $esIndex, string $esType);
}
