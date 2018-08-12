<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /**
     * /api/question/[スラグ名]
     * で、データを取得できるようにする
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected $guarded = []; // $fillable　より楽

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getPathAttribute()
    {
        return asset("api/question/$this->slug");
    }
}
