<?php


namespace App\Nova\TemplateFields;


use Laravel\Nova\Fields\Text;
use Yaroslawww\NovaCmsPages\Nova\Resources\MetaTableFieldSaver;
use Yaroslawww\NovaCmsPages\Services\Template\ITemplateFields;

class HomePageFields implements ITemplateFields
{

    public function getFields(): array
    {
        return [
            MetaTableFieldSaver::make(Text::make('Page Content'))
        ];
    }
}