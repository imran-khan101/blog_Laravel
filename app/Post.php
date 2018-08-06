<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model {
    //
    protected $fillable = ['title', 'body', 'user_id'];

    public static function archives() {
        return static::selectRaw('year(created_at) year,monthname(created_at) month,count(*) published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();
    }

    public function addComment($body) {
        //The Elequent model will set the post_id

        $this->comments()->create(['body' => $body, 'user_id' => auth()->user()->id]);

        /*$this->comments()->create(compact('body'));*/
    }

    protected function comments() {
        return $this->hasMany(Comment::class);
    }

    public function scopeFilter($query, $filters) {

        if (isset($filters['month'])) {
            $query->whereMonth('created_at', Carbon::parse($filters['month'])->month);
        }
        if (isset($filters['year'])) {
            $query->whereYear('created_at', $filters['year']);
        }

    }

    public function user() {
        return $this->belongsTo(User::class);
    }

}
