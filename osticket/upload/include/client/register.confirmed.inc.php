<?php if ($content) {
    list($title, $body) = $ost->replaceTemplateVariables(
        array($content->getName(), $content->getBody())); ?>
<h1><?php echo Format::display($title); ?></h1>
<p><?php
echo Format::display($body); ?>
</p>
<?php } else { ?>
<h1><?php echo __('Registrasi Akun'); ?></h1>
<p>
<strong><?php echo __('Terimakasih telah meregistrasi akun'); ?></strong>
</p>
<p><?php echo __(
"Anda telah mengkonfirmasi alamat email Anda dan berhasil mengaktifkan akun Anda.  Anda dapat melanjutkan untuk memeriksa tiket yang dibuka sebelumnya atau membuka tiket baru."
); ?>
</p>
<p><em><?php echo __('Your friendly support center'); ?></em></p>
<?php } ?>
