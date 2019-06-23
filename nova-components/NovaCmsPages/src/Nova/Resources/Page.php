<?php

namespace Yaroslawww\NovaCmsPages\Nova\Resources;

use Benjaminhirsch\NovaSlugField\Slug;
use Benjaminhirsch\NovaSlugField\TextWithSlug;
use Epartment\NovaDependencyContainer\NovaDependencyContainer;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Trix;
use Yaroslawww\NovaCmsPages\Facades\NovaTemplate;
use Yaroslawww\NovaCmsPages\Nova\MetaTableFieldSaver;
use Yaroslawww\NovaCmsPages\Services\Template\ITemplate;
use Yaroslawww\NovaCmsPages\Services\Template\TemplateFieldsFactory;

class Page extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \Yaroslawww\NovaCmsPages\Models\Page::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'title',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function fields(Request $request)
    {
        $templates = NovaTemplate::get();

        $templatesOptions = [
            'default' => __('Default template')
        ];

        /** @var ITemplate $template */
        foreach ($templates as $template) {
            $templatesOptions[$template->getPath()] = $template->getName();
        }

        $fields = [
            ID::make()->sortable(),
            TextWithSlug::make('Title')
                ->slug('slug')
                ->rules('required', 'max:255'),

            Slug::make('Slug')
                ->showUrlPreview(config('cms-pages.page.slug_url'))
                ->disableAutoUpdateWhenUpdating()
                ->rules('required', 'max:255'),

            Select::make('Template', 'template')
                ->options($templatesOptions)
                ->rules('required', 'max:255'),

            NovaDependencyContainer::make([
                MetaTableFieldSaver::make(Trix::make('Page Content'))
            ])->dependsOn('template', 'default'),

        ];

        foreach ($templates as $template) {
            $fields[] = NovaDependencyContainer::make(
                (new TemplateFieldsFactory(str_replace(' ', '', $template->getName())))
                    ->getFields()
            )->dependsOn('template', $template->getPath());
        }


        return $fields;
    }


    /**
     * Get the cards available for the request.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
