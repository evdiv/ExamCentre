<template>
    <div class="ar">
        <div v-if="examEnded" class="row justify-content-center" style="padding: 20px 10px 10px;">
            <div class="col-sm-12 text-center">

                <div style="margin-bottom: 20px;">
                    <i class="fas fa-spinner fa-spin fa-6x"></i>
                </div>
                <div class="alert alert-success">
                    The lesson has been completed succesfully.<br/>
                    Now you will be redirected on the page where you can send its results for evaluation or take the lesson again.
                </div>
            </div>
        </div>  


        <div v-else>
            <Player :url='src' :examPlaying = 'examPlaying' @player-started="playerStarted" @time="currentTime"></Player>

            <div class="row" style="padding: 20px 10px 10px;">

                <div class="col-sm-8">
                    <button v-if='!examStarted' data-toggle="modal" 
                            data-target="#takeExamConfirmation" class="btn btn-success btn-lg">
                        <i class="fas fa-play-circle fa-lg"></i> Start Exam
                    </button>                    

                    <span v-if='examPlaying' class="btn btn-lg">
                        <i class="blink fas fa-play-circle fa-xlg" style="font-size: 34px; color: #389059;"></i> 
                        <span style="font-size: 32px;"> &nbsp;Exam is Playing, please listen carefully.</span>
                    </span>


                    <span v-if='isRecording' class="btn btn-lg">
                        <i class="blink fas fa-microphone fa-xlg" style="font-size: 34px; color: #df2d0f;"></i> 
                        <span style="font-size: 32px;"> &nbsp;Your response is Recording, please speak.</span>
                        <p><small>Mic volume level: {{ volume }}, recoded time: {{ recordedTime }}</small></p>
                    </span>
                </div>

                <div class="col-sm-4 text-right">
                    <button v-if='examStarted' data-toggle="modal" 
                            data-target="#cancelExamConfirmation" class="btn btn-danger btn-lg">
                        <i class="fas fa-stop-circle fa-lg"></i> Stop and Cancel Exam
                    </button>
                </div>    
            </div>          


            <!-- Modal -->
            <div class="modal fade" id="takeExamConfirmation" tabindex="-1" role="dialog" 
                aria-labelledby="takeExamConfirmation" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Take the Exam?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <img src="/images/notification.jpg" class="float-right" alt="...">
                            Do you want to take the Exam?<br/>
                           Please make sure your microphone is working and there is a silent environment aroud you. You can cancel and retake this exam in any times.
                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button @click="startExam" data-dismiss="modal" class="btn btn-success btn-lg">
                                <i class="fas fa-play-circle fa-lg"></i> Yes Start the Exam
                            </button>

                        </div>
                    </div>
                </div>
            </div>
            <!--/ Modal -->

            <!-- Modal -->
            <div class="modal fade" id="cancelExamConfirmation" tabindex="-1" role="dialog" 
                aria-labelledby="cancelExamConfirmation" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Cancel the Exam?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <img src="/images/danger-notification.jpg" class="float-right" alt="...">
                            Do you really want to cancel the Exam?<br/>
                            If you click cancel you will be able to retake it any time later.
                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <a href="/lessons" v-if='examStarted' class="btn btn-danger btn-lg">
                                <i class="fas fa-stop-circle fa-lg"></i> Stop and Cancel Exam
                            </a>

                        </div>
                    </div>
                </div>
            </div>
            <!--/ Modal -->


        </div>

    </div>
</template>

