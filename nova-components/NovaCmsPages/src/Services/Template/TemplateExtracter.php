<?php


namespace Yaroslawww\NovaCmsPages\Services\Template;

class TemplateExtracter extends TemplateInfoExtracter
{
    public function getTemplateInfo($string): array
    {
        $this->lexer->setInput($string);
        $this->lexer->moveNext();

        $templateInfo = [];
        while (true) {
            if (!$this->lexer->lookahead) {
                break;
            }

            $this->lexer->moveNext();

            if (!isset($templateInfo[$this->lexer->token['type']])) {
                $templateInfo[$this->lexer->token['type']] = $this->lexer->token['value'];
            }
        }

        return $templateInfo;
    }
}
