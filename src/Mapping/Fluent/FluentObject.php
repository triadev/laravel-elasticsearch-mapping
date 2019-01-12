<?php
namespace Triadev\Es\Mapping\Mapping\Fluent;

use Illuminate\Support\Fluent;

/**
 * Class FluentObject
 * @package Triadev\Es\Mapping\Mapping\Fluent
 *
 * @property string|bool $dynamic
 * @property bool $enabled
 * @property array $properties
 *
 * @method FluentObject dynamic($dynamic)
 * @method FluentObject enabled(bool $enabled)
 * @method FluentObject properties(array $properties)
 *
 * @method FluentObject callback(\Closure $blueprint)
 */
class FluentObject extends Fluent
{

}