<script>
    import Player from './PlayerComponent'
    import Recorder    from './lib/recorder'
    import { convertTimeMMSS }  from './lib/utils'
    export default {
        props: ['id', 'src', 'intervals-str', 'secondPartStart', 'length'],
        data () {
            return {
                recorder    : new Recorder({
                                afterStop: () => {
                                  this.recordList = this.recorder.recordList()
                                  if (this.stopRecord) {
                                    this.stopRecord('stop record')
                                  }
                                }

                              }),

                examStarted   : false,
                examPlaying   : false,
                examEnded : false,
                muteTimer : undefined,
                recordList    : [],
                selected      : {},
                uploaderOptions : {},
                responseMaxTime: 15, 
                counter: 1
            }
        },

        computed: {
            iconButtonType () {
                return this.isRecording && this.isPause ? 'mic' : this.isRecording ? 'pause' : 'mic'
            },
            intervals() {
                return this.intervalsStr.split(",");
            },
            isPause () {
                return this.recorder.isPause
            },
            isRecording () {
                return this.recorder.isRecording
            },
            recordedTime () {
                if (this.recorder.duration >= this.responseMaxTime) {
                  this.stopRecorder()
                }
                return convertTimeMMSS(this.recorder.duration)
            },
            volume () {

                if(this.recorder.duration > (this.responseMaxTime / 5)) {
                    this.detectMute()
                }
                return parseFloat(this.recorder.volume)
            }
        },

        methods: {
            toggleRecorder () {
                if (!this.isRecording || (this.isRecording && this.isPause)) {
                    this.examPlaying = false;
                    this.recorder.start()

                } else {
                    this.recorder.pause()   
                }
            },

            stopRecorder () {
                if (!this.isRecording) {
                  return
                }
                this.recorder.stop()
                this.upload()
                this.playExam()
            },

            upload() {
                let record = this.recordList.shift();

                let data = new FormData()
                data.append('audio', record.blob, 'my-record')

                let settings = { headers: { 'content-type': 'multipart/form-data' } } 

                axios.post('/records/' + this.id, data, settings)
                .then((response) => {
                    console.log(response)
                })
                .catch((error) => {
                    console.log(error)
                });
            },

            startExam() {
                if(this.examStarted) {
                    return;
                }
                this.examStarted = true
                this.examPlaying = true;
            },

            currentTime(value) {
                console.log("current time" + value)
                this.counter = Math.round(value)
            },

            playerStarted() {
                this.playExam()
            },  


            playExam() {
 
                this.examPlaying = true;
                console.log(this.intervals)

                let frames = setInterval(() => {
                        
                        console.log(this.counter);

                        if( this.counter >= this.length) {
                            clearInterval(frames)
                            this.stopRecorder()
                            this.endExam()
                            return;
                        }    

                        if(this.counter == this.intervals[0]) {
                            console.log(this.counter)

                            if(parseInt(this.intervals[0]) <= 35) {   
                                console.log("introdution")  
                                this.responseMaxTime = 3 //4

                            } else if(parseInt(this.intervals[0]) == this.secondPartStart) {
                                console.log("second part")
                                this.responseMaxTime = 3 //110

                            } else if(parseInt(this.intervals[0]) > this.secondPartStart) {
                                console.log("third part")
                                this.responseMaxTime = 3 //25
                            } else {
                                console.log("first part")
                                this.responseMaxTime = 3 //15
                            }

                            this.toggleRecorder()
                            this.intervals.splice(0, 1)
                            clearInterval(frames);
                        }
                        
                        this.counter++

                    },1000
                );
            },

            endExam() {
                axios.post('/lessons/' + this.id, {
                    completed: 1,
                    '_method' : 'PATCH'
                }).then(() => {

                    this.examEnded = true;
                    location.reload() 
                })
            },

            detectMute() {

                console.log("detectiong mute")
                if(!this.recorder.isRecording) {
                    return
                }

                if(this.recorder.volume > 0 && typeof this.muteTimer != 'undefined') {
                    clearTimeout(this.muteTimer)
                    this.muteTimer = undefined;
                
                } else if(this.recorder.volume == 0 && typeof this.muteTimer == 'undefined') {

                    console.log("setting timeout. will be waiting for " + this.responseMaxTime / 5 + "sec");
                    this.muteTimer = setTimeout(() => {
                        this.stopRecorder()
                        console.log('recording stopped');

                    }, (this.responseMaxTime / 5) * 1000)
                } 
            }
        },

        beforeDestroy () {
          this.stopRecorder()
        },
        components: { Player }
    }
</script>

<style>
    .blink{
        animation: blink 1s ease-in-out infinite;
    }

    @keyframes blink{
        0%{opacity: 0;}
        50%{opacity: .5;}
        100%{opacity: 1;}
    }
</style>