<?php


namespace Yaroslawww\NovaCmsPages\Http\Controllers;


class TemplateController extends Controller
{

    public function index() {
        return response()->json([
            'templates' => [
                [
                    'label' => 'Template1',
                    'value' => 'path/to/template/config.json',
                ],
                [
                    'label' => 'Template2',
                    'value' => 'path/to/template/config2.json',
                ],
                [
                    'label' => 'Template3',
                    'value' => 'path/to/template/config3.json',
                ],
                [
                    'label' => 'Template4',
                    'value' => 'path/to/template/config4.json',
                ],
            ]
        ]);
    }

}