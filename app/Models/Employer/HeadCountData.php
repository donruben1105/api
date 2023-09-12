<?php

namespace App\Models\Employer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeadCountData extends Model
{
    use HasFactory;

    protected $table = 'headcounts_data'; // Specify the table name

    protected $fillable = [
        'headcount',
    ]; // Define the fillable fields
}
