<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportStuffLogs extends Model
{
    use HasFactory;
    protected $table = 'support_stuff_logs';
    protected $guarded = [];
    public function SupportStuff()
    {
        $this->belongsTo(SupportStuff::class);
    }
}
