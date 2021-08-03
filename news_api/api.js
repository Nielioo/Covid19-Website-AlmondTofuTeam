function getnews() {
    fetch("https://newsapi.org/v2/top-headlines?country=id&category=health&apiKey=b848541b745c4af083d4794ca0c6d9c9")
        .then(a => a.json())
        .then(response => {
            // document.getElementById("output").innerHTML = response.articles.length;

            for (var i = 0; i < response.articles.length; i++) {
                // document.getElementById("output").innerHTML +=
                //     "<div style='padding-top: 20px'><img style='float: left; width: 150px;' src=" + response.articles[i].urlToImage + "><h1>"
                //     + response.articles[i].title + "</h1>"
                //     + response.articles[i].publishedAt + "<br>"
                //     + response.articles[i].source.name + "<br>"
                //     + response.articles[i].description + "<a href="
                //     + response.articles[i].url + "target='_blank'>"
                //     + response.articles[i].url + "</div>";

                document.getElementById("news_image" + i).src = response.articles[i].urlToImage;
                document.getElementById("news_title" + i).innerHTML = response.articles[i].title;
                // document.getElementById("news_date" + i).innerHTML = response.articles[i].publishedAt;
                // document.getElementById("news_source" + i).innerHTML = response.articles[i].source.name;
                document.getElementById("news_description" + i).innerHTML = response.articles[i].description;

            }
        })
}