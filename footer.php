<footer>
	<script>
$(document).ready(function(){
    $("ul.nav li a").click(function(){
        var link = $(this).attr("href");
        if (link != "#") {
            $.get(link, function(data){
                $("#table-responsive").html(data);
            });
        }
        return false;
    });


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

});
</script>
</footer>