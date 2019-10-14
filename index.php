<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel = "stylesheet" href = "./src/css/home.css"/>
    <link rel = "icon" href = "./src/img/logo2.png"/>
    <title>The delta cypher</title>
</head>
<body onload = "startAnimation()" class = "no-overflow">
    <?php require_once "./src/components/main/loading.php"; ?>
    <div class = "main-slide blocked exit">
        <section class = "welcoming">
            <header class = "main-header">What is Delta?</header>
            <div class = "describe-list">
                <div class = "list-item first-item">- Is it a bird? - No!</div>
                <div class = "list-item secont-item">- Is it a plane? - No!</div>
                <div class = "list-item final-item">Then what is this?</div>
            </div>
        </section>
        <section class = "presentation closed-section">
            <header class = "present-header">Delta</header>
            <main class = "main-speech">The delta cypher was created in order of protecting text data. For the last 9 months, we have been developing the cypher to make it as secure as possible.
                And we can say - we did our best.
            </main>
            <section class = "maybeTrial">
                <header class = "trial-header">Want to try?</header>
                <article class = "trial-desc">
                    No problem - just write to us on our email, and we will contact you as soon as possible.
                    It will not take a long time when you can be satistied with our security system protecting your data.
                </article>
            </section>
            <aside class = "hyperlinks">
                <a href = "./about">
                    <button class = "link-to">About us</button>
                </a>
                <a href = "./panel">
                    <button class = "link-to">Cyphering panel</button>
                </a>
            </aside>
        </section>
    </div>
</body>
<script src = "./src/jsLibrarys/particles.js"></script>
<script src = "./src/js/app.js"></script>
<script src = "./src/js/home.js"></script>
</html>