<?php require_once('Include/Sessions.php') ?>
<?php require_once('Include/functions.php') ?>
<?php require_once('Include/header.php') ?>
<?php

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        $_SESSION['errorMessage'] = 'يجب ملء جميع الحقول';
    } else {
       
        // Check if the connection was successful
        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }

        // Prepare the SQL query
        $query = "SELECT * FROM user WHERE email = ? LIMIT 1";

        // Prepare the statement
        $statement = $con->prepare($query);

        // Bind the value
        $statement->bind_param("s", $email);

        // Execute the statement
        $statement->execute();

        // Get the result
        $result = $statement->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();

            if (($password == $row['password'])) {
                $_SESSION['successMessage'] = 'تم تسجيل الدخول بنجاح. مرحبًا بك في السياحة في البحر الأحمر: ' . $row['name'];
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['username'] = $row['name'];
                Redirect_To('index.php');
            } else {
                $_SESSION['errorMessage'] = 'كلمة مرور غير صالحة';
            }
        } else {
            $_SESSION['errorMessage'] = 'بريد إلكتروني غير صالح';
        }

        // Close the statement and database connection
        $statement->close();
        $con->close();
    }
}
?>


<main class="page login-page">
    <section class="clean-block clean-form dark">
        <?php echo SuccessMessage(); ?>
        <?php echo Message(); ?>
        <div class="container">
            <div class="block-heading" style="padding-top: 23px;">
                <h2 class="text-info" style="font-family: Cairo, sans-serif;">تسجيل الدخول</h2>
                <p style="font-family: Cairo, sans-serif;color: #de7217;">سجل الآن وانضم إلى مجتمعنا<br></p>
            </div>
            <form   method="POST">
                <div class="mb-3" style="text-align: right;">
                    <label class="form-label" for="email" style="font-family: Cairo, sans-serif;">البريد</label>
                    <input class="form-control item" type="email" id="email" name="email">
                </div>
                <div class="mb-3" style="text-align: right;">
                    <label class="form-label" for="password" style="font-family: Cairo, sans-serif;" >كلمة السر</label>
                    <input class="form-control" type="password" id="password"  name="password">
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary" type="submit"
                        style="font-family: Cairo, sans-serif;"  name="submit">تسجيل الدخول</button>

                    <a class="float-end" href="registration.php" style="font-family: Cairo, sans-serif;"><span
                            style="color: var(--bs-link-hover-color);">انشاء حساب</span><br>
                    </a>
                </div>
            </form>
        </div>
    </section>
</main>




<?php require_once('Include/footer.php') ?>