<?php
namespace Triadev\Es\Mapping\Mapping;

use Illuminate\Support\Fluent;
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

class Compiler
{
    /**
     * Compile: text
     *
     * @param FluentText $fluent
     * @return array
     */
    public function compileText(FluentText $fluent) : array
    {
        return $this->formatAttributes([
            'type' => 'text',
            'analyzer' => $fluent->analyzer,
            'boost' => $fluent->boost,
            'eager_global_ordinals' => $fluent->eager_global_ordinals,
            'fielddata' => $fluent->fielddata,
            'fielddata_frequency_filter' => $fluent->fielddata_frequency_filter,
            'fields' => $fluent->fields,
            'index' => $fluent->index,
            'index_options' => $fluent->index_options,
            'index_prefixes' => $fluent->index_prefixes,
            'index_phrases' => $fluent->index_phrases,
            'norms' => $fluent->norms,
            'position_increment_gap' => $fluent->position_increment_gap,
            'store' => $fluent->store,
            'search_analyzer' => $fluent->search_analyzer,
            'search_quote_analyzer' => $fluent->search_quote_analyzer,
            'similarity' => $fluent->similarity,
            'term_vector' => $fluent->term_vector
        ]);
    }
    
    /**
     * Compile: keyword
     *
     * @param FluentKeyword $fluent
     * @return array
     */
    public function compileKeyword(FluentKeyword $fluent) : array
    {
        return $this->formatAttributes([
            'type' => 'keyword',
            'boost' => $fluent->boost,
            'doc_values' => $fluent->doc_values,
            'eager_global_ordinals' => $fluent->eager_global_ordinals,
            'fields' => $fluent->fields,
            'ignore_above' => $fluent->ignore_above,
            'index' => $fluent->index,
            'index_options' => $fluent->index_options,
            'norms' => $fluent->norms,
            'null_value' => $fluent->null_value,
            'store' => $fluent->store,
            'similarity' => $fluent->similarity,
            'normalizer' => $fluent->normalizer,
            'split_queries_on_whitespace' => $fluent->split_queries_on_whitespace
        ]);
    }
    
    /**
     * Compile: long
     *
     * @param FluentLong $fluent
     * @return array
     */
    public function compileLong(FluentLong $fluent) : array
    {
        return $this->compileNumeric($fluent);
    }
    
    /**
     * Compile: integer
     *
     * @param FluentInteger $fluent
     * @return array
     */
    public function compileInteger(FluentInteger $fluent) : array
    {
        return $this->compileNumeric($fluent);
    }
    
    /**
     * Compile: short
     *
     * @param FluentShort $fluent
     * @return array
     */
    public function compileShort(FluentShort $fluent) : array
    {
        return $this->compileNumeric($fluent);
    }
    
    /**
     * Compile: byte
     *
     * @param FluentByte $fluent
     * @return array
     */
    public function compileByte(FluentByte $fluent) : array
    {
        return $this->compileNumeric($fluent);
    }
    
    /**
     * Compile: double
     *
     * @param FluentDouble $fluent
     * @return array
     */
    public function compileDouble(FluentDouble $fluent) : array
    {
        return $this->compileNumeric($fluent);
    }
    
    /**
     * Compile: float
     *
     * @param FluentFloat $fluent
     * @return array
     */
    public function compileFloat(FluentFloat $fluent) : array
    {
        return $this->compileNumeric($fluent);
    }
    
    /**
     * Compile: half float
     *
     * @param FluentHalfFloat $fluent
     * @return array
     */
    public function compileHalfFloat(FluentHalfFloat $fluent) : array
    {
        return $this->compileNumeric($fluent);
    }
    
    /**
     * Compile: scaled float
     *
     * @param FluentScaledFloat $fluent
     * @return array
     */
    public function compileScaledFloat(FluentScaledFloat $fluent) : array
    {
        return $this->compileNumeric($fluent);
    }
    
