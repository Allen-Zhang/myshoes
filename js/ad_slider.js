$(function(){

    var aPage = $('#ad .page a');       //image button
    var aImg = $('#ad .box img');       //set of images
    var iSize = aImg.size();        //number of images
    var index = 0; 
    var t;
	
	// Function of clicking left button
    $('#btnLeft').click(function(){     
        index--;
        if(index < 0){
            index = iSize - 1;
        };
        change(index);
    })
	
	// Function of clicking right button
    $('#btnRight').click(function(){    
        index++;
        if(index > iSize - 1){
            index = 0;
        }
        change(index);
    })
	
    // Function of clicking image button
    aPage.click(function(){
        index = $(this).index();
        change(index);
    });
	
    // Function of changing the images
    function change(index){
        aPage.removeClass('active');
        aPage.eq(index).addClass('active');
        aImg.stop();
        aImg.eq(index).siblings().animate({
            opacity:0
        }, 1000);
        // Display current image
        aImg.eq(index).animate({
            opacity:1
        }, 1000);
    }
     
    function autoshow() {
        index = index + 1;
        if(index <= iSize - 1){
           change(index);
        }else{
            index = 0;
            change(index);
        }         
    }
    int = setInterval(autoshow, 3000);
	
    function clearInt() {
        $('#btnLeft,#btnRight,.page a').mouseover(function() {
            clearInterval(int);
        });
    }
	
    function setInt() {
        $('#btnLeft,#btnRight,.page a').mouseout(function() {
            int=setInterval(autoshow, 3000);
        });
    }
	
    clearInt();
    setInt();
})