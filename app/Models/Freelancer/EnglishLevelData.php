<?php

namespace App\Models\Freelancer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnglishLevelData extends Model
{
    use HasFactory;

    protected $table = 'englishLevels_data'; // Specify the table name

    protected $fillable = [
        'englishLevel',
    ]; // Define the fillable fields
}
