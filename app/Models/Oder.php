<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oder extends Model
{
    use HasFactory;

    protected $fillable = [
        'team',
        'category',
        'tag',
        'content',
        'description',
        'start_date',
        'end_date',
        'pic',
        'status',
        'return_link',
        'finish_date',
        'comment',
        'success',
        'pic_social',
        'status_social',
        'link_social',
        'date_social',
    ];

    // SEARCH FUNCTIONS
    public function scopeSearch($query, ...$colums)
    {
        $keyWord = request()->search;
        foreach ($colums as $colum) {
            $query->orWhere($colum, 'like', "%$keyWord%");
        }
    }

}
