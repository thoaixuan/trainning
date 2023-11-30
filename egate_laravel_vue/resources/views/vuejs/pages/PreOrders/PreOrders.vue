<template>
<div>
  <div class="container">
    <!-- content -->
    <section class="container__padding">
      <div class="container__width mx-auto">
        <!-- <h1 class="text-center fw-bolder">e-Gate<br/>MÔ HÌNH GIAO NHẬN HÀNG HÓA<br/>QUA TỦ KHÓA THÔNG MINH</h1>
            <p class="text-center fs-5 text"> Nhận hàng bất cứ khi nào mà không cần gặp trực tiếp shipper<br/>e-Gate đảm bảo hàng hóa an toàn cho đến khi bạn tới lấy</p> -->
        <h1 class="text-center fw-bolder">e-Gate</h1>
        <p class="center-justified fs-5" v-html="$t('preOrder.intro')">
        </p>
        <div class="text-center" id="countdown">
                    <ul>
                      <li><span class="days"></span>days</li>
                      <li><span class="hours"></span>Hours</li>
                      <li><span class="minutes"></span>Minutes</li>
                      <li><span class="seconds"></span>Seconds</li>
                    </ul>
                  </div>
                  <h3 class="text-center">Comming Soon</h3>
        <img
          src="/assets/background/product_egate.png"
          class="img-fluid w-100 tex t-center img-content-one__height"
          alt="background 1"
        />
        <div class="text-center">
          <span
            class="btn btn__color text-white fs-5 text fw-bolder vibrate-1"
            data-bs-toggle="modal"
            data-bs-target="#exampleModal"
            >{{$t('preOrder.btnOrder')}}</span
          >
        </div>
      </div>
    </section>
  </div>
    <!-- content two -->
    <section class="container__padding bg-white">
      <div>
        <h1 class="text-center fw-bolder" v-html="$t('preOrder.title1')">
        </h1>
        <p class="text-center fs-5 text" v-html="$t('preOrder.des1')">
        </p>
        <img
          :src="$t('preOrder.imgConnect')"
          class="img-fluid width-90 text-center"
          alt="connect e-Gate"
        />
      </div>
    </section>
    <div class="container">
    <!-- content two end-->
    <!-- content three  -->
    <section class="container__padding mx-auto">
      <div>
        <h1 class="text-center fw-bolder" v-html="$t('preOrder.title2')">
        </h1>
        <div class="row">
          <div class="text-center col-lg-3 col-md-6 col-sm-1">
            <img
              src="/assets/background/image_1.png"
              class="img-fluid w-50"
              alt="image"
            />
            <h6 class="fs-5 text fw-bolder">{{$t('preOrder.title3')}}</h6>
            <p class="center-justified px-4">
              {{$t('preOrder.content3')}}
            </p>
          </div>
          <div class="text-center col-lg-3 col-md-6 col-sm-1">
            <img
              src="/assets/background/image_5.png"
              class="img-fluid w-50"
              alt="image"
            />
            <h6 class="fs-5 text fw-bolder">{{$t('preOrder.title4')}}</h6>
            <p class="center-justified px-4">
              {{$t('preOrder.content4')}}
            </p>
          </div>
          <div class="text-center col-lg-3 col-md-6 col-sm-1">
            <img
              src="/assets/background/image_6.png"
              class="img-fluid w-50"
              alt="image"
            />
            <h6 class="fs-5 text fw-bolder">{{$t('preOrder.title5')}}</h6>
            <p class="center-justified px-4">
              {{$t('preOrder.content5')}}
            </p>
          </div>
          <div class="text-center col-lg-3 col-md-6 col-sm-1">
            <img
              src="/assets/background/image_7.png"
              class="img-fluid w-50"
              alt="image"
            />
            <h6 class="fs-5 text fw-bolder">{{$t('preOrder.title6')}}</h6>
            <p class="center-justified px-4">
              {{$t('preOrder.content6')}}
            </p>
          </div>
        </div>
      </div>
    </section>
    <!-- content three end -->
    <!-- content four -->
    <section class="container__padding mx-auto">
      <div class="text-center">
        <h1 class="fw-bolder" v-html="$t('preOrder.title7')">
        </h1>
        <p class="center-justified fs-5 text">
          {{$t('preOrder.des7')}}
        </p>
        <div class="row container__width mx-auto">
          <div class="text-center col-lg-4 col-md-6 col-sm-1">
            <div class="shadow p-3 mb-5 bg-body content__width">
              <img
                src="/assets/background/icon_e-gate_1.png"
                class="img-fluid w-50 img-icon__width"
                alt="icon"
              />
              <h6 class="fs-5 text fw-bolder">{{$t('preOrder.title8')}}</h6>
              <p class="center-justified">
                {{$t('preOrder.content8')}}
              </p>
            </div>
          </div>
          <div class="text-center col-lg-4 col-md-6 col-sm-1">
            <div class="shadow p-3 mb-5 bg-body content__width">
              <img
                src="/assets/background/icon_e-gate_2.png"
                class="img-fluid w-50 img-icon__width"
                alt="icon"
              />
              <h6 class="fs-5 text fw-bolder">{{$t('preOrder.title9')}}</h6>
              <p class="center-justified">
                {{$t('preOrder.content9')}}
              </p>
            </div>
          </div>
          <div class="text-center col-lg-4 col-md-6 col-sm-1">
            <div class="shadow p-3 mb-5 bg-body content__width">
              <img
                src="/assets/background/icon_e-gate_3.png"
                class="img-fluid w-50 img-icon__width"
                alt="icon"
              />
              <h6 class="fs-5 text fw-bolder">{{$t('preOrder.title10')}}</h6>
              <p class="center-justified">
                {{$t('preOrder.content10')}}
              </p>
            </div>
          </div>
        </div>
        <span
          class="
            text-center
            btn btn__color btn__padding
            text-white
            rounded-pill
            fs-5
            text
            fw-bolder
            btn-xt__animation
          "
        >
          <router-link to="/category/e-gate" class="text-white"
            >{{$t('preOrder.viewMore')}}</router-link
          >
        </span>
      </div>
    </section>
    <!-- content four end-->
    <!-- Modal -->
    <div
      class="modal fade"
      id="exampleModal"
      tabindex="-1"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content position-relative">
          <!-- <div class="modal-header">
                    
                    </div> -->

          <div class="row no-gutters">
            <button
              type="button"
              class="btn-close position-absolute top-0 end-0"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>

            <div class="col-lg-6 col-md-6 col-sm-1 d-flex">
              <div
                class="
                  modal-body
                  img
                  d-flex
                  text-center
                  d-flex
                  align-items-center
                  modal-image__size
                "
              ></div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-1 d-flex">
              <div class="modal-body d-flex align-items-center color-1">
                <div class="text w-100 py-3">
                  <div id="countdown">
                    <ul>
                      <li><span class="days days-popup"></span>days</li>
                      <li><span class="hours hours-popup"></span>Hours</li>
                      <li><span class="minutes minutes-popup"></span>Minutes</li>
                      <li><span class="seconds seconds-popup"></span>Seconds</li>
                    </ul>
                  </div>
                  <h3 class="heading text__size text-center">
                    {{$t('preOrder.title11')}}
                  </h3>
                  <span class="subheading"
                    >{{$t('preOrder.content11')}}</span
                  >

                  <ValidationObserver ref="observer" v-slot="{ invalid }">
                    <form class="contact-form mt-4">
                      <div class="form-group mb-3">
                        <ValidationProvider
                          rules="required|text"
                          v-slot="{ errors }"
                        >
                          <input
                            type="text"
                            class="form-control"
                            placeholder="Name"
                            v-model="data.name"
                          />
                          <span class="text-validate">{{ errors[0] }}</span>
                        </ValidationProvider>
                      </div>
                      <div class="form-group mb-3">
                        <ValidationProvider
                          rules="required|phone"
                          v-slot="{ errors }"
                        >
                          <input
                            type="text"
                            class="form-control"
                            placeholder="Phone"
                            v-model="data.phone"
                          />
                          <span class="text-validate">{{ errors[0] }}</span>
                        </ValidationProvider>
                      </div>
                      <div class="form-group mb-3">
                        <ValidationProvider
                          rules="email|minmax:1,200"
                          v-slot="{ errors }"
                        >
                          <input
                            type="text"
                            class="form-control"
                            placeholder="Email"
                            v-model="data.email"
                          />
                          <span class="text-validate">{{ errors[0] }}</span>
                        </ValidationProvider>
                      </div>
                      <div class="form-group">
                        <ValidationProvider rules="text" v-slot="{ errors }">
                          <textarea
                            name=""
                            id=""
                            cols="30"
                            rows="4"
                            class="form-control"
                            placeholder="Note"
                            v-model="data.content"
                          ></textarea>
                          <span class="text-validate">{{ errors[0] }}</span>
                        </ValidationProvider>
                      </div>
                      <div class="form-group">
                        <button
                          class="
                            btn btn__color
                            btn-dk__width
                            text-white
                            rounded-pill
                            fs-5
                            text
                            fw-bolder
                            mt-4
                          "
                          :disabled="invalid"
                          @click="sendMail"
                          data-bs-dismiss="modal"
                          aria-label="Close"
                        >
                          {{$t('preOrder.btnOrder')}}
                        </button>
                      </div>
                    </form>
                  </ValidationObserver>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal end-->
    </div>
