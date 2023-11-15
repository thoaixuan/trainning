<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thông tin liên hệ</title>
</head>
<body>
    <p><b>Tên người gửi:</b> {{ $data['full_name'] }} </p>
    <p><b>Số điện thoại:</b> {{ $data['phone_number'] }} </p>
    <p><b>Email:</b> {{ $data['email'] }} </p>
    <p><b>Nội dung:</b></p>
    @foreach(json_decode($data['product']) as $data)
        <div>
            <span>Tên sản phẩm: {{$data->name}}</span>
            <span>Số lượng: {{$data->no}}</span>
            <span>Giá: {{$data->price}}</span>
            <span>Tổng tiền: {{currency_format($data->total)}}</span>
        </div>
    @endforeach
</body>
</html>