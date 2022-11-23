
import Vue from 'vue';
import VueRouter from 'vue-router';

import Home from "./pages/Home";
import PostsIndex from "./pages/PostsIndex";
import About from "./pages/About";
import Contacts from "./pages/Contacts";
import NotFound from "./pages/NotFound";

Vue.use(VueRouter);

const router = new VueRouter({
    routes: [
        { path: "/", name: "home", component: Home },
        { path: "/posts", name: "posts-index", component: PostsIndex, props: route=>({ page: route.query.page }) },
        { path: "/about", name: "about", component: About },
        { path: "/contacts", name: "contacts", component: Contacts },
        { path: "/*", name: "NotFound", component: NotFound}
    ]
});

export default router;
