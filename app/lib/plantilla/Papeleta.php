<?php
session_start();


$html = '
<header class="clearfix">
  <div class="container">
    <!-- <figure>
      <img class="logo" src="data:image/svg+xml;charset=utf-8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIj8+Cjxzdmcgd2lkdGg9IjM5cHgiIGhlaWdodD0iMzFweCIgdmlld0JveD0iMCAwIDM5IDMxIiB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnNrZXRjaD0iaHR0cDovL3d3dy5ib2hlbWlhbmNvZGluZy5jb20vc2tldGNoL25zIj4KICAgIDwhLS0gR2VuZXJhdG9yOiBTa2V0Y2ggMy40LjEgKDE1NjgxKSAtIGh0dHA6Ly93d3cuYm9oZW1pYW5jb2RpbmcuY29tL3NrZXRjaCAtLT4KICAgIDx0aXRsZT5ob21lNDwvdGl0bGU+CiAgICA8ZGVzYz5DcmVhdGVkIHdpdGggU2tldGNoLjwvZGVzYz4KICAgIDxkZWZzPjwvZGVmcz4KICAgIDxnIGlkPSJQYWdlLTEiIHN0cm9rZT0ibm9uZSIgc3Ryb2tlLXdpZHRoPSIxIiBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiIHNrZXRjaDp0eXBlPSJNU1BhZ2UiPgogICAgICAgIDxnIGlkPSJJTlZPSUNFLTEiIHNrZXRjaDp0eXBlPSJNU0FydGJvYXJkR3JvdXAiIHRyYW5zZm9ybT0idHJhbnNsYXRlKC00Mi4wMDAwMDAsIC00NS4wMDAwMDApIiBmaWxsPSIjRkZGRkZGIj4KICAgICAgICAgICAgPGcgaWQ9IlpBR0xBVkxKRSIgc2tldGNoOnR5cGU9Ik1TTGF5ZXJHcm91cCIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMzAuMDAwMDAwLCAxNS4wMDAwMDApIj4KICAgICAgICAgICAgICAgIDxnIGlkPSJob21lNCIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMTIuMDAwMDAwLCAzMC4wMDAwMDApIiBza2V0Y2g6dHlwZT0iTVNTaGFwZUdyb3VwIj4KICAgICAgICAgICAgICAgICAgICA8cGF0aCBkPSJNMzguMjc5MzM1LDE0LjAzOTk1MiBMMzIuMzc5MDM3OCw5LjAxMjMzODM1IEwzMi4zNzkwMzc4LDMuMjA0MzM2NzQgQzMyLjM3OTAzNzgsMi4xNTQ0MTY1MyAzMS4zODA1NTkyLDEuMzAzMjk3MjggMzAuMTQ2MDE3NiwxLjMwMzI5NzI4IEMyOC45MTQ2MTk2LDEuMzAzMjk3MjggMjcuOTE2MTQxMSwyLjE1NDQxNjUzIDI3LjkxNjE0MTEsMy4yMDQzMzY3NCBMMjcuOTE2MTQxMSw1LjIwOTMzODY1IEwyMy41MjI2OTc3LDEuNDY1NzY5OTggQzIxLjM1MDM4NzksLTAuMzgzODc0MjAyIDE3LjU3MzY3NTEsLTAuMzgwNjA5NjggMTUuNDA2NjcsMS40NjkwMzQ1IEwwLjY1MzA3ODA4NiwxNC4wMzk5NTIgQy0wLjIxNzU5NDQ1OCwxNC43ODM1MDk1IC0wLjIxNzU5NDQ1OCwxNS45ODY3Nzg1IDAuNjUzMDc4MDg2LDE2LjcyODk5NjYgQzEuNTI0NjM0NzYsMTcuNDcyNTU0MSAyLjkzOTQ0MDgxLDE3LjQ3MjU1NDEgMy44MTAxMTMzNSwxNi43Mjg5OTY2IEwxOC41NjIxMzM1LDQuMTU4MDc5MTUgQzE5LjA0MzAwMjUsMy43NTA2ODM2NSAxOS44ODk5MDE4LDMuNzUwNjgzNjUgMjAuMzY4MDIwMiw0LjE1NjgyMzU2IEwzNS4xMjIyOTk3LDE2LjcyODk5NjYgQzM1LjU2MDE0MTEsMTcuMTAwNzMzNSAzNi4xMzA0MDU1LDE3LjI4NTgwNjcgMzYuNzAwNjcsMTcuMjg1ODA2NyBDMzcuMjcyMDE1MSwxNy4yODU4MDY3IDM3Ljg0MzQ1ODQsMTcuMTAwNzMzNSAzOC4yNzk3MjgsMTYuNzI4OTk2NiBDMzkuMTUwNzkzNSwxNS45ODY3Nzg1IDM5LjE1MDc5MzUsMTQuNzgzNTA5NSAzOC4yNzkzMzUsMTQuMDM5OTUyIEwzOC4yNzkzMzUsMTQuMDM5OTUyIFoiIGlkPSJGaWxsLTEiPjwvcGF0aD4KICAgICAgICAgICAgICAgICAgICA8cGF0aCBkPSJNMjAuMjQxMzkyOSw3Ljc2Njk2NTM5IEMxOS44MTI3ODU5LDcuNDAyMDA4NjcgMTkuMTE4OTM5NSw3LjQwMjAwODY3IDE4LjY5MTUxMTMsNy43NjY5NjUzOSBMNS43MTQyMzY3OCwxOC44MjEzMDM2IEM1LjUwOTMxNDg2LDE4Ljk5NTU3ODggNS4zOTMzOTU0NywxOS4yMzM5NzI1IDUuMzkzMzk1NDcsMTkuNDgyNDEwOSBMNS4zOTMzOTU0NywyNy41NDUzNTk2IEM1LjM5MzM5NTQ3LDI5LjQzNzE5MTQgNy4xOTM1ODQzOCwzMC45NzEwMTQxIDkuNDEzODMzNzUsMzAuOTcxMDE0MSBMMTUuODM4NzE1NCwzMC45NzEwMTQxIEwxNS44Mzg3MTU0LDIyLjQ5MjU1MDUgTDIzLjA5MjUxODksMjIuNDkyNTUwNSBMMjMuMDkyNTE4OSwzMC45NzEwMTQxIEwyOS41MTc4OTE3LDMwLjk3MTAxNDEgQzMxLjczODE0MTEsMzAuOTcxMDE0MSAzMy41MzgyMzE3LDI5LjQzNzE5MTQgMzMuNTM4MjMxNywyNy41NDUzNTk2IEwzMy41MzgyMzE3LDE5LjQ4MjQxMDkgQzMzLjUzODIzMTcsMTkuMjMzOTcyNSAzMy40MjMwOTgyLDE4Ljk5NTU3ODggMzMuMjE3NDg4NywxOC44MjEzMDM2IEwyMC4yNDEzOTI5LDcuNzY2OTY1MzkgWiIgaWQ9IkZpbGwtMyI+PC9wYXRoPgogICAgICAgICAgICAgICAgPC9nPgogICAgICAgICAgICA8L2c+CiAgICAgICAgPC9nPgogICAgPC9nPgo8L3N2Zz4=" alt="">
    </figure> -->
    <div class="company-address">
      <h2 class="title">'.$_SESSION['s_dependencia'] .'</h2>
      <div>Sistema de Control Patrimonial</div>
      </div>
  </div>
