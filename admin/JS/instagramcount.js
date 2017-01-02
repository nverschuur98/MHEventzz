$.ajax({
    type: "GET",
    dataType: "jsonp",
    url: "https://api.instagram.com/v1/users/742662953?access_token=742662953.9931b0a.749845b82385437ba0b8ab8c171c0c55&meta=200",
    success: function (data) {
        var instagramfollowcount = .append(data.counts.followed_by);
        $(".instagramcount").html(instagramfollowcount);
    }
});