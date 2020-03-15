<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Book;
use App\Category;
use App\Comment;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
           
        $books = Book::all();
        $categories = Category::all();
        return view('admin.books', ['books' => $books, 'categories' => $categories]);   
    }

    public function getBookDetails($id)
    {
       $book = new Book();
       $comments = new Comment();

       $book = Book::find($id);
       $comments = Comment::where('book_id',$id)->get();
    //    dd($comments);
    //    die();



        return view('book', ['book' => $book, 'comments' => $comments] );
    }

    
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|unique:books,title,NULL,id,deleted_at,NULL',
            'author' => 'required|string',
            'price' => 'required|numeric',
            'no_copies' => 'required|numeric'
        ]);
        $book = new Book();
        $book->title = $request->title;
        $book->author = $request->author;
        $book->category_id = $request->category_id;
        $book->price = $request->price;
        $book->no_copies = $request->no_copies;
        $book->save();
        return redirect('/dashboard/books');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        $categories = Category::pluck('name', 'id');
        return view('admin.editBook', ['book' => $book,'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => "required|string|unique:books,title,{$id},id,deleted_at,NULL",
            'author' => 'required|string',
            'price' => 'required|numeric',
            'no_copies' => 'required|numeric'
        ]);
        $book = Book::find($id);
        $book->title = $request->title;
        $book->author = $request->author;
        $book->category_id = $request->category_id;
        $book->price = $request->price;
        $book->no_copies = $request->no_copies;
        $book->save();
        return redirect('/dashboard/books');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();
        return redirect('/dashboard/books');
    }
}
