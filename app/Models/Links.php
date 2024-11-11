<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Links extends Model
{
    protected $fillable = ['user_id', 'link_type_id', 'url'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function linkType()
    {
        return $this->belongsTo(LinkTypes::class, 'link_type_id');
    }
}
