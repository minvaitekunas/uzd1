<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class tasks extends Model
{
    use HasFactory;
   

    public $fillable = [
        'task_name',
        'task_description',
        'status_id',
        'created_at',
        'updated_at'
    ];

    public function status()
    {
        return $this->belongsTo('App/Models/status');
    }




}

