<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>

<form method="POST" action="<?= base_url(); ?>/users/update">
    <label>Email:</label>
    <input type="email" name="email" value="<?= $userData['email']; ?>" required>

    <label>First Name:</label>
    <input type="text" name="first_name" value="<?= $userData['first_name']; ?>" required>

    <label>Last Name:</label>
    <input type="text" name="last_name" value="<?= $userData['last_name']; ?>" required>

    <label>Phone Number:</label>
    <input type="text" name="phone_number" value="<?= $userData['phone_number']; ?>" required>

    <label>Birth Date:</label>
    <input type="date" name="birth_date" value="<?= $userData['birth_date']; ?>" required>

    <label>Password:</label>
    <input type="password" name="password">

    <label>Confirm Password:</label>
    <input type="password" name="confirm_password">

    <button type="submit">Update</button>
</form>

<?= $this->endSection() ?>
