<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function scopeFilter($query,array $filters)
    {
        if($filters['tag'] ?? false)
        {
            $query->where('tags','LIKE','%'.request('tag').'%');
        }
        if($filters['search'] ?? false)
        {
            $query->where('title','LIKE','%'.request('search').'%')->orWhere('tags','LIKE','%'.request('search').'%')->orWhere('description','LIKE','%'.request('search').'%');
        }

    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
