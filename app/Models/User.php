<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property integer $id
 * @property string $gender
 * @property string $first_name
 * @property string $last_name
 * @property string $tel
 * @property string $role
 * @property string $remember_token
 * @property string $created_at
 * @property string $updated_at
 */
class User extends Authenticatable implements JWTSubject
{
    use Notifiable;
    
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
        'gender', 
        'first_name', 
        'last_name', 
        'tel', 
        'ppr_number',
        'role', 
        'is_active', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $dates = [
        'created_at', 
        'updated_at'
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function admin()
    {
        return $this->hasOne(Admin::class, 'user_id');
    }

    /**
     * Get the fullName of User
     *
     * @return string
     */
    public function getFullNameAttribute() {
        return ucfirst($this->first_name) . ' ' . ucfirst($this->last_name);
    }

    /**
     * Get the image path of User
     *
     * @return string
     */
    public function getPicturePathAttribute() {
        return $this->picture 
                ? asset('storage/' . $this->picture)
                : asset('assets/img/profile-pic-l.png');
    }

    /**
     * Get gender as badge
     *
     * @return string
     */
    public function getGenderBadgeAttribute() {
        return ($this->gender == 'M') 
                ? '<span class="badge badge-pill badge-secondary">Masculine</span>'
                : '<span class="badge badge-pill badge-danger">Feminine</span>';
    }

    /**
     * Get status of user as badge
     *
     * @return string
     */
    public function getIsActiveBadgeAttribute() {
        return $this->is_active 
                ? '<span class="badge badge-pill uppercase badge-success">Actif</span>'
                : '<span class="badge badge-pill uppercase badge-danger">Inactif</span>';
    }

}


































