var count = 60;
var interval1 = setInterval(function(){
    document.getElementById('count').innerHTML=count;
    count--;
    if(count < 10){
        document.getElementById('count').style.backgroundColor = "rgba(218,112,6,0.75)";
        document.getElementById('count').style.border = "5px solid orange";
    }
    if (count === 0){
        clearInterval(interval1);
        document.getElementById('count').style.backgroundColor = "rgba(218,6,6,0.64)";
        document.getElementById('count').style.border = "5px solid red";
        document.getElementById('count').innerHTML='X';
        document.getElementById('questionbox').style.display='none';
        document.getElementById('submitFeedback').innerHTML='<h3>Deine Zeit ist abgelaufen.</h3><h4>Klicke auf Weiter für die nächste Frage.</h4>';
        document.getElementById('submitFeedback').style.color='white';
        document.getElementById('submitFeedback').style.fontSize='larger';
        document.getElementById('submitFeedback').style.textAlign='center';
    }
}, 1000);
