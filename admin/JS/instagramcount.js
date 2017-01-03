$.ajax({
  type: "GET",
  dataType: "jsonp",
  url: "https://api.instagram.com/v1/users/4268922216?access_token=4268922216.bc2e34a.c0b40e8e8b9246a88be4c4675b4146c8",
  success: function(data) {
    $('.instagramcount').text(data.data.counts.followed_by);
  }
});