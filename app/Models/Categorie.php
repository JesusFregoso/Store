<?php

namespace test\Models;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name', 
        'description',
        'condition'
    ];

    protected $guarded = [

    ];

}
