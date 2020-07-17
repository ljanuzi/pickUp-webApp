// load only 10 pages at once 
'use strict';

var numberOfItems = $('#events .eventtest').length;
var limitPerPage = 10;

$('#events .eventtest:gt(' + (limitPerPage - 1) + ')').hide();

var totalPages = Math.ceil(numberOfItems / limitPerPage); //how many pages are needed 

$(".pagination").append("<li class='current-page active'><a href='#'>" + 1 + "</a></li>");

for (var i = 2; i <= totalPages; i++) {
    $(".pagination").append("<li class='current-page'><a href='#'>" + i + "</a></li>"); // page number on the list of pages
}

$(".pagination").append("<li id='next-page'><a href='#' aria-label=Next><span aria-hidden=true>&raquo;</span></a></li>");

$(".pagination li.current-page").on("click", function() {

    // Check if page number that was clicked, is the current page
    if ($(this).hasClass('active')) {
        return false; // do nothing, user clicked on the page number that is already being displayed
    } else {
        var currentPage = $(this).index(); // Get the current page number
        $(".pagination li").removeClass('active'); // Remove the 'active' class status from the page that is currently being displayed
        $(this).addClass('active'); // Add the 'active' class  to the page that was clicked 
        $("#events .eventtest").hide(); // Hide all items in loop
        var grandTotal = limitPerPage * currentPage; // Get the total number of items up to the page number that was clicked on

        // Loop through total items, selecting a new set of items based on page number
        for (var i = grandTotal - limitPerPage; i < grandTotal; i++) {
            $("#events .eventtest:eq(" + i + ")").show(); // Show items from the new page that was selected
        }
    }

});

// Function to navigate to the next page when users click on the next-page id 
$("#next-page").on("click", function() {
    var currentPage = $(".pagination li.active").index(); // Identify the current active page
    // Check to make sure that you stop to the biggest existing page 
    if (currentPage === totalPages) {
        return false; // cant go further, no more pages
    } else {
        currentPage++;
        $(".pagination li").removeClass('active'); // Remove the 'active' class status from the current page
        $("#events .eventtest").hide(); // Hide all items in  loop

        var grandTotal = limitPerPage * currentPage;


        for (var i = grandTotal - limitPerPage; i < grandTotal; i++) {
            $("#events .eventtest:eq(" + i + ")").show();
        }

        $(".pagination li.current-page:eq(" + (currentPage - 1) + ")").addClass('active');
    }
});


$("#previous-page").on("click", function() {
    var currentPage = $(".pagination li.active").index();
    if (currentPage === 1) {
        return false; // cannot navigate to a previous page because the current page is page 1
    } else {
        currentPage--;
        $(".pagination li").removeClass('active');
        $("#events .eventtest").hide(); // Hide all items in the pagination loop
        var grandTotal = limitPerPage * currentPage;


        for (var i = grandTotal - limitPerPage; i < grandTotal; i++) {
            $("#events .eventtest:eq(" + i + ")").show();
        }

        $(".pagination li.current-page:eq(" + (currentPage - 1) + ")").addClass('active'); // Make new page number the 'active' page
    }
});