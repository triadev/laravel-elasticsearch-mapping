<?php
namespace Triadev\Es\Mapping\Mapping\Fluent;

use Illuminate\Support\Fluent;

/**
 * Class FluentDouble
 * @package Triadev\Es\Mapping\Mapping\Fluent
 *
 * @property string $type
 * @property bool $coerce
 * @property int $boost
 * @property bool $doc_values
 * @property bool $ignore_malformed
 * @property bool $index
 * @property string|null $null_value
 * @property bool $store
 *
 * @method FluentDouble type(string $type)
 * @method FluentDouble coerce(bool $coerce)
 * @method FluentDouble boost(int $boost)
 * @method FluentDouble doc_values(bool $doc_values)
 * @method FluentDouble ignore_malformed(bool $ignore_malformed)
 * @method FluentDouble index(bool $index)
 * @method FluentDouble null_value(?string $null_value)
 * @method FluentDouble store(bool $store)
 */
class FluentDouble extends Fluent
{

}
