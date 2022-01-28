<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email reset password</title>
    <style>
        .component {
            padding: 2rem;
            margin: auto;
            width: 60%;
            border: #696969 solid 1px;
        }

        .component h2 {
            font-size: 18px;
            color: #333333;
        }

        .component p {
            font-size: 15px;
            color: #696969;
        }

        .header {
            background: #ffffff;
            padding: 1rem;
            border-bottom: #696969 dashed 0.5px;
        }

        .footer {
            background: #ffffff;
            padding: 1rem;
        }

        .button {
            text-align: center;
            margin: 30px;
        }

        .button a {
            text-decoration: none;
            color: #ffffff;
            background: #333333;
            padding: 15px;
            border-radius: 50px;
        }

        .button a:hover {
            background: #696969;
        }

        .copy {
            text-align: center;
            color: #696969;
            font-size: 14px;
        }

    </style>
</head>

<body>
    <div class="component">
        <div class="header">
            <h2> APOGROUP XIN CHÀO! </h2>
            <p> Bạn nhận được email này vì chúng tôi nhận được yêu cầu thay đặt lại tài khoản cho mật khẩu của bạn. </p>
            <div class="button">
                <a href="{{$url}}">Đặt lại mật khẩu</a>
            </div>
            <p> Liên kết đặt lại mật khẩu này sẽ hết hạn sau 60 phút. </p>
            <p> Nếu bạn không yêu cầu đặt lại mật khẩu, bạn không cần thực hiện bất cứ hành động nào. </p>
            <p>Trân trọng cảm ơn</p>
            <p>APOGROUP</p>
        </div>
        <div class="footer">
            <p>nếu nút đặt lại không hoạt động bạn có thể nhấn vào đường dẫn dưới đây để tiếp tục đặt lại mật khẩu: {{$url}}</p>
        </div>
    </div>

    <p class="copy">© 2022 apogroup. All rights reserved.</p>
</body>

</html>
