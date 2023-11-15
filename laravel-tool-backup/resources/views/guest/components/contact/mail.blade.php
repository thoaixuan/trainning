<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thông tin liên hệ</title>
</head>
<body>
    <p><b>Tên người gửi:</b> {{ $data['name'] }} </p>
    <p><b>Số điện thoại:</b> {{ $data['phone'] }} </p>
    <p><b>Email:</b> {{ $data['email'] }} </p>
    <p><b>Nội dung:</b>{{$data['content']}}</p>
</body>
</html>