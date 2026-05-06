<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Collection;

/**
 * @property string $name
 * @property-read Collection<int, Event> $events
 * @property-read Collection<int, Event> $trainers
 */

class Tag extends Model
{
    protected $fillable = ['name'];

    /**
     * @return MorphToMany<Event>
     */
    public function events(): MorphToMany {
        return $this->morphedByMany(Event::class, 'taggable',);
    }

    /**
     * @return MorphToMany<Trainer>
     */
    public function trainers(): MorphToMany {
        return $this->morphedByMany(Trainer::class, 'taggable',);
    }
}
