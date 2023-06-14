<!-- forgot_password.php -->

<h1>Forgot Password</h1>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php elseif (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
<?php endif; ?>

<!-- <form action="<#?= base_url('forgot-password') ?>" method="post"> -->
<form action="<?php echo base_url(); ?>/UsersController/sendForgotPassword" method="post">
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required>

    <button type="submit">Submit</button>
</form>