</div>
</template>


<style scoped>
html {
  scroll-behavior: smooth;
}
:root {
  --blue: #080871;
  --blue-l: #00d4ff;
  --blue-s: #a1c4fd;
  --smooth: all 0.3s ease-in;
}
.width-90 {
  width: 90%;
}
.center-justified {
    text-align: justify;
    text-align-last: center;
}
.container__padding {
  padding: 24px 0;
}

.btn {
  text-align: center;
  transition: 0.5s;
  background-size: 200% auto;
  box-shadow: 0 0 20px #eee;
  border-radius: 30px;
}

.btn__color {
  background-image: linear-gradient(
    to right,
    #080871 0%,
    #00d4ff 50%,
    #a1c4fd 100%
  );
  padding: 15px;
}
.btn:hover {
  background-position: center left;
}
.btn__padding {
  padding: 15px 80px;
}

.img-content__width {
  max-width: 100%;
  height: 120px;
}

.img-icon__width {
  max-width: 100%;
  height: 150px;
}

.content__width {
  border-radius: 50px;
  min-height: 370px;
}

.container__width {
  width: 80%;
}

.img-content-one__height {
  object-fit: contain;
  height: 350px;
}

/* modal */
.modal-image__size {
  background-image: url(/assets/background/banner_2.png);
  background-size: 80%;
  background-position: bottom;
}

