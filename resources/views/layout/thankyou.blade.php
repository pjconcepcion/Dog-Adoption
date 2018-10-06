@extends('layout.customerApp')

@section('content')
<section class ="section">
    <span class = "d-block bg-dark fixed-top py-5" style = "z-index: -2;position: absolute; top:0;"> </span>  
    <div class = "container">
        <div class = "row mt-5">
            <div class="text-xs-center">
                <h1 class="display-3">Thank You!</h1>
                <p class="lead"><strong>Please check your email</strong> for further instructions on how to complete your account setup.</p>
                <hr>
                <p>
                    Redirecting you to Adopting page in <span id="timer"></span>
                </p>
                <p class="lead">
                    <a class="btn btn-primary btn-sm" href="/adopt" role="button">Continue to Adopting Page</a>
                </p>
            </div>
        </div>
    </div>
</section>

<script>
    window.addEventListener('load', function(){
        var ctr = 5;
        var timer = setInterval(function(){
            document.getElementById('timer').innerText = ctr;
            ctr -= 1;
            if(ctr==0){
                clearInterval(timer);
                window.location.href = "/adopt";
            }
        },1000);
    });
</script>