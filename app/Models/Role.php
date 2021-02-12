<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug','description'
    ];

    //RELACIONES

    public function permissions(){
        return $this->hasMany('App\Models\Permission');
    }
    
    public function users(){
        return $this->belongToMany('App\Models\User')->withTimestamps();
    }

    //ALMACENAMIENTO

    public function store($request)
    {
        $slug = str_slug($request->name,'-');
        //alert('Rol guardado', 'success','top-right')->width('200px')->showConfirmButton();
         return self::create($request->all() + [
            'slug' => $slug,
        ]);
    }

    public function my_update($request)
    {
        $slug = str_slug($request->name, '-');
        self::update($request->all() + [
            'slug'=>$slug
        ]);
        
    }
}

