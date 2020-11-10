<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
    protected $fillable = [
      'band_code', 'band_song', 'band_desc', 'band_genre', 'band_release', 'image'
    ];
}
