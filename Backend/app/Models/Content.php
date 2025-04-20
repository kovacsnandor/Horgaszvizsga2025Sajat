<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    /** @use HasFactory<\Database\Factories\ContentFactory> */
    use HasFactory;

    public $timestamps = true;

    protected function casts(): array
    {
        return [
            'DarabKorlatos' => 'boolean'                    
        ];
    }
}
