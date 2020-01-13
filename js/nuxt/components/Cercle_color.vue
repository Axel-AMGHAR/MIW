<template>
  <div :class="`circle circle-${color}`"></div>
</template>

<script>
export default {
  name: 'CircleColor',
  props: {
    grade: {
      type: Number,
      default: 0,
      required: true
    }
  },
  data: function() {
    const color = this.grade < 5 ? 'red' : this.grade < 8 ? 'orange' : 'green'
    return {
      color
    }
  }
}
</script>

<style lang="scss" scoped>
    .circle{
        width: 15px;
        height: 15px;
        border-radius: 50%;
        &-red{
            background-color: red;
        }
        &-orange{
            background-color: orange;
        }
        &-green{
            background-color: green;
        }
        
    }
</style>
