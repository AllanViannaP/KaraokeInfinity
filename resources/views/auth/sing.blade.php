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
                    <iframe width="800" height="600"  src="https://www.youtube.com/embed/IOolH4BORnM" allow="fullscreen;"></iframe>

                      <div class="card audio-card text-center">
                        <h6 class="mb-2">Microphone Player</h6>
                        <audio id="audio" controls class="d-none"></audio> <!-- Hide the default player -->
                        <div class="button-group">
                            <button id="playPauseBtn" class="btn btn-light text-gradient mb-2">
                                <i class="bi bi-mic-fill"></i>
                            </button>
                                <input id="volumeControl" type="range" min="0" max="100" value="0" />
                        </div>
                    </div>
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

    <script>
       document.addEventListener("DOMContentLoaded", function() {
            const audio = document.getElementById('audio');
            const playPauseBtn = document.getElementById('playPauseBtn');
            const playIcon = playPauseBtn.querySelector('i');
            const volumeControl = document.getElementById('volumeControl');

            // Set the audio volume to 0 (muted)
            audio.volume = 0;

            // Add a click event to the mute/unmute button
            playPauseBtn.addEventListener('click', function() {
                if (audio.volume > 0) {
                    audio.volume = 0; // Mute the audio
                    playIcon.classList.remove('bi-mic-fill'); // Remove the unmuted microphone icon
                    playIcon.classList.add('bi-mic-mute-fill'); // Add the muted microphone icon
                } else {
                    audio.volume = 1; // Unmute the audio
                    playIcon.classList.remove('bi-mic-mute-fill'); // Remove the muted microphone icon
                    playIcon.classList.add('bi-mic-fill'); // Add the unmuted microphone icon
                }
            });

            // Update the volume when the volume control changes
            volumeControl.addEventListener('input', function() {
                audio.volume = volumeControl.value / 100; // Convert the control value (0-100) to 0-1
                // Update the icon based on the volume
                if (audio.volume === 0) {
                    playIcon.classList.remove('bi-mic-fill');
                    playIcon.classList.add('bi-mic-mute-fill');
                } else {
                    playIcon.classList.remove('bi-mic-mute-fill');
                    playIcon.classList.add('bi-mic-fill');
                }
            });

            // When the audio ends, ensure the unmuted microphone icon is displayed
            audio.addEventListener('ended', function() {
                playIcon.classList.remove('bi-mic-mute-fill'); // Remove the muted microphone icon
                playIcon.classList.add('bi-mic-fill'); // Add the unmuted microphone icon
            });
        });
   </script>

</section>
@endsection
