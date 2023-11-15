@extends('guest.layouts.main')
@section('main')
<div class="bg-landing pt-3 pb-3">
    <div class="container">
        <div class="row mt-3 mb-3">
            <div class="card-body bg-white text-dark shadow-lg p-3 mb-5 bg-body ">
                <div class="statistics-info p-4">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <div class="">
                                <form  id="contact_form">
                                    <h2 class="fw-bold">Liên hệ với chúng tôi</h2>
                                    <div class="form-group">
                                        <label for="name">Tên</label>
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" name="email" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Số điện thoại</label>
                                        <input type="text" name="phone" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="content">Nội dung</label>
                                        <textarea class="form-control" name="content" rows="4"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="link" id="link">
                                    </div>
                                    <button type="submit" class="btn btn-primary" id="submitContact">Gửi ngay</button>
                                </form>
                                
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 contact-iframe">
                            <div class="text-center">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3924.6922742059796!2d107.08750261474535!3d10.366471392600515!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31756fd0377dc685%3A0xbc52cf49809b43c7!2zODAgTmd1eeG7hW4gVsSDbiBD4burLCBQaMaw4budbmcgOSwgVGjDoG5oIHBo4buRIFbFqW5nIFThuqd1LCBCw6AgUuG7i2EgLSBWxaluZyBUw6B1IDc4MDAwLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1651633498310!5m2!1svi!2s" width="550" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('jsGuest')

<script src="{{asset('app/guest/contact/contact.js')}}"></script>
<script>
$("#link").val(window.location.href);
  var contact=new contact();
      contact.datas={
        routes:{
          insert:"{{route('guest.contact.send_contacts')}}", 
        }
      }
      contact.init();
</script>
@endsection