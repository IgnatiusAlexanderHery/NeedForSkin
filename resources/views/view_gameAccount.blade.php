@extends('template.master')

@section('title', 'Game Account Detail Page')

@section('content')
    <div class="container text-center">
        <div class="card col" style="width 18 rem;">
            @foreach ($ga as $gameAccount)
                <div class="card mb-6">
                    <div class="row g-0">
                        <div class="col-md-6">
                            <img src="{{$gameAccount->image}}" class="img-fluid rounded-start" alt="..." style="width: 70%; height: max-content;object-fit: cover;">
                        </div>
                        <div class="col-md-4">
                            <div class="card-body">
                                <h5 class="card-title">Game Account ID: {{$gameAccount->GameAccountID}}</h5>
                                <h5 class="card-title">Account Name: {{$gameAccount->name}}</h5>
                                <h5 class="card-title">Game Name: {{ $gameAccount->GameName }}</h5>
                                <h5 class="card-title">{{$gameAccount->describes}}</h5>
                                <h5 class="card-title">Price: {{$gameAccount->price}}</h5>
                                <h5 class="card-title">User Owner: {{$gameAccount->UserID}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

