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
                      <label for="name">Cliente</label>
                      <input
                        id="name"
                        v-model="name"
                        type="text"
                        name="name"
                        class="form-control"
                        disabled=""
                      >
                    </p>
                    <p>
                      <label for="name">Produto</label>
                      <input
                        id="product"
                        v-model="product"
                        type="text"
                        name="product"
                        class="form-control"
                        disabled=""
                      >
                    </p>
                    <p>
                      <label for="name">Valor Unitario</label>
                      <input
                        id="unitary_value"
                        v-model="unitary_value"
                        type="text"
                        name="unitary_value"
                        class="form-control"
                        disabled=""
                      >
                    </p>
                    <p>
                      <label for="name">Data de realização</label>
                      <input
                        id="date"
                        v-model="date"
                        type="text"
                        name="date"
                        class="form-control"
                        disabled=""
                      >
                    </p>
                    <p>
                      <label for="name">Valor Total</label>
                      <input
                        id="total"
                        v-model="total"
                        type="text"
                        name="total"
                        class="form-control"
                        disabled=""
                      >
                    </p>
                    <p>
                      <label for="name">Status</label>
                      <input
                        id="status"
                        v-model="status"
                        type="text"
                        name="status"
                        class="form-control"
                        disabled=""
                      >
                    </p>
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

            name: "",
            product:"",
            unitary_value:"",
            date:"",
            total:"",
            status:""


        }
    },
    mounted() {
        

        axios.get("/api/requests/"+this.$route.params.id).then((response) => {
            console.log(response.data.request);
            this.name=response.data.request.name
            this.product=response.data.request.product_name
            this.unitary_value=response.data.request.unitary_value
            this.date=response.data.request.formatted_date
            this.total=response.data.request.unitary_value * response.data.request.amount
            if(response.data.request.status===1){
                this.status="Em Aberto"
            }

            if(response.data.request.status===2){
                this.status="Pago"
            }

            if(response.data.request.status===3){
                this.status="Cancelado"
            }

        });
    },

}
</script>