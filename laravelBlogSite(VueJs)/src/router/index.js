import Vue from 'vue'
import Router from 'vue-router'
import Home from '@/components/home/Home'
import CategoryBlogs from '../components/category/CategoryBlogs'
import BlogDetails from '../components/blog/BlogDetails'
import Service from '@/components/service/Service'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'Home',
      component: Home
    },
    {
      path: '/category-blog/:id',
      name: 'About',
      component: CategoryBlogs
    },
    {
      path: '/service',
      name: 'Service',
      component: Service
    },
    {
      path: '/blog-details/:id',
      name: 'BlogDetails',
      component: BlogDetails
    }
  ],
  mode: 'history'
})
