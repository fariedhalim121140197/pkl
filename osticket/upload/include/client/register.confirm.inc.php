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
<strong><?php echo __('Terimakasih telah meregistrasi akun.'); ?></strong>
</p>
<p><?php echo __(
"Kami baru saja mengirimi Anda email ke alamat yang Anda masukkan. Silakan ikuti tautan di email untuk mengonfirmasi akun Anda dan mendapatkan akses ke tiket Anda."
); ?>
</p>
<?php } ?>
