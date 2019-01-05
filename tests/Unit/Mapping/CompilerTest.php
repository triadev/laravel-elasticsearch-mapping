<?php
namespace Tests\Unit\Business\Mapping;

use Illuminate\Support\Fluent;
use Tests\TestCase;
use Triadev\Es\Mapping\Mapping\Blueprint;
use Triadev\Es\Mapping\Mapping\Compiler;

class CompilerTest extends TestCase
{
    /** @var Compiler */
    private $compiler;
    
    /**
     * Setup the test environment.
     */
    public function setUp()
    {
        parent::setUp();
        
        $this->compiler = new Compiler();
    }
    
    /**
     * @test
     */
    public function it_compiles_a_text()
    {
        $this->assertEquals([
            'type' => 'text',
            'analyzer' => 'ANALYZER'
        ], $this->compiler->compileText(new Fluent([
            'type' => 'text',
            'analyzer' => 'ANALYZER'
        ])));
    }
    
    /**
     * @test
     */
    public function it_compiles_a_keyword()
    {
        $this->assertEquals([
            'type' => 'keyword'
        ], $this->compiler->compileKeyword(new Fluent()));
    }
    
    /**
     * @test
     */
    public function it_compiles_long()
    {
        $this->assertEquals([
            'type' => 'long'
        ], $this->compiler->compileLong(new Fluent([
            'type' => 'long'
        ])));
    }
    
    /**
     * @test
     */
    public function it_compiles_integer()
    {
        $this->assertEquals([
            'type' => 'integer'
        ], $this->compiler->compileInteger(new Fluent([
            'type' => 'integer'
        ])));
    }
    
    /**
     * @test
     */
    public function it_compiles_short()
    {
        $this->assertEquals([
            'type' => 'short'
        ], $this->compiler->compileShort(new Fluent([
            'type' => 'short'
        ])));
    }
    
    /**
     * @test
     */
    public function it_compiles_byte()
    {
        $this->assertEquals([
            'type' => 'byte'
        ], $this->compiler->compileByte(new Fluent([
            'type' => 'byte'
        ])));
    }
    
    /**
     * @test
     */
    public function it_compiles_double()
    {
        $this->assertEquals([
            'type' => 'double'
        ], $this->compiler->compileDouble(new Fluent([
            'type' => 'double'
        ])));
    }
    
    /**
     * @test
     */
    public function it_compiles_float()
    {
        $this->assertEquals([
            'type' => 'float'
        ], $this->compiler->compileFloat(new Fluent([
            'type' => 'float'
        ])));
    }
    
    /**
     * @test
     */
    public function it_compiles_half_float()
    {
        $this->assertEquals([
            'type' => 'half_float'
        ], $this->compiler->compileHalfFloat(new Fluent([
            'type' => 'half_float'
        ])));
    }
    
    /**
     * @test
     */
    public function it_compiles_scaled_float()
    {
        $this->assertEquals([
            'type' => 'scaled_float'
        ], $this->compiler->compileScaledFloat(new Fluent([
            'type' => 'scaled_float'
        ])));
    }
    
    /**
     * @test
     */
    public function it_compiles_date()
    {
        $this->assertEquals([
            'type' => 'date'
        ], $this->compiler->compileDate(new Fluent()));
    }
    
    /**
     * @test
     */
    public function it_compiles_boolean()
    {
        $this->assertEquals([
            'type' => 'boolean'
        ], $this->compiler->compileBoolean(new Fluent()));
    }
    
    /**
     * @test
     */
    public function it_compiles_binary()
    {
        $this->assertEquals([
            'type' => 'binary'
        ], $this->compiler->compileBinary(new Fluent()));
    }
    
    /**
     * @test
     */
    public function it_compiles_integer_range()
    {
        $this->assertEquals([
            'type' => 'integer_range'
        ], $this->compiler->compileIntegerRange(new Fluent([
            'type' => 'integer_range'
        ])));
    }
    
    /**
     * @test
     */
    public function it_compiles_float_range()
    {
        $this->assertEquals([
            'type' => 'float_range'
        ], $this->compiler->compileFloatRange(new Fluent([
            'type' => 'float_range'
        ])));
    }
    
    /**
     * @test
     */
    public function it_compiles_long_range()
    {
        $this->assertEquals([
            'type' => 'long_range'
        ], $this->compiler->compileLongRange(new Fluent([
            'type' => 'long_range'
        ])));
    }
    
    /**
     * @test
     */
    public function it_compiles_double_range()
    {
        $this->assertEquals([
            'type' => 'double_range'
        ], $this->compiler->compileDoubleRange(new Fluent([
            'type' => 'double_range'
        ])));
    }
    
    /**
     * @test
     */
    public function it_compiles_date_range()
    {
        $this->assertEquals([
            'type' => 'date_range'
        ], $this->compiler->compileIntegerRange(new Fluent([
            'type' => 'date_range'
        ])));
    }
    
    /**
     * @test
     */
    public function it_compiles_ip_range()
    {
        $this->assertEquals([
            'type' => 'ip_range'
        ], $this->compiler->compileIntegerRange(new Fluent([
            'type' => 'ip_range'
        ])));
    }
    
    /**
     * @test
     */
    public function it_compiles_nested()
    {
        $this->assertEquals([
            'type' => 'nested',
            'properties' => [
                'KEYWORD' => [
                    'type' => 'keyword'
                ]
            ]
        ], $this->compiler->compileNested(new Fluent([
            'callback' => function (Blueprint $blueprint) {
                $blueprint->keyword('KEYWORD');
            }
        ])));
    }
    
    /**
     * @test
     */
    public function it_compiles_object()
    {
        $this->assertEquals([
            'type' => 'nested',
            'properties' => [
                'KEYWORD' => [
                    'type' => 'keyword'
                ]
            ]
        ], $this->compiler->compileObject(new Fluent([
            'callback' => function (Blueprint $blueprint) {
                $blueprint->keyword('KEYWORD');
            }
        ])));
    }
    
    /**
     * @test
     */
    public function it_compiles_geo_point()
    {
        $this->assertEquals([
            'type' => 'geo_point'
        ], $this->compiler->compileGeoPoint(new Fluent()));
    }
    
    /**
     * @test
     */
    public function it_compiles_geo_shape()
    {
        $this->assertEquals([
            'type' => 'geo_shape'
        ], $this->compiler->compileGeoShape(new Fluent()));
    }
    
    /**
     * @test
     */
    public function it_compiles_ip()
    {
        $this->assertEquals([
            'type' => 'ip'
        ], $this->compiler->compileIp(new Fluent()));
    }
    
    /**
     * @test
     */
    public function it_compiles_completion()
    {
        $this->assertEquals([
            'type' => 'completion'
        ], $this->compiler->compileCompletion(new Fluent()));
    }
    
    /**
     * @test
     */
    public function it_compiles_token_count()
    {
        $this->assertEquals([
            'type' => 'token_count'
        ], $this->compiler->compileTokenCount(new Fluent()));
    }
}
