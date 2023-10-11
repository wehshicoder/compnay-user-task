<template>
    <div class="container">
        <h2 class="text-center">Create Company</h2>
        <div class="row">
            <div class="col-md-12">
                <router-link :to="{ name: 'CompanyIndex' }" class="btn btn-primary btn-sm float-right mb-2">Back</router-link>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="company.name">
                    </div>
                    <div class="form-group">
                       <label>Email</label>
                        <input type="email"  class="form-control" v-model="company.email">
                    </div> 
                    <div class="form-group">
                        <label>Logo</label>
                        <input type="file" class="form-control" v-on:change="company.logo_url">
                    </div>
                    <div class="form-group">
                       <label>Website</label>
                        <input type="text"  class="form-control" v-model="company.website">
                    </div>
                    <button type="button" class="btn btn-primary" @click="createCompany()">Create</button>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                product: {}
            }
        },
        methods: {
            createCompany() {
                this.axios.post('http://127.0.0.1:8000/api/compnaies', this.company)
                    .then(response => {
                        this.$router.push({ name: 'CompanyIndex' })
                    })
                    .catch(error=>{
                      console.log(error)
                    })
            }
        }
    }
</script>