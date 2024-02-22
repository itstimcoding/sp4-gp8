function heartAnimation() {
    var x = document.getElementById("heart");
    x.classList.toggle("slide-out-top");
    x.classList.toggle("click");
}

// toggle animation for visitor to see their likes on the TV screen
function toggleAnimation(isNew, voteType, creationId){
    if (isNew==1 && voteType!=="voteTypeisUnset"){
        if (voteType == "likes"){
            // selects based on Id and then toggles class to put and remove class for animation
            var id = "likes-" + creationId;
            console.log(id);
            var x = document.querySelector("#"+id);
            x.classList.toggle("slide-out-top");
            // toggle animation and have delay for second one
            console.log("toggled");
            setTimeout(classToggle, 500);
            console.log("untoggled");
        } else 
        if (voteType == "surprised"){
            var id = "surprised-" + creationId;
            console.log(id);
            var x = document.querySelector("#"+id);
            console.log(x);
            x.classList.toggle("slide-out-top");
            console.log("toggled");
            setTimeout(classToggle, 7000);
            console.log("untoggled");
        } else
        if (voteType == "question_mark"){
            var id = "question_mark-" + creationId;
            console.log(id);
            var x = document.querySelector("#"+id);
            x.classList.toggle("slide-out-top");
            console.log("toggled");
            setTimeout(classToggle, 700);
            console.log("untoggled");
        } else
        if (voteType == "smart"){
            var id = "smart-" + creationId;
            console.log(id);
            var x = document.querySelector("#"+id);
            x.classList.toggle("slide-out-top");
            console.log("toggled");
            setTimeout(classToggle, 700);
            console.log("untoggled");
        }
    }
}


function classToggle(x) {
    x.classList.toggle("slide-out-top");
}