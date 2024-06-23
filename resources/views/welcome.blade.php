<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ $links['CSS'] }}">
    <script src="{{ $links['JS'] }}"></script>
</head>
<body>
    <div class="loading">
        <div class="text-align-center">
            <div class="display-flex-center">
                <span class="material-symbols-sharp">
                camera
                </span>
                <div>
                    <span class="bold">HandSurv</span>
                </div>
            </div>
            <div class="breaker-2"></div>
            <span class="text-mid">Remote supervision</span>
            <div class="breaker"></div>
            <span>Beta mode</span>
            <div class="breaker-2"></div>
            <div class="display-flex-center">
                <!-- <span>Get started</span>
                <div class="display-flex-center">
                    <span class="material-symbols-sharp action-icon-light cursor-pointer" onclick="redirect('/connect')">
                    east
                    </span>
                </div> -->
                <div class="button" onclick="redirect('/connect')">
                    <span>Get started</span>
                </div>
            </div>
            <!-- <div class="breaker"></div>
            <div>
                <span class="loader"></span>
            </div> -->
        </div>
    </div>
    <script>
        // setTimeout(() => {
        //     redirect("/connect")
        // }, 2000);
    </script>
</body>
</html>
