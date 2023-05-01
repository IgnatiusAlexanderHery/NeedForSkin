@extends("template.master")

@section('title', 'Transaction History Page')

@section('content')

    <div class="container">
        @if(isset($query))
            <h1 class="text-center">Showing results of <b>"{{ $query }}"</b></h1>
        @else
            <h1 class="text-center">Transaction History</h1>
        @endif
        <div class="row row-cols-3 justify-content-md-center">
            @foreach($transaksi as $tr)
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"> Transaction ID: {{$tr->TransaksiID}} </h5>
                        <p class="card-title"> Game Account ID: {{$tr->GameAccountID}} </p>
                        <p class="card-title"> Game Account Name: {{$tr->name}} </p>
                        <p class="card-title"> Method: {{$tr->Method}} </p>
                        <div class="d-flex justify-content-between">
                            <form action="{{ route('View Transaksi History', [$tr->TransaksiID]) }}">
                                <button class="btn btn-outline-primary" type="submit">View Details</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
