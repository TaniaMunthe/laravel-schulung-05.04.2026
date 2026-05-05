<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Ramsey\Collection\Collection;

/**
 * @property-read Collection<int, Event> $events
 **/
class Trainer extends Model
{
    protected $fillable = [
        'name',
        'email',
    ];

    public function events(): HasMany {
        return $this->hasMany(Event::class);
    }
}
