<?php

namespace App\Models\Freelancer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillData extends Model
{
    use HasFactory;
    protected $table = 'skills_data'; // Specify the table name

    protected $fillable = [
        'skill',
    ];
}
