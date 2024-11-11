<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProfileSettings extends Model
{
    protected $fillable = [
        'user_id',
        'description',
        'card_opacity',
        'show_uid',
        'show_views',
        'avatar',
        'background_image',
        'background_effect',
        'username_effect',
        'background_color',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function backgroundColorToRGB(): string
    {

        list($r, $g, $b) = sscanf($this->background_color, "#%02x%02x%02x");

        return "$r, $g, $b";
    }
}
