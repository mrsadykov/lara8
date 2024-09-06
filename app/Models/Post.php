<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'posts';
    protected $fillable = [ 'title', 'content', 'image', 'likes', 'is_published', 'category_id' ];

    /* category - потому что у каждого поста только одна категория */
    public function category() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function tags() {
        /* отношение многие ко многим */
        /**
         * foreignPivotKey - соотносится с текущей сущностью
         * relatedPivotKey - с кем имеет отношение текущая сущность
         *
         */
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id','tag_id');
    }
}
