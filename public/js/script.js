var googleIconsSharp = document.createElement("link");
googleIconsSharp.rel = "stylesheet";
googleIconsSharp.href = "https://fonts.googleapis.com/icon?family=Material+Icons+Sharp";

var googleIconsSymbols = document.createElement("link");
googleIconsSymbols.rel = "stylesheet";
googleIconsSymbols.href = "https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,700,1,200";

var jQuery = document.createElement("script");
jQuery.src = "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js";

let title = document.createElement("title");
title.innerHTML = "HandSurv";

document.getElementsByTagName("head")[0].appendChild(googleIconsSharp);
document.getElementsByTagName("head")[0].appendChild(googleIconsSymbols);
document.getElementsByTagName("head")[0].appendChild(jQuery);
document.getElementsByTagName("head")[0].appendChild(title);

var connected = false;

function connect(ipaddress, port){
    // Create WebSocket connection
    const socket = new WebSocket('ws://' + ipaddress + ":" + port);

    // When the connection is open, send some data to the server
    socket.addEventListener('open', function (event) {
        //popupDisplay("connectedpopup", "flex");
        console.log('Connected to server');
        connected = true;
    });

    // Listen for messages
    socket.addEventListener('message', function (event) {
        
        // Convert the received message into a blob

        const blob = new Blob([event.data], { type: 'image/jpeg' });

        // Create a URL for the blob
        const url = URL.createObjectURL(blob);

        frame = document.querySelector('.frame');
        // Update the video source with the new frame
        frame.src = url;
        // frame.style.filter = 'grayscale(100%)';

        document.querySelector(".frame-binder").style.display = "block";

        setTimeout(() => {
            URL.revokeObjectURL(url);
        }, 10000);
    });
}

function redirect(path){

    location.href = path;
}

function submitForm(formId){

    document.querySelector("#" + formId).submit();
}

function showHide(hideId, showId, display){
    document.querySelector("#" + hideId).style.display = "none";
    document.querySelector("#" + showId).style.display = display;
}
