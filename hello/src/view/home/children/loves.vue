<template>
  <div class="loves_wrap">
    <div class="sear">
      <img src="../../../assets/timg.gif" style="width: 100%;height: 100%"/>
      <div class="sear_text">
        {{searText}}
      </div>
    </div>
    <group gutter="0">
      <cell title="给我留言" is-link @click.native="$router.push({path:'/message'})">
        <img slot="icon" src="../../../assets/message.png" class="cellImg"/>
      </cell>
    </group>
    <group>
      <cell title="我的收藏" is-link @click.native="mySave">
        <img slot="icon" src="../../../assets/mysave.png" class="cellImg"/>
      </cell>
    </group>
    <group>
      <cell title="邂逅NICE" is-link @click.native="niceClick">
        <img slot="icon" src="../../../assets/nice.png" class="cellImg"/>
      </cell>
    </group>
  </div>
</template>
<script>
  import { Group, Cell } from 'vux'

  export default {
    data () {
      return {
        searText: 'Hello World'
      }
    },
    components: {
      Group,
      Cell
    },
    methods: {
      niceClick () {
        this.$router.push('/photo')
      },
      wishClicking () {
        this.$router.push('/wish')
      },
      mySave () {
        this.$router.push({path: '/mySave'})
      }
    }
  }
</script>
<style lang="stylus">
  .loves_wrap {
    & .sear {
      width 100%;
      height 180px;
      position relative
      & .sear_text {
        position absolute
        left 0px;
        top: 0px;
        bottom 0px
        width 100%;
        height 100%
        text-align center
        line-height: 180px
        letter-spacing 3px;
        font-size 18px
        color #ffcd32;
        font-weight 500
      }
    }
    & .weui-cell {
      background-color: #333;
      color: #ffffff;
      font-size 14px;
      cursor: pointer
    }
    & .weui-cells:after {
      border: none;
    }
    & .weui-cell:before {
      border-top none
    }
    & .cellImg {
      display: inline-block;
      vertical-align: right;
      width: 20px;
      height: 20px;
      margin-right: 15px
    }
  }
</style>
