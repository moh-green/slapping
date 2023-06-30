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

        <section class="preview-layout" id="actualite">
            <div data-aos="fade-up" class="title big-title aos-init aos-animate" id="actualite-title">
                <h2>Actualités</h2>
            </div>
            <article data-aos="fade-up" class="horizontal-list aos-init aos-animate">
                <div class="actu-image">
                    <img src="assets/img/miniature.jpg" alt="">
                </div>
                <div class="actu-text">
                    <h3>lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.</h3>
                    <p>on parle ici pour donner un eut plus envie de lire l'article qui est quand même très long </p>
                    <h4>
                        <time datetime="2018-07-07">2018/07/07</time>
                    </h4>
                    <a class="btn btn__yellow">Lire</a>
                </div>
            </article>
            <article data-aos="fade-up" class="horizontal-list aos-init aos-animate">
                <div class="actu-image">
                    <img src="assets/img/miniature.jpg" alt="">
                </div>
                <div class="actu-text">
                    <h3>lorem ipsum dolor sit amet consectetur etur adipisicing elit. Qu adipisicing elit. Quisquam, voluptatum.</h3>
                    <p>on parle ici pour donner un eut plus envie de lire l'article qui est quand même très long </p>
                    <h4>
                        <time datetime="2018-07-07">2018/07/07</time>
                    </h4>
                    <a class="btn btn__yellow">Lire</a>
                </div>
            </article>
            <article data-aos="fade-up" class="horizontal-list aos-init aos-animate">
                <div class="actu-image">
                    <img src="assets/img/miniature.jpg" alt="">
                </div>
                <div class="actu-text">
                    <h3>lorem ipsum dolor sit amet consecelit. Qui voluptatum.</h3>
                    <p>on parle ici pour donner un eut plus envie de lire l'article qui est quand même très long </p>
                    <h4>
                        <time datetime="2018-07-07">2018/07/07</time>
                    </h4>
                    <a class="btn btn__yellow">Lire</a>
                </div>
            </article>
            <article data-aos="fade-up" class="horizontal-list aos-init aos-animate">
                <div class="actu-image">
                    <img src="assets/img/miniature.jpg" alt="">
                </div>
                <div class="actu-text">
                    <h3>lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.</h3>
                    <p>on parle ici pour donner un eut plus envie de lire l'article qui est quand même très long </p>
                    <h4>
                        <time datetime="2018-07-07">2018/07/07</time>
                    </h4>
                    <a class="btn btn__yellow">Lire</a>
                </div>
            </article>
            <article data-aos="fade-up" class="horizontal-list aos-init aos-animate">
                <div class="actu-image">
                    <img src="assets/img/miniature.jpg" alt="">
                </div>
                <div class="actu-text">
                    <h3>lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.</h3>
                    <p>on parle ici pour donner un eut plus envie de lire l'article qui est quand même très long </p>
                    <h4>
                        <time datetime="2018-07-07">2018/07/07</time>
                    </h4>
                    <a class="btn btn__yellow">Lire</a>
                </div>
            </article>
            <article data-aos="fade-up" class="horizontal-list aos-init aos-animate">
                <div class="actu-image">
                    <img src="assets/img/miniature.jpg" alt="">
                </div>
                <div class="actu-text">
                    <h3>lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.</h3>
                    <p>on parle ici pour donner un eut plus envie de lire l'article qui est quand même très long </p>
                    <h4>
                        <time datetime="2018-07-07">2018/07/07</time>
                    </h4>
                    <a class="btn btn__yellow">Lire</a>
                </div>
            </article>
            <article data-aos="fade-up" class="horizontal-list aos-init aos-animate">
                <div class="actu-image">
                    <img src="assets/img/miniature.jpg" alt="">
                </div>
                <div class="actu-text">
                    <h3>lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.</h3>
                    <p>on parle ici pour donner un eut plus envie de lire l'article qui est quand même très long </p>
                    <h4>
                        <time datetime="2018-07-07">2018/07/07</time>
                    </h4>
                    <a class="btn btn__yellow">Lire</a>
                </div>
            </article>
        </section>

        <div id="hide-background" class="display-none">
            <div class="article display-none">

                <button class="btn close">
                    <p> &times;</p>
                </button>
                <section class="contenu-article">
                    <h2>Titre lorem ipsum dolor sit amet Titre lorem ipsum dolor amet important </h2>
                    <time datetime="2018-07-07">Publié le 2018/07/07</time>
                    <h3>perspiciatis voluptatibus commodi cum asperiores neque, dicta, tempora perferendis debitis.</h3>
                    <div class="img-banner">
                        <img src="assets/img/miniature.jpg" alt="">
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ullam alias omnis odit dolore laborum, voluptas dolorum, vel quae error iusto amet nulla rem numquam natus fugit reprehenderit? Ipsum, nulla inventore.
                        Velit, magnam exercitationem illo libero quibusdam officiis repudiandae aliquam consequatur minus nam explicabo eveniet eligendi harum, ipsam rerum nulla fugiat odit ab! Odio animi, vitae aut modi non ullam consequuntur.
                        Ad quos aliquid tempore ipsa maiores at, quia sapiente placeat, distinctio, eveniet adipisci laboriosam laborum expedita ex harum blanditiis quam earum quidem reiciendis totam temporibus fuga commodi. Non, numquam libero?
                    </p>
                    <p>
                        Eaque earum temporibus ab aspernatur necessitatibus ipsam quasi minima perspiciatis quaerat aliquam natus cupiditate neque incidunt qui pariatur enim nulla, corrupti officia commodi magni ipsum inventore mollitia aperiam voluptatem? Repudiandae?<br>
                    </p>
                    <p>
                        Sed, esse corporis qui eaque quae assumenda eum quia vel minima ipsum tempore iusto molestiae? Nemo ducimus unde explicabo iure vel ratione velit, quaerat a id asperiores. Dignissimos, natus delectus!
                        Cupiditate illum eos ratione blanditiis inventore, excepturi nihil eligendi magni dolorum aperiam, similique ad possimus provident iste modi eius. Rerum, quam omnis in tempore mollitia possimus fugit itaque corrupti? Repellat?
                    </p>
                    <p>
                        Similique quibusdam fugiat, omnis voluptates placeat quo maiores natus fuga reprehenderit pariatur expedita ex sed qui incidunt possimus, exercitationem laboriosam? Sed libero temporibus debitis optio maxime at delectus asperiores blanditiis?<br>
                    </p>
                    <p>
                        Quae corporis dolorem itaque ducimus illo pariatur minima harum amet, exercitationem voluptatibus molestiae a ad eveniet, quisquam ab, labore fugit deleniti! Eos vitae voluptate expedita molestias perferendis quia, sint accusamus!
                    </p>
                    <p>
                        Vitae voluptas quia atque incidunt, quidem alias! Placeat corrupti ullam perspiciatis similique magnam nesciunt velit totam recusandae, sequi odio distinctio nam officia illum voluptas eveniet. Harum asperiores dolorem laborum perspiciatis?</p>
                    <button onclick="copy_to_clipboard()" class="btn share">
                        <img src="https://cdn-icons-png.flaticon.com/512/54/54910.png" alt="">
                        <p>Share</p>
                    </button>
                </section>
            </div>

            <div class="article display-none">

                <button class="btn close">
                    <p> &times;</p>
                </button>
                <section class="contenu-article">
                    <h2>2Titre lorem ipsum dolor sit amet Titre lorem ipsum dolor amet important </h2>
                    <time datetime="2018-07-07">Publié le 2018/07/07</time>
                    <h3>perspiciatis voluptatibus commodi cum asperiores neque, dicta, tempora perferendis debitis.</h3>
                    <div class="img-banner">
                        <img src="assets/img/miniature.jpg" alt="">
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ullam alias omnis odit dolore laborum, voluptas dolorum, vel quae error iusto amet nulla rem numquam natus fugit reprehenderit? Ipsum, nulla inventore.
                        Velit, magnam exercitationem illo libero quibusdam officiis repudiandae aliquam consequatur minus nam explicabo eveniet eligendi harum, ipsam rerum nulla fugiat odit ab! Odio animi, vitae aut modi non ullam consequuntur.
                        Ad quos aliquid tempore ipsa maiores at, quia sapiente placeat, distinctio, eveniet adipisci laboriosam laborum expedita ex harum blanditiis quam earum quidem reiciendis totam temporibus fuga commodi. Non, numquam libero?
                    </p>
                    <button onclick="copy_to_clipboard()" class="btn share">
                        <img src="https://cdn-icons-png.flaticon.com/512/54/54910.png" alt="">
                        <p>Share</p>
                    </button>
                </section>
            </div>
            <div class="article display-none">

                <button class="btn close">
                    <p> &times;</p>
                </button>
                <section class="contenu-article">
                    <h2>Titre lorem ipsum dolor sit amet Titre lorem ipsum dolor amet important </h2>
                    <time datetime="2018-07-07">Publié le 2018/07/07</time>
                    <h3>perspiciatis voluptatibus commodi cum asperiores neque, dicta, tempora perferendis debitis.</h3>
                    <div class="img-banner">
                        <img src="assets/img/miniature.jpg" alt="">
                    </div>
                    <button onclick="copy_to_clipboard()" class="btn share">
                        <img src="https://cdn-icons-png.flaticon.com/512/54/54910.png" alt="">
                        <p>Share</p>
                    </button>
                </section>
            </div>
        </div>
    </main>
    <?php
    new Footer();
    ?>
    <script src="assets/js/actualite.js"></script>
</body>

</html>