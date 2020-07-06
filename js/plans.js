function giveBackPlan(){
    var genre = document.getElementById('genre').value;
    var difficulty= document.getElementById('difficulty').value;

    if(genre == 'man' && difficulty == 'beginner')
    {
        document.getElementById('man-beginner').style.display = "block";
        document.getElementById('man-advanced').style.display = "none";
        document.getElementById('woman-beginner').style.display = "none";
        document.getElementById('woman-advanced').style.display = "none";
    }
    if(genre == 'man' && difficulty == 'advanced')
    {
        document.getElementById('man-advanced').style.display = "block";
        document.getElementById('man-beginner').style.display = "none";
        document.getElementById('woman-beginner').style.display = "none";
        document.getElementById('woman-advanced').style.display = "none";
    }
    if(genre == 'woman' && difficulty == 'beginner')
    {
        document.getElementById('woman-beginner').style.display = "block";
        document.getElementById('man-beginner').style.display = "none";
        document.getElementById('man-advanced').style.display = "none";
        document.getElementById('woman-advanced').style.display = "none";
    }
    if(genre == 'woman' && difficulty == 'advanced')
    {
        document.getElementById('woman-advanced').style.display = "block";
        document.getElementById('man-beginner').style.display = "none";
        document.getElementById('man-advanced').style.display = "none";
        document.getElementById('woman-beginner').style.display = "none";
    }
}