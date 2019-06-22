<?php

namespace Yaroslawww\NovaCmsPages\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'pages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'template',
        'slug',
        'title',
        'owner_id',
        'status',
        'published_at',
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
        'published_at' => 'datetime',
        'deleted_at' => 'datetime',
        'meta' => 'array',
    ];

    public function entity_metas()
    {
        return $this->hasMany(PageMeta::class, 'entity_id', 'id');
    }

    public function entity_meta($key)
    {
        return $this->entity_metas()->where('key', $key)->first();
    }
}
