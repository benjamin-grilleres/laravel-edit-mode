<?php

namespace BenWecom4U\Editor\Models;

use Illuminate\Database\Eloquent\Model;

class EditableText extends Model
{
    protected $fillable = [
        'text_id',
        'content',
        'font_size',
        'color',
        'font_weight',
        'font_family',
    ];
}
