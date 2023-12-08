$(document).ready(() => {
    $("#SubmitBox").on("submit", (e) => {
        let searchtext  = $("#searchbox").val();
        localStorage.setItem("Searchtext",searchtext);

        //reloading the document to display the search results
        window.location.assign("http://mediahub.net/anime_search");
        e.preventDefault();
    });
    
	});

//search functions
function Search(searchtext) {
    let output ="";
    axios.get("https://api.jikan.moe/v3/search/anime?q="+searchtext)
    .then (function (response) {
        let animes = response.data.results;
        
        $.each(animes, (i , anime) => {
            
            output += `<div class="movie-item-style-2 movie-item-style-1 style-3">
            <img src="${anime.image_url}" alt="">
            <div  class="hvr-inner" style="color:red; >
            <button type="button" onclick="topFunction()" class="btn btn-warning btn-sm" style="color:red; font-family: century gothic;" ><a onclick="Animeselected(${anime.mal_id})" href="http://mediahub.net/anime_info">Read more <a/></button>
            </div>
            <div class="mv-item-infor">
            <h6><a onclick="Animeselected(${anime.mal_id})" href="http://mediahub.net/anime_info">${anime.title}</a></h6>
            <p class="rate"><i class="ion-android-star"></i><span>${anime.score}</span> /10</p>    
            </div>
            </div>`;

            
           
        });
    
        $("#animes").html(output);
    })
    .catch(function (response) {
        console.log(response);
    })
    }

//getting popular anime from the API for recommendations
function GetData(data) {
    let output = ""; 
    $("#animes").empty();
    axios.get(data)
    .then (function (response) {
        let animes = response.data.top;
        console.log(response.data.top);
        $.each(animes, (i , anime) => {
            output += `<div class="movie-item-style-2 movie-item-style-1 style-3">
            <img src="${anime.image_url}" alt="">
            <div  class="hvr-inner" style="color:red; >
            <button type="button" onclick="topFunction()" class="btn btn-warning btn-sm" style="color:red; font-family: century gothic;" ><a onclick="Animeselected(${anime.mal_id})" href="http://mediahub.net/anime_info">Read more <a/></button>
            </div>
            <div class="mv-item-infor">
            <h6><a onclick="Animeselected(${anime.mal_id})" href="http://mediahub.net/anime_info">${anime.title}</a></h6>
            <p class="rate"><i class="ion-android-star"></i><span>${anime.score}</span> /10</p>    
            </div>
            </div>`
            
            ; 
        });

        $("#animes").html(output);
    })
}

function Animeselected(id) {
    localStorage.setItem("animeid",id);
}

    