    /**
     * Compile: numeric
     *
     * @param Fluent $fluent
     * @return array
     */
    public function compileNumeric(Fluent $fluent) : array
    {
        return $this->formatAttributes([
            'type' => $fluent->type,
            'coerce' => $fluent->coerce,
            'boost' => $fluent->boost,
            'doc_values' => $fluent->doc_values,
            'ignore_malformed' => $fluent->ignore_malformed,
            'index' => $fluent->index,
            'null_value' => $fluent->null_value,
            'store' => $fluent->store
        ]);
    }
    
    /**
     * Compile: date
     *
     * @param FluentDate $fluent
     * @return array
     */
    public function compileDate(FluentDate $fluent) : array
    {
        return $this->formatAttributes([
            'type' => 'date',
            'boost' => $fluent->boost,
            'doc_values' => $fluent->doc_values,
            'format' => $fluent->format,
            'locale' => $fluent->locale,
            'ignore_malformed' => $fluent->ignore_malformed,
            'index' => $fluent->index,
            'null_value' => $fluent->null_value,
            'store' => $fluent->store
        ]);
    }
    
    /**
     * Compile: boolean
     *
     * @param FluentBoolean $fluent
     * @return array
     */
    public function compileBoolean(FluentBoolean $fluent) : array
    {
        return $this->formatAttributes([
            'type' => 'boolean',
            'boost' => $fluent->boost,
            'doc_values' => $fluent->doc_values,
            'index' => $fluent->index,
            'null_value' => $fluent->null_value,
            'store' => $fluent->store
        ]);
    }
    
    /**
     * Compile: binary
     *
     * @param FluentBinary $fluent
     * @return array
     */
    public function compileBinary(FluentBinary $fluent) : array
    {
        return $this->formatAttributes([
            'type' => 'binary',
            'doc_values' => $fluent->doc_values,
            'store' => $fluent->store
        ]);
    }
    
    /**
     * Compile: integer range
     *
     * @param FluentIntegerRange $fluent
     * @return array
     */
    public function compileIntegerRange(FluentIntegerRange $fluent) : array
    {
        return $this->compileRange($fluent);
    }
    
    /**
     * Compile: float range
     *
     * @param FluentFloatRange $fluent
     * @return array
     */
    public function compileFloatRange(FluentFloatRange $fluent) : array
    {
        return $this->compileRange($fluent);
    }
    
    /**
     * Compile: long range
     *
     * @param FluentLongRange $fluent
     * @return array
     */
    public function compileLongRange(FluentLongRange $fluent) : array
    {
        return $this->compileRange($fluent);
    }
    
    /**
     * Compile: double range
     *
     * @param FluentDoubleRange $fluent
     * @return array
     */
    public function compileDoubleRange(FluentDoubleRange $fluent) : array
    {
        return $this->compileRange($fluent);
    }
    
    /**
     * Compile: date range
     *
     * @param FluentDateRange $fluent
     * @return array
     */
    public function compileDateRange(FluentDateRange $fluent) : array
    {
        return $this->compileRange($fluent);
    }
    
    /**
     * Compile: ip range
     *
     * @param FluentIpRange $fluent
     * @return array
     */
    public function compileIpRange(FluentIpRange $fluent) : array
    {
        return $this->compileRange($fluent);
    }
    
    /**
     * Compile: range
     *
     * @param Fluent $fluent
     * @return array
     */
    public function compileRange(Fluent $fluent) : array
    {
        return $this->formatAttributes([
            'type' => $fluent->type,
            'coerce' => $fluent->coerce,
            'boost' => $fluent->boost,
            'index' => $fluent->index,
            'store' => $fluent->store
        ]);
    }
    
    /**
     * Compile: nested
     *
     * @param FluentNested $fluent
     * @return array
     */
    public function compileNested(FluentNested $fluent) : array
    {
        return $this->formatAttributes([
            'type' => 'nested',
            'dynamic' => $fluent->dynamic,
            'properties' => $this->compileFields(
                $this->blueprintCallback(
                    $fluent
                )->getFields()
            )
        ]);
    }
    
