function opmanual(nroPapeleta,tipoPapeleta,localOrigen,localDestino,fechaPapeleta,motivoPapeleta){
  return{
    nroPapeleta:nroPapeleta,
    tipoPapeleta:tipoPapeleta,
    localOrigen:localOrigen,
    localDestino:localDestino,
    fechaPapeleta:fechaPapeleta,
    motivoPapeleta:motivoPapeleta,
    getData: function(){
      var uri="../assets/pmanual/getpmaual.php?nroPapeleta="+this.nroPapeleta+"&tipoPapeleta="+
      this.tipoPapeleta+"&localOrigen="+this.localOrigen+"&localDestino="+this.localDestino+"&fechaPapeleta="+this.fechaPapeleta+
      "&motivoPapeleta="+this.motivoPapeleta
      if (window.XMLHttpRequest) {
        var http=getXMLHTTPRequest();
      }
      http.open("GET", uri, false);
    }
  }



}
