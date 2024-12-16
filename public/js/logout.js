
function logout() {
    const formData = $('#logout-user').serialize();
    const logoutUrl = "/logout";

    $.ajax({
        url: logoutUrl,
        type: "GET",
        data: formData,
        success: function(response) {
            
            
        },
        error: function(xhr, status, error) {
            
            console.error("Error during logout:", error);
            alert("Logout failed. Please try again.");
        }
    });
}


$(document).ready(function() {

    

    $("#navbar-logout-btn").click(() => {
        logout();  
    });     

  
});