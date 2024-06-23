<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ $links['CSS'] }}">
    <script src="{{ $links['JS'] }}"></script>
</head>
<body>
    <div class="canvas display-flex-center">
        <div>
            <div class="edit-device">
                <div class="display-flex-space-between">
                    <span class="material-symbols-sharp cursor-pointer" onclick="redirect('/devices')">
                    west
                    </span>
                    <span>Edit device</span>
                    <div></div>
                </div>
                <div class="breaker"></div>
                <div class="breaker-dotted"></div>
                <div class="breaker-2"></div>
                <div class="display-flex-align mid-gap">
                    <span class="material-symbols-sharp icon-mid">
                    tv
                    </span>
                    <div>
                        <span>User - {{ ucwords(strtolower($data->logged_user)) }}</span><br>
                        <span>IP - {{ $data->public_ip }}</span><br>
                        <span>Last active - {{ $data->last_active }}</span>
                    </div>
                </div>
                <div class="breaker-2"></div>
                <form id="updatedeviceinfo" action="/update_device_info/{{ $data->id }}" method="post">
                    @csrf
                    @method("POST")
                    <div class="input-container-gray-dark">
                        <span class="nowrap">User - </span>
                        <input type="text" name="loggeduser" value="{{ $data->logged_user }}" autocomplete="off">
                    </div>
                    <div class="breaker"></div>
                    <div class="input-container-gray-dark">
                        <span class="nowrap">IP address - </span>
                        <input type="text" name="ipaddress" value="{{ $data->public_ip }}" autocomplete="off">
                    </div>
                    <div class="breaker"></div>
                    <div class="input-container-gray-dark">
                        <span class="nowrap">Port - </span>
                        <input type="text" name="port" value="{{ $data->port }}" autocomplete="off">
                    </div>
                </form>
                <div class="breaker"></div>
                <div class="button-div" onclick="submitForm('updatedeviceinfo')">
                    <span>Save changes</span>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
