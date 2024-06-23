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
        <div class="connect display-flex-center" id="connect">
            <div class="w-100 text-align-center">
                <div class="display-flex-center">
                    <span class="material-symbols-sharp">
                    camera
                    </span>
                    <span class="bold">HandSurv</span>
                </div>
                <div class="breaker"></div>
                <span>Enter an IP address to start a session</span>
                <div class="breaker"></div>
                <form id="connectform" action="/connect/post" method="get">
                    @csrf
                    @method("GET")
                    <div class="display-flex-space-between">
                        <div class="input-container" style="width: 95%;">
                            <span class="nowrap">IP address - </span>
                            <input type="text" name="ipaddress" value="192.168.0." autocomplete="off">
                        </div>
                        <span class="material-symbols-sharp action-icon-dark cursor-pointer" onclick="redirect('/devices')">
                        tv
                        </span>
                        <span class="material-symbols-sharp action-icon-dark cursor-pointer" onclick="showHide('connect', 'adddevice', 'block')">
                        add
                        </span>
                    </div>
                    <div class="breaker"></div>
                    <div class="button-white" onclick="submitForm('connectform')">
                        <span>Establish connection</span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
