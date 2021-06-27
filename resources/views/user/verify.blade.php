<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    	<!-- Favicon -->
	<link rel="shortcut icon" href="{{ asset('dist/img/logo2.png') }}">
	<link rel="icon" href="{{ asset('dist/img/logo2.png') }}" type="image/x-icon">
    
    <title>Verify</title>
    <link href="{{ asset('vendors/bower_components/bootstrap/dist/css/bootstrap.css') }}" rel="stylesheet" type="text/css"/>
       <!-- Custom CSS -->
	<link href="{{ asset('dist/css/verify-style.css') }}" rel="stylesheet" type="text/css">
    <!-- <link href="{{ asset('dist/css/style.css') }}" rel="stylesheet" type="text/css"> -->
</head>
<body>
    <div class="row main-row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="row main">
                <div class="col-md-2"></div>
                <div class="col-md-4 container-grid">
                    <div class="img">
                        <img src="{{ asset('dist/img/pin-code.png') }}" alt="" class="pin-logo">
                    </div>
                    <h5 class="h5-first">Enter your</h5>
                    <h5 class="h5-second">South African ID Number</h5>
                    <span class="text-foot">Your 13 digit South African ID number tells us who you are!</span>
                </div>
                <div class="clerfix"></div>
                <div class="col-md-4  container-grid second">
                    <div class="output-class"><input type="text" id="output" class="verify-output"></div>
                    <div id="container">
                        <ul id="keyboard">   
                            <button onclick="showNumber('1')" class="letter">1</button>  
                            <button onclick="showNumber('2')" class="letter">2</button>  
                            <button onclick="showNumber('3')" class="letter">3</button>  
                            <button onclick="showNumber('4')" class="letter clearl">4</button>  
                            <button onclick="showNumber('5')" class="letter">5</button>  
                            <button onclick="showNumber('6')" class="letter">6</button>  
                            <button onclick="showNumber('7')" class="letter clearl">7</button>  
                            <button onclick="showNumber('8')" class="letter">8</button>  
                            <button onclick="showNumber('9')" class="letter">9</button>  
                            <button onclick="showNumber('0')" class="letter">0</button>  
                            <button data-switch class="switch">abc</button>  
                            <button onclick="returnNull()" class="return">return</button>  
                            <button onclick="removeOutput()" class="delete lastitem"><</button>
                        </ul>  
                    </div>
                </div>
                <div class="col-md-2"></div>
                
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>

   <script src="{{ asset('dist/js/verify.js') }}"></script>
  
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>  
    <!-- <script type="text/javascript" src="js/keyboard.js"></script> -->
</body>
</html>