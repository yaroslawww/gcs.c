<?php


namespace Yaroslawww\NovaCmsPages\Services\Page;

use Yaroslawww\NovaCmsPages\Http\Controllers\Page\DisplayPageFromTemplate;

class NovaPages
{
    public function routes($options = [])
    {
        if (is_string($options)) {
            $options = [
                'prefix' => $options
            ];
        }


        \Route::group($options, function () {
            \Route::get(
                '{slug}',
                '\\' . DisplayPageFromTemplate::class . '@handle'
            )
                ->where(
                    'slug',
                    '^(?!(\/)?(' . trim(\Nova::path(), '/') . '|nova-api))[a-zA-Z0-9-_\/]+$'
                );
        });
    }

    public function model()
    {
        return config('cms-pages.page.model');
    }
}
