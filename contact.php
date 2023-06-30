<?php

include 'includes/header.php';
include 'includes/nav.php';
include 'includes/footer.php';
include 'includes/menu.php';

new Head('<link rel="stylesheet" href="assets/css/short.min.css">');
?>

<body>
    <?php
    new BurgerMenu(true);
    new NavBar(false, true);

    // new BurgerMenu(false);
    // new NavBar(false, true);
    ?>
    <main id="contact-content">
        <div class="title big-title article-text" id="actualite-title">
            <h2>Présentation</h2>
        </div>
        <div class="text">

            <b>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione illum, odio ab quos quibusdam tempore similique nisi in, reprehenderit ea nobis laborum eius exercitationem nemo libero perspiciatis rem deserunt suscipit.</b>
            <p>
                Sit laboriosam consequuntur ipsum et illum fugiat, dolore commodi! Id ipsam natus facere nemo, doloremque, illum vel explicabo velit nisi quaerat ad voluptate accusamus voluptatibus odit autem necessitatibus maxime nulla.
                Ex consectetur a eius delectus quis sapiente facere voluptas ad cumque accusantium voluptates, aliquid, totam architecto soluta ipsam asperiores libero enim odio ea quasi aperiam iste placeat nisi distinctio! Possimus.</p>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt quos expedita in provident odit cum sed iusto, accusantium inventore. Voluptates necessitatibus laudantium molestiae quia, ea quibusdam nisi iste nihil voluptatibus.</p>
            <p>
                Assumenda minima fuga laudantium impedit, itaque nemo explicabo architecto exercitationem blanditiis alias tenetur facere maxime, suscipit qui quo! Sapiente dolore error autem harum commodi qui reprehenderit accusamus ex eum mollitia?
            </p>
        </div>
        <div class="title big-title article-text" id="actualite-title">
            <h2>Ils nous font confiance</h2>
        </div>
        <section id="list-logos">
            <img src="assets/img/facebook.png" alt="">
            <img src="assets/img/instagram.png" alt="">
            <img src="assets/img/youtube.png" alt="">
            <img src="assets/img/instagram.png" alt="">
            <img src="assets/img/youtube.png" alt="">
            <img src="assets/img/facebook.png" alt="">
            <img src="assets/img/facebook.png" alt="">
        </section>
    </main>
    <?php
    new Footer();
    ?>
</body>

</html>