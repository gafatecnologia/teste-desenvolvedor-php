<template>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!--<a class="navbar-brand" href="#">Navbar</a>-->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

        <div id="navbarSupportedContent" v-on:click="redirect('products')" class="mx-auto">Produtos</div>
        
        <div id="navbarSupportedContent" v-on:click="redirect('clients')" class="mx-auto">Clientes</div>
        <div id="navbarSupportedContent" v-on:click="redirect('requests')" class="mx-auto">Pedidos</div>


</nav> 
</template>

<script>

    
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            redirect(redirect){
                this.$router.push('/'+redirect);
            }
        }
    }
</script>

<style lang="scss">
@import './scss/NavBar.scss';
</style>