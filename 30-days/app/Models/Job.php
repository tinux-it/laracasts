<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

final class Job extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'job_listings';

    protected $fillable = ['title', 'salary'];
}
