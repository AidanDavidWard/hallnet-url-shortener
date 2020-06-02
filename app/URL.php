<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class URL extends Model
{
    protected $table = 'urls';

    public $fillable = [
        'url',
        'private',
        'word_id',
        'description',
    ];

    public function word()
    {
        return $this->belongsTo('App\Word');
    }
}
