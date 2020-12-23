<footer>
	<script>

   $("table.table a").click(function(){
        alert('TEst');
        console.log('It has clicked');
        var link = $(this).attr("href");
        if (link != "#") {
            $.get(link, function(data){
                $("#table-responsive").html(data);
            });
        }
        return false;
    });
$(document).ready(function(){
    $("ul.nav li a").click(function(){
        var link = $(this).attr("href");
        if (link != "#") {
            $.get(link, function(data){
                $('#overlay').show();
                $("#table-responsive").delay(4000).fadeIn().html(data);
                $('#overlay').fadeOut(500);
            });
        }
        return false;
    });

});
function highlight_map_states() {

    if ($(".states_section").size() > 0) {

        $(".states_section .list_states .item .link").hover(function () {
            var a = "#state_" + $(this).text().toLowerCase();
            $(a).attr("class", "state hover");
        }, function () {
            var a = "#state_" + $(this).text().toLowerCase();
            $(a).attr("class", "state")
        })
    }
};

$(function() {
    var $tooltip = $('.tooltip');
    $('path').hover(function(){
        var t = this.getBoundingClientRect().top,
            l = this.getBoundingClientRect().left;
        $tooltip.css({"top": t + "px", "left": l + "px"}).show();
    }, function(){
        $tooltip.hide();
    });
});
</script>
</footer>