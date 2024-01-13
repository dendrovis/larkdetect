var canvas = document.getElementById("canvas");
var ctx = canvas.getContext("2d");
var circles = [];
var a = 1;

//var msgObj = document.getElementById("msg");
//var msg2Obj = document.getElementById("msg2");
var firstResult=document.getElementById("firstResult");
var xPos, yPos, circX, circY, clickInfo = [];
var mousedown=false;
var nextIndex;
var interval;

var numOfAttempt=3;
var dataURL;

var isDrawing;
var lastX;
var lastY;
var dataURL;
var numOfAttempt=3;
var errorRate=0;

//new
//new
var los = true;
var rngCircle;
var counter = 0;
var counter2 = 0;
var counter3 = 0;
var counter4 = 0;
var overcounter = 0;
var randX;
var randY;
var valid = true;
var overlapping = false;
var other;
var dy;
var dx;
var rr;
var toggle = true;

var m, cx , cy, cr, cf, ca, cb, cc; //cf , cb and cc are classify as common formula
var Pbi1_x,Pbi1_y,Pbi2_x,Pbi2_y
var chk1_b , chk2_b;
var P_ax, P_ay,P_bx, P_by, P_cx,P_cy, P_dx , P_dy, dv;
var chk1,chk2,chk1_ab,chk2_ab,chk1_cd,chk2_cd,chk1_ac,chk2_ac,chk1_bd,chk2_bd;

var userArray=[];

// window.onload=generateCir();

// var m, cx , cy, cr, cf, ca, cb, cc; //cf , cb and cc are classify as common formula
// var Pbi1_x,Pbi1_y,Pbi2_x,Pbi2_y
// var chk1_b , chk2_b;
// var P_ax, P_ay,P_bx, P_by, P_cx,P_cy, P_dx , P_dy, dv;
// var chk1,chk2,chk1_ab,chk2_ab,chk1_cd,chk2_cd,chk1_ac,chk2_ac,chk1_bd,chk2_bd;

// var userArray=[];

