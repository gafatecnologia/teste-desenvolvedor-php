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
                            <select v-model="selectedValueProduct" name="cars_id" @change="onChangeProduct($event)" class="form-select form-control">
                                <option disabled selected>---- Selecione um produto ----</option>
                                <option :value="product.id" v-for="(product, i) in products" :key="i">{{ product.name }}</option>

                            </select>

                        </div>
                    </p>
                    <p>
                        <label for="name">Usuario</label>
                        <div>
                            <select v-model="selectedValueUser" name="cars_id" @change="onChangeUser($event)" class="form-select form-control">
                                <option disabled>---- Selecione um usuario ----</option>
                                
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

                    <p>
                        <label for="name">Status</label>
                        <div>
                            <select v-model="status" name="status" @change="onChangeStatus($event)" class="form-select form-control">
                                <option disabled>---- Selecione um status ----</option>
                                
                                <option :value="1">Em Aberto</option>
                                <option :value="2">Pago</option>
                                <option :value="3">Cancelado</option>

                            </select>

                        </div>
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
            amount:"",
            status:1,
            selectedValueUser:"",
            selectedValueProduct:""
        }
    },
    mounted() {
        axios.get("/api/products").then((response) => {
            this.products=response.data.products
        });

        axios.get("/api/clients").then((response) => {
            this.clients=response.data.clients
        });

        axios.get("/api/requests/"+this.$route.params.id).then((response) => {
            this.selectedValueUser=response.data.request.user_id
            this.selectedValueProduct=response.data.request.product_id
            this.id_user=response.data.request.user_id
            this.id_product=response.data.request.product_id
            this.amount=response.data.request.amount
            this.status=response.data.request.status
        });

    },
 
    methods: {

        save(){
            let formData = new FormData();

            formData.append("product_id", this.id_product);
            formData.append("user_id", this.id_user);
            formData.append("amount", this.amount);
            formData.append("status", this.status);


            axios.post("/api/request-edit/"+this.$route.params.id, formData)
            .then((response) => {
                if(response.status===200)
                {
                    this.$router.push('/requests');
                }
            });
        },

        onChangeProduct(event){
            console.log(event.target.value);
            this.id_product=event.target.value;
        },

        onChangeUser(event){
            this.id_user=event.target.value;
        },

        onChangeStatus(event){
            this.status=event.target.value;
        }
    
    }
}
</script>