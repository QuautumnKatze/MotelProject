<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        p{
            padding: 10px 0 0 0;
        }
        p>a{
            color: #dc3545;
        }
        .wrapper{
            position: fixed;
            z-index: 9999;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background: rgba(0, 0, 0, 0.5);
        }
        .hideWrapper{
            display: none;
        }
        .loader{
            border: 16px solid #f3f3f3;
            border-top: 16px solid #dc3545;
            border-radius: 50%;
            width: 100px;
            height: 100px;
            animation: spin 1s linear infinite;
        }
        @keyframes spin{
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>

<body class="d-flex justify-content-center align-items-center vh-100 bg-light">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card p-4">
                    <h3 class="card-title text-center">Regiter</h3>
                    <form>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="passwordConfirm" class="form-label">Confirm password</label>
                            <input type="password" class="form-control" id="passwordConfirm" name="passwordConfirm" required>
                        </div>

                        <button id="submit" type="submit" class="btn btn-danger w-100">Regiter</button>
                        <p>Already have an account? <a href="/MotelProject/login.php">Login</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="wrapper hideWrapper">
        <div class="loader"></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.querySelector("#submit").addEventListener("click", (e) => {
            e.preventDefault();

            $.ajax({
                url: "/MotelProject/backend/register-handler.php",
                type: "post",
                data: {
                    username: document.querySelector("[name='username']").value,
                    email: document.querySelector("[name='email']").value,
                    name: document.querySelector("[name='name']").value,
                    phone: document.querySelector("[name='phone']").value,
                    password: document.querySelector("[name='password']").value,
                    passwordConfirm: document.querySelector("[name='passwordConfirm']").value,
                },
                dataType: "json",
                beforeSend: () => {
                    document.querySelector(".wrapper").classList.remove("hideWrapper");
                },
                success: (data) => {
                    if(data.errorRedirect != ""){
                        window.location.replace(data.errorRedirect);
                        return;
                    }
                    alert(data.message);
                    
                    if(data.successRedirect != "")
                        window.location.replace(data.successRedirect);
                },
                complete: () => {
                    document.querySelector(".wrapper").classList.add("hideWrapper");
                },
                error: (xhr, ajaxOptions, thrownError) => {
                    console.log(xhr.responseText);
                }
            });
        })
    </script>
</body>

</html>