<?php


namespace Yaroslawww\NovaCmsPages\Services\Template;

class TemplateFieldsFactory
{
    protected $class;

    /**
     * TemplateFieldsFactory constructor.
     */
    public function __construct($className)
    {
        $this->class = 'App\Nova\TemplateFields'. '\\' . $className . 'Fields';
    }

    public function getFields()
    {
        $class = $this->class;
        $object = (new $class());
        return $object->getFields();
    }
}
