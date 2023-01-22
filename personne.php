
<html>
<head>
<title></title>
<link href=".css" rel="stylesheet">
</head>
<body>

import ModelRenderer from ‘@3dlook/model-renderer’;
 Frist, import model-renderer package
 
 <div id="canvas-container" style="width: 1280px; height: 720px;"></div>
 
 


<?php
 
 $a=10;
 $b=20


?>




<script>
var payload = {
    "gender": "female",
    "height": <?php $a?>,
    "weight": <?php $b?>,
    "front_image": "base64_decoded_image",
    "side_image": "base64_decoded_image"
}

var settings = {
    "async": true,
    "crossDomain": true,
    "url": "https://saia.3dlook.me/api/v2/persons/?measurements_type=all",
    "method": "POST",
    "headers": {
    "Content-Type": "application/json",
        "Authorization": "APIKey 3b2c7026d471decd0a5f1ae6a3174ff28ea7e7df",
        },
    "processData": false,
    "data": JSON.stringify(payload)
}

$.ajax(settings).done(function (response) {
console.log(response);
});







var m = new ModelRenderer({
    container: '#canvas-container',
  });
  m.init();

m.loadModel(MODEL_URL)
  .then(r => m.displayModel(r))
  .catch(err => alert(err.message));



</script>

</body>
</html>