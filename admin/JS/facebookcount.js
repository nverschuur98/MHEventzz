$.ajax({
    type: "GET",
    dataType: "jsonp",
    url: "https://graph.facebook.com/v2.8/MHEventzz/?fields=fan_count&access_token=EAAIwyuNO6SkBAItuLDaEbYEZBQOGWMt5bfSSKtTlaszcTYRNiShdGCHfGZCWnD8xl04WwphWkkFQCziW8OOVOFr8FKBSmm9SdtiyuZCYQ9ELoIZAylgtx9tS2CRvRXnt50cgxQ5sQW0aVBnREwz47lmvgH1Td8cLEOPWaiulnwZDZD",
    success: function (data) {
        var facebookfollowcount = data.fan_count;
        $(".facebookcount").html(facebookfollowcount);
    }
});