    /**
     * Compile: object
     *
     * @param FluentObject $fluent
     * @return array
     */
    public function compileObject(FluentObject $fluent) : array
    {
        return $this->formatAttributes([
            'type' => 'nested',
            'dynamic' => $fluent->dynamic,
            'enabled' => $fluent->enabled,
            'properties' => $this->compileFields(
                $this->blueprintCallback(
                    $fluent
                )->getFields()
            )
        ]);
    }
    
    private function blueprintCallback(Fluent $fluent) : Blueprint
    {
        $blueprint = new Blueprint();
    
        /** @var \Closure $callback */
        $callback = $fluent->callback;
    
        if (is_callable($callback)) {
            $callback($blueprint);
        }
    
        return $blueprint;
    }
    
    /**
     * Compile: geo point
     *
     * @param FluentGeoPoint $fluent
     * @return array
     */
    public function compileGeoPoint(FluentGeoPoint $fluent) : array
    {
        return $this->formatAttributes([
            'type' => 'geo_point',
            'ignore_malformed' => $fluent->ignore_malformed,
            'ignore_z_value' => $fluent->ignore_z_value,
            'null_value' => $fluent->null_value
        ]);
    }
    
    /**
     * Compile: geo shape
     *
     * @param FluentGeoShape $fluent
     * @return array
     */
    public function compileGeoShape(FluentGeoShape $fluent) : array
    {
        return $this->formatAttributes([
            'type' => 'geo_shape',
            'tree' => $fluent->tree,
            'precision' => $fluent->precision,
            'tree_levels' => $fluent->tree_levels,
            'strategy' => $fluent->strategy,
            'distance_error_pct' => $fluent->distance_error_pct,
            'orientation' => $fluent->orientation,
            'points_only' => $fluent->points_only,
            'ignore_malformed' => $fluent->ignore_malformed,
            'ignore_z_value' => $fluent->ignore_z_value
        ]);
    }
    
    /**
     * Compile: ip
     *
     * @param FluentIp $fluent
     * @return array
     */
    public function compileIp(FluentIp $fluent) : array
    {
        return $this->formatAttributes([
            'type' => 'ip',
            'boost' => $fluent->boost,
            'doc_values' => $fluent->doc_values,
            'index' => $fluent->index,
            'null_value' => $fluent->null_value,
            'store' => $fluent->store
        ]);
    }
    
    /**
     * Compile: completion
     *
     * @param FluentCompletion $fluent
     * @return array
     */
    public function compileCompletion(FluentCompletion $fluent) : array
    {
        return $this->formatAttributes([
            'type' => 'completion',
            'analyzer' => $fluent->analyzer,
            'search_analyzer' => $fluent->search_analyzer,
            'preserve_separators' => $fluent->preserve_separators,
            'preserve_position_increments' => $fluent->preserve_position_increments,
            'max_input_length' => $fluent->max_input_length
        ]);
    }
    
    /**
     * Compile: token count
     *
     * @param FluentTokenCount $fluent
     * @return array
     */
    public function compileTokenCount(FluentTokenCount $fluent) : array
    {
        return $this->formatAttributes([
            'type' => 'token_count',
            'analyzer' => $fluent->analyzer,
            'enable_position_increments' => $fluent->enable_position_increments,
            'boost' => $fluent->boost,
            'doc_values' => $fluent->doc_values,
            'index' => $fluent->index,
            'null_value' => $fluent->null_value,
            'store' => $fluent->store
        ]);
    }
    
    private function formatAttributes(array $attributes) : array
    {
        return array_filter($attributes);
    }
    
    /**
     * Compile fields
     *
     * @param array $fields
     * @return array
     */
    public function compileFields(array $fields) : array
    {
        $statements = [];
    
        foreach ($fields as $field) {
            if ($field instanceof Fluent && !is_null($field->type)) {
                $method = 'compile' . ucfirst(camel_case($field->type));
                if (method_exists($this, $method)) {
                    $statements[$field->name] = (array)$this->$method($field);
                }
            }
        }
    
        return $statements;
    }
}
