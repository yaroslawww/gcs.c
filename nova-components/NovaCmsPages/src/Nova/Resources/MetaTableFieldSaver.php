<?php

namespace Yaroslawww\NovaCmsPages\Nova\Resources;

use Illuminate\Database\Eloquent\Model;
use Laravel\Nova\Fields\Field;
use Laravel\Nova\Http\Requests\NovaRequest;

class MetaTableFieldSaver
{

    static public function make(Field $field)
    {
        $field->fillUsing(
            function (
                NovaRequest $request,
                Model $model,
                string $attribute,
                string $requestAttribute
            ) {
                if ($request->exists($requestAttribute)) {
                    $value = $request[$requestAttribute];

                    $model->{$attribute} = !$value ? null : $value;
                }
            });

        return $field;
    }

}