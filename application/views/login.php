<html>
<head>
    <title>Admin Login Kawal COVID-19</title>   
    <style>
        @import url(https://fonts.googleapis.com/css?family=Roboto:300);

        .login-page {
            width: 360px;
            padding: 8% 0 0;
            margin: auto;
        }
        .form {
            /* LENGKAPI KODE COTS2*/
        }
        .form input {
            font-family: "Roboto", sans-serif;
            outline: 0;
            background: #f2f2f2;
            width: 100%;
            border: 0;
            margin: 0 0 15px;
            padding: 15px;
            box-sizing: border-box;
            border-radius: 6px;
            font-size: 14px;
        }
        .form button {
            font-family: "Roboto", sans-serif;
            text-transform: uppercase;
            outline: 0;
            background: #4CAF50;
            width: 100%;
            border: 0;
            padding: 15px;
            color: #FFFFFF;
            border-radius: 6px;
            font-size: 14px;
        -webkit-transition: all 0.3 ease;
            transition: all 0.3 ease;
            cursor: pointer;
        }
        .form button:hover,.form button:active,.form button:focus {
            background: #43A047;
        }
        p{
           color: FFFFFF; 
        }
        body {
            background: #204051;
            background: -webkit-linear-gradient(right, #204051, #3b6978, #84a9ac, #cae8d5);
            background: -moz-linear-gradient(right, #204051, #3b6978, #84a9ac, #cae8d5);
            font-family: "Roboto", sans-serif;      
        }
    </style>
</head>
<body>
    <div class="login-page">
        <div class="form">
            <p>ADMIN LOGIN FORM</p>
            <form class="login-form" action="<?php echo base_url()?>login" method="post">
                <div>
                    <input type="text" name="username" placeholder="Masukkan username"/>
                    <small class="form-text text-danger" style="color: red;"><?= form_error('username') ?>.</small>
                </div>
                <div>
                    <input type="password" name="password" placeholder="Masukkan password"/>
                    <small class="form-text text-danger" style="color: red;"><?= form_error('password') ?>.</small>
                </div>
                <button type="submit">LOGIN</button>
            </form>
        </div>
    </div>
</body>
</html>