var pop=document.getElementsByClassName('butt');

for(var i=0;i<pop.length;i++){
    button=pop[i];
    button.addEventListener("click",function(event){
        document.querySelector(".popup").style.display ="flex";
        const buttonClicked=event.target;
        // console.log(buttonClicked);
        // console.log(buttonClicked.parentElement.children[1].children[2].innerHTML);
        var name = buttonClicked.parentElement.children[1].getAttribute('data-name');
        var count = buttonClicked.parentElement.children[2].children[1].value;
        var cost = count  * buttonClicked.parentElement.children[1].children[2].innerHTML;
         console.log(name,count,cost);
        document.getElementById('count').value=count;
        document.getElementById('cost').value=cost+'/-';
        document.getElementById('name').value=name;
        document.getElementById('image').src=buttonClicked.parentElement.children[0].src;
        console.log(buttonClicked.parentElement.children[0].src);
    })
    document.getElementById('close').addEventListener("click",function(){
        document.querySelector(".popup").style.display ="none";
    })
}
function test(){
    $.ajax({url:"hi.php",success:function(result){
        alert(result);
    }})
}