<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'ime',
        'prezime',
        'pol'
    ];

    public function izdavanja()
    {
        return $this->hasMany(Izdavanje::class);
    }

}
