<template>
    <div>
        <video id="videoPlayerContainer"
               class="video-js vjs-default-skin vjs-big-play-centered"
               v-if="url" >
            <source :src="url" type='video/mp4' preload="auto"/>
        </video>

    </div>
</template>

<script>
	import videojs from 'video.js'
	import 'video.js/dist/video-js.css'
    import store from '../store/store';

	export default {
		props: ['url'],
		data() {
			return {
				player: null,
                currentTime: 0,
				options: {
                    fluid: true,
                    techOrder: ["html5"],
                    controls: true,
                    preload: 'auto',
                }
			}
		},

        computed: {
            examStarted() {
                return this.$store.getters.examStarted;
            },

            examResumed() {
                return this.$store.getters.examResumed;
            },

            examPaused() {
                return this.$store.getters.examPaused;
            },

            examPlaying () {
                return (this.$store.getters.examStarted && !this.$store.getters.examPaused)
            },
        },

		methods: {
            getPlayer(){
                this.player = videojs('videoPlayerContainer', this.options);
            },

            timeTracker() {
                setInterval(() => {
                    this.currentTime = Math.round(this.player.currentTime() * 10);
                    this.$store.commit('currentTime', this.currentTime );
                }, 100);
            }
        },

        watch: {
            examStarted(val) {
                if(val) {
                    this.timeTracker();
                    this.player.play(); 
                }
            },

        	examResumed(val) {
                if(val) {
                    this.player.play()
                } 
        	},

            examPaused(val) {
                if(val) {
                    this.player.pause()
                }
            }
        },

        mounted(){
            if(this.url) {
            	this.getPlayer()
           	} 	
        },

        beforeDestroy(){
            videojs('videoPlayerContainer').dispose();
        }
	}
</script>
<style>
		.video-js .vjs-current-time { display: block; }
		.video-js .vjs-time-divider { display: block; }
		.video-js .vjs-duration { display: block; }
		
		.video-js .vjs-mute-control { display: block; }
		.video-js .vjs-volume-menu-button { display: block; }
		.video-js .vjs-volume-bar { display: block; }
		.video-js .vjs-big-play-button { display: none; }
		.video-js .vjs-remaining-time { display: none; }
		.video-js .vjs-progress-control { display: none; }
		.video-js .vjs-fullscreen-control { display: none; }
		.video-js .vjs-play-control { display: none; }

        .video-js .vjs-tech { pointer-events: none; }
</style>