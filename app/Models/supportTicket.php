<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class supportTicket extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function replies()
    {
        return $this->hasMany(SupportTicketReply::class);
    }

    public function parent()
    {
        return $this->belongsTo(SupportTicket::class, 'parent_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function agent()
    {
        return $this->belongsTo(SupportStuff::class, 'Agent_id');
    }
}
