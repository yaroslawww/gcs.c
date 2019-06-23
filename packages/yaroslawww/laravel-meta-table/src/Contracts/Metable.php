<?php


namespace Angecode\LaravelMetaTable\Contracts;

interface Metable
{
    public function entity_metas();

    public function entity_meta(string $key, string $group = null);

    public function entity_meta_value(string $key, string $group = null);
}
