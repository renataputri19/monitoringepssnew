<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndikatorApproval extends Model
{
    use HasFactory;
    protected $fillable = ['domain', 'aspek', 'indikator', 'tingkat', 'disetujui', 'reason'];
}
