<template>
    <div class="container">
        <h2 class="text-center">Update Company</h2>
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
                        <input type="text"  class="form-control" v-model="compnay.email">
                    </div>
                    <div class="form-group">
                        <label>Logo</label>
                        <img :src="'/storage/'.company.logo_url" alt="logo" width="100px" height="150px">
                        <input type="file" class="form-control" v-on:change="company.price">
                    </div>
                    <button type="button" class="btn btn-primary" @click="updateCompany()"> Update </button>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                company: {}
            }
        },
        mounted() {
            this.editCompany(this.$route.params.companyId);
        },
        methods: {
            editCompany(companyId) {
                this.axios.get(`http://127.0.0.1:8000/api/companies/${companyId}`)
                   .then((response) => {
                       this.company = response.data;
                   });
            },
            updateCompany() {
                this.axios
                    .patch(`http://127.0.0.1:8000/api/companies/${this.$route.params.companyId}`, this.company)
                    .then((response) => {
                        this.$router.push({ name: 'CompanyIndex' });
                    });
            }
        }
    }
</script>