<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class CharacterCard extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'img_url',
        'tiny_desc',
        'long_desc',
        'created_at',
        'updated_at',
        'user_id'
    ];
    
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // --- Mutators ---- 

    public function setNameAttribute($value)
    {
        if (is_string($value)) {
            $this->attributes['name'] = trim($value);
        }
    }

    public function setImgUrlAttribute($value)
    {
        if (is_string($value)) {
            $this->attributes['img_url'] = $value;
        }
    }

    public function setTinyDescAttribute($value)
    {
        if (is_string($value)) {
            $this->attributes['tiny_desc'] = $value;
        }
    }

    public function setLongDescAttribute($value)
    {
        if (is_string($value)) {
            $this->attributes['long_desc'] = $value;
        }
    }

    public function setCreatedAtAttribute($value)
    {
        $this->attributes['created_at'] = $this->parseDate($value);
    }

    public function setUpdatedAtAttribute($value)
    {
        $this->attributes['updated_at'] = $this->parseDate($value);
    }

    protected function parseDate($value): ?Carbon
    {
        if ($value instanceof Carbon) {
            return $value;
        }

        if (is_string($value)) {
            return Carbon::parse($value);
        }

        return null;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function card_comments()
    {
        return $this->hasMany(CardComment::class);
    }
}
