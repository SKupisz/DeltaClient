let iterationsCounter = 0, fasten = 200;
function sleep(milliseconds) {
    var start = new Date().getTime();
    for (var i = 0; i < 1e7; i++) {
      if ((new Date().getTime() - start) > milliseconds){
        break;
      }
    }
  }
function startAnimation(){
    setTimeout("replacement(0)",500);
}
function replacement(letter){
    if(letter == -1){
      document.querySelector(".welcome-container").classList.add("exit");
      setTimeout(function(){document.querySelector(".main-slide").classList.remove("exit");},850);
      setTimeout(function(){})
    }
    else{
      let forReplaceTable = [["%","$","@","W"],["A","!","8","E"],
      ["%","$","@","L"],["2","$","p","C"],
      ["~","#","}","O"], ["A","r","Y","M"], ["M","E","O","E"],
      ["Q","U","{"," "], ["(","&",")","T"], ["A","T","L","O"],
      [":","V","["," "], ["K","4","u","D"], ["$","6","1","E"],
      ["?","|","]","L"], ["N","B","v","T"], ["2","A","C","A"]];
      let lettersList = document.getElementsByClassName("forTheReplace");
      for(let i = 0 ; i < lettersList.length; i++){
          let objForChange = lettersList[i];
          let forReplace = forReplaceTable[i][letter];
          setTimeout(function(){change(objForChange,forReplace);},100);
      }
      if(letter == 3){
        setTimeout("replacement(-1)",500);
      }
      else if(letter < forReplaceTable[0].length-1){
        iterationsCounter++;
        if(iterationsCounter < 51){
          forNext = letter+1;
          forNext%=(forReplaceTable[0].length-1);
          if(fasten-4 > 0) fasten-=4;
          else fasten = 1;
          setTimeout("replacement(forNext)",fasten);
        }
        else{
          forNext = 3;
          setTimeout("replacement(forNext)",100);
        }
        
      }
    }
}
function change(ob,b){
  ob.innerHTML = b;
}