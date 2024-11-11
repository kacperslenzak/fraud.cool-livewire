<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LinkTypes extends Model
{
    protected $fillable = ['name', 'label', 'icon', 'placeholder'];

    public function links()
    {
        return $this->hasMany(Link::class, 'link_type_id');
    }
}
