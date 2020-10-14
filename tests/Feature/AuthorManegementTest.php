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

     $this->post('/authors',$this->data());

    $author = Author::all();

    $this->assertCount(1,$author);
    $this->assertInstanceOf(Carbon::class,$author->first()->date);
    $this->assertEquals('1994/03/03',$author->first()->date->format('Y/d/m'));
 }

 /** @test */
 public function a_name_is_required()
 {
   $response =  $this->post('authors',array_merge($this->data(),['name' => '']));

   $response->assertSessionHasErrors('name');
 }
 
 /** @test */
 public function a_date_is_required()
 {
   $response =  $this->post('authors',array_merge($this->data(),['date' => '']));

   $response->assertSessionHasErrors('date');
 }

 private function data()
 {
    return [
       'name' => 'mouhssine',
       'date' => '03/03/1994',
    ];
 }
}
