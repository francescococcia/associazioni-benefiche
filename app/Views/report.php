<form method="post" action="<?= site_url('reports/store') ?>">
    <!-- Your form fields for name, email, and message -->
    <input type="text" name="name" placeholder="Your Name">
    <input type="email" name="email" placeholder="Your Email">
    <textarea name="message" placeholder="Report Message"></textarea>

    <button type="submit">Submit Report</button>
</form>
