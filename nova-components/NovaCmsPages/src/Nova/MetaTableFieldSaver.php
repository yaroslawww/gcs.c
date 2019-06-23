<?php

namespace Yaroslawww\NovaCmsPages\Nova;

use Illuminate\Database\Eloquent\Model;
use Laravel\Nova\Fields\Field;
use Laravel\Nova\Http\Requests\NovaRequest;

class MetaTableFieldSaver
{
    public static function make(Field $field)
    {
        $field->fillUsing(
            function (
                NovaRequest $request,
                Model $model,
                string $attribute,
                string $requestAttribute
            ) {
                if ($request->exists($requestAttribute)) {
                    return function () use ($request, $model, $attribute, $requestAttribute) {
                        $value = $request[$requestAttribute];

                        $model->entity_metas()->updateOrCreate(
                            ['key' => $attribute, 'group' => \NovaPages::model()::templateGroupName()],
                            ['value' => !$value ? null : $value]
                        );
                    };
                }
            }
        )->resolveUsing(function ($value, $model, $attribute, $isMissing) {
            return $model->entity_meta_value($attribute, \NovaPages::model()::templateGroupName());
        });

        return $field;
    }
}
