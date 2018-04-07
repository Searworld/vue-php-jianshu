<template>
  <div class="article_detail_wrap">
    <div class="article_detail_head">
      {{articles.articleHead}}
    </div>
    <div class="article_time">
      <span>{{articles.time}}</span>
    </div>
    <div class="article_detail_content">
      <div v-html="articles.content"></div>
    </div>
    <div class="article_detail_bottom">
      <img v-if="articles.isSave === 0" @click="saveClick(1)" src="../../../assets/love_yuan.png"/>
      <img v-if="articles.isSave !== 0" @click="saveClick(0)" src="../../../assets/love.png"/>
      <img @click="editClick" src="../../../assets/edit.png"/>
      <img @click="shareClick" src="../../../assets/share.png"/>
      <img @click="deleteClick" src="../../../assets/delete.png"/>
    </div>
    <!--分享弹出框-->
    <div class="share_alert" v-if="shareShow" @click="shareShowClick">
      <div class="share_class">分享</div>
      <div class="sanjiao"></div>
    </div>
  </div>
</template>
<script>
  import axios from 'axios'

  export default {
    name: 'article-detail',
    data () {
      return {
        articles: '',
        shareShow: false,
        contents: '',
        articleHead: ''
      }
    },
    components: {},
    computed: {
      articleId () {
        return this.$route.params.articleId
      }
    },
    methods: {
      init () {
        this.$vux.loading.show()
        console.log('this.$vux', this.$vux)
        axios.post('http://www.searworld.com/php/articleDetail.php', {
//        axios.post('php/articleDetail.php', {
          articleId: this.articleId
        }).then((response) => {
          this.articles = response.data
          console.log('response.data', response.data)
        }).catch(e => e)
        this.$vux.loading.hide()
//        setTimeout(() => {
//          this.$vux.loading.hide()
//        }, 1000)
      },
//      收藏
      saveClick (status) {
        this.$vux.loading.show()
        axios.post('http://www.searworld.com/php/articleSave.php', {
//        axios.post('php/articleSave.php', {
          articleId: this.articleId,
          isSave: status
        }).then((response) => {
          this.articles.isSave = response.data || 0
        }).catch(e => e)
        this.$vux.toast.show({
          text: status === 0 ? '取消收藏' : '收藏成功'
        })
        this.$vux.loading.hide()
      },
      editClick () {
        this.$router.push({path: `/article-edit/${this.articleId}`})
      },
      shareClick () {
        this.shareShow = true
      },
      shareShowClick () {
        this.shareShow = false
      },
      deleteClick () {
        this.$vux.confirm.show({
          content: '确认删除？',
          onConfirm: () => {
            axios.post('http://www.searworld.com/php/articleDelete.php', {
//            axios.post('php/articleDelete.php', {
              articleId: this.articleId
            }).then((response) => {
              if (response.data === true) {
                this.$vux.toast.show({
                  text: '删除成功'
                })
                this.$router.push({path: '/recommend'})
              } else {
                this.$vux.toast.show({
                  text: '删除失败',
                  type: 'warn'
                })
              }
            }).catch(e => e)
          }
        })
      }
    },
    mounted () {
      this.init()
    }
  }
</script>
<style lang="stylus">
  .article_detail_wrap {
    width: 100%;
    position: absolute;
    left: 0px;
    top: 0px;
    bottom: 0px;
    background-color: #333333;
    overflow-y: scroll;
    padding 15px;
    box-sizing border-box;
    & .article_detail_head {
      width: 100%;
      color: white;
      font-size: 20px;
      margin-bottom 20px;
      font-weight bold
    }
    & .article_time {
      color #cccccc;
      margin-bottom 15px
    }
    & .article_detail_content {
      color white
      font-size 14px
      min-height 200px
    }
    & .article_detail_bottom {
      width 100%;
      height auto
      & img {
        width: 20px;
        height: 20px;
        margin-right 30px;
        cursor pointer
      }
    }
    & .share_alert {
      position absolute;
      width 100%;
      left 0px;
      top: 0px;
      bottom 0px;
      right 0px;
      background-color rgba(0, 0, 0, .5)
      & .share_class {
        width 100px;
        height 35px
        background-color white
        border-radius 3px;
        text-align center;
        line-height 35px;
        font-size 16px;
        position absolute;
        right 10px;
        top: 10px
      }
      & .sanjiao {
        position absolute;
        right 20px;
        top: 0px
        border-width: 10px;
        border-color: white;
        border-top-width: 0;
        border-style: dashed;
        border-bottom-style: solid;
        border-left-color: transparent;
        border-right-color: transparent;
      }
    }
  }
</style>
