<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DatabaseTableColumn extends Model
{
    protected $fillable = [
        'table_id',
        'type',
        'name',
        'description',
        'nullable',
        'default',
    ];

    public function table()
    {
        return $this->belongsTo(DatabaseTable::class, 'table_id');
    }
}
