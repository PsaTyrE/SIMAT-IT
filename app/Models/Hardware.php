<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hardware extends Model
{
    use HasFactory;

    protected $fillable = ['nama_hardware'];
    public function issue()
    {
        return $this->belongsToMany(Issue::class, 'hardware_issue', 'issueID', 'hardwareID');
    }
}
