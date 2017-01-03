$.ajax({
    type: "GET",
    dataType: "jsonp",
    url: "https://graph.facebook.com/v2.8/MHEventzz/?fields=fan_count&access_token=EAAIwyuNO6SkBAMI6jjZBUZA5oQ6kYnWUduNi6iX4r2kpuuKb5wkt1g0p3NsV4s3PPnHYlO4HZBuKRDUJfLBI7nB7ih65AMdkmaAmFtAV6gwrdiX46RwzBnGQ22YxCV7rnG5onu3qlTZCWvuC1ZA42MC8Go0vPYk0ZD",
    success: function (data) {
        var facebookfollowcount = data.fan_count;
        $(".facebookcount").html(facebookfollowcount);
    }
});