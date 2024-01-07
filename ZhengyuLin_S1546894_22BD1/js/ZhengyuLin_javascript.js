<!-- Add this script to your HTML file -->
<script>
    $(document).ready(function() {
        $("#imageAd").hide().slideDown(1000);

        $("nav a").on("click", function(e) {
            e.preventDefault(); 
            var linkText = $(this).text();
            alert("You clicked on: " + linkText);
        });
    });
</script>
