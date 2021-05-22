<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $table = 'topics';

      protected $fillable = [
        'name', 'link','type','text','user','re', 
        'anger','disgust','fear','joy','surprise','neutro',
        'sadness','pos','neg','mpos','mneg','ex','pre','se','es'
    ];
}