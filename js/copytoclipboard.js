function copyMail(){
  var outputText = "";
  var targets = document.getElementsByClassName('mail');
  for(var i = 0; i < targets.length; i++) {
    outputText += targets[i].innerText + ";";
  }
  var output = document.getElementById('output1');
  output.innerText = outputText;
  var range = document.createRange();
  range.selectNodeContents(output);
  var selection = window.getSelection();
  selection.removeAllRanges();
  selection.addRange(range);
  document.execCommand('copy');
  output.style.display = 'none';
}
function copyFone(){
  var outputText = "";
  var targets = document.getElementsByClassName('fone');
  for(var i = 0; i < targets.length; i++) {
    outputText += targets[i].innerText + ";";
  }
  var output = document.getElementById('output2');
  output.innerText = outputText;
  var range = document.createRange();
  range.selectNodeContents(output);
  var selection = window.getSelection();
  selection.removeAllRanges();
  selection.addRange(range);
  document.execCommand('copy');
  output.style.display = 'none';
}