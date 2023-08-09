window.addEventListener('load', function(){
    // Call the function when the page loads
    console.log('loaded');
    checkSubscriptionDND();
});

function setSubscriptionDNDCookie() {
    console.log('clicked');
    var cookieName = "subscriptionDND";
    var cookieValue = "true";
    var expirationDays = 30; // Cookie expires after 30 days

    // Create the cookie
    var date = new Date();
    date.setTime(date.getTime() + (expirationDays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + date.toUTCString();
    document.cookie = cookieName + "=" + cookieValue + ";" + expires + ";path=/";

    // Hide the content
    document.getElementById("subscription-alert").style.display = "none";
}

// Check if the cookie exists
function checkSubscriptionDND() {
    let  cookieName = "subscriptionDND";
    let  cookies = document.cookie.split(';');
    let  status = false;

    for (let i = 0; i < cookies.length; i++) {
        const cookie = cookies[i].trim();
        if (cookie.indexOf(`${cookieName}=`) === 0) {
        // Cookie found
          status = true;
        }
    }

    if(status){
        document.getElementById("subscription-alert").style.display = "none";
    }else{
        document.getElementById("subscription-alert").style.display = "block";
    }
}