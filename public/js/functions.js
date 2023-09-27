$(".grid_view").click(function() {
  $("#gridView").show();
  $("#listView").hide();
  return false;
});

$(".list_view").click(function() {
  $("#listView").show();
  $("#gridView").hide();
  return false;
});