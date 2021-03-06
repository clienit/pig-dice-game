@extends('layouts.app')

@section('content')
@if(session()->has('message'))
<div class="row mt-3">
    <div class="col-sm alert alert-danger">
        {{ session()->get('message') }}
    </div>
</div>
@endif
<div class="row mt-4">
    <div class="col-sm">
      <h3>Hello, welcome to "Pig Dice Game"</h3>
    </div>
</div>
<div class="row mt-4">
    <div class="col-sm">
      <h4>Please enter player names:</h4>
    </div>
</div>
<div class="row">
    <div class="col-sm">
      <form action="{{ route('game.play') }}" method="post" >
      {{ csrf_field() }}
          <div class="form-group">
            <label for="player1">Player 1</label>
            <input type="text" class="form-control" name="player1" placeholder="Enter Player 1 Name" required="true">
          </div>
          <div class="form-group">
            <label for="player2">Player 2</label>
            <input type="text" class="form-control" name="player2" placeholder="Enter Player 2 Name" required="true">
          </div>
          <button type="submit" class="btn btn-primary">Play</button>
        </form>
    </div>
</div>
@endsection