window.onload=loadDiv();
function loadDiv()
{
    location.href = "#popup3";   
    
}
function Start()
{
    
    generateCir();
    startTest();
}
function generateCir()
{

    while (circles.length < 25) {

        los = true;
        overlapping = false;
        
        //limit
        if(circles.length < 1 && circles.length >= 0)
        {
            randX = Math.floor(Math.random()* 940 + 40);
            randY = Math.floor(Math.random()* 640 + 40);
        }
        else if (circles.length >= 1)
        {
            do{
                
                randX = Math.floor(circles[a-2].x + 60 + Math.random()* 980 - 490);
                randY = Math.floor(circles[a-2].y + 60 + Math.random()* 680 - 350);

                if(counter3 > 2000)
                {
                    regenerate(); //regenerate circle;
                    sessionStorage.clear();
                    return;
                }
                counter3++;
            }while(randX > 960 || randY > 660 || randX < 40 || randY < 40); 
        }
        rngCircle =
        {
            index: 1,
            x: Math.floor(randX),
            y: Math.floor(randY),
            radius: 25,
        }
        for (var j = 0; j < circles.length; j++) {
            other = circles[j];
            dx = rngCircle.x - other.x;
            dy = rngCircle.y - other.y;
            rr = 70;
            if (dx * dx + dy * dy < rr * rr)
            {
                overlapping = true;;
                break;
            }
            if(counter > 10000)
            {
                regenerate(); //regenerate circle;
                sessionStorage.clear();
                return;
            }
            counter++;
        }
        
        //check if line of sequence is line of sight
        if(a > 2)
        {
            cr = 25; // radius value
            dv = cr + 3;
            P_ax = rngCircle.x - dv;
            P_ay = rngCircle.y - dv;
            P_bx = rngCircle.x + dv;
            P_by = rngCircle.y - dv;
            P_cx = rngCircle.x - dv;
            P_cy = rngCircle.y + dv;
            P_dx = rngCircle.x + dv;
            P_dy = rngCircle.y + dv;
            for (var j = 0; j < circles.length -1 ; j++) {

                //cross section of other circle with rng circle
                cx = rngCircle.x - circles[j].x;
                cy = rngCircle.y - circles[j].y;
                
                m = cy / cx;
                cf = (cr*(Math.pow(Math.pow(cx, 2) + Math.pow(cy, 2),0.5)))/cx;
                ca = circles[j].x*m ;
                cc = rngCircle.x*m;
                cb = (m + (1/m));

                //border line - 2 point coordinate
                Pbi1_x = Math.floor(((circles[j].x/m) + ca - cf) / cb);
                Pbi1_y = Math.floor(((-(1/m)*((circles[j].x/m) + ca - cf)) /cb) + (circles[j].x/m) + circles[j].y);
                Pbi2_x = Math.floor(((circles[j].x/m) + ca + cf) / cb);
                Pbi2_y = Math.floor(((-(1/m)*((circles[j].x/m) + ca + cf)) /cb) + (circles[j].x/m) + circles[j].y);

                //block P1 and P2 vs circles[a-2].x, rngCircle.x
                chk1_b = Math.floor(((rngCircle.x-Pbi2_x)*(Pbi1_y-Pbi2_y)-(rngCircle.y-Pbi2_y)*(Pbi1_x-Pbi2_x))*((circles[a-2].x-Pbi2_x)*(Pbi1_y-Pbi2_y)-(circles[a-2].y-Pbi2_y)*(Pbi1_x-Pbi2_x))); // P2 P4 , Pib Pib
                chk2_b = Math.floor(((Pbi2_x-rngCircle.x)*(circles[a-2].y-rngCircle.y)-(Pbi2_y-rngCircle.y)*(circles[a-2].x-rngCircle.x))*((Pbi1_x-rngCircle.x)*(circles[a-2].y-rngCircle.y)-(Pbi1_y-rngCircle.y)*(circles[a-2].x-rngCircle.x)));

                //square rect vs other possible line 
                chk1_ab = Math.floor(((P_ax-circles[j].x)*(circles[j+1].y-circles[j].y)-(P_ay-circles[j].y)*(circles[j+1].x-circles[j].x))*((P_bx-circles[j].x)*(circles[j+1].y-circles[j].y)-(P_by-circles[j].y)*(circles[j+1].x-circles[j].x)));
                chk2_ab = Math.floor(((circles[j].x-P_ax)*(P_by-P_ay)-(circles[j].y-P_ay)*(P_bx-P_ax))*((circles[j+1].x-P_ax)*(P_by-P_ay)-(circles[j+1].y-P_ay)*(P_bx-P_ax)));
                chk1_ac = Math.floor(((P_ax-circles[j].x)*(circles[j+1].y-circles[j].y)-(P_ay-circles[j].y)*(circles[j+1].x-circles[j].x))*((P_cx-circles[j].x)*(circles[j+1].y-circles[j].y)-(P_cy-circles[j].y)*(circles[j+1].x-circles[j].x)));
                chk2_ac = Math.floor(((circles[j].x-P_ax)*(P_cy-P_ay)-(circles[j].y-P_ay)*(P_cx-P_ax))*((circles[j+1].x-P_ax)*(P_cy-P_ay)-(circles[j+1].y-P_ay)*(P_cx-P_ax)));
                chk1_cd = Math.floor(((P_cx-circles[j].x)*(circles[j+1].y-circles[j].y)-(P_cy-circles[j].y)*(circles[j+1].x-circles[j].x))*((P_dx-circles[j].x)*(circles[j+1].y-circles[j].y)-(P_dy-circles[j].y)*(circles[j+1].x-circles[j].x)));
                chk2_cd = Math.floor(((circles[j].x-P_cx)*(P_dy-P_cy)-(circles[j].y-P_cy)*(P_dx-P_cx))*((circles[j+1].x-P_cx)*(P_dy-P_cy)-(circles[j+1].y-P_cy)*(P_dx-P_cx)));
                chk1_bd = Math.floor(((P_dx-circles[j].x)*(circles[j+1].y-circles[j].y)-(P_dy-circles[j].y)*(circles[j+1].x-circles[j].x))*((P_bx-circles[j].x)*(circles[j+1].y-circles[j].y)-(P_by-circles[j].y)*(circles[j+1].x-circles[j].x)));
                chk2_bd = Math.floor(((circles[j].x-P_dx)*(P_by-P_dy)-(circles[j].y-P_dy)*(P_bx-P_dx))*((circles[j+1].x-P_dx)*(P_by-P_dy)-(circles[j+1].y-P_dy)*(P_bx-P_dx)));
                
                //previous line vs other line
                chk1 = ((rngCircle.x-circles[j].x)*(circles[j+1].y-circles[j].y)-(rngCircle.y-circles[j].y)*(circles[j+1].x-circles[j].x))*((circles[a-2].x-circles[j].x)*(circles[j+1].y-circles[j].y)-(circles[a-2].y-circles[j].y)*(circles[j+1].x-circles[j].x));
                chk2 = ((circles[j].x-rngCircle.x)*(circles[a-2].y-rngCircle.y)-(circles[j].y-rngCircle.y)*(circles[a-2].x-rngCircle.x))*((circles[j+1].x-rngCircle.x)*(circles[a-2].y-rngCircle.y)-(circles[j+1].y-rngCircle.y)*(circles[a-2].x-rngCircle.x));

                if (chk1 < 0 && chk2 < 0 || 
                    chk1_b < 0 && chk2_b < 0 ||
                    chk1_ab < 0 && chk2_ab < 0 || chk1_cd < 0 && chk2_cd < 0 || chk1_ac < 0 && chk2_ac < 0 || chk1_bd < 0 && chk2_bd < 0){
                    los = false;
                    if(counter2 > 1000)
                    {
                        sessionStorage.clear();
                        regenerate(); //regenerate circle;
                        return;
                    }
                    counter2 ++;
                    break;
                }
            }
        }
        if (!overlapping && los) { 
            rngCircle.index = a; 
            circles.push(rngCircle);
            overlapping = false;
            los = true;
            a++;
        } 
    }
    if(toggle && circles.length == 25) 
    {
        /*check2();
        return;*/
        toggle = false;
        ctx.lineWidth = "5";
        ctx.fillStyle = "#FFFFFF";
        ctx.fillRect(0, 0, 1000, 700);
        ctx.strokeStyle = "black";
        ctx.strokeRect(0, 0, 1000, 700);
        ctx.lineWidth = "2";

        for (i = 0; i < circles.length; i++) {
   
                ctx.beginPath();
                ctx.arc(circles[i].x, circles[i].y, circles[i].radius , Math.PI * 2, 0, false);
                ctx.strokeStyle = "rgba(0, 0, 0, 1)";
                ctx.stroke();
                ctx.closePath();
                if(i < 9)
                {
                    ctx.fillStyle = "black"
                    ctx.font = '30px Arial';
                    ctx.fillText(circles[i].index, circles[i].x - 9 , circles[i].y + 10);
                }
                else
                {
                    ctx.fillStyle = "black"
                    ctx.font = '30px Arial';
                    ctx.fillText(circles[i].index, circles[i].x - 17 , circles[i].y + 10);
                }
         
                ctx.closePath();
                
            }
            ctx.lineWidth = "3";
            ctx.strokeStyle = "#666666";
    }
    if(overcounter >=30){
        document.write('<pre>');
        document.write("Overflow");
        return;
    }
    overcounter++;
}

