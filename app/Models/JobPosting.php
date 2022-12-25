<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPosting extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'company', 'location', 'website', 'email', 'tags', 'logo', 'description', 'user_id'];

    public function scopeFilter($query, Array $filters)
    {
       if ($filters['tag'] ?? false)
       {
        $query->where('tags', 'like', '%' . request('tag') . '%');
       }

       if ($filters['search'] ?? false)
       {
        $query->where('title', 'like', '%' . request('search') . '%')
            ->orwhere('description', 'like', '%' . request('search') . '%')
            ->orwhere('tags', 'like', '%' . request('search') . '%');
       }
    }

    // Relationships to user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
