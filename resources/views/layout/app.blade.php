<!DOCTYPE html >
<!-- This site was created in Webflow. https://www.webflow.com --><!-- Last Published: Fri Oct 06 2023 13:56:52 GMT+0000 (Coordinated Universal Time) -->
<html data-wf-page="651c1bf7b7970eb87797b251">

<head>
   @include('layout.style')
   @yield('style')

   <style>
    .button{
        width: 200px;
        height: 60px;
        color: #fff;
        background-color: rgba(1, 79, 221, .86);
        background-image: url("https://assets-global.website-files.com/65129d80ea060cc3955c1aff/6537cabc57ac41a7231a29d7_Rectangle%20197%20(1).png");
        background-position: 0 145%;
        background-repeat: no-repeat;
        background-size: auto;
        border: .5px solid rgba(94, 94, 94, .63);
        border-radius: 250px;
        text-decoration: none;
        padding: 20px;
        font-family: Varela Round, sans-serif;
        font-size: 18px;
        font-weight: 400;
        line-height: 24px;
        transition: background-position .35s;

        box-shadow: 0 0 5px rgba(0, 0, 0, .15);
    }

    .button:hover {
    background-position: 0;
  }
    @media only screen and (max-width: 767px){
        .button{
            width: 140px;
        height: 50px;
        font-size: 14px;
        }
        .div-block-131{
            justify-content: space-between;
            padding-left: 18px;
            padding-right: 18px;
        }
    }


   </style>
</head>


   @include('layout.header')

   @yield('content')


    @include('layout.footer')
    @include('layout.script')
    @yield('script')



</html>
