<?php

namespace App\Models\Freelancer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LanguageData extends Model
{
    use HasFactory;
    protected $table = 'languages_data'; // Specify the table name

    protected $fillable = [
        'language',
    ];
}
