<?php
if(!defined('OSTCLIENTINC')) die('Akses ditolak');

$email=Format::input($_POST['lemail']?$_POST['lemail']:$_GET['e']);
$ticketid=Format::input($_POST['lticket']?$_POST['lticket']:$_GET['t']);

if ($cfg->isClientEmailVerificationRequired())
    $button = __("Kirim Tautan Akses");
else
    $button = __("Lihat Tiket");
?>
<h1><?php echo __('Cek Status Tiket'); ?></h1>
<p><?php
echo __('Silakan berikan alamat email Anda dan nomor tiket.');
if ($cfg->isClientEmailVerificationRequired())
    echo ' '.__('Tautan akses akan dikirimkan ke email Anda.');
else
    echo ' '.__('Ini akan membuat Anda masuk untuk melihat tiket Anda.');
?></p>
<form action="login.php" method="post" id="clientLogin">
    <?php csrf_token(); ?>
<div style="display:table-row">
    <div class="login-box">
    <div><strong><?php echo Format::htmlchars($errors['login']); ?></strong></div>
    <div>
        <label for="email"><?php echo __('Alamat Email'); ?>:
        <input id="email" placeholder="<?php echo __('e.g. john.doe@osticket.com'); ?>" type="text"
            name="lemail" size="30" value="<?php echo $email; ?>" class="nowarn"></label>
    </div>
    <div>
        <label for="ticketno"><?php echo __('Nomor Tiket'); ?>:
        <input id="ticketno" type="text" name="lticket" placeholder="<?php echo __('e.g. 051243'); ?>"
            size="30" value="<?php echo $ticketid; ?>" class="nowarn"></label>
    </div>
    <p>
        <input class="btn" type="submit" value="<?php echo $button; ?>">
    </p>
    </div>
    <div class="instructions">
<?php if ($cfg && $cfg->getClientRegistrationMode() !== 'disabled') { ?>
        <?php echo __('Sudah punya akun disini?'); ?>
        <a href="login.php"><?php echo __('Masuk'); ?></a> <?php
    if ($cfg->isClientRegistrationEnabled()) { ?>
<?php echo sprintf(__('atau %s registrasikan akun %s untuk mengakses semua tiket Anda.'),
    '<a href="account.php?do=create">','</a>');
    }
}?>
    </div>
</div>
</form>
<br>
<p>
<?php
if ($cfg->getClientRegistrationMode() != 'disabled'
    || !$cfg->isClientLoginRequired()) {
    echo sprintf(
    __("Jika ini pertama kalinya Anda menghubungi kami atau Anda kehilangan nomor tiket, silakan %s buka tiket baru %s"),
        '<a href="open.php">','</a>');
} ?>
</p>
