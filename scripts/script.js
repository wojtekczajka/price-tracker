document.addEventListener('DOMContentLoaded', function() {
    var submitBtns = document.querySelectorAll('.submit-container button');
    submitBtns.forEach(function(submitBtn) {
        submitBtn.addEventListener('click', function(event) {
            if (!loggedin) {
                event.preventDefault();
                alert('You must be logged in to submit a comment.');
            }
        });
    });
});