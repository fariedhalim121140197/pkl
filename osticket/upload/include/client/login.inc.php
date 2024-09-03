<?php
if(!defined('OSTCLIENTINC')) die('Akses ditolak');

$email=Format::input($_POST['luser']?:$_GET['e']);
$passwd=Format::input($_POST['lpasswd']?:$_GET['t']);

$content = Page::lookupByType('banner-client');

if ($content) {
    list($title, $body) = $ost->replaceTemplateVariables(
        array($content->getLocalName(), $content->getLocalBody()));
} else {
    $title = __('Masuk');
    $body = __('To better serve you, we encourage our clients to register for an account and verify the email address we have on record.');
}

?>
<h1><?php echo 'Masuk'; ?></h1>
<p><?php echo 'Untuk melayani Anda dengan lebih baik, kami mendorong klien kami untuk mendaftar akun dan memverifikasi alamat email yang kami catat.' ?></p>
<form action="login.php" method="post" id="clientLogin">
    <?php csrf_token(); ?>
<div style="display:table-row">
    <div class="login-box">
    <strong><?php echo Format::htmlchars($errors['login']); ?></strong>
    <div>
        <input id="username" placeholder="<?php echo __('Email atau Username'); ?>" type="text" name="luser" size="30" value="<?php echo $email; ?>" class="nowarn">
    </div>
    <div>
        <input id="passwd" placeholder="<?php echo __('Password'); ?>" type="password" name="lpasswd" size="30" maxlength="128" value="<?php echo $passwd; ?>" class="nowarn"></td>
    </div>
    <p>
        <input class="btn" type="submit" value="<?php echo __('Masuk'); ?>">
<?php if ($suggest_pwreset) { ?>
        <a style="padding-top:4px;display:inline-block;" href="pwreset.php"><?php echo __('Lupa Password? Klik Ini.'); ?></a>
<?php } ?>
    </p>
    </div>
    <div style="display:table-cell;padding: 15px;vertical-align:top">
<?php

$ext_bks = array();
foreach (UserAuthenticationBackend::allRegistered() as $bk)
    if ($bk instanceof ExternalAuthentication)
        $ext_bks[] = $bk;

if (count($ext_bks)) {
    foreach ($ext_bks as $bk) { ?>
<div class="external-auth"><?php $bk->renderExternalLink(); ?></div><?php
    }
}
if ($cfg && $cfg->isClientRegistrationEnabled()) {
    if (count($ext_bks)) echo '<hr style="width:70%"/>'; ?>
    <div style="margin-bottom: 5px">
    <?php echo __('Belum daftar?'); ?> <a href="account.php?do=create"><?php echo __('Buat akun'); ?></a>
    </div>
<?php } ?>
    <div>
    <b><?php echo __("I'm an agent"); ?></b> —
    <a href="<?php echo ROOT_PATH; ?>scp/"><?php echo __('Masuk disini'); ?></a>
    </div>
    </div>
</div>
</form>
<br>
<p>
<?php
if ($cfg->getClientRegistrationMode() != 'disabled'
    || !$cfg->isClientLoginRequired()) {
    echo sprintf(__('Jika ini pertama kalinya Anda menghubungi kami atau Anda kehilangan nomor tiket, silakan %s buka tiket baru %s'),
        '<a href="open.php">', '</a>');
} ?>
</p>
