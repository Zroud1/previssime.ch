<!DOCTYPE html>
<!-- This site was created in Webflow. https://www.webflow.com --><!-- Last Published: Wed Oct 25 2023 08:30:15 GMT+0000 (Coordinated Universal Time) -->
<html
    data-wf-site="65129d80ea060cc3955c1aff">

<head>
    <meta charset="utf-8" />
    <title>form previssime</title>
    <meta content="form previssime" property="og:title" />
    <meta content="form previssime" property="twitter:title" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="Webflow" name="generator" />
    <link href="{{ URL::asset('assets/login/style.css') }}"   rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
       <link href="https://assets-global.website-files.com/65129d80ea060cc3955c1aff/6536568c1e46b97a04fbbd82_logo%20(2)%2032x32.png"  rel="shortcut icon" type="image/x-icon" />
    <link   href="https://assets-global.website-files.com/65129d80ea060cc3955c1aff/6515cdc6da66bde43a984c9c_webflow%20logo%20256x.png"  rel="apple-touch-icon" />
    <style>
      body{
        background: linear-gradient(to bottom, #b1f1ea, #a2ebe1);

     }
    </style>
</head>

<body class="body-5">
    
    <div class="div-block-190">
        <div class="previssime-sign-in-form">
            <div class="div-block-193"><img
                    src="https://assets-global.website-files.com/65129d80ea060cc3955c1aff/651c358ff4ae9f57c52b01f0_Previssime%20only%20the%20logo%206.png"
                    loading="lazy" width="30" alt="" />
                <div class="text-block-119">Previssime</div>
            </div>
            <div class="w-form">
                <form id="email-form"  method="POST" action="{{ route('loginuser') }}"   >
                    @csrf


                    <label for="name"  class="field-label-8">Adresse Email</label>
                    <input type="text" class="text-field-8 w-input"   maxlength="256" name="email" data-name="email" placeholder="" id="email"  required=""/>
                    <label for="email"  class="field-label-9">Mot de Passe</label>

                    <input type="password" class="text-field-9 w-input"  maxlength="256" name="password" data-name="password" placeholder="" id="password" required="" />

                    <div class="div-block-195">
                        <a   href=""   class="link-2">Mot de passe oublié ?</a>
                        <a href="{{route('recuperer')}}" class="link-2">Vous n&#x27;avez pas de compte ?</a>
                    </div>
                    @if(session('error'))
                        <div style="   color: #ff011a; text-align: center; margin-top: 7px  ;font-size: 17px ">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="div-block-194"><input type="submit" value="Connection" data-wait="Patientez..."
                            class="button-7 appear w-button" /></div>
                </form>

            </div>
        </div>
    </div>

    <script src="{{ URL::asset('assets/login/scrypt.js') }}"   type="text/javascript"></script>
 </body>

</html>
