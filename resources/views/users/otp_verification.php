<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
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

    }
</style>

<body>
    <div class="container">
        <div class="login-container">
            <div class="avatar1">
                <img src="dist/img/AdminLTELogo.png" id="logo" alt="User Image">
            </div>

            <?php // Using the session() helper function
                $msg = session('message');
                if($msg != '') {
                ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert" id="autoCloseAlert">
                    <?php echo $msg;
                    ?>
                </div>
                <?php } ?>

            <!-- <h2>Admin Login</h2> -->
            <form action="{{ route('user.verifyotp') }}" method="POST" >
                @csrf
                <div class="form-group">
                    <label for="username">Enter OTP</label>
                    <input type="text" class="form-control" id="token" name="name" placeholder="Enter Token">
                    <input type="hidden" class="form-control" id="user_id" name="user_id" value={{>

                </div>


                <div class="btn">

                    <button type="submit" class="btn btn-info">Submit</button>

                </div>

                <!-- Warning Alert -->
                <br />
                <!-- Example alert with auto close -->
                <?php // Using the session() helper function
                $msg = session('msg');
                if ($msg != '') {
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
</script>
