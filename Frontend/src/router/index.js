import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: () => import('../views/HomeView.vue'),
      meta: {title: 'Home'}
    },
    {
      path: '/about',
      name: 'about',
      component: () => import('../views/AboutView.vue'),
      meta: {title: 'About'}
    },
  ],
})


router.beforeEach((to, from, next) => {
  // document.title=  to.meta.title ? `Iskola - ${to.meta.title}` : 'Iskola';
  // document.title =`Iskola - ${to.meta.title(to)}`;
  document.title =`Horgászvizsga - ` + to.meta.title;
  next();
})

export default router
