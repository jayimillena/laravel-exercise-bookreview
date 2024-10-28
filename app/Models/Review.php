<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = 'reviews';
    protected $fillable = ['rating', 'review'];

    public function book()
    {
        return $this->belongsTo(Review::class);
    }

    protected static function booted()
    {
        static::updated(
            fn (Review $review) => cache()->forget('book:' . $review->book_id)
        );

        static::deleted(
            fn (Review $review) => cache()->forget('book:' . $review->book_id)
        );

        static::created(
            fn(Review $review) => cache()->forget('book:' . $review->book_id)
        );
    }
}
