<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inspection extends Model
{
    use HasFactory;
    protected $fillable = [
        'date_of_inspection',
        'next_date_of_inspection',
        'new_supply',
        'inspected',
        'refill',
        'services',
        'pressure_test',
        'check_weight',
    ];
}
