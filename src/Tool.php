<?php

namespace Opscale\NovaWidgets;

use Illuminate\Http\Request;
use Laravel\Nova\Menu\MenuItem;
use Laravel\Nova\Nova;
use Laravel\Nova\Tool as NovaTool;
use Opscale\NovaWidgets\Nova\Widget;

class Tool extends NovaTool
{
    public function boot()
    {
        Nova::script('nova-widgets', __DIR__ . '/../dist/js/tool.js');
        Nova::style('nova-widgets', __DIR__ . '/../dist/css/tool.css');
    }

    public function menu(Request $request)
    {
        return MenuItem::resource(Widget::class);
    }
}
