<?php


namespace Yaroslawww\NovaCmsPages\Services\Template;


interface ITemplateService
{

    public function getTemplates($path = null): array;

}