export default function cart({ next, router }) {
    const cart = localStorage.getItem('auth');
    if (!cart) {
        return router.push({ name: 'fastSignup' })
    }
    return next();
}