<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class UrlShort extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'to_url',
        'url_key',
        'visits',
    ];

    public static function generateShortUrl():String{
        $randomKey = Str::random(6);
        while (self::where('url_key', $randomKey)->exists()) {
            $randomKey = Str::random(6);
        }

        return $randomKey;
    }
}

