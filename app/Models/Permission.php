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

    //ALMACENAMIENTO

    public function store($request)
    {
        $slug = str_slug($request->name,'-');
        //El alerta en la vista show
        return self::create($request->all() + [
            'slug' => $slug
        ]);
    }

    public function my_update($request)
    {
        $slug = str_slug($request->name, '-');
        self::update($request->all() + [
            'slug' =>$slug,
        ]);
        //No olvidarse del alerta de actualizacion.
    }

    //VALIDACIONES

    //RECUPERACION DE INFORMACION

    //OTRAS OPERACIONES
}
