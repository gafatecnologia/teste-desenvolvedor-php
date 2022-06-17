<template>
    <!--<div class="container">
        <div class="text-center" style="margin: 20px 0px 20px 0px;">
            <a href="https://shouts.dev/" target="_blank"><img src="https://i.imgur.com/Nt3kJXa.png"></a><br>
            <span class="text-secondary">Laravel SPA with Vue 3, Auth (Sanctum), CURD Example</span>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                
                <div class="navbar-nav" v-if="isLoggedIn">
                    <router-link to="/dashboard" class="nav-item nav-link">Dashboard</router-link>
                    <router-link to="/books" class="nav-item nav-link">Books</router-link>
                    <a class="nav-item nav-link" style="cursor: pointer;" @click="logout">Logout</a>
                </div>
                
                <div class="navbar-nav" v-else>
                    <router-link to="/" class="nav-item nav-link">Home</router-link>
                    <router-link to="/login" class="nav-item nav-link">login</router-link>
                    <router-link to="/register" class="nav-item nav-link">Register
                    </router-link>
                    <router-link to="/about" class="nav-item nav-link">About</router-link>
                </div>
            </div>
        </nav>
        <br/>
        <router-view/>
    </div>-->
    <router-view/>
</template>

<script>
import NavBar from "./components/navbar/NavBar.vue"
import pagination from 'laravel-vue-pagination'

export default {
  components: {
    NavBar,
    pagination
  }
}
</script>