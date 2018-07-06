<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['code', 'name', 'url', 'image_url'];

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('type')->withTimestamps();
    }

    public function want_users()
    {
        return $this->users()->where('type', 'want');
    }
    
    // have_users() を作成し、中身は単に type = 'have' なものを絞り込んでいる
    public function have_users()
    {
        return $this->users()->where('type', 'have');
    }
}