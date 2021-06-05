<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attendece extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function meeting()
    {
        return $this->belongsTo(Meeting::class);
    }

    public function attendencesUser() {
        return $this->hasMany(AttendenceUser::class, 'attendence_id');
    }
}
