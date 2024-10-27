@extends('template.master')

@section('title')
    <title>Karaoke Infinity</title>
@endsection

@section('content')
<section class="inner-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="container-fluid mr-5">
                <div class="row flex-nowrap d-flex flex-sm-row">
                    <div class="col-auto col-md-3 col-xl-3 px-sm-2 px-0 bg-light">
                        <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                            <div class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                            </div>
                                <div id="selection_menu" name="selection_menu">
                                    <h6 class="mb-2 txt_mic ">Microphone Player</h6>
                                    <audio id="audio" controls class="d-none"></audio> <!-- Hide the default player -->
                                    <div class="button-group">
                                        <button id="playPauseBtn" class="btn btn-light text-gradient mb-2">
                                            <i class="bi bi-mic-fill"></i>
                                        </button>
                                        <input id="volumeControl" type="range" min="0" max="100" value="0" />
                                    </div>

                                    <div id="card" class="mt-md-1 " style="margin-top: 0px;">
                                        <div id="conteudo-card" class="col-md-12" style="padding: 0; margin-top: 0px;">
                                            <div id="data_table_body" class="card-body">
                                                <div class="m-0 p-0 table-responsive-md mt-4">
                                                    <table id="queue" class="table mt-3 td dataTable dt-responsive w-100">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">Name</th>
                                                                <th scope="col">Remove</th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                    <iframe width="800" height="600" src="https://www.youtube.com/embed/IOolH4BORnM" allow="fullscreen;"></iframe>
        
                    <div class="card audio-card text-center col-md-11">   
                        <div class="form-group mt-3">
                            <label for="youtubeLink">Enter YouTube Link:</label>
                            <input type="text" id="youtubeLink" class="form-control" placeholder="https://www.youtube.com/watch?v=example">
                            <button id="submitLink" class="btn btn-primary mt-2">Submit</button>
                        </div>
                        
                        <div id="card" class="mt-md-1 " style="margin-top: 0px;">
                            <div id="conteudo-card" class="col-md-12" style="padding: 0; margin-top: 0px;">
                                <div id="data_table_body" class="card-body">
                                    <div class="m-0 p-0 table-responsive-md mt-4">
                                        <table id="users" class="table mt-3 table-striped table-bordered dataTable dt-responsive w-100">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">URL</th>
                                                    <th scope="col">Uploaded By</th>
                                                    <th scope="col">Queue</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
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

   <script>
     // DATATABLE Ajax 
        $(document).ready(function(){
            var table = $('#users').DataTable({
                "processing": true,
                "serverSide": true,
                "lengthChange": false,
                "ajax": {
                    url: "{{ route('populate.dt.sing') }}"
                }, "columns": [
                    {
                    data: 'name',
                }, {
                    data: 'URL',
                }, {
                    data: 'user_name',
                },{
                render: function(data){
                        return '<div class=""> ' +
                                    '<div class="row mb-1"> ' +
                                        '<center>'+
                                            '<div class="col-4 p-0" > ' +
                                                '<i  onClick=addQueue() class="bi bi-plus-square-fill text-gradient px-2 py-1" title="Add Queue" style="font-size: 25px;"></i> '+
                                            '</div> ' +
                                        '</center>'+
                                    '</div> ' +
                                '</div>'
                    } 
            }]
            });
        })

        // DATATABLE Ajax 
        $(document).ready(function(){
            var table = $('#queue').DataTable({
                "processing": true,
                "serverSide": true,
                "searching": false,
                "lengthChange": false,
                "ajax": {
                    url: "{{ route('populate.dt.sing') }}"
                }, "columns": [
                    {
                    data: 'name',
                }, {
                render: function(data){
                        return '<div class=""> ' +
                                    '<div class="row mb-1"> ' +
                                        '<center>'+
                                            '<div class="col-4 p-0" > ' +
                                                '<i  onClick=removeQueue() class="bi bi-dash-square-fill text-danger px-2 py-1" title="Remove Queue" style="font-size: 25px;"></i> '+
                                            '</div> ' +
                                        '</center>'+
                                    '</div> ' +
                                '</div>'
                    } 
            }]
            });
        })

    $(document).ready(function() {
        // Submit the link when the button is clicked
        $('#submitLink').click(function() {
            let youtubeLink = $('#youtubeLink').val();
            // Check if the field is not empty
            if (youtubeLink.trim() !== "") {
                $.ajax({
                    url: "{{ route('store.youtube.link') }}", // Define the route in Laravel
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}', // CSRF Token for security
                        youtube_link: youtubeLink
                    },
                    success: function(response) {
                        // Clear the input field after submission
                        $('#youtubeLink').val('');

                        // Refresh the DataTable upon success
                        $('#users').DataTable().ajax.reload();
                        $('#queue').DataTable().ajax.reload();
                    },
                    error: function(xhr, status, error) {
                        console.error('Error submitting the link:', error);
                    }
                });
            } else {
                alert('Please enter a valid YouTube link.');
            }
        });
    });

   </script>

</section>
@endsection
