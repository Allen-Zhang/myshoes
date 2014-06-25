/* Image swap for product_detail page */
window.onload = function () {
    var listNode = $("image_list");
    var imageNode = $("shoes_img");    
    var imageLinks = listNode.getElementsByTagName("a");
    
    // Process image links
    var i, linkNode, image;
    for ( i = 0; i < imageLinks.length; i++ ) {
        linkNode = imageLinks[i];

        // Cancel the default action of the event
		linkNode.onclick = function (evt) {  	
	    	if (!evt) { evt = window.event; }  // For IE
		    if ( evt.preventDefault ) {
		        evt.preventDefault();  // DOM compliant code
		    }
		    else {
		        evt.returnValue = false;  // For IE
		    }
		}
		// Attach event handler
        linkNode.onmouseover = function () {
            var link = this;  // Link is the linkNode
			link.focus();
            imageNode.src = link.getAttribute("href");  // set the src of the displayed img to be selected "href"
		}
        // // Preload image
        // image = new Image();
        // image.src = linkNode.getAttribute("href");
    }
    $("first_link").focus();
}