<template>
  <div class="products">
    <qrcode-stream @decode="onDecode"></qrcode-stream>
    <qrcode-drop-zone @decode="onDecode"></qrcode-drop-zone>
    <qrcode-capture @decode="onDecode"></qrcode-capture>
    <product
      v-for="(product, i) in products"
      :key="i"
      class="product"
      :product="product"
    ></product>
  </div>
</template>

<script>
import Product from '../components/Product'
import { QrcodeStream, QrcodeDropZone, QrcodeCapture } from 'vue-qrcode-reader'
import { mapActions, mapState } from 'vuex'

export default {
  methods: {
    onDecode: function(result) {
      const matchingProduit = this.products.find(
        product => product.bar_code === parseInt(result)
      )
      this.$router.push({
        path: matchingProduit ? `product/${matchingProduit._id}` : '404'
      })
    },
    ...mapActions(['fetchProducts'])
  },
  mounted() {
    this.fetchProducts()
  },
  components: {
    QrcodeStream,
    QrcodeDropZone,
    QrcodeCapture,
    Product
  },
  computed: mapState({
    products: state => state.products
  })
}
</script>

<style></style>
