<section class="map-section another-page pt-95 pb-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <div class="section-title">
                    <h2>Send Us a Message</h2>
                    <p>We provide support and knowledge to our team ensuring we meet and exceed our <br> client’s expectations of a friendly, professional and efficient service.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-7 form-wrapper">
                <div class="form-box">
                   <div class="contact-form">
                       <form method="POST" action="sendmail.php" id="contact-form">
                           <div class="form-group">
                               <input type="text" name="username" placeholder="Full Name" required="">
                           </div>
                           <div class="form-group">
                               <input type="email" name="email" placeholder="Your Email" required="">
                           </div>
                           <div class="form-group">
                               <textarea name="message" placeholder="Massage"></textarea>
                           </div>
                           <div class="checking">
                               <input type="checkbox" name="check" id="check" value="" required="">
                               <label for="check">By checking this, you agree to our Terms and Privacy policy.</label>
                           </div>
                           <div class="form-group ">
                               <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="">
                               <button class="btn-bg" type="submit" data-loading-text="Please wait...">SEND MESSAGE</button>
                           </div>
                       </form>
                   </div>
                </div>
            </div>
            <div class="col-lg-5 map-wrapper">
                <div class="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14709.912151828446!2d89.5403187!3d22.82179695!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1564676262634!5m2!1sen!2sbd" style="border:0" allowfullscreen=""></iframe>
                </div>
            </div>
        </div>
        <div class="map-bg">
            <img src="{{asset('guest\assets\img\bg\map-dot.png')}}" alt="">
        </div>
    </div>
</section>