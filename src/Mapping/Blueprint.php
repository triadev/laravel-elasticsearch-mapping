<?php
namespace Triadev\Es\Mapping\Mapping;

use Illuminate\Support\Fluent;
use Triadev\Es\Mapping\Facade\ElasticMapping;
use Triadev\Es\Mapping\Mapping\Fluent\FluentBinary;
use Triadev\Es\Mapping\Mapping\Fluent\FluentBoolean;
use Triadev\Es\Mapping\Mapping\Fluent\FluentByte;
use Triadev\Es\Mapping\Mapping\Fluent\FluentCompletion;
use Triadev\Es\Mapping\Mapping\Fluent\FluentDate;
use Triadev\Es\Mapping\Mapping\Fluent\FluentDateRange;
use Triadev\Es\Mapping\Mapping\Fluent\FluentDouble;
use Triadev\Es\Mapping\Mapping\Fluent\FluentDoubleRange;
use Triadev\Es\Mapping\Mapping\Fluent\FluentFloat;
use Triadev\Es\Mapping\Mapping\Fluent\FluentFloatRange;
use Triadev\Es\Mapping\Mapping\Fluent\FluentGeoPoint;
use Triadev\Es\Mapping\Mapping\Fluent\FluentGeoShape;
use Triadev\Es\Mapping\Mapping\Fluent\FluentHalfFloat;
use Triadev\Es\Mapping\Mapping\Fluent\FluentInteger;
use Triadev\Es\Mapping\Mapping\Fluent\FluentIntegerRange;
use Triadev\Es\Mapping\Mapping\Fluent\FluentIp;
use Triadev\Es\Mapping\Mapping\Fluent\FluentIpRange;
use Triadev\Es\Mapping\Mapping\Fluent\FluentKeyword;
use Triadev\Es\Mapping\Mapping\Fluent\FluentLong;
use Triadev\Es\Mapping\Mapping\Fluent\FluentLongRange;
use Triadev\Es\Mapping\Mapping\Fluent\FluentNested;
use Triadev\Es\Mapping\Mapping\Fluent\FluentObject;
use Triadev\Es\Mapping\Mapping\Fluent\FluentScaledFloat;
use Triadev\Es\Mapping\Mapping\Fluent\FluentShort;
use Triadev\Es\Mapping\Mapping\Fluent\FluentText;
use Triadev\Es\Mapping\Mapping\Fluent\FluentTokenCount;

class Blueprint
{
    /** @var Fluent[] */
    private $fields = [];
    
    /** @var array|null */
    private $settings;
    
    /**
     * Blueprint constructor.
     * @param \Closure|null $callback
     */
    public function __construct(\Closure $callback = null)
    {
        if (!is_null($callback)) {
            $callback($this);
        }
    }
    
    /**
     * Build a mapping
     *
     * @param string $esIndex
     * @param string $esType
     * @return array
     */
    public function build(string $esIndex, string $esType) : array
    {
        if ($this->shouldCreateIndex($esIndex)) {
            return $this->createIndex($esIndex, $esType);
        }
        
        return $this->updateIndex($esIndex, $esType);
    }
    
    private function shouldCreateIndex(string $esIndex) : bool
    {
        return !ElasticMapping::getEsClient()->indices()->exists(['index' => $esIndex]);
    }
    
    private function createIndex(string $index, string $type) : array
    {
        $body = [
            'mappings' => [
                $type => [
                    'properties' => $this->toDsl()
                ]
            ]
        ];
        
        if (is_array($this->settings)) {
            $body['settings'] = $this->settings;
        }
        
        return ElasticMapping::getEsClient()->indices()->create([
            'index' => $index,
            'body' => $body
        ]);
    }
    
    private function updateIndex(string $index, string $type) : array
    {
        return ElasticMapping::getEsClient()->indices()->putMapping([
            'index' => $index,
            'type' => $type,
            'body' => [
                $type => [
                    '_source' => [
                        'enabled' => true
                    ],
                    'properties' => $this->toDsl()
                ]
            ]
        ]);
    }
    
    /**
     * To dsl
     *
     * @return array
     */
    public function toDsl() : array
    {
        return (new Compiler())->compileFields($this->fields);
    }
    
    /**
     * Get fields
     *
     * @return array
     */
    public function getFields() : array
    {
        return $this->fields;
    }
    
    /**
     * Text
     *
     * @param string $field
     * @param array $attributes
     * @return FluentText
     */
    public function text(string $field, array $attributes = []) : FluentText
    {
        return $this->addField('text', $field, $attributes);
    }
    
    /**
     * Keyword
     *
     * @param string $field
     * @param array $attributes
     * @return FluentKeyword
     */
    public function keyword(string $field, array $attributes = []) : FluentKeyword
    {
        return $this->addField('keyword', $field, $attributes);
    }
    
    /**
     * Long
     *
     * @param string $field
     * @param array $attributes
     * @return FluentLong
     */
    public function long(string $field, array $attributes = []) : FluentLong
    {
        return $this->addField('long', $field, $attributes);
    }
    
    /**
     * Integer
     *
     * @param string $field
     * @param array $attributes
     * @return FluentInteger
     */
    public function integer(string $field, array $attributes = []) : FluentInteger
    {
        return $this->addField('integer', $field, $attributes);
    }
    
