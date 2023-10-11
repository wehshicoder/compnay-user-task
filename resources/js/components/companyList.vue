<!-- resources/js/components/CompanyList.vue -->
<template>
    <div>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <!-- Add other table headers -->
          </tr>
        </thead>
        <tbody>
          <tr v-for="company in companies" :key="company.id">
            <td>{{ company.id }}</td>
            <td>{{ company.name }}</td>
            <!-- Add other table data -->
          </tr>
        </tbody>
      </table>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        companies: [],
      };
    },
    mounted() {
      // Make an API request to fetch the companies data from Laravel API
      axios.get('/api/companies').then((response) => {
        this.companies = response.data;
      });
    },
  };
  </script>
 
  
  
  
  