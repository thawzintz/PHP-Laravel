<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card p-4 shadow-sm">
                    <h3 class="text-center mb-4">Create Account</h3>

                    <?php if (isset($_GET['error'])): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php 
                                if ($_GET['error'] == 'password_mismatch') {
                                    echo "Passwords do not match!";
                                } elseif ($_GET['error'] == 'email_exists') {
                                    echo "Email is already registered!";
                                } else {
                                    echo "Something went wrong. Please try again.";
                                }
                            ?>
                        </div>
                    <?php endif; ?>

                    <form action="action/register-process.php" method="POST">
                        
                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="username" class="form-control" placeholder="entername" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" name="email" class="form-control" placeholder="name@example.com" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" minlength="6" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" name="confirm_password" class="form-control" minlength="6" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 mb-3">Register</button>
                        
                        <div class="text-center">
                            <small class="text-muted">Already have an account? <a href="index.php" class="text-decoration-none">Sign In</a></small>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>