<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'publication_date',
    ];

    protected $dates = [
        'publication_date'
    ];

    public static function getRulesForStoring()
    {
        return [
            'title'            => 'required|unique:posts|max:100',
            'description'      => 'required|max:1000',
            'publication_date' => 'required|date',
        ];
    }

    public function author()
    {
        return $this->belongsTo('App\Models\User', 'author_id');
    }
}
