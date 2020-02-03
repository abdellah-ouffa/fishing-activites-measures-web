<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property User $user
 * @property string $created_at
 * @property string $updated_at
 */
class Agent extends Model
{

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = [
        'user_id', 
        'created_at', 
        'updated_at'
    ];

}
