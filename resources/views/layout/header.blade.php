<div class="div-block-131">
    <div class="div-block-132"><img
            src="https://uploads-ssl.webflow.com/65129d80ea060cc3955c1aff/651c1dfeecfa9b8a028b9a51_Previssime%20only%20the%20logo%207.png"
            loading="lazy" width="40" alt="" class="image-52" />
        <div class="text-block-85">Previssime</div>
    </div>

    @if(Route::currentRouteName() !== 'recuperer')
        @if(Auth::check())
        <a href="{{route('loading')}}"  style="text-align: centre;text-decoration: none; padding: 10px; border:1px solid : rgba(100, 179, 124, .8); color:black ">{{Auth::user()->name}}</a>
        @else
        <a href="{{route('login')}}" class="button">Connexion</a>
        @endif
    @endif

</div>
