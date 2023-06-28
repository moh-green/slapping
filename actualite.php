<?php

include 'includes/header.php';
include 'includes/nav.php';
include 'includes/footer.php';
include 'includes/menu.php';

new Head('<link rel="stylesheet" href="assets/css/short.min.css"><link rel="stylesheet" href="assets/css/actualite.min.css">');
?>

<body>
    <?php
    new BurgerMenu(true);
    new NavBar(false, true);
    ?>
    <main>
        <div class="titre big-title" id="actualite-title">
            <h2>Actualités</h2>
        </div>
        <article class="titre-article">
            <div>
                <img src="https://place-hold.it/200" alt="">
                <h2>France Travail : le gouvernement présente son projet de réforme de Pôle emploi</h2>
            </div>
            <p>souS titre : on parle ici pour decrire le titre du dessus France Travail : le gouvernement présente son projet de réforme de Pôle emploi en conseil des ministres</p>
        </article>
        <article class="titre-article">
            <div>
                <img src="https://place-hold.it/200" alt="">
                <h2>France Travail réforme de Pôle emploi en conseil des ministres</h2>
            </div>
            <p>souS titre : on parle ici pour decrire le titre du dessus</p>
        </article>
        <article class="titre-article">
            <div>
                <img src="https://place-hold.it/200" alt="">
                <h2>France Travail : le gouvernement présente son projet de réforme de Pôle emploi en conseil des ministres</h2>
            </div>
            <p>souS titre : on parle ici pour decrire le titre du dessus</p>
        </article>
        <div id="blur-background" class="display-none"></div>
        <section class="contenu-article display-none">
            <div class="close">
                <div class="barre" id="barre1"></div>
                <div class="barre" id="barre2"></div>
            </div>
            <h2>LE titre de l'aticle</h2>
            <h3>perspiciatis voluptatibus commodi cum asperiores neque, dicta, tempora itaque dignissimos quis nam magni numquam quibusdam? Fugit dolor quaerat perferendis debitis!</h3>
            <img src="https://place-hold.it/300x200" alt="">
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ullam alias omnis odit dolore laborum, voluptas dolorum, vel quae error iusto amet nulla rem numquam natus fugit reprehenderit? Ipsum, nulla inventore.
                Velit, magnam exercitationem illo libero quibusdam officiis repudiandae aliquam consequatur minus nam explicabo eveniet eligendi harum, ipsam rerum nulla fugiat odit ab! Odio animi, vitae aut modi non ullam consequuntur.
                Ad quos aliquid tempore ipsa maiores at, quia sapiente placeat, distinctio, eveniet adipisci laboriosam laborum expedita ex harum blanditiis quam earum quidem reiciendis totam temporibus fuga commodi. Non, numquam libero?
                Veritatis maxime perspiciatis veniam est aliquid porro et temporibus quibusdam quidem, libero alias omnis laudantium, minus officiis vero, consequuntur repellendus sed inventore amet officia numquam. Perferendis assumenda libero repellat quam!<br>
                Eaque earum temporibus ab aspernatur necessitatibus ipsam quasi minima perspiciatis quaerat aliquam natus cupiditate neque incidunt qui pariatur enim nulla, corrupti officia commodi magni ipsum inventore mollitia aperiam voluptatem? Repudiandae?<br>
                Sed, esse corporis qui eaque quae assumenda eum quia vel minima ipsum tempore iusto molestiae? Nemo ducimus unde explicabo iure vel ratione velit, quaerat a id asperiores. Dignissimos, natus delectus!
                Cupiditate illum eos ratione blanditiis inventore, excepturi nihil eligendi magni dolorum aperiam, similique ad possimus provident iste modi eius. Rerum, quam omnis in tempore mollitia possimus fugit itaque corrupti? Repellat?
                Similique quibusdam fugiat, omnis voluptates placeat quo maiores natus fuga reprehenderit pariatur expedita ex sed qui incidunt possimus, exercitationem laboriosam? Sed libero temporibus debitis optio maxime at delectus asperiores blanditiis?<br>
                Quae corporis dolorem itaque ducimus illo pariatur minima harum amet, exercitationem voluptatibus molestiae a ad eveniet, quisquam ab, labore fugit deleniti! Eos vitae voluptate expedita molestias perferendis quia, sint accusamus!<br><br>
                Vitae voluptas quia atque incidunt, quidem alias! Placeat corrupti ullam perspiciatis similique magnam nesciunt velit totam recusandae, sequi odio distinctio nam officia illum voluptas eveniet. Harum asperiores dolorem laborum perspiciatis?</p>
        </section>
        <section class="contenu-article display-none">

        </section>
        <section class="contenu-article display-none">

        </section>
    </main>
    <?php
    new Footer();
    ?>
    <script src="assets/js/actualite.js"></script>
</body>

</html>