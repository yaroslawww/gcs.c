<?php


namespace Yaroslawww\NovaCmsPages\Services\Template;

use Doctrine\Common\Lexer\AbstractLexer;

class TemplateLexer extends AbstractLexer
{
    const T_NAME = 'name';

    const REGEX_NAME = 'Template Name:\s*(.*)\s*\n';

    const ACTIVE_RULES = [
        self::T_NAME => self::REGEX_NAME,
    ];

    /**
     * Lexical catchable patterns.
     *
     * @return array
     */
    protected function getCatchablePatterns()
    {
        $activeRules = [];
        foreach (self::ACTIVE_RULES as $rule) {
            $activeRules[] = $this->modifyRegexToCatchable($rule);
        }
        return $activeRules;
    }

    /**
     * Lexical non-catchable patterns.
     *
     * @return array
     */
    protected function getNonCatchablePatterns()
    {
        return [
            '.',
            '\n',
            '\r\n',
        ];
    }

    /**
     * Retrieve token type. Also processes the token value if necessary.
     *
     * @param string $value
     *
     * @return integer
     */
    protected function getType(&$value)
    {
        foreach (self::ACTIVE_RULES as $type => $rule) {
            if (preg_match("/" . $rule . "/", $value, $matches)) {
                $value = $matches[1];
                return $type;
            }
        }
    }

    protected function modifyRegexToCatchable($regex)
    {
        return str_replace(['(', ')'], '', $regex);
    }
}
