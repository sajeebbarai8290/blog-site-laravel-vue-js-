<template>
  <div id="app">
    <test></test>
    <router-view></router-view>
    <!-- /.container -->
    <my-footer></my-footer>
    <!-- Footer -->

  </div>
</template>

<script>
import Header from './components/includes/Header'
import Footer from './components/includes/Footer'
export default {
  name: 'App',
  components: {
    'test': Header,
    'my-footer': Footer
  }
}
</script>

<style>

</style>
