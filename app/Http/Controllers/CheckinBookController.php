<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class CheckinBookController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Book $book)
    {
        try {
            $book->checkin(auth()->user());
        } catch (\Exception $ex) {
            return response([],404);
        }
    }
}
