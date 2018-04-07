<template>
  <div class="tab-wrap">
    <router-link tag="div" class="tab-item" to="/recommend">Home</router-link>
    <!--<router-link tag="div" class="tab-item">-->
    <div class="tab-item">
      <img src="../assets/add.png" style="width: 40px;height: 40px;" @click="dianji"/>
    </div>
    <!--</router-link>-->
    <router-link tag="div" class="tab-item" to="/loves">Share</router-link>

  </div>
  <!--to="/add-article"-->
</template>
<script>
  export default {
    name: 'header-tab',
    methods: {
      dianji () {
        this.$emit('dianjiClick')
      }
    }
  }
</script>
<style lang="stylus">
  .tab-wrap {
    position absolute
    left 0px;
    bottom 0px;
    right 0px;
    width: 100%
    height: 50px
    display: flex
    flex-wrap: wrap
    line-height 50px;
    z-index 1000
    background-color rgba(0, 0, 0, .2);
    & .tab-item {
      width: 33.3%
      text-align: center
      height 100%
      color: rgb(255, 255, 255)
      fone-size: 16px
      box-sizing: border-box
    }
    & .add_img {
      width: 40px;
      height 40px;
      margin 0px auto
      & img {
        width 100%;
        height 100%
      }
    }
    & .router-link-active {
      color: #ffcd32
    }
  }
</style>
