<?php

namespace Opscale\NovaWidgets;

use Illuminate\Http\Request;
use Laravel\Nova\Menu\MenuSection;
use Laravel\Nova\Nova;
use Laravel\Nova\Tool as NovaTool;

class Tool extends NovaTool
{
    public function boot()
    {
        Nova::script('nova-widgets', __DIR__ . '/../dist/js/tool.js');
        Nova::style('nova-widgets', __DIR__ . '/../dist/css/tool.css');
    }

    public function menu(Request $request)
    {
        return MenuSection::make('NovaWidgets')
            ->path('nova-widgets')
            ->icon('server');
    }
}
