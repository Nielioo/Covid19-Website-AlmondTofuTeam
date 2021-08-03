function getnews(news_amount) {
    fetch("https://newsapi.org/v2/top-headlines?country=id&category=health&apiKey=b848541b745c4af083d4794ca0c6d9c9")
        .then(a => a.json())
        .then(response => {
            for (let i = 0; i < news_amount; i++) {
                // document.getElementById("output").innerHTML +=
                //     "<div style='padding-top: 20px'><img style='float: left; width: 150px;' src=" + response.articles[i].urlToImage + "><h1>"
                //     // + response.articles[i].status + "<br>"
                //     + response.articles[i].title + "</h1>"
                //     + response.articles[i].publishedAt + "<br>"
                //     + response.articles[i].source.name + "<br>"
                //     + response.articles[i].description + "<a href="
                //     + response.articles[i].url + "target='_blank'>"
                //     + response.articles[i].url + "</div>";

                const monthNames = ["JAN", "FEB", "MAR", "APR", "MAY", "JUN",
                    "JUL", "AUG", "SEP", "OCT", "NOV", "DEC"];

                let publishedAt = response.articles[i].publishedAt;
                const day = publishedAt.substring(8, 10);
                const monthNumber = publishedAt.substring(5, 7);
                const month = monthNames[monthNumber - 1];

                document.getElementById("news_image" + i).src = response.articles[i].urlToImage;
                document.getElementById("news_title" + i).innerHTML = response.articles[i].title;
                document.getElementById("news_day" + i).innerHTML = day;
                document.getElementById("news_month" + i).innerHTML = month;
                // document.getElementById("news_source" + i).innerHTML = response.articles[i].source.name;
                document.getElementById("news_description" + i).innerHTML = response.articles[i].description;
                document.getElementById("news_url" + i).href = response.articles[i].url;
            }
        })
}