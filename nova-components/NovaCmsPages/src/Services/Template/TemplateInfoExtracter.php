<?php


namespace Yaroslawww\NovaCmsPages\Services\Template;


abstract class TemplateInfoExtracter implements ITemplateInfoExtracter
{
    protected $lexer;

    public function __construct(TemplateLexer $lexer)
    {
        $this->lexer = $lexer;
    }

    abstract public function getTemplateInfo($string): array;
}