function regenerate(){
    rngCircle.index = 0;
    a = 1;
    circles = [];
    counter = 0;
    counter2 = 0;
    counter3 = 0;
    overlapping = false;
    los = true;
    generateCir();

    
}


  function draw(e) 
  {
    // stop the function if they are not mouse down
    if(!isDrawing) { return;}
    //listen for mouse move event
    console.log(e);
    ctx.beginPath();
    ctx.moveTo(lastX, lastY);
    ctx.lineTo(e.offsetX, e.offsetY);
    ctx.stroke();
    [lastX, lastY] = [e.offsetX, e.offsetY];
    
  }
//mouse down
  canvas.addEventListener('mousedown', (e) => {
    isDrawing = true;
    var i, xDiff, yDiff, dist, result, cX, cY, startLength;
    xPos = null; yPos = null; circX = null; circY = null;
   
    xPos = e.offsetX || e.pageX;
    yPos = e.offsetY || e.pageY;
    if(clickInfo.length==0)
    {
        dataURL= canvas.toDataURL();
    }
    // check posn against centres
    startLength = clickInfo.length;
    for (i = 0; i < circles.length; i++) {
        cX = circles[i].x; cY = circles[i].y;
        xDiff = Math.abs(cX - xPos);
        yDiff = Math.abs(cY - yPos);
        dist = Math.sqrt(Math.pow(xDiff, 2) + Math.pow(yDiff, 2));
        // add info on clicked circle to array       
        if (dist <= 30) {
         //   clickInfo[clickInfo.length] = { label: circles[i].index, circX: circles[i].x, circY: circles[i].y, xPos: xPos, yPos: yPos };
           var clickCir =
   		 	{
        		index: circles[i].index,
        		x: xPos,
        		y: yPos,
    		}
            clickInfo.push(clickCir);
        }
    }
    // get the selected circle index from variable no;
    var no=0;
    if(clickInfo.length != startLength)
    {
  	    if(clickInfo[0].index!=1)
        {
            alert("Please start from 1");
            
            clickInfo.length = 0;
        }
        else
        {
            //loop through the arrayto color the selected circle
            for(i=0;i<circles.length;i++)
            {
                if(clickInfo[clickInfo.length-1].index==circles[i].index)
                {   
                    var cxpos=circles[i].x;
                    var cypos=circles[i].y;
                    var crad=circles[i].radius;
                    //must begin path if not the circle being colored will be 25 on default
                    ctx.beginPath();
                    ctx.arc(cxpos, cypos, crad, Math.PI * 2, 0, false);
                    ctx.fillStyle = "#00ff00";
                    ctx.fill();
                    ctx.closePath();
                    if(clickInfo[clickInfo.length-1].index <= 9)
                    {
                        ctx.fillStyle = "black"
                        ctx.font = '30px Arial';
                        ctx.fillText(clickInfo[clickInfo.length-1].index,cxpos -9, cypos +10);
                    }
                    else
                    {
                        ctx.fillStyle = "black"
                        ctx.font = '30px Arial';
                        ctx.fillText(clickInfo[clickInfo.length-1].index,cxpos -17, cypos +10);
                    }
                }
            }
           
            nextIndex=clickInfo[clickInfo.length - 1].index +1;
            result="You draw from circle " + clickInfo[clickInfo.length - 1].index;
        }
   }
   else
   {
        alert("Try to click on a circle");
   }
   //show result
   // msgObj.innerHTML = result;
    //start the coordinates drawing
    [lastX, lastY] = [e.offsetX, e.offsetY];
    
  });

  canvas.addEventListener('mousemove', draw);
  
  //mouseUp
  canvas.addEventListener('mouseup', (e) => {
 
    isDrawing = false;
    
     var i, xDiff, yDiff, dist, result, cX, cY, startLength;
    xPos = null; yPos = null; circX = null; circY = null;
   
    xPos = e.offsetX || e.pageX;
    yPos = e.offsetY || e.pageY;
    // check posn against centres
    startLength = clickInfo.length;
    for (i = 0; i < circles.length; i++) {
        cX = circles[i].x; cY = circles[i].y;
        xDiff = Math.abs(cX - xPos);
        yDiff = Math.abs(cY - yPos);
        dist = Math.sqrt(Math.pow(xDiff, 2) + Math.pow(yDiff, 2));
        // add info on clicked circle to array       
        if (dist <= 30) {
           var clickCir =
   		 	{
        		index: circles[i].index,
        		x: xPos,
        		y: yPos,
    		}
            clickInfo.push(clickCir);
        }
    }
	if(clickInfo[clickInfo.length - 1].index !=nextIndex)
     {
        alert("Wrong! Please connect to the correct circle!");
        errorRate++;
        clickInfo.pop();
        clickInfo.pop();
        var img=new Image;
        img.onload=function()
        {
            ctx.drawImage(img,0,0);
        };
        img.src=dataURL;
 
       
      

     }
    else
    {
      //  alert("You draw from circle " + clickInfo[clickInfo.length - 2].index+ "to "+ clickInfo[clickInfo.length - 1].index+ "Array Size:"+clickInfo.length);
      //loop through the arrayto color the selected circle
      for(i=0;i<circles.length;i++)
      {
          if(clickInfo[clickInfo.length-1].index==circles[i].index)
          {   
              var cxpos=circles[i].x;
              var cypos=circles[i].y;
              var crad=circles[i].radius;
              //must begin path if not the circle being colored will be 25 on default
              ctx.beginPath();
              ctx.arc(cxpos, cypos, crad, Math.PI * 2, 0, false);
              ctx.fillStyle = "#00ff00";
              ctx.fill();
              if(clickInfo[clickInfo.length-1].index <= 9)
                    {
                        ctx.fillStyle = "black"
                        ctx.font = '30px Arial';
                        ctx.fillText(clickInfo[clickInfo.length-1].index,cxpos -9, cypos +10);
                    }
                    else
                    {
                        ctx.fillStyle = "black"
                        ctx.font = '30px Arial';
                        ctx.fillText(clickInfo[clickInfo.length-1].index,cxpos -17, cypos +10);
                    }
                    if(i > 0){

                    
                        ctx.beginPath();
                        ctx.arc(circles[i-1].x, circles[i-1].y, circles[i-1].radius, Math.PI * 2, 0, false);
                        ctx.fillStyle = "#00ff00";
                        ctx.fill();
                        if((clickInfo[clickInfo.length-1].index-1) <= 9)
                        {
                            ctx.fillStyle = "black"
                            ctx.font = '30px Arial';
                            ctx.fillText((clickInfo[clickInfo.length-1].index-1),circles[i-1].x -9, circles[i-1].y +10);
                        }
                        else
                        {
                            ctx.fillStyle = "black"
                            ctx.font = '30px Arial';
                            ctx.fillText((clickInfo[clickInfo.length-1].index-1),circles[i-1].x -17, circles[i-1].y +10);
                        }
                    }
                    

          }
      }
      dataURL= canvas.toDataURL();
    }
    if(clickInfo[clickInfo.length - 1].index==25)
     {
    
     stopTest();
     
     }
    //start the coordinates drawing
     //[lastX, lastY] = [e.offsetX, e.offsetY];
      //convert canvas into image url
      
  });
  //when u no longer touching the mouse
  canvas.addEventListener('mouseout', () => isDrawing = false);

