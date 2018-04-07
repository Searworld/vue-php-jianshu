<template>
  <div class="message_wrap">
    <div class="message_title">留言啦～～</div>
    <x-textarea v-model="content" :rows="rows" placeholder="随便说说～～"></x-textarea>
    <div class="message_send" @click="send">send</div>
  </div>
</template>
<script>
  import { XTextarea } from 'vux'
  import axios from 'axios'

  export default {
    data () {
      return {
        content: '',
        rows: 20
      }
    },
    components: {
      XTextarea
    },
    methods: {
      send () {
        if (!this.content) {
          this.$vux.toast.show({
            text: '请输入内容',
            type: 'warn'
          })
          return
        }
        axios.post('http://www.searworld.com/php/message.php', {
//        axios.post('php/message.php', {
          messages: this.content
        }).then((response) => {
          if (response.data === 'ok') {
            this.$vux.toast.show({
              text: '提交成功',
              type: 'success'
            })
            this.content = ''
          }
        }).catch(e => e)
      }
    },
    mounted () {
    }
  }
</script>
<style lang="stylus">
  .message_wrap {
    & .message_title {
      width 100%;
      line-height 50px;
      text-align center
      font-size 16px
      color #ffcd32
    }
    & .weui-textarea {
      width 100%;
      height 100%
      overflow scroll;
      background-color rgba(0, 0, 0, .2);
      color white
    }
    & .weui-cell:before {
      border-top none
    }
    & .message_send {
      width 80px;
      height 40px;
      line-height 40px;
      background-color rgba(0, 0, 0, .2);
      margin-left 15px;
      color #ffcd32;
      text-align center
      border-radius 10px
    }
  }
</style>
