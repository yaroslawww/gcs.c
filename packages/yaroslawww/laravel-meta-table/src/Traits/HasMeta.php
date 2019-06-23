<?php


namespace Angecode\LaravelMetaTable\Traits;

use Illuminate\Database\Eloquent\Model;

trait HasMeta
{
    public function entity_metas()
    {
        return $this->hasMany(
            (method_exists($this, 'getMetaTableModel')) ? $this->getMetaTableModel() : 'App\\MetaTable',
            (method_exists($this, 'getMetaEntityKeyName')) ? $this->{$this->getMetaEntityKeyName()} : 'entity_id',
            'id'
        );
    }

    /**
     * @param string $key
     * @param string|null $group
     * @return Model|null
     */
    public function entity_meta(string $key, string $group = null)
    {
        $query =$this->entity_metas()->where('key', $key);
        if ($group) {
            $query = $query->where('group', $group);
        }
        return $query->first();
    }

    /**
     * @param string $key
     * @param string|null $group
     * @return string|null
     */
    public function entity_meta_value(string $key, string $group = null)
    {
        $meta = $this->entity_meta($key, $group);

        return $meta->value ?? null;
    }
}
