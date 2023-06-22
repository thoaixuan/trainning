<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $website_logo = array([
            'logo_guest' => 'logo_nongtrang.png',
            'favicon' => '',
            'admin_logo_blue' => 'admin_logo_blue.jpg',
            'admin_logo_white' => 'admin_logo_white.png',
        ]);
        $config_mail = array([
            'mail_driver' => 'smtp',
            'mail_host' => 'smtp.gmail.com',
            'mail_port' => '587',
            'mail_from_address' => 's1357299@gmail.com',
            'mail_from_name' => 'Sáng Dev',
            'mail_encryption' => 'tls',
            'mail_username' => 's1357299@gmail.com',
            'mail_password' => 'untstjclvahltaqr',
            'mail_receive' => 'nguyenngocsang.dev@gmail.com'
        ]);
        $config_google = array([
            'nocaptcha_secret' => '6Lc1M_YfAAAAAKylO5O8Il_eqKXEsXBvAH7u7FFD',
            'nocaptcha_sitekey' => '6Lc1M_YfAAAAALnd4Ewog02tPlDPM6CVIx5Wx-vl',
            'client_id' => '827180666908-36b76cfm753uacff8kcdod1iulut56q3.apps.googleusercontent.com',
            'client_secret' => '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',
            'redirect' => 'http://127.0.0.1:8000/google/callback',
        ]);
        \DB::table('settings')->insert([
            [
                'route_login' => 'admin-login',
                'route_admin' => 'admin',
                'website_logo' => json_encode($website_logo, JSON_UNESCAPED_UNICODE),
                'config_mail' => json_encode($config_mail, JSON_UNESCAPED_UNICODE),
                'config_google' => json_encode($config_google, JSON_UNESCAPED_UNICODE),
            ]
        ]);
    }
}
