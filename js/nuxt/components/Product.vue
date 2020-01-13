<template>
  <div class="product_info">
    <div class="product_name">{{ product.name }}</div>
    <div class="product_grade">{{ product.grade }}</div>
    <circle-color :grade="product.grade"></circle-color>
  </div>
</template>

<script>
import CircleColor from '../components/Cercle_color'
export default {
  name: 'Product',
  components: {CircleColor},
  props: {
    product: {
      type: Object,
      default: '',
      required: true
    }
  }
}
</script>

<style></style>
