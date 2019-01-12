<?php
namespace Triadev\Es\Mapping\Mapping\Fluent;

use Illuminate\Support\Fluent;

/**
 * Class FluentKeyword
 * @package Triadev\Es\Mapping\Mapping\Fluent
 *
 * @property int $boost
 * @property bool $doc_values
 * @property bool $eager_global_ordinals
 * @property array $fields
 * @property int $ignore_above
 * @property bool $index
 * @property string $index_options
 * @property bool $norms
 * @property string|null $null_value
 * @property bool $store
 * @property string $similarity
 * @property string $normalizer
 * @property bool $split_queries_on_whitespace
 *
 * @method FluentKeyword boost(int $boost)
 * @method FluentKeyword doc_values(bool $doc_values)
 * @method FluentKeyword eager_global_ordinals(bool $eager_global_ordinals)
 * @method FluentKeyword fields(array $fields)
 * @method FluentKeyword ignore_above(int $ignore_above)
 * @method FluentKeyword index(bool $index)
 * @method FluentKeyword index_options(string $index_options)
 * @method FluentKeyword norms(bool $norms)
 * @method FluentKeyword null_value(?string $null_value)
 * @method FluentKeyword store(bool $store)
 * @method FluentKeyword similarity(string $similarity)
 * @method FluentKeyword normalizer(string $normalizer)
 * @method FluentKeyword split_queries_on_whitespace(bool $split_queries_on_whitespace)
 */
class FluentKeyword extends Fluent
{

}
