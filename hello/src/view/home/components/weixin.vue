<template>
  <span style="color: white">jjjj</span>
</template>
<script>
  import wx from 'weixin-js-sdk'
  import jsApiList from '../../../weixin/jsapi/jsapiList'

  export default {
    methods: {
      wxInit () {
        wx.config({
          debug: false,
          appId: 'wx28d27cf4381727b4',
          timestamp: '1513301430',
          nonceStr: 'Wm3WZYTPz0wzccnW',
          signature: '332c62cc9b7e8cdd33d597edd8d477869f4830be',
          jsApiList
        })
        wx.ready(function (res) {
          console.log(res)
        })
        wx.error(function (res) {
          console.log(res)
        })
      }
    },
    mounted () {
      this.wxInit()
    }
  }
</script>
<style></style>
