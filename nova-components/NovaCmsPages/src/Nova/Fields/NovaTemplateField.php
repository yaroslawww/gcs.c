<?php

namespace Yaroslawww\NovaCmsPages\Nova\Fields;

use Laravel\Nova\Fields\Field;

class NovaTemplateField extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'nova-template-field';

    public function __construct($name, $attribute = null, callable $resolveCallback = null)
    {
        parent::__construct($name, $attribute, $resolveCallback);

        $this->urlTemplatesList(route('nova_cms_pages.templates.index'));
    }


    public function urlTemplatesList(string $url)
    {
        return $this->withMeta(['urlTemplatesList' => $url]);
    }
}
