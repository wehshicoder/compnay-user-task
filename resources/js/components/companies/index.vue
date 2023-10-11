<template>
    <div class="container">
        <h2 class="text-center">Companies List</h2>
        <div class="row">
            <div class="col-md-12">
                <router-link :to="{ name: 'CompanyCreate' }" class="btn btn-primary btn-sm float-right mb-2">Add Company</router-link>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Company Name</th>
                        <th>Email</th>
                        <th>Logo Url</th>
                        <th>Website</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(company, key) of companies">
                            <td>{{ compnay.id }}</td>
                            <td>{{ company.name }}</td>
                            <td>{{ compnay.email }}</td>
                            <td>{{ company.logo_url }}</td>
                            <td>{{ company.webiste }}</td>
                            <td>
                                <router-link class="btn btn-success btn-sm" :to="{ name: 'CompanyEdit', params: { companyId: company.id }}">Edit</router-link>
                                <button class="btn btn-danger btn-sm" @click="deleteCompany(compnay.id)">Delete</button>
                            </td>
                            <td>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                compnaies: {}
            }
        },
        created() {
            this.getCompanies();
        },
        methods: {
            getCompanies() {
              this.axios.get('http://127.0.0.1:8000/api/companies').then(response => {
                this.companies = response.data;
            }).catch(error=>{
                console.log(error)
            })
            },
            deleteCompany(compnayId) {
                this.axios
                    .delete(`http://127.0.0.1:8000/api/compnaies/${compnayId}`)
                    .then(response => {
                        let i = this.companies.map(data => data.id).indexOf(compnayId);
                        this.companies.splice(i, 1)
                    });
            }
        }
    }
</script>