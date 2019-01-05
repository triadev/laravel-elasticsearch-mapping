<?php
namespace Tests\Unit\Business\Mapping;

use Tests\TestCase;
use Triadev\Es\Mapping\Mapping\Blueprint;

class BlueprintTest extends TestCase
{
    /** @var Blueprint */
    private $blueprint;
    
    /**
     * Setup the test environment.
     */
    public function setUp()
    {
        parent::setUp();
        
        $this->blueprint = new Blueprint();
    }
    
    /**
     * @test
     */
    public function it_builds_mapping_with_fluent_syntax()
    {
        $this->blueprint->text('TEXT')->analyzer('ANALYZER');
        $this->blueprint->keyword('KEYWORD');
        $this->blueprint->long('LONG');
        $this->blueprint->integer('INTEGER');
        $this->blueprint->short('SHORT');
        $this->blueprint->byte('BYTE');
        $this->blueprint->double('DOUBLE');
        $this->blueprint->float('FLOAT');
        $this->blueprint->halfFloat('HALF_FLOAT');
        $this->blueprint->scaledFloat('SCALED_FLOAT');
        $this->blueprint->date('DATE');
        $this->blueprint->boolean('BOOLEAN');
        $this->blueprint->binary('BINARY');
        $this->blueprint->range('RANGE_INTEGER', 'integer');
        $this->blueprint->range('RANGE_FLOAT', 'float');
        $this->blueprint->range('RANGE_LONG', 'long');
        $this->blueprint->range('RANGE_DOUBLE', 'double');
        $this->blueprint->range('RANGE_DATE', 'date');
        $this->blueprint->range('RANGE_IP', 'ip');
        $this->blueprint->nested('NESTED')->callback(function (Blueprint $blueprint) {
            $blueprint->keyword('NESTED_KEYWORD');
        });
        $this->blueprint->object('OBJECT')->callback(function (Blueprint $blueprint) {
            $blueprint->keyword('OBJECT_KEYWORD');
        });
        $this->blueprint->geoPoint('GEO_POINT');
        $this->blueprint->geoShape('GEO_SHAPE');
        $this->blueprint->ip('IP');
        $this->blueprint->completion('COMPLETION');
        $this->blueprint->tokenCount('TOKEN_COUNT');
        
        $this->assertEquals([
            'TEXT' => [
                'type' => 'text',
                'analyzer' => 'ANALYZER'
            ],
            'KEYWORD' => [
                'type' => 'keyword'
            ],
            'LONG' => [
                'type' => 'long'
            ],
            'INTEGER' => [
                'type' => 'integer'
            ],
            'SHORT' => [
                'type' => 'short'
            ],
            'BYTE' => [
                'type' => 'byte'
            ],
            'DOUBLE' => [
                'type' => 'double'
            ],
            'FLOAT' => [
                'type' => 'float'
            ],
            'HALF_FLOAT' => [
                'type' => 'half_float'
            ],
            'SCALED_FLOAT' => [
                'type' => 'scaled_float'
            ],
            'DATE' => [
                'type' => 'date'
            ],
            'BOOLEAN' => [
                'type' => 'boolean'
            ],
            'BINARY' => [
                'type' => 'binary'
            ],
            'RANGE_INTEGER' => [
                'type' => 'integer_range'
            ],
            'RANGE_FLOAT' => [
                'type' => 'float_range'
            ],
            'RANGE_LONG' => [
                'type' => 'long_range'
            ],
            'RANGE_DOUBLE' => [
                'type' => 'double_range'
            ],
            'RANGE_DATE' => [
                'type' => 'date_range'
            ],
            'RANGE_IP' => [
                'type' => 'ip_range'
            ],
            'NESTED' => [
                'type' => 'nested',
                'properties' => [
                    'NESTED_KEYWORD' => [
                        'type' => 'keyword'
                    ]
                ]
            ],
            'OBJECT' => [
                'type' => 'nested',
                'properties' => [
                    'OBJECT_KEYWORD' => [
                        'type' => 'keyword'
                    ]
                ]
            ],
            'GEO_POINT' => [
                'type' => 'geo_point'
            ],
            'GEO_SHAPE' => [
                'type' => 'geo_shape'
            ],
            'IP' => [
                'type' => 'ip'
            ],
            'COMPLETION' => [
                'type' => 'completion'
            ],
            'TOKEN_COUNT' => [
                'type' => 'token_count'
            ]
        ], $this->blueprint->toDsl());
    }
    
    /**
     * @test
     */
    public function it_builds_mapping_with_attributes()
    {
        $this->blueprint->text('TEXT', ['analyzer' => 'ANALYZER']);
    
        $this->assertEquals([
            'TEXT' => [
                'type' => 'text',
                'analyzer' => 'ANALYZER'
            ]
        ], $this->blueprint->toDsl());
    }
    
    /**
     * @test
     * @expectedException \InvalidArgumentException
     */
    public function it_throws_an_exception_if_range_type_is_invalid()
    {
        $this->blueprint->range('FIELD', 'INVALID');
    }
}
