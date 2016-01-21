<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Chojuku</title>
  <style>
    body{
      font-family: serif;
      color: #fff1d7;<!-- 文字カラー-->
      overflow-x:hidden;
    }
 
   #bg1 {
     background: #35bac5 repeat 0 0 scroll;
    }
 
    h1{
      font-size: 3em;
      padding: 2em 2em 5em;
      margin-top: 0em;
           font-family:"Zapfino";
    }
 
    #gradi{
      color: white;
    }

    .box1{
      border:5px solid #555;
      border-radius: 5px;
      position: fixed;
      top: 7em;
      right: 5em;
      padding:5em;
   //  z-index: 1;
    }
      .box2 {
      border:3px solid #555;
      border-radius: 5px;
      padding:5em;
      margin: 5em;
      background-color: #fcfaf5;
    }
  </style>
</head>
 
<body
<div id="bg1"
data-2000="background-position:800px -1000px;"
data-0="background-position:0px 0px;">
</div>
 
  <h1>Phrases Of Word & Japanese</h1>

  <div class="box2"
       data-100="transform:translate(0,0%)">
  [absolute mode] 左から出現して右へ消える。data-○○○はいくつ並べてもOK。
  </div>
 
  <div class="box2"
       data-100="transform:translate(0,100%)"
       data-200="transform:translate(0,80%)"
       data-300="transform:translate(0,60%)"
       data-400="transform:translate(0,40%)"
       data-500="transform:translate(0,0%)"
       data-600="transform:translate(0,0%)"
       data-700="transform:translate(0,0%)"
       data-800="transform:translate(0,-60%)"
       data-900="transform:translate(0,-120%)">
  [absolute mode] 左から出現して右へ消える。data-○○○はいくつ並べてもOK。
  </div>


  <script src="../js/skrollr.min.js"></script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script>
      var s = skrollr.init();
  </script>
</body>
</html>
