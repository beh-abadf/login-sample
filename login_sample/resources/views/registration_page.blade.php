<html>

<head>
    <title>
        Registration
    </title>

    <meta charset="UTF_8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/ui.css">
    <link rel="stylesheet" href="../css/registration_page.css">
    <link rel="icon" href="favicon.ico">

    <!-- Jquery -->
    <script src="../js/jquery.js"></script>
</head>

<body class="m_body2">

    <div style="position: absolute; z-index:2; top:0;">

        @if ($errors->any())
            <div id="result_alert" class="alert alert-danger mt-2">
                <ul>
                    @error('name')
                        <li> Error: {{ $message }}</li>
                    @enderror
                    @error('email')
                        <li> Error: {{ $message }}</li>
                    @enderror
                    @error('password')
                        <li>Error: {{ $message }}</li>
                    @enderror
                    @error('password_confirmation')
                        <li> Error: {{ $message }}</li>
                    @enderror
                </ul>
            </div>
        @endif

    </div>


    <div class="main_div">
        <div class="main_ch">
            <h1>Registration</h1>
            <h5><u>Behrang Abad Foomani</u></h5>
            <form action="../registration" class="form_1" method="POST">
                @csrf
                <input type="text" placeholder="Full Name" name="name" value="{{ old('name') }}"><br>
                <input type="email" placeholder="Email Address" name="email" value="{{ old('email') }}"><br>
                <input type="password" placeholder="Type a Password" name="password"><br>
                <input type="password" placeholder="Password Again" name="password_confirmation"><br>
                <button type="submit">Register</button><br><br>
            </form>
        </div>
        <div class="main_ch2">
            <p></p>
        </div>
    </div>

    <script src="../js/remove_result_alert.js"></script>
</body>

</html>
