<template>
  <div>
    <slider></slider>

    <!-- Page Content -->
    <div class="container">

      <h1 class="my-4">Welcome to Modern Business</h1>

      <!-- Marketing Icons Section -->
      <div class="row">
        <div class="col-lg-4 mb-4" v-for="blog in blogs" :key="blog.id">
          <div class="card h-100">
            <img :src="'http://localhost/laravelBlogSite/public/'+blog.blog_image" class="card-img-top">
            <div class="card-body">
              <h4 class="card-title">{{blog.blog_title}}</h4>
              <p class="card-text">{{blog.blog_short_description}}</p>
            </div>
            <div class="card-footer">
              <router-link :to="'/blog-details/'+blog.id" class="btn btn-primary">Learn More</router-link>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Slider from './Slider'
export default {
  components: {
    'Slider': Slider
  },
  data () {
    return {
      blogs: []
    }
  },
  methods: {
    allBlogs: function () {
      this.$http.get('http://localhost/laravelBlogSite/public/api/all-published-blog').then(function (response) {
        this.blogs = response.body
      })
    }
  },
  created () {
    this.allBlogs()
  }
}
</script>

<style></style>