//elementName is the id of the countdown
function countdown( elementName, minutes, seconds )
{
    var element, endTime, hours, mins, msLeft, time;

    function twoDigits( n )
    {
        return (n <= 9 ? "0" + n : n);
    }

    function updateTimer()
    {
        msLeft = endTime - (+new Date);
        if ( msLeft < 1000 ) 
        {
            element.innerHTML = "Time is up!";
            if(clickInfo[clickInfo.length - 1].index!=25 || clickInfo.length==null)
            {
                alert("You have fail test A");
               
                stopTest();
            }
        } 
        else 
        {
            time = new Date( msLeft );
            hours = time.getUTCHours();
            mins = time.getUTCMinutes();
            element.innerHTML = (hours ? hours + ':' + twoDigits( mins ) : mins) + ':' + twoDigits( time.getUTCSeconds() );
            interval= setTimeout( updateTimer, time.getUTCMilliseconds() + 500 );  
        }
    }
    element = document.getElementById( elementName );
    endTime = (+new Date) + 1000 * (60*minutes + seconds) + 500;
    updateTimer();
}

function startTest()
{
    
    document.getElementById("timerCountDown").style.visibility="visible";
    countdown("timer", 3,00 );
}
function stopTest()
{
 
  
    clearInterval(interval);
    var msgObj=  document.getElementById("timer").innerHTML;
    var timeleft=msgObj;
    timerCountDown
    //store the timeleft timing to the array
    var TLeftArray=timeleft.split(":");
    var minDiff=2-TLeftArray[0];
    var secDiff=60-TLeftArray[1];
    var testResult;
   

    if(minDiff==0)
    {
       
        //document.getElementById("firstResult").innerHTML="You used "+secDiff+ "Seconds for the first test";
        testResult=secDiff;
  

    }
    else if(minDiff==0 && secDiff==0)
    {
        testResult=0;
    }
    else
    {
       
        secDiff+=(minDiff*60);
        document.getElementById("firstResult").innerHTML="You used "+secDiff+ "Seconds for the first test";

        testResult=secDiff;
    }
    setCookie("test_A", testResult, 1);
    setCookie("error_A", errorRate, 1);
    /**Need you to store the error rate  the variable name is errorRate*/

    window.sessionStorage.setItem("TMT_A", JSON.stringify(testResult));
    location.href = "#secondTestRules";
}

