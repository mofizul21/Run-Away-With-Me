<?php

/* Template Name: Contact */

get_header();
$my_options = get_option('my_framework');
?>

<?php
// Form Process
if (isset($_POST['submitted'])) {
    if (trim($_POST['contactName']) === '') {
        $nameError = 'Please enter your name.';
        $hasError = true;
    } else {
        $name = trim($_POST['contactName']);
    }

    if (trim($_POST['email']) === '') {
        $emailError = 'Please enter your email address.';
        $hasError = true;
    } else if (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['email']))) {
        $emailError = 'You entered an invalid email address.';
        $hasError = true;
    } else {
        $email = trim($_POST['email']);
    }

    if (trim($_POST['subject']) === '') {
        $subjectError = 'Please enter subject.';
        $hasError = true;
    } else {
        $subject = trim($_POST['subject']);
    }

    if (trim($_POST['comments']) === '') {
        $commentError = 'Please enter a message.';
        $hasError = true;
    } else {
        if (function_exists('stripslashes')) {
            $comments = stripslashes(trim($_POST['comments']));
        } else {
            $comments = trim($_POST['comments']);
        }
    }

    if (!isset($hasError)) {
        $emailTo = get_option('tz_email');
        if (!isset($emailTo) || ($emailTo == '')) {
            $emailTo = get_option('admin_email');
            //print_r($emailTo);
        }
        $subject = '[WatanSerb] From ' . $name;
        $body = "Name: $name \n\nEmail: $email \n\nComments: $comments";
        $headers = 'From: ' . $name . ' <' . $emailTo . '>' . "\r\n" . 'Reply-To: ' . $email;

        wp_mail($emailTo, $subject, $body, $headers);
        $emailSent = true;
        if ($emailSent) {
            $mailSuccessMsg = "<p class='text-success'>Email sent successfully!</p>";
        } else {
            $mailErrorMsg = "<p class='text-success'>Something wrong! Email not sent!</p>";
        }

        $_POST = array(); // reset form data after submit

    }
} ?>


<main id="primary" class="site-main has_bg_gradient full_width_bg" style="background-image: url('<?php echo $my_options['contactPageBg']; ?>">
    <div class="container">
        <div class="row pt-4">
            <div class="col-md-6">
                <h2 class="text-white"><?php echo $my_options['getInTouch']; ?></h2>
                <form action="<?php the_permalink(); ?>" id="contactForm" method="post" class="my-4">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="contactName" class="text-white">Name</label>
                            <input type="text" name="contactName" id="contactName" value="<?php if (isset($_POST['contactName'])) echo $_POST['contactName']; ?>" class="required requiredField form-control p-2" placeholder="Your name" />
                            <?php if ($nameError != '') { ?>
                                <span class="text-danger"><?= $nameError; ?></span>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="email" class="text-white">Email</label>
                            <input type="text" name="email" id="email" value="<?php if (isset($_POST['email']))  echo $_POST['email']; ?>" class="required requiredField email form-control p-2" placeholder="Your email" />
                            <?php if ($emailError != '') { ?>
                                <span class="text-danger"><?= $emailError; ?></span>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="subject" class="text-white">Subject</label>
                            <input type="text" name="subject" id="subject" value="<?php if (isset($_POST['subject']))  echo $_POST['subject']; ?>" class="required requiredField subject form-control p-2" placeholder="Subject" />
                            <?php if ($subjectError != '') { ?>
                                <span class="text-danger"><?= $subjectError; ?></span>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="commentsText" class="text-white">Message</label>
                            <textarea name="comments" id="commentsText" rows="5" cols="30" class="required requiredField form-control"><?php if (isset($_POST['comments'])) {
                                                                                                                                            if (function_exists('stripslashes')) {
                                                                                                                                                echo stripslashes($_POST['comments']);
                                                                                                                                            } else {
                                                                                                                                                echo $_POST['comments'];
                                                                                                                                            }
                                                                                                                                        } ?></textarea>
                            <?php if ($commentError != '') { ?>
                                <span class="text-danger"><?= $commentError; ?></span>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-4">
                            <input type="submit" value="SEND" class="btn btn-success">
                        </div>
                    </div>
                    <input type="hidden" name="submitted" id="submitted" value="true" />
                </form>
                <?php
                if ($mailSuccessMsg) {
                    echo $mailSuccessMsg;
                } else {
                    echo $mailErrorMsg;
                }

                ?>
            </div>
            <!-- end .col-md-6 -->

            <div class="col-md-2"></div>

            <div class="col-md-4">
                <!-- <div class="row">
                    <div class="col-md-12">
                        <h2 class="text-white">About Me</h2>
                        <p class="text-white">Hey! I’m Naomi. I believe in trying everything once and making those hard-earned travel dollars take you as far as they possibly can.</p>
                    </div>
                </div> -->
                <!-- end .row -->

                <div class="row">
                    <div class="col-md-12">
                        <h2 class="text-white pb-3">Follow me</h2>
                    </div>
                    <div class="col-md-3 contact-social-icons">
                        <a target="_blank" href="http://www.facebook.com/runawaywithmeblog">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/icons/facebook_white.svg" alt="Facebook">
                            <h4 class="text-center text-white">Facebook</h4>
                        </a>
                    </div>
                    <div class="col-md-3 contact-social-icons">
                        <a target="_blank" href="http://www.instagram.com/runaway.withme_">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/icons/instagram_white.svg" alt="Instagram">
                            <h4 class="text-center text-white">Instagram</h4>
                        </a>
                    </div>
                    <div class="col-md-3 contact-social-icons">
                        <a target="_blank" href="http://www.pinterest.com/runawaywithmetravel">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/icons/pinterest_white.svg" alt="Pinterest">
                            <h4 class="text-center text-white">Pinterest</h4>
                        </a>
                    </div>
                </div>
                <!-- end .row -->

                <div class="row">
                    <div class="col-md-12 contact_buy_me_tea">
                        <a href="https://www.buymeacoffee.com/runawaywithme" target="_blank">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/tea-button.png" alt="Buy Me a Tea" class="buy_me_tea" style="width:40%">
                        </a>
                    </div>
                </div>
                <!-- end .row -->
            </div>
            <!-- end .col-md-4 -->
        </div>
        <!-- end .row -->
    </div>
    <!-- end .container -->
</main>
<?php


get_footer();
