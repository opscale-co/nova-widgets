<?php

namespace Opscale\NovaWidgets\Models;

use Illuminate\Database\Eloquent\Model;

class Widget extends Model
{
    protected $casts = [
        'enabled' => 'boolean',
    ];

    public static function rules(string $property)
    {
        $rules = [
            'name' => ['required', 'max:50'],
            'slug' => ['required', 'max:25', 'unique:widgets,slug'],
            'html_code' => ['required'],
        ];

        return isset($rules[$property]) ? $rules[$property] : null;
    }
}
