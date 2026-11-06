<?php

use Illuminate\Support\Facades\Route;
use Opscale\NovaWidgets\Http\Controllers\ToolController;
use Opscale\NovaWidgets\Http\Middleware\Authorize;

/*
|--------------------------------------------------------------------------
| Tool API Routes
|--------------------------------------------------------------------------
|
| Here is where you may register API routes for your tool. These routes
| are loaded by the ServiceProvider of your tool. They are protected
| by your tool's "Authorize" middleware by default. Now, go build!
|
*/

Route::get('test-case', [ToolController::class, 'test']);

Route::middleware(['nova', Authorize::class])
    ->prefix('nova-vendor/opscale-co/nova-widgets')
    ->group(function () {
        Route::get('widgets', [ToolController::class, 'index']);
        Route::get('widgets/{slug}', [ToolController::class, 'show']);
    });
