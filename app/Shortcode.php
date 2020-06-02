<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shortcode extends Model
{
    protected $table = 'shortcodes';
    public $timestamps = false;

    public $fillable = [
        'name',
        'user_created',
    ];

    public function url()
    {
        return $this->hasOne('App\URL');
    }
}
