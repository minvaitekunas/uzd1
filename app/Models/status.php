<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class status extends Model
{
    use HasFactory;
    public $fillable= ['name'];

    public function Tasks()
    {
        return $this->hasMany(tasks::class);
    }








    public $timestamps = false;

}
