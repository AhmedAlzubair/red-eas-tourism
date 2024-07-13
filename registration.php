<?php require_once('Include/Sessions.php') ?>
<?php require_once('Include/functions.php') ?>
<?php require_once('Include/header.php') ?>

<?php
 

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    if (empty($name) || empty($email) || empty($password) || empty($confirmPassword)) {
        $_SESSION['errorMessage'] = 'يجب ملء جميع الحقول';
    } elseif ($password !== $confirmPassword) {
        $_SESSION['errorMessage'] = 'كلمات المرور غير متطابقة';
    } else {
        // Prepare the SQL query
        $query = "INSERT INTO user (name, password, email) VALUES (?, ?, ?)";
        
        // Prepare the statement
        $statement = $con->prepare($query);

        // Bind the values
        $statement->bind_param("sss", $name, $password, $email);

        // Execute the statement
        if ($statement->execute()) {
            $_SESSION['successMessage'] = 'تم تسجيل المستخدم بنجاح، مرحبًا بك في السياحة في البحر الأحمر';
            $newCustomerId = $statement->insert_id;
            $_SESSION['user_id'] = $newCustomerId;
            $_SESSION['username'] = $name;
            Redirect_To('index.php');
        } else {
            $_SESSION['errorMessage'] = 'فشل تسجيل المستخدم';
        }

        // Close the statement and database connection
        $statement->close();
        $con->close();
    }
}
?>
<main class="page registration-page">
    <section class="clean-block clean-form dark">
        <div class="container">
            <?php echo SuccessMessage(); ?>
            <?php echo Message(); ?>
            <div class="block-heading" style="padding-top: 23px;">
                <h2 class="text-info" style="font-family: Cairo, sans-serif;">إنشاء حساب<br></h2>
                <p style="font-family: Cairo, sans-serif;color: #de7217;line-height: 30px;max-width: 526px;">نشكرك على
                    اهتمامك بموقعنا الإلكتروني. نقدم لك فرصة رائعة للتسجيل وإنشاء حساب مجاني. من خلال التسجيل
                    .&nbsp;&nbsp;<br></p>
            </div>
            <form method="POST">
                <div class="mb-3" style="font-family: Cairo, sans-serif;text-align: right;">
                    <label class="form-label" for="name">الاسم</label>
                    <input class="form-control item" type="text" id="name" name="name">
                </div>
                <div class="mb-3" style="font-family: Cairo, sans-serif;text-align: right;">
                    <label class="form-label" for="email">البريد</label>
                    <input class="form-control item" type="email" id="email" name="email">
                </div>
                <div class="mb-3" style="font-family: Cairo, sans-serif;text-align: right;">
                    <label class="form-label" for="password">كلمة السر</label>
                    <input class="form-control item" type="password" id="password" name="password">
                </div>
                <div class="mb-3" style="font-family: Cairo, sans-serif;text-align: right;">
                    <label class="form-label" for="password">اعد كتابة كلمة السر</label>
                    <input class="form-control item" type="password" id="password-1" name="confirm_password">
                </div>

                <button class="btn btn-primary shadow-sm" type="submit" name="submit"
                    style="font-family: Cairo, sans-serif;">إنشاء
                    حساب</button>
                <a class="float-end" href="login.php" style="font-family: Cairo, sans-serif;">تسجيل دخول</a>

            </form>
        </div>
    </section>
</main>



<?php require_once('Include/footer.php') ?>