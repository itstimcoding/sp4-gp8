function heartAnimation() {
    var x = document.getElementById("heart");
    x.classList.toggle("slide-out-top");
    x.classList.toggle("click");
}

function toggleAnimation(isNew, voteType, creationId){
    if (isNew==1 && voteType!=="voteTypeisUnset"){
        if (voteType == "likes"){
            var likes = "likes-" + creationId;
            console.log(likes);
            var x = document.querySelector("#"+likes);
            x.classList.toggle("slide-out-top");
            console.log("toggled");
        } else 
        if (voteType == "surprised"){
            var x = document.getElementById("surprised-"+creationId);
            x.classList.toggle("slide-out-top");
        } else
        if (voteType == "question_mark"){
            var x = document.getElementById("question_mark-"+creationId);
            x.classList.toggle("slide-out-top");
        } else
        if (voteType == "smart"){
            var x = document.getElementById("smart-"+creationId);
            x.classList.toggle("slide-out-top");
        }
    }
    }