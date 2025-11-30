<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Book extends Model {
use HasFactory;
protected $fillable = ['title','author_id','year','genre','quantity'];


public function author() {
return $this->belongsTo(Author::class);
}


public function loans() {
return $this->hasMany(Loan::class);

}

public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

}
