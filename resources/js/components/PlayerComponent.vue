<template>
    <div>
        <video id="videoPlayerContainer"
               class="video-js vjs-default-skin vjs-big-play-centered"
               v-if="url" >
            <source :src="url" type='video/mp4' />
        </video>
    </div>
</template>

<script>
	import videojs from 'video.js'
	import 'video.js/dist/video-js.css'
	export default {
		props: ['url', 'examPlaying'],
		data() {
			return {
				player: null,
                examStarted: false,
				options: {
                    fluid: true,
                    techOrder: ["html5"],
                    controls: true,
                    preload: 'auto',
                }
			}
		},

		methods: {
            getPlayer(){
                this.player = videojs('videoPlayerContainer', this.options);
            },

        },

        watch: {
        	examPlaying(val) {
        		if(val) {
        			let started = this.player.play();

                    if(!this.examStarted && started !== undefined) {
                        started.then(() => {
                            this.$emit('player-started')
                            this.examStarted = true
                        })
                    }

        		} else {
        			this.player.pause();
                    this.$emit('time', this.player.currentTime());
        		}

        	},
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