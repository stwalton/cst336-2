<!DOCTYPE html>
<html>
    <head>
        <title> Homework 3 - HTML Forms / PHP </title>
        <meta charset="utf-8">
        <style> 
         @import url("css/styles.css");
        </style>
       
    </head>
    
    <header>
        <h1>Quiz</h1>
    </header>
    
<body>
        
       <div id="quiz">
           <form action="functions.php" method="post" id="quiz">
              
              
                <ol>
                    
                    
                    
                        <name>
                            First name:<br>
                            <input type="text" name="firstname"><br>
                            Last name:<br>
                            <input type="text" name="lastname">
                        </name>
                        
                    
                    
                    
                        
                        <br>
                        
                        <question>
                           <h2>Question 1: What course are is Internet Programming?</h2>
                        </question>
       
                       <select name="question-1">
                           <option value="CST311">CST 311</option>
                           <option value="CST238">CST 238</option>
                           <option value="CST336">CST 336</option>
                           <option value="CST205">CST 205</option>
                        </select>
                       <br>
                    
                    
                    
       
                      <question2>
                          <h2>Question 2: The midtern is on Octoboer 20, and is worth 15%</h2>
                          <input type="radio" name="question-2" value="True" checked> True<br>
                          <input type="radio" name="question-2" value="False">False<br>
                      </question2> 
                    
                    
                    
      
                      <question3>
                        <h2>Question 3: The Professor name is:</h2>
                            <select name="question-3">
                                <option value="Miguel">Miguel Lara</option>
                                <option value="Henderson">Jason Henderson</option>
                                <option value="McCann">Micheal McCann</option>
                                <option value="Hewson">Sam Hewson</option>
                           </select>
                        </question3>
                        
                        <question4>
                            <h2>Question 4: Homeowork is worth 30% of the overall grade.</h2>
                            <input type="radio" name="question-4" value="True" checked> True<br>
                            <input type="radio" name="question-4" value="False">False<br>
                        </question4>
       
                       <br>
                    
                    
                    
                </ol> 
                
                  <h3>Hit submit when your done</h3>
                  <input type="submit" value="Submit" />
          
         </form> 
      
      </div>
      
        <footer>
            <hr>
            CST 336. 2017&copy; Walton <br />
            <strong>Disclaimer:</strong> The information in this webpage is fictitous. <br />
            It is used for academic purpose only. <br />
             <csupic>
                <img src="img/csumb-logo.jpg" alt="Picture on the bottom of the page" />
            </csupic>
            
        </footer>
      
    </body>
    
</html>