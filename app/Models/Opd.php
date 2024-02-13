<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opd extends Model
{
    use HasFactory;

    // Specify which fields are assignable
    protected $fillable = ['full_name', 'position', 'institution', 'phone_number'];
}
