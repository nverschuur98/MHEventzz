$.ajax({
    type: "GET",
    dataType: "jsonp",
    url: "http://api.twittercounter.com/?twitter_id=1269973964&apikey=e9335031a759f251ee9b4e2e6634e1c5&output=JSONP&callback=getcount",
    success: function (data) {
        var twitterfollowcount = data.followers_current;
        $(".twittercount").html(twitterfollowcount);
    }
});