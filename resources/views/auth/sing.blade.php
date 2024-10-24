@extends('template.master')

@section('title')
    <title>Karaoke Infinity</title>
@endsection

@section('content')
<section class="inner-page">
    <script
      src='https://code.jquery.com/jquery-3.2.1.slim.js'
      integrity='sha256-tA8y0XqiwnpwmOIl3SGAcFl2RvxHjA8qp0+1uCGmRmg='
      crossorigin='anonymous'
    ></script>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                    <audio id="audio" controls></audio>
                    <iframe width="800" height="600"  src="https://www.youtube.com/embed/IOolH4BORnM" allow="fullscreen;"></iframe>
            </div>
        </div>
    </div>

        <script>
        $(document).ready(function() {
            // Automatically start capturing audio when the page loads
            if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                // Request permission to capture audio from the microphone
                navigator.mediaDevices.getUserMedia({ audio: true })
                    .then(function(stream) {
                        // Create an audio element that receives the microphone stream
                        const audioElement = $('#audio')[0];
                        audioElement.srcObject = stream;
                        audioElement.play();
                    })
                    .catch(function(err) {
                        console.error("An error occurred while capturing audio: ", err);
                    });
            } else {
                console.warn("Your browser does not support audio capture.");
            }
        });
    </script>


</section>
@endsection
