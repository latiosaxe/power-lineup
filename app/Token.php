<?php

namespace App;
use App\Token;
use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    protected $fillable = [
        'token_init', 'token_end', 'created_at', 'updated_at'
    ];
    protected $table = 'count_down';
}
