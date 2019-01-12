<?php
namespace Triadev\Es\Mapping\Mapping\Fluent;

use Illuminate\Support\Fluent;

/**
 * Class FluentIp
 * @package Triadev\Es\Mapping\Mapping\Fluent
 *
 * @property int $boost
 * @property bool $doc_values
 * @property bool $index
 * @property string|null $null_value
 * @property bool $store
 *
 * @method FluentIp boost(int $boost)
 * @method FluentIp doc_values(bool $doc_values)
 * @method FluentIp index(bool $index)
 * @method FluentIp null_value(bool $null_value)
 * @method FluentIp store(bool $store)
 */
class FluentIp extends Fluent
{

}
