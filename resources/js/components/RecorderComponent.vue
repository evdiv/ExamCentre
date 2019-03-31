<template>
    <div class="ar">

        <div v-if="$store.getters.examEnded" class="row justify-content-center" style="padding: 20px 10px 10px;">
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
            <Player :url='src'></Player>

            <div class="row" style="padding: 20px 4px 4px;">

                <div class="col-sm-12">
                    <button v-if='!examStarted' data-toggle="modal" 
                            data-target="#takeExamConfirmation" class="btn btn-info btn-lg btn-block" style="font-size: 28px;">
                        <i class="fas fa-play-circle fa-lg"></i> Start Exam
                    </button>                    

                    <span v-if='examPlaying' class="btn btn-lg btn-success btn-lg btn-block">
                        <i class="blink fas fa-play-circle fa-xlg" style="font-size: 34px;"></i> 
                        <span style="font-size: 32px;"> &nbsp;Exam is Playing, please listen carefully.</span>
                    </span>


                    <span v-if='isRecording' class="btn btn-lg btn-danger btn-lg btn-block">
                        <i class="blink fas fa-microphone fa-xlg" style="font-size: 34px;"></i> 
                        <span style="font-size: 32px;"> &nbsp;Your response is Recording, please speak.</span>
                        <p><small>Mic volume level: {{ volume }}, recoded time: {{ recordedTime }}</small></p>
                    </span>
                </div>

               <!-- <div class="col-sm-4 text-right">
                    <button v-if='examStarted' data-toggle="modal" 
                            data-target="#cancelExamConfirmation" class="btn btn-danger btn-lg">
                        <i class="fas fa-stop-circle fa-lg"></i> Stop and Cancel Exam
                    </button>

                    

                </div> -->   
            </div>          
{{ currentTime }} 

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
                            <button @click="startExam" data-dismiss="modal" class="btn btn-info btn-lg">
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
    import store from '../store/store';

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

                muteTimer : undefined,
                recordList    : [],
                selected      : {},
                uploaderOptions : {},
                responseMaxTime: 16, 
                delayTime: 3000
            }
        },

        computed: {
            iconButtonType () {
                return this.isRecording && this.isPause ? 'mic' : this.isRecording ? 'pause' : 'mic'
            },
            intervals() {
                return this.intervalsStr.split(",");
            },
            currentTime() {
                return this.$store.getters.currentTime;
            },
            examStarted() {
                return this.$store.getters.examStarted
            },
            examPlaying () {
                return (this.$store.getters.examStarted && !this.$store.getters.examPaused)
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
                    this.resumeExam()
                }
                return convertTimeMMSS(this.recorder.duration)
            },
            volume () {
                if(this.recorder.duration > (this.delayTime / 1000)) {
                    this.detectMute()
                }
                return parseFloat(this.recorder.volume)
            }

        },
        watch: {
            currentTime(val) {

                if( val >= this.length) {
                    this.stopRecorder()
                    this.endExam()
                    return;
                }

                console.log(`Current time is ${val}, next break at ${this.intervals[0]}`) 

                if(val == this.intervals[0]) {

                    console.log("inside the condition");

                    if(parseInt(this.intervals[0]) <= 350) {   
                        console.log("introdution")  
                        this.responseMaxTime = 5
                        this.delayTime = 2000

                    } else if(parseInt(this.intervals[0]) == this.secondPartStart) {
                        console.log("second part")
                        this.responseMaxTime = 110
                        this.delayTime = 10000

                    } else if(parseInt(this.intervals[0]) > this.secondPartStart) {
                        console.log("third part")
                        this.responseMaxTime = 26
                        this.delayTime = 5000
                    } else {
                        console.log("first part")
                        this.responseMaxTime = 16
                        this.delayTime = 3000
                    }

                    this.startRecorder()
                    this.pauseExam()
                    this.intervals.splice(0, 1)
                }

            }
        },

        methods: {
            startRecorder () {
                if (!this.isRecording || (this.isRecording && this.isPause)) {
                    this.recorder.start()
                } 
            },

            pauseRecorder() {
                this.recorder.pause()
            },

            stopRecorder() {
                if (!this.isRecording) {
                  return
                }
                this.recorder.stop()
                this.upload()
            },

            async upload() {
                let record = this.recordList.shift();

                let data = new FormData()
                data.append('audio', record.blob, 'my-record')

                let settings = { headers: { 'content-type': 'multipart/form-data' } } 

                return await axios.post('/records/' + this.id, data, settings)
                .then((response) => {
                    console.log(response)
                })
                .catch((error) => {
                    console.log(error)
                });
            },


            startExam() {
                this.$store.commit('examStarted', true)
            },

            resumeExam() {
                this.$store.commit('examResumed', true)
            },

            pauseExam() {
                this.$store.commit('examPaused', true)
            },
               
            endExam() {
                axios.post('/lessons/' + this.id, {
                    completed: 1,
                    '_method' : 'PATCH'
                }).then(() => {

                    this.$store.commit('examEnded', true)
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
                        this.resumeExam()

                        console.log('recording stopped');

                    }, this.delayTime)
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