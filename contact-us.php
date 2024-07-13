<?php require_once('Include/Sessions.php') ?>
<?php require_once('Include/functions.php') ?>
<?php require_once('Include/header.php') ?>
<?php

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    if (empty($name) || empty($email) || empty($message)) {
        $_SESSION['errorMessage'] = 'يجب ملء جميع الحقول';
    } else {
        // Prepare the SQL query
        $query = "INSERT INTO contactus (name, subject, email, massage) VALUES (?, ?, ?, ?)";
        
        // Prepare the statement
        $statement = $con->prepare($query);

        // Bind the values
        $statement->bind_param("ssss", $name, $subject, $email, $message);

        // Execute the statement
        if ($statement->execute()) {
            $_SESSION['successMessage'] = 'تم إرسال الرسالة بنجاح';
        } else {
            $_SESSION['errorMessage'] = 'فشل إرسال الرسالة';
        }

        // Close the statement and database connection
        $statement->close();
        $con->close();
    }
}
?>

<main class="page contact-us-page">
    <section class="clean-block clean-form dark">
        <div class="container">
            <?php echo SuccessMessage(); ?>
            <?php echo Message(); ?>
            <div class="block-heading" style="padding-top: 33px;">
                <h2 class="text-info" style="direction: rtl;font-family: Cairo, sans-serif;">استكشف جمال وتنوع "السياحة
                    في البحر الأحمر"</h2>
                <p
                    style="direction: rtl;color: var(--bs-black);font-family: Cairo, sans-serif;line-height: 28px;max-width: 725px;">
                    &nbsp;السياحة في البحر الأحمر&nbsp; هو موقع يقدم معلومات شاملة ومفصلة عن جمال وتنوع المنطقة الساحلية
                    للبحر الأحمر في المملكة العربية السعودية. نحن نهدف إلى تعزيز الوعي بالمعالم السياحية الرائعة والفرص
                    الترفيهية المتاحة في هذه المنطقة الفريدة، من خلال تقديم معلومات موثوقة ومحدثة للمسافرين والمهتمين
                    بالسياحة.<br><br></p>
            </div>
            <form  method="POST">
                <div class="mb-3" style="text-align: right;"><label class="form-label" for="name"
                        style="font-family: Cairo, sans-serif;">الإسم</label><input class="form-control" type="text"
                        id="name" name="name"></div>
                <div class="mb-3" style="text-align: right;"><label class="form-label" for="subject"
                        style="font-family: Cairo, sans-serif;">الموضوع</label><input class="form-control" type="text"
                        id="subject" name="subject"></div>
                <div class="mb-3" style="text-align: right;"><label class="form-label" for="email"
                        style="font-family: Cairo, sans-serif;">البريد&nbsp;</label><input class="form-control"
                        type="email" id="email" name="email"></div>
                <div class="mb-3" style="text-align: right;"><label class="form-label" for="message"
                        style="font-family: Cairo, sans-serif;">الرسالة</label><textarea class="form-control"
                        id="message"   name="message"></textarea></div>
                <div class="mb-3"><button class="btn btn-primary" type="submit"
                        style="font-family: Cairo, sans-serif;" name="submit">ارسال</button></div>
            </form>
        </div>



        <hr>
        <div class="container">
            <div class="row mb-2">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h2 class="display-6 fw-bold mb-5"><span style="font-family: Cairo, sans-serif;">أسئلة
                            شائعة<br></span></h2>
                    <p class="text-muted" style="direction: rtl;font-family: Cairo, sans-serif;">يسعدنا أن نقدم لكم هذه
                        الاسئلة التي تتضمن بعض الأسئلة الشائعة حول السياحة في البحر الأحمر في المملكة العربية
                        السعودية.<br></p>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-8 mx-auto">
                    <div class="accordion text-muted" role="tablist" id="accordion-1">
                        <div class="accordion-item">
                            <h2 class="accordion-header" role="tab"><button class="accordion-button" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#accordion-1 .item-1" aria-expanded="true"
                                    aria-controls="accordion-1 .item-1" style="font-family: Cairo, sans-serif;">ما هي
                                    أفضل فترة لزيارة منطقة البحر الأحمر في السعودية؟</button></h2>
                            <div class="accordion-collapse collapse show item-1" role="tabpanel"
                                data-bs-parent="#accordion-1">
                                <div class="accordion-body">
                                    <p
                                        style="color: var(--bs-black);text-align: right;font-family: Cairo, sans-serif;line-height: 30px;">
                                        تعتبر فصول الربيع والخريف أفضل فترات لزيارة المنطقة، حيث تكون درجات الحرارة
                                        معتدلة وتتمتع بأجواء لطيفة.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" role="tab"><button class="accordion-button collapsed"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#accordion-1 .item-2"
                                    aria-expanded="false" aria-controls="accordion-1 .item-2"
                                    style="/*direction: rtl;*/font-family: Cairo, sans-serif;">ما هي الأنشطة الشعبية
                                    التي يمكن القيام بها في منطقة البحر الأحمر؟</button></h2>
                            <div class="accordion-collapse collapse item-2" role="tabpanel"
                                data-bs-parent="#accordion-1">
                                <div class="accordion-body">
                                    <p class="mb-0"
                                        style="color: var(--bs-accordion-btn-color);text-align: right;font-family: Cairo, sans-serif;line-height: 30px;">
                                        تشمل الأنشطة الشعبية الغوص في الشعاب المرجانية، وركوب الزوارق الزجاجية لاستكشاف
                                        الحياة البحرية، ورياضات المائية مثل التزلج على الماء والغوص بالأنابيب.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" role="tab"><button class="accordion-button collapsed"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#accordion-1 .item-3"
                                    aria-expanded="false" aria-controls="accordion-1 .item-3"
                                    style="text-align: right;font-family: Cairo, sans-serif;">هل هناك فرص للاستمتاع
                                    بالمأكولات البحرية في المنطقة؟</button></h2>
                            <div class="accordion-collapse collapse item-3" role="tabpanel"
                                data-bs-parent="#accordion-1">
                                <div class="accordion-body">
                                    <p class="mb-0"
                                        style="color: var(--bs-accordion-btn-color);text-align: right;font-family: Cairo, sans-serif;line-height: 28px;">
                                        نعم، تتميز المنطقة بمطاعم تقدم مجموعة متنوعة من المأكولات البحرية الطازجة، بما
                                        في ذلك الأسماك والمأكولات البحرية المحلية.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" role="tab"><button class="accordion-button collapsed"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#accordion-1 .item-4"
                                    aria-expanded="false" aria-controls="accordion-1 .item-4"
                                    style="text-align: right;font-family: Cairo, sans-serif;">ما هي أفضل الأماكن للاقامة
                                    في منطقة البحر الأحمر؟</button></h2>
                            <div class="accordion-collapse collapse item-4" role="tabpanel"
                                data-bs-parent="#accordion-1">
                                <div class="accordion-body">
                                    <p class="mb-0"
                                        style="color: var(--bs-accordion-btn-color);text-align: right;font-family: Cairo, sans-serif;line-height: 28px;">
                                        تتوفر خيارات متنوعة للإقامة، بما في ذلك الفنادق الفخمة على الساحل، ومنتجعات
                                        الشاطئ، وخيارات الإقامة الاقتصادية مثل الشقق الفندقية والفيلات.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" role="tab"><button class="accordion-button collapsed"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#accordion-1 .item-5"
                                    aria-expanded="false" aria-controls="accordion-1 .item-5"
                                    style="text-align: right;font-family: Cairo, sans-serif;">هل هناك فرص للتسوق وشراء
                                    الهدايا التذكارية في المنطقة؟</button></h2>
                            <div class="accordion-collapse collapse item-5" role="tabpanel"
                                data-bs-parent="#accordion-1">
                                <div class="accordion-body">
                                    <p class="mb-0"
                                        style="color: var(--bs-accordion-btn-color);text-align: right;font-family: Cairo, sans-serif;line-height: 27px;">
                                        نعم، تتوفر فرص للتسوق في الأسواق المحلية حيث يمكن العثور على الحرف اليدوية
                                        المحلية والمنتجات التذكارية الفريدة.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clean-block add-on social-icons blue" style="margin-top: 50px;">
            <div class="icons"><a href="facebook.com" target="_blank"><i class="icon-social-facebook"></i></a><a
                    href="https://instagram.com/" style="margin-left: 30px;margin-right: 30px;" target="_blank"><i
                        class="icon-social-instagram"></i></a><a href="https://twitter.com/" target="_blank"><i
                        class="icon-social-twitter"></i></a></div>
        </div>
    </section>
</main>




<?php require_once('Include/footer.php') ?>