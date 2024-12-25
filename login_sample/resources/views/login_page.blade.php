<html>

<head>
    <title>
        Login
    </title>

    <meta charset="UTF_8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/ui.css">
    <link rel="stylesheet" href="../css/login_page.css">
    <link rel="icon" href="favicon.ico">

    <!-- Jquery -->
    <script src="../js/jquery.js"></script>
</head>

<body class="m_body">

    <div style="position: absolute; z-index:2; top:0;">

        @if (session()->has('registered'))
            <div id="result_alert" class="alert alert-success m-2">
                {{ session('registered') }}
            </div>
        @elseif(session()->has('reset'))
            <div id="result_alert" class="alert alert-success m-2">
                {{ session('reset') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger mt-2" id="result_alert">
                <ul>
                    @error('email')
                        <li> Error: {{ $message }}</li>
                    @enderror
                    @error('password')
                        <li>Error: {{ $message }}</li>
                    @enderror
                </ul>
            </div>
        @endif

    </div>



    <div class="main_div">
        <div class="main_ch">
            <h1>Login</h1>
            <p>Hello welcome, this webpage is designed by</p>
            <h5><u>Behrang Abad Foomani</u></h5>
            <form action="/" class="form_1" method="POST">
                @csrf
                <input type="email" placeholder="Email Address" name="email" value="{{ old('email') }}"><br>
                <input type="password" placeholder="Password" name="password"><br>
                <button type="submit">Submit</button><br><br>
                <a href="../registration">I have not register yet.</a><br>
                <a href="../forgettingpassword" style="margin: 5px;">I Forgot my password</a>
            </form>
        </div>
        <div>
        </div>
        <div class="main_ch2">
            <p></p>
        </div>
    </div>


    <script src="../js/remove_result_alert.js"></script>
</body>

</html>
