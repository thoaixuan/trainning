<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thông tin hỗ trợ</title>
</head>
<body>
    <p><b>Phòng: </b> <?php echo e($data['room_name']); ?></p>
    <p><b>Tên người gửi:</b> <?php echo e($data['support_name']); ?> </p>
    <p><b>Số điện thoại:</b> <?php echo e($data['support_phone']); ?> </p>
    <p><b>Email:</b> <?php echo e($data['support_email']); ?> </p>
    <p><b>Nội dung:</b> <?php echo e($data['support_content']); ?> </p>
</body>
</html><?php /**PATH C:\laragon\www\trainning\helper\resources\views/guest/pages/mails/support.blade.php ENDPATH**/ ?>