<template>
  <div class="login_wrap">
    <div class="login_shaodow">
      <form class="input_wrap" @submit.prevent="submit">
        <div class="input_wrap_one">
          <div class="input_img">
            <img src="../../assets/loginName.png"/>
          </div>
          <input type="text" name="user_name" v-model="userValue"/>
        </div>
        <div class="input_wrap_one">
          <div class="input_img">
            <img src="../../assets/password.png"/>
          </div>
          <input type="password" name="pass_word" v-model="userPassworld"/>
        </div>
        <div class="submitWrap">
          <input type="submit" name="submit" value="Sign" class="input_wrap_submit"/>
        </div>
        <!--<div class="alertText">您好，因未解析到域名且只适配移动端，为了体验更好的效果，请不要在微信打开，请复制链接到手机浏览器查看，谢谢！！</div>-->
      </form>
    </div>
  </div>

</template>

<script>
  import axios from 'axios'

  export default {
    name: 'HelloWorld',
    data () {
      return {
        userValue: 'sear',
        userPassworld: '123456'
      }
    },
    components: {},
    methods: {
      submit () {
        if (!this.userValue) {
          return this.$vux.toast.show({
            type: 'warn',
            text: '请输入账号'
          })
        }
        if (!this.userPassworld) {
          return this.$vux.toast.show({
            type: 'warn',
            text: '请输入密码'
          })
        }
        axios({
          method: 'post',
          url: 'php/login.php',
          data: {
            user_name: this.userValue,
            pass_word: this.userPassworld
          }
        }).then((response) => {
          console.log('response.data === true', response.data === true)
          if (response.data === true) {
            this.$router.push('/recommend')
          }
        }).catch(function (error) {
          console.log(error)
        })
//        const formData = new FormData()
//        formData.append('user_name', this.userValue)
//        formData.append('pass_word', this.userPassworld)
//        fetch('php/login.php', {
//          method: 'POST',
//          body: formData
//        }).then(r => r.json()).then(r => {
//          console.log(r)
//          if (r) {
//            this.$router.push('/recommend')
//          } else {
//            alert('登录失败')
//          }
//        })
      }
    }
  }
</script>

<style lang="stylus">
  .login_wrap {
    position: absolute
    left: 0px
    top: 0px
    bottom: 0px
    right: 0px
    width: 100%
    height: 100%
    background-image: url("../../assets/login2.jpg")
    background-size: cover
    background-position: center
    background-repeat: no-repeat
    & .login_shaodow {
      width: 100%
      height: 100%
      position: absolute
      left: 0px
      top: 0px
      bottom: 0px
      background-color: rgba(0, 0, 0, .4)
      box-sizing: border-box
      & .input_wrap {
        position: absolute
        top: 40%
        width: 100%
        margin: 0px auto
        & .input_wrap_one {
          width: 80%
          height: 40px
          background-color: rgba(0, 0, 0, .5)
          margin: 0px auto
          border: none
          margin-top: 15px
          border-radius: 5px
          color: #ffffff
          & .input_img {
            width: 40px
            height: 40px
            padding: 10px
            box-sizing: border-box
            float: left
            & img {
              width: 20px;
              height: 20px;
            }
          }
          & input {
            width: calc(90% - 40px)
            float: left
            background-color: rgba(0, 0, 0, .5)
            outline: none
            color: white
            height: 40px
            border: 0px
          }
        }
        & .submitWrap {
          width 100%;
          height 45px
          margin-top: 20px
          & .input_wrap_submit {
            background-color: rgba(44, 44, 86, 0.8)
            width: 70%
            height: 45px
            border-radius: 40px
            font-size: 14px
            color: #ffffff
            outline: none;
            margin 0px auto;
            display block;
            border none;
          }
        }
        &  .alertText {
          color: white
          width: 80%;
          height auto;
          margin 20px auto
        }
      }
    }
  }
</style>
