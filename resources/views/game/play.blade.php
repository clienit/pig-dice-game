@extends('layouts.app')

@section('content')
<div class="row mt-4 align-self-center">
    <div class="col-sm alert alert-dark">
    	<h3>Welcome {{ $player1 }} & {{ $player2 }}</h3>
    </div>
</div>
<div class="row mt-1">
    <div class="col-sm alert alert-info">
    	<h4>{{ $player1 }}'s Score: <span id="score1" class="font-weight-bold">0</span></h4>
    	<h4>{{ $player2 }}'s Score: <span id="score2" class="font-weight-bold">0</span></h4>
    </div>
</div>
<div class="row mt-1">
    <div class="col-sm alert alert-primary">
    	<h4>It's <span id="player" class="font-weight-bold">{{ $player1 }}</span>'s turn</h4>
    </div>
</div>
<div class="row mt-1">
    <div class="col-sm alert alert-success">
    	<h4>Dice: <span id="values" class="font-weight-bold"></span></h4>
    </div>
</div>
<div class="row mt-2">
    <div class="col-sm">
    	
		<input type="button" value="Roll" class="btn btn-primary" onclick='rollDice()'>
		<input type="button" value="Next Player" class="btn btn-primary" onclick='nextPlayer()'>

    </div>
</div>

@endsection

<script>

	function rollDice(){
        $.ajax({
            type: "GET",
            url: "roll",
            success: function(data) {
            	
            	$("#values").text(data[0] + " + " + data[1]);
            	var score = 0;
            	var totalscore = 0;

            	if( $("#player").text() == "{{ $player1 }}" ) {
		    		totalscore = parseInt($("#score1").text());
		    	} else {
		    		totalscore = parseInt($("#score2").text());
		    	}

                if((data[0] == 1) && (data[1] == 1 )) {
                	if( $("#player").text() == "{{ $player1 }}" ) {
			    		$("#score1").text(0);
			    	} else {
			    		$("#score2").text(0);
			    	}
                	nextPlayer();
                } else if((data[0] == 1) || (data[1] == 1 )) {
                	nextPlayer();
                } else {
                	score = totalscore + data[0] + data[1];
                	if( $("#player").text() == "{{ $player1 }}" ) {
			    		$("#score1").text(score);
			    	} else {
			    		$("#score2").text(score);
			    	}
			    	
			    	if(score >= 100)
			    	{
			    		alert("CONGRATULATIONS! YOU WIN!")
			    	}
                }
            }
        })
    }

    function nextPlayer(){
    	if( $("#player").text() == "{{ $player1 }}" ) {
    		$("#player").text("{{ $player2 }}");
    	} else {
    		$("#player").text("{{ $player1 }}");
    	}
    }
</script>