import { createRouter, createWebHistory } from "vue-router";
import Dashboard from "../views/Dashboard";

const routes = [
    {
        path: "/",
        name: "dashboard",
        component: Dashboard,
        meta: {
            layout: "default",
        },
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;
