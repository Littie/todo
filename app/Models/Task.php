<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'name', 'note', 'due_date', 'is_delete', 'user_id', 'group_id', 'is_check', 'reminder', 'is_overdue'
    ];

    public function group() {
        return $this->belongsTo('App\Models\Group');
    }

    public function scopeActive($query) {
        return $query->where('is_delete', '0')->where('is_check', '0');
    }

    public function scopeChecked($query) {
        return $query->where('is_delete', '0')->where('is_check', '1');
    }
}
