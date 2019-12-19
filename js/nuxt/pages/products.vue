<template>
  <div>test</div>
</template>

<script>
import { mapActions, mapState } from 'vuex'
export default {
  methods: {
    ...mapActions(['fetchProducts'])
  },
  mounted() {
    this.fetchProducts()
  },
  computed: mapState({
    products: state => state.api
  })
}
</script>

<style></style>
