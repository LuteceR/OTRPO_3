<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CardComment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'character_card_id',
        'comment',
    ];
    
    public function user()
    {
        return $this->belongsTo(CharacterCard::class);
        return $this->belongsTo(User::class);
    }

    public function getUserOfComment() {
        return User::findOrFail($this->user_id)->name;
    }
}
