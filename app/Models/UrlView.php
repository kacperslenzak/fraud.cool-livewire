<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Links;

class UrlView extends Model
{
    protected $fillable = ['user_id', 'link_id', 'views'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function link()
    {
        return $this->belongsTo(Links::class);
    }
}
