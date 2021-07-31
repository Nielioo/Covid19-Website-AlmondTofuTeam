<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="hospital.css">
</head>

<body>
    <?php
    require_once("navigation_bar.html");
    ?>

    <div class="container">
        <section class="hero">
            <h1>A</h1>
            <label>Tagline</label>
            <div class="hero_btn">
                <a href="#" class="btn">A+</a>
                <a href="#" class="btn">A-</a>
            </div>
            
            <div class="search">
                <form onsubmit="event.preventDefault();" role="search">
                    <label for="search">Search for stuff</label>
                    <input id="search" type="search" placeholder="Search..." autofocus required />
                    <button type="submit">Go</button>
                </form>
            </div>
        </section>
    </div>
</body>

</html>