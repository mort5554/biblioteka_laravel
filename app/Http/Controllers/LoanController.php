<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreLoan;
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
    public function store(StoreLoan $request)
{
    // Walidacja danych (opcjonalnie warto dodać)
    $validatedData = $request->all();

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

    public function search(Request $request){
        $q = $request->input('q', "");

        $loansList = Loan::whereHas('book', function($query) use ($q){
            $query->where('name', 'like', "%".$q."%");
        })->orWhere('client', 'like', "%".$q."%")
            ->with('book')
            ->paginate(10);


        return view('loans.index')->with('loansList', $loansList);
    }
}
