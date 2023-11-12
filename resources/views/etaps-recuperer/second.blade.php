<section class="section-8" id="section-2">
    <div class="div-block-111">
        <div class="div-block-112 second-page"></div>
    </div>
    <div class="text-block-70">Vérification d&#x27;identité</div>

    <div class="text-block-71"> Veuillez fournir une copie de votre
            pièce d’identité ( documents valables :
            Passeport, pièce d’identité suisse,
            permis B, permis C, permis G. Les
            pièces d’identité étrangère sont
            valables uniquement si la résidence est
            à l’étranger.)
    </div>
    <div class="form-block-2 second-page w-form" >
        <div class="div-block-173" style="display: flex;">
            <div class="input-first-form margin-2nd-page"><label for="name" class="field-label-3">Document d’identité
                RECTO
                    <span class="text-span">*</span></label>
                <div class="div-block-127">

                    <img src="https://uploads-ssl.webflow.com/65129d80ea060cc3955c1aff/651aa7b89c9d9a09e7347aa6_picture-svgrepo-com%201%20(1).png" loading="lazy" sizes="(max-width: 479px) 100.00000762939453px, 130.98959350585938px" srcset="https://uploads-ssl.webflow.com/65129d80ea060cc3955c1aff/651aa7b89c9d9a09e7347aa6_picture-svgrepo-com%201%20(1)-p-500.png 500w, https://uploads-ssl.webflow.com/65129d80ea060cc3955c1aff/651aa7b89c9d9a09e7347aa6_picture-svgrepo-com%201%20(1).png 600w" alt="" class="image-51" />
                    <div>
                        <div class="text-block-79">Recto</div>
                        <div class="text-block-80">

                            <label for="recto" class="custom-file-upload">
                                <span id="file-label">Choisir le fichier  Prendre une photo</span>
                              </label>
                              <input type="file" name="recto" id="recto" accept="image/*" style="display:none;">
                              <span class="text-danger" id="rectoError"></span>



                              <script>
                                document.getElementById('recto').addEventListener('change', function (e) {
                                  const fileName = e.target.files[0].name;
                                  document.getElementById('file-label').style=" display: inline-block;  position: relative;overflow: hidden;  white-space: nowrap;  text-overflow: ellipsis;  max-width: 100px; "
                                  document.getElementById('file-label').textContent = ` ${fileName}`;
                                });
                              </script>


                        </div>
                    </div>
                </div>
            </div>
            <div class="input-first-form _3rd-page"><label for="name" class="field-label-3">Document d’identité
                VERSO
                      <span class="text-span">*</span></label>
                <div class="div-block-127">
                    <img src="https://uploads-ssl.webflow.com/65129d80ea060cc3955c1aff/651aa7b89c9d9a09e7347aa6_picture-svgrepo-com%201%20(1).png" loading="lazy" sizes="(max-width: 479px) 100.00000762939453px, 130.98959350585938px" srcset="https://uploads-ssl.webflow.com/65129d80ea060cc3955c1aff/651aa7b89c9d9a09e7347aa6_picture-svgrepo-com%201%20(1)-p-500.png 500w, https://uploads-ssl.webflow.com/65129d80ea060cc3955c1aff/651aa7b89c9d9a09e7347aa6_picture-svgrepo-com%201%20(1).png 600w" alt="" class="image-51" />
                    <div>
                        <div class="text-block-79">Verso</div>
                        <div class="text-block-80">



                            <label for="verso" class="custom-file-upload">
                                <span id="file-label-verso">Choisir le fichier  Prendre une photo</span>
                              </label>
                              <input type="file"     name="verso" id="verso" accept="image/*" style="display:none;">
                            <span class="text-danger" id="versoError"></span>



                              <script>
                                document.getElementById('verso').addEventListener('change', function (e) {
                                  const fileName = e.target.files[0].name;
                                  document.getElementById('file-label-verso').style=" display: inline-block;  position: relative;overflow: hidden;  white-space: nowrap;  text-overflow: ellipsis;  max-width: 100px; "
                                  document.getElementById('file-label-verso').textContent = ` ${fileName}`;
                                });
                              </script>

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <div class="text-block-81">Signature <span class="text-span-5">*</span></div>
    <div class="text-block-82">Veillez à ce que votre signature
        soit lisible et identique à celle
        figurant sur votre document
        d’identité. Vous pouvez
        recommencer si la signature n’est
        pas réussie du premier coup.</div>


    <div class="div-block-128" style="height: 225px">

        <div id="signature-pad"><canvas   id="sign"></canvas></div>

        <textarea id='output' name="signature" style="opacity:0; display: none"  readonly ></textarea>
        <a href="#" id="clearBtn"  >Effacer</a>
        <span class="text-danger" id="signatureError"></span>


    </div>
    <span id="outputError" class="text-danger" style="font-size: 20px"></span>

    <div class="div-block-115"></div>
    <div class="div-block-116">
        <a href="#" class="button-4 precedent w-button  " id="prev-btn2">Précédent</a>
        <a href="#" class="button-4 w-button " id="next-btn2">Suivant</a>
    </div>

</section>


