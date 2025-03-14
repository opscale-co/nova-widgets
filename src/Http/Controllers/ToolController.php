<?php

namespace Opscale\NovaWidgets\Http\Controllers;

use Illuminate\Routing\Controller;
use Opscale\NovaWidgets\Models\Widget;

class ToolController extends Controller
{
    public function index()
    {
        $widgets = Widget::where('enabled', true)->get();

        return response()->json($widgets);
    }

    public function show($slug)
    {
        $widget = Widget::where('slug', $slug)->first();

        if (! $widget) {
            return response()->json(['message' => 'Widget not found'], 404);
        }

        return response()->json($widget);
    }

    public function test()
    {
        return 'Hello world!';
    }
}
