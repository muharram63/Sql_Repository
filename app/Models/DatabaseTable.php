<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DatabaseTable extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    public function columns()
    {
        return $this->hasMany(DatabaseTableColumn::class, 'table_id');
    }
}
