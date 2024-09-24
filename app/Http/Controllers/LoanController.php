<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;
use App\Models\Book;
use Carbon\Carbon;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loansList = Loan::all();

        return view('loans.index')->with('loansList', $loansList);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $currentDate = Carbon::now();
        $books = Book::all();
        return view('loans.create',
            ['books' => $books, 'currentDate' => $currentDate]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Walidacja danych (opcjonalnie warto dodać)
    $validatedData = $request->validate([
        'book_id' => 'required|exists:books,id',
        'client' => 'required|string|max:255|min:3',
        'loaned_on' => 'required|date',
        'estimated_on' => 'required|date|after_or_equal:loaned_on',
    ]);

    // Tworzenie nowego rekordu Loan
    Loan::create($validatedData);

    return redirect()->route('loans.index')->with('message', 'Udało się zamówić książkę');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
