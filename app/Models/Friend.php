<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Friend extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    /**
     * The users that belong to the Friend
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function friends(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'assigned_users', 'main_friend_id', 'secondary_friend_id')
            ->withTimestamps();
    }

    /**
     * The otherFriends that belong to the Friend
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function otherFriends(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'assigned_users', 'secondary_friend_id', 'main_friend_id')
            ->withTimestamps();
    }

    /**
     * The events that belong to the Friend
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function events(): BelongsToMany
    {
        return $this->belongsToMany(Events::class, 'assigned_events', 'friend_id', 'event_id');
    }
}
