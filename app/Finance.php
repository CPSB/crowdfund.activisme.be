<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Finance
 *
 * @package App
 */
class Finance extends Model
{
    /**
     * Mass-assign fields for the database table. 
     * 
     * @var array
     */
    protected $fillable = ['type', 'titel', 'finance_plan', 'uitvoerder', 'amount', 'creator_id', 'extra_informatie'];

    /**
     * Creator transaction relation data.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }
}
