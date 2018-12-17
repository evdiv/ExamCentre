@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header"><h4>{{ $lesson->exam->title }}</h4></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

   <div class="player">
     <video class="player__video viewer" src="https://player.vimeo.com/external/194837908.sd.mp4?s=c350076905b78c67f74d7ee39fdb4fef01d12420&profile_id=164"></video>

     <div class="player__controls">

       <button class="player__button toggle" title="Toggle Play">►</button>

     </div>
   </div>




                        <p>
                            {{ $lesson->exam->description }}<br/>
                        </p>
                        <small>{{ $lesson->created_at }}</small>

                    </div>
                </div>

                <hr/>

                <script>


// get elements
const player = document.querySelector('.player');
const video = player.querySelector('.viewer');
const toggle = player.querySelector('.toggle');
const skipButtons = player.querySelectorAll('[data-skip]');
const ranges = player.querySelectorAll('.player__slider');

// build functions
function togglePlay() {
    if (video.paused) {
        video.play();
    } else {
        video.pause();
    }
    // alternatively this can be written with a ternary operator
    /*
    const method = video.paused ? 'play' : 'pause';
    video[method]();
    */
}

function spaceBarTogglePlay(e) {
    if (e.keyCode == 32) {
        togglePlay();
    }
}

function updateButton() {
    const icon = this.paused ? '►' : '❚❚';
    toggle.textContent = icon;
}

function skip() {
    video.currentTime += parseFloat(this.dataset.skip);
}


// event listeners
video.addEventListener('click', togglePlay);
video.addEventListener('play', updateButton);
video.addEventListener('pause', updateButton);

toggle.addEventListener('click', togglePlay);
document.addEventListener('keypress', spaceBarTogglePlay);
skipButtons.forEach(button => button.addEventListener('click', skip));

let mousedown = false;

                </script>

                @if($lesson->completed && !$lesson->evaluation)

                    <div class="alert alert-info">
                        You have already completed this lesson.
                        Now you can send its results for evaluation or take the lesson one more time.
                        <a href="/lessons">Return to lessons</a>
                    </div>

                    <div class="text-right">
                        <form method="POST" action="/lessons/{{ $lesson->id }}" style="display: inline-block">
                            @csrf
                            {{ method_field('PATCH') }}
                            <input type="hidden" name="completed" value="0" >
                            <input type="submit" class="btn btn-default btn-sm" value="Take this lesson again">
                        </form>


                        <form method="POST" action="/evaluations" style="display: inline-block">
                            @csrf
                            <input type="hidden" name="lesson_id" value="{{ $lesson->id }}" >
                            <input type="submit" type="button" class="btn btn-success btn-sm" value="Send for Evaluation">
                        </form>
                    </div>

                @elseif($lesson->evaluation && !$lesson->evaluation->completed)
                    <div class="alert alert-info">
                        We have received your script. It is being evaluated by our teachers at the moment.
                        It takes us approximately 24 hours to evaluate your response.
                        Thank you. <a href="/lessons">Return to lessons</a>

                    </div>

                @elseif($lesson->evaluation && $lesson->evaluation->completed)
                    <div class="alert alert-success">
                        Evaluation has been completed. You can download your report
                    </div>

                    <div class="text-right">
                        <a href="#" type="button" class="btn btn-light btn-sm">Download Report</a>
                    </div>

                @else
                    <div class="text-right">
                        <form method="POST" action="/lessons/{{ $lesson->id }}">
                            @csrf
                            {{ method_field('PATCH') }}
                            <input type="hidden" name="completed" value="1" >
                            <input type="submit" type="button" class="btn btn-info btn-sm" value="Complete">
                        </form>
                    </div>
                @endif


            </div>
        </div>
    </div>
@endsection