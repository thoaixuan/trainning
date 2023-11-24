@extends('register.layouts.main')
@section('main')
<main class="body-main" id="content">
        <div class="container">
            <article class="register-content">
                <div class="register-content-top">
                    <h2 class="title-body-main">ĐĂNG KÝ <span>TRỰC TUYẾN</span>
                    </h2>
                    <p class="des-body-main">Bạn vui lòng điền đầy đủ thông tin cá nhân vào bảng đăng ký xét tuyển trực
                        tuyến bên
                        cạnh để tư vấn viên của trường liên hệ với bạn giải đáp các thắc mắc hoàn toàn miễn phí.
                        Chúng tôi sẽ chủ động liên hệ lại với bạn trong vòng 24h kể từ khi nhận được thông tin đăng
                        ký. Lưu ý: Những mục đánh dấu (*) là thông tin bắt buộc phải điền.

                    </p>
                </div>
                <div class="register-content-form">
                    <form action="/dang-ky-truc-tuyen" method="post" class="form-fpt-register" id="register-form">
                        <ul class="register-list">
                            <li class="register-item">
                                <label for="fullName" class="register-name">Họ và tên <span>*</span></label>
                                <input name="fullName" id="fullName" type="text" value="" class="ip-global"
                                    placeholder="Họ và tên *">
                            </li>
                            <li class="register-item">
                                <label for="phoneNumber" class="register-name">Số điện thoại <span>*</span></label>
                                <input name="phoneNumber" id="phoneNumber" type="number" value="" class="ip-global"
                                    placeholder="Số điện thoại *">
                            </li>
                            <li class="register-item">
                                <label for="email" class="register-name">Email <span>*</span></label>
                                <input name="email" id="email" type="text" value="" class="ip-global"
                                    placeholder="Email">
                            </li>
                            <li class="register-item">
                                <label for="selectMajor" class="register-name">Ngành học <span>*</span></label>
                                <select name="selectMajor" id="selectMajor" class="select-global">
                                    <option value="" selected="selected">Chọn ngành học
                                    </option>
                                    <option value="Chưa xác định ngành học">Chưa xác định ngành học</option>
                                    <option value="Phát triển phần mềm">Phát triển phẩn mềm</option>
                                    <option value="Lập trình Web">Lập trình Web</option>
                                    <option value="Lập trình Mobile">Lập trình Mobile</option>
                                    <option value="Lập trình Game">Lập trình Game</option>
                                    <option value="Xử lý dữ liệu">Xử lý dữ liệu</option>
                                    <option value="Ứng dụng phần mềm">Ứng dụng phần mềm</option>
                                    <option value="Digital Marketing">Digital Marketing</option>
                                    <option value="Marketing & Bán hàng">Marketing & Bán hàng</option>
                                    <option value="Quan hệ công chúng & Tổ chức sự kiện">Quan hệ công chúng
                                        & Tổ chức sự kiện</option>
                                    <option value="Logistics">Logistics</option>
                                    <option value="Quản trị Nhà hàng">Quản trị Nhà hàng</option>
                                    <option value="Quản trị Khách sạn">Quản trị Khách sạn</option>
                                    <option value="Công nghệ kỹ thuật điện, điện tử">Công nghệ kỹ thuật điện,
                                        điện tử</option>
                                    <option value="Điện công nghiệp">Điện công nghiệp</option>
                                    <option value="Công nghệ kỹ thuật điều khiển & Tự động hóa">Công nghệ kỹ
                                        thuật điều khiển & Tự động hóa</option>
                                    <option value="Thiết kế đồ hoạ">Thiết kế đồ hoạ</option>
                                    <option value="Hướng dẫn du lịch">Hướng dẫn du lịch</option>
                                    <option value="Công nghệ kỹ thuật cơ khí">Công nghệ kỹ thuật cơ khí</option>
                                    <option value="Chăm sóc Da & Spa">Chăm sóc Da</option>
                                    <option value="Trang điểm nghệ thuật">Trang điểm nghệ thuật</option>
                                    <option value="Phun thêu thẩm mỹ">Phun thêu thẩm mỹ</option>
                                    <option value="Công nghệ móng">Công nghệ móng</option>
                                </select>
                            </li>
                            <li class="register-item">
                                <label for="selectAddress" class="register-name">Địa điểm học <span>*</span></label>
                                <select name="selectAddress" class="select-global" id="selectAddress">
                                    <option value="" selected="selected">Địa điểm học *
                                    </option>
                                    <option value="HN">Hà Nội</option>
                                    <option value="HP">Hải Phòng</option>
                                    <option value="HNA">Hà Nam</option>
                                    <option value="TH">Thanh Hoá</option>
                                    <option value="DN">Đà Nẵng</option>
                                    <option value="HCM">TP. Hồ Chí Minh</option>
                                    <option value="QN">Quy Nhơn</option>
                                    <option value="TN">Tây Nguyên</option>
                                    <option value="CT">Cần Thơ</option>
                                    <option value="DNA">Đồng Nai</option>
                                    <option value="TNG">Thái Nguyên</option>
                                    <option value="Hệ 9+">Hệ 9+</option>
                                </select>
                            </li>
                            <li class="register-item">
                                <label for="linkFb" class="register-name">Link Facebook</label>
                                <input name="linkFb" id="linkFb" type="text" value="" class="ip-global"
                                    placeholder="Link Facebook của bạn">
                            </li>
                            <li class="register-item">
                                <label for="">CAPTCHA</label>
                            </li>
                        </ul>
                        <div class="register-btn">
                            <input type="submit" value="Đăng ký" class="ip-register" id="btn-submit">
                        </div>
                    </form>
                </div>
                <div class="register-share">
                    <ul class="register-share-list">
                        <li class="share-item item-1">
                            <a href="">
                                <i class="fab fa-facebook-f">
                                    Chia sẻ
                                    <span>8658</span>
                                </i>
                            </a>
                        </li>
                        <li class="share-item">
                            <a href=""><i class="fas fa-thumbs-up"> Thích <span> 16K</span></i></a>

                        </li>
                    </ul>
                </div>
            </article>
        </div>
    </main>
<style>

</style>
@endsection
@section('registerJs')
<script src="{{asset('app/registerform.js')}}"></script>
@endsection
