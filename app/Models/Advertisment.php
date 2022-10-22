<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisment extends Model
{
    use HasFactory;

    protected $fillable = ['image','video','period','provider','group_id'];
    
    // public $timestamps = false;

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

}