.btn-dk__width {
  padding: 10px 35px;
}
/* scoller */
.btn__size {
  bottom: 20px;
  right: 30px;
  z-index: 6;
  border-radius: 4px;
  cursor: pointer;
  padding: 15px 20px;
}
.contact-form {
  margin: inherit;
}
/* count down */
.h2-text__size {
  content: "";
  width: 40%;
  height: 6px;
  background-color: #080871;
  border-radius: 5px;
  transition: var(--smooth);
  margin: auto;
}
h2 {
  font-weight: normal;
  letter-spacing: 0.125rem;
  text-transform: uppercase;
}
li {
  display: inline-block;
  font-size: 15px;
  list-style-type: none;
  padding: 0.5em;
  text-transform: uppercase;
}
li span {
  display: block;
  font-size: 1.5rem;
  color: #1818a6;
}

#countdown .days:after,
#countdown .hours:after,
#countdown .minutes:after {
  position: absolute;
  content: ":";
  margin-left: 18px;
}
#countdown .seconds:after {
  content: "s";
  font-size: 14px;
}
#count-form {
  width: 40%;
  margin: auto;
  text-align: center;
}
.btn-close {
  z-index: 7;
}
/* scoller end*/
/* Transolt */
/* ----------------------------------------------
 * Generated by Animista on 2022-11-11 8:41:56
 * Licensed under FreeBSD License.
 * See http://animista.net/license for more info. 
 * w: http://animista.net, t: @cssanimista
 * ---------------------------------------------- */

