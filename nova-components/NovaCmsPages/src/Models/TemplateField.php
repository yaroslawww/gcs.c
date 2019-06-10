<?php

namespace Yaroslawww\NovaCmsPages\Models;


use Illuminate\Database\Eloquent\Model;

class TemplateField extends Model
{

    protected $table = 'template_fields';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'fields',
        'owner_id',
        'meta',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'fields' => 'fields',
        'deleted_at' => 'datetime',
        'meta' => 'array',
    ];

}
