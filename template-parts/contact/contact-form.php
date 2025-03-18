<div class="contact-form-section">
    <?php echo do_shortcode('[contact-form-7 id="bb9ac6b" title="Formularz 1"]'); ?>
</div>

<script>
function turnstileCallback(token) {
    document.getElementById('turnstile-token').value = token;
}

</script>
