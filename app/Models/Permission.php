<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'description', 'role_id'
    ];

    // RELACIONES

    public function role(){

        return $this->belongsTo('App\Models\Role');

    }

    public function users()
    {
        return $this->belongsToMany('App\Models\User')->withTimestamps();
    }
}
