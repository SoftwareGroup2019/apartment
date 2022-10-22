<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

   
    protected $fillable = ['groupname'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function services()
    {
        return $this->hasMany(Service::class);
    }
    public function apartments()
    {
        return $this->hasMany(Apartment::class);
    }
    public function advertisments()
    {
        return $this->hasMany(Advertisment::class);
    }
}
