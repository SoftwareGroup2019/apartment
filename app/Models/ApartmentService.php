<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApartmentService extends Model
{
    use HasFactory;

    protected $fillable = ['apartment_id','service_id','description','status'];


    public $timestamps = false;
}
