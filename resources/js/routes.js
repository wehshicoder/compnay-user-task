import CompanyIndex from './components/companies/index.vue';
import CompanyCreate from './components/companies/create.vue';
import CompanyEdit from './components/companies/edit.vue';
export const routes = [
    {
        path: '/companies',
        component: CompanyIndex,
        name: "CompanyIndex"
    },
    {
        path: '/companies/create',
        component: CompanyCreate,
        name: "CompanyCreate"
    },
    {
        path: '/companies/edit/:companyId',
        component: CompanyEdit,
        name: "CompanyEdit"
    }
];