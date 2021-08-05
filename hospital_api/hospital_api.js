function getHospital() {
    fetch("https://dekontaminasi.com/api/id/covid19/hospitals")
        .then(a => a.json())
        .then(response => {
            console.log("output", response);
            // for (let i = 0; i < response.length; i++) {
                // const hospital_list = response.name;

                // document.getElementById("output").innerHTML = hospital_list;

                // const monthNames = ["JAN", "FEB", "MAR", "APR", "MAY", "JUN",
                //     "JUL", "AUG", "SEP", "OCT", "NOV", "DEC"];

                // const publishedAt = response.articles[i].publishedAt;
                // const day = publishedAt.substring(8, 10);
                // const monthNumber = publishedAt.substring(5, 7);
                // const month = monthNames[monthNumber - 1];

                // const title = response.articles[i].title.split("-")[0];
                // const description = response.articles[i].description.substring(0, 151) + "...";

                // document.getElementById("news_image" + i).src = response.articles[i].urlToImage;
                // document.getElementById("news_title" + i).innerHTML = title;
                // document.getElementById("news_day" + i).innerHTML = day;
                // document.getElementById("news_month" + i).innerHTML = month;
                // // document.getElementById("news_source" + i).innerHTML = response.articles[i].source.name;
                // document.getElementById("news_description" + i).innerHTML = description;
                // document.getElementById("news_url" + i).href = response.articles[i].url;
            // }
        })
}