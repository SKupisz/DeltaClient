document.querySelector(".clip-button").addEventListener("click",function(){
    let range = document.createRange();
    range.selectNode(document.querySelector(".message-container"));
    window.getSelection().removeAllRanges();
    window.getSelection().addRange(range);
    document.execCommand("copy");
    window.getSelection().removeAllRanges();
});
document.querySelector(".resetBtn").addEventListener("click",function(){
    document.location.href = "",true;
});