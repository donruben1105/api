<?php

namespace App\Models\Freelancer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreelancerTypeData extends Model
{
    use HasFactory;
    protected $table = 'freelancerTypes_data'; // Specify the table name

    protected $fillable = [
        'freelancerType',
    ];
}
