export default function auth({ next, router }) {
    const auth = localStorage.getItem('auth');
    if (!auth) {
        return window.location.href = "/login";
    }
    return next();
}