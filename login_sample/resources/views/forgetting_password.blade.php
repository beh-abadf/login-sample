<html>

<head>
    <title>
        Forgot
    </title>

    <meta charset="UTF_8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/ui.css">
    <link rel="stylesheet" href="../css/forgetting_password.css">
    <link rel="icon" href="favicon.ico">

    <!-- Jquery -->
    <script src="../js/jquery.js"></script>
</head>

<body class="m_body">

    <div style="position: absolute; z-index:2; top:0;">
        @if ($errors->any())
            <div id="result_alert" class="alert alert-danger mt-2">
                <ul>
                    @error('email')
                        <li> Error: {{ $message }}</li>
                    @enderror
                </ul>
            </div>
        @endif
    </div>


    <div class="main_div">
        <div class="main_ch">
            <p>Please, enter your email address</p>
            <h5><u>Behrang Abad Foomani</u></h5>
            <form action="../forgettingpassword" class="form_1" method="POST">
                @csrf
                <input type="email" placeholder="Email Address" name="email" value="{{ old('email') }}">
                <button type="submit">Send</button><br><br>
            </form>
        </div>
    </div>

    <script src="../js/remove_result_alert.js"></script>
</body>

</html>
