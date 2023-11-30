import load_api from '../../../api.json'
import axios from 'axios';

export default async function auth({ next, router }) {
    let res = await axios.get(load_api.setting.setting + "?fields=app_maintenance_mode");
    let maintenance = res.data.app_maintenance_mode;
    // Nếu api trả về app_maintenance_mode == true thì chuyển trang bảo trì
    // if (maintenance) {
    //     window.location.href = '/maintenance';
    // }
    return next();
}
