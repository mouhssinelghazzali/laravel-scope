<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $dates  = ['date'];

    public function setDateAttribute($date)
    {
        $this->attributes['date'] = Carbon::parse($date);
    }

    // public function setAuthorAttribute($author)
    // {
    //     $this->attributes['author_id'] = Author::firstOrCreate([
    //         'name' => $author,
    //     ]);
    // }
}
