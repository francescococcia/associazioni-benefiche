<form method="post" action="<?= site_url('feedbacks/store') ?>">
    <!-- Your form fields for name, email, and message -->
    <input type="number" name="rating" placeholder="Your Name">
    <textarea name="message" placeholder="Report Message"></textarea>

    <button type="submit">Submit Report</button>
</form>
