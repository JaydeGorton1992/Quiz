<?php 
isset($_SESSION) || session_start();
?>
<!DOCTYPE html>
<html>
        <head>
    <script src="jquery-1.10.2.js">
    </script>
    </head>
<body>
<link rel="stylesheet" href="Styling.css">

<script id="LoadScript">
    
     $.get("../Quiz/return_quizzes.php", 
        function(data)
        {  
         //Set title for the quiz using first ID 
            var Quizzes = JSON.parse(data); 
            $('#title').html(Quizzes[0]['QuizName']);
            return false;
        });
    
CategoryCount = new Array();//Globals used for Counting Answers
CategoryList = new Array();//Globals used for displaying final results
    
    function getTotalCategories(input, comparison, output)
{
    /*
    This base case for exiting and returning single final output.
    */
    if(comparison.length <= 0)
    {
        return output;
    }
    /*
    This is recursive function that makes output generic
    Since each iteration it incrases size of the array by 1 index
    It will, allow array be dynamically.
    */
    var index = output.length;
    output[index] = 0;
	for(i = 0; i <= input.length;i++)
	{
        if(input[i]==comparison[0])
        {
            output[index] += 1;
        }
	}
    /*
    comparison, was pass by reference meaning when removed Items from 
    array it would remove from global that was used. this caused problems
    during testing as making Array generic would have categories removed
    */
    comparison.shift();
    /*
        this is the recursive method call. This will use output
        of the array and call it again each itteration will remove 
        one comparison From first element.
        once no more elements are found, return it
    */
    output = getTotalCategories(input, comparison, output);
  return output;
}
    
    
/* 	How it works Use, One's the Target Array, for counting.
		Ones output array is Filled with the categories from comparison.
		Input array is recursively removed, so each iteration is, more efficent 
    because once category is checked competely it isn't needed anymore.
    
*/
    
function DisplayFinalResults(NumberOfChosenCateogries, TotalOfEachCategory, Key)
{
    /*
        This simply creating Final result Output
        Calculate for each, Number of Chosen categories from answers
        Then Divide it by total of categories. 
        Once, you have that do each category
        Output the result
    */
    var FinalText = "<div class=finalResult>";
    for(i=0; i <= Key.length - 1;i++)
    {
        var Calc = ((NumberOfChosenCateogries[i] / TotalOfEachCategory[Key[i]]) * 100);
       
        Calc =  Math.floor(Calc * 100) / 100;
        if(Key[i] == 'bbq')
        {
            //alert(Calc + "THIS EXAMPLE OF bbq sauce");
        }
        FinalText += Calc + "% " + Key[i] + "<br>";
    }
    return FinalText + "</div>";
}
 
/* 
Another Global Scope Array
*/
SelectedAnswers = new Array();
    
/*
    Use Current index to display a quiz.
    use this information to return question & Answers
    
*/
function ValidateData(index)
{   
    /*
        Jquery AJAX CALL to PHP page connect to database
    */
     $.get("../Quiz/return_questions.php", 
        function(data)
        {  
            /* Using done function shorthand, Display and questions */
           output.innerHTML = "";
            var Questions = JSON.parse(data);
            /* Check if Questions Length is exected by index
            Indicating that it's end of the quiz
            '*/
            if(Questions.length <= index)
            {
                var newInput = CategoryList.slice(0);
                var FinalCategory = getTotalCategories(SelectedAnswers, newInput, new Array());
                $('#QuestionTitle').html(DisplayFinalResults(FinalCategory, CategoryCount, CategoryList));
                
                $( "#nextQuestion" ).removeClass( "visible" ).addClass( "hidden" );
                $( "#resetQuiz" ).removeClass( "hidden" ).addClass( "visible" );
                /*
                Display end of quiz and reset the classes for the buttons
                */
                return false;
            }
            //Display Quiz Title if it isn't End of the quiz
            $('#QuestionTitle').html(Questions[index]['QuestionTitle']);
         
            /* USING AJAX POST with Current Question Index Return Information */
            $.post("../Quiz/return_answerspost.php", { QuestionID : Questions[index]['QuestionID']},
        function(data)
        {  
                /*
                Display Using Foreach, return and display each equestion so it can be displayed.
                */
            var Questions = JSON.parse(data);
            Questions.forEach(display)
            return false;
        });
        }); 
}
    


