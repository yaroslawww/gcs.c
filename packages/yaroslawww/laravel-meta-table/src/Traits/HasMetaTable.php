<?php


namespace Angecode\LaravelMetaTable\Traits;

use Angecode\LaravelMetaTable\Exceptions\MetaTableException;
use Illuminate\Database\Eloquent\Model;

trait HasMetaTable
{

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /**
     * Return all metas attached to entity
     *
     * @return mixed
     * @throws MetaTableException
     */
    public function entity_metas()
    {
        return $this->hasMany(
            $this->getMetaTableModelClass(),
            $this->getMetaTableForeignKeyName(),
            $this->primaryKey
        );
    }

    /**
     * @param string $key
     * @param string|null $group
     * @return Model|null
     * @throws MetaTableException
     */
    public function entity_meta(string $key, string $group = null)
    {
        $query = $this->entity_metas()->where('key', $key);
        if ($group) {
            $query = $query->where('group', $group);
        }
        return $query->first();
    }

    /**
     * @param string $key
     * @param string|null $group
     * @return string|null
     * @throws MetaTableException
     */
    public function entity_meta_value(string $key, string $group = null)
    {
        $meta = $this->entity_meta($key, $group);

        return $meta->value ?? null;
    }

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /**
     * @return mixed
     * @throws MetaTableException
     */
    protected function getMetaTableModelClass()
    {
        if (method_exists($this, 'metaTableModelClass')) {
            return $this->metaTableModelClass();
        }
        if (property_exists($this, 'metaTableModelClass')) {
            return $this->metaTableModelClass;
        }

        throw new MetaTableException('Model should have "metaTableModelClass" property or "metaTableModelClass()" method.');
    }

    /**
     * @return mixed
     * @throws MetaTableException
     */
    protected function getMetaTableForeignKeyName()
    {
        if (method_exists($this, 'metaTableForeignKeyName')) {
            return $this->metaTableForeignKeyName();
        }


        return property_exists($this, 'metaTableForeignKeyName') ? $this->metaTableForeignKeyName : 'entity_id';
    }
}
