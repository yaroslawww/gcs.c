<?php


namespace Yaroslawww\NovaCmsPages\Services\Template;

interface ITemplateInfoExtracter
{

    /**
     * @param $string - Content
     * @return array
     */
    public function getTemplateInfo($string): array;
}
