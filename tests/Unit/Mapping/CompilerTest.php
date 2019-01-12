<?php
namespace Tests\Unit\Business\Mapping;

use Tests\TestCase;
use Triadev\Es\Mapping\Mapping\Blueprint;
use Triadev\Es\Mapping\Mapping\Compiler;
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
        ], $this->compiler->compileText(new FluentText([
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
        ], $this->compiler->compileKeyword(new FluentKeyword()));
    }
    
    /**
     * @test
     */
    public function it_compiles_long()
    {
        $this->assertEquals([
            'type' => 'long'
        ], $this->compiler->compileLong(new FluentLong([
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
        ], $this->compiler->compileInteger(new FluentInteger([
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
        ], $this->compiler->compileShort(new FluentShort([
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
        ], $this->compiler->compileByte(new FluentByte([
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
        ], $this->compiler->compileDouble(new FluentDouble([
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
        ], $this->compiler->compileFloat(new FluentFloat([
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
        ], $this->compiler->compileHalfFloat(new FluentHalfFloat([
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
        ], $this->compiler->compileScaledFloat(new FluentScaledFloat([
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
        ], $this->compiler->compileDate(new FluentDate()));
    }
    
    /**
     * @test
     */
    public function it_compiles_boolean()
    {
        $this->assertEquals([
            'type' => 'boolean'
        ], $this->compiler->compileBoolean(new FluentBoolean()));
    }
    
    /**
     * @test
     */
    public function it_compiles_binary()
    {
        $this->assertEquals([
            'type' => 'binary'
        ], $this->compiler->compileBinary(new FluentBinary()));
    }
    
    /**
     * @test
     */
    public function it_compiles_integer_range()
    {
        $this->assertEquals([
            'type' => 'integer_range'
        ], $this->compiler->compileIntegerRange(new FluentIntegerRange([
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
        ], $this->compiler->compileFloatRange(new FluentFloatRange([
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
        ], $this->compiler->compileLongRange(new FluentLongRange([
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
        ], $this->compiler->compileDoubleRange(new FluentDoubleRange([
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
        ], $this->compiler->compileDateRange(new FluentDateRange([
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
        ], $this->compiler->compileIpRange(new FluentIpRange([
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
        ], $this->compiler->compileNested(new FluentNested([
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
        ], $this->compiler->compileObject(new FluentObject([
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
        ], $this->compiler->compileGeoPoint(new FluentGeoPoint()));
    }
    
    /**
     * @test
     */
    public function it_compiles_geo_shape()
    {
        $this->assertEquals([
            'type' => 'geo_shape'
        ], $this->compiler->compileGeoShape(new FluentGeoShape()));
    }
    
    /**
     * @test
     */
    public function it_compiles_ip()
    {
        $this->assertEquals([
            'type' => 'ip'
        ], $this->compiler->compileIp(new FluentIp()));
    }
    
    /**
     * @test
     */
    public function it_compiles_completion()
    {
        $this->assertEquals([
            'type' => 'completion'
        ], $this->compiler->compileCompletion(new FluentCompletion()));
    }
    
    /**
     * @test
     */
    public function it_compiles_token_count()
    {
        $this->assertEquals([
            'type' => 'token_count'
        ], $this->compiler->compileTokenCount(new FluentTokenCount()));
    }
}
