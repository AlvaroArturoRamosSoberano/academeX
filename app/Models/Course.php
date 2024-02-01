<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['title', 'description.', 'instructor', 'price', 'duration', 'image_path', 'category_id', 'level_id', 'status_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function level()
    {
        return $this->belongsTo(Level::class);
    }
    public function status()
    {
        return $this->belongsTo(Status::class);
    }
    public function ennrollents() 
    {
        return $this->hasMany(Ennrollment::class);
    }
}
