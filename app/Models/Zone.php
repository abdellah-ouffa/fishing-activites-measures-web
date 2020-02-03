<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 * @property ControlMeasureZone[] $controlMeasureZones
 * @property SubCategoryZone[] $subCategoryZones
 */
class Zone extends Model
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
    protected $fillable = ['name', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function zones()
    {
        return $this->belongsToMany(ControlMeasure::class, 'control_measure_zones')
                    ->as('ControlMeasureZone')
                    ->withPivot('control_measure_id', 'zone_id', 'created_at', 'updated_at');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function subCategories()
    {
        return $this->belongsToMany(SubCategory::class, 'sub_category_zones')
                    ->as('SubCategoryZone')
                    ->withPivot('sub_category_id', 'zone_id', 'created_at', 'updated_at');
    }
}
