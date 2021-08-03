function getnews() {
    fetch("https://newsapi.org/v2/top-headlines?country=id&category=health&apiKey=b848541b745c4af083d4794ca0c6d9c9")
        .then(a => a.json())
        .then(response => {
            for (var i = 0; i < response.articles.length; i++) {
                document.getElementById("output").innerHTML +=
                    "<div style='padding-top: 20px'><img style='float: left; width: 150px;' src=" + response.articles[i].urlToImage + "><h1>"
                    + response.articles[i].title + "</h1>"
                    + response.articles[i].publishedAt + "<br>"
                    + response.articles[i].source.name + "<br>"
                    + response.articles[i].description + "<a href="
                    + response.articles[i].url + "target='_blank'>"
                    + response.articles[i].url + "</div>";
            }
        })
}