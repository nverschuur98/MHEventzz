$.ajax({
    type: "GET",
    dataType: "jsonp",
    url: "https://graph.facebook.com/v2.8/MHEventzz/?fields=fan_count&access_token=EAACEdEose0cBAOoJtYpEglZAd5Py9xTd9baVLIvokqxVH1CcAOdnDa70canxmPLbCtNzcoZAaIrSD0PsCbkAGZBVltomoyLeMamQ2WdIpZB4XkN3Sx0eZCdZB5rANk9Mb4n4vMVx9LsBKpshPllkMccYzmJOKy3Gx5pu6WlmvqcgZDZD",
    success: function (data) {
        var facebookfollowcount = data.fan_count;
        $(".facebookcount").html(facebookfollowcount);
    }
});