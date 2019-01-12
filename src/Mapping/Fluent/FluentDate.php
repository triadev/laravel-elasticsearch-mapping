<?php
namespace Triadev\Es\Mapping\Mapping\Fluent;

use Illuminate\Support\Fluent;

/**
 * Class FluentDate
 * @package Triadev\Es\Mapping\Mapping\Fluent
 *
 * @property int $boost
 * @property bool $doc_values
 * @property string $format
 * @property string $locale
 * @property bool $ignore_malformed
 * @property bool $index
 * @property string|null $null_value
 * @property bool $store
 *
 * @method FluentDate boost(int $boost)
 * @method FluentDate doc_values(bool $doc_values)
 * @method FluentDate format(string $format)
 * @method FluentDate locale(string $locale)
 * @method FluentDate ignore_malformed(bool $ignore_malformed)
 * @method FluentDate index(bool $index)
 * @method FluentDate null_value(?string $null_value)
 * @method FluentDate store(bool $store)
 */
class FluentDate extends Fluent
{

}
