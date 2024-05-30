<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .login-container {
            max-width: 400px;
            margin: 0 auto;
            margin-top: 62px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        .avatar {
            width: 100px;
            height: 100px;
            margin: 0 auto 20px;
            border-radius: 50%;
            overflow: hidden;
        }

        .avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        #logo {
            height: 10em;
            width: 11em;
            position: relative;
            left: 6em;
        }
    </style>
</head>


<style>
    body {
        background-color: lightgray;
        /* Specify the path to your image */
        /* background-image: url('uploads/login_bg.jpg'); */
        /* Set background size to cover the entire body */
        /* background-size: cover; */
        /* Set background repeat to no-repeat to prevent image from repeating */
        /* background-repeat: no-repeat; */
        /* height: 100px; */
    }
</style>

<body>
    <div class="container">
        <div class="login-container">
            <div class="avatar1">
                <img src="dist/img/AdminLTELogo.png" id="logo" alt="User Image">
            </div>
            <div class="mt-1">
                @if ($errors->any())
                    <div class="col-12">
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger" id="autoCloseAlert">{{ $error }}</div>
                        @endforeach
                    </div>

                @endif

                @if (session()->has('error'))
                    <div class="alert alert-danger" id="autoCloseAlert">{{ session('error') }}</div>
                @endif

            </div>
            <!-- <h2>Admin Login</h2> -->
            <form method="POST" action="{{ route('otp.store') }}">
                @csrf
                <div class="form-group">
                    <label for="username">User Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Username">

                </div>
                <input type="hidden" class="form-control" id="role_id" name="role_id" value="1">
                <input type="hidden" class="form-control" id="role_name" name="role_name" value="Super Admin">
                <div class="form-group">
                    <label for="username">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">

                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">

                </div>
                <div class="btn">

                    <button type="submit" name="btn_signup" class="btn btn-info" id="btnLogin">SignUp</button>
                    <a href={{ route('login')}}>Already you have account?</a>

                </div>

                <!-- Warning Alert -->
                <br />
                <!-- Example alert with auto close -->
                <?php // Using the session() helper function
                $msg = session('msg');
                if($msg != '') {
                ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert" id="autoCloseAlert">
                    <?php echo $msg;
                    ?>
                </div>
                <?php } ?>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
<script>
    // Automatically close the alert after 5 seconds
    window.setTimeout(function() {
        document.getElementById('autoCloseAlert').remove();
    }, 3000);

    // $('#btnLogin').click(function() {

    //     fetch('https://billspayeadmin.in/BillsPayeApis/v1/login', {
    //             method: 'HEAD',
    //             headers: {
    //                 'Content-Type': 'application/json',
    //                 'Authorization': 'b8416f2680eb194d61b33f9909f94b9d'
    //             },
    //             body: JSON.stringify({
    //                 username: '7729070810',
    //                 password: 'welcome'
    //             })
    //         })
    //         .then(response => {
    //             if (!response.ok) {
    //                 throw new Error('Network response was not ok');
    //             }
    //             return response.json();
    //         })
    //         .then(data => {
    //             console.log(data);
    //         })
    //         .catch(error => {
    //             console.error('There was a problem with your fetch operation:', error);
    //         });

    // });
</script>
