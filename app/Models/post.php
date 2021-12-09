<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Tag;
use Carbon\Carbon;

class post extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'title', 'description', 'content', 'image'];

    ### Accessors ###

    // created_at
    public function getCreatedAtAttribute($date)
    {
        return Carbon::parse($date)->format('d F Y');
    }

    ### RelationShips ###

    // Relation With Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relation With Tag
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
