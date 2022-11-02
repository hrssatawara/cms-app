import AllPage from "./components/AllPage.vue";
import CreatePage from "./components/CreatePage.vue";
import EditPage from "./components/EditPage.vue";
import ShowPage from "./components/ShowPage.vue";

export const routes = [
    {
        name: 'home',
        path: '/',
        component: AllPage
    },
    {
        name: 'create',
        path: '/create',
        component: CreatePage
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditPage
    },
    {
        name: 'show',
        path: '/:id',
        component: ShowPage
    }
];
