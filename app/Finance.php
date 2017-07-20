<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    /**
     * Mass-assign fields for the database table. 
     * 
     * @var array
     */
    protected $fillable = ['type', 'finance_plan', 'uitvoerder', 'amount', 'creator_id', 'extra_informatie']; 

    /**
     * Creator transaction relation data. 
     *
     * @return void
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }
}
