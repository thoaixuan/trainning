import { ValidationObserver, ValidationProvider, extend } from 'vee-validate';
import { required } from 'vee-validate/dist/rules';
import Vue from 'vue'
// Add a rule.
extend('secret', {
    validate: value => value === 'example',
    message: 'This is not the magic word'
  });
  
extend("text", {
    validate: (value) => {
        var strongRegex = new RegExp("^[^~!@#$%^&-+<>{}/]+$");
        return strongRegex.test(value);
    },
    message: "Hãy nhập đúng định dạng tên",
});
extend("content", {
    validate: (value) => {
        var strongRegex = new RegExp("^[^<>{}/]+$");
        return strongRegex.test(value);
    },
    message: "Hãy nhập đúng định dạng mô tả",
});
extend("required", {
    validate(value) {
        return {
            required: true,
            valid: ["", null, undefined].indexOf(value) === -1,
        };
    },
    computesRequired: true,
    message: "Không được để trống giá trị",
});
extend("minmax", {
    validate(value, { min, max }) {
        return value.length >= min && value.length <= max;
    },
    params: ["min", "max"],
    message: "Ký tự tối thiểu {min} đến {max} ký tự",
});
extend("phone", {
    validate: (value) => {
        var strongRegex = new RegExp(
            "^((09|03|07|08|05)+([0-9]{8}))$"
        );
        return strongRegex.test(value);
    },
    message: "Hãy nhập đúng số điện thoại",
});
extend("password", {
    validate: (value) => {
        var strongRegex = new RegExp(
            "^(?=.*[a-zA-Z].*[0-9])|(?=.*[0-9].*[a-zA-Z]).{8,}$"
        );
        return strongRegex.test(value);
    },
    message: "Mật khẩu phải trên 8 kí tự gồm chữ và số",
});
extend("number", {
    validate: (value) => {
        var strongRegex = new RegExp("^[^~!@#$%^&-+<>{}/A-Za-z]+$");
        return strongRegex.test(value);
    },
    message: "Hãy nhập đúng định dạng số",
});
extend("email", {
    validate: (value) => {
        var strongRegex = new RegExp(
            "^[a-z][a-z0-9_.]{1,32}@[a-z0-9]{2,}(.[a-z0-9]{2,4}){1,2}$"
        );
        return strongRegex.test(value);
    },
    message: "Hãy nhập đúng định dạng gmail",
});
extend('confirmPassword', {
    params: ['target'],
    validate(value, { target }) {
        return value === target;
    },
    message: 'Mật khẩu không khớp'
});
Vue.component('ValidationProvider', ValidationProvider);
Vue.component('ValidationObserver', ValidationObserver);
export default ({
  
})