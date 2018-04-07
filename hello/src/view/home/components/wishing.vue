<template>
  <div class="wishing_wrap">
    <div class="wishing_video">
      <video :src="video"  autoplay loop></video>
    </div>
  </div>
</template>
<script>
  export default {
    data () {
      return {
        video: require('../../../assets/video/wish.mp4')
      }
    }
  }
</script>
<style lang="stylus">
  .wishing_wrap {
    width: 100%;
    position absolute;
    left 0px;
    top:0px;
    right 0px;
    bottom 0px;
    & .wishing_video {
      width 100%;
      height 90%
      margin 5% 0px
      & video {
        width 100%;
        height 100%
      }
    }
  }
</style>
