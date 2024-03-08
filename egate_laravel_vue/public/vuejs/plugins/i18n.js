import en from './i18n/en.json'
import vi from './i18n/vi.json'
import Vue from 'vue'
import VueI18n from 'vue-i18n' 

Vue.use(VueI18n)
export default new VueI18n({
    locale:localStorage.getItem('lang') || 'vi',
    messages:{
        vi:vi,
        en:en
    }
})