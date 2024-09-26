<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Book;

class BookExistsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:checkIfBookExists';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check if the book with given title exists';

    /*public function __construct(){
        parent::__construct();
    }*/

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $title = $this->ask('Podaj tytul ksiazki?');
        $result = Book::where('name', $title)->first();
        if($result){
            $this->info('Ksiazka znajduje sie w bazie!');
        } else {
            $this->info('Brak ksiazki o podanym tytule!');
        }
    }
}
