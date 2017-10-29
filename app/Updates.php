<?php

namespace ActivismeBE;

use Illuminate\Database\Eloquent\Model;

class Updates extends Model
{
    /**
     * Mass-assign fields for the database table.
     *
     * @var array
     */
    protected $fillable = ['author_id', 'title', 'status', 'text'];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
