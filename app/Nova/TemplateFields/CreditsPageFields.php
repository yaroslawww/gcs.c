<?php


namespace App\Nova\TemplateFields;

use Laravel\Nova\Fields\Trix;
use Yaroslawww\NovaCmsPages\Nova\MetaTableFieldSaver;
use Yaroslawww\NovaCmsPages\Services\Template\ITemplateFields;

class CreditsPageFields implements ITemplateFields
{
    public function getFields(): array
    {
        return [
            MetaTableFieldSaver::make(
                Trix::make('General Content', 'general_content')
                    ->rules('required')
            )
        ];
    }
}