/**
 * ----------------------------------------
 * animation vibrate-1
 * ----------------------------------------
 */
@-webkit-keyframes vibrate-1 {
  0% {
    -webkit-transform: translate(0);
    transform: translate(0);
  }
  20% {
    -webkit-transform: translate(-2px, 2px);
    transform: translate(-2px, 2px);
  }
  40% {
    -webkit-transform: translate(-2px, -2px);
    transform: translate(-2px, -2px);
  }
  60% {
    -webkit-transform: translate(2px, 2px);
    transform: translate(2px, 2px);
  }
  80% {
    -webkit-transform: translate(2px, -2px);
    transform: translate(2px, -2px);
  }
  100% {
    -webkit-transform: translate(0);
    transform: translate(0);
  }
}
@keyframes vibrate-1 {
  0% {
    -webkit-transform: translate(0);
    transform: translate(0);
  }
  20% {
    -webkit-transform: translate(-2px, 2px);
    transform: translate(-2px, 2px);
  }
  40% {
    -webkit-transform: translate(-2px, -2px);
    transform: translate(-2px, -2px);
  }
  60% {
    -webkit-transform: translate(2px, 2px);
    transform: translate(2px, 2px);
  }
  80% {
    -webkit-transform: translate(2px, -2px);
    transform: translate(2px, -2px);
  }
  100% {
    -webkit-transform: translate(0);
    transform: translate(0);
  }
}
.vibrate-1 {
  -webkit-animation: vibrate-1 0.3s linear infinite both;
  animation: vibrate-1 0.3s linear infinite both;
  animation-duration: 1s;
}

/* ======================================================= */
/* ----------------------------------------------
 * Generated by Animista on 2022-11-11 8:48:14
 * Licensed under FreeBSD License.
 * See http://animista.net/license for more info. 
 * w: http://animista.net, t: @cssanimista
 * ---------------------------------------------- */

/**
 * ----------------------------------------
 * animation shake-horizontal
 * ----------------------------------------
 */
@-webkit-keyframes shake-horizontal {
  0%,
  100% {
    -webkit-transform: translateX(0);
    transform: translateX(0);
  }
  10%,
  30%,
  50%,
  70% {
    -webkit-transform: translateX(-10px);
    transform: translateX(-10px);
  }
  20%,
  40%,
  60% {
    -webkit-transform: translateX(10px);
    transform: translateX(10px);
  }
  80% {
    -webkit-transform: translateX(8px);
    transform: translateX(8px);
  }
  90% {
    -webkit-transform: translateX(-8px);
    transform: translateX(-8px);
  }
}
@keyframes shake-horizontal {
  0%,
  100% {
    -webkit-transform: translateX(0);
    transform: translateX(0);
  }
  10%,
  30%,
  50%,
  70% {
    -webkit-transform: translateX(-10px);
    transform: translateX(-10px);
  }
  20%,
  40%,
  60% {
    -webkit-transform: translateX(10px);
    transform: translateX(10px);
  }
  80% {
    -webkit-transform: translateX(8px);
    transform: translateX(8px);
  }
  90% {
    -webkit-transform: translateX(-8px);
    transform: translateX(-8px);
  }
}
.btn-xt__animation:hover {
  animation-name: shake-horizontal;
  animation-duration: 4s;
  transition: var(--smooth);
}

