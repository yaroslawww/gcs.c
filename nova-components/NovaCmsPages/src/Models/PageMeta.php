<?php

namespace Yaroslawww\NovaCmsPages\Models;


use Illuminate\Database\Eloquent\Model;

class PageMeta extends Model
{

    protected $table = 'page_meta';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'entity_id',
        'group',
        'key',
        'value',
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
        'published_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

}
