import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

export default new Router({
  routes: [
    {path: '/', redirect: '/login'},
    {path: '/login', component: () => import('../view/login/login.vue')},
    {
      path: '/',
      component: () => import('../view/home/index.vue'),
      children: [
        {
          path: 'recommend',
          component: () => import('../view/home/children/recommend.vue')
        },
        {path: 'add-article', component: () => import('../view/home/children/article.vue')},
        {
          path: 'loves',
          component: () => import('../view/home/children/loves.vue')
        },
        {path: '/photo', component: () => import('../view/home/components/wx.vue')},
        {
          path: '/mySave',
          component: () => import('../view/home/children/mySave.vue')
        },
        {
          path: '/message',
          component: () => import('../view/home/components/message.vue')
        },
        {path: '/article-detail/:articleId', component: () => import('../view/home/components/articleDetail.vue')},
        {path: '/article-edit/:articleId', component: () => import('../view/home/children/edit.vue')}

        // {path: '/wishItem', component: () => import('../view/home/components/wishItemOne.vue')}
      ]
    }
  ]
})
