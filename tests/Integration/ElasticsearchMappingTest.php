<?php
namespace Tests\Integration;

use Elasticsearch\Client;
use Tests\TestCase;
use Triadev\Es\Mapping\Contract\ElasticsearchMappingContract;
use Triadev\Es\Mapping\Facade\ElasticMapping;
use Triadev\Es\Mapping\Mapping\Blueprint;

class ElasticsearchMappingTest extends TestCase
{
    const INDEX = 'phpunit_index';
    const TYPE = 'phpunit_type';
    
    /** @var ElasticsearchMappingContract */
    private $service;
    
    /**
     * Setup the test environment.
     */
    public function setUp()
    {
        parent::setUp();
        
        $this->service = app(ElasticsearchMappingContract::class);
    }
    
    /**
     * Refresh elasticsearch mappings
     */
    private function refreshElasticsearchMappings()
    {
        $this->deleteElasticsearchMappings();
        
        ElasticMapping::getEsClient()->indices()->create([
            'index' => self::INDEX
        ]);
    }
    
    /**
     * Delete elasticsearch mappings
     */
    private function deleteElasticsearchMappings()
    {
        if (ElasticMapping::getEsClient()->indices()->exists(['index' => self::INDEX])) {
            ElasticMapping::getEsClient()->indices()->delete(['index' => self::INDEX]);
        }
    }
    
    /**
     * @return array
     */
    private function getEsMapping() : array
    {
        return ElasticMapping::getEsClient()->indices()->getMapping(['index' => self::INDEX]);
    }
    
    /**
     * @return array
     */
    private function getEsSetting() : array
    {
        return ElasticMapping::getEsClient()->indices()->getSettings(['index' => self::INDEX]);
    }
    
    /**
     * @test
     */
    public function it_gets_an_elasticsearch_client()
    {
        $this->assertInstanceOf(Client::class, $this->service->getEsClient());
    }
    
    /**
     * @test
     */
    public function it_creates_a_new_index_with_mapping_and_settings()
    {
        $this->deleteElasticsearchMappings();
        
        $this->assertFalse(ElasticMapping::getEsClient()->indices()->exists(['index' => self::INDEX]));
    
        ElasticMapping::map($this->getTestBlueprintClosure(), self::INDEX, self::TYPE);
    
        $this->assertEquals($this->getMappingForEqualTest(), $this->getEsMapping());
    
        $settings = $this->getEsSetting();
    
        $this->assertEquals('30s', array_get($settings, 'phpunit_index.settings.index.refresh_interval'));
        $this->assertEquals(10, array_get($settings, 'phpunit_index.settings.index.number_of_replicas'));
        $this->assertEquals(12, array_get($settings, 'phpunit_index.settings.index.number_of_shards'));
    }
    
    /**
     * @test
     */
    public function it_runs_a_mapping_update()
    {
        $this->refreshElasticsearchMappings();
    
        $this->assertEquals([
            self::INDEX => [
                'mappings' => []
            ]
        ], $this->getEsMapping());
        
        ElasticMapping::map($this->getTestBlueprintClosure(), self::INDEX, self::TYPE);
    
        $this->assertEquals($this->getMappingForEqualTest(), $this->getEsMapping());
    
        $settings = $this->getEsSetting();
    
        $this->assertNull(array_get($settings, 'phpunit_index.settings.index.refresh_interval'));
        $this->assertEquals(1, array_get($settings, 'phpunit_index.settings.index.number_of_replicas'));
        $this->assertEquals(5, array_get($settings, 'phpunit_index.settings.index.number_of_shards'));
    }
    
    private function getTestBlueprintClosure() : \Closure
    {
        return function (Blueprint $blueprint) {
            $blueprint->integer('id');
            $blueprint->text('name');
            $blueprint->keyword('email');
    
            $blueprint->settings([
                'index' => [
                    'number_of_replicas' => 10,
                    'number_of_shards' => 12,
                    'refresh_interval' => '30s'
                ]
            ]);
        };
    }
    
    private function getMappingForEqualTest() : array
    {
        return [
            self::INDEX => [
                'mappings' => [
                    self::TYPE => [
                        'properties' => [
                            'id' => [
                                'type' => 'integer'
                            ],
                            'name' => [
                                'type' => 'text'
                            ],
                            'email' => [
                                'type' => 'keyword'
                            ]
                        ]
                    ]
                ]
            ]
        ];
    }
}
