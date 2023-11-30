<template>
  <div>
    <div class="user-chats">
      <div class="chats">
        <div class="chat chat-left">
            <div class="chat-avatar">
                <span class="avatar box-shadow-1 cursor-pointer">
                    <img src="/themes/app-assets/images/avatarchatgpt.png" alt="avatar" height="38" width="38" />
                </span>
            </div>
            <div class="chat-body">
                <div class="chat-content">
                    <p>Chào mừng bạn đến với e-Gate! Chatbot của chúng tôi đã tích hợp với Chat GPT phiên bản mới nhất, mang đến cho bạn trải nghiệm tuyệt vời. e-Gate Chatbot giúp tiết kiệm thời gian và đơn giản hóa quá trình tương tác với dịch vụ của chúng tôi và cùng nhiều tiện ích tuyệt vời khác. Hãy trải nghiệm và khám phá ngay hôm nay!</p>
                </div>
            </div>
      </div>
      </div>
      <div class="chats" v-for="message in messages" :key="message.id">
          <div class="chat" v-if="message.sender === 'user'">
              <div class="chat-avatar">
                  <span class="avatar box-shadow-1 cursor-pointer">
                      <img src="/themes/assets/images/logo_admin/user.png" alt="avatar" height="38" width="38" />
                  </span>
              </div>
              <div class="chat-body">
                  <div class="chat-content">
                      <p>{{ message.text }}</p>
                  </div>
              </div>
          </div>
          <div class="chat chat-left" v-else>
              <div class="chat-avatar">
                  <span class="avatar box-shadow-1 cursor-pointer">
                      <img src="/themes/app-assets/images/avatarchatgpt.png" alt="avatar" height="38" width="38" />
                  </span>
              </div>
              <div class="chat-body">
                  <div class="chat-content">
                     <pre v-html="message.text"></pre>
                  </div>
              </div>
          </div>
      </div>
    </div>

    <!-- Submit Chat form -->
    <div class="position-relative" v-if="isLogin">
      <div class="input-group">
        <span v-if="this.inputLoading" class="input-loading-fix spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
        <!-- <input v-model="userMessage" @keyup.enter="sendMessage" type="text" class="form-control message" :placeholder="this.inputLoading?``:`Type your message`" :disabled="this.inputLoading"/> -->
        <input v-model="userMessage" @keyup.enter="sendMessage" type="text" class="form-control message" :placeholder="this.inputLoading?``:`Hệ thống đang bảo trì để nâng cấp`" :disabled="true"/>
        <button @click="sendMessage" type="button" class="btn btn-primary waves-effect d-lg-none d-block" :disabled="this.inputLoading">
        Gửi
      </button>
      </div>
    </div>
    <div class="card" v-else>
      <div class="card-body h5">
        Bạn cần <a href="/login?link=e-gate-gpt-chat">đăng nhập</a> để sử dụng tính năng này! Nếu chưa có tài khoản vui lòng <a href="/signup?link=e-gate-gpt-chat">Đăng ký</a> tại đây.
        </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import api from '../../../../../../api.json';
export default {
  data() {
    return {
      isLogin: false,
      inputLoading: false,
      countSend: 0,
      messages: [],
      userMessage: "",
      postMessage: [],
      apiKey: "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",
      apiUrl: "https://api.openai.com/v1/chat/completions",
    };
  },
  methods: {
    async checkAuth() {
      if(!localStorage.getItem('auth')||localStorage.getItem('auth')=="") {
        this.isLogin = false;
        return false;
      }
      let data = await this.$store.dispatch("fetchData",api.auth.info);
      if(data.status==200){
        this.isLogin = true;
        return true;
      }else {
        this.isLogin = false;
        return false;
      }
    },
    async sendMessage() {
      this.countSend++;
      this.inputLoading = true;
      if (this.userMessage === "") {
        this.inputLoading = false;
        return Vue.$toast.open({
        message: 'Bạn chưa nhập nội dung tin nhắn',
        type: 'error',
        position: 'top-right'
        });
      }
      if(this.userMessage.split(' ').length < 4){
        this.inputLoading = false;
        return Vue.$toast.open({
        message: 'Nhập ít nhất 4 từ trở lên',
        type: 'error',
        position: 'top-right'
        });
      }
      this.messages.push({
        id: this.messages.length,
        text: this.userMessage,
        sender: "user",
      });
      if(this.countSend==1){
        this.postMessage = [{
          role: "system",
          content: this.userMessage
        }];
      }
      else{
        this.postMessage.push({
          role: "user",
          content: this.userMessage
        });
      }
      try {
        this.userMessage = "";
        const response = await axios.post(
          this.apiUrl,
          {
            model: "gpt-3.5-turbo",
            messages: this.postMessage
          },
          {
            headers: {
              "Content-Type": "application/json",
              Authorization: `Bearer ${this.apiKey}`,
            },
          }
        );
        // const codeHTMLRegex = /```html([\s\S]*?)```/g;
        // const codeRegex = /```(.*?)```/gs;
        var resMess = response.data.choices[0].message.content;
        // resMess = resMess.replace(codeRegex, (match, p1) => `${this.decodeText(`<div class="bg-dark p-1"><code>`)+p1+this.decodeText(`</code></div>`)}`);
        resMess = resMess.replace(/&/g, '&amp;')
        .replace(/"/g, '&quot;')
        .replace(/'/g, '&#39;')
        .replace(/</g, '&lt;')
        .replace(/>/g, '&gt;');
        // tro ly
        this.postMessage.push({
          role: "assistant",
          content: response.data.choices[0].message.content
        });

        this.messages.push({
          id: this.messages.length,
          text: resMess,
          sender: "bot",
        });
        this.inputLoading = false;
      } catch (error) {
        console.error(error);
      }
    },
    encodeText(text) {
    const originalText = text;

    const encodedText = originalText.replace(/[<>]/g, function(match) {
      const replacements = {
        '<': '&lt;',
        '>': '&gt;'
      };
      return replacements[match];
    });
    },
    decodeText(input){
      var doc = new DOMParser().parseFromString(input, "text/html");
      return doc.documentElement.textContent;
    },  
    formatText(text) {
      // replace backticks with <code> tags
      const formattedText = text.replace(/`([^`]+)`/g, `<code>${this.encodeText(text)}</code>`);
      return formattedText;
    }
  },
  mounted() {
    var vm = this;
    vm.$nextTick(async () => {
        await vm.checkAuth();
    });
  }
};
</script>
<style>
pre code {
  color: #fff;
}
</style>