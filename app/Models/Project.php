<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function type()
    {
        return $this->hasOne(Type::class);
    }

    protected $fillable = [
        'title',
        'client',
        'period',
        'summary'
    ];
}
