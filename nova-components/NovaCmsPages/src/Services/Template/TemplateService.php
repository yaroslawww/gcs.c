<?php

namespace Yaroslawww\NovaCmsPages\Services\Template;


class TemplateService implements ITemplateService
{

    protected $templatesPath;
    protected $configsPath;

    /**
     * TemplateService constructor.
     */
    public function __construct(string $templatesPath, string $configsPath)
    {
        $this->templatesPath = $templatesPath;
        $this->configsPath = $configsPath;
    }

    public function getTemplates($path = null): array
    {
        if (is_null($path)) {
            $path = $this->templatesPath;
        }

        return [];
    }
}