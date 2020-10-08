<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Book;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookReservationTest extends TestCase
{
    use RefreshDatabase;
   /**
    * @test
    */
    public function ajouterBook()
    {
    
    $this->withOutExceptionHandling();
    
    $response =  $this->post('/books', [
        'name' => 'book',
        'author' => 'mouhssine'
      ]);
        $response->assertOk();
      $this->assertCount(1, Book::all());
    }

    /** @test */
    public function name_required()
    {
    //  $this->withOutExceptionHandling();
    
      $response =  $this->post('/books', [
          'name' => '',
          'author' => 'mouhssine'
        ]);
        $response->assertSessionHasErrors('name');
    }
     /** @test */
     public function author_required()
     {
     //  $this->withOutExceptionHandling();
     
       $response =  $this->post('/books', [
           'name' => 'author',
           'author' => ''
         ]);
         $response->assertSessionHasErrors('author');
     }
     
     /** @test */
     public function updateBook()
     {

      $this->withOutExceptionHandling();
         $this->post('/books',[
          'name' => 'mouhssine',
          'author' => 'el ghazzali'
         ]);
          $book = Book::first();

         $response = $this->patch('/books/'.$book->id,[
           'name' => 'new name',
           'author' => 'new author',
         ]);
         $this->assertEquals('new name',Book::first()->name);
         $this->assertEquals('new author',Book::first()->author);
    
     }
     
    
}
