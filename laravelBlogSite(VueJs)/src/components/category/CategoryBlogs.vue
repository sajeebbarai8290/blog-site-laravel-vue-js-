<template>
  <div class="container">
    <div class="row mt-2">
      <div class="col-lg-4 mb-4" v-for="blog in blogs">
        <div class="card h-100 text-center">
          <img class="card-img-top" :src="'http://localhost/laravelBlogSite/public/'+blog.blog_image" alt="">
          <div class="card-body">
            <h4 class="card-title">{{blog.blog_title}}</h4>
            <p class="card-text">{{blog.blog_short_description}}</p>
          </div>
          <div class="card-footer">
            <a href="#">name@example.com</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'CategoryBlogs',
  data () {
    return {
      blogs: []
    }
  },
  methods: {
    blogByCategoryId: function () {
      this.$http.get('http://localhost/laravelBlogSite/public/api/blog-by-category-id/' + this.$route.params.id).then(function (response) {
        this.blogs = response.body
      })
    }
  },
  created () {
    this.blogByCategoryId()
  }
}
</script>

<style scoped>

</style>
