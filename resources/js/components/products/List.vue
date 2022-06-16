<template>
    <nav-bar></nav-bar>
    <div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Codigo de Barras</th>
                    <th scope="col">Valor Unitario</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(product, i) in products"
                      :key="i">
                    <th scope="row">{{product.id}}</th>
                    <td>
                        <a v-on:click="show(product.id)">{{product.name}}</a>
                    </td>
                    <td><a v-on:click="show(product.id)">{{product.bar_code}}</a></td>
                    <td><a v-on:click="show(product.id)">{{product.unitary_value}}</a></td>
                    <td>
                        <button @click="edit(product.id)" type="button" class="btn btn-warning btn-sm">Editar</button>
                    </td>
                    <td>
                        <button @click="del(product.id)" type="button" class="btn btn-danger btn-sm">Deletar</button>
                    </td>
                </tr>
            </tbody>
        </table>
        <button @click="create" type="button" class="btn btn-primary">Novo Produto</button>
    </div>
</template>

<script>
const axios = require('axios');
import NavBar from "../navbar/NavBar.vue"

export default {
    components: {
        NavBar
        
    },
    data() {
        return {
            products:[]
        }
    },
    mounted() {
        axios.get("/api/products").then((response) => {
            this.products=response.data.products
        });
    },
 
    methods: {

        create(id){
            this.$router.push('/create-products/');
        },

        show(id){
            this.$router.push('/product/'+id);
        },

        edit(id){   
            this.$router.push('/edit-products/'+id);
        },

        del(id){

            axios.delete("/api/products/"+id).then((response) => {
                this.products=response.data.products
            });
        },
    
    }
}
</script>