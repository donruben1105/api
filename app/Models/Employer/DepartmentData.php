<?php

namespace App\Models\Employer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartmentData extends Model
{
    use HasFactory;

    protected $table = 'departments_data'; // Specify the table name

    protected $fillable = [
        'department',
    ]; // Define the fillable fields

}
