function heartAnimation() {
    var x = document.getElementById("likes-21");
    x.classList.toggle("slide-out-top");
    x.classList.toggle("click");
}


function load_top_works(){ // query.load credit : https://api.jquery.com/load/
    if (window.innerWidth>768){
        $(".top-creations").load("controller/top3_fetch_data.php"); // loads file into div specified
    } else {
        $(".top-creations").load("controller/top3_fetch_data(mobile).php");
    };
    
};

function load_recent_works(){ //  Method Mr Madhan taught, jquery get function
    $.get( "controller/recent_fetch_data.php", function(data) {
        $("#recent-creations-content").html(data);
    });
};


//sets current & checks database for new votes
function check_db_new(){     
    $.ajax({
        url: "controller/new_data_check.php",
        async: false,
        success: function(data) {
            $("#check").html(data);
            // Handle the response data here
            var hiddenInput = document.querySelector('#is_new_vote');
            var hiddenInput2 = document.querySelector('#vote_type');
            var hiddenInput3 = document.querySelector('#creation_id');
            var hiddenInput4 = document.querySelector('#old_id');
            var hiddenInput5 = document.querySelector('#new_id');
    

            // Get the value of the hidden inputs
            var isNew = hiddenInput.value;
            var voteType = hiddenInput2.value;
            var creationId = hiddenInput3.value;
            var old_id = hiddenInput4.value;
            var new_id = hiddenInput5.value;

            console.log("isNew:     "+isNew);
            console.log("voteType:  "+voteType);
            console.log("creationId:"+creationId);
            console.log("old_id:    "+old_id);
            console.log("new_id:    "+new_id);

            if (isNew == 1){
                toggleAnimation(isNew, voteType, creationId);
            }
            return(isNew, voteType, creationId)
        }
    });
};


// toggle animation for visitor to see their likes on the TV screen
function toggleAnimation(isNew, voteType, creationId){
    if (isNew==1 && voteType!=="voteTypeisUnset"){
        if (voteType == "likes"){
            // selects based on Id and then toggles class to put and remove class for animation
            var id = "#likes-" + creationId;
            console.log("id query:  "+id);
            var x = document.querySelector(id);
            console.log("x       : "+x.classList);
            
            // toggle animation and have delay for second one
            console.log("toggled");
            // setTimeout(classToggle(x), 5000);
            //console.log("untoggled");
        } else 
        if (voteType == "surprised"){
            var id = "surprised-" + creationId;
            console.log("id query:  "+id);
            var x = document.querySelector("#"+id);
            classToggle(x);
            console.log("toggled");
            setTimeout(classToggle(x), 7000);
            console.log("untoggled");
        } else
        if (voteType == "question_mark"){
            var id = "question_mark-" + creationId;
            console.log("id query:  "+id);
            var x = document.querySelector("#"+id);
            classToggle(x);
            console.log("toggled");
            setTimeout(classToggle(x), 700);
            console.log("untoggled");
        } else
        if (voteType == "smart"){
            var id = "smart-" + creationId;
            console.log("id query:  "+id);
            var x = document.querySelector("#"+id);
            console.log(x);
            classToggle(x);
            console.log("toggled");
            // setTimeout(classToggle(x), 700);
            // console.log("untoggled");
        }
    }
}


function classToggle(x) {
    x.classList.add("slide-out-top");
}