<?php
/*
Template Name: Contact Page
*/
get_header();
?>

<div class="post">
    <h2>📞 Contact Us</h2>

    <p>💖 We’d love to hear from you! Whether you have a question about our products, shipping, or anything else, our
        DMs are always open!</p>

    <h3>📬 Contact Details</h3>
    <ul>
        <li>📧 Email: <a href="mailto:theexfinland@example.com">theexfinland@example.com</a></li>
        <li>📱 Phone: 039284324</li>
        <li>📍 Address: Helsinki, Finland</li>
        <li>📸 Instagram: <a href="https://instagram.com/your_insta">@your_insta</a></li>
    </ul>

    <h3>🗺️ Find Us on the Map</h3>
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1982.9262955909773!2d24.94050641579228!3d60.16985588202585!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46920bdbf3331fd7%3A0x9465ec61c9c0505d!2sHelsinki%2C%20Finland!5e0!3m2!1sen!2sfi!4v1685514692571!5m2!1sen!2sfi"
        width="100%" height="300" style="border:1px solid #ffb6c1; border-radius: 10px;" allowfullscreen=""
        loading="lazy" referrerpolicy="no-referrer-when-downgrade">
    </iframe>

    <h3>💌 Send Us a Message</h3>
    <form action="mailto:theexfinland@example.com" method="post" enctype="text/plain">
        <label>Name:</label><br>
        <input type="text" name="name" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Message:</label><br>
        <textarea name="message" rows="4" required></textarea><br><br>

        <input type="submit" value="💖 Send">
    </form>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>