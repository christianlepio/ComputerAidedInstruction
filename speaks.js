
function speakText(){
    var text = document.getElementById('txtscore').value;
    responsiveVoice.speak(text);
    
}
speakText();