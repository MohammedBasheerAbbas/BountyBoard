<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Task extends Model
{
    use HasFactory;

    /**
     * Get all of the comments for the Task
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Get all of the assets for the Task
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function assets()
    {
        return $this->hasMany(Asset::class);
    }

    /**
     * Get all of the requirements for the Task
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function requirements()
    {
        return $this->hasMany(Requirement::class);
    }

    /**
     * Get all of the claimRequests for the Task
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function claimRequests()
    {
        return $this->hasMany(ClaimRequest::class);
    }
    /**
     * Get all of the approvalRequests for the Task
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function approvalRequests()
    {
        return $this->hasMany(ApprovalRequest::class);
    }

    /**
     * Get the user that owns the Task
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the department that owns the Task
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }   

    public function deadline()
    {
        return \Carbon\Carbon::parse($this->deadline)->format('Y-m-d\TH:i');
    }

}
