<template>
  <div class="article_wrap">
    <x-input type="text" placeholder="请输入标题" v-model="articleHead"></x-input>
    <vue-html5-editor :content="contents" @change="updateData"></vue-html5-editor>
    <div class="article_bottom">
      <div class="bottom_item" @click="backClick">返回</div>
      <div class="bottom_item" @click="publishClick">发布</div>
    </div>
  </div>
</template>
<script>
  import axios from 'axios'
  import { XInput } from 'vux'

  export default {
    name: 'article-edit',
    data () {
      return {
        contents: '',
        articleHead: ''
      }
    },
    prop: {
      allShow: {
        type: Boolean
      }
    },
    components: {
      XInput
    },
    computed: {},
    methods: {
      updateData (val) {
        this.contents = val
      },
      backClick () {
        this.$emit('backClick')
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
        axios.post('http://www.searworld.com/php/articleAdd.php', {
//        axios.post('php/articleAdd.php', {
          content: this.contents,
          articleHead: this.articleHead,
          isSave: '0'
        }).then((response) => {
          if (response.data === 'ok') {
            this.$vux.toast.show({
              text: '发表成功',
              type: 'success'
            })
            this.articleHead = ''
            this.contents = ''
          }
          if (response.data === 'error') {
            this.$vux.toast.show({
              text: '发表失败',
              type: 'warn'
            })
          }
        }).catch(e => e)
      }
    }
  }
</script>
<style lang="stylus">
  .article_wrap {
    background-color: #333
    & .weui-cell {
      border-bottom 1px dashed white
      border-top 1px solid #000000
      color: white;
      padding 20px 15px
      background-color rgba(0, 0, 0, 0)
    }
    & .weui-cell:before {
      border-top none
    }
    & .vue-html5-editor {
      width 100%;
      position absolute
      left 0px;
      top: 60px
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
    & .article_bottom {
      position absolute;
      left 0px
      right 0px;
      bottom 0px;
      & .bottom_item {
        width 50%;
        line-height 50px;
        text-align center
        float left
      }
      & .bottom_item:active {
        background-color rgba(255, 255, 255, .3)
        cursor pointer
      }
    }
  }
</style>
