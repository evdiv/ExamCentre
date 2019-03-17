<template>
  <carousel :data="data" :controls="false"></carousel>
</template>

<script>
  import carousel from '@chenfengyuan/vue-carousel';

  export default {
    data() {
      return {
        data: [
          '<img src="/images/review_user_1.jpg" style="margin-right: 40px;" class="float-left rounded-circle" alt="..."> Using your servise I was able to increase my speaking score from 5.5 to 6.5. Since my overall score became 6, I successfully enrolled to Gorge Brown College in Toronto, Canada. <span class="review-person">Irina, Russia</span>',
          '<img src="/images/review_user_2.jpg" style="margin-right: 40px;" class="float-left rounded-circle" alt="...">I took three of your virtual exams. It really works. Before using your website I took IELTS two times with scores 5.5 and 6.0. On my last attempt I was able to get 7.0 exactly as I was evaluated by your teachers. <span class="review-person">Evgeny, Ukraine</span>',
          '<img src="/images/review_user_3.jpg" style="margin-right: 40px;" class="float-left rounded-circle" alt="...">My weakest part has always been the Speaking section of IELTS. After taking your Virtual Exams I feel much more confident. Your teachers evaluated my as 6.5. I hope I will get this score on the real exam. <span class="review-person">Mihaela, Italy</span>',
        ],
      };
    },
  };
</script>