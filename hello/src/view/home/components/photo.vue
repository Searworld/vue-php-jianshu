<template>
  <div class="waterFall" style="color: white">
    {{hhhh}}
    <div class="item" v-for="(item,index) in imgList" :key="index">
      <img :src="item.imgUrl" @click="imgLook(item)"/>
    </div>
  </div>
</template>
<script>
//  import wx from 'weixin-js-sdk'
//  import jsApiList from '../../../weixin/jsapi/jsapiList'
  //  import $ from 'jquery'

  export default {
    name: 'nice-place',
    data () {
      return {
        hhhh: 'jjjj',
//        imgList: []
        imgList: [
          {imgUrl: require('../../../assets/photo/WechatIMG628.jpeg')},
          {imgUrl: require('../../../assets/photo/WechatIMG630.jpeg')},
          {imgUrl: require('../../../assets/photo/WechatIMG639.jpeg')},
          {imgUrl: require('../../../assets/photo/WechatIMG631.jpeg')},
          {imgUrl: require('../../../assets/photo/WechatIMG632.jpeg')},
          {imgUrl: require('../../../assets/photo/WechatIMG633.jpeg')},
          {imgUrl: require('../../../assets/photo/WechatIMG634.jpeg')},
          {imgUrl: require('../../../assets/photo/WechatIMG635.jpeg')},
          {imgUrl: require('../../../assets/photo/WechatIMG636.jpeg')},
          {imgUrl: require('../../../assets/photo/WechatIMG637.jpeg')},
          {imgUrl: require('../../../assets/photo/WechatIMG638.jpeg')},
          {imgUrl: require('../../../assets/photo/WechatIMG640.jpeg')},
          {imgUrl: require('../../../assets/photo/WechatIMG641.jpeg')},
          {imgUrl: require('../../../assets/photo/WechatIMG629.jpeg')},
          {imgUrl: require('../../../assets/photo/hi.jpeg')},
          {imgUrl: require('../../../assets/photo/ha.jpeg')},
          {imgUrl: require('../../../assets/photo/he.jpeg')}
        ]
      }
    },
    computed: {
//      imglists: {
//        get () {
//          const shuzu = []
//          this.imgList.map((item) => {
//            return shuzu.push(item.imgUrl)
//          })
//          return shuzu
//        }
//      }
    },
    methods: {
//      weixin () {
//        wx.config({
//          debug: false,
//          appId: 'wx28d27cf4381727b4',
//          timestamp: Date.parse(new Date()),
//          nonceStr: 'Wm3WZYTPz0wzccnW',
//          signature: '332c62cc9b7e8cdd33d597edd8d477869f4830be',
//          jsApiList
//        })
//      },
//      imgLook (item) {
//        console.log('dianle')
//        wx.ready((res) => {
//          console.log(res)
//          wx.previewImage(
//            {
//              current: item.imgUrl,
//              urls: this.imglists
//            }
//          )
//        })
//      }
//      loadData () {
//        $.ajax({
//          url: 'php/imgList.php',
//          type: 'get',
//          dataType: 'json',
//          这里要注意的是要用箭头函数指向全局
//          success: (result) => {
//            this.imgList = result
//          }
//        })
//      }
    },
    mounted () {
      this.weixin()
//      this.loadData()
    }
  }
</script>
<style lang="stylus">
  .waterFall {
    column-count: 3;
    column-gap: 0;
    & .item {
      break-inside: avoid;
      box-sizing: border-box;
      padding: 5px;
      & img {
        width: 100%;
      }
    }
  }
</style>
