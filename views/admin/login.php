<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập Admin</title>
    <style>
        * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        }

        body {
            height: 100%;
            background: linear-gradient(120deg, #4BB1B0, #1271AC);
            overflow: hidden;
        }

        .login_form {
            width: 600px;
            background-color: white;
            border-radius: 5px;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            margin: 50px auto;
        }

        .login_form h1 {
            background-color: #728791;
            color: white;
            text-align: center;
            padding: 50px;
            font-family: Arial, Helvetica, sans-serif;
        }

        .form_control {
            width: 100%;
            padding: 50px 20px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .form_group {
            display: flex;
            flex-direction: column;
            position: relative;
            margin-bottom: 20px;
        }

        .form_label {
            font-size: 28px;
            padding: 10px 0;
        }

        .form_input {
            border: none;
            outline: none;
            border-bottom: 2px solid #adadad;
            font-size: 24px;
            padding: 10px 0;
        }

        .warning {
            position: absolute;
            bottom: -30%;
            left: 0%;
            color: rgb(255, 63, 20);
            font-size: 20px;
            font-weight: 600;
            display: none;
        }
        .form_group.error .warning{
            display: block;
        }
        .form_group.error .form_input{
            border-bottom: 2px solid rgb(255, 63, 20);
        }

        .focus {
            border-bottom: 3px solid #079aa6;
            /* background-color: rgba(7, 154, 166, 0.1); */
            width: 0%;
            /* height: 100%; */
            position: absolute;
            bottom: 0%;
            left: 0%;
            transition: 0.3s;
        }
        .form_input:focus~.focus {
            width: 100%;
        }
        .btn_submit{
            padding: 15px;
            border: none;
            background-color: #079aa6;
            border-radius: 10px;
            width: 35%;
            font-size: 20px;
            display: block;
            margin: 0 auto;
            color: white;
            font-weight: 600;
            transition: 0.3s;
            cursor: pointer;
        }
        .btn_submit:hover {
            transform: scale(0.95);
            background-color: #057a85;
        }
        .contact{
            border-top: 2px solid #adadad;
            padding: 50px 0 30px 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 20px;
        }
        .contact_group{
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 35px;
        }
        .contact_item {
            list-style-type: none;
            position: relative;
        }
        .contact_link{
            text-decoration: none;
            color: black;
            font-size: 18px;
            font-weight: 500;
        }
        .contact_link img {
            width: 65px;
            height: 65px;
            transition: 0.3s;
        }
        .contact_dis{
            position: absolute;
            top: -130%;
            left: 50%;
            transform: translateX(-50%);
            width: max-content;
            padding: 10px;
            background-color: #e9e9e9;
            text-align: center;
            border: #919191;
            border-radius: 5px;
            transition: 0.3s;
            opacity: 0;
            color: #515151;
            font-weight: 700;
        }
        .contact_link:hover > .contact_dis{
            opacity: 1;
            top: -65%;
        }
        .contact_link:hover > img{
            transform: scale(1.1);
        }
        .text_h6{
            font-size: 18px;
            color: #079aa6;
        }
    </style>
</head>
<body>
    <div class="login_form">
        <h1>ĐĂNG NHẬP QUẢN TRỊ</h1>
        <form class="form_control" action="">
            <div class="form_group">
                <label class="form_label">Tài khoản</label>
                <input class="form_input" id="username" type="text" placeholder="*Nhập tài khoản">
                <small class="warning"></small>
                <span class="focus"></span>
            </div>
            <div class="form_group">
                <label class="form_label">Password</label>
                <input class="form_input" id="password" type="password" placeholder="*Nhập mật khẩu">
                <small class="warning"></small>
                <span class="focus"></span>
            </div>
            <button class="btn_submit" type="submit">Login</button>
        </form>
        <div class="contact">
            <ul class="contact_group">
                <li class="contact_item">
                    <a class="contact_link" href="#">
                        <img src="facebook.svg" alt="facebook">
                        <span class="contact_dis">Ajkai Trần</span>
                    </a>
                </li>
                <li class="contact_item">
                    <a class="contact_link" href="#">
                        <img src="mail.svg" alt="mail">
                        <span class="contact_dis">trannamhai7626@gmail.com</span>
                    </a>
                </li>
                <li class="contact_item">
                    <a class="contact_link" href="#">
                        <img src="call-center-agent.svg" alt="call">
                        <span class="contact_dis">0383410797</span>
                    </a>
                </li>
            </ul>
            <h6 class="text_h6">Liên hệ ngay với chúng tôi!!!</h6>
        </div>
    </div>
    <script>
        var username = document.querySelector('#username')
        var password = document.querySelector('#password')
        var form = document.querySelector('form')
        
        function showError(input, message) {
            let parent = input.parentElement;
            let warning = parent.querySelector('.warning')
            parent.classList.add('error')
            warning.innerText = message
        }
        
        function showSuccess(input) {
            let parent = input.parentElement;
            let warning = parent.querySelector('.warning')
            parent.classList.remove('error')
            warning.innerText = ''
        }
        //check dữ liệu trống
        function checkEmptyError(listInput) {
            let isEmptyError = false;
            listInput.forEach(input => {
                input.value = input.value.trim()
        
                if (!input.value) {
                    isEmptyError = true;
                    showError(input, 'Không được để trống trường này!!!')
                } else {
                    showSuccess(input)
                }
            });
        
            return isEmptyError
        }
        
        form.addEventListener('submit', function (e) {
            e.preventDefault()
        
            let isEmptyError = checkEmptyError([username, email, password, conformPassword])
        
        
        })
    </script>
</body>
</html>