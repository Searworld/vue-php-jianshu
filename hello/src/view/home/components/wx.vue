<template>
  <img :src="imgUrl" @click="imgLook" style="width: 100%;height: 400px"/>
</template>
<script>
  import axios from 'axios'
  import sha1 from 'sha1'
  import jsApiList from '../../../weixin/jsapi/jsapiList'

  const wx = window.wx

  export default {
    data () {
      return {
        imgUrl: require('../../../assets/photo/WechatIMG628.jpeg')
      }
    },
    methods: {
      init () {
        this.get_assessToken()
        this.sha()
//        this.wxInit()
      },
      get_assessToken () {
        axios.get('/api/ticket').then((response) => {
          this.ticket = response.data.ticket
        }).catch(e => e)
      },
      sha () {
        const createNonceStr = () => {
          Math.random().toString(36).substr(2, 15)
        }
        const createTimestamp = () => {
          return parseInt(new Date().getTime() / 1000) + ''
        }
        const url = 'http://mp.weixin.qq.com?params=value'
        const ret = {
          jsapi_ticket: this.ticket,
          nonceStr: createNonceStr(),
          timestamp: createTimestamp(),
          url: url
        }
        const raw = function (args) {
          let keys = Object.keys(args)
          keys = keys.sort()
//          字典排序 得到 keys ["jsapi_ticket", "nonceStr", "timestamp", "url"]
          const newArgs = {}
          keys.forEach(function (key) {
            newArgs[key.toLowerCase()] = args[key]
//            key val 转小写
          })
          let string = ''
          for (let k in newArgs) {
            string += '&' + k + '=' + newArgs[k]
//            用 & 链接 去掉第一个 &
          }
          string = string.substr(1)
          return string
        }
        const signature = sha1(raw(ret))
        this.signature = signature
        return this.signature
      },
      imgLook () {
        const createNonceStr = () => {
          Math.random().toString(36).substr(2, 15)
        }
        const createTimestamp = () => {
          return parseInt(new Date().getTime() / 1000) + ''
        }
        wx.ready((res) => {
          console.info('ready')
          console.log('res', res)
          wx.previewImage(
            {
              current: this.imgUrl, // 当前显示图片的http链接
              urls: [this.imgUrl] // 需要预览的图片http链接列表
            }
          )
        })
        wx.error(function (res) {
          console.log(res)
        })
        wx.config({
          debug: true,
          appId: 'wx28d27cf4381727b4',
          timestamp: createTimestamp(),
          nonceStr: createNonceStr(),
          signature: this.signature,
          jsApiList
        })
      }
    },
    mounted () {
      this.init()
    }
  }
</script>
<style></style>
