<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use Hasfactory;

    public function jobs()
    {
        return $this->hasmany(Job::class);
    }
}
