<template>
    <nav-bar></nav-bar>
            <div class="p-5">
                <form
                    id="form"
                    @submit="checkForm"
                    @submit.prevent="register"
                    method="post"
                    class="form-group"
                  >

                    <p>
                        <label for="name">Produto</label>
                        <div>
                            <select name="cars_id" @change="onChangeProduct($event)" class="form-select form-control">
                                <option disabled selected>---- Selecione um produto ----</option>
                                <option :value="product.id" v-for="(product, i) in products" :key="i">{{ product.name }}</option>

                            </select>

                        </div>
                    </p>
                    <p>
                        <label for="name">Usuario</label>
                        <div>
                            <select name="cars_id" @change="onChangeUser($event)" class="form-select form-control">
                                <option disabled selected>---- Selecione um usuario ----</option>
                                <option :value="client.id" v-for="(client, i) in clients" :key="i">{{ client.name }}</option>

                            </select>

                        </div>
                    </p>
                    <p>
                      <label for="name">Quantiadde</label>
                      <input
                        id="amount"
                        v-model="amount"
                        type="number"
                        name="amount"
                        class="form-control"
                      >
                    </p>

                    <input type="submit" class="btn btn-primary" @click="save">
                </form>
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
            products:[],
            clients:[],
            id_product:"",
            id_user:"",
            amount:""

        }
    },
    mounted() {
        axios.get("/api/products").then((response) => {
            this.products=response.data.products
        });

        axios.get("/api/clients").then((response) => {
            this.clients=response.data.clients
        });
    },
 
    methods: {

        save(){
            let formData = new FormData();

            formData.append("product_id", this.id_product);
            formData.append("user_id", this.id_user);
            formData.append("amount", this.amount);
            formData.append("status", 1);


            axios.post("/api/requests", formData)
            .then((response) => {
                if(response.status===200)
                {
                    this.$router.push('/requests');
                }
            });
        },

        onChangeProduct(event){
            this.id_product=event.target.value;
        },

        onChangeUser(event){
            this.id_user=event.target.value;
        }
    
    }
}
</script>