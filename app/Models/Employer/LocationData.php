<?php

namespace App\Models\Employer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationData extends Model
{
    use HasFactory;

    protected $table = 'locations_data'; // Specify the table name

    protected $fillable = [
        'location',
    ]; // Define the fillable fields
}
