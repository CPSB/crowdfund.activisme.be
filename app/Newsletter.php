<?php

namespace ActivismeBE;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Newsletter
 *
 * @package ActivismeBE
 */
class Newsletter extends Model
{
    /**
     * Mass-assign fields for the database table.
     * @var array
     */
    protected $fillable = ['email', 'token', 'platform'];
}
