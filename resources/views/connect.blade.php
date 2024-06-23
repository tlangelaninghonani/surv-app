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
                        <span class="material-symbols-sharp action-icon-dark cursor-pointer" onclick="showHide('connect', 'availipaddressesbinder', 'block')">
                        tv
                        </span>
                    </div>
                    <div class="breaker"></div>
                    <div class="button-white" onclick="submitForm('connectform')">
                        <span>Establish connection</span>
                    </div>
                </form>
            </div>
        </div>
        <div id="availipaddressesbinder" class="display-none">
            <div class="display-flex-center">
                <span class="material-symbols-sharp">
                camera
                </span>
                <span class="bold">HandSurv</span>
            </div>
            <div class="breaker-2"></div>
            <div class="availipaddresses">
                <div class="display-flex-space-between">
                    <span class="material-symbols-sharp cursor-pointer" onclick="showHide('availipaddressesbinder', 'connect', 'flex')">
                    west
                    </span>
                    <span>Connected devices</span>
                    <div></div>
                </div>
                <div class="breaker"></div>
                <div class="breaker-dotted"></div>
                <div class="breaker"></div>
                <div class="display-none">
                    {{ $counter = 0 }}
                </div>
                @foreach($data as $dataItem)
                    <div class="display-none">
                        {{ $counter++ }}
                    </div>
                    <form id="availform{{ $dataItem->id }}" action="/connect/post" method="get" class="display-none">
                        @csrf
                        @method("GET")
                        <input type="text" name="ipaddress" value="{{ $dataItem->public_ip }}">
                    </form>
                    <div class="display-flex-space-between">
                        <div class="display-flex-align mid-gap">
                            <span class="material-symbols-sharp icon-mid">
                            tv
                            </span>
                            <div>
                                <span>User - {{ ucwords(strtolower($dataItem->logged_user)) }}</span><br>
                                <span>IP - {{ $dataItem->public_ip }}</span><br>
                                <span>Last active - {{ $dataItem->last_active }}</span>
                            </div>
                        </div>
                        <span class="material-symbols-sharp action-icon cursor-pointer" onclick="submitForm('availform{{ $dataItem->id }}')">
                        live_tv
                        </span>
                    </div>
                    @if(sizeof($data) !== $counter)
                        <div class="breaker"></div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</body>
</html>
