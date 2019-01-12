<?php
namespace Triadev\Es\Mapping\Mapping\Fluent;

use Illuminate\Support\Fluent;

/**
 * Class FluentNested
 * @package Triadev\Es\Mapping\Mapping\Fluent
 *
 * @property string|bool $dynamic
 * @property array $properties
 *
 * @method FluentNested dynamic($dynamic)
 * @method FluentNested properties(array $properties)
 *
 * @method FluentNested callback(\Closure $blueprint)
 */
class FluentNested extends Fluent
{

}
