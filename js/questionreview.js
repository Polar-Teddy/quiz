    function rightAnswer() {
    document.getElementById("answer").style.backgroundColor = "rgba(0, 137, 41, 0.8)";
    document.getElementById("answer").style.color = "white";
    let x = document.createElement("INPUT");
    x.setAttribute("type", "hidden");
    x.setAttribute("id", "answer");
    x.setAttribute("name", "answer");
    x.setAttribute("value", "answer");
    document.getElementById("answer").appendChild(x);
}

    function wrongChoiceA() {
    document.getElementById("choiceA").style.backgroundColor = "rgba(193, 2, 2, 0.8)";
    document.getElementById("choiceA").style.color = "white";
    document.getElementById("answer").style.backgroundColor = "rgba(0, 137, 41, 0.8)";
    document.getElementById("answer").style.color = "white";
}

    function wrongChoiceB() {
    document.getElementById("choiceB").style.backgroundColor = "rgba(193, 2, 2, 0.8)";
    document.getElementById("choiceB").style.color = "white";

    document.getElementById("answer").style.backgroundColor = "rgba(0, 137, 41, 0.8)";
    document.getElementById("answer").style.color = "white";
}

    function wrongChoiceC() {
    document.getElementById("choiceC").style.backgroundColor = "rgba(193, 2, 2, 0.8)";
    document.getElementById("choiceC").style.color = "white";

    document.getElementById("answer").style.backgroundColor = "rgba(0, 137, 41, 0.8)";
    document.getElementById("answer").style.color = "white";
}



