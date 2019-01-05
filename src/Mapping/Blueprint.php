<?php
namespace Triadev\Es\Mapping\Mapping;

use Illuminate\Support\Fluent;
use Triadev\Es\Mapping\Facade\ElasticMapping;

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
        return ElasticMapping::getEsClient()->indices()->exists(['index' => $esIndex]);
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
     * @return Fluent
     */
    public function text(string $field, array $attributes = []) : Fluent
    {
        return $this->addField('text', $field, $attributes);
    }
    
    /**
     * Keyword
     *
     * @param string $field
     * @param array $attributes
     * @return Fluent
     */
    public function keyword(string $field, array $attributes = []) : Fluent
    {
        return $this->addField('keyword', $field, $attributes);
    }
    
    /**
     * Long
     *
     * @param string $field
     * @param array $attributes
     * @return Fluent
     */
    public function long(string $field, array $attributes = []) : Fluent
    {
        return $this->addField('long', $field, $attributes);
    }
    
    /**
     * Integer
     *
     * @param string $field
     * @param array $attributes
     * @return Fluent
     */
    public function integer(string $field, array $attributes = []) : Fluent
    {
        return $this->addField('integer', $field, $attributes);
    }
    
    /**
     * Short
     *
     * @param string $field
     * @param array $attributes
     * @return Fluent
     */
    public function short(string $field, array $attributes = []) : Fluent
    {
        return $this->addField('short', $field, $attributes);
    }
    
    /**
     * Byte
     *
     * @param string $field
     * @param array $attributes
     * @return Fluent
     */
    public function byte(string $field, array $attributes = []) : Fluent
    {
        return $this->addField('byte', $field, $attributes);
    }
    
    /**
     * Double
     *
     * @param string $field
     * @param array $attributes
     * @return Fluent
     */
    public function double(string $field, array $attributes = []) : Fluent
    {
        return $this->addField('double', $field, $attributes);
    }
    
    /**
     * Float
     *
     * @param string $field
     * @param array $attributes
     * @return Fluent
     */
    public function float(string $field, array $attributes = []) : Fluent
    {
        return $this->addField('float', $field, $attributes);
    }
    
    /**
     * Half float
     *
     * @param string $field
     * @param array $attributes
     * @return Fluent
     */
    public function halfFloat(string $field, array $attributes = []) : Fluent
    {
        return $this->addField('half_float', $field, $attributes);
    }
    
    /**
     * Scaled float
     *
     * @param string $field
     * @param array $attributes
     * @return Fluent
     */
    public function scaledFloat(string $field, array $attributes = []) : Fluent
    {
        return $this->addField('scaled_float', $field, $attributes);
    }
    
    /**
     * Date
     *
     * @param string $field
     * @param array $attributes
     * @return Fluent
     */
    public function date(string $field, array $attributes = []) : Fluent
    {
        return $this->addField('date', $field, $attributes);
    }
    
    /**
     * Boolean
     *
     * @param string $field
     * @param array $attributes
     * @return Fluent
     */
    public function boolean(string $field, array $attributes = []) : Fluent
    {
        return $this->addField('boolean', $field, $attributes);
    }
    
    /**
     * Binary
     *
     * @param string $field
     * @param array $attributes
     * @return Fluent
     */
    public function binary(string $field, array $attributes = []) : Fluent
    {
        return $this->addField('binary', $field, $attributes);
    }
    
    /**
     * Range
     *
     * @param string $field
     * @param string $type
     * @param array $attributes
     * @return Fluent
     *
     * @throws \InvalidArgumentException
     */
    public function range(string $field, string $type, array $attributes = []) : Fluent
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
     * @return Fluent
     */
    public function nested(string $field, array $attributes = []) : Fluent
    {
        return $this->addField('nested', $field, $attributes);
    }
    
    /**
     * Object
     *
     * @param string $field
     * @param array $attributes
     * @return Fluent
     */
    public function object(string $field, array $attributes = []) : Fluent
    {
        return $this->addField('object', $field, $attributes);
    }
    
    /**
     * Geo point
     *
     * @param string $field
     * @param array $attributes
     * @return Fluent
     */
    public function geoPoint(string $field, array $attributes = []) : Fluent
    {
        return $this->addField('geo_point', $field, $attributes);
    }
    
    /**
     * Geo shape
     *
     * @param string $field
     * @param array $attributes
     * @return Fluent
     */
    public function geoShape(string $field, array $attributes = []) : Fluent
    {
        return $this->addField('geo_shape', $field, $attributes);
    }
    
    /**
     * Ip
     *
     * @param string $field
     * @param array $attributes
     * @return Fluent
     */
    public function ip(string $field, array $attributes = []) : Fluent
    {
        return $this->addField('ip', $field, $attributes);
    }
    
    /**
     * Completion
     *
     * @param string $field
     * @param array $attributes
     * @return Fluent
     */
    public function completion(string $field, array $attributes = []) : Fluent
    {
        return $this->addField('completion', $field, $attributes);
    }
    
    /**
     * Token count
     *
     * @param string $field
     * @param array $attributes
     * @return Fluent
     */
    public function tokenCount(string $field, array $attributes = []) : Fluent
    {
        return $this->addField('token_count', $field, $attributes);
    }
    
    /**
     * Add field
     *
     * @param string $type
     * @param string $name
     * @param array $attributes
     * @return Fluent
     */
    public function addField(string $type, string $name, array $attributes = []) : Fluent
    {
        $this->fields[] = $field = new Fluent(
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
