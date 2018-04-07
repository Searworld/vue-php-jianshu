<template>
  <div class="article_wrap">
    <div class="article_top">
      <span @click="backClick">关闭</span>
      <span @click="publishClick">发布</span>
    </div>

    <x-input type="text" placeholder="请输入标题" v-model="articleHead"></x-input>
    <vue-html5-editor :content="contents" @change="updateData"></vue-html5-editor>
  </div>
</template>
<script>
  import axios from 'axios'
  import { XInput } from 'vux'

  export default {
    data () {
      return {
        contents: '',
        articleHead: ''
      }
    },
    components: {
      XInput
    },
    computed: {
      articleId () {
        return this.$route.params.articleId
      }
    },
    methods: {
      init () {
        this.$vux.loading.show()
        axios.post('http://www.searworld.com/php/articleDetail.php', {
//        axios.post('php/articleDetail.php', {
          articleId: this.articleId
        }).then((response) => {
          this.contents = response.data.content
          this.articleHead = response.data.articleHead
          this.isSave = response.data.isSave
        }).catch(e => e)
        this.$vux.loading.hide()
      },
      updateData (val) {
        this.contents = val
      },
      backClick () {
        this.$router.back()
      },
//      发布
      publishClick () {
        if (!this.articleHead) {
          this.$vux.toast.show({
            text: '请输入标题',
            type: 'warn'
          })
          return
        }
        if (!this.contents) {
          this.$vux.toast.show({
            text: '请输入内容',
            type: 'warn'
          })
          return
        }
        axios.post('http://www.searworld.com/php/articleUpdate.php', {
//        axios.post('php/articleUpdate.php', {
          content: this.contents,
          articleHead: this.articleHead,
          articleId: this.articleId,
          isSave: this.isSave
        }).then((response) => {
          if (response.data === 'ok') {
            this.$vux.toast.show({
              text: '更新成功',
              type: 'success'
            })
            this.$router.push({
              path: '/recommend'
            })
            if (response.data === 'error') {
              this.$vux.toast.show({
                text: '更新失败',
                type: 'warn'
              })
            }
            this.$router.push({path: '/recommend'})
          }
        }).catch(e => e)
      }
    },
    mounted () {
      this.init()
    }
  }
</script>
<style lang="stylus">
  .article_wrap {
    & .weui-cell {
      border-bottom 1px dashed white
      border-top 1px solid #000000
      color: white;
      padding 20px 15px
    }
    & .weui-cell:before {
      border-top none
    }
    & .article_top {
      width 100%;
      height 40px;
      padding 0px 20px
      box-sizing: border-box;
      line-height 40px
      & span:nth-child(1) {
        color white;
        font-size 16px;
        cursor pointer
      }
      & span:nth-child(2) {
        color #ff6000;
        float right;
        font-size 16px

      }
    }
    & .vue-html5-editor {
      width 100%;
      position absolute
      left 0px;
      top: 90px
      bottom 50px;
      right 0px;
      overflow-y scroll;
      color white
      background-color #222
      border none
      & .toolbar {
        background-color rgba(0, 0, 0, 0)
        & ul {
          border none
        }
      }
    }
  }
</style>