/* reponse */
/* ipad */
@media screen and (max-width: 1024px) {
  .modal-body {
    padding: 4px;
  }
  li {
    font-size: 7px;
  }
  #days:after,
  #hours:after,
  #minutes:after {
    margin-left: 4px;
  }
  #countdown {
    text-align: justify !important;
  }
  .modal-image__size {
    background-image: url(/assets/background/banner_2.png);
    background-size: cover;
    background-position: right;
    padding: 85px;
  }
}
/* iphone */
@media screen and (max-width: 500px) {
  .modal-body {
    padding: 4px;
  }
  .modal-image__size {
    background-image: url(/assets/background/banner.png);
    background-size: cover;
    background-position: right;
    padding: 85px;
  }

  .text__size {
    margin-bottom: 0.5rem !important;
  }
  #countdown {
    text-align: center !important;
  }
}
/*Smart phone nhỏ*/
@media screen and (max-width: 240px) {
  .modal-body {
    padding: 4px;
  }
  .modal-image__size {
    background-image: url(/assets/background/banner.png);
    background-size: cover;
    background-position: right;
    padding: 85px;
  }
  .text__size {
    margin-bottom: 0.5rem !important;
  }
  #countdown {
    text-align: center !important;
  }
}
</style>

<script>
import load_api from "../../../../../api.json";

