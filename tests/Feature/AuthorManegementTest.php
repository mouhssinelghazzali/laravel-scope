<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Author;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthorManegementTest extends TestCase
{   
    use RefreshDatabase;
    
 /** @test */
 public function an_author_can_be_created()
 {   
     $this->withoutExceptionHandling();
     $this->post('/author',[
        'name' => 'author name',
        'date' => '03/03/1994',
     ]);
    $author = Author::all();
    $this->assertCount(1,$author);
    $this->assertInstanceOf(Carbon::class,$author->first()->date);
    $this->assertEquals('1994/03/03',$author->first()->date->format('Y/d/m'));
 }
 
}
