export default function auth({ next, router }) {
    const auth = localStorage.getItem('auth');
    if (!auth) {
        return router.push({ name: 'login' })
    }
    return next();
}