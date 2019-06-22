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
     * @return ITemplate
     */
    public function find(\SplFileInfo $file): ITemplate;

    /**
     *  Get template instance by file path string
     * @param $filePath
     * @return ITemplate
     */
    public function findFromString($filePath): ITemplate;

    public function getName(): string;

    public function getPath(): string;
}
