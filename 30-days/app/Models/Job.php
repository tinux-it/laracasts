<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class Job extends Model
{
    protected $table = 'job_listings';

    protected $fillable = ['title', 'salary'];
}
