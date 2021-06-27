
function showNumber(number){
    $("#output").val($("#output").val() + number);
}

function removeOutput(){
    $("#output").val($("#output").val().slice(0,-1));
}

function returnNull(){
    $("#output").val(null);
}
