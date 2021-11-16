//Archivo de funciones javascript, no mover mucho
function confirmar(){
    if(confirm("Se eliminará un registro, ¿está usted seguro?"))
    {
      return true;
    }
    return false;
}
function confirmarModificar(){
    if(confirm("Se modificará un registro, ¿está usted seguro?"))
    {
      return true;
    }
    return false;
}