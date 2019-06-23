<?php


namespace Yaroslawww\NovaCmsPages\Http\Controllers\Page;

use Illuminate\Http\Request;
use Yaroslawww\NovaCmsPages\Facades\NovaTemplate;

class DisplayPageFromTemplate
{
    /**
     * @param Request $request
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function handle(Request $request, $slug)
    {
        $page = \NovaPages::model()::slug($slug)->first();

        if (!$page) {
            abort(404);
        }

        return view($page->template_view, [
            'page' => $page
        ]);
    }
}
