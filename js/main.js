let allManga = document.getElementsByClassName("manga_container");
let darkFantasyFilter = document.getElementById("checkbox-dark_fantasy");
let comedyFilter = document.getElementById("checkbox-comedy");
let supernaturalFilter = document.getElementById("checkbox-supernatural");
let psychologicalDramaFilter = document.getElementById("checkbox-psychological_drama");
let filters = document.getElementsByClassName("filter");
let shopButton = document.getElementById("js--shop-button");
let homeButton = document.getElementById("js--home-button");
let home = document.getElementById("js--main");
let shop = document.getElementById("js--shop");

window.scrollTo(0, 0);

shopButton.onclick = function() {
    for (let i = 0; i < filters.length; i++) {
        filters[i].checked = true;
    }
    home.style.display = "none";
    console.log("hij werkt");
    shop.style.display = "flex";
}

homeButton.onclick = function() {
    home.style.display = "flex";
    shop.style.display = "none";
}



console.log(allManga);

darkFantasyFilter.onchange = function() {
    if (darkFantasyFilter.checked === true) {
        for (let i = 0; i < allManga.length; i++) {
            if (allManga[i].dataset.catagory === "Dark fantasy") {
                allManga[i].style.display = "block";
                console.log("script werkt ook");
            }
        }
    } else {
        for (let i = 0; i < allManga.length; i++) {
            if (allManga[i].dataset.catagory === "Dark fantasy") {
                allManga[i].style.display = "none";
            }
        }
    }
}

comedyFilter.onchange = function() {
    if (comedyFilter.checked === true) {
        for (let i = 0; i < allManga.length; i++) {
            if (allManga[i].dataset.catagory === "Comedy") {
                allManga[i].style.display = "block";
            }
        }
    } else {
        for (let i = 0; i < allManga.length; i++) {
            if (allManga[i].dataset.catagory === "Comedy") {
                allManga[i].style.display = "none";
            }
        }
    }
}

supernaturalFilter.onchange = function() {
    if (supernaturalFilter.checked === true) {
        for (let i = 0; i < allManga.length; i++) {
            if (allManga[i].dataset.catagory === "Supernatural") {
                allManga[i].style.display = "block";
            }
        }
    } else {
        for (let i = 0; i < allManga.length; i++) {
            if (allManga[i].dataset.catagory === "Supernatural") {
                allManga[i].style.display = "none";
            }
        }
    }
}

psychologicalDramaFilter.onchange = function() {
    if (psychologicalDramaFilter.checked === true) {
        for (let i = 0; i < allManga.length; i++) {
            if (allManga[i].dataset.catagory === "Psychological Drama") {
                allManga[i].style.display = "block";
            }
        }
    } else {
        for (let i = 0; i < allManga.length; i++) {
            if (allManga[i].dataset.catagory === "Psychological Drama") {
                allManga[i].style.display = "none";
            }
        }
    }
}