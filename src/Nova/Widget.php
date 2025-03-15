<?php

namespace Opscale\NovaWidgets\Nova;

use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Code;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Resource;
use Opscale\NovaWidgets\Models\Widget as Model;

class Widget extends Resource
{
    public static $model = Model::class;

    public static $title = 'name';

    public static $search = [
        'name', 'slug', 'description',
    ];

    public static function singularLabel()
    {
        return _('Widget');
    }

    public static function label()
    {
        return _('Widgets');
    }

    public static function uriKey()
    {
        return _('widgets');
    }

    public function fields(NovaRequest $request)
    {
        return [
            Text::make(_('Name'), 'name')
                ->rules(Model::rules('name')),

            Slug::make(_('Slug'), 'slug')
                ->from('name')
                ->creationRules(Model::rules('slug')),

            Textarea::make(_('Description'), 'description')
                ->alwaysShow(),

            Select::make(_('Location'), 'location')
                ->options([
                    'head' => _('Head'),
                    'body' => _('Body'),
                ])
                ->displayUsingLabels()
                ->rules(Model::rules('location')),

            Code::make(_('Code'), 'html_code')
                ->language('htmlmixed')
                ->rules(Model::rules('html_code')),

            Boolean::make(_('Enabled'), 'enabled')
                ->trueValue('Yes')
                ->falseValue('No')
                ->sortable()
                ->filterable()
                ->hideWhenCreating(),
        ];
    }
}
