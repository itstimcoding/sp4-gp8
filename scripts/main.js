function heartAnimation() {
    var x = document.getElementById("heart");
    x.classList.toggle("slide-out-top");
    x.classList.toggle("click");
}

function toggle_animation(){
    if (isNew==1 && voteType!=="vote type is unset"){
        if (voteType == "likes"){
            var x = document.getElementById("heart-"+ creationId);
            x.classList.toggle("slide-out-top");
        } else 
        if (voteType == "surprised"){
            var x = document.getElementById("surprised-"+ creationId);
            x.classList.toggle("slide-out-top");
        } else
        if (voteType == "question_mark"){
            var x = document.getElementById("question_mark-"+ creationId);
            x.classList.toggle("slide-out-top");
        } else
        if (voteType == "smart"){
            var x = document.getElementById("smart-"+ creationId);
            x.classList.toggle("slide-out-top");
        }
    }
}