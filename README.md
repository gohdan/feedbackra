feedbackra
==========

Feedbackra is feedback sender.


=== Installation ===

1. Place Feedbackra in some directory on your web server.

2. Write in config/common.php directory path where feedbackra will be placed (as it will appear in URL)

3. Create config file for you form in config directory (i. e. config/sample.php). You can copy sample.php and fill it with your values.

4. Include JS creation script on your page like this:

<script src="/feedbackra/javascript.php?form=sample" type="text/javascript"></script>

Don't forget to change "sample" on your own form name!

To place more than one form on a page, give them different names (instead of "sample") and different config files.

To use form sliding in and out you also have to use jQuery (not included here, you can find it on https://jquery.com).

5. Include styles containing in style.css. You can include it in your CSS files or place directly on the page in <STYLE> tag just like this:
<STYLE> ... contents of style.css ... </STYLE>

You'll need at least styles feedback_form_error, feedback_form_error_hidden, feedback_form_ok. Don't rename it, javascript will try to set them on the elements on the page.

6. Place form from sample.html to your page. Customize it. Look at the IDs, there are types like:

* feedback_form_sample_phone: id of the input field
* feedback_form_sample_error_phone: will be shown if 'phone' is important field and is empty;
* feedback_form_sample_send_button: will be hidden when message will be successfully sent;
* feedback_form_sample_response_ok: will be shown if message will be successfully sent;
* feedback_form_sample_response_error: will be shown if message will not be successfully sent;
* feedback_form_sample_response: will be shown if message will not be successfully sent.

You can look at the example at http://feedbackra.gohdan.ru
