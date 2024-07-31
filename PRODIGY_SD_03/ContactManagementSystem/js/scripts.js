$(document).ready(function(){
    $("#searchInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        var contactCards = $(".contact-card");
        var visibleCards = contactCards.filter(function() {
            return $(this).text().toLowerCase().indexOf(value) > -1;
        });

        contactCards.hide();
        visibleCards.show();

        if (visibleCards.length === 0) {
            $("#noResultsMessage").removeClass("d-none");
        } else {
            $("#noResultsMessage").addClass("d-none");
        }
    });

    function updateTime() {
        var now = new Date();
        var timeString = now.toLocaleTimeString();
        document.getElementById('currentTime').textContent = timeString;
    }

    setInterval(updateTime, 1000); 
    updateTime(); 
});
