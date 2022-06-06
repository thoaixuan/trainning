<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use DB;
class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $config_mail = array([
            'mail_driver' => 'smtp',
            'mail_host' => 'smtp.gmail.com',
            'mail_port' => '587',
            'mail_from_address' => 's1357299@gmail.com',
            'mail_from_name' => 'Sáng Dev',
            'mail_encryption' => 'tls',
            'mail_username' => 's1357299@gmail.com',
            'mail_password' => 'untstjclvahltaqr',
            'mail_receive' => 'nguyenngocsang.dev@gmail.com',
            'room_kinhdoanh' => 'nguyenngocsang.dev@gmail.com',
            'room_kythuat' => 'nguyenngocsang.dev@gmail.com',
            'room_ketoan' => 'nguyenngocsang.dev@gmail.com',

        ]);
        $website_logo = array([
            'logo_guest' => '1653626324_logo.png',
            'favicon' => '',
            'admin_logo_blue' => '1653794009_admin_logo_blue.png',
            'admin_logo_white' => '1653794009_admin_logo_white.png',
        ]);
        $config_google = array([
            'nocaptcha_secret' => '6Lc1M_YfAAAAAKylO5O8Il_eqKXEsXBvAH7u7FFD',
            'nocaptcha_sitekey' => '6Lc1M_YfAAAAALnd4Ewog02tPlDPM6CVIx5Wx-vl',
            'active' => 1
        ]);
        $home_banner = array([
            'banner_title' => 'Xin chào, eGate có thể giúp gì cho bạn?',
            'banner_cta' => 'Liên hệ với chúng tôi'
        ]);
        $home_category = array([
            'category1' => 'Mua Sắm Cùng eGate',
            'category2' => 'Thanh Toán',
            'category3' => 'Trả hàng & Hoàn Tiền',
            'category4' => 'Thông Tin Chung',
            'category5' => 'Khuyến Mãi & Ưu Đãi',
            'category6' => 'Đơn Hàng & Vận Chuyển',
            'category7' => 'Người Bán & Đối Tác',
        ]);
        $home_question = array([
            'question_title1' => 'Mua sắm an toàn cùng e-Gate',
            'question_des1' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque fugiat, sunt quaerat eos ab quos assumenda quidem, numquam obcaecati, ad sint.',
            'question_title2' => 'Voucher/Mã giảm giá',
            'question_des2' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque fugiat, sunt quaerat eos ab quos assumenda quidem, numquam obcaecati, ad sint.',
        ]);
        $home_info = array([
            'info_title1' => 'Email',
            'info_des1' => 'info@ing.vn',
            'info_title2' => 'Số điện thoại',
            'info_des2' => '0359000000',
        ]);
        DB::table('settings')->insert([
            [
                'config_mail' => json_encode($config_mail, JSON_UNESCAPED_UNICODE),
                'website_name' => 'Trung tâm Hỗ trợ e-Gate',
                'website_logo' => json_encode($website_logo, JSON_UNESCAPED_UNICODE),
                'root_color' => '#6c5ffc',
                'route_admin' => 'admin',
                'route_login' => 'admin-login',
                'config_google' => json_encode($config_google, JSON_UNESCAPED_UNICODE),
                'home_banner' => json_encode($home_banner, JSON_UNESCAPED_UNICODE),
                'home_category' => json_encode($home_category, JSON_UNESCAPED_UNICODE),
                'home_question' => json_encode($home_question, JSON_UNESCAPED_UNICODE),
                'home_info' => json_encode($home_info, JSON_UNESCAPED_UNICODE),
            ], 
        ]);
    }
}
