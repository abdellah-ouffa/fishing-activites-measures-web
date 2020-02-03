<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $study_case_element_id
 * @property integer $study_case_id
 * @property string $content
 * @property string $created_at
 * @property string $updated_at
 * @property StudyCaseElement $studyCaseElement
 * @property StudyCase $studyCase
 */
class StudyCaseElementContent extends Model
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
    protected $fillable = ['study_case_element_id', 'study_case_id', 'content', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function studyCaseElement()
    {
        return $this->belongsTo(StudyCaseElement::class, 'study_case_element_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function studyCase()
    {
        return $this->belongsTo(StudyCase::class, 'study_case_id');
    }
}
