<nav class="navbar navbar-expand-lg bg-body-tertiary px-5">
    <div class="container-fluid">
      <a class="navbar-brand mx-3" href="{{ route('books.index') }}">Biblioteka</a>
      <a class="navbar-brand mx-3" href="{{ route('loans.index') }}">Wypożyczenia</a>
      <a class="navbar-brand mx-3" href="{{ route('authors.index') }}">Autorzy</a>
      <div class="collapse navbar-collapse" id="navbarScroll">
        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
            @if (request()->is('books*'))
                <li class="nav-item">
                    <a class="nav-link active mx-3" aria-current="page" href="{{ route('books.create') }}">
                        Dodaj książkę
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active mx-3" aria-current="page" href="{{ route('books.cheapest') }}">
                        Najtańsze książki
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active mx-3" aria-current="page" href="{{ route('books.longest') }}">
                        Najdłuższe książki
                    </a>
                </li>
            @elseif(request()->is('loans*'))
                <li class="nav-item">
                    <a class="nav-link active mx-3" aria-current="page" href="{{ route('loans.create') }}">
                        Dodaj wypożyczenie
                    </a>
                </li>
            @elseif(request()->is('authors*'))
                <li class="nav-item">
                    <a class="nav-link active mx-3" aria-current="page" href="{{ route('authors.create') }}">
                        Dodaj autora
                    </a>
                </li>
            @endif

        </ul>
        @if (request()->is('books*'))
            <form action="{{ route('books.search') }}" method="GET" class="d-flex" role="search">
                @csrf
                @method('GET')
                <input name="q" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>

        @elseif(request()->is('loans*'))
            <form action="{{ route('loans.search') }}" method="GET" class="d-flex" role="search">
                @csrf
                @method('GET')
                <input name="q" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>

        @elseif(request()->is('authors*'))
            <form action="{{ route('authors.search') }}" method="GET" class="d-flex" role="search">
                @csrf
                @method('GET')
                <input name="q" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>

        @endif

        <div class="dropdown ms-5">
            <a class="btn dropdown-toggle nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Język
            </a>

            <ul class="dropdown-menu">
                <li>
                    <a class="dropdown-item" href="{{ URL::to('language/pl') }}">
                        Polski
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ URL::to('language/en') }}">
                        Angielski
                    </a>
                </li>
            </ul>
          </div>
      </div>
    </div>
</nav>

<style>
.navbar-nav .nav-item a{
    text-decoration-line: underline;
}
</style>
