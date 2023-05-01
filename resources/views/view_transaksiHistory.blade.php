@extends('template.master')

@section('title', 'Game Account Detail Page')

@section('content')

    <div class="container text-center">
        <div class="card" style="width 18 rem;">
            @foreach ($tr as $transaksi)
                <h3>Transanction History Details</h3>
                <h4>Transaction ID: {{$transaksi->TransaksiID}}</h4>
                <div class="card mb-6">
                    <div class="row g-0">
                        <div class="col-md-6">
                            <img src="{{$transaksi->image}}" class="img-fluid rounded-start" alt="..." style="width: 70%;height: max-content; object-fit: cover;">
                        </div>
                        <div class="col-md-4">
                            <p class="card-title">Game Account ID: {{$transaksi->GameAccountID}}</p>
                            <p class="card-title">Game Account Name: {{$transaksi->name}}</p>
                            <p class="card-title">Game Account Description: {{$transaksi->describes}}</p>
                            <p class="card-title">Game Account Price: {{$transaksi->price}}</p>
                            <p class="card-title">Payment Method: {{$transaksi->Method}}</p>
                            <p class="card-title">Buy From User ID: {{$transaksi->PrevOwner}}</p>
                            <p class="card-title">Owner User ID: {{$transaksi->AccountOwner}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection

