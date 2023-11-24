<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gửi email đăng ký</title>
</head>

<body>
    <h2>Xin chào{{ $data['data']['fullname'] }}</h2>
    <div style="font-weight:600">
        <p>CHúng tôi vừa nhận được mẫu đăng ký tư vấn tuyển sinh của bạn.</p>
        <p>Bạn vui lòng xác nhận lại những thông tin sau:</p>
        <p>Số điện thoại: {{ $data['data']['phone'] }}</p>
        <p>Ngành học đăng ký: {{ $data['data']['major'] }}</p>
        <p>Địa chỉ đăng ký: {{ $data['data']['address'] }}</p>
    </div>

</body>

</html>
