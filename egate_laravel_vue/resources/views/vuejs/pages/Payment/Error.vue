<template>
<div>
    <div v-if="isMobile()">
    <a href="egate://app/order" class="app_check">
         <div class="card mt-2 mb-3 p-4 text-center bg-custom-1 w-100">
            <div class="mt-2">
                <div class="fs-4 text-white">Thanh toán không thành công<br/> vui lòng thử lại</div>
            </div>
        </div>
    </a>
    </div>
    <div v-else>
   <a href="https://e-gate.vn" class="app_check">
         <div class="card mt-2 mb-3 p-4 text-center bg-custom-1 w-100">
            <div class="mt-2">
                <div class="fs-4 text-white">Thanh toán không thành công<br/> vui lòng thử lại</div>
            </div>
        </div>
    </a>
</div>
   
</div>

</template>

<script>
export default {
    layout: 'blank',
    methods: {
  	isMobile: function() {
    	var check = false;
        (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
        return check;
            }
    },
}
</script>

<style lang="scss" scoped>
@media only screen and (max-device-width: 1024) {
    .app_check{
      visibility: show;
    }
}
@media only screen and (max-device-width: 1280px) {
 .app_check{
    /* visibility: hidden; */
 }
}
    
.bg-custom-1 {
    // background: url('/themes/assets/images/ecommerce/bg-2.png');
    background-color: #0d6efd;
    background-size: contain;
    background-position: center;
}

.dummy-positioning {
  width: 100%;
  height: 100vh;
  align-items: center;
  justify-content: center;
}


// The icon specifics
// Variables
$red:#e12e2e;
$icon-base-size: 20px;

// Structure
.success-icon {
  display: inline-block;
  width: 8em;
  height: 8em;
  font-size: $icon-base-size;
  border-radius: 50%;
  border: 4px solid lighten($red, 20%);
  background-color: transparent;
  position: relative;
  overflow: hidden;
  transform-origin: center;
  animation: showSuccess 180ms ease-in-out;
  transform: scale(1);
}

// Elements
.success-icon {
  
  &__tip,
  &__long {
    display: block;
    position: absolute;
    height: 4px;
    background-color: lighten($red, 20%);
    border-radius: 10px;
  }

  &__tip {
    width: 2.4em;
    top: 4.3em;
    left: 1.4em;
    transform: rotate(45deg);
    animation: tipInPlace 300ms ease-in-out;
    animation-fill-mode: forwards;
    animation-delay: 180ms;
    visibility: hidden;
  }

  &__long {
    width: 4em;
    transform: rotate(-45deg);
    top: 3.70em;
    left: 2.75em;
    animation: longInPlace 140ms ease-in-out;
    animation-fill-mode: forwards;
    visibility: hidden;
    animation-delay: 300ms + 140ms;
  }

}

@keyframes showSuccess {
    from {
        transform: scale(0);
    }
    to {
        transform: scale(1);
    }
}

@keyframes tipInPlace {
    from {
        width: 0em;
        top: 0em;
        left: -1.6em;
    }
    to {
        width: 2.4em;
        top: 4.3em;
        left: 1.4em;
        visibility: visible;
    }
}

@keyframes longInPlace {
    from {
        width: 0em;
        top: 5.1em;
        left: 3.2em;
    }
    to {
        width: 4em;
        top: 3.70em;
        left: 2.75em;
        visibility: visible;
    }
}
</style>