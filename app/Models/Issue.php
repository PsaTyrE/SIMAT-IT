<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    use HasFactory;
    protected $table = 'issue';
    protected $primaryKey = 'id';
    protected $fillable = ['departemenID', 'teknisiID', 'nama', 'deskripsi', 'status', 'note', 'created_at', 'udpated_at'];

    public function departemen()
    {
        return $this->belongsTo(Departemen::class, 'departemenID', 'id');
    }

    public function teknisi()
    {
        return $this->belongsTo(Teknisi::class, 'teknisiID', 'id');
    }

    public function hardware()
    {
        return $this->belongsToMany(Hardware::class, 'hardware_issue', 'issueID', 'hardwareID');
    }
}