function display(item, index, arr)
{
    
    /*
    Using the array Create Input Radio's Display Check if cateogry is Null, if so
    Create the variable Otherwise Increment the count
    This is the Increment used to count how many different Categories are, for final total.
    
    this is used as how many their are. this could been assumed but I had intentions of writing it as generically as possible.
    */
    var radio = "<input type=radio " + " name=answer value=" + arr[index]['answerCategory'] + ">"  + arr[index]['answerText'] + "<br>";
    if(CategoryCount[arr[index]['answerCategory']] == null)
    {
        CategoryCount[arr[index]['answerCategory']] = 1;
    } else
    {
        CategoryCount[arr[index]['answerCategory']] += 1;
    }
    
    /*
    This where I get first categories for first loop.
    these categories are used, Check if it's In the list
    If not Create it. This, Could be made more generic if I made, it
    A associated object array. Which would require it being convereted into array again. So it can be used. 

    
    */
    if(CategoryList[index] == null)
    {
        CategoryList[index] = arr[index]['answerCategory'];
     
    }
  /* Display output this used by manipulating innHTML to display Radio. 
    if javascript fails, My entire quiz doesn't work.
    */
    output.innerHTML = output.innerHTML + radio + "<br>";
}    
    
    index=0;//Index is used count current viewed question

    /*
        This is using document.ready Jquery.
    */
$(document).ready(function()
{      
    output = document.getElementById("demo");//Set the output to demo ID
    ValidateData(index);
});  
    
function getAnswer()
{
    //When clicked Assume error has happened so that doesn't appear for new question
    $( "#error" ).removeClass( "visible" ).addClass( "hidden" );
    var temp = $('input[name=answer]:checked').val();
    //Return Using Jquery selected checkbox
    if(temp == undefined)
    {
        //Change class for error display so that it can be seen
         $( "#error" ).removeClass( "hidden" ).addClass( "visible" );
        return false;
    } else {
        //Push the selected value onto Selected Answers Array
        SelectedAnswers.push(temp)    
    }
    index+= 1;
    ValidateData(index);

};

/*
Reset the quiz by removing Next question Hidden class and making it visible.
Change index back to 0 and then Reset the quiz.
*/
function reset()
{
  $( '#nextQuestion' ).removeClass( 'hidden').addClass( 'visible' );index=0;ValidateData(index);
}
    

$body = $("body");

$(document).on({
    /*
    using Ajax Start And end fuction we can keep track of Ajax Calls.
    This used to start and remove an animation.
    */
    ajaxStart: function() { $body.addClass("loading");    },
     ajaxStop: function() { $body.removeClass("loading"); }    
}); 
    
    function ResetTheQuiz()
    {
        CategoryCount = new Array();
        SelectedAnswers = new Array();
        $( '#nextQuestion' ).removeClass( 'hidden').addClass( 'visible' );index=0;ValidateData(index);$( '#resetQuiz' ).removeClass( 'visible').addClass( 'hidden' );
        
        /*
            Reset the quiz and display nquestion over again
        */
    }

</script>
</body>
<h1 id=title>Which Food Topping are you? </h1>
<div id="wrap">
    <div id="quiz">
        <div id="question-box">
            <div id="logindetails" ></div>
            <div id=QuestionTitle class=''></div>
            <div id=QuestionID></div>
            <form id=question>
                <ul class="answers">
                        <div id="demo"></div>
                </ul>
                <div id=error class=hidden>*an answer wasn't provided</div>
                <div class="modal"><!-- Place at bottom of page --></div>
            </form>

            <div id="nextQuestion"  onclick="getAnswer()">
            Next Question
            </div> 

            <div id="resetQuiz"  onclick="ResetTheQuiz()" class=hidden>
            Reset Quiz
            </div> 
        </div>
    </div>
</div>
</html>
