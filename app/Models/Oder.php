<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oder extends Model
{
    use HasFactory;

    protected $fillable = [
        'team',
        'customer',
        'category',
        'tag',
        'content',
        'description',
        'start_date',
        'end_date',
        'pic_id',
        'status',
        'return_link',
        'finish_date',
        'comment',
        'success',
        'pic_social_id',
        'status_social',
        'link_social',
        'date_social',
        'user_id',
    ];

    // Function user the hien moi quan he 1 oder se thuoc ve 1 user
    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // Function user the hien moi quan he 1 oder se thuoc ve 1 user
    public function pic() {
        return $this->belongsTo(User::class, 'pic_id', 'id');
    }

    // Function user the hien moi quan he 1 oder se thuoc ve 1 user
    public function pic_social() {
        return $this->belongsTo(User::class, 'pic_social_id', 'id');
    }

    // SEARCH FUNCTIONS
    public function scopeSearch($query, ...$colums)
    {
        $keyWord = request()->search;
        foreach ($colums as $colum) {
            $query->orWhere($colum, 'like', "%$keyWord%");
        }
    }

}