    /**
     * Short
     *
     * @param string $field
     * @param array $attributes
     * @return FluentShort
     */
    public function short(string $field, array $attributes = []) : FluentShort
    {
        return $this->addField('short', $field, $attributes);
    }
    
    /**
     * Byte
     *
     * @param string $field
     * @param array $attributes
     * @return FluentByte
     */
    public function byte(string $field, array $attributes = []) : FluentByte
    {
        return $this->addField('byte', $field, $attributes);
    }
    
    /**
     * Double
     *
     * @param string $field
     * @param array $attributes
     * @return FluentDouble
     */
    public function double(string $field, array $attributes = []) : FluentDouble
    {
        return $this->addField('double', $field, $attributes);
    }
    
    /**
     * Float
     *
     * @param string $field
     * @param array $attributes
     * @return FluentFloat
     */
    public function float(string $field, array $attributes = []) : FluentFloat
    {
        return $this->addField('float', $field, $attributes);
    }
    
    /**
     * Half float
     *
     * @param string $field
     * @param array $attributes
     * @return FluentHalfFloat
     */
    public function halfFloat(string $field, array $attributes = []) : FluentHalfFloat
    {
        return $this->addField('half_float', $field, $attributes);
    }
    
    /**
     * Scaled float
     *
     * @param string $field
     * @param array $attributes
     * @return FluentScaledFloat
     */
    public function scaledFloat(string $field, array $attributes = []) : FluentScaledFloat
    {
        return $this->addField('scaled_float', $field, $attributes);
    }
    
    /**
     * Date
     *
     * @param string $field
     * @param array $attributes
     * @return FluentDate
     */
    public function date(string $field, array $attributes = []) : FluentDate
    {
        return $this->addField('date', $field, $attributes);
    }
    
    /**
     * Boolean
     *
     * @param string $field
     * @param array $attributes
     * @return FluentBoolean
     */
    public function boolean(string $field, array $attributes = []) : FluentBoolean
    {
        return $this->addField('boolean', $field, $attributes);
    }
    
    /**
     * Binary
     *
     * @param string $field
     * @param array $attributes
     * @return FluentBinary
     */
    public function binary(string $field, array $attributes = []) : FluentBinary
    {
        return $this->addField('binary', $field, $attributes);
    }
    
    /**
     * Range
     *
     * @param string $field
     * @param string $type
     * @param array $attributes
     * @return FluentIntegerRange|FluentFloatRange|FluentLongRange|FluentDoubleRange|FluentDateRange|FluentIpRange
     *
     * @throws \InvalidArgumentException
     */
    public function range(string $field, string $type, array $attributes = [])
    {
        $validTypes = [
            'integer',
            'float',
            'long',
            'double',
            'date',
            'ip'
        ];
        
        if (!in_array($type, $validTypes)) {
            throw new \InvalidArgumentException();
        }
        
        return $this->addField(strtolower($type) . '_range', $field, $attributes);
    }
    
    /**
     * Nested
     *
     * @param string $field
     * @param array $attributes
     * @return FluentNested
     */
    public function nested(string $field, array $attributes = []) : FluentNested
    {
        return $this->addField('nested', $field, $attributes);
    }
    
    /**
     * Object
     *
     * @param string $field
     * @param array $attributes
     * @return FluentObject
     */
    public function object(string $field, array $attributes = []) : FluentObject
    {
        return $this->addField('object', $field, $attributes);
    }
    
    /**
     * Geo point
     *
     * @param string $field
     * @param array $attributes
     * @return FluentGeoPoint
     */
    public function geoPoint(string $field, array $attributes = []) : FluentGeoPoint
    {
        return $this->addField('geo_point', $field, $attributes);
    }
    
    /**
     * Geo shape
     *
     * @param string $field
     * @param array $attributes
     * @return FluentGeoShape
     */
    public function geoShape(string $field, array $attributes = []) : FluentGeoShape
    {
        return $this->addField('geo_shape', $field, $attributes);
    }
    
    /**
     * Ip
     *
     * @param string $field
     * @param array $attributes
     * @return FluentIp
     */
    public function ip(string $field, array $attributes = []) : FluentIp
    {
        return $this->addField('ip', $field, $attributes);
    }
    
    /**
     * Completion
     *
     * @param string $field
     * @param array $attributes
     * @return FluentCompletion
     */
    public function completion(string $field, array $attributes = []) : FluentCompletion
    {
        return $this->addField('completion', $field, $attributes);
    }
    
    /**
     * Token count
     *
     * @param string $field
     * @param array $attributes
     * @return FluentTokenCount
     */
    public function tokenCount(string $field, array $attributes = []) : FluentTokenCount
    {
        return $this->addField('token_count', $field, $attributes);
    }
    
    /**
     * Add field
     *
     * @param string $type
     * @param string $name
     * @param array $attributes
     * @return mixed
     */
    public function addField(string $type, string $name, array $attributes = [])
    {
        $fluentClass = sprintf('\Triadev\Es\Mapping\Mapping\Fluent\Fluent%s', ucfirst(camel_case($type)));
        
        $this->fields[] = $field = new $fluentClass(
            array_merge(
                compact(
                    'type',
                    'name'
                ),
                $attributes
            )
        );
        
        return $field;
    }
    
    /**
     * Settings
     *
     * @param array $settings
     */
    public function settings(array $settings)
    {
        $this->settings = $settings;
    }
}
