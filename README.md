feedbackra
==========

Feedbackra is feedback sender.


=== Installation ===

1. Place Feedbackra in some directory on your web server.

2. Write in config/common.php directory path where feedbackra will be placed (as it will appear in URL)

3. Create config file for you form in config directory (i. e. config/sample.php). You can copy sample.php and fill it with your values.

4. Include JS creation script on your page like this:

<script src="/feedbackra/javascript.php?form=sample" type="text/javascript"></script>

To use form sliding in and out you also have to use jQuery (not included here). Don't forget to change "sample" on your own form name!

5. Include styles containing in style.css. You can include it in your CSS files or place directly on the page in <STYLE> tag just like this:
<STYLE> ... contents of style.css ... </STYLE>

6. Place from from sample.html to your page. Customize it. Look at the IDs: there are three types like:

* feedback_form_phone: id of the input field
* feedback_form_error_phone: will be shown if 'phone' is important field and is empty;
* feedback_form_send_button: will be hidden when message will be successfully sent;
* feedback_form_response_ok: will be shown if message will be successfully sent;
* feedback_form_response_error: will be shown if message will not be successfully sent;
* feedback_form_response: will be shown if message will not be successfully sent.