export default {
  metaInfo: {
      title: 'e-Gate Box Pre Orders',
    },
  data: function () {
    return {
      objectContact: {},
      data: {
        title: "Đặt hàng trước e-Gate",
        name: "",
        email: "",
        body: "",
        phone: "",
        content: "",
      },
      setting: [],
    };
  },
  methods: {
    // Gửi email
    async sendMail(e) {
      e.preventDefault();
      var vm = this;
      try {
        vm.data.body =
          "Họ tên khách hàng:" +
          vm.data.name +
          " - " +
          "Số điện thoại:" +
          vm.data.phone +
          " - Nội dung:" +
          vm.data.content;
        vm.objectContact.api = load_api.ticket.anonymous;
        vm.objectContact.data = vm.data;
        let res = await vm.$store.dispatch("postData", vm.objectContact);
        if (res.status == 200) {
          Vue.$toast.open({
            message: "Gửi đăng ký thành công",
            type: "success",
            position: "top-right",
          });
          vm.data.name = "";
          vm.data.email = "";
          vm.data.title = "";
          vm.data.body = "";
          vm.data.phone = "";
          vm.data.content = "";
        }
      } catch (e) {
        Vue.$toast.open({
          message: "Gửi đăng ký bị lỗi",
          type: "error",
          position: "top-right",
        });
      }
    },
    // scoller
    scrollFunction() {
      let mybutton = document.getElementById("myBtn");
      if(mybutton!=null){
        if (
          document.body.scrollTop > 20 ||
          document.documentElement.scrollTop > 20
        ) {
          console.log(document.body.scrollTop);
          mybutton.style.display = "block";
        } else {
          mybutton.style.display = "none";
        }
      }
    },
    topFunction() {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    },
    timefunction() {
      const second = 1000,
        minute = second * 60,
        hour = minute * 60,
        day = hour * 24;

      //I'm adding this section so I don't have to keep updating this pen every year :-)
      //remove this if you don't need it
      let today = new Date(),
        dd = String(today.getDate()).padStart(2, "0"),
        mm = String(today.getMonth() + 1).padStart(2, "0"),
        yyyy = today.getFullYear(),
        nextYear = yyyy + 1,
        dayMonth = "01/01/",
        birthday = dayMonth + yyyy;

      today = mm + "/" + dd + "/" + yyyy;
      if (today > birthday) {
        birthday = dayMonth + nextYear;
      }
      //end

      const countDown = new Date("2023-08-25").getTime(),
        x = setInterval(function () {
          const now = new Date().getTime(),
            distance = countDown - now;
            if(document.querySelector(".hours-popup")!=null){
              (document.querySelector(".hours-popup").innerText = Math.floor(
                (distance % day) / hour
              )),
              (document.querySelector(".minutes-popup").innerText = Math.floor(
                (distance % hour) / minute
              )),
              (document.querySelector(".seconds-popup").innerText = Math.floor(
                (distance % minute) / second
              )),
              (document.querySelector(".days-popup").innerText = Math.floor(
                distance / day
              )),
              (document.querySelector(".days").innerText = Math.floor(
                distance / day
              )),
                (document.querySelector(".hours").innerText = Math.floor(
                  (distance % day) / hour
                )),
                (document.querySelector(".minutes").innerText = Math.floor(
                  (distance % hour) / minute
                )),
                (document.querySelector(".seconds").innerText = Math.floor(
                  (distance % minute) / second
                ));
            }
        }, 0);
    },
    // ribbonfunction(){
    //     function attr(node, attr, default_value) {
    //         return Number(node.getAttribute(attr)) || default_value;
    //     }

    //     // get user config
    //     var scripts = document.getElementsByTagName('script'),
    //         script = scripts[scripts.length - 1]; // 当前加载的script
    //     config = {
    //         z: attr(script, "zIndex", -1), // z-index
    //         a: attr(script, "alpha", 0.6), // alpha
    //         s: attr(script, "size", 90), // size
    //     };

    //     var canvas = document.createElement('canvas'),
    //         g2d = canvas.getContext('2d'),
    //         pr = window.devicePixelRatio || 1,
    //         width = window.innerWidth,
    //         height = window.innerHeight,
    //         f = config.s,
    //         q, t,
    //         m = Math,
    //         r = 0,
    //         pi = m.PI*2,
    //         cos = m.cos,
    //         random = m.random;
    //     canvas.width = width * pr;
    //     canvas.height = height * pr;
    //     g2d.scale(pr, pr);
    //     g2d.globalAlpha = config.a;
    //     canvas.style.cssText = 'opacity: ' + config.a + ';position:fixed;top:0;left:0;z-index: ' + config.z + ';width:100%;height:100%;pointer-events:none;';
    //     // create canvas
    //     document.getElementsByTagName('body')[0].appendChild(canvas);

    //     function redraw() {
    //         g2d.clearRect(0, 0, width, height);
    //         q = [{x: 0, y: height * 0.7 + f}, {x: 0, y: height * 0.7 - f}];
    //         while(q[1].x < width + f) draw(q[0], q[1]);
    //     }
    //     function draw(i, j) {
    //         g2d.beginPath();
    //         g2d.moveTo(i.x, i.y);
    //         g2d.lineTo(j.x, j.y);
    //         var k = j.x + (random()*2-0.25)*f, n = line(j.y);
    //         g2d.lineTo(k, n);
    //         g2d.closePath();
    //         r -= pi / -50;
    //         g2d.fillStyle = '#'+(cos(r)*127+128<<16 | cos(r+pi/3)*127+128<<8 | cos(r+pi/3*2)*127+128).toString(16);
    //         g2d.fill();
    //         q[0] = q[1];
    //         q[1] = {x: k, y: n};
    //     }
    //     function line(p){
    //         t = p + (random() * 2 - 1.1) * f;
    //         return (t > height || t < 0) ? line(p) : t;
    //     }

    //     document.onclick = redraw;
    //     document.ontouchstart = redraw;
    //     redraw();
    // }
  },
  mounted() {
    var vm = this;
    vm.$nextTick(async () => {
      window.onscroll = function () {
        vm.scrollFunction();
      };
      vm.timefunction();
      // vm.ribbonfunction();
    });
  },
};
</script>