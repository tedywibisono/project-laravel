<?php

namespace App\Models;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory, Sluggable;
    // protected $fillable=['title','excerpt','body'];
    protected $guarded=['id'];
    protected $with=['category','user'];
    // with penjelasan ada di documentasi laravel eager loading

    // menghubungkan ke table category
    public function scopeFilter($query, array $filters)
    {

        $query->when($filters['search'] ?? false, function($query,$search){
            return $query->where('title', 'like', '%'. $search. '%' )
                         ->orWhere('body', 'like', '%'.  $search. '%');
        });
        // penjelasam when ada di doucumentasi laravel
        $query->when($filters['category']?? false, function($query,$category){
            return $query->whereHas('category', function($query) use ($category){
                $query->where('slug',$category);
            });
        });
        // menggunakan use untuk join ke category karena jika tidak pakai use tidak bisa join karena function category ada di luar function scopeFilter
        // diatas versi call back

        $query->when($filters['author']?? false, fn($query,$user)=>
            $query->whereHas('user', fn($query)=>
                $query->where('id', $user)
                )
        );
        // fersi arrow function
    }
   public function category()
    {
         return $this->belongsTo(Category::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
 