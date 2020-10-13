<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Book;
use App\Models\Author;
use Illuminate\Support\Facades\Auth;
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
    
 //   $this->withOutExceptionHandling();
      
    $response =  $this->post('/books',$this->data());

      $book = Book::first();

     // $response->assertOk();

      $this->assertCount(1, Book::all());
      $response->assertRedirect($book->path());
    }

    /** @test */
    public function name_required()
    {
    //  $this->withOutExceptionHandling();
    
      $response =  $this->post('/books',array_merge($this->data(),['name' => '']));
        $response->assertSessionHasErrors('name');
    }
     /** @test */
     public function author_required()
     {
     //  $this->withOutExceptionHandling();
     
       $response =  $this->post('/books',array_merge($this->data(),['author_id' => '']));
         $response->assertSessionHasErrors('author_id');
     }
     
     /** @test */
     public function updateBook()
     {
         $this->withOutExceptionHandling();
         $this->post('/books',$this->data());
          $book = Book::first();

         $response = $this->patch($book->path(),[
           'name' => 'new name',
           'author_id' => 'new author',
         ]);
         $this->assertEquals('new name',Book::first()->name);
         $this->assertEquals(2,Book::first()->author_id);
         $response->assertRedirect($book->fresh()->path());
    
     }

     /** @test */
     public function a_book_can_be_deleted()
     {

      $this->withOutExceptionHandling();
      $this->post('/books',$this->data());

       
       $book = Book::first();
       $this->assertCount(1,Book::all());

      $response = $this->delete($book->path(),$this->data());
      $this->assertCount(0,Book::all());
      $response->assertredirect('/books');
      
     }

     /** @test */
     public function a_new_author_is_automatically_added()
     {

      $this->withOutExceptionHandling();

      $this->post('/books',$this->data());
      $book = Book::first();

      $author = Author::first();
      
      $this->assertEquals($author->id,$book->author_id);
      
      $this->assertCount(1,Author::all());

     }
     
     /**
      * @test
      * 
      */
     public function an_author_id_is_recorded()
     {
     
         $this->withOutExceptionHandling();

         Book::create([
             'name' =>  'Cool Title',
             'author_id' => 1,
         ]);
 
         $this->assertCount(1,Book::all());
     }

     private function data()
    {
     return [
        'name' => 'book',
        'author_id' => 'mouhssine'
     ];
    }
    
}
