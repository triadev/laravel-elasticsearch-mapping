<?php
namespace Triadev\Es\Mapping\Mapping\Fluent;

use Illuminate\Support\Fluent;

/**
 * Class FluentBoolean
 * @package Triadev\Es\Mapping\Mapping\Fluent
 *
 * @property int $boost
 * @property bool $doc_values
 * @property bool $index
 * @property string|null $null_value
 * @property bool $store
 *
 * @method FluentBoolean boost(int $boost)
 * @method FluentBoolean doc_values(bool $doc_values)
 * @method FluentBoolean index(bool $index)
 * @method FluentBoolean null_value(bool $null_value)
 * @method FluentBoolean store(bool $store)
 */
class FluentBoolean extends Fluent
{

}
