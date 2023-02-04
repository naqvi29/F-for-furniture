    <?php
    // Page Title
    $title = "Contact Us";
    // Including Navbar
    include('header.php');
    ?>
    <!-- Map Start -->
    <div class="map spad">
        <div class="container">
            <div class="map-inner">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3620.0941952450407!2d67.06381011447765!3d24.860632251374405!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb340889517ad77%3A0xf99f9c432353d20f!2sWebtrica%20%7C%20Web%20Design%20Karachi%20%7C%20Web%20Design%20Pakistan%20%7C%20Web%20Design%20Company%20Karachi%20%7C%20SEO%20%7C%20Mobile%20App%20Development!5e0!3m2!1sen!2s!4v1669715874210!5m2!1sen!2s" height="610" style="border:0" allowfullscreen="" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
    <!-- Map End -->
    <!-- Modal Start-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="icon-box">
                        <i class="material-icons">&#xE876;</i>
                    </div>
                    <h4 class="modal-title w-100">Congrats!</h4>
                </div>
                <div class="modal-body">
                    <p class="text-center">Form submitted successfully! Thank you for contacting us.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn close-modal-btn" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal End -->


    <!-- Contact Section Start -->
    <section class="contact-section spad" id="contact_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="contact-title">
                        <h4>Contacts Us</h4>
                        <p>For any questions or inquiries, please contact us. Our friendly team endeavour to always get
                            back to you as soon as possible.</p>
                    </div>
                    <!-- Info Start -->
                    <div class="contact-widget">
                        <div class="cw-item">
                            <div class="ci-icon">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <div class="ci-text">
                                <span>Address:</span>
                                <p>Shahrah-E-Faisal Karachi PAK</p>
                            </div>
                        </div>
                        <div class="cw-item">
                            <div class="ci-icon">
                                <i class="fa-solid fa-mobile-screen-button"></i>
                            </div>
                            <div class="ci-text">
                                <span>Phone:</span>
                                <p><a href="tel:+923000000000">+92 300 0000000</a></p>
                            </div>
                        </div>
                        <div class="cw-item">
                            <div class="ci-icon">
                                <i class="fa-regular fa-envelope"></i>
                            </div>
                            <div class="ci-text">
                                <span>Email:</span>
                                <p><a href="mailto:info@gmail.com" class="__cf_email__">info@gmail.com</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Info End -->
                </div>
                <!-- Contact Column Start -->
                <div class="col-lg-6 offset-lg-1">
                    <div class="contact-form">
                        <div class="leave-comment">
                            <h4>Leave A Comment</h4>
                            <p>Our staff will call back later and answer your questions.</p>
                            <!-- Contact Form Start -->
                            <form method="POST" id="contact_form" class="comment-form">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <span class="text-danger" style="font-weight: 600;" id="fname_error"></span>
                                        <input type="text" class="form_data" name="fname" id="fname" placeholder="First Name">
                                    </div>
                                    <div class="col-lg-6">
                                        <span class="text-danger" style="font-weight: 600;" id="lname_error"></span>
                                        <input type="text" class="form_data" name="lname" id="lname" placeholder="Last Name">
                                    </div>
                                    <div class="col-lg-6">
                                        <span class="text-danger" style="font-weight: 600;" id="email_error"></span>
                                        <input type="email" class="form_data" name="email" id="email" placeholder="Your Email">
                                    </div>
                                    <div class="col-lg-6">
                                        <span class="text-danger" style="font-weight: 600;" id="phone_error"></span>
                                        <input type="tel" class="form_data" name="phone" id="phone" placeholder="Your Phone Number">
                                    </div>
                                    <div class="col-lg-6">
                                        <span class="text-danger" style="font-weight: 600;" id="postal_error"></span>
                                        <input type="tel" class="form_data" name="postal" id="postal" placeholder="Postal Code">
                                    </div>
                                    <div class="col-lg-6">
                                        <span class="text-danger" style="font-weight: 600;" id="subject_error"></span>
                                        <input type="text" class="form_data" name="subject" id="subject" placeholder="Subject">
                                    </div>
                                    <div class="col-lg-12">
                                        <span class="text-danger" style="font-weight: 600;" id="message_error"></span>
                                        <textarea class="form_data" name="message" id="message" placeholder="Your message"></textarea>
                                        <button type="submit" name="submit" id="submit" onclick="contact(); return false;" class="site-btn">Send message</button>
                                    </div>
                                </div>
                            </form>
                            <!-- Contact Form End -->
                        </div>
                    </div>
                </div>
                <!-- Contact Column End -->
            </div>
        </div>
    </section>
    <!-- Contact Section End -->


    <!-- Script For Contact Validaton Start -->
    <script>
        function contact() {
            var form_element = document.getElementsByClassName('form_data');

            var form_data = new FormData();

            for (var count = 0; count < form_element.length; count++) {
                form_data.append(form_element[count].name, form_element[count].value);
            }

            document.getElementById('submit').disabled = true;

            var ajax_request = new XMLHttpRequest();
            // Opening Validation Page And Sending Data
            ajax_request.open('POST', 'contact_validate.php');
            // Data Sent
            ajax_request.send(form_data);

            ajax_request.onreadystatechange = function() {
                if (ajax_request.readyState == 4 && ajax_request.status == 200) {
                    document.getElementById('submit').disabled = false;
                    // Getting Response From PHP Validation Through AJax 
                    var response = JSON.parse(ajax_request.responseText);

                    if (response.success != '') {
                        // Clearing Form After Submit
                        document.getElementById('contact_form').reset();
                        // Modal Trigger After Form Submit
                        $('#exampleModal').modal('show');

                        // Hiding Error Text When There Is No Error From Validation
                        document.getElementById('fname_error').innerHTML = '';
                        document.getElementById('lname_error').innerHTML = '';
                        document.getElementById('email_error').innerHTML = '';
                        document.getElementById('phone_error').innerHTML = '';
                        document.getElementById('postal_error').innerHTML = '';
                        document.getElementById('subject_error').innerHTML = '';
                        document.getElementById('message_error').innerHTML = '';
                    } else {
                        // Showing Error From Validation
                        document.getElementById('fname_error').innerHTML = response.fname_error;
                        document.getElementById('lname_error').innerHTML = response.lname_error;
                        document.getElementById('email_error').innerHTML = response.email_error;
                        document.getElementById('phone_error').innerHTML = response.phone_error;
                        document.getElementById('postal_error').innerHTML = response.postal_error;
                        document.getElementById('subject_error').innerHTML = response.subject_error;
                        document.getElementById('message_error').innerHTML = response.message_error;
                    }


                }
            }
        }
    </script>
    <!-- Script For Contact Validaton End -->


    <!-- Success Modal CSS End -->
    <style>
        .modal-dialog {
            color: #636363;
            width: 325px;
            font-size: 14px;
        }

        .modal-dialog .modal-content {
            padding: 20px;
            border-radius: 5px;
            border: none;
        }

        .modal-dialog .modal-header {
            border-bottom: none;
            position: relative;
        }

        .modal-dialog h4 {
            text-align: center;
            font-size: 26px;
            margin: 30px 0 -15px;
        }

        .modal-dialog .modal-footer {
            border: none;
            text-align: center;
            border-radius: 5px;
            font-size: 13px;
        }

        .modal-dialog .modal-footer .close-modal-btn {
            background-color: #e7ab3c;
            display: block;
            width: 100%;
            color: #fff;
            text-align: center;
        }

        .modal-dialog .icon-box {
            color: #fff;
            position: absolute;
            margin: 0 auto;
            left: 0;
            right: 0;
            top: -70px;
            width: 95px;
            height: 95px;
            border-radius: 50%;
            z-index: 9;
            background: #e7ab3c;
            padding: 15px;
            text-align: center;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
        }

        .modal-dialog .icon-box i {
            font-size: 58px;
            position: relative;
            top: 3px;
        }
    </style>
    <!-- Success Modal CSS End -->


    <!-- CDNs For Success Modal -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


    <!-- Footer -->
    <?php
    include('footer.php');
    ?>