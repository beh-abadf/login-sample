<html>

<head>
    <title>
        Reset Password
    </title>

    <meta charset="UTF_8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/ui.css">
    <link rel="stylesheet" href="../css/resetting_password.css">
    <link rel="icon" href="favicon.ico">

    <!-- Jquery -->
    <script src="../js/jquery.js"></script>
</head>

<body class="m_body">
    <div class="main_div">

        <div style="position: absolute; z-index:2; top:0;">
            @if ($errors->any())
                <div id="result_alert" class="alert alert-danger mt-2">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li> Error: {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <div class="main_ch">

            <p>We sent a code to your email address</p>
            <p>Please, enter the code and update your old password.</p>

            <h5><u>Behrang Abad Foomani</u></h5>
            <form action="../resettingpassword" class="form_1" method="POST">
                @csrf
                <input type="text" placeholder="Code" name="code" id='inp_cd' onclick=""
                    value="{{ old('code') }}"><br>
                <input type="password" id="m" placeholder="New Password" name="password"><br>
                <input type="password" placeholder="Password Again" name="password_confirmation"><br>
                <button type="submit">Update</button><br><br>
            </form>
        </div>
        <div class="main_ch2">
            <p></p>
        </div>
    </div>

    <script src="../js/remove_result_alert.js"></script>
</body>

</html>