// function StoreUserTestResult(first)
// {
//     var d = new Date();
     
//     var date = d.getDate();
//     var month = d.getMonth() + 1; // Since getMonth() returns month from 0-11 not 1-12
//     var year = d.getFullYear();
     
//     var dateStr = date + "/" + month + "/" + year;

//     var user =
//         {
//             name: YongXin,
//             Date: dateStr,
//             firstTest: first,
//             SecondTest:0,
//         }
//     userArray.push(user);
// }

// function check2(){
//     for (i = 0; i < circles.length; i++) {
//         if(i > 0){

//             ctx.beginPath();
//             ctx.lineWidth = "5";
//             ctx.strokeStyle = 'rgb(' + Math.floor(Math.random()* 256) +', ' + Math.floor(Math.random()* 256) + ',' + Math.floor(Math.random()* 256) +')';  // Green path
//             ctx.moveTo(circles[i-1].x,circles[i-1].y);
//             ctx.lineTo(circles[i].x,circles[i].y);
//             ctx.stroke();  // Draw it
//             ctx.closePath();
            
//         }
//         ctx.beginPath();
//         ctx.arc(circles[i].x, circles[i].y, circles[i].radius, Math.PI * 2, 0, false);
//         ctx.fillStyle = "rgba(255, 0, 0, 0.8)";
//         ctx.fill();
//         ctx.fillStyle = "white"
//         ctx.font = '15px serif';
//         ctx.fillText(circles[i].index, circles[i].x - 8, circles[i].y + 3);
//         if(i==0)
//         {
//             ctx.fillStyle = "black"
//             ctx.font = '15px serif';
//             ctx.fillText("Start", circles[i].x - 10, circles[i].y + 40);
    
//         }
//         if(i==24)
//         {
//             ctx.fillStyle = "black"
//             ctx.font = '15px serif';
//             ctx.fillText("End", circles[i].x - 10, circles[i].y + 40);
//         }
//         ctx.closePath();
//         ctx.beginPath();
//         ctx.arc(rngCircle.x, rngCircle.y, circles[i].radius, Math.PI * 2, 0, false);
//         ctx.fillStyle = "rgba(255, 255, 0, 0.8)";
//         ctx.fill();
//         ctx.fillStyle = "black"
//         ctx.font = '20px serif';
//         ctx.fillText("RNG", rngCircle.x - 20, rngCircle.y + 3);
//         ctx.closePath();
//     }}
