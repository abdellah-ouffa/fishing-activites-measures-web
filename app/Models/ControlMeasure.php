<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $attribute_id
 * @property integer $control_measure_types_id
 * @property string $content
 * @property string $created_at
 * @property string $updated_at
 * @property Attribute $attribute
 * @property ControlMeasureType $controlMeasureType
 * @property ControlMeasureZone[] $controlMeasureZones
 */
class ControlMeasure extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['attribute_id', 'control_measure_types_id', 'content', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function attribute()
    {
        return $this->belongsTo(Attribute::class, 'attribute_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function controlMeasureType()
    {
        return $this->belongsTo(ControlMeasureType::class, 'control_measure_types_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function zones()
    {
        return $this->belongsToMany(Zone::class, 'control_measure_zones')
                    ->as('ControlMeasureZone')
                    ->withPivot('zone_id', 'control_measure_id', 'created_at', 'updated_at');
    }
}
