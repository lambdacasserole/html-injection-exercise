/**
 * Synchronises the meessage display element with the file at the given URL.
 *
 * @param url   the URL of the file to synchronise against
 */
function sync(url) {
    var ajax = new XMLHttpRequest();
    ajax.open('GET', url, false);
    ajax.onreadystatechange = function () {
        if(ajax.readyState === 4) {
            if(ajax.status === 200 || ajax.status === 0) {
                if (ajax.responseText == "") {
                    // No victim IP captured, wait.
                    document.getElementById('message').innerText = "Waiting for victim...";
                    document.body.style.background = '#00407b';
                } else {
                    // Victim IP captured. Display!
                    document.getElementById('message').innerText = "Victim IP captured: " + ajax.responseText;
                    document.body.style.background = '#6d0808';
                }
            }
        }
    };
    ajax.send(null);
}

/**
 * Begins synchronising the username and password display elements.
 */
function beginSync() {
    setInterval("sync('/get.php')", 500);
}
