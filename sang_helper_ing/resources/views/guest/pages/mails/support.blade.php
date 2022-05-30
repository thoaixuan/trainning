<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thông tin hỗ trợ</title>
</head>
<body>
    <p><b>Phòng ban: </b> {{ $data['room_name'] }}</p>
    <p><b>Tên người gửi:</b> {{ $data['support_name'] }} </p>
    <p><b>Số điện thoại:</b> {{ $data['support_phone'] }} </p>
    <p><b>Email:</b> {{ $data['support_email'] }} </p>
    <p><b>Nội dung:</b> {{ $data['support_content'] }} </p>
</body>
</html>