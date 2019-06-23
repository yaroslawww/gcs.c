<?php


namespace Yaroslawww\NovaCmsPages\Services\Template;

use Illuminate\Support\Collection;

interface ITemplate
{

    /**
     * Get collection of templates
     * @return Collection
     */
    public function get(): Collection;

    /**
     * Get template instance
     * @param \SplFileInfo $file
     * @return ITemplate|null
     */
    public function find(\SplFileInfo $file);

    /**
     *  Get template instance by file path string
     * @param $filePath
     * @return ITemplate|null
     */
    public function findFromString($filePath);

    public function getName(): string;

    public function getPath(): string;
}
