<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POPUP</title>
    <script src="popup.js"></script>
</head>
<style>
    .popup .overlay
    {
        position: fixed;
        top: 0px;
        left: 0px;
        width: 100vw;
        height: 100vh;
        background: rgba(0, 0, 0, 0.7);
        z-index: 1;
        display: none;
    }
    .popup .content
    {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%,-50%)scale(0);
      background: #fff;
      width: 450px;
      height: 220px;
      z-index: 2;
      text-align: center;
      padding: 20px;
      box-sizing: border-box;
    }
    .popup .close-btn
    {
        position: absolute;
        right: 20px;
        top: 20px;
        width: 30px;
        height: 30px;
        background:#222;
        color: #fff;
        font-size: 25px;
        font-weight: 600px;
        line-height: 30px;
        text-align: center;
        border-radius: 50%;
    }
    .popup.active.overlay
    {
       display: block; 
    }
    .popup.active .content
    {
        transition:all 300ms ease-in-out;
        transform:translate(-50%,-50%)scale(1);
    }


</style>
<body>
    <div class="popup" id="popup-1">
        <div class="overlay"></div>
        <div class="content">
            <div class="close-btn" onclick="togglePopup()">&times;</div>
            <h1>LOGIN IS REQUIRED!!!</h1>
            <p>For aceess Property Materix, you must have to login/registred first.<br>
                Then you can see features of Property Materix.
            </p>
        </div>
    </div>



</body>
</html>