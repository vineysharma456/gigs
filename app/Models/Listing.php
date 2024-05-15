<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;
    protected $table = 'list';
    protected $fillable = ['title','company','location','website','email','description','tags','logo','user_id'];
    //   scopefilter

    public function scopeFilter($query, array $filters) {
        if (!empty($filters['search'])) {
            $query->where(function ($query) use ($filters) {
                $query->where('title', 'like', '%' . $filters['search'] . '%')
                      ->orWhere('description', 'like', '%' . $filters['search'] . '%')
                      ->orWhere('tags', 'like', '%' . $filters['search'] . '%');
            });
        }
    }
    
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
