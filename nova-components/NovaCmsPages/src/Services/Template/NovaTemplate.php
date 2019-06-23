<?php


namespace Yaroslawww\NovaCmsPages\Services\Template;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;

class NovaTemplate implements ITemplate
{
    protected $infoExtracter;
    protected $templatesPath;

    protected $name = null;
    /** @var \SplFileInfo|null */
    protected $templateFile = null;

    /**
     * Template constructor.
     * @param ITemplateInfoExtracter $infoExtracter
     * @param string $templatesPath
     */
    public function __construct(ITemplateInfoExtracter $infoExtracter, string $templatesPath)
    {
        $this->infoExtracter = $infoExtracter;
        $this->templatesPath = $templatesPath;
    }

    /**
     * @param \SplFileInfo $file
     * @return ITemplate|null
     */
    public function find(\SplFileInfo $file)
    {
        $template = new self($this->infoExtracter, $this->templatesPath);
        $template = $template->parseTemplateFile($file);
        return $template;
    }

    public function findFromString($filePath)
    {
        $file = new \SplFileInfo($this->templatesPath . DIRECTORY_SEPARATOR . $filePath);
        return $this->find($file);
    }

    public function get(): Collection
    {
        $templates = new Collection();
        foreach (File::allFiles($this->templatesPath) as $file) {
            $template = $this->find($file);
            if ($template) {
                $templates->add($template);
            }
        }
        return $templates;
    }

    /**
     * @param $file
     * @return ITemplate|null
     */
    protected function parseTemplateFile($file)
    {
        $templateInfo = $this->infoExtracter->getTemplateInfo($this->getFilePartOfContents($file, 0, 1000));

        if (!isset($templateInfo[TemplateLexer::T_NAME]) || !$templateInfo[TemplateLexer::T_NAME]) {
            return null;
        }

        $this->templateFile = $file;
        $this->name = $templateInfo[TemplateLexer::T_NAME];

        return $this;
    }


    protected function getFilePartOfContents(\SplFileInfo $file, $offset = 0, $maxlen = null)
    {
        set_error_handler(function ($type, $msg) use (&$error) {
            $error = $msg;
        });
        $content = file_get_contents($file->getPathname(), false, null, $offset, $maxlen);
        restore_error_handler();
        if (false === $content) {
            throw new \RuntimeException($error);
        }

        return $content;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPath(): string
    {
        if ($this->templateFile instanceof \SplFileInfo) {
            return str_replace($this->templatesPath . DIRECTORY_SEPARATOR, '', $this->templateFile->getPathname());
        }

        return null;
    }
}
