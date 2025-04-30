<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

final class Job extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'job_listings';

    /**
     * $fillable only state the fields that are fillable when creating a new object
     * $guarded states that all fields except those guarded can be filled whne creating a new object
     */
//    protected $fillable = ['title', 'salary', 'employer_id'];
    protected $guarded = [];
    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, foreignPivotKey: 'job_listing_id');
    }
}
