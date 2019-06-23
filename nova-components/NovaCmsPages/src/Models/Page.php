<?php

namespace Yaroslawww\NovaCmsPages\Models;

use Angecode\LaravelMetaTable\Contracts\Metable;
use Angecode\LaravelMetaTable\Traits\HasMeta;
use Illuminate\Database\Eloquent\Model;

class Page extends Model implements Metable
{

    use HasMeta;

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

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    public static function templateGroupName()
    {
        return 'template';
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function template_fields()
    {
        return $this->entity_metas()
            ->where('group', static::templateGroupName());
    }

    public function template_field(string $key)
    {
        return $this->entity_meta_value($key, static::templateGroupName());
    }

    public function template_field_value(string $key)
    {
        return $this->entity_meta_value($key, static::templateGroupName());
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    public function scopeSlug($query, $slug)
    {
        return $query->where('slug', '=', $slug);
    }

    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */

    public function getMetaTableModel()
    {
        return PageMeta::class;
    }

    public function getTemplateViewAttribute()
    {
        return config('cms-pages.page.templates_dir') . DIRECTORY_SEPARATOR . str_replace('.blade.php', '', $this->template);
    }

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */


}
