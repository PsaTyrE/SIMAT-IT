<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teknisi extends Model
{
    use HasFactory;

    protected $fillable = [];

    public function issue()
    {
        return $this->hasMany(Issue::class, 'issueID', 'id');
    }
}