</header>
<section>
  <div class="container">
    <div class="details clearfix">
      <div class="client left">
        <h2>ORIGEN</h2>
        <p class="name">'.$_SESSION['usr_name'].'</p>
        <p>'.$_SESSION['usr_name'].'</p>
        <p>UNIDAD DE SISTEMAS Y PROCESOS</p>
        <p>PROGRAMADOR</p>
        <p>PERSONAL TECNICO</p>
        <p>42940246</p>
      </div>
      <div class="client right">
      <h4></h4>
          <h2>DESTINO</h2>
              <p class="name">VICTOR ALEJANDRO MARQUINA CARDENAS</p>
        <p>SEDE CABO BLANCO</p>
        <p>UNIDAD DE SISTEMAS Y PROCESOS</p>
        <p>PROGRAMADOR</p>
        <p>PERSONAL TECNICO</p>
        <p>42940246</p>
      </div>
    </div>

    <table border="0" cellspacing="0" cellpadding="0">
      <thead>
        <tr>
          <th class="qty">Id Patrimonial</th>
          <th class="qty">Descripción</th>
          <th class="qty">Marca</th>
          <th class="qty">Modelo</th>
          <th class="qty">Color</th>
          <th class="qty">Serie</th>
          <th class="qty">Estado</th>
          <th class="qty">Observación</th>
        </tr>
      </thead>
      <tbody>
        <tr>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
        </tr>
        <tr>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
        </tr>
        <tr>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
        </tr>
        <tr>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
        </tr>
        <tr>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
        </tr>
        <tr>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
        </tr>
        <tr>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
        </tr>
        <tr>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
        </tr>
        <tr>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
        </tr>
        <tr>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
        </tr>
        <tr>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
        </tr>
        <tr>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
        </tr>
        <tr>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
        </tr>
        <tr>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
        </tr>
        <tr>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
        </tr>
        <tr>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
        </tr>
        <tr>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
        </tr>
        <tr>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
        </tr>
        <tr>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
        </tr>
        <tr>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
        </tr>
        <tr>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
        </tr>
        <tr>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
        </tr>
        <tr>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
        </tr>
        <tr>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
        </tr>
        <tr>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
        </tr>
        <tr>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
        </tr>

        <tr>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
<td>datos</td>
        </tr>
      </tbody>
    </table>
  </div>
</section>
';


//==============================================================
//==============================================================
//==============================================================

include("../mpdf.php");

$mpdf=new mPDF('c', 'A4-L');
$stylesheet = file_get_contents('../../plantilla/css/style.css');
$mpdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text
$mpdf->WriteHTML($html,2);
$mpdf->Output();
exit;

//==============================================================
//==============================================================
//==============================================================


?>
