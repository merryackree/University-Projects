document.addEventListener("DOMContentLoaded", function(event) {


    var url = window.location.search;
    function fill(url){
      let input = url.slice(url.indexOf("search=")+7);
      console.log(input);
      document.getElementById('searchInput').value = input;
    }

    if (url.indexOf("=") != 0) {
        fill(url);
    }

    var urll = window.location;
        $('ul.nav a[href="'+ urll +'"]').parent().addClass('active');
        $('ul.nav a').filter(function() {
             return this.href == urll;
        }).parent().addClass('active');

});


