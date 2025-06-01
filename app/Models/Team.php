<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Team extends Model
{
    use HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'team_name',
        "descripcion",
        "url_team_photo",
    ];

    public function tasks(): HasMany {
        return $this->hasMany(Task::class);
    }

    public function users(){
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
