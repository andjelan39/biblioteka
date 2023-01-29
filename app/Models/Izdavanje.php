<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Izdavanje extends Model
{
    use HasFactory;

    protected $primaryKey ='izdavanje_id';

    protected $fillable = [
        'naziv_knjige',
        'autor_knjige',
        'napomena',
        'datum_izdavanja',
        'datum_vracanja',
        'knjiga_id',
        'student_id',
        'user_id'
    ];

    public function knjiga()
    {
        return $this->belongsTo(Knjiga::class, 'knjiga_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
