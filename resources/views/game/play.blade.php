@extends('layouts.app')

@section('content')
<div class="row mt-4">
    <div class="col-sm">
    	<h3>Welcome {{ $player1 }} & {{ $player2 }}</h3>
    </div>
</div>
<div class="row mt-5">
    <div class="col-sm">
    	<h4>{{ $player1 }}'s Score: <span id="score1">0</span></h4>
    	<h4>{{ $player2 }}'s Score: <span id="score2">0</span></h4>
    </div>
</div>
<div class="row mt-4">
    <div class="col-sm">
    	<h4>It's <span id="player">{{ $player1 }}</span>'s turn</h4>
    </div>
</div>
<div class="row mt-4">
    <div class="col-sm">
    	<h4>Dice: <span id="values"></span></h4>
    </div>
</div>
<div class="row mt-4">
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