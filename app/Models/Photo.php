<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['title', 'filepath'];

    /**
     * Get the full URL of the photo.
     *
     * @return string
     */
    public function getUrlAttribute()
    {
        return asset('storage/' . $this->filepath);
    }
}
