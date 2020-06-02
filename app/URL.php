<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class URL extends Model
{
    protected $table = 'urls';

    public $fillable = [
        'url',
        'private',
        'shortcode_id',
        'description',
    ];

    public $with = [
        'shortcode',
    ];

    public function shortcode()
    {
        return $this->belongsTo('App\Shortcode');
    }
}
