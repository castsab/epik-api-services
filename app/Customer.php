<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model 
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'document_type',
        'document_number', 
        'name',
        'last_name',
        'date_birth',
        'marital_status',
        'firm_path',
        'photo_path'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        
    ];
}
