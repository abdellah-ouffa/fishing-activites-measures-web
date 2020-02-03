<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 * @property StudyCaseElementContent[] $studyCaseElementContents
 */
class StudyCaseElement extends Model
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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function studyCaseElementContents()
    {
        return $this->hasMany(StudyCaseElementContent::class, 'study_case_element_id');
    }

    public function getContentBySudyCaseId($studyCaseId)
    {
        return $this->studyCaseElementContents()
            ->where('study_case_id', $studyCaseId)
            ->first();
    }
}
