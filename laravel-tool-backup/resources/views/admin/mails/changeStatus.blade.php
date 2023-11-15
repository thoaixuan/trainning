<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    @foreach(json_decode($data['info']) as $data)
        <div>
            <span>Tên sản phẩm: {{$data->name}}</span>
            <span>Số lượng: {{$data->no}}</span>
            <span>Giá: {{$data->price}}</span>
            <span>Tổng tiền: {{currency_format($data->total)}}</span>
        </div>
    @endforeach
</body>
</html>