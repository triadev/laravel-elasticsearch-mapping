<?php
namespace Triadev\Es\Mapping\Mapping\Fluent;

use Illuminate\Support\Fluent;

/**
 * Class FluentText
 * @package Triadev\Es\Mapping\Mapping\Fluent
 *
 * @property string $analyzer
 * @property integer $boost
 * @property bool $eager_global_ordinals
 * @property bool $fielddata
 * @property array $fielddata_frequency_filter
 * @property array $fields
 * @property bool $index
 * @property string $index_options
 * @property array $index_prefixes
 * @property bool $index_phrases
 * @property bool $norms
 * @property int $position_increment_gap
 * @property bool $store
 * @property string $search_analyzer
 * @property string $search_quote_analyzer
 * @property string $similarity
 * @property string $term_vector
 *
 * @method FluentText analyzer(string $analyzer)
 * @method FluentText boost(integer $boost)
 * @method FluentText eager_global_ordinals(bool $eager_global_ordinals)
 * @method FluentText fielddata(bool $fielddata)
 * @method FluentText fielddata_frequency_filter(array $fielddata_frequency_filter)
 * @method FluentText fields(array $fields)
 * @method FluentText index(bool $index)
 * @method FluentText index_options(string $index_options)
 * @method FluentText index_prefixes(array $index_prefixes)
 * @method FluentText index_phrases(bool $index_phrases)
 * @method FluentText norms(bool $norms)
 * @method FluentText position_increment_gap(int $position_increment_gap)
 * @method FluentText store(bool $store)
 * @method FluentText search_analyzer(string $search_analyzer)
 * @method FluentText search_quote_analyzer(string $search_quote_analyzer)
 * @method FluentText similarity(string $similarity)
 * @method FluentText term_vector(string $term_vector)
 */
class FluentText extends Fluent
{

}
