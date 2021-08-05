<?php

namespace App\Modules\Sites\Models;

use Illuminate\Database\Eloquent\Model;

class Blog_Model extends Model
{

    protected $table = "users";

    public function scopeGetAll($query)
    {
        return $query->whereIn("status", [0, 1]);
    }
}
