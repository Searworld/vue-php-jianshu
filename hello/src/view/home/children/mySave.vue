<template>
  <div class="home">
    <search
      v-model="keyword"
      position="absolute"
      top="0"
      color="white"
      @on-change="getResult"
      ref="search"></search>
    <div class="home_content_wrap">
      <cell class="home_item_wrap" v-for="(item,index) in articles" :key="index" is-link
            @click.native="detailClick(item)">
        <span slot="title">{{item.articleHead}}</span>
      </cell>
    </div>
  </div>
</template>
<script>
  import { Scroller, LoadMore, Search, Cell, Loading } from 'vux'
  import axios from 'axios'

  export default {
    components: {
      Scroller,
      LoadMore,
      Search,
      Cell,
      Loading
    },
    data () {
      return {
        articles: [],
        keyword: ''
      }
    },
    methods: {
      init () {
        this.$vux.loading.show()
//        axios.post('php/articleSaveGet.php', {
        axios.post('http://www.searworld.com/php/articleSaveGet.php', {
          keyword: this.keyword ? this.keyword : null
        }).then((response) => {
          this.articles = response.data
        }).catch(e => e)
        this.$vux.loading.hide()
      },
      detailClick (item) {
        this.$router.push({path: `/article-detail/${item.articleId}`})
      },
      getResult () {
        this.init()
      }
    },
    mounted () {
      this.init()
    }
  }
</script>
<style lang="stylus">
  .home {
    width: 100%;
    height: 100%;
    position: absolute
    background-color: #333333;
    & .home_content_wrap {
      position: absolute;
      left 0px;
      top: 50px;
      bottom 50px;
      right 0px;
      overflow-y scroll;
      & .home_item_wrap {
        border-bottom 1px solid #222
        margin-bottom 10px;
        color white;
        height 50px;
        font-size 16px
        overflow-y scroll
      }
    }
    & .weui-search-bar__input {
      color white
    }
    & .weui-cell:before {
      border-top none
    }
    & .home_item_wrap:nth-child(1) {
      border-top none
    }
    & .weui-search-bar {
      background-color #333333
    }
    & .weui-search-bar__form {
      background-color #333333
    }
    & .weui-search-bar:after {
      border-bottom none
    }
    & .weui-search-bar__label {
      background-color #222
    }
    & .weui-search-bar__form:after {
      border none
      background-color #222
    }
  }
</style>
