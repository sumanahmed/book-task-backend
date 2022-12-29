<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * get all books
     */
    public function index ()
    {
        $records = Book::all();

        if ($records->count() > 0) {
            return response()->json([
                'success'   => true,
                'data'      => $records,
                'message'   => 'Data Found'
            ]);
        }

        return response()->json([
            'success'   => false,
            'data'      => [],
            'message'   => 'Data not Found'
        ]);
    }
}
