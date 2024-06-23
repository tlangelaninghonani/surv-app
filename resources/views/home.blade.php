<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ $links['CSS'] }}">
    <script src="{{ $links['JS'] }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
</head>
<body>
    <div class="header">
        <div class="display-flex-align mid-gap">
            <span class="material-symbols-sharp action-icon-light cursor-pointer" onclick="redirect('/connect')">
            west
            </span>
            <span class="material-symbols-sharp cursor-pointer">
            home
            </span>
        </div>
        <div class="display-flex-align cursor-pointer">
            <span class="material-symbols-sharp">
            camera
            </span>
            <div>
                <span class="bold">HandSurv</span>
            </div>
        </div>
        <div class="display-flex-align mid-gap">
            <span>Last active - <span id="lastactive"></span></span>
            <form id="connectform" action="/connect/post" method="get">
                @csrf
                @method("GET")
                <div class="display-flex-align">
                    <div class="display-flex-align">
                        <div class="input-container-gray" style="width: 200px;">
                            <span class="nowrap">IP Address - </span>
                            <input type="text" name="ipaddress" autocomplete="off" value="{{ $data->public_ip }}">
                        </div>
                    </div>
                    <div class="button-div cursor-pointer" onclick="submitForm('connectform')">
                        <span>Reconnect</span>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="display-flex-center-top">
        <div class="frame-binder">
            <div class="">
                
            </div>
            <img class="frame">
        </div>
    </div>
    <script>
        connect("{{ $data->public_ip }}", "{{ $data->port }}");

        var xhr = new XMLHttpRequest();
       

        xhr.onload = function() {
        // Check if the request was successful (status code 200)
        if (xhr.status >= 200 && xhr.status < 300) {
            // Parse the response JSON data
            var responseData = JSON.parse(xhr.responseText);
            
            // Process the response data
            document.querySelector("#lastactive").innerText = responseData.last_active;
            
            if("{{ $data->port }}" !== responseData.port){
                
                location.reload();
            }
            
        } else {
            // Handle HTTP errors
            console.error('Request failed with status code:', xhr.status);
        }
        };

        // Define a function to handle network errors
        xhr.onerror = function() {
        console.error('Network error occurred');
        };

        setInterval(() => {
            // Send the request
            xhr.open('GET', '/connect/fetch_data/{{ $data->public_ip }}', true);
            xhr.send();
        }, 1000);
    </script>
</body>
</html>

