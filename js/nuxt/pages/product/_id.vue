<template>
    <div>
        {{id}}
    </div>
</template>

<script>
    export default {
        mounted(){
            this.id = this.$route.params.id
        },
        
        data : function(){
            return {id : ''}
        }
    }
</script>
