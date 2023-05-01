@extends('template.master')

@section('title', "View User Profile")

{{-- from $user --}}
@section('content')
    <div class="container mt-5">
        <a href="{{ Route('Buat Game Account') }}" class="btn">Sell Account</a>
        <div>
            <h5 class="h5 text-center">User ID :  {{ $user->id }} </h5>
            <h5 class="h5 text-center">User Name : {{ $user->name }} </h5>
            <h5 class="h5 text-center">User Email :  {{ $user->email }} </h5>
        </div>
        <div class="row row-cols-3 justify-content-md-center">
            @foreach($gameAccounts as $ga)
                <div class="card col m-1" style="width: 400px;">
                    <div class="card-body">
                        <h5 class="card-title">Game Account Name: {{ $ga->name }} </h5>
                        <h6 class="card-subtitle mb-2 text-muted">Game Account Id: {{ $ga->GameAccountID }}</h6>
                        <h6 class="card-subtitle mb-2 text-muted">Game Name: {{ $ga->GameName }}</h6>
                        <p class="card-text text-truncate"> {{ $ga->describes }} </p>
                        <div class="card-text d-flex justify-content-between" style="margin:5%;">
                            <div>
                                <form action="{{ route('Game Account Page', [$ga->GameAccountID]) }}">
                                    <button class="btn btn-outline-primary" type="submit">View</button>
                                </form>
                            </div>
                            <div>
                                <form action="{{ route('Edit Game Account Page', [$ga->GameAccountID]) }}">
                                    <button class="btn btn-outline-primary" type="submit">Edit</button>
                                </form>
                            </div>
                            <div>
                                <form method="post" action="{{route('Delete Game Account', [$ga->GameAccountID])}}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger" type="submit">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center" style="margin: 2rem">
            {{$gameAccounts->links()}}
        </div>
    </div>

@endsection
