<template>
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <router-link class="navbar-brand" to="/">Start Bootstrap</router-link>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item" v-for="category in categories" :key="category.id">
            <router-link class="nav-link" :to="'/category-blog/'+category.id">{{category.category_name}}</router-link>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
export default {
  data () {
    return {
      categories: []
    }
  },
  methods: {
    allCategories: function () {
      this.$http.get('http://localhost/laravelBlogSite/public/api/all-published-categories').then(function (response) {
        this.categories = response.body
      })
    }
  },
  created () {
    this.allCategories()
  }
}
</script>

<style scoped></style>
