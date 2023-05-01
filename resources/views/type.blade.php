@extends('template.master')

@section('title', 'Type Page')

@section('content')
    <div class="container-fluid">
        <h1 class="card-title">{{$type->name}}</h1>
            <div class="container d-flex">
                @foreach($gameAccounts as $a)
                    @if (Auth::check() && ( Auth::user()->role === 'Member' || Auth::user()->role === 'Admin' ) && Auth::user()->id === $a->UserID)
                    <div class="card" style="width: 18rem;">
                        <img src=" {{$a->image}} " class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Game Account Name {{$a->name}} </h5>
                            <h5 class="card-text"> {{$a->describes}} </h5>
                            {{-- <h5 class="card-text">Game Name: {{$a->GameName}} </h5> --}}
                        </div>
                        <div class="d-flex justify-content-between card-footer">
                            <form action="{{ route('Game Account Page', [$a->GameAccountID]) }}">
                                <button class="btn btn-outline-primary" type="submit">View</button>
                            </form>
                            <div class="Own-Account">
                                <p>You Own<br>this Account</p>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="card" style="width: 18rem;">
                        <img src=" {{$a->image}} " class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Game Account Name: {{$a->name}} </h5>
                            <h5 class="card-text"> {{$a->describes}} </h5>
                            {{-- <h5 class="card-text">Game Name: {{$a->GameName}} </h5> --}}
                        </div>
                        <div class="d-flex justify-content-between card-footer">
                            <form action="{{ route('Game Account Page', [$a->GameAccountID]) }}">
                                <button class="btn btn-outline-primary" type="submit">View</button>
                            </form>
                            <form action="{{ route('Buat Transaksi Page',[$a->GameAccountID]) }}">
                                <button class="btn btn-outline-primary" type="submit">Buy</button>
                            </form>
                        </div>
                    </div>
                @endif
                @endforeach
            </div>
    </div>
@endsection
