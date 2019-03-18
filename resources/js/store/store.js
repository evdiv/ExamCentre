import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)


export default new Vuex.Store({
  	state: {
  		currentTime: 0,
  		examStarted: false,
  		examResumed: false,
  		examPaused: false,
  		examEnded: false
  	},

  	mutations: {
    	currentTime(state, val) {
      		state.currentTime = val
    	},
    	examStarted(state, val) {
      		state.examStarted = val
    	},
    	examResumed(state, val) {
      		state.examResumed = val
      		state.examPaused = !val
    	},	
    	examPaused(state, val) {
      		state.examPaused = val
      		state.examResumed = !val
    	},
    	examEnded(state, val) {
      		state.examEnded = val
    	}
  	},

  	getters: {
    	currentTime: state => state.currentTime,
    	examStarted: state => state.examStarted, 
    	examResumed: state => state.examResumed,
    	examPaused: state => state.examPaused,
    	examEnded: state => state.examEnded
  	}
})

