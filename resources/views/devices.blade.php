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
            <div class="display-flex-center">
                <span class="material-symbols-sharp">
                camera
                </span>
                <span class="bold">HandSurv</span>
            </div>
            <div class="breaker-2"></div>
            <div class="availipaddresses">
                <div class="display-flex-space-between">
                    <span class="material-symbols-sharp cursor-pointer" onclick="redirect('/connect')">
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
                        <div class="display-flex-align mid-gap">
                            <span class="material-symbols-sharp cursor-pointer" onclick="submitForm('availform{{ $dataItem->id }}')">
                            live_tv
                            </span>
                            <span class="material-icons-sharp cursor-pointer" onclick="redirect('/edit_device/{{ $dataItem->id }}')">
                            tune
                            </span>
                        </div>
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
