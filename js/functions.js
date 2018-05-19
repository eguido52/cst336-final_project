$(document).ready(function(){
    $("#loginBtn").click( function() {
        window.location.href="login.php";
        }
    );
    $("#logoutBtn").click( function() {
        window.location.href="logout.php";
        }
    );
    
    $("#addBtn").click( function() {
        window.location.href="addFood.php";
    })
    
    $("#editBtn").click( function() {
        document.getElementById('editScreen').style.display = 'block';
    })
    
    $("#deleteBtn").click( function() {
        window.location.href="deleteFood.php";
    })
    
});