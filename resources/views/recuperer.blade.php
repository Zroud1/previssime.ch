@extends('layout.app')
@section('title') previssime landing page @endsection
@section('meta')
<meta content="previssime landing page" property="og:title" />
<meta content="previssime landing page" property="twitter:title" />
<meta content="width=device-width, initial-scale=1" name="viewport" />
<meta content="Webflow" name="generator" />
@endsection

@section('style')
    <link href="{{ URL::asset('assets/first-page/css/style1.css') }}" rel="stylesheet" type="text/css" id="hrefLink" />
    <link href="{{URL::asset('assets/landing-page/style.css')}}" rel="stylesheet" type="text/css" />

    <style>
        .div-block-132{
            margin: auto
        }

        #section-2,#section-3{
            display:none;
        }
        body{
            padding-top: 0;
        }
        #displayverso{
            margin-left: 30px;
        }

        .uselessdiv{
            visibility: hidden
        }
        @media (max-width: 767px) {
            .text-block-70{
                font-size: 18px;
            }
            .uselessdiv{
                display: none;
            }

            #displayrecto{
                margin-bottom: 8px;

            }
            .div-block-173 {
                flex-direction: column; /* Change flex direction to column for mobile */
            }

            .voirdoc{
                flex-direction: column;
                align-items: center;
                padding-right: 7px;padding-left: 7px;
            }

            .img-cin{
                display: flex;
                flex-direction: column;
                gap: 15px;
            }

            #displayVerso{
                margin-left: 0px;
            }
        }

        /* Media query for desktop devices */
        @media (min-width: 768px) {
            .div-block-173 {
                flex-direction: row; /* Change flex direction to row for desktop */
            }
            .input-first-form {
                width: 50%; /* Make each input take half of the width on desktop */
            }

        }


        @media only screen and (max-width: 767px) {
            .text-block-70{
                font-size: 25px;
            }
            .uselessdiv{
                display: none;
            }
            .img-cin{
                display: flex;
                flex-direction: column;
                gap: 15px;
            }
            .div-block-128  canvas {
                    height: 217px;; /* Adjust the height as needed for mobile layout */
            }
            #displayVerso{
                margin-left: 0px;
            }
        }



    </style>
    <!-- Add SweetAlert2 CSS and JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.6/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.6/dist/sweetalert2.all.min.js"></script>

@endsection

@section('script')
<script src="{{ URL::asset('assets/first-page/script.js') }}" type="text/javascript"></script>
@endsection



@section('content')
      <form method="POST" action="{{ route('signaturepad') }}" enctype="multipart/form-data" >
        @csrf
        @if(session('error'))
            <div style="
            background-color: #f8d7da;
            color: #721c24;
            border-color: #f5c6cb;
            padding: 12px;
            margin: 0 auto; /* This centers the alert horizontally */
            width: 50%; /* Adjust the width as needed */
            text-align: center; /* Center the text content */
            border: 1px solid transparent;
            border-radius: 4px;
            ">
                {{ session('error') }}
            </div>
        @endif
         @if(session('succes'))
            <script>

                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: '{{ session('succes') }}',
                        showConfirmButton: true, // Hide the "OK" button
                        timer: 15000, // Auto-close the alert after 40 seconds
                    });
            </script>

         @endif
        @include('etaps-recuperer.first')
        @include('etaps-recuperer.second')

        @include('etaps-recuperer.third')
    </form>
  <script>



    document.addEventListener("DOMContentLoaded", function () {


        //   star SignaturePad

            var wrapper = document.getElementById("signature-pad");
            var canvas = wrapper.querySelector("canvas");

            var sign = new SignaturePad(document.getElementById('sign'), {
                backgroundColor: 'rgba(20, 11, 10, 0)',
                penColor: 'rgb(0, 0, 0)'
            });


            // Wrap your code in a setTimeout function
            function resizeCanvas() {

                var ratio =  Math.max(window.devicePixelRatio || 1, 1);

                canvas.width = canvas.offsetWidth * ratio;
                canvas.height = canvas.offsetHeight * ratio;
                canvas.getContext("2d").scale(ratio, ratio);
            }

            resizeCanvas();





            document.getElementById('clearBtn').addEventListener('click', function() {
                // Assuming 'sign' is the ID of the element you want to clear
                sign.clear();
                outputTextarea = document.getElementById('output');
                outputTextarea.value =  sign.toDataURL();

            });


            document.getElementById('next-btn2').addEventListener('click', function () {
                var dataURL = sign.toDataURL(); // Get base64 data URL
                var outputTextarea = document.getElementById('output');
                outputTextarea.value = dataURL;


            });

        //  end SignaturePad



        function displayStyle(currentSection) {
            var cssFileName = "assets/first-page/css/style" + currentSection + ".css";
            document.getElementById('hrefLink').href = cssFileName;

        }

        var currentSection = 1;
        function formatFieldName(fieldName) {
            var words = fieldName.split(/(?=[A-Z_])/);
            var formattedWords = words.map(function(word) {
                return word.replace(/_/g, ' ').toLowerCase();
            });
            var formattedField = formattedWords.map(function(word) {
                return word.charAt(0).toUpperCase() + word.slice(1);
            });
            return formattedField.join(' ');
        }
        function isValidEmail(email) {
            // A simple email validation regex
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }

        function isValidPassword(password) {
            // Password criteria: at least 8 characters, one letter, one number
            var passwordRegex = /^(?=.*[A-Za-z])(?=.*\d).{8,}$/;
            return passwordRegex.test(password);
        }
        function getImageSizeInBytes(dataImage) {
            const base64Data = dataImage.split(',')[1];
            const decodedData = atob(base64Data);
            const sizeInBytes = decodedData.length;
            return sizeInBytes;
        }

        // valide
            function validateSection1() {
                var fields = [
                    'nom', 'prenom', 'dateNaissance', 'adresse',
                    'ville', 'pays', 'npa','telephone', 'numeroAvs',
                    , 'travaille', 'salarie',
                ];

                for (var i = 0; i < fields.length; i++) {
                    var fieldId = fields[i];
                    var element = document.getElementById(fieldId);
                    var errorSpan = document.getElementById(fieldId + 'Error'); // Get the error span element

                    if (element) {
                        if (element.type === "radio" && !document.querySelector("input[name='" + element.name + "']:checked")) {
                            errorSpan.textContent = "Veuillez sélectionner une option pour " + formatFieldName(element.name);
                            return false;
                        }

                        if (element.value === "") {
                            errorSpan.textContent = "Veuillez remplir " + formatFieldName(element.name);
                            return false;
                        }

                        // Clear the error message if the field is valid
                        errorSpan.textContent = "";
                    }

                }


                return true;
            }
            function validateSection2() {
                var fields = ['recto', 'verso', 'output']; // Add 'output' to the fields array
                //3678
                for (var i = 0; i < fields.length; i++) {
                    var fieldName = fields[i];
                    var element = document.getElementById(fieldName);
                    var errorSpan = document.getElementById(fieldName + 'Error'); // Get the error span element

                    if (element) {
                        if (element.type === "file" && element.files.length === 0) {
                            errorSpan.textContent = "Veuillez sélectionner un fichier";
                            return false;
                        }
                        if (element.type === "file" && element.files[0].size > 2560 * 1024) {
                            errorSpan.textContent = "La taille de l'image ne doit pas dépasser 2.5MB.";
                            return false;
                        }

                        // Check if the current element is the "output" element
                        if (fieldName === 'output') {
                            var outputValue = element.value;

                            var screenSize = window.innerWidth;
                            var maxSize;

                            if (screenSize >= 1200) {
                                maxSize = 16192;
                            } else if (screenSize >= 991 && screenSize <= 1199) {
                                maxSize = 8750;
                            } else if (screenSize <= 767) {
                                maxSize = 7928;
                            }
                            if ( sign.isEmpty()) {
                                errorSpan.textContent = "Signature vide. Veuillez signer avant de continuer.";
                                return false;
                            }
                        }


                        // Clear the error message if the field is valid
                        errorSpan.textContent = "";
                    }
                }

                return true;
            }
            function validateSection3() {
                var fields = ['condition1', 'condition2', 'email', 'password', 'confirmerPassword'];
                var i, l = fields.length;
                var fieldId;

                // File input validation



                for (i = 0; i < l; i++) {
                    fieldId = fields[i];
                    var element = document.getElementById(fieldId);
                    var errorElement = document.getElementById(fieldId + "Error");

                    if (element) {
                        if (element.type === "checkbox" && !element.checked) {
                            errorElement.innerText = "Veuillez accepter ";
                            return false;
                        }

                        if (element.type === "password" && element.value.length < 8) {
                            errorElement.innerText = "Au moins 8 caractères !";
                            return false;
                        }

                        if (element.type === "password" && !/[a-zA-Z]/.test(element.value)) {
                            errorElement.innerText = "Au moins une lettre !";
                            return false;
                        }

                        if (element.type === "password" && !/\d/.test(element.value)) {
                            errorElement.innerText = "Au moins un chiffre";
                            return false;
                        }

                        if (element.value === "") {
                            errorElement.innerText = "Veuillez remplir " + formatFieldName(element.name);
                            return false;
                        }

                        errorElement.innerText = ""; // Clear error message if valid
                    }
                }

                // Check if password and confirmerPassword match
                var passwordElement = document.getElementById("password");
                var confirmerPasswordElement = document.getElementById("confirmerPassword");
                var confirmerPasswordError = document.getElementById("confirmerPasswordError");

                if (passwordElement.value !== confirmerPasswordElement.value) {
                    confirmerPasswordError.innerText = "Les mots de passe ne correspondent pas.";
                    return false;
                }

                return true;
            }
        //




        // Define an array of validation functions for each section
        const validationFunctions = [validateSection1, validateSection2, validateSection3];
        // Combine and validate all sections
        function validateForm() {
            for (const validateSection of validationFunctions) {
                if (!validateSection()) {
                    return false; // Validation failed for at least one section
                }
            }
            return true; // All sections passed validation
        }
        // Attach the validation function to the form submission
        const form = document.querySelector('form');
        if (form) {
            form.onsubmit = function (event) {
                if (!validateForm()) {
                    event.preventDefault(); // Prevent form submission if validation fails
                }

            };
        }



        // Hide Sections 2 and 3 on page load

            displaySignaturePad=1
        document.querySelector("#next-btn").addEventListener("click", function () {
            if (currentSection = 1 && validateSection1()) {
                document.getElementById("section-" + 1).style.display = "none";
                ++currentSection;
                displayStyle(2)
                document.getElementById("section-" + 2).style.display = "flex";
                if(displaySignaturePad==1){
                    setTimeout(  resizeCanvas ,2 )
                    ++displaySignaturePad;
                }
            }
        });
        document.querySelector("#next-btn2").addEventListener("click", function () {
            if (currentSection = 2 && validateSection2()) {
                document.getElementById("section-" + 2).style.display = "none";

                displayStyle(3)
                document.getElementById("section-" + 3).style.display = "flex";
            }
        });

        document.querySelector("#prev-btn2").addEventListener("click", function () {
            if (currentSection = 2) {
                document.getElementById("section-" + currentSection).style.display = "none";
                --currentSection;
                displayStyle(1)
                document.getElementById("section-" + currentSection).style.display = "flex";
            }
        });
        document.querySelector("#prev-btn3").addEventListener("click", function () {
            if (currentSection = 3) {
                document.getElementById("section-" + currentSection).style.display = "none";
                --currentSection;
                displayStyle(2)
                document.getElementById("section-" + currentSection).style.display = "flex";
            }
        });

        function handleResize(){
            if (window.innerWidth <= 767 || window.innerWidth <= 768) {
            document.getElementById('div-img').style.minHeight = '470px';
            } else {
            document.getElementById('div-img').style.minHeight = '230px';
            }
        }
        window.onresize = handleResize;
        document.getElementById('voir').addEventListener('click',function name(params) {
                 // Update the src attribute of 'displayrecto' with the selected image
                    var numeroAvsInput = document.getElementById('recto');
                        var displayrecto = document.getElementById('displayRecto');

                        handleResize();
                        displayrecto.style.display = "inline-block";

                    if (numeroAvsInput.files.length > 0) {
                        var selectedFile = numeroAvsInput.files[0];
                        displayrecto.src = URL.createObjectURL(selectedFile);
                    } else {
                        // Handle the case where no file is selected, e.g., set it to an empty image
                        displayrecto.src = '';
                    }

                    // Update the src attribute of 'displayverso' with the selected image
                    var caissePensionInput = document.getElementById('verso');
                    var displayverso = document.getElementById('displayVerso');
                    displayverso.style.display = "inline-block";

                    if (caissePensionInput.files.length > 0) {
                        var selectedFile = caissePensionInput.files[0];
                        displayverso.src = URL.createObjectURL(selectedFile);
                    } else {
                        // Handle the case where no file is selected, e.g., set it to an empty image
                        displayverso.src = '';
                    }
        })


    });



</script>


@